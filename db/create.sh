#!/bin/sh

if [ "$1" = "travis" ]; then
    psql -U postgres -c "CREATE DATABASE creartio_test;"
    psql -U postgres -c "CREATE USER creartio PASSWORD 'creartio' SUPERUSER;"
else
    sudo -u postgres dropdb --if-exists creartio
    sudo -u postgres dropdb --if-exists creartio_test
    sudo -u postgres dropuser --if-exists creartio
    sudo -u postgres psql -c "CREATE USER creartio PASSWORD 'creartio' SUPERUSER;"
    sudo -u postgres createdb -O creartio creartio
    sudo -u postgres psql -d creartio -c "CREATE EXTENSION pgcrypto;" 2>/dev/null
    sudo -u postgres createdb -O creartio creartio_test
    sudo -u postgres psql -d creartio_test -c "CREATE EXTENSION pgcrypto;" 2>/dev/null
    LINE="localhost:5432:*:creartio:creartio"
    FILE=~/.pgpass
    if [ ! -f $FILE ]; then
        touch $FILE
        chmod 600 $FILE
    fi
    if ! grep -qsF "$LINE" $FILE; then
        echo "$LINE" >> $FILE
    fi
fi
