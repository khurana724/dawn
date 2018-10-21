-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 21, 2018 at 11:14 AM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dawn_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `automation-details`
--

DROP TABLE IF EXISTS `automation-details`;
CREATE TABLE IF NOT EXISTS `automation-details` (
  `jira-ticket` varchar(50) NOT NULL,
  `jira-summary` varchar(1000) NOT NULL,
  `automated-test-cases` varchar(2000) NOT NULL,
  `count` int(10) NOT NULL,
  `date` date NOT NULL,
  `automation-status` int(1) NOT NULL,
  PRIMARY KEY (`jira-ticket`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `automation-details`
--

INSERT INTO `automation-details` (`jira-ticket`, `jira-summary`, `automated-test-cases`, `count`, `date`, `automation-status`) VALUES
('VP-4242', 'Test Summary for Jira', 'Test Case 1;Test Case 2;Test Case 3', 3, '2018-10-20', 0);

-- --------------------------------------------------------

--
-- Table structure for table `automation-hours`
--

DROP TABLE IF EXISTS `automation-hours`;
CREATE TABLE IF NOT EXISTS `automation-hours` (
  `jira-ticket` varchar(25) NOT NULL,
  `date` date NOT NULL,
  `hours-logged` int(10) NOT NULL,
  PRIMARY KEY (`jira-ticket`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login-details`
--

DROP TABLE IF EXISTS `login-details`;
CREATE TABLE IF NOT EXISTS `login-details` (
  `numb` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `member_name` varchar(200) NOT NULL,
  PRIMARY KEY (`numb`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login-details`
--

INSERT INTO `login-details` (`numb`, `username`, `password`, `member_name`) VALUES
(1, 'vkhurana', 'Test@123', 'Vivek Khurana');

-- --------------------------------------------------------

--
-- Table structure for table `pr-details`
--

DROP TABLE IF EXISTS `pr-details`;
CREATE TABLE IF NOT EXISTS `pr-details` (
  `jira-ticket` varchar(50) NOT NULL,
  `jira-summary` varchar(1000) NOT NULL,
  `pr-no` varchar(10) NOT NULL,
  `pr-link` varchar(50) NOT NULL,
  `pr-branch` varchar(100) NOT NULL,
  `pr-status` int(2) NOT NULL,
  PRIMARY KEY (`pr-no`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pr-details`
--

INSERT INTO `pr-details` (`jira-ticket`, `jira-summary`, `pr-no`, `pr-link`, `pr-branch`, `pr-status`) VALUES
('QE-1730', 'Verify the VOD playing event', '3456', 'https://git-aws.internal.justin.tv/player-ui/3456', 'QE-1730-vod-playing-event', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pr-hours`
--

DROP TABLE IF EXISTS `pr-hours`;
CREATE TABLE IF NOT EXISTS `pr-hours` (
  `pr-no` varchar(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `hours-logged` int(20) NOT NULL,
  PRIMARY KEY (`pr-no`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pr-hours`
--

INSERT INTO `pr-hours` (`pr-no`, `username`, `date`, `hours-logged`) VALUES
('3456', 'vkhurana', '2018-06-12', 5);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
