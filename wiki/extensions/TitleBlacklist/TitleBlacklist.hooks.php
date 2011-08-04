<?php
/**
 * Hooks for Title Blacklist
 * @author Victor Vasiliev
 * @copyright © 2007-2010 Victor Vasiliev et al
 * @license GNU General Public License 2.0 or later
 */

/**
 * Hooks for the TitleBlacklist class
 *
 * @ingroup Extensions
 */
class TitleBlacklistHooks {
	/** getUserPermissionsErrorsExpensive hook */
	public static function userCan( $title, $user, $action, &$result ) {
		global $wgTitleBlacklist;
		if( $action == 'create' || $action == 'edit' || $action == 'upload' ) {
			efInitTitleBlacklist();
			$blacklisted = $wgTitleBlacklist->userCannot( $title, $user, $action );
			if( $blacklisted instanceof TitleBlacklistEntry ) {
				$result = array( $blacklisted->getErrorMessage( 'edit' ),
					htmlspecialchars( $blacklisted->getRaw() ),
					$title->getFullText() );
				return false;
			}
		}
		return true;
	}

	/** AbortMove hook */
	public static function abortMove( $old, $nt, $user, &$err ) {
		global $wgTitleBlacklist;
		efInitTitleBlacklist();
		$blacklisted = $wgTitleBlacklist->userCannot( $nt, $user, 'move' );
		if( !$blacklisted )
			$blacklisted = $wgTitleBlacklist->userCannot( $old, $user, 'edit' );
		if( $blacklisted instanceof TitleBlacklistEntry ) {
			$err = wfMsgWikiHtml( $blacklisted->getErrorMessage( 'move' ),
				htmlspecialchars( $blacklisted->getRaw() ),
				htmlspecialchars( $old->getFullText() ),
				htmlspecialchars( $nt->getFullText() ) );
			return false;
		}
		return true;
	}

	/**
	 * Check whether a user name is acceptable,
	 * and set a message if unacceptable.
	 *
	 * Used by abortNewAccount and centralAuthAutoCreate
	 *
	 * @return bool Acceptable
	 */
	private static function acceptNewUserName( $userName, &$err, $override = true ) {
		global $wgTitleBlacklist, $wgUser;
		efInitTitleBlacklist();
		$title = Title::makeTitleSafe( NS_USER, $userName );
		$blacklisted = $wgTitleBlacklist->userCannot( $title, $wgUser, 'new-account', $override );
		if( $blacklisted instanceof TitleBlacklistEntry ) {
			$message = $blacklisted->getErrorMessage( 'new-account' );
			$err = wfMsgWikiHtml( $message, $blacklisted->getRaw(), $userName );
			return false;
		}
		return true;
	}

	/** AbortNewAccount hook */
	public static function abortNewAccount( $user, &$message ) {
		global $wgUser, $wgRequest;
		$override = $wgRequest->getCheck( 'wpIgnoreTitleBlacklist' );
		return self::acceptNewUserName( $user->getName(), $message, $override );
	}

	/** CentralAuthAutoCreate hook */
	public static function centralAuthAutoCreate( $user, $userName ) {
		$message = ''; # Will be ignored
		return self::acceptNewUserName( $userName, $message );
	}

	/** EditFilter hook */
	public static function validateBlacklist( $editor, $text, $section, $error ) {
		global $wgTitleBlacklist, $wgUser;
		efInitTitleBlacklist();
		$title = $editor->mTitle;
		if( $title->getNamespace() == NS_MEDIAWIKI && $title->getDBkey() == 'Titleblacklist' ) {

			$bl = $wgTitleBlacklist->parseBlacklist( $text );
			$ok = $wgTitleBlacklist->validate( $bl );
			if( count( $ok ) == 0 ) {
				return true;
			}

			$errmsg = wfMsgExt( 'titleblacklist-invalid', array( 'parsemag' ), count( $ok ) );
			$errlines = '* <tt>' . implode( "</tt>\n* <tt>", array_map( 'wfEscapeWikiText', $ok ) ) . '</tt>';
			$error = Html::openElement( 'div', array( 'class' => 'errorbox' ) ) .
				$errmsg .
				"\n" .
				$errlines .
				Html::closeElement( 'div' ) . "\n" .
				Html::element( 'br', array( 'clear' => 'all' ) ) . "\n";

			// $error will be displayed by the edit class
			return true;
		} elseif( !$section ) {
			# Block redirects to nonexistent blacklisted titles
			$retitle = Title::newFromRedirect( $text );
			if( $retitle !== null && !$retitle->exists() )  {
				$blacklisted = $wgTitleBlacklist->userCannot( $retitle, $wgUser, 'create' );
				if( $blacklisted instanceof TitleBlacklistEntry ) {
					$error = Html::openElement( 'div', array( 'class' => 'errorbox' ) ) .
						wfMsg( 'titleblacklist-forbidden-edit',
							htmlspecialchars( $blacklisted->getRaw() ),
							$retitle->getFullText() ) .
						Html::closeElement( 'div' ) . "\n" .
						Html::element( 'br', array( 'clear' => 'all' ) ) . "\n";
				}
			}

			return true;
		}
		return true;
	}

	/** ArticleSaveComplete hook */
	public static function clearBlacklist( &$article, &$user,
		$text, $summary, $isminor, $iswatch, $section )
	{
		$title = $article->getTitle();
		if( $title->getNamespace() == NS_MEDIAWIKI && $title->getDBkey() == 'Titleblacklist' ) {
			global $wgTitleBlacklist;
			efInitTitleBlacklist();
			$wgTitleBlacklist->invalidate();
		}
		return true;
	}

	/** UserCreateForm hook based on the one from AntiSpoof extension */
	public static function addOverrideCheckbox( &$template ) {
		global $wgRequest, $wgUser;

		if ( TitleBlacklist::userCanOverride( 'new-account' ) )
			$template->addInputItem( 'wpIgnoreTitleBlacklist',
				$wgRequest->getCheck( 'wpIgnoreTitleBlacklist' ),
				'checkbox', 'titleblacklist-override' );
		return true;
	}
}
