<?PHP
//
// rss2html.php RSS feed to HTML webpage script
//
// Copyright 2004-2006 NotePage, Inc.
// http://www.feedforall.com
//
// This script may be used and modified freely for business or personal use
// This script may not be resold in any form
// This script may only be redistributed in its original form
//
//
// $Id: rss2html.php,v 2.30 2006/05/28 17:52:10 housley Exp $
//

//
// ==========================================================================
// Configuration options
// ==========================================================================
//
// Set the following variable useFopenURL to one if you want/need to use 
// fopen() instead of CURL
$useFopenURL = 0;

//
// If XLMFILE is passed as part of the URL, XMLFILE=, then it will be used
// otherwise the the file below is used.
//$XMLfilename = "http://examlple.com/sample.xml";
$XMLfilename = "https://sourceforge.net/p/stellarium/news/feed";

//
// If TEMPLATE is passed as part of the URL. TEMPLATE=, then it will be used
// otherwise the the file below is used.
//$TEMPLATEfilename = "http://examlple.com/sample-template.html";
$TEMPLATEfilename = "rss2html/template.html";

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
$ShortDateFormat = "Y/m/d";     // ie, "21/1/2004"
//$ShortDateFormat = "d/m/Y";     // ie, "21/1/2004"
$LongTimeFormat = "H:i:s T O";  // ie, "13:24:30 EDT -0400"
$ShortTimeFormat = "h:i A";     // ie, "1:24 PM"

//
// Timezone - If your server is not in the same timezone as you are the timezone
// of the times and dates produced in the above from can be controlled with the
// below code.  Just uncomment the following line and change the desired time
// offset.
// putenv("TZ=+04:00");

//
// Registered user of FeedForAll and FeedForAll Mac product(s) have access
// to a caching module.  This enables it's use if it is installed.
$allowCachingXMLFiles = 0;

// ==========================================================================
// Below this point of the file there are no user editable options.  Your
// are welcome to make any modifications that you wish to any of the code
// below, but that is not necessary for normal use.
// ==========================================================================

// $Log: rss2html.php,v $
// Revision 2.30  2006/05/28 17:52:10  housley
// Handle no encoding specified in the feed
//
// Revision 2.28  2006/05/28 14:21:47  housley
// Add additional capabilities to work with enclosures.  The 3 new fields are ~~~ItemEnclosureType~~~, ~~~ItemEnclosureLength~~~ and ~~~ItemEnclosureLengthFormatted~~~
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
// Add an interface to allow FeedForAll_rss2html_readFile() to be replaced
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

// Look for lines which start with "- " and consider them list items
// mark them as an <ul>
function makeHtmlList ($txt) {
	$ret = "";
	$inList = 0;
	foreach (explode("<br />", $txt) as $line)
	{
		$liFound = 0;
		$line = chop($line);

		if (preg_match("/^ ?- (.*)$/", $line, $match) !== FALSE) {
			if (($match[0] != "") && ($match[1] != "")) {
				$liFound = 1;
				$line = $match[1];
			}
		}

		if ($liFound) {
			$sl = "";
			if ($inList==0) {
				$inList = 1;
				$sl = "<ul>\n";
			}
			$line = "$sl<li>$line</li>";
		}
		else {
			$el = "";
			if ($inList==1) {
				$inList = 0;
				$el = "</ul>\n";
			}
			if ($line=="") {
				$line = "$el";
			}
			else {
				$line = "$el<p>$line</p>";
			}
		}

		$ret .= "    $line\n";
	}
	return $ret;
}

if ($useFopenURL) {
  ini_set("allow_url_fopen", "1");
  ini_set("user_agent", 'FeedForAll rss2html.php v2');
}

@include("FeedForAll_Scripts_CachingExtension.php");

if (function_exists("FeedForAll_rss2html_readFile") === FALSE) {
  Function FeedForAll_rss2html_readFile($filename, $useFopenURL, $useCaching = 0) {
    if ($useCaching);
    
    $GLOBALS["ERRORSTRING"] = "";
    $result = "";
    if (stristr($filename, "://")) {
      if ($useFopenURL) {
        if (($fd = @fopen($filename, "rb")) === FALSE) {
          return FALSE;
        }
        while (($data = fread($fd, 4096)) != "") {
          $result .= $data;
        }
        fclose($fd);
      } else {
        // This is a URL so use CURL
        $curlHandle = curl_init();
        curl_setopt($curlHandle, CURLOPT_URL, $filename);
        curl_setopt($curlHandle, CURLOPT_HEADER, 0);
        curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curlHandle, CURLOPT_USERAGENT, "FeedForAll rss2html.php v2");
        //    curl_setopt($curlHandle, CURLOPT_AUTOREFERER, 1);
        curl_setopt($curlHandle, CURLOPT_REFERER, $filename);
        curl_setopt($curlHandle, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($curlHandle, CURLOPT_MAXREDIRS, 10);
        $result = curl_exec($curlHandle);
        if (curl_errno($curlHandle)) {
          $GLOBALS["ERRORSTRING"] = curl_error($curlHandle);
          curl_close($curlHandle);
          return FALSE;
        }
        curl_close($curlHandle);
      }
    } else {
      // This is a local file, so use fopen
      if (($fd = @fopen($filename, "rb")) === FALSE) {
        return FALSE;
      }
      while (($data = fread($fd, 4096)) != "") {
        $result .= $data;
      }
      fclose($fd);
    }
    return $result;
  }
}

