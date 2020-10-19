#!/bin/sh

[ "$1" = "test" ] && BD="_test"
psql -h localhost -U creartio -d creartio$BD
