
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


-- Table structure for table `volunteers`
CREATE TABLE `volunteers` (
  `id` int(11) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `location` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `bloodGroup` varchar(10) NOT NULL,
  `achievements` date NOT NULL,
  `skills` varchar(255) DEFAULT NULL,
  `pic` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table `volunteers`
INSERT INTO `volunteers` (`id`, `firstName`, `lastName`, `email`, `contact`, `address`, `location`, `gender`, `bloodGroup`, `achievements`, `skills`, `pic`) VALUES
(1, 'John', 'Doe', 'john@example.com', '1234567890', '123 Main St', 'Cityville', 'Male', 'O+', '1990-01-01', 'First Aid, Fire Safety', 'images/johndoe.jpg'),
(2, 'Jane', 'Doe', 'jane@example.com', '9876543210', '456 Oak St', 'Townsville', 'Female', 'A-', '1992-03-15', 'CPR, Disaster Management', 'images/janedoe.jpg');

-- Add more records as needed
