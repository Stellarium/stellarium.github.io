<?PHP
//
// rss2html.php RSS feed to HTML webpage script
//
// Copyright 2004-2007 NotePage, Inc.
// http://www.feedforall.com
//
// This script may be used and modified freely for business or personal use
// This script may not be resold in any form
// This script may only be redistributed in its original form
//
//
// $Id: rss2html.php,v 3.15 2010/03/16 22:31:38 housley Exp $
//

//
// ==========================================================================
// Configuration options
// ==========================================================================
//
// Set the following variable useFopenURL to one if you want/need to use
// fopen() instead of CURL or FeedForAll_fopen()
$useFopenURL = 0;

//
// If XLMFILE is passed as part of the URL, XMLFILE=, then it will be used
// otherwise the the file below is used.
//$XMLfilename = "http://examlple.com/sample.xml";
$XMLfilename = "http://sourceforge.net/export/rss2_projnews.php?group_id=48857&rss_fulltext=1";

//
// If TEMPLATE is passed as part of the URL. TEMPLATE=, then it will be used
// otherwise the the file below is used.
//$TEMPLATEfilename = "http://examlple.com/sample-template.html";
$TEMPLATEfilename = "rss2html/basic-template.html";

//
// Since some feeds may have titles or descriptins in the feed or items that
// are longer then want fits in your HTML page it is possible to trim them
// with the following 4 variables.  A values of 0 (ZERO) displays the full
// length.
// CAUTION:  Do not limit a title or description that has HTML in it, the
//           will not produce a valid HTML page.
$limitFeedTitleLength = 0;        // Not limited, in the URL as FeedTitleLength=
$limitFeedDescriptionLength = 0;  // Not limited, in the URL as FeedDescriptionLength=
$limitItemTitleLength = 0;        // Not limited, in the URL as ItemTitleLength=
$limitItemDescriptionLength = 0;  // Not limited, in the URL as ItemDescriptionLength=

//
// date() function documented http://www.php.net/manual/en/function.date.php
$LongDateFormat = "F jS, Y";    // ie, "Jan 21st, 2004"
$ShortDateFormat = "m/d/Y";     // ie, "1/21/2004"
//$ShortDateFormat = "d/m/Y";     // ie, "21/1/2004"
$LongTimeFormat = "H:i:s T O";  // ie, "13:24:30 EDT -0400"
$ShortTimeFormat = "h:i A";     // ie, "1:24 PM"

//
// Timezone - If your server is not in the same timezone as you are the timezone
// of the times and dates produced in the above from can be controlled with the
// below code.  Just uncomment the following line and change to the correct
// zonename.  A full list is available here, http://www.php.net/manual/en/timezones.php
// You town.city probably isn't listed, so look for a neighboring major city
// putenv("TZ=America/New_York");

//
// Registered user of FeedForAll and FeedForAll Mac product(s) have access
// to a caching module.  This enables it's use if it is installed.
$allowCachingXMLFiles = 0;

//
// File access level:  The variable $fileAccessLevel can be used limit what files
// and type of files (local or remote) can be used with rss2html.php
// -1 = Remote files are NOT allowed, only local files allowed for template
//      and feed which have filenames ending in extensions in the
//      $allowedTemplateExtensions and $allowedFeedExtensions lists below
//  0 = Remote files and any local files allowed for template and feed
//  1 = Remote files and only local files allowed for template and feed
//      which have filenames ending in extensions in the
//      $allowedTemplateExtensions and $allowedFeedExtensions lists below
//  2 = No local files allowed, remote files only.
$fileAccessLevel = 1;

//
// Allowed file extensions is a list of the allowable extensions for local for
// the template and the feed.  New entries can be added by following the example
// below.
$allowedTemplateExtensions = Array(".html", ".htm", ".shtml");
$allowedFeedExtensions = Array(".xml", ".rss");

//
// Destination Encoding:  By default rss2html.php converts all feeds to UTF-8
// and then produces webpages in UTF-8 because UTF-8 is capable of displaying
// all possible characters.
$destinationEncoding = "UTF-8";

//
// Missing Encoding Default:  Some feeds do not specify the character set 
// they are encoded in.  The XML specification states that if there is no
// encoding specified the XML file, all RSS feeds are XML, must be encoded
// in UTF-8, but experience has show differently.  This specifies the 
// encoding that will be used for feeds that don't specify the encoding.
//$missingEncodingDefault = "UTF-8";
$missingEncodingDefault = "ISO-8859-1";

//
// Escape Ampersand In Links:  Proper HTML requires that a link with an
// apersand in while inside of an HTML page have that '&' converted to
// '&amp;'.
$escapeAmpInLinks = 1;

//
// $connectTimeoutLimit allows the limiting the amount of time cURL will
// wait to successfully connect to a remote server.  Use with caution,
// a value too small will cause all connections to fail.
//$connectTimeoutLimit = 30;

//
// $hideErrors: This will prevent all error messages from being displayed.
// CAUTION enabling this will cause rss2html.php to fail silently with
// no indication to why there was no output
// $hideErrors = 1;

// ==========================================================================
// Below this point of the file there are no user editable options.  Your
// are welcome to make any modifications that you wish to any of the code
// below, but that is not necessary for normal use.
// ==========================================================================

