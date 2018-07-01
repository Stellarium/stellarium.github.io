---
layout: post
title: Stellarium 0.18.1
date: 2018-03-25 18:44:00 +0700
categories: release
author: alex-w
nolangbar: true
---
The major changes of this version:
- Improvements and fixes for Hierarchical Progressive Surveys [HiPS] support
- Updated code of plugins
- Updated code and data
- Updated GPS handling
- Added rise, transit and set times for celestial objects
- Added dithering support

A huge thanks to the people who helped us a lot by reporting bugs!

Full list of changes:
- Added dithering support
- Added filtering for pulsars
- Added option for Telrad
- Added nomenclature for Charon
- Added new time steps for AstroCalc/Ephemeris tool
- Added support Mandarin Chinese language
- Added support of hi-res screenshots (GH: #141)
- Added few small improvements for Quasars plugin
- Added tooltips for color buttons in Pulsars plugin
- Added option to hiding invisible satellites in markers mode (GH: #145)
- Added angular size for the estimated values of coma and gas tail for comet
- Added support decimal degrees for size of DSO
- Added improvements for proportional size textures for large DSO (GH: #159)
- Added atmospheric mixing and extinction handling to Toast Survey (GH: #158)
- Added Korean translation for landscape description (GH: #170)
- Added shortkeys for change light pollution (GH: #171)
- Added rise, transit and set times for celestial objects (GH: #169)
- Added info about duration of the solar day
- Added scripting function to retrieve environment variables.
- Added changeability of magnitude limit for stars through keyboard shortcuts (GH: #174)
- Added Korean ISL File and Update iss.cmake (GH: #185)
- Added allowing storing script output to absolute path
- Added equatorial radius / diameter info for Solar system bodies
- Added calculation of equatorial rotation velocity for Solar system bodies (except comets)
- Added 2 more lines to ArchaeoLines plugin
- Fixed load the HiPS sources through proxy
- Fixed creating screenshots on retina displays 
- Fixed behaviour Macbook's touchpad
- Fixed result of dithering color components with exactly zero tail 
- Fixed dithering for OpenGL ES2
- Fixed enabling various lines when Telrad is enabled (GH: #109)
- Fixed error in DSO catalogs filter
- Fixed bug when screenshots folder can't be changed via GUI (LP: #1764084, GH: #144)
- Fixed compile with Qt5.10 (Windows/Visual Studio 2015) (GH: #139)
- Fixed visibility of splash screen (GH: #142)
- Fixed rendering asterisms names
- Fixed editing telescope properties for Telescope Control plugin
- Fixed memory leak of Bayer pattern texture in StelPainter (GH: #154)
- Fixed HiPS server requests (GH: #156)
- Fixed infotext brightness when planets are switched off
- Fixed crash after customization of absolute/relative scales
- Fixed operational status string for satellites
- Fixed incorrect pair counts in constellationship.fab files (GH: #167)
- Fixed color issue for formatting infostring
- Fixed selection in AstroCalc/Positions tool
- Fixed fullscreen toggle on Mac OS X (GH: #193)
- Fixed User Agent string for HiPS
- Fixed the SSO isolated trails checkbox. (GH: #199)
- Fixed a rendering bug with spheric mirror distortion (LP: #1777320)
- Updated behaviour of Toast: lazily creation of the grid
- Updated help of Telescope Control plugin
- Updated HiPS behaviour: try to use caching as much as possible
- Updated user agent string for HiPS browser
- Updated nomenclature list
- Updated main GUI
- Updated GUI of plugins
- Updated Satellites plugin
- Updated GPS handling
- Updated list of contributors
- Updated catalog of pulsars
- Updated behaviour of Search Tool for craters
- Updated Quasars plugin
- Updated format for DSO's size
- [SUG] Updated year for copyright notices
- Updated Korean Star Names (GH: #173)
- Updated hyperlinks for DOIs resolver (GH: #187)
- Updated CMake rules for Windows/MSVC (GH: #183, #188)
- Updated textures
- Updated Scripting Engine: extended behaviour for includes files in scripts
- Updated the code: remove some redundant calls to increase code readability. (GH: #184)
- Updated the code: replaces foreach macro by C++11 range-based for. (GH: #195)
- Updated the code: remove gVector, use Vec3d instead. (GH: #197)
- Updated the code: C++11 auto to replace complicated hand written types. (GH: #196)
- Updated the code: disable debug logging on OpenGLES mode. (GH: #201)
- Updated the code: remove the null pointer check after new. (GH: #202)
- Updated the code: check struct size by using static_assert. (GH: #203)
- Updated the code: put dwarf galaxies and h400 tables into static array. (GH: #204)
- Updated the code: call getDecYear in getDeltaTByEspenakMeeus. (GH: #205)
- Updated the code: remove some new/delete pairs, just use variables on stack. (GH: #206)
- Updated CMake code: enable persistent usage of C++11 standard for compiling (GH: #192)