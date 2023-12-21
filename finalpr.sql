-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2023 at 10:55 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finalpr`
--
CREATE DATABASE IF NOT EXISTS `finalpr` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `finalpr`;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `address` varchar(200) NOT NULL,
  `postal_code` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `salary` int(11) NOT NULL,
  `Starting_Date` date NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `fname`, `lname`, `email`, `phone_number`, `address`, `postal_code`, `position`, `salary`, `Starting_Date`, `password`) VALUES
(1, 'Jeferson', 'Grimaldo', 'jefgrim@gmail.com', 12345679, '1907 granville, vancouver', 'v5c 4f3', 'backend developer', 5000, '2023-12-04', 'hola'),
(2, 'test', 'test', 'test@mail.com', 987654321, 'test', 'test', 'tester', 1000, '2023-12-03', 'test');

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `rid` int(11) NOT NULL,
  `room_type` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `details` varchar(200),
  PRIMARY KEY (rid)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`rid`, `room_type`, `status`) VALUES
 (1001, 'double', 'dirty'), (1002, 'Twin', 'dirty');

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rooms`
--


CREATE TABLE `dates` (
  `did` date NOT NULL,
  PRIMARY KEY (did)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `availability` (
  `aid` int(11) NOT NULL,
  `occupied` TINYINT(1) DEFAULT 1,
  `did` date NOT NULL,
  `rid` int(11) NOT NULL,
  PRIMARY KEY (aid)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `availability` CHANGE `aid` `aid` INT(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `availability` ADD FOREIGN KEY (`did`) REFERENCES `dates`(`did`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `availability` ADD FOREIGN KEY (`rid`) REFERENCES `rooms`(`rid`) ON DELETE RESTRICT ON UPDATE RESTRICT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
