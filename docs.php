<?php
$locale = (isset($_GET['lang']))? $_GET['lang'] : 'en';

include("init.php");

printf('<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0//EN" "http://www.w3.org/TR/REC-html40/strict.dtd">
<html dir="%s" lang="%s">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="MSSmartTagsPreventParsing" content="TRUE" /> 
<meta name="Description" content="%s" />
<meta name="Keywords" content="Stellarium, planetarium, astronomy, software, stars, planets, constellations, meteors, universe, open source, free software, astro, freeware, download, stars, planets, realistic, software, sky, program, scientific, educational, free, real, time, Windows, Linux, Apple, Mac, GPL, milky way, moon, mercury, venus, mars, earth, venus, jupiter, saturn, sun, real time, 3D, openGL, graphic, GL, chart, map, twinkle, photo-realistic, brightness, screenshot" />
<title>%s</title>
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
<link rel="stylesheet" href="/css/all.css" type="text/css" media="screen" />
<link rel="stylesheet" href="/css/%s.css" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="%s" href="https://sourceforge.net/p/stellarium/news/feed" />
<!--[if lt IE 8]>
<link href="/css/oldie.css" rel="stylesheet" type="text/css" /> 
<script defer type="text/javascript" src="/js/pngfix.js"></script>
<![endif]-->
	<script>
	function changelang(val) {
 		window.location = "/" + val + "/docs.php";
	}
	</script>
</head>',
$langdir,
$locale,
q_("Stellarium is a planetarium software that shows exactly what you see when you look up at the stars. It's easy to use, and free."),
q_("Documentation for developers of scripts, plugins and main program"),
$langdir,
q_("Stellarium: Project News"));

printf('<body>
<div id="wrapper">
  <div id="langbar">%s ',
    q_("Other languages:"));     

print '<select id="language" onchange="changelang(this.value)">';
foreach ($language as $langcode => $langname) {
    if ($langcode==$locale) {
	print '<option value="'.$langcode.'" selected="selected">'.$langname.' ('.$langcode.')</option>';
    } else {
        print '<option value="'.$langcode.'">'.$langname.' ('.$langcode.')</option>';
    }
};
print '</select>  </div>';

printf('
<div id="header">
    <div id="latestversion" class="block"><a href="/%s/">%s %s</a></div>
	<div id="downloadbar" class="block">
	    <div id="release" class="block">
		<div class="download linux">
		    <a href="%s">Linux<span>(%s)</span></a>
		</div>
		<div class="download macosx">
		    <a href="%s">Mac OS X<span>%s; %s</span></a>
		</div>
		<div class="download windows">
		    <a href="%s">Windows<span>%s</span></a>
		</div>
		<div class="download windows">
		    <a href="%s">Windows<span>%s</span></a>
		</div>
		<div class="download ubuntu">
		    <a href="%s">Ubuntu<span>%s</span></a>
		</div>
		<div class="download beta">
		    <a href="%s">%s <span>%s</span></a>
		</div>
		<div class="download pdf guide">
		    <a href="%s">%s <span>%s</span></a>
		</div>
	    </div>
	</div>
    </div>',
$locale,
q_('latest version is'),
$version,
$download_link_source,
q_('source'),
$download_link_osx_u,
$osx_version,
q_('64 bit'),
$download_link_win32,
q_('32 bit'),
$download_link_win64,
q_('64 bit'),
$download_link_ppa,
q_('latest stable release'),
$download_link_beta,
q_('Beta'),
$next_version,
$download_link_guide,
q_('User Guide'),
$guide_version);
printf('  
<div id="home">
	<div id="apidocs-describe" class="block">
		<p>%s <em>head</em> %s %s</p>
	</div>',
q_("Here you can find API documentation for various version of Stellarium."),
q_("refers to the latest version from development (although this may lag behind a little as the documentation is only uploaded every so often)."),
q_("Here you can find changes between packages also."));

printf('
</div>
<div id="content">
	<div id="apidoc" class="block">
		<h2>%s</h2>
			',
q_("api documentation"));

$dir = opendir("./doc/");
while($entryName = readdir($dir)) {
	if ($entryName!="head") {
		$dirArray[] = $entryName;
	}
}
closedir($dir);

$indexCount	= count($dirArray);
rsort($dirArray);
print("<ul>\n");
print("<li><em><a href=\"/doc/head/\">head</a></em></li>");
for($index=0; $index < $indexCount; $index++) {
	if (substr("$dirArray[$index]", 0, 1) != "." && $dirArray[$index] != "index.php"){ // don't list hidden files
		print("<li><a href=\"/doc/$dirArray[$index]/\">$dirArray[$index]</a></li>");
	}
}
print("</ul>\n");

printf('
</div>
<div id="apipluginsdoc" class="block">
	<h2>%s</h2>',
q_("plugins api documentation"));

$dir = opendir("./doc-plugins/");
while($entryName = readdir($dir)) {
	$pluginsDirArray[] = $entryName;
}
closedir($dir);

$indexCountP	= count($pluginsDirArray);
rsort($pluginsDirArray);
print("<ul>\n");
for($index=0; $index < $indexCountP; $index++) {
	if (substr("$pluginsDirArray[$index]", 0, 1) != "." && $pluginsDirArray[$index] != "index.php"){ // don't list hidden files
		print("<li><a href=\"/doc-plugins/$pluginsDirArray[$index]/\">$pluginsDirArray[$index]</a></li>");
	}
}
print("</ul>\n");


printf('
</div>
<div id="pkgdiff" class="block">
	<h2>%s</h2>',
q_("changes between packages"));

$pkgdir = opendir("./pkgdiff/");
while($pkgEntryName = readdir($pkgdir)) {
	$pkgDirArray[] = $pkgEntryName;
}
closedir($pkgdir);
rsort($pkgDirArray);

$indexCountR	= count($pkgDirArray);

print("<ul>\n");
for($index=0; $index < $indexCountR; $index++) {
	if (substr("$pkgDirArray[$index]", 0, 1) != "." && $pkgDirArray[$index] != "index.php"){ // don't list hidden files
		$pkgdir = $pkgDirArray[$index];
		$pkgdiff = str_replace("_to_","&mdash;",$pkgdir);
		print("<li><a href=\"/pkgdiff/$pkgdir/changes_report.html\">$pkgdiff</a></li>");
	}
}

print("</ul>\n");


$langlinks = "";	
foreach ($language as $langcode => $langname) {
	$langlinks .= '<a href="/'.$langcode.'/docs.php">'.$langname.'</a> ';
};


printf('
</div></div>
<div id="footer">
    <a href="%s"><img src="/img/nd/project.jpg" alt="Support This Project" width="88" height="32" border="0"></a> <a href="%s"><img src="http://sourceforge.net/sflogo.php?group_id=48857&amp;type=5" alt="SourceForge.net Logo" width="108" height="32" border="0"></a>
</div>
<div id="langlist">
%s
</div>
</div>
</body>
</html>',
$donatelink,
$projectlink,
$langlinks);
?>

