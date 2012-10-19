<?php

if ($locale!='en') {
    require('streams.php');
    require('gettext.php');
    $streamer = new FileReader('./locale/' . $locale . '.mo');
    $wohoo = new gettext_reader($streamer);
}

function q_($msgid) {
    global $locale;
    if ($locale=='en')
        return $msgid;
    global $wohoo;
    return $wohoo ? htmlspecialchars($wohoo->translate($msgid)) : $msgid;
}

$language = array(
    'ar'=>'‫العربية‬', 
    'eu'=>'euskara',
    'eo'=>'Esperanto',
    'be'=>'Беларуская',
    'bg'=>'български',
    'bs'=>'bosanski',
    'ca'=>'Català',
    'cs'=>'česky',
    'de'=>'Deutsch',
    'el'=>'Ελληνικά',
    'en'=>'English',
    'en_GB'=>'English (United Kingdom)',
    'es'=>'español',
    'fa'=>'فارسی',
    'fi'=>'Suomen',
    'fr'=>'français',
    'ka'=>'ქართული ენა',
    'ko'=>'한국어/조선말',
    'lv'=>'latviešu valoda',
    'hu'=>'magyar nyelv',
    'hr'=>'Hrvatski',
    'hrx'=>'Hunns-rikk',
    'id'=>'Bahasa Indonesia',
    'it'=>'Italiano',
    'ja'=>'日本語',
    'nb'=>'Norsk bokmål',
    'nl'=>'Nederlands',
    'pl'=>'Polski',
    'pt_BR'=>'Português (Brazil)',
    'pt'=>'Português',
    'ru'=>'русский',
    'sk'=>'slovenčina',
    'sv'=>'svenska',
    'sq'=>'gjuha shqipe',
    'uk'=>'українська',
    'zh'=>'中文、汉语、漢語',
    'zh_CN'=>'中文、汉语、漢語 (Simplified)',
);

if (($locale == "ar") or ($locale == "fa")) {
    $langdir = "rtl";
} else {
    $langdir = "ltr";
}

$version = "0.11.4";
$download_link_win32	= "http://sourceforge.net/projects/stellarium/files/Stellarium-win32/".$version."/stellarium-".$version."-win32.exe/download";
$download_link_win64	= "http://sourceforge.net/projects/stellarium/files/Stellarium-win32/".$version."/stellarium-".$version."-win64.exe/download";
$download_link_osx_u	= "http://sourceforge.net/projects/stellarium/files/Stellarium-MacOSX/".$version."/Stellarium-".$version.".dmg/download";
$download_link_source	= "http://sourceforge.net/projects/stellarium/files/Stellarium-sources/".$version."/stellarium-".$version."a.tar.gz/download";
$download_link_linux	= "http://sourceforge.net/projects/stellarium/files/Stellarium-linux/".$version."/";
$download_link_ppa	= "https://launchpad.net/~stellarium/+archive/stellarium-releases";


function displayDownloadBar() {
    $downloadbar  = "<div id=\"downloadbar\" class=\"block\">\n";
    $downloadbar .= "	<div id=\"release\" class=\"block\">\n";
    $downloadbar .= "		<div class=\"download linux\">\n";
    $downloadbar .= "			<a href=\"".$download_link_source."\">Linux<span>(".q_('source').")</span></a>\n";
    $downloadbar .= "		</div>\n";
    $downloadbar .= "		<div class=\"download linux\">\n";
    $downloadbar .= "			<a href=\"".$download_link_linux."\">Linux<span>(".q_('binaries').")</span></a>\n";
    $downloadbar .= "		</div>\n";
    $downloadbar .= "		<div class=\"download macosx\">\n";
    $downloadbar .= "			<a href=\"".$download_link_osx_u."\">Mac OS X<span>10.6+</span></a>\n";
    $downloadbar .= "		</div>\n";
    $downloadbar .= "		<div class=\"download windows\">\n";
    $downloadbar .= "			<a href=\"".$download_link_win32."\">Windows<span>".q_('32 bit')."</span></a>\n";
    $downloadbar .= "		</div>\n";
    $downloadbar .= "		<div class=\"download windows\">\n";
    $downloadbar .= "			<a href=\"".$download_link_win64."\">Windows<span>".q_('64 bit')."</span></a>\n";
    $downloadbar .= "		</div>\n";
    $downloadbar .= "		<div class=\"download ubuntu\">\n";
    $downloadbar .= "			<a href=\"".$download_link_ppa."\">Ubuntu<span>".q_('latest stable release')."</span></a>\n";
    $downloadbar .= "		</div>\n";
    $downloadbar .= "	</div>\n";
    $downloadbar .= "	<div id=\"additional\" class=\"block\">\n";
    $downloadbar .= "		<div class=\"download nopdf\">\n";
    $downloadbar .= "			<a href=\"http://www.stellarium.org/wiki/index.php/Stellarium_User_Guide\">".q_('User guide')."</a>\n";
    $downloadbar .= "		</div>\n";
    $downloadbar .= "	</div>\n";
    $downloadbar .= "</div>\n";
    
    return $downloadbar;
}

?>

