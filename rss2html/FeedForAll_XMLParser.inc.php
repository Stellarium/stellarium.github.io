<?php
//
// rssFilter.php Filter RSS feeds
//
// Copyright 2007 NotePage, Inc.
// http://www.feedforall.com
//
// NotePage, Inc. grants registerd users of our FeedForAll and/or
// FeedForAll Mac product(s) the right to install and use the
// rssFilter.php script free of charge.
// Please refer to the EULA included in the download for full license
// terms and conditions.
//
// $Id: FeedForAll_XMLParser.inc.php,v 3.24 2010/03/16 22:31:38 housley Exp $
//
// $Log: FeedForAll_XMLParser.inc.php,v $
// Revision 3.24  2010/03/16 22:31:38  housley
// Fix for PHP 5.3
//
// Revision 3.23  2010/03/06 02:26:06  housley
// Change needed to make PHP 5.3.x work with the initializer
//
// Revision 3.22  2009/11/23 02:05:12  housley
// Switch to explode() since PHP 5.3.0 made split() decrepit
//
// Revision 3.21  2009/08/04 23:17:11  housley
// Fix error related to using a string as a function
//
// Revision 3.20  2009/02/22 20:50:39  housley
// Try an prevent any content encoding
//
// Revision 3.19  2008/10/18 12:52:36  housley
// Update useragent so feedburner won't detect and change functionality
// for us
//
// Revision 3.18  2008/10/10 00:34:33  housley
// Set the encoding that is accepted
//
// Revision 3.17  2008/01/26 13:12:20  housley
// Hide warning/error messages from the system that shouldn't have
// been displayed
//
// Revision 3.16  2007/10/07 11:51:58  housley
// In processing Atom 1.0 allow atom:summary to be used to populate item
// description.
//
// Revision 3.15  2007/08/02 20:01:48  housley
// Fix finding the bottom sections in Atom and RDF feed types
//
// Revision 3.14  2007/07/23 14:20:05  housley
// In FeedForAll_fopen():
// * Actually read the headers
// * Check the return code
// * return the result
//
// Revision 3.13  2007/07/23 13:24:40  housley
// Check that the returned page is not an error page
//
// Revision 3.12  2007/07/19 15:29:32  housley
// Fix a possible problem with FeedForAll_fopen()
//
// Revision 3.11  2007/07/17 12:29:39  housley
// Initialize a class variable
//
// Revision 3.10  2007/07/12 12:49:51  housley
// Be pickier on the Atom 1.0 link usage, since Blogger has started using a
// link type that is not in the spec.
//
// Revision 3.9  2007/07/08 13:42:39  housley
// Create my own version of fopen() to try and get files when cURL is not
// available.  FeedForAll_fopen() is based on just connecting to the server
// and reading the results.
//
// Revision 3.8  2007/06/21 12:25:04  housley
// Fix the parsing to find the last element when using the expat library, PHP4
//
// Revision 3.7  2007/05/30 19:04:02  housley
// Add the ability to have 3 more extra fields in RSSMesh
//
// Revision 3.6  2007/05/27 14:31:17  housley
// Add debug statements to the non-cached version of FeedForAll_scripts_readFile()
//
// Revision 3.5  2007/05/25 10:22:51  housley
// In rssMesh.php, fix the count comparison.  It was adding one too many items.
//
// Revision 3.4  2007/05/04 11:54:19  housley
// When checking for caching, check a function only in the caching module
//
// Revision 3.3  2007/05/03 18:53:16  housley
// Different versions of PHP accept "today at noon" or "noon today", but don't
// accept the other.  Create the value of noon at startup and use that
// always.
//
// Revision 3.2  2007/05/03 16:13:13  housley
// It seems the XML parser doesn't like most of the HTML entities
//
// Revision 3.1  2007/04/25 12:33:47  housley
// Some feeds use <dc:date> with dates in a completely wrong format,
// try and get a date from the value.
//
// Revision 3.0  2007/04/16 14:23:03  housley
// Release version 3.0 of the scripts
//
// Revision 2.30  2007/04/13 18:30:10  housley
// * Atom:content might need whole string so always make it available
// * atom:content of type xhtml is in a div that needs to be stripped and
//   then used as is.
//
// Revision 2.29  2007/04/11 12:11:11  housley
// * Add more debug messages
// * Reorder the add item code some
//
// Revision 2.28  2007/04/11 10:40:38  housley
// Add some debug messages
//
// Revision 2.27  2007/04/06 11:18:03  housley
// Since <dc:creator> isn't specified to be an email, we can't move it to
// <author>
//
// Revision 2.26  2007/04/06 11:08:58  housley
// Add support for the Dublin Core (dc) namespace
//
// Revision 2.25  2007/04/05 11:37:05  housley
// Rename DcCreator so it can't interfer with a DublinCore extension
//
// Revision 2.24  2007/04/04 20:55:46  housley
// Add the ability to set CURLOPT_CONNECTTIMEOUT
//
// Revision 2.23  2007/04/04 18:43:26  housley
// * Update rssMesh to properly pass content:encoded through
// * Make sure <description> is always populated
// * Don't populate content:encoded from description in rssMesh
//
// Revision 2.22  2007/03/30 13:14:00  housley
// Move where pubDate_t and pubDate are manipulated to the beging of the
// code that processes an item.  This removes redundant caculations of
// pubDate_t
//
// Revision 2.21  2007/03/30 01:35:16  housley
// Use pubDate_t for the pubDateAsNumber since it already there
//
// Revision 2.20  2007/03/30 01:34:12  housley
// Move the very specific rssFilter code to rssFilter.php
//
// Revision 2.19  2007/03/28 23:23:11  housley
// Add support for Atom <author><email> into RSS 2.0 <author>
//
// Revision 2.18  2007/03/28 13:26:30  housley
// Support atom:content, at least in a basic form
//
// Revision 2.17  2007/03/27 23:49:02  housley
// For non-RSS 2.0 formats create a valid pubDate from the appropiate date
//
// Revision 2.16  2007/03/27 23:16:31  housley
// Add support for Atom 1.0 atom:updated date field
//
// Revision 2.15  2007/03/25 11:24:21  housley
// Only to the replace on the one array value that we care about
//
// Revision 2.14  2007/03/19 14:13:24  housley
// Fix some small bugs in the new code, and test
//
// Revision 2.13  2007/03/15 18:37:32  housley
// Fix filter ordering
//
// Revision 2.12  2007/03/15 13:50:34  housley
// * Clear the current tag, in endElement()
// * Trim the feed level items at end of channel
//
// Revision 2.11  2007/03/15 01:21:24  housley
// Changes needed for when there extra parsing files aren't included
//
// Revision 2.10  2007/03/14 17:55:05  housley
// Support atom's id as guid
//
// Revision 2.9  2007/03/07 00:23:12  housley
// Add isEmpty, notEmpty, alphaBefore and alphaAfter
//
// Revision 2.8  2007/03/06 13:31:05  housley
// Change from ignoreCase to matchCase
//
// Revision 2.7  2007/03/05 21:13:11  housley
// * Add support for working with pubDate as a date or time
// * Show which items will and won't be used
//
// Revision 2.6  2007/03/05 15:10:07  housley
// Add "Ends With"
//
// Revision 2.5  2007/03/05 01:12:16  housley
// Move FeedForAll_scripts_convertEncoding and FeedForAll_scripts_readFile
// into FeedForAll_XMLParser.inc.php, because they are used in every file
//
// Revision 2.4  2007/03/04 22:54:03  housley
// Add methods to get the filter capabilities
//
// Revision 2.3  2007/03/04 13:41:53  housley
// * Pass the parsing mode to the item class
// * Cleanup the feed level processing
// * rss2html uses the separate parser too
//
// Revision 2.2  2007/03/04 12:13:52  housley
// If the feed is atom, check the link type if any
//
// Revision 2.1  2007/03/04 02:10:08  housley
// Move the parser used by the paid scripts into its own file.
//
//
//


// ==========================================================================
// Below this point of the file there are no user editable options.  Your
// are welcome to make any modifications that you wish to any of the code
// below, but that is not necessary for normal use.
// ==========================================================================

$ReadErrorString = "";

