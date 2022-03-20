FROM debian:buster

RUN apt-get update && apt-get upgrade -y 
RUN apt-get install nginx -y
RUN openssl req -x509 -nodes -days 365 -newkey rsa:2048 -subj '/C=DE/ST=BaWue/L=Heilbronn/O=42/CN=jludt' -keyout /etc/ssl/certs/localhost.key -out /etc/ssl/certs/localhost.crt
COPY nginx.conf /etc/nginx/sites-available/default

CMD ["nginx", "-g", "daemon off;"]