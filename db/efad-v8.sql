-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 12, 2019 at 12:45 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `efad`
--

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `album_uid` int(11) NOT NULL,
  `album_name` varchar(255) NOT NULL,
  `album_link` varchar(255) NOT NULL,
  `album_gallery` tinyint(1) NOT NULL DEFAULT '1',
  `album_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`album_uid`, `album_name`, `album_link`, `album_gallery`, `album_code`) VALUES
(1, 'album_name_vertex_1562121844', 'kia-cerato-red-2018', 1, '_vertex_1562121844');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `blog_uid` int(11) NOT NULL,
  `blog_code` varchar(100) NOT NULL,
  `blog_link` varchar(255) NOT NULL,
  `blog_title` varchar(255) NOT NULL,
  `blog_text` text NOT NULL,
  `blog_image` varchar(255) NOT NULL,
  `blog_meta_desc` varchar(255) NOT NULL,
  `blog_meta_keywords` text NOT NULL,
  `blog_add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `car_uid` int(11) NOT NULL,
  `car_link` varchar(255) NOT NULL,
  `cc_uid` int(11) NOT NULL,
  `ct_uid` int(11) NOT NULL,
  `cb_uid` int(11) NOT NULL,
  `car_model_year` int(11) NOT NULL,
  `car_model_name` varchar(255) NOT NULL,
  `car_color` varchar(20) NOT NULL,
  `album_uid` int(11) NOT NULL,
  `car_plate_number` varchar(255) NOT NULL,
  `car_engine_litre` varchar(255) NOT NULL,
  `car_drivetrain` varchar(255) NOT NULL,
  `car_transmission` varchar(255) NOT NULL,
  `car_doors` int(11) NOT NULL,
  `car_persons` int(11) NOT NULL,
  `car_bags` int(11) NOT NULL,
  `car_features` varchar(255) NOT NULL,
  `car_daily_price` decimal(10,0) NOT NULL,
  `car_monthly_price` decimal(10,0) NOT NULL,
  `car_yearly_price` decimal(10,0) NOT NULL,
  `has_offer` tinyint(1) NOT NULL,
  `new_car` tinyint(1) NOT NULL,
  `next_maintenance_date` date NOT NULL,
  `car_status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`car_uid`, `car_link`, `cc_uid`, `ct_uid`, `cb_uid`, `car_model_year`, `car_model_name`, `car_color`, `album_uid`, `car_plate_number`, `car_engine_litre`, `car_drivetrain`, `car_transmission`, `car_doors`, `car_persons`, `car_bags`, `car_features`, `car_daily_price`, `car_monthly_price`, `car_yearly_price`, `has_offer`, `new_car`, `next_maintenance_date`, `car_status`) VALUES
(1, 'سيراتو-3520', 2, 2, 1, 2018, 'سيراتو', '5', 1, 'XXX124', '2.0', '4x4', 'manual', 4, 5, 1, 'test', '100', '90', '80', 0, 0, '2019-08-22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cars_brands`
--

