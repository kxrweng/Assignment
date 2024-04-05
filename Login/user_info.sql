-- Create database
CREATE DATABASE IF NOT EXISTS user_info CHARACTER SET utf8 COLLATE utf8_general_ci;

-- Create the users table 
USE user_info;

CREATE TABLE IF NOT EXISTS users(
    id INT(11) NOT NULL AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    PRIMARY KEY(id)
);
