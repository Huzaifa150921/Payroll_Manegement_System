-- phpMyAdmin SQL Dump
-- version 4.7.1
-- https://www.phpmyadmin.net/
--
-- Host: sql9.freesqldatabase.com
-- Generation Time: Aug 30, 2023 at 03:41 AM
-- Server version: 5.5.62-0ubuntu0.14.04.1
-- PHP Version: 7.0.33-0ubuntu0.16.04.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sql9642460`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `Admin_Name` varchar(20) NOT NULL,
  `admin_password` varchar(30) NOT NULL,
  `profile_picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `Admin_Name`, `admin_password`, `profile_picture`) VALUES
(1, 'Huzaifa Ahmad', 'Huzaifa 1234', '../Images/pic.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `advance_salary_requests`
--

CREATE TABLE `advance_salary_requests` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `admin_response` varchar(50) NOT NULL,
  `request_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advance_salary_requests`
--

INSERT INTO `advance_salary_requests` (`id`, `employee_id`, `amount`, `admin_response`, `request_date`) VALUES
(1, 13, '20000.00', 'Pending', '2023-08-30 02:57:16'),
(2, 13, '1000.00', 'Pending', '2023-08-30 03:31:10');

-- --------------------------------------------------------

--
-- Table structure for table `allowances`
--

CREATE TABLE `allowances` (
  `Employee` int(11) NOT NULL,
  `Type_of_Allowances` varchar(20) NOT NULL,
  `Amount_of_Allowance` int(11) NOT NULL,
  `Admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `allowances`
--

INSERT INTO `allowances` (`Employee`, `Type_of_Allowances`, `Amount_of_Allowance`, `Admin`) VALUES
(2, 'Rental Allowance', 20000, 1),
(12, 'Rental Allowance', 20000, 1),
(12, 'Travel Allowance', 30000, 1),
(12, 'Medical Allowance', 10000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `A_id` int(11) NOT NULL,
  `Total_Present` int(11) NOT NULL,
  `Total_Absents` int(11) NOT NULL,
  `Total_Percentage` float NOT NULL,
  `Attendance_Date` date NOT NULL,
  `Time_in` time NOT NULL,
  `Time_out` time NOT NULL,
  `Employee` int(11) NOT NULL,
  `Salary` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`A_id`, `Total_Present`, `Total_Absents`, `Total_Percentage`, `Attendance_Date`, `Time_in`, `Time_out`, `Employee`, `Salary`) VALUES
(1, 23, 12, 60.7143, '2023-08-23', '04:29:00', '04:28:00', 2, 13),
(2, 23, 13343, 60, '2023-08-08', '04:39:00', '05:34:00', 7, 17),
(3, 12, 23, 0, '2023-08-02', '06:35:00', '06:38:00', 8, 18),
(4, 21, 3, 0, '2023-08-03', '02:18:00', '02:20:00', 8, 18),
(6, 23, 12, 60.7143, '2023-09-20', '16:31:00', '04:30:00', 2, 13),
(7, 60, 12, 83.3333, '2023-08-02', '21:18:00', '21:18:00', 12, 20);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(11) NOT NULL,
  `emp_name` varchar(20) NOT NULL,
  `emp_pass` varchar(500) DEFAULT NULL,
  `emp_dob` date DEFAULT NULL,
  `emp_address` varchar(40) DEFAULT NULL,
  `emp_department` varchar(15) NOT NULL,
  `emp_designation` varchar(15) NOT NULL,
  `emp_joinDate` date NOT NULL,
  `Admin` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `emp_name`, `emp_pass`, `emp_dob`, `emp_address`, `emp_department`, `emp_designation`, `emp_joinDate`, `Admin`) VALUES
(2, 'Huzaifa', 'HK123', '2023-08-17', 'Lahore', 'CS', 'Ethical Hacker', '2023-08-03', 1),
(4, 'huaifa', '', '2023-09-06', 'street no 13', 'A', 'jiujyjgj', '2023-08-09', 1),
(6, 'Shery', '', '2023-08-01', 'Kamoki', 'CS', 'Web dvolper', '2023-08-02', 1),
(7, 'Ali', '', '2023-08-30', 'Lahore', 'iT', 'Web dvolper', '2023-08-02', 1),
(8, 'Shery', '', '2023-09-05', 'street no 13', 'CS', 'Web dvolper', '2023-08-10', 1),
(9, 'de', '', '2023-09-07', 'Kamoki', 'CS', 'Web dvolper', '2023-08-03', 1),
(10, 'Huzaifa', '12323', '2023-08-22', '23', 'A', 'jiujyjgj', '2023-08-03', 1),
(11, 'Huzaifa', '12323', '2023-08-22', '23', 'A', 'jiujyjgj', '2023-08-03', 1),
(12, 'hamza', 'shani786', '2023-08-03', 'shahid street gali no 1', 'cs', 'sssdffd', '2023-08-01', 1),
(13, 'Shahzaib Niaz', 'Shazia', '2023-08-23', 'Kasmir Calony 2', 'Cyber Expert', 'Ethical Hacker', '2023-08-02', 1),
(14, 'Huzaifa', 'Huzaifa1232', '2023-09-07', 'Kasmir Calony 2', 'kj', 'Ethical Hacker', '2023-08-17', 1),
(15, 'Huzaifa', 'Huzaifa', '2023-09-07', 'Kasmir Calony 2', 'kj', 'Ethical Hacker', '2023-08-17', 1),
(16, 'Huzaifa', 'Huzaifa', '2023-09-08', 'street no 13', 'kjkjkk', 'Senior', '2023-09-08', 1),
(17, 'Huzaifa', 'huj', '2023-09-08', 'street no 13', 'kjkjkk', 'Senior', '2023-09-08', 1),
(18, 'Huzaia', 'fr', '2023-09-02', 'street no 13', 'CS', 'Web dvolper', '2023-09-08', 1),
(19, 'Huzaifa', '232', '2023-08-18', 'Kamoki', 'kj', 'ds', '2023-08-30', 1),
(20, 'Huzaifa', 'Huzaifa', '2023-08-18', 'Kamoki', 'kj', 'ds', '2023-08-30', 1),
(21, 'Huzaifa', 'k', '2023-08-18', 'Kamoki', 'kj', 'ds', '2023-08-30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `L_id` int(11) NOT NULL,
  `Type` varchar(20) NOT NULL,
  `No_Of_Leave` int(11) NOT NULL,
  `Attendance` int(11) NOT NULL,
  `Employee` int(11) NOT NULL,
  `date_of_leave` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`L_id`, `Type`, `No_Of_Leave`, `Attendance`, `Employee`, `date_of_leave`) VALUES
(1, 'Fever', 2, 3, 8, '2023-08-03'),
(2, 'jkj', 12, 1, 2, '2023-08-15'),
(3, 'Flu', 12, 1, 2, '2023-09-01'),
(4, 'Sick', 123, 3, 8, '2023-08-11');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pay_id` int(11) NOT NULL,
  `Total_salary` int(11) NOT NULL,
  `Account` int(12) NOT NULL,
  `pay_date` date NOT NULL,
  `pay_time` time NOT NULL,
  `Employee` int(11) NOT NULL,
  `Salary` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pay_id`, `Total_salary`, `Account`, `pay_date`, `pay_time`, `Employee`, `Salary`) VALUES
(1, 0, 23432, '2023-08-29', '03:24:00', 13, 19),
(2, 0, 123456, '2023-09-06', '03:25:00', 2, 13),
(3, 0, 12938373, '2023-08-21', '05:26:00', 12, 20);

-- --------------------------------------------------------

--
-- Table structure for table `phone`
--

CREATE TABLE `phone` (
  `Employee` int(11) NOT NULL,
  `phone_no` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `phone`
--

INSERT INTO `phone` (`Employee`, `phone_no`) VALUES
(8, 0),
(9, 0),
(10, 0),
(11, 0),
(2, 314),
(4, 2147483647),
(6, 2147483647),
(7, 2147483647),
(8, 3434),
(9, 2147483647),
(10, 2147483647),
(11, 2147483647),
(12, 2147483647),
(13, 314),
(14, 314),
(15, 314),
(16, 342),
(17, 342),
(18, 342),
(19, 314),
(20, 314),
(21, 314);

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `s_id` int(11) NOT NULL,
  `date_of_issuance` date DEFAULT NULL,
  `basic_salary` int(11) NOT NULL,
  `taxes` float DEFAULT '0',
  `bonus` float DEFAULT '0',
  `Advance_salery` int(11) DEFAULT '0',
  `deduction` int(11) DEFAULT '0',
  `loan` int(11) DEFAULT '0',
  `Employee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`s_id`, `date_of_issuance`, `basic_salary`, `taxes`, `bonus`, `Advance_salery`, `deduction`, `loan`, `Employee`) VALUES
(13, '2023-08-02', 10000, 23, 10, 0, 8985, 2, 2),
(14, '2023-08-30', 340000, 34, 68, 5, 12, 12, 4),
(17, '2023-08-30', 20000, 23, 2, 2000, 200000, 1, 7),
(18, '2023-08-01', 2000, 2, 34, 0, 0, 10, 8),
(19, '2023-08-02', 12000, 34, 29, 0, 0, 2, 13),
(20, '2023-09-07', 200000, 30, 20, 0, 0, 20, 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `advance_salary_requests`
--
ALTER TABLE `advance_salary_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `allowances`
--
ALTER TABLE `allowances`
  ADD KEY `Admin` (`Admin`),
  ADD KEY `Employee` (`Employee`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`A_id`),
  ADD KEY `Employee` (`Employee`),
  ADD KEY `Salary` (`Salary`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`),
  ADD KEY `fk_employee_admin` (`Admin`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`L_id`),
  ADD KEY `Attendance` (`Attendance`),
  ADD KEY `Employee` (`Employee`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pay_id`),
  ADD KEY `fk_employee_payment` (`Employee`),
  ADD KEY `fk_salary_payment` (`Salary`);

--
-- Indexes for table `phone`
--
ALTER TABLE `phone`
  ADD KEY `fk_phone_employee` (`phone_no`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`s_id`),
  ADD KEY `Employee` (`Employee`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `advance_salary_requests`
--
ALTER TABLE `advance_salary_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `A_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `L_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `allowances`
--
ALTER TABLE `allowances`
  ADD CONSTRAINT `allowances_ibfk_1` FOREIGN KEY (`Admin`) REFERENCES `admin` (`admin_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `allowances_ibfk_2` FOREIGN KEY (`Employee`) REFERENCES `employee` (`emp_id`) ON DELETE CASCADE;

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`Employee`) REFERENCES `employee` (`emp_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `attendance_ibfk_2` FOREIGN KEY (`Salary`) REFERENCES `salary` (`s_id`) ON DELETE CASCADE;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `fk_employee_admin` FOREIGN KEY (`Admin`) REFERENCES `admin` (`admin_id`);

--
-- Constraints for table `leaves`
--
ALTER TABLE `leaves`
  ADD CONSTRAINT `leaves_ibfk_1` FOREIGN KEY (`Attendance`) REFERENCES `attendance` (`A_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `leaves_ibfk_2` FOREIGN KEY (`Employee`) REFERENCES `employee` (`emp_id`) ON DELETE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `fk_employee_payment` FOREIGN KEY (`Employee`) REFERENCES `employee` (`emp_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_salary_payment` FOREIGN KEY (`Salary`) REFERENCES `salary` (`s_id`) ON DELETE CASCADE;

--
-- Constraints for table `salary`
--
ALTER TABLE `salary`
  ADD CONSTRAINT `salary_ibfk_1` FOREIGN KEY (`Employee`) REFERENCES `employee` (`emp_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
