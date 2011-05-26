<?php
$locale = (isset($_GET['lang']))? $_GET['lang'] : 'en';

if ($locale!='en') {
    require('streams.php');
    require('gettext.php');
    $streamer = new FileReader('./locale/' . $locale . '/stellarium-website.mo');
    $wohoo = new gettext_reader($streamer);
}

function q_($msgid) {
    global $locale;
    if ($locale=='en')
        return $msgid;
    global $wohoo;
    return $wohoo ? $wohoo->translate($msgid) : $msgid;
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0//EN" "http://www.w3.org/TR/REC-html40/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="Description" <?php printf('content="%s"', q_("Stellarium is planetarium software that shows exactly what you see when you look up at the stars. It's easy to use, and free."));?> />
<meta name="Keywords" content="Stellarium, planetarium, astronomy, stars, planets, constellations, meteors, universe, open source, free software, Fabien Chéreau, astro, freeware, download, stars, planets, realistic, software, sky, program, scientific, educational, free, real, time, Windows, Linux, Apple, Mac, GPL, alioth, milky way, moon, mercury, venus, mars, earth, venus, jupiter, saturn, sun, real time, 3D, openGL, graphic, GL, glut, glu, chart, map, twinkle, photo-realistic, brightness, source, screenshot, Orion, 2001, computer" />
<title>Stellarium</title>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
<link rel="stylesheet" href="css/stellarium.css" type="text/css" media="screen" />
<!--[if lt IE 7.]>
<script defer type="text/javascript" src="pngfix.js"></script>
<![endif]-->
</head>
<body>

<div id="wrap">
  <!--  <div id="stickynote">
	<p>sticky note</p>
  </div>-->
  <div id="header">
	<h1>Stellarium</h1>
  </div>
  <div id="topbar">
	<?php printf('
	  <div id="description"><a href="screenshots.html"><img src="img/rotation/rotate.php" alt="screen preview" width="201" height="209" border="0" id="previewscreen"></a>
	  <div id="desctext">
	  %s<br>%s <span><a href="screenshots.html">%s</a></span></div>
	</div>
	<div id="downloads">
	  <h2>%s</h2>
	  <div class="download"><a href="http://downloads.sourceforge.net/stellarium/stellarium-0.10.6.tar.gz"><img class="downloadimg" src="img/download-linux.png" alt="linux download link" width="63" height="42"><span class="downloadlink">%s</span></a> </div>
	  <div class="download"> <a href="http://downloads.sourceforge.net/stellarium/stellarium-0.10.6-Intel.dmg"><img class="downloadimg" src="img/download-mac.png" alt="Mac download link" width="63" height="42"><span class="downloadlink">%s</span></a> </div>
	  <div class="download"> <a href="http://downloads.sourceforge.net/stellarium/stellarium-0.10.6.1.exe"><img class="downloadimg" src="img/download-win.png" alt="Windows download link" width="63" height="42"><span class="downloadlink">%s</span></a> </div>
	  <div class="download"> <a href="http://downloads.sourceforge.net/stellarium/stellarium_user_guide-0.10.2-1.pdf"><img class="downloadimg" src="img/download-pdf.png" alt="pdf download link" width="63" height="42"><span class="downloadlink">%s</span></a></div>
	</div>
	</div>',
	q_("Stellarium is a free open source planetarium for your computer. It shows a realistic sky in 3D, just like what you see with the naked eye, binoculars or a telescope."), 
	q_("It is being used in planetarium projectors. Just set your coordinates and go."),
	q_("view screenshots"),
	q_("Downloads"),
	q_("for Linux (source)"),
	q_("for Mac OS X"),
	q_("for Windows"),
	q_("user's guide")
	); 
  
  print '<div id="content">
	<div id="left">
	  <div id="features">';

	    printf('<h2>%s</h2><p><span id="version">%s</span></p>',
	    q_("features"),
	    q_("in version 0.10.6"));
	    
		printf('
		<h3>%s</h3>
		<ul>
		  <li>%s</li> <li>%s</li> <li>%s</li> <li>%s</li> <li>%s</li> <li>%s</li> <li>%s</li> <li>%s</li>
		</ul>',
		q_("sky"),
		q_("default catalogue of over 600,000 stars"),
		q_("extra catalogues with more than 210 million stars"),
		q_("asterisms and illustrations of the constellations"),
		q_("constellations for twelve different cultures"),
		q_("images of nebulae (full Messier catalogue)"),
		q_("realistic Milky Way"),
		q_("very realistic atmosphere, sunrise and sunset"),
		q_("the planets and their satellites")
		);
		
		printf('
		<h3>%s</h3>
		<ul>
		  <li>%s</li> <li>%s</li> <li>%s</li> <li>%s</li> <li>%s</li> <li>%s</li> <li>%s</li>
		</ul>',
		q_("interface"),
		q_("a powerful zoom"),
		q_("time control"),
		q_("multilingual interface"),
		q_("fisheye projection for planetarium domes"),
		q_("spheric mirror projection for your own low-cost dome"),
		q_("all new graphical interface and extensive keyboard control"),
		q_("telescope control")
		);
		
		printf('<h3>%s</h3>
		<ul>
		  <li>%s</li> <li>%s</li> <li>%s</li> <li>%s</li> <li>%s</li>
		</ul>',
		q_("visualisation"),
		q_("equatorial and azimuthal grids"),
		q_("star twinkling"),
		q_("shooting stars"),
		q_("eclipse simulation"),
		q_("skinnable landscapes, now with spheric panorama projection")
		);
		
		printf('
		<h3>%s</h3>
		<ul>
	      <li>%s</li> <li>%s</li> <li>%s</li>
		</ul>',
		q_("customizability"),
		q_("plugin system adding artifical satellites, ocular simulation, telescope configuration and more"),
		q_("ability to add new solar system objects from online resources..."),
		q_("add your own deep sky objects, landscapes, constellation images, scripts...")
		);
	  
	    print '</div>'; // End features

        printf('<div id="wiki">
        <h2>%s</h2>
		<p>%s</p>
		<ul class="largelist">
		  <li> <a href="http://www.stellarium.org/wiki">%s</a> </li>
		  <li> <a href="http://www.stellarium.org/wiki/index.php/Quickstart_guide">%s</a> </li>
		  <li> <a href="http://www.stellarium.org/wiki/index.php/FAQ">%s</a> </li>
		  <li> <a href="http://www.stellarium.org/wiki/index.php/Category:User%%27s_Guide">%s</a> </li>
		  <li> <a href="http://www.stellarium.org/wiki/index.php/Scripts">%s</a> </li>
		</ul>
	    </div>',
		q_("wiki"),
		q_("The wiki is the place where stellarium users maintain all the knowledge about the program, and where you can contribute as well."),
		q_("main page"),
		q_("quickstart"),
		q_("FAQ"),
		q_("user's guide"),
		q_("scripts")
		);
	  ?>
	</div>
	
	<div id="center">
	  <div id="news">
		<h2>news</h2>
		 <?php include("rss2html/rss2html.php"); ?>
	  </div>
	</div>
	<div id="right">
	  <div id="development">
		<h2>collaborate</h2>
		<p>You can learn more about Stellarium, get support and help the project from these links: </p>
		<ul class="largelist">
		  <li> <a href="http://launchpad.net/stellarium">summary</a> </li>
		  <li> <a href="http://sourceforge.net/forum/forum.php?forum_id=278769">forum</a> </li>
		  <li> <a href="https://answers.launchpad.net/stellarium">get support</a> </li>
		  <li> <a href="http://bugs.launchpad.net/stellarium">report bugs, request new features</a> </li>
		  <li> <a href="http://sourceforge.net/project/showfiles.php?group_id=48857">older releases</a>
			<ul class="sublist">
			  <li> <a href="http://sourceforge.net/project/showfiles.php?group_id=48857&package_id=52048">for Linux (source)</a> </li>
			  <li> <a href="http://sourceforge.net/project/showfiles.php?group_id=48857&package_id=42042">for Mac OSX</a> </li>
			  <li> <a href="http://sourceforge.net/project/showfiles.php?group_id=48857&package_id=52047">for Windows</a> </li>
			</ul>
		  </li>
		</ul>
		<h2> bzr </h2>
		<p> The latest development snapshot of Stellarium is kept in Bazaar, a distributed revision control system. If you want to compile development versions of Stellarium, this is the place to get the source code.</p>
		<ul class="largelist">
		  <li><a href="http://bazaar.launchpad.net/~stellarium/stellarium/trunk/files">browse Bazaar</a></li>
		  <li><a href="http://stellarium.org/wiki/index.php/Bzr_checkout">instructions (wiki)</a></li>
		</ul>
		<h2> irc </h2>
		<p> Real time chat about Stellarium can be had in the <a href="irc://irc.freenode.org/stellarium">#stellarium</a> IRC channel on the <a href="http://freenode.net">freenode</a> IRC network.  Use your favorite IRC client to connect to <a href="irc://irc.freenode.org/stellarium">chat.freenode.net</a> or try the <a href="http://webchat.freenode.net/?channels=stellarium&uio=MTE9MjQ255">web-based interface</a>. </p>
		<h2> developers </h2>
		<p> Project coordinator: <a href="http://f4bien.blogspot.com/">Fabien Ch&eacute;reau</a><br>
		  Doc author/developer: <a href="http://porpoisehead.net/">Matthew Gates</a><br>
		  <!-- Graphic/other designer: <a href="http://users.pandora.be/jomejom">Johan Meuris</a><br> -->
		  OSX Developer: Nigel Kerr<br>
		  OSX Developer: <a href="mailto:diego.marcos%20(at)%20gmail.com">Diego Marcos</a><br>
          Developer: <a href="http://badlyhonedbytes.wordpress.com/">Bogdan Marinov</a><br>
          Developer: <a href="mailto:treaves%20(at)%20silverfieldstech.com">Timothy Reaves</a><br>
          Developer: <a href="http://charlie137-2.blogspot.com/">Guillaume Ch&eacute;reau</a><br>
          Tester: Barry Gerdes<br>
		  and everyone else in the community. </p>
		<h2>supporters and friends</h2>
		<p>Stellarium is produced by the efforts of the developer team, with the help and support of the <a href="sponsors.php">following people and organisations</a></p>
	  </div>
	</div>
  </div>
  <div id="languages">Other languages:
	<?php include("languages.inc"); ?>
  </div>
  <div id="footer"><a href="http://sourceforge.net/donate/index.php?group_id=48857"><img src="http://images.sourceforge.net/images/project-support.jpg" alt="Support This Project" width="88" height="32" border="0" /></a> <a href="http://sourceforge.net/projects/stellarium"><img src="http://sourceforge.net/sflogo.php?group_id=48857&amp;type=5" alt="SourceForge.net Logo" width="108" height="32" border="0" /></a> </div>
</div>
</body>
</html>
