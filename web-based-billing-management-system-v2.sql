-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2021 at 10:22 AM
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
-- Database: `web-based-billing-management-system-v2`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_accounts`
--

CREATE TABLE `tbl_accounts` (
  `user_id` int(20) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` longtext NOT NULL,
  `role` varchar(15) NOT NULL,
  `status` varchar(255) NOT NULL,
  `otp_code` varchar(100) NOT NULL,
  `otp_expiration` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_accounts`
--

INSERT INTO `tbl_accounts` (`user_id`, `fullname`, `email`, `password`, `role`, `status`, `otp_code`, `otp_expiration`) VALUES
(102101, 'Admin Admin', 'admin@gmail.com', '$2y$10$iFTw0PMTWaNBToeSR9dX2uP91Ww2fSyWSnBxcHUUwuOO0dERMLFyq', 'Admin', 'Active', '', ''),
(102102, 'Merry Anne Villamo', 'merryannevillano16@gmail.com', '$2y$10$Z/z3cblWrAdgXP.FVVApB.VhkM6Jbd.Pm8YG3DKUAsIhTn/qR6lTu', 'Registrar', 'Active', '', ''),
(102103, 'Justine Dave Delos Reyes', 'justine@gmail.com', '$2y$10$7Z4tGfYR1kYFegxEoUzWMeq6ZQPjnPsT6y0V6Dd0eViS2JJb6Awqa', 'Cashier', 'Active', '', ''),
(2018098123, 'Mylene Isla', 'mylene@gmail.com', '$2y$10$qu5XiLYkxjDaAhzVllaKseBAxBfwBTSBgONjWKctzAIoRO65kU3I6', 'Student', 'Active', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_accounts`
--
ALTER TABLE `tbl_accounts`
  ADD PRIMARY KEY (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
