#!/bin/bash

set -ue

cd /sqlinit.d/
echo "------------------------------------------"
echo "Setting environment variables in SQL file(s):"
ls *.sql
echo "------------------------------------------"

create_subst() { 
    local var=$1; 
    echo "s/@@$var@@/${!var}/g"; 
}

for sqlfile in $(ls *.sql); do
    cat $sqlfile | sed -e "$(create_subst DATABASE_PASSWORD)" -e "$(create_subst DATABASE_USER)" | mysql -uroot -p${MYSQL_ROOT_PASSWORD} 
done
