-- https://www.digitalocean.com/community/tutorials/how-to-install-mariadb-on-debian-10
-- https://docs.rackspace.com/support/how-to/create-and-edit-users-in-mysql/

-- CREATE DATABASE wordpress                            create database for wordpress
-- CREATE USER 'jludt'@'%' IDENTIFIED BY 'password'     why '%' ????? and not 'localhost'?
--                                                      create a new user and set a password
-- GRANT ALL PRIVILEGES ON wordpress.* TO 'jludt'@'%'   allow new user to have full access to it so that 
--                                                      they can create, read, update, and delete records 
-- FLUSH PRIVILEGES                                     flush the privileges to update the copy of the privileges in the memory, 
--                                                      which reloads the user table in MariaDB. 
--                                                      You must perform this step each time you add or edit a user.
--                                                      If you forget the command, it is possible that you cannot register with 
--                                                      the new (or changed) access data to the database server yet.
-- ALTER USER 'root'@'localhost' IDENTIFIED BY '4242'   (re)set the password for the database 'root'@'localhost' account

CREATE DATABASE wordpress;
CREATE USER 'jludt'@'%' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON wordpress.* TO 'jludt'@'%';
FLUSH PRIVILEGES;

ALTER USER 'root'@'localhost' IDENTIFIED BY '4242';