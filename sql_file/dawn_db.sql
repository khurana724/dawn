-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 06, 2018 at 08:11 PM
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
  `pr-link` varchar(50) NOT NULL,
  `pr-branch` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  PRIMARY KEY (`pr-link`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pr-details`
--

INSERT INTO `pr-details` (`jira-ticket`, `jira-summary`, `pr-link`, `pr-branch`, `username`) VALUES
('QE-1730', 'Verify the vod playing event', 'https://git-aws.internal.justin.tv/player-ui/3456', 'QE-1730-vod-playing-event', 'vkhurana'),
('QE-1729', 'Verify the stream playing event', 'https://git-aws.internal.justin.tv/player-ui/3466', 'QE-1730-vod-playing', 'vkhurana');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