if (function_exists("FeedForAll_scripts_getRFDdate") === FALSE) {
  Function FeedForAll_scripts_getRFDdate($datestring) {
    if ($datestring[10] != "T") {
      // Might be a RFC 822 date
      if (($retVal = strtotime($datestring)) != -1) {
        return $retVal;
      }
    }

    $startTZ = 19;
    
    $year = substr($datestring, 0, 4);
    $month = substr($datestring, 5, 2);
    $day = substr($datestring, 8, 2);
    $hour = substr($datestring, 11, 2);
    $minute = substr($datestring, 14, 2);
    $second = substr($datestring, 17, 2);
    if ($datestring[$startTZ] == ".") {
      $curChar = $datestring[$startTZ];
      while (($startTZ < strlen($datestring)) && ($curChar != "Z") && ($curChar != "+") && ($curChar != "-")) {
        $startTZ++;
        $curChar = $datestring[$startTZ];
      }
    }
    if ($datestring[$startTZ] == "Z") {
      $offset_hour = 0;
      $offset_minute = 0;
    } else {
      if (substr($datestring, $startTZ, 1) == "-") {
        $offset_hour = substr($datestring, $startTZ+1, 2);
        $offset_minute = substr($datestring, $startTZ+4, 2);
      } else {
        $offset_hour = -1*substr($datestring, $startTZ+1, 2);
        $offset_minute = -1*substr($datestring, $startTZ+4, 2);
      }
    }
    return gmmktime((int)($hour+$offset_hour), (int)($minute+$offset_minute), (int)$second, (int)$month, (int)$day, (int)$year);
  }
}

if (function_exists("FeedForAll_scripts_convertEncoding") === FALSE) {
  Function FeedForAll_scripts_convertEncoding($XMLstring, $missingEncodingDefault="ISO-8859-1", $destinationEncoding="UTF-8") {
    $results = NULL;
    $inputEncoding = $missingEncodingDefault;
    $workString = $XMLstring;

    if (function_exists("mb_convert_encoding") !== FALSE) {

      if (preg_match("/<\?xml(.*)\?>/", $XMLstring, $results) === FALSE) return FALSE;

      if (count($results) == 0) return FALSE;

      $initialXMLHeader = $results[0];
      $results[0] = str_replace("'", "\"", str_replace(" ", "", $results[0]));

      if (($location = stristr($results[0], "encoding=")) !== FALSE) {
        $parts = explode("\"", $location);

        if (strcasecmp($parts[1], $destinationEncoding) == 0) {
          return $XMLstring;
        }
        $inputEncoding = $parts[1];
        $modifiedXMLHeader = str_replace($inputEncoding, $destinationEncoding, $initialXMLHeader);
      } else {
        $modifiedXMLHeader = str_replace("?>", " encoding=\"$destinationEncoding\" ?>", $initialXMLHeader);
      }
      $workString = str_replace($initialXMLHeader, $modifiedXMLHeader, $workString);

      if (($newResult = mb_convert_encoding($workString, $destinationEncoding, $inputEncoding)) !== FALSE) {
        return $newResult;
      }
    }
    if (function_exists("iconv") !== FALSE) {

      if (preg_match("/<\?xml(.*)\?>/", $XMLstring, $results) === FALSE) return FALSE;

      if (count($results) == 0) return FALSE;

      $initialXMLHeader = $results[0];
      $results = str_replace(" ", "", $results);
      $results = str_replace("'", "\"", $results);

      if (($location = stristr($results[0], "encoding=")) !== FALSE) {
        $parts = explode("\"", $location);

        if (strcasecmp($parts[1], $destinationEncoding) == 0) {
          return $XMLstring;
        }
        $inputEncoding = $parts[1];
        $modifiedXMLHeader = str_replace($inputEncoding, $destinationEncoding, $initialXMLHeader);
      } else {
        $modifiedXMLHeader = str_replace("?>", " encoding=\"$destinationEncoding\" ?>", $initialXMLHeader);
      }
      $workString = str_replace($initialXMLHeader, $modifiedXMLHeader, $workString);

      if (($newResult = iconv($inputEncoding, "$destinationEncoding//TRANSLIT", $workString)) !== FALSE) {
        return $newResult;
      }
    }
    return FALSE;
  }
}

if (function_exists("FeedForAll_preProcessXML") === FALSE) {
  Function FeedForAll_preProcessXML($XMLString) {
    //
    // It seems that the PHP XML processor doesn't like a lot of the entities
    $XMLString = str_replace("&iexcl;", "&#161;", $XMLString);
    $XMLString = str_replace("&cent;", "&#162;", $XMLString);
    $XMLString = str_replace("&pound;", "&#163;", $XMLString);
    $XMLString = str_replace("&curren;", "&#164;", $XMLString);
    $XMLString = str_replace("&yen;", "&#165;", $XMLString);
    $XMLString = str_replace("&brvbar;", "&#166;", $XMLString);
    $XMLString = str_replace("&sect;", "&#167;", $XMLString);
    $XMLString = str_replace("&uml;", "&#168;", $XMLString);
    $XMLString = str_replace("&copy;", "&#169;", $XMLString);
    $XMLString = str_replace("&ordf;", "&#170;", $XMLString);
    $XMLString = str_replace("&laquo;", "&#171;", $XMLString);
    $XMLString = str_replace("&not;", "&#172;", $XMLString);
    $XMLString = str_replace("&shy;", "&#173;", $XMLString);
    $XMLString = str_replace("&reg;", "&#174;", $XMLString);
    $XMLString = str_replace("&macr;", "&#175;", $XMLString);
    $XMLString = str_replace("&deg;", "&#176;", $XMLString);
    $XMLString = str_replace("&plusmn;", "&#177;", $XMLString);
    $XMLString = str_replace("&sup2;", "&#178;", $XMLString);
    $XMLString = str_replace("&sup3;", "&#179;", $XMLString);
    $XMLString = str_replace("&acute;", "&#180;", $XMLString);
    $XMLString = str_replace("&micro;", "&#181;", $XMLString);
    $XMLString = str_replace("&para;", "&#182;", $XMLString);
    $XMLString = str_replace("&middot;", "&#183;", $XMLString);
    $XMLString = str_replace("&cedil;", "&#184;", $XMLString);
    $XMLString = str_replace("&sup1;", "&#185;", $XMLString);
    $XMLString = str_replace("&ordm;", "&#186;", $XMLString);
    $XMLString = str_replace("&raquo;", "&#187;", $XMLString);
    $XMLString = str_replace("&frac14;", "&#188;", $XMLString);
    $XMLString = str_replace("&frac12;", "&#189;", $XMLString);
    $XMLString = str_replace("&frac34;", "&#190;", $XMLString);
    $XMLString = str_replace("&iquest;", "&#191;", $XMLString);
    $XMLString = str_replace("&Agrave;", "&#192;", $XMLString);
    $XMLString = str_replace("&Aacute;", "&#193;", $XMLString);
    $XMLString = str_replace("&Acirc;", "&#194;", $XMLString);
    $XMLString = str_replace("&Atilde;", "&#195;", $XMLString);
    $XMLString = str_replace("&Auml;", "&#196;", $XMLString);
    $XMLString = str_replace("&Aring;", "&#197;", $XMLString);
    $XMLString = str_replace("&AElig;", "&#198;", $XMLString);
    $XMLString = str_replace("&Ccedil;", "&#199;", $XMLString);
    $XMLString = str_replace("&Egrave;", "&#200;", $XMLString);
    $XMLString = str_replace("&Eacute;", "&#201;", $XMLString);
    $XMLString = str_replace("&Ecirc;", "&#202;", $XMLString);
    $XMLString = str_replace("&Euml;", "&#203;", $XMLString);
    $XMLString = str_replace("&Igrave;", "&#204;", $XMLString);
    $XMLString = str_replace("&Iacute;", "&#205;", $XMLString);
    $XMLString = str_replace("&Icirc;", "&#206;", $XMLString);
    $XMLString = str_replace("&Iuml;", "&#207;", $XMLString);
    $XMLString = str_replace("&ETH;", "&#208;", $XMLString);
    $XMLString = str_replace("&Ntilde;", "&#209;", $XMLString);
    $XMLString = str_replace("&Ograve;", "&#210;", $XMLString);
    $XMLString = str_replace("&Oacute;", "&#211;", $XMLString);
    $XMLString = str_replace("&Ocirc;", "&#212;", $XMLString);
    $XMLString = str_replace("&Otilde;", "&#213;", $XMLString);
    $XMLString = str_replace("&Ouml;", "&#214;", $XMLString);
    $XMLString = str_replace("&times;", "&#215;", $XMLString);
    $XMLString = str_replace("&Oslash;", "&#216;", $XMLString);
    $XMLString = str_replace("&Ugrave;", "&#217;", $XMLString);
    $XMLString = str_replace("&Uacute;", "&#218;", $XMLString);
    $XMLString = str_replace("&Ucirc;", "&#219;", $XMLString);
    $XMLString = str_replace("&Uuml;", "&#220;", $XMLString);
    $XMLString = str_replace("&Yacute;", "&#221;", $XMLString);
    $XMLString = str_replace("&THORN;", "&#222;", $XMLString);
    $XMLString = str_replace("&szlig;", "&#223;", $XMLString);
    $XMLString = str_replace("&agrave;", "&#224;", $XMLString);
    $XMLString = str_replace("&aacute;", "&#225;", $XMLString);
    $XMLString = str_replace("&acirc;", "&#226;", $XMLString);
    $XMLString = str_replace("&atilde;", "&#227;", $XMLString);
    $XMLString = str_replace("&auml;", "&#228;", $XMLString);
    $XMLString = str_replace("&aring;", "&#229;", $XMLString);
    $XMLString = str_replace("&aelig;", "&#230;", $XMLString);
    $XMLString = str_replace("&ccedil;", "&#231;", $XMLString);
    $XMLString = str_replace("&egrave;", "&#232;", $XMLString);
    $XMLString = str_replace("&eacute;", "&#233;", $XMLString);
    $XMLString = str_replace("&ecirc;", "&#234;", $XMLString);
    $XMLString = str_replace("&euml;", "&#235;", $XMLString);
    $XMLString = str_replace("&igrave;", "&#236;", $XMLString);
    $XMLString = str_replace("&iacute;", "&#237;", $XMLString);
    $XMLString = str_replace("&icirc;", "&#238;", $XMLString);
    $XMLString = str_replace("&iuml;", "&#239;", $XMLString);
    $XMLString = str_replace("&eth;", "&#240;", $XMLString);
    $XMLString = str_replace("&ntilde;", "&#241;", $XMLString);
    $XMLString = str_replace("&ograve;", "&#242;", $XMLString);
    $XMLString = str_replace("&oacute;", "&#243;", $XMLString);
    $XMLString = str_replace("&ocirc;", "&#244;", $XMLString);
    $XMLString = str_replace("&otilde;", "&#245;", $XMLString);
    $XMLString = str_replace("&ouml;", "&#246;", $XMLString);
    $XMLString = str_replace("&divide;", "&#247;", $XMLString);
    $XMLString = str_replace("&oslash;", "&#248;", $XMLString);
    $XMLString = str_replace("&ugrave;", "&#249;", $XMLString);
    $XMLString = str_replace("&uacute;", "&#250;", $XMLString);
    $XMLString = str_replace("&ucirc;", "&#251;", $XMLString);
    $XMLString = str_replace("&uuml;", "&#252;", $XMLString);
    $XMLString = str_replace("&yacute;", "&#253;", $XMLString);
    $XMLString = str_replace("&thorn;", "&#254;", $XMLString);
    $XMLString = str_replace("&yuml;", "&#255;", $XMLString);
    $XMLString = str_replace("&ensp;", "&#8194;", $XMLString);
    $XMLString = str_replace("&emsp;", "&#8195;", $XMLString);
    $XMLString = str_replace("&thinsp;", "&#8201;", $XMLString);
    $XMLString = str_replace("&zwnj;", "&#8204;", $XMLString);
    $XMLString = str_replace("&zwj;", "&#8205;", $XMLString);
    $XMLString = str_replace("&lrm;", "&#8206;", $XMLString);
    $XMLString = str_replace("&rlm;", "&#8207;", $XMLString);
    $XMLString = str_replace("&ndash;", "&#8211;", $XMLString);
    $XMLString = str_replace("&mdash;", "&#8212;", $XMLString);
    $XMLString = str_replace("&lsquo;", "&#8216;", $XMLString);
    $XMLString = str_replace("&rsquo;", "&#8217;", $XMLString);
    $XMLString = str_replace("&sbquo;", "&#8218;", $XMLString);
    $XMLString = str_replace("&ldquo;", "&#8220;", $XMLString);
    $XMLString = str_replace("&rdquo;", "&#8221;", $XMLString);
    $XMLString = str_replace("&bdquo;", "&#8222;", $XMLString);
    $XMLString = str_replace("&dagger;", "&#8224;", $XMLString);
    $XMLString = str_replace("&Dagger;", "&#8225;", $XMLString);
    $XMLString = str_replace("&bull;", "&#8226;", $XMLString);
    $XMLString = str_replace("&hellep;", "&#8230;", $XMLString);
    $XMLString = str_replace("&permil;", "&#8240;", $XMLString);
    $XMLString = str_replace("&prime;", "&#8242;", $XMLString);
    $XMLString = str_replace("&Prime;", "&#8243;", $XMLString);
    $XMLString = str_replace("&lsaquo;", "&#8249;", $XMLString);
    $XMLString = str_replace("&rsaquo;", "&#8250;", $XMLString);
    $XMLString = str_replace("&oline;", "&#8254;", $XMLString);
    $XMLString = str_replace("&frasl;", "&#8260;", $XMLString);
    $XMLString = str_replace("&euro;", "&#8264;", $XMLString);
    return $XMLString;
  }
}

