#!/bin/bash

version="25.1"

find ../doc/head/ -type f -name '*.html' -exec  sed -i "s/>$version</>HEAD</g" "{}" \;
