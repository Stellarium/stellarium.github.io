#!/bin/bash

for lang in ar en be bs pt_BR bg ca zh_CN hr cs nl fi fr de el hrx it ja pl pt ru es uk
do
#    touch po/$lang.po
#    msgmerge -U po/$lang.po stellarium-website.pot
#    echo msgfmt po/$lang.po -o locale/$lang.mo
    msgfmt ../po/$lang.po -o ../locale/$lang.mo
done
