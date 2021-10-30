-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2021 at 06:31 AM
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
(102921, 'Mery Anne Villano', 'villano@gmail.com', 'Villano-01', 'Registrar', '', ''),
(2018301301, 'Michael Isla', 'isla.michael.estrecho@gmail.com', 'Mike@1301', 'Student', '', ''),
(2018301302, 'Mike Isla', 'michael.estrechoisla@gmail.com', 'Mike@1301', 'Student', '', ''),
(2021000001, 'Justine Dave Delos Reyes', 'administrator@gmail.com', 'Admin-01', 'Admin', '', ''),
(2021000002, 'Mery Anne Villano', 'registrar@gmail.com', 'Registrar-01', 'Registrar', '', ''),
(2021000003, 'Michael Isla', 'cashier01@gmail.com', 'Cashier-01', 'Cashier', '', ''),
(2021000004, 'Donna Belle Pulido', 'cashier02@gmail.com', 'Cashier-02', 'Cashier', '', '');

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
(2, '2', '4', 100000),
(3, '1', '4', 10000);

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
(3, 'BSED', 'English', 4);

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
('2021113', 102921, 'Registrar', 'Mery Anne', 'Villano', 'E', 'female', 'villano@gmail.com', 'San Roque, San Jacinto, Pangasinan', '09307078204', '2021-10-30', 'October 29, 2021, 3:37 pm'),
('', 102922, 'Registrar', 'Juan', 'Cruz', 'D', 'N/A', '', '', '', '2021-10-27', ''),
('20211', 2021000002, 'Registrar', 'Mery Ane', 'Villano', 'C', 'female', 'registrar@gmail.com', 'Calingcuan Tarlac City, Tarlac', '09123456789', '2021-10-30', 'October 26, 2021, 12:00 am'),
('202112', 2021000003, 'Cashier', 'Michael', 'Isla', 'Estrecho', 'male', 'cashier01@gmail.com', 'Tarlac City, Tarlac', '09456123789', '2021-10-26', 'October 26, 2021, 12:13 am'),
('2021113', 2021000004, 'Cashier', 'Donna Belle', 'Pulido', 'Guieb', 'female', 'cashier02@gmail.com', 'Maliwalo Tarlac City, Tarlac', '09363612242', '2021-10-19', 'October 28, 2021, 9:05 am');

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
('FT-004', 1, 2018301302, 'Mike Isla', '2021-2022', '2', 10000, 5000, 'Cash', '', '', 0, '2021-10-30', 'Approved', 'Fully Paid', 2021000003, 'Michael Isla');

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

--
-- Dumping data for table `tbl_pending_payments`
--

INSERT INTO `tbl_pending_payments` (`transaction_no`, `stud_id`, `fullname`, `email`, `amount`, `payment_gateway`, `sales_invoice`, `transaction_date`, `status`, `reasonToDeny`) VALUES
('FT-002', 2018301301, 'Michael Isla', 'isla.michael.estrecho@gmail.com', 5000, 'Paymaya', '', '2021-10-30', 'Denied', 'Amount not match');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reports`
--

CREATE TABLE `tbl_reports` (
  `cashier_id` int(100) NOT NULL,
  `cashier_name` varchar(255) NOT NULL,
  `cash_payment` int(100) NOT NULL,
  `fund_transfer` int(100) NOT NULL,
  `variance` int(100) NOT NULL,
  `total_transaction_count` int(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_reports`
--

INSERT INTO `tbl_reports` (`cashier_id`, `cashier_name`, `cash_payment`, `fund_transfer`, `variance`, `total_transaction_count`, `date`) VALUES
(2021000003, 'Michael Isla', 60000, 50000, 60000, 4, '2021-10-28'),
(2021000004, 'Donna Belle Guieb Pulido', 50000, 40000, 50000, 4, '2021-10-27'),
(2021000003, 'Michael Isla', 5000, 3000, -4000, 2, '2021-10-29'),
(2021000003, 'Michael Isla', 5000, 3000, -4000, 2, '2021-10-29');

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
('Full', 'Athelete');

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

--
-- Dumping data for table `tbl_student_fees`
--

INSERT INTO `tbl_student_fees` (`program_id`, `stud_id`, `fullname`, `csi_year_level`, `scholar_desc`, `scholar_type`, `discount_type`, `tuition_fee`, `total_amount_paid`, `balance`, `remarks`) VALUES
(1, 2018301301, 'Michael Isla', '4', 'N/A', 'N/A', 'N/A', 10000, 0, 10000, 'Not Fully Paid'),
(1, 2018301302, 'Mike Isla', '4', 'N/A', 'N/A', 'N/A', 10000, 10000, 0, 'Fully Paid');

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
('20211', 2018301301, 'Michael', 'Isla', 'Estrecho', 'male', 'San Roque, San Jacinto, Pangasinan', 'isla.michael.estrecho@gmail.com', '09307078204', 'October 30, 2021, 12:04 pm', 2021000002, 'Mery Anne Villano'),
('202112', 2018301302, 'Mike', 'Isla', 'Estrecho', 'male', 'San Roque, San Jacinto, Pangasinan', 'michael.estrechoisla@gmail.com', '09307078204', 'October 30, 2021, 12:24 pm', 2021000002, 'Mery Anne Villano');

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
(2018301302, '✓', '✓', '✓', '✓');

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
(2018301301, '12345', 'old', '2021-2022', '2', 'BSIT', 'WMA', '4'),
(2018301302, '12345', 'old', '2021-2022', '2', 'BSIT', 'WMA', '4');

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
