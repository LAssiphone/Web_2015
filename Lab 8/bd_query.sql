CREATE TABLE users 
(
    user_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_login VARCHAR(30) NOT NULL,
    user_password VARCHAR(32) NOT NULL,
    user_hash VARCHAR(32) NOT NULL,
    user_ip INT(10) unsigned NOT NULL default '0'
);

