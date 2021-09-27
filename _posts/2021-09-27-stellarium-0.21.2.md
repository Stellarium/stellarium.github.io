---
layout: post
title: Stellarium v0.21.2 released
date: 2021-09-28 00:23:00 +0700
categories: release
author: alex-w
nolangbar: true
---
The Stellarium team are delighted to announce the release of Stellarium 0.21.2.

The major changes of this version:
- Annual aberration correction. Planet positions are finally very accurate!
- Bookmarks replaced by Observation Lists
- Politically neutral geonames
- Right-click opens plugin configuration
- Improved computation of rising, transit, setting times
- "Goto next twilight" functionality
- Two new Greek skycultures
- Updated Mul-Apin skyculture with new artwork
- Improved fidelity of Lunar eclipses
- Fixed display of stellar proper motion
- Many fixes in core and plugins

There have also been a large number of bug fixes and closes feature requests and enhancements (see full list of changes).

A huge thanks to the people who helped us a lot by reporting bugs!

Enjoy!

Full list of changes:
- Added a twilight altitude setting and twilight-finding actions to StelObjectMgr (GH: #1852, #484)
- Added extraString capabilities to StelObjectMgr (GH: #1852)
- Added missing time zones
- Added 2 new greek skycultures (GH: #1850)
- Added unit tests for JPL DE440/DE441 ephemeris
- Added greatest digression to Infostring (GH: #1885)
- Added constellation info for AstroCalc/WUT tool
- Added tooltip for AstroCalc/WUT tool
- Added barium stars filter for Search and AstroCalc tools
- Added option to toggle the method of drawing Sun's corona (GH: #971)
- Added support right click for buttons (GH: #1843)
- Added alternative definition of elongation (GH: #1786)
- Added support of geographical regions (politically neutral toponyms) (GH: #1844, #1808, #1135, #1125, #894)
- Added tooltips to list of skycultures in the GUI
- Added support the annual aberration (GH: #1626, #1272, #1115, #84)
- Added custom max fov stop (GH: #1836)
- Added DeltaT output in seconds for Scripting Engine
- Added Observing lists feature (GH: #1816)
- Added unobvious behavior for selection the celestial body when Graphs tab is opened
- Added extra data for satellite into GUI of Satellites plugin (GH: #1785)
- Added new language: English (India)
- Added ability of displaying number of exoplanets in the system near designation of host star
- Added support minimum altitude for Rise/Transit/Set times in AstroCalc/WUT tool (GH: #1089)
- Fixed visual style of the magnitude output data
- Fixed rendering graphs when the AstroCalc/Graphs tab is closed (GH: #1852)
- Fixed coordinates for NGC 2379 (DSO Catalog v3.13)
- Fixes and improvements of backward compatibility layer for support the regions and countries
- Fixed displaying the proper motion data (GH: #1787)
- Fixed empty items in Search/Lists tool for stars
- Fixed proper motion data in AstroCalc/Positions tool (GH: #1787)
- Fixed HiDPI issue for GUI of Scenery 3D plugin
- Fixed displaying meteor showers search dialog (GH: #1854)
- Fixed drawing spiky halo for Solar system bodies (GH: #1805)
- Fixed behavior of the Online Query plug-in button (GH: #1806)
- Fixed WS-2020-0368 issue in zlib (GH: #1807)
- Fixed search stars by additional English names
- Fixed translations for splash screen (GH: #1817)
- Fixed location of CR 36 (Collinder 36) (GH: #1827)
- Fixed crash Online Query Plug-in (GH: #1821)
- Fixed distanes for PGC galaxies (GH: #1922)
- Fixed computation of max elevations in AstroCalc tool
- Changed Observability plugin: disabled RTS display in the plugin to avoid duplicate the data (GH: #1852)
- Changed the core: added better solutions to RTS (rise-transit-set times) for fixed objects and planets (GH: #1852, #554)
- Changed core: enabled nutation for -4000...+8000 for better comparison with reference solutions
- Changed behaviour of AstroCalc/Graphs tool: the AstroCalc/Graphs/Graph tool now can work on Earth only (GH: #1925)
- Changed behaviour of AstroCalc tool: Inhibit updates when dialog invisible (GH: #1920)
- Updated the behaviour of the GUI in Search Tool: force focus on entry line when recalling (GH: #1874)
- Updated the behaviour of the AstroCalc/Phenomena tool: exclude outdated solar system objects (GH: #1880)
- Updated descriptions of sky cultures 
- Updated GUI of the Satellites plugin
- Updated QXlsx library
- Updated Stellarium User Guide
- Updated list of locations
- Updated list of languages
- Updated list of geographical regions
- Updated list of planetary nomenclature
- Updated default catalog of pulsars
- Updated common names of DSO
- Updated common names of the stars
- Updated boundaries in Chinese skycultures (GH: #1919)
- Updated translations
- Updated AstroCalc/Phenomena tool: improve the performance of computations (GH: #1910)
- Updated AstroCalc/Phenomena tool: avoid lots of computations (GH: #1904)
- Updated Solar System Editpr plugin: better intuitive sorting of MPC list by padding (GH: #1835)
- Removed few Chinese dialects/languages: we will keep only zh_CN, zh_SG, zh_HK and zh_TW locales for Chinese
- Removed outdated translations
- Removed list of countries (GH: #1844, #1808, #1135, #1125, #894)
- Removed Bookmarks feature (GH: #1816)
- Removed the duplicate for Tr 2 cluster
