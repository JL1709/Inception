FROM debian:buster

# REQUIRED INSTALLATIONS
# php7.3-fpm        This package provides the Fast Process Manager interpreter that runs as a daemon and receives Fast/CGI requests
# php7.3-mysql      This package provides the MySQL module(s) for PHP.
#                   PHP (recursive acronym for PHP: Hypertext Preprocessor) is a widely-used open source general-purpose scripting 
#                   language that is especially suited for web development and can be embedded into HTML. 
# mariadb-client    MariaDB client is the tool which can be used for establishing the connection and interaction with the 
#                   MariaDB server from the client-side by the user of the database. 
#                   A traditional client is a command-line tool where commands are typed on a command prompt for executing various operations.
# wget              Wget is a free software package for retrieving files using HTTP, HTTPS, FTP and FTPS, the most widely used Internet protocols.
# rm ...            clear cache
RUN apt-get update && apt-get install -y \
    php7.3-fpm \
    php7.3-mysql \
    mariadb-client \
    wget && \
    rm -rf /var/lib/apt/lists/*

# https://myjeeva.com/php-fpm-configuration-101.html#pool-directives
# Pool Directives are a PHP-FPM convention where multiple "pools" of child processes can be started and have different configurations
# (different listening ports and different management options. ). 
# The default name for the pool directives file is www.conf.
# change listen parameter to wordpress:9000
COPY www.conf /etc/php/7.3/fpm/pool.d

# WORDPRESS INSTALLATION
# WORKDIR   The WORKDIR instruction sets the working directory for any RUN, CMD, ENTRYPOINT, COPY and ADD instructions that follow it in the Dockerfile.
# wget https://wordpress.org/latest.tar.gz      Download WordPress package
# tar -xzvf latest.tar.gz                       Extract the package. The WordPress package will extract into a folder called wordpress 
#                                               in the same directory that you downloaded latest.tar.gz
# rm -rf latest.tar.gz                          remove "latest.tar.gz" to keep image small  
# rm -rf ./wordpress/wp-config-sample.php       remove "wp-config-sample.php" to replace it with a manually created config file 
#                                               "wp-config.php" in the next step
WORKDIR /var/www
RUN wget https://wordpress.org/latest.tar.gz && \
    tar -xzvf latest.tar.gz && \
    rm -rf latest.tar.gz && \
    rm -rf ./wordpress/wp-config-sample.php

# set wordpress configurations (-> wp-config.php contains the website's base configuration details)
# https://www.digitalocean.com/community/tutorials/how-to-install-wordpress-on-ubuntu-20-04-with-a-lamp-stack-de (german)
COPY wp-config.php ./wordpress 

# to fix error: enable create .pid file, cause /run/php directory doesn't exist
RUN mkdir /run/php

EXPOSE 9000

# run php-fpm7.3 listening for CGI request and force to stay in foreground and ignore daemonize option fromm configuration file
CMD ["php-fpm7.3", "-F"]