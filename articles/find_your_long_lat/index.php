<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0//EN" "http://www.w3.org/TR/REC-html40/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="Description" content="Stellarium is planetarium software that shows exactly what you see when you look up at the stars. It's easy to use, and free." />
<meta name="Keywords" content="Stellarium, longitude, latitude, planetarium, astronomy, stars, planets, constellations, meteors, universe, open source, free software, astro, freeware, download, stars, planets, realistic, software, sky, program, scientific, educational, free, real, time, Windows, Linux, Apple, Mac, GPL, alioth, milky way, moon, mercury, venus, mars, earth, venus, jupiter, saturn, sun, real time, 3D, openGL, graphic, GL, glut, glu, chart, map, twinkle, photo-realistic, brightness, source, screenshot, Orion, 2001, computer" />
<title>Stellarium</title>
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
<link rel="stylesheet" href="../../css/stellarium.css" type="text/css" media="screen" />
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
        <h2>Finding Your Longitude and Latitude</h2>
        <p>For Stellarium to produce accurate predictions of the positions of the heavenly bodies, it is very important to set your location precisely.  For casual use, selecting the nearest city from the database of locations which ships with Stellarium will be just fine, but amateur and professional astronomers will probably want to be more precise.  This document describes various methods for finding out your longitude and latitude.</p>
        <p>2009-03-28 -MNG</p>
        <br clear="all">
      </div>
    </div>
  </div>
  <div id="content">
    <h2 style="clear: both">The Old Fashioned Way</h2>
    <p>The old fashioned way to find your longitude and latitude is to use a paper map.  Although many types of map will use their own coordinate system, it is typical to find the longitude and latitude marked somewhere along the grid scale.  The best maps to use are ones with the most detail which cover your area - you will get more precision this way.</p>


    <h2 style="clear: both">With a GPS Device</h2>
    <p>This method couldn't be easier to do, but it does require that you have access to a GPS device.  The handheld ones used for hiking are ideal as you can take them right to your observing spot.  You can also get an idea of your altitude from a GPS device which will help to give you a more accurate daytime/dusk atmopheric effect.</p>


    <h2 style="clear: both">Using Open Street Map</h2>
    <p><a href="http://wiki.openstreetmap.org/">Open Street Map</a> is a Free mapping service which is built by volunteers.  Think of it like "wikipedia for maps". I'm pimping it here because it's a project which I spend a fair bit of time on and I love it.  Evangelism over, lets get on with the method...</p>
    <p>
      <ol>
        <li>Go to the main <a href="http://openstreetmap.org/">OSM map</a></li>
        <li>Zoom in to your location.  The mouse wheel will zoom in and out, or you can shift-drag a zoom box on the map (really nice!).  You can also use the vertical "zoom bar" on the left side of the map pane.</a></li>
        <li>When you see your location at a fair decent zoom level, double click it to centre the map on your location.</li>
        <li>Click in the "perma link" text at the bottom right of the map.  This will change the URL to include the longitude and latitude - the <i>lon</i> parameter in the URL is the longitude, the <i>lat</i> value is the latitude.</li>
        <li>Visit <a href="http://www.fcc.gov/mb/audio/bickel/DDDMMSS-decimal.html">this page</a> and use the "Decimal Degrees to Degrees Minutes Seconds" converter, and put the resulting values into a new Stellarium location.</li> Positive values of latitude are North, nevative are South.  Similarly, positive longitude values are East, negative are West.
      </ol>
    </p>

    <h2 style="clear: both">Google Maps</h2>
    <p>If OSM doesn't have coverage of where you live you should join the project and map your area, but in the mean time you might want to get your longitude and latitude using Google Maps. Here's how:</p>
    <p>
      <ol>
        <li>Go to the <a href="http://maps.google.com/">Google Maps page</a></li>
        <li>Zoom in to your location.  The mouse wheel will zoom in and out.  You can also use the vertical "zoom bar" on the left side of the map pane.</a></li>
        <li>When you see your location at a fair decent zoom level, double click it to centre the map on your location.</li>
        <li>Click in the "link" text at the top right of the map.  This will open a little popup containing a URL.  Copy this and paste it into a text editor.  In this url is a parameter, <i>ll</i> which contains two numerical values separated by a comma.  The first is the decimal latitude, th second is the decimal longitude.</li>
        <li>Visit <a href="http://www.fcc.gov/mb/audio/bickel/DDDMMSS-decimal.html">this page</a> and use the "Decimal Degrees to Degrees Minutes Seconds" converter, and put the resulting values into a new Stellarium location.</li> Positive values of latitude are North, nevative are South.  Similarly, positive longitude values are East, negative are West.
      </ol>
    </p>
  </div>
  <div id="footer"><a href="/sponsors.php"><span>Our sponsors</span><a href="http://sourceforge.net/donate/index.php?group_id=48857"><img src="http://images.sourceforge.net/images/project-support.jpg" alt="Support This Project" width="88" height="32" border="0" /></a> <a href="http://sourceforge.net/projects/stellarium/"><img src="http://sourceforge.net/sflogo.php?group_id=48857&amp;type=5" alt="SourceForge.net Logo" width="108" height="32" border="0" /></a> </div>
</div>
</body>
</html>

