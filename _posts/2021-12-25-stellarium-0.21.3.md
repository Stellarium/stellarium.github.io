---
layout: post
title: Stellarium v0.21.3 released
date: 2021-12-25 17:45:00 +0700
categories: release
author: alex-w
nolangbar: true
---
The Stellarium team is delighted to announce the release of Stellarium 0.21.3.

The major changes of this version:
- Better handling of minor bodies with outdated orbital elements
- "Goto next day at same altitude" functionality for selected objects
- Mark a few special points on the planets
- Three refined Arab skycultures
- Updated Mul-Apin skyculture with new artwork
- Improved OnlineQueries and Satellites plugin
- Fixed a problem with LX200 telescopes
- Many fixes in core and plugins

There has also been a large number of bug fixes and closed feature requests and enhancements (see full list of changes).

Enjoy!

Full list of changes:
- Added support a context in names of sky cultures
- Added improvements for compute the accuracy and performance of sunrise/sunset time in AstroCalc/WUT
- Added support HTC 2.0 theory (#1942)
- Added also search descriptions in Satellites plugin (GH: #1940)
- Added support QtWebEngine in OnlineQueries plugin (GH: #1938)
- Added reference to ArchaeoLines plugin
- Added scriptable method to set the time extent for trails
- Added figure correction for the Lunar position
- Added atmospheric pressure and temperature info into location tooltip
- Added *.md files into Windows installer (GH: #2023)
- Added orbit epoch as explicit element to the KeplerOrbit (GH: #2000, #2027)
- Added Solar and Lunar info to InfoString (GH: #1455, #2037)
- Added pragmatic solution for a Linux display problem with aberration (GH: #1945)
- Added a "default" group to selected object info (GH: #2038)
- Added context for info group names (GH: #2038)
- Added epoch entries for the Interstellar objects
- Added support to show ephemeris when Solar system bodies are hidden (GH: #2044, #2051)
- Added orbit_Epoch to comet orbital elements
- Added scripting functions for tonemapping
- Added tool to find and select an object from its standard name and object type name (GH: #1970)
- Added tool to search an object by its standard name and object type
- Added Arabic sky culture (GH: #2064)
- Added Arabian Peninsula sky culture (GH: #2064)
- Added Arabic Lunar Stations sky culture (GH: #2064)
- Added new actions for jumping to defined moments in diurnal motion of selected objects (GH: #2106)
- Added smart tooltip for AstroCalc/Graphs tool (GH: #2110)
- Added Poles and east and west points (limb/equator intersection) (GH: #2092, #2098)
- Added Central and Subsolar special points (GH: #2098)
- Added scriptable method to replace textures on-the-fly (GH: #1060, #2120)
- Added twilight data into InfoString for the Sun
- Added new filter for satellites (GH: #2124)
- Added code to automatic add the group of satellites, based on Celestrak groups (GH: #1636, #2125)
- Fixed issues in hawaiian starlines sky culture (GH: #1931)
- Fixed error in search of Atlas right hand (GH: #1934)
- Fixed computation max elevation in AstroCalc/WUT tool
- Fixed building unit tests when scripting is disabled
- Fixed direct script commands for RemoteControl (GH: #1943)
- Fixed selecting sky culture
- Fixed Sun limb size and direction in Navigational Stars plugin (GH: #2019, #2021)
- Fixed Observability plugin: restore lost lunar "previous" and "next" full moon information (GH: #2025)
- Fixed epoch support for the Pluto (GH: #2062)
- Fixed OnlineQueries plugin: additional cmake fixes over #2006 (GH: #2049)
- Fixed a regular expression for constellation references (GH: #2055)
- Fixed typo in HD designation for HIP 48715 star (GH: #2063)
- Fixed dithering for native GLES2 systems (Odroid C1)
- Fixed PNGs: prevent libpng iCCP incorrect sRGB profile warnings
- Fixed building OnlineQueries plugin for non-WebEngine mode
- Fixed typo in CMake script (GH: #2067)
- Fixed default epoch for comet orbit
- Fixed crash after importing single asteroid (pulsar, quasar, supernova, nova, exoplanetary system) when imported asteroid was selected (GH: #1970)
- Fixed crash after updating catalogs of objects (pulsars, quasars, supernovae, novae, exoplanets, solar system objects) when selected object was removed by updating tool (GH: #1970)
- Fixed formatting (GH: #2095)
- Fixed rendering of markers when using perspective or orthographic projections (GH: #2093)
- Fixed issue in implementation of LX200 protocol (GH: #818)
- Fixed typos in sky cultures (GH: #2105)
- Fixed context issue for translation of pole labels (GH: #2098)
- Fixed aberration issues for Nomenclature selection (GH: #2098)
- Fixed selection priority for far-side features of the planet (GH: #2098)
- Changed AstroCalc/Transits tool: cosmetic fix for custom markers
- Changed Satellites plugin: improve guessing GALILEO satellites
- Changed core: refactoring the support of the on-screen stars names (GH: #1951, #2005)
- Changed the core: replace QRegExp occurrences
- Changed mouse navigation behaviour (GH: #1317, #2086, #2089)
- Updated minimum requirements: Qt 5.9
- Updated instructions for building Stellarium from source code (GH: #1927)
- Updated GUI of Satellites plugin: cosmetic fixes
- Updated list of exoplanet detection methods
- Updated list of contributors
- Updated list of active developers
- Updated planetary nomenclature
- Updated list of base locations
- Updated the code of core: refactoring
- Updated translations of sky cultures
- Updated translations of 3D sceneries
- Updated translations of landscapes
- Updated translations of GUI
- Updated the description of Chinese sky culture and fixed some issues (GH: #1952)
- Updated reference in Calendars plugin
- Updated pulsars catalog
- Updated documents for Scripting Engine
- Updated Stellarium User Guide
- Updated code for select priority and cosmetic fixes (GH: #2098)
- Updated code for tooltips in AstroCalc/Graphs tools (GH: #2110)
- Updated Babylonian (mulapin) sky culture
- Removed dead code
- Removed outdated code and data
- Removed Arabic Moon Stations sky culture (GH: #2064)
