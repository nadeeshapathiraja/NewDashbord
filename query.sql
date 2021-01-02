CREATE DATABASE demo;

CREATE TABLE users (
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username varchar(255),
    password varchar(255),
    user_role varchar(1)
);

CREATE TABLE tbl_product (
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name varchar(255),
    description varchar(255),
    image varchar(255)
);
CREATE TABLE orders (
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    first_name varchar(255),
    last_name varchar(255),
    email varchar(255),
    phone varchar(255),
    address varchar(255),
    city varchar(255),
    place varchar(255),
    comment varchar(255)
);