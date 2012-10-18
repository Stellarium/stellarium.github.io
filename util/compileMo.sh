#!/bin/bash

for lang in ar be bs pt_BR bg ca zh zh_CN hr cs nb nl fa fi fr de el hu hrx id it ja pl pt ru sk sv sq ka ko lv es eu eo uk en_GB
do
#    touch po/$lang.po
#    msgmerge -U po/$lang.po stellarium-website.pot
#    echo msgfmt po/$lang.po -o locale/$lang.mo
    msgfmt ../po/$lang.po -o ../locale/$lang.mo
done
