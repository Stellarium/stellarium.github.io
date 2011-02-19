<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0//EN" "http://www.w3.org/TR/REC-html40/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="Description" content="Stellarium is planetarium software that shows exactly what you see when you look up at the stars. It's easy to use, and free." />
<meta name="Keywords" content="Stellarium, planetarium, astronomy, stars, planets, constellations, meteors, universe, open source, free software, Fabien Chéreau, astro, freeware, download, stars, planets, realistic, software, sky, program, scientific, educational, free, real, time, Windows, Linux, Apple, Mac, GPL, alioth, milky way, moon, mercury, venus, mars, earth, venus, jupiter, saturn, sun, real time, 3D, openGL, graphic, GL, glut, glu, chart, map, twinkle, photo-realistic, brightness, source, screenshot, Orion, 2001, computer" />
<title>Stellarium</title>
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
<link rel="stylesheet" href="../../../css/stellarium.css" type="text/css" media="screen" />
<!--[if lt IE 7.]>
<script defer type="text/javascript" src="../../../pngfix.js"></script>
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
    <div id="description"><a href="/ru/screenshots.html"><img src="/img/rotation/rotate.php" alt="screen preview" width="201" height="209" border="0" id="previewscreen"></a>
      <div id="desctext">
        <h2>Top features in version 0.10.0</h2>
        <p>As with the release of the previous version of Stellarium (0.9.1), version 0.10.0 brings a great many changes under the hood. Unlike the previous version, in this release the underlying changes are matched by a significant change to the user interface of the program.  This article highlights some of the features which we believe make Stellarium 0.10.0 a ground-breaking release, and then goes on to discuss some directions which may be explored in future.</p>
        <br clear="all">
      </div>
    </div>
    <div id="downloads">
      <h2>Ссылки</h2>
      <div class="download"><a href="http://stellarium.org/"><img class="downloadimg" src="/img/home_icon.png" alt="stellarium home page" width="42" height="42"><span class="downloadlink">Основной веб-сайт</span></a> </div>
      <div class="download"><a href="http://stellarium.org/wiki/index.php/Landscapes"><img class="downloadimg" src="/img/landscape_icon.png" alt="stellarium landscapes" width="42" height="42"><span class="downloadlink">Ландшафты</span></a> </div>
      <div class="download"><a href="http://sourceforge.net/forum/forum.php?forum_id=278769"><img class="downloadimg" src="/img/forum_icon.png" alt="stellarium forums" width="42" height="42"><span class="downloadlink">Форум</span></a> </div>
    </div>
  </div>
  <div id="content">
    <h2 style="clear: both">Revamped User Interface</h2>
    <p>The most obvious change is the new graphical user interface (GUI).  The old interface was hand-crafted, lightweight, efficient and looked alright, but it was really limited.  With version 0.10.0 we started to use the GUI features of the QT framework.  Recent changes to QT have made it possible to customise the look and feel of QT widgets using style sheets, and to use them in OpenGL apps more smoothly than before.</p>
    <p><a href="../../../img/screenshots/0.10-stel_gui.jpg"><img src="../../../img/screenshots/0.10-stel_gui.jpg" alt="screenshot showing new GUI elements" hspace="8" vspace="8" border="0" width="150" height="112" align="left" /></a>
    The result is a much more comfortable set of dialogs to configure Stellarium, search for objects, set the observer location and so on.  Finally we have a usable way to set the date and time without trying to click on tiny little spin buttons or using the text menu.</p>
    <p>Some of the keyboard shortcuts have been updated too.  The goal here is to try to be consistent with common key bindings in other applications such as F1 for help (instead of the old 'h' key binding).  Other dialogs can be opened with keys F2 ... F6, or you can use the new dialog toolbar on the bottom left of the screen.</p> 
    <p>Stellarium's always been quite intuitive to use - we hope that these changes will make it even easier for new users to get up and running. Of course, not everything has changed - all those application-specific shortcuts, like toggling constellation lines remain the same.  Hit F1 and you will see a full list of the key bindings.</p>

    <h2 style="clear: both">Less Obtrusive Button Bar / Title Bar</h2>
    <p>The button bar and title bar have been merged, with the buttons now able to auto-hide themselves.  The goal is to keep as much of your valuable screen real estate for rendering the sky, and to keep GUI clutter to a minimum.  For those who don't like the auto-hide feature, the button bar can be locked in place using the little tab at the left side of the button bar.</p>
    <p>We have also introduced a second button bar, with buttons to show the various dialogs of the new GUI.  This will also hide itself until the mouse is nearby.</p>

    <h2 style="clear: both">Location Database</h2>
    <a href="../../../img/screenshots/0.10-location.jpg"><img src="../../../img/screenshots/0.10-location.jpg" alt="screenshot showing location dialog" hspace="8" vspace="8" border="0" width="150"  height="112"  align="left" /></a>
    <p>
    Setting the location of the observer is an important step for those who want to use Stellarium to see what the sky looks like at some specific location (e.g. where they are, or from the Apollo lunar landing sites).  The new location dialog includes a database of world cities (and spacecraft landing sites on other planetary bodies).  The user can easily search this database to find a nearby city, and can then tweak the exact position.  It is also possible to create user-defined locations, so you can set up a location for your home, work, observatory, holiday locations and so on.</p>

    <h2 style="clear: both">Performance</h2>
    <p>The startup time as been improved dramatically, so you won't have to wait as long to check out what's in the sky tonight.  Rendering performance has also been improved, so you should be able to squeeze a few more frames per second from your video hardware.

    <h2 style="clear: both">Light Pollution Simulation / Bortle Scale</h2>
    <a href="../../../img/screenshots/0.10-bortle.jpg"><img src="../../../img/screenshots/0.10-bortle.jpg" alt="composite screenshot illustrating bortle scale" hspace="8" vspace="8" border="0" width="150"  height="112"  align="left" /></a>
    <p>
    Light pollution is an increasing problem for star-gazers around the planet.  Stellarium 0.9.1 introduced a simple simulation of light pollution. Version 0.10.0 extends this feature, adding customisability though the GUI, and calibrating the setting to the <a href="http://en.wikipedia.org/wiki/Bortle_Dark-Sky_Scale">Bortle Light Pollution Scale</a></p>

    <h2 style="clear: both">Dynamic Eye Adaptation</h2>
    <p>Amateur astronomers know that when a bright object like the Moon is in the sky, it becomes much harder to see fainter objects, especially those near to the bright object.  This is down to a few things, including scattering of light in the atmosphere from the bright object, and because the eye "stops down" when the bright object is in view.</p>
    <p>Stellarium now includes a feature to dynamically "stop down" the sensitivity of the virtual eye which generates the images for the program.  It looks kind of like how a camera with auto-exposure settings look as it adjusts itself.</p>

    <h2 style="clear: both">More Information</h2>
    <a href="../../../img/screenshots/0.10-starlore.jpg"><img src="../../../img/screenshots/0.10-starlore.jpg" alt="screenshot showing extra info about sky cultures" hspace="8" vspace="8" border="0" width="150"  height="112"  align="left" /></a>
    <p>
    Stellarium now comes with constellations from eleven different sky-gazing cultures.  We have also added some basic information about the history of these sky cultures, and what they were used for.</p>

    <h2 style="clear: both">Mars Landscape</h2>
    <a href="../../../img/screenshots/0.10-mars_landscape.jpg"><img src="../../../img/screenshots/0.10-mars_landscape.jpg" alt="screenshot showing mars landscape" hspace="8" vspace="8" border="0" width="150"  height="112"  align="left" /></a>
    <p>
    The default installation now ships with a nice landscape made with images from images from the Mars rover, Spirit.</p>

    <h2 style="clear: both">Extensibility Through Plugins</h2>
    <p>There are still many features which other astronomy programs have which Stellarium lacks.  By implementing a plugin mechanism, we hope to attract third party developers who will help build some cool extensions to the core functionality of the program and help make Stellarium even better.</p>
    <p>As well as features like "what's in the sky tonight", satellite position prediction, apature indicators, better telescope control integration and so on which you migit find in other programs, we hope third party developers will come up with some really new an innovative ideas.  Plugins would make really good Google Summer of Code projects, so we would like to hear from you if you have an idea for a SOC idea, or want to voluteer to implement one.</p>  
    <p>If you are a developer and want to have a go at writing some cool plugins, feel free to post to the developer mailing list with ideas.  Here are a few more unique ones which might inspire you:</p>
    <ul>
      <li>A pulsar catalog with audio clips - hear the cosmos' most accurate clocks ticking!</li>
      <li><a href="http://www.galaxyzoo.org/">Galaxy Zoo</a> integration.</li>
      <li><a href="http://setiathome.berkeley.edu/">Seti@home</a> visualation</li>
      <li>Soundscapes</li>
      <li>UFO simulation :p</li>
    </ul>

    <h2 style="clear: both">Bigger, Better, More Fantasticly Amazing User Community</h2>
    <p>As Stellarium itself improves, we have also found that the community of people using the program has grown and matured.  We have a large number of <a href="http://stellarium.org/wiki/index.php/Landscapes">user contributed landscapes</a>, lots of helpful posters to our forums and a load of great ideas coming from this community.  We also have a large number of people who do translation work for us who we would like to thank (and encourage to continue working!).</p>
    <p>If you enjoy using Stellarium, get involved!  Make a landscape for a beautiful location where you live and give us feedback / ideas for new features.  If you are multi-lingual, and Stellarium isn't completely translated into your language(s), have a go at some <a href="https://translations.launchpad.net/stellarium/0.10/+pots/stellarium">translation</a>.</p>

    <h1>The Future</h1>
    <p>So what now? Well, now that we've more or less completed our work on implementing a decent user interface and have migrated lots of the internal structure to use the very nice QT framework, it should be possible to start concentrating on new features.  This has been a long time coming - it's been a few <i>years</i> of work to re-structure the program so that new features should be easier to implement, and this is finally done.</p>
    <p>One thing we have made progress on is an implementation of dynamic downloading of sky images (like Google Earth/Sky and MS WWT).  We have a working implementation, but we still have to sort out licensing of whatever image data we can get hold of.  This potentially includes the DSS, but we want to hear from you if you are able to provide other data sets.</p>  
    <p>To get this up and running, we will be in need of some hefty hosting, and have very little money to spend on it (just what we can cover with donations).  Perhaps you work at an ISP who has a budget for sponsoring Open Source projects?  If you are in a position to offer us some cheap or free bandwidth and a fair chunk of disk space, please get in contact.</p>
    <p>We are also looking at the possibility of integrating some sort of downloading of landscapes/scripts/star catalogs within the program.  The current manual installation method is cumbersome and we think that an in-program downloader would make life easier for s lot of people.</p>
    <p>There are a large number of other possibilities. If you have an idea, post a feature request!</p>

  </div>
  <div id="footer"><a href="/ru/sponsors.php"><span>Наши спонсоры</span><a href="http://sourceforge.net/donate/index.php?group_id=48857"><img src="http://images.sourceforge.net/images/project-support.jpg" alt="Support This Project" width="88" height="32" border="0" /></a> <a href="http://sourceforge.net"><img src="http://sourceforge.net/sflogo.php?group_id=48857&amp;type=5" alt="SourceForge.net Logo" width="108" height="32" border="0" /></a> </div>
</div>
</body>
</html>


