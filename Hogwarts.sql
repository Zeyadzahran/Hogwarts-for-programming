CREATE DATABASE Hogwarts;

USE Hogwarts;

drop DATABASE Hogwarts;

CREATE TABLE Wand (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50),
    core VARCHAR(50),
    wood VARCHAR(50)
);

CREATE TABLE House (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    points INT
);

CREATE TABLE User (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(50),
    role VARCHAR(50) DEFAULT 'Student' CHECK (role IN ('Admin', 'Student')),
    password VARCHAR(55),
    house_id INT,
    wand_id INT,
    FOREIGN KEY (wand_id) REFERENCES wand (id),
    FOREIGN KEY (house_id) REFERENCES House (id)
);

CREATE TABLE Course (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50),
    professor_id INT,
    FOREIGN KEY (professor_id) REFERENCES User (id)
);

CREATE TABLE Enrollment (
    id INT PRIMARY KEY AUTO_INCREMENT,
    student_id INT,
    course_id INT,
    degree INT,
    FOREIGN KEY (student_id) REFERENCES User (id),
    FOREIGN KEY (course_id) REFERENCES Course (id)
);

CREATE TABLE Quiz (
    id INT PRIMARY KEY AUTO_INCREMENT,
    course_id INT,
    points INT,
    FOREIGN KEY (course_id) REFERENCES Course (id)
);

CREATE TABLE Item (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50),
    description VARCHAR(255),
    stock INT NOT NULL Check (stock > 0)
);

CREATE TABLE OwnedItems (
    student_id INT,
    item_id INT,
    purchase_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (student_id) REFERENCES User (id),
    FOREIGN KEY (item_id) REFERENCES Item (id)
);