// $Log: rss2html.php,v $
// Revision 3.15  2010/03/16 22:31:38  housley
// Fix for PHP 5.3
//
// Revision 3.14  2009/11/23 02:05:12  housley
// Switch to explode() since PHP 5.3.0 made split() decrepit
//
// Revision 3.13  2008/10/18 12:52:36  housley
// Update useragent so feedburner won't detect and change functionality
// for us
//
// Revision 3.12  2008/05/14 00:45:46  housley
// Fix for negative MAXITEMS greater then the number of items
//
// Revision 3.11  2007/09/30 15:23:23  housley
// Check for the existance of fsockopen()
//
// Revision 3.10  2007/07/16 16:48:48  housley
// On some systems the exit statements in here was terminating all PHP
// processing.
//
// Revision 3.9  2007/07/16 13:06:37  housley
// Add ~~~NumberOfFeedItems~~~ to allow access to the number of items that
// will be processed for display.
//
// Revision 3.8  2007/07/08 13:42:39  housley
// Create my own version of fopen() to try and get files when cURL is not
// available.  FeedForAll_fopen() is based on just connecting to the server
// and reading the results.
//
// Revision 3.7  2007/06/25 13:55:10  housley
// Fix mistake where ?buildURL would falsely say a file could be opened,
// when in reality it could not be opened
//
// Revision 3.6  2007/06/05 13:39:38  housley
// Enable access to output caching in rss2html.php
//
// Revision 3.5  2007/05/27 14:32:05  housley
// Add a debug message when switching to fopen() because curl_init() does
// not exist
//
// Revision 3.4  2007/05/04 11:54:19  housley
// When checking for caching, check a function only in the caching module
//
// Revision 3.3  2007/05/03 18:52:16  housley
// Fix typo in debug statement
//
// Revision 3.2  2007/05/03 16:14:07  housley
// * It seems the XML parser doesn't like most of the HTML entities, process them by hand
// * The check to display errors was backwards
//
// Revision 3.1  2007/04/24 11:36:09  housley
// Fix an error that prevented using PHP includes to display more then one
// feed on a page
//
// Revision 3.0  2007/04/16 14:23:03  housley
// Release version 3.0 of the scripts
//
// Revision 2.76  2007/04/13 18:30:10  housley
// * Atom:content might need whole string so always make it available
// * atom:content of type xhtml is in a div that needs to be stripped and
//   then used as is.
//
// Revision 2.75  2007/04/11 19:59:43  housley
// Add an option to hide error messages
//
// Revision 2.74  2007/04/11 18:38:08  housley
// Update the user agent to be 3.0
//
// Revision 2.73  2007/04/11 12:13:12  housley
// * Fix the code to limit the number of items
// * Add some debug messages
//
// Revision 2.72  2007/04/11 10:40:38  housley
// Add some debug messages
//
// Revision 2.71  2007/04/10 17:16:45  housley
// Allow the input caching to be set during buildURL, only for one PHP include
// type
//
// Revision 2.70  2007/04/10 15:19:28  housley
// Allow for the caching for the HTML output of rss2html.php
//
// Revision 2.69  2007/04/04 20:55:46  housley
// Add the ability to set CURLOPT_CONNECTTIMEOUT
//
// Revision 2.68  2007/03/30 13:18:33  housley
// Use getArrayOfFields() and getValueOf() to simplfy tag replacement, except
// where special processing needs to be done
//
// Revision 2.67  2007/03/05 18:23:58  housley
// Don't abort processing on XML parse error, just don't do anything else
//
// Revision 2.66  2007/03/05 01:33:44  housley
// Use a command convert and readFile routines
//
// Revision 2.65  2007/03/05 01:19:45  housley
// Rename FeedForAll_rss2html_readFile() to FeedForAll_scripts_readFile()
//
// Revision 2.64  2007/03/04 13:41:53  housley
// * Pass the parsing mode to the item class
// * Cleanup the feed level processing
// * rss2html uses the separate parser too
//
// Revision 2.63  2007/03/03 21:10:09  housley
// * Make the item a full class object
// * Support parsing the iTunes(R) extension
//
// Revision 2.62  2007/02/26 00:33:53  housley
// Fix assignment in comparison
//
// Revision 2.61  2007/02/14 01:05:52  housley
// Add the option of encoding the '#' in URLs in some conditions
//
// Revision 2.60  2007/01/26 14:08:46  housley
// Show a better method to change timezone
//
// Revision 2.59  2007/01/04 19:01:51  housley
// Parse the new rssMesh.php fields:
//
// <rssMesh:feedImageTitle> => ~~~ItemRssMeshFeedImageTitle~~~
// <rssMesh:feedImageUrl> =>  ~~~ItemRssMeshFeedImageUrl~~~
// <rssMesh:feedImageLink> =>  ~~~ItemRssMeshFeedImageLink~~~
// <rssMesh:feedImageDescription> =>  ~~~ItemRssMeshFeedImageDescription~~~
// <rssMesh:feedImageHeight> =>  ~~~ItemRssMeshFeedImageHeight~~~
// <rssMesh:feedImageWidth> =>  ~~~ItemRssMeshFeedImageWidth~~~
//
// Revision 2.58  2006/12/22 16:30:21  housley
// Add a check to see if cURL is allowed to follow redirects
//
// Revision 2.57  2006/11/06 14:59:22  housley
// Minor text changes in buildURL
//
// Revision 2.56  2006/11/06 14:39:24  housley
// Create a new method of including rss2html.php that will work on servers
// with remote URL restrictions (allow_url_fopen) that many ISPs are currently
// using.
//
// Revision 2.55  2006/10/17 16:05:05  housley
// Since some of the newer versions of the XML parser look at the encoding
// in the feed and ignore the one passed in on the call, change the encoding
// in the feed before parsing.
//
// Revision 2.54  2006/09/29 19:50:33  housley
// Add a function to convert & in a certian RSS fields to &amp;, so it will be proper HTML
//
// Revision 2.53  2006/09/22 20:21:55  housley
// Fix the problem of displaying an invalid date with an odd number of items
//
// Revision 2.51  2006/09/04 12:33:17  housley
// Exit after a parser error.  The parser stopped, so should we.
//
// Revision 2.50  2006/08/29 18:58:38  housley
// Changes to handle when there are not string conversion modules
//
// Revision 2.49  2006/08/25 15:09:22  housley
// Add hooks for a new feature in rss2html-pro
//
// Revision 2.48  2006/08/25 11:36:37  housley
// * Add the capability to change the character set that feeds are converted to
// * Allow specifying the encoding to use for feeds that don't specify the encoding
//
// Revision 2.46  2006/08/24 20:23:56  housley
// Over come a well meaning, but very misguided ISP removing file:// from
// all scripts.  Not only did the remove it in a place that was doing good,
// it was extremely simple to bypass.
//
// Revision 2.45  2006/08/21 20:19:32  housley
// Use special routines so that rss2html-pro will work with RSS fields that
// have quotes in them.
//
// Revision 2.43  2006/08/18 23:42:16  housley
// Add hooks for rss2html-pro post processing
//
// Revision 2.42  2006/08/11 17:15:45  housley
// Add the ability to restrict the use of the rss2html.php script.
//
// Revision 2.41  2006/08/09 23:57:35  housley
// If <?xml ... is missing add it
//
// Revision 2.40  2006/08/09 15:32:58  housley
// If mb_string_convert fails, try iconv
//
// Revision 2.39  2006/08/04 19:59:02  housley
// Assuming 0xa9 is (c) was bad
//
// Revision 2.38  2006/08/03 11:06:45  housley
// * Don't change the encoding string in the header
// * Give access to the first category in a feed
//
// Revision 2.37  2006/07/29 14:29:40  housley
// Add support for <category> in items.  If there are more then one <category>
// element, only the first is accessable.  The 2 new tags are
// ~~~ItemCategory~~~ and ~~~ItemCategoryDomain~~~
//
// Revision 2.36  2006/07/29 13:19:23  housley
// Trim any leading BOM because some PHP5 installations have problems if it
// is there.
//
// Revision 2.35  2006/07/27 00:27:03  housley
// * Add support for <source> and <comments> in <item>
// * Add support for <rssMesh:extra>
//
// Revision 2.34  2006/07/21 12:23:36  housley
// * If there is no encoding, default to ISO-8859-1
// * Modify the XML to show the encoding we used
//
// Revision 2.33  2006/07/16 10:33:23  housley
// Force $useFopenURL if cURL is not installed
//
// Revision 2.32  2006/07/13 17:05:08  housley
// Remove space that causes problems
//
// Revision 2.31  2006/07/12 12:48:27  housley
// Try the iconv() conversion option if mb_string_encode() doesn't exist
//
// Revision 2.30  2006/05/28 17:52:10  housley
// Handle no encoding specified in the feed
//
// Revision 2.29  2006/05/28 17:51:28  housley
// Allow displaying of the Creative Commons License URL
//
// Revision 2.28  2006/05/28 14:21:47  housley
// Add additional capabilities to work with enclosures.  The 3 new fields are 
// ~~~ItemEnclosureType~~~, ~~~ItemEnclosureLength~~~ and ~~~ItemEnclosureLengthFormatted~~~
//
// Revision 2.27  2006/05/27 19:27:45  housley
// * Show a more universal TZ offset example
// * Make setting contentEncoded more robust
//
// Revision 2.26  2006/04/08 23:17:22  housley
// A "%" should not be encoded to "%2525", but to "%25"
//
// Revision 2.25  2006/04/08 23:16:17  housley
// Indicate that this is the last parse of XML
//
// Revision 2.24  2006/03/23 12:10:30  housley
// Add a simple way to change the timezone of produced times and dates
//
// Revision 2.23  2006/03/10 14:21:04  housley
// Update the licenses
//
// Revision 2.22  2006/03/06 15:01:57  housley
// Trim white space before and after the XML
//
// Revision 2.21  2006/03/05 15:15:11  housley
// Rename rss2html_CachingExtension.php to FeedForAll_Scripts_CachingExtension.php
//
// Revision 2.20  2006/03/05 14:43:59  housley
// Fix the testing for the character set conversion function
//
// Revision 2.19  2006/02/28 02:00:04  housley
// Add support for ~~~FeedXMLFilename~~~
//
// Revision 2.18  2006/02/26 15:24:15  housley
// Add the capability to limit the length of feed and item titles and descriptions
//
// Revision 2.17  2006/02/13 18:00:27  housley
// Fix the initialization of the item arrays
//
// Revision 2.16  2006/02/12 14:43:18  housley
// If possible convert the feed to UTF-8, for uniformity
//
// Revision 2.15  2006/02/12 00:21:13  housley
// Fix the offsetting of the time
//
// Revision 2.14  2006/01/26 15:52:37  housley
// Fix the error message for opening a feed, it was displaying the template filename.
//
// Revision 2.13  2006/01/08 23:25:44  housley
// Move all user configuration options at the top of the file to make them
// easier to find
//
// Revision 2.12  2005/12/12 16:27:26  housley
// Add an interface to allow FeedForAll_scripts_readFile() to be replaced
// by one that does caching of the XML files
//
// Revision 2.11  2005/12/09 19:08:26  housley
// Remove the first "banner" since IE barfs
//
// Revision 2.10  2005/10/22 18:51:47  housley
// Improve the formatting
//
// Revision 2.9  2005/10/22 14:27:57  housley
// Fix label in buildURL
//
// Revision 2.8  2005/10/22 14:20:31  housley
// Add buildURL to assist in creating properly encoded links.  Show proper
// include methods and contents of the files.
//
// Revision 2.7  2005/10/16 17:54:10  housley
// Improvements when using CURL:
// - Use the requested file as the REFERER, for sites that might require one
// - Allow to follow up to 10 redirects, some sites redirect to real content
//
// Revision 2.6  2005/10/16 17:32:27  housley
// Use lastBuildDate as another possible source if pubDate is empty at the
// <channel> level.
//
// Revision 2.5  2005/09/28 02:08:15  housley
// Fix the storage of pubDate at the feed level
//
// Revision 2.4  2005/09/12 18:56:31  housley
// Set a user agent for both fopen and curl transerfers
//
// Revision 2.3  2005/09/06 22:55:27  housley
// GUID doesn't need urlencode()
//
// Revision 2.2  2005/08/16 19:53:15  housley
// Add the ~~~ItemAuthor~~~ subsitution that uses first <author> and then
// <dc:creator> for its contents
//
// Revision 2.1  2005/08/15 14:49:24  housley
// Convert &apos; to ' since &apos; is not HTML
//
// Revision 2.0  2005/07/30 14:09:38  housley
// Allow "allow_url_fopen" to be sellected, incase CURL is not available.
//
//

