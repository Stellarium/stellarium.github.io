#!/bin/bash

for lang in ar az be bs pt_BR bg bn ca zh zh_CN hr cs nb nl fa fi fr de el hu hrx id is it ja pl pt ro ru sk sv th tr sq ka ko ky la lv ms es eu eo uk en_GB vi
do
#    touch po/$lang.po
#    msgmerge -U po/$lang.po stellarium-website.pot
#    echo msgfmt po/$lang.po -o locale/$lang.mo
    msgfmt ../po/$lang.po -o ../locale/$lang.mo
done
