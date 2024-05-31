CREATE DATABASE pharmacy_management;

USE pharmacy_management;

CREATE TABLE medicines (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    category VARCHAR(30),
    quantity INT,
    price DECIMAL(10, 2)
);
