---
layout: post
title: Stellarium 1.1
date: 2022-10-31 21:40:00 +0700
categories: release
author: alex-w
nolangbar: true
---
The major changes of this version:
- Added support OpenGL 3.3 Core profile
- Changed core: switch to use CalcMySky v0.2.1
- Changed GUI: allow user CSS
- Fixed compiling with Qt 6.4
- Fixed Telescope Control plugin
- Removed Dakota & Ojibwe sky cultures: this is on request of the original contributors, and following a misunderstanding about licensing.

Full list of changes:
- Added support OpenGL 3.3 Core profile
- Added support for the versioned variant of ShowMySky library
- Added ability to show only special nomenclature points (GH: #2748)
- Added Abort slew button into Telescope Control plugin
- Added aberration to CustomObjects made from Simbad queries (GH: #2769)
- Added donation link to AppStream Metadata (GH: #2773)
- Added small tuning for DSO selection without magnitudes (GH: #2701, #2716)
- Added another vanished timezone
- Added workaround for QTBUG-105984 in macOS (GH: #2785)
- Fixed loading of glow texture in OnlineQueries plugin
- Fixed compiling with Qt 6.4: use QString instead of QByteArray (GH: #2709)
- Fixed OnlineQueries plugin button: redesigned OnlineQueries icons (GH: #2710, #2714)
- Fixed building Stellarium with -DENABLE_MEDIA=Off option
- Fixed using of OpenGL debug logger
- Fixed AppVerName variable for Windows installer (GH: #2728)
- Fixed crash in AtmosphereShowMySky constructor when OpenGL 3.3 functions pointer is null
- Fixed loading dynamic plugins (GH: #2725)
- Fixed bundling for the versioned variant of ShowMySky library on macOS
- Fixed resizing tab names in Help window when language is changed
- Fixed a missing iterator count-up(!) in SlewDialog (Telescope Control plugin)
- Fixed saving option "Use horizontal coordinates" in Oculars plugin
- Fixed saving mount properties in Telescope Control plugin (GH: #2713)
- Fixed protocol for screenshots URL
- Fixed bundling latest versions of ShowMySky library (GH: #2761, #2779)
- Fixed normals map of the Moon, increase its resolution and implement shadows (GH: #2781)
- Fixed issue in unit testing of scripting engine (GH: #2774)
- Fixed freezing Stellarium when scripts are running (GH: #2792)
- Changed core: make Date&Time dialog more usable for typing date
- Changed core: optional support XLSX files (GH: #2723)
- Changed core: avoid deprecation warnings on Qt5.14+
- Changed core: avoid a debug output
- Changed core: avoid uninitialized vectors
- Changed core: replace world map with a higher-resolution version (The map was taken from NASA Blue Marble Next Generation dataset for July 2004) (GH: #2742)
- Changed core: handle exceptions from AtmosphereRenderer when drawing
- Changed core: current atmosphere should be deleted immediately if we need to reset to fallback
- Changed core: handle the options that set environment variables before QGuiApplication is created
- Changed core: detect OpenGL ES mode dynamically rather than by conditional compilation
- Changed core: make orbits antialiased
- Changed core: simplify check for GLES
- Changed ASCOM client in Telescope Control plugin
- Changed core: switch to use CalcMySky v0.2.1
- Changed core: restore current OpenGL context if it got replaced after window resize during StelMainView::init()
- Changed core: avoid GL_INVALID_OPERATION caused by operating on zero VAO
- Changed core: move dithering mode management from StelPainter to StelCore
- Changed rules for packaging Stellarium in Windows
- Changed rules for packaging Stellarium in Linux
- Changed license info for Boorong sky culture
- Changed license info for Lokono sky culture
- Changed GUI: allow user CSS (GH: #2772, #678, #1624, #2763)
- Changed Telescope Control plugin: trivial simplifications)
- Updated scripts
- Updated list of default locations
- Updated default catalog of pulsars
- Updated GUI: set date delimiters in Date-Time dialog in one place
- Updated GUI of Telescope Control plugin
- Updated list of default locations
- Updated description of Equation of Time plugin
- Updated AppStream Metadata
- Removed outdated bookmark in Solar System Editor plugin
- Removed languages without translators
- Removed Dakota & Ojibwe sky cultures: this is on request of the original contributors, and following a misunderstanding about licensing.
- Removed the font hook for Windows
