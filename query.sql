CREATE DATABASE demo;
-- angampor_kolakenda test

CREATE TABLE users (
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username varchar(255),
    email varchar(255),
    password varchar(255),
    user_role varchar(255),
    city varchar(255)
);

CREATE TABLE tbl_product (
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name varchar(255),
    description varchar(255),
    image varchar(255),
    type varchar(255),
    city varchar(255)
);

CREATE TABLE tbl_product2 (
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name varchar(255),
    description varchar(255),
    image varchar(255),
    type varchar(255)
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

CREATE TABLE tbl_city (
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    city_name varchar(255),
    agent varchar(255),
    phone varchar(255)
);

CREATE TABLE tbl_area (
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    area_name varchar(255),
    city_id int,
    FOREIGN KEY (city_id) REFERENCES tbl_city(id)
);