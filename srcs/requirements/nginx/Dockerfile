FROM debian:buster

# installation, openssl - library that contains SSL and TLS
RUN apt-get update && apt-get install -y \
    nginx \
    openssl && \
    rm -rf /var/lib/apt/lists/*

# set nginx configuration
COPY nginx.conf /etc/nginx/sites-available

# create openssl certificate
RUN openssl req -x509 -nodes -days 365 -newkey rsa:4096 -keyout /etc/ssl/private/nginx.key -out /etc/ssl/certs/nginx.crt -sha256 -subj "/CN=jludt.42.fr" 

EXPOSE 443

#If you add a custom CMD in the Dockerfile, be sure to include -g daemon off; in the CMD in order for nginx to stay in the foreground, so that Docker can track the process properly (otherwise your container will stop immediately after starting)!
CMD ["nginx", "-g", "daemon off;"]