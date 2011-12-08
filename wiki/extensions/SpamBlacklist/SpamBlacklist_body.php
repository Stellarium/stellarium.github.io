<?php

if ( !defined( 'MEDIAWIKI' ) ) {
	exit;
}

class SpamBlacklist {
	var $regexes = false;
	var $files = array( "http://meta.wikimedia.org/w/index.php?title=Spam_blacklist&action=raw&sb_ver=1" );
	var $warningTime = 600;
	var $expiryTime = 900;
	var $warningChance = 100;
	var $ignoreEditSummary = false;

	function __construct( $settings = array() ) {
		foreach ( $settings as $name => $value ) {
			$this->$name = $value;
		}
	}

	/**
	 * Check if the given local page title is a spam regex source.
	 * @param Title $title
	 * @return bool
	 */
	function isLocalSource( $title ) {
		global $wgDBname;

		if( $title->getNamespace() == NS_MEDIAWIKI ) {
			$sources = array(
				"Spam-blacklist",
				"Spam-whitelist" );
			if( in_array( $title->getDBkey(), $sources ) ) {
				return true;
			}
		}

		$thisHttp = wfExpandUrl( $title->getFullUrl( 'action=raw' ), PROTO_HTTP );
		$thisHttpRegex = '/^' . preg_quote( $thisHttp, '/' ) . '(?:&.*)?$/';

		foreach( $this->files as $fileName ) {
			$matches = array();
			if ( preg_match( '/^DB: (\w*) (.*)$/', $fileName, $matches ) ) {
				if ( $wgDBname == $matches[1] ) {
					if( $matches[2] == $title->getPrefixedDbKey() ) {
						// Local DB fetch of this page...
						return true;
					}
				}
			} elseif( preg_match( $thisHttpRegex, $fileName ) ) {
				// Raw view of this page
				return true;
			}
		}

		return false;
	}

	/**
	 * Fetch local and (possibly cached) remote blacklists.
	 * Will be cached locally across multiple invocations.
	 * @return array set of regular expressions, potentially empty.
	 */
	function getBlacklists() {
		if( $this->regexes === false ) {
			$this->regexes = array_merge(
				$this->getLocalBlacklists(),
				$this->getSharedBlacklists() );
		}
		return $this->regexes;
	}

	/**
	 * Fetch (possibly cached) remote blacklists.
	 * @return array
	 */
	function getSharedBlacklists() {
		global $wgMemc, $wgDBname;
		$fname = 'SpamBlacklist::getRegex';
		wfProfileIn( $fname );

		wfDebugLog( 'SpamBlacklist', "Loading spam regex..." );

		if ( count( $this->files ) == 0 ){
			# No lists
			wfDebugLog( 'SpamBlacklist', "no files specified\n" );
			wfProfileOut( $fname );
			return array();
		}

		// This used to be cached per-site, but that could be bad on a shared
		// server where not all wikis have the same configuration.
		$cachedRegexes = $wgMemc->get( "$wgDBname:spam_blacklist_regexes" );
		if( is_array( $cachedRegexes ) ) {
			wfDebugLog( 'SpamBlacklist', "Got shared spam regexes from cache\n" );
			wfProfileOut( $fname );
			return $cachedRegexes;
		}

		$regexes = $this->buildSharedBlacklists();
		$wgMemc->set( "$wgDBname:spam_blacklist_regexes", $regexes, $this->expiryTime );

		return $regexes;
	}

	function clearCache() {
		global $wgMemc, $wgDBname;
		$wgMemc->delete( "$wgDBname:spam_blacklist_regexes" );
		wfDebugLog( 'SpamBlacklist', "Spam blacklist local cache cleared.\n" );
	}

	function buildSharedBlacklists() {
		$regexes = array();
		# Load lists
		wfDebugLog( 'SpamBlacklist', "Constructing spam blacklist\n" );
		foreach ( $this->files as $fileName ) {
			$matches = array();
			if ( preg_match( '/^DB: ([\w-]*) (.*)$/', $fileName, $matches ) ) {
				$text = $this->getArticleText( $matches[1], $matches[2] );
			} elseif ( preg_match( '/^http:\/\//', $fileName ) ) {
				$text = $this->getHttpText( $fileName );
			} else {
				$text = file_get_contents( $fileName );
				wfDebugLog( 'SpamBlacklist', "got from file $fileName\n" );
			}

			// Build a separate batch of regexes from each source.
			// While in theory we could squeeze a little efficiency
			// out of combining multiple sources in one regex, if
			// there's a bad line in one of them we'll gain more
			// from only having to break that set into smaller pieces.
			$regexes = array_merge( $regexes,
				SpamRegexBatch::regexesFromText( $text, $fileName ) );
		}

		return $regexes;
	}

