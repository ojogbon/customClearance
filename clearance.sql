-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 17, 2020 at 02:12 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clearance`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `date` timestamp NOT NULL,
  `status` varchar(222) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `advice`
--

DROP TABLE IF EXISTS `advice`;
CREATE TABLE IF NOT EXISTS `advice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `officedr_id` int(11) NOT NULL,
  `type` varchar(222) NOT NULL,
  `amount` double NOT NULL,
  `date` timestamp NOT NULL,
  `status` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advice`
--

INSERT INTO `advice` (`id`, `officedr_id`, `type`, `amount`, `date`, `status`) VALUES
(1, 1, 'cago ', 400, '2020-03-15 15:20:17', '0');

-- --------------------------------------------------------

--
-- Table structure for table `advice_payment`
--

DROP TABLE IF EXISTS `advice_payment`;
CREATE TABLE IF NOT EXISTS `advice_payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `advice_id` int(11) NOT NULL,
  `evidence` varchar(222) NOT NULL,
  `path` varchar(222) NOT NULL,
  `amount` double NOT NULL,
  `billcode` varchar(222) NOT NULL,
  `adviceCode` varchar(222) NOT NULL,
  `date` timestamp NOT NULL,
  `status` varchar(11) NOT NULL,
  `state` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advice_payment`
--

INSERT INTO `advice_payment` (`id`, `user_id`, `advice_id`, `evidence`, `path`, `amount`, `billcode`, `adviceCode`, `date`, `status`, `state`) VALUES
(1, 1, 1, '14.PNG', '../models/forAllImage/14.PNG', 7899, 'BiL50455t6yfge3ws', 'Advi6645t6yfge3ws', '2020-03-15 16:04:52', 'confirmed', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

DROP TABLE IF EXISTS `bill`;
CREATE TABLE IF NOT EXISTS `bill` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `officedr_id` int(11) NOT NULL,
  `type` varchar(222) NOT NULL,
  `amount` double NOT NULL,
  `date` timestamp NOT NULL,
  `status` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `officedr_id`, `type`, `amount`, `date`, `status`) VALUES
(1, 1, 'Rate', 300, '2020-03-14 16:08:50', '0'),
(2, 1, 'Tax', 500, '2020-03-14 17:14:33', '0');

-- --------------------------------------------------------

--
-- Table structure for table `bill_payment`
--

DROP TABLE IF EXISTS `bill_payment`;
CREATE TABLE IF NOT EXISTS `bill_payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL,
  `evidence` varchar(222) NOT NULL,
  `path` varchar(222) NOT NULL,
  `amount` double NOT NULL,
  `goodId` varchar(222) NOT NULL,
  `billcode` varchar(222) NOT NULL,
  `date` timestamp NOT NULL,
  `status` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill_payment`
--

INSERT INTO `bill_payment` (`id`, `user_id`, `bill_id`, `evidence`, `path`, `amount`, `goodId`, `billcode`, `date`, `status`) VALUES
(1, 1, 1, '12.PNG', '../models/forAllImage/12.PNG', 600, '675456', 'BiL50455t6yfge3ws', '2020-03-14 17:40:54', 'confirmed');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
CREATE TABLE IF NOT EXISTS `bookings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `logistic_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `evidence` varchar(222) NOT NULL,
  `path` varchar(222) NOT NULL,
  `date` timestamp NOT NULL,
  `status` varchar(111) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `customer_id`, `logistic_id`, `amount`, `evidence`, `path`, `date`, `status`) VALUES
(1, 1, 1, 300, '11.PNG', '../model/forAllImage', '2020-03-09 02:39:53', '0'),
(2, 1, 1, 5000, '1.PNG', '../models/forAllImage/1.PNG', '2020-03-11 06:04:59', 'confirmed'),
(3, 1, 1, 5000, '1.PNG', '../models/forAllImage/1.PNG', '2020-03-11 06:08:50', 'confirmed');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(222) NOT NULL,
  `lastName` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `phoneNumber` varchar(222) NOT NULL,
  `companyName` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `date` timestamp NOT NULL,
  `status` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `firstName`, `lastName`, `email`, `phoneNumber`, `companyName`, `password`, `date`, `status`) VALUES
(1, 'sope', 'wale', 'gooy@gmail.com', '0908776543', 'hope ', '9999', '2020-03-05 15:43:07', '0');

-- --------------------------------------------------------

--
-- Table structure for table `evaluation`
--

DROP TABLE IF EXISTS `evaluation`;
CREATE TABLE IF NOT EXISTS `evaluation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `officer_incharge` int(11) NOT NULL,
  `goodsID` int(11) NOT NULL,
  `state` varchar(222) NOT NULL,
  `evaluateCode` varchar(222) NOT NULL,
  `date` timestamp NOT NULL,
  `status` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evaluation`
--

INSERT INTO `evaluation` (`id`, `customer_id`, `officer_incharge`, `goodsID`, `state`, `evaluateCode`, `date`, `status`) VALUES
(1, 1, 1, 675456, '7', '4$323&496957v?ere', '2020-03-16 12:57:00', '0');

-- --------------------------------------------------------

--
-- Table structure for table `logistic`
--

DROP TABLE IF EXISTS `logistic`;
CREATE TABLE IF NOT EXISTS `logistic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(222) NOT NULL,
  `companyName` varchar(222) NOT NULL,
  `phoneNumber` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `date` timestamp NOT NULL,
  `status` varchar(11) NOT NULL,
  `address` varchar(222) NOT NULL,
  `pricePerkg` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logistic`
--

INSERT INTO `logistic` (`id`, `name`, `companyName`, `phoneNumber`, `email`, `password`, `date`, `status`, `address`, `pricePerkg`) VALUES
(1, 'food ', 'mile', '08022227726', 'fooo@gmail.com', '99999', '2020-03-05 15:23:45', '0', 'shade road mapo bus top, majiya Lagos', 200);

-- --------------------------------------------------------

--
-- Table structure for table `progress`
--

DROP TABLE IF EXISTS `progress`;
CREATE TABLE IF NOT EXISTS `progress` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `custom_id` int(11) NOT NULL,
  `level` varchar(222) NOT NULL,
  `type` varchar(222) NOT NULL,
  `price` double NOT NULL,
  `date` timestamp NOT NULL,
  `status` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
