---
title: Galilean Moons
author: Jason Hooper
compat: 0.16+
script_url: https://raw.githubusercontent.com/jasonincanada/stellarium-scripts/master/galilean-moons.ssc
categories: community
---
Cycle around the Galilean moons: Io, Europa, Ganymede, Callisto.  The cameras cycle from
inner to outer moons, pointing inward to the nearest moon.  Io is the innermost of the
four Galilean moons and points to Amalthea.  It could just as well be pointed at Jupiter
itself, but it's a bit more dynamic when pointing at Amalthea.

There is a 5-second wait before starting the cycle. Newer versions of Stellarium (I've
tested this script on 0.18.0) seem to error out if the camera movements start right when
the script does, so the delay gives the program a few seconds to "settle" before moving
to the first camera.  The last version that seemed to be reliable in this sense was 0.16.