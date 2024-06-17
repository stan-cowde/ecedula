-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 17, 2024 at 04:53 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.29

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

CREATE TABLE `address_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `municipality` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `block_number` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `address_details`
--

INSERT INTO `address_details` (`id`, `user_id`, `address`, `nationality`, `municipality`, `barangay`, `block_number`, `street`) VALUES
(1, 24, 'manchester', 'African', 'Pokemon', 'Kakaoh', '123', '123'),
(2, 16, 'purok acacia', 'filipino', 'digos', 'tres de mayo', '2', 'kingdom hall'),
(3, 17, 'sta maria ', 'filipino', 'davao ', 'sta mars', '231', 'kalsada street'),
(4, 18, 'sta maria', 'sta maria', 'santa maria', 'bulacan', '213', 'kalsada'),
(5, 21, 'roxas', 'filipino', 'sta maria', 'bulacan', '1', 'kalsada'),
(6, 22, 'djahd', 'asd', 'dihos', 'dadads1', '1', '2'),
(7, 2, 'TRES DE MAYO', 'FIL', 'DIGOS', 'TRESDEMAYO', '1', 'PRK ACACIA');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `firstname`, `lastname`, `email`, `password`) VALUES
(1, 'stan', 'tags', 'de@gmail', '$2y$10$0y4l5K/MjIJiNGgUPHSXOeucYN7n.5PKIy/nXgHRG3LE9A4yIFehe'),
(2, 'stan', 'tags', 'stan@gmail.com', '$2y$10$.MnXUNyH5XpCH66aSGGk9e6JPMCmlQ8iPxJl187cfVfubNkB0d3.C'),
(3, 'estanley', 'Tagalog', 'estanleyjt@gmail.com', '$2y$10$x5L2VcpCZOLS.A9Bv7Nt6ukVHjly5C2wW3HQkO7IKPEUzZzEn8J/W');

-- --------------------------------------------------------

--
-- Table structure for table `family_details`
--

CREATE TABLE `family_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `mother_name` varchar(255) NOT NULL,
  `guardian_name` varchar(255) NOT NULL,
  `spouse_name` varchar(255) NOT NULL,
  `issued_date` date NOT NULL,
  `expiry_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `family_details`
--

INSERT INTO `family_details` (`id`, `user_id`, `father_name`, `mother_name`, `guardian_name`, `spouse_name`, `issued_date`, `expiry_date`) VALUES
(0, 24, 'Arba', 'Kadabra', 'alakazam', 'Pokemon', '2024-03-01', '2024-03-02');

-- --------------------------------------------------------

--
-- Table structure for table `identity_details`
--

CREATE TABLE `identity_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `valid_id` varchar(255) NOT NULL,
  `id_number` int(11) NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `place_of_birth` varchar(255) NOT NULL,
  `tin` int(11) NOT NULL,
  `icr` int(11) NOT NULL,
  `monthly_income` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `identity_details`
--

INSERT INTO `identity_details` (`id`, `user_id`, `valid_id`, `id_number`, `occupation`, `place_of_birth`, `tin`, `icr`, `monthly_income`) VALUES
(1, 24, './image/20608906-original.jpeg', 123, 'american', 'Digos City', 123, 123, 'low');

-- --------------------------------------------------------

--
-- Table structure for table `personal_details`
--

CREATE TABLE `personal_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `citizenship` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(255) NOT NULL,
  `weight` decimal(5,2) NOT NULL,
  `height` decimal(6,2) NOT NULL,
  `civil_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `personal_details`
--

INSERT INTO `personal_details` (`id`, `user_id`, `first_name`, `last_name`, `middle_name`, `citizenship`, `date_of_birth`, `gender`, `weight`, `height`, `civil_status`) VALUES
(1, 24, 'john', 'smith', 'Cadungog', 'American', '2024-03-14', 'male', '68.00', '5.00', 'single'),
(2, 16, 'estanley', 'tagalog', 'lanticse', 'filipino', '2023-12-08', 'male', '54.00', '167.00', 'single'),
(3, 17, 'Alex', 'Bontuyan', 'remolador', 'filipino', '2024-03-08', 'male', '54.00', '165.00', 'single'),
(4, 18, 'alex', 'bontuyan', 'remolador', 'filipino', '2024-03-07', 'male', '54.00', '167.00', 'single'),
(5, 21, 'peter', 'parker', 'spiderman', 'Filipino', '2024-03-14', 'male', '54.00', '167.00', 'single'),
(6, 22, 'peter', 'parker', 'spiderman', 'filipino', '2024-03-08', 'male', '54.00', '167.00', 'single'),
(7, 2, 'EASTAGB', 'TSAGAO', 'LANITCS', 'FILIPINO', '2024-04-03', 'male', '52.00', '52.00', 'SINGLE');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` int(11) DEFAULT NULL,
  `verified` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `username`, `password`, `user_type`, `verified`) VALUES
(6, 'Aldvin ', 'Alcasid', 'aldvin@umindanao.ph', 'aldvin1', '123123', 1, 1),
(16, 'estan', 'tags', 'estan@gmail.com', 'estann', '$2y$10$HL7HxlHzFyKddAuy26qMveCdk61VoZwScs3CcmMzj5JwHk6iwUdjC', 1, 1),
(18, 'alex', 'bontuyan', 'alex@gmail.com', 'alex', '$2y$10$0CsJeNNJHV5cuiaZKJWkHeIV5kinaNz1qvbpf2RaozqM4yV4.3htq', 1, 1),
(22, 'peter', 'parker', 'peter@gmail.com', 'peter', '$2y$10$sgIszblA0NsPsbEMxmBEpe2xfuz7.MeQLwr1o3iR8HIJzhm4sRpLe', NULL, 1),
(24, 'stan', 'tags', 'tan@email', 'tantan', '$2y$10$mkcxWCK/C/nRSPejn4NbIeMCBJ5LHvBUpeK/F3.ZN4tixUQiDnSBu', NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address_details`
--
ALTER TABLE `address_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `account_id` (`user_id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `family_details`
--
ALTER TABLE `family_details`
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `identity_details`
--
ALTER TABLE `identity_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `personal_details`
--
ALTER TABLE `personal_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address_details`
--
ALTER TABLE `address_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `identity_details`
--
ALTER TABLE `identity_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_details`
--
ALTER TABLE `personal_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
