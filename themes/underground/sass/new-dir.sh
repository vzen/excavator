#!/bin/bash

# Do not run this script directly, since
# input validation is not its job.

pushd . > /dev/null
cd $1
mkdir $2

NEWINDEX="$2/_index.scss"

touch $NEWINDEX
echo "@import \"$NEWINDEX\";" >> _index.scss
popd > /dev/null
