---
layout: post
title: Stellarium 0.18.2
date: 2018-08-15 18:50:00 +0700
categories: release
author: alex-w
nolangbar: true
---
The major changes of this version:
- Improvements and fixes for AstroCalc tool and plugins
- Added support Abell Catalog of Planetary Nebulae and ESO/Uppsala Survey of the ESO(B) Atlas
- Added few new scripts
- Updated code and data

A huge thanks to the people who helped us a lot by reporting bugs!

Full list of changes:
- Added GUI improvements for AstroCalc tool
- Added elongation support for AstroCalc/Phenomena tool
- Added support decimal degrees format for AstroCalc tool
- Added handle keypressing for list of matching objects in AstroCalc/WUT tool
- Added filters for enlisted objects in Search Tool/Lists tool
- Added filters for list of matching objects in AstroCalc/WUT tool
- Added new textures for moons 
- Added column with angular distance from the Moon into AstroCalc/Phenomena tool
- Added special case for partial solar eclipses in AstroCalc/Phenomena tool
- Added centering text for headers in AstroCalc/Phenomena, AstroCalc/Ephemeris and AstroCalc/Positions tools
- Added "clear" button for search of artificial satellites in the selected group (Satellites plugin)
- Added additional context for term 'Transit' (GH: #215)
- Added artwork for some Maori constellations
- Added support Abell Catalog of Planetary Nebulae (Abell, 1966)
- Added distances for some planetary nebulae (DSO)
- Added possibility to select all constellations through scripts and hotkeys
- Added new language (Urdu)
- Added additional level of checks for JSON documents
- Added Lokono sky culture
- Added support to add/subtract calendric month through hotkeys (GH: #232)
- Added support 'ESO/Uppsala Survey of the ESO(B) Atlas'
- Added processing the 30x HTTP codes for Quasars, Pulsars, Historical Supernovae, Bright Novae, Meteor Showers and Exoplanets plugins (GH: #236, #231, #229, #227, #226, #225, #224, #223)
- Added visual magnitudes and sizes for Abell planetary nebulae
- Added support Milkyway saturation effect (GH: #175, #242)
- Added Henriksson solution (2017) for Schoch formula for DeltaT (1931)
- Added actions (without default hotkeys) to toggle Moon and Minor body scaling
- Added script "Jupiter and triple shadow phenomena"
- Added script "Jupiter without Galilean satellites"
- Added script "Occultations of bright stars by planets"
- Added script "Mutual occultations of planets"
- Fixed sorting rules for AstroCalc/Phenomena tool
- Fixed Moon HiPS rendering during eclipse
- Fixed URL of API for "Location from network" feature (GH: #218)
- Fixed some errors in DSO catalog
- Fixed crash in the combination: constellation is selected and sky culture has been changed
- Fixed Earth shadow on scaled Moon during eclipse
- Fixed auto-enabling landscapes when setObserverLocation is call (LP: #1783752)
- Fixed position of Jupiter moons: updated theory to L1.2 (GH: #222)
- Fixed cross-index data issue (DSO)
- Fixed the term for altitude above sea level (GH: #247)
- Fixed desync bug with IAU Constellation and constellation borders (GH: #246)
- Fixed reserved identifier violation issue (GH: #243)
- Fixed trouble with selection priority of nomenclature items for celestial bodies in deep shadow (GH: #239)
- Fixed parsing error in constellation IAU borders lookup (GH: #241)
- Fixed compiler warnings when GPS support is disabled (GH: #240)
- Fixed potential crash for Meteor showers plugin
- Fixed crash (segmentation fault) for sporadic meteors with max ZHR
- [SUG] Fixed bibtex link
- [SUG] Fixed links for HCG data (GH: #212)
- Updated scripts
- Updated behaviour of deselectConstellations() method (LP: #1780951)
- Updated Epimetheus texture
- Updated behaviour of "clear" button for Search and AstroCalc/WUT tools
- Updated list of locations
- Updated list of DSO names
- Updated behaviour of Oculars button on bottom toolbar: hidden by default
- Updated default bookmarks of Solar System Editor plugin (GH: #180)
- Updated script 'Partial Lunar Eclipse'
- Updated default host for GeoIP service
- Updated the appdata file (GH: #234)
- Updated behaviour of Location dialog: allowed to use resort GPS location at next startup and disable IP query when GPS is used
- Removed support of terrible Qt plural forms