if (function_exists("FeedForAll_fopen") === FALSE) {
  Function FeedForAll_fopen($url) {
    //
    // The internal "hidden function is to do some initialization
    if (function_exists("h_FeedForAll_fopen") === FALSE) {
      Function h_FeedForAll_fopen($url, $RedirectHistory) {
        GLOBAL $connectTimeoutLimit;
        GLOBAL $ReadErrorString;

        //
        // Divide the URL into parts so we can work with it
        $parts = parse_url($url);
        $thepath = $parts["path"];
        if (isset($parts["query"])) {
          $thepath .= "?$parts[query]";
        }
        $domain = $parts["host"];
        if (isset($parts["port"])) {
          $port = $parts["port"];
        } else {
          $port = 80;
        }

        $errno = "";
        $errstr = "";
        if (isset($connectTimeoutLimit) && $connectTimeoutLimit != 0) {
          $fd = @fsockopen($domain, $port, $errno, $errstr, $connectTimeoutLimit);
        } else {
          $fd = @fsockopen($domain, $port, $errno, $errstr);
        }
        if ($fd !== FALSE) {
          $request = "GET $thepath HTTP/1.0\r\n";
          $request .= "Host: $domain\r\n";
          $request .= "Content-Encoding: identity\r\n";
          $request .= "User-Agent: Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.0.1;) Gecko/2008070208 Firefox/3.0.1\r\n\r\n";
          @fputs($fd, $request);
          
          $headerLine = 0;

          do {
            if (@feof($fd) !== FALSE) {
              // End of file
              break;
            }
            $header = @fgets($fd, 1024);
            if (($header[0] == "\n") || ($header[0] == "\r")) {
              // End of the headers
              break;
            }
            if ($headerLine == 0) {
              $firstHeaderLine = $header;
            }
            $headerLine++;
            if (substr($header, 0, 9) == "Location:") {
              //
              // We got a location header, try to fetch from the new location
              @fclose($fd);
              if (count($RedirectHistory) < 10) {
                $loc = trim(substr($header, 9));
                //
                // Check if the redirect is relative or absolute
                if (substr($loc, 0, 7) != "http://") {
                  if ($loc[0] == "/") {
                    if ($port == 80) {
                      $loc = "http://$domain$loc";
                    } else {
                      $loc = "http://$domain:$port$loc";
                    }
                  } else {
                    //
                    // The path is relative so we need the existing path
                    $path = dirname($parts["path"])."/$loc";
                    if ($port == 80) {
                      $loc = "http://$domain$path";
                    } else {
                      $loc = "http://$domain:$port$path";
                    }
                  }
                }
                for ($x = count($RedirectHistory)-1; $x >= 0; $x--) {
                  if (!strcmp($loc, $RedirectHistory[$x])) {
                    $ReadErrorString = "Redirection loop detected";
                    return FALSE;
                  }
                }
                $RedirectHistory[count($RedirectHistory)] = $loc;
                return h_FeedForAll_fopen($loc, $RedirectHistory);
              } else {
                $ReadErrorString = "Too many redirects";
                return FALSE;
              }
            }
          } while (1);
        } else {
          $ReadErrorString = $errstr;
          return FALSE;
        }
        //
        // Get the result code
        $parts = explode(" ", $firstHeaderLine);
        if (($parts[1] < 200) || (300 <= $parts[1])) {
          $ReadErrorString = "HTTP ERROR: ".$parts[1];
          @fclose($fd);
          return FALSE;
        }
        
        $result = "";
        while (($data = fread($fd, 4096)) != "") {
          $result .= $data;
        }
        @fclose($fd);
        return $result;
      }
    }

    $RedirectHistory = Array();

    return h_FeedForAll_fopen($url, $RedirectHistory);
  }
}

