-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2021 at 01:14 PM
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
('2020-2021');

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
(102101, 'Admin Admin', 'admin@gmail.com', '$2y$10$iFTw0PMTWaNBToeSR9dX2uP91Ww2fSyWSnBxcHUUwuOO0dERMLFyq', 'Admin', 'Active', '', '');

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
(1, '2', '4', 10000),
(2, '2', '4', 8000),
(3, '1', '4', 10000),
(4, '1', '4', 8000),
(5, '2', '4', 7000);

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
(3, 'BSED', 'English', 4),
(4, 'BSIT', 'NA', 4),
(5, 'BSED', 'MATH', 4);

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
('20211', 102101, 'Registrar', 'Admin', 'Admin', 'Admin', 'male', 'admin@gmail.com', 'San Roque, San Jacinto, Pangasinan', '09307078204', 'November 1,2021', 'November 1, 2021, 8:08 pm');

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
('FT-001', 3, 2018301301, 'Michael Estrecho Isla', '2021-2022', '2', 10000, 1250, 'Online', 'Paymaya', 'Paymaya-receipt-sample.jpg', 3000, '2021-10-29', 'Approved', 'Not Fully Paid', 2021000003, 'Michael Isla'),
('FT-003', 1, 2018301302, 'Mike Isla', '2021-2022', '2', 10000, 5000, 'Online', 'Paymaya', 'Pay.png', 5000, '2021-10-30', 'Approved', 'Not Fully Paid', 2021000003, 'Michael Isla'),
('FT-004', 1, 2018301302, 'Mike Isla', '2021-2022', '2', 10000, 5000, 'Cash', '', '', 0, '2021-10-30', 'Approved', 'Fully Paid', 2021000003, 'Michael Isla'),
('FT-005', 1, 2018301301, 'Michael Estrecho Isla', '2021-2022', '2', 10000, 4250, 'Cash', '', '', 0, '2021-10-31', 'Approved', 'Fully Paid', 2021000003, 'Michael Isla'),
('FT-006', 1, 2018301301, 'Michael Estrecho Isla', '2021-2022', '2', 10000, 4250, 'Cash', '', '', 0, '2021-10-31', 'Approved', 'Fully Paid', 2021000003, 'Michael Isla'),
('FT-007', 4, 2018301301, 'Michael Estrecho Isla', '2021-2022', '1', 8000, 400, 'Online', 'Paymaya', 'Pay.png', 2600, '2021-10-31', 'Approved', 'Not Fully Paid', 2021000003, 'Michael Isla'),
('FT-008', 4, 2018301301, 'Michael Estrecho Isla', '2021-2022', '1', 8000, 500, 'Cash', '', '', 2900, '2021-10-31', 'Approved', 'Not Fully Paid', 2021000003, 'Michael Isla'),
('FT-009', 4, 2018301301, 'Michael Estrecho Isla', '2021-2022', '1', 8000, 900, 'Cash', '', '', 2000, '2021-10-31', 'Approved', 'Not Fully Paid', 2021000003, 'Michael Isla'),
('FT-010', 4, 2018301301, 'Michael Estrecho Isla', '2021-2022', '1', 8000, 2000, 'Cash', '', '', 0, '2021-10-31', 'Approved', 'Fully Paid', 2021000003, 'Michael Isla'),
('FT-011', 1, 2018301276, 'Denver Pulido', '2020-2021', '2', 10000, 3000, 'Cash', '', '', 2000, '2021-10-31', 'Approved', 'Not Fully Paid', 2021000003, 'Michael Isla'),
('FT-012', 1, 2018301276, 'Denver Pulido', '2020-2021', '2', 10000, 1000, 'Online', 'Paymaya', 'Pay.png', 1000, '2021-10-31', 'Approved', 'Not Fully Paid', 2021000003, 'Michael Isla'),
('FT-013', 1, 2018301276, 'Denver Pulido', '2020-2021', '2', 10000, 10000, 'Online', 'Paymaya', 'Paymaya-receipt-sample.jpg', 0, '2021-10-31', 'Approved', 'Fully Paid', 2021000003, 'Michael Isla'),
('FT-014', 4, 2018301301, 'Michael Estrecho Isla', '2021-2022', '1', 8000, 400, 'Cash', '', '', 3000, '2021-11-01', 'Approved', 'Not Fully Paid', 2021000003, 'Michael Isla'),
('FT-015', 4, 2018301301, 'Michael Estrecho Isla', '2021-2022', '1', 8000, 3000, 'Online', 'Paymaya', 'Pay.png', 0, '2021-11-01', 'Approved', 'Fully Paid', 2021000003, 'Michael Isla'),
('FT-016', 4, 2018301301, 'Michael Estrecho Isla', '2021-2022', '1', 8000, 2500, 'Online', 'Gcash', 'Paymaya-receipt-sample.jpg', 900, '2021-11-01', 'Approved', 'Not Fully Paid', 2021000003, 'Michael Isla'),
('FT-017', 4, 2018301301, 'Michael Estrecho Isla', '2021-2022', '1', 8000, 900, 'Cash', '', '', 0, '2021-11-01', 'Approved', 'Fully Paid', 2021000003, 'Michael Isla'),
('FT-018', 4, 2018301301, 'Michael Estrecho Isla', '2021-2022', '1', 8000, 400, 'Cash', '', '', 3000, '2021-11-01', 'Approved', 'Not Fully Paid', 2021000003, 'Michael Isla'),
('FT-019', 4, 2018301301, 'Michael Estrecho Isla', '2021-2022', '1', 8000, 1000, 'Cash', '', '', 2000, '2021-11-01', 'Approved', 'Not Fully Paid', 2021000003, 'Michael Isla'),
('FT-020', 4, 2018301301, 'Michael Estrecho Isla', '2021-2022', '1', 8000, 1000, 'Online', 'Paymaya', 'Paymaya-receipt-sample.jpg', 500, '2021-11-01', 'Approved', 'Not Fully Paid', 2021000003, 'Michael Isla'),
('FT-021', 4, 2018301301, 'Michael Estrecho Isla', '2021-2022', '1', 8000, 500, 'Online', 'Paymaya', 'Pay.png', 1500, '2021-11-01', 'Approved', 'Not Fully Paid', 2021000003, 'Michael Isla'),
('FT-022', 4, 2018301301, 'Michael Estrecho Isla', '2021-2022', '1', 8000, 500, 'Cash', '', '', 0, '2021-11-01', 'Approved', 'Fully Paid', 2021000003, 'Michael Isla'),
('FT-023', 4, 2018301301, 'Michael Estrecho Isla', '2021-2022', '1', 8000, 400, 'Cash', '', '', 3000, '2021-11-01', 'Approved', 'Not Fully Paid', 2021000003, 'Michael Isla'),
('FT-024', 4, 2018301301, 'Michael Estrecho Isla', '2021-2022', '1', 8000, 600, 'Cash', '', '', 2000, '2021-11-01', 'Approved', 'Not Fully Paid', 2021000003, 'Michael Isla');

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
  `total_amount_paid` int(11) NOT NULL,
  `balance` int(11) NOT NULL,
  `remarks` varchar(100) NOT NULL
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
  `address` longtext NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_number` varchar(12) NOT NULL,
  `joined_date` varchar(100) NOT NULL DEFAULT 'N/A',
  `registrar_id` int(11) NOT NULL,
  `registrar_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
