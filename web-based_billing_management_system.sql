-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2021 at 07:13 AM
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
-- Database: `web-based_billing_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_accounts`
--

CREATE TABLE `tbl_accounts` (
  `user_id` int(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_accounts`
--

INSERT INTO `tbl_accounts` (`user_id`, `fullname`, `email`, `password`, `role`) VALUES
(10121314, 'Marry Villano', 'villano@gmail.com', 'villano', 'Cashier'),
(2018301301, 'Michael Isla', 'isla.michael.estrecho@gmail.com', 'mike', 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee_info`
--

CREATE TABLE `tbl_employee_info` (
  `employee_id` int(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `midInitial` varchar(50) NOT NULL,
  `citizenship` varchar(100) NOT NULL,
  `civil_status` varchar(100) NOT NULL,
  `phoneNo` int(50) NOT NULL,
  `sex` varchar(20) NOT NULL,
  `birthdate` varchar(100) NOT NULL,
  `age` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_employee_info`
--

INSERT INTO `tbl_employee_info` (`employee_id`, `role`, `firstname`, `lastname`, `midInitial`, `citizenship`, `civil_status`, `phoneNo`, `sex`, `birthdate`, `age`) VALUES
(10121314, 'Cashier', 'Marry', 'Villano', 'V', 'Filipino', 'Single', 2147483647, 'female', '2021-09-20', 21);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee_registration`
--

CREATE TABLE `tbl_employee_registration` (
  `emp_id` int(50) NOT NULL,
  `emp_role` varchar(100) NOT NULL,
  `emp_firstname` varchar(100) NOT NULL,
  `emp_lastname` varchar(100) NOT NULL,
  `emp_midInitial` varchar(10) NOT NULL,
  `emp_email` varchar(100) NOT NULL,
  `emp_sex` varchar(100) NOT NULL,
  `emp_birth_date` varchar(100) NOT NULL,
  `emp_civil_status` varchar(100) NOT NULL,
  `emp_address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_employee_registration`
--

INSERT INTO `tbl_employee_registration` (`emp_id`, `emp_role`, `emp_firstname`, `emp_lastname`, `emp_midInitial`, `emp_email`, `emp_sex`, `emp_birth_date`, `emp_civil_status`, `emp_address`) VALUES
(10121314, 'Cashier', 'Marry', 'Villano', 'V', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reset_password`
--

CREATE TABLE `tbl_reset_password` (
  `Email` varchar(100) NOT NULL,
  `Otp` int(6) NOT NULL,
  `Otp_Expiration` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student_fee`
--

CREATE TABLE `tbl_student_fee` (
  `Fee_ID` int(11) NOT NULL,
  `Student_ID` int(11) NOT NULL,
  `Section` int(11) NOT NULL,
  `Student_Name` int(11) NOT NULL,
  `Tuition_Fee` int(11) NOT NULL,
  `Total_Payment` int(11) NOT NULL,
  `Balance` int(11) NOT NULL,
  `Payment_Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student_info`
--

CREATE TABLE `tbl_student_info` (
  `stud_id` int(11) NOT NULL,
  `stud_firstname` varchar(100) NOT NULL,
  `stud_lastname` varchar(100) NOT NULL,
  `stud_midInitial` varchar(10) NOT NULL,
  `stud_citizenship` varchar(100) NOT NULL,
  `stud_civilStatus` varchar(100) NOT NULL,
  `stud_phoneNo` int(11) NOT NULL,
  `stud_sex` varchar(50) NOT NULL,
  `stud_birthdate` varchar(100) NOT NULL,
  `stud_age` int(100) NOT NULL,
  `prev_collegeType` varchar(100) NOT NULL,
  `prev_collegeName` varchar(255) NOT NULL,
  `prev_collegeAddress` varchar(255) NOT NULL,
  `prev_zipCode` varchar(100) NOT NULL,
  `prev_schoolYear` varchar(100) NOT NULL,
  `prev_semester` varchar(100) NOT NULL,
  `prev_scholarship` varchar(100) NOT NULL,
  `prev_course` varchar(100) NOT NULL,
  `prev_major` varchar(255) NOT NULL,
  `prev_year` varchar(100) NOT NULL,
  `curr_schoolYear` varchar(100) NOT NULL,
  `curr_semester` varchar(100) NOT NULL,
  `curr_scholarship` varchar(100) NOT NULL,
  `curr_course` varchar(100) NOT NULL,
  `curr_major` varchar(100) NOT NULL,
  `curr_year` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_student_info`
--

INSERT INTO `tbl_student_info` (`stud_id`, `stud_firstname`, `stud_lastname`, `stud_midInitial`, `stud_citizenship`, `stud_civilStatus`, `stud_phoneNo`, `stud_sex`, `stud_birthdate`, `stud_age`, `prev_collegeType`, `prev_collegeName`, `prev_collegeAddress`, `prev_zipCode`, `prev_schoolYear`, `prev_semester`, `prev_scholarship`, `prev_course`, `prev_major`, `prev_year`, `curr_schoolYear`, `curr_semester`, `curr_scholarship`, `curr_course`, `curr_major`, `curr_year`) VALUES
(2018301301, 'Michael', 'Isla', 'E', 'Filipino', 'Single', 2147483647, 'male', '1999-09-15', 22, 'public', 'TSU', 'San Isidro', '12345', '2019-2020', 'Final', 'Full', 'BSIT', 'Web and Mobile Application', '3rd Year', 'Full', 'Midterm', 'Full', 'BSIT', 'Web and Mobile Application', '4th Year');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student_registration`
--

CREATE TABLE `tbl_student_registration` (
  `stud_id` int(50) NOT NULL,
  `stud_firstname` varchar(100) NOT NULL,
  `stud_lastname` varchar(100) NOT NULL,
  `stud_midInitial` varchar(10) NOT NULL,
  `college` varchar(100) NOT NULL,
  `major` varchar(100) NOT NULL,
  `yr&sec` varchar(100) NOT NULL,
  `sex` varchar(50) NOT NULL,
  `birth_date` varchar(100) NOT NULL,
  `mobile_no` int(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `form_137` varchar(100) NOT NULL,
  `form_138` varchar(100) NOT NULL,
  `psa_certificate` varchar(100) NOT NULL,
  `goo_moral` varchar(100) NOT NULL,
  `role` varchar(50) NOT NULL DEFAULT 'STUDENT'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_student_registration`
--

INSERT INTO `tbl_student_registration` (`stud_id`, `stud_firstname`, `stud_lastname`, `stud_midInitial`, `college`, `major`, `yr&sec`, `sex`, `birth_date`, `mobile_no`, `email`, `address`, `form_137`, `form_138`, `psa_certificate`, `goo_moral`, `role`) VALUES
(2018301301, 'Michael', 'Isla', 'E', '', '', '', '', '', 0, '', '', '', '', '', '', 'STUDENT'),
(2018301302, 'Mike', 'Camagay', '', '', '', '', '', '', 0, '', '', '', '', '', '', 'STUDENT');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaction`
--

CREATE TABLE `tbl_transaction` (
  `Transaction_ID` int(11) NOT NULL,
  `Student_Name` int(11) NOT NULL,
  `Payment_Method` int(11) NOT NULL,
  `Amount_Paid` int(11) NOT NULL,
  `Completion_Date` int(11) NOT NULL,
  `Payment_Status` int(11) NOT NULL,
  `Balance` int(11) NOT NULL,
  `Cashier_ID` int(11) NOT NULL,
  `Cashier_Name` int(11) NOT NULL
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
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `tbl_employee_registration`
--
ALTER TABLE `tbl_employee_registration`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `tbl_student_info`
--
ALTER TABLE `tbl_student_info`
  ADD PRIMARY KEY (`stud_id`);

--
-- Indexes for table `tbl_student_registration`
--
ALTER TABLE `tbl_student_registration`
  ADD PRIMARY KEY (`stud_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
