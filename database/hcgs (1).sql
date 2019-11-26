-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 26, 2019 at 07:22 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hcgs`
--

-- --------------------------------------------------------

--
-- Table structure for table `awards`
--

DROP TABLE IF EXISTS `awards`;
CREATE TABLE IF NOT EXISTS `awards` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `student_id` int(10) UNSIGNED NOT NULL,
  `subject_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `schoolyear` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `section` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `awards_student_id_foreign` (`student_id`),
  KEY `awards_subject_id_foreign` (`subject_id`)
) ENGINE=MyISAM AUTO_INCREMENT=131 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `awards`
--

INSERT INTO `awards` (`id`, `student_id`, `subject_id`, `schoolyear`, `gender`, `section`, `created_at`, `updated_at`) VALUES
(1, 1492, 'CRE01', '2018', '', '', NULL, NULL),
(2, 1492, 'ENGL01', '2018', '', '', NULL, NULL),
(3, 1530, 'HASS01', '2018', '', '', NULL, NULL),
(4, 1530, 'MATH01', '2018', '', '', NULL, NULL),
(5, 1530, 'HEAL01', '2018', '', '', NULL, NULL),
(6, 1530, 'SCIE01', '2018', '', '', NULL, NULL),
(7, 1505, 'PE01', '2018', 'F', '', NULL, NULL),
(8, 1505, 'HEAL01', '2018', '', '', NULL, NULL),
(9, 1505, 'ARTS01', '2018', '', '', NULL, NULL),
(10, 1562, 'PE02', '2018', 'F', '', NULL, NULL),
(11, 1422, 'CRE02', '2018', '', '', NULL, NULL),
(12, 1422, 'ENGL02', '2018', '', '', NULL, NULL),
(13, 1549, 'PE02', '2018', 'M', '', NULL, NULL),
(14, 1482, 'HASS02', '2018', '', '', NULL, NULL),
(15, 1532, 'MATH02', '2018', '', '', NULL, NULL),
(16, 1532, 'HEAL02', '2018', '', '', NULL, NULL),
(17, 1532, 'SCIE02', '2018', '', '', NULL, NULL),
(18, 1532, 'ARTS02', '2018', '', '', NULL, NULL),
(19, 1522, 'HASS03', '2018', '', '', NULL, NULL),
(20, 1522, 'PE03', '2018', 'F', '', NULL, NULL),
(21, 1522, 'HEAL03', '2018', '', '', NULL, NULL),
(22, 1522, 'ARTS03', '2018', '', '', NULL, NULL),
(23, 1559, 'PE03', '2018', 'M', '', NULL, NULL),
(24, 1391, 'CRE03', '2018', '', '', NULL, NULL),
(25, 1391, 'ENGL03', '2018', '', '', NULL, NULL),
(26, 1391, 'MATH03', '2018', '', '', NULL, NULL),
(27, 1391, 'SCIE03', '2018', '', '', NULL, NULL),
(28, 1569, 'CRE04', '2018', '', '', NULL, NULL),
(29, 1569, 'MATH04', '2018', '', '', NULL, NULL),
(30, 1569, 'ARTS04', '2018', '', '', NULL, NULL),
(31, 1513, 'ENGL04', '2018', '', '', NULL, NULL),
(32, 1513, 'HASS04', '2018', '', '', NULL, NULL),
(33, 1513, 'PE04', '2018', 'M', '', NULL, NULL),
(34, 1513, 'HEAL04', '2018', '', '', NULL, NULL),
(35, 1513, 'SCIE04', '2018', '', '', NULL, NULL),
(36, 1397, 'PE04', '2018', 'F', '', NULL, NULL),
(37, 1397, 'ARTS04', '2018', '', '', NULL, NULL),
(38, 1404, 'CRE05', '2018', '', '', NULL, '2019-11-26 11:21:18'),
(39, 1404, 'ENGL05', '2018', '', '', NULL, NULL),
(40, 1404, 'HASS05', '2018', '', '', NULL, NULL),
(41, 1404, 'MAKI05', '2018', '', '', NULL, NULL),
(42, 1404, 'MATH05', '2018', '', '', NULL, NULL),
(43, 1565, 'PE05', '2018', 'F', '', NULL, '2019-11-26 11:20:21'),
(44, 1404, 'HEAL05', '2018', '', '', NULL, NULL),
(45, 1404, 'SCIE05', '2018', '', '', NULL, NULL),
(46, 1404, 'ARTS05', '2018', '', '', NULL, NULL),
(47, 1565, 'PE05', '2018', 'M', '', NULL, NULL),
(48, 1529, 'HEAL06', '2018', '', '', NULL, NULL),
(49, 1529, 'ARTS06', '2018', '', '', NULL, NULL),
(50, 1416, 'CRE06', '2018', '', '', NULL, NULL),
(51, 1416, 'ENGL06', '2018', '', '', NULL, NULL),
(52, 1416, 'PE06', '2018', 'F', '', NULL, NULL),
(53, 1416, 'ARTS06', '2018', '', '', NULL, NULL),
(54, 1529, 'ENGL06', '2018', '', '', NULL, NULL),
(55, 1529, 'HASS06', '2018', '', '', NULL, NULL),
(56, 1529, 'MAKI06', '2018', '', '', NULL, NULL),
(57, 1529, 'MATH06', '2018', '', '', NULL, NULL),
(58, 1529, 'SCIE06', '2018', '', '', NULL, NULL),
(59, 1415, 'PE06', '2018', 'M', '', NULL, NULL),
(60, 1420, 'CRE07', '2018', '', '', NULL, NULL),
(61, 1420, 'CIVI07', '2018', '', '', NULL, NULL),
(62, 1420, 'HIST07', '2018', '', '', NULL, NULL),
(63, 1420, 'MAKI07', '2018', '', '', NULL, NULL),
(64, 1420, 'MATH07', '2018', '', '', NULL, NULL),
(65, 1420, 'HEAL07', '2018', '', '', NULL, NULL),
(66, 1420, 'ENGL07', '2018', '', '', NULL, NULL),
(67, 1420, 'SCIE07', '2018', '', '', NULL, NULL),
(68, 1420, 'ARTS07', '2018', '', '', NULL, NULL),
(69, 1420, 'MATH07', '2018', '', '', NULL, NULL),
(70, 1420, 'HEAL07', '2018', '', '', NULL, NULL),
(71, 1420, 'ENGL07', '2018', '', '', NULL, NULL),
(72, 1420, 'SCIE07', '2018', '', '', NULL, NULL),
(73, 1420, 'ARTS07', '2018', '', '', NULL, NULL),
(74, 1422, 'PE07', '2018', '', '', NULL, NULL),
(75, 1424, 'HIST08', '2018', '', '', NULL, NULL),
(76, 1424, 'MATH08', '2018', '', '', NULL, NULL),
(77, 1484, 'MAKI08', '2018', '', '', NULL, NULL),
(78, 1484, 'PE08', '2018', 'F', '', NULL, NULL),
(79, 1528, 'CRE08', '2018', '', '', NULL, NULL),
(80, 1528, 'CIVI08', '2018', '', '', NULL, NULL),
(81, 1528, 'MATH08', '2018', '', '', NULL, NULL),
(82, 1528, 'HEAL08', '2018', '', '', NULL, NULL),
(83, 1528, 'ENGL08', '2018', '', '', NULL, NULL),
(84, 1528, 'SCIE08', '2018', '', '', NULL, NULL),
(85, 1528, 'ARTS08', '2018', '', '', NULL, NULL),
(86, 1427, 'PE08', '2018', 'M', '', NULL, NULL),
(87, 1568, 'AGRI09', '2018', '', '', NULL, NULL),
(88, 1568, 'CRE09', '2018', '', '', NULL, NULL),
(89, 1568, 'ENGL09', '2018', '', '', NULL, NULL),
(90, 1568, 'CIVI09', '2018', '', '', NULL, NULL),
(91, 1568, 'HIST09', '2018', '', '', NULL, NULL),
(92, 1568, 'MAKI09', '2018', '', '', NULL, NULL),
(93, 1568, 'MATH09', '2018', '', '', NULL, NULL),
(94, 1568, 'HEAL09', '2018', '', '', NULL, NULL),
(95, 1568, 'SCIE09', '2018', '', '', NULL, NULL),
(96, 1434, 'BUSI09', '2018', '', '', NULL, NULL),
(97, 1434, 'PE09', '2018', '', '', NULL, NULL),
(98, 1434, 'ARTS09', '2018', '', '', NULL, NULL),
(99, 1483, 'AGRI10', '2018', '', '', NULL, NULL),
(100, 1483, 'BUSI10', '2018', '', '', NULL, NULL),
(101, 1483, 'CRE10', '2018', '', '', NULL, NULL),
(102, 1483, 'MAKI10', '2018', '', '', NULL, NULL),
(103, 1483, 'MATH10', '2018', '', '', NULL, NULL),
(104, 1483, 'PE10', '2018', '', '', NULL, NULL),
(105, 1483, 'HEAL10', '2018', '', '', NULL, NULL),
(106, 1483, 'ARTS10', '2018', '', '', NULL, NULL),
(107, 1524, 'ENGL10', '2018', '', '', NULL, NULL),
(108, 1524, 'CIVI10', '2018', '', '', NULL, NULL),
(109, 1524, 'HIST10', '2018', '', '', NULL, NULL),
(110, 1524, 'SCIE10', '2018', '', '', NULL, NULL),
(111, 1556, 'CREJR', '2018', '\r\n', '', NULL, NULL),
(112, 1556, 'ENGLJR', '2018', '\r\n', '', NULL, NULL),
(113, 1556, 'HASSJR', '2018', '\r\n', '', NULL, NULL),
(114, 1556, 'MATHJR', '2018', '\r\n', '', NULL, NULL),
(115, 1556, 'PEJR', '2018', '\r\n', '', NULL, NULL),
(116, 1556, 'HEALJR', '2018', '\r\n', '', NULL, NULL),
(117, 1556, 'SCIEJR', '2018', '\r\n', '', NULL, NULL),
(118, 1556, 'ARTSJR', '2018', '\r\n', '', NULL, NULL),
(119, 1563, 'PEJR', '2018', '\r\n', '', NULL, NULL),
(120, 1558, 'PEPR', '2018', '\r\n', '', NULL, NULL),
(121, 1525, 'CREPR', '2018', '\r\n', '', NULL, NULL),
(122, 1525, 'PEPR', '2018', '\r\n', '', NULL, NULL),
(123, 1525, 'HEALPR', '2018', '\r\n', '', NULL, NULL),
(124, 1525, 'SCIEPR', '2018', '\r\n', '', NULL, NULL),
(125, 1525, 'ARTSPR', '2018', '\r\n', '', NULL, NULL),
(126, 1535, 'ENGLPR', '2018', '\r\n', '', NULL, NULL),
(127, 1535, 'MATHPR', '2018', '\r\n', '', NULL, NULL),
(128, 1478, 'MUSI05', '2018', '', '', NULL, NULL),
(130, 1403, 'ICT05', '2018', '', '', '2019-11-26 11:15:47', '2019-11-26 11:15:47');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
