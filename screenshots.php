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
<link rel="alternate" type="application/rss+xml" title="%s" href="https://sourceforge.net/p/stellarium/news/feed />
<!--[if lt IE 8]>
<link href="/css/oldie.css" rel="stylesheet" type="text/css" /> 
<script defer type="text/javascript" src="/js/pngfix.js"></script>
<![endif]-->
	<script>
	function changelang(val) {
 		window.location = "/" + val + "/screenshots.php";
	}
	</script>
<script defer type="text/javascript" src="/js/showpic.js"></script>
</head>',
$langdir,
$locale,
q_("Stellarium is a planetarium software that shows exactly what you see when you look up at the stars. It's easy to use, and free."),
q_("Stellarium screenshot gallery"),
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
	<div id="showcase">
		<a href="/img/screenshots/0.10-new-interface.jpg" title="%s"><img src="/img/screenshots/0.10-new-interface.png" width="100" height="75" border="0" class="thumb"></a>
		<a href="/img/screenshots/0.10-location-full.jpg" title="%s"><img src="/img/screenshots/0.10-location-full.jpg"  width="100" height="75" border="0" class="thumb"></a>
		<a href="/img/screenshots/0.10-stars.jpg" title="%s"><img src="/img/screenshots/0.10-stars.jpg" width="100" height="75" border="0" class="thumb"></a>
		<a href="/img/screenshots/0.10-constellations.jpg" title="%s"><img src="/img/screenshots/0.10-constellations.jpg" width="100" height="75" border="0" class="thumb"></a>
		<a href="/img/screenshots/0.10-shooting-star.jpg" title="%s"><img src="/img/screenshots/0.10-shooting-star.png" width="100" height="75" border="0" class="thumb"></a>
		<a href="/img/screenshots/0.10-constellation-art-on.jpg" title="%s"><img src="/img/screenshots/0.10-constellation-art-on.jpg" width="100" height="75" border="0" class="thumb"></a>
		<a href="/img/screenshots/0.10-starlore-window.jpg" title="%s"><img src="/img/screenshots/0.10-starlore-window.png" width="100" height="75" border="0" class="thumb"></a>
		<a href="/img/screenshots/0.10-from-mars.jpg" title="%s"><img src="/img/screenshots/0.10-from-mars.png" width="100" height="75" border="0" class="thumb"></a>
		<a href="/img/screenshots/0.10-planets.jpg" title="%s"><img src="/img/screenshots/0.10-planets.png" width="100" height="75" border="0" class="thumb"></a>
		<a href="/img/screenshots/0.10-orion-nebula.jpg" title="%s"><img src="/img/screenshots/0.10-orion-nebula.png" width="100" height="75" border="0" class="thumb"></a>
		<a href="/img/screenshots/0.10-light-pollution.jpg" title="%s"><img src="/img/screenshots/0.10-light-pollution.png" width="100" height="75" border="0" class="thumb"></a>
		<a href="/img/screenshots/0.10-search.jpg" title="%s"><img src="/img/screenshots/0.10-search.png" width="100" height="75" border="0" class="thumb"></a>
	</div>',
q_("Since version 0.10 Stellarium has new graphical user interface. The vertical bar links to windows, the horizontal bar shows toggle buttons, just like it used to."),
q_("The location window.  The first thing you have to do is set your observing position and save it. The landscape is a panorama from the ESO facilities in Garching, near Munich, Germany. ESO is the European Organisation for Astronomical Research in the Southern Hemisphere."),
q_("The sun is down, the stars are visible.  Since version 0.10.0 Stellarium has extensive star catalogs.  600,000 are included by default, but you can even download extra catalogues to see up to 210 million stars. This work was done by our team member Johannes."),
q_("Full sky view of the constellations, their boundaries, the Milky Way."),
q_("A shooting star flashes past the Jupiter. You can select different intensities in the View window."),
q_("Constellation art turned on."),
q_("The Starlore tab in the View window.  Choose between different cultures and see how they looked at the stars."),
q_("Selecting a planet and pressing Ctrl+G flies you there.  Here, we see Mars from a rover's viewpoint."),
q_("The dance of the planets above ESO headquarters, near Munich."),
q_("The great nebula in Orion. Press N to bring up the nebula labels. Also shown are constellation lines, press C to show or hide them."),
q_("See how different amounts of light pollution make the universe invisible."),
q_("Search for a planet, nebula, constellation or a specific star. Press enter, and Stellarium centers on the object."));

printf('
</div>
<div id="content">
	<div id="fullsize">
	    <p id="caption">%s.</p>
		<img src="/img/screenshots/placeholder.png" alt="%s" id="placeholder" /> 
	</div>',
q_("Stellarium screenshot gallery"),
q_("Please select an image."));

$langlinks = "";	
foreach ($language as $langcode => $langname) {
	$langlinks .= '<a href="/'.$langcode.'/screenshots.php">'.$langname.'</a> ';
};


printf('
</div>
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