if (function_exists("FeedForAll_scripts_readFile") === FALSE) {
  Function FeedForAll_scripts_readFile($filename, $useFopenURL, $useCaching = 0) {
    GLOBAL $connectTimeoutLimit;
    GLOBAL $ReadErrorString;
    GLOBAL $debugLevel;

    if ($useCaching);

    if (isset($debugLevel) && ($debugLevel >= 1)) {
      echo "DIAG: FeedForAll_scripts_readFile($filename, $useFopenURL, $useCaching <= 0)<br>\n";
    }
    
    $ReadErrorString = "";
    $result = "";
    if (stristr($filename, "://")) {
      if ($useFopenURL == 1) {
        if (($fd = @fopen($filename, "rb")) === FALSE) {
          if (isset($debugLevel) && ($debugLevel >= 1)) {
            echo "DIAG: FeedForAll_scripts_readFile(): fopen() failed<br>\n";
          }
          return FALSE;
        }
        while (($data = @fread($fd, 4096)) != "") {
          $result .= $data;
        }
        @fclose($fd);
      }
      elseif ($useFopenURL == -1) {
        $result = FeedForAll_fopen($filename);
      } else {
        FeedForAll_fopen($filename);
        // This is a URL so use CURL
        $curlHandle = curl_init();
        curl_setopt($curlHandle, CURLOPT_URL, $filename);
        curl_setopt($curlHandle, CURLOPT_HEADER, 0);
        curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curlHandle, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.0.1;) Gecko/2008070208 Firefox/3.0.1");
        //    curl_setopt($curlHandle, CURLOPT_AUTOREFERER, 1);
        curl_setopt($curlHandle, CURLOPT_REFERER, $filename);
        if (!(ini_get("safe_mode") || ini_get("open_basedir"))) {
          curl_setopt($curlHandle, CURLOPT_FOLLOWLOCATION, 1);
        }
        if (isset($connectTimeoutLimit) && $connectTimeoutLimit != 0) {
          curl_setopt($curlHandle, CURLOPT_CONNECTTIMEOUT, $connectTimeoutLimit);
        }
        curl_setopt($curlHandle, CURLOPT_MAXREDIRS, 10);
        curl_setopt($curlHandle, CURLOPT_ENCODING, 'identity');
        $result = curl_exec($curlHandle);
        if (curl_errno($curlHandle)) {
          $ReadErrorString = curl_error($curlHandle);
          curl_close($curlHandle);
          return FALSE;
        }
        $http_response = curl_getinfo($curlHandle, CURLINFO_HTTP_CODE);
        if (($http_response < 200) || (300 <= $http_response)) {
          $ReadErrorString = "HTTP ERROR: $http_response";
          curl_close($curlHandle);
          return FALSE;
        }
        curl_close($curlHandle);
      }
    } else {
      // This is a local file, so use fopen
      if (($fd = @fopen($filename, "rb")) === FALSE) {
        if (isset($debugLevel) && ($debugLevel >= 1)) {
          echo "DIAG: FeedForAll_scripts_readFile(): fopen(): failed<br>\n";
        }
        return FALSE;
      }
      while (($data = @fread($fd, 4096)) != "") {
        $result .= $data;
      }
      @fclose($fd);
      if (isset($debugLevel) && ($debugLevel >= 1)) {
        echo "DIAG: FeedForAll_scripts_readFile(): flock() successeded<br>\n";
      }
    }
    return $result;
  }
}

class rootItemClass {
  var $operateAs;
  var $title;
  var $description;
  var $contentEncoded;
  var $link;
  var $pubDate;
  var $pubDate_t;
  var $pubDateDC;
  var $enclosureURL;
  var $enclosureLength;
  var $enclosureType;
  var $categoryArray;
  var $category;
  var $categoryDomain;
  var $guid;
  var $guidIsPermaLink;
  var $author;
  var $comments;
  var $source;
  var $sourceURL;
  var $creativeCommons;
  var $rssMeshExtra;
  var $rssMeshExtra1;
  var $rssMeshExtra2;
  var $rssMeshExtra3;
  var $rssMeshFeedImageTitle;
  var $rssMeshFeedImageUrl;
  var $rssMeshFeedImageLink;
  var $rssMeshFeedImageDescription;
  var $rssMeshFeedImageHeight;
  var $rssMeshFeedImageWidth;
  var $atomID;
  var $atomUpdated;
  var $atomContent;
  var $atomContentStartPos;
  var $atomAuthorEmail;
  
  var $contentEncodedUsed;

  var $itemStartPos;
  var $itemFullText;

  // Constructor
  Function rootItemClass($operateAs) {
    $this->operateAs = $operateAs;
    $this->title = "";
    $this->description = "";
    $this->contentEncoded = "";
    $this->link = "";
    $this->pubDate = "";
    $this->pubDate_t = 0;
    $this->pubDateDC = "";
    $this->enclosureURL = "";
    $this->enclosureLength = "";
    $this->enclosureType = "";
    $this->categoryArray = Array();
    $this->category = "";
    $this->categoryDomain = "";
    $this->guid = "";
    $this->guidIsPermaLink = "";
    $this->author = "";
    $this->comments = "";
    $this->source = "";
    $this->sourceURL = "";
    $this->creativeCommons = "";
    $this->rssMeshExtra = "";
    $this->rssMeshExtra1 = "";
    $this->rssMeshExtra2 = "";
    $this->rssMeshExtra3 = "";
    $this->rssMeshFeedImageTitle = "";
    $this->rssMeshFeedImageUrl = "";
    $this->rssMeshFeedImageLink = "";
    $this->rssMeshFeedImageDescription = "";
    $this->rssMeshFeedImageHeight = "";
    $this->rssMeshFeedImageWidth = "";
    $this->atomID = "";
    $this->atomUpdated = "";
    $this->atomContent = "";
    $this->atomContentStartPos = 0;
    $this->atomAuthorEmail = "";
    
    $this->contentEncodedUsed = 0;

    $this->itemStartPos = 0;
    $this->itemFullText = "";
  }

  Function getValueOf($elementName) {
    if ($elementName == "~~~ItemTitle~~~") {
      return $this->title;
    }
    elseif ($elementName == "~~~ItemDescription~~~") {
      return $this->description;
    }
    elseif ($elementName == "~~~ItemContentEncoded~~~") {
      return $this->contentEncoded;
    }
    elseif ($elementName == "~~~ItemLink~~~") {
      return $this->link;
    }
    elseif ($elementName == "~~~ItemPubDate~~~") {
      return $this->pubDate;
    }
    elseif ($elementName == "~~~ItemPubDateAsNumber~~~") {
      return $this->pubDate_t;
    }
    elseif ($elementName == "~~~ItemEnclosureUrl~~~") {
      return $this->enclosureURL;
    }
    elseif ($elementName == "~~~ItemEnclosureType~~~") {
      return $this->enclosureType;
    }
    elseif ($elementName == "~~~ItemEnclosureLength~~~") {
      return $this->enclosureLength;
    }
    elseif ($elementName == "~~~ItemGuid~~~") {
      return $this->guid;
    }
    elseif ($elementName == "~~~ItemAuthor~~~") {
      return $this->author;
    }
    elseif ($elementName == "~~~ItemComments~~~") {
      return $this->comments;
    }
    elseif ($elementName == "~~~ItemSource~~~") {
      return $this->source;
    }
    elseif ($elementName == "~~~ItemSourceUrl~~~") {
      return $this->sourceURL;
    }
    elseif ($elementName == "~~~ItemCategory~~~") {
      if (count($this->categoryArray)) {
        return $this->categoryArray[0]["Category"];
      }
    }
    elseif ($elementName == "~~~ItemCategoryDomain~~~") {
      if (count($this->categoryArray)) {
        return $this->categoryArray[0]["Domain"];
      }
    }
    elseif ($elementName == "~~~ItemCreativeCommons~~~") {
      return $this->creativeCommons;
    }
    elseif ($elementName == "~~~ItemRssMeshExtra~~~") {
      return $this->rssMeshExtra;
    }
    elseif ($elementName == "~~~ItemRssMeshExtra1~~~") {
      return $this->rssMeshExtra1;
    }
    elseif ($elementName == "~~~ItemRssMeshExtra2~~~") {
      return $this->rssMeshExtra2;
    }
    elseif ($elementName == "~~~ItemRssMeshExtra3~~~") {
      return $this->rssMeshExtra3;
    }
    elseif ($elementName == "~~~ItemRssMeshFeedImageTitle~~~") {
      return $this->rssMeshFeedImageTitle;
    }
    elseif ($elementName == "~~~ItemRssMeshFeedImageUrl~~~") {
      return $this->rssMeshFeedImageUrl;
    }
    elseif ($elementName == "~~~ItemRssMeshFeedImageLink~~~") {
      return $this->rssMeshFeedImageLink;
    }
    elseif ($elementName == "~~~ItemRssMeshFeedImageDescription~~~") {
      return $this->rssMeshFeedImageDescription;
    }
    elseif ($elementName == "~~~ItemRssMeshFeedImageHeight~~~") {
      return $this->rssMeshFeedImageHeight;
    }
    elseif ($elementName == "~~~ItemRssMeshFeedImageWidth~~~") {
      return $this->rssMeshFeedImageWidth;
    }
    return NULL;
  }