	function getHttpText( $fileName ) {
		global $wgDBname, $messageMemc;

		# HTTP request
		# To keep requests to a minimum, we save results into $messageMemc, which is
		# similar to $wgMemc except almost certain to exist. By default, it is stored
		# in the database
		#
		# There are two keys, when the warning key expires, a random thread will refresh
		# the real key. This reduces the chance of multiple requests under high traffic
		# conditions.
		$key = "spam_blacklist_file:$fileName";
		$warningKey = "$wgDBname:spamfilewarning:$fileName";
		$httpText = $messageMemc->get( $key );
		$warning = $messageMemc->get( $warningKey );

		if ( !is_string( $httpText ) || ( !$warning && !mt_rand( 0, $this->warningChance ) ) ) {
			wfDebugLog( 'SpamBlacklist', "Loading spam blacklist from $fileName\n" );
			$httpText = Http::get( $fileName );
			if( $httpText === false ) {
				wfDebugLog( 'SpamBlacklist', "Error loading blacklist from $fileName\n" );
			}
			$messageMemc->set( $warningKey, 1, $this->warningTime );
			$messageMemc->set( $key, $httpText, $this->expiryTime );
		} else {
			wfDebugLog( 'SpamBlacklist', "Got spam blacklist from HTTP cache for $fileName\n" );
		}
		return $httpText;
	}

	static function getLocalBlacklists() {
		return SpamRegexBatch::regexesFromMessage( 'spam-blacklist' );
	}

	static function getWhitelists() {
		return SpamRegexBatch::regexesFromMessage( 'spam-whitelist' );
	}

	/**
	 * @param Title $title
	 * @param string $text Text of section, or entire text if $editPage!=false
	 * @param string $section Section number or name
	 * @param EditSummary $editSummary Edit summary if one exists, some people use urls there too
	 * @param EditPage $editPage EditPage if EditFilterMerged was called, null otherwise
	 * @return Matched text if the edit should not be allowed, false otherwise
	 */
	function filter( &$title, $text, $section, $editsummary = '', EditPage &$editPage = null ) {
		global $wgParser, $wgUser;

		$fname = 'wfSpamBlacklistFilter';
		wfProfileIn( $fname );

		$this->title = $title;
		$this->text = $text;
		$this->section = $section;
		$text = str_replace( '．', '.', $text ); //@bug 12896

		$blacklists = $this->getBlacklists();
		$whitelists = $this->getWhitelists();

		if ( count( $blacklists ) ) {
			# Run parser to strip SGML comments and such out of the markup
			# This was being used to circumvent the filter (see bug 5185)
			if ( $editPage ) {
				$editInfo = $editPage->mArticle->prepareTextForEdit( $text );
				$out = $editInfo->output;
			} else {
				$options = new ParserOptions();
				$text = $wgParser->preSaveTransform( $text, $title, $wgUser, $options );
				$out = $wgParser->parse( $text, $title, $options );
			}
			$newLinks = array_keys( $out->getExternalLinks() );
			$oldLinks = $this->getCurrentLinks( $title );
			$addedLinks = array_diff( $newLinks, $oldLinks );

			// We add the edit summary if one exists
			if ( !$this->ignoreEditSummary && !empty( $editsummary ) ) {
				$addedLinks[] = $editsummary;
			}

			wfDebugLog( 'SpamBlacklist', "Old URLs: " . implode( ', ', $oldLinks ) );
			wfDebugLog( 'SpamBlacklist', "New URLs: " . implode( ', ', $newLinks ) );
			wfDebugLog( 'SpamBlacklist', "Added URLs: " . implode( ', ', $addedLinks ) );

			$links = implode( "\n", $addedLinks );

			# Strip whitelisted URLs from the match
			if( is_array( $whitelists ) ) {
				wfDebugLog( 'SpamBlacklist', "Excluding whitelisted URLs from " . count( $whitelists ) .
					" regexes: " . implode( ', ', $whitelists ) . "\n" );
				foreach( $whitelists as $regex ) {
					wfSuppressWarnings();
					$newLinks = preg_replace( $regex, '', $links );
					wfRestoreWarnings();
					if( is_string( $newLinks ) ) {
						// If there wasn't a regex error, strip the matching URLs
						$links = $newLinks;
					}
				}
			}

			# Do the match
			wfDebugLog( 'SpamBlacklist', "Checking text against " . count( $blacklists ) .
				" regexes: " . implode( ', ', $blacklists ) . "\n" );
			$retVal = false;
			foreach( $blacklists as $regex ) {
				wfSuppressWarnings();
				$matches = array();
				$check = preg_match( $regex, $links, $matches );
				wfRestoreWarnings();
				if( $check ) {
					wfDebugLog( 'SpamBlacklist', "Match!\n" );
					$ip = wfGetIP();
					wfDebugLog( 'SpamBlacklistHit', "$ip caught submitting spam: {$matches[0]}\n" );
					$retVal = $matches[0];
					break;
				}
			}
		} else {
			$retVal = false;
		}

		wfProfileOut( $fname );
		return $retVal;
	}

