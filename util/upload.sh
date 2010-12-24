#!/bin/bash


usage () {
  cat <<EOD
Usage:

  cd stellarium-website
  util/${0##*/} [update-path] [[update-path] ...]

Take the current state of the stellarium-website directory and 
upload it to the stellarium website.  You may specify optional
paths to update.  If no paths are specified the whole tree will
be updated.

However, updates are done using rsync, so only updated files
will be sent... so in general you don't need to provide update
paths on the command line.

Note that you MUST set up an ssh alias called "stelweb" which 
contains the login credentials for the stellarium website.  
Note: your sourceforge user must be a member of the stelarium 
project to be able to upload to the web site.

In your ~/.ssh/config file there should be a section for 
"stelweb":

Host stelweb
     User SFUSER,stellarium
     HostName shell.sourceforge.net

Of course, with your own sourceforge username instead of SFUSER.
If you don't have that, this script won't work.

EOD

  exit ${1:-0}

}

if [ "$1" = "-h" ] || [ "$1" = "--help" ]; then
  usage 0
fi

dest="stelweb:/home/groups/s/st/stellarium/htdocs/"
src="./*"
if [ $# -gt 0 ]; then
  src="$@"
fi

rsync -av \
  --exclude util/ \
  --exclude wiki/LocalSettings.php \
  --exclude .bzr/ \
  --exclude .bzrignore \
  $src \
  $dest

