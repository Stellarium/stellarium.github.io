---
layout: post
title: Stellarium v0.22.2 has been released!
date: 2022-07-07 22:15:00 +0700
categories: release
author: alex-w
nolangbar: true
---
The Stellarium team is delighted to announce the release of Stellarium 0.22.2.

The major changes of this version:
- Added recognition licenses for skycultures
- Many improvements in the Satellites plugin, esp. display of earth shadow and filtering
- Improvements in AstroCalc: graphs, eclipses, transits
- Improvements in Meteor Showers, Exoplanets and the Navigational Stars plugins
- Updated DSO catalog
- Fixed ANGLE mode for some rare cases
- A large number of bug fixes and closed feature requests and enhancements (see full list of changes).

Behind the scenes, we are preparing for a major upgrade of the internal Qt framework.

Enjoy!

Alexander and Georg

Full list of changes:
- Added "type" column to WUT list (GH: #2502)
- Added twilights to the nautical navigation data (GH: #2489)
- Added new visual filter for satellites (GH: #1527, #2060)
- Added group of satellites (Gonets)
- Added "Transits of Mercury and Venus across the Sun" computations for AstroCalc tool (GH: #2477)
- Added new filter for communications satellites
- Added feature to recognise the communications data for satellites
- Added GUI for manual addition of comm frequencies for satellites (GH: #2476)
- Added support inclination classifications for geocentric orbits for satellites
- Added feature to adding and restoring the descriptions of satellites
- Added tool to reset TLE sources in Satellites plugin (GH: #2458)
- Added 'altitude' parameter to custom filter of satellites
- Added option to colored invisible satellites: you can toggle behaviour of colorification invisible satellites now
- Added recognition licenses for sky cultures (GH: #2410)
- Added new names to DSO (GH: #2463)
- Added recognition the standard magnitudes for Starlink and OneWeb satellites
- Added ability to select all satellites in the list by one touch
- Added custom filter for satellites (GH: #2457, #2060)
- Added quick selection buttons for DSO (GH: #2425, #2427)
- Added ability to use time mask for naming of screenshots (GH: #1283)
- Added visualisation Earth umbra and penumbra for satellites (GH: #2451, #2360, #1246)
- Added support directional elongation (GH: #2405)
- Added some Barnard outlines (GH: #2412)
- Fixed saving GRS properties
- Fixed missing meteor showers name (GH: #2492)
- Fixed bugs in planetary transits (GH: #2491)
- Fixed orbit validation for observers
- Fixed selecting items from the recent search in Search tool
- Fixed signal/slot issue in Search Tool
- Fixed wrong selection of object in Search Tool/Lists
- Fixed placement for output data on HDPI devices (Observ. plugin)
- Fixed flickering Lunar halo (GH: #2240)
- Fixed selection ANGLE mode: simplify force-switching to ANGLE mode (GH: #2471)
- Fixed missing translations
- Fixed dead links and phrases in sky cultures
- Fixed filtering issue for satellites and update some defaults
- Fixed description for XMM-Newton satellite
- Fixed guessing the groups of satellites
- Fixed slow down of time when the Moon is selected (GH: #2465)
- Fixed eclipse problem (GH: #2464)
- Fixed conversion tool radToHms(): avoiding possible negative zero for value of seconds (GH: #2460)
- Fixed wrong code in radToHMSStr and radToHMSStrAdapt convertors (GH: #2460)
- Fixed work AstroCalc/(Phenomena and RTS) tools with Qt 5.14+ (GH: #2459)
- Fixed Milky Way texture (GH: #2420, #2421)
- Fixed duplicate for NGC 5504
- Fixed stars info: hiding separation info for double stars with "fake values" (GH: #2429)
- Fixed broken signal/slot in Meteor Showers plugin (GH: #2433)
- Fixed 'Nights above horizon' feature in Observability plugin (GH: #2436)
- Fixed rendering orbits of artificial satellites (GH: #2452)
- Fixed crash when some star catalogues deleted or adding (GH: #2404)
- Fixed opacity/magnitude conflict for objects from Barnard catalog (GH: #2408)
- Fixed possible duplicates of DSO names
- Fixed hourly motion of objects (GH: #2505, #2498)
- Fixed show negative radiant drift in RA for meteor showers (GH: #2504)
- Changed setFullScreen() method (GH: #660)
- Changed infostring data for observers: hided the meaningless data
- Changed Satellites plugin: add improvements for visibility prediction of satellites
- Changed behaviour in Satellites plugin: display satellites and their orbits within selected range of altitudes only when related option is activated.
- Changed behaviour in Satellites plugin: Some specific comm terms from the channel description are translatable now
- Changed AstroCalc/Graphs tools: a full refactoring
- Changed AstroCalc/PC tool: refactoring the graphs
- Changed Exoplanets plugin: refactoring the graphs
- Updated filter 'orbit calculation error' in the Satellites plugin
- Updated pulsars catalog
- Updated list of locations
- Updated meteor showers catalog (GH: #2492)
- Updated default list of satellites
- Updated script for InnoSetup (GH: #2450)
- Updated planetary nomenclature
- Updated communications data for satellites
- Updated DSO catalog (v3.16; GH: #2414, #2473)
- Updated list of description of satellites
- Updated data in Meteor Showers catalog (GH: #2467, #2449)
- Updated GUI in Meteor Showers plugin
- Updated default hint color for satellites
- Updated Meteor Showers plugin (GH: #2416)
- Updated DSO names
- Removed QCustomPlot dependence
- Removed scaling mode from shortcuts for Windows (GH: #2450)
