#!/bin/bash

for lang in fr de es
do
    touch po/$lang.po
    msgmerge -U po/$lang.po stellarium-website.pot
    echo msgfmt po/$lang.po -o locale/$lang.mo
    msgfmt po/$lang.po -o locale/$lang.mo
done