  Function getArrayOfFields() {
    $result = Array();

    $result[] = "~~~ItemTitle~~~";
    $result[] = "~~~ItemDescription~~~";
    $result[] = "~~~ItemContentEncoded~~~";
    $result[] = "~~~ItemLink~~~";
    $result[] = "~~~ItemPubDate~~~";
    $result[] = "~~~ItemPubDateAsNumber~~~";
    $result[] = "~~~ItemEnclosureUrl~~~";
    $result[] = "~~~ItemEnclosureType~~~";
    $result[] = "~~~ItemEnclosureLength~~~";
    $result[] = "~~~ItemGuid~~~";
    $result[] = "~~~ItemAuthor~~~";
    $result[] = "~~~ItemComments~~~";
    $result[] = "~~~ItemSource~~~";
    $result[] = "~~~ItemSourceUrl~~~";
    $result[] = "~~~ItemCategory~~~";
    $result[] = "~~~ItemCategoryDomain~~~";
    $result[] = "~~~ItemCreativeCommons~~~";
    $result[] = "~~~ItemRssMeshExtra~~~";
    $result[] = "~~~ItemRssMeshExtra1~~~";
    $result[] = "~~~ItemRssMeshExtra2~~~";
    $result[] = "~~~ItemRssMeshExtra3~~~";
    $result[] = "~~~ItemRssMeshFeedImageTitle~~~";
    $result[] = "~~~ItemRssMeshFeedImageUrl~~~";
    $result[] = "~~~ItemRssMeshFeedImageLink~~~";
    $result[] = "~~~ItemRssMeshFeedImageDescription~~~";
    $result[] = "~~~ItemRssMeshFeedImageHeight~~~";
    $result[] = "~~~ItemRssMeshFeedImageWidth~~~";
    
    return $result;
  }
  
}

$startingClassName = "rootItemClass";
if (function_exists("rssFilter_extendClass")) {
  $startingClassName = rssFilter_extendClass($startingClassName);
}

if (function_exists("FeedForAll_parseExtensions_extendClass")) {
  $currentBaseClassName = FeedForAll_parseExtensions_extendClass($startingClassName);
} else {
  $currentBaseClassName = $startingClassName;
}
eval('class baseItemClassWithExtensions extends ' . $currentBaseClassName . ' {
  Function baseItemClassWithExtensions($operateAs) {
    $this->' . $currentBaseClassName . '($operateAs);
  }
}');

class baseItemClass extends baseItemClassWithExtensions {
  Function baseItemClass($operateAs) {
    $parentClass = get_parent_class($this);
    $this->$parentClass($operateAs);
  }
}

class rootRSSParserClass {
  var $operateAs;
  var $gotROOT;
  var $feedTYPE;
  var $wholeString;
  var $level;
  var $tag;
  var $noFutureItems;
  
  var $currentItem;

  var $FeedTitle;
  var $FeedDescription;
  var $FeedContentEncoded;
  var $FeedLink;
  var $FeedPubDate;
  var $FeedPubDateDC;
  var $FeedPubDate_t;
  var $FeedLastBuildDate;
  var $FeedImageURL;
  var $FeedImageTitle;
  var $FeedImageLink;
  var $FeedImageDescription;
  var $FeedImageHeight;
  var $FeedImageWidth;
  var $FeedCreativeCommons;
  var $FeedAtomUpdated;
  var $FeedAtomContent;
  var $FeedAtomContentStartPos;
  var $FeedAtomAuthorEmail;
  
  var $contentEncodedUsed;
  
  var $noon_t;

  var $Items;

  //
  var $insideChannel = FALSE;
  var $level_channel;
  var $insideChannelImage = FALSE;
  var $level_channelImage;
  var $insideItem = FALSE;
  var $level_item;
  var $insideAtomAuthor = FALSE;

  Function rootRSSParserClass($operateAs) {
    $this->operateAs = $operateAs;
    $this->gotROOT = 0;
    $this->feedTYPE = "RSS";
    $this->wholeString = "";
    $this->level = 0;
    $this->tag = "";
    $this->noFutureItems = 0;;
  
    $this->FeedImageURL = "";
    $this->FeedImageTitle = "";
    $this->FeedImageLink = "";
    $this->FeedImageDescription = "";
    $this->FeedImageHeight = "";
    $this->FeedImageWidth = "";
    $this->currentItem = NULL;

    $this->FeedTitle = "";
    $this->FeedDescription = "";
    $this->FeedContentEncoded = "";
    $this->FeedLink = "";
    $this->FeedPubDate = "";
    $this->FeedPubDateDC = "";
    $this->FeedPubDate_t = 0;
    $this->FeedLastBuildDate = "";
    $this->FeedImageURL = "";
    $this->FeedImageTitle = "";
    $this->FeedImageLink = "";
    $this->FeedImageDescription = "";
    $this->FeedImageHeight = "";
    $this->FeedImageWidth = "";
    $this->FeedCreativeCommons = "";
    $this->FeedAtomUpdated = "";
    $this->FeedAtomContent = "";
    $this->FeedAtomContentStartPos = 0;
    $this->FeedAtomAuthorEmail = "";

    $this->contentEncodedUsed = 0;
    
    $this->noon_t = mktime(12, 0, 0, date("m"), date("d"), date("Y"));
    
    $this->Items = Array();

    //
    $this->insideChannel = FALSE;
    $this->level_channel = 0;
    $this->insideChannelImage = FALSE;
    $this->level_channelImage = 0;
    $this->insideItem = FALSE;
    $this->level_item = 0;
  }

  function startElement($parser, $tagName, $attrs) {
    GLOBAL $debugLevel;
    
    $this->level++;
    $this->tag = $tagName;
    if ($this->gotROOT == 0) {
      $this->gotROOT = 1;
      if (strstr($tagName, "RSS")) {
        $this->feedTYPE = "RSS";
      }
      elseif (strstr($tagName, "RDF")) {
        $this->feedTYPE = "RDF";
      }
      elseif (strstr($tagName, "FEE")) {
        $this->feedTYPE = "FEE";
        $this->insideChannel = TRUE;
        $this->level_channel = 1;
      }
    }
    elseif ((($tagName == "ITEM") && ($this->feedTYPE != "FEE")) || (($tagName == "ENTRY") && ($this->feedTYPE == "FEE"))) {
      if (isset($debugLevel) && ($debugLevel >= 2)) {
        echo "DIAG: startElement(\$parser, $tagName, \$attrs)<br>\n";
      }
      
      $this->insideItem = TRUE;
      $this->level_item = $this->level;
      $this->currentItem = new baseItemClass($this->operateAs);

      //
      // Find the start of the <item> or <entry>
      $this->currentItem->ItemStartPos = xml_get_current_byte_index($parser);
      if ($this->wholeString[$this->currentItem->ItemStartPos] != "<") {
        $startToHere = substr($this->wholeString, 0, $this->currentItem->ItemStartPos);
        $this->currentItem->ItemStartPos = strrpos($startToHere, "<");
      }
    }
    elseif ($this->insideChannel && (($tagName == "AUTHOR") && ($this->feedTYPE == "FEE"))) {
      $this->insideAtomAuthor = TRUE;
    }
    elseif ($this->insideItem && (($tagName == "AUTHOR") && ($this->feedTYPE == "FEE"))) {
      $this->insideAtomAuthor = TRUE;
    }
    elseif (($this->insideItem) && ($tagName == "ENCLOSURE")) {
      if (isset($attrs["URL"])) {
        $this->currentItem->enclosureURL = $attrs["URL"];
      }
      if (isset($attrs["TYPE"])) {
        $this->currentItem->enclosureType = $attrs["TYPE"];
      }
      if (isset($attrs["LENGTH"])) {
        $this->currentItem->enclosureLength = $attrs["LENGTH"];
      }
    }
    elseif (($this->insideItem) && ($tagName == "SOURCE")) {
      if (isset($attrs["URL"])) {
        $this->currentItem->sourceURL = $attrs["URL"];
      }
    }
    elseif (($this->insideItem) && ($tagName == "CATEGORY")) {
      if (isset($attrs["DOMAIN"])) {
        $this->currentItem->categoryDomain = $attrs["DOMAIN"];
      }
    }
    elseif (($this->insideItem) && ($tagName == "GUID")) {
      if (isset($attrs["ISPERMALINK"])) {
        $this->currentItem->guidIsPermaLink = $attrs["ISPERMALINK"];
      }
    }
    elseif (($tagName == "LINK") && ($this->feedTYPE == "FEE")) {
      if ($this->insideItem) {
        if (isset($attrs["REL"]) && ($attrs["REL"] == "enclosure")) {
          $this->currentItem->enclosureURL = $attrs["HREF"];
          $this->currentItem->enclosureType = $attrs["TYPE"];
          $this->currentItem->enclosureLength = $attrs["LENGTH"];
        }
        elseif (isset($attrs["HREF"]) && ((isset($attrs["TYPE"]) && ($attrs["TYPE"] == "text/html") && ((isset($attrs["REL"]) && ($attrs["REL"] == "alternate")) || !isset($attrs["REL"]))) || !isset($attrs["TYPE"]))) {
          $this->currentItem->link = $attrs["HREF"];
        }
      } else {
        if (isset($attrs["HREF"]) && ((isset($attrs["TYPE"]) && ($attrs["TYPE"] == "text/html") && ((isset($attrs["REL"]) && ($attrs["REL"] == "alternate")) || !isset($attrs["REL"]))) || !isset($attrs["TYPE"]))) {
          $this->FeedLink = $attrs["HREF"];
        }
      }
    }
    elseif ($tagName == "CHANNEL") {
      $this->insideChannel = TRUE;
      $this->level_channel = $this->level;
    }
    elseif (($tagName == "IMAGE") && ($this->insideChannel == TRUE)) {
      $this->insideChannelImage = TRUE;
      $this->level_channelImage = $this->level;
    }
    elseif ($tagName == "CONTENT") {
      if ($this->insideItem == TRUE) {
        if (isset($attrs["TYPE"]) && ($attrs["TYPE"] == "xhtml")) {
          //
          // Find the start of the <content ... >
          $this->currentItem->atomContentStartPos = xml_get_current_byte_index($parser);
          if ($this->wholeString[$this->currentItem->atomContentStartPos] != "<") {
            $startToHere = substr($this->wholeString, 0, $this->currentItem->atomContentStartPos);
            $this->currentItem->atomContentStartPos = strrpos($startToHere, "<");
          }
        }
      } else {
        if (isset($attrs["TYPE"]) && ($attrs["TYPE"] == "xhtml")) {
          //
          // Find the start of the <content ... >
          $this->FeedAtomContentStartPos = xml_get_current_byte_index($parser);
          if ($this->wholeString[$this->FeedAtomContentStartPos] != "<") {
            $startToHere = substr($this->wholeString, 0, $this->FeedAtomContentStartPos);
            $this->FeedAtomContentStartPos = strrpos($startToHere, "<");
          }
        }
      }
    }
    if (FeedForAll_parseExtensions() === TRUE) {
      FeedForAll_parseExtensions_startElemend($parser, $this, $tagName, $attrs);
    }
  }

