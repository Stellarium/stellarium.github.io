---
layout: post
title: Stellarium v0.19.2 has been released!
date: 2019-09-29 18:05:00 +0700
categories: release
author: alex-w
nolangbar: true
---
The second bugfix release for series 0.19.

Thank you very much to community for bug reports, feature requests and contributions!

Full list of changes:
- Added support DMS and DD formats for parallactic angle feature
- Added altitude limitation filter for AstroCalc/Graphs[AltVsTime/ME] tools
- Added visual improvements for AstroCalc/Graphs tool
- Added new time intervals for AstroCalc/Ephemeris tool
- Added computation of ephemeris for all naked-eye visible planets into AstroCalc/Ephemeris tool
- Added GUI for select the color of ephemeris markers into AstroCalc/Ephemeris tool
- Added 2 new scripts (Saturnian and uranian analemmas)
- Added 'k Pup' designation to star HIP 37229 (GH: #706)
- Added information about progress of loading on splash screen (GH: #719)
- Added a new skylore for Stellarium: Anutan
- Added support catalog "Southern Stars embedded in nebulosity" (Van den Bergh and Herbst, 1975 - VdBH)
- Added support "Catalogue and distances of optically visible H II regions" (Dickel+, 1969 - DWB)
- Added distances for few LDN objects
- Added support removing shortcuts through config.ini file (GH: #724)
- Added extraInfoString to StelObject: Allows extra info injected by plugins or scripts.
- Added display of Apex/Antapex points (GH: #737)
- Added "observers" for all planets with moons (GH: #736)
- Added IAU constellation abbreviation to object info
- Added 3 new actions
- Added settings for Script Console (GH: #741)
- Added Vanuatu (Netwar) skyculture (GH: #762)
- Added few asterisms (GH: #753, #768)
- Added new one time step into AstroCalc/Ephemeris tool (GH: #758)
- Added few new DSO textures (GH: #756, #780)
- Added support Vec3d into scripting engine
- Added a Messier Marathon script (GH: #771)
- Added support for short weekday display modes in bottom toolbar
- Added GUI option to toggle permanent orbit drawing
- Added hyperbolic comet C/2019 Q4 (Borisov) [2I/Borisov] into default ssystem_minor.ini file
- Added a scripting function for refraction (GH: #778)
- Fixed coloring text issue when formatting output is on
- Fixed saving properties for external software/remote computer in Telescope Control plugin (GH: #702)
- Fixed behaviour of selected ephemeris marker when sorting not for date (AstroCalc/Ephemeris tool)
- Fixed sorting date and time columns for AstroCalc/Ephemeris and AstroCalc/Phenomena tools
- Fixed crash on destruction of static QWidget (GH: #720)
- Fixed small difference of values issue for different time zones for Date and Time column in AstroCalc/Ephemeris tool (GH: #717)
- Fixed stupid conversion bug in hmsToRad function (GH: #716)
- Fixed an asymmetry w.r.t. to the ecliptic latitudes (Moon age)
- Fixed Search Tool/Lists behaviour for VdBH catalog
- Fixed distances for few DSO (GH: #708)
- Fixed Gregorian date issue for AstroCalc (GH: #711)
- Fixed support GPS on macOS (GH: #712)
- Fixed coefficient for the duration of mean tropical year
- Fixed issue for images in description for landscapes: set search directory (GH: #735)
- Fixed tooltip behaviour for Date and Time dialog
- Fixed star name to its source spelling (GH: #729)
- Fixed compiling with GPSD 3.19 [API 8.0] (GH: #733)
- Fixed encoding script files in Script Console (GH: #742)
- Fixed drawing names of asterisms
- Fixed aFOV display in Oculars plugin
- Fixed visual issue in Script Console (white background) with Qt 5.13
- Fixed links for scripting docs (SUG)
- Fixed screen flashing during solar eclipse (GH: #747)
- Fixed core.resetOutput(); method behaviour (GH: #750)
- Fixed AltGr behaviour for some languages on Windows
- Fixed clipping issue for LabelMgr.labelObject (GH: #776)
- Fixed weekday computation
- Fixed rendering planets orbits (GH: #773)
- Fixed error in shape of asterism Red-Necked Emu (GH: #769)
- Fixed proper removing of default secondary shortcut (GH: #764)
- Fixed cross-id error in DSO catalog
- Updated appdata.xml file
- Updated outdated code for names of days and months
- Updated Observability plugin
- Updated list of proper names of stars (IAU approved list)
- Updated Moon age calculation: let's use geocentric coordinates only for compute of the Moon age
- Updated AstroCalc/PC tool: simplification and colorification for graphs
- Updated AstroCalc/Phenomena tool: small speed-up
- Updated the default color space: StelToneReproducer now use sRGB as target RGB color space (GH: #718)
- Updated GUI for Satellites plugin
- Updated common names for DSO
- Updated common names for stars
- Updated packaging for macOS: Let's use macdeployqt for creating a MacOS bundles
- Updated nomenclature support: Let's use compressed nomenclature data to reduce an installation package
- Updated translations
- Updated planetary nomenclature
- Updated Sardinian skyculture
- Updated file handling in Script Console
- Updated HDPI features: enabled scaling fonts on High DPI monitors (GH: #546)
- Updated default shortcuts: changed default shortcut for copying selected object information (Ctrl+C -> Ctrl+Shift+C) to allow use Ctrl+C shortcut for text edit fields for whole planetarium (GH: #748)
- Updated getInfoMap method [scripting engine]: enhanced the getInfoMap method for the Sun (get eclipse data; GH: #747)
- Updated Chinese (Simplified) and Russian translations for Windows installer (GH: #755, #779) 
- Updated Bookmarks tool
- Updated default exoplanets and pulsars catalogs
- Updated behaviour on Windows: disable HiDPI scaling in manifest (GH: #763)
- Updated Oculars plugin: improve RA/Dec output for CCD frame
- Code refactoring: type checking/casting clarifications
- Removed FOV plugin (the feature was moved into core of planetarium)
