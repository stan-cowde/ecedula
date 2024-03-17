-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 17, 2024 at 04:49 PM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `useraccounts`
--

-- --------------------------------------------------------

--
-- Table structure for table `address_details`
--

DROP TABLE IF EXISTS `address_details`;
CREATE TABLE IF NOT EXISTS `address_details` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nationality` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `municipality` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `barangay` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `block_number` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `street` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `account_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `address_details`
--

INSERT INTO `address_details` (`id`, `user_id`, `address`, `nationality`, `municipality`, `barangay`, `block_number`, `street`) VALUES
(1, 24, 'manchester', 'African', 'Pokemon', 'Kakaoh', '123', '123');

-- --------------------------------------------------------

--
-- Table structure for table `family_details`
--

DROP TABLE IF EXISTS `family_details`;
CREATE TABLE IF NOT EXISTS `family_details` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `father_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `mother_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `guardian_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `spouse_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `issued_date` date NOT NULL,
  `expiry_date` date NOT NULL,
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `family_details`
--

INSERT INTO `family_details` (`id`, `user_id`, `father_name`, `mother_name`, `guardian_name`, `spouse_name`, `issued_date`, `expiry_date`) VALUES
(0, 24, 'Arba', 'Kadabra', 'alakazam', 'Pokemon', '2024-03-01', '2024-03-02');

-- --------------------------------------------------------

--
-- Table structure for table `identity_details`
--

DROP TABLE IF EXISTS `identity_details`;
CREATE TABLE IF NOT EXISTS `identity_details` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `valid_id` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `id_number` int NOT NULL,
  `occupation` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `place_of_birth` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `tin` int NOT NULL,
  `icr` int NOT NULL,
  `monthly_income` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `identity_details`
--

INSERT INTO `identity_details` (`id`, `user_id`, `valid_id`, `id_number`, `occupation`, `place_of_birth`, `tin`, `icr`, `monthly_income`) VALUES
(1, 24, './image/20608906-original.jpeg', 123, 'american', 'Digos City', 123, 123, 'low');

-- --------------------------------------------------------

--
-- Table structure for table `personal_details`
--

DROP TABLE IF EXISTS `personal_details`;
CREATE TABLE IF NOT EXISTS `personal_details` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `citizenship` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `weight` decimal(5,2) NOT NULL,
  `height` decimal(6,2) NOT NULL,
  `civil_status` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `personal_details`
--

INSERT INTO `personal_details` (`id`, `user_id`, `surname`, `first_name`, `last_name`, `middle_name`, `citizenship`, `date_of_birth`, `gender`, `weight`, `height`, `civil_status`) VALUES
(1, 24, '', 'Roger', 'Pantil', 'Cadungog', 'American', '2024-03-14', 'male', 68.00, 5.00, 'single');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `username`, `password`) VALUES
(1, 'estanley', 'Tagalog', 'estanleyjt@gmail.com', 'tantan', '12345'),
(3, 'Estanley', 'Tagalog', 'estanleyjt@gmail.com', 'tantan', '12345'),
(5, 'Alex', 'Bontuyan', 'alex@gmail.com', 'alxe', '12341234'),
(6, 'Aldvin ', 'Alcasid', 'aldvin@umindanao.ph', 'aldvin1', '123123'),
(7, 'Admin', 'Admin', 'admin@gmail.com', 'admin', 'admin123'),
(8, 'admin', 'adminni', 'admin@yahoo.com', 'Admin', 'admin098'),
(9, 'admin', 'adminni', 'admin@yahoo.com', 'Admin', 'admin098'),
(24, 'Roger', 'Pantil', 'rogerpantilyowger@gmail.com', 'Yowger', '$2y$10$67adFVVzKprkQ4ZHojei6ul9L9lPx4PzzWM/9ja6HRH1tFt2BwJou');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
