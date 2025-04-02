-- Active: 1739625100301@@127.0.0.1@3306@hogwarts
DROP DATABASE hogwarts;

CREATE DATABASE hogwarts;

use hogwarts;

CREATE TABLE Wand (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    core VARCHAR(50) NOT NULL,
    wood VARCHAR(50) NOT NULL
);

CREATE TABLE House (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    points INT
);

CREATE TABLE User (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    role VARCHAR(50) DEFAULT 'Student' CHECK (role IN ('Admin', 'Student')),
    password VARCHAR(50) NOT NULL,
    wand_id INT NOT NULL,
    house_id INT,
    FOREIGN KEY (wand_id) REFERENCES wand (id),
    FOREIGN KEY (house_id) REFERENCES House (id)
);

CREATE TABLE Course (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    professor_id INT,
    havequiz BOOLEAN DEFAULT FALSE,
    FOREIGN KEY (professor_id) REFERENCES User (id) ON DELETE SET NULL
);

CREATE TABLE Enrollment (
    id INT PRIMARY KEY AUTO_INCREMENT,
    student_id INT NOT NULL,
    course_id INT NOT NULL,
    Quizdone BOOLEAN DEFAULT False,
    Marks INT,
    FOREIGN KEY (student_id) REFERENCES User (id),
    FOREIGN KEY (course_id) REFERENCES Course (id)
);

CREATE TABLE Quiz (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50),
    course_id INT NOT NULL,
    points INT,
    FOREIGN KEY (course_id) REFERENCES Course (id)
);

CREATE TABLE Item (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    description TEXT,
    path VARCHAR(255)
);

CREATE TABLE OwnedItems (
    student_id INT NOT NULL,
    item_id INT NOT NULL,
    item_count INT,
    FOREIGN KEY (student_id) REFERENCES User (id),
    FOREIGN KEY (item_id) REFERENCES Item (id)
);