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
('sowadrahman', 'kikhobor'),
('admin', 'admin');

CREATE TABLE `volunteers` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `firstName` VARCHAR(255) NOT NULL,
    `lastName` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `contact` VARCHAR(255),
    `username` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `address` TEXT,
    `location` VARCHAR(255),
    `gender` ENUM('male', 'female', 'other') NOT NULL,
    `bloodGroup` VARCHAR(255),
    `DOB` DATE,
    `skills` TEXT
);

INSERT INTO `volunteers` (`firstName`, `lastName`, `email`, `contact`, `address`, `location`, `gender`, `bloodGroup`, `DOB`, `skills`, `username`, `password`) VALUES
('John', 'Doe', 'john@example.com', '1234567890', '123 Main St', 'Cityville', 'male', 'O+', '1990-01-01', 'First Aid, Fire Safety', 'john_doe', '1234'),
('Jane', 'Doe', 'jane@example.com', '9876543210', '456 Oak St', 'Townsville', 'female', 'A-', '1992-03-15', 'CPR, Disaster Management', 'volunteer', '1234');

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

CREATE TABLE `task_event` (
    `task_id` INT AUTO_INCREMENT PRIMARY KEY,
    `event_id` INT,
    `task_description` TEXT,
    `name` VARCHAR(255),
    FOREIGN KEY (`event_id`) REFERENCES `event`(`event_id`)
);

INSERT INTO `task_event` (`event_id`, `task_description`, `name`) VALUES
(1, 'Prepare event materials', 'Task 1'),
(2, 'Set up event venue', 'Task 2'),
(2, 'Coordinate volunteers', 'Task 3'),
(3, 'Finalize event logistics', 'Task 4');

CREATE TABLE `resource` (
    `resource_id` INT AUTO_INCREMENT PRIMARY KEY,
    `task_id` INT,
    `name` VARCHAR(255) NOT NULL,
    `description` TEXT,
    FOREIGN KEY (`task_id`) REFERENCES `task_event`(`task_id`)
);

INSERT INTO `resource` (`task_id`, `name`, `description`) VALUES
(1, 'Task 1', 'Fire extinguisher for emergencies'),
(1, 'Task 1', 'Water hose for firefighting'),
(1, 'Task 1', 'Fire blanket for safety'),
(1, 'Task 1', 'First aid kit for medical emergencies'),
(2, 'Task 2', 'Rescue Equipment for evacuations'),
(2, 'Task 2', 'Flashlights for visibility'),
(2, 'Task 2', 'Communication Devices for coordination');
-- Add more resources and tasks as needed

-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2020 at 10:22 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `image_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `image_url`) VALUES
(8, 'IMG-5f8954bd209a92.78214246.jpg'),
(9, 'IMG-5f8954caa02539.76436861.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

COMMIT;
