CREATE DATABASE college_admission;

USE college_admission;

CREATE TABLE applications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_name VARCHAR(50),
    age INT,
    course VARCHAR(50),
    application_date DATE,
    status ENUM('Pending', 'Accepted', 'Rejected')
);
