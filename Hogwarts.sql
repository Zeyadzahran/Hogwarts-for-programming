CREATE TABLE Wand(
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    core VARCHAR(50) NOT NULL,
    wood VARCHAR(50) NOT NULL
);

CREATE TABLE House(
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    points INT
);

CREATE TABLE User(
    id INT PRIMARY KEY AUTO_INCREMENT, 
    name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    role VARCHAR(50) DEFAULT 'Student' CHECK (role IN('Admin','Student')),
    password VARCHAR(50) NOT NULL,
    wand_id INT NOT NULL,
    house_id INT,
    FOREIGN KEY (wand_id) REFERENCES wand(id),
    FOREIGN KEY (house_id) REFERENCES House(id)
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


INSERT INTO Wand (name,wood,core)
VALUES ("Elder Wand","Elder","Thestral Tail Hair");

SELECT * FROM WAND;

INSERT INTO User(name,email,role,password,wand_id)
VALUES ("Albus Dumbledore","Dumbledore@gmail.com","Admin","123456dd",1);

INSERT INTO House(name,points)
VALUES("Ravenclaw",0),
      ("Gryffindor",0),
      ("Hufflepuff",0),
      ("Slytherin",0);

INSERT INTO User(name,email,password,wand_id,house_id)
VALUES ("Tahany Emad","Tahany@gmail.com","123456tt",1,1),
       ("Shams Alalfy","Shams@gmail.com","123456ss",1,1),
       ("Zeyad Zahran","Zeyad@gmail.com","123456zz",1,2),
       ("Mohammed Abdallah","Mohammed@gmail.com","123456mm",1,3);

SELECT * FROM user;

SELECT * FROM HOUSE;

drop DATABASE hogwarts;

create DATABASE hogwarts;

use hogwarts;

DELETE FROM COURSE;
ALTER TABLE COURSE AUTO_INCREMENT = 1;

INSERT INTO Course (name, professor_id) VALUES
    ('Potions', 2),
    ('Defense Against the Dark Arts', 2),
    ('Transfiguration', 2),
    ('Herbology', 2);

INSERT INTO enrollment (student_id,course_id,degree) VALUES
    (3,1,0);
