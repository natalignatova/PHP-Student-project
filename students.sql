CREATE DATABASE IF NOT EXISTS students_db;

USE students_db;

CREATE TABLE IF NOT EXISTS students(
  isikukood VARCHAR(11) UNIQUE NOT NULL,
  lastname VARCHAR(20) NOT NULL,
  firstname VARCHAR(20) NOT NULL,
  grade INT(1) NOT NULL CHECK (grade < 4),
  email VARCHAR(30) NOT NULL,
  message VARCHAR(250)
);

INSERT INTO students (isikukood, lastname,firstname,grade, email, message) 
VALUES ('48711290006', 'Li', 'Liz',1,'lizli@gmail.com','1!'),
('48712090007', 'Ho', 'Jenn',2,'forget-me-not-hohoho@gmail.com','2!'),
('58301240008', 'Koll', 'Arthur',3,'arthur_koll@eek.ee','3!'),
('49204190009', 'Kram', 'Vicky',2,'coolv@gmail.com','4!'),
('57709210010', 'Lock', 'Derek',1,'derek123@coin.org','5!');