FROM debian:buster

# INSTALLATIONS
# install nginx
# install openssl   library that contains SSL and TLS
#                   a nginx ssl certificate is used to protect your webserver through encrypted HTTPS data transfer
#                   SSL (Secure Sockets Layer) - standard technology for securing Internet connections and protecting 
#                                                sensitive data transferred between two systems 
#                   TLS (Transport Layer Security) - TLS is just an updated version of SSL that provides higher security. 
# rm...             cleare cache
RUN apt-get update && apt-get install -y \
    nginx \
    openssl && \
    rm -rf /var/lib/apt/lists/*

# set nginx configuration
COPY default /etc/nginx/sites-available

# create openssl certificate
# https://www.openssl.org/docs/man1.0.2/man1/openssl-req.html
# https://comodosslstore.com/resources/what-is-a-sha256-ssl-certificate/
# https://stackoverflow.com/questions/10175812/how-to-generate-a-self-signed-ssl-certificate-using-openssl
# req               the req command primarily creates and processes certificate requests
# -x509             this option outputs a self signed certificate instead of a certificate request
# -days n           when the -x509 option is being used this specifies the number of days to certify the certificate for. The default is 30 days.
# -nodes            if this option is specified then if a private key is created it will not be encrypted.
#                   Theoretically you could leave out the -nodes parameter (which means "no DES encryption"), in which case "/etc/ssl/private/nginx.key" 
#                   would be encrypted with a password. However, this is almost never useful for a server installation, because you would either 
#                   have to store the password on the server as well, or you'd have to enter it manually on each reboot.
# -newkey arg       this option creates a new certificate request and a new private key (arg = rsa:nbits)
#   rsa:nbits       nbits is the number of bits, generate an RSA key nbits in size
# -keyout filename  his gives the filename to write the newly created private key to
# -out filename     This specifies the output filename to write to or standard output by default
# -sha256           SHA is an acronym for “secure hashing algorithm".
#                   SHA256 is nothing but the SHA2 algorithm having a 256-bit length. SSL/TLS certificates having the SHA256 algorithm at
#                   its heart are regarded as “SHA256 SSL certificates.” SHA256 is the most widely used algorithm as far as 
#                   SSL/TLS certificates are concerned. That’s why many people use the term “SHA256 SSL certificate.” 
#                   In reality, it’s an SSL certificate that relies on the SHA256 algorithm.
# -subj arg         sets subject name for new request or supersedes the subject name when processing a request (CN = commonName)
RUN openssl req -x509 -days 365 -nodes -newkey rsa:4096 -keyout /etc/ssl/private/nginx.key -out /etc/ssl/certs/nginx.crt -sha256 -subj "/CN=jludt.42.fr" 

EXPOSE 443

# If you add a custom CMD in the Dockerfile, be sure to include -g daemon off; in the CMD in order for nginx to stay in the foreground, 
# so that Docker can track the process properly (otherwise your container will stop immediately after starting)!
CMD ["nginx", "-g", "daemon off;"]
