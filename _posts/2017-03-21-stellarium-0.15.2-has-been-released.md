---
layout: post
title: Stellarium 0.15.2 has been released
date: 2017-03-21 10:58:12 +0200
categories: release
author: alex-w
nolangbar: true
---

The Stellarium development team after three months of development is proud to announce the second correcting release of Stellarium in series 0.15.x - version 0.15.2. This version contains few closed bugs (ported from series 1.x) and some new additions and improvements.

We have updated the configuration file and the Solar System file, so if you have an existing Stellarium installation, we highly recommended reset the settings when you will install the new version (you can choose required points in the installer).

A huge thanks to our community whose contributions help to make Stellarium better!

Full list of changes:
  - Added new algorithm for DeltaT from Stephenson, Morrison and Hohenkerk (2016)
  - Added use QOpenGLWidget
  - Added new option to InfoString group
  - Added orbit visualization data for asteroids
  - Added calculation of extincted magnitudes of satellites
  - Added new type of Solar system objects: sednoids
  - Added classificator of objects into Solar System Editor plugin
  - Added albedo for infostring (planets and moons)
  - Added some improvements and clean up of code in Search Tool
  - Added use ISO 8601 to date formatting in Date and Time Dialog (LP: #1655630)
  - Added "Restore direction to initial values" in Oculars plugin (LP: #1656085)
  - Added the define for GL_DOUBLE again to restore compilation on ARM.
  - Added calculation and show of horizontal and vertical scales of visible field of view of CCD (LP: #1656825)
  - Added caching for landscapes, including preloading and some other manipulation via scripting.
  - Added binning for CCD in Oculars plugin
  - Added textures for DSO
  - Added a mean solar day (equals to Earth's day) on the Sun for educational purposes
  - Added transmitting map of object info via RemoteControl
  - Added int property handling with sliders
  - Added a scriptable function to retrieve landscape brightness.
  - Added Spout licence.txt to Windows installer script
  - Added displaying solstices points (LP: #1670046)
  - Added extension of objectInfoMaps per object, most useful for scripting (LP: #1670412)
  - Added tentative fix for crash without network (LP: #1667703)
  - Added separate storing of view direction/FoV and other settings.
  - Added Meade MA12 Astrometric Eyepiece support in Oculars plugin
  - Added option to change the prediction depth of Iridium flares (Satellites plugin)
  - Added tooltips for AstroCalc features
  - Fixed indirect dependency to QtOpenGL by QtMultimediaWidgets (LP: #1656525)
  - Fixed text encoding in installer (LP: #1652515)
  - Fixed changing value of n.dot in tooltip when ephemeris type is changed (LP: #1652762)
  - Fixed mistakes in DeltaT stuff
  - Fixed typos in AstroCalc tool
  - Fixed visual style for spinup/spindown markers
  - Fixed missing cross-id of Epsilon Lyrae (LP: #1653388)
  - Fixed updating a list of Solar system bodies in AstroCalc tool when new objects added or objects was removed
  - Fixed calculation of period for comets on elliptial orbits
  - Fixed prediction of Iridium flares (LP: #1643311)
  - Fixed saving visibility flag for Bookmarks button (LP: #1654164)
  - Fixed refraction for Satellites (LP: #1654331)
  - Fixed wrong parallax and distance for IC 59 (LP: #1655423)
  - Fixed updating a text in Help window when shortcuts are changed (LP: #1656001)
  - Fixed saving flags of visibility of Milky Way and Zodiacal Light (LP: #1656067)
  - Fixed memory leaks
  - Fixed few reports of Clang static analyzer
  - Fixed double clicks causing crashes (LP: #1656525)
  - Fixed packaging QtOpenGL in Windows/macOS packages
  - Fixed handling a log lines with missing newline char
  - Fixed a bad-value crash in ArchaeoLines plugin
  - Fixed an invalid escape sequence in RemoteControl plugin
  - Fixed bug in Search Tool (LP: #1655055)
  - Fixed doing a screenshots (do it via FBO - solution for QOpenGLWidget)
  - Fixed work a button for ArchaeoLines plugin
  - Fixed calculation and rendering CCD frame in Oculars plugin
  - Fixed an memory leak with the spheric mirror distorter, and removed stencil buffer from the effect FBO (we don't need it for our rendering) (LP: #1661375)
  - Fixed tile-based render performance (always glClear all buffers at the start of the frame) (LP: #1661375)
  - Fixed glClear alpha channel usage (glClear alpha to zero instead of one)
  - Fixed Scenery3d cubemap rendering (restores rendering)
  - Fixed crash, when location 'Sierra Nevada Observatory, Spain' is chosen (LP: #1662113)
  - Fixed NetBSD and OpenBSD build by linking glues with Qt5::Gui.
  - Fixed size for few DSO textures (NPOT textures for ancient GPUs) (LP: #1641773)
  - Fixed crash, when missing a stars catalog from the middle of list (e.g. stars4 is missing and we tried zooming) (LP: #1653315)
  - Fixed crash for configure color of generic DSO marker (LP: #1667787)
  - Fixed date limit in AstroCalc tool (Set a minimum possible date limit for the range of dates for QDateTimeEdit widgets) (LP: #1660208)
  - Fixed escaping of symbols for Simbad Lookup (LP: #1669088)
  - Fixed DE431 mismatch (LP: #1606583)
  - Fixed overbright Sun when zooming in (LP: #1421173)
  - Fixed absolute magnitude calculation of the planets, their moons, and the Pluto-Charon system (LP: #1664143)
  - Fixed a long-standing bug concerning centering small-fov views in equatorial mount mode (LP: #1484976)
  - Fixed influencing sky luminance/eye adaptation for bright objects covered by the landscape horizon. (LP: #1138533)
  - Fixed atmospheric brightening by Earth's moon when location is on other planets (LP: #1673283)
  - Fixed application of DE43x DeltaT when date outside range of the selected DE43x.
  - Fixed Night mode issue for binocular mode of Oculars Plugin (LP: #1673187)
  - Fixed altitude computation for landscapes
  - Fixed a small error in that Zodiacal light was aligned with Ecliptic J2000, not Ecliptic of date (LP: #1628765)
  - Fixed crash Stellarium in debug mode on OS X with Qt 5.7+, through clear GL error state after using QPainter (LP: #1628072)
  - Fixed a problem with Qt timezone handling, when some IANA timezones have been renamed compared to entries in our location database (LP: #1662132)
  - Allows SkyImages in all reference frames and deprecate the old explicit core.loadSkyImageAltAz() type commands
  - Updated rules for usage of custom time zones (the custom time zone may be use in all time now) (LP: #1652763)
  - Updated shortcuts
  - Updated rules for source package builder
  - Updated URL of DSS collection
  - Updated detect of OS
  - Updated deployment rules for Windows installer
  - Updated script for building Stellarium User Guide
  - Updated GUI for set coefficients for custom equation of DeltaT
  - Updated list of contributors
  - Updated ArchaeoLines and Gridlines options to RemoteControl pages
  - Updated Tongan sky culture
  - Updated catalog of DSO
  - Updated common names of DSO
  - Updated star names (LP: #1664671)
  - Updated Solar System Screen Saver.
  - Updated Oculars plugin
  - Updated Satellites plugin (Let's start looking to the Iridium on 15 seconds before flash)
  - Updated plist data for macOS
  - Updated textures of minor planets
  - Updated default color scheme
  - Removed code for automatic tuning star scales of the view through ocular/CCD (LP: #1656940)
  - Code clean-up
  - Prevent an unnecessary StelProperty change
  - Changed the way the OpenGL format is set once again
