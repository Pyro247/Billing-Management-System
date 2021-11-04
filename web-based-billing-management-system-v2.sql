-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2021 at 10:23 PM
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
(2018301276, 'Denver Pulido', 'denvergpulido15@gmail.com', '$2y$10$cAvD.DPTprAftApAuFH7L.rOjc7CqIeclvHWwXOVU7X8434skhh/i', 'Student', 'Active', '', ''),
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
(1, '1', '1', 1000, 2000, 500, 300, 200, 1500, 500, 6000),
(2, '2', '4', 0, 500, 500, 500, 500, 500, 500, 3000),
(3, '2', '4', 0, 500, 500, 500, 500, 500, 500, 3000),
(4, '1', '4', 500, 500, 500, 500, 500, 500, 500, 3500),
(5, '1', '1', 500, 500, 500, 500, 500, 500, 500, 3500),
(6, '1', '1', 500, 500, 500, 500, 500, 500, 500, 3500),
(7, '1', '4', 1000, 500, 500, 500, 500, 500, 500, 4000),
(8, '1', '1', 500, 500, 500, 500, 500, 500, 500, 3500),
(9, '2', '1', 500, 500, 500, 500, 500, 500, 500, 3500),
(22, '1', '3', 500, 500, 500, 500, 500, 500, 500, 3500),
(23, '1', '4', 100, 0, 100, 100, 100, 100, 100, 100),
(24, '1', '1', 300, 100, 200, 140, 300, 150, 400, 1190);

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
('2021113', 102103, 'Cashier', 'Justine Dave', 'Delos Reyes', 'E', 'male', 'justine@gmail.com', 'Tarlac City', '09307078204', '2020-06-12', 'November 5, 2021, 5:00 am');

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
('FT-003', 1, 2018301302, 'Mike Isla', '2021-2022', '2', 10000, 5000, 'Online', 'Paymaya', 'Pay.png', 5000, '2021-10-30', 'Approved', 'Not Fully Paid', 2021000003, 'Michael Isla'),
('FT-004', 1, 2018301301, 'Michael Isla', '2021-2022', '1', 14000, 4000, 'Online', 'Paymaya', 'Paymaya-receipt-sample.jpg', 10000, '2021-11-05', 'Approved', 'Not Fully Paid', 102103, 'Justine Dave Delos Reyes'),
('FT-005', 1, 2018301301, 'Michael Isla', '2021-2022', '1', 14000, 5000, 'Cash', '', '', 5000, '2021-11-05', 'Approved', 'Not Fully Paid', 102103, 'Justine Dave Delos Reyes');

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

--
-- Dumping data for table `tbl_pending_payments`
--

INSERT INTO `tbl_pending_payments` (`transaction_no`, `stud_id`, `fullname`, `email`, `amount`, `payment_gateway`, `sales_invoice`, `transaction_date`, `status`, `reasonToDeny`, `cashier_id`, `cashier_name`) VALUES
('FT-006', 2018301301, 'Michael Isla', 'isla.michael.estrecho@gmail.com', 1500, 'Paymaya', 'Pay.png', '2021-11-05', 'Pending', '', 0, '');

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
('Half', 'Athelete'),
('Half', 'Academic');

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
  `total_amount_paid` int(11) NOT NULL,
  `balance` int(11) NOT NULL,
  `remarks` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_student_fees`
--

INSERT INTO `tbl_student_fees` (`program_id`, `stud_id`, `fullname`, `csi_year_level`, `scholar_desc`, `scholar_type`, `discount_type`, `tuition_fee`, `lab_units`, `lec_units`, `total_amount_paid`, `balance`, `remarks`) VALUES
(1, 2018301301, 'Michael Isla', '1', 'N/A', 'N/A', 'N/A', 14000, 3, 2, 9000, 5000, 'Not Fully Paid'),
(1, 2018301276, 'Denver G Pulido', '1', 'N/A', 'N/A', 'Sibling Discount', 14000, 3, 2, 0, 11900, 'Not Fully Paid');

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
('202112', 2018301276, 'Denver', 'Pulido', 'G', 'male', 'Tarlac City', 'denvergpulido15@gmail.com', '09307078204', 'November 5, 2021, 5:07 am', 102102, 'Merry Anne Villamo'),
('20211', 2018301301, 'Michael', 'Isla', 'Estrecho', 'male', 'San Roque, San Jacinto, Pangasinan', 'isla.michael.estrecho@gmail.com', '09307078204', 'November 5, 2021, 5:04 am', 102102, 'Merry Anne Villamo');

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
(2018301276, 'x', 'x', 'x', 'x');

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
(2018301301, '101943050047', 'old', '2021-2022', '1', 'BSIT', 'WMA', '1'),
(2018301276, '101943050048', 'transferee', '2021-2022', '1', 'BSIT', 'WMA', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_accounts`
--
ALTER TABLE `tbl_accounts`
  ADD PRIMARY KEY (`user_id`);

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
-- Indexes for table `tbl_student_info`
--
ALTER TABLE `tbl_student_info`
  ADD PRIMARY KEY (`stud_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
