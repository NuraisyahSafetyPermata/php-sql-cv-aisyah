CREATE DATABASE login;
USE login;
CREATE TABLE login (
	id INT PRIMARY KEY AUTO_INCREMENT,
	username VARCHAR(255) NOT NULL,
	PASSWORD VARCHAR (255) NOT NULL
);

SELECT * FROM login;