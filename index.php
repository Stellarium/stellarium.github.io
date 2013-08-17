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
<title>Stellarium</title>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
<link rel="stylesheet" href="/css/all.css" type="text/css" media="screen" />
<link rel="stylesheet" href="/css/%s.css" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="%s" href="https://sourceforge.net/p/stellarium/news/feed" />
<!--[if lt IE 8]>
<link href="/css/oldie.css" rel="stylesheet" type="text/css" /> 
<script defer type="text/javascript" src="/js/pngfix.js"></script>
<![endif]-->
<script type="text/javascript" src="/js/jq-ui-flplayer-sw-aggregated.js"></script>
	<script>
	function changelang(val) {
 		window.location = "/" + val + "/";
	}
	</script>
</head>',
$langdir,
$locale,
q_("Stellarium is a planetarium software that shows exactly what you see when you look up at the stars. It's easy to use, and free."),
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
		<div class="download pdf">
		    <a href="%s">%s <span>%s</span></a>
		</div>
		<div class="download nopdf">
		    <a href="http://www.stellarium.org/wiki/index.php/Stellarium_User_Guide">%s <span>%s</span></a>
		</div>
	    </div>
	</div>
    </div>',
$locale,
q_('latest version'),
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
$download_link_pdf,
q_('User Guide'),
$guide_version,
q_('User Guide'),
q_('wiki'));

printf('  
<div id="home">
	<div id="home-describe" class="block">
		<p>%s</p>
		<p>%s</p>
	</div>',
q_("Stellarium is a free open source planetarium for your computer. It shows a realistic sky in 3D, just like what you see with the naked eye, binoculars or a telescope."),
q_("It is being used in planetarium projectors. Just set your coordinates and go."));
printf('  
	<div class="block">
		<div id="home-media">
			<div class="slide-item first"> 
				<img src="/img/slideshow/slide-1.jpg" class="photo" alt="%s" /> 
				<h2></h2>
				<div class="slide-desc"> 
					<p>%s</p> 
					<a href="./screenshots.php" class="read-more">%s &raquo;</a>
				</div> 
			</div>',
q_("A shooting star flashes past the Jupiter. You can select different intensities in the View window."),
q_("A shooting star flashes past the Jupiter. You can select different intensities in the View window."),  
q_("view screenshots"));
printf('  
			<div class="slide-item"> 
				<img src="/img/slideshow/slide-2.jpg" class="photo" alt="%s"/> 
				<h2></h2>
				<div class="slide-desc"> 
					<p>%s</p> 
					<a href="./screenshots.php" class="read-more">%s &raquo;</a>
				</div> 
			</div>',
q_("The great nebula in Orion. Press N to bring up the nebula labels. Also shown are constellation lines, press C to show or hide them."),
q_("The great nebula in Orion. Press N to bring up the nebula labels."),
q_("view screenshots"));
printf('  
			<div class="slide-item"> 
				<img src="/img/slideshow/slide-3.jpg" class="photo" alt="%s"/> 
				<h2></h2>
				<div class="slide-desc"> 
					<p>%s</p> 
					<a href="./screenshots.php" class="read-more">%s &raquo;</a>
				</div> 
			</div>',
q_("The dance of the planets above ESO headquarters, near Munich."),
q_("The dance of the planets above ESO headquarters, near Munich."),
q_("view screenshots"));
printf('  
			<div class="slide-item"> 
				<img src="/img/slideshow/slide-4.jpg" class="photo" alt="%s"/> 
				<h2></h2>
				<div class="slide-desc"> 
					<p>%s</p> 
					<a href="./screenshots.php" class="read-more">%s &raquo;</a>
				</div> 
			</div>',
q_("Full sky view of the constellations, their boundaries, the Milky Way."),
q_("Full sky view of the constellations, their boundaries, the Milky Way."),
q_("view screenshots"));
printf('  
			<div class="slide-item"> 
				<img src="/img/slideshow/slide-5.jpg" class="photo" alt="%s"/> 
				<h2></h2>
				<div class="slide-desc"> 
					<p>%s</p> 
					<a href="./screenshots.php" class="read-more">%s &raquo;</a>
				</div> 
			</div>',
q_("Constellation art turned on."),
q_("Constellation art turned on."),
q_("view screenshots"));
printf('
			<div id="thumbs"> 
				<div id="description"><p>%s</p></div> 
				<ul> 
					<li><a href="./screenshots.php"><img src="/img/slideshow/thumbs/thumb-1.jpg" width="40" height="40" alt="Slide 1" title="Slide 1"/></a></li> 
					<li><a href="./screenshots.php"><img src="/img/slideshow/thumbs/thumb-2.jpg" width="40" height="40" alt="Slide 2" title="Slide 2"/></a></li> 
					<li><a href="./screenshots.php"><img src="/img/slideshow/thumbs/thumb-3.jpg" width="40" height="40" alt="Slide 3" title="Slide 3"/></a></li> 
					<li><a href="./screenshots.php" ><img src="/img/slideshow/thumbs/thumb-4.jpg" width="40" height="40" alt="Slide 4" title="Slide 4"/></a></li> 
					<li class="last"><a href="./screenshots.php"><img src="/img/slideshow/thumbs/thumb-5.jpg" width="40" height="40" alt="Slide 5" title="Slide 5"/></a></li> 
				</ul>  
			</div> 
		</div>
	</div>
</div>',
q_("Click on the picture to the left for details."));
printf('
<div id="content">
	<div id="features" class="block">
		<h2>%s</h2>
		<h3>%s</h3>
			<ul class="smalllist"><li>%s</li><li>%s</li><li>%s</li><li>%s</li><li>%s</li><li>%s</li><li>%s</li><li>%s</li></ul>',
q_("features"),
q_("sky"),
q_("default catalogue of over 600,000 stars"),
q_("extra catalogues with more than 210 million stars"),
q_("asterisms and illustrations of the constellations"),
q_("constellations for 15 different cultures"),
q_("images of nebulae (full Messier catalogue)"),
q_("realistic Milky Way"),
q_("very realistic atmosphere, sunrise and sunset"),
q_("the planets and their satellites"));
printf('
		<h3>%s</h3>
			<ul class="smalllist"><li>%s</li><li>%s</li><li>%s</li><li>%s</li><li>%s</li><li>%s</li><li>%s</li></ul>',
q_("interface"),
q_("a powerful zoom"),
q_("time control"),
q_("multilingual interface"),
q_("fisheye projection for planetarium domes"),
q_("spheric mirror projection for your own low-cost dome"),
q_("all new graphical interface and extensive keyboard control"),
q_("telescope control"));
printf('
		<h3>%s</h3>
			<ul class="smalllist"><li>%s</li><li>%s</li><li>%s</li><li>%s</li><li>%s</li><li>%s</li></ul>',
q_("visualisation"),
q_("equatorial and azimuthal grids"),
q_("star twinkling"),
q_("shooting stars"),
q_("eclipse simulation"),
q_("supernovae simulation"),
q_("skinnable landscapes, now with spheric panorama projection"));
printf('
		<h3>%s</h3>
			<ul class="smalllist"><li>%s</li><li>%s</li><li>%s</li></ul>
	</div>',
q_("customizability"),
q_("plugin system adding artifical satellites, ocular simulation, telescope configuration and more"),
q_("ability to add new solar system objects from online resources..."),
q_("add your own deep sky objects, landscapes, constellation images, scripts..."));
printf('<div id="requirements" class="block">
	<h2>%s</h2><ul class="smalllist">',
q_("news"));

