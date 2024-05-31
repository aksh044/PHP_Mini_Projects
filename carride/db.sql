CREATE DATABASE car_ride_management;

USE car_ride_management;

CREATE TABLE IF NOT EXISTS rides (
    id INT AUTO_INCREMENT PRIMARY KEY,
    driver_id INT NOT NULL,
    car_details VARCHAR(100) NOT NULL,
    starting_point VARCHAR(100) NOT NULL,
    destination VARCHAR(100) NOT NULL,
    departure_time DATETIME NOT NULL,
    available_seats INT NOT NULL
);