	/**
	 * Look up the links currently in the article, so we can
	 * ignore them on a second run.
	 *
	 * WARNING: I can add more *of the same link* with no problem here.
	 */
	function getCurrentLinks( $title ) {
		$dbr = wfGetDB( DB_SLAVE );
		$id = $title->getArticleId(); // should be zero queries
		$res = $dbr->select( 'externallinks', array( 'el_to' ),
			array( 'el_from' => $id ), __METHOD__ );
		$links = array();
		foreach ( $res as $row ) {
			$links[] = $row->el_to;
		}
		return $links;
	}

	/**
	 * Fetch an article from this or another local MediaWiki database.
	 * This is probably *very* fragile, and shouldn't be used perhaps.
	 * @param string $db
	 * @param string $article
	 */
	function getArticleText( $db, $article ) {
		wfDebugLog( 'SpamBlacklist', "Fetching local spam blacklist from '$article' on '$db'...\n" );
		global $wgDBname;
		$dbr = wfGetDB( DB_READ );
		$dbr->selectDB( $db );
		$text = false;
		if ( $dbr->tableExists( 'page' ) ) {
			// 1.5 schema
			$dbw = wfGetDB( DB_READ );
			$dbw->selectDB( $db );
			$revision = Revision::newFromTitle( Title::newFromText( $article ) );
			if ( $revision ) {
				$text = $revision->getText();
			}
			$dbw->selectDB( $wgDBname );
		} else {
			// 1.4 schema
			$title = Title::newFromText( $article );
			$text = $dbr->selectField( 'cur', 'cur_text', array( 'cur_namespace' => $title->getNamespace(),
				'cur_title' => $title->getDBkey() ), 'SpamBlacklist::getArticleText' );
		}
		$dbr->selectDB( $wgDBname );
		return strval( $text );
	}

	/**
	 * Confirm that a local blacklist page being saved is valid,
	 * and toss back a warning to the user if it isn't.
	 * This is an EditFilter hook.
	 */
	function validate( $editPage, $text, $section, &$hookError ) {
		$thisPageName = $editPage->mTitle->getPrefixedDBkey();

		if( !$this->isLocalSource( $editPage->mTitle ) ) {
			wfDebugLog( 'SpamBlacklist', "Spam blacklist validator: [[$thisPageName]] not a local blacklist\n" );
			return true;
		}

		$lines = explode( "\n", $text );

		$badLines = SpamRegexBatch::getBadLines( $lines );
		if( $badLines ) {
			wfDebugLog( 'SpamBlacklist', "Spam blacklist validator: [[$thisPageName]] given invalid input lines: " .
				implode( ', ', $badLines ) . "\n" );

			$badList = "*<tt>" .
				implode( "</tt>\n*<tt>",
					array_map( 'wfEscapeWikiText', $badLines ) ) .
				"</tt>\n";
			$hookError =
				"<div class='errorbox'>" .
				wfMsgExt( 'spam-invalid-lines', array( 'parsemag' ), count( $badLines ) ) . "<br />" .
				$badList .
				"</div>\n" .
				"<br clear='all' />\n";
			return true;
		} else {
			wfDebugLog( 'SpamBlacklist', "Spam blacklist validator: [[$thisPageName]] ok or empty blacklist\n" );
			return true;
		}
	}

	function onArticleSave( &$article, &$user, $text, $summary, $isminor, $iswatch, $section ) {
		if( $this->isLocalSource( $article->getTitle() ) ) {
			$this->clearCache();
		}
		return true;
	}
}