include("rss2html/rss2html.php"); 

printf('</ul>
	<h2>%s</h2>
	<h3>%s</h3>
		<ul class="smalllist"><li>%s</li><li>%s</li><li>%s</li><li>%s</li></ul>
	<h3>%s</h3>
		<ul class="smalllist"><li>%s</li><li>%s</li><li>%s</li><li>%s</li></ul>',
q_("system requirements"),
q_("minimal"),
q_("Linux/Unix; Windows 2000/XP/Vista/7/8; 64-bit Mac OS X 10.6.8 or greater"),
q_("3D graphics card which supports OpenGL 1.2"),
q_("256 MiB RAM"),
q_("120 MiB on disk"),
q_("recommended"),
q_("Linux/Unix; Windows XP/Vista/7/8; 64-bit OS X 10.7.0 or greater"),
q_("3D graphics card which supports OpenGL 2.1 or greater"),
q_("1 GiB RAM or more"),
q_("1.5 GiB on disk"));

printf('<h2>%s</h2><p>
	%s %s<br />
	%s %s<br />
	%s %s<br />
	%s %s<br />
	%s %s<br />
	%s<br />
	</p>',
	q_('developers'),
	q_('Project coordinator:'),     '<a href="http://f4bien.blogspot.com/">Fabien Ch&eacute;reau</a>',
	q_('Doc author/developer:'),    '<a href="http://porpoisehead.net/">Matthew Gates</a>',
	q_('Developer:'),               '<a href="http://badlyhonedbytes.wordpress.com/">Bogdan Marinov</a>, <a href="http://astro.uni-altai.ru/~aw/">Alexander Wolf</a>, <a href="mailto:treaves%20(at)%20silverfieldstech.com">Timothy Reaves</a>, <a href="http://charlie137-2.blogspot.com/">Guillaume Ch&eacute;reau</a>, <a href="http://homepage.univie.ac.at/Georg.Zotti/">Georg Zotti</a>, Ferdinand Majerech, Jörg Müller',
	q_('Continuous Integration:'),  '<a href="http://lambermont.dyndns.org/">Hans Lambermont</a>',
	q_('Tester:'),                  'Barry Gerdes, Khalid AlAjaji',
	q_('and everyone else in the community.') );

