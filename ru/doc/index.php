<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0//EN" "http://www.w3.org/TR/REC-html40/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="Description" content="Stellarium is planetarium software that shows exactly what you see when you look up at the stars. It's easy to use, and free." />
<meta name="Keywords" content="Stellarium, planetarium, astronomy, stars, planets, constellations, meteors, universe, open source, free software, Fabien Chéreau, astro, freeware, download, stars, planets, realistic, software, sky, program, scientific, educational, free, real, time, Windows, Linux, Apple, Mac, GPL, alioth, milky way, moon, mercury, venus, mars, earth, venus, jupiter, saturn, sun, real time, 3D, openGL, graphic, GL, glut, glu, chart, map, twinkle, photo-realistic, brightness, source, screenshot, Orion, 2001, computer" />
<title>Stellarium</title>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
<link rel="stylesheet" href="../css/stellarium.css" type="text/css" media="screen" />
<!--[if lt IE 7.]>
<script defer type="text/javascript" src="../../pngfix.js"></script>
<![endif]-->
</head>
<body>
<div id="wrap">
  <div id="header">
    <h1>Stellarium</h1>
  </div>
  <div id="topbar">
    <div id="description">
      <div id="desctext">
        <h2>Документация на API</h2>
        <p>Здесь вы можете найти документацию на API для различных версий Stellarium'а. <i>head</i> ссылается на самую последнюю версию, находящуюся в разработке (информация в этом разделе может быть не самой актуальной на текущий момент времени &mdash; она обновляется по мере загрузки на сайт).</p>
        <br clear="all">
      </div>
    </div>
  </div>
  <div id="content">
	<p>
	<?php
		$dir = opendir("../doc/");
		while($entryName = readdir($dir)) {
			$dirArray[] = $entryName;
		}
		closedir($dir);
		$indexCount	= count($dirArray);
		rsort($dirArray);
		print("<ul>\n");
		for($index=0; $index < $indexCount; $index++) {
			if (substr("$dirArray[$index]", 0, 1) != "." && "$dirArray[$index]" != "index.php"){ // don't list hidden files
				print("<li><a href=\"../doc/$dirArray[$index]\">$dirArray[$index]</a></li>");
			}
		}
		print("</ul>\n");
	?>
	</p>
  </div>
  <div id="footer"><a href="/ru/sponsors.php"><span>Наши спонсоры</span><a href="http://sourceforge.net/donate/index.php?group_id=48857"><img src="http://images.sourceforge.net/images/project-support.jpg" alt="Support This Project" width="88" height="32" border="0" /></a> <a href="http://sourceforge.net"><img src="http://sourceforge.net/sflogo.php?group_id=48857&amp;type=5" alt="SourceForge.net Logo" width="108" height="32" border="0" /></a> </div>
</div>
</body>
</html>

