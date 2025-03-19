CREATE DATABASE Hogwarts;
USE Hogwarts;

CREATE TABLE Wand(
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    core VARCHAR(50) NOT NULL,
    wood VARCHAR(50) NOT NULL
);
CREATE TABLE User(
    id INT PRIMARY KEY AUTO_INCREMENT, 
    name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    role VARCHAR(50) DEFAULT'Student' CHECK (role IN('Admin','Student')),
     passward VARCHAR(55) NOT NULL, 
    -- // ya wag3 el passwaaaaaaaard 
    -- && it must be VARCHAR not int so we can hash it
    -- better her to add house_id and refare it to house
    -- house_id REFERENCES House(id), 
    wand_id INT NOT NULL,
    FOREIGN KEY (wand_id) REFERENCES wand(id) 
);
CREATE TABLE House(
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    points INT,
    -- user_id INT,house  will have many of student 
    -- 
    FOREIGN KEY (user_id) REFERENCES User(id)
);

CREATE TABLE Course(
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    professor_id INT NOT NULL,
    FOREIGN KEY (professor_id) REFERENCES User(id)  
);

CREATE TABLE Enrollment(
    id INT PRIMARY KEY AUTO_INCREMENT,
    student_id INT NOT NULL,
    course_id  INT NOT NULL,
    degree INT,
    FOREIGN KEY (student_id) REFERENCES User(id),
    FOREIGN KEY (course_id) REFERENCES Course(id)
);

CREATE TABLE Quiz(
    id INT PRIMARY KEY AUTO_INCREMENT,
    course_id INT NOT NULL,
    points INT,
    FOREIGN KEY (course_id) REFERENCES Course(id) 
);

CREATE TABLE Item(
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    description VARCHAR(255),
    stock INT NOT NULL Check(stock>0)
);

CREATE TABLE OwnedItems(
    student_id INT NOT NULL,
    item_id INT NOT NULL,
    purchase_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (student_id) REFERENCES User(id),
    FOREIGN KEY (item_id) REFERENCES Item(id)
);
