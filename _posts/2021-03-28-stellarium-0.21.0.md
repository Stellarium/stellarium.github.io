---
layout: post
title: Stellarium v0.21.0 has been released!
date: 2021-03-28 16:30:00 +0700
categories: release
author: alex-w
nolangbar: true
---
The major changes of this version:
- We have finally completed our work on accurate planet axes, including Lunar libration
- Visualisation of Earth shadow for Lunar eclipses
- Better texture for the Lunar surface
- Added the latest algorithms for planet magnitudes
- Enhanced Calendars plugin
- Replaced "arabic" by more accurate "al-Sufi" skyculture
- Planets are now scalable and Solar glare switchable for didactic applications

We have also published a scientific paper about the application of Stellarium in cultural astronomy: https://doi.org/10.1558/jsa.17822

Thank you very much to community for bug reports, feature requests and contributions!

Full list of changes:
- Added accurate planet axis orientation and rotation (GH: #502, #151):
- Added lunar libration (GH: #877)
- Added lines for the Invariable Plane and Projected Solar Equator (GH: #358)
- Added solar altitude to planetary feature nomenclature
- Added describe planetary coordinates and changes in the nomenclature display into Stellarium User Guide
- Added new language: Spanish (Latin America)
- Added ability to scaling of Sun and planets (GH: #1263)
- Added new magnitude algorithms for planets from Mallama&Hilton 2018 (GH: #574)
- Added Earth shadow circles for topocentric observer (GH: #430)
- Added new 4k texture for the Moon (required re-balancing planet shader brightness)
- Added lower limit for aFOV parameter of ocular in the GUI to avoid input wrong data (GH: #1487)
- Added visibility of an antisolar point for other planets (GH: #1481)
- Added ability to get all designations of DSO in scripts (GH: #1477)
- Added ability to show hourly motion in decimal degrees (GH: #1478)
- Added more cardinal points (GH: #1522, #1529)
- Added ability to switching off drawing of Solar glare (GH: #1538)
- Added a new sky culture based on Al-Sufi "Book of Fixed Stars" written ~ 964 AD (GH: #1548)
- Added Old Hindu calendars 
- Added Islamic (algorithmic) and Hebrew calendar.
- Added French Revolution calendar (arithmetic version)
- Added Persian (arithmetic) calendar
- Added button to set standard atmosphere
- Added ability to translation/transliteration of Roman (latin) terms (GH: #1511)
- Added ability to use UTC time when navigational stars are displayed (GH: #1416)
- Added acknowledgment section into Help/About window (GH: #1568)
- Added cosmetic fix for radio communication data: no need extra precision to show data in Satellites plugin
- Fixed compatibility of ToneReproducer shader with GLES (GH: #1549, #1550)
- Fixed retranslation of calendars (GH: #1545)
- Fixed vertical position of calendar info panel
- Fixed height-dependent twinkle for star-like objects (GH: #1542)
- Fixed capturing a screenshots under macOS High Sierra and later (GH: #102)
- Fixed documentation for API
- Fixed display the extincted magnitudes for all objects
- Fixed reading textures (GH: #1547)
- Fixed alignment of an intercardinal direction markers (GH: #1552)
- Fixed work of multisampling mode when in Spout isn't used (GH: #1537)
- Fixed visualization zodiacal light at low Bortle values (GH: #1489, #1510)
- Fixed the drawing a degrees on compass on HiDPI devices
- Fixed search short phrases (GH: #1528)
- Fixed orientation of Jupiter, Uranus and Venus (GH: #357)
- Fixed inexact rotation of Moon (GH: #347)
- Fixed wrong rendering of Jupiter (GH: #1261)
- Fixed incorrect moon terminator (GH: #973)
- Fixed a skybox.ssc script (GH: #1461)
- Fixed crash when trails are enabled (GH: #1471)
- Fixed crash when choosing Zero Horizon landscape (GH: #1466)
- Fixed displaying labels of coordinate grids on HiDPI devices (GH: #1445)
- Fixed a labeling hour angles (GH: #1457)
- Fixed API docs
- Fixed styles of QMessageBox and QColorDialog (GH: #1451)
- Fixed WUI of Remote Control plugin
- Fixed HiDPI issue for Observability plugin
- Fixed the placement of cardinal marks when compass mark is enabled on the HiDPI devices
- Fixed placement of the value of equation of time for HiDPI devices
- Fixed crash at exit (GH: #1479)
- Fixed work of Spout mode: inhibit multisampling when in Spout mode (GH: #1507)
- Fixed DOI link for "Calendrical Calculations" (GH: #1562, #1566)
- Fixed missing strings for translation (GH: #1562, #1566)
- Fixed tooltips and placeholders (GH: #1562, #1566)
- Fixed comments for translators (GH: #1562, #1566)
- Fixed updating placement of calendars when visibility of calendars are changed (GH: #1567)
- Fixed artifacts in the GUI when language is changed
- Fixed images and typos in Stellarium User Guide
- Fixed bibliography in Stellarium User Guide
- Fixed the figure of Virgo constellation (GH: #1570)
- Fixed stupid typos in satellites.json file
- Fixed illumination during Lunar eclipse in Scenery 3D plugin (GH: #1506)
- Fixed behavior "Clear" button in Script Console (GH: #1499)
- Fixed lunar magnitude: try an accurate Lunar magnitude formula (GH: #1350)
- Fixed lunar eclipses: redo the eclipse push effect for lunar eclipses
- Fixed behavior of Bookmarks tool when pressed button "cancel" in import dialog (GH: #1497)
- Fixed Mesa mode for Windows (GH: #1551)
- Fixed multisampling on non-Windows systems (GH: #1553)
- Fixed typos in Al-Sufi skyculture
- Fixed bug for calculation the leap years: restore leap year rule in our astronomical year counting
- Updated translations
- Updated translations of landscapes descriptions
- Updated translations of 3D sceneries descriptions
- Updated translations of skycultures descriptions
- Updated AstroCalc/Phenomena tool (GH: #1520)
- Updated planetary features data
- Updated building instructions for Windows (GH: #1444)
- Updated core: slight restructuring of Planets, Comets, MinorPlanets, SolarSystem loader
- Updated core: using data from WGCCRE reports 2009, 2015 and Explanatory Supplement to the AA 2013 (with error fixed by the 1992 ed.) for rotation elements
- Updated core: keeps original Stellarium planet rotation model (undocumented) where new rotation elements are unavailable
- Updated core: make StelToneReproducer's xyYToRGB.glsl core function reusable (GH: #1468)
- Updated code of INDI client to version 1.8.5
- Updated code for building Stellarium without NLS and Scripting support
- Updated GUI (GH: #1204)
- Updated Satellites plugin
- Updated default satellites database
- Updated GUI of Navigational stars plugin
- Updated default pulsars catalog
- Updated description of supernovae plugin (GH: #500)
- Updated description of calendars plugin in Stellarium User Guide
- Removed proper name for NGC 2194 (GH: #1530)
- Removed Arabic skyculture: Arabic SC was replaced by more accurate "al-Sufi" skyculture
