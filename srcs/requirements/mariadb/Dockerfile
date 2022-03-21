FROM debian:buster

# instalation
RUN apt-get update && apt-get install -y \
    mariadb-server && \
    rm -rf /var/lib/apt/lists/*

# set bind adress to 0.0.0.0 to allow server to listen not form localhost only, open 3306 port
COPY 50-server.conf /etc/mysql/mariadb.conf.d

# create database and users
COPY create_db_user.sql /

RUN service mysql start && \
    mysql < create_db_user.sql && \
    rm -rf create_db_user.sql

EXPOSE 3306

# startup script in MariaDB, in case if mysqld has crashed, mysqld_safe will automatically restart mysqld
CMD ["mysqld_safe"]