CREATE TABLE `cars_brands` (
  `cb_uid` int(11) NOT NULL,
  `cb_code` varchar(100) NOT NULL,
  `cb_link` varchar(255) NOT NULL,
  `cb_name` varchar(255) NOT NULL,
  `cb_image` varchar(255) NOT NULL,
  `cb_meta_desc` varchar(255) NOT NULL,
  `cb_meta_keywords` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cars_brands`
--

INSERT INTO `cars_brands` (`cb_uid`, `cb_code`, `cb_link`, `cb_name`, `cb_image`, `cb_meta_desc`, `cb_meta_keywords`) VALUES
(1, '_vertex_1561903544', 'kia', 'cb_name_vertex_1561903544', '53705a97e7aa69048f694db2146d2c59.gif', 'cb_meta_desc_vertex_1561903544', 'cb_meta_keywords_vertex_1561903544');

-- --------------------------------------------------------

--
-- Table structure for table `cars_categories`
--

CREATE TABLE `cars_categories` (
  `cc_uid` int(11) NOT NULL,
  `cc_code` varchar(100) NOT NULL,
  `cc_link` varchar(255) NOT NULL,
  `cc_name` varchar(255) NOT NULL,
  `cc_meta_desc` varchar(255) NOT NULL,
  `cc_meta_keywords` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cars_categories`
--

INSERT INTO `cars_categories` (`cc_uid`, `cc_code`, `cc_link`, `cc_name`, `cc_meta_desc`, `cc_meta_keywords`) VALUES
(1, '_vertex_1560362499', 'economic', 'cc_name_vertex_1560362499', 'cc_meta_desc_vertex_1560362499', 'cc_meta_keywords_vertex_1560362499'),
(2, '_vertex_1560362522', 'medium', 'cc_name_vertex_1560362522', 'cc_meta_desc_vertex_1560362522', 'cc_meta_keywords_vertex_1560362522'),
(3, '_vertex_1560362554', 'small', 'cc_name_vertex_1560362554', 'cc_meta_desc_vertex_1560362554', 'cc_meta_keywords_vertex_1560362554');

-- --------------------------------------------------------

--
-- Table structure for table `cars_colors`
--

CREATE TABLE `cars_colors` (
  `cco_uid` int(11) NOT NULL,
  `cco_code` varchar(100) NOT NULL,
  `cco_link` varchar(255) NOT NULL,
  `cco_name` varchar(255) NOT NULL,
  `cco_meta_desc` varchar(255) NOT NULL,
  `cco_meta_keywords` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cars_colors`
--

INSERT INTO `cars_colors` (`cco_uid`, `cco_code`, `cco_link`, `cco_name`, `cco_meta_desc`, `cco_meta_keywords`) VALUES
(1, '', '', 'أخضر', '', ''),
(2, '', '', 'أبيض', '', ''),
(3, '', '', 'أصفر', '', ''),
(4, '', '', 'أزرق', '', ''),
(5, '', '', 'أحمر', '', ''),
(6, '', '', 'ذهبي', '', ''),
(7, '', '', 'فضي', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `cars_types`
--

CREATE TABLE `cars_types` (
  `ct_uid` int(11) NOT NULL,
  `ct_code` varchar(100) NOT NULL,
  `ct_link` varchar(255) NOT NULL,
  `ct_name` varchar(255) NOT NULL,
  `ct_image` varchar(255) NOT NULL,
  `ct_meta_desc` varchar(255) NOT NULL,
  `ct_meta_keywords` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cars_types`
--

INSERT INTO `cars_types` (`ct_uid`, `ct_code`, `ct_link`, `ct_name`, `ct_image`, `ct_meta_desc`, `ct_meta_keywords`) VALUES
(2, '_vertex_1560642926', 'sport', 'ct_name_vertex_1560642926', '5c5151498bb488b85a8b03a4aa40a59a.png', 'ct_meta_desc_vertex_1560642926', 'ct_meta_keywords_vertex_1560642926');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `city_uid` int(11) NOT NULL,
  `country_uid` int(11) NOT NULL DEFAULT '187',
  `city_name_ar` varchar(100) NOT NULL,
  `city_name_en` varchar(100) NOT NULL,
  `city_add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`city_uid`, `country_uid`, `city_name_ar`, `city_name_en`, `city_add_date`) VALUES
(1, 187, 'الرياض', 'Riyadh', '2019-07-09 17:23:24'),
(2, 187, 'مكة', 'Mecca', '2019-07-09 17:23:24'),
(3, 187, 'المدينة المنورة', 'Medina', '2019-07-09 17:23:24'),
(4, 187, 'حائل', 'Hail', '2019-07-09 17:23:24'),
(5, 187, 'القطيف', 'Qatif', '2019-07-09 17:23:24');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('01ce60ef18c9bee409b92573288e92d9e62d6fad', '::1', 1562885129, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323838353132303b736974654e616d657c733a383a22d8a5d981d8a7d8af223b736974654d657461446573637c733a343a2274657374223b736974654d6574614b577c733a343a2274657374223b7369746550657250616765506167696e6174696f6e7c733a333a22313030223b6d657373616765737c613a303a7b7d61646d696e5f66756c6c5f6e616d657c733a32373a22d8a7d8a8d8b1d8a7d987d98ad98520d8a7d984d8b5d8a7d988d98a223b61646d696e5f7569647c733a313a2237223b61646d696e5f67726f75707c733a313a2231223b69735f6c6f676765645f696e7c623a313b),
('0616eb5bf38fb873fbfde545c43f783f75323b08', '::1', 1562879199, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323837383935313b736974654e616d657c733a383a22d8a5d981d8a7d8af223b736974654d657461446573637c733a343a2274657374223b736974654d6574614b577c733a343a2274657374223b7369746550657250616765506167696e6174696f6e7c733a333a22313030223b6d657373616765737c613a303a7b7d61646d696e5f66756c6c5f6e616d657c733a32373a22d8a7d8a8d8b1d8a7d987d98ad98520d8a7d984d8b5d8a7d988d98a223b61646d696e5f7569647c733a313a2237223b61646d696e5f67726f75707c733a313a2231223b69735f6c6f676765645f696e7c623a313b),
('3eb1bfbb2a819a57f87c8aa7eb0f4471609023d6', '::1', 1562881778, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323838313438353b736974654e616d657c733a383a22d8a5d981d8a7d8af223b736974654d657461446573637c733a343a2274657374223b736974654d6574614b577c733a343a2274657374223b7369746550657250616765506167696e6174696f6e7c733a333a22313030223b6d657373616765737c613a303a7b7d61646d696e5f66756c6c5f6e616d657c733a32373a22d8a7d8a8d8b1d8a7d987d98ad98520d8a7d984d8b5d8a7d988d98a223b61646d696e5f7569647c733a313a2237223b61646d696e5f67726f75707c733a313a2231223b69735f6c6f676765645f696e7c623a313b),
('4e580eb1cf24142412ba5f9fcb4f76659d862c9c', '::1', 1562880734, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323838303434343b736974654e616d657c733a383a22d8a5d981d8a7d8af223b736974654d657461446573637c733a343a2274657374223b736974654d6574614b577c733a343a2274657374223b7369746550657250616765506167696e6174696f6e7c733a333a22313030223b6d657373616765737c613a303a7b7d61646d696e5f66756c6c5f6e616d657c733a32373a22d8a7d8a8d8b1d8a7d987d98ad98520d8a7d984d8b5d8a7d988d98a223b61646d696e5f7569647c733a313a2237223b61646d696e5f67726f75707c733a313a2231223b69735f6c6f676765645f696e7c623a313b),
('6c0ec831e4bdcb32cbb470d92fd32e91cb756e80', '::1', 1562885044, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323838343830373b736974654e616d657c733a383a22d8a5d981d8a7d8af223b736974654d657461446573637c733a343a2274657374223b736974654d6574614b577c733a343a2274657374223b7369746550657250616765506167696e6174696f6e7c733a333a22313030223b6d657373616765737c613a303a7b7d61646d696e5f66756c6c5f6e616d657c733a32373a22d8a7d8a8d8b1d8a7d987d98ad98520d8a7d984d8b5d8a7d988d98a223b61646d696e5f7569647c733a313a2237223b61646d696e5f67726f75707c733a313a2231223b69735f6c6f676765645f696e7c623a313b),
('787f58820c703fa6a52d860f00d1ee680d4b1ce6', '::1', 1562879871, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323837393633363b736974654e616d657c733a383a22d8a5d981d8a7d8af223b736974654d657461446573637c733a343a2274657374223b736974654d6574614b577c733a343a2274657374223b7369746550657250616765506167696e6174696f6e7c733a333a22313030223b6d657373616765737c613a303a7b7d61646d696e5f66756c6c5f6e616d657c733a32373a22d8a7d8a8d8b1d8a7d987d98ad98520d8a7d984d8b5d8a7d988d98a223b61646d696e5f7569647c733a313a2237223b61646d696e5f67726f75707c733a313a2231223b69735f6c6f676765645f696e7c623a313b),
('7ff67a6a8eb18c232611db7d7aefdea1e4c244f7', '::1', 1562881056, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323838303737323b736974654e616d657c733a383a22d8a5d981d8a7d8af223b736974654d657461446573637c733a343a2274657374223b736974654d6574614b577c733a343a2274657374223b7369746550657250616765506167696e6174696f6e7c733a333a22313030223b6d657373616765737c613a303a7b7d61646d696e5f66756c6c5f6e616d657c733a32373a22d8a7d8a8d8b1d8a7d987d98ad98520d8a7d984d8b5d8a7d988d98a223b61646d696e5f7569647c733a313a2237223b61646d696e5f67726f75707c733a313a2231223b69735f6c6f676765645f696e7c623a313b),
('88fdfda0517ca6bd62807f7f1387383e3a09e23a', '::1', 1562878210, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323837383030333b736974654e616d657c733a383a22d8a5d981d8a7d8af223b736974654d657461446573637c733a343a2274657374223b736974654d6574614b577c733a343a2274657374223b7369746550657250616765506167696e6174696f6e7c733a333a22313030223b6d657373616765737c613a303a7b7d61646d696e5f66756c6c5f6e616d657c733a32373a22d8a7d8a8d8b1d8a7d987d98ad98520d8a7d984d8b5d8a7d988d98a223b61646d696e5f7569647c733a313a2237223b61646d696e5f67726f75707c733a313a2231223b69735f6c6f676765645f696e7c623a313b),
('8e57763d2e5c33bba330e264e187dc7861181c50', '::1', 1562881298, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323838313133333b736974654e616d657c733a383a22d8a5d981d8a7d8af223b736974654d657461446573637c733a343a2274657374223b736974654d6574614b577c733a343a2274657374223b7369746550657250616765506167696e6174696f6e7c733a333a22313030223b6d657373616765737c613a303a7b7d61646d696e5f66756c6c5f6e616d657c733a32373a22d8a7d8a8d8b1d8a7d987d98ad98520d8a7d984d8b5d8a7d988d98a223b61646d696e5f7569647c733a313a2237223b61646d696e5f67726f75707c733a313a2231223b69735f6c6f676765645f696e7c623a313b),
('baa110a7c4f2f462c3466d2f9d9751f0da6a8a87', '::1', 1562878632, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323837383434363b736974654e616d657c733a383a22d8a5d981d8a7d8af223b736974654d657461446573637c733a343a2274657374223b736974654d6574614b577c733a343a2274657374223b7369746550657250616765506167696e6174696f6e7c733a333a22313030223b6d657373616765737c613a303a7b7d61646d696e5f66756c6c5f6e616d657c733a32373a22d8a7d8a8d8b1d8a7d987d98ad98520d8a7d984d8b5d8a7d988d98a223b61646d696e5f7569647c733a313a2237223b61646d696e5f67726f75707c733a313a2231223b69735f6c6f676765645f696e7c623a313b),
('c1f04a0158a303e021ee8b419896ec2bc6b8d478', '::1', 1562880421, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323838303036363b736974654e616d657c733a383a22d8a5d981d8a7d8af223b736974654d657461446573637c733a343a2274657374223b736974654d6574614b577c733a343a2274657374223b7369746550657250616765506167696e6174696f6e7c733a333a22313030223b6d657373616765737c613a303a7b7d61646d696e5f66756c6c5f6e616d657c733a32373a22d8a7d8a8d8b1d8a7d987d98ad98520d8a7d984d8b5d8a7d988d98a223b61646d696e5f7569647c733a313a2237223b61646d696e5f67726f75707c733a313a2231223b69735f6c6f676765645f696e7c623a313b),
('c3c05cbb59baa2415a2fd738a201dc8a699d8ef1', '::1', 1562879587, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323837393331313b736974654e616d657c733a383a22d8a5d981d8a7d8af223b736974654d657461446573637c733a343a2274657374223b736974654d6574614b577c733a343a2274657374223b7369746550657250616765506167696e6174696f6e7c733a333a22313030223b6d657373616765737c613a303a7b7d61646d696e5f66756c6c5f6e616d657c733a32373a22d8a7d8a8d8b1d8a7d987d98ad98520d8a7d984d8b5d8a7d988d98a223b61646d696e5f7569647c733a313a2237223b61646d696e5f67726f75707c733a313a2231223b69735f6c6f676765645f696e7c623a313b),
('cf4019de2aac684fcf5b0eac74dbf10de9a1627b', '::1', 1562881871, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323838313831303b736974654e616d657c733a383a22d8a5d981d8a7d8af223b736974654d657461446573637c733a343a2274657374223b736974654d6574614b577c733a343a2274657374223b7369746550657250616765506167696e6174696f6e7c733a333a22313030223b6d657373616765737c613a303a7b7d61646d696e5f66756c6c5f6e616d657c733a32373a22d8a7d8a8d8b1d8a7d987d98ad98520d8a7d984d8b5d8a7d988d98a223b61646d696e5f7569647c733a313a2237223b61646d696e5f67726f75707c733a313a2231223b69735f6c6f676765645f696e7c623a313b);

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `siteID` int(11) NOT NULL,
  `siteName` varchar(30) NOT NULL,
  `siteMetaDesc` text NOT NULL,
  `siteMetaKW` text NOT NULL,
  `siteCopyRights` varchar(255) NOT NULL,
  `siteDefaultDate` tinyint(1) NOT NULL,
  `siteSendStatue` tinyint(1) NOT NULL,
  `siteUsersGroupsLimit` int(11) NOT NULL,
  `siteSendCampaignLimit` int(11) NOT NULL,
  `siteStatue` tinyint(4) NOT NULL,
  `siteOpenDate` datetime NOT NULL,
  `siteOfflineMSG` text NOT NULL,
  `siteEmail` varchar(255) NOT NULL,
  `siteFacebook` varchar(255) NOT NULL,
  `siteTwitter` varchar(255) NOT NULL,
  `siteGoogle` varchar(255) NOT NULL,
  `siteLink` varchar(255) NOT NULL,
  `siteTel` varchar(50) NOT NULL,
  `siteAddress` varchar(255) NOT NULL,
  `siteMap` text NOT NULL,
  `siteAnalytics` text NOT NULL,
  `siteAlexa` varchar(255) NOT NULL,
  `siteSMTPhost` varchar(255) NOT NULL,
  `siteSMTPport` int(11) NOT NULL,
  `siteSMTPuname` varchar(255) NOT NULL,
  `siteSMTPpwd` varchar(255) NOT NULL,
  `siteSMTPsenderName` varchar(255) NOT NULL,
  `siteRegisterStatue` tinyint(1) NOT NULL,
  `siteDefaultCredit` int(11) NOT NULL,
  `siteRegisterAdminActivation` tinyint(1) NOT NULL,
  `siteRegisterEmailActivation` tinyint(1) NOT NULL,
  `siteRegisterMessage` text NOT NULL,
  `siteActivationMessage` text NOT NULL,
  `sitePerPagePagination` int(10) NOT NULL,
  `siteProfileIdGanalytics` int(11) NOT NULL,
  `siteEmailGanalytics` varchar(30) NOT NULL,
  `sitePasswordGanalytics` varchar(18) NOT NULL,
  `siteTimeZone` varchar(10) NOT NULL,
  `siteDayLight` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`siteID`, `siteName`, `siteMetaDesc`, `siteMetaKW`, `siteCopyRights`, `siteDefaultDate`, `siteSendStatue`, `siteUsersGroupsLimit`, `siteSendCampaignLimit`, `siteStatue`, `siteOpenDate`, `siteOfflineMSG`, `siteEmail`, `siteFacebook`, `siteTwitter`, `siteGoogle`, `siteLink`, `siteTel`, `siteAddress`, `siteMap`, `siteAnalytics`, `siteAlexa`, `siteSMTPhost`, `siteSMTPport`, `siteSMTPuname`, `siteSMTPpwd`, `siteSMTPsenderName`, `siteRegisterStatue`, `siteDefaultCredit`, `siteRegisterAdminActivation`, `siteRegisterEmailActivation`, `siteRegisterMessage`, `siteActivationMessage`, `sitePerPagePagination`, `siteProfileIdGanalytics`, `siteEmailGanalytics`, `sitePasswordGanalytics`, `siteTimeZone`, `siteDayLight`) VALUES
(0, 'إفاد', 'test', 'test', '&copy; Copyright 2019, Efad ', 2, 1, 5000, 5, 1, '0000-00-00 00:00:00', 'sorry site closed', 'info@test.com', '', '', '', 'www.test.com', '0000000000', 'test', 'edfe', '', '', '', 25, '', '', 'test', 1, 5, 0, 0, 'test', 'test', 100, 82396940, 'admin@test.com', '', 'UP2', 0);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `iso` char(2) CHARACTER SET latin1 NOT NULL,
  `name` varchar(80) NOT NULL,
  `nicename` varchar(80) CHARACTER SET latin1 NOT NULL,
  `iso3` char(3) CHARACTER SET latin1 DEFAULT NULL,
  `numcode` smallint(6) DEFAULT NULL,
  `phonecode` int(5) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `country_add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `iso`, `name`, `nicename`, `iso3`, `numcode`, `phonecode`, `status`, `country_add_date`) VALUES
(1, 'AF', 'أفغانستان', 'Afghanistan', 'AFG', 4, 93, 0, '2019-03-14 20:16:58'),
(2, 'AL', 'ألبانيا', 'Albania', 'ALB', 8, 355, 0, '2019-03-14 20:16:58'),
(3, 'DZ', 'الجزائر', 'Algeria', 'DZA', 12, 213, 0, '2019-03-14 20:16:58'),
(4, 'AS', 'ساموا الأمريكية', 'American Samoa', 'ASM', 16, 1684, 0, '2019-03-14 20:16:58'),
(5, 'AD', 'أندورا', 'Andorra', 'AND', 20, 376, 0, '2019-03-14 20:16:58'),
(6, 'AO', 'أنجولا', 'Angola', 'AGO', 24, 244, 0, '2019-03-14 20:16:58'),
(7, 'AI', 'أنغيلا', 'Anguilla', 'AIA', 660, 1264, 0, '2019-03-14 20:16:58'),
(9, 'AG', 'أنتيغوا وبربودا', 'Antigua and Barbuda', 'ATG', 28, 1268, 0, '2019-03-14 20:16:58'),
(10, 'AR', 'الأرجنتين', 'Argentina', 'ARG', 32, 54, 0, '2019-03-14 20:16:58'),
(11, 'AM', 'أرمينيا', 'Armenia', 'ARM', 51, 374, 0, '2019-03-14 20:16:58'),
(12, 'AW', 'أروبا', 'Aruba', 'ABW', 533, 297, 0, '2019-03-14 20:16:58'),
(13, 'AU', 'أستراليا', 'Australia', 'AUS', 36, 61, 0, '2019-03-14 20:16:58'),
(14, 'AT', 'النمسا', 'Austria', 'AUT', 40, 43, 0, '2019-03-14 20:16:58'),
(15, 'AZ', 'أذربيجان', 'Azerbaijan', 'AZE', 31, 994, 0, '2019-03-14 20:16:58'),
(16, 'BS', 'جزر البهاما', 'Bahamas', 'BHS', 44, 1242, 0, '2019-03-14 20:16:58'),
(17, 'BH', 'البحرين', 'Bahrain', 'BHR', 48, 973, 0, '2019-03-14 20:16:58'),
(18, 'BD', 'بنغلاديش', 'Bangladesh', 'BGD', 50, 880, 0, '2019-03-14 20:16:58'),
(19, 'BB', 'بربادوس', 'Barbados', 'BRB', 52, 1246, 0, '2019-03-14 20:16:58'),
(20, 'BY', 'روسيا البيضاء', 'Belarus', 'BLR', 112, 375, 0, '2019-03-14 20:16:58'),
(21, 'BE', 'بلجيكا', 'Belgium', 'BEL', 56, 32, 0, '2019-03-14 20:16:58'),
(22, 'BZ', 'بليز', 'Belize', 'BLZ', 84, 501, 0, '2019-03-14 20:16:58'),
(23, 'BJ', 'بنين', 'Benin', 'BEN', 204, 229, 0, '2019-03-14 20:16:58'),
(24, 'BM', 'برمودا', 'Bermuda', 'BMU', 60, 1441, 0, '2019-03-14 20:16:58'),
(25, 'BT', 'بوتان', 'Bhutan', 'BTN', 64, 975, 0, '2019-03-14 20:16:58'),
(26, 'BO', 'بوليفيا', 'Bolivia', 'BOL', 68, 591, 0, '2019-03-14 20:16:58'),
(27, 'BA', 'البوسنة والهرسك', 'Bosnia and Herzegovina', 'BIH', 70, 387, 0, '2019-03-14 20:16:58'),
(28, 'BW', 'بوتسوانا', 'Botswana', 'BWA', 72, 267, 0, '2019-03-14 20:16:58'),
(30, 'BR', 'البرازيل', 'Brazil', 'BRA', 76, 55, 0, '2019-03-14 20:16:58'),
(31, 'IO', 'إقليم المحيط البريطاني الهندي', 'British Indian Ocean Territory', NULL, NULL, 246, 0, '2019-03-14 20:16:58'),
(32, 'BN', 'بروناي دار السلام', 'Brunei Darussalam', 'BRN', 96, 673, 0, '2019-03-14 20:16:58'),
(33, 'BG', 'بلغاريا', 'Bulgaria', 'BGR', 100, 359, 0, '2019-03-14 20:16:58'),
(34, 'BF', 'بوركينا فاسو', 'Burkina Faso', 'BFA', 854, 226, 0, '2019-03-14 20:16:58'),
(35, 'BI', 'بوروندي', 'Burundi', 'BDI', 108, 257, 0, '2019-03-14 20:16:58'),
(36, 'KH', 'كمبوديا', 'Cambodia', 'KHM', 116, 855, 0, '2019-03-14 20:16:58'),
(37, 'CM', 'الكاميرون', 'Cameroon', 'CMR', 120, 237, 0, '2019-03-14 20:16:58'),
(38, 'CA', 'كندا', 'Canada', 'CAN', 124, 1, 0, '2019-03-14 20:16:58'),
(39, 'CV', 'الرأس الأخضر', 'Cape Verde', 'CPV', 132, 238, 0, '2019-03-14 20:16:58'),
(40, 'KY', 'جزر كايمان', 'Cayman Islands', 'CYM', 136, 1345, 0, '2019-03-14 20:16:58'),
(41, 'CF', 'جمهورية افريقيا الوسطى', 'Central African Republic', 'CAF', 140, 236, 0, '2019-03-14 20:16:58'),
(42, 'TD', 'تشاد', 'Chad', 'TCD', 148, 235, 0, '2019-03-14 20:16:58'),
(43, 'CL', 'تشيلي', 'Chile', 'CHL', 152, 56, 0, '2019-03-14 20:16:58'),
(44, 'CN', 'الصين', 'China', 'CHN', 156, 86, 0, '2019-03-14 20:16:58'),
(45, 'CX', 'جزيرة الكريسماس', 'Christmas Island', NULL, NULL, 61, 0, '2019-03-14 20:16:58'),
(46, 'CC', 'جزر كوكوس (كيلينغ)', 'Cocos (Keeling) Islands', NULL, NULL, 672, 0, '2019-03-14 20:16:58'),
(47, 'CO', 'كولومبيا', 'Colombia', 'COL', 170, 57, 0, '2019-03-14 20:16:58'),
(48, 'KM', 'جزر القمر', 'Comoros', 'COM', 174, 269, 0, '2019-03-14 20:16:58'),
(49, 'CG', 'الكونغو', 'Congo', 'COG', 178, 242, 0, '2019-03-14 20:16:58'),
(50, 'CD', 'جمهورية الكونغو الديمقراطية', 'Congo, the Democratic Republic of the', 'COD', 180, 242, 0, '2019-03-14 20:16:58'),
(51, 'CK', 'جزر كوك', 'Cook Islands', 'COK', 184, 682, 0, '2019-03-14 20:16:58'),
(52, 'CR', 'كوستا ريكا', 'Costa Rica', 'CRI', 188, 506, 0, '2019-03-14 20:16:58'),
(53, 'CI', 'ساحل العاج', 'Cote D''Ivoire', 'CIV', 384, 225, 0, '2019-03-14 20:16:58'),
(54, 'HR', 'كرواتيا', 'Croatia', 'HRV', 191, 385, 0, '2019-03-14 20:16:58'),
(55, 'CU', 'كوبا', 'Cuba', 'CUB', 192, 53, 0, '2019-03-14 20:16:58'),
(56, 'CY', 'قبرص', 'Cyprus', 'CYP', 196, 357, 0, '2019-03-14 20:16:58'),
(57, 'CZ', 'جمهورية التشيك', 'Czech Republic', 'CZE', 203, 420, 0, '2019-03-14 20:16:58'),
(58, 'DK', 'الدنمارك', 'Denmark', 'DNK', 208, 45, 0, '2019-03-14 20:16:58'),
(59, 'DJ', 'جيبوتي', 'Djibouti', 'DJI', 262, 253, 0, '2019-03-14 20:16:58'),
(60, 'DM', 'دومينيكا', 'Dominica', 'DMA', 212, 1767, 0, '2019-03-14 20:16:58'),
(61, 'DO', 'جمهورية الدومنيكان', 'Dominican Republic', 'DOM', 214, 1809, 0, '2019-03-14 20:16:58'),
(62, 'EC', 'الإكوادور', 'Ecuador', 'ECU', 218, 593, 0, '2019-03-14 20:16:58'),
(63, 'EG', 'مصر', 'Egypt', 'EGY', 818, 20, 0, '2019-03-14 20:16:58'),
(64, 'SV', 'السلفادور', 'El Salvador', 'SLV', 222, 503, 0, '2019-03-14 20:16:58'),
(65, 'GQ', 'غينيا الإستوائية', 'Equatorial Guinea', 'GNQ', 226, 240, 0, '2019-03-14 20:16:58'),
(66, 'ER', 'إريتريا', 'Eritrea', 'ERI', 232, 291, 0, '2019-03-14 20:16:58'),
(67, 'EE', 'استونيا', 'Estonia', 'EST', 233, 372, 0, '2019-03-14 20:16:58'),
(68, 'ET', 'أثيوبيا', 'Ethiopia', 'ETH', 231, 251, 0, '2019-03-14 20:16:58'),
(69, 'FK', 'جزر فوكلاند (مالفيناس)', 'Falkland Islands (Malvinas)', 'FLK', 238, 500, 0, '2019-03-14 20:16:58'),
(70, 'FO', 'جزر صناعية', 'Faroe Islands', 'FRO', 234, 298, 0, '2019-03-14 20:16:58'),
(71, 'FJ', 'فيجي', 'Fiji', 'FJI', 242, 679, 0, '2019-03-14 20:16:58'),
(72, 'FI', 'فنلندا', 'Finland', 'FIN', 246, 358, 0, '2019-03-14 20:16:58'),
(73, 'FR', 'فرنسا', 'France', 'FRA', 250, 33, 0, '2019-03-14 20:16:58'),
(74, 'GF', 'غيانا الفرنسية', 'French Guiana', 'GUF', 254, 594, 0, '2019-03-14 20:16:58'),
(75, 'PF', 'بولينيزيا الفرنسية', 'French Polynesia', 'PYF', 258, 689, 0, '2019-03-14 20:16:58'),
(77, 'GA', 'الغابون', 'Gabon', 'GAB', 266, 241, 0, '2019-03-14 20:16:58'),
(78, 'GM', 'غامبيا', 'Gambia', 'GMB', 270, 220, 0, '2019-03-14 20:16:58'),
(79, 'GE', 'جورجيا', 'Georgia', 'GEO', 268, 995, 0, '2019-03-14 20:16:58'),
(80, 'DE', 'ألمانيا', 'Germany', 'DEU', 276, 49, 0, '2019-03-14 20:16:58'),
(81, 'GH', 'غانا', 'Ghana', 'GHA', 288, 233, 0, '2019-03-14 20:16:58'),
(82, 'GI', 'جبل طارق', 'Gibraltar', 'GIB', 292, 350, 0, '2019-03-14 20:16:58'),
(83, 'GR', 'اليونان', 'Greece', 'GRC', 300, 30, 0, '2019-03-14 20:16:58'),
(84, 'GL', 'الأرض الخضراء', 'Greenland', 'GRL', 304, 299, 0, '2019-03-14 20:16:58'),
(85, 'GD', 'غرينادا', 'Grenada', 'GRD', 308, 1473, 0, '2019-03-14 20:16:58'),
(86, 'GP', 'جوادلوب', 'Guadeloupe', 'GLP', 312, 590, 0, '2019-03-14 20:16:58'),
(87, 'GU', 'غوام', 'Guam', 'GUM', 316, 1671, 0, '2019-03-14 20:16:58'),
(88, 'GT', 'غواتيمالا', 'Guatemala', 'GTM', 320, 502, 0, '2019-03-14 20:16:58'),
(89, 'GN', 'غينيا', 'Guinea', 'GIN', 324, 224, 0, '2019-03-14 20:16:58'),
(90, 'GW', 'غينيا بيساو', 'Guinea-Bissau', 'GNB', 624, 245, 0, '2019-03-14 20:16:58'),
(91, 'GY', 'غيانا', 'Guyana', 'GUY', 328, 592, 0, '2019-03-14 20:16:58'),
(92, 'HT', 'هايتي', 'Haiti', 'HTI', 332, 509, 0, '2019-03-14 20:16:58'),
(94, 'VA', 'دولة الفاتيكان', 'Holy See (Vatican City State)', 'VAT', 336, 39, 0, '2019-03-14 20:16:58'),
(95, 'HN', 'هندوراس', 'Honduras', 'HND', 340, 504, 0, '2019-03-14 20:16:58'),
(96, 'HK', 'هونج كونج', 'Hong Kong', 'HKG', 344, 852, 0, '2019-03-14 20:16:58'),
(97, 'HU', 'المجر', 'Hungary', 'HUN', 348, 36, 0, '2019-03-14 20:16:58'),
(98, 'IS', 'أيسلندا', 'Iceland', 'ISL', 352, 354, 0, '2019-03-14 20:16:58'),
(99, 'IN', 'الهند', 'India', 'IND', 356, 91, 0, '2019-03-14 20:16:58'),
(100, 'ID', 'أندونيسيا', 'Indonesia', 'IDN', 360, 62, 0, '2019-03-14 20:16:58'),
(101, 'IR', 'جمهورية إيران الإسلامية', 'Iran, Islamic Republic of', 'IRN', 364, 98, 0, '2019-03-14 20:16:58'),
(102, 'IQ', 'العراق', 'Iraq', 'IRQ', 368, 964, 0, '2019-03-14 20:16:58'),
(103, 'IE', 'أيرلندا', 'Ireland', 'IRL', 372, 353, 0, '2019-03-14 20:16:58'),
(104, 'IL', 'إسرائيل', 'Israel', 'ISR', 376, 972, 0, '2019-03-14 20:16:58'),
(105, 'IT', 'إيطاليا', 'Italy', 'ITA', 380, 39, 0, '2019-03-14 20:16:58'),
(106, 'JM', 'جامايكا', 'Jamaica', 'JAM', 388, 1876, 0, '2019-03-14 20:16:58'),
(107, 'JP', 'اليابان', 'Japan', 'JPN', 392, 81, 0, '2019-03-14 20:16:58'),
(108, 'JO', 'الأردن', 'Jordan', 'JOR', 400, 962, 0, '2019-03-14 20:16:58'),
(109, 'KZ', 'كازاخستان', 'Kazakhstan', 'KAZ', 398, 7, 0, '2019-03-14 20:16:58'),
(110, 'KE', 'كينيا', 'Kenya', 'KEN', 404, 254, 0, '2019-03-14 20:16:58'),
(111, 'KI', 'كيريباس', 'Kiribati', 'KIR', 296, 686, 0, '2019-03-14 20:16:58'),
(112, 'KP', 'كوريا، الجمهورية الشعبية الديمقراطية', 'Korea, Democratic People''s Republic of', 'PRK', 408, 850, 0, '2019-03-14 20:16:58'),
(113, 'KR', 'جمهورية كوريا', 'Korea, Republic of', 'KOR', 410, 82, 0, '2019-03-14 20:16:58'),
(114, 'KW', 'الكويت', 'Kuwait', 'KWT', 414, 965, 0, '2019-03-14 20:16:58'),
(115, 'KG', 'قرغيزستان', 'Kyrgyzstan', 'KGZ', 417, 996, 0, '2019-03-14 20:16:58'),
(116, 'LA', 'جمهورية لاو الديمقراطية الشعبية', 'Lao People''s Democratic Republic', 'LAO', 418, 856, 0, '2019-03-14 20:16:58'),
(117, 'LV', 'لاتفيا', 'Latvia', 'LVA', 428, 371, 0, '2019-03-14 20:16:58'),
(118, 'LB', 'لبنان', 'Lebanon', 'LBN', 422, 961, 0, '2019-03-14 20:16:58'),
(119, 'LS', 'ليسوتو', 'Lesotho', 'LSO', 426, 266, 0, '2019-03-14 20:16:58'),
(120, 'LR', 'ليبيريا', 'Liberia', 'LBR', 430, 231, 0, '2019-03-14 20:16:58'),
(121, 'LY', 'الجماهيرية العربية الليبية', 'Libyan Arab Jamahiriya', 'LBY', 434, 218, 0, '2019-03-14 20:16:58'),
(122, 'LI', 'ليختنشتاين', 'Liechtenstein', 'LIE', 438, 423, 0, '2019-03-14 20:16:58'),
(123, 'LT', 'ليتوانيا', 'Lithuania', 'LTU', 440, 370, 0, '2019-03-14 20:16:58'),
(124, 'LU', 'لوكسمبورغ', 'Luxembourg', 'LUX', 442, 352, 0, '2019-03-14 20:16:58'),
(125, 'MO', 'ماكاو', 'Macao', 'MAC', 446, 853, 0, '2019-03-14 20:16:58'),
(126, 'MK', 'جمهورية مقدونيا اليوغوسلافية السابقة', 'Macedonia, the Former Yugoslav Republic of', 'MKD', 807, 389, 0, '2019-03-14 20:16:58'),
(127, 'MG', 'مدغشقر', 'Madagascar', 'MDG', 450, 261, 0, '2019-03-14 20:16:58'),
(128, 'MW', 'مالاوي', 'Malawi', 'MWI', 454, 265, 0, '2019-03-14 20:16:58'),
(129, 'MY', 'ماليزيا', 'Malaysia', 'MYS', 458, 60, 0, '2019-03-14 20:16:58'),
(130, 'MV', 'جزر المالديف', 'Maldives', 'MDV', 462, 960, 0, '2019-03-14 20:16:58'),
(131, 'ML', 'مالي', 'Mali', 'MLI', 466, 223, 0, '2019-03-14 20:16:58'),
(132, 'MT', 'مالطا', 'Malta', 'MLT', 470, 356, 0, '2019-03-14 20:16:58'),
(133, 'MH', 'جزر مارشال', 'Marshall Islands', 'MHL', 584, 692, 0, '2019-03-14 20:16:58'),
(134, 'MQ', 'مارتينيك', 'Martinique', 'MTQ', 474, 596, 0, '2019-03-14 20:16:58'),
(135, 'MR', 'موريتانيا', 'Mauritania', 'MRT', 478, 222, 0, '2019-03-14 20:16:58'),
(136, 'MU', 'موريشيوس', 'Mauritius', 'MUS', 480, 230, 0, '2019-03-14 20:16:58'),
(137, 'YT', 'مايوت', 'Mayotte', NULL, NULL, 269, 0, '2019-03-14 20:16:58'),
(138, 'MX', 'المكسيك', 'Mexico', 'MEX', 484, 52, 0, '2019-03-14 20:16:58'),
(139, 'FM', 'ولايات ميكرونيزيا الموحدة', 'Micronesia, Federated States of', 'FSM', 583, 691, 0, '2019-03-14 20:16:58'),
(140, 'MD', 'جمهورية مولدوفا', 'Moldova, Republic of', 'MDA', 498, 373, 0, '2019-03-14 20:16:58'),
(141, 'MC', 'موناكو', 'Monaco', 'MCO', 492, 377, 0, '2019-03-14 20:16:58'),
(142, 'MN', 'منغوليا', 'Mongolia', 'MNG', 496, 976, 0, '2019-03-14 20:16:58'),
(143, 'MS', 'مونتسيرات', 'Montserrat', 'MSR', 500, 1664, 0, '2019-03-14 20:16:58'),
(144, 'MA', 'المغرب', 'Morocco', 'MAR', 504, 212, 0, '2019-03-14 20:16:58'),
(145, 'MZ', 'موزمبيق', 'Mozambique', 'MOZ', 508, 258, 0, '2019-03-14 20:16:58'),
(146, 'MM', 'ميانمار', 'Myanmar', 'MMR', 104, 95, 0, '2019-03-14 20:16:58'),
(147, 'NA', 'ناميبيا', 'Namibia', 'NAM', 516, 264, 0, '2019-03-14 20:16:58'),
(148, 'NR', 'ناورو', 'Nauru', 'NRU', 520, 674, 0, '2019-03-14 20:16:58'),
(149, 'NP', 'نيبال', 'Nepal', 'NPL', 524, 977, 0, '2019-03-14 20:16:58'),
(150, 'NL', 'هولندا', 'Netherlands', 'NLD', 528, 31, 0, '2019-03-14 20:16:58'),
(151, 'AN', 'جزر الأنتيل الهولندية', 'Netherlands Antilles', 'ANT', 530, 599, 0, '2019-03-14 20:16:58'),
(152, 'NC', 'كاليدونيا الجديدة', 'New Caledonia', 'NCL', 540, 687, 0, '2019-03-14 20:16:58'),
(153, 'NZ', 'نيوزيلندا', 'New Zealand', 'NZL', 554, 64, 0, '2019-03-14 20:16:58'),
(154, 'NI', 'نيكاراغوا', 'Nicaragua', 'NIC', 558, 505, 0, '2019-03-14 20:16:58'),
(155, 'NE', 'النيجر', 'Niger', 'NER', 562, 227, 0, '2019-03-14 20:16:58'),
(156, 'NG', 'نيجيريا', 'Nigeria', 'NGA', 566, 234, 0, '2019-03-14 20:16:58'),
(157, 'NU', 'نيوي', 'Niue', 'NIU', 570, 683, 0, '2019-03-14 20:16:58'),
(158, 'NF', 'جزيرة نورفولك', 'Norfolk Island', 'NFK', 574, 672, 0, '2019-03-14 20:16:58'),
(159, 'MP', 'جزر مريانا الشمالية', 'Northern Mariana Islands', 'MNP', 580, 1670, 0, '2019-03-14 20:16:58'),
(160, 'NO', 'النرويج', 'Norway', 'NOR', 578, 47, 0, '2019-03-14 20:16:58'),
(161, 'OM', 'سلطنة عمان', 'Oman', 'OMN', 512, 968, 0, '2019-03-14 20:16:58'),
(162, 'PK', 'باكستان', 'Pakistan', 'PAK', 586, 92, 0, '2019-03-14 20:16:58'),
(163, 'PW', 'بالاو', 'Palau', 'PLW', 585, 680, 0, '2019-03-14 20:16:58'),
(164, 'PS', 'الأراضي الفلسطينية المحتلة', 'Palestinian Territory, Occupied', NULL, NULL, 970, 0, '2019-03-14 20:16:58'),
(165, 'PA', 'بناما', 'Panama', 'PAN', 591, 507, 0, '2019-03-14 20:16:58'),
(166, 'PG', 'بابوا غينيا الجديدة', 'Papua New Guinea', 'PNG', 598, 675, 0, '2019-03-14 20:16:58'),
(167, 'PY', 'باراغواي', 'Paraguay', 'PRY', 600, 595, 0, '2019-03-14 20:16:58'),
(168, 'PE', 'بيرو', 'Peru', 'PER', 604, 51, 0, '2019-03-14 20:16:58'),
(169, 'PH', 'الفلبين', 'Philippines', 'PHL', 608, 63, 0, '2019-03-14 20:16:58'),
(171, 'PL', 'بولندا', 'Poland', 'POL', 616, 48, 0, '2019-03-14 20:16:58'),
(172, 'PT', 'البرتغال', 'Portugal', 'PRT', 620, 351, 0, '2019-03-14 20:16:58'),
(173, 'PR', 'بورتوريكو', 'Puerto Rico', 'PRI', 630, 1787, 0, '2019-03-14 20:16:58'),
(174, 'QA', 'دولة قطر', 'Qatar', 'QAT', 634, 974, 0, '2019-03-14 20:16:58'),
(175, 'RE', 'جزيرة ريونيون', 'Reunion', 'REU', 638, 262, 0, '2019-03-14 20:16:58'),
(176, 'RO', 'رومانيا', 'Romania', 'ROM', 642, 40, 0, '2019-03-14 20:16:58'),
(177, 'RU', 'الاتحاد الروسي', 'Russian Federation', 'RUS', 643, 70, 0, '2019-03-14 20:16:58'),
(178, 'RW', 'رواندا', 'Rwanda', 'RWA', 646, 250, 0, '2019-03-14 20:16:58'),
(179, 'SH', 'سانت هيلانة', 'Saint Helena', 'SHN', 654, 290, 0, '2019-03-14 20:16:58'),
(180, 'KN', 'سانت كيتس ونيفيس', 'Saint Kitts and Nevis', 'KNA', 659, 1869, 0, '2019-03-14 20:16:58'),
(181, 'LC', 'القديسة لوسيا', 'Saint Lucia', 'LCA', 662, 1758, 0, '2019-03-14 20:16:58'),
(182, 'PM', 'سانت بيير وميكلون', 'Saint Pierre and Miquelon', 'SPM', 666, 508, 0, '2019-03-14 20:16:58'),
(183, 'VC', 'سانت فنسنت وجزر غرينادين', 'Saint Vincent and the Grenadines', 'VCT', 670, 1784, 0, '2019-03-14 20:16:58'),
(184, 'WS', 'ساموا', 'Samoa', 'WSM', 882, 684, 0, '2019-03-14 20:16:58'),
(185, 'SM', 'سان مارينو', 'San Marino', 'SMR', 674, 378, 0, '2019-03-14 20:16:58'),
(186, 'ST', 'ساو تومي وبرينسيبي', 'Sao Tome and Principe', 'STP', 678, 239, 0, '2019-03-14 20:16:58'),
(187, 'SA', 'المملكة العربية السعودية', 'Saudi Arabia', 'SAU', 682, 966, 1, '2019-03-14 20:16:58'),
(188, 'SN', 'السنغال', 'Senegal', 'SEN', 686, 221, 0, '2019-03-14 20:16:58'),
(189, 'CS', 'صربيا والجبل الأسود', 'Serbia and Montenegro', NULL, NULL, 381, 0, '2019-03-14 20:16:58'),
(190, 'SC', 'سيشيل', 'Seychelles', 'SYC', 690, 248, 0, '2019-03-14 20:16:58'),
(191, 'SL', 'سيرا ليون', 'Sierra Leone', 'SLE', 694, 232, 0, '2019-03-14 20:16:58'),
(192, 'SG', 'سنغافورة', 'Singapore', 'SGP', 702, 65, 0, '2019-03-14 20:16:58'),
(193, 'SK', 'سلوفاكيا', 'Slovakia', 'SVK', 703, 421, 0, '2019-03-14 20:16:58'),
(194, 'SI', 'سلوفينيا', 'Slovenia', 'SVN', 705, 386, 0, '2019-03-14 20:16:58'),
(195, 'SB', 'جزر سليمان', 'Solomon Islands', 'SLB', 90, 677, 0, '2019-03-14 20:16:58'),
(196, 'SO', 'الصومال', 'Somalia', 'SOM', 706, 252, 0, '2019-03-14 20:16:58'),
(197, 'ZA', 'جنوب أفريقيا', 'South Africa', 'ZAF', 710, 27, 0, '2019-03-14 20:16:58'),
(199, 'ES', 'إسبانيا', 'Spain', 'ESP', 724, 34, 0, '2019-03-14 20:16:58'),
(200, 'LK', 'سيريلانكا', 'Sri Lanka', 'LKA', 144, 94, 0, '2019-03-14 20:16:58'),
(201, 'SD', 'سودان', 'Sudan', 'SDN', 736, 249, 0, '2019-03-14 20:16:58'),
(202, 'SR', 'سورينام', 'Suriname', 'SUR', 740, 597, 0, '2019-03-14 20:16:58'),
(203, 'SJ', 'سفالبارد وجان ماين', 'Svalbard and Jan Mayen', 'SJM', 744, 47, 0, '2019-03-14 20:16:58'),
(204, 'SZ', 'سوازيلاند', 'Swaziland', 'SWZ', 748, 268, 0, '2019-03-14 20:16:58'),
(205, 'SE', 'السويد', 'Sweden', 'SWE', 752, 46, 0, '2019-03-14 20:16:58'),
(206, 'CH', 'سويسرا', 'Switzerland', 'CHE', 756, 41, 0, '2019-03-14 20:16:58'),
(207, 'SY', 'الجمهورية العربية السورية', 'Syrian Arab Republic', 'SYR', 760, 963, 0, '2019-03-14 20:16:58'),
(208, 'TW', 'مقاطعة تايوان الصينية', 'Taiwan, Province of China', 'TWN', 158, 886, 0, '2019-03-14 20:16:58'),
(209, 'TJ', 'طاجيكستان', 'Tajikistan', 'TJK', 762, 992, 0, '2019-03-14 20:16:58'),
(210, 'TZ', 'جمهورية تنزانيا المتحدة', 'Tanzania, United Republic of', 'TZA', 834, 255, 0, '2019-03-14 20:16:58'),
(211, 'TH', 'تايلاند', 'Thailand', 'THA', 764, 66, 0, '2019-03-14 20:16:58'),
(212, 'TL', 'تيمور الشرقية', 'Timor-Leste', NULL, NULL, 670, 0, '2019-03-14 20:16:58'),
(213, 'TG', 'توجو', 'Togo', 'TGO', 768, 228, 0, '2019-03-14 20:16:58'),
(214, 'TK', 'توكيلاو', 'Tokelau', 'TKL', 772, 690, 0, '2019-03-14 20:16:58'),
(215, 'TO', 'تونغا', 'Tonga', 'TON', 776, 676, 0, '2019-03-14 20:16:58'),
(216, 'TT', 'ترينداد وتوباغو', 'Trinidad and Tobago', 'TTO', 780, 1868, 0, '2019-03-14 20:16:58'),
(217, 'TN', 'تونس', 'Tunisia', 'TUN', 788, 216, 0, '2019-03-14 20:16:58'),
(218, 'TR', 'تركيا', 'Turkey', 'TUR', 792, 90, 0, '2019-03-14 20:16:58'),
(219, 'TM', 'تركمانستان', 'Turkmenistan', 'TKM', 795, 7370, 0, '2019-03-14 20:16:58'),
(220, 'TC', 'جزر تركس وكايكوس', 'Turks and Caicos Islands', 'TCA', 796, 1649, 0, '2019-03-14 20:16:58'),
(221, 'TV', 'توفالو', 'Tuvalu', 'TUV', 798, 688, 0, '2019-03-14 20:16:58'),
(222, 'UG', 'أوغندا', 'Uganda', 'UGA', 800, 256, 0, '2019-03-14 20:16:58'),
(223, 'UA', 'أوكرانيا', 'Ukraine', 'UKR', 804, 380, 0, '2019-03-14 20:16:58'),
(224, 'AE', 'الإمارات العربية المتحدة', 'United Arab Emirates', 'ARE', 784, 971, 0, '2019-03-14 20:16:58'),
(225, 'GB', 'المملكة المتحدة', 'United Kingdom', 'GBR', 826, 44, 0, '2019-03-14 20:16:58'),
(226, 'US', 'الولايات المتحدة الامريكية', 'United States', 'USA', 840, 1, 0, '2019-03-14 20:16:58'),
(228, 'UY', 'أوروغواي', 'Uruguay', 'URY', 858, 598, 0, '2019-03-14 20:16:58'),
(229, 'UZ', 'أوزبكستان', 'Uzbekistan', 'UZB', 860, 998, 0, '2019-03-14 20:16:58'),
(230, 'VU', 'فانواتو', 'Vanuatu', 'VUT', 548, 678, 0, '2019-03-14 20:16:58'),
(231, 'VE', 'فنزويلا', 'Venezuela', 'VEN', 862, 58, 0, '2019-03-14 20:16:58'),
(232, 'VN', 'فييتنام', 'Viet Nam', 'VNM', 704, 84, 0, '2019-03-14 20:16:58'),
(233, 'VG', 'جزر العذراء البريطانية', 'Virgin Islands, British', 'VGB', 92, 1284, 0, '2019-03-14 20:16:58'),
(234, 'VI', 'جزر فيرجن ، الولايات المتحدة', 'Virgin Islands, U.s.', 'VIR', 850, 1340, 0, '2019-03-14 20:16:58'),
(235, 'WF', 'واليس وفوتونا', 'Wallis and Futuna', 'WLF', 876, 681, 0, '2019-03-14 20:16:58'),
(236, 'EH', 'الصحراء الغربية', 'Western Sahara', 'ESH', 732, 212, 0, '2019-03-14 20:16:58'),
(237, 'YE', 'اليمن', 'Yemen', 'YEM', 887, 967, 0, '2019-03-14 20:16:58'),
(238, 'ZM', 'زامبيا', 'Zambia', 'ZMB', 894, 260, 0, '2019-03-14 20:16:58'),
(239, 'ZW', 'زيمبابوي', 'Zimbabwe', 'ZWE', 716, 263, 0, '2019-03-14 20:16:58');

-- --------------------------------------------------------

--
-- Table structure for table `dx_groups`
--

CREATE TABLE `dx_groups` (
  `group_uid` int(11) NOT NULL,
  `group_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dx_groups`
--

INSERT INTO `dx_groups` (`group_uid`, `group_name`) VALUES
(1, 'مدير عام'),
(2, 'مدير قسم ادخال المعلومات');

-- --------------------------------------------------------

--
-- Table structure for table `dx_users`
--

CREATE TABLE `dx_users` (
  `user_uid` int(11) NOT NULL,
  `user_full_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_pwd` varchar(255) NOT NULL,
  `user_timezone` varchar(20) NOT NULL DEFAULT 'UP3',
  `user_actived` tinyint(1) NOT NULL DEFAULT '1',
  `user_banned` tinyint(1) NOT NULL,
  `user_ban_reason` varchar(255) DEFAULT NULL,
  `user_register_ip` varchar(50) DEFAULT NULL,
  `group_uid` tinyint(2) NOT NULL,
  `user_add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dx_users`
--

INSERT INTO `dx_users` (`user_uid`, `user_full_name`, `user_email`, `user_pwd`, `user_timezone`, `user_actived`, `user_banned`, `user_ban_reason`, `user_register_ip`, `group_uid`, `user_add_date`) VALUES
(7, 'ابراهيم الصاوي', 'elsawy@efad.com', '4297f44b13955235245b2497399d7a93', 'UP3', 1, 0, '', '::1', 1, '2016-10-03 11:48:07'),
(8, 'test1', 'test@test.com', 'e10adc3949ba59abbe56e057f20f883e', 'UP3', 1, 0, NULL, NULL, 2, '2019-06-19 19:35:18');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `faq_uid` int(11) NOT NULL,
  `faq_code` varchar(100) NOT NULL,
  `faq_link` varchar(255) NOT NULL,
  `faq_question` varchar(255) NOT NULL,
  `faq_answer` varchar(255) NOT NULL,
  `faq_meta_desc` varchar(255) NOT NULL,
  `faq_meta_keywords` varchar(255) NOT NULL,
  `faq_category_uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`faq_uid`, `faq_code`, `faq_link`, `faq_question`, `faq_answer`, `faq_meta_desc`, `faq_meta_keywords`, `faq_category_uid`) VALUES
(1, '_vertex_1560275918', 'can-i-close-the-account', 'faq_question_vertex_1560275918', 'faq_answer_vertex_1560275918', 'faq_meta_desc_vertex_1560275918', 'faq_meta_keywords_vertex_1560275918', 2);

-- --------------------------------------------------------

--
-- Table structure for table `faq_categories`
--

CREATE TABLE `faq_categories` (
  `fc_uid` int(11) NOT NULL,
  `fc_code` varchar(100) NOT NULL,
  `fc_link` varchar(255) NOT NULL,
  `fc_name` varchar(255) NOT NULL,
  `fc_meta_desc` varchar(255) NOT NULL,
  `fc_meta_keywords` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faq_categories`
--

INSERT INTO `faq_categories` (`fc_uid`, `fc_code`, `fc_link`, `fc_name`, `fc_meta_desc`, `fc_meta_keywords`) VALUES
(1, '_vertex_1560273363', 'private-data', 'fc_name_vertex_1560273363', 'fc_meta_desc_vertex_1560273363', 'fc_meta_keywords_vertex_1560273363'),
(2, '_vertex_1560273433', 'account', 'fc_name_vertex_1560273433', 'fc_meta_desc_vertex_1560273433', 'fc_meta_keywords_vertex_1560273433'),
(3, '_vertex_1560273448', 'payment', 'fc_name_vertex_1560273448', 'fc_meta_desc_vertex_1560273448', 'fc_meta_keywords_vertex_1560273448');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `lang_uid` int(11) NOT NULL,
  `lang_name` varchar(255) NOT NULL,
  `lang_title` varchar(255) NOT NULL,
  `lang_flag` varchar(255) NOT NULL,
  `lang_code` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`lang_uid`, `lang_name`, `lang_title`, `lang_flag`, `lang_code`) VALUES
(1, 'arabic', 'العربية', 'sa.png', 'AR'),
(2, 'english', 'الإنجليزية', 'us.png', 'EN');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `media_uid` int(11) NOT NULL,
  `media_type` tinyint(1) NOT NULL COMMENT '1 for image, 2 for youtube',
  `media_path` text NOT NULL,
  `media_thumb_path` text NOT NULL,
  `media_code` varchar(255) NOT NULL,
  `media_title` varchar(255) NOT NULL,
  `album_uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`media_uid`, `media_type`, `media_path`, `media_thumb_path`, `media_code`, `media_title`, `album_uid`) VALUES
(2, 1, '686d563b5f41e4a0eab0eeff1d616236.jpg', 'thumb_686d563b5f41e4a0eab0eeff1d616236.jpg', '_vertex_1562123915', 'media_title_vertex_1562123915', 1);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `member_uid` int(11) NOT NULL,
  `member_fname` varchar(255) NOT NULL,
  `member_lname` varchar(255) NOT NULL,
  `member_email` varchar(255) NOT NULL,
  `member_mobile` int(11) NOT NULL,
  `member_password` varchar(255) NOT NULL,
  `country_uid` int(11) NOT NULL,
  `city_uid` int(11) NOT NULL,
  `mc_uid` int(11) NOT NULL,
  `member_renewal_date` date NOT NULL,
  `member_last_login` timestamp NULL DEFAULT NULL,
  `member_status` tinyint(1) NOT NULL DEFAULT '2',
  `member_add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_uid`, `member_fname`, `member_lname`, `member_email`, `member_mobile`, `member_password`, `country_uid`, `city_uid`, `mc_uid`, `member_renewal_date`, `member_last_login`, `member_status`, `member_add_date`) VALUES
(1, 'Ebrahim', 'Elsawy', 'elsawy@efad.com', 548143428, '4297f44b13955235245b2497399d7a93', 187, 3, 1, '2019-09-18', NULL, 2, '2019-07-11 21:32:52');

-- --------------------------------------------------------

--
-- Table structure for table `memberships`
--

CREATE TABLE `memberships` (
  `mc_uid` int(11) NOT NULL,
  `mc_code` varchar(100) NOT NULL,
  `mc_name` varchar(255) NOT NULL,
  `mc_6months_price` int(11) NOT NULL,
  `mc_9months_price` int(11) NOT NULL,
  `mc_12months_price` int(11) NOT NULL,
  `mc_dicount` int(11) NOT NULL,
  `mc_insurance` tinyint(1) NOT NULL DEFAULT '0',
  `mc_free_delivery` tinyint(1) NOT NULL DEFAULT '0',
  `mc_open_km` tinyint(1) NOT NULL DEFAULT '0',
  `mc_city_delivery` tinyint(1) NOT NULL DEFAULT '0',
  `mc_maintenance` tinyint(1) NOT NULL DEFAULT '0',
  `mc_full_fuel` tinyint(1) NOT NULL DEFAULT '0',
  `mc_road_help` tinyint(1) NOT NULL DEFAULT '0',
  `mc_early_booking` tinyint(1) NOT NULL DEFAULT '0',
  `mc_first_day_free` tinyint(1) NOT NULL DEFAULT '0',
  `mc_allow_hours` int(11) NOT NULL,
  `mc_free_days` int(11) NOT NULL,
  `mc_points` int(11) NOT NULL,
  `mc_car_care` tinyint(1) NOT NULL DEFAULT '0',
  `mc_airport_parking` int(11) NOT NULL DEFAULT '0',
  `mc_can_upgrade` tinyint(1) NOT NULL DEFAULT '0',
  `mc_pay_later` tinyint(1) NOT NULL DEFAULT '0',
  `mc_special_offers` tinyint(1) NOT NULL DEFAULT '0',
  `mc_heat_block` tinyint(1) NOT NULL DEFAULT '0',
  `mc_gps_system` tinyint(1) NOT NULL DEFAULT '0',
  `mc_color_code` varchar(7) NOT NULL,
  `mc_status` tinyint(1) NOT NULL DEFAULT '1',
  `mc_add-date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `memberships`
--

INSERT INTO `memberships` (`mc_uid`, `mc_code`, `mc_name`, `mc_6months_price`, `mc_9months_price`, `mc_12months_price`, `mc_dicount`, `mc_insurance`, `mc_free_delivery`, `mc_open_km`, `mc_city_delivery`, `mc_maintenance`, `mc_full_fuel`, `mc_road_help`, `mc_early_booking`, `mc_first_day_free`, `mc_allow_hours`, `mc_free_days`, `mc_points`, `mc_car_care`, `mc_airport_parking`, `mc_can_upgrade`, `mc_pay_later`, `mc_special_offers`, `mc_heat_block`, `mc_gps_system`, `mc_color_code`, `mc_status`, `mc_add-date`) VALUES
(1, '', 'الزرقاء', 59, 49, 39, 6, 1, 1, 1, 1, 1, 1, 1, 1, 1, 2, 1, 0, 0, 15, 0, 0, 0, 1, 0, '#118aff', 1, '2019-07-08 21:31:57');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `page_uid` int(11) NOT NULL,
  `page_code` varchar(100) NOT NULL,
  `page_link` varchar(255) NOT NULL,
  `page_title` varchar(255) NOT NULL,
  `page_text` text NOT NULL,
  `page_image` varchar(255) NOT NULL,
  `page_meta_desc` varchar(255) NOT NULL,
  `page_meta_keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`page_uid`, `page_code`, `page_link`, `page_title`, `page_text`, `page_image`, `page_meta_desc`, `page_meta_keywords`) VALUES
(1, '_vertex_1560197104', 'about-us', 'page_title_vertex_1560197104', 'page_text_vertex_1560197104', 'ffa91c4a4ac733bd9e82a77a22b5a39a.png', 'page_meta_desc_vertex_1560197104', 'page_meta_keywords_vertex_1560197104');

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `per_uid` int(11) NOT NULL,
  `group_uid` int(11) NOT NULL,
  `pages_menu` tinyint(1) NOT NULL DEFAULT '0',
  `pages_list` tinyint(1) NOT NULL DEFAULT '0',
  `pages_add` tinyint(1) NOT NULL DEFAULT '0',
  `pages_edit` tinyint(1) NOT NULL DEFAULT '0',
  `pages_del` tinyint(1) NOT NULL DEFAULT '0',
  `faq_categories_menu` tinyint(1) NOT NULL DEFAULT '0',
  `faq_categories_list` tinyint(1) NOT NULL DEFAULT '0',
  `faq_categories_add` tinyint(1) NOT NULL DEFAULT '0',
  `faq_categories_edit` tinyint(1) NOT NULL DEFAULT '0',
  `faq_categories_del` tinyint(1) NOT NULL DEFAULT '0',
  `faq_menu` tinyint(1) NOT NULL DEFAULT '0',
  `faq_list` tinyint(1) NOT NULL DEFAULT '0',
  `faq_add` tinyint(1) NOT NULL DEFAULT '0',
  `faq_edit` tinyint(1) NOT NULL DEFAULT '0',
  `faq_del` tinyint(1) NOT NULL DEFAULT '0',
  `cars_categories_menu` tinyint(1) NOT NULL DEFAULT '0',
  `cars_categories_list` tinyint(1) NOT NULL DEFAULT '0',
  `cars_categories_add` tinyint(1) NOT NULL DEFAULT '0',
  `cars_categories_edit` tinyint(1) NOT NULL DEFAULT '0',
  `cars_categories_del` tinyint(1) NOT NULL DEFAULT '0',
  `cars_types_menu` tinyint(1) NOT NULL DEFAULT '0',
  `cars_types_list` tinyint(1) NOT NULL DEFAULT '0',
  `cars_types_add` tinyint(1) NOT NULL DEFAULT '0',
  `cars_types_edit` tinyint(1) NOT NULL DEFAULT '0',
  `cars_types_del` tinyint(1) NOT NULL DEFAULT '0',
  `blogs_menu` tinyint(1) NOT NULL DEFAULT '0',
  `blogs_list` tinyint(1) NOT NULL DEFAULT '0',
  `blogs_add` tinyint(1) NOT NULL DEFAULT '0',
  `blogs_edit` tinyint(1) NOT NULL DEFAULT '0',
  `blogs_del` tinyint(1) NOT NULL DEFAULT '0',
  `admins_menu` tinyint(1) NOT NULL DEFAULT '0',
  `admins_list` tinyint(1) NOT NULL DEFAULT '0',
  `admins_add` tinyint(1) NOT NULL DEFAULT '0',
  `admins_edit` tinyint(1) NOT NULL DEFAULT '0',
  `admins_del` tinyint(1) NOT NULL DEFAULT '0',
  `groups_menu` tinyint(1) NOT NULL DEFAULT '0',
  `groups_list` tinyint(1) NOT NULL DEFAULT '0',
  `groups_add` tinyint(1) NOT NULL DEFAULT '0',
  `groups_edit` tinyint(1) NOT NULL DEFAULT '0',
  `groups_del` tinyint(1) NOT NULL DEFAULT '0',
  `groups_permissions` tinyint(1) NOT NULL DEFAULT '0',
  `cars_brands_menu` tinyint(1) NOT NULL DEFAULT '0',
  `cars_brands_list` tinyint(1) NOT NULL DEFAULT '0',
  `cars_brands_add` tinyint(1) NOT NULL DEFAULT '0',
  `cars_brands_edit` tinyint(1) NOT NULL DEFAULT '0',
  `cars_brands_del` tinyint(1) NOT NULL DEFAULT '0',
  `albums_menu` tinyint(1) NOT NULL DEFAULT '0',
  `albums_list` tinyint(1) NOT NULL DEFAULT '0',
  `albums_add` tinyint(1) NOT NULL DEFAULT '0',
  `albums_edit` tinyint(1) NOT NULL DEFAULT '0',
  `albums_del` tinyint(1) NOT NULL DEFAULT '0',
  `cars_menu` tinyint(1) NOT NULL DEFAULT '0',
  `cars_list` tinyint(1) NOT NULL DEFAULT '0',
  `cars_add` tinyint(1) NOT NULL DEFAULT '0',
  `cars_edit` tinyint(1) NOT NULL DEFAULT '0',
  `cars_del` tinyint(1) NOT NULL DEFAULT '0',
  `memberships_menu` tinyint(1) NOT NULL DEFAULT '0',
  `memberships_list` tinyint(1) NOT NULL DEFAULT '0',
  `memberships_add` tinyint(1) NOT NULL DEFAULT '0',
  `memberships_edit` tinyint(1) NOT NULL DEFAULT '0',
  `memberships_del` tinyint(1) NOT NULL DEFAULT '0',
  `members_menu` tinyint(1) NOT NULL DEFAULT '0',
  `members_list` tinyint(1) NOT NULL DEFAULT '0',
  `members_add` tinyint(1) NOT NULL DEFAULT '0',
  `members_edit` tinyint(1) NOT NULL DEFAULT '0',
  `members_del` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`per_uid`, `group_uid`, `pages_menu`, `pages_list`, `pages_add`, `pages_edit`, `pages_del`, `faq_categories_menu`, `faq_categories_list`, `faq_categories_add`, `faq_categories_edit`, `faq_categories_del`, `faq_menu`, `faq_list`, `faq_add`, `faq_edit`, `faq_del`, `cars_categories_menu`, `cars_categories_list`, `cars_categories_add`, `cars_categories_edit`, `cars_categories_del`, `cars_types_menu`, `cars_types_list`, `cars_types_add`, `cars_types_edit`, `cars_types_del`, `blogs_menu`, `blogs_list`, `blogs_add`, `blogs_edit`, `blogs_del`, `admins_menu`, `admins_list`, `admins_add`, `admins_edit`, `admins_del`, `groups_menu`, `groups_list`, `groups_add`, `groups_edit`, `groups_del`, `groups_permissions`, `cars_brands_menu`, `cars_brands_list`, `cars_brands_add`, `cars_brands_edit`, `cars_brands_del`, `albums_menu`, `albums_list`, `albums_add`, `albums_edit`, `albums_del`, `cars_menu`, `cars_list`, `cars_add`, `cars_edit`, `cars_del`, `memberships_menu`, `memberships_list`, `memberships_add`, `memberships_edit`, `memberships_del`, `members_menu`, `members_list`, `members_add`, `members_edit`, `members_del`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(2, 2, 0, 0, 0, 0, 0, 1, 1, 1, 1, 0, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `site_uid` int(11) NOT NULL,
  `site_name` varchar(100) NOT NULL,
  `site_slogan` varchar(255) NOT NULL,
  `site_logo` varchar(255) NOT NULL,
  `site_description` varchar(160) NOT NULL,
  `site_keywords` text NOT NULL,
  `site_email` text NOT NULL,
  `site_facebook` text NOT NULL,
  `site_twitter` text NOT NULL,
  `site_google` text NOT NULL,
  `site_instagram` text NOT NULL,
  `site_phone` text NOT NULL,
  `site_branches` tinyint(1) NOT NULL DEFAULT '0',
  `site_address` text NOT NULL,
  `site_location` text,
  `site_code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`site_uid`, `site_name`, `site_slogan`, `site_logo`, `site_description`, `site_keywords`, `site_email`, `site_facebook`, `site_twitter`, `site_google`, `site_instagram`, `site_phone`, `site_branches`, `site_address`, `site_location`, `site_code`) VALUES
(1, 'site_name_vertex_1561421038', 'site_slogan_vertex_1561421038', '6e32541f10d2d15a138c56bb146fa4c9.png', 'site_description_vertex_1561421038', 'site_keywords_vertex_1561421038', 'customercare@efadcar.com', 'efadFacebook', 'efadTwitter', 'efadInstagram', '', '966555208078', 1, 'site_address_vertex_1561421038', NULL, '_vertex_1561421038');

-- --------------------------------------------------------

--
-- Table structure for table `strings`
--

CREATE TABLE `strings` (
  `string_uid` int(11) NOT NULL,
  `string_key` varchar(255) NOT NULL,
  `string_code` varchar(100) NOT NULL DEFAULT '_vertex_1491852323',
  `string_lang` varchar(10) NOT NULL,
  `string_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `strings`
--

INSERT INTO `strings` (`string_uid`, `string_key`, `string_code`, `string_lang`, `string_content`) VALUES
(1, 'page_title_vertex_1560197104', '_vertex_1560197104', 'arabic', 'أتصل بنا'),
(2, 'page_text_vertex_1560197104', '_vertex_1560197104', 'arabic', 'أتصل بنا'),
(3, 'page_meta_desc_vertex_1560197104', '_vertex_1560197104', 'arabic', 'أتصل بنا'),
(4, 'page_meta_keywords_vertex_1560197104', '_vertex_1560197104', 'arabic', 'أتصل بنا'),
(5, 'page_title_vertex_1560197104', '_vertex_1560197104', 'english', 'About us'),
(6, 'page_text_vertex_1560197104', '_vertex_1560197104', 'english', 'About us'),
(7, 'page_meta_desc_vertex_1560197104', '_vertex_1560197104', 'english', 'About us'),
(8, 'page_meta_keywords_vertex_1560197104', '_vertex_1560197104', 'english', 'About us'),
(9, 'fc_name_vertex_1560273363', '_vertex_1560273363', 'arabic', 'البيانات الخاصة'),
(10, 'fc_meta_desc_vertex_1560273363', '_vertex_1560273363', 'arabic', 'البيانات الخاصة'),
(11, 'fc_meta_keywords_vertex_1560273363', '_vertex_1560273363', 'arabic', 'البيانات الخاصة'),
(12, 'fc_name_vertex_1560273363', '_vertex_1560273363', 'english', 'Private data'),
(13, 'fc_meta_desc_vertex_1560273363', '_vertex_1560273363', 'english', 'Private data'),
(14, 'fc_meta_keywords_vertex_1560273363', '_vertex_1560273363', 'english', 'Private data'),
(15, 'fc_name_vertex_1560273433', '_vertex_1560273433', 'arabic', 'الحساب'),
(16, 'fc_meta_desc_vertex_1560273433', '_vertex_1560273433', 'arabic', 'الحساب'),
(17, 'fc_meta_keywords_vertex_1560273433', '_vertex_1560273433', 'arabic', 'الحساب'),
(18, 'fc_name_vertex_1560273433', '_vertex_1560273433', 'english', 'account'),
(19, 'fc_meta_desc_vertex_1560273433', '_vertex_1560273433', 'english', 'account'),
(20, 'fc_meta_keywords_vertex_1560273433', '_vertex_1560273433', 'english', 'account'),
(21, 'fc_name_vertex_1560273448', '_vertex_1560273448', 'arabic', 'الدفع'),
(22, 'fc_meta_desc_vertex_1560273448', '_vertex_1560273448', 'arabic', 'الدفع'),
(23, 'fc_meta_keywords_vertex_1560273448', '_vertex_1560273448', 'arabic', 'الدفع'),
(24, 'fc_name_vertex_1560273448', '_vertex_1560273448', 'english', 'payment'),
(25, 'fc_meta_desc_vertex_1560273448', '_vertex_1560273448', 'english', 'payment'),
(26, 'fc_meta_keywords_vertex_1560273448', '_vertex_1560273448', 'english', 'payment'),
(27, 'faq_question_vertex_1560275918', '_vertex_1560275918', 'arabic', 'هل يمكننى غلق الحساب؟'),
(28, 'faq_answer_vertex_1560275918', '_vertex_1560275918', 'arabic', 'لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريد أكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات . ديواس أيوتي أريري دولار إن ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم دولار أيو فيجايت نيولا باراياتيور. أيكسسيبتيور ساينت أوككايكات كيوبايداتات نون بروايدينت ,سيونت ان كيولبا كيو أوفيسيا ديسيريونتموليت انيم أيدي ايست لابوريوم."'),
(29, 'faq_meta_desc_vertex_1560275918', '_vertex_1560275918', 'arabic', 'لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور أنكايدي'),
(30, 'faq_meta_keywords_vertex_1560275918', '_vertex_1560275918', 'arabic', 'غلق الحساب'),
(31, 'faq_question_vertex_1560275918', '_vertex_1560275918', 'english', 'Can I close the account?'),
(32, 'faq_answer_vertex_1560275918', '_vertex_1560275918', 'english', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(33, 'faq_meta_desc_vertex_1560275918', '_vertex_1560275918', 'english', 'orem Ipsum is simply dummy text of the printing and typesetting industr'),
(34, 'faq_meta_keywords_vertex_1560275918', '_vertex_1560275918', 'english', 'close'),
(35, 'cc_name_vertex_1560362499', '_vertex_1560362499', 'arabic', 'الاقتصادية'),
(36, 'cc_meta_desc_vertex_1560362499', '_vertex_1560362499', 'arabic', 'الاقتصادية'),
(37, 'cc_meta_keywords_vertex_1560362499', '_vertex_1560362499', 'arabic', 'الاقتصادية'),
(38, 'cc_name_vertex_1560362499', '_vertex_1560362499', 'english', 'Economic'),
(39, 'cc_meta_desc_vertex_1560362499', '_vertex_1560362499', 'english', 'Economic'),
(40, 'cc_meta_keywords_vertex_1560362499', '_vertex_1560362499', 'english', 'Economic'),
(41, 'cc_name_vertex_1560362522', '_vertex_1560362522', 'arabic', 'المتوسطة'),
(42, 'cc_meta_desc_vertex_1560362522', '_vertex_1560362522', 'arabic', 'المتوسطة'),
(43, 'cc_meta_keywords_vertex_1560362522', '_vertex_1560362522', 'arabic', 'المتوسطة'),
(44, 'cc_name_vertex_1560362522', '_vertex_1560362522', 'english', 'Medium'),
(45, 'cc_meta_desc_vertex_1560362522', '_vertex_1560362522', 'english', 'Medium'),
(46, 'cc_meta_keywords_vertex_1560362522', '_vertex_1560362522', 'english', 'Medium'),
(47, 'cc_name_vertex_1560362554', '_vertex_1560362554', 'arabic', 'الصغيرة'),
(48, 'cc_meta_desc_vertex_1560362554', '_vertex_1560362554', 'arabic', 'الصغيرة'),
(49, 'cc_meta_keywords_vertex_1560362554', '_vertex_1560362554', 'arabic', 'الصغيرة'),
(50, 'cc_name_vertex_1560362554', '_vertex_1560362554', 'english', 'Small'),
(51, 'cc_meta_desc_vertex_1560362554', '_vertex_1560362554', 'english', 'Small'),
(52, 'cc_meta_keywords_vertex_1560362554', '_vertex_1560362554', 'english', 'Small'),
(55, 'ct_name_vertex_1560642926', '_vertex_1560642926', 'arabic', 'رياضية'),
(56, 'ct_meta_desc_vertex_1560642926', '_vertex_1560642926', 'arabic', 'رياضية'),
(57, 'ct_meta_keywords_vertex_1560642926', '_vertex_1560642926', 'arabic', 'رياضية'),
(58, 'ct_name_vertex_1560642926', '_vertex_1560642926', 'english', 'sport'),
(59, 'ct_meta_desc_vertex_1560642926', '_vertex_1560642926', 'english', 'sport'),
(60, 'ct_meta_keywords_vertex_1560642926', '_vertex_1560642926', 'english', 'sport'),
(61, 'site_name_vertex_1561421038', '_vertex_1561421038', 'arabic', 'إفاد'),
(62, 'site_slogan_vertex_1561421038', '_vertex_1561421038', 'arabic', 'سلوجن'),
(63, 'site_description_vertex_1561421038', '_vertex_1561421038', 'arabic', 'الوصف'),
(64, 'site_keywords_vertex_1561421038', '_vertex_1561421038', 'arabic', 'الكلمات'),
(65, 'site_address_vertex_1561421038', '_vertex_1561421038', 'arabic', 'العناوين'),
(66, 'site_name_vertex_1561421038', '_vertex_1561421038', 'english', 'Efad'),
(67, 'site_slogan_vertex_1561421038', '_vertex_1561421038', 'english', 'slogn'),
(68, 'site_description_vertex_1561421038', '_vertex_1561421038', 'english', 'description'),
(69, 'site_keywords_vertex_1561421038', '_vertex_1561421038', 'english', 'keywords'),
(70, 'site_address_vertex_1561421038', '_vertex_1561421038', 'english', 'address'),
(71, 'cb_name_vertex_1561903544', '_vertex_1561903544', 'arabic', 'كيا'),
(72, 'cb_meta_desc_vertex_1561903544', '_vertex_1561903544', 'arabic', 'كيا'),
(73, 'cb_meta_keywords_vertex_1561903544', '_vertex_1561903544', 'arabic', 'كيا'),
(74, 'cb_name_vertex_1561903544', '_vertex_1561903544', 'english', 'kia'),
(75, 'cb_meta_desc_vertex_1561903544', '_vertex_1561903544', 'english', 'kia'),
(76, 'cb_meta_keywords_vertex_1561903544', '_vertex_1561903544', 'english', 'kia'),
(77, 'album_name_vertex_1562121844', '_vertex_1562121844', 'arabic', 'كيا سيراتو حمراء 2018'),
(78, 'album_name_vertex_1562121844', '_vertex_1562121844', 'english', 'Kia cerato red 2018'),
(79, 'media_title_vertex_1562123872', '_vertex_1562123872', 'arabic', 'kia cerato 2018 red'),
(80, 'media_title_vertex_1562123872', '_vertex_1562123872', 'english', 'kia cerato 2018 red'),
(81, 'media_title_vertex_1562123915', '_vertex_1562123915', 'arabic', 'kia cerato 2018 red'),
(82, 'media_title_vertex_1562123915', '_vertex_1562123915', 'english', 'kia cerato 2018 red');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`album_uid`),
  ADD UNIQUE KEY `album_uid` (`album_uid`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`blog_uid`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`car_uid`);

--
-- Indexes for table `cars_brands`
--
ALTER TABLE `cars_brands`
  ADD PRIMARY KEY (`cb_uid`);

--
-- Indexes for table `cars_categories`
--
ALTER TABLE `cars_categories`
  ADD PRIMARY KEY (`cc_uid`);

--
-- Indexes for table `cars_colors`
--
ALTER TABLE `cars_colors`
  ADD PRIMARY KEY (`cco_uid`);

--
-- Indexes for table `cars_types`
--
ALTER TABLE `cars_types`
  ADD PRIMARY KEY (`ct_uid`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`city_uid`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`siteID`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dx_groups`
--
ALTER TABLE `dx_groups`
  ADD PRIMARY KEY (`group_uid`);

--
-- Indexes for table `dx_users`
--
ALTER TABLE `dx_users`
  ADD PRIMARY KEY (`user_uid`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`faq_uid`);

--
-- Indexes for table `faq_categories`
--
ALTER TABLE `faq_categories`
  ADD PRIMARY KEY (`fc_uid`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`lang_uid`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`media_uid`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`member_uid`);

--
-- Indexes for table `memberships`
--
ALTER TABLE `memberships`
  ADD PRIMARY KEY (`mc_uid`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`page_uid`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`per_uid`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`site_uid`);

--
-- Indexes for table `strings`
--
ALTER TABLE `strings`
  ADD PRIMARY KEY (`string_uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `album_uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `blog_uid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `car_uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cars_brands`
--
ALTER TABLE `cars_brands`
  MODIFY `cb_uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cars_categories`
--
ALTER TABLE `cars_categories`
  MODIFY `cc_uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `cars_colors`
--
ALTER TABLE `cars_colors`
  MODIFY `cco_uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `cars_types`
--
ALTER TABLE `cars_types`
  MODIFY `ct_uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `city_uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;
--
-- AUTO_INCREMENT for table `dx_groups`
--
ALTER TABLE `dx_groups`
  MODIFY `group_uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `dx_users`
--
ALTER TABLE `dx_users`
  MODIFY `user_uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `faq_uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `faq_categories`
--
ALTER TABLE `faq_categories`
  MODIFY `fc_uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `lang_uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `media_uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `member_uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `memberships`
--
ALTER TABLE `memberships`
  MODIFY `mc_uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `page_uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `per_uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `site_uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `strings`
--
ALTER TABLE `strings`
  MODIFY `string_uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
