#!/usr/bin/python
# coding: utf-8

import glob
import re
import babel.messages
import babel.messages.pofile

# Update the file po/stellarium-website.pot from the source files

all_files = []
src_dirs =  ['_includes/', '_layouts/', '_posts/', '']
for d in src_dirs:
  all_files.extend(glob.glob(d + '*.html'))

catalog = babel.messages.catalog.Catalog(domain=None, header_comment=u'# Translations template for PROJECT.\n# Copyright (C) YEAR ORGANIZATION\n# This file is distributed under the same license as the PROJECT project.\n# FIRST AUTHOR <EMAIL@ADDRESS>, YEAR.\n#', project="stellarium-website", version="1.0", copyright_holder="Stellarium's team", msgid_bugs_address="stellarium-translation@lists.launchpad.net", creation_date=None, revision_date=None, last_translator=None, language_team=None, charset=None, fuzzy=True)
for fn in all_files:
  with open(fn, 'r' ) as f:
    content = f.read()
  for match in re.finditer('\{% include tr.html s="(.*)" %\}', content, flags = re.M):
    lineno = content.count('\n', 0, match.start())
    catalog.add(match.group(1), locations=[(fn, lineno)])

with open("po/stellarium-website.pot", 'w' ) as f:
  babel.messages.pofile.write_po(f, catalog)
