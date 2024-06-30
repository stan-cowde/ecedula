-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for useraccounts
CREATE DATABASE IF NOT EXISTS `useraccounts` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `useraccounts`;

-- Dumping structure for table useraccounts.address_details
CREATE TABLE IF NOT EXISTS `address_details` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `address` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `municipality` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `block_number` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `account_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table useraccounts.address_details: ~7 rows (approximately)
INSERT IGNORE INTO `address_details` (`id`, `user_id`, `address`, `nationality`, `municipality`, `barangay`, `block_number`, `street`) VALUES
	(1, 24, 'manchester', 'African', 'Pokemon', 'Kakaoh', '123', '123'),
	(2, 16, 'purok acacia', 'filipino', 'digos', 'tres de mayo', '2', 'kingdom hall'),
	(3, 17, 'sta maria ', 'filipino', 'davao ', 'sta mars', '231', 'kalsada street'),
	(4, 18, 'sta maria', 'sta maria', 'santa maria', 'bulacan', '213', 'kalsada'),
	(5, 21, 'roxas', 'filipino', 'sta maria', 'bulacan', '1', 'kalsada'),
	(6, 22, 'djahd', 'asd', 'dihos', 'dadads1', '1', '2'),
	(7, 2, 'TRES DE MAYO', 'FIL', 'DIGOS', 'TRESDEMAYO', '1', 'PRK ACACIA');

-- Dumping structure for table useraccounts.admins
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` enum('ADMIN','STAFF') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table useraccounts.admins: ~4 rows (approximately)
INSERT IGNORE INTO `admins` (`id`, `firstname`, `lastname`, `email`, `password`, `user_type`) VALUES
	(1, 'stan', 'tags', 'de@gmail', '$2y$10$0y4l5K/MjIJiNGgUPHSXOeucYN7n.5PKIy/nXgHRG3LE9A4yIFehe', 'ADMIN'),
	(2, 'stan', 'tags', 'stan@gmail.com', '$2y$10$.MnXUNyH5XpCH66aSGGk9e6JPMCmlQ8iPxJl187cfVfubNkB0d3.C', 'ADMIN'),
	(3, 'estanley', 'Tagalog', 'estanleyjt@gmail.com', '$2y$10$x5L2VcpCZOLS.A9Bv7Nt6ukVHjly5C2wW3HQkO7IKPEUzZzEn8J/W', 'STAFF'),
	(4, 'james', 'pakaw', 'dqdq@gmail.com', '$2y$10$6da8LIo7Hnsc9mPE/fnpP.pvr946KlFJcgp4dP.T74cqOW2r96wVG', NULL);

-- Dumping structure for table useraccounts.family_details
CREATE TABLE IF NOT EXISTS `family_details` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `mother_name` varchar(255) NOT NULL,
  `guardian_name` varchar(255) NOT NULL,
  `spouse_name` varchar(255) NOT NULL,
  `issued_date` date NOT NULL,
  `expiry_date` date NOT NULL,
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table useraccounts.family_details: ~0 rows (approximately)

-- Dumping structure for table useraccounts.identity_details
CREATE TABLE IF NOT EXISTS `identity_details` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `valid_id` varchar(255) NOT NULL,
  `id_number` int NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `place_of_birth` varchar(255) NOT NULL,
  `tin` int NOT NULL,
  `icr` int NOT NULL,
  `monthly_income` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table useraccounts.identity_details: ~0 rows (approximately)

-- Dumping structure for table useraccounts.personal_details
CREATE TABLE IF NOT EXISTS `personal_details` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `citizenship` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(255) NOT NULL,
  `weight` decimal(5,2) NOT NULL,
  `height` decimal(6,2) NOT NULL,
  `civil_status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table useraccounts.personal_details: ~8 rows (approximately)
INSERT IGNORE INTO `personal_details` (`id`, `user_id`, `first_name`, `last_name`, `middle_name`, `citizenship`, `date_of_birth`, `gender`, `weight`, `height`, `civil_status`) VALUES
	(1, 24, 'john', 'smith', 'Cadungog', 'American', '2024-03-14', 'male', 68.00, 5.00, 'single'),
	(2, 16, 'estanley', 'tagalog', 'lanticse', 'filipino', '2023-12-08', 'male', 54.00, 167.00, 'single'),
	(3, 17, 'Alex', 'Bontuyan', 'remolador', 'filipino', '2024-03-08', 'male', 54.00, 165.00, 'single'),
	(4, 18, 'alex', 'bontuyan', 'remolador', 'filipino', '2024-03-07', 'male', 54.00, 167.00, 'single'),
	(5, 21, 'peter', 'parker', 'spiderman', 'Filipino', '2024-03-14', 'male', 54.00, 167.00, 'single'),
	(6, 22, 'peter', 'parker', 'spiderman', 'filipino', '2024-03-08', 'male', 54.00, 167.00, 'single'),
	(7, 2, 'EASTAGB', 'TSAGAO', 'LANITCS', 'FILIPINO', '2024-04-03', 'male', 52.00, 52.00, 'SINGLE'),
	(8, 32, 'awdawd', 'awdawd', 'awdawdawd', 'awdawdawd', '2024-06-30', 'male', 140.00, 140.00, 'awdawdawd');

-- Dumping structure for table useraccounts.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` int DEFAULT NULL,
  `verified` int DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table useraccounts.users: ~8 rows (approximately)
INSERT IGNORE INTO `users` (`id`, `firstname`, `lastname`, `email`, `username`, `password`, `user_type`, `verified`) VALUES
	(6, 'Aldvin ', 'Alcasid', 'aldvin@umindanao.ph', 'aldvin1', '123123', 1, 1),
	(16, 'estan', 'tags', 'estan@gmail.com', 'estann', '$2y$10$HL7HxlHzFyKddAuy26qMveCdk61VoZwScs3CcmMzj5JwHk6iwUdjC', 1, 1),
	(18, 'alex', 'bontuyan', 'alex@gmail.com', 'alex', '$2y$10$0CsJeNNJHV5cuiaZKJWkHeIV5kinaNz1qvbpf2RaozqM4yV4.3htq', 1, 1),
	(22, 'peter', 'parker', 'peter@gmail.com', 'peter', '$2y$10$sgIszblA0NsPsbEMxmBEpe2xfuz7.MeQLwr1o3iR8HIJzhm4sRpLe', 1, 1),
	(24, 'stan', 'tags', 'tan@email', 'tantan', '$2y$10$mkcxWCK/C/nRSPejn4NbIeMCBJ5LHvBUpeK/F3.ZN4tixUQiDnSBu', 1, 0),
	(25, 'james', 'pakaw', 'dquashed@gmail.com', 'demoadmin', '$2y$10$J6qlWo/XqVUf0y.2jF11EOlYtJlEdsAdSkvA91tzkboTW9KAJsKqm', 1, 1),
	(31, 'Leo', 'Walker', 'your.email+fakedata69985@gmail.com', 'Helmer_Kris', '$2y$10$4D8RPR612WDv7ZEsVuQX1OJOV7OryEKRrVDj1J4E.gxCgDieVLKE2', 1, 1),
	(32, 'joanna', 'olarte', 'joannaolarte@gmail.com', 'awdsa23', '$2y$10$vJXHNvr.uLKeCo4c9eQXcu18rAxkc80y3munFi.cbFMS42mZx4eD6', NULL, 1);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
