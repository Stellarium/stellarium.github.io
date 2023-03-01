#!/bin/bash

for file in ./transifex/*.po
do
    newfile=$( cut -d '_' -f 2- <<< "$file" )
    mv -f "$file" "../po/$newfile"
done