---
layout: post
title: Stellarium v0.19.0 has been released!
date: 2019-03-24 18:20:00 +0700
categories: release
author: alex-w
nolangbar: true
---
The major changes of this version:
- 5 new sky cultures
- Refactoring the code: many improvements and fixes
- Added many DSO textures
- Many improvements for Scripting Engine

Thank you very much to community for bug reports, feature requests and contributions!

Full list of changes:
- Added new type of computation for AstroCalc/Phenomena tool
- Added GUI options to change constellations and asterisms font size (GH: #576)
- Added new source to star names and added new additional name to kappa Scorpii
- Added tool to detect Intel C/C++ compiler in our Logger
- Added new method into ConstellationMgr class - getConstellationsEnglishNames() to get English names of all constellations in the selected sky culture [Scripting Engine]
- Added new one script 'Constellations Tour' to organize the tour around constellations of the loaded sky culture [Scripting Engine]
- Added constellation boundaries for Chinese Skyculture (GH: #584)
- Added more values to correctly detect MSVC version
- Added few scriptable methods into HighlightMgr class to manage highlight points
- Added translation support for strings within scripts
- Added Chinese medieval sky culture (GH: #604)
- Added Alipurduar town (West Bengal; India) to the default locations list (GH: #606)
- Added extra check-point for data directory in the StelFileMgr class
- Added DSO textures
- Added sensor crop overlay to Ocular plugin (GH: #612)
- Added tool for allow filetype selection for Screenshots (GH: #623) 
- Added core.getPlatformName() and core.isMediaPlaybackSupported() methods into scripting engine
- Added scripting function isModuleLoaded()
- Added graph "Transit altitude vs Time" into AstroCalc/Graphs tool
- Added small simplification to scripting through adding master switch by types for grids, lines and points on the sky [Scripting Engine]
- Added showing labels for named highlights (GH: #638)
- Added allow setting location of User Data Dir via environment variable.
- Added scripting graphics tool [Scripting Engine] (GH: #640)
- Added LMC and SMC as addition names for Magellanic Clouds
- Added classifications support for sky cultures
- Added support 2 southern deep sky catalogues (NGC subset; esp. for southern observers)
- Added armintxe, paleolithic sky culture and landscape (GH: #628)
- Added demo script for martian analemma [Scripting Engine]
- Added support sols for setDate() method [Scripting Engine]
- Added code, who indicate to hybrid graphics systems to prefer the discrete part by default (GH: #649)
- Added support for constellation boundaries thickness (GH: #653)
- Added Maya constellations (GH: #635)
- Added 2 Babylonian skycultures (GH: #647)
- Added display of used (terrestrial) timezone for observation from extraterrestrial locations
- Added special case for Satellites plugin: use texture for draw the crossing of the ISS of the Moon or the Sun
- Added nightly illumination plus basic description for armintxe landscape
- Fixed Ependes Observatory location (GH: #581)
- Fixed scaling the distance in AstroCalc
- Fixed naming the stars in AstroCalc tool when non-western skyculture is enabled (GH: #577)
- Fixed sorting of column Distance in Astronomical Calculations' Ephemeris tab (GH: #579)
- Fixed wrong calculation the FOV of CCD in Oculars plugin
- Fixed compile Stellarium without media features
- Fixed behaviour of script (The old script 'Constellations Tour' was renamed to the 'Western Constellations Tour' and updated) [Scripting Engine]
- Fixed documents for core.clear() method [Scripting Engine]
- Fixed unit tests failure on Windows and some linuxes (GH: #586, #587, #588)
- Fixed the user interface problems for lenses in Oculars plug-in (GH: #580)
- Fixed copyright years in CREDITS.md file
- Fixed checker in the StelFileMgr class (GH: #589)
- Fixed macOS User Data Directory in documentation (GH: #593) 
- Fixed bug report address for .desktop translations
- Fixed a typo in Scenery3D plugin (GH: #600)
- Fixed selecting LMST, LTST and system_default timezone names
- Fixed math error in StelHips (GH: #599)
- Fixed a potential memory leak in libtess (GH: #598)
- Fixed error for ephemeris calculations time window (GH: #605)
- Fixed description data for textures.json
- Fixed missed translatable strings in StelSkyCultureMgr class
- Fixed CWE-404 issues
- Fixed crash when script tried delete already deleted labels (GH: #625)
- Fixed zooming behaviour
- Fixed time zone issue in AstroCalc/WUT tool
- Fixed DSO texture overlay issue (GH: #655)
- Fixed FTBFS issue on some linux systems
- Fixed bad behaviour time zones in the location panel (GH: #602)
- Fixed crash when selecting certain dates in 1 AD for some time zones on Windows (GH: #594)
- Fixed default limits for graph "Transit altitude vs Time"
- Fixed translation the "Armintxe Cave" string (GH: #657)
- Fixed airmass calculation for deep-sky objects
- Changed default constellations font size
- Changed HiPS behaviour: don't show tile if it is hidden by children
- Changed behaviour of version checker: introduced the additional check for latest version
- Changed behaviour of the BottomStelBar::updateText() method (GH: #596)
- Updated Reingold and Dershowitz algorithm of DeltaT (New algorithm was taken from the Calendrical Calculations: The Ultimate Edition book)
- Updated cmake rules for ICC/ICPC support (Intel C/C++ compilers)
- Updated GUI in Oculars plugin
- Updated Stellarium User Guide
- Updated technical documentation
- Updated Amalthea texture
- Updated scripts (added i18n support)
- Updated scripting API: added format specification for screenshots. (GH: #623)
- Updated the code (thanks for PVS-Studio to the finding an issues)
- Updated DSO textures
- Updated textures of LMC (GH: #632)
- Updated nomenclature
- Updated jquery and jquery-ui in Remote Control plugin (GH: #620, #621)
- Updated scripting engine: MilkyWay saturation scriptable now
- Updated scripting engine: expanding the core.clear() method
- Updated Satellites plugin: harmonized function name, added a property [Scripting Engine].
- Updated KoreanCM.isl file - typofixes (GH: #639)
- Updated RemoteSync plugin: suppress unsuitable properties (GH: #642)
- Updated AstroCalc/WUT tool: optimizations
- Updated AstroCalc/Positions tool: optimizations
- Updated AstroCalc/Phenomena tool: optimizations
- Updated contact info for plugins
- Updated Sterngarten model description
- Updated behaviour of the options on Starlore tab
- Updated list of extraterrestrial locations
- Updated time zones behaviour: make custom time zone use a full property of StelCore
- Updated time zones behaviour: preserve custom timezone setting
- Updated LocationDialog behaviour: Return to default location resets location list.
- Removed a long time abandoned incomplete LogBook plugin
- Remove old deprecated methods in scripting engine
- Remove languages without translators and with translations lesser than 1%
