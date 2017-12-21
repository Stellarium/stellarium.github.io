---
layout: post
title: Stellarium 0.17.0
date: 2017-12-21 22:00:00 +0700
categories: release
author: alex-w
nolangbar: true
---
Version 0.17.0 is based on Qt 5.9.3, but it can still be built from sources with Qt 5.4.

The major changes of this version:
- Added support for nomenclature of planetary surface (SOCIS 2017 project)
- Added improvements for AstroCalc tool
- Added improvements for Oculars plugin
- Added improvements for Exoplanets plugin
- Added INDI support for Telescope Control plugin
- Updated code and data

A huge thanks to the people who helped us a lot by reporting bugs!

Full list of changes:
- Added support for nomenclature of planetary surface (SOCIS 2017 project)
- Added templates for translation of planetary features nomenclature
- Added support of movement to selected nomenclature item
- Added new tab for AstroCalc tool: Planetary Calculator
- Added Icelandic translation for a couple of skycultures
- Added another OS detection logging function
- Added new landscape: the Sun
- Added Russian translation for new landscape
- Added filters for nomenclature (Search Tool/Lists)
- Added support plural forms for translation (LP: #1561457)
- Added deselectConstellations() method to public area
- Added new time steps for AstroCalc/Ephemerides tool
- Added sane defaults to Planets
- Added subclasses to the list of Solar system objects in AstroCalc/Positions tool
- Added config option to allow make visible orbits for major planets only (LP: #1720722)
- Added rule to allow to hide nomenclature on the celestial body of observer (LP: #1723742)
- Added context support for Solar system bodies
- Added angular size filter for DSO
- Added shortcut for nomenclature
- Added plus/minus keys for elevation change on Macs without PgUp/PgDn
- Added better font scaling for HiDPI Macs
- Added detection method info for exoplanets
- Added visual resolution info for Oculars plugin
- Added GUI options for color of exoplanet marker
- Added a default for night mode
- Added API command to retrieve view direction in RemoteControl plugin
- Added API commands into RemoteControl plugin: allow view setting jNow, harmonize capitalisation for the parameters.
- Added velocity display to Planets, MinorPlanets and Comets
- Added improvements for AstroCalc/PC tool
- Added orbital velocities for AstroCalc/PC tool
- Added special case for long list of "also known as" names
- Added INDI support for Telescope Control plugin
- Added Caucasian Mountain Observatory to locations list
- Added option to select temperature scale to the Exoplanets plugin
- Added option to allow scaling of Ocular buttons (LP: #1507205)
- Added new option to the Navigational Stars plugin
- Added checkboxes for DSO catalogs (PN G, SNR G, ACO) in Remote Control plugin
- Added wikilinks for names of Solar system bodies
- Fixed filter for limiting by DSO mangitudes
- Fixed TestStelJsonParser fails (LP: #1719076)
- Fixes and additions for French descriptions
- Fixed context support for constellations
- Fixed sort order for 'Peak' in Meteor showers search (LP: #1719939)
- Fixed location for stellarium.appdata.xml file
- Fixed stupid bug for asterisms in Search Tool/Lists
- Fixed some back-side issues of nomenclature (LP: #1721815)
- Fixed crash for Custom Objects (LP: #1722527)
- Fixed output data for Exoplanets plugin
- Fixed potential crash for nomenclature and inconsistency of data
- Fixed light speed correction issue for nomenclature items (LP: #1724517)
- Fixed annoying malfunction in Oculars plugin (lost of tracking) (LP: #1724106)
- Fixed the new moons' rotation times
- Fixed selecting of comets in AstroCalc/Positions tool
- Fixed behaviour and style of tool for download star catalog
- Fixed infostring for satellite features
- Fixed centering/tracking issues for Nomenclature feature (LP: #1721818)
- Fixed small Coverity issue
- Fixed bug of positions for nomenclature when Solar system data is reloaded
- Fixed shader for planet texture rendering (LP: #1731788)
- Fixed sign for declination coordinate for Southern Iota Aquarids
- Fixed behaviour of Velocity checkbox
- Fixed Oculars GUI Panel behaviour: disabled event processing on the sky under GUI
- Fixed ray helpers lines behaviour in Oculars plugin
- Fixed crossid info of alpha2 centauri (LP: #1734396)
- Fixed Oculars plugin mouse bug on retina display
- Fixed wrong unit of measurement for distance
- Fixed mouse cursor hidding
- Fixed zero-filled initial date/time window issue (LP: #1409935)
- Fixed crash of Stellarium when flag for decimal degrees usage is changed
- Fixed regressions introduced by recent LabelMgr refactoring
- Updated default settings of build environment for Windows and Mac OS X
- Updated ICU rules for Qt 5.9+
- Updated Oculars plugin (Allows accessing via RemoteControl)
- Updated list of DSO outlines (port from HNSKY)
- Updated list of DSO names
- Updated behaviour of auto-load landscape when moving to selected planet
- Updated scripts and their descriptions
- Updated Bengali description of landscapes
- Updated list of planetary nomenclature
- Updated list of official star names
- Updated default time step for AstroCalc/Phenomena tool
- Updated behaviour of flag for orbits to renew visibility of orbits
- Updated GUI items in the View dialog
- Updated list of ray helpers
- Updated protocols for MPC
- Updated Triangulum constellation lines
- Updated the solar system screen saver script
- Updated code for beta versions naming
- Updated Chinese skyculture
- Improved performance for AstroCalc tool
- Improved performance for Nomenclature feature
- Code refactoring