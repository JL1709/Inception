FROM debian:buster

# REQUIRED INSTALLATIONS
# php7.3-fpm        This package provides the Fast Process Manager interpreter that runs as a daemon and receives Fast/CGI requests
# php7.3-mysql      This package provides the MySQL module(s) for PHP.
#                   PHP (recursive acronym for PHP: Hypertext Preprocessor) is a widely-used open source general-purpose scripting 
#                   language that is especially suited for web development and can be embedded into HTML. 
# mariadb-client    MariaDB client is the tool which can be used for establishing the connection and interaction with the 
#                   MariaDB server from the client-side by the user of the database. 
#                   A traditional client is a command-line tool where commands are typed on a command prompt for executing various operations.
# curl				cURL is a command line tool and a library which can be used to receive and send data between a client and a server or any two machines 
#					connected over the internet. It supports a wide range of protocols like HTTP, FTP, IMAP, LDAP, POP3, SMTP and many more.
# rm ...            clear cache

RUN apt-get update && apt-get install -y \
    php7.3-fpm \
    php7.3-mysql \
	mariadb-client \ 
	curl && \
	rm -rf /var/lib/apt/lists/*

# https://myjeeva.com/php-fpm-configuration-101.html#pool-directives
# Pool Directives are a PHP-FPM convention where multiple "pools" of child processes can be started and have different configurations
# (different listening ports and different management options. ). 
# The default name for the pool directives file is www.conf.
# change listen parameter to wordpress:9000
COPY ./www.conf /etc/php/7.3/fpm/pool.d


# Although ADD and COPY are functionally similar, ADD has some features (like local-only tar extraction and remote URL support)
ADD https://wordpress.org/latest.tar.gz /var/www/latest.tar.gz

# tar -xzvf latest.tar.gz                       Extract the package. The WordPress package will extract into a folder called wordpress 
#                                             	in the same directory that you downloaded latest.tar.gz
# rm -rf latest.tar.gz							remove "latest.tar.gz" to keep image small
RUN cd /var/www && \
	tar -xvf latest.tar.gz && \
	rm -rf latest.tar.gz

# https://make.wordpress.org/cli/handbook/guides/installing/
# WP-CLI is the official command line tool for interacting with and managing your WordPress sites.
# --silent	Silent or quiet mode. Don't show progress meter or error messages. Makes Curl mute. 
RUN	curl https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar --output /usr/bin/wp --silent
# To be able to type just wp, instead of php wp-cli.phar, you need to make the file executable
RUN	chmod +x ./usr/bin/wp

# to fix error: enable to create .pid file, cause /run/php directory doesn't exist
RUN mkdir /run/php

COPY ./config.sh /var/www/wordpress/config.sh
RUN chmod +x /var/www/wordpress/config.sh
CMD ["bash", "/var/www/wordpress/config.sh"]