//
// If using cURL, make sure it exists
if (($useFopenURL == 0) && !function_exists("curl_init")) {
  $useFopenURL = -1;
  if (isset($debugLevel) && ($debugLevel >= 3)) {
    echo "DIAG: setting \$useFopenURL=-1 because curl_init() doesn't exist<br>\n";
  }
}

if (($useFopenURL == -1) && !function_exists("fsockopen")) {
  $useFopenURL = 1;
  if (isset($debugLevel) && ($debugLevel >= 3)) {
    echo "DIAG: setting \$useFopenURL=1 because fsockopen() doesn't exist<br>\n";
  }
}

if ($useFopenURL == 1) {
  ini_set("allow_url_fopen", "1");
  ini_set("user_agent", "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.0.1;) Gecko/2008070208 Firefox/3.0.1");
}

$FeedMaxItems = 10000;
$NoFutureItems = FALSE;

@include("FeedForAll_rss2html_pro.php");

if (function_exists("FeedForAll_rss2html_pro") === FALSE) {
  Function FeedForAll_rss2html_pro($source) {
    //
    // This is the place to do any processing that is desired
    return $source;
  }
}

if (function_exists("FeedForAll_parseExtensions") === FALSE) {
  Function FeedForAll_parseExtensions() {
    return FALSE;
  }
}

@include("FeedForAll_Scripts_CachingExtension.php");

@include_once("FeedForAll_XMLParser.inc.php");

if (function_exists("FeedForAll_rss2html_limitLength") === FALSE) {
  Function FeedForAll_rss2html_limitLength($initialValue, $limit = 0) {
    if (($limit == 0) || (strlen($initialValue) <= $limit )) {
      // ZERO is for not limited
      return $initialValue;
    }

    // Cut the text at the exact point, ignoring if it is in a word.
    $result = substr($initialValue, 0, $limit);

    // Check to see if there are any space we can trim at and if it is not
    // too far from where we are
    $lastSpace = strrchr($result,' ');
    if (($lastSpace !== FALSE) && (strlen($lastSpace) < 20)) {
      // lose any incomplete word at the end
      $result = substr($result, 0, -(strlen($lastSpace)));

      // Append elipses, ... , to show it was truncated
      $result .= " ...";
    }

    return $result;
  }
}

if (function_exists("FeedForAll_rss2html_sizeToString") === FALSE) {
  Function FeedForAll_rss2html_sizeToString($filesize) {
    if ($filesize == "") {
      return "";
    }
    elseif ($filesize >= 1073741824) {
      return number_format($filesize/1073741824, 1, ".", ",")." GBytes";
    }
    elseif ($filesize >= 1048576) {
      return number_format($filesize/1048576, 1, ".", ",")." MBytes";
    }
    elseif ($filesize >= 1024) {
      return number_format($filesize/1024, 1, ".", ",")." KBytes";
    }
    else {
      return $filesize." Bytes";
    }
  }
}

if (function_exists("FeedForAll_rss2html_isTemplate") === FALSE) {
  Function FeedForAll_rss2html_isTemplate($templateData) {
    if ((strstr($templateData, "~~~Feed") !== FALSE) || (strstr($templateData, "~~~Item") !== FALSE)) {
      return TRUE;
    }
    return FALSE;
  }
}

if (function_exists("FeedForAll_rss2html_validExtension") === FALSE) {
  Function FeedForAll_rss2html_validExtension($filename, $extensions) {
    $foundValid = FALSE;
    foreach ($extensions as $value) {
      if (strtolower($value) == strtolower(substr($filename, -strlen($value)))) {
        $foundValid = TRUE;
        break;
      }
    }
    return $foundValid;
  }
}

if (function_exists("FeedForAll_rss2html_str_replace") === FALSE) {
  Function FeedForAll_rss2html_str_replace($search, $replace, $subject) {
    return str_replace($search, $replace, $subject);
  }
}

