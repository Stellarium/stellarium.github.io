---
layout: post
title: Stellarium 1.0!
date: 2022-10-01 19:00:00 +0700
categories: release
author: alex-w
nolangbar: true
---
The Stellarium team did it. Stellarium 1.0 is here!

What makes this 1.0?

- After more than 20 years of development the program is finally accurate enough for historical application.
- This is the first release based on the Qt6 framework, so the project is safe for future development. These packages are tagged with a version number like 1.22.3.
- We keep releasing Qt5-based packages for legacy or obsolete systems. This may include many Windows users who have to run ANGLE mode. These packages are tagged with a version number like 0.22.3.

What is new for users?

- A new, much better skylight model (Not for MacOS and OpenGL ES2 systems, sorry.)
- Many details around eclipses
- Updated Observation List features
- New features in AstroCalc tool
- HiDPI improvements
- Better dithering
- Able to use Windows location service (Windows)
- New skyculture: Samoan
- Updated several skycultures
- Updates in Angle Measure, Satellites, Oculars, Remote Control, Pulsars plugins
- Many more bugfixes.

A huge thanks to the people who helped us a lot by reporting bugs, and especially contributed in development!

Clear Skies!

Alexander and Georg

Full list of changes:
- Added support Qt6 environment
- Added support designations (based on B1950 coordinates) for pulsars
- Added definitions for MSVC++ 17.1 and MSVC++ 17.2 compilers
- Added report JSON generator to Observability plugin to allow for regression testing
- Added modified patch from OpenIndiana for AstroCalc tool
- Added modified patch from OpenBSD for GPS support
- Added approximated standard magnitude for Chinese Space Station
- Added a potentially missing timezone
- Added 'Go' button in Search Window Position tab (GH: #2681)
- Added wwddmmyyyy date format for Obsevability Analysis plugin
- Added hover effect for Oculars plugin buttons (GH: #2698)
- Added artwork for Babylonian (Seleucid) sky culture
- Added support for up to 500% scaling of dialog close button (GH: #2660)
- Added supporting horizontal coordinates for the CCD sensor in Oculars plugin (GH: #2672)
- Added capability to create KML map of solar eclipses in AstroCalc tool (GH: #2677)
- Added support the additional names to observing list (GH: #2525, #2553, #2232, #2309)
- Added default atmosphere model path in the Atmosphere Details dialog (GH: #2637)
- Added config viewer (GH: #2628)
- Added some documentation for ShowMySky in the User Guide (GH: #2636)
- Added list of financial contributors into About dialog (GH: #2646)
- Added contact times of global solar eclipse in AstroCalc tool (GH: #2652)
- Added default Earth atmosphere model (GH: 2634)
- Added a new Stellarium Sky Culture: Samoan (GH: #2627)
- Added column "Symbol" for major planets into AstroCalc/Positions tool (GH: #1628)
- Added a small didactic enhancement for AstroCalc/Positions/HEC tool (GH: #2549)
- Added user preference for DSO catalog selection
- Added sound output for Qt6 builds
- Added object type info into title for AstroCalc/Graphs tool
- Added support public version of Stellarium (GH: #2545)
- Added units of measurements to Oculars plugin (GH: #2594)
- Added original names to Siberian sky culture
- Added support the thickness of satellite orbits (GH: #2623)
- Added support for ShowMySky atmosphere model (GH: #624, #2604)
- Added align to selected object for Angle Measure plugin (GH: #2621)
- Added computation the time of equinoxes and solstices and set of actions to jump to the solstice/equinox at current, next or previous year. The default hotkeys for actions are not defined [module "Specific Time"] (GH: #1394, #2516)
- Added quadrature line (GH: #2513, #2511, #789)
- Added quadratures for AstroCalc/Phenomena tool (GH: #2513, #2511, #789)
- Added handling the placement the windows outside the left border of the screen (GH: #2514)
- Added hotkey for run the computing the transits of Venus/Mercury in AstroCalc/Eclipses tool
- Added new one tooltip for AstroCalc/Phenomena tool
- Fixed GUI issue
- Fixed installing constellation art in Babylonian Seleucid sky culture (GH: #2704)
- Fixed use of obsolete combobox signal in Telescope Control plugin
- Fixed selection in Solar System Editor plugin for Qt6-based package
- Fixed missing segments in solar eclipse kml (GH: #2702)
- Fixed state of buttons in AstroCalc tools
- Fixed inconsistency in units
- Fixed requested GLSL version
- Fixed columns in AstroCalc/Eclipses tool
- Fixed sorting the path width and duration columns in AstroCalc/Eclipses tool
- Fixed working ShowMySky on HDPI GPU with limited graphics performance (GH: #2676)
- Fixed special hotkeys
- Fixed tooltips for some Markings (GH: #2671)
- Fixed developers list
- Fixed adding some objects (like B 287 (Barnard 287)) into Observing lists (GH: #1884, #2309, #2553, #2232)
- Fixed segfault in Observing Lists when import/export the lists (GH: #2411, #1932, #2553, #2232)
- Fixed segfault in Observing Lists when saving the lists (GH: #2437, #2553, #2232)
- Fixed import Bookmarks into Observing List (GH: #1944, #2553, #2232)
- Fixed object selection when use Edit button in Observing List (GH: #1941, #2553, #2232)
- Fixed movement users onto Null Island in Observing List (GH: #1933, #2486, #2553, #2232)
- Fixed wrong type of objects in Observing List (GH: #2475, #2553, #2232)
- Fixed building QXlsx as an universal binary on macOS
- Fixed updating region name when location is changed (GH: #2633)
- Fixed comparison logic in Angle Measure plugin (GH: #2630)
- Fixed NMEA connections in Qt6
- Fixed IAU star names (GH: #2531)
- Fixed saving the keyboard shortcut (GH: #2571)
- Fixed deployment ShowMySky library on macOS
- Fixed windows deployment 
- Fixed crash when scripting is disabled (GH: #2544)
- Fixed upper limit of phase, unit of magnitude and angular size in tooltip of AstroCalc tools (GH: #2555)
- Fixed crash when using shortcut for specific time jump that related to twilight (GH: #2558)
- Fixed opens the links in browser (GH: #2554)
- Fixed exported CSV files in AstroCalc/Eclipses (GH: #2569)
- Fixed wrong timezone handling of Qt6 (GH: #2547)
- Fixed scripts after property had been renamed.
- Fixed versions of scripts
- Fixed visibility selection of DSO without proper magnitudes (GH: #2563)
- Fixed scaling right axes on graphs (GH: #2578, #2582)
- Fixed working RemoteControl GUI with Qt6 (GH: #2579)
- Fixed search in RemoteControl plugin (GH: #2568)
- Fixed translation the graphs data when language is changed for AstroCalc/Graphs tool
- Fixed titles for AstroCalc/Graphs tools
- Fixed autodetect build architecture on macOS (GH: #2550)
- Fixed LTO build (GH: #2590)
- Fixed map update (GH: #1302, #2592)
- Fixed Zenith scripting issue (GH: #754, #2589)
- Fixed meteor showers plugin
- Fixed name of renamed solar system file
- Fixed reading abbreviated names: allow any non-space characters as part of the constellation and asterism keys (GH: #2606)
- Fixed getting the Moon's Elongation in ecliptical longitude via scripting (GH: #2605)
- Fixed rendering the Oculars labels on HDPI monitors (GH: #2622)
- Fixed coordinates of VDB 16 (GH: #2600)
- Fixed screen blanking on Intel UHD (GH: #2166, #2472, #2484, #2619)
- Fixed updating catalogs in plugins (GH: #2534)
- Fixed missing translations
- Fixed crash in debug mode
- Fixed 'Binocular Highlights' script
- Fixed working the logger for BSD systems with Qt6 environment
- Fixed method getOperatingSystemInfo() for macOS
- Fixed outdated macros for macOS
- Fixed icon size in macOS (GH: #2543)
- Fixed Qt6 redirect policy in plugins (GH: #2534)
- Fixed misspelled of Schedar (GH: #2531)
- Fixed celestrak URL in Satellites plugin: celestrak.com moved to celestrak.org
- Fixed list of languages
- Fixed crash when "Show Earth's umbra" is enabled (GH: #2509)
- Fixed translations the some tooltips when language is changed in AstroCalc tools
- Fixed lost selection in Observing Lists tool (GH: #2694)
- Changed core: replace ordered Bayer dithering with the algorithm based on triangle-remapped blue noise (GH: #2640)
- Changed core: enable dithering by default (GH: #2644)
- Changed core: Milky Way and Zodiacal Light rebalance (GH: #2648)
- Changed GPS location manager: add location service managed by Windows (GPS, network location, ...) (GH: #2620)
- Changed building rules for dependencies: use system versions of dependencies (GH: #1295)
- Changed Observability Analysis plugin: replace object type booleans with methods. This removes the need for managing object type state and delegates it to the StelObjectMgr (GH: #2536)
- Changed Observability Analysis plugin: refactor Observability plugin to use signals for reacting to location state changes (GH: #2535)
- Changed RemoteControl plugin: add missing elements
- Changed Scripting module: switch to use JSEngine instead of QtScript in Qt6-based version
- Changed logger: refactored the method for obtaining the compiler info in the logger
- Changed core: improved Haiku OS support
- Changed macOS defaults: by default for Qt6 environment on macOS create an universal binary (arm64 + x86_64) package for macOS Big Sur and later
- Changed core: actions for jump to the moments of rise, set and transit (include twilight) of selected objects moved into "Specific Time" module (GH: #2516)
- Updated Location window: Rewrite MapLabel → MapWidget (GH: 2696)
- Updated timezone data
- Updated Stellarium User Guide
- Updated GUI elements: increase resolution of some PNGs to improve high-DPI look (GH: #2658)
- Updated GUI elements: work around too much stretching of close button icon on Qt 5.12.8 (GH: #2674)
- Updated GUI elements: increase resolution of spinboxes to improve the look on high-DPI monitors
- Updated splash screen: paint version on the fly on the splash screen instead of rasterizing it into pixmap (GH: #2668)
- Updated rendering the ShowMySky atmosphere model
- Updated About/Config tab
- Updated Babylonian (Mulapin) Sky Culture
- Updated Egyptian Sky Culture
- Updated Greek (Almagest) Sky Culture
- Updated Indian sky culture (GH: #2557, #2559)
- Updated atmosphere model for ShowMySky module (GH: #2643)
- Updated list of contributors list in the About dialog
- Updated default pulsars catalog
- Updated list of locations
- Updated few scripts
- Updated title for AstroCalc/Graphs/Lunar Elongation tool
- Updated nomenclature data
- Updated settings for Inno Setup on Windows
- Removed the duplicate code
- Removed unneeded headers
- Removed duplicated code in AstroCalc tools
