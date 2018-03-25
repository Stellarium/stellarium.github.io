---
layout: post
title: Stellarium 0.18.0
date: 2018-03-25 22:00:00 +0700
categories: release
author: alex-w
nolangbar: true
---
The major changes of this version:
- Added support Hierarchical Progressive Surveys [HiPS] (Hello visualization of multiwavelength universe in the Stellarium)
- Updated and extended AstroCalc tool
- Added support a Hickson Compact Group collection
- Updated code and data

A huge thanks to the people who helped us a lot by reporting bugs!

Full list of changes:
- Added support Hierarchical Progressive Surveys [HiPS] (Hello visualization of multiwavelength universe in the Stellarium)
- Added patches for TeXLive
- Added Chinese (Simplified) and Chinese (Traditional) translations for InnoSetup
- Added Dnoces star name
- Added check relative paths for AppImage (or something similar) packages
- Added hook for creating an AppImage application
- Added optional building 3rd-party INDILib when Telescope Control plugin is disabled
- Added manual commands for NSEW movements in Telescope Control plugin [INDI-only]
- Added computation of solar eclipse magnitude and solar eclipse obscuration on Earth (special case)
- Added option to allow adding some sky background color (GH: #71)
- Added Moon age computation (GH: #73)
- Added "Western (O.Hlad)" sky culture
- Added support common names of pulsars
- Added some DSO images
- Added calculation of synodic period
- Added AstroCalc/Monthly Elevation tool
- Added optional Sun, Moon, Astronomical Twilight and Nautical Twilight lines for AstroCalc/AltVsTime tool
- Added Battlesteads Observatory into locations list
- Added a special case of computations (lunar eclipse) into AstroCalc/Phenomena tool
- Added two new signals to manage wide dates changes with various steps - by months and years
- Added new option to the AstroCalc/AltVsTime and AstroCalc/ME tools
- Added support a Hickson Compact Group collection
- Added tools for select color of planetary labels and trails
- Added option to suppress drawing large halo around bright stars. (GH: #105)
- Added Tesla Roadster orbital elements
- Added config options for font size of cardinal points
- Added visualization of civil twilight line in AstroCalc/AltVsTime tool
- Added 'Artificial objects' into Search/Lists tool
- Added feature to store and retrieve selected HiPS
- Added bottom bar GUI button for HiPS display
- Fixed spheric mirror effect inputs with retina display
- Fixed visualization issue for ephemeris markers due refraction (GH: #51)
- Fixed building Stellarium on *BSD systems (GH: #52)
- Fixed texture name
- Fixed behaviour of DateTimeDialog (LP: #1409935)
- Fixed behaviour of Compass Marks plugin
- Fixed issue for creating a multiple Screenshot directories (GH: #60)
- Fixed cmake for OSX
- Fixed data race condition by mutex in Telescope Control plugin
- Fixed few C99 warnings
- Fixed rules for MSVC linker
- Fixed Phoebe's absolute magnitude
- Fixed some DSO positions (data is obtained from NED database) (GH: #64)
- Fixed FSF address
- Fixed missed license info for the new code
- Fixed version of DSO catalog
- Fixed inconsistency of calculations in AstroCalc/AltVsTime tool
- Fixed crash due missing file MSVCR120.dll (GH: #101)
- Fixed backward orbiting of Uranus moons (GH: #107)
- Fixed search Hydra constellation (show IAU numbers for moons) (LP: #1752784)
- Fixed crash when opening Configuration window (beta 0.90.0.15828) (GH: #111)
- Fixed crash when landscape invalid
- Fixed translation action in HipsMgr
- Fixed name of action for TOAST DSS
- Fixed very jerky (unusable) trackpad navigation on OS X (LP: #1705832)
- Updated Russian and German translations for InnoSetup
- Updated list of cardinals names
- Updated target rules for OSX
- Updated AppStream info
- Updated default catalog of pulsars
- Updated Indian Vedic skyculture
- Updated list of nomenclature on the Titan
- Updated zlib to version 1.2.11
- Updated toggling of atmosphere, Milky Way and Zodiacal Light
- Updated Telescope Control plugin
- Updated AstroCalc/AltVsTime tool
- Updated focus rules for Search Tool
- Updated stellarium.appdata.xml file
- Updated behaviour of AstroCalc/ME and AstroCalc/PC tools
- Updated the behaviour of Satellites plugin: the plugin will be disabled when date is changed for a month or year to avoiding stupid computation
- Updated select priority rules for DSO
- Updated help info in the plugins
- Updated info in Help window
- Updated metainfo
- Updated textures for Solar system bodies
- Removed outdated data