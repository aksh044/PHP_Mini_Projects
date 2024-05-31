CREATE DATABASE toll_management;

USE toll_management;

CREATE TABLE transactions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    vehicle_number VARCHAR(20),
    toll_amount DECIMAL(10, 2),
    transaction_date DATE,
    transaction_time TIME
);
