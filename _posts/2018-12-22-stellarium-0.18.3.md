---
layout: post
title: Stellarium 0.18.3
date: 2018-12-22 23:55:00 +0700
categories: release
author: alex-w
nolangbar: true
---
The major changes of this version:
- Improvements and fixes for AstroCalc tool
- Added new sky cultures
- Added many DSO textures
- Refactoring the GUI
- Many improvements in the code
A huge thanks to the people who helped us a lot by reporting bugs!

Full list of changes:
- Added names of potential interesting asteroids according to Wikipedia
- Added change saturation of Milky Way when eyepiece simulation is enabled
- Added precisions to saturation shader (GH: #261)
- Added Northern Andes skyculture (GH: #267)
- Added Western (Sky & Telescope) skyculture (GH: #562)
- Added tool for checking updates of planetarium
- Added the support of kinetic scrolling for lists and long texts for all operating systems (disabled by default)
- Added support angular size filter for AstroCalc/WUT tool (if applicable)
- Added satellite color & description handling (GH: #350, #380)
- Added new graph into AstroCalc/Graphs tool
- Added airmass info to infostring and infomap (GH: #157)
- Added workaround for a spherical mirror mode bug (GH: #252)
- Added angular separation filter for double stars in AstroCalc/WUT tool
- Added highlights support (see Bookmarks tool; GH: #272)
- Added Chinese translation for landscape description (GH: #493)
- Added tooltip for 'Prism/CCD distance (mm)' option
- Added a SphericalCap to close off Spherical Landscapes
- Added Chinese translation for skycultures (GH: #503)
- Added tool for reaload the DSO background images (shortcut: Ctrl+I)
- Added tool for reloading the current sky culture (shortcut: Ctrl+Alt+I)
- Added pack of DSO textures
- Added timezone loading for landscapes
- Added Nereid texture
- Added new method core.selectConstellationByName() to avoid possible wrong selection when few objects has same name (enforcement selection of constellation; GH: #490)
- Added alphabetical sorting the list of surveys (GH: #506)
- Added Chinese Contemporary Skyculture (GH: #508)
- Added 2 new tweakable buttons for asterisms
- Added 4 new tweakable buttons for GUI
- Added Interstellar Object type and elements of 1I/Oumuamua
- Added new nomenclature for Mercury
- Added Chinese translation for skycultures (GH: #540)
- Added display of the antisolar point (GH: #536)
- Added a good default list of instruments into Oculars plugin (GH: #409)
- Added kinetic scrolling to switch on the fly (GH: #519)
- Added option to select font and size (GH: #424)
- Added workaround for grouped onscreen Information of selected object issue (GH: #523)
- Added a tour of the Solar System planets
- Added phase angle info for the artificial satellites
- Added new MIME type for Stellarium scripts (for UNIX/Linux systems)
- Added wrapper for Stellarium's website
- Added support XLSX files (GH: #555)
- Added visual style for headers of columns in XLSX files
- Added option to sort results in AstroCalc/WUT tool (GH: #521, #560)
- Added visual style for headers of columns in XLSX files
- Added support double clicks on the sky (selecting + centering objects)
- Added scripting function to allow targetting Galactic coordinates
- Fixed small issue with untranslatable items of drop-down list of HiPS surveys
- Fixed saving telescope settings on Mac OS X (GH: #254)
- Fixed the terms in columns in AstroCalc/Phenomena tool
- Fixed switching of locale for dates on graphs in AstroCalc tool when language is changed
- Fixed bug when downloading extra stars catalogues (GH: #260)
- Fixed saving value of option "Scale image circle" in Oculars plugin (GH: #264)
- Fixed resetting results when clear button is pressed in Satellites plugin (GH: #265)
- Fixed annoying warning in Search Tool
- Fixed missing config option for rise, set and transit times in GUI
- Fixed possible crash in AstroCalc/PC tool
- Fixed adding unnamed stars into bookmarks
- Fixed fragment shader for planets
- Fixed uninitialized vars in HelpDialog (Coverity issue)
- Fixed documentation for for StelObject::getInfoMap()
- Fixed spheric mirror support on retina displays (GH: #390)
- Fixed link to the Stellarium User Guide
- Fixed link to Hawaiian Star Compass Landscape in Hawaiian Starlines (GH: #384)
- Fixed the performance for AstroCalc tool (GH: #379)
- Fixed lunar eclipse visualization (GH: #274) 
- Fixed bookmarking for the unnamed stars
- Fixed Chinese sky culture (GH: #489)
- Fixed a bug for Chinese skyulture. (GH: #504)
- Fixed storing the view direction/FoV separately from other settings (GH: #309)
- Fixed typo in stellarium.desktop (GH: #507)
- Fixed typo in property setting (Cardinal direction color)
- Fixed storing of mount mode (conflict in Oculars plugin; GH: #505)
- Fixed the orientation of M58 texture (GH: #514)
- Fixed PNG warnings
- Fixed bad airmass infostring (GH: #525).
- Fixed button state
- Fixed the text overlap issue in Observability plugin (GH: #517)
- Fixed the placement issue of the cross in Pointer Coordinates (GH: #516)
- Fixed border handling for a DeltaT formula
- Fixed build with --as-needed (GH: #545)
- Fixed updating Satellites at startup (GH: #542)
- Fixed separation value for AstroCalc/Phenomena tool for oppositions
- Fixed opening XLSX files in the modern Microsoft Office
- Fixed black screen shot in night mode (GH: #534)
- Fixed TeX style for scripts (GH: #570)
- Updated GUI of AstroCalc tool (AstroCalc/AltVsTime, AstroCalc/ME and AstroCalc/Graphs tools has been merged into AstroCalc/Graphs)
- Updated GUI of AstroCalc tool (visual style has been updated)
- Updated GUI behaviour: let's hide angular limits for AstroCalc/WUT when the limits are not applicable
- Updated GUI behaviour: split GUI font size from screen font size
- Updated GUI behaviour: move color buttons to the left of labels
- Updated visual style of diagram in Exoplanets plugin
- Updated code of Satellites plugin
- Updated names of DSO
- Updated textures of DSO
- Updated textures of moons
- Updated nomenclature
- Updated documents
- Updated Oculars plugin: immediate update of display when changing instrument details in GUI.
- Updated Oculars plugin: separate font scaling for the Oculars GUI panel.
- Updated Oculars plugin: storing of current instrument (telescope/ocular/CCD/lens) indices
- Updated RemoteControl plugin: change return types in JSON object info from string-only to native.
- Updated getInfoString code: separate getMagnitudeInfoString to avoid code repetition.
- Updated tooltips and labels for AstroCalc/WUT tool
- Updated default select priority for custom objects and markers (GH: #501)
- Updated behaviour: the select priority of custom objects and markers now configurable and scriptable
- Updated behaviour: improved timezone handling, allows scriptable setting (GH: #497)
- Updated default catalog of exoplanets
- Updated default catalog of pulsars
- Updated ArchaeoLines plugin (code refactoring)
- Updated color setting (code refactoring)
- Updated behaviour of lists in the AstroCalc/Graphs/Graphs tool (GH: #520)
- Updated tool for create the exoplanets catalog
- Updated script 'Constellations tour' and added small patch to avoid possible crash, when sky culture is changed (GH: #572)
- Obsolete code in core has been removed
- Removed outdated link (GH: #526)
- Removed doubled parenting code in GUI classes