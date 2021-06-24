---
layout: post
title: Stellarium v0.21.1 released
date: 2021-06-24 21:30:00 +0700
categories: release
author: alex-w
nolangbar: true
---
The Stellarium team are delighted to announce the release of Stellarium 0.21.1.

The major changes of this version:
- Updated designations of stars and handling of list of designations and common names those stars
- Updated Almagest and al-Sufi skycultures
- Many changes in plugins
- Many fixes in core and plugins for support HiDPI devices
- Enhancements in visualization of markings and in scripting engine

There have also been a large number of bug fixes and closes feature requests and enhancements (see full list of changes).

A huge thanks to the people who helped us a lot by reporting bugs!

Enjoy!

Full list of changes:
- Added ability to handling Stellarium scripts by file extension on macOS
- Added disabling the proportional DSO hints in Oculars plugin in eyepiece mode (GH: #1572)
- Added ability to get the lunar eclipse magnitudes through scripting (GH: #747)
- Added new plugin: OnlineQueries (GH: #355, #962)
- Added marker of the center of Earth's shadow (GH: #1687)
- Added workaround to displaying labels for umbra and penumbra (GH: #1560)
- Added an attempt to fix the misplaced location on the planet map (GH: #1026)
- Added tool to toggle visibility of intercardinal (or ordinal) directions and secondary intercardinal directions
- Added scriptable method for panning the view a predetermined amount (degrees per seconds)
- Added option for toggle place of the measurement' visibility for Angle Measure plugin (GH: #1708)
- Added actions to intercardinal and secondary intercardinal points
- Added support proper motion for pulsars
- Added code to recognition 3 new groups of satellites: IRNSS, TDRSS and QZSS
- Added 2 new methods into scripting engine
- Added a splitter in the satellite tab in the Satellites plugin (GH: #1696)
- Added a reminder in the Description box in the Satellites plugin (GH: #1696)
- Added ability to load an "old" telescopes (GH: #1651)
- Added single asterism selection mode (GH: #541, #921)
- Added meteor shower code/ID to search result table (GH: #1663)
- Added support untranslatable names (like designations) for stars and DSO (skycultures)
- Added 3 new scriptable methods into ConstellationMgr class
- Added few new DSO textures
- Added cosmetic fix for long list of designations for stars: split the data on few lines
- Added cosmetic fix for long list of proper names for stars: split the data on few lines
- Added scriptable methods for isolated selection of asterisms by the name (GH: #541, #921)
- Added version number in file name for extended DSO catalog to improve data handling (GH: #1433)
- Added missing ability to saving and loading values for 'Draw only polygon' and 'Thickness of line in pixels' options (LP: 1923489)
- Added backward compatibility layer for scripting engine for search and select operation
- Added scaling factor for line thickness on HiDPI devices (GH: #1618)
- Added new nomenclature for Solar system bodies
- Added computation shadow phenomena (Transits of shadow and eclipses) for planets with moons in AstroCalc/Phenomena tool (GH: #1563)
- Added context for second name of beta Gemini to avoid conflict with constellation name (GH: #1599)
- Added carbon stars filter for Search and AstroCalc tools (GH: #1583)
- Added section "Moons of first body" into AstroCalc/Phenomena tool (GH: #1563)
- Added Polar Circles into ArchaeoLines plugin (GH: #1555, #1573)
- Added two custom altitude lines into ArchaeoLines plugin (GH: #1573)
- Added ability to grabbing declination/azimuth/altitude data from selected object into ArchaeoLines plugin (GH: #1573)
- Added ability to direct selection of locations from Stellarium's location list into ArchaeoLines plugin (GH: #1573)
- Fixed correctly saving sensor rotation angle (GH: #1756)
- Fixed sorting hotkeys info in Help window (almost full synced with Keyboard shortcuts editor) (GH: #443)
- Fixed scaling planets and the Sun by viewed through eyepiece (GH: #1578)
- Fixed typo's in Almagest SC description (GH: #1745, #1746)
- Fixed display cardinal labels when NLS is disabled
- Fixed displaying the native names of planets (GH: #1273)
- Fixed work the method core.setObserverLocation() when planet is not defined (GH: #1749)
- Fixed display of hotkeys (e.g. native look for macOS' hotkeys) in Help window
- Fixed proper names
- Fixed designation for 2 UMa
- Fixed UI text issue for binoculars in the Oculars plugin (GH: #1738)
- Fixed flip issue for compass rose in the Oculars plugin (GH: #1535)
- Fixed selection the newest added device in Oculars plugin
- Fixed handling of the designations for variable and double stars
- Fixed crash for the OnlineQueries plugin
- Fixed show text in Angle Measure plugin on the HiDPI devices
- Fixed display multiline AKA list for DSO
- Fixed compiling INDILib by MSVC2019
- Fixed crash when any device added into Oculars plugin (GH: #1673)
- Fixed horizontal & vertical flip defect in Oculars plugin (GH: #1535, #1678)
- Fixed bug in scripting engine
- Fixed dead links in Stellarium User Guide (GH: #1694, #1692)
- Fixed tabbing order in the Satellites plugin (GH: #1696)
- Fixed cross-identification data for HIP stars (GH: #1657)
- Fixed visibility of planet labels: the visibility of planet label is depend by extinction magnitude now (GH: #1652)
- Fixed AstroCalc/Phenomena tool: added missing category for compute shadows phenomena
- Fixed HiDPI issues in Script Console
- Fixed show labels in scripts on the HiDPI devices (no need a rewriting scripts for HiDPI monitors)
- Fixed search Hydra as a constellation and as moon in the Bookmarks tool (GH: #1609)
- Fixed logical issue in StelSkyDrawer class
- Fixed displaying cardinals on poles (no cardinals!)
- Fixed mistakes for designations of double stars from Struve's appendices catalogs (GH: #1604)
- Changing visualization an atmosphere on the Galilean satellites: All Galilean satellites has atmosphere, but too thin of course (pressure at surface lesser 1 Pa), so, let's turn-off the atmosphere on this moons (GH: #1676).
- Updated AstroCalc tools (GH: #1679)
- Updated GUI of AstroCalc tools
- Updated Almagest SC: use almstars catalogues to improve sky culture (GH: #1647)
- Updated al-Sufi skyculture
- Updated native names of planets
- Updated Help window: added special local hotkeys info (GH: #1679)
- Updated Stellarium User Guide
- Updated handling the designations of stars
- Updated Bayer and Flamsteed designations of stars
- Updated Angle Measure plugin: change mouse cursor in angle measure mode (GH: #1698, #1707)
- Updated the installer for Windows: added links to Stellarium User Guide and ANGLE mode of Stellarium on the desktop
- Updated scripts
- Updated default catalogs in the plug-ins
- Updated texture for M51
- Updated list of locations
- Updated Oculars plugin (GH: #1633)
- Updated Satellites plugin: added description for China's space station and updated default TLE catalog
- Updated proper names of stars
- Updated Russian translations of skycultures description (GH: #1645)
- Updated support the double stars data: added ability to use multiple designations for double stars
- Updated support the double stars data: revised all designations of double stars
- Updated support the double stars data: uses parameters for double stars according to latest WDS data
- Updated AstroCalc/Phenomena tool: Section "Sun, planets and moons" renamed into "Sun, planets and moons of observer location" (GH: #1563)
- Updated ArchaeoLines plugin: replace angle DoubleSpinBoxes by AngleSpinBoxes (supersedes GH: #1447)
- Updated core: added QTextEdit StelProperty connections (GH: #1573)
- Updated core: added property connector code for AngleSpinBox (GH: #1573)
- Updated core: added code for AngleSpinBox to make sure cursor position does not change while mouse-wheeling an angle  (GH: #1573)
- Removed the resetting tracking the objects in Oculars plugin (GH: #1680)
- Removed support the config option AngleMeasure/enable_at_startup to avoid automatically enabling the Angle Measure plugin at startup of planetarium (GH: #1698)
- Removed bad URL in Western skyculture info.ini file (GH: #1720)
- Removed support for legacy QGLWidget rendering
