#!/bin/bash

version="25.3"

find ../doc/head/ -type f -name '*.html' -exec  sed -i "s/>$version</>HEAD</g" "{}" \;
