#!/bin/bash


usage () {
  cat <<EOD
Usage:

  cd stellarium-website
  util/${0##*/} index.php ??/index.php

Do replacement of the links in the index.php files.  
First edit this file to contain the latest links, then run it
with the path to all index.php files as arguments.  Note that
backups will be made with a ~ suffix to the file name.  It's
probably a good idea to do a diff and make sure that only the
correct parts of the files have been updated.

EOD

  exit ${1:-0}

}

if [ $# -eq 0 ]; then
  usage 1
fi

if [ "$1" = "-h" ] || [ "$1" = "--help" ]; then
  usage 0
fi

for f in "$@"; do 
# when updating these links, make sure you escape & character!
  sed -i~ \
    -e 's%"http://.*exe"%"http://downloads.sourceforge.net/stellarium/stellarium-0.10.6.1.exe"%' \
    -e 's%"http://.*\.tar\.gz"%"http://downloads.sourceforge.net/stellarium/stellarium-0.10.6.1.tar.gz"%' \
    -e 's%"http://.*dmg"%"http://downloads.sourceforge.net/stellarium/stellarium-0.10.6-Intel.dmg"%' \
    "$f"
done

#  -e 's%"http://.*pdf"%"http://downloads.sourceforge.net/stellarium/stellarium_user_guide-0.10.2-1.pdf"%' \

