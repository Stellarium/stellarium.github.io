<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0//EN" "http://www.w3.org/TR/REC-html40/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="Description" content="Stellarium is planetarium software that shows exactly what you see when you look up at the stars. It's easy to use, and free." />
<meta name="Keywords" content="Stellarium, planetarium, astronomy, stars, planets, constellations, meteors, universe, open source, free software, Fabien Chéreau, astro, freeware, download, stars, planets, realistic, software, sky, program, scientific, educational, free, real, time, Windows, Linux, Apple, Mac, GPL, alioth, milky way, moon, mercury, venus, mars, earth, venus, jupiter, saturn, sun, real time, 3D, openGL, graphic, GL, glut, glu, chart, map, twinkle, photo-realistic, brightness, source, screenshot, Orion, 2001, computer" />
<title>Stellarium</title>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
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
        <h2>Dynamic DSS Imagery in Stellarium</h2>
        <p>One possible future feature of Stellarium is the ability to dynamically download multi-resolution sky imagery from a remote server, in a manner similar to Google Earth's Sky feature or Microsoft's World Wide Telescope.  With the development version of Stellarium this is now possible, and we have a test server online (for developers only at this point).  This article is something of a teaser, as we are not going to make the test server available to the public - with user numbers estimated in the millions, the test server would quickly die.</p>
        <p>2008-10-13 -MNG</p>
        <br clear="all">
      </div>
    </div>
  </div>
  <div id="content">
    <h2 style="clear: both">Screenshots</h2>
    <p style="clear: both"><a href="img/smc_without_dss.jpg"><img src="img/smc_without_dss.jpg" alt="screenshot showing the SMC without DSS images" hspace="8" vspace="8" border="0" width="150" height="112" align="left" /></a>
       First, a screen shot showing Stellarium before any of the DSS images are visible.  This should be pretty familiar to Stellarium regulars.  We are looking at the Small Magellanic Cloud.</p>
    <p style="clear: both"><a href="img/smc_with_dss.jpg"><img src="img/smc_with_dss.jpg" alt="screenshot showing the SMC with DSS images" hspace="8" vspace="8" border="0" width="150" height="112" align="left" /></a>
       In this screenshot, wide angle DSS images are visible.  You can see there are some aesthetic problems with the images - visible borders between image plates, and an area at the bottom where no DSS has been loaded. If you look carefully, you will also see some little linear errors from the survey imagery (presumably satellite trails or similar). Even so, some nice structure is visible in the SMC itself.</p>

    <p style="clear: both"><a href="img/smc_dss_detail1.jpg"><img src="img/smc_dss_detail1.jpg" alt="screenshot showing the SMC with DSS images" hspace="8" vspace="8" border="0" width="150" height="112" align="left" /></a>
       Here is a slightly more zoomed in image.  You can see a lot more structure in the SMC, as Stellarium has downloaded higher resolution images for the same area.  The survey images are stored in multiple resolutions, and as you zoom, more detailed images are retrieved from the server.</p>

    <p style="clear: both"><a href="img/smc_dss_detail2.jpg"><img src="img/smc_dss_detail2.jpg" alt="screenshot showing the SMC with DSS images" hspace="8" vspace="8" border="0" width="150" height="112" align="left" /></a>
       This last image shows the highest resolution images in the survey.  Looks nice!</p>

    <h2 style="clear: both">Issues to sort out</h2>
    <p>There is still a fair bit of work to do before DSS images can be made available to the public.  We need to get legal clearance for re-distributing the images (this is in-progress), and we have technical stuff to do too.  There are some bugs to iron out, and we need to implement a decent caching scheme.  Hopefully this will come "for free" with a future release of QT.</p>
    <p>The last major obstacle is sorting out hosting.  With the developer test server we will gather some data which will give us some insight into just how much bandwidth and other resources we will need.</p>
    <p>There are some big unknowns in the equation - for example, how many users we have.  We have direct download figures from sourceforge, but not much idea about re-distribution numbers.  We know there are lots of "free download" sites which re-distribute the program, and that Stellarium has been included on the cover discs of many astronomy and computer magazines, but we don't have any hard numbers.  Our estimate is somewhere between 2 and 5 million installations around the planet.   Even so, we have no idea how often the average user fires up the program, or how long they use it for.</p>

    <h2 style="clear: both">About DSS images</h2>
    <p>The Digitized Sky Surveys were produced at the Space Telescope Science Institute under U.S. Government grant NAG W-2166. The images of these surveys are based on photographic data obtained using the Oschin Schmidt Telescope on Palomar Mountain and the UK Schmidt Telescope. The plates were processed into the present compressed digital form with the permission of these institutions.</p>
    <p>The National Geographic Society - Palomar Observatory Sky Atlas (POSS-I) was made by the California Institute of Technology with grants from the National Geographic Society.</p>
    <p>The Second Palomar Observatory Sky Survey (POSS-II) was made by the California Institute of Technology with funds from the National Science Foundation, the National Geographic Society, the Sloan Foundation, the Samuel Oschin Foundation, and the Eastman Kodak Corporation.</p>
    <p>The Oschin Schmidt Telescope is operated by the California Institute of Technology and Palomar Observatory.</p>
    <p>The UK Schmidt Telescope was operated by the Royal Observatory Edinburgh, with funding from the UK Science and Engineering Research Council (later the UK Particle Physics and Astronomy Research Council), until 1988 June, and thereafter by the Anglo-Australian Observatory. The blue plates of the southern Sky Atlas and its Equatorial Extension (together known as the SERC-J), as well as the Equatorial Red (ER), and the Second Epoch [red] Survey (SES) were all taken with the UK Schmidt.</p>
    <p>All data are subject to the copyright given in the <a href="http://archive.stsci.edu/dss/copyright.html">copyright summary</a>. Copyright information specific to individual plates is provided in the downloaded FITS headers.</p>
    <p>Supplemental funding for sky-survey work at the ST ScI is provided by the European Southern Observatory.</p>
    <p>More information on the DSS can be found <a href="http://archive.stsci.edu/dss/index.html">here</a>.</p>

  </div>
  <div id="footer"><a href="/sponsors.php"><span>Our sponsors</span><a href="http://sourceforge.net/donate/index.php?group_id=48857"><img src="http://images.sourceforge.net/images/project-support.jpg" alt="Support This Project" width="88" height="32" border="0" /></a> <a href="http://sourceforge.net"><img src="http://sourceforge.net/sflogo.php?group_id=48857&amp;type=5" alt="SourceForge.net Logo" width="108" height="32" border="0" /></a> </div>
</div>
</body>
</html>

