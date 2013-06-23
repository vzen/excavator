#!/bin/bash
# Do not run this script directly, since
# input validation is not its job.

DIR=$(dirname $1)
BASE=$(basename $1)
FILE="_$BASE.scss"
touch "$DIR/$FILE"
echo "@import \"$BASE\";" >> "$DIR/_index.scss"
