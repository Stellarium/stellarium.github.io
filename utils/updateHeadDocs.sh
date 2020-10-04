#!/bin/bash

version="0.20.3"

find ../doc/head/ -type f -name '*.html' -exec  sed -i "s/$version/HEAD/g" "{}" \;
