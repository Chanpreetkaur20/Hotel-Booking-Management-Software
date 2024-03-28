-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2022 at 07:27 PM
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
-- Database: `testing2`
--

-- --------------------------------------------------------

--
-- Table structure for table `agent_table`
--

CREATE TABLE `agent_table` (
  `agent_id` int(100) NOT NULL,
  `agent_name` varchar(100) NOT NULL,
  `phone` int(12) NOT NULL,
  `address` varchar(250) NOT NULL,
  `city` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agent_table`
--

INSERT INTO `agent_table` (`agent_id`, `agent_name`, `phone`, `address`, `city`, `status`) VALUES
(1, 'Harman', 2147483647, 'Subhash Nagar', 'New Delhi', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `fest_table`
--

CREATE TABLE `fest_table` (
  `fest_id` int(100) NOT NULL,
  `fest` varchar(250) NOT NULL,
  `hotel_name` varchar(250) NOT NULL,
  `chk_in` date NOT NULL,
  `chk_out` date NOT NULL,
  `rooms` varchar(100) NOT NULL,
  `bed` varchar(100) NOT NULL,
  `prate` float NOT NULL,
  `lst_dt` date NOT NULL,
  `gst` float NOT NULL,
  `fest_status` varchar(100) NOT NULL,
  `doc` date NOT NULL,
  `meal` varchar(100) NOT NULL,
  `user_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fest_table`
--

INSERT INTO `fest_table` (`fest_id`, `fest`, `hotel_name`, `chk_in`, `chk_out`, `rooms`, `bed`, `prate`, `lst_dt`, `gst`, `fest_status`, `doc`, `meal`, `user_id`) VALUES
(1, 'Diwali', 'Hotel Taj', '2022-09-06', '2022-09-27', '3', '1', 2000, '2022-10-14', 18, 'Inactive', '2022-09-24', 'no', 1),
(2, 'Diwali', 'Radisson', '2022-09-20', '2022-09-21', '1', 'no', 2000, '2022-10-14', 18, 'Inactive', '2022-09-24', 'no', 10),
(3, 'Diwali', 'Hotel Taj', '2022-10-01', '2022-10-03', '4', 'no', 2000, '2022-10-14', 18, 'Inactive', '2022-10-04', 'no', 1);

-- --------------------------------------------------------

--
-- Table structure for table `guest_table`
--

CREATE TABLE `guest_table` (
  `guest_name` varchar(100) NOT NULL,
  `hotel_name` varchar(100) NOT NULL,
  `chk_in` date NOT NULL,
  `chk_out` date NOT NULL,
  `rooms` varchar(10) NOT NULL,
  `bed` varchar(10) NOT NULL,
  `meal` varchar(100) NOT NULL,
  `prate` float NOT NULL,
  `srate` float NOT NULL,
  `gst` float NOT NULL,
  `profit` float NOT NULL,
  `booking_status` varchar(50) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `doc` date DEFAULT NULL,
  `booking_id` int(100) NOT NULL,
  `agent` varchar(50) NOT NULL,
  `sub_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guest_table`
--

INSERT INTO `guest_table` (`guest_name`, `hotel_name`, `chk_in`, `chk_out`, `rooms`, `bed`, `meal`, `prate`, `srate`, `gst`, `profit`, `booking_status`, `user_id`, `doc`, `booking_id`, `agent`, `sub_id`) VALUES
('Cherry1', 'Hotel Taj', '2022-09-13', '2022-09-15', '1', 'no', 'no', 1500, 2000, 18, 410, 'Active', '1', '2022-09-03', 1, 'Harman', 0),
('chan', 'Taj Hotel', '2022-09-28', '2022-08-29', '1', 'no', 'no', 1500, 2000, 5, 475, 'Active', '10', '2022-09-03', 2, '', 0),
('abc', 'Taj Hotel', '2022-09-20', '2022-09-15', '1', '1', 'no', 2000, 2500, 18, 410, 'Active', '1', '2022-09-09', 3, '', 0),
('avm', 'Taj Hotel', '2022-09-06', '2022-09-21', '1', '1', 'no', 2000, 2500, 18, 410, 'Active', '1', '2022-09-09', 4, '', 0),
('avm', 'Taj Hotel', '2022-09-19', '2022-09-29', '1', 'no', 'no', 2000, 2500, 18, 410, 'Active', '1', '2022-09-10', 5, '', 0),
('hii', 'Taj Hotel', '2022-09-06', '2022-09-22', '1', 'no', 'no', 2000, 2500, 18, 410, 'Active', '1', '2022-09-12', 6, '', 0),
('abcz', 'Taj Hotel', '2022-09-29', '2022-10-01', '1', '1', 'no', 2000, 2500, 5, 475, 'Active', '1', '2022-09-20', 7, '', 0),
('cheryyyyy', 'Taj Hotel', '2022-09-16', '2022-09-22', '1', '1', 'no', 2000, 2500, 18, 410, 'Active', '1', '2022-09-24', 8, '', 0),
('channnnnnnnnn', 'Taj Hotel', '2022-09-29', '2022-09-27', '1', '1', 'no', 2000, 3000, 18, 820, 'Active', '1', '2022-09-24', 9, '', 0),
('abczbnm', 'Radisson', '2022-09-19', '2022-09-21', '1', 'no', 'no', 2000, 3000, 18, 820, 'Active', '10', '2022-09-24', 10, 'Harman', 0),
('taranjeet', 'Taj Hotel', '2022-10-01', '2022-10-03', '3', '1', 'no', 3000, 5000, 18, 1640, 'Active', '1', '2022-09-30', 11, 'priyansh', 0),
('taranjeet', 'Radisson', '2022-09-13', '2022-09-21', '3', 'no', 'no', 2000, 5000, 18, 2460, 'Active', '1', '2022-10-03', 12, 'Harman', 0),
('taranjeet', 'Radisson', '2022-09-20', '2022-09-21', '1', 'no', 'no', 2000, 3000, 18, 1000, 'Active', '1', '2022-10-03', 13, 'Harman', 0),
('Cherry1', 'Radisson', '2022-09-13', '2022-09-15', '2', 'no', 'no', 2000, 5000, 18, 2460, 'Active', '1', '2022-10-03', 14, 'Harman', 0),
('Cherry1', 'Hotel Taj', '2022-09-20', '2022-10-03', '3', 'no', 'no', 3000, 5000, 18, 2000, 'Active', '1', '2022-10-03', 15, 'Harman', 0),
('taranjeet', 'Hotel Taj', '2022-10-12', '2022-10-12', '3', 'no', 'no', 1500, 5000, 18, 2870, 'Active', '1', '2022-10-03', 16, 'Harman', 0),
('abczbnm', 'Hotel Taj', '2022-10-11', '2022-10-13', '2', 'no', 'no', 1500, 2000, 18, 410, 'Active', '1', '2022-10-03', 17, 'Harman', 0),
('SIMRAN', 'Hotel Taj', '2022-09-06', '2022-09-27', '1', '2', 'no', 2000, 5000, 18, 2460, 'Active', '1', '2022-10-04', 18, 'Harman', 0),
('cherry', 'Radisson', '2022-09-20', '2022-09-21', '1', 'no', 'no', 2000, 5000, 18, 3000, 'Active', '1', '2022-10-04', 19, 'Harman', 0),
('Simran', 'Hotel Taj', '2022-10-01', '2022-10-03', '2', 'no', 'no', 2000, 5000, 18, 3000, 'Active', '1', '2022-10-04', 20, 'Harman', 0),
('SIMRAN', 'Radisson', '2022-09-20', '2022-09-21', '1', 'no', 'no', 2000, 5000, 18, 3000, 'Active', '1', '2022-10-04', 21, 'Harman', 0),
('Simran', 'Radisson', '2022-09-20', '2022-09-21', '2', 'no', 'no', 2000, 5000, 18, 3000, 'Active', '1', '2022-10-04', 22, 'Harman', 0),
('cherry', 'Hotel Taj', '2022-09-06', '2022-09-27', '1', '1', 'no', 2000, 5000, 18, 3000, 'Active', '1', '2022-10-04', 23, 'Harman', 0),
('Simran', 'Radisson', '2022-09-20', '2022-09-21', '1', 'no', 'no', 2000, 5000, 18, 3000, 'Active', '1', '2022-10-04', 24, 'Harman', 0),
('SIMRAN', 'Hotel Taj', '2022-09-06', '2022-09-27', '2', '1', 'no', 2000, 5000, 18, 2460, 'Active', '1', '2022-10-04', 25, 'Harman', 0),
('Simran', 'Hotel Taj', '2022-09-06', '2022-09-27', '1', '1', 'no', 2000, 5000, 18, 3000, 'Active', '1', '2022-10-04', 26, 'Harman', 0),
('cherry', 'Hotel Taj', '2022-09-06', '2022-09-27', '2', '1', 'no', 2000, 5000, 18, 3000, 'Active', '1', '2022-10-04', 27, 'Harman', 0),
('cherry', 'Hotel Taj', '2022-10-01', '2022-10-03', '1', 'no', 'no', 2000, 5000, 18, 3000, 'Active', '1', '2022-10-04', 28, 'Harman', 0),
('Simran', 'Hotel Taj', '2022-09-06', '2022-09-27', '1', '1', 'no', 2000, 5000, 18, 3000, 'Active', '1', '2022-10-04', 29, 'Harman', 0),
('cherry', 'Hotel Taj', '2022-09-16', '2022-09-15', '1', '1', 'no', 2000, 5000, 18, 3000, 'Active', '1', '2022-10-04', 30, 'Harman', 0),
('chanpreet kaur', 'Hotel Taj', '2022-09-16', '2022-09-15', '1', '1', 'no', 2000, 5000, 18, 3000, 'Active', '1', '2022-10-05', 31, 'Harman', 0),
('cherry', 'Hotel Taj', '2022-09-20', '2022-09-21', '2', 'no', 'no', 2000, 5000, 18, 2460, 'Active', '1', '2022-10-07', 32, 'Harman', 0),
('xyz', 'Hotel Taj', '2022-09-20', '2022-09-21', '1', 'no', 'no', 2000, 3000, 18, 820, 'Active', '1', '2022-10-31', 33, 'Harman', 0),
('cherry', 'Hotel Taj', '2022-09-16', '2022-09-15', '2', '1', 'no', 2000, 3500, 18, 1230, 'Active', '1', '2022-10-31', 34, 'Harman', 0),
('chanpreet', 'Hotel Taj', '2022-11-03', '2022-11-05', '1', '1', 'no', 3000, 5000, 18, 1640, 'Active', '1', '2022-11-02', 35, 'Harman', 0),
('chann', 'Hotel Taj', '2022-11-03', '2022-11-22', '1', '1', 'no', 4000, 4500, 18, 410, 'Active', '1', '2022-11-02', 36, 'Harman', 0),
('cherry', 'Hotel Taj', '2022-11-10', '2022-11-11', '1', '1', 'no', 5000, 7000, 18, 1640, 'Active', '1', '2022-11-02', 37, 'Harman', 0),
('noname', 'Hotel Taj', '2022-11-04', '2022-11-05', '4', 'no', 'no', 4000, 6000, 18, 1640, 'Active', '1', '2022-11-04', 38, 'Harman', 1),
('noone', 'Radisson', '2022-11-04', '2022-11-05', '1', 'no', 'no', 3000, 5000, 18, 1640, 'Active', '1', '2022-11-04', 39, 'Harman', 25),
('meenu', 'Hotel Taj', '2022-11-04', '2022-11-06', '1', 'no', 'no', 3000, 4000, 18, 820, 'Active', '1', '2022-11-04', 40, 'Harman', 24);

-- --------------------------------------------------------

--
-- Table structure for table `hotel_table`
--

CREATE TABLE `hotel_table` (
  `hotel_id` int(11) NOT NULL,
  `hname` varchar(100) NOT NULL,
  `location` varchar(250) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotel_table`
--

INSERT INTO `hotel_table` (`hotel_id`, `hname`, `location`, `status`) VALUES
(1, 'Hotel Taj', 'New Delhi', 'Active'),
(2, 'Radisson', 'New Delhi', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pay_id` int(100) NOT NULL,
  `booking_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `cash` float NOT NULL,
  `bank` float NOT NULL,
  `hotel` float NOT NULL,
  `received_by` varchar(250) NOT NULL,
  `dor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pay_id`, `booking_id`, `user_id`, `cash`, `bank`, `hotel`, `received_by`, `dor`) VALUES
(1, 1, 0, 0, 0, 0, '', ''),
(2, 2, 0, 0, 0, 0, '', ''),
(3, 3, 0, 0, 0, 0, '', ''),
(4, 4, 0, 0, 0, 0, '', ''),
(5, 5, 0, 0, 0, 0, '', ''),
(6, 6, 0, 0, 0, 0, '', ''),
(7, 7, 0, 0, 0, 0, '', ''),
(8, 8, 0, 0, 0, 0, '', ''),
(9, 9, 0, 0, 0, 0, '', ''),
(10, 10, 0, 0, 0, 0, '', ''),
(11, 11, 0, 0, 0, 0, '', ''),
(12, 12, 0, 0, 0, 0, '', ''),
(13, 13, 0, 0, 0, 0, '', ''),
(14, 14, 1, 0, 1000, 0, 'me', '2022-10-18'),
(15, 15, 0, 0, 0, 0, '', ''),
(16, 16, 1, 0, 0, 500, 'me', '2022-10-04'),
(17, 17, 1, 1000, 0, 0, 'me', '2022-10-12'),
(18, 18, 0, 0, 0, 0, '', ''),
(19, 19, 0, 0, 0, 0, '', ''),
(20, 0, 1, 0, 0, 0, '', ''),
(21, 0, 1, 0, 0, 0, '', ''),
(22, 0, 1, 0, 0, 0, '', ''),
(23, 0, 1, 0, 0, 0, '', ''),
(24, 0, 1, 0, 0, 0, '', ''),
(25, 0, 1, 0, 0, 0, '', ''),
(26, 0, 1, 0, 0, 0, '', ''),
(27, 0, 1, 0, 0, 0, '', ''),
(28, 0, 1, 0, 0, 0, '', ''),
(29, 0, 1, 0, 0, 0, '', ''),
(30, 0, 1, 0, 0, 0, '', ''),
(31, 0, 1, 0, 0, 0, '', ''),
(32, 32, 1, 0, 2000, 5000, 'me', '2022-10-21'),
(33, 0, 1, 0, 0, 0, '', ''),
(34, 0, 1, 0, 0, 0, '', ''),
(35, 0, 1, 0, 0, 0, '', ''),
(36, 0, 1, 0, 0, 0, '', ''),
(37, 0, 1, 0, 0, 0, '', ''),
(38, 1, 1, 0, 0, 0, '', ''),
(39, 25, 1, 0, 0, 0, '', ''),
(40, 24, 1, 0, 0, 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `prep_table`
--

CREATE TABLE `prep_table` (
  `prep_id` int(100) NOT NULL,
  `hotel_name` varchar(250) NOT NULL,
  `chk_in` date NOT NULL,
  `chk_out` date NOT NULL,
  `rooms` varchar(250) NOT NULL,
  `bed` varchar(250) NOT NULL,
  `prate` float NOT NULL,
  `lst_dt` date NOT NULL,
  `gst` float NOT NULL,
  `prep_status` varchar(250) NOT NULL,
  `doc` date NOT NULL,
  `user_id` int(100) NOT NULL,
  `meal` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prep_table`
--

INSERT INTO `prep_table` (`prep_id`, `hotel_name`, `chk_in`, `chk_out`, `rooms`, `bed`, `prate`, `lst_dt`, `gst`, `prep_status`, `doc`, `user_id`, `meal`) VALUES
(1, 'Hotel Taj', '2022-09-16', '2022-09-15', '2', '1', 2000, '2022-11-10', 18, 'Active', '2022-09-24', 1, 'no'),
(2, 'Hotel Taj', '2022-09-20', '2022-09-21', '1', 'no', 2000, '2022-10-13', 18, 'Inactive', '2022-09-24', 10, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_password` varchar(200) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_type` enum('master','user') NOT NULL,
  `user_status` enum('Active','Inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`user_id`, `user_email`, `user_password`, `user_name`, `user_type`, `user_status`) VALUES
(1, 'chanpreetkaur2005@gmail.com', '$2y$10$09GvP4eNJtGFEIyqpZ67Xu3UUbE9lUGMLUYBI29Ai5QcSUXZWfeyi', 'Cherry', 'master', 'Active'),
(2, 'donahuber@gmail.com', '$2y$10$Ex.JTn6Cu7lCHgaJoCBVeu0qer0cFp2X1qTIpPg2qfIkkuj3LjjMK', 'Dona L. Huber', 'user', 'Active'),
(3, 'roy_hise@gmail.com', '$2y$10$XlyVI9an5B6rHW3SS9vQpesJssKJxzMQYPbSaR7dnpWjDI5fpxJSS', 'Roy Hise', 'user', 'Active'),
(4, 'peter_goad@gmail.com', '$2y$10$n1B.FdHNwufTkmzp/pNqc.EiwjB8quQ1tBCEC7nkaldI5pS.et04e', 'Peter Goad', 'user', 'Active'),
(5, 'sarah_thomas@gmail.com', '$2y$10$s57SErOPlgkIZf1lxzlX3.hMt8LSSKaYig5rusxghDm7LW8RtQc/W', 'Sarah Thomas', 'user', 'Active'),
(6, 'edna_william@gmail.com', '$2y$10$mfMXnH.TCmg5tlYRhqjxu.ILly8s9.qsLKOpyxgUl6h1fZt6x/B5C', 'Edna William', 'user', 'Active'),
(8, 'john_parks@gmail.com', '$2y$10$WtsZUxIIz/N4NoIW0Db.pu0VfLWcPs6TyQ8SkpVHLDLGhdNOfALC.', 'John Park', 'user', 'Active'),
(10, 'abc@gmail.com', '$2y$10$1fREcVa4RVQGKuDT37DSD.jYvAoxs.zFuc78GAUX6oT6bIqtNNC8i', 'chan', 'user', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agent_table`
--
ALTER TABLE `agent_table`
  ADD PRIMARY KEY (`agent_id`);

--
-- Indexes for table `fest_table`
--
ALTER TABLE `fest_table`
  ADD PRIMARY KEY (`fest_id`);

--
-- Indexes for table `guest_table`
--
ALTER TABLE `guest_table`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `hotel_table`
--
ALTER TABLE `hotel_table`
  ADD PRIMARY KEY (`hotel_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `prep_table`
--
ALTER TABLE `prep_table`
  ADD PRIMARY KEY (`prep_id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agent_table`
--
ALTER TABLE `agent_table`
  MODIFY `agent_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fest_table`
--
ALTER TABLE `fest_table`
  MODIFY `fest_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `guest_table`
--
ALTER TABLE `guest_table`
  MODIFY `booking_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `hotel_table`
--
ALTER TABLE `hotel_table`
  MODIFY `hotel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pay_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `prep_table`
--
ALTER TABLE `prep_table`
  MODIFY `prep_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
