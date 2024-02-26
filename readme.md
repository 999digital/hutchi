#Site

##Local domain

hutchi.localhost

##Wordpress login

hutchi_admin / p96CrKWWHPe!

##DB

CREATE SCHEMA hutchi;
CREATE USER 'hutchi'@'localhost' IDENTIFIED BY 'jkhTR987MNBrew432';
GRANT ALL PRIVILEGES ON hutchi.* TO 'hutchi'@'localhost';
FLUSH PRIVILEGES;