if (function_exists("FeedForAll_rss2html_convertEncoding") === FALSE) {
  Function FeedForAll_rss2html_convertEncoding($XMLstring) {
    $results = NULL;
    
    if (function_exists("mb_convert_encoding") === FALSE) return $XMLstring;
    
    if (preg_match("/<\?xml(.*)\?>/", $XMLstring, $results) === FALSE) return $XMLstring;

    if (count($results) == 0) return $XMLstring;

    $results = str_replace(" ", "", $results);
    $results = str_replace("'", "\"", $results);

    if (($location = stristr($results[0], "encoding=")) === FALSE) return $XMLstring;

    $parts = split("\"", $location);

    if (($newResult = mb_convert_encoding($XMLstring, "UTF-8", $parts[1])) === FALSE) {
      return $XMLstring;
    }
    
    return $newResult;
  }
}

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

if (!isset($_REQUEST["buildURL"])) {
  if (isset($_REQUEST["XMLFILE"])) {
    if (stristr($_REQUEST["XMLFILE"], "file://")) {
      // Not allowed
      ;
    }
    elseif (stristr($_REQUEST["XMLFILE"], "://")) {
      // URL files are allowed
      $XMLfilename = $_REQUEST["XMLFILE"];
    } else {
      // It is local and must be in the same directory
      $XMLfilename = basename($_REQUEST["XMLFILE"]);
    }
  }

  if (isset($_REQUEST["TEMPLATE"])) {
    if (stristr($_REQUEST["TEMPLATE"], "file://")) {
      // Not allowed
      ;
    }
    elseif (stristr($_REQUEST["TEMPLATE"], "://")) {
      // URL files are allowed
      $TEMPLATEfilename = $_REQUEST["TEMPLATE"];
    } else {
      // It is local and must be in the same directory
      $TEMPLATEfilename = basename($_REQUEST["TEMPLATE"]);
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

  $FeedMaxItems = 5;
  if (isset($_REQUEST["MAXITEMS"])) {
    $FeedMaxItems = $_REQUEST["MAXITEMS"];
  }
  $NoFutureItems = FALSE;
  if (isset($_REQUEST["NOFUTUREITEMS"])) {
    $NoFutureItems = TRUE;
  }

  //
  // As much as I hate globals, they are needed due to the
  // recusive nature of the parser
  $insidechannel = FALSE;
  $level_channel = 0;
  $insidechannelimage = FALSE;
  $level_channelimage = 0;
  $insideitem = FALSE;
  $level_item = 0;

  if (function_exists("FeedForAll_rss2html_getRFDdate") === FALSE) {
    Function FeedForAll_rss2html_getRFDdate($datestring) {
      $year = substr($datestring, 0, 4);
      $month = substr($datestring, 5, 2);
      $day = substr($datestring, 8, 2);
      $hour = substr($datestring, 11, 2);
      $minute = substr($datestring, 14, 2);
      $second = substr($datestring, 17, 2);
      if (substr($datestring, 19, 1) == "Z") {
        $offset_hour = 0;
        $offset_minute = 0;
      } else {
        if (substr($datestring, 19, 1) == "-") {
          $offset_hour = substr($datestring, 20, 2);
          $offset_minute = substr($datestring, 23, 2);
        } else {
          $offset_hour = -1*substr($datestring, 20, 2);
          $offset_minute = -1*substr($datestring, 23, 2);
        }
      }
      return gmmktime($hour+$offset_hour, $minute+$offset_minute, $second, $month, $day, $year);
    }

    class FeedForAll_rss2html_RSSParser {
      var $gotROOT = 0;
      var $feedTYPE = "RSS";
      var $level = 0;
      var $tag = "";
      var $title = "";
      var $description = "";
      var $contentEncoded = "";
      var $link = "";
      var $guid = "";
      var $enclosureURL = "";
      var $enclosureType = "";
      var $enclosureLength = "";
      var $pubdate = "";
      var $pubdateDC = "";
      var $author = "";
      var $DcCreator = "";
      var $creativeCommons = "";
      var $fimageURL = "";
      var $fimageTitle = "";
      var $fimageLink = "";

      var $FeedTitle = "";
      var $FeedDescription = "";
      var $FeedContentEncoded = "";
      var $FeedLink = "";
      var $FeedPubDate = "";
      var $FeedPubDateDC = "";
      var $FeedPubDate_t = "";
      var $FeedLastBuildDate = "";
      var $FeedImageURL = "";
      var $FeedImageTitle = "";
      var $FeedImageLink = "";
      var $FeedCreateiveCommons = "";
      // When adding new Item elements, be sure to update the sort below
      var $ItemTitle = Array();
      var $ItemDescription = Array();
      var $ItemContentEncoded = Array();
      var $ItemLink = Array();
      var $ItemGuid = Array();
      var $ItemPubDate = Array();
      var $ItemPubDate_t = Array();
      var $ItemEnclosureURL = Array();
      var $ItemEnclosureType = Array();
      var $ItemEnclosureLength = Array();
      var $ItemAuthor = Array();
      var $ItemCreateiveCommons = Array();

      function startElement($parser, $tagName, $attrs) {
        GLOBAL $insidechannel;
        GLOBAL $level_channel;
        GLOBAL $insidechannelimage;
        GLOBAL $level_channelimage;
        GLOBAL $insideitem;
        GLOBAL $level_item;

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
            $insidechannel = TRUE;
            $level_channel = 1;
          }
        }
        elseif ((($tagName == "ITEM") && ($this->feedTYPE != "FEE")) || (($tagName == "ENTRY") && ($this->feedTYPE == "FEE"))) {
          $insideitem = TRUE;
          $level_item = $this->level;
        }
        elseif (($insideitem) && ($tagName == "ENCLOSURE")) {
          $this->enclosureURL = $attrs["URL"];
          $this->enclosureType = $attrs["TYPE"];
          $this->enclosureLength = $attrs["LENGTH"];
        }
        elseif (($tagName == "LINK") && ($this->feedTYPE == "FEE")) {
          $this->link = $attrs["HREF"];
        }
        elseif ($tagName == "CHANNEL") {
          $insidechannel = TRUE;
          $level_channel = $this->level;
        }
        elseif (($tagName == "IMAGE") && ($insidechannel = TRUE)) {
          $insidechannelimage = TRUE;
          $level_channelimage = $this->level;
        }
        if ($parser);
      }

      function endElement($parser, $tagName) {
        GLOBAL $insidechannel;
        GLOBAL $level_channel;
        GLOBAL $insidechannelimage;
        GLOBAL $level_channelimage;
        GLOBAL $insideitem;
        GLOBAL $level_item;
        GLOBAL $NoFutureItems;

        $this->level--;
        if ((($tagName == "ITEM") && ($this->feedTYPE != "FEE")) || (($tagName == "ENTRY") && ($this->feedTYPE == "FEE"))) {
          $UseItem = TRUE;

          if ($NoFutureItems) {
            $noon = strtotime("today at 12:00");
            if (trim($this->pubdate) != "") {
              $ItemPubDate = strtotime($this->pubdate);
            }
            else if (trim($this->pubdateDC) != "") {
              $ItemPubDate = FeedForAll_rss2html_getRFDdate($this->pubdateDC);
            } else {
              $ItemPubDate = time();
            }
            if (($ItemPubDate - $noon) > 43200) {
              $UseItem = FALSE;
            }
          }

          if ($UseItem) {
            $this->ItemTitle[] = trim($this->title);
            $this->ItemDescription[] = trim($this->description);
            if (trim($this->contentEncoded) == "") {
              $this->ItemContentEncoded[] = $this->description;
            } else {
              $this->ItemContentEncoded[] = trim($this->contentEncoded);
            }
            $this->ItemLink[] = trim($this->link);
            //
            // Get the pubDate from pubDate first and then dc:date
            if (trim($this->pubdate) != "") {
              $this->ItemPubDate[] = trim($this->pubdate);
              $this->ItemPubDate_t[] = strtotime($this->pubdate);
            }
            else if (trim($this->pubdateDC) != "") {
              $this->ItemPubDate[] = trim($this->pubdateDC);
              $this->ItemPubDate_t[] = FeedForAll_rss2html_getRFDdate($this->pubdateDC);
            } else {
              $this->ItemPubDate[] = date("D, d M Y H:i:s +0000");
              $this->ItemPubDate_t[] = time();
            }
            $this->ItemGuid[] = trim($this->guid);
            $this->ItemEnclosureURL[] = trim($this->enclosureURL);
            $this->ItemEnclosureType[] = trim($this->enclosureType);
            $this->ItemEnclosureLength[] = trim($this->enclosureLength);
            if ($this->author == "") {
              $this->ItemAuthor[] = $this->DcCreator;
            } else {
              $this->ItemAuthor[] = $this->author;
            }
            if ($this->creativeCommons == "") {
              $this->ItemCreateiveCommons[] = $this->FeedCreateiveCommons;
            } else {
              $this->ItemCreateiveCommons[] = $this->creativeCommons;
            }
          }
          $this->title = "";
          $this->description = "";
          $this->contentEncoded = "";
          $this->link = "";
          $this->pubdate = "";
          $this->pubdateDC = "";
          $this->guid = "";
          $this->enclosureURL = "";
          $this->enclosureType = "";
          $this->enclosureLength = "";
          $this->author = "";
          $this->DcCreator = "";
          $this->creativeCommons = "";
          $insideitem = FALSE;
          $level_item = 0;
        }
        elseif (($tagName == "IMAGE") && ($insidechannelimage)) {
          $this->FeedImageURL = trim($this->fimageURL);
          $this->FeedImageTitle = trim($this->fimageTitle);
          $this->FeedImageLink = trim($this->fimageLink);
          $this->fimageURL = "";
          $this->fimageTitle = "";
          $this->fimageLink = "";
          $insidechannelimage = FALSE;
          $level_channelimage = 0;
        }
        elseif ($tagName == "CHANNEL") {
          //
          // Get the pubDate from pubDate first and then dc:date
          if (trim($this->FeedPubDate) != "") {
            $this->FeedPubDate_t = strtotime($this->FeedPubDate);
          }
          else if (trim($this->FeedPubDateDC) != "") {
            $this->FeedPubDate_t = FeedForAll_rss2html_getRFDdate($this->FeedPubDateDC);
          }
          else if (trim($this->FeedLastBuildDate) != "") {
            $this->FeedPubDate_t = strtotime($this->FeedLastBuildDate);
          } else {
            $this->FeedPubDate = date("D, d M Y H:i:s +0000");
            $this->FeedPubDate_t = time();
          }
          $insidechannel = FALSE;
          $level_channel = 0;
        }
        elseif ($this->level == $level_channel) {
          if ($tagName == "TITLE") {
            $this->FeedTitle = trim($this->title);
            $this->title = "";
          }
          elseif (($tagName == "DESCRIPTION") || ($tagName == "TAGLINE")) {
            $this->FeedDescription = trim($this->description);
            $this->description = "";
          }
          elseif ($tagName == "CONTENT:ENCODED") {
            $this->FeedContentEncoded = trim($this->contentEncoded);
            $this->contentEncoded = "";
          }
          elseif ($tagName == "LINK") {
            $this->FeedLink = trim($this->link);
            $this->link = "";
          }
        }
        if ($parser);
      }

      function characterData($parser, $data) {
        GLOBAL $insidechannel;
        GLOBAL $level_channel;
        GLOBAL $insidechannelimage;
        GLOBAL $level_channelimage;
        GLOBAL $insideitem;
        GLOBAL $level_item;

        if (($data == "") || ($data == NULL)) {
        } else {
          if (($insideitem) && ($this->level == $level_item+1)) {
            switch ($this->tag) {
              case "TITLE":
              $this->title .= $data;
              break;

              case "DESCRIPTION":
              $this->description .= $data;
              break;

              case "CONTENT:ENCODED":
              $this->contentEncoded .= $data;
              break;

              case "SUMMARY":
              $this->description .= $data;
              break;

              case "LINK":
              $this->link .= $data;
              break;

              case "PUBDATE":
              $this->pubdate .= $data;
              break;

              case "DC:DATE":
              $this->pubdateDC .= $data;
              break;

              case "MODIFIED":
              $this->pubdateDC .= $data;
              break;

              case "GUID":
              $this->guid .= $data;
              break;

              case "AUTHOR":
              $this->author .= $data;
              break;

              case "DC:CREATOR":
              $this->DcCreator .= $data;
              break;

              case "CREATIVECOMMONS:LICENSE":
              $this->creativeCommons .= $data;
              break;
            }
          }
          elseif ($insidechannelimage) {
            switch ($this->tag) {
              case "TITLE":
              $this->fimageTitle .= $data;
              break;

              case "URL":
              $this->fimageURL .= $data;
              break;

              case "LINK":
              $this->fimageLink .= $data;
              break;
            }
          }
          elseif (($insidechannel) && ($this->level == $level_channel+1)) {
            switch ($this->tag) {
              case "TITLE":
              $this->title .= $data;
              break;

              case "DESCRIPTION":
              $this->description .= $data;
              break;

              case "CONTENT:ENCODED":
              $this->contentEncoded .= $data;
              break;

              case "TAGLINE":
              $this->description .= $data;
              break;

              case "LINK":
              $this->link .= $data;
              break;

              case "PUBDATE":
              $this->FeedPubDate .= $data;
              break;

              case "DC:DATE":
              $this->FeedPubDateDC .= $data;
              break;

              case "MODIFIED":
              $this->FeedPubDateDC .= $data;
              break;

              case "LASTBUILDDATE":
              $this->FeedLastBuildDate .= $data;
              break;

              case "CREATIVECOMMONS:LICENSE":
              $this->FeedCreateiveCommons .= $data;
              break;
            }
          }
        }
        if ($parser);
      }
    }
  }

  if (($template = FeedForAll_rss2html_readFile($TEMPLATEfilename, $useFopenURL)) === FALSE) {
    if ($GLOBALS["ERRORSTRING"] == "") {
      echo "Unable to open template $TEMPLATEfilename, exiting\n";
    } else {
      echo "Unable to open template $TEMPLATEfilename with error <b>$GLOBALS[ERRORSTRING]</b>, exiting\n";
    }
    exit -1;
  }

  if (strstr($template, "~~~NoFutureItems~~~")) {
    $NoFutureItems = TRUE;
  }

  $xml_parser = xml_parser_create("UTF-8");
  $rss_parser = new FeedForAll_rss2html_RSSParser();
  xml_set_object($xml_parser,$rss_parser);
  xml_set_element_handler($xml_parser, "startElement", "endElement");
  xml_set_character_data_handler($xml_parser, "characterData");
  xml_parser_set_option($xml_parser,XML_OPTION_CASE_FOLDING,1);
  if (($XML = FeedForAll_rss2html_readFile($XMLfilename, $useFopenURL, $allowCachingXMLFiles)) === FALSE) {
    if ($GLOBALS["ERRORSTRING"] == "") {
      echo "Unable to open RSS Feed $XMLfilename, exiting\n";
    } else {
      echo "Unable to open RSS Feed $XMLfilename with error <b>$GLOBALS[ERRORSTRING]</b>, exiting\n";
    }
    exit -1;
  }
  $XML = trim(FeedForAll_rss2html_convertEncoding($XML));
  xml_parse($xml_parser, $XML, TRUE);
  xml_parser_free($xml_parser);

  // make sure the channel contentEncoded is not blank
  if ($rss_parser->FeedContentEncoded == "") {
    $rss_parser->FeedContentEncoded = $rss_parser->FeedDescription;
  }
  $template = str_replace("~~~FeedXMLFilename~~~", $XMLfilename, $template);
  $template = str_replace("~~~FeedTitle~~~", FeedForAll_rss2html_limitLength($rss_parser->FeedTitle, $limitFeedTitleLength), $template);
  $template = str_replace("~~~FeedDescription~~~", FeedForAll_rss2html_limitLength($rss_parser->FeedDescription, $limitFeedDescriptionLength), $template);
  $template = str_replace("~~~FeedContentEncoded~~~", $rss_parser->FeedContentEncoded, $template);
  $template = str_replace("~~~FeedLink~~~", $rss_parser->FeedLink, $template);
  $template = str_replace("~~~FeedPubDate~~~", $rss_parser->FeedPubDate, $template);
  $template = str_replace("~~~FeedPubLongDate~~~", date($LongDateFormat, $rss_parser->FeedPubDate_t), $template);
  $template = str_replace("~~~FeedPubShortDate~~~", date($ShortDateFormat, $rss_parser->FeedPubDate_t), $template);
  $template = str_replace("~~~FeedPubLongTime~~~", date($LongTimeFormat, $rss_parser->FeedPubDate_t), $template);
  $template = str_replace("~~~FeedPubShortTime~~~", date($ShortTimeFormat, $rss_parser->FeedPubDate_t), $template);
  $template = str_replace("~~~FeedImageUrl~~~", $rss_parser->FeedImageURL, $template);
  $template = str_replace("~~~FeedImageTitle~~~", $rss_parser->FeedImageTitle, $template);
  $template = str_replace("~~~FeedImageLink~~~", $rss_parser->FeedImageLink, $template);
  $template = str_replace("~~~FeedCreativeCommons~~~", $rss_parser->FeedCreateiveCommons, $template);
  $match = NULL;

  $template = str_replace("~~~NoFutureItems~~~", "", $template);

  // Sort by PubDate if requested
  if (strstr($template, "~~~SortByPubDate~~~")) {
    $template = str_replace("~~~SortByPubDate~~~", "", $template);

    for ($x = 0; $x < count($rss_parser->ItemTitle)-1; $x++)
    {
      for ($y = $x+1; $y < count($rss_parser->ItemTitle); $y++)
      {
        if ($rss_parser->ItemPubDate_t[$x] < $rss_parser->ItemPubDate_t[$y])
        {
          // Swap them
          $swapTemp = $rss_parser->ItemTitle[$x]; $rss_parser->ItemTitle[$x] = $rss_parser->ItemTitle[$y]; $rss_parser->ItemTitle[$y] = $swapTemp;
          $swapTemp = $rss_parser->ItemDescription[$x]; $rss_parser->ItemDescription[$x] = $rss_parser->ItemDescription[$y]; $rss_parser->ItemDescription[$y] = $swapTemp;
          $swapTemp = $rss_parser->ItemContentEncoded[$x]; $rss_parser->ItemContentEncoded[$x] = $rss_parser->ItemContentEncoded[$y]; $rss_parser->ItemContentEncoded[$y] = $swapTemp;
          $swapTemp = $rss_parser->ItemLink[$x]; $rss_parser->ItemLink[$x] = $rss_parser->ItemLink[$y]; $rss_parser->ItemLink[$y] = $swapTemp;
          $swapTemp = $rss_parser->ItemGuid[$x]; $rss_parser->ItemGuid[$x] = $rss_parser->ItemGuid[$y]; $rss_parser->ItemGuid[$y] = $swapTemp;
          $swapTemp = $rss_parser->ItemPubDate[$x]; $rss_parser->ItemPubDate[$x] = $rss_parser->ItemPubDate[$y]; $rss_parser->ItemPubDate[$y] = $swapTemp;
          $swapTemp = $rss_parser->ItemPubDate_t[$x]; $rss_parser->ItemPubDate_t[$x] = $rss_parser->ItemPubDate_t[$y]; $rss_parser->ItemPubDate_t[$y] = $swapTemp;
          $swapTemp = $rss_parser->ItemEnclosureURL[$x]; $rss_parser->ItemEnclosureURL[$x] = $rss_parser->ItemEnclosureURL[$y]; $rss_parser->ItemEnclosureURL[$y] = $swapTemp;
          $swapTemp = $rss_parser->ItemEnclosureType[$x]; $rss_parser->ItemEnclosureType[$x] = $rss_parser->ItemEnclosureType[$y]; $rss_parser->ItemEnclosureType[$y] = $swapTemp;
          $swapTemp = $rss_parser->ItemEnclosureLength[$x]; $rss_parser->ItemEnclosureLength[$x] = $rss_parser->ItemEnclosureLength[$y]; $rss_parser->ItemEnclosureLength[$y] = $swapTemp;
          $swapTemp = $rss_parser->ItemAuthor[$x]; $rss_parser->ItemAuthor[$x] = $rss_parser->ItemAuthor[$y]; $rss_parser->ItemAuthor[$y] = $swapTemp;
          $swapTemp = $rss_parser->ItemCreativeCommons[$x]; $rss_parser->ItemCreativeCommons[$x] = $rss_parser->ItemCreativeCommons[$y]; $rss_parser->ItemCreativeCommons[$y] = $swapTemp;
        }
      }
    }
  }

  // The the maximum items requested
  if (strstr($template, "~~~FeedMaxItems=")) {
    // Limit the maximun number of items displayed
    if (preg_match("/~~~FeedMaxItems=([0-9-]*)~~~/", $template, $match) !== FALSE) {
      if (($match[0] != "") && ($match[1] != "")) {
        $FeedMaxItems = $match[1];
        $template = str_replace("~~~FeedMaxItems=$match[1]~~~", "", $template);
        if (abs($FeedMaxItems) > count($rss_parser->ItemTitle)) {
          if ($FeedMaxItems > 0) {
            $FeedMaxItems = count($rss_parser->ItemTitle);
          } else {
            $FeedMaxItems = -count($rss_parser->ItemTitle);
          }
        }
      }
    }
  }

  //
  // Find the string, if it exists, between the ~~~EndItemsRecord~~~ and ~~~BeginItemsRecord~~~
  //
  while ((strstr($template, "~~~BeginItemsRecord~~~")) !== FALSE) {
    $match = NULL;
    $allitems = NULL;
    $loop_limit = min(abs($FeedMaxItems), count($rss_parser->ItemTitle));
    if (($parts = split("~~~BeginItemsRecord~~~", $template)) !== FALSE) {
      if (($parts = split("~~~EndItemsRecord~~~", $parts[1])) !== FALSE) {
        $WholeBlock = $parts[0];
        //
        // Check for ~~~BeginAlternateItemsRecord~~~
        //
        if (strstr($WholeBlock, "~~~BeginAlternateItemsRecord~~~")) {
          $parts = split("~~~BeginAlternateItemsRecord~~~", $WholeBlock);
          $block1 = $parts[0];
          $block2 = $parts[1];
        } else {
          $block1 = $WholeBlock;
          $block2 = $WholeBlock;
        }
        if ($FeedMaxItems < 0) {
          for ($x = count($rss_parser->ItemTitle)-1; $x >= count($rss_parser->ItemTitle) + $FeedMaxItems; $x--) {
            $item = str_replace("~~~ItemTitle~~~", FeedForAll_rss2html_limitLength($rss_parser->ItemTitle[$x], $limitItemTitleLength), $block1);
            $item = str_replace("~~~ItemDescription~~~", FeedForAll_rss2html_limitLength(makeHtmlList($rss_parser->ItemDescription[$x]), $limitItemDescriptionLength), $item);
            $item = str_replace("~~~ItemContentEncoded~~~", $rss_parser->ItemContentEncoded[$x], $item);
            $item = str_replace("~~~ItemLink~~~", $rss_parser->ItemLink[$x], $item);
            $item = str_replace("~~~ItemPubDate~~~", $rss_parser->ItemPubDate[$x], $item);
            $item = str_replace("~~~ItemGuid~~~", $rss_parser->ItemGuid[$x], $item);
            $item = str_replace("~~~ItemPubLongDate~~~", date($LongDateFormat, $rss_parser->ItemPubDate_t[$x]), $item);
            $item = str_replace("~~~ItemPubShortDate~~~", date($ShortDateFormat, $rss_parser->ItemPubDate_t[$x]), $item);
            $item = str_replace("~~~ItemPubLongTime~~~", date($LongTimeFormat, $rss_parser->ItemPubDate_t[$x]), $item);
            $item = str_replace("~~~ItemPubShortTime~~~", date($ShortTimeFormat, $rss_parser->ItemPubDate_t[$x]), $item);
            $item = str_replace("~~~ItemEnclosureUrl~~~", $rss_parser->ItemEnclosureURL[$x], $item);
            $item = str_replace("~~~ItemEnclosureType~~~", $rss_parser->ItemEnclosureType[$x], $item);
            $item = str_replace("~~~ItemEnclosureLength~~~", $rss_parser->ItemEnclosureLength[$x], $item);
            $item = str_replace("~~~ItemEnclosureLengthFormatted~~~", FeedForAll_rss2html_sizeToString($rss_parser->ItemEnclosureLength[$x]), $item);
            $item = str_replace("~~~ItemAuthor~~~", $rss_parser->ItemAuthor[$x], $item);
            $item = str_replace("~~~ItemCreativeCommons~~~", $rss_parser->ItemCreateiveCommons[$x], $item);
            $allitems .= "<!-- HTML generated from an RSS Feed by rss2html.php, http://www.FeedForAll.com/ a NotePage, Inc. product (http://www.notepage.com/) -->".$item;
            $x--;
            if ($x >= count($rss_parser->ItemTitle) + $FeedMaxItems) {
              //
              // This is at least one more item so use the Alternate definition
              //
              $item = str_replace("~~~ItemTitle~~~", FeedForAll_rss2html_limitLength($rss_parser->ItemTitle[$x], $limitItemTitleLength), $block2);
              $item = str_replace("~~~ItemDescription~~~", FeedForAll_rss2html_limitLength(makeHtmlList($rss_parser->ItemDescription[$x]), $limitItemDescriptionLength), $item);
              $item = str_replace("~~~ItemContentEncoded~~~", $rss_parser->ItemContentEncoded[$x], $item);
              $item = str_replace("~~~ItemLink~~~", $rss_parser->ItemLink[$x], $item);
              $item = str_replace("~~~ItemPubDate~~~", $rss_parser->ItemPubDate[$x], $item);
              $item = str_replace("~~~ItemGuid~~~", $rss_parser->ItemGuid[$x], $item);
              $item = str_replace("~~~ItemPubLongDate~~~", date($LongDateFormat, $rss_parser->ItemPubDate_t[$x]), $item);
              $item = str_replace("~~~ItemPubShortDate~~~", date($ShortDateFormat, $rss_parser->ItemPubDate_t[$x]), $item);
              $item = str_replace("~~~ItemPubLongTime~~~", date($LongTimeFormat, $rss_parser->ItemPubDate_t[$x]), $item);
              $item = str_replace("~~~ItemPubShortTime~~~", date($ShortTimeFormat, $rss_parser->ItemPubDate_t[$x]), $item);
              $item = str_replace("~~~ItemEnclosureUrl~~~", $rss_parser->ItemEnclosureURL[$x], $item);
              $item = str_replace("~~~ItemEnclosureType~~~", $rss_parser->ItemEnclosureType[$x], $item);
              $item = str_replace("~~~ItemEnclosureLength~~~", $rss_parser->ItemEnclosureLength[$x], $item);
              $item = str_replace("~~~ItemEnclosureLengthFormatted~~~", FeedForAll_rss2html_sizeToString($rss_parser->ItemEnclosureLength[$x]), $item);
              $item = str_replace("~~~ItemAuthor~~~", $rss_parser->ItemAuthor[$x], $item);
              $item = str_replace("~~~ItemCreativeCommons~~~", $rss_parser->ItemCreateiveCommons[$x], $item);
              $allitems .= "<!-- HTML generated from an RSS Feed by rss2html.php, http://www.FeedForAll.com/ a NotePage, Inc. product (http://www.notepage.com/) -->".$item;
            }
          }
        } else {
          for ($x = 0; $x < $loop_limit; $x++) {
            $item = str_replace("~~~ItemTitle~~~", FeedForAll_rss2html_limitLength($rss_parser->ItemTitle[$x], $limitItemTitleLength), $block1);
            $item = str_replace("~~~ItemDescription~~~", FeedForAll_rss2html_limitLength(makeHtmlList($rss_parser->ItemDescription[$x]), $limitItemDescriptionLength), $item);
            $item = str_replace("~~~ItemContentEncoded~~~", $rss_parser->ItemContentEncoded[$x], $item);
            $item = str_replace("~~~ItemLink~~~", $rss_parser->ItemLink[$x], $item);
            $item = str_replace("~~~ItemPubDate~~~", $rss_parser->ItemPubDate[$x], $item);
            $item = str_replace("~~~ItemGuid~~~", $rss_parser->ItemGuid[$x], $item);
            $item = str_replace("~~~ItemPubLongDate~~~", date($LongDateFormat, $rss_parser->ItemPubDate_t[$x]), $item);
            $item = str_replace("~~~ItemPubShortDate~~~", date($ShortDateFormat, $rss_parser->ItemPubDate_t[$x]), $item);
            $item = str_replace("~~~ItemPubLongTime~~~", date($LongTimeFormat, $rss_parser->ItemPubDate_t[$x]), $item);
            $item = str_replace("~~~ItemPubShortTime~~~", date($ShortTimeFormat, $rss_parser->ItemPubDate_t[$x]), $item);
            $item = str_replace("~~~ItemEnclosureUrl~~~", $rss_parser->ItemEnclosureURL[$x], $item);
            $item = str_replace("~~~ItemEnclosureType~~~", $rss_parser->ItemEnclosureType[$x], $item);
            $item = str_replace("~~~ItemEnclosureLength~~~", $rss_parser->ItemEnclosureLength[$x], $item);
            $item = str_replace("~~~ItemEnclosureLengthFormatted~~~", FeedForAll_rss2html_sizeToString($rss_parser->ItemEnclosureLength[$x]), $item);
            $item = str_replace("~~~ItemAuthor~~~", $rss_parser->ItemAuthor[$x], $item);
            $item = str_replace("~~~ItemCreativeCommons~~~", $rss_parser->ItemCreateiveCommons[$x], $item);
            $allitems .= "<!-- HTML generated from an RSS Feed by rss2html.php, http://www.FeedForAll.com/ a NotePage, Inc. product (http://www.notepage.com/) -->".$item;
            $x++;
            if ($x < $loop_limit) {
              //
              // This is at least one more item so use the Alternate definition
              //
              $item = str_replace("~~~ItemTitle~~~", FeedForAll_rss2html_limitLength($rss_parser->ItemTitle[$x], $limitItemTitleLength), $block2);
              $item = str_replace("~~~ItemDescription~~~", FeedForAll_rss2html_limitLength(makeHtmlList($rss_parser->ItemDescription[$x]), $limitItemDescriptionLength), $item);
              $item = str_replace("~~~ItemContentEncoded~~~", $rss_parser->ItemContentEncoded[$x], $item);
              $item = str_replace("~~~ItemLink~~~", $rss_parser->ItemLink[$x], $item);
              $item = str_replace("~~~ItemPubDate~~~", $rss_parser->ItemPubDate[$x], $item);
              $item = str_replace("~~~ItemGuid~~~", $rss_parser->ItemGuid[$x], $item);
              $item = str_replace("~~~ItemPubLongDate~~~", date($LongDateFormat, $rss_parser->ItemPubDate_t[$x]), $item);
              $item = str_replace("~~~ItemPubShortDate~~~", date($ShortDateFormat, $rss_parser->ItemPubDate_t[$x]), $item);
              $item = str_replace("~~~ItemPubLongTime~~~", date($LongTimeFormat, $rss_parser->ItemPubDate_t[$x]), $item);
              $item = str_replace("~~~ItemPubShortTime~~~", date($ShortTimeFormat, $rss_parser->ItemPubDate_t[$x]), $item);
              $item = str_replace("~~~ItemEnclosureUrl~~~", $rss_parser->ItemEnclosureURL[$x], $item);
              $item = str_replace("~~~ItemEnclosureType~~~", $rss_parser->ItemEnclosureType[$x], $item);
              $item = str_replace("~~~ItemEnclosureLength~~~", $rss_parser->ItemEnclosureLength[$x], $item);
              $item = str_replace("~~~ItemEnclosureLengthFormatted~~~", FeedForAll_rss2html_sizeToString($rss_parser->ItemEnclosureLength[$x]), $item);
              $item = str_replace("~~~ItemAuthor~~~", $rss_parser->ItemAuthor[$x], $item);
              $item = str_replace("~~~ItemCreativeCommons~~~", $rss_parser->ItemCreateiveCommons[$x], $item);
              $allitems .= "<!-- HTML generated from an RSS Feed by rss2html.php, http://www.FeedForAll.com/ a NotePage, Inc. product (http://www.notepage.com/) -->".$item;
            }
          }
        }
        $template = str_replace("~~~BeginItemsRecord~~~".$WholeBlock."~~~EndItemsRecord~~~", $allitems, $template);
      }
    }
  }

  // Since &apos; is not HTML, but is XML convert.
  $template = str_replace("&apos;", "'", $template);

  echo $template;
} else {
  if (function_exists("FeedForAll_rss2html_encodeURL") === FALSE) {
    Function FeedForAll_rss2html_encodeURL($URLstring) {
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
        }else {
          $result = $result.$URLstring[$x];
        }
      }
      return $result;
    }
  }

  echo "<html><head><title>rss2html.php URL tool</title></head><body bgcolor=\"#EEEEFF\">\n";
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
  
  // Display the entry form
  echo "<center><h1>RSS2HTML.PHP LINK TOOL</h1></center>\n";
  echo "<p>To assist with the with the creation of properly encoded URLs for use with rss2html.php this tool has been created.  Fill in the URLs or file paths for both the XML file and your template file in the boxes below and then click &quot;Submit&quot;.  The program will then return the URLs properly encoded in a string that calls rss2html.php.  You can click on this link to test the results.  The program will also indicate if it was unable to open either of the URLs it was given.</p>\n";
  echo "<form action=\"$_SERVER[PHP_SELF]\" method=\"POST\">\n";
  echo "<input type=\"hidden\" name=\"buildURL\" value=\"1\">\n";
  echo "URL form the XML file: (ie. http://www.myserver.com/file.xml)<br /><input type=\"text\" name=\"XML\" size=\"100\" value=\"$_xml\"><br />\n";
  echo "URL form the template file: (ie. http://www.myserver.com/template.html)<br /><input type=\"text\" name=\"TEMPLATE\" size=\"100\" value=\"$_template\"><br />\n";
  echo "<b>Optional items:</b><br />\n";
  echo "Maximum items: <input type=\"text\" name=\"MAXITEMS\" size=\"5\" value=\"$_maxitems\"> (Use negative numbers for the last X items)<br />\n";
  echo "No future items: <input type=\"checkbox\" name=\"NOFUTUREITEMS\" ";
  if ($_nofutureitems == "on") {
    echo "CHECKED";
  }
  echo "> (Use negative numbers for the last X items)<br />\n";
  echo "<input type=\"submit\" name=\"submit\" value=\"Submit\">\n";
  echo "</form>\n";
  
  $xmlContents = "";
  $templateContents = "";
  
  if (isset($_POST["submit"])) {
    if ($_SERVER["REQUEST_METHOD"] != "POST") {
      exit;
    }
    echo "<hr>\n";
    
    $answer = "";
    $ssi = "";
    $xmlurl = "";
    $templateurl = "";
    if ((isset($_POST["XML"]) && $_POST["XML"] != "") || (isset($_POST["TEMPLATE"]) && $_POST["TEMPLATE"] != "")) {
      $answer .= "http://$_SERVER[SERVER_NAME]$_SERVER[PHP_SELF]?";
    }
    if (isset($_POST["XML"]) && $_POST["XML"] != "") {
      $answer .= "XMLFILE=".FeedForAll_rss2html_encodeURL($_POST["XML"]);
      $ssi .= "XMLFILE=".FeedForAll_rss2html_encodeURL($_POST["XML"]);
      $xmlurl = FeedForAll_rss2html_encodeURL($_POST["XML"]);
    }
    if ((isset($_POST["XML"]) && $_POST["XML"] != "") && (isset($_POST["TEMPLATE"]) && $_POST["TEMPLATE"] != "")) {
      $answer .=  "&amp;";
      $ssi .=  "&amp;";
    }
    if (isset($_POST["TEMPLATE"]) && $_POST["TEMPLATE"] != "") {
      $answer .=  "TEMPLATE=".FeedForAll_rss2html_encodeURL($_POST["TEMPLATE"]);
      $ssi .=  "TEMPLATE=".FeedForAll_rss2html_encodeURL($_POST["TEMPLATE"]);
      $templateurl = FeedForAll_rss2html_encodeURL($_POST["TEMPLATE"]);
    }
    if (isset($_POST["MAXITEMS"]) && $_POST["MAXITEMS"] != "" && intval($_POST["MAXITEMS"] != 0)) {
      $answer .=  "&amp;MAXITEMS=$_POST[MAXITEMS]";
      $ssi .=  "&amp;MAXITEMS=$_POST[MAXITEMS]";
    }
    if (isset($_POST["NOFUTUREITEMS"]) && $_POST["NOFUTUREITEMS"] == "on") {
      $answer .=  "&amp;NOFUTUREITEMS=1";
      $ssi .=  "&amp;NOFUTUREITEMS=1";
    }
    
    echo "<h1>Results</h1>\n";
    
    if (isset($_POST["XML"]) && $_POST["XML"] != "") {
      if (($xmlContents = FeedForAll_rss2html_readFile($_POST["XML"], $useFopenURL)) === FALSE) {
        if ($GLOBALS["ERRORSTRING"] == "") {
          echo "<p>The XML file <b>$_POST[XML]</b> could not be opened.</p>\n";
        } else {
          echo "<p>The XML file <b>$_POST[XML]</b> could not be opened with the error <b>$GLOBALS[ERRORSTRING]</b>.</p>\n";
        }
      } else {
        echo "<p>The XML file <b>$_POST[XML]</b> was SUCCESSFULLY opened</p>\n";
      }
    }
    if (isset($_POST["TEMPLATE"]) && $_POST["TEMPLATE"] != "") {
      if (($templateContents = FeedForAll_rss2html_readFile($_POST["TEMPLATE"], $useFopenURL)) === FALSE) {
        if ($GLOBALS["ERRORSTRING"] == "") {
          echo "<p>The template file <b>$_POST[TEMPLATE]</b> could not be opened.</p>\n";
        } else {
          echo "<p>The template file <b>$_POST[TEMPLATE]</b> could not be opened with the error <b>$GLOBALS[ERRORSTRING]</b>.</p>\n";
        }
      } else {
        echo "<p>The template file <b>$_POST[TEMPLATE]</b> was SUCCESSFULLY opened</p>\n";
      }
    }
    
    if ($xmlurl != "") {
      echo "<p>URL for the XML file properly encoded:<br /><pre>$xmlurl</pre></p>\n";
    }

    if ($templateurl != "") {
      echo "<p>URL for the template file properly encoded:<br /><pre>$templateurl</pre></p>\n";
    }

    echo "<h2>Example Usage</h2>\n";
    
    echo "<p>Click on link to view results: <a href=\"$answer\" target=\"_blank\">$answer</a></p>\n";
    
    echo "<p>Server Side Include:<br /><pre>&lt!-- #INCLUDE VIRTUAL=&quot;".basename($_SERVER["PHP_SELF"])."?$ssi&quot; --&gt;</pre></p>\n";
    
    echo "<p>PHP Include:<br /><pre>&lt?php\ninclude(&quot;$answer&quot;);\n?&gt;</pre></p>\n";
    
  }

  if ($xmlContents != "" || $templateContents != "") {
    echo "<br /><hr /><br />\n";
    if ($xmlContents != "") {
      echo "<h1>XML file</h1>\n";
      $xmlContents = str_replace("&", "&amp;", $xmlContents);
      $xmlContents = str_replace("<", "&lt;", $xmlContents);
      $xmlContents = str_replace(">", "&gt;", $xmlContents);
      echo "<pre>$xmlContents</pre><br />\n";
    }
    if ($templateContents != "") {
      echo "<h1>Template file</h1>\n";
      $templateContents = str_replace("&", "&amp;", $templateContents);
      $templateContents = str_replace("<", "&lt;", $templateContents);
      $templateContents = str_replace(">", "&gt;", $templateContents);
      echo "<pre>$templateContents</pre><br />\n";
    }
  }
}

?>
