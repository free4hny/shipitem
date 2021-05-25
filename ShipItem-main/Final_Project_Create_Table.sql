-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 17, 2021 at 04:28 PM
-- Server version: 10.3.25-MariaDB-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `syerrago_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `USER_INFO`
--
-- USER INFO MASTER TABLE  (Parent Table)
--
-- DROP TABLE USER_INFO;
CREATE TABLE `USER_INFO` (
  `USER_ID` int(11) NOT NULL,
  `FIRSTNAME` varchar(30) DEFAULT NULL,
  `LASTNAME` varchar(30) DEFAULT NULL,
  `PASSWORD` varchar(30) DEFAULT NULL,
  `PHONE` varchar(12) DEFAULT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `ADDRESS` varchar(100) NOT NULL,
  `CITY` varchar(100) NOT NULL,
  `STATE` varchar(30) NOT NULL,
  `ZIPCODE` int(6) NOT NULL,
  `COUNTRY` varchar(50) NOT NULL,
  `USER_STATUS` varchar(30) NOT NULL DEFAULT 'ACTIVE',
  `USER_TYPE` varchar(30) NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for table `USER_INFO`
--
ALTER TABLE `USER_INFO`
  ADD PRIMARY KEY (`USER_ID`);
COMMIT;

--
-- Table structure for table `TRAVEL_INFO`
--

CREATE TABLE `TRAVELER_INFO` (
  `TRAVELER_ID` int(11) PRIMARY KEY,
  `USER_ID` int(11) NOT NULL,
  `USER_TYPE` varchar(30) DEFAULT NULL,
  `TRAVEL_TYPE` varchar(50) NOT NULL,
  `CARRY_TOTAL_WEIGHT` int(15) NOT NULL,
  `CARRY_TOTAL_SIZE` varchar(15) NOT NULL,
  `SHIPPING_COST` int(15) NOT NULL,
  `DEPARTURE_DATE_TIME` datetime NOT NULL,
  `FROM_ADDRESS` varchar(100),
  `FROM_CITY` varchar(100),
  `FROM_STATE` varchar(30),
  `FROM_ZIPCODE` int(6),
  `FROM_COUNTRY` varchar(50),
  `ARRIVAL_DATE_TIME` datetime NOT NULL,
  `DEST_ADDRESS` varchar(100) NOT NULL,
  `DEST_CITY` varchar(100) NOT NULL,
  `DEST_STATE` varchar(30) NOT NULL,
  `DEST_ZIPCODE` int(6) NOT NULL,
  `DEST_COUNTRY` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for table `TRAVEL_INFO`
--
ALTER TABLE `TRAVELER_INFO`
  ADD KEY `USER_ID` (`USER_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `TRAVEL_INFO`
--
ALTER TABLE `TRAVELER_INFO`
  ADD CONSTRAINT `User_Travel_FK` FOREIGN KEY (`USER_ID`) REFERENCES `USER_INFO` (`USER_ID`);
COMMIT;

--
-- Table structure for table `CUSTOMER_INFO`
--

CREATE TABLE `CUSTOMER_INFO` (
  `CUSTOMER_ID` int(11) PRIMARY KEY,
  `USER_ID` int(11) NOT NULL,
  `USER_TYPE` varchar(30) DEFAULT NULL,
  `CUSTOMER_PACKAGE_TOTAL_WEIGHT` int(15) NOT NULL,
  `CUSTOMER_PACKAGE_TOTAL_SIZE` varchar(15) NOT NULL,
  `PACKAGE_READY_DATE` datetime NOT NULL,
  `PACKAGE_FROM_ADDRESS` varchar(100) NOT NULL,
  `PACKAGE_FROM_CITY` varchar(100) NOT NULL,
  `PACKAGE_FROM_STATE` varchar(30) NOT NULL,
  `PACKAGE_FROM_ZIPCODE` int(6) NOT NULL,
  `PACKAGE_FROM_COUNTRY` varchar(50) NOT NULL,
  `PACKAGE_DELIVERY_DATE` datetime NOT NULL,
  `PACKAGE_DEST_ADDRESS` varchar(100) NOT NULL,
  `PACKAGE_DEST_CITY` varchar(100) NOT NULL,
  `PACKAGE_DEST_STATE` varchar(30) NOT NULL,
  `PACKAGE_DEST_ZIPCODE` int(6) NOT NULL,
  `PACKAGE_DEST_COUNTRY` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Indexes for dumped tables
--

--
-- Indexes for table `CUSTOMER_INFO`
--
ALTER TABLE `CUSTOMER_INFO`
  ADD KEY `USER_ID` (`USER_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `CUSTOMER_INFO`
--
ALTER TABLE `CUSTOMER_INFO`
  ADD CONSTRAINT `User_Customer_FK` FOREIGN KEY (`USER_ID`) REFERENCES `USER_INFO` (`USER_ID`);
COMMIT;


--
-- Indexes for dumped tables
--





