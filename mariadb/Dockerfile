FROM mariadb:10.5

RUN mkdir /sqlinit.d/
COPY *.sql /sqlinit.d/
COPY *.sh /docker-entrypoint-initdb.d/

RUN chmod +x /docker-entrypoint-initdb.d/insert_environment_in_sql.sh
