#!/bin/bash

usage() {
  echo -n "usage: $0 directory"
}

if [ "$#" -lt 1 ];then
  usage
  exit 1
fi

pushd ${SITE}
firebase deploy
popd
