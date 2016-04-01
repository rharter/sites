#!/bin/bash

usage() {
  echo -n "usage: $0 directory"
}

if [ "$#" -lt 1 ];then
  usage
  exit 1
fi

SITE=${1}
gsutil rsync -R ${SITE} gs://${SITE}
