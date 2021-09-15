-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2021 at 07:32 AM
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
-- Database: `web-based billing management system`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_accounts`
--

CREATE TABLE `tbl_accounts` (
  `Account_ID` int(100) NOT NULL,
  `Fullname` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee_info`
--

CREATE TABLE `tbl_employee_info` (
  `Employee_ID` int(100) NOT NULL,
  `Role` varchar(100) NOT NULL,
  `Firstname` varchar(100) NOT NULL,
  `Lastname` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Sex` varchar(100) NOT NULL,
  `Birth_Date` date NOT NULL,
  `Mobile_Number` int(100) NOT NULL,
  `Civil_Status` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee_registration`
--

CREATE TABLE `tbl_employee_registration` (
  `Employee_ID` int(100) NOT NULL,
  `Role` varchar(100) NOT NULL,
  `Firstname` varchar(100) NOT NULL,
  `Lastname` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Sex` varchar(100) NOT NULL,
  `Birth_Date` date NOT NULL,
  `Mobile_Number` int(100) NOT NULL,
  `Civil_Status` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `Fullname` varchar(100) NOT NULL,
  `Student_Number` int(100) NOT NULL,
  `College` varchar(100) NOT NULL,
  `Major` varchar(100) NOT NULL,
  `Year&Section` varchar(100) NOT NULL,
  `Sex` varchar(100) NOT NULL,
  `Birth_Date` date NOT NULL,
  `Mobile_Number` int(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `College_Type` varchar(100) NOT NULL,
  `PSI_College_Name` varchar(100) NOT NULL,
  `PSI_College_Address` varchar(100) NOT NULL,
  `PSI_Zip_Code` int(100) NOT NULL,
  `PSI_School_Year` date NOT NULL,
  `PSI_Semester` varchar(100) NOT NULL,
  `PSI_Scholarship` varchar(100) NOT NULL,
  `PSI_Program` varchar(100) NOT NULL,
  `PSI_Major` varchar(100) NOT NULL,
  `PSI_Year&Section` varchar(100) NOT NULL,
  `CSI_College_Name` varchar(100) NOT NULL,
  `CSI_College_Address` varchar(100) NOT NULL,
  `CSI_Zip_Code` int(100) NOT NULL,
  `CSI_School_Year` date NOT NULL,
  `CSI_Semester` varchar(100) NOT NULL,
  `CSI_Scholarship` varchar(100) NOT NULL,
  `CSI_Program` varchar(100) NOT NULL,
  `CSI_Major` varchar(100) NOT NULL,
  `CSI_Year&Section` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student_registration`
--

CREATE TABLE `tbl_student_registration` (
  `Fullname` varchar(100) NOT NULL,
  `Student_Number` int(100) NOT NULL,
  `College` varchar(100) NOT NULL,
  `Major` varchar(100) NOT NULL,
  `Year&Section` varchar(100) NOT NULL,
  `Sex` varchar(100) NOT NULL,
  `Birth_Date` date NOT NULL,
  `Mobile_Number` int(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Form_137` varchar(100) NOT NULL,
  `Form_138` varchar(100) NOT NULL,
  `PSA_Certificate` varchar(100) NOT NULL,
  `Good_Moral` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
