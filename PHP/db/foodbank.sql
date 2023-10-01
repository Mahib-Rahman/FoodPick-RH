-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2023 at 06:49 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodbank`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment_form`
--

CREATE TABLE `appointment_form` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `zone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment_form`
--

INSERT INTO `appointment_form` (`id`, `name`, `date`, `time`, `email`, `phone`, `zone`) VALUES
(1, 'Peter', '2023-10-03', '08:00:00', 'test@test.com', '1234567890', 3);

-- --------------------------------------------------------

--
-- Table structure for table `dispatch_central`
--

CREATE TABLE `dispatch_central` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `size` text NOT NULL,
  `best_before_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dispatch_central`
--

INSERT INTO `dispatch_central` (`id`, `name`, `size`, `best_before_date`) VALUES
(1, 'compliment noodles', '55g', '2023-10-04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment_form`
--
ALTER TABLE `appointment_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dispatch_central`
--
ALTER TABLE `dispatch_central`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment_form`
--
ALTER TABLE `appointment_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dispatch_central`
--
ALTER TABLE `dispatch_central`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
