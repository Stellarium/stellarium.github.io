---
layout: post
title: Stellarium 0.16.1
date: 2017-09-29 12:58:12 +0200
categories: release
github_user: alex-w
nolangbar: true
---
Version 0.16.1 is based on Qt 5.6.2, but it can still be built from sources with Qt 5.4.

This version is bugfix release with some important features:
  - Added moons of Saturn, Uranus and Pluto
  - Added improvements for AstroCalc tool
  - DSO catalog was updated to version 3.2:
    - Added support 'The Strasbourg-ESO Catalogue of Galactic Planetary Nebulae' (Acker+, 1992)
    - Added support 'A catalogue of Galactic supernova remnants' (Green, 2014)
    - Added support 'A Catalog of Rich Clusters of Galaxies' (Abell+, 1989)
  - Added support asterisms and outlines for DSO
  - Added improvements for the GUI

A huge thanks to the people who helped us a lot by reporting bugs!

Full list of changes:
  - Added two notations for unit of measurement of surface brightness
  - Added improvement for hide/unhide lines and grids in Oculars plugin
  - Added few moons of Saturn (Phoebe, Janus, Epimetheus, Helene, Telesto, Calypso, Atlas, Prometheus, Pandora, Pan) with classic elliptical orbits
  - Added few moons of Uranus (Cordelia, Cressida, Desdemona, Juliet, Ophelia) with classic elliptical orbits
  - Added 2 moons of Pluto (Kerberos and Styx) with classic elliptical orbits
  - Added code to avoid conflicts for names of asteroids and moons
  - Added support of IAU moon numbers
  - Added angular size into AstroCalc/Positions tool
  - Added option to allow users to choose output formatting of coordinates of objects
  - Added optional debug info for HDPI devices
  - Added optional calculations of resolution limits for Oculars plugin
  - Added new data from IAU Catalog of Star Names (LP: #1705111)
  - Added support download zip archives with TLE data to Satellites plugin
  - Added link to the Mike McCants' classified TLE data into the default list of TLE sources
  - Added link to AMSAT TLE data into the default list of TLE sources
  - Added support 'The Strasbourg-ESO Catalogue of Galactic Planetary Nebulae' (Acker+, 1992) [DSO catalog version 3.2]
  - Added support 'A catalogue of Galactic supernova remnants' (Green, 2014) [DSO catalog version 3.2]
  - Added support 'A Catalog of Rich Clusters of Galaxies' (Abell+, 1989) [DSO catalog version 3.2]
  - Added export the predictions of Iridium flares (LP: #1707390)
  - Added meta information about version and edition into file of Stellarium DSO Catalog to avoid potential crash of Stellarium in the future (validation the version of catalog before loading)
  - Added support of extra physical data for asteroids
  - Added support of outlines for DSO
  - Added new time step: saros
  - Added new time step: 7 sidereal days
  - Added more checks to the network connections
  - Added support of comments for constellations_boundaries.dat file (LP: #1711433)
  - Added support for small asterisms with lines by the equatorial coordinates
  - Added support for ray helpers
  - Added new feature (crossed lines and output string near mouse cursor) to the Pointer Coordinates plugin
  - Added missing cross-id data
  - Added support an images within description of landscapes
  - Added support Visual Studio 2017 in StelLogger
  - Added tool to save list of objects in AstroCalc/WUT tool
  - Added tool to save celestial positions of objects in AstroCalc/Positions tool
  - Added temporary solution for bug 1498616 (LP: #1498616)
  - Fixed wrong rendering Neptune and Uranus (LP: #1699648)
  - Fixed Vector3 compilation error in unit tests (LP: #1700095)
  - Fixed a conflict around landscape autoselection (LP: #1700199)
  - Fixed HMS formatting
  - Fixed generating ISS script
  - Fixed tooltips for AstroCalc/Positions tool
  - Fixed dark nebulae parameters for AstroCalc/Positions tool
  - Fixed tool for saving options
  - Fixed crash when we on the spaceship
  - Fixed Solar system class to avoid conflicts and undefined behaviour
  - Fixed orientation angle and its data rendering (LP: #1704561)
  - Fixed wrong shadows on Jupiter's moons (Added special case for Jupiter's moons when they are in the shadow of Jupiter for compute magnitudes from Expl. Suppl. 2013 item) (LP: #1704421)
  - Fixed work AstroCalc/AltVsTime tool for artificial satellites (a bit slow solution though)
  - Fixed search by lists of DSO
  - Fixed translation switch issue for AstroCalc/Graphs tool (LP: #1705341)
  - Fixed trackpad behaviour on macOS though workaround
  - Fixed couple stupid bugs in InnoSetup script
  - Fixed morphology for SNR
  - Fixed issue in parsing of date format in AstroCalc/Phenomena tool
  - Fixed link for fileStructure.html file in README (LP: #1709523)
  - Fixed the calculation for drawing a reticle on a HiDPI display (Oculars plugin)
  - Fixed default option of units of measure for surface brighness to avoid possible artifacts on the macOS (LP: #1699643)
  - Fixed crash when comments is added into constellations_boundaries.dat file (LP: #1711229)
  - Fixed behaviour of 'Center on selected object' button (LP: #1712101)
  - Fixed impossibility to select a planet after Astronomical Calculations is activated (LP: #1712652)
  - Fixed crash with unknown star in asterism
  - Fixed cross-ids of 42 bright double stars (LP: #1655493)
  - Fixed magnitude computation for Jupiter's satellites
  - Fixed crash of Stellarium when answer of freegeoip.net has wrong format (for example this host blocked by firewall or DNS server with HTML answer) (LP: #1706187)
  - Fixed translations issue in Script Console
  - Fixed illumination in Scenery3D plugin: Take eclipseFactor into account
  - Fixed potential crash in DSO outlines
  - Fixed various issues in ray helpers, asterisms and constellations support
  - Updated InfoString feature
  - Updated sky brightness during solar eclipse (really, there are only few stars visible.)
  - Updated Maori sky culture
  - Updated list of names of deep-sky objects
  - Updated list of asterisms
  - Updated selection behaviour in Oculars plugin (avoid selection of objects outside ocular circle in eyepiece mode)
  - Updated behaviour of methods getEnglishName() and getNameI18n() for minor bodies
  - Updated behaviour of planetarium for support a new format of asteroid names
  - Updated behaviour of filters for DSO catalogs
  - Updated Solar System Editor plugin (support new format of asteroid names)
  - Updated RTS2 telecope driver in Telescope Control plugin.
  - Updated API docs
  - Updated limit of magnitude for Oculars plugin (Improvements)
  - Updated AstroCalc/WUT tool
  - Updated AstroCalc/Ephemeris tool
  - Updated rules for storing default settings
  - Updated rules for computation visibility of DSO hints
  - Updated plugins
  - Updated default values for material fade-in/fade-out times
  - Updated stellarium.appdata.xml file
  - Updated tab rules in the GUI
  - Reduce warnings to one when loading OBJ with non-default w texture/vertex coordinates