class SpamRegexBatch {
	/**
	 * Build a set of regular expressions matching URLs with the list of regex fragments.
	 * Returns an empty list if the input list is empty.
	 *
	 * @param array $lines list of fragments which will match in URLs
	 * @param int $batchSize largest allowed batch regex;
	 *                       if 0, will produce one regex per line
	 * @return array
	 * @private
	 * @static
	 */
	static function buildRegexes( $lines, $batchSize=4096 ) {
		# Make regex
		# It's faster using the S modifier even though it will usually only be run once
		//$regex = 'https?://+[a-z0-9_\-.]*(' . implode( '|', $lines ) . ')';
		//return '/' . str_replace( '/', '\/', preg_replace('|\\\*/|', '/', $regex) ) . '/Sim';
		$regexes = array();
		$regexStart = '/https?:\/\/+[a-z0-9_\-.]*(';
		$regexEnd = ($batchSize > 0 ) ? ')/Sim' : ')/im';
		$build = false;
		foreach( $lines as $line ) {
			if( substr( $line, -1, 1 ) == "\\" ) {
				// Final \ will break silently on the batched regexes.
				// Skip it here to avoid breaking the next line;
				// warnings from getBadLines() will still trigger on
				// edit to keep new ones from floating in.
				continue;
			}
			// FIXME: not very robust size check, but should work. :)
			if( $build === false ) {
				$build = $line;
			} elseif( strlen( $build ) + strlen( $line ) > $batchSize ) {
				$regexes[] = $regexStart .
					str_replace( '/', '\/', preg_replace('|\\\*/|u', '/', $build) ) .
					$regexEnd;
				$build = $line;
			} else {
				$build .= '|';
				$build .= $line;
			}
		}
		if( $build !== false ) {
			$regexes[] = $regexStart .
				str_replace( '/', '\/', preg_replace('|\\\*/|u', '/', $build) ) .
				$regexEnd;
		}
		return $regexes;
	}

	/**
	 * Confirm that a set of regexes is either empty or valid.
	 * @param array $lines set of regexes
	 * @return bool true if ok, false if contains invalid lines
	 * @private
	 * @static
	 */
	static function validateRegexes( $regexes ) {
		foreach( $regexes as $regex ) {
			wfSuppressWarnings();
			$ok = preg_match( $regex, '' );
			wfRestoreWarnings();

			if( $ok === false ) {
				return false;
			}
		}
		return true;
	}

	/**
	 * Strip comments and whitespace, then remove blanks
	 * @private
	 * @static
	 */
	static function stripLines( $lines ) {
		return array_filter(
			array_map( 'trim',
					preg_replace( '/#.*$/', '',
						$lines ) ) );
	}

	/**
	 * Do a sanity check on the batch regex.
	 * @param lines unsanitized input lines
	 * @param string $fileName optional for debug reporting
	 * @return array of regexes
	 * @private
	 * @static
	 */
	static function buildSafeRegexes( $lines, $fileName=false ) {
		$lines = SpamRegexBatch::stripLines( $lines );
		$regexes = SpamRegexBatch::buildRegexes( $lines );
		if( SpamRegexBatch::validateRegexes( $regexes ) ) {
			return $regexes;
		} else {
			// _Something_ broke... rebuild line-by-line; it'll be
			// slower if there's a lot of blacklist lines, but one
			// broken line won't take out hundreds of its brothers.
			if( $fileName ) {
				wfDebugLog( 'SpamBlacklist', "Spam blacklist warning: bogus line in $fileName\n" );
			}
			return SpamRegexBatch::buildRegexes( $lines, 0 );
		}
	}

	/**
	 * @param array $lines
	 * @return array of input lines which produce invalid input, or empty array if no problems
	 * @static
	 */
	static function getBadLines( $lines ) {
		$lines = SpamRegexBatch::stripLines( $lines );

		$badLines = array();
		foreach( $lines as $line ) {
			if( substr( $line, -1, 1 ) == "\\" ) {
				// Final \ will break silently on the batched regexes.
				$badLines[] = $line;
			}
		}

		$regexes = SpamRegexBatch::buildRegexes( $lines );
		if( SpamRegexBatch::validateRegexes( $regexes ) ) {
			// No other problems!
			return $badLines;
		}

		// Something failed in the batch, so check them one by one.
		foreach( $lines as $line ) {
			$regexes = SpamRegexBatch::buildRegexes( array( $line ) );
			if( !SpamRegexBatch::validateRegexes( $regexes ) ) {
				$badLines[] = $line;
			}
		}
		return $badLines;
	}

	/**
	 * Build a set of regular expressions from the given multiline input text,
	 * with empty lines and comments stripped.
	 *
	 * @param string $source
	 * @param string $fileName optional, for reporting of bad files
	 * @return array of regular expressions, potentially empty
	 * @static
	 */
	static function regexesFromText( $source, $fileName=false ) {
		$lines = explode( "\n", $source );
		return SpamRegexBatch::buildSafeRegexes( $lines, $fileName );
	}

	/**
	 * Build a set of regular expressions from a MediaWiki message.
	 * Will be correctly empty if the message isn't present.
	 * @param string $source
	 * @return array of regular expressions, potentially empty
	 * @static
	 */
	static function regexesFromMessage( $message ) {
		$source = wfMsgForContent( $message );
		if( $source && !wfEmptyMsg( $message, $source ) ) {
			return SpamRegexBatch::regexesFromText( $source );
		} else {
			return array();
		}
	}
}

