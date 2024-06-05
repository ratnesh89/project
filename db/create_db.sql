CREATE DATABASE university_payments;

USE university_payments;

CREATE TABLE universities (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

CREATE TABLE courses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL
);

INSERT INTO universities (name) VALUES ('AA University'), ('BB University'), ('CC University');

INSERT INTO courses (name, price) VALUES 
('BBA', 6000), 
('LLB', 6000), 
('B.Com', 6000)
('AG', 6000), 
('BCA', 6000), 
('B.Tech', 6500), 
('Medical', 9000);
