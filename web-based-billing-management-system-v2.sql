-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2021 at 09:50 PM
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
-- Database: `web-based-billing-management-system-v2`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_academic_year`
--

CREATE TABLE `tbl_academic_year` (
  `academic_year` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_academic_year`
--

INSERT INTO `tbl_academic_year` (`academic_year`) VALUES
('2021-2022'),
('2022-2023'),
('2022-2023');

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
(2018301301, 'Michael Isla', 'isla.michael.estrecho@gmail.com', '$2y$10$JwdbqfJtzxvAx8ARPIhTPe8h1JKRJ25IGhsXBEBw1GhhHkWExUaqS', 'Student', 'Active', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_archive`
--

CREATE TABLE `tbl_archive` (
  `reg_no` varchar(255) NOT NULL,
  `user_id` int(20) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `role` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sex` varchar(20) NOT NULL,
  `address` longtext NOT NULL,
  `contact_number` varchar(15) NOT NULL,
  `condition` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_archive`
--

INSERT INTO `tbl_archive` (`reg_no`, `user_id`, `firstname`, `lastname`, `middlename`, `role`, `email`, `sex`, `address`, `contact_number`, `condition`, `date`) VALUES
('', 141121, 'Sofia', 'Estrecho', 'Panis', 'Registrar', '', 'N/A', '', '', '', ''),
('', 151121, 'Sofia', 'Estrecho', 'P', 'Registrar', '', 'N/A', '', '', '', ''),
('', 151121, 'Sofia', 'Estrecho', 'Panis', 'Registrar', '', 'N/A', '', '', '', ''),
('', 151121, 'Sofia', 'Estrecho', 'Panis', 'Registrar', '', 'N/A', '', '', '', ''),
('', 2147483647, 'Juan', 'Dela Cruz', 'Manuel', 'Student', '', '', '', '', 'Dropped', '2021-11-15'),
('', 0, '', '', '', 'Student', '', '', '', '', 'Dropped', '2021-11-15'),
('', 0, '', '', '', 'Student', '', '', '', '', 'Dropped', '2021-11-15'),
('', 2018305305, 'Mark', 'Bonifacio', 'Sanchez', 'Student', '', '', '', '', 'Graduate', '2021-11-15'),
('', 0, '', '', '', 'Student', '', '', '', '', 'Graduate', '2021-11-15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_audit_logs`
--

CREATE TABLE `tbl_audit_logs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `activity` varchar(255) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_audit_logs`
--

INSERT INTO `tbl_audit_logs` (`id`, `user_id`, `role`, `username`, `activity`, `date_time`) VALUES
(10, 12345, '', 'SAMPLE', 'Login', '2021-11-14 19:50:21'),
(11, 0, '', 'Merry Anne Villamo', 'Login', '2021-11-14 19:51:34'),
(12, 102102, '', 'Merry Anne Villamo', 'Login', '2021-11-14 19:52:16'),
(13, 102102, 'Registrar', 'Merry Anne Villamo', 'Login', '2021-11-14 19:54:23'),
(14, 102101, 'Admin', 'Admin', 'Login', '2021-11-14 19:54:40'),
(15, 102103, 'Cashier', 'Justine Dave Delos Reyes', 'Login', '2021-11-14 19:55:30'),
(16, 102103, 'Cashier', 'Justine Dave Delos Reyes', 'Logout', '2021-11-14 19:59:11'),
(17, 2018301301, 'Student', 'Michael Isla', 'Login', '2021-11-14 20:01:26'),
(18, 2018301301, 'Student', 'Michael Isla', 'Login', '2021-11-14 20:02:32'),
(19, 2018301301, 'Student', 'Michael Isla', 'Logout', '2021-11-14 20:02:38'),
(20, 102101, 'Admin', 'Admin', 'Login', '2021-11-14 20:03:34'),
(21, 102101, 'Admin', 'Admin', 'And new employee 141121 - Sofia Estrecho', '2021-11-14 21:01:29'),
(22, 102101, 'Admin', 'Admin', 'Update employee details of 141121 - Sofia Estrecho', '2021-11-15 09:10:52'),
(23, 102101, 'Admin', 'Admin', 'And new employee 151121 - Sofia Isla', '2021-11-15 09:16:07'),
(24, 102101, 'Admin', 'Admin', 'Update employee details of 151121 - Sofia Estrecho', '2021-11-15 09:16:22'),
(25, 102101, 'Admin', 'Admin', 'Update employee details of 151121 - Sofia Estrecho', '2021-11-15 09:16:29'),
(26, 102101, 'Admin', 'Admin', 'And new employee 151121 - Sofia Estrecho', '2021-11-15 09:17:28'),
(27, 102101, 'Admin', 'Admin', 'Update employee details of 151121 - Sofia Estrecho', '2021-11-15 09:17:46'),
(28, 102101, 'Admin', 'Admin', 'Archive employee 151121 - Sofia Estrecho', '2021-11-15 09:17:53'),
(29, 102101, 'Admin', 'Admin', 'And new employee 151121 - Sofia Estrecho', '2021-11-15 09:18:28'),
(30, 102101, 'Admin', 'Admin', 'Update employee details of 151121 - Sofia Estrecho', '2021-11-15 09:18:34'),
(31, 102101, 'Admin', 'Admin', 'Archive employee 151121 - Sofia Estrecho', '2021-11-15 09:18:37'),
(32, 102101, 'Admin', 'Admin Admin', 'Logout', '2021-11-15 10:32:50'),
(33, 102102, 'Registrar', 'Merry Anne Villamo', 'Login', '2021-11-15 10:32:58'),
(34, 102102, 'Registrar', 'Merry Anne Villamo', 'Logout', '2021-11-15 10:33:22'),
(35, 102102, 'Registrar', 'Merry Anne Villamo', 'Login', '2021-11-15 10:34:32'),
(36, 102102, 'Registrar', 'Merry Anne Villamo', 'Logout', '2021-11-15 10:35:48'),
(37, 102102, 'Registrar', 'Merry Anne Villamo', 'Login', '2021-11-15 10:36:24'),
(38, 102102, 'Registrar', 'Merry Anne Villamo', 'Add new student 2018305305 - Mark Sanchez Bonifacion', '2021-11-15 10:49:31'),
(39, 102102, 'Registrar', 'Merry Anne Villamo', 'Update student details of 2018305305 - Mark Sanchez Bonifacio', '2021-11-15 10:51:14'),
(40, 102102, 'Registrar', 'Merry Anne Villamo', 'Archive student 2018305305 - Mark Bonifacio', '2021-11-15 10:54:04'),
(41, 102102, 'Registrar', 'Merry Anne Villamo', 'Add new student 2018307307 - Gemark P Estrecho', '2021-11-15 10:56:20'),
(42, 102102, 'Registrar', 'Merry Anne Villamo', 'Archive student  -  ', '2021-11-15 10:56:29'),
(43, 102102, 'Registrar', 'Merry Anne Villamo', 'Add new student 2018308308 - John Salinas Nate', '2021-11-15 10:58:05'),
(44, 102102, 'Registrar', 'Merry Anne Villamo', 'Logout', '2021-11-15 10:58:25'),
(45, 102103, 'Cashier', 'Justine Dave Delos Reyes', 'Login', '2021-11-15 10:58:54'),
(46, 102103, 'Cashier', 'Justine Dave Delos Reyes', 'Denied student payment - Michael Isla', '2021-11-15 11:05:42'),
(47, 102103, 'Cashier', 'Justine Dave Delos Reyes', 'Logout', '2021-11-15 11:07:29'),
(48, 2018301301, 'Student', 'Michael Isla', 'Login', '2021-11-15 11:07:40'),
(49, 2018301301, 'Student', 'Michael Isla', 'Logout', '2021-11-15 11:08:00'),
(50, 102103, 'Cashier', 'Justine Dave Delos Reyes', 'Login', '2021-11-15 11:08:31'),
(51, 102103, 'Cashier', 'Justine Dave Delos Reyes', 'Denied student payment - Michael Isla', '2021-11-15 11:08:42'),
(52, 102103, 'Cashier', 'Justine Dave Delos Reyes', 'Logout', '2021-11-15 11:08:46'),
(53, 2018301301, 'Student', 'Michael Isla', 'Login', '2021-11-15 11:08:59'),
(54, 2018301301, 'Student', 'Michael Estrecho Isla', 'Resubmit payment request', '2021-11-15 11:11:22'),
(55, 2018301301, 'Student', 'Michael Isla', 'Logout', '2021-11-15 11:11:43'),
(56, 102103, 'Cashier', 'Justine Dave Delos Reyes', 'Login', '2021-11-15 11:11:56'),
(57, 102103, 'Cashier', 'Justine Dave Delos Reyes', 'Apporove student payment2018301301 - Michael Isla', '2021-11-15 11:12:08'),
(58, 102103, 'Cashier', 'Justine Dave Delos Reyes', 'Login', '2021-11-15 16:42:30'),
(59, 102103, 'Cashier', 'Justine Dave Delos Reyes', 'Transact payment of 2018301301-Michael Estrecho Isla', '2021-11-15 16:47:32'),
(60, 102103, 'Cashier', 'Justine Dave Delos Reyes', 'Logout', '2021-11-15 16:48:09'),
(61, 2018301301, 'Student', 'Michael Isla', 'Login', '2021-11-15 16:48:20'),
(62, 2018301301, 'Student', 'Michael Estrecho Isla', 'Submit payment request', '2021-11-15 16:52:14'),
(63, 2018301301, 'Student', 'Michael Isla', 'Logout', '2021-11-15 16:52:27'),
(64, 102103, 'Cashier', 'Justine Dave Delos Reyes', 'Login', '2021-11-15 16:52:38'),
(65, 102103, 'Cashier', 'Justine Dave Delos Reyes', 'Apporove student payment 2018301301 - Michael Estrecho Isla', '2021-11-15 16:52:44'),
(66, 102103, 'Cashier', 'Justine Dave Delos Reyes', 'Logout', '2021-11-15 16:53:02'),
(67, 102102, 'Registrar', 'Merry Anne Villamo', 'Login', '2021-11-15 16:55:26'),
(68, 102102, 'Registrar', 'Merry Anne Villamo', 'Logout', '2021-11-15 16:55:47'),
(69, 102101, 'Admin', 'Admin', 'Login', '2021-11-15 16:56:03'),
(70, 102101, 'Admin', 'Admin Admin', 'Logout', '2021-11-15 16:56:20'),
(71, 102101, 'Admin', 'Admin', 'Login', '2021-11-15 16:56:51'),
(72, 102101, 'Admin', 'Admin', 'Update employee details of 102103 - Justine Dave Delos Reyes', '2021-11-15 16:57:04'),
(73, 102101, 'Admin', 'Admin Admin', 'Logout', '2021-11-15 16:57:35'),
(74, 102102, 'Registrar', 'Merry Anne Villamo', 'Login', '2021-11-15 16:57:53'),
(75, 102102, 'Registrar', 'Merry Anne Villamo', 'Logout', '2021-11-15 23:14:50'),
(76, 102103, 'Cashier', 'Justine Dave Delos Reyes', 'Login', '2021-11-15 23:14:59'),
(77, 102103, 'Cashier', 'Justine Dave Delos Reyes', 'Transact payment of 2018301301-Michael Estrecho Isla', '2021-11-16 00:37:00'),
(78, 102103, 'Cashier', 'Justine Dave Delos Reyes', 'Transact payment of 2018301301-Michael Estrecho Isla', '2021-11-16 00:46:50'),
(79, 102103, 'Cashier', 'Justine Dave Delos Reyes', 'Transact payment of 2018301301-Michael Estrecho Isla', '2021-11-16 00:47:32'),
(80, 102103, 'Cashier', 'Justine Dave Delos Reyes', 'Logout', '2021-11-16 04:30:10'),
(81, 102101, 'Admin', 'Admin', 'Login', '2021-11-16 04:30:18'),
(82, 102101, 'Admin', 'Admin Admin', 'Logout', '2021-11-16 04:41:33'),
(83, 102102, 'Registrar', 'Merry Anne Villamo', 'Login', '2021-11-16 04:41:58'),
(84, 102102, 'Registrar', 'Merry Anne Villamo', 'Logout', '2021-11-16 04:48:20'),
(85, 2018301301, 'Student', 'Michael Isla', 'Login', '2021-11-16 04:48:45'),
(86, 2018301301, 'Student', 'Michael Isla', 'Logout', '2021-11-16 04:49:45');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course_fees`
--

CREATE TABLE `tbl_course_fees` (
  `program_id` int(11) NOT NULL,
  `semester` varchar(100) NOT NULL,
  `course_year_level` varchar(100) NOT NULL,
  `lecture_Fee` float NOT NULL,
  `lab_Fee` float NOT NULL,
  `library_Fee` float NOT NULL,
  `guidance_Fee` float NOT NULL,
  `athletic_Fee` float NOT NULL,
  `computer_Fee` float NOT NULL,
  `registration_Fee` float NOT NULL,
  `tuition_fee` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_course_fees`
--

INSERT INTO `tbl_course_fees` (`program_id`, `semester`, `course_year_level`, `lecture_Fee`, `lab_Fee`, `library_Fee`, `guidance_Fee`, `athletic_Fee`, `computer_Fee`, `registration_Fee`, `tuition_fee`) VALUES
(1, '1', '1', 1000, 2000, 500, 300, 200, 1500, 500, 3000),
(2, '2', '4', 300, 500, 500, 500, 500, 500, 500, 2500),
(3, '2', '4', 300, 500, 500, 500, 500, 500, 500, 2500),
(4, '1', '4', 500, 500, 500, 500, 500, 500, 500, 2500),
(5, '1', '1', 500, 500, 500, 500, 500, 500, 500, 2500),
(6, '1', '1', 500, 500, 500, 500, 500, 500, 500, 2500),
(7, '1', '4', 1000, 500, 500, 500, 500, 500, 500, 2500),
(8, '1', '1', 500, 500, 500, 500, 500, 500, 500, 2500),
(9, '2', '1', 500, 500, 500, 500, 500, 500, 500, 2500),
(22, '1', '3', 500, 500, 500, 500, 500, 500, 500, 2500),
(23, '1', '4', 100, 0, 100, 100, 100, 100, 100, 500),
(24, '1', '1', 300, 100, 200, 150, 300, 150, 400, 1200);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course_list`
--

CREATE TABLE `tbl_course_list` (
  `program_id` int(11) NOT NULL,
  `course_program` varchar(100) NOT NULL,
  `course_major` varchar(100) NOT NULL,
  `course_duration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_course_list`
--

INSERT INTO `tbl_course_list` (`program_id`, `course_program`, `course_major`, `course_duration`) VALUES
(1, 'BSIT', 'WMA', 4),
(2, 'BSIT', 'TSM', 4),
(3, 'BSIT', 'NA', 4),
(4, 'BSED', 'English', 4),
(5, 'BSED', 'Math', 4),
(6, 'BSED', 'Science', 4),
(7, 'BSED', 'Art', 4),
(8, 'BSED', 'Filipino', 4),
(9, 'BSED', 'Social Studies', 4),
(22, 'BSED', 'English', 4),
(23, 'BSED', 'English', 4),
(24, 'BSED', 'Psychology', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_discount`
--

CREATE TABLE `tbl_discount` (
  `discount_type` varchar(100) NOT NULL,
  `discount_percent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_discount`
--

INSERT INTO `tbl_discount` (`discount_type`, `discount_percent`) VALUES
('Disabilities', 20),
('Sibling Discount', 15);

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
  `sex` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` longtext NOT NULL,
  `contact_number` varchar(15) NOT NULL,
  `hireDate` varchar(100) NOT NULL,
  `joined_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_employee_info`
--

INSERT INTO `tbl_employee_info` (`reg_no`, `employee_id`, `role`, `firstname`, `lastname`, `middlename`, `sex`, `email`, `address`, `contact_number`, `hireDate`, `joined_date`) VALUES
('20211', 102101, 'Admin', 'Admin', 'Admin', 'Admin', 'male', 'admin@gmail.com', 'San Roque, San Jacinto, Pangasinan', '09307078204', '2021-11-01', 'November 1, 2021, 8:08 pm'),
('202112', 102102, 'Registrar', 'Merry Anne', 'Villamo', 'C', 'female', 'merryannevillano16@gmail.com', 'Tarlac City', '09307078204', '2018-06-12', 'November 5, 2021, 4:59 am'),
('2021113', 102103, 'Cashier', 'Justine Dave', 'Delos Reyes', 'A', 'male', 'justine@gmail.com', 'Tarlac City', '09307078204', '2020-06-12', 'November 5, 2021, 5:00 am');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payments`
--

CREATE TABLE `tbl_payments` (
  `transaction_no` varchar(100) NOT NULL,
  `program_id` int(11) NOT NULL,
  `stud_id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `academic_year` varchar(100) NOT NULL,
  `semester` varchar(100) NOT NULL,
  `tuition_fee` int(100) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_method` varchar(100) NOT NULL,
  `payment_gateway` varchar(100) NOT NULL,
  `sales_invoice` longtext NOT NULL,
  `balance` int(11) NOT NULL,
  `transaction_date` date NOT NULL,
  `payment_status` varchar(100) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `cashier_id` int(11) NOT NULL,
  `cashier_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_payments`
--

INSERT INTO `tbl_payments` (`transaction_no`, `program_id`, `stud_id`, `fullname`, `academic_year`, `semester`, `tuition_fee`, `amount`, `payment_method`, `payment_gateway`, `sales_invoice`, `balance`, `transaction_date`, `payment_status`, `remarks`, `cashier_id`, `cashier_name`) VALUES
('FT-007', 1, 2018301301, 'Michael Isla', '2021-2022', '1', 14000, 1000, 'Cash', '', '', 4000, '2021-11-05', 'Approved', 'Not Fully Paid', 102103, 'Justine Dave Delos Reyes'),
('FT-008', 1, 2018301301, 'Michael Isla', '2021-2022', '1', 14000, 500, 'Cash', '', '', 3500, '2021-11-05', 'Approved', 'Not Fully Paid', 102103, 'Justine Dave Delos Reyes'),
('FT-009', 2, 2018301301, 'Michael Estrecho Isla', '2021-2022', '2', 5100, 100, 'Cash', '', '', 3500, '2021-11-15', 'Approved', 'Not Fully Paid', 102103, 'Justine Dave Delos Reyes'),
('FT-010', 2, 2018301301, 'Michael Estrecho Isla', '2021-2022', '2', 5100, 100, 'Online', 'Paymaya', 'Paymaya-receipt-sample.jpg', 3400, '2021-11-15', 'Approved', 'Not Fully Paid', 102103, 'Justine Dave Delos Reyes'),
('FT-011', 2, 2018301301, 'Michael Estrecho Isla', '2021-2022', '2', 5100, 100, 'Cash', '', '', 3300, '2021-11-16', 'Approved', 'Not Fully Paid', 102103, 'Justine Dave Delos Reyes'),
('FT-012', 2, 2018301301, 'Michael Estrecho Isla', '2021-2022', '2', 5100, 100, 'Cash', '', '', 3200, '2021-11-16', 'Approved', 'Not Fully Paid', 102103, 'Justine Dave Delos Reyes'),
('FT-013', 2, 2018301301, 'Michael Estrecho Isla', '2021-2022', '2', 5100, 100, 'Cash', '', '', 3100, '2021-11-16', 'Approved', 'Not Fully Paid', 102103, 'Justine Dave Delos Reyes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pending_payments`
--

CREATE TABLE `tbl_pending_payments` (
  `transaction_no` varchar(50) NOT NULL,
  `stud_id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_gateway` varchar(100) NOT NULL,
  `sales_invoice` longtext NOT NULL,
  `transaction_date` date NOT NULL,
  `status` varchar(100) NOT NULL,
  `reasonToDeny` longtext NOT NULL,
  `cashier_id` int(11) NOT NULL,
  `cashier_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reports`
--

CREATE TABLE `tbl_reports` (
  `cashier_id` int(100) NOT NULL,
  `cashier_name` varchar(255) NOT NULL,
  `cash_payment` int(100) NOT NULL,
  `fund_transfer` int(100) NOT NULL,
  `total_transaction_count` int(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_reports`
--

INSERT INTO `tbl_reports` (`cashier_id`, `cashier_name`, `cash_payment`, `fund_transfer`, `total_transaction_count`, `date`) VALUES
(102103, 'Justine Dave Delos Reyes', 300, 0, 3, '2021-11-16');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_scholarship`
--

CREATE TABLE `tbl_scholarship` (
  `scholar_type` varchar(10) NOT NULL,
  `scholar_description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_scholarship`
--

INSERT INTO `tbl_scholarship` (`scholar_type`, `scholar_description`) VALUES
('Half', 'Academic'),
('Half', 'Athlete');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student_fees`
--

CREATE TABLE `tbl_student_fees` (
  `program_id` int(11) NOT NULL,
  `stud_id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `csi_year_level` varchar(100) NOT NULL,
  `scholar_desc` varchar(100) NOT NULL,
  `scholar_type` varchar(255) NOT NULL,
  `discount_type` varchar(100) NOT NULL,
  `tuition_fee` int(100) NOT NULL,
  `lab_units` int(11) NOT NULL,
  `lec_units` int(11) NOT NULL,
  `assessed_fee` int(11) NOT NULL,
  `total_amount_paid` int(11) NOT NULL,
  `balance` int(11) NOT NULL,
  `remarks` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_student_fees`
--

INSERT INTO `tbl_student_fees` (`program_id`, `stud_id`, `fullname`, `csi_year_level`, `scholar_desc`, `scholar_type`, `discount_type`, `tuition_fee`, `lab_units`, `lec_units`, `assessed_fee`, `total_amount_paid`, `balance`, `remarks`) VALUES
(1, 123456, 'Mike Estrecho Isla', '1', 'N/A', 'N/A', 'N/A', 7000, 1, 2, 3000, 0, 7000, 'Not Fully Paid'),
(1, 12345678, 'Michael Estrecho Isla', '1', 'N/A', 'N/A', 'N/A', 8000, 2, 1, 3000, 0, 8000, 'Not Fully Paid'),
(6, 2018098123, 'Mylene Estrecho Isla', '1', 'N/A', 'N/A', 'N/A', 5000, 1, 4, 2500, 0, 5000, 'Not Fully Paid'),
(1, 2018276186, 'Merry Anne V Villano', '1', 'N/A', 'N/A', 'N/A', 9000, 2, 2, 3000, 0, 9000, 'Not Fully Paid'),
(1, 2018287456, 'Justine Dave D Delos Reyes', '1', 'N/A', 'N/A', 'N/A', 10000, 3, 1, 3000, 0, 10000, 'Not Fully Paid'),
(1, 2018301276, 'Denver G Pulido', '1', 'N/A', 'N/A', 'N/A', 8000, 2, 1, 3000, 0, 8000, 'Not Fully Paid'),
(2, 2018301301, 'Michael Estrecho Isla', '4', 'N/A', 'N/A', 'N/A', 5100, 4, 2, 2500, 2000, 3100, 'Not Fully Paid'),
(1, 2018302302, 'Juan Manuel  Dela Curz', '1', 'N/A', 'N/A', 'N/A', 8000, 2, 1, 3000, 0, 8000, 'Not Fully Paid'),
(1, 2018303303, 'Jose Cruz Velasco', '1', 'N/A', 'N/A', 'N/A', 8000, 2, 1, 3000, 0, 8000, 'Not Fully Paid'),
(1, 2018304304, 'Manuel Velasco Perez', '1', 'N/A', 'N/A', 'N/A', 8000, 2, 1, 3000, 0, 8000, 'Not Fully Paid'),
(1, 2018307307, 'Gemark P Estrecho', '1', 'N/A', 'N/A', 'N/A', 6000, 1, 1, 3000, 0, 6000, 'Not Fully Paid'),
(1, 2018308308, 'John Salinas Nate', '1', 'N/A', 'N/A', 'N/A', 8000, 2, 1, 3000, 0, 8000, 'Not Fully Paid');

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
  `address` longtext NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_number` varchar(12) NOT NULL,
  `joined_date` varchar(100) NOT NULL DEFAULT 'N/A',
  `registrar_id` int(11) NOT NULL,
  `registrar_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_student_info`
--

INSERT INTO `tbl_student_info` (`reg_no`, `stud_id`, `firstname`, `lastname`, `middlename`, `sex`, `address`, `email`, `contact_number`, `joined_date`, `registrar_id`, `registrar_name`) VALUES
('', 123456, 'Mike', 'Isla', 'Estrecho', '', '', '', '', '', 102102, 'Merry Anne Villamo'),
('', 12345678, 'Michael', 'Isla', 'Estrecho', '', '', '', '', '', 102102, 'Merry Anne Villamo'),
('', 2018098123, 'Mylene', 'Isla', 'Estrecho', '', '', '', '', '', 102102, 'Merry Anne Villamo'),
('', 2018276186, 'Merry Anne', 'Villano', 'V', '', '', '', '', '', 102102, 'Merry Anne Villamo'),
('', 2018287456, 'Justine Dave', 'Delos Reyes', 'D', '', '', '', '', '', 102102, 'Merry Anne Villamo'),
('', 2018301276, 'Denver', 'Pulido', 'G', '', '', '', '', '', 102102, 'Merry Anne Villamo'),
('20211', 2018301301, 'Michael', 'Isla', 'Estrecho', 'male', 'San Roque, San Jacinto, Pangasinan', 'isla.michael.estrecho@gmail.com', '09307078204', 'November 5, 2021, 5:04 am', 102102, 'Merry Anne Villamo'),
('', 2018302302, 'Juan', 'Dela Curz', 'Manuel ', '', '', '', '', '', 102102, 'Merry Anne Villamo'),
('', 2018303303, 'Jose', 'Velasco', 'Cruz', '', '', '', '', '', 102102, 'Merry Anne Villamo'),
('', 2018304304, 'Manuel', 'Perez', 'Velasco', '', '', '', '', '', 102102, 'Merry Anne Villamo'),
('', 2018307307, 'Gemark', 'Estrecho', 'P', '', '', '', '', '', 102102, 'Merry Anne Villamo'),
('', 2018308308, 'John', 'Nate', 'Salinas', '', '', '', '', '', 102102, 'Merry Anne Villamo');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student_requirements`
--

CREATE TABLE `tbl_student_requirements` (
  `stud_id` int(11) NOT NULL,
  `form_137` varchar(100) NOT NULL,
  `form_138` varchar(100) NOT NULL,
  `psa_birth_cert` varchar(100) NOT NULL,
  `good_moral` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_student_requirements`
--

INSERT INTO `tbl_student_requirements` (`stud_id`, `form_137`, `form_138`, `psa_birth_cert`, `good_moral`) VALUES
(2018301301, '✓', '✓', '✓', '✓'),
(2018301276, '✓', '✓', '✓', '✓'),
(123456, '✓', '✓', '✓', '✓'),
(12345678, '✓', '✓', '✓', '✓');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student_school_details`
--

CREATE TABLE `tbl_student_school_details` (
  `stud_id` int(11) NOT NULL,
  `LRN` varchar(100) NOT NULL,
  `stud_type` varchar(100) NOT NULL,
  `csi_academic_year` varchar(100) NOT NULL,
  `csi_semester` varchar(100) NOT NULL,
  `csi_program` varchar(255) NOT NULL,
  `csi_major` longtext NOT NULL,
  `csi_year_level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_student_school_details`
--

INSERT INTO `tbl_student_school_details` (`stud_id`, `LRN`, `stud_type`, `csi_academic_year`, `csi_semester`, `csi_program`, `csi_major`, `csi_year_level`) VALUES
(123456, '', '', '', '1', 'BSIT', 'WMA', '1'),
(12345678, '', '', '', '1', 'BSIT', 'WMA', '1'),
(2018098123, '', '', '', '1', 'BSED', 'Science', '1'),
(2018276186, '', '', '', '1', 'BSIT', 'WMA', '1'),
(2018287456, '', '', '', '1', 'BSIT', 'WMA', '1'),
(2018301301, '101943050047', 'old', '2021-2022', '2', 'BSIT', 'TSM', '4'),
(2018301276, '', '', '', '1', 'BSIT', 'WMA', '1'),
(2018302302, '', '', '', '1', 'BSIT', 'WMA', '1'),
(2018303303, '', '', '', '1', 'BSIT', 'WMA', '1'),
(2018304304, '', '', '', '1', 'BSIT', 'WMA', '1'),
(2018307307, '', '', '', '1', 'BSIT', 'WMA', '1'),
(2018308308, '', '', '', '1', 'BSIT', 'WMA', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_accounts`
--
ALTER TABLE `tbl_accounts`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_audit_logs`
--
ALTER TABLE `tbl_audit_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_course_list`
--
ALTER TABLE `tbl_course_list`
  ADD PRIMARY KEY (`program_id`);

--
-- Indexes for table `tbl_discount`
--
ALTER TABLE `tbl_discount`
  ADD PRIMARY KEY (`discount_type`);

--
-- Indexes for table `tbl_employee_info`
--
ALTER TABLE `tbl_employee_info`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `tbl_payments`
--
ALTER TABLE `tbl_payments`
  ADD PRIMARY KEY (`transaction_no`);

--
-- Indexes for table `tbl_pending_payments`
--
ALTER TABLE `tbl_pending_payments`
  ADD PRIMARY KEY (`transaction_no`);

--
-- Indexes for table `tbl_student_fees`
--
ALTER TABLE `tbl_student_fees`
  ADD PRIMARY KEY (`stud_id`);

--
-- Indexes for table `tbl_student_info`
--
ALTER TABLE `tbl_student_info`
  ADD PRIMARY KEY (`stud_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_audit_logs`
--
ALTER TABLE `tbl_audit_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
