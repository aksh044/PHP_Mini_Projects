-- Create database
CREATE DATABASE IF NOT EXISTS complaint_management;

-- Use the database
USE complaint_management;

-- Create table
CREATE TABLE IF NOT EXISTS complaints (
    id INT AUTO_INCREMENT PRIMARY KEY,
    complaint_text TEXT NOT NULL,
    status ENUM('Pending', 'Completed') DEFAULT 'Pending',
    date_created DATETIME DEFAULT CURRENT_TIMESTAMP
);
