FROM debian:buster

# instalation
RUN apt-get update && apt-get install -y \
    php7.3-fpm \
    php7.3-mysql \
    mariadb-client \
    wget && \
    rm -rf /var/lib/apt/lists/*

# change listen parameter to wordpress:9000
COPY www.conf /etc/php/7.3/fpm/pool.d

# wordpress instalation
WORKDIR /var/www
RUN wget https://wordpress.org/latest.tar.gz && \
    tar -xzvf latest.tar.gz && \
    rm -rf latest.tar.gz && \
    rm -rf ./wordpress/wp-config-sample.php

# set wordpress configurations
COPY wp-config.php ./wordpress 

# to fix error: enable create .pid file, cause /run/php directory doesn't exist
RUN mkdir /run/php

EXPOSE 9000

# run php-fpm7.3 listening for CGI request and force to stay in foreground and ignore daemonize option fromm configuration file
CMD ["php-fpm7.3", "-F"]