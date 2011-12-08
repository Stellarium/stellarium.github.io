<?php

# Loader for spam blacklist feature
# Include this from LocalSettings.php

if ( !defined( 'MEDIAWIKI' ) ) {
	exit;
}

$wgExtensionCredits[version_compare($wgVersion, '1.17alpha', '>=') ? 'antispam' : 'other'][] = array(
	'path'           => __FILE__,
	'name'           => 'SpamBlacklist',
	'author'         => 'Tim Starling',
	'url'            => 'http://www.mediawiki.org/wiki/Extension:SpamBlacklist',
	'descriptionmsg' => 'spam-blacklist-desc',
);

$dir = dirname(__FILE__) . '/';
$wgExtensionMessagesFiles['SpamBlackList'] = $dir . 'SpamBlacklist.i18n.php';

global $wgSpamBlacklistFiles;
global $wgSpamBlacklistSettings;

$wgSpamBlacklistFiles = false;
$wgSpamBlacklistSettings = array();

$wgHooks['EditFilterMerged'][] = 'wfSpamBlacklistFilterMerged';
$wgHooks['EditFilter'][] = 'wfSpamBlacklistValidate';
$wgHooks['ArticleSaveComplete'][] = 'wfSpamBlacklistArticleSave';
$wgHooks['APIEditBeforeSave'][] = 'wfSpamBlacklistFilterAPIEditBeforeSave';

/**
 * Get an instance of SpamBlacklist and do some first-call initialisation.
 * All actual functionality is implemented in that object
 */
function wfSpamBlacklistObject() {
	global $wgSpamBlacklistFiles, $wgSpamBlacklistSettings;
	static $spamObj;
	if ( !$spamObj ) {
		require_once( "SpamBlacklist_body.php" );
		$spamObj = new SpamBlacklist( $wgSpamBlacklistSettings );
		if( $wgSpamBlacklistFiles ) {
			$spamObj->files = $wgSpamBlacklistFiles;
		}
	}
	return $spamObj;
}

/**
 * Hook function for EditFilterMerged
 */
function wfSpamBlacklistFilterMerged( $editPage, $text, &$hookErr, $editSummary ) {
	global $wgTitle;
	if( is_null( $wgTitle ) ) {
		# API mode
		# wfSpamBlacklistFilterAPIEditBeforeSave already checked the blacklist
		return true;
	}

	$spamObj = wfSpamBlacklistObject();
	$title = $editPage->mArticle->getTitle();
	$ret = $spamObj->filter( $title, $text, '', $editSummary, $editPage );
	if ( $ret !== false ) {
		// spamPageWithContent() method was added in MW 1.17
		if ( method_exists( $editPage, 'spamPageWithContent' ) ) {
			$editPage->spamPageWithContent( $ret );
		} else {
			$editPage->spamPage( $ret );
		}
	}
	// Return convention for hooks is the inverse of $wgFilterCallback
	return ( $ret === false );
}

/**
 * Hook function for APIEditBeforeSave
 */
function wfSpamBlacklistFilterAPIEditBeforeSave( $editPage, $text, &$resultArr ) {
	$spamObj = wfSpamBlacklistObject();
	$title = $editPage->mArticle->getTitle();
	$ret = $spamObj->filter( $title, $text, '', '', $editPage );
	if ( $ret!==false ) {
		$resultArr['spamblacklist'] = $ret;
	}
	// Return convention for hooks is the inverse of $wgFilterCallback
	return ( $ret === false );
}

/**
 * Hook function for EditFilter
 * Confirm that a local blacklist page being saved is valid,
 * and toss back a warning to the user if it isn't.
 */
function wfSpamBlacklistValidate( $editPage, $text, $section, &$hookError ) {
	$spamObj = wfSpamBlacklistObject();
	return $spamObj->validate( $editPage, $text, $section, $hookError );
}

/**
 * Hook function for ArticleSaveComplete
 * Clear local spam blacklist caches on page save.
 */
function wfSpamBlacklistArticleSave( &$article, &$user, $text, $summary, $isminor, $iswatch, $section ) {
	$spamObj = wfSpamBlacklistObject();
	return $spamObj->onArticleSave( $article, $user, $text, $summary, $isminor, $iswatch, $section );
}

