-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2021 at 03:47 PM
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
('2021-2022');

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
(2018301, 'Michael Isla', 'm.isla1301@student.tsu.edu.ph', 'Mike@1301', 'Student', '', ''),
(2018302, 'Denver Pulido\r\n', 'pulido@gmail.com', 'Pulido@1', 'Student', '', ''),
(10121314, 'Mike Isla', 'michael.estrechoisla@gmail.com', 'Mike@1301', 'Registrar', '', ''),
(2018301276, 'Denver Pulido', 'denvergpulido15@gmail.com', 'Denver-15', 'Cashier', '', ''),
(2018301301, 'Michael Isla', 'isla.michael.estrecho@gmail.com', 'Mike@1301', 'Admin', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_archive`
--

CREATE TABLE `tbl_archive` (
  `academic_year` varchar(100) NOT NULL,
  `user_id` int(20) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` longtext NOT NULL,
  `role` varchar(15) NOT NULL,
  `otp_code` varchar(100) NOT NULL,
  `otp_expiration` varchar(100) NOT NULL,
  `program_id` int(11) NOT NULL,
  `semester` varchar(100) NOT NULL,
  `course_year_level` varchar(100) NOT NULL,
  `tuition_fee` int(11) NOT NULL,
  `course_program` varchar(100) NOT NULL,
  `course_major` varchar(100) NOT NULL,
  `course_duration` int(11) NOT NULL,
  `discount_type` varchar(100) NOT NULL,
  `discount_percent` int(11) NOT NULL,
  `reg_no` varchar(255) NOT NULL,
  `employee_id` int(20) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `sex` varchar(20) NOT NULL,
  `address` longtext NOT NULL,
  `contact_number` varchar(15) NOT NULL,
  `joined_date` varchar(100) NOT NULL,
  `transaction_no` varchar(100) NOT NULL,
  `stud_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_method` varchar(100) NOT NULL,
  `payment_gateway` varchar(100) NOT NULL,
  `sales_invoice` longtext NOT NULL,
  `balance` int(11) NOT NULL,
  `transaction_date` date NOT NULL,
  `payment_status` varchar(100) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `cashier_id` int(11) NOT NULL,
  `cashier_name` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `reasonToDeny` longtext NOT NULL,
  `csi_year_level` varchar(100) NOT NULL,
  `scholar_type` varchar(100) NOT NULL,
  `total_amount_paid` int(11) NOT NULL,
  `registrar_id` int(11) NOT NULL,
  `registrar_name` varchar(100) NOT NULL,
  `form_137` varchar(100) NOT NULL,
  `form_138` varchar(100) NOT NULL,
  `psa_birth_cert` varchar(100) NOT NULL,
  `good_moral` varchar(100) NOT NULL,
  `LRN` varchar(100) NOT NULL,
  `stud_type` varchar(100) NOT NULL,
  `csi_academic_year` varchar(100) NOT NULL,
  `csi_semester` varchar(100) NOT NULL,
  `csi_program` varchar(255) NOT NULL,
  `csi_major` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course_fees`
--

CREATE TABLE `tbl_course_fees` (
  `program_id` int(11) NOT NULL,
  `semester` varchar(100) NOT NULL,
  `course_year_level` varchar(100) NOT NULL,
  `tuition_fee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_course_fees`
--

INSERT INTO `tbl_course_fees` (`program_id`, `semester`, `course_year_level`, `tuition_fee`) VALUES
(1, '1', '4', 10000),
(2, '1', '4', 12000),
(10, '2', '4', 8500),
(11, '1', '4', 7000);

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
(3, 'BSCS', 'N/A', 4),
(10, 'BSIT', 'NA', 4),
(11, 'BSED', 'English', 4);

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
('	 Disabilities', 30),
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
  `joined_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_employee_info`
--

INSERT INTO `tbl_employee_info` (`reg_no`, `employee_id`, `role`, `firstname`, `lastname`, `middlename`, `sex`, `email`, `address`, `contact_number`, `joined_date`) VALUES
('', 101521, 'Cashier', 'Michael', 'Isla', 'Estrecho', '', '', '', '', ''),
('20211', 10121314, 'Registrar', 'Mike', 'Isla', 'E', 'male', 'michael.estrechoisla@gmail.com', 'San Roque, San Jacinto, Pangasinan', '09307078204', 'October 12, 2021, 10:19 pm');

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
('FT-001', 1, 2018302, 'Denver Estrecho Isla', '2020-2021', '2', 10000, 500, 'Online', 'Gcash', 'Pay.png', 4500, '2021-10-13', 'Approved', 'Not Fully Paid', 11, 'Unknown'),
('FT-002', 1, 2018302, 'Denver Estrecho Isla', '2020-2021', '2', 10000, 1000, 'Online', 'Gcash', 'Pay.png', 3500, '2021-10-14', 'Approved', 'Not Fully Paid', 11, 'Unknown'),
('FT-003', 1, 2018302, 'Denver Estrecho Isla', '2020-2021', '2', 10000, 500, 'Online', 'Paymaya', 'Pay.png', 3000, '2021-10-14', 'Approved', 'Not Fully Paid', 11, 'Unknown'),
('FT-014', 1, 2018302, 'Denver Estrecho Isla', '2020-2021', '2', 10000, 500, 'Online', 'Paymaya', 'Pay.png', 2500, '2021-10-14', 'Approved', 'Not Fully Paid', 11, 'Unknown'),
('FT-016', 1, 2018302, 'Denver Estrecho Isla', '2020-2021', '2', 10000, 500, 'Online', 'Gcash', 'Pay.png', 9500, '2021-10-15', 'Approved', 'Not Fully Paid', 11, 'Unknown'),
('FT-017', 1, 2018302, 'Denver Estrecho Isla', '2020-2021', '2', 10000, 500, 'Online', 'Gcash', 'Pay.png', 9000, '2021-10-15', 'Approved', 'Not Fully Paid', 2018301276, 'Denver Pulido'),
('FT-018', 1, 2018302, 'Denver Estrecho Isla', '2020-2021', '2', 10000, 12, 'Online', 'Paymaya', 'Pay.png', 8988, '2021-10-16', 'Approved', 'Not Fully Paid', 2018301276, 'Denver Pulido'),
('FT-019', 1, 2018302, 'Denver Estrecho Isla', '2020-2021', '2', 10000, 13, 'Online', 'Paymaya', 'Assassin\'s Greed.jpg', 8975, '2021-10-16', 'Approved', 'Not Fully Paid', 2018301276, 'Denver Pulido'),
('FT-020', 1, 2018302, 'Denver Estrecho Isla', '2020-2021', '2', 10000, 14, 'Online', 'Paymaya', 'benny-rotlevy-I2EpqyPym78-unsplash.jpg', 8961, '2021-10-16', 'Approved', 'Not Fully Paid', 2018301276, 'Denver Pulido'),
('FT-021', 1, 2018301276, 'Denver Guieb Pulido', '2020-2021', '1', 10000, 20000, 'Online', 'Gcash', '244257982_599753621391051_8316464243051845024_n.jpg', 0, '2021-10-21', 'Approved', 'Fully Paid', 2018301276, 'Denver Pulido'),
('FT-022', 1, 2018302, 'Denver Estrecho Isla', '2020-2021', '2', 10000, 10000000, 'Online', 'Gcash', 'wp4288384-aesthetic-laptop-wallpapers.jpg', 0, '2021-10-24', 'Approved', 'Fully Paid', 2018301276, 'Denver Pulido'),
('FT-023', 1, 2018302, 'Denver Estrecho Isla', '2020-2021', '2', 10000, 20000, 'Cash', 'Paymaya', 'wp4288384-aesthetic-laptop-wallpapers.jpg', 0, '2021-10-24', 'Approved', 'Fully Paid', 2018301276, 'Denver Pulido'),
('FT-024', 1, 2018302, 'Denver Estrecho Isla', '2020-2021', '2', 10000, 123456, 'Online', 'Paymaya', 'wp4288384-aesthetic-laptop-wallpapers.jpg', 0, '2021-10-24', 'Approved', 'Fully Paid', 2018301276, 'Denver Pulido');

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
  `reasonToDeny` longtext NOT NULL
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
('Half', 'Academic'),
('Half', 'Athletes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student_fees`
--

CREATE TABLE `tbl_student_fees` (
  `program_id` int(11) NOT NULL,
  `stud_id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `csi_year_level` varchar(100) NOT NULL,
  `scholar_type` varchar(100) NOT NULL,
  `discount_type` varchar(100) NOT NULL,
  `tuition_fee` int(100) NOT NULL,
  `total_amount_paid` int(11) NOT NULL,
  `balance` int(11) NOT NULL,
  `remarks` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_student_fees`
--

INSERT INTO `tbl_student_fees` (`program_id`, `stud_id`, `fullname`, `csi_year_level`, `scholar_type`, `discount_type`, `tuition_fee`, `total_amount_paid`, `balance`, `remarks`) VALUES
(1, 2018301, 'Michael Estrecho Isla', '4', 'N/A', 'N/A', 10000, 2500, 10000, 'not fully paid'),
(1, 2018302, 'Denver Estrecho Isla', '4', 'N/A', 'N/A', 10000, 10151995, 0, 'Fully Paid'),
(1, 33219931, 'Wiya M Isla', '4', 'N/A', 'N/A', 10000, 2500, 7500, 'Not Fully Paid'),
(1, 2018301276, 'Denver Guieb Pulido', '4', 'Academic', 'Sibling Discount', 10000, 20000, 0, 'Fully Paid');

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
('20211', 2018301, 'Michael', 'Isla', 'Estrecho', 'male', 'San Roque, San Jacinto, Pangasinan', 'm.isla1301@student.tsu.edu.ph', '09307078204', 'October 12, 2021, 4:39 pm', 2018301301, 'Michael Isla'),
('202112', 2018302, 'Denver', 'Isla', 'Estrecho', 'male', 'San Roque, San Jacinto, Pangasinan', 'pulido@gmail.com', '09307078204', 'October 13, 2021, 9:01 am', 2018301301, 'Michael Isla'),
('2021113', 33219931, 'Wiya', 'Isla', 'M', 'male', 'Villa Socoroo Poblacion Norte, Paniqui, Tarlac', 'wiyaelias@gmail.com', '09307078204', 'October 13, 2021, 9:33 am', 2018301301, 'Michael Isla'),
('2021113', 2018301276, 'Denver', 'Pulido', 'Guieb', 'male', 'Maliwalo Tarlac City, Tarlac', 'denvergpulido15@gmail.com', '09483291587', 'October 21, 2021, 8:41 pm', 10121314, 'Mike Isla');

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
(2018301, '10.14.21', '10.14.21', '10.14.21', '10.14.21'),
(2018302, '10.14.21', '10.14.21', '10.14.21', '10.14.21'),
(33219931, '10.13.21', '10.13.21', '10.13.21', '10.13.21'),
(2018301276, '10.21.21', '10.21.21', '10.21.21', '10.21.21');

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
(2018301, '12345', 'old', '2020-2021', '2', 'BSIT', 'WMA', '4'),
(2018302, '12345', 'old', '2020-2021', '2', 'BSIT', 'WMA', '4'),
(33219931, '12345', 'old', '2020-2021', '2', 'BSIT', 'WMA', '4'),
(2018301276, '104240046', 'old', '2020-2021', '1', 'BSIT', 'WMA', '4');

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
