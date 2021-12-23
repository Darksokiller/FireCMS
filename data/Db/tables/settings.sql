-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 04, 2021 at 02:46 AM
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
-- Database: `aurora-laminas`
--

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
  PRIMARY KEY (`id`),
  KEY `variable` (`variable`,`value`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `variable`, `value`, `settingType`, `label`) VALUES
(1, 'allowedTags', '<h1>,<h2>,<h3>,<h4>,<h5>,<h6>,<hr>', 'text', 'Allowed Tags'),
(2, 'enableCaptchaSupport', '1', 'Checkbox', 'Enable Captcha Support'),
(3, 'recaptchaPrivateKey', '6Lewcs0SAAAAAGfBkJsG1mxf-yGFUjq9JgglSwRL', 'text', 'Recaptcha Private Key'),
(4, 'recaptchaPrivateKey', '6Lewcs0SAAAAAGfBkJsG1mxf-yGFUjq9JgglSwRL', 'text', 'Recaptcha Public Key'),
(5, 'seoKeyWords', 'Aurora CMS, Webinertia.net, Php, MySQL', 'text', 'SEO Key Words'),
(6, 'appName', 'Aurora CMS', 'Text', 'Application Name'),
(7, 'smtpSenderAddress', 'devel@webinertia.net', 'Text', 'SMTP Sender Email'),
(8, 'smtpSenderPasswd', '**bffbGfbd88**', 'Text', 'SMTP Sender Password'),
(9, 'appContactEmail', 'jsmith@dirextion.com', 'Text', 'Website Contact Email'),
(10, 'enableMobileSupport', '1', 'CheckBox', 'Enable Mobile App support'),
(11, 'seoDescription', 'Aurora Content Management System', 'text', 'SEO Description'),
(12, 'facebookAppId', '431812843521907', 'Text', 'Facebook App ID'),
(13, 'faceBookSecretKey', 'd86702c59bd48f3a76bc57d923cd237e', 'Text', 'Facebook App Secret Key'),
(14, 'enableFacebookPageLink', '1', 'CheckBox', 'Enable Facebook Page Link'),
(15, 'enableFacebookOg', '0', 'Checkbox', 'Enable Facebook Open Graph Support'),
(16, 'sessionLength', '86400', 'Text', 'Session Length (default is 1 day)'),
(17, 'enableOnlineList', '1', 'Checkbox', 'Enable Online List'),
(18, 'enableLogging', '1', 'Checkbox', 'Enable Logging'),
(19, 'enableHomeTab', '1', 'Checkbox', 'Enable Home Menu Tab'),
(20, 'enableLinkedLogo', '1', 'Checkbox', 'Enable Linked Logo'),
(21, 'disableLogin', '0', 'checkbox', 'Disable User Login'),
(22, 'disableRegistration', '0', 'checkbox', 'Disable Registration'),
(23, 'timeFormat', 'm-j-Y g:i:s', 'text', 'Time Format (Month:Day:Year:Hr:Min:sec)'),
(24, 'timeZone', 'America/Chicago', 'text', 'Time Zone'),
(25, 'copyRightText', 'Aurora Content Management Systems', 'text', 'Site Copyright Text'),
(26, 'copyRightLink', 'http://webinertia.net/aurora', 'text', 'Copyright Link (If any)'),
(27, 'footerText', 'Developed by Webinertia Data Systems', 'text', 'Footer Text (Next to copyright)');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
