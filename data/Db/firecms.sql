-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 11, 2021 at 01:33 AM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `firecms`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

DROP TABLE IF EXISTS `album`;
CREATE TABLE IF NOT EXISTS `album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `artist` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id`, `artist`, `title`) VALUES
(1, 'Eminem', 'Killshot'),
(2, 'Eminem', 'Love the way you lie');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
CREATE TABLE IF NOT EXISTS `log` (
  `logId` int(11) NOT NULL AUTO_INCREMENT,
  `extra_userId` int(11) DEFAULT NULL,
  `fileId` int(11) NOT NULL DEFAULT '0',
  `userName` varchar(255) DEFAULT NULL,
  `timeStamp` varchar(255) NOT NULL,
  `priorityName` varchar(20) NOT NULL,
  `priority` int(1) NOT NULL,
  `message` longtext NOT NULL,
  `extra_referenceId` tinytext,
  `extra_errno` tinytext,
  `extra_file` text,
  `extra_line` int(11) DEFAULT NULL,
  `extra_trace` int(11) DEFAULT NULL,
  PRIMARY KEY (`logId`),
  UNIQUE KEY `userId` (`extra_userId`)
) ENGINE=InnoDB AUTO_INCREMENT=133 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`logId`, `extra_userId`, `fileId`, `userName`, `timeStamp`, `priorityName`, `priority`, `message`, `extra_referenceId`, `extra_errno`, `extra_file`, `extra_line`, `extra_trace`) VALUES
(1, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'role\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 55, NULL),
(2, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'role\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 55, NULL),
(3, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'appName\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 10, NULL),
(4, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'appName\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 10, NULL),
(5, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'role\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 55, NULL),
(6, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'role\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 55, NULL),
(7, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'appName\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 10, NULL),
(8, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'appName\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 10, NULL),
(9, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'role\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 55, NULL),
(10, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'role\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 55, NULL),
(11, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'appName\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 10, NULL),
(12, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'appName\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 10, NULL),
(13, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'role\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 55, NULL),
(14, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'role\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 55, NULL),
(15, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'role\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 55, NULL),
(16, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'role\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 55, NULL),
(17, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'role\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 55, NULL),
(18, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'role\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 55, NULL),
(19, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'role\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 55, NULL),
(20, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'role\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 55, NULL),
(21, NULL, 0, NULL, '', 'NOTICE', 5, 'Undefined variable: form', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\User\\view\\user\\user\\login.phtml', 7, NULL),
(22, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'appName\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 10, NULL),
(23, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'seoKeyWords\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 13, NULL),
(24, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'role\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 55, NULL),
(25, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'copyRightLink\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 83, NULL),
(26, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'copyRightText\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 83, NULL),
(27, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'footerText\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 83, NULL),
(28, NULL, 0, NULL, '', 'NOTICE', 5, 'Undefined variable: return', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\src\\Model\\SettingsTable.php', 87, NULL),
(29, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'appName\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 10, NULL),
(30, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'seoKeyWords\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 13, NULL),
(31, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'role\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 55, NULL),
(32, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'copyRightLink\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 83, NULL),
(33, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'copyRightText\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 83, NULL),
(34, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'footerText\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 83, NULL),
(35, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'appName\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 10, NULL),
(36, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'seoKeyWords\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 13, NULL),
(37, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'role\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 55, NULL),
(38, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'copyRightLink\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 83, NULL),
(39, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'copyRightText\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 83, NULL),
(40, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'footerText\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 83, NULL),
(41, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'appName\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 10, NULL),
(42, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'seoKeyWords\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 13, NULL),
(43, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'role\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 55, NULL),
(44, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'copyRightLink\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 83, NULL),
(45, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'copyRightText\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 83, NULL),
(46, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'footerText\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 83, NULL),
(47, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'appName\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 10, NULL),
(48, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'seoKeyWords\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 13, NULL),
(49, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'role\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 55, NULL),
(50, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'copyRightLink\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 83, NULL),
(51, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'copyRightText\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 83, NULL),
(52, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'footerText\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 83, NULL),
(53, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'appName\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 10, NULL),
(54, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'seoKeyWords\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 13, NULL),
(55, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'role\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 55, NULL),
(56, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'copyRightLink\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 83, NULL),
(57, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'copyRightText\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 83, NULL),
(58, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'footerText\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 83, NULL),
(59, NULL, 0, NULL, '', 'NOTICE', 5, 'Undefined variable: return', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\src\\Model\\SettingsTable.php', 87, NULL),
(60, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'appName\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 10, NULL),
(61, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'seoKeyWords\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 13, NULL),
(62, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'role\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 55, NULL),
(63, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'copyRightLink\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 83, NULL),
(64, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'copyRightText\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 83, NULL),
(65, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'footerText\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 83, NULL),
(66, NULL, 0, NULL, '', 'NOTICE', 5, 'Undefined variable: return', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\src\\Model\\SettingsTable.php', 87, NULL),
(67, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'appName\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 10, NULL),
(68, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'seoKeyWords\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 13, NULL),
(69, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'role\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 55, NULL),
(70, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'copyRightLink\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 83, NULL),
(71, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'copyRightText\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 83, NULL),
(72, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'footerText\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 83, NULL),
(73, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'appName\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 10, NULL),
(74, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'seoKeyWords\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 13, NULL),
(75, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'role\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 55, NULL),
(76, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'copyRightLink\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 83, NULL),
(77, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'copyRightText\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 83, NULL),
(78, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'footerText\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 83, NULL),
(79, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'appName\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 10, NULL),
(80, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'seoKeyWords\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 13, NULL),
(81, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'role\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 55, NULL),
(82, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'copyRightLink\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 83, NULL),
(83, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'copyRightText\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 83, NULL),
(84, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'footerText\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 83, NULL),
(85, NULL, 0, NULL, '', 'NOTICE', 5, 'Undefined variable: return', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\src\\Model\\SettingsTable.php', 87, NULL),
(86, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'appName\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 10, NULL),
(87, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'seoKeyWords\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 13, NULL),
(88, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'role\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 55, NULL),
(89, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'copyRightLink\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 83, NULL),
(90, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'copyRightText\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 83, NULL),
(91, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'footerText\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 83, NULL),
(92, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'appName\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 10, NULL),
(93, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'seoKeyWords\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 13, NULL),
(94, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'role\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 55, NULL),
(95, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'copyRightLink\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 83, NULL),
(96, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'copyRightText\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 83, NULL),
(97, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'footerText\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 83, NULL),
(98, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'appName\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 10, NULL),
(99, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'seoKeyWords\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 13, NULL),
(100, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'role\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 55, NULL),
(101, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'copyRightLink\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 83, NULL),
(102, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'copyRightText\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 83, NULL),
(103, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'footerText\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 83, NULL),
(104, NULL, 0, NULL, '', 'NOTICE', 5, 'Undefined variable: form', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\User\\view\\user\\user\\login.phtml', 7, NULL),
(105, NULL, 0, NULL, '', 'NOTICE', 5, 'Undefined variable: form', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\User\\view\\user\\user\\login.phtml', 7, NULL),
(106, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'appName\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 10, NULL),
(107, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'seoKeyWords\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 13, NULL),
(108, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'role\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 55, NULL),
(109, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'copyRightLink\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 83, NULL),
(110, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'copyRightText\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 83, NULL),
(111, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'footerText\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 83, NULL),
(112, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'appName\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 10, NULL),
(113, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'seoKeyWords\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 13, NULL),
(114, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'role\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 55, NULL),
(115, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'copyRightLink\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 83, NULL),
(116, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'copyRightText\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 83, NULL),
(117, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'footerText\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 83, NULL),
(118, NULL, 0, NULL, '', 'NOTICE', 5, 'Undefined variable: form', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\User\\view\\user\\user\\login.phtml', 7, NULL),
(119, NULL, 0, NULL, '', 'NOTICE', 5, 'Undefined variable: form', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\User\\view\\user\\user\\login.phtml', 7, NULL),
(120, NULL, 0, NULL, '', 'NOTICE', 5, 'Undefined variable: form', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\User\\view\\user\\user\\login.phtml', 7, NULL),
(121, NULL, 0, NULL, '', 'NOTICE', 5, 'Undefined variable: form', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\User\\view\\user\\user\\login.phtml', 7, NULL),
(122, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'appName\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 10, NULL),
(123, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'seoKeyWords\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 13, NULL),
(124, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'role\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 55, NULL),
(125, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'copyRightLink\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 83, NULL),
(126, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'copyRightText\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 83, NULL),
(127, NULL, 0, NULL, '', 'NOTICE', 5, 'Trying to get property \'footerText\' of non-object', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\Application\\view\\layout\\layout.phtml', 83, NULL),
(128, NULL, 0, NULL, '', 'NOTICE', 5, 'Undefined variable: form', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\User\\view\\user\\user\\login.phtml', 7, NULL),
(129, NULL, 0, NULL, '', 'NOTICE', 5, 'Undefined variable: form', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\User\\view\\user\\user\\login.phtml', 7, NULL),
(130, NULL, 0, NULL, '', 'NOTICE', 5, 'Undefined variable: form', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\User\\view\\user\\user\\login.phtml', 7, NULL),
(131, NULL, 0, NULL, '', 'NOTICE', 5, 'Undefined variable: form', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\User\\view\\user\\user\\login.phtml', 7, NULL),
(132, NULL, 0, NULL, '', 'NOTICE', 5, 'Undefined variable: form', NULL, '8', 'C:\\Evan-Dev\\FireCMS\\module\\User\\view\\user\\user\\login.phtml', 7, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `variable` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `settingType` tinytext NOT NULL,
  `label` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `regDate` datetime DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  `verified` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `userName`, `email`, `password`, `role`, `regDate`, `active`, `verified`) VALUES
(3, 'EvolveCMS', 'firecms@fireevolve.com', '$2y$10$t/GsMFKovZfHNztvM1rkO.Og9zdGd2Ypp41sp2Vr7J/lStYJtuSiW', 'admin', NULL, 1, 1),
(4, 'test2', 'test2@domain.com', '$2y$10$6U0wm97snLicsIf4rw3/W.qg6oPlOZE0bGk2CpkRFw37jJRdPUjui', NULL, NULL, NULL, NULL),
(5, 'Fire1659', 'eevansocom@gmail.com', '$2y$10$KJ7N.q9xuriIqXsiumfisOT1nqPQ0vOWUVs6vFapdjHxMay5N.vpS', 'user', NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

DROP TABLE IF EXISTS `user_profile`;
CREATE TABLE IF NOT EXISTS `user_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `avatarPath` mediumtext NOT NULL,
  `age` int(11) NOT NULL,
  `birthday` varchar(10) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `race` varchar(255) NOT NULL,
  `bio` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `userId` (`userId`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`id`, `userId`, `firstName`, `lastName`, `avatarPath`, `age`, `birthday`, `gender`, `race`, `bio`) VALUES
(2, 3, 'Chris', 'Alexander', 'test', 22, '05/25/1999', 'male', 'white', '22'),
(3, 5, 'Evan', 'Alexander', 'test', 22, '05/25/1999', 'male', 'white', 'test');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `log_ibfk_1` FOREIGN KEY (`extra_userId`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD CONSTRAINT `user_profile_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