if (function_exists("FeedForAll_rss2html_encodeURL") === FALSE) {
  Function FeedForAll_rss2html_encodeURL($URLstring, $includePND = 0) {
    $result = "";
    for ($x = 0; $x < strlen($URLstring); $x++) {
      if ($URLstring[$x] == '%') {
        $result = $result."%25";
      }
      elseif ($URLstring[$x] == '?') {
        $result = $result."%3f";
      }
      elseif ($URLstring[$x] == '&') {
        $result = $result."%26";
      }
      elseif ($URLstring[$x] == '=') {
        $result = $result."%3d";
      }
      elseif ($URLstring[$x] == '+') {
        $result = $result."%2b";
      }
      elseif ($URLstring[$x] == ' ') {
        $result = $result."%20";
      }
      elseif ($includePND && ($URLstring[$x] == '#')) {
        $result = $result."%23";
      }else {
        $result = $result.$URLstring[$x];
      }
    }
    return $result;
  }
}

if (function_exists("FeedForAll_rss2html_CreateUniqueLink") === FALSE) {
  Function FeedForAll_rss2html_CreateUniqueLink($title, $description, $link, $guid, $XMLfilename, $itemTemplate) {
    GLOBAL $TEMPLATEfilename;
    $match = Array();
    
    while (preg_match("/~~~ItemUniqueLinkWithTemplate=.*~~~/", $itemTemplate, $match) !== FALSE) {
      if ((count($match) == 0) || ($match[0] == "")) {
        // All done
        return $itemTemplate;
      }
      
      $replace = "http://$_SERVER[SERVER_NAME]$_SERVER[SCRIPT_NAME]?XMLFILE=".FeedForAll_rss2html_encodeURL($XMLfilename)."&amp;TEMPLATE=".FeedForAll_rss2html_encodeURL($TEMPLATEfilename);
      $itemTemplate = FeedForAll_rss2html_str_replace($match[0], $replace, $itemTemplate);
    }
    if ($title);
    if ($description);
    if ($link);
    if ($guid);
    return $itemTemplate;
  }
}

if (function_exists("FeedForAll_rss2html_UseUniqueLink") === FALSE) {
  Function FeedForAll_rss2html_UseUniqueLink($title, $description, $link, $guid) {
    if ($title);
    if ($description);
    if ($link);
    if ($guid);
    return -1;
  }
}

if (function_exists("FeedForAll_rss2html_EscapeLink") === FALSE) {
  Function FeedForAll_rss2html_EscapeLink($link) {
    GLOBAL $escapeAmpInLinks;
    
    if ((strstr($link, "://") !== FALSE) && $escapeAmpInLinks) {
      // In HTML a link with an & must be converted to &amp;
      // And for here without :// it is not a link, since relative
      // URLs are not allowed
      $link = str_replace("&", "&amp;", $link);
    }
    return $link;
  }
}

if (function_exists("FeedForAll_rss2html_AddIdentity") === FALSE) {
  Function FeedForAll_rss2html_AddIdentity($itemString) {
    return "<!-- HTML generated from an RSS Feed by rss2html.php, http://www.FeedForAll.com/ a NotePage, Inc. product (http://www.notepage.com/) -->".$itemString;
  }
}

