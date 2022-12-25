---
layout: post
title: Stellarium 1.2
date: 2022-12-25 23:10:00 +0700
categories: release
author: alex-w
nolangbar: true
---
The Stellarium Team has released version 1.2.

This release mostly aimed at fixing issues but also brought a few new features:
- New projection: Equirectangular (fills the screen)
- Improved rendering of Milky Way, Zodiacal Light and landscapes
- Improved rendering of the Moon
- Improved HiDPI behaviour
- Use Noto as default font
- Added Modern (IAU), Tikuna and Seri sky cultures
- Added Chinese and Bahai calendars (Calendars plugin)

Behind the scenes, several minor issues were fixed.

TELESCOPE USERS

It seems the TelescopeControl plugin at least on Windows works better in the 
Qt5-based releases. Just install this if you are affected. We are looking for 
telescope users with programming skills to help us fixing this issue. Reward 
possible!

Full list of changes:
- Added support elongation in ecliptic longitude for Pointer Coordinates plugin (GH: #2700)
- Added Bahai calendars (GH: #2898)
- Added Chinese calendar and derivatives (Japanese, Korean, Vietnamese) (GH: #2898)
- Added linebreaks to excessively long calendar output lines in Calendars plugin (GH: #2898)
- Added new projection: plate carree (GH: #2856)
- Added options to allow limiting nomenclature to the terminator zone (GH: #2790)
- Added translation hints in Calendars plugin
- Added names of Vietnamese Solar Terms in Calendars plugin
- Added support for anisotropic filtering of textures (GH: #2881)
- Added context support for proper names of pulsars
- Added Noto fonts (GH: #2877)
- Added new sky culture - Seri (GH: #2863)
- Added new sky culture - Tikuna (GH: #2812)
- Added new sky culture - Greek (Dante)
- Added one extra check for updates Satellites (GH: #2860)
- Added temporary hook for Qt5-based macOS bundles (GH: #2890)
- Added support new archive formats for generator of source packages (GH: #2820)
- Added support the Region parameter for skycultures (GH: #2760)
- Added indicator of max exposure time for moving objects in Oculars plugin (GH: #2789)
- Added new sky culture - Modern (IAU) (GH: #2835)
- Added scaling stars on a HiDPI devices (GH: #2846)
- Added 4 new sets of navigational stars
- Fixed minimum system version for macOS bundle
- Fixed typos in the rest of the codebase (GH: #2862)
- Fixed compilation without PCH
- Fixed missing translatable text for calendars
- Fixed missing signals after changing properties for nomenclature
- Fixed properties in the GUI for nomenclature
- Fixed the build of SUG on Ubuntu 20.04
- Fixed naming: Starlore -> Sky Culture
- Fixed man pages for bundle in macOS
- Fixed setting versions of packages in Windows
- Fixed link to the latest Stellarium User Guide
- Fixed checking updates of Stellarium
- Fixed context for term
- Fixed version numbers for macOS bundle (GH: #2805)
- Fixed wobble of small objects like Callisto or Thebe (GH: #2809)
- Fixed a seam that appears between floor and sides of old-style landscapes when multisampling is on
- Fixed planet shader on GLSL 1.00
- Fixed loading star names for Hawaiian Starlines SC (GH: #2808)
- Fixed renamed properties (Oculars plugin)
- Fixed a few more renamed timezones
- Fixed Observer altitude in Satellites plugin (GH: #2848)
- Fixed typos in the src/ subdirectory (GH: #2857)
- Fixed typos in the plugins/ subdirectory (GH: #2858)
- Changed Calendars plugin: Roman Calendar - print years AUC in Roman numerals (GH: #2898)
- Changed core: switch LandscapeSpherical to fragment-shader-based direction computation (GH: #2908)
- Changed core: switch LandscapeFisheye to fragment-shader-based direction computation (GH: #2908)
- Changed core: avoid the seam in spherical landscape for GL<3.3 by sacrificing mip mapping (GH: #2908)
- Changed core: avoid crash when sky culture ID is wrong
- Changed core: undo extraneous gamma encoded in moon_4k texture
- Changed core: silence Angle shader compilation warnings
- Changed core: rename vectors methods length and lengthSquared into norm and normSquared (GH: #2795)
- Changed core: remove overrides of StelProjector::project from Stereographic and Hammer projections
- Changed core: reduce the clutter when converting MatXd to MatXf
- Changed core: simplify cloning of Mat4dTransform, maintain equality of transfoMat{,f} up to static_cast<float>
- Changed core: pass a double-precision vector to StelSkyDrawer::postDrawSky3dModel instead of a single-precision one (GH: #2844)
- Changed core: move initial window resizing logic out of StelGLWidget::initializeGL() (GH: #2832)
- Changed core: store the flag on whether current OpenGL context is ES in GLInfo (GH: #2847)
- Changed core: set default GLES float precision in fragment shaders to mediump (GH: #2847)
- Changed core: add support for loading StelVertexArray into StelOpenGLArray (GH: #2847)
- Changed core: store vertex to Altitude&Azimuth position conversion matrix in Mat4dTransform (GH: #2847)
- Changed core: add support for using StelProjector::project analogue in shaders (GH: #2847)
- Changed core: add a method to compare projections of StelProjector (GH: #2847)
- Changed core: make MilkyWay project its vertices in a vertex shader instead of doing it on the CPU (GH: #2847)
- Changed core: add support for using StelProjector::unProject analogue in shaders (GH: #2847)
- Changed core: render Milky Way calculating view direction per fragment (GH: #2847)
- Changed core: render Zodiacal light calculating view direction per fragment (GH: #2847)
- Changed core: don't try to render a Planet whose textures are not all loaded
- Changed core: load Planet textures synchronously (GH: #2854)
- Updated orbital elements for minor bodies of Solar system
- Updated the default list of satellites
- Updated the default catalog of exoplanets
- Updated the default catalog of pulsars
- Updated the default list of locations
- Updated list of planetary features
- Updated DSO catalog: LBN 770 and LBN 772 are synonyms and both have coordinates as LBN 771
- Updated DSO names
- Updated Greek (Almagest) SC: a line in CrB added
- Updated Modern and Modern (IAU) SC: typo fixes
- Removed English (India) language
