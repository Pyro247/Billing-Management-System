-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2021 at 07:22 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

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

--
-- Dumping data for table `tbl_accounts`
--

INSERT INTO `tbl_accounts` (`user_id`, `fullname`, `email`, `password`, `role`, `otp_code`, `otp_expiration`) VALUES
(2018301301, 'Michael Isla', 'islala.michael.estrecho@gmail.com', 'Mike', 'Cashier', '', ''),
(2018301302, 'Denver Pulido', 'pulido@gmail.com', 'pulido', ' Student', '', '');

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

--
-- Dumping data for table `tbl_employee_info`
--

INSERT INTO `tbl_employee_info` (`reg_no`, `employee_id`, `role`, `firstname`, `lastname`, `middlename`, `citizenship`, `civil_status`, `sex`, `birthdate`, `age`, `email`, `contact_number`, `reg_date`) VALUES
('20211', 2018301301, 'Cashier', 'Michael', 'Isla', 'Estrecho', 'Filipino', 'Single', 'male', '2021-09-15', 22, 'islala.michael.estrecho@gmail.com', '09307078204', 'September 25, 2021, 9:09 am');

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
  `religion` varchar(100) NOT NULL,
  `citizenship` varchar(100) NOT NULL,
  `civil_status` varchar(100) NOT NULL,
  `college` longtext NOT NULL,
  `major` longtext NOT NULL,
  `year_section` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_number` varchar(12) NOT NULL,
  `reg_date` varchar(100) NOT NULL DEFAULT 'N/A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_student_info`
--

INSERT INTO `tbl_student_info` (`reg_no`, `stud_id`, `firstname`, `lastname`, `middlename`, `sex`, `birthdate`, `age`, `address`, `religion`, `citizenship`, `civil_status`, `college`, `major`, `year_section`, `email`, `contact_number`, `reg_date`) VALUES
('20211', 2018301302, 'Denver', 'Pulido', 'G', 'male', '2021-09-01', 21, 'Pangasinan', 'Catholic', 'Filipino', 'Single', 'DUMMSU', 'SCIENCE', 'WOW1', 'pulido@gmail.com', '09307078205', 'September 25, 2021, 1:18 pm');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student_requirements`
--

CREATE TABLE `tbl_student_requirements` (
  `stud_id` int(20) NOT NULL,
  `form_137` varchar(100) NOT NULL,
  `form_138` varchar(100) NOT NULL,
  `psa_birth_cert` varchar(100) NOT NULL,
  `good_moral` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student_school_details`
--

CREATE TABLE `tbl_student_school_details` (
  `stud_id` int(20) NOT NULL,
  `stud_status` varchar(100) NOT NULL,
  `csi_school_year` varchar(100) NOT NULL,
  `csi_semester` varchar(100) NOT NULL,
  `csi_scholarship` varchar(100) NOT NULL,
  `csi_course` varchar(255) NOT NULL,
  `csi_major` longtext NOT NULL,
  `csi_year` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_student_school_details`
--

INSERT INTO `tbl_student_school_details` (`stud_id`, `stud_status`, `csi_school_year`, `csi_semester`, `csi_scholarship`, `csi_course`, `csi_major`, `csi_year`) VALUES
(2018301302, 'transferee', '2020-2021', 'Midterm', 'Full', 'BSIT', 'Web and Mobile Application', '4th Year');

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
