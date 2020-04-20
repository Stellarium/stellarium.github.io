---
layout: post
title: Stellarium v0.20.1 has been released!
date: 2020-04-20 21:30:00 +0700
categories: release
author: alex-w
nolangbar: true
---
The major changes of this version:
- Restore working Stellarium in ANGLE mode on Window
- Many changes in scripting engline and Script Console
- Fixes in GUI and plugins
- Updated DSO catalog

Thank you very much to community for bug reports, feature requests and contributions!

Full list of changes:
- Added new language - Luxembourgish (lb)
- Added proper properties for Angle Measure plugin
- Added configurable colors for Angle Measure plugin
- Added GUI adaptations for Angle Measure plugin
- Added evaluates scripts in individual context (Scripting Engine)
- Added new planetary nomenclature
- Added use properties in Satellites plugin
- Added overloaded Labeling functions with colors specified as Vec3f (Scripting Engine)
- Added display proper file paths and line numbers on script errors (Scripting Engine)
- Added test for low precision hms time conversion function (GH: #1043)
- Added spiky stars option
- Added checkbox to the option settings in Script Console to clear the output text before a script is run
- Added implementation of telescope syncing in INDI client (GH: #1048)
- Added dirty flag, set by signal from QTextEdit (Script Console)
- Added code to set TAB stop width at 4 characters (Script Console)
- Added code to avoid losing names after Cancel in some QFileDialog (Script Console)
- Added implementation of FSM to tranfer properly between dirty/filename states on load, save, clear, edit, expand actions (Script Console)
- Added special case Catalogs/Other in GUI for objects without identifier (DSO Catalog v3.9)
- Added Oculus plugin (disabled by default; GH: #1056)
- Fixed ANGLE support for Windows package (GH: #1035, #1034)
- Fixed keyboard navigation in Oculars plugin (GH: #1036)
- Fixed Russian translation for Windows installer
- Fixed data blunder: severely wrong slope for upcoming comet (GH: #1033)
- Fixed flipping galactic/Supergalactic labels on Southern hemisphere (GH: #1028)
- Fixed translations 'Set FOV to XXX degrees' when language is changed
- Fixed possible segfault in SolarSystem class
- Fixed building Stellarium without scripting
- Fixed (restored) fading switch effect in Satellites plugin
- Fixed (inverted) realistic/iconic mode labeling in Satellites plugin
- Fixed (renamed) properties to better follow conventions in Satellites plugin
- Fixed visualization mode in Satellites plugin
- Fixed time conversion for low precision form (GH: #1042)
- Fixed jerking an animation of movement of Solar system bodies (GH: #1041)
- Fixed name for SH2-308 (DSO Catalog v3.9)
- Fixed filter properly objects by catalogs (DSO Catalog v3.9; GH: #1052) 
- Fixed few wrong objects in DSO catalog (DSO Catalog v3.9)
- Fixed WUI of Remote Control plugin
- Updated fix for ghost comet in ortographic projection issue (GH: #389)
- Updated list of contributors
- Updated code: simplified RegExp results handling
- Changed Vec3f& to Vec3f asreturn type for functions called from scripts in some classes (Scripting Engine)
- Re-implement getDecAngle, fixing some inconsistencies (GH: #1051)
- Removed Abell planetary nebulae catalog (DSO Catalog v3.9)
