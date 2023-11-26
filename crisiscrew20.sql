












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

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `skills` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `skills`) VALUES
(1, 'John Doe', 'PHP, MySQL, JavaScript'),
(2, 'Jane Smith', 'HTML, CSS, Python'),
(3, 'Bob Johnson', 'Java, SQL, C#');

-- --------------------------------------------------------

--
-- Table structure for table `users`
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
















CREATE TABLE `volunteers` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `firstName` VARCHAR(100) NOT NULL,
  `lastName` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `contact` VARCHAR(20) NOT NULL,
  `address` VARCHAR(100) DEFAULT NULL,
  `location` VARCHAR(100) NOT NULL,
  `gender` VARCHAR(10) NOT NULL,
  `bloodGroup` VARCHAR(10) NOT NULL,
  `achievements` DATE NOT NULL,
  `skills` VARCHAR(255) DEFAULT NULL,
  `pic` TEXT NOT NULL,
  `username` VARCHAR(50) NOT NULL UNIQUE,
  `password` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Inserting data for table `volunteers`
--

INSERT INTO `volunteers` (`firstName`, `lastName`, `email`, `contact`, `address`, `location`, `gender`, `bloodGroup`, `achievements`, `skills`, `pic`, `username`, `password`)
VALUES
('John', 'Doe', 'john@example.com', '1234567890', '123 Main St', 'Cityville', 'Male', 'O+', '1990-01-01', 'First Aid, Fire Safety', 'images/johndoe.jpg', 'john_doe', '1234'),
('Jane', 'Doe', 'jane@example.com', '9876543210', '456 Oak St', 'Townsville', 'Female', 'A-', '1992-03-15', 'CPR, Disaster Management', 'images/janedoe.jpg', 'jane_doe', '1234');

COMMIT;

