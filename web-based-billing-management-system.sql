-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2021 at 05:45 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web-based-billing-management-system`
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
  `otp_code` varchar(100) NOT NULL,
  `otp_expiration` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee_info`
--

CREATE TABLE `tbl_employee_info` (
  `reg_no` varchar(255) NOT NULL,
  `employee_id` int(20) NOT NULL,
  `role` varchar(20) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `citizenship` varchar(100) NOT NULL,
  `civil_status` varchar(100) NOT NULL,
  `sex` varchar(20) NOT NULL,
  `birthdate` varchar(100) NOT NULL,
  `age` int(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_number` varchar(15) NOT NULL,
  `reg_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student_fee`
--

CREATE TABLE `tbl_student_fee` (
  `stud_id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `stud_program&major` varchar(100) NOT NULL,
  `csi_year` varchar(100) NOT NULL,
  `tuition_fee` int(11) NOT NULL,
  `total_amount_paid` int(11) NOT NULL,
  `balace` int(11) NOT NULL,
  `payment_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student_info`
--

CREATE TABLE `tbl_student_info` (
  `reg_no` varchar(50) NOT NULL,
  `stud_id` int(15) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `sex` varchar(50) NOT NULL,
  `birthdate` varchar(100) NOT NULL,
  `age` int(100) NOT NULL,
  `address` longtext NOT NULL,
  `citizenship` varchar(100) NOT NULL,
  `civil_status` varchar(100) NOT NULL,
  `college` longtext NOT NULL,
  `major` longtext NOT NULL,
  `year_section` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_number` varchar(12) NOT NULL,
  `reg_date` varchar(100) NOT NULL DEFAULT 'N/A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student_requirements`
--

CREATE TABLE `tbl_student_requirements` (
  `stud_id` int(20) NOT NULL,
  `form_137` varchar(100) NOT NULL,
  `form_138` varchar(100) NOT NULL,
  `psa_birth_cert` varchar(100) NOT NULL,
  `good_moral` varchar(100) NOT NULL,
  `date_pass` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student_school_details`
--

CREATE TABLE `tbl_student_school_details` (
  `stud_id` int(20) NOT NULL,
  `LRN` varchar(100) NOT NULL,
  `stud_status` varchar(100) NOT NULL,
  `csi_school_year` varchar(100) NOT NULL,
  `csi_semester` varchar(100) NOT NULL,
  `csi_scholarship` varchar(100) NOT NULL,
  `csi_course` varchar(255) NOT NULL,
  `csi_major` longtext NOT NULL,
  `csi_year` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaction`
--

CREATE TABLE `tbl_transaction` (
  `transaction_no.` int(11) NOT NULL,
  `stud_id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `tuition_fee` int(11) NOT NULL,
  `payment_method` varchar(100) NOT NULL,
  `total_amount_paid` int(11) NOT NULL,
  `balance` int(11) NOT NULL,
  `transaction_date` date NOT NULL,
  `payment_status` varchar(100) NOT NULL,
  `cashier_id` int(11) NOT NULL,
  `cashier_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_accounts`
--
ALTER TABLE `tbl_accounts`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_employee_info`
--
ALTER TABLE `tbl_employee_info`
  ADD PRIMARY KEY (`reg_no`);

--
-- Indexes for table `tbl_student_info`
--
ALTER TABLE `tbl_student_info`
  ADD PRIMARY KEY (`stud_id`);

--
-- Indexes for table `tbl_student_requirements`
--
ALTER TABLE `tbl_student_requirements`
  ADD PRIMARY KEY (`stud_id`);

--
-- Indexes for table `tbl_student_school_details`
--
ALTER TABLE `tbl_student_school_details`
  ADD PRIMARY KEY (`stud_id`);

--
-- Indexes for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  ADD PRIMARY KEY (`transaction_no.`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  MODIFY `transaction_no.` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