printf('</div>
	<div id="development" class="block">
	<h2>%s</h2>
	<p>%s:</p>
	<ul class="largelist">
		<li><a href="http://launchpad.net/stellarium">%s</a></li>
		<li><a href="https://sourceforge.net/p/stellarium/discussion/278769">%s</a></li>
		<li><a href="https://lists.sourceforge.net/lists/listinfo/stellarium-pubdevel">%s</a></li>
		<li><a href="https://sourceforge.net/p/stellarium/news/">%s</a></li>
		<li><a href="/wiki/">%s</a></li>
		<li><a href="/wiki/index.php/FAQ">%s</a></li>
		<li><a href="/wiki/index.php/Landscapes">%s</a></li>
		<li><a href="/wiki/index.php/Scripts">%s</a></li>
		<li><a href="/wiki/index.php/Plugins">%s</a></li>
		<li><a href="/wiki/index.php/Category:User\'s_Guide">%s</a></li>
		<li><a href="/doc/">%s</a></li>
		<li><a href="/doc/head/scripting.html">%s</a></li>
		<li><a href="https://answers.launchpad.net/stellarium">%s</a></li>
		<li><a href="http://bugs.launchpad.net/stellarium">%s</a></li>
		<li><a href="http://www.ohloh.net/p/stellarium">%s</a></li>
		<li><a href="https://sourceforge.net/projects/stellarium/files/">%s</a>
		<ul class="sublist">
			<li><a href="https://sourceforge.net/projects/stellarium/files/Stellarium-sources/">%s</a></li>
			<li><a href="https://sourceforge.net/projects/stellarium/files/Stellarium-MacOSX/">%s</a></li>
			<li><a href="https://sourceforge.net/projects/stellarium/files/Stellarium-win32/">%s</a></li>
		</ul>
		</li>
	</ul>',
q_("collaborate"),
q_("You can learn more about Stellarium, get support and help the project from these links"),
q_("summary"),
q_("forum"),
q_("mailing list"),
q_("news"),
q_("wiki"),
q_("FAQ"),
q_("landscapes"),
q_("scripts"),
q_("plugins"),
q_("user's guides"),
q_("developers documentation"),
q_("scripting"),
q_("get support"),
q_("report bugs, request new features"),
q_("development progress"),
q_("older releases"),
q_("for Linux (source)"),
q_("for Mac OS X"),
q_("for Windows"));
printf('
	<h2>%s</h2>
		<p>%s</p>
		<ul class="largelist">
			<li><a href="http://bazaar.launchpad.net/~stellarium/stellarium/trunk/files">%s</a></li>
			<li><a href="http://stellarium.org/wiki/index.php/Bzr_checkout">%s</a></li>
		</ul>
	<h2>%s</h2>
	<p>%s</p>',
q_("bzr"),
q_("The latest development snapshot of Stellarium is kept in Bazaar, a distributed revision control system. If you want to compile development versions of Stellarium, this is the place to get the source code."),
q_("browse Bazaar"),
q_("instructions (wiki)"),
q_("irc"),
sprintf(q_("Real time chat about Stellarium can be had in the %s#stellarium%s IRC channel on the %sfreenode%s IRC network. Use your favorite IRC client to connect to %schat.freenode.net%s or try the %sweb-based interface%s."),
		"<a href='irc://irc.freenode.org/stellarium'>", "</a>", "<a href='http://freenode.net'>", "</a>", "<a href='irc://irc.freenode.org/stellarium'>", "</a>", "<a href='http://webchat.freenode.net/?channels=stellarium&uio=MTE9MjQ255'>", "</a>")
		);


$langlinks = "";	
foreach ($language as $langcode => $langname) {
	$langlinks .= '<a href="/'.$langcode.'/">'.$langname.'</a> ';
};


printf('
	<h2>%s</h2>
	<p>%s.</p>
	</div>
</div>
<div id="footer">
    <a href="http://sourceforge.net/donate/index.php?group_id=48857"><img src="/img/nd/project.jpg" alt="Support This Project" width="88" height="32" border="0"></a> <a href="http://sourceforge.net/projects/stellarium"><img src="http://sourceforge.net/sflogo.php?group_id=48857&amp;type=5" alt="SourceForge.net Logo" width="108" height="32" border="0"></a>
</div>
<div id="langlist">
%s
</div>
</div>
</body>
</html>',
q_("supporters and friends"),
sprintf(q_("Stellarium is produced by the efforts of the developer team, with the help and support of the %sfollowing people and organisations%s"), "<a href='./sponsors.php'>", "</a>"),
$langlinks);
?>

