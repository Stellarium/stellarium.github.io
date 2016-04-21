#!/bin/bash

version="0.15.0"

find ../doc/head/ -type f -name '*.html' -exec  sed -i "/doc/s/$version/head/g" "{}" \;
#find ../doc-plugins/head/ -type f -name '*.html' -exec  sed -i "/doc/s/$version/head/g" "{}" \;