  function endElement($parser, $tagName) {
    GLOBAL $debugLevel;

    $this->tag = "";
    $this->level--;
    if (($this->insideItem) && ($tagName == "CATEGORY")) {
      $this->currentItem->categoryArray[] = Array("Category" => $this->currentItem->category, "Domain" => $this->currentItem->categoryDomain);
      $this->currentItem->category = "";
      $this->currentItem->categoryDomain = "";
    }
    elseif ((($tagName == "ITEM") && ($this->feedTYPE != "FEE")) || (($tagName == "ENTRY") && ($this->feedTYPE == "FEE"))) {
      if (isset($debugLevel) && ($debugLevel >= 2)) {
        echo "DIAG: endElement(\$parser, $tagName)<br>\n";
      }
      
      $this->UseItem = TRUE;

      //
      // Do any special processing to convert ATOM to RSS 2.0
      if ($this->feedTYPE == "FEE") {
        if ($this->currentItem->guid == "") {
          // There was no GUID, use ID
          $this->currentItem->guid = $this->currentItem->atomID;
          $this->currentItem->guidIsPermaLink = "false";
        }
      }
      
      //
      // The the whole item string
      $pos = xml_get_current_byte_index($parser);
      //
      // Find the element that opened this all up.
      $endingString = '</'.substr($this->wholeString, $this->currentItem->ItemStartPos+1, 4);
      if ($endingString == substr($this->wholeString, $pos, 6)) {
        // We are good just where we are
      } else {
        for (;$pos > 0; $pos--) {
          /* Look for a closing angle */
          if ($endingString == substr($this->wholeString, $pos, 6)) break;
        }
      }
      $pos++;
      $hereToEnd = substr($this->wholeString, $pos);
      $closePos = strpos($hereToEnd, '>');
      $this->currentItem->itemFullText = substr($this->wholeString, $this->currentItem->ItemStartPos, $pos + $closePos - $this->currentItem->ItemStartPos+1);

      //
      // Get the pubDate from pubDate first and then dc:date
      if (trim($this->currentItem->pubDate) != "") {
        $this->currentItem->pubDate = trim($this->currentItem->pubDate);
        $this->currentItem->pubDate_t = strtotime($this->currentItem->pubDate);
      }
      elseif (($this->feedTYPE == "FEE") && (trim($this->currentItem->atomUpdated) != "")) {
        $this->currentItem->atomUpdated = trim($this->currentItem->atomUpdated);
        $this->currentItem->pubDate_t = FeedForAll_scripts_getRFDdate($this->currentItem->atomUpdated);
        $this->currentItem->pubDate = date("D, d M Y H:i:s O", $this->currentItem->pubDate_t);
      }
      elseif (trim($this->currentItem->pubDateDC) != "") {
        $this->currentItem->pubDate_t = FeedForAll_scripts_getRFDdate($this->currentItem->pubDateDC);
        $this->currentItem->pubDate = date("D, d M Y H:i:s O", $this->currentItem->pubDate_t);
      } else {
        $this->currentItem->pubDate_t = time();
        $this->currentItem->pubDate = date("D, d M Y H:i:s O", $this->currentItem->pubDate_t);
      }

      if (($this->operateAs == "rssFilter") && function_exists("rssFilter_useItem")) {
        GLOBAL $_REQUEST;

        $this->UseItem = rssFilter_useItem($this->currentItem);

        if (isset($_REQUEST["testScript"])) {
          if ($this->UseItem) {
            echo "USING Item: ".htmlentities($this->currentItem->title)."<br>\n";
          } else {
            echo "NOT Using: ".htmlentities($this->currentItem->title)."<br>\n";
          }
        }
      }

      if ($this->operateAs == "rssMesh") {
        if (($this->itemLimit >= 0) && (count($this->Items) >= $this->itemLimit)) {
          $this->UseItem = FALSE;
        }
      }
      elseif ($this->operateAs == "rss2html") {
        if (($useUniq = FeedForAll_rss2html_UseUniqueLink($this->currentItem->title, $this->currentItem->description, $this->currentItem->link, $this->currentItem->guid)) != -1) {
          if ($useUniq == 0) {
            if (isset($debugLevel) && ($debugLevel >= 2)) {
              echo "DIAG: FeedForAll_rss2html_UseUniqueLink() => 0, Not using<br>\n";
            }

            $this->UseItem = FALSE;
          }
        }
        if ($this->noFutureItems) {
          if (($this->currentItem->pubDate_t - $this->noon_t) > 43200) {
            if (isset($debugLevel) && ($debugLevel >= 2)) {
              echo "DIAG: future pubdate, Not using<br>\n";
            }
            $this->UseItem = FALSE;
          }
        }
      }

      if ($this->UseItem) {
        if (isset($debugLevel) && ($debugLevel >= 2)) {
          echo "DIAG: Using item \"".$this->currentItem->title."\"<br>\n";
        }
        
        //
        // Clean up some of the values
        $this->currentItem->title = trim($this->currentItem->title);
        $this->currentItem->description = trim($this->currentItem->description);
        if ($this->feedTYPE == "FEE") {
          $this->currentItem->atomContent = trim($this->currentItem->atomContent);
          if ($this->currentItem->atomContent != "") {
            $this->currentItem->description = $this->currentItem->atomContent;
          } else {
            $this->currentItem->description = trim($this->currentItem->description);
          }
        } else {
          $this->currentItem->description = $this->currentItem->description;
        }
        if (trim($this->currentItem->contentEncoded) == "") {
          if  ($this->operateAs != "rssMesh") {
            $this->currentItem->contentEncoded = $this->currentItem->description;
          }
        } else {
          $this->currentItem->contentEncoded = trim($this->currentItem->contentEncoded);
        }
        if (trim($this->currentItem->description) == "") {
          $this->currentItem->description = trim($this->currentItem->contentEncoded);
        }
        $this->currentItem->link = trim($this->currentItem->link);
        $this->currentItem->guid = trim($this->currentItem->guid);
        $this->currentItem->guidIsPermaLink = trim($this->currentItem->guidIsPermaLink);
        if ($this->feedTYPE == "FEE") {
          $this->currentItem->atomAuthorEmail = trim($this->currentItem->atomAuthorEmail);
          $this->currentItem->author = trim($this->currentItem->atomAuthorEmail);
        }
        $this->currentItem->author = trim($this->currentItem->author);
        if ($this->currentItem->creativeCommons == "") {
          $this->currentItem->creativeCommons = trim($this->FeedCreativeCommons);
        } else {
          $this->currentItem->creativeCommons = trim($this->currentItem->creativeCommons);
        }
        if ($this->operateAs == "rss2sql") {
          if (($this->currentItem->source == "") && ($this->sourceFeedURL != "")) {
            $this->currentItem->source = $this->FeedTitle;
            $this->currentItem->sourceURL = $this->sourceFeedURL;
          }
        }
        $this->currentItem->source = trim($this->currentItem->source);
        $this->currentItem->sourceURL = trim($this->currentItem->sourceURL);
        $this->currentItem->enclosureURL = trim($this->currentItem->enclosureURL);
        $this->currentItem->enclosureLength = trim($this->currentItem->enclosureLength);
        $this->currentItem->enclosureType = trim($this->currentItem->enclosureType);
        $this->currentItem->comments = trim($this->currentItem->comments);
        $this->currentItem->rssMeshExtra = trim($this->currentItem->rssMeshExtra);
        $this->currentItem->rssMeshExtra1 = trim($this->currentItem->rssMeshExtra1);
        $this->currentItem->rssMeshExtra2 = trim($this->currentItem->rssMeshExtra2);
        $this->currentItem->rssMeshExtra3 = trim($this->currentItem->rssMeshExtra3);
        $this->currentItem->rssMeshFeedImageTitle = trim($this->currentItem->rssMeshFeedImageTitle);
        $this->currentItem->rssMeshFeedImageUrl = trim($this->currentItem->rssMeshFeedImageUrl);
        $this->currentItem->rssMeshFeedImageLink = trim($this->currentItem->rssMeshFeedImageLink);
        $this->currentItem->rssMeshFeedImageDescription = trim($this->currentItem->rssMeshFeedImageDescription);
        $this->currentItem->rssMeshFeedImageHeight = trim($this->currentItem->rssMeshFeedImageHeight);
        $this->currentItem->rssMeshFeedImageWidth = trim($this->currentItem->rssMeshFeedImageWidth);
        if ($this->operateAs == "rss2html") {
          //
          // Escape any links
          $this->currentItem->link = FeedForAll_rss2html_EscapeLink($this->currentItem->link);
          $this->currentItem->guid = FeedForAll_rss2html_EscapeLink($this->currentItem->guid);
          $this->currentItem->creativeCommons = FeedForAll_rss2html_EscapeLink($this->currentItem->creativeCommons);
          $this->currentItem->sourceURL = FeedForAll_rss2html_EscapeLink($this->currentItem->sourceURL);
          $this->currentItem->enclosureURL = FeedForAll_rss2html_EscapeLink($this->currentItem->enclosureURL);
          $this->currentItem->comments = FeedForAll_rss2html_EscapeLink($this->currentItem->comments);
          $this->currentItem->rssMeshFeedImageUrl = FeedForAll_rss2html_EscapeLink($this->currentItem->rssMeshFeedImageUrl);
          $this->currentItem->rssMeshFeedImageLink = FeedForAll_rss2html_EscapeLink($this->currentItem->rssMeshFeedImageLink);
        }
        
        //
        if ($this->currentItem->contentEncodedUsed) {
          $this->contentEncodedUsed = 1;
        }
        if (FeedForAll_parseExtensions() === TRUE) {
          FeedForAll_parseExtensions_endElemend($parser, $this, $tagName);
        }
        if ($this->UseItem) {
          $this->Items[] = $this->currentItem;
          if (isset($debugLevel) && ($debugLevel >= 3)) {
            echo "DIAG: adding to items, count=".count($this->Items)."<br>\n";
          }
        }
      } else {
        unset($this->currentItem);
      }
      $this->insideItem = FALSE;
      $this->level_item = 0;
      return;
    }
    elseif ($this->insideAtomAuthor && ($tagName == "AUTHOR")) {
      $this->insideAtomAuthor = FALSE;
    }
    elseif (($tagName == "IMAGE") && ($this->insideChannelImage)) {
      $this->FeedImageTitle = trim($this->FeedImageTitle);
      $this->FeedImageURL = trim($this->FeedImageURL);
      $this->FeedImageLink = trim($this->FeedImageLink);
      $this->FeedImageDescription = trim($this->FeedImageDescription);
      $this->FeedImageHeight = trim($this->FeedImageHeight);
      $this->FeedImageWidth = trim($this->FeedImageWidth);
      if ($this->operateAs == "rss2html") {
        //
        // Escape any links
        $this->FeedImageURL = FeedForAll_rss2html_EscapeLink($this->FeedImageURL);
        $this->FeedImageLink = FeedForAll_rss2html_EscapeLink($this->FeedImageLink);
      }
      if (FeedForAll_parseExtensions() === TRUE) {
        FeedForAll_parseExtensions_endElemend($parser, $this, $tagName);
      }
      $this->insideChannelImage = FALSE;
      $this->level_channelImage = 0;
      return;
    }
    elseif ((($tagName == "CHANNEL") && ($this->feedTYPE != "FEE")) || (($tagName == "FEED") && ($this->feedTYPE == "FEE"))) {
      $this->FeedPubDate = trim($this->FeedPubDate);
      $this->FeedPubDateDC = trim($this->FeedPubDateDC);
      $this->FeedAtomUpdated = trim($this->FeedAtomUpdated);
      //
      // Get the pubDate from pubDate first and then dc:date
      if (trim($this->FeedPubDate) != "") {
        $this->FeedPubDate_t = strtotime($this->FeedPubDate);
      }
      elseif (($this->feedTYPE == "FEE") && ($this->FeedAtomUpdated != "")) {
        $this->FeedAtomUpdated = trim($this->FeedAtomUpdated);
        $this->FeedPubDate_t = FeedForAll_scripts_getRFDdate($this->FeedAtomUpdated);
        $this->FeedPubDate = date("D, d M Y H:i:s O", $this->FeedPubDate_t);
      }
      elseif (trim($this->FeedPubDateDC) != "") {
        $this->FeedPubDate_t = FeedForAll_scripts_getRFDdate($this->FeedPubDateDC);
        $this->FeedPubDate = date("D, d M Y H:i:s O", $this->FeedPubDate_t);
      }
      elseif (trim($this->FeedLastBuildDate) != "") {
        $this->FeedPubDate_t = strtotime($this->FeedLastBuildDate);
        $this->FeedPubDate = date("D, d M Y H:i:s O", $this->FeedPubDate_t);
      } else {
        $this->FeedPubDate_t = time();
        $this->FeedPubDate = date("D, d M Y H:i:s O", $this->FeedPubDate_t);
      }
      $this->FeedTitle = trim($this->FeedTitle);
      if ($this->feedTYPE == "FEE") {
        $this->FeedAtomContent = trim($this->FeedAtomContent);
        $this->FeedDescription = $this->FeedAtomContent;
      } else {
        $this->FeedDescription = $this->FeedDescription;
      }
      if (trim($this->FeedContentEncoded) == "") {
        $this->FeedContentEncoded = $this->FeedDescription;
      }
      $this->FeedLink = trim($this->FeedLink);
      if ($this->operateAs == "rss2html") {
        //
        // Escape any links
        $this->FeedLink = FeedForAll_rss2html_EscapeLink($this->FeedLink);
        $this->FeedCreativeCommons = FeedForAll_rss2html_EscapeLink($this->FeedCreativeCommons);
      }
      if (FeedForAll_parseExtensions() === TRUE) {
        FeedForAll_parseExtensions_endElemend($parser, $this, $tagName);
      }
      $this->insideChannel = FALSE;
      $this->level_channel = 0;
      return;
    }
    elseif ($this->level == $this->level_channel) {
      if ($tagName == "TITLE") {
        $this->FeedTitle = trim($this->FeedTitle);
      }
      elseif (($tagName == "DESCRIPTION") || ($tagName == "TAGLINE")) {
        $this->FeedDescription = trim($this->FeedDescription);
      }
      elseif ($tagName == "CONTENT:ENCODED") {
        $this->FeedContentEncoded = trim($this->FeedContentEncoded);
      }
      elseif ($tagName == "LINK") {
        $this->FeedLink = trim($this->FeedLink);
      }
    }
    elseif ($tagName == "CONTENT") {
      if ($this->insideItem == TRUE) {
        // Lets look to see if the content is
        if ($this->currentItem->atomContentStartPos) {
          //
          // The the whole <content ... > string
          $pos = xml_get_current_byte_index($parser);
          for (;$pos > 0; $pos--) {
            /* Look for a closing angle */
            if ($this->wholeString[$pos] == ">") break;
          }
          $pos++;
          $hereToEnd = substr($this->wholeString, $pos);
          $closePos = strpos($hereToEnd, ">");
          $fullContentText = substr($this->wholeString, $this->currentItem->atomContentStartPos, $pos + $closePos - $this->currentItem->atomContentStartPos+1);
          // Find the end of <content
          $start = strpos($fullContentText, ">");
          $fullContentText = substr($fullContentText, $start+1);
          // Find the end of <div
          $start = strpos($fullContentText, ">");
          $fullContentText = substr($fullContentText, $start+1);
          // Find the start of </content
          $start = strrpos($fullContentText, "<");
          $fullContentText = substr($fullContentText, 0, $start-1);
          // Find the start of </div
          $start = strrpos($fullContentText, "<");
          $this->currentItem->atomContent = substr($fullContentText, 0, $start-1);
          $this->currentItem->atomContentStartPos = 0;
        }
      } else {
        // Lets look to see if the content is
        if ($this->FeedAtomContentStartPos) {
          //
          // The the whole <content ... > string
          $pos = xml_get_current_byte_index($parser);
          for (;$pos > 0; $pos--) {
            /* Look for a closing angle */
            if ($this->wholeString[$pos] == ">") break;
          }
          $pos++;
          $hereToEnd = substr($this->wholeString, $pos);
          $closePos = strpos($hereToEnd, ">");
          $fullContentText = substr($this->wholeString, $this->FeedAtomContentStartPos, $pos + $closePos - $this->FeedAtomContentStartPos+1);
          // Find the end of <content
          $start = strpos($fullContentText, ">");
          $fullContentText = substr($fullContentText, $start+1);
          // Find the end of <div
          $start = strpos($fullContentText, ">");
          $fullContentText = substr($fullContentText, $start+1);
          // Find the start of </content
          $start = strrpos($fullContentText, "<");
          $fullContentText = substr($fullContentText, 0, $start-1);
          // Find the start of </div
          $start = strrpos($fullContentText, "<");
          $this->FeedAtomContent = substr($fullContentText, 0, $start-1);
          $this->FeedAtomContentStartPos = 0;
        }
      }
    }
    if (FeedForAll_parseExtensions() === TRUE) {
      FeedForAll_parseExtensions_endElemend($parser, $this, $tagName);
    }
  }

