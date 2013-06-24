#!/bin/bash
DIR=$(dirname $1)
BASE=$(basename $1)
FILE="_$BASE.scss"
touch "$DIR/$FILE"
echo "@import \"$BASE\";" >> "$DIR/_index.scss"
