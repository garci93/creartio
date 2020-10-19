#!/bin/sh

BASE_DIR=$(dirname "$(readlink -f "$0")")
if [ "$1" != "test" ]; then
    psql -h localhost -U creartio -d creartio < $BASE_DIR/creartio.sql
fi
psql -h localhost -U creartio -d creartio_test < $BASE_DIR/creartio.sql
