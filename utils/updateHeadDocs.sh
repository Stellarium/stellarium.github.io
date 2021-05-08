#!/bin/bash

version="0.21.0"

find ../doc/head/ -type f -name '*.html' -exec  sed -i "s/$version/HEAD/g" "{}" \;
