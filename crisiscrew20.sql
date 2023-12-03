












-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2023 at 06:39 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin_panel`
--


CREATE TABLE `users` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`) VALUES
('sowadrahman', 'kikhobor');
INSERT INTO `users` (`username`, `password`) VALUES
('admin', 'admin');



CREATE TABLE volunteers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstName VARCHAR(255) NOT NULL,
    lastName VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    contact VARCHAR(255),
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    address TEXT,
    location VARCHAR(255),
    gender ENUM('male', 'female', 'other') NOT NULL,
    bloodGroup VARCHAR(255),
    DOB DATE,
    skills TEXT
);






INSERT INTO volunteers (firstName, lastName, email, contact, address, location, gender, bloodGroup, DOB, skills, username, password)
VALUES
('John', 'Doe', 'john@example.com', '1234567890', '123 Main St', 'Cityville', 'male', 'O+', '1990-01-01', 'First Aid, Fire Safety', 'john_doe', '1234'),
('Jane', 'Doe', 'jane@example.com', '9876543210', '456 Oak St', 'Townsville', 'female', 'A-', '1992-03-15', 'CPR, Disaster Management', 'jane_doe', '1234');


COMMIT;

-- Table structure for table `event`
CREATE TABLE `event` (
  `event_id` INT AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(255) NOT NULL,
  `description` TEXT,
  `location` VARCHAR(255),
  `date` DATE,
  `address` TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `event` (`name`, `description`, `location`, `date`, `address`) VALUES
('Annual Charity Gala', 'Fundraising event for local charities', 'City Convention Center', '2023-05-20', '123 Main Street, Cityville'),
('Tech Conference 2023', 'Conference on the latest technology trends', 'Tech Park Auditorium', '2023-06-15', '456 Tech Avenue, Techtown'),
('Community Cleanup Day', 'Volunteer event to clean up the neighborhood', 'City Park', '2023-07-10', '789 Green Lane, Greenvale'),
('Art Exhibition Opening', 'Opening of a new art exhibition', 'Art Gallery Center', '2023-08-05', '101 Art Street, Artville');



COMMIT;