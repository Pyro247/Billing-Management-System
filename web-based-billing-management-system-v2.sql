-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2021 at 09:01 AM
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
(1, '', 'anne@gmail.com', 'anne', 'Registrar', '', ''),
(1301, 'Michael Isla', 'isla.michael.estrecho@gmail.com', 'Mike@1301', 'Registrar', '', ''),
(2018301, 'Michael Isla', 'm.isla1301@student.tsu.edu.ph', 'Mike@1301', ' Student', '', '');


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
(2, '1', '4', 12000);

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
(3, 'BSCS', 'N/A', 4);

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
  `contact_number` varchar(15) NOT NULL,
  `joined_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payments`
--

CREATE TABLE `tbl_payments` (
  `transaction_no.` int(11) NOT NULL,
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
  `total_amount_paid` int(11) NOT NULL,
  `balance` int(11) NOT NULL,
  `transaction_date` date NOT NULL,
  `payment_status` varchar(100) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `cashier_id` int(11) NOT NULL,
  `cashier_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pending_payments`
--

CREATE TABLE `tbl_pending_payments` (
  `transaction_no` varchar(255) NOT NULL,
  `stud_id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_gateway` varchar(100) NOT NULL,
  `sales_invoice` longtext NOT NULL,
  `transaction_date` date NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pending_payments`
--

INSERT INTO `tbl_pending_payments` (`transaction_no`, `stud_id`, `fullname`, `email`, `amount`, `payment_gateway`, `sales_invoice`, `transaction_date`, `status`) VALUES
('FT-001', 2018301, 'Michael Estrecho Isla', 'm.isla1301@student.tsu.edu.ph', 5000, 'Paymaya', '7448.png', '2021-10-07', 'Pending'),
('FT-002', 2018301, 'Michael Estrecho Isla', 'm.isla1301@student.tsu.edu.ph', 100, 'Paymaya', '832186.jpg', '2021-10-08', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student_discount`
--

CREATE TABLE `tbl_student_discount` (
  `stud_id` int(11) NOT NULL,
  `discount_description` varchar(100) NOT NULL,
  `discount_percent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `discount_percent` int(11) NOT NULL,
  `tuition_fee` int(100) NOT NULL,
  `total_amount_paid` int(11) NOT NULL,
  `balance` int(11) NOT NULL,
  `remarks` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_student_fees`
--

INSERT INTO `tbl_student_fees` (`program_id`, `stud_id`, `fullname`, `csi_year_level`, `scholar_type`, `discount_percent`, `tuition_fee`, `total_amount_paid`, `balance`, `remarks`) VALUES
(3, 2018301, 'Michael Estrecho Isla', '4', 'Full', 0, 10000, 0, 0, 'Full scholar');

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
('', 2018301, 'Michael', 'Isla', 'Estrecho', '', '', '', '', 'N/A', 1301, 'Michael Isla');

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
(2018301, '10.09.21', '10.09.21', '10.09.21', '10.09.21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student_scholarship`
--

CREATE TABLE `tbl_student_scholarship` (
  `stud_id` int(11) NOT NULL,
  `scholar_description` int(100) NOT NULL,
  `scholar_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(2018301, '', 'old', '2021-2022', '1', 'BSIT', 'WMA', '4');

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
-- Indexes for table `tbl_employee_info`
--
ALTER TABLE `tbl_employee_info`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `tbl_payments`
--
ALTER TABLE `tbl_payments`
  ADD PRIMARY KEY (`transaction_no.`);

--
-- Indexes for table `tbl_student_info`
--
ALTER TABLE `tbl_student_info`
  ADD PRIMARY KEY (`stud_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_course_list`
--
ALTER TABLE `tbl_course_list`
  MODIFY `program_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_payments`
--
ALTER TABLE `tbl_payments`
  MODIFY `transaction_no.` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
