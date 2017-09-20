-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 27, 2015 at 10:01 AM
-- Server version: 5.5.42-cll
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hkinfowa_busapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `useremail` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`aid`, `username`, `useremail`, `password`, `createdat`) VALUES
(1, 'admin', 'admin@gmail.com', 'e6e061838856bf47e1de730719fb2609', '2015-03-16 16:10:57');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE IF NOT EXISTS `tbl_booking` (
  `bid` int(11) NOT NULL AUTO_INCREMENT,
  `rid` int(11) NOT NULL,
  `tripdate` date NOT NULL,
  `bookseat` varchar(255) NOT NULL,
  `buid` int(11) NOT NULL,
  `bokkingdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`bid`),
  KEY `bid` (`bid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`bid`, `rid`, `tripdate`, `bookseat`, `buid`, `bokkingdate`) VALUES
(1, 1, '2015-03-09', '1', 1, '2015-03-08 12:13:27'),
(2, 1, '2015-03-09', '2', 1, '2015-03-08 12:20:52'),
(11, 1, '2015-03-09', '10', 2, '2015-03-08 12:46:37'),
(12, 1, '2015-03-09', '20', 2, '2015-03-08 12:46:37'),
(13, 1, '2015-03-27', '5', 17, '2015-03-26 16:54:17'),
(14, 11, '2015-03-29', '3', 18, '2015-03-29 07:11:21'),
(15, 11, '2015-03-29', '4', 18, '2015-03-29 07:12:22'),
(16, 11, '2015-03-29', '36', 18, '2015-03-29 07:13:01'),
(17, 21, '2015-03-29', '6', 18, '2015-03-29 07:22:48'),
(18, 11, '2015-03-29', '36', 18, '2015-03-29 12:15:44'),
(19, 1, '2015-03-29', '3', 18, '2015-03-30 09:04:29'),
(20, 2, '2015-03-29', '36', 18, '2015-03-30 09:06:27'),
(21, 1, '2015-03-29', '36', 18, '2015-03-30 09:07:51'),
(22, 11, '2015-03-29', '3', 18, '2015-03-30 15:24:55'),
(23, 3, '2015-03-29', '3', 18, '2015-03-30 15:25:23'),
(24, 4, '2015-03-29', '3', 18, '2015-03-30 15:37:12'),
(25, 5, '2015-03-29', '3', 18, '2015-03-30 15:39:36'),
(26, 1, '2015-03-29', '36', 18, '2015-04-01 04:34:01'),
(27, 1, '2015-04-01', '36', 18, '2015-04-01 04:35:04'),
(28, 1, '2015-04-01', '6', 18, '2015-04-01 04:36:10'),
(29, 11, '2015-04-01', '6', 18, '2015-04-01 04:36:52'),
(30, 11, '2015-03-29', '36', 18, '2015-04-02 05:28:30'),
(31, 11, '2015-03-29', '36', 18, '2015-04-02 05:28:45'),
(32, 11, '2015-03-29', '34', 18, '2015-04-02 05:28:45'),
(33, 11, '2015-03-29', '35', 18, '2015-04-02 05:28:46'),
(34, 11, '2015-03-29', '1', 18, '2015-04-02 05:30:36'),
(35, 11, '2015-03-29', '2', 18, '2015-04-02 05:30:36'),
(36, 11, '2015-03-29', '3', 18, '2015-04-02 05:30:37'),
(37, 11, '2015-03-29', '4', 18, '2015-04-02 05:30:37'),
(38, 11, '2015-03-29', '5', 18, '2015-04-02 05:30:37'),
(39, 11, '2015-03-29', '36', 18, '2015-04-13 17:52:09'),
(40, 11, '2015-03-29', '37', 18, '2015-04-13 17:52:24'),
(41, 11, '2015-03-29', '38', 18, '2015-04-13 17:52:24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bustype`
--

CREATE TABLE IF NOT EXISTS `tbl_bustype` (
  `btid` int(11) NOT NULL AUTO_INCREMENT,
  `btname` varchar(255) NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`btid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_bustype`
--

INSERT INTO `tbl_bustype` (`btid`, `btname`, `createdat`) VALUES
(1, 'AC', '2015-03-03 15:58:36'),
(2, 'Non AC', '2015-03-03 15:58:36'),
(3, 'Sleeper', '2015-03-03 15:59:07'),
(4, 'Seater', '2015-03-03 15:59:07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_city`
--

CREATE TABLE IF NOT EXISTS `tbl_city` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `cname` varchar(255) NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tbl_city`
--

INSERT INTO `tbl_city` (`cid`, `cname`, `createdat`) VALUES
(1, 'Ahmedabad', '2015-03-03 15:47:23'),
(2, 'Surat', '2015-03-03 15:47:23'),
(3, 'Vadodara', '2015-03-03 15:47:51'),
(4, 'Rajkot', '2015-03-03 15:47:51'),
(5, 'Bhavnagar', '2015-03-03 15:48:19'),
(6, 'Jamnagar', '2015-03-03 15:48:19'),
(7, 'Junagadh', '2015-03-03 15:48:41'),
(8, 'Surendranagar', '2015-03-03 15:48:41'),
(9, 'Veraval', '2015-03-03 15:49:21'),
(10, 'Anand', '2015-03-03 15:49:21'),
(11, 'Botad', '2015-03-03 15:49:46'),
(12, 'Gandhinagar', '2015-03-03 15:50:17'),
(13, 'Navsari', '2015-03-03 15:50:17'),
(14, 'Porbandar', '2015-03-03 15:50:43'),
(15, 'Morbi', '2015-03-03 15:50:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pickupaddress`
--

CREATE TABLE IF NOT EXISTS `tbl_pickupaddress` (
  `paid` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `text` text NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`paid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tbl_pickupaddress`
--

INSERT INTO `tbl_pickupaddress` (`paid`, `cid`, `text`, `createdAt`) VALUES
(2, 1, '150 feet road', '2015-03-16 17:18:29'),
(3, 1, '150 feet road', '2015-03-16 17:18:29'),
(4, 2, '150 feet road', '2015-03-16 17:18:29'),
(5, 2, 'bus stand', '2015-03-16 17:18:29'),
(6, 3, '150 feet road', '2015-03-16 17:18:29'),
(7, 3, 'bus stand', '2015-03-16 17:18:29'),
(8, 4, '150 feet road', '2015-03-16 17:18:29'),
(9, 4, 'bus stand', '2015-03-16 17:18:29'),
(10, 5, '150 feet road', '2015-03-16 17:18:29'),
(11, 5, 'bus stand', '2015-03-16 17:18:29'),
(12, 6, '150 feet road', '2015-03-16 17:18:29'),
(13, 6, 'bus stand', '2015-03-16 17:18:29'),
(14, 1, 'test', '2015-03-19 16:46:36');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_routes`
--

CREATE TABLE IF NOT EXISTS `tbl_routes` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `rfrom` int(11) NOT NULL,
  `rto` int(11) NOT NULL,
  `rbtype` varchar(255) NOT NULL,
  `rfare` int(11) NOT NULL,
  `rtype` varchar(255) NOT NULL,
  `rpickuptime` varchar(255) NOT NULL,
  `rdroptime` varchar(255) NOT NULL,
  `rseat` int(11) NOT NULL,
  PRIMARY KEY (`rid`),
  KEY `rfrom` (`rfrom`),
  KEY `rto` (`rto`),
  KEY `rfrom_2` (`rfrom`),
  KEY `rto_2` (`rto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `tbl_routes`
--

INSERT INTO `tbl_routes` (`rid`, `rfrom`, `rto`, `rbtype`, `rfare`, `rtype`, `rpickuptime`, `rdroptime`, `rseat`) VALUES
(1, 1, 2, '2,4', 350, 'daily', '01:55 AM', '5:25 AM', 45),
(2, 1, 2, '1,3', 500, 'sunday', '06:00 AM', '9:30 AM', 35),
(3, 1, 2, '1,4', 425, 'daily', '07:45 AM', '11:30 AM', 45),
(4, 1, 12, '2', 350, 'daily', '01:30 PM', '5:00 PM', 450),
(5, 1, 6, '1,3', 500, 'daily', '04:00 PM', '7:30 PM', 35),
(6, 2, 7, '3,2', 425, 'daily', '07:30 PM', '11:00 PM', 45),
(7, 3, 8, '2', 350, 'daily', '09:30 PM', '1:00 AM', 45),
(8, 4, 1, '1,3', 500, 'daily', '01:55 AM', '5:25 AM', 35),
(9, 5, 10, '1,4', 425, 'daily', '06:00 AM', '9:30 AM', 45),
(10, 3, 2, '3,4', 350, 'daily', '07:45 AM', '11:30 AM', 45),
(11, 2, 1, '1,3', 500, 'daily', '01:30 PM', '5:00 PM', 35),
(12, 2, 1, '1,4', 425, 'daily', '04:00 PM', '7:30 PM', 45),
(13, 4, 2, '4', 350, 'daily', '07:30 PM', '11:00 PM', 45),
(15, 3, 8, '1,4', 425, 'daily', '01:55 AM', '5:25 AM', 45),
(16, 5, 10, '2', 350, 'daily', '09:30 PM', '1:00 AM', 35),
(17, 4, 2, '1,3', 500, 'daily', '07:30 PM', '11:00 PM', 35),
(18, 5, 10, '3,4', 425, 'daily', '04:00 PM', '7:30 PM', 35),
(19, 2, 7, '4', 350, 'daily', '01:30 PM', '5:00 PM', 45),
(20, 3, 2, '1,3', 500, 'daily', '07:45 AM', '11:30 AM', 35),
(21, 1, 4, '1', 450, 'daily', '9.00', '1.00', 27);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(255) NOT NULL,
  `uphone` varchar(255) NOT NULL,
  `uemail` varchar(255) NOT NULL,
  `uverify` varchar(255) NOT NULL,
  `verifyStatus` enum('0','1') NOT NULL DEFAULT '0',
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`uid`, `uname`, `uphone`, `uemail`, `uverify`, `verifyStatus`, `createdat`) VALUES
(8, '123', '123', 'sandy.majethiya@gmail.com', 'ZnzF5N', '1', '2015-03-22 10:20:54'),
(9, 'ifkfkd', '56467656', 'sjedi@tk.com', 'FGWb3w', '0', '2015-03-23 05:04:21'),
(10, 'gdddfv', '45588', 'sdfhhff@gg.com', 'j4jDjG', '0', '2015-03-23 16:06:56'),
(11, 'Kano', '9913922276', 'Kaushik.patel1991@gmail.com', 'MhOctK', '0', '2015-03-24 11:09:57'),
(12, 'dfhfg', '3453446', 'dfgdf@gm.com', 'poNITF', '0', '2015-03-24 13:45:23'),
(13, 'KANO', '991398888', 'Kaushik.patel1991@gmail.com', 'B6b7FE', '0', '2015-03-24 13:55:58'),
(14, 'dfhfg', '3453446', 'dfgdf@gm.com', '1C61kA', '1', '2015-03-25 08:01:52'),
(15, 'fjfkdkfkf', '6546134356', 'jfdkdkdks@gk.com', '7qJFUz', '1', '2015-03-25 15:41:58'),
(16, 'fidjddj', '46467464', 'djesisi@fjf.com', 'dkUEay', '1', '2015-03-26 16:18:29'),
(17, 'hffkfkffk', '6467566446', 'hahsshsu@fj.com', 'GO6tIN', '1', '2015-03-26 16:45:19'),
(18, 'dfhfg', '3453446', 'dfgdf@gm.com', 'MXmp27', '1', '2015-03-29 07:05:05'),
(19, 'dfhfg', '3453446', 'dfgdf@gm.com', 'SM1ty4', '0', '2015-03-29 07:13:54'),
(20, 'dfhfg', '3453446', 'dfgdf@gm.com', 'z3y2u6', '0', '2015-03-29 07:19:17'),
(21, 'fjfkdk', '564646', 'jdjsdidd@fj.com', 'BCRO9x', '0', '2015-03-30 09:48:05'),
(22, 'hfdfghh', '8855598', 'dfgffdd@fg.com', 'J2J7oC', '0', '2015-04-01 15:29:18'),
(23, 'hdjdjd', '64676764', 'ujj@@@fj.com', 'ojnoBS', '0', '2015-04-02 04:45:03'),
(24, 'hdjdjd', '64676764', 'ujj@@@fj.com', 'fXiNxO', '0', '2015-04-02 04:45:36'),
(25, 'sdfgsd', '23453245345', 'sdfgsdfg@gm.com', 'isOsCd', '1', '2015-04-02 05:02:26'),
(26, 'ffhdgg', '755478885', 'dghydaxght@hgd.com', 'zvp2Pa', '1', '2015-04-09 17:14:44'),
(27, 'fjssf', '546474', 'dhds@fj.com', 'Ug5EQk', '1', '2015-04-10 04:01:49'),
(28, 'kano', '999888', 'abc@gmail.com', '6fs4uF', '0', '2015-04-27 04:15:58'),
(29, 'kano', '999888', 'abc@gmail.com', 'KjB4h6', '1', '2015-04-27 04:16:25');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
