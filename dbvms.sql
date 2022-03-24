-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2022 at 01:09 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbvms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(5) NOT NULL,
  `name` varchar(120) DEFAULT NULL,
  `username` varchar(120) DEFAULT NULL,
  `mobile` bigint(10) DEFAULT NULL,
  `email` varchar(120) DEFAULT NULL,
  `password` varchar(120) DEFAULT NULL,
  `date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `ID` int(11) NOT NULL,
  `name` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mechanics`
--

CREATE TABLE `mechanics` (
  `ID` int(11) NOT NULL,
  `name` varchar(120) DEFAULT NULL,
  `mobile` bigint(20) DEFAULT NULL,
  `email` varchar(120) DEFAULT NULL,
  `address` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `servicerequest`
--

CREATE TABLE `servicerequest` (
  `ID` int(10) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `serviceno` char(20) NOT NULL,
  `category_id` int(10) DEFAULT NULL,
  `VehicleName` varchar(120) DEFAULT NULL,
  `VehicleModel` varchar(120) DEFAULT NULL,
  `VehicleBrand` varchar(120) DEFAULT NULL,
  `VehicleRegno` varchar(120) DEFAULT NULL,
  `ServiceDate` date DEFAULT NULL,
  `ServiceTime` varchar(100) DEFAULT NULL,
  `DeliveryType` varchar(120) DEFAULT NULL,
  `PickupAddress` varchar(120) DEFAULT NULL,
  `ServicerequestDate` timestamp NULL DEFAULT current_timestamp(),
  `mechanics_id` int(10) DEFAULT NULL,
  `ServiceCharge` int(10) DEFAULT NULL,
  `PartsCharge` int(10) DEFAULT NULL,
  `OtherCharge` int(10) DEFAULT NULL,
  `AdminRemark` varchar(120) DEFAULT NULL,
  `AdminStatus` varchar(120) DEFAULT NULL,
  `AdminRemarkdate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `name` varchar(120) DEFAULT NULL,
  `mobile` bigint(10) DEFAULT NULL,
  `email` varchar(120) DEFAULT NULL,
  `date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `mechanics`
--
ALTER TABLE `mechanics`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `servicerequest`
--
ALTER TABLE `servicerequest`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `mechanics_id` (`mechanics_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mechanics`
--
ALTER TABLE `mechanics`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `servicerequest`
--
ALTER TABLE `servicerequest`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `servicerequest`
--
ALTER TABLE `servicerequest`
  ADD CONSTRAINT `servicerequest_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`ID`),
  ADD CONSTRAINT `servicerequest_ibfk_2` FOREIGN KEY (`mechanics_id`) REFERENCES `mechanics` (`ID`),
  ADD CONSTRAINT `servicerequest_ibfk_3` FOREIGN KEY (`category_id`) REFERENCES `category` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
