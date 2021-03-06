# The FROM instruction initializes a new build stage and sets the Base Image for subsequent instructions.
FROM debian:buster

# The RUN instruction will execute any commands in a new layer on top of the current image and commit the results. 
# The resulting committed image will be used for the next step in the Dockerfile.

# apt-get update:                       update packages
# apt-get install -y mariadb-server:    install MariaDB (flag -y -> "yes")
# rm -rf /var/lib/apt/lists/*:          good practice for writing Dockerfiles
#                                       every apt command gets written inside a list
#                                       to keep image size small, erase the cache                                  
RUN apt-get update && apt-get install -y \
    mariadb-server && \
    rm -rf /var/lib/apt/lists/*

# COPY has two forms:
# COPY [--chown=<user>:<group>] <src>... <dest>
# COPY [--chown=<user>:<group>] ["<src>",... "<dest>"]
# The COPY instruction copies new files or directories from <src> and adds them to the 
# filesystem of the container at the path <dest>.

# load MariaDB config file
COPY 50-server.cnf /etc/mysql/mariadb.conf.d
# create database and users
COPY create_db_user.sql /

# service mysql start:          start MariaDB server
# mysql < create_db_user.sql    ...with created user in file create_db_user.sql
# rm -rf create_db_user.sql     ...and remove it because it user already created

RUN service mysql start && \
    mysql < create_db_user.sql && \
    rm -rf create_db_user.sql

# There can only be one CMD instruction in a Dockerfile. 
# If you list more than one CMD then only the last CMD will take effect.
# The main purpose of a CMD is to provide defaults for an executing container. 
# These defaults can include an executable, or they can omit the executable, 
# in which case you must specify an ENTRYPOINT instruction as well.
# https://mariadb.com/kb/en/mysqld_safe/
# Startup script for MariaDB. In case mysqld has crashed, mysqld_safe will automatically restart mysqld
CMD ["mysqld_safe"]