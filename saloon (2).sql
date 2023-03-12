-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2022 at 10:16 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saloon`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appoint_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `slot_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `payment_method` varchar(20) NOT NULL,
  `total_price` double NOT NULL,
  `status` varchar(20) NOT NULL,
  `appoint_date` date NOT NULL,
  `remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `branch_id` int(11) NOT NULL,
  `branch_name` varchar(50) NOT NULL,
  `address` varchar(250) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `country` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branch_id`, `branch_name`, `address`, `city`, `state`, `country`) VALUES
(1, 'abc_knl', '1/1 ,Opp SBI', 'Kurnool', 'Andhra pradesh', 'India'),
(2, 'abc_hyd', 'a/106 , lbnagar', 'Hyderabad', 'Telangana', 'India'),
(3, 'abc_atp', '3-a-114 , old town', 'Anantapur', 'Andhra pradesh', 'India'),
(4, 'abc_blore', '10/65 ,majestic road', 'banglore', 'karnataka', 'india');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(11) NOT NULL,
  `cust_name` varchar(50) NOT NULL,
  `cust_phno` bigint(12) NOT NULL,
  `cust_email` varchar(100) NOT NULL,
  `cust_gender` varchar(5) NOT NULL,
  `cust_branch` int(11) NOT NULL,
  `cust_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `cust_name`, `cust_phno`, `cust_email`, `cust_gender`, `cust_branch`, `cust_status`) VALUES
(26, 'venkatesh', 1234567890, 'venky@gmail.com', 'm', 3, 'New'),
(27, 'srinivas', 5555556666, 'srinivas@gmail.com', 'm', 3, 'New'),
(28, 'Baba Hussain', 6303573956, 'babahussainshaik85@gmail.com', 'm', 3, 'New'),
(29, 'harshitha', 9999888822, 'harshu@gmail.com', 'f', 3, 'deleted'),
(30, 'Revanth', 9876543244, 'rev@gmail.com', 'm', 3, 'New'),
(31, 'rambabu', 9392352802, 'sm8173119@gmail.com', 'm', 3, 'New');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(11) NOT NULL,
  `emp_name` varchar(50) NOT NULL,
  `role_id` int(11) NOT NULL,
  `emp_phno` bigint(20) NOT NULL,
  `emp_email` varchar(50) NOT NULL,
  `emp_salary` double NOT NULL,
  `branch_id` int(11) NOT NULL,
  `emp_status` varchar(20) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `emp_name`, `role_id`, `emp_phno`, `emp_email`, `emp_salary`, `branch_id`, `emp_status`, `password`) VALUES
(2, 'Johnny Depp', 2, 9876543210, 'John@abcsaloon.com', 25000, 3, 'active', '$2y$10$L7azwhGiY6f0LIS7A0G1XOvKy2YKh0YKGd1S4ivMzwqZ.X/w3wVG2'),
(3, 'Bharani King', 2, 9886543210, 'barini@abcsaloon.com', 25000, 1, 'active', '$2y$10$L7azwhGiY6f0LIS7A0G1XOvKy2YKh0YKGd1S4ivMzwqZ.X/w3wVG2');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `appoint_id` int(11) NOT NULL,
  `feedback_title` varchar(50) NOT NULL,
  `feedback_description` varchar(500) NOT NULL,
  `rating` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `appoint_id` int(11) NOT NULL,
  `trans_id` varchar(20) NOT NULL,
  `trans_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `trans_amt` double NOT NULL,
  `trans_mode` text NOT NULL,
  `trans_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`appoint_id`, `trans_id`, `trans_date`, `trans_amt`, `trans_mode`, `trans_status`) VALUES
(2, 'abjfjkbjkb183', '2022-06-05 06:42:36', 4822, '', 'success'),
(13, 'dbubbd2445', '2022-06-07 06:38:17', 1500, '', 'success'),
(99, 'dsfnjndjksffad', '2022-06-11 05:50:19', 8647, '', 'success'),
(98, 'fdsffdddvv', '2022-06-10 05:50:19', 1578, '', 'success'),
(154, 'fjnjfbj37843n', '2022-06-06 06:42:36', 580, '', 'success'),
(46, 'jdbfj2392849b', '2022-06-03 06:43:32', 1546, '', 'success'),
(109, 'jdn2389ngg', '2022-06-04 06:43:32', 27, '', 'success'),
(10, 'nfncnice8924n', '2022-06-09 06:37:32', 500, '', 'success'),
(10, 'nfncnicewfiib1329892', '2022-06-09 06:37:16', 500, '', 'success'),
(54, 'nfncnicewfiidwd23132', '2022-06-08 06:38:17', 500, '', 'success');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'Super Admin'),
(2, 'Receptionist');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `service_id` int(11) NOT NULL,
  `service_name` varchar(30) NOT NULL,
  `service_cost` double NOT NULL,
  `branch_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`service_id`, `service_name`, `service_cost`, `branch_id`) VALUES
(1, 'Hair Style', 150, 3),
(2, 'Hair Style', 250, 2),
(3, 'Hair Style', 250, 4),
(4, 'Hair Style', 200, 1),
(5, 'Hair Cut', 250, 1),
(6, 'Hair Cut', 250, 2),
(7, 'Hair cut', 200, 3),
(8, 'Hair cut', 250, 4),
(9, 'Facial', 850, 1),
(10, 'Facial', 1000, 2),
(11, 'Facial', 800, 3),
(12, 'Facial', 1000, 4),
(13, 'Manicure', 200, 2),
(14, 'Manicure', 200, 4);

-- --------------------------------------------------------

--
-- Table structure for table `slot`
--

CREATE TABLE `slot` (
  `slot_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `slot_time` varchar(20) NOT NULL,
  `no_of_slots` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slot`
--

INSERT INTO `slot` (`slot_id`, `branch_id`, `slot_time`, `no_of_slots`) VALUES
(11, 3, '09:00 am - 10:00 am', 2),
(12, 3, '10:00 am - 11:00 am ', 12),
(13, 3, '11:00 am - 12:00 pm', 12),
(14, 3, '12:00 pm - 01:00 pm', 11),
(15, 3, '01:00 pm - 02:00 pm', 10),
(16, 1, '09:00 am - 10:00 am', 10),
(17, 1, '10:00 am - 11:00 am', 12),
(18, 1, '11:00 am - 12:00 am', 15),
(19, 2, '09:00 am - 10:00 am', 10),
(20, 2, '10:00 am - 11:00 am', 12),
(21, 2, '11:00 am - 12:00 am', 15),
(22, 2, '5:00 pm - 6:00 pm', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appoint_id`),
  ADD KEY `cust_fk` (`cust_id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`),
  ADD KEY `cust_branch_fk` (`cust_branch`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`),
  ADD KEY `rolefk` (`branch_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`trans_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`service_id`),
  ADD KEY `service_branch_fk` (`branch_id`);

--
-- Indexes for table `slot`
--
ALTER TABLE `slot`
  ADD PRIMARY KEY (`slot_id`),
  ADD KEY `slot_branch_fk` (`branch_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appoint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `slot`
--
ALTER TABLE `slot`
  MODIFY `slot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `cust_fk` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`cust_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `cust_branch_fk` FOREIGN KEY (`cust_branch`) REFERENCES `branch` (`branch_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `branchfk` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`branch_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `service_branch_fk` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`branch_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `slot`
--
ALTER TABLE `slot`
  ADD CONSTRAINT `slot_branch_fk` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`branch_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
