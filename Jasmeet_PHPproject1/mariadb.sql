-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2020 at 02:04 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mariadb`
--

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE IF NOT EXISTS `inventory` (
  `ItemID` int(11) NOT NULL,
  `Item_name` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`ItemID`, `Item_name`, `quantity`) VALUES
(1, 'Iphone11', 7),
(2, 'Iphone10', 5),
(3, 'Iphone8', 6),
(4, 'Iphone7', 9),
(5, 'Iphone6', 2);

-- --------------------------------------------------------

--
-- Table structure for table `inventoryorder`
--

CREATE TABLE IF NOT EXISTS `inventoryorder` (
  `invID` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `itemID` int(11) NOT NULL,
  `payment` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventoryorder`
--

INSERT INTO `inventoryorder` (`invID`, `firstname`, `lastname`, `itemID`, `payment`) VALUES
(8, 'jass', 'meet', 4, 'Debit'),
(9, 'jass', 'meet', 4, 'Credit');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`ItemID`);

--
-- Indexes for table `inventoryorder`
--
ALTER TABLE `inventoryorder`
  ADD PRIMARY KEY (`invID`),
  ADD KEY `itemID` (`itemID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `ItemID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `inventoryorder`
--
ALTER TABLE `inventoryorder`
  MODIFY `invID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `inventoryorder`
--
ALTER TABLE `inventoryorder`
  ADD CONSTRAINT `inventoryorder_ibfk_1` FOREIGN KEY (`itemID`) REFERENCES `inventory` (`ItemID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
