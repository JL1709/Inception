-- https://www.digitalocean.com/community/tutorials/how-to-install-mariadb-on-debian-10
CREATE DATABASE wordpress;
CREATE USER 'jludt'@'%' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON wordpress.* TO 'jludt'@'%';
FLUSH PRIVILEGES;

ALTER USER 'root'@'localhost' IDENTIFIED BY '4242';