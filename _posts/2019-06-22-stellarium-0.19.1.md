---
layout: post
title: Stellarium v0.19.1 has been released!
date: 2019-06-22 19:10:00 +0700
categories: release
author: alex-w
nolangbar: true
---
The first bugfix release for series 0.19.

Thank you very much to community for bug reports, feature requests and contributions!

Full list of changes:
- Added allow to search an inactive meteor showers in Search Tool/Lists tool
- Added 'Azimuth vs. Time' graph into AstroCalc/Graphs tool
- Added feature to show tracks for latest several selected planets (GH: #539)
- Added calculation and showing the orbital period for artificial satellites
- Added revolutions per day info for artificial satellites
- Added tools for jumping to the next or previous time of rising, transit or setting for selected object (GH: #484)
- Added new behavoir for AstroCalc/Graphs when clicking within graph area now sets current time.
- Added simplification in topocentric correction (GH: #391)
- Added parallactic angle function (added it to infostring and infomap also)
- Added hour angle and sidereal time to infomap
- Added apply rotation when drawing Solar Corona (GH: #699)
- Fixed draw corona when atmosphere is switched off
- Fixed airmass in infomap
- Fixed issue in script 'Mercury Triple Sunrise and Sunset' 
- Fixed crash of Stellarium for eyepieces with permanent crosshair
- Fixed Stellarium crash when Remote Control plugin is working
- Fixed computation of assume radius for minor planets.
- Fixed the issue of the scrolling not working properly on Mac (GH: #393)
- Fixed crash in Scripting Engine (Hide artificial satellites through StelProperties in core.clear() method to avoid crash if plugin was didn't loaded)
- Fixed planetarium crash in HiPS (network manager delete problem)
- Fixed position problems on the Poles (GH: #391)
- Fixed scaling Telrad sign on HighDPI monitors
- Fixed surface occlusion bug even with landscape turned off in scripting engine (GH: #680)
- Fixed building with cmake -DBUILD_SHARED_LIBS=ON (GH: #683)
- Fixed error in constellation file format (Babylonian)
- Fixed Europe/Volgograd time zone settings (GH: #686)
- Fixed HiPS handling of allsky download (GH: #671)
- Fixed progress bar rendering (GH: #671)
- Fixed positive declinations issue in AstroCalc tool when option 'Use decimal degrees' is enabled (GH: #690)
- Fixed file names inconsistency
- Fixed constellation line in "Japanese Moon Stations" skyculture
- Fixed file name for constellation boundaries in Stellarium User Guide
- Fixed the user interface problems in Oculars plug-in (GH: #580)
- Fixed getting the wrong values in objects/info method for selected object for different formats (Remote Control plugin)
- Fixed refresh plots when AstroCalc dialog becomes visible again (AstroCalc/Graphs tool)
- Fixed jquery vulnerability (GH: #694)
- Fixed date and time dialog behaviour: Hour/Minute/Second spinners now correctly trigger signals dateChanged(), dateChangedByYear and dateChangedForMonth() when days, months or years are affected by it.
- Fixed update graphs in AstroCalc/Graphs tool when days change
- Updated planetary nomenclature
- Updated common names of stars and DSO's
- Updated cmake rules for Windows deployment
- Updated DSO textures
- Updated behaviour of HiPS survey if Stellarium started without network (GH: #681)
- Updated GUI for ArchaeoLines plugin (GH: #689, #682)
- Updated default pulsars catalog (v1.60)
- Updated list of asterisms
- Updated AstroCalc tools: many optimizations
- Excluded Armintxe skyculture and landscape from default package