if (!isset($_REQUEST["buildURL"])) {
  //
  // Check variables that could be used if URL wrapper are disable or not working
  if (isset($GLOBALS["XMLFILE"])) {
    $XMLfilename = $GLOBALS["XMLFILE"];
  }
  if (isset($GLOBALS["TEMPLATE"])) {
    $TEMPLATEfilename = $GLOBALS["TEMPLATE"];
  }
  if (isset($GLOBALS["FeedTitleLength"])) {
    $limitFeedTitleLength = abs($GLOBALS["FeedTitleLength"]);
  }
  if (isset($GLOBALS["FeedDescriptionLength"])) {
    $limitFeedDescriptionLength = abs($GLOBALS["FeedDescriptionLength"]);
  }
  if (isset($GLOBALS["ItemTitleLength"])) {
    $limitItemTitleLength = abs($GLOBALS["ItemTitleLength"]);
  }
  if (isset($GLOBALS["ItemDescriptionLength"])) {
    $limitItemDescriptionLength = abs($GLOBALS["ItemDescriptionLength"]);
  }
  if (isset($GLOBALS["MAXITEMS"])) {
    $FeedMaxItems = $GLOBALS["MAXITEMS"];
  }
  if (isset($GLOBALS["NOFUTUREITEMS"])) {
    $NoFutureItems = TRUE;
  }

  
  if (isset($_REQUEST["XMLFILE"])) {
    if (stristr($_REQUEST["XMLFILE"], "file"."://")) {
      // Not allowed
      ;
    }
    elseif (stristr($_REQUEST["XMLFILE"], "://")) {
      if ($fileAccessLevel == -1) {
        echo "Configuration setting prohibit using remote files, exiting\n";
        return;
      } else {
        // URL files are allowed
        $XMLfilename = $_REQUEST["XMLFILE"];
      }
    } else {
      if (($fileAccessLevel == 1) || ($fileAccessLevel == -1)) {
        if (FeedForAll_rss2html_validExtension(basename($_REQUEST["XMLFILE"]), $allowedFeedExtensions) === FALSE) {
          echo "Configuration setting prohibit using the specified feed file, exiting\n";
          return;
        }
        $XMLfilename = basename($_REQUEST["XMLFILE"]);
      }
      elseif ($fileAccessLevel == 2) {
        echo "Configuration setting prohibit using local files, exiting\n";
        return;
      } else {
        // It is local and must be in the same directory
        $XMLfilename = basename($_REQUEST["XMLFILE"]);
      }
    }
  }

  if (isset($_REQUEST["TEMPLATE"])) {
    if (stristr($_REQUEST["TEMPLATE"], "file"."://")) {
      // Not allowed
      ;
    }
    elseif (stristr($_REQUEST["TEMPLATE"], "://")) {
      if ($fileAccessLevel == -1) {
        echo "Configuration setting prohibit using remote files, exiting\n";
        return;
      } else {
        // URL files are allowed
        $TEMPLATEfilename = $_REQUEST["TEMPLATE"];
      }
    } else {
      if (($fileAccessLevel == 1) || ($fileAccessLevel == -1)) {
        if (FeedForAll_rss2html_validExtension(basename($_REQUEST["TEMPLATE"]), $allowedTemplateExtensions) === FALSE) {
          echo "Configuration setting prohibit using the specified template file, exiting\n";
          return;
        }
        $TEMPLATEfilename = basename($_REQUEST["TEMPLATE"]);
      }
      elseif ($fileAccessLevel == 2) {
        echo "Configuration setting prohibit using local files, exiting\n";
        return;
      } else {
        // It is local and must be in the same directory
        $TEMPLATEfilename = basename($_REQUEST["TEMPLATE"]);
      }
    }
  }

  if (isset($_REQUEST["FeedTitleLength"])) {
    $limitFeedTitleLength = abs($_REQUEST["FeedTitleLength"]);
  }
  if (isset($_REQUEST["FeedDescriptionLength"])) {
    $limitFeedDescriptionLength = abs($_REQUEST["FeedDescriptionLength"]);
  }
  if (isset($_REQUEST["ItemTitleLength"])) {
    $limitItemTitleLength = abs($_REQUEST["ItemTitleLength"]);
  }
  if (isset($_REQUEST["ItemDescriptionLength"])) {
    $limitItemDescriptionLength = abs($_REQUEST["ItemDescriptionLength"]);
  }

  //
  // Maximum number of items to be displayed
  //
  if (isset($_REQUEST["MAXITEMS"])) {
    $FeedMaxItems = $_REQUEST["MAXITEMS"];
  }
  if (isset($_REQUEST["NOFUTUREITEMS"])) {
    $NoFutureItems = TRUE;
  }

  if (isset($outputCacheTTL) && function_exists("FeedForAll_scripts_readOutputCacheFile") && (($cacheContents = FeedForAll_scripts_readOutputCacheFile($XMLfilename, $TEMPLATEfilename)) !== FALSE)) {
    if (!headers_sent()) {
      // Send the Content-Type to force $destinationEncoding
      header("Content-Type: text/html; charset=$destinationEncoding");
    }
    echo $cacheContents;
  } else {
    if (($template = FeedForAll_scripts_readFile($TEMPLATEfilename, $useFopenURL)) === FALSE) {
      if (!isset($hideErrors)) {
        if ($ReadErrorString == "") {
          echo "Unable to open template $TEMPLATEfilename, exiting\n";
        } else {
          echo "Unable to open template $TEMPLATEfilename with error <b>$ReadErrorString</b>, exiting\n";
        }
      }
      return;
    }
    if (FeedForAll_rss2html_isTemplate($template) === FALSE) {
      if (!isset($hideErrors)) {
        echo "$TEMPLATEfilename is not a valid rss2html.php template file, exiting\n";
      }
      return;
    }

    if (strstr($template, "~~~NoFutureItems~~~")) {
      $NoFutureItems = TRUE;
    }

    if (($XML = FeedForAll_scripts_readFile($XMLfilename, $useFopenURL, $allowCachingXMLFiles)) === FALSE) {
      if (!isset($hideErrors)) {
        if ($ReadErrorString == "") {
          echo "Unable to open RSS Feed $XMLfilename, exiting\n";
        } else {
          echo "Unable to open RSS Feed $XMLfilename with error <b>$ReadErrorString</b>, exiting\n";
        }
      }
      return;
    }

    if (strstr(trim($XML), "<?xml") === FALSE) {
      $XML = "<?xml version=\"1.0\"?>\n$XML";
    }
    $XML = strstr(trim($XML), "<?xml");
    $XML = FeedForAll_preProcessXML($XML);
    if (($convertedXML = FeedForAll_scripts_convertEncoding($XML, $missingEncodingDefault, $destinationEncoding)) === FALSE) {
      // Conversions failed, probably becasue it was wrong or the routines were missing
      $convertedXML = $XML;
      $xml_parser = xml_parser_create();
    } else {
      $xml_parser = xml_parser_create($destinationEncoding);
    }

    $rss_parser = new baseParserClass("rss2html");
    $rss_parser->noFutureItems = $NoFutureItems;
    $rss_parser->wholeString = $convertedXML;
    xml_set_object($xml_parser, $rss_parser);
    xml_set_element_handler($xml_parser, "startElement", "endElement");
    xml_set_character_data_handler($xml_parser, "characterData");
    xml_parser_set_option($xml_parser, XML_OPTION_CASE_FOLDING,1);
    $parseResult = xml_parse($xml_parser, $convertedXML, TRUE);
    if ($parseResult == 0) {
      if (!isset($hideErrors)) {
        $errorCode = xml_get_error_code($xml_parser);
        echo "\$errorCode = $errorCode<br>\n";
        echo "xml_error_string() = ".xml_error_string($errorCode)."<br>\n";
        echo "xml_get_current_line_number() = ".xml_get_current_line_number($xml_parser)."<br>\n";
        echo "xml_get_current_column_number() = ".xml_get_current_column_number($xml_parser)."<br>\n";
        echo "xml_get_current_byte_index() = ".xml_get_current_byte_index($xml_parser)."<br>\n";
      }
    } else {
      xml_parser_free($xml_parser);

      // make sure the channel contentEncoded is not blank
      if ($rss_parser->FeedContentEncoded == "") {
        $rss_parser->FeedContentEncoded = $rss_parser->FeedDescription;
      }
      $template = FeedForAll_rss2html_str_replace("~~~FeedXMLFilename~~~", FeedForAll_rss2html_EscapeLink($XMLfilename), $template);
      $template = FeedForAll_rss2html_str_replace("~~~FeedTitle~~~", FeedForAll_rss2html_limitLength($rss_parser->FeedTitle, $limitFeedTitleLength), $template);
      $template = FeedForAll_rss2html_str_replace("~~~FeedDescription~~~", FeedForAll_rss2html_limitLength($rss_parser->FeedDescription, $limitFeedDescriptionLength), $template);
      $template = FeedForAll_rss2html_str_replace("~~~FeedContentEncoded~~~", $rss_parser->FeedContentEncoded, $template);
      $template = FeedForAll_rss2html_str_replace("~~~FeedLink~~~", FeedForAll_rss2html_EscapeLink($rss_parser->FeedLink), $template);
      $template = FeedForAll_rss2html_str_replace("~~~FeedPubDate~~~", $rss_parser->FeedPubDate, $template);
      $template = FeedForAll_rss2html_str_replace("~~~FeedPubLongDate~~~", date($LongDateFormat, $rss_parser->FeedPubDate_t), $template);
      $template = FeedForAll_rss2html_str_replace("~~~FeedPubShortDate~~~", date($ShortDateFormat, $rss_parser->FeedPubDate_t), $template);
      $template = FeedForAll_rss2html_str_replace("~~~FeedPubLongTime~~~", date($LongTimeFormat, $rss_parser->FeedPubDate_t), $template);
      $template = FeedForAll_rss2html_str_replace("~~~FeedPubShortTime~~~", date($ShortTimeFormat, $rss_parser->FeedPubDate_t), $template);
      $template = FeedForAll_rss2html_str_replace("~~~FeedImageUrl~~~", FeedForAll_rss2html_EscapeLink($rss_parser->FeedImageURL), $template);
      $template = FeedForAll_rss2html_str_replace("~~~FeedImageTitle~~~", $rss_parser->FeedImageTitle, $template);
      $template = FeedForAll_rss2html_str_replace("~~~FeedImageLink~~~", FeedForAll_rss2html_EscapeLink($rss_parser->FeedImageLink), $template);
      $template = FeedForAll_rss2html_str_replace("~~~FeedImageDescription~~~", $rss_parser->FeedImageDescription, $template);
      $template = FeedForAll_rss2html_str_replace("~~~FeedImageHeight~~~", $rss_parser->FeedImageWidth, $template);
      $template = FeedForAll_rss2html_str_replace("~~~FeedImageWidth~~~", $rss_parser->FeedImageWidth, $template);
      $template = FeedForAll_rss2html_str_replace("~~~FeedCreativeCommons~~~", FeedForAll_rss2html_EscapeLink($rss_parser->FeedCreativeCommons), $template);
      if (FeedForAll_parseExtensions() === TRUE) {
        $template = FeedForAll_parseExtensions_replaceInChannel($rss_parser, $template);
      }

      $match = NULL;

      $template = str_replace("~~~NoFutureItems~~~", "", $template);

      //
      // Sort by PubDate if requested
      if (strstr($template, "~~~SortByPubDate~~~")) {
        $template = str_replace("~~~SortByPubDate~~~", "", $template);

        for ($x = 0; $x < count($rss_parser->Items)-1; $x++) {
          for ($y = $x+1; $y < count($rss_parser->Items); $y++) {
            if ($rss_parser->Items[$x]->pubDate_t < $rss_parser->Items[$y]->pubDate_t) {
              // Swap them
              $swapTemp = $rss_parser->Items[$x]; $rss_parser->Items[$x] = $rss_parser->Items[$y]; $rss_parser->Items[$y] = $swapTemp;
            }
          }
        }
      }

      if (isset($debugLevel) && ($debugLevel >= 3)) {
        echo "DIAG: adding to items, count=".count($rss_parser->Items)."<br>\n";
      }
      
      // The the maximum items requested
      if (strstr($template, "~~~FeedMaxItems=")) {
        // Limit the maximun number of items displayed
        if (preg_match("/~~~FeedMaxItems=([0-9-]*)~~~/", $template, $match) !== FALSE) {
          if (($match[0] != "") && ($match[1] != "")) {
            $FeedMaxItems = $match[1];
            $template = str_replace("~~~FeedMaxItems=$match[1]~~~", "", $template);
          }
        }
      }
      if (abs($FeedMaxItems) > count($rss_parser->Items)) {
        if ($FeedMaxItems > 0) {
          $FeedMaxItems = count($rss_parser->Items);
        } else {
          $FeedMaxItems = -count($rss_parser->Items);
        }
      }

      if (!function_exists("FeedForALL_rss2html_replaceInItem")) {
        Function FeedForALL_rss2html_replaceInItem($source, $currentItem) {
          GLOBAL $limitFeedTitleLength;
          GLOBAL $limitFeedDescriptionLength;
          GLOBAL $limitItemTitleLength;
          GLOBAL $limitItemDescriptionLength;
          GLOBAL $LongDateFormat;
          GLOBAL $ShortDateFormat;
          GLOBAL $LongTimeFormat;
          GLOBAL $ShortTimeFormat;
          GLOBAL $XMLfilename;

          $item = FeedForAll_rss2html_str_replace("~~~ItemTitle~~~", FeedForAll_rss2html_limitLength($currentItem->title, $limitItemTitleLength), $source);
          $item = FeedForAll_rss2html_str_replace("~~~ItemDescription~~~", FeedForAll_rss2html_limitLength($currentItem->description, $limitItemDescriptionLength), $item);
          $item = FeedForAll_rss2html_str_replace("~~~ItemEnclosureLengthFormatted~~~", FeedForAll_rss2html_sizeToString($currentItem->enclosureLength), $item);
          $item = FeedForAll_rss2html_str_replace("~~~ItemPubLongDate~~~", date($LongDateFormat, $currentItem->pubDate_t), $item);
          $item = FeedForAll_rss2html_str_replace("~~~ItemPubShortDate~~~", date($ShortDateFormat, $currentItem->pubDate_t), $item);
          $item = FeedForAll_rss2html_str_replace("~~~ItemPubLongTime~~~", date($LongTimeFormat, $currentItem->pubDate_t), $item);
          $item = FeedForAll_rss2html_str_replace("~~~ItemPubShortTime~~~", date($ShortTimeFormat, $currentItem->pubDate_t), $item);

          $knownFields = $currentItem->getArrayOfFields();
          foreach ($knownFields as $field) {
            $item = FeedForAll_rss2html_str_replace($field, $currentItem->getValueOf($field), $item);
          }

          $item = FeedForAll_rss2html_CreateUniqueLink($currentItem->title, $currentItem->description, $currentItem->link, $currentItem->guid, $XMLfilename, $item);
          if (FeedForAll_parseExtensions() === TRUE) {
            $item = FeedForAll_parseExtensions_replaceInItem($currentItem, $item);
          }
          return FeedForAll_rss2html_AddIdentity($item);
        }
      }

      //
      // Allow access to the number of times that will be processed in the feed
      $template = FeedForAll_rss2html_str_replace("~~~NumberOfFeedItems~~~", min(abs($FeedMaxItems), count($rss_parser->Items)), $template);

      //
      // Find the string, if it exists, between the ~~~EndItemsRecord~~~ and ~~~BeginItemsRecord~~~
      //
      while ((strstr($template, "~~~BeginItemsRecord~~~")) !== FALSE) {
        $match = NULL;
        $allitems = NULL;
        $loop_limit = min(abs($FeedMaxItems), count($rss_parser->Items));
        if (($parts = explode("~~~BeginItemsRecord~~~", $template)) !== FALSE) {
          if (($parts = explode("~~~EndItemsRecord~~~", $parts[1])) !== FALSE) {
            $WholeBlock = $parts[0];
            //
            // Check for ~~~BeginAlternateItemsRecord~~~
            //
            if (strstr($WholeBlock, "~~~BeginAlternateItemsRecord~~~")) {
              $parts = explode("~~~BeginAlternateItemsRecord~~~", $WholeBlock);
              $block1 = $parts[0];
              $block2 = $parts[1];
            } else {
              $block1 = $WholeBlock;
              $block2 = $WholeBlock;
            }
            if ($FeedMaxItems < 0) {
              for ($x = count($rss_parser->Items)-1; $x >= count($rss_parser->Items) + $FeedMaxItems; $x--) {
                $allitems .= FeedForALL_rss2html_replaceInItem($block1, $rss_parser->Items[$x]);
                $x--;
                if ($x >= count($rss_parser->Items) + $FeedMaxItems) {
                  //
                  // This is at least one more item so use the Alternate definition
                  //
                  $allitems .= FeedForALL_rss2html_replaceInItem($block2, $rss_parser->Items[$x]);
                }
              }
            } else {
              for ($x = 0; $x < $loop_limit; $x++) {
                if (isset($debugLevel) && ($debugLevel >= 2)) {
                  echo "DIAG: Doing item fillin, \$x = $x; \$loop_limit = $loop_limit<br>\n";
                }

                $allitems .= FeedForALL_rss2html_replaceInItem($block1, $rss_parser->Items[$x]);
                $x++;
                if ($x < $loop_limit) {
                  //
                  // This is at least one more item so use the Alternate definition
                  //
                  if (isset($debugLevel) && ($debugLevel >= 2)) {
                    echo "DIAG: Doing item fillin, \$x = $x; \$loop_limit = $loop_limit<br>\n";
                  }

                  $allitems .= FeedForALL_rss2html_replaceInItem($block2, $rss_parser->Items[$x]);
                }
              }
            }
            $template = str_replace("~~~BeginItemsRecord~~~".$WholeBlock."~~~EndItemsRecord~~~", $allitems, $template);
          }
        }
      }

      // Since &apos; is not HTML, but is XML convert.
      $template = str_replace("&apos;", "'", $template);

      if (!headers_sent()) {
        // Send the Content-Type to force $destinationEncoding
        header("Content-Type: text/html; charset=$destinationEncoding");
      }
      $resultHTML = FeedForAll_rss2html_pro($template);
      echo $resultHTML;
      if (isset($outputCacheTTL) && function_exists("FeedForAll_scripts_writeOutputCacheFile")) {
        FeedForAll_scripts_writeOutputCacheFile($XMLfilename, $TEMPLATEfilename, $resultHTML);
      }
    }
  }
} else {
  if (!headers_sent()) {
    // Send the Content-Type to force $destinationEncoding
    header("Content-Type: text/html; charset=$destinationEncoding");
  }
  echo "<html><head><title>rss2html.php URL tool</title><meta http-equiv=\"content-type\" content=\"text/html;charset=$destinationEncoding\"></head><body bgcolor=\"#EEEEFF\">\n";
  //
  // We are in "buildURL" mode to help create properly encoded URLs to pass to rss2html.php

  $_xml = "";
  if (isset($_POST["XML"])) {
    $_xml = $_POST["XML"];
  }
  $_template = "";
  if (isset($_POST["TEMPLATE"])) {
    $_template = $_POST["TEMPLATE"];
  }
  $_maxitems = "";
  if (isset($_POST["MAXITEMS"])) {
    $_maxitems = $_POST["MAXITEMS"];
  }
  $_nofutureitems = "";
  if (isset($_POST["NOFUTUREITEMS"])) {
    $_nofutureitems = $_POST["NOFUTUREITEMS"];
  }
  if (function_exists("FeedForAll_scripts_contentOfCache")) {
    $_cacheTTL = "";
    if (isset($_POST["XMLCACHETTL"])) {
      $_cacheTTL = $_POST["XMLCACHETTL"];
    }
    $_allowCachingXMLFiles = "";
    if (isset($_POST["ALLOWXMLCACHE"])) {
      $_allowCachingXMLFiles = $_POST["ALLOWXMLCACHE"];
    }
    $_outputCacheTTL = "";
    if (isset($_POST["OUTCACHETTL"])) {
      $_outputCacheTTL = $_POST["OUTCACHETTL"];
    }
    $_outputCacheFileName = "";
    if (isset($_POST["OUTCACHENAME"])) {
      $_outputCacheFileName = $_POST["OUTCACHENAME"];
    }
  }

  // Display the entry form
  echo "<center><h1>RSS2HTML.PHP LINK TOOL</h1></center>\n";
  echo "<p>To assist with the with the creation of properly encoded URLs for use with rss2html.php this tool has been created.  Fill in the URLs or file paths for both the XML file and your template file in the boxes below and then click &quot;Submit&quot;.  The program will then return the URLs properly encoded in a string that calls rss2html.php.  You can click on this link to test the results.  The program will also indicate if it was unable to open either of the URLs it was given.</p>\n";
  echo "<form action=\"$_SERVER[PHP_SELF]\" method=\"POST\">\n";
  echo "<input type=\"hidden\" name=\"buildURL\" value=\"1\">\n";
  echo "URL for the XML file: (ie. http://www.myserver.com/file.xml)<br><input type=\"text\" name=\"XML\" size=\"100\" value=\"$_xml\"><br>\n";
  echo "URL for the template file: (ie. http://www.myserver.com/template.html)<br><input type=\"text\" name=\"TEMPLATE\" size=\"100\" value=\"$_template\"><br>\n";
  echo "<b>Optional items:</b><br>\n";
  echo "Maximum items: <input type=\"text\" name=\"MAXITEMS\" size=\"5\" value=\"$_maxitems\"> (Use negative numbers for the last X items)<br>\n";
  echo "No future items: <input type=\"checkbox\" name=\"NOFUTUREITEMS\" ";
  if ($_nofutureitems == "on") {
    echo "CHECKED";
  }
  echo "><br>\n";
  if (function_exists("FeedForAll_scripts_contentOfCache")) {
    echo "<table cellpadding=\"2\" cellspacing=\"2\" width=\"100%\" border=\"1\"><tr><td>\n";
    echo "<strong>XML (input) Cache Settings</strong><br>\n";
    echo "Allow Caching of the feed: <input type=\"checkbox\" name=\"ALLOWXMLCACHE\" ";
    if ($_allowCachingXMLFiles == "on") {
      echo "CHECKED";
    }
    echo "><br>\n";
    echo "Cache Time: <input type=\"text\" name=\"XMLCACHETTL\" size=\"5\" value=\"$_cacheTTL\"> (The number of seconds a file may be cached for before being fetched again)<br>\n";
    echo "<hr>\n";
    echo "<strong>HTML (output) Cache Settings</strong><br>\n";
    echo "Output Cache Time: <input type=\"text\" name=\"OUTCACHETTL\" size=\"5\" value=\"$_outputCacheTTL\"> (The number of seconds the output may be cached for before being recreated)<br>\n";
    echo "Output Cache Name: <input type=\"text\" name=\"OUTCACHENAME\" size=\"40\" value=\"$_outputCacheFileName\"> (This should be a unique name to prevent conflicts)<br>\n";
    echo "</td></tr></table>\n";
  }
  echo "<input type=\"submit\" name=\"submit\" value=\"Submit\">\n";
  echo "</form>\n";

  $xmlContents = "";
  $templateContents = "";

  if (isset($_POST["submit"])) {
    if ($_SERVER["REQUEST_METHOD"] != "POST") {
      return;
    }
    echo "<hr>\n";

    $answer = "";
    $answerAlt = "";
    $ssi = "";
    $xmlurl = "";
    $templateurl = "";
    if ((isset($_POST["XML"]) && $_POST["XML"] != "") || (isset($_POST["TEMPLATE"]) && $_POST["TEMPLATE"] != "")) {
      $answer .= "http://$_SERVER[SERVER_NAME]$_SERVER[PHP_SELF]?";
    }
    if (isset($_POST["XML"]) && $_POST["XML"] != "") {
      $answer .= "XMLFILE=".FeedForAll_rss2html_encodeURL($_POST["XML"]);
      $answerAlt .= "\$XMLFILE = \"".str_replace("&", "&amp;", $_POST["XML"])."\";<br>";
      $ssi .= "XMLFILE=".FeedForAll_rss2html_encodeURL($_POST["XML"]);
      $xmlurl = FeedForAll_rss2html_encodeURL($_POST["XML"]);
    }
    if ((isset($_POST["XML"]) && $_POST["XML"] != "") && (isset($_POST["TEMPLATE"]) && $_POST["TEMPLATE"] != "")) {
      $answer .=  "&amp;";
      $ssi .=  "&amp;";
    }
    if (isset($_POST["TEMPLATE"]) && $_POST["TEMPLATE"] != "") {
      $answer .=  "TEMPLATE=".FeedForAll_rss2html_encodeURL($_POST["TEMPLATE"]);
      $answerAlt .= "\$TEMPLATE = \"".str_replace("&", "&amp;", $_POST["TEMPLATE"])."\";<br>";
      $ssi .=  "TEMPLATE=".FeedForAll_rss2html_encodeURL($_POST["TEMPLATE"]);
      $templateurl = FeedForAll_rss2html_encodeURL($_POST["TEMPLATE"]);
    }
    if (isset($_POST["MAXITEMS"]) && $_POST["MAXITEMS"] != "" && intval($_POST["MAXITEMS"] != 0)) {
      $answer .=  "&amp;MAXITEMS=$_POST[MAXITEMS]";
      $answerAlt .= "\$MAXITEMS = \"$_POST[MAXITEMS]\";<br>\n";
      $ssi .=  "&amp;MAXITEMS=$_POST[MAXITEMS]";
    }
    if (isset($_POST["NOFUTUREITEMS"]) && $_POST["NOFUTUREITEMS"] == "on") {
      $answer .=  "&amp;NOFUTUREITEMS=1";
      $answerAlt .= "\$NOFUTUREITEMS = \"1\";<br>\n";
      $ssi .=  "&amp;NOFUTUREITEMS=1";
    }
    if (function_exists("FeedForAll_scripts_contentOfCache")) {
      if (isset($_POST["ALLOWXMLCACHE"]) && $_POST["ALLOWXMLCACHE"] == "on") {
        $answerAlt .= "\$ALLOWXMLCACHE = \"1\";<br>\n";
      }
      if (isset($_POST["XMLCACHETTL"]) && ($_POST["XMLCACHETTL"] != "") && (intval($_POST["XMLCACHETTL"]) != 0)) {
        $answerAlt .= "\$XMLCACHETTL = \"$_POST[XMLCACHETTL]\";<br>\n";
      }
      if (isset($_POST["OUTCACHETTL"]) && isset($_POST["OUTCACHENAME"])) {
        if (($_POST["OUTCACHETTL"] != "") && (intval($_POST["OUTCACHETTL"]) != 0) && ($_POST["OUTCACHENAME"] != "")) {
          $answerAlt .= "\$OUTCACHETTL = \"$_POST[OUTCACHETTL]\";<br>\n";
          $answerAlt .= "\$OUTCACHENAME = \"$_POST[OUTCACHENAME]\";<br>\n";
        }
      }
    }

    echo "<h1>Results</h1>\n";

    if (isset($_POST["XML"]) && $_POST["XML"] != "") {
      $XMLfilename = "";
      if (stristr($_POST["XML"], "file"."://")) {
        // Not allowed
        ;
      }
      elseif (stristr($_POST["XML"], "://")) {
        if ($fileAccessLevel == -1) {
          echo "<p style=\"color: red;\">Configuration setting prohibit using remote files</p>\n";
        } else {
          // URL files are allowed
          $XMLfilename = $_POST["XML"];
        }
      } else {
        if (($fileAccessLevel == 1) || ($fileAccessLevel == -1)) {
          if (FeedForAll_rss2html_validExtension(basename($_POST["XML"]), $allowedFeedExtensions) === FALSE) {
            echo "<p style=\"color: red;\">Configuration setting prohibit using the specified feed file</p>\n";
          } else {
            $XMLfilename = basename($_POST["XML"]);
          }
        }
        elseif ($fileAccessLevel == 2) {
          echo "<p style=\"color: red;\">Configuration setting prohibit using local files</p>\n";
        } else {
          // It is local and must be in the same directory
          $XMLfilename = basename($_POST["XML"]);
        }
      }
      if ($XMLfilename != "") {
        if (($xmlContents = FeedForAll_scripts_readFile($XMLfilename, $useFopenURL)) === FALSE) {
          if ($ReadErrorString == "") {
            echo "<p>The XML file <b>$_POST[XML]</b> could not be opened.</p>\n";
          } else {
            echo "<p>The XML file <b>$_POST[XML]</b> could not be opened with the error <b>$ReadErrorString</b>.</p>\n";
          }
        } else {
          echo "<p>The XML file <b>$_POST[XML]</b> was SUCCESSFULLY opened</p>\n";
        }
      }
    }

    if (isset($_POST["TEMPLATE"]) && $_POST["TEMPLATE"] != "") {
      $TEMPLATEfilename = "";
      if (stristr($_POST["TEMPLATE"], "file"."://")) {
        // Not allowed
        ;
      }
      elseif (stristr($_POST["TEMPLATE"], "://")) {
        if ($fileAccessLevel == -1) {
          echo "<p style=\"color: red;\">Configuration setting prohibit using remote files</p>\n";
        } else {
          // URL files are allowed
          $TEMPLATEfilename = $_POST["TEMPLATE"];
        }
      } else {
        if (($fileAccessLevel == 1) || ($fileAccessLevel == -1)) {
          if (FeedForAll_rss2html_validExtension(basename($_POST["TEMPLATE"]), $allowedTemplateExtensions) === FALSE) {
            echo "<p style=\"color: red;\">Configuration setting prohibit using the specified template file</p>\n";
          } else {
            $TEMPLATEfilename = basename($_POST["TEMPLATE"]);
          }
        }
        elseif ($fileAccessLevel == 2) {
          echo "<p style=\"color: red;\">Configuration setting prohibit using local files</p>\n";
        } else {
          // It is local and must be in the same directory
          $TEMPLATEfilename = basename($_POST["TEMPLATE"]);
        }
      }
      if ($TEMPLATEfilename != "") {
        if (($templateContents = FeedForAll_scripts_readFile($TEMPLATEfilename, $useFopenURL)) === FALSE) {
          if ($ReadErrorString == "") {
            echo "<p>The template file <b>$_POST[TEMPLATE]</b> could not be opened.</p>\n";
          } else {
            echo "<p>The template file <b>$_POST[TEMPLATE]</b> could not be opened with the error <b>$ReadErrorString</b>.</p>\n";
          }
        }
        elseif (FeedForAll_rss2html_isTemplate($templateContents) === FALSE) {
          echo "$_POST[TEMPLATE] is not a valid rss2html.php template file\n";
          $templateContents = "";
        } else {
          echo "<p>The template file <b>$_POST[TEMPLATE]</b> was SUCCESSFULLY opened</p>\n";
        }
      }
    }

    if ($xmlurl != "") {
      echo "<p>URL for the XML file properly encoded:<br><pre>$xmlurl</pre></p>\n";
    }

    if ($templateurl != "") {
      echo "<p>URL for the template file properly encoded:<br><pre>$templateurl</pre></p>\n";
    }

    echo "<h2>Test Link</h2>\n";

    echo "<p>Click on link to view results: <a href=\"$answer\" target=\"_blank\">$answer</a></p>\n";

    echo "<h2>Example Usage</h2>\n";

    echo "<p>Server Side Include:<br><nobr style=\"font-weight: bolder; color: red;\">&lt!--#INCLUDE VIRTUAL=&quot;".basename($_SERVER["PHP_SELF"])."?$ssi&quot; --&gt;</nobr></p>\n";

    echo "<p>Prefered PHP Include:<br><nobr style=\"font-weight: bolder; color: red;\">&lt;?php<br>$answerAlt\ninclude(&quot;".basename($_SERVER["PHP_SELF"])."&quot;);<br>?&gt;</nobr></p>\n";

    echo "<p>PHP Include (Due to security concerns many ISP have configured their servers to prevent this from working):<br><nobr style=\"font-weight: bolder; color: red;\">&lt;?php<br>include(&quot;$answer&quot;);<br>?&gt;</nobr></p>\n";

  }

  if ($xmlContents != "" || $templateContents != "") {
    echo "<br><hr><br>\n";
    if ($xmlContents != "") {
      echo "<h1>XML file</h1>\n";
      if (($convertedXML = FeedForAll_scripts_convertEncoding($xmlContents, $missingEncodingDefault, $destinationEncoding)) === FALSE) {
        // Conversions failed, probably becasue it was wrong or the routines were missing
        $convertedXML = $xmlContents;
      }
      $convertedXML = str_replace("&", "&amp;", $convertedXML);
      $convertedXML = str_replace("<", "&lt;", $convertedXML);
      $convertedXML = str_replace(">", "&gt;", $convertedXML);
      echo "<pre>$convertedXML</pre><br>\n";
    }
    if ($templateContents != "") {
      echo "<h1>Template file</h1>\n";
      $templateContents = str_replace("&", "&amp;", $templateContents);
      $templateContents = str_replace("<", "&lt;", $templateContents);
      $templateContents = str_replace(">", "&gt;", $templateContents);
      echo "<pre>$templateContents</pre><br>\n";
    }
  }
}

?>
