#!/bin/bash

xgettext -o stellarium-website.pot --keyword=q_ -C --copyright-holder="Stellarium's team" --from-code=utf-8 --package-name stellarium-website --package-version 1.0 -L PHP --msgid-bugs-address=stellarium-translation@lists.launchpad.net index.php
