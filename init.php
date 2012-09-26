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
    'be'=>'Беларуская',
    'bg'=>'български',
    'bs'=>'bosanski',
    'ca'=>'Català',
    'cs'=>'česky',
    'de'=>'Deutsch',
    'el'=>'Ελληνικά',
    'en'=>'English',
    'es'=>'español',
    'fi'=>'Suomen',
    'fr'=>'français',
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
    'uk'=>'українська',
    'zh'=>'中文、汉语、漢語',
    'zh_CN'=>'中文、汉语、漢語 (Simplified)',
);

if ($locale == "ar") {
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

?>