  function characterData($parser, $data) {
    if (($data == "") || ($data == NULL)) {
    } else {
      if (($this->insideItem) && ($this->level == $this->level_item+1)) {
        switch ($this->tag) {
          case "TITLE":
          $this->currentItem->title .= $data;
          break;

          case "DESCRIPTION":
          $this->currentItem->description .= $data;
          break;

          case "CONTENT:ENCODED":
          $this->currentItem->contentEncodedUsed = 1;
          $this->currentItem->contentEncoded .= $data;
          break;

          case "SUMMARY":
          $this->currentItem->description .= $data;
          break;

          case "LINK":
          $this->currentItem->link .= $data;
          break;

          case "PUBDATE":
          $this->currentItem->pubDate .= $data;
          break;

          case "MODIFIED":
          $this->currentItem->pubDateDC .= $data;
          break;

          case "GUID":
          $this->currentItem->guid .= $data;
          break;
          
          case "ID":
          case "ATOM:ID":
          $this->currentItem->atomID .= $data;
          break;

          case "AUTHOR":
          $this->currentItem->author .= $data;
          break;

          case "COMMENTS":
          $this->currentItem->comments .= $data;
          break;

          case "SOURCE":
          $this->currentItem->source .= $data;
          break;

          case "CATEGORY":
          $this->currentItem->category .= $data;
          break;

          case "CREATIVECOMMONS:LICENSE":
          $this->currentItem->creativeCommons .= $data;
          break;

          case "RSSMESH:EXTRA":
          $this->currentItem->rssMeshExtra .= $data;
          break;

          case "RSSMESH:EXTRA1":
          $this->currentItem->rssMeshExtra1 .= $data;
          break;

          case "RSSMESH:EXTRA2":
          $this->currentItem->rssMeshExtra2 .= $data;
          break;

          case "RSSMESH:EXTRA3":
          $this->currentItem->rssMeshExtra3 .= $data;
          break;

          case "RSSMESH:FEEDIMAGETITLE":
          $this->currentItem->rssMeshFeedImageTitle .= $data;
          break;

          case "RSSMESH:FEEDIMAGEURL":
          $this->currentItem->rssMeshFeedImageUrl .= $data;
          break;

          case "RSSMESH:FEEDIMAGELINK":
          $this->currentItem->rssMeshFeedImageLink .= $data;
          break;

          case "RSSMESH:FEEDIMAGEDESCRIPTION":
          $this->currentItem->rssMeshFeedImageDescription .= $data;
          break;

          case "RSSMESH:FEEDIMAGEHEIGHT":
          $this->currentItem->rssMeshFeedImageHeight .= $data;
          break;

          case "RSSMESH:FEEDIMAGEWIDTH":
          $this->currentItem->rssMeshFeedImageWidth .= $data;
          break;

          case "UPDATED":
          case "ATOM:UPDATED":
          $this->currentItem->atomUpdated .= $data;
          break;
          
          case "CONTENT":
          case "ATOM:CONTENT":
          $this->currentItem->atomContent .= $data;
          break;
          
          default:
          if ($this->tag == "DC:DATE") {
            $this->currentItem->pubDateDC .= $data;
          }
          if (FeedForAll_parseExtensions() === TRUE) {
            FeedForAll_parseExtensions_characterData($parser, $this, $data);
          }
        }
      }
      elseif ($this->insideChannelImage) {
        switch ($this->tag) {
          case "TITLE":
          $this->FeedImageTitle .= $data;
          break;

          case "URL":
          $this->FeedImageURL .= $data;
          break;

          case "LINK":
          $this->FeedImageLink .= $data;
          break;

          case "DESCRIPTION":
          $this->FeedImageDescription .= $data;
          break;

          case "HEIGHT":
          $this->FeedImageHeight .= $data;
          break;

          case "WIDTH":
          $this->FeedImageWidth .= $data;
          break;

          default:
          if (FeedForAll_parseExtensions() === TRUE) {
            FeedForAll_parseExtensions_characterData($parser, $this, $data);
          }
        }
      }
      elseif (($this->insideChannel) && ($this->level == $this->level_channel+1)) {
        switch ($this->tag) {
          case "TITLE":
          $this->FeedTitle .= $data;
          break;

          case "DESCRIPTION":
          $this->FeedDescription .= $data;
          break;

          case "CONTENT:ENCODED":
          $this->FeedContentEncoded .= $data;
          break;

          case "TAGLINE":
          $this->FeedDescription .= $data;
          break;

          case "LINK":
          $this->FeedLink .= $data;
          break;

          case "PUBDATE":
          $this->FeedPubDate .= $data;
          break;

          case "MODIFIED":
          $this->FeedPubDateDC .= $data;
          break;

          case "LASTBUILDDATE":
          $this->FeedLastBuildDate .= $data;
          break;

          case "CREATIVECOMMONS:LICENSE":
          $this->FeedCreativeCommons .= $data;
          break;

          case "UPDATED":
          case "ATOM:UPDATED":
          $this->FeedAtomUpdated .= $data;
          break;
          
          case "CONTENT":
          case "ATOM:CONTENT":
          $this->FeedAtomContent .= $data;
          break;
          
          default:
          if ($this->tag == "DC:DATE") {
            $this->FeedPubDateDC .= $data;
          }
          if (FeedForAll_parseExtensions() === TRUE) {
            FeedForAll_parseExtensions_characterData($parser, $this, $data);
          }
        }
      }
      elseif (($this->insideAtomAuthor) && ($this->insideItem) && ($this->level == $this->level_item+2)) {
        switch ($this->tag) {
          case "EMAIL":
          case "ATOM:EMAIL":
          $this->currentItem->atomAuthorEmail .= $data;
          break;
          
          default:
          if (FeedForAll_parseExtensions() === TRUE) {
            FeedForAll_parseExtensions_characterData($parser, $this, $data);
          }
        }
      }
      elseif (($this->insideAtomAuthor) && ($this->insideChannel) && ($this->level == $this->level_channel+2)) {
        switch ($this->tag) {
          case "EMAIL":
          case "ATOM:EMAIL":
          $this->FeedAtomAuthorEmail .= $data;
          break;
          
          default:
          if (FeedForAll_parseExtensions() === TRUE) {
            FeedForAll_parseExtensions_characterData($parser, $this, $data);
          }
        }
      } else {
        if (FeedForAll_parseExtensions() === TRUE) {
          FeedForAll_parseExtensions_characterData($parser, $this, $data);
        }
      }
    }
  }
}

if (function_exists("FeedForAll_parseExtensions_extendParserClass")) {
  $currentBaseClassName = FeedForAll_parseExtensions_extendParserClass("rootRSSParserClass");
} else {
  $currentBaseClassName = "rootRSSParserClass";
}
eval('class baseParserClassWithExtensions extends ' . $currentBaseClassName . ' {
  Function baseParserClassWithExtensions($operateAs) {
    $this->' . $currentBaseClassName . '($operateAs);
  }
}');

class baseParserClass extends baseParserClassWithExtensions {
  Function baseParserClass($operateAs) {
    $parentClass = get_parent_class($this);
    $this->$parentClass($operateAs);
  }
}

?>
