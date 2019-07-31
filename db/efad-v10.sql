-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 30, 2019 at 09:06 PM
-- Server version: 5.6.43-cll-lve
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `book_uid` int(11) NOT NULL,
  `member_uid` int(11) NOT NULL,
  `car_uid` int(11) NOT NULL,
  `book_start_date` date NOT NULL DEFAULT '0000-00-00',
  `book_end_date` date NOT NULL DEFAULT '0000-00-00',
  `delivery_city_uid` int(11) NOT NULL,
  `book_total_days` int(11) NOT NULL,
  `book_status` tinyint(1) NOT NULL DEFAULT '1',
  `book_edit_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `book_added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
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
('22e3a57b5754b9e3d722d797b73c9fec8aa2ba5f', '41.45.124.22', 1564430472, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536343433303432353b736974654e616d657c733a383a22d8a5d981d8a7d8af223b736974654d657461446573637c733a343a2274657374223b736974654d6574614b577c733a343a2274657374223b7369746550657250616765506167696e6174696f6e7c733a333a22313030223b6d657373616765737c613a303a7b7d6572726f725f6c6f67696e7c693a313b61646d696e5f66756c6c5f6e616d657c733a32373a22d8a7d8a8d8b1d8a7d987d98ad98520d8a7d984d8b5d8a7d988d98a223b61646d696e5f7569647c733a313a2237223b61646d696e5f67726f75707c733a313a2231223b69735f6c6f676765645f696e7c623a313b),
('29ripkpt93plsen3hvt5fbo2hqt173ec', '41.239.239.208', 1564545902, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536343534353839353b736974655f6c616e677c733a363a22617261626963223b736974655f73657474696e67737c613a31333a7b733a393a22736974655f6e616d65223b733a383a22d8a5d981d8a7d8af223b733a31313a22736974655f736c6f67616e223b733a31303a22d8b3d984d988d8acd986223b733a393a22736974655f6c6f676f223b733a33363a2236653332353431663130643264313561313338633536626231343666613463392e706e67223b733a31363a22736974655f6465736372697074696f6e223b733a31303a22d8a7d984d988d8b5d981223b733a31333a22736974655f6b6579776f726473223b733a31343a22d8a7d984d983d984d985d8a7d8aa223b733a31323a22736974655f61646472657373223b733a31363a22d8a7d984d8b9d986d8a7d988d98ad986223b733a31303a22736974655f656d61696c223b733a32343a22637573746f6d65726361726540656661646361722e636f6d223b733a31333a22736974655f66616365626f6f6b223b733a31323a226566616446616365626f6f6b223b733a31323a22736974655f74776974746572223b733a31313a226566616454776974746572223b733a31313a22736974655f676f6f676c65223b733a31333a2265666164496e7374616772616d223b733a31343a22736974655f696e7374616772616d223b733a303a22223b733a31303a22736974655f70686f6e65223b733a31323a22393636353535323038303738223b733a31333a22736974655f6272616e63686573223b733a313a2231223b7d6d657373616765737c613a303a7b7d),
('35334c466d8c8a4ca64bab92ad09e9db2997ed2b', '176.225.76.195', 1564430828, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536343433303832383b),
('5hqopvl4fj13cqo3qfn3voolssqmehm9', '176.225.76.195', 1564430333, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536343433303330383b736974655f6c616e677c733a363a22617261626963223b736974655f73657474696e67737c613a31333a7b733a393a22736974655f6e616d65223b733a383a22d8a5d981d8a7d8af223b733a31313a22736974655f736c6f67616e223b733a31303a22d8b3d984d988d8acd986223b733a393a22736974655f6c6f676f223b733a33363a2236653332353431663130643264313561313338633536626231343666613463392e706e67223b733a31363a22736974655f6465736372697074696f6e223b733a31303a22d8a7d984d988d8b5d981223b733a31333a22736974655f6b6579776f726473223b733a31343a22d8a7d984d983d984d985d8a7d8aa223b733a31323a22736974655f61646472657373223b733a31363a22d8a7d984d8b9d986d8a7d988d98ad986223b733a31303a22736974655f656d61696c223b733a32343a22637573746f6d65726361726540656661646361722e636f6d223b733a31333a22736974655f66616365626f6f6b223b733a31323a226566616446616365626f6f6b223b733a31323a22736974655f74776974746572223b733a31313a226566616454776974746572223b733a31313a22736974655f676f6f676c65223b733a31333a2265666164496e7374616772616d223b733a31343a22736974655f696e7374616772616d223b733a303a22223b733a31303a22736974655f70686f6e65223b733a31323a22393636353535323038303738223b733a31333a22736974655f6272616e63686573223b733a313a2231223b7d6d657373616765737c613a303a7b7d),
('5vt1srgu6j3qqabsfkkl535ug0h3oc4h', '41.239.239.208', 1564545973, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536343534353932323b736974655f6c616e677c733a363a22617261626963223b736974655f73657474696e67737c613a31333a7b733a393a22736974655f6e616d65223b733a383a22d8a5d981d8a7d8af223b733a31313a22736974655f736c6f67616e223b733a31303a22d8b3d984d988d8acd986223b733a393a22736974655f6c6f676f223b733a33363a2236653332353431663130643264313561313338633536626231343666613463392e706e67223b733a31363a22736974655f6465736372697074696f6e223b733a31303a22d8a7d984d988d8b5d981223b733a31333a22736974655f6b6579776f726473223b733a31343a22d8a7d984d983d984d985d8a7d8aa223b733a31323a22736974655f61646472657373223b733a31363a22d8a7d984d8b9d986d8a7d988d98ad986223b733a31303a22736974655f656d61696c223b733a32343a22637573746f6d65726361726540656661646361722e636f6d223b733a31333a22736974655f66616365626f6f6b223b733a31323a226566616446616365626f6f6b223b733a31323a22736974655f74776974746572223b733a31313a226566616454776974746572223b733a31313a22736974655f676f6f676c65223b733a31333a2265666164496e7374616772616d223b733a31343a22736974655f696e7374616772616d223b733a303a22223b733a31303a22736974655f70686f6e65223b733a31323a22393636353535323038303738223b733a31333a22736974655f6272616e63686573223b733a313a2231223b7d6d657373616765737c613a303a7b7d63757272656e745f626f6f6b696e677c613a31393a7b733a363a22737461747573223b693a313b733a31303a226e65775f6d656d626572223b693a313b733a343a2264617973223b733a323a223132223b733a373a226361725f756964223b733a313a2231223b733a363a226d635f756964223b733a313a2233223b733a31353a22626f6f6b5f73746172745f64617465223b733a32343a2253617475726461792c2031372d4175677573742d32303139223b733a31333a22626f6f6b5f656e645f64617465223b733a32343a2254687572736461792c2032392d4175677573742d32303139223b733a31353a22646179735f746f5f6765745f636172223b733a323a223137223b733a31303a226461696c795f72617465223b733a333a22313030223b733a31303a22746f74616c5f66656573223b643a313030383b733a32353a226461696c795f726174655f61667465725f646973636f756e74223b643a38343b733a383a22667265655f646179223b643a313b733a32353a22746f74616c5f666565735f61667465725f667265655f646179223b643a3932343b733a31333a226561726c795f626f6f6b696e67223b693a303b733a32383a226561726c795f626f6f6b696e675f646973636f756e745f746f74616c223b693a303b733a33303a22746f74616c5f666565735f61667465725f6561726c795f626f6f6b696e67223b643a3932343b733a393a227461785f746f74616c223b643a34362e323030303030303030303030303032383432313730393433303430343030373433343834343937303730333132353b733a32303a22746f74616c5f666565735f61667465725f746178223b643a3937302e3230303030303030303030303034353437343733353038383634363431313839353735313935333132353b733a383a22636974795f756964223b733a313a2235223b7d),
('8827fd06h6kg9qo3o6i8djnff2009490', '52.114.77.26', 1564427526, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536343432373532363b736974655f6c616e677c733a363a22617261626963223b736974655f73657474696e67737c613a31333a7b733a393a22736974655f6e616d65223b733a383a22d8a5d981d8a7d8af223b733a31313a22736974655f736c6f67616e223b733a31303a22d8b3d984d988d8acd986223b733a393a22736974655f6c6f676f223b733a33363a2236653332353431663130643264313561313338633536626231343666613463392e706e67223b733a31363a22736974655f6465736372697074696f6e223b733a31303a22d8a7d984d988d8b5d981223b733a31333a22736974655f6b6579776f726473223b733a31343a22d8a7d984d983d984d985d8a7d8aa223b733a31323a22736974655f61646472657373223b733a31363a22d8a7d984d8b9d986d8a7d988d98ad986223b733a31303a22736974655f656d61696c223b733a32343a22637573746f6d65726361726540656661646361722e636f6d223b733a31333a22736974655f66616365626f6f6b223b733a31323a226566616446616365626f6f6b223b733a31323a22736974655f74776974746572223b733a31313a226566616454776974746572223b733a31313a22736974655f676f6f676c65223b733a31333a2265666164496e7374616772616d223b733a31343a22736974655f696e7374616772616d223b733a303a22223b733a31303a22736974655f70686f6e65223b733a31323a22393636353535323038303738223b733a31333a22736974655f6272616e63686573223b733a313a2231223b7d6d657373616765737c613a303a7b7d),
('cbhnk3i46pe48mra9ss6goqtaunt2ank', '41.45.124.22', 1564434209, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536343433343230393b736974655f6c616e677c733a363a22617261626963223b736974655f73657474696e67737c613a31333a7b733a393a22736974655f6e616d65223b733a383a22d8a5d981d8a7d8af223b733a31313a22736974655f736c6f67616e223b733a31303a22d8b3d984d988d8acd986223b733a393a22736974655f6c6f676f223b733a33363a2236653332353431663130643264313561313338633536626231343666613463392e706e67223b733a31363a22736974655f6465736372697074696f6e223b733a31303a22d8a7d984d988d8b5d981223b733a31333a22736974655f6b6579776f726473223b733a31343a22d8a7d984d983d984d985d8a7d8aa223b733a31323a22736974655f61646472657373223b733a31363a22d8a7d984d8b9d986d8a7d988d98ad986223b733a31303a22736974655f656d61696c223b733a32343a22637573746f6d65726361726540656661646361722e636f6d223b733a31333a22736974655f66616365626f6f6b223b733a31323a226566616446616365626f6f6b223b733a31323a22736974655f74776974746572223b733a31313a226566616454776974746572223b733a31313a22736974655f676f6f676c65223b733a31333a2265666164496e7374616772616d223b733a31343a22736974655f696e7374616772616d223b733a303a22223b733a31303a22736974655f70686f6e65223b733a31323a22393636353535323038303738223b733a31333a22736974655f6272616e63686573223b733a313a2231223b7d6d657373616765737c613a303a7b7d),
('qu99l8ie5v34nrbcas823jck8hskflqi', '176.225.76.195', 1564430825, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536343433303832353b736974655f6c616e677c733a363a22617261626963223b736974655f73657474696e67737c613a31333a7b733a393a22736974655f6e616d65223b733a383a22d8a5d981d8a7d8af223b733a31313a22736974655f736c6f67616e223b733a31303a22d8b3d984d988d8acd986223b733a393a22736974655f6c6f676f223b733a33363a2236653332353431663130643264313561313338633536626231343666613463392e706e67223b733a31363a22736974655f6465736372697074696f6e223b733a31303a22d8a7d984d988d8b5d981223b733a31333a22736974655f6b6579776f726473223b733a31343a22d8a7d984d983d984d985d8a7d8aa223b733a31323a22736974655f61646472657373223b733a31363a22d8a7d984d8b9d986d8a7d988d98ad986223b733a31303a22736974655f656d61696c223b733a32343a22637573746f6d65726361726540656661646361722e636f6d223b733a31333a22736974655f66616365626f6f6b223b733a31323a226566616446616365626f6f6b223b733a31323a22736974655f74776974746572223b733a31313a226566616454776974746572223b733a31313a22736974655f676f6f676c65223b733a31333a2265666164496e7374616772616d223b733a31343a22736974655f696e7374616772616d223b733a303a22223b733a31303a22736974655f70686f6e65223b733a31323a22393636353535323038303738223b733a31333a22736974655f6272616e63686573223b733a313a2231223b7d6d657373616765737c613a303a7b7d),
('s1aunk9gvagjiuvk6hd43ked0oqp82qb', '197.60.144.208', 1564427532, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536343432373533323b736974655f6c616e677c733a363a22617261626963223b736974655f73657474696e67737c613a31333a7b733a393a22736974655f6e616d65223b733a383a22d8a5d981d8a7d8af223b733a31313a22736974655f736c6f67616e223b733a31303a22d8b3d984d988d8acd986223b733a393a22736974655f6c6f676f223b733a33363a2236653332353431663130643264313561313338633536626231343666613463392e706e67223b733a31363a22736974655f6465736372697074696f6e223b733a31303a22d8a7d984d988d8b5d981223b733a31333a22736974655f6b6579776f726473223b733a31343a22d8a7d984d983d984d985d8a7d8aa223b733a31323a22736974655f61646472657373223b733a31363a22d8a7d984d8b9d986d8a7d988d98ad986223b733a31303a22736974655f656d61696c223b733a32343a22637573746f6d65726361726540656661646361722e636f6d223b733a31333a22736974655f66616365626f6f6b223b733a31323a226566616446616365626f6f6b223b733a31323a22736974655f74776974746572223b733a31313a226566616454776974746572223b733a31313a22736974655f676f6f676c65223b733a31333a2265666164496e7374616772616d223b733a31343a22736974655f696e7374616772616d223b733a303a22223b733a31303a22736974655f70686f6e65223b733a31323a22393636353535323038303738223b733a31333a22736974655f6272616e63686573223b733a313a2231223b7d6d657373616765737c613a303a7b7d);

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
(53, 'CI', 'ساحل العاج', 'Cote D\'Ivoire', 'CIV', 384, 225, 0, '2019-03-14 20:16:58'),
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
(112, 'KP', 'كوريا، الجمهورية الشعبية الديمقراطية', 'Korea, Democratic People\'s Republic of', 'PRK', 408, 850, 0, '2019-03-14 20:16:58'),
(113, 'KR', 'جمهورية كوريا', 'Korea, Republic of', 'KOR', 410, 82, 0, '2019-03-14 20:16:58'),
(114, 'KW', 'الكويت', 'Kuwait', 'KWT', 414, 965, 0, '2019-03-14 20:16:58'),
(115, 'KG', 'قرغيزستان', 'Kyrgyzstan', 'KGZ', 417, 996, 0, '2019-03-14 20:16:58'),
(116, 'LA', 'جمهورية لاو الديمقراطية الشعبية', 'Lao People\'s Democratic Republic', 'LAO', 418, 856, 0, '2019-03-14 20:16:58'),
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
(1, '_vertex_1560275918', 'can-i-close-the-account', 'faq_question_vertex_1560275918', 'faq_answer_vertex_1560275918', 'faq_meta_desc_vertex_1560275918', 'faq_meta_keywords_vertex_1560275918', 2),
(2, '_vertex_1564383138', 'what-is-efad-platform', 'faq_question_vertex_1564383138', 'faq_answer_vertex_1564383138', 'faq_meta_desc_vertex_1564383138', 'faq_meta_keywords_vertex_1564383138', 8),
(3, '_vertex_1564392083', 'who-is-eligible-to-use-our-services', 'faq_question_vertex_1564392083', 'faq_answer_vertex_1564392083', 'faq_meta_desc_vertex_1564392083', 'faq_meta_keywords_vertex_1564392083', 8),
(4, '_vertex_1564392281', 'do-i-need-a-drivers-license-to-use-the-car', 'faq_question_vertex_1564392281', 'faq_answer_vertex_1564392281', 'faq_meta_desc_vertex_1564392281', 'faq_meta_keywords_vertex_1564392281', 8),
(5, '_vertex_1564392398', 'does-efad-has-the-right-to-verify-customer-information', 'faq_question_vertex_1564392398', 'faq_answer_vertex_1564392398', 'faq_meta_desc_vertex_1564392398', 'faq_meta_keywords_vertex_1564392398', 8),
(6, '_vertex_1564392521', 'can-i-finally-own-my-car', 'faq_question_vertex_1564392521', 'faq_answer_vertex_1564392521', 'faq_meta_desc_vertex_1564392521', 'faq_meta_keywords_vertex_1564392521', 0),
(7, '_vertex_1564392630', 'can-i-return-the-car-or-switch-it-with-another-car', 'faq_question_vertex_1564392630', 'faq_answer_vertex_1564392630', 'faq_meta_desc_vertex_1564392630', 'faq_meta_keywords_vertex_1564392630', 8),
(8, '_vertex_1564392809', 'is-it-possible-to-let-my-personal-driver-drive-my-car', 'faq_question_vertex_1564392809', 'faq_answer_vertex_1564392809', 'faq_meta_desc_vertex_1564392809', 'faq_meta_keywords_vertex_1564392809', 5),
(9, '_vertex_1564392928', 'can-i-book-a-car-for-my-personal-driver', 'faq_question_vertex_1564392928', 'faq_answer_vertex_1564392928', 'faq_meta_desc_vertex_1564392928', 'faq_meta_keywords_vertex_1564392928', 5),
(10, '_vertex_1564393007', 'can-i-get-a-car-without-subscribing-to-a-membership-class', 'faq_question_vertex_1564393007', 'faq_answer_vertex_1564393007', 'faq_meta_desc_vertex_1564393007', 'faq_meta_keywords_vertex_1564393007', 4),
(11, '_vertex_1564393061', 'what-is-the-best-category-of-membership-for-me', 'faq_question_vertex_1564393061', 'faq_answer_vertex_1564393061', 'faq_meta_desc_vertex_1564393061', 'faq_meta_keywords_vertex_1564393061', 0),
(12, '_vertex_1564393140', 'what-brands-or-types-of-cars-do-you-have', 'faq_question_vertex_1564393140', 'faq_answer_vertex_1564393140', 'faq_meta_desc_vertex_1564393140', 'faq_meta_keywords_vertex_1564393140', 5),
(13, '_vertex_1564393380', 'once-i-get-a-car-from-efad-what-benefits-and-services-will-i-get', 'faq_question_vertex_1564393380', 'faq_answer_vertex_1564393380', 'faq_meta_desc_vertex_1564393380', 'faq_meta_keywords_vertex_1564393380', 8),
(14, '_vertex_1564393505', 'can-i-drive-my-car-for-commercial-purposes', 'faq_question_vertex_1564393505', 'faq_answer_vertex_1564393505', 'faq_meta_desc_vertex_1564393505', 'faq_meta_keywords_vertex_1564393505', 5),
(15, '_vertex_1564393717', 'are-there-additional-requests-in-order-to-get-a-car-such-as-pay-car-insurance-provide-business-card', 'faq_question_vertex_1564393717', 'faq_answer_vertex_1564393717', 'faq_meta_desc_vertex_1564393717', 'faq_meta_keywords_vertex_1564393717', 8),
(16, '_vertex_1564403226', 'is-anyone-else-allowed-to-drive', 'faq_question_vertex_1564403226', 'faq_answer_vertex_1564403226', 'faq_meta_desc_vertex_1564403226', 'faq_meta_keywords_vertex_1564403226', 5),
(17, '_vertex_1564403447', 'can-i-pay-the-membership-fee-in-cash', 'faq_question_vertex_1564403447', 'faq_answer_vertex_1564403447', 'faq_meta_desc_vertex_1564403447', 'faq_meta_keywords_vertex_1564403447', 3),
(18, '_vertex_1564403572', 'can-i-pay-the-subscription-service-fee-in-cash', 'faq_question_vertex_1564403572', 'faq_answer_vertex_1564403572', 'faq_meta_desc_vertex_1564403572', 'faq_meta_keywords_vertex_1564403572', 3),
(19, '_vertex_1564403915', 'do-you-have-an-instant-booking-service-and-receive-the-car-immediately', 'faq_question_vertex_1564403915', 'faq_answer_vertex_1564403915', 'faq_meta_desc_vertex_1564403915', 'faq_meta_keywords_vertex_1564403915', 8),
(20, '_vertex_1564404064', 'is-there-an-additional-charge-for-the-comprehensive-insurance-service-the-unlimited-kilo-service-roadside-assistance-or-fuel-service', 'faq_question_vertex_1564404064', 'faq_answer_vertex_1564404064', 'faq_meta_desc_vertex_1564404064', 'faq_meta_keywords_vertex_1564404064', 3),
(21, '_vertex_1564404198', 'is-there-a-car-delivery-service', 'faq_question_vertex_1564404198', 'faq_answer_vertex_1564404198', 'faq_meta_desc_vertex_1564404198', 'faq_meta_keywords_vertex_1564404198', 8),
(22, '_vertex_1564404246', 'why-do-i-choose-a-longer-subscription-period', 'faq_question_vertex_1564404246', 'faq_answer_vertex_1564404246', 'faq_meta_desc_vertex_1564404246', 'faq_meta_keywords_vertex_1564404246', 5),
(23, '_vertex_1564404633', 'how-do-i-cancel-my-subscription-service', 'faq_question_vertex_1564404633', 'faq_answer_vertex_1564404633', 'faq_meta_desc_vertex_1564404633', 'faq_meta_keywords_vertex_1564404633', 5),
(24, '_vertex_1564404725', 'can-i-upgrade-my-membership', 'faq_question_vertex_1564404725', 'faq_answer_vertex_1564404725', 'faq_meta_desc_vertex_1564404725', 'faq_meta_keywords_vertex_1564404725', 4),
(25, '_vertex_1564405339', 'what-should-i-do-if-my-car-got-stolen', 'faq_question_vertex_1564405339', 'faq_answer_vertex_1564405339', 'faq_meta_desc_vertex_1564405339', 'faq_meta_keywords_vertex_1564405339', 0),
(26, '_vertex_1564405402', 'what-should-i-do-if-i-got-in-a-traffic-accident', 'faq_question_vertex_1564405402', 'faq_answer_vertex_1564405402', 'faq_meta_desc_vertex_1564405402', 'faq_meta_keywords_vertex_1564405402', 0),
(27, '_vertex_1564405477', 'am-i-entitled-to-give-up-on-behalf-of-the-rights-of-efad', 'faq_question_vertex_1564405477', 'faq_answer_vertex_1564405477', 'faq_meta_desc_vertex_1564405477', 'faq_meta_keywords_vertex_1564405477', 0),
(28, '_vertex_1564405533', 'can-i-return-my-car-before-the-end-of-the-subscription-period', 'faq_question_vertex_1564405533', 'faq_answer_vertex_1564405533', 'faq_meta_desc_vertex_1564405533', 'faq_meta_keywords_vertex_1564405533', 5),
(29, '_vertex_1564405707', 'can-i-pay-my-membership-or-my-subscription-service-fee-later', 'faq_question_vertex_1564405707', 'faq_answer_vertex_1564405707', 'faq_meta_desc_vertex_1564405707', 'faq_meta_keywords_vertex_1564405707', 3),
(30, '_vertex_1564405815', 'what-are-the-steps-to-return-the-car-what-should-i-expect-while-returning-the-car', 'faq_question_vertex_1564405815', 'faq_answer_vertex_1564405815', 'faq_meta_desc_vertex_1564405815', 'faq_meta_keywords_vertex_1564405815', 5),
(31, '_vertex_1564405965', 'what-are-the-available-methods-for-making-the-payment', 'faq_question_vertex_1564405965', 'faq_answer_vertex_1564405965', 'faq_meta_desc_vertex_1564405965', 'faq_meta_keywords_vertex_1564405965', 3),
(32, '_vertex_1564406017', 'can-i-shorten-the-subscription-period', 'faq_question_vertex_1564406017', 'faq_answer_vertex_1564406017', 'faq_meta_desc_vertex_1564406017', 'faq_meta_keywords_vertex_1564406017', 5),
(33, '_vertex_1564406108', 'how-long-does-the-refund-process-take', 'faq_question_vertex_1564406108', 'faq_answer_vertex_1564406108', 'faq_meta_desc_vertex_1564406108', 'faq_meta_keywords_vertex_1564406108', 3),
(34, '_vertex_1564406192', 'what-are-the-parts-that-covered-by-the-regular-maintenance-service', 'faq_question_vertex_1564406192', 'faq_answer_vertex_1564406192', 'faq_meta_desc_vertex_1564406192', 'faq_meta_keywords_vertex_1564406192', 0),
(35, '_vertex_1564406342', 'what-cities-are-you-operating-in', 'faq_question_vertex_1564406342', 'faq_answer_vertex_1564406342', 'faq_meta_desc_vertex_1564406342', 'faq_meta_keywords_vertex_1564406342', 8),
(36, '_vertex_1564406391', 'where-can-i-drive', 'faq_question_vertex_1564406391', 'faq_answer_vertex_1564406391', 'faq_meta_desc_vertex_1564406391', 'faq_meta_keywords_vertex_1564406391', 5),
(37, '_vertex_1564406473', 'how-do-i-view-my-subscription-invoices', 'faq_question_vertex_1564406473', 'faq_answer_vertex_1564406473', 'faq_meta_desc_vertex_1564406473', 'faq_meta_keywords_vertex_1564406473', 3),
(38, '_vertex_1564406735', 'what-happens-if-i-delayed-paying-my-subscription-service-fee-for-one-day', 'faq_question_vertex_1564406735', 'faq_answer_vertex_1564406735', 'faq_meta_desc_vertex_1564406735', 'faq_meta_keywords_vertex_1564406735', 3),
(39, '_vertex_1564407569', 'what-happens-if-i-delayed-paying-my-membership-fee-for-one-day', 'faq_question_vertex_1564407569', 'faq_answer_vertex_1564407569', 'faq_meta_desc_vertex_1564407569', 'faq_meta_keywords_vertex_1564407569', 3),
(40, '_vertex_1564407613', 'when-does-the-subscription-period-begin-for-my-time-period', 'faq_question_vertex_1564407613', 'faq_answer_vertex_1564407613', 'faq_meta_desc_vertex_1564407613', 'faq_meta_keywords_vertex_1564407613', 5),
(41, '_vertex_1564407922', 'when-will-i-get-my-car', 'faq_question_vertex_1564407922', 'faq_answer_vertex_1564407922', 'faq_meta_desc_vertex_1564407922', 'faq_meta_keywords_vertex_1564407922', 5),
(42, '_vertex_1564408086', 'what-are-the-available-options-if-i-lost-my-car-due-to-an-accident-or-technical-failure', 'faq_question_vertex_1564408086', 'faq_answer_vertex_1564408086', 'faq_meta_desc_vertex_1564408086', 'faq_meta_keywords_vertex_1564408086', 5),
(43, '_vertex_1564408130', 'what-is-the-early-booking-offer-service', 'faq_question_vertex_1564408130', 'faq_answer_vertex_1564408130', 'faq_meta_desc_vertex_1564408130', 'faq_meta_keywords_vertex_1564408130', 0),
(44, '_vertex_1564408217', 'can-i-drive-in-the-gulf-region-gcc', 'faq_question_vertex_1564408217', 'faq_answer_vertex_1564408217', 'faq_meta_desc_vertex_1564408217', 'faq_meta_keywords_vertex_1564408217', 0),
(45, '_vertex_1564408327', 'how-do-i-contact-your-customer-care-team', 'faq_question_vertex_1564408327', 'faq_answer_vertex_1564408327', 'faq_meta_desc_vertex_1564408327', 'faq_meta_keywords_vertex_1564408327', 6),
(46, '_vertex_1564408437', 'what-kinds-of-social-media-channel-does-efad-you-have', 'faq_question_vertex_1564408437', 'faq_answer_vertex_1564408437', 'faq_meta_desc_vertex_1564408437', 'faq_meta_keywords_vertex_1564408437', 6),
(47, '_vertex_1564409622', 'will-the-membership-fee-be-refunded-if-i-do-not-use-it', 'faq_question_vertex_1564409622', 'faq_answer_vertex_1564409622', 'faq_meta_desc_vertex_1564409622', 'faq_meta_keywords_vertex_1564409622', 4),
(48, '_vertex_1564409673', 'can-i-transfer-my-membership-to-someone-else', 'faq_question_vertex_1564409673', 'faq_answer_vertex_1564409673', 'faq_meta_desc_vertex_1564409673', 'faq_meta_keywords_vertex_1564409673', 4);

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
(3, '_vertex_1560273448', 'payment', 'fc_name_vertex_1560273448', 'fc_meta_desc_vertex_1560273448', 'fc_meta_keywords_vertex_1560273448'),
(4, '_vertex_1564390642', 'membership', 'fc_name_vertex_1564390642', 'fc_meta_desc_vertex_1564390642', 'fc_meta_keywords_vertex_1564390642'),
(5, '_vertex_1564390780', 'subscription-service', 'fc_name_vertex_1564390780', 'fc_meta_desc_vertex_1564390780', 'fc_meta_keywords_vertex_1564390780'),
(6, '_vertex_1564390993', 'contact-us', 'fc_name_vertex_1564390993', 'fc_meta_desc_vertex_1564390993', 'fc_meta_keywords_vertex_1564390993'),
(8, '_vertex_1564391303', 'general', 'fc_name_vertex_1564391303', 'fc_meta_desc_vertex_1564391303', 'fc_meta_keywords_vertex_1564391303');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `invoice_uid` int(11) NOT NULL,
  `related_uid` int(11) NOT NULL,
  `member_uid` int(11) NOT NULL,
  `invoice_start_date` date NOT NULL DEFAULT '0000-00-00',
  `invoice_end_date` date NOT NULL DEFAULT '0000-00-00',
  `book_total_days` int(11) DEFAULT NULL,
  `daily_rate` varchar(20) DEFAULT NULL,
  `daily_rate_after_discount` varchar(20) DEFAULT NULL,
  `free_days` int(11) NOT NULL DEFAULT '0',
  `is_early_booking` tinyint(1) NOT NULL DEFAULT '0',
  `invoice_total_fees` varchar(20) NOT NULL,
  `invoice_tax_total` varchar(20) NOT NULL,
  `invoice_total_fees_after_tax` varchar(20) NOT NULL,
  `invoice_payment_method` varchar(20) DEFAULT NULL,
  `invoice_status` tinyint(1) NOT NULL DEFAULT '1',
  `invoice_edit_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `invoice_add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(3, 1, 'a61a433bb70acaf5d0afe3ea9868c3c3.png', 'thumb_a61a433bb70acaf5d0afe3ea9868c3c3.png', '_vertex_1563225885', 'media_title_vertex_1563225885', 1);

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
  `mc_uid` int(11) DEFAULT NULL,
  `member_renewal_date` date DEFAULT NULL,
  `member_last_login` timestamp NULL DEFAULT NULL,
  `member_last_login_ip` varchar(20) DEFAULT NULL,
  `member_status` tinyint(1) NOT NULL DEFAULT '2',
  `member_add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_uid`, `member_fname`, `member_lname`, `member_email`, `member_mobile`, `member_password`, `country_uid`, `city_uid`, `mc_uid`, `member_renewal_date`, `member_last_login`, `member_last_login_ip`, `member_status`, `member_add_date`) VALUES
(1, 'ابراهيم', 'الصاوي', 'elsawy@efad.com', 548143428, '1bbd886460827015e5d605ed44252251', 187, 3, 1, '2019-09-18', '2019-07-29 15:47:46', '154.136.9.133', 2, '2019-07-11 21:32:52'),
(3, 'llvmp', 'uln', 'mamdouhomar@efadcar.com', 540008155, 'bfaab8d765e252f3de61378c718788fd', 187, 3, 3, '2020-07-24', '2019-07-25 06:12:00', '176.225.55.178', 2, '2019-07-25 05:25:43');

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
(1, '', 'الزرقاء', 59, 49, 39, 6, 1, 1, 1, 1, 1, 1, 1, 1, 1, 2, 1, 0, 0, 15, 0, 0, 0, 1, 0, '#118aff', 1, '2019-07-08 21:31:57'),
(2, '', 'الخضراء', 69, 59, 49, 11, 1, 1, 1, 1, 1, 1, 1, 1, 1, 4, 2, 100, 1, 0, 0, 0, 0, 1, 0, '#1bbc9d', 1, '2019-07-18 01:39:58'),
(3, '', 'الحمراء', 79, 69, 59, 16, 1, 1, 1, 1, 1, 1, 1, 1, 1, 6, 2, 200, 1, 0, 1, 1, 1, 1, 1, '#ce3819', 1, '2019-07-18 01:41:14'),
(4, '', 'الطلبة و الطالبات', 49, 49, 49, 5, 1, 1, 1, 1, 1, 1, 1, 1, 1, 2, 1, 0, 0, 10, 0, 0, 0, 1, 0, '#000000', 1, '2019-07-18 01:42:20');

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
(1, '_vertex_1560197104', 'about-us', 'page_title_vertex_1560197104', 'page_text_vertex_1560197104', 'ffa91c4a4ac733bd9e82a77a22b5a39a.png', 'page_meta_desc_vertex_1560197104', 'page_meta_keywords_vertex_1560197104'),
(2, '_vertex_1563735658', 'privacy-policy', 'page_title_vertex_1563735658', 'page_text_vertex_1563735658', '0a6951bc5189f08e843453a69598839a.png', 'page_meta_desc_vertex_1563735658', 'page_meta_keywords_vertex_1563735658'),
(3, '_vertex_1563736453', 'terms-conditions', 'page_title_vertex_1563736453', 'page_text_vertex_1563736453', '34360b58f65017459cb76481105f175c.png', 'page_meta_desc_vertex_1563736453', 'page_meta_keywords_vertex_1563736453'),
(4, '_vertex_1563736645', 'contact-us', 'page_title_vertex_1563736645', 'page_text_vertex_1563736645', '0a6d9180665963c9c7b58069e1adcb49.png', 'page_meta_desc_vertex_1563736645', 'page_meta_keywords_vertex_1563736645'),
(5, '_vertex_1563736946', 'branches', 'page_title_vertex_1563736946', 'page_text_vertex_1563736946', '93058fd55bbd072e95bfe88ed69d3249.png', 'page_meta_desc_vertex_1563736946', 'page_meta_keywords_vertex_1563736946');

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
(1, 'page_title_vertex_1560197104', '_vertex_1560197104', 'arabic', 'عن إفاد'),
(2, 'page_text_vertex_1560197104', '_vertex_1560197104', 'arabic', 'تأسست إفاد لتأجير السيارات في عام 2019\r\n<br>\r\nحشد الثقيل المنتصر ثم, أسر قررت تم. وغير تصفح الحزب واستمر, مشروط الساحلية هذا ان. أما معركة لبلجيكا، من, الألوف الثقيلة الإنجليزية أسر 30. 30 دار أمام أحدث, أما بحشد الهادي الدولارات ما, هو الحزب الصفحة محاولات قبل.\r\nكما أن وقام وبدأت, لم أدوات للمجهود بلا. إذ لها الأول الستار, تحت وصغار مدينة عل. أي بحشد ليرتفع الساحلية أما, ليركز الهادي للأسطول ما هذا, أسابيع الروسية وتم عن. وفي مع شدّت فكان أدوات. سمّي تعداد ونستون هذا ما. به، بـ الخاصّة هيروشيما, وربع جندي الشهير الساحل.'),
(3, 'page_meta_desc_vertex_1560197104', '_vertex_1560197104', 'arabic', 'إفاد'),
(4, 'page_meta_keywords_vertex_1560197104', '_vertex_1560197104', 'arabic', 'إفاد'),
(5, 'page_title_vertex_1560197104', '_vertex_1560197104', 'english', 'About us'),
(6, 'page_text_vertex_1560197104', '_vertex_1560197104', 'english', 'Efad'),
(7, 'page_meta_desc_vertex_1560197104', '_vertex_1560197104', 'english', 'Efad'),
(8, 'page_meta_keywords_vertex_1560197104', '_vertex_1560197104', 'english', 'Efad'),
(21, 'fc_name_vertex_1560273448', '_vertex_1560273448', 'arabic', 'الدفع | الفواتير'),
(22, 'fc_meta_desc_vertex_1560273448', '_vertex_1560273448', 'arabic', 'الدفع'),
(23, 'fc_meta_keywords_vertex_1560273448', '_vertex_1560273448', 'arabic', 'الدفع'),
(24, 'fc_name_vertex_1560273448', '_vertex_1560273448', 'english', 'Payment'),
(25, 'fc_meta_desc_vertex_1560273448', '_vertex_1560273448', 'english', 'payment'),
(26, 'fc_meta_keywords_vertex_1560273448', '_vertex_1560273448', 'english', 'payment'),
(27, 'faq_question_vertex_1560275918', '_vertex_1560275918', 'arabic', 'هل يمكننى غلق الحساب؟'),
(28, 'faq_answer_vertex_1560275918', '_vertex_1560275918', 'arabic', 'لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريد أكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات . ديواس أيوتي أريري دولار إن ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم دولار أيو فيجايت نيولا باراياتيور. أيكسسيبتيور ساينت أوككايكات كيوبايداتات نون بروايدينت ,سيونت ان كيولبا كيو أوفيسيا ديسيريونتموليت انيم أيدي ايست لابوريوم.\"'),
(29, 'faq_meta_desc_vertex_1560275918', '_vertex_1560275918', 'arabic', 'لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور أنكايدي'),
(30, 'faq_meta_keywords_vertex_1560275918', '_vertex_1560275918', 'arabic', 'غلق الحساب'),
(31, 'faq_question_vertex_1560275918', '_vertex_1560275918', 'english', 'Can I close the account?'),
(32, 'faq_answer_vertex_1560275918', '_vertex_1560275918', 'english', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
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
(82, 'media_title_vertex_1562123915', '_vertex_1562123915', 'english', 'kia cerato 2018 red'),
(83, 'media_title_vertex_1563225885', '_vertex_1563225885', 'arabic', 'kia cerato 2018 red'),
(84, 'media_title_vertex_1563225885', '_vertex_1563225885', 'english', 'kia cerato 2018 red'),
(85, 'page_title_vertex_1563735658', '_vertex_1563735658', 'arabic', 'سياسة الخصوصية'),
(86, 'page_text_vertex_1563735658', '_vertex_1563735658', 'arabic', '<p><b>بيان</b></p>\r\n                    <p>تنطبق سياسة الخصوصية هذه على كافة البيانات الشخصية، والتي تقوم بتقديمها لنا (\"بيانات المستخدم\") من خلال الموقع الإلكتروني على الشبكة <a href=\"http://www.efadcar.com/\">www.efadcar.com</a> (\"الموقع\"). تم وضع سياسة الخصوصية هذه من أجل تعزيز ثقتك حيال خصوصية وسلامة تفاصيل معلوماتك الشخصية.</p>\r\n                    <p>\"أنت\\ صيغة المخاطب\" نشير بها إليك، مستخدم الموقع. \"نحن\\ صيغة المتكلم\" تعني إفاد وأي من أعضاء مجموعة شركات سكاي نيوز عربية. \"المستخدمون\" تشير إلى مستخدمي الموقع عموما و\\أو فرادى حسبما يشير السياق. نقوم بالتعامل مع كافة البيانات الشخصية والمعلومات المتعلقة بالمستخدم بتوافق تام مع كافة تشريعات حماية الخصوصية ذات العلاقة.</p>\r\n                    <p>&nbsp;</p>\r\n                    <p><b>ماذا نفعل بمعلومات المستخدم التي تقدمها إلينا</b></p>\r\n                    <p>لدى قيامك بإدخال معلومات المستخدم، فأنت توافق بأن نقوم نحن بالاحتفاظ بمعلومات المستخدم الخاصة بك وذلك عن طريقنا أو عن طريق خدمات شركة تكون طرفا ثالثا يقوم بمعالجة هذه المعلومات بالنيابة عنا.</p>\r\n                    <p>يجوز لنا أن نستخدم معلومات المستخدم الخاصة بك وذلك حسب بنود سياسة الخصوصية هذه من أجل الأغراض التالية:</p>\r\n                    <ul  >\r\n                        <li >إجراء أبحاث السوق، بما في ذلك التحليل الإحصائي المتعلق بسلوك المستخدم، والتي يجوز لنا عرضها على أطراف ثالثة على نحو غير شخصي، وبشكل كلي؛</li>\r\n                        <li >تمكيننا من الإيفاء بكافة المتطلبات المفروضة علينا قانونيا؛ و</li>\r\n                        <li >إرسال مخاطبات دورية إليك (والتي تتضمن رسالة بريد إلكتروني)، بخصوص المواصفات، والمنتجات، والخدمات، والفعاليات، والعروض الخاصة.</li>\r\n                    </ul>\r\n                    <p>يجوز لنا أن نقوم بالإفصاح عن معلومات المستخدم الخاصة بك إلى طرف ثالث:</p>\r\n                    <ul  >\r\n                        <li >من أجل أن يقوم الطرف الثالث بإرسال مخاطبات دورية لك بخصوص المواصفات، والمنتجات، والخدمات، والفعاليات، والعروض الخاصة بالنيابة عنا؛</li>\r\n                        <li >في حال قمنا ببيع أو شراء أعمال أو موجودات، وفي هذه الحالة يجوز لنا أن نفصح معلومات المستخدم الخاصة بك للشاري أو البائع المحتمل لمثل هذه الأعمال أو الممتلكات؛</li>\r\n                        <li >في حال تملك طرف ثالث كافة موجوداتنا أو معظمها، ففي هذه الحالة تؤول معلومات المستخدم الخاصة بك والتي قمت بتقديمها لنا إلى الطرف الثالث كجزء من الموجودات المنقولة له؛ و</li>\r\n                        <li >في حال توجب علينا الإفصاح عن أو مشاركة معلومات المستخدم الخاصة بك من أجل: أ)الانصياع للالتزامات القانونية؛ ب) تطبيق أو تنفيذ <a href=\"http://www.efadcar.com/\">الشروط والأحكام</a> و\\أو أي اتفاقيات أخرى؛ أو ج) حماية حقوقنا، وملكيتنا، وسلامتنا، وزبائننا، أو مستخدمون آخرون.</li>\r\n                    </ul>\r\n                    <p>قد نقوم بالإفصاح عن معلومات المستخدم الخاصة بك لأي من الشركات المنتمية لنا، والتي قد تتضمن شركاتنا الفرعية وشركاتنا القابضة، وشركاتها الفرعية، حيثما كان موقع هذه الشركات في العالم ولأي سبب كان.</p>\r\n                    <p><b>التحديثات</b></p>\r\n                    <p>تستطيع أن تعلمنا بأي تحديثات، وتعديلات، وتصحيحات، تقوم بها على معلومات المستخدم التي قمنا بجمعها مسبقا من خلال استخدام وصلة نموذج التغذية الراجعة في قسم اتصل بنا الموجود على الموقع.</p>\r\n                    <p>قد نقوم بتغيير سياسة الخصوصية من وقت إلى آخر ولهذا يتعين عليك مراجعتها دوريا. ويكون استخدامك لموقع إفاددلالة على قبول سياسة الخصوصية المطبقة في ذلك الوقت.</p>\r\n                    <p>نحتفظ بحقنا بتغيير أو تعديل أو تحديث سياسة الخصوصية هذه في أي وقت من الأوقات.</p>\r\n                    <p><b>جمع البيانات</b></p>\r\n                    <p>عند استخدام الموقع قد تصادف مناطق مثل المنتديات أو خدمات الفيديو حيث يتم الطلب منك كمستخدم إدخال معلومات المستخدم الخاصة بك. يتم استخدام مثل معلومات المستخدم هذه فقط للهدف التي يتم جمعها من أجله، وأي أغراض أخرى يتم تحديدها في نقطة الجمع وذلك بالتوافق مع سياسة الخصوصية هذه. لن نقوم بالإفصاح عن أي من معلومات المستخدم التي توفرها لطرف ثالث دون إصدارك الموافقة على ذلك، باستثناء ضرورة توفير خدمات قمت بتحديد طلبها.</p>\r\n                    <p><b>إلغاء الاشتراك</b></p>\r\n                    <p>تستطيع عندما تريد سحب موافقتك على استلام مخاطبات دورية بخصوص المواصفات، والمنتجات، والخدمات، والفعاليات وذلك عن طريق الرد على وصلة \"إلغاء الاشتراك\" في المخاطبات القادمة منا.<b></b></p>\r\n                    <p>الرجاء ملاحظة أننا لن نقوم بالإفصاح عن معلومات المستخدم الخاصة بك لطرف ثالث لتمكينه من إرسال مخاطبات تسويق مباشرة لك دون موافقتك المسبقة على القيام بذلك.</p>\r\n                    <p><b>حماية معلومات المستخدم الخاصة بك</b></p>\r\n                    <p>للأسف يعتبر إرسال البيانات عبر الإنترنت أمرا لا يمكن ضمانه على نحو كلي. ومع التزامنا التام بحماية معلومات المستخدم الخاصة بك، فإننا لا نستطيع ضمان أمان إرسال معلومات المستخدم الخاصة بك إلى الموقع. إن أي بيانات يتم إرسالها، بما في ذلك معلومات المستخدم الخاصة بك، تكون على مسؤوليتك أنت.</p>\r\n                    <p>من جانبنا فإننا نعي معايير الصناعة ونستخدم تطبيقات الأمن من أجل حماية معلومات المستخدم من أي اختراق غير مشروع أو إساءة استخدام. وعليه ولدى استخدامنا معلومات المستخدم فإننا نقوم بتطبيق إجراءات معايير الصناعة ومواصفات الأمن من أجل منع الوصول غير المشروع إلى معلومات المستخدم.</p>'),
(87, 'page_meta_desc_vertex_1563735658', '_vertex_1563735658', 'arabic', 'سياسة الخصوصية'),
(88, 'page_meta_keywords_vertex_1563735658', '_vertex_1563735658', 'arabic', 'سياسة الخصوصية'),
(89, 'page_title_vertex_1563735658', '_vertex_1563735658', 'english', 'privacy policy'),
(90, 'page_text_vertex_1563735658', '_vertex_1563735658', 'english', 'privacy policy'),
(91, 'page_meta_desc_vertex_1563735658', '_vertex_1563735658', 'english', 'privacy policy'),
(92, 'page_meta_keywords_vertex_1563735658', '_vertex_1563735658', 'english', 'privacy policy'),
(93, 'page_title_vertex_1563736453', '_vertex_1563736453', 'arabic', 'الشروط والأحكام'),
(94, 'page_text_vertex_1563736453', '_vertex_1563736453', 'arabic', '<h3>معلومات هامة واضافية</h3>\r\n<p>لا يسمح بالتدخين في سياراتنا. وإذا كنت تدخن في واحدة من سياراتنا تتم محاسبتك عن تكاليف تنظيف إضافية.<br />السيارات الخاصة الفاخرة و متوفرة في هذا الفرع. يرجى الاتصال مباشرة بالفرع للحصول على مزيد من المعلومات</p>\r\n<h3>معلومات إضافية عن السائق</h3>\r\n<p>يمكن إضافة سائق بقيمة اضافية 22،00 /يوم.<br />السائق يجب ان يكون موجود عند استلام السيارة. يجب على جميع السائقين التقيد بشروطنا للتأجير. راجع رخصة سائق / الهوية والمقاطع السن المطلوبة للحصول على التفاصيل الكاملة..<br />إذا كان لديك اتفاق أو تعاقد مع شركتنا الاسعار تكون مختلفة. يرجى مراجعة شروط التعاقد الخاص</p>\r\n<h3>معلومات عن الاعمار</h3>\r\n<p>يجب أن تكون 23 سنة لاستطاعتك استئجار اي سيارة من أي فئة. إذا كنت بين 21 و 23 سنة يجب ان تدفع رسما إضافيا بقيمة 22.00 دولار في الإيجار. لا قيود أو رسوم لتاجير الكبار في السن.<br />إذا كان لديك اتفاق أو تعاقد مع شركتنا الاسعار تكون مختلفة. يرجى مراجعة شروط التعاقد الخاص</p>\r\n<h3>خيارات الدفع</h3>\r\n<p>سنأخذ تامين لتغطية التكاليف في حالة الحوادث أو السرقة. الرجاء الرجوع إلى مقطع التنازل والحماية لمزيد من المعلومات بشأن مسؤولية السائق</p>\r\n<h4>نقدي</h4>\r\n<p>يرفض الدفع نقدا للتأمين، ولكن مقبولة لرسوم الإيجار.</p>\r\n<h4>بطاقات السحب الالي</h4>\r\n<p>ويمكن استخدام بطاقات السحب الآلي لتسديد رسوم الإيجار فقط.<br />قد لا يمكن استخدام بطاقات السحب الآلي للتأمين.</p>\r\n<p>يتم قبول بطاقات الدفع الآلي التالية :</p>\r\n<p>دلتا<br />المايسترو&nbsp;<br />بطاقات الائتمان<br />يجب أن تكون بطاقة الائتمان باسم السائق الرئيسي في وقت الإيجار.<br />يتم قبول بطاقات الائتمان الرئيسية التالية :<br />ماستر كارد<br />فيزا<br />أمريكان اكسبرس<br />مطلوب 2 بطاقات الائتمان عند استئجار سيارة من اي فئة&nbsp;<br />إذا كان لديك اتفاق أو تعاقد مع شركتنا الاسعار تكون مختلفة. يرجى مراجعة شروط التعاقد الخاص.</p>\r\n<h3>أخذ سيارتك خارج البلاد</h3>\r\n<p>لا يسح بأخذ السيارات إلى خارج البلاد من الإيجار.<br />إذا كان لديك اتفاق أو تعاقد مع شركتنا الاسعار تكون مختلفة. يرجى مراجعة شروط التعاقد الخاص.</p>\r\n<h3>رسوم عند الإلغاء او عدم استلام السيارة&nbsp;</h3>\r\n<p>إذا قمت بإجراء الدفع المسبق في الحجز و لم تعد تريد السيارة تدفع يوم واحد اجار . إذا لم تعد بحاجة للسيارة يرجى إلغاء الحجزب, 24 ساعة قبل الموعدالحجز.<br />إذا كان لديك اتفاق أو تعاقد مع شركتنا الاسعار تكون مختلفة. يرجى مراجعة شروط التعاقد الخاص.</p>\r\n<p>&nbsp;</p>'),
(95, 'page_meta_desc_vertex_1563736453', '_vertex_1563736453', 'arabic', 'الشروط والأحكام'),
(96, 'page_meta_keywords_vertex_1563736453', '_vertex_1563736453', 'arabic', 'الشروط والأحكام'),
(97, 'page_title_vertex_1563736453', '_vertex_1563736453', 'english', 'Terms Conditions'),
(98, 'page_text_vertex_1563736453', '_vertex_1563736453', 'english', 'Terms & Conditions'),
(99, 'page_meta_desc_vertex_1563736453', '_vertex_1563736453', 'english', 'Terms & Conditions'),
(100, 'page_meta_keywords_vertex_1563736453', '_vertex_1563736453', 'english', 'Terms & Conditions'),
(101, 'page_title_vertex_1563736645', '_vertex_1563736645', 'arabic', 'اتصل بنا'),
(102, 'page_text_vertex_1563736645', '_vertex_1563736645', 'arabic', 'فريق العناية بالعملاء فى خدمتكم 24 ساعة يوميا و تستطيعون التواصل معهم يوميا بشكل مباشر و فورى من خلال 8 قنوات تواصل رسمية'),
(103, 'page_meta_desc_vertex_1563736645', '_vertex_1563736645', 'arabic', 'عندك سؤال أو محتاج مساعدة؟'),
(104, 'page_meta_keywords_vertex_1563736645', '_vertex_1563736645', 'arabic', 'اتصل بنا'),
(105, 'page_title_vertex_1563736645', '_vertex_1563736645', 'english', 'contact us'),
(106, 'page_text_vertex_1563736645', '_vertex_1563736645', 'english', 'contact us'),
(107, 'page_meta_desc_vertex_1563736645', '_vertex_1563736645', 'english', 'contact us'),
(108, 'page_meta_keywords_vertex_1563736645', '_vertex_1563736645', 'english', 'contact us'),
(109, 'page_title_vertex_1563736946', '_vertex_1563736946', 'arabic', 'الفروع'),
(110, 'page_text_vertex_1563736946', '_vertex_1563736946', 'arabic', 'الفروع'),
(111, 'page_meta_desc_vertex_1563736946', '_vertex_1563736946', 'arabic', 'الفروع'),
(112, 'page_meta_keywords_vertex_1563736946', '_vertex_1563736946', 'arabic', 'الفروع'),
(113, 'page_title_vertex_1563736946', '_vertex_1563736946', 'english', 'branches'),
(114, 'page_text_vertex_1563736946', '_vertex_1563736946', 'english', 'branches'),
(115, 'page_meta_desc_vertex_1563736946', '_vertex_1563736946', 'english', 'branches'),
(116, 'page_meta_keywords_vertex_1563736946', '_vertex_1563736946', 'english', 'branches'),
(117, 'faq_question_vertex_1564383138', '_vertex_1564383138', 'arabic', 'ما هي إفاد؟'),
(118, 'faq_answer_vertex_1564383138', '_vertex_1564383138', 'arabic', 'إفاد هي منصة إلكترونية لتقدم نموذج بديل للنماذج التقليدية الموجودة في الوقت الحالي للحصول على سيارة. لذلك تقدم إفاد لعملائها خدمة الاشتراك للسيارات والتي من خلالها تستطيع/ي استخدام سيارتك مقابل رسوم اشتراك ثابتة لمدة (أسبوع/ شهر/ سنة). تغطي رسوم الاشتراك خدمة التأمين الشامل وخدمة المساعدة على الطريق وخدمة الصيانة الدورية وخدمة التوصيل والاستلام وخدمة الكيلو المفتوح أو خدمة تغير السيارة في أي وقت. على سبيل المثال، يمكنك قيادة سيارة سيدان خلال الأسبوع والتحول إلى سيارة رياضية أو سيارة دفع رباعي لقضاء رحلة نهاية الأسبوع مع الأهل والأصدقاء.'),
(119, 'faq_meta_desc_vertex_1564383138', '_vertex_1564383138', 'arabic', ''),
(120, 'faq_meta_keywords_vertex_1564383138', '_vertex_1564383138', 'arabic', ''),
(121, 'faq_question_vertex_1564383138', '_vertex_1564383138', 'english', 'What is Efad platform?'),
(122, 'faq_answer_vertex_1564383138', '_vertex_1564383138', 'english', ''),
(123, 'faq_meta_desc_vertex_1564383138', '_vertex_1564383138', 'english', ''),
(124, 'faq_meta_keywords_vertex_1564383138', '_vertex_1564383138', 'english', ''),
(125, 'fc_name_vertex_1564390642', '_vertex_1564390642', 'arabic', 'العضوية'),
(126, 'fc_meta_desc_vertex_1564390642', '_vertex_1564390642', 'arabic', ''),
(127, 'fc_meta_keywords_vertex_1564390642', '_vertex_1564390642', 'arabic', ''),
(128, 'fc_name_vertex_1564390642', '_vertex_1564390642', 'english', 'Membership '),
(129, 'fc_meta_desc_vertex_1564390642', '_vertex_1564390642', 'english', ''),
(130, 'fc_meta_keywords_vertex_1564390642', '_vertex_1564390642', 'english', ''),
(131, 'fc_name_vertex_1564390780', '_vertex_1564390780', 'arabic', 'خدمة الاشتراك'),
(132, 'fc_meta_desc_vertex_1564390780', '_vertex_1564390780', 'arabic', ''),
(133, 'fc_meta_keywords_vertex_1564390780', '_vertex_1564390780', 'arabic', ''),
(134, 'fc_name_vertex_1564390780', '_vertex_1564390780', 'english', 'Subscription Service'),
(135, 'fc_meta_desc_vertex_1564390780', '_vertex_1564390780', 'english', ''),
(136, 'fc_meta_keywords_vertex_1564390780', '_vertex_1564390780', 'english', ''),
(137, 'fc_name_vertex_1564390993', '_vertex_1564390993', 'arabic', 'التواصل'),
(138, 'fc_meta_desc_vertex_1564390993', '_vertex_1564390993', 'arabic', ''),
(139, 'fc_meta_keywords_vertex_1564390993', '_vertex_1564390993', 'arabic', ''),
(140, 'fc_name_vertex_1564390993', '_vertex_1564390993', 'english', 'Contact us'),
(141, 'fc_meta_desc_vertex_1564390993', '_vertex_1564390993', 'english', ''),
(142, 'fc_meta_keywords_vertex_1564390993', '_vertex_1564390993', 'english', ''),
(149, 'fc_name_vertex_1564391303', '_vertex_1564391303', 'arabic', 'عام'),
(150, 'fc_meta_desc_vertex_1564391303', '_vertex_1564391303', 'arabic', ''),
(151, 'fc_meta_keywords_vertex_1564391303', '_vertex_1564391303', 'arabic', ''),
(152, 'fc_name_vertex_1564391303', '_vertex_1564391303', 'english', 'General'),
(153, 'fc_meta_desc_vertex_1564391303', '_vertex_1564391303', 'english', ''),
(154, 'fc_meta_keywords_vertex_1564391303', '_vertex_1564391303', 'english', ''),
(161, 'faq_question_vertex_1564392083', '_vertex_1564392083', 'arabic', 'من المؤهل/ة لاستخدام منصة إفاد أو الحصول على خدمات إفاد؟ '),
(162, 'faq_answer_vertex_1564392083', '_vertex_1564392083', 'arabic', 'لبداية استخدام المنصة والحصول على خدماتنا يجب أن يكون عمرك على الأقل 20 سنة فما فوق. وأي استخدام للمنصة أو لخدماتنا من قبل الذين لا تتجاوز أعمارهم 19 سنة هو استخدام ممنوع.'),
(163, 'faq_meta_desc_vertex_1564392083', '_vertex_1564392083', 'arabic', ''),
(164, 'faq_meta_keywords_vertex_1564392083', '_vertex_1564392083', 'arabic', ''),
(165, 'faq_question_vertex_1564392083', '_vertex_1564392083', 'english', 'Who is eligible to use our services? '),
(166, 'faq_answer_vertex_1564392083', '_vertex_1564392083', 'english', ''),
(167, 'faq_meta_desc_vertex_1564392083', '_vertex_1564392083', 'english', ''),
(168, 'faq_meta_keywords_vertex_1564392083', '_vertex_1564392083', 'english', ''),
(169, 'faq_question_vertex_1564392281', '_vertex_1564392281', 'arabic', 'هل أحتاج إلى رخصة قيادة لاستخدام السيارة؟'),
(170, 'faq_answer_vertex_1564392281', '_vertex_1564392281', 'arabic', 'نعم. يجب أن يكون لديك رخصة قيادة سارية المفعول وعمرك أكبر من 19سنة لاستخدام السيارة.'),
(171, 'faq_meta_desc_vertex_1564392281', '_vertex_1564392281', 'arabic', ''),
(172, 'faq_meta_keywords_vertex_1564392281', '_vertex_1564392281', 'arabic', ''),
(173, 'faq_question_vertex_1564392281', '_vertex_1564392281', 'english', 'Do I need a driver\'s license to use the car?  '),
(174, 'faq_answer_vertex_1564392281', '_vertex_1564392281', 'english', ''),
(175, 'faq_meta_desc_vertex_1564392281', '_vertex_1564392281', 'english', ''),
(176, 'faq_meta_keywords_vertex_1564392281', '_vertex_1564392281', 'english', ''),
(177, 'faq_question_vertex_1564392398', '_vertex_1564392398', 'arabic', 'هل تملك إفاد الحق في التحقق من معلومات العملاء؟'),
(178, 'faq_answer_vertex_1564392398', '_vertex_1564392398', 'arabic', 'يجب على جميع العملاء تزويدنا بمعلومات كاملة ودقيقة عنهم لتقديم الخدمة الكاملة لهم. بالإضافة إلى ذلك، تملك إفاد الحق في التحقق وفحص هويات عملائها، بما في ذلك سجل القيادة وصلاحية رخصة القيادة. كما يحق لإفاد التعاون مع جهات خارجية أو أطراف ثالثة للتحقق من المعلومات التي قدمت إليها، وأنت هنا توافق وتمنحنا الصلاحية الكاملة لطلب وتلقي و استخدام وتخزين المعلومات الخاصة بك، ويحق لشركة إفاد قبول ورفض وإلغاء الاشتراك في أي وقت  دون أي إشعار مسبق.'),
(179, 'faq_meta_desc_vertex_1564392398', '_vertex_1564392398', 'arabic', ''),
(180, 'faq_meta_keywords_vertex_1564392398', '_vertex_1564392398', 'arabic', ''),
(181, 'faq_question_vertex_1564392398', '_vertex_1564392398', 'english', 'Does Efad has the right to verify customer information?'),
(182, 'faq_answer_vertex_1564392398', '_vertex_1564392398', 'english', ''),
(183, 'faq_meta_desc_vertex_1564392398', '_vertex_1564392398', 'english', ''),
(184, 'faq_meta_keywords_vertex_1564392398', '_vertex_1564392398', 'english', ''),
(185, 'faq_question_vertex_1564392521', '_vertex_1564392521', 'arabic', 'هل يمكنني في النهاية تملك سيارتي؟'),
(186, 'faq_answer_vertex_1564392521', '_vertex_1564392521', 'arabic', 'للآسف لا، لأننا لا نقدم حاليًا خيار تملك السيارة، ولكن تستطيع/ي استخدامها لأطول فترة ممكنة.'),
(187, 'faq_meta_desc_vertex_1564392521', '_vertex_1564392521', 'arabic', ''),
(188, 'faq_meta_keywords_vertex_1564392521', '_vertex_1564392521', 'arabic', ''),
(189, 'faq_question_vertex_1564392521', '_vertex_1564392521', 'english', 'Can I finally own my car?'),
(190, 'faq_answer_vertex_1564392521', '_vertex_1564392521', 'english', ''),
(191, 'faq_meta_desc_vertex_1564392521', '_vertex_1564392521', 'english', ''),
(192, 'faq_meta_keywords_vertex_1564392521', '_vertex_1564392521', 'english', ''),
(193, 'faq_question_vertex_1564392630', '_vertex_1564392630', 'arabic', 'هل أستطيع إرجاع السيارة أو استبدالها بسيارة أخرى؟'),
(194, 'faq_answer_vertex_1564392630', '_vertex_1564392630', 'arabic', 'نعم، تستطيع/ي إرجاع السيارة في أي وقت وفي أي مدينة نعمل فيها. ويحق لك/ي استبدال السيارة بسيارة أخرى.'),
(195, 'faq_meta_desc_vertex_1564392630', '_vertex_1564392630', 'arabic', ''),
(196, 'faq_meta_keywords_vertex_1564392630', '_vertex_1564392630', 'arabic', ''),
(197, 'faq_question_vertex_1564392630', '_vertex_1564392630', 'english', 'Can I return the car or switch it with another car?'),
(198, 'faq_answer_vertex_1564392630', '_vertex_1564392630', 'english', ''),
(199, 'faq_meta_desc_vertex_1564392630', '_vertex_1564392630', 'english', ''),
(200, 'faq_meta_keywords_vertex_1564392630', '_vertex_1564392630', 'english', ''),
(201, 'faq_question_vertex_1564392809', '_vertex_1564392809', 'arabic', 'هل مسموح لسائقي الخاص قيادة السيارة؟'),
(202, 'faq_answer_vertex_1564392809', '_vertex_1564392809', 'arabic', 'نعم. إذا كان سائقك الخاص يحمل رخصة قيادة سارية المفعول وتم إضافة كسائق إضافي، فإنه يستطيع سائقك الخاص قيادة السيارة.'),
(203, 'faq_meta_desc_vertex_1564392809', '_vertex_1564392809', 'arabic', ''),
(204, 'faq_meta_keywords_vertex_1564392809', '_vertex_1564392809', 'arabic', ''),
(205, 'faq_question_vertex_1564392809', '_vertex_1564392809', 'english', 'Is it possible to let my personal driver drive my car?'),
(206, 'faq_answer_vertex_1564392809', '_vertex_1564392809', 'english', ''),
(207, 'faq_meta_desc_vertex_1564392809', '_vertex_1564392809', 'english', ''),
(208, 'faq_meta_keywords_vertex_1564392809', '_vertex_1564392809', 'english', ''),
(209, 'faq_question_vertex_1564392928', '_vertex_1564392928', 'arabic', 'هل يمكنني حجز سيارة لسائقي الخاص؟'),
(210, 'faq_answer_vertex_1564392928', '_vertex_1564392928', 'arabic', 'نعم، تستطع/ي حجز سيارة لسائقك الخاص.'),
(211, 'faq_meta_desc_vertex_1564392928', '_vertex_1564392928', 'arabic', ''),
(212, 'faq_meta_keywords_vertex_1564392928', '_vertex_1564392928', 'arabic', ''),
(213, 'faq_question_vertex_1564392928', '_vertex_1564392928', 'english', 'Can I book a car for my personal driver?'),
(214, 'faq_answer_vertex_1564392928', '_vertex_1564392928', 'english', ''),
(215, 'faq_meta_desc_vertex_1564392928', '_vertex_1564392928', 'english', ''),
(216, 'faq_meta_keywords_vertex_1564392928', '_vertex_1564392928', 'english', ''),
(217, 'faq_question_vertex_1564393007', '_vertex_1564393007', 'arabic', 'هل أستطيع الحصول على سيارة بدون الاشتراك في إحدى فئات العضوية؟'),
(218, 'faq_answer_vertex_1564393007', '_vertex_1564393007', 'arabic', ''),
(219, 'faq_meta_desc_vertex_1564393007', '_vertex_1564393007', 'arabic', ''),
(220, 'faq_meta_keywords_vertex_1564393007', '_vertex_1564393007', 'arabic', ''),
(221, 'faq_question_vertex_1564393007', '_vertex_1564393007', 'english', 'Can I get a car without subscribing to a membership class?'),
(222, 'faq_answer_vertex_1564393007', '_vertex_1564393007', 'english', 'لا. لا تستطيع/ي الحصول على سيارة إذا لم يكون لديك اشتراك في إحدى فئات العضوية.'),
(223, 'faq_meta_desc_vertex_1564393007', '_vertex_1564393007', 'english', ''),
(224, 'faq_meta_keywords_vertex_1564393007', '_vertex_1564393007', 'english', ''),
(225, 'faq_question_vertex_1564393061', '_vertex_1564393061', 'arabic', 'ما هي أفضل فئة من فئات العضوية بالنسبة لي؟'),
(226, 'faq_answer_vertex_1564393061', '_vertex_1564393061', 'arabic', 'تقدم \" إفاد\" فئات مختلفة من العضوية لتلبية احتياجات العملاء المختلفين. لذلك ألقي نظرة على مميزات وأسعار كل فئة من فئات العضوية وأختر ما يناسبك.'),
(227, 'faq_meta_desc_vertex_1564393061', '_vertex_1564393061', 'arabic', ''),
(228, 'faq_meta_keywords_vertex_1564393061', '_vertex_1564393061', 'arabic', ''),
(229, 'faq_question_vertex_1564393061', '_vertex_1564393061', 'english', 'What is the best category of membership for me?'),
(230, 'faq_answer_vertex_1564393061', '_vertex_1564393061', 'english', ''),
(231, 'faq_meta_desc_vertex_1564393061', '_vertex_1564393061', 'english', ''),
(232, 'faq_meta_keywords_vertex_1564393061', '_vertex_1564393061', 'english', ''),
(233, 'faq_question_vertex_1564393140', '_vertex_1564393140', 'arabic', 'ماهي ماركات أو أنواع السيارات التي لدى إفاد؟'),
(234, 'faq_answer_vertex_1564393140', '_vertex_1564393140', 'arabic', 'لدينا مجموعة متنوعة من سيارات السيدان وخفيفة الوزن الصغيرة وسيارات الدفع الرباعي. كل سياراتنا حالياً جديدة. ومع ذلك، فإننا نعمل باستمرار على توسيع مجموعة السيارات لدينا، لذلك إذا كانت هناك سيارة معينة ترغب بالحصول عليها ولكنك لا تشاهدها ضمن الخيارات الموجودة، يرجى التواصل معنا!'),
(235, 'faq_meta_desc_vertex_1564393140', '_vertex_1564393140', 'arabic', ''),
(236, 'faq_meta_keywords_vertex_1564393140', '_vertex_1564393140', 'arabic', ''),
(237, 'faq_question_vertex_1564393140', '_vertex_1564393140', 'english', 'What brands or types of cars do you have?'),
(238, 'faq_answer_vertex_1564393140', '_vertex_1564393140', 'english', ''),
(239, 'faq_meta_desc_vertex_1564393140', '_vertex_1564393140', 'english', ''),
(240, 'faq_meta_keywords_vertex_1564393140', '_vertex_1564393140', 'english', ''),
(241, 'faq_question_vertex_1564393380', '_vertex_1564393380', 'arabic', 'عندما أحصل على سيارة من إفاد، ما هي المزايا والخدمات التي سأحصل عليها؟'),
(242, 'faq_answer_vertex_1564393380', '_vertex_1564393380', 'arabic', 'عندما تحصل/ي على سيارة، هناك عدد من المزايا والخدمات التي نقدمها في فاتورة شهرية واحدة، وتختلف الخدمات والمزايا على حسب فئة العضوية التي لديك/ي.\r\n\r\nهنا بعض المزايا والخدمات التي نقدمها:\r\nتأمين شامل\r\nالصيانة الشاملة\r\nدعم خدمة العملاء 7 أيام في الأسبوع\r\nالمساعدة على الطريق\r\nكيلو متر مفتوح\r\nالتبديل بسهولة بين السيارات كما تريد\r\nيتم فحص سياراتنا بدقة بشكل دوري\r\n\r\nوللمزيد من المعلومات، زور صفحة تفاصيل مميزات العضوية.'),
(243, 'faq_meta_desc_vertex_1564393380', '_vertex_1564393380', 'arabic', ''),
(244, 'faq_meta_keywords_vertex_1564393380', '_vertex_1564393380', 'arabic', ''),
(245, 'faq_question_vertex_1564393380', '_vertex_1564393380', 'english', 'Once I get a car from Efad, what benefits and services will I get?'),
(246, 'faq_answer_vertex_1564393380', '_vertex_1564393380', 'english', ''),
(247, 'faq_meta_desc_vertex_1564393380', '_vertex_1564393380', 'english', ''),
(248, 'faq_meta_keywords_vertex_1564393380', '_vertex_1564393380', 'english', ''),
(249, 'faq_question_vertex_1564393505', '_vertex_1564393505', 'arabic', 'هل يمكنني قيادة سيارتي لأغراض تجارية؟'),
(250, 'faq_answer_vertex_1564393505', '_vertex_1564393505', 'arabic', 'نعم، نحن نسمح للمشتركين لدينا بقيادة سياراتهم لأغراض تجارية مثل العمل في تطبيقات التوصيل.'),
(251, 'faq_meta_desc_vertex_1564393505', '_vertex_1564393505', 'arabic', ''),
(252, 'faq_meta_keywords_vertex_1564393505', '_vertex_1564393505', 'arabic', ''),
(253, 'faq_question_vertex_1564393505', '_vertex_1564393505', 'english', 'Can I drive my car for commercial purposes?'),
(254, 'faq_answer_vertex_1564393505', '_vertex_1564393505', 'english', ''),
(255, 'faq_meta_desc_vertex_1564393505', '_vertex_1564393505', 'english', ''),
(256, 'faq_meta_keywords_vertex_1564393505', '_vertex_1564393505', 'english', ''),
(257, 'faq_question_vertex_1564393717', '_vertex_1564393717', 'arabic', 'هل هناك طلبات إضافة للحصول على السيارة مثل: مبلغ تأمين على سيارة أو بطاقة عمل؟'),
(258, 'faq_answer_vertex_1564393717', '_vertex_1564393717', 'arabic', 'لا. لا يتطلب الحصول على سيارة دفع مبلغ تأمين على السيارة أو بطاقة عمل.'),
(259, 'faq_meta_desc_vertex_1564393717', '_vertex_1564393717', 'arabic', ''),
(260, 'faq_meta_keywords_vertex_1564393717', '_vertex_1564393717', 'arabic', ''),
(261, 'faq_question_vertex_1564393717', '_vertex_1564393717', 'english', 'Are there additional requests in order to get a car such as: pay car insurance, provide business card?'),
(262, 'faq_answer_vertex_1564393717', '_vertex_1564393717', 'english', ''),
(263, 'faq_meta_desc_vertex_1564393717', '_vertex_1564393717', 'english', ''),
(264, 'faq_meta_keywords_vertex_1564393717', '_vertex_1564393717', 'english', ''),
(265, 'faq_question_vertex_1564403226', '_vertex_1564403226', 'arabic', 'هل يُسمح لأي شخص آخر بقيادة السيارة؟'),
(266, 'faq_answer_vertex_1564403226', '_vertex_1564403226', 'arabic', 'نعم. إذا أردت إضافة سائق إضافي، يرجى التواصل مع فريق العناية بالعملاء. ويحظر على السائقين غير المضافين قيادة السيارة.'),
(267, 'faq_meta_desc_vertex_1564403226', '_vertex_1564403226', 'arabic', ''),
(268, 'faq_meta_keywords_vertex_1564403226', '_vertex_1564403226', 'arabic', ''),
(269, 'faq_question_vertex_1564403226', '_vertex_1564403226', 'english', ' Is anyone else allowed to drive?'),
(270, 'faq_answer_vertex_1564403226', '_vertex_1564403226', 'english', ''),
(271, 'faq_meta_desc_vertex_1564403226', '_vertex_1564403226', 'english', ''),
(272, 'faq_meta_keywords_vertex_1564403226', '_vertex_1564403226', 'english', ''),
(273, 'faq_question_vertex_1564403447', '_vertex_1564403447', 'arabic', 'هل أستطيع أن أدفع قيمة اشتراك العضوية نقداً (كاش)؟'),
(274, 'faq_answer_vertex_1564403447', '_vertex_1564403447', 'arabic', 'نعم، تستطيع دفع قيمة اشتراك العضوية نقداً (كاش)، ولكن هناك رسوم إضافية على خدمة الدفع النقدي وقدرها 100 ريال.'),
(275, 'faq_meta_desc_vertex_1564403447', '_vertex_1564403447', 'arabic', ''),
(276, 'faq_meta_keywords_vertex_1564403447', '_vertex_1564403447', 'arabic', ''),
(277, 'faq_question_vertex_1564403447', '_vertex_1564403447', 'english', 'Can I pay the membership fee in cash?'),
(278, 'faq_answer_vertex_1564403447', '_vertex_1564403447', 'english', ''),
(279, 'faq_meta_desc_vertex_1564403447', '_vertex_1564403447', 'english', ''),
(280, 'faq_meta_keywords_vertex_1564403447', '_vertex_1564403447', 'english', ''),
(281, 'faq_question_vertex_1564403572', '_vertex_1564403572', 'arabic', 'هل أستطيع أن أدفع قيمة اشتراك الخدمة نقداً (كاش)؟'),
(282, 'faq_answer_vertex_1564403572', '_vertex_1564403572', 'arabic', 'نعم، تستطيع دفع قيمة اشتراك الخدمة نقداً (كاش)، ولكن هناك رسوم إضافية على خدمة الدفع النقدي وقدرها 100 ريال.'),
(283, 'faq_meta_desc_vertex_1564403572', '_vertex_1564403572', 'arabic', ''),
(284, 'faq_meta_keywords_vertex_1564403572', '_vertex_1564403572', 'arabic', ''),
(285, 'faq_question_vertex_1564403572', '_vertex_1564403572', 'english', 'Can I pay the subscription service fee in cash?'),
(286, 'faq_answer_vertex_1564403572', '_vertex_1564403572', 'english', ''),
(287, 'faq_meta_desc_vertex_1564403572', '_vertex_1564403572', 'english', ''),
(288, 'faq_meta_keywords_vertex_1564403572', '_vertex_1564403572', 'english', ''),
(289, 'faq_question_vertex_1564403915', '_vertex_1564403915', 'arabic', 'هل لديكم خدمة حجز وأستلام السيارة بشكل فوري؟'),
(290, 'faq_answer_vertex_1564403915', '_vertex_1564403915', 'arabic', 'لا. لا توجد لدينا خدمة حجز واستلام السيارة بشكل فوري الآن، ولكن تستطيع/ي القيام بإجراءات حجز السيارة بعد الاشتراك في إحدى فئات العضوية واستلام السيارة في أقرب مدة متاحة.'),
(291, 'faq_meta_desc_vertex_1564403915', '_vertex_1564403915', 'arabic', ''),
(292, 'faq_meta_keywords_vertex_1564403915', '_vertex_1564403915', 'arabic', ''),
(293, 'faq_question_vertex_1564403915', '_vertex_1564403915', 'english', 'Do you have an instant booking service and receive the car immediately?'),
(294, 'faq_answer_vertex_1564403915', '_vertex_1564403915', 'english', ''),
(295, 'faq_meta_desc_vertex_1564403915', '_vertex_1564403915', 'english', ''),
(296, 'faq_meta_keywords_vertex_1564403915', '_vertex_1564403915', 'english', ''),
(297, 'faq_question_vertex_1564404064', '_vertex_1564404064', 'arabic', 'هل هناك رسوم إضافية على خدمة التأمين الشامل، خدمة الكيلو المفتوح، خدمة المساعدة على الطريق أو الوقود؟'),
(298, 'faq_answer_vertex_1564404064', '_vertex_1564404064', 'arabic', 'لا. جميع هذه الخدمات تشمل قيمة الاشتراك في الخدمة ولا يوجد رسوم إضافية عليها.'),
(299, 'faq_meta_desc_vertex_1564404064', '_vertex_1564404064', 'arabic', ''),
(300, 'faq_meta_keywords_vertex_1564404064', '_vertex_1564404064', 'arabic', ''),
(301, 'faq_question_vertex_1564404064', '_vertex_1564404064', 'english', 'Is there an additional charge for the comprehensive insurance service, the unlimited Kilo service, roadside assistance or fuel service?'),
(302, 'faq_answer_vertex_1564404064', '_vertex_1564404064', 'english', ''),
(303, 'faq_meta_desc_vertex_1564404064', '_vertex_1564404064', 'english', ''),
(304, 'faq_meta_keywords_vertex_1564404064', '_vertex_1564404064', 'english', ''),
(305, 'faq_question_vertex_1564404198', '_vertex_1564404198', 'arabic', 'هل توجد خدمة توصيل واستلام السيارة؟'),
(306, 'faq_answer_vertex_1564404198', '_vertex_1564404198', 'arabic', 'نعم. جميع السيارات يتم توصيلها إلى موقعك أو استلامها من موقعك سواء كان مكان عمل أو منزل أو مركز تسوق بشكل مجاني.'),
(307, 'faq_meta_desc_vertex_1564404198', '_vertex_1564404198', 'arabic', ''),
(308, 'faq_meta_keywords_vertex_1564404198', '_vertex_1564404198', 'arabic', ''),
(309, 'faq_question_vertex_1564404198', '_vertex_1564404198', 'english', 'Is there a car delivery service?'),
(310, 'faq_answer_vertex_1564404198', '_vertex_1564404198', 'english', ''),
(311, 'faq_meta_desc_vertex_1564404198', '_vertex_1564404198', 'english', ''),
(312, 'faq_meta_keywords_vertex_1564404198', '_vertex_1564404198', 'english', ''),
(313, 'faq_question_vertex_1564404246', '_vertex_1564404246', 'arabic', 'لماذا أختار فترة زمنية أطول في خدمة الاشتراك؟'),
(314, 'faq_answer_vertex_1564404246', '_vertex_1564404246', 'arabic', 'صُممت حلولنا لخدمة الأفراد الذين يريدون الاشتراك في الخدمة لفترة زمنية طويلة، لذلك، كلما زات مدة الاشتراك في الخدمة، كلما قلت قيمة الاشتراك في الخدمة.'),
(315, 'faq_meta_desc_vertex_1564404246', '_vertex_1564404246', 'arabic', ''),
(316, 'faq_meta_keywords_vertex_1564404246', '_vertex_1564404246', 'arabic', ''),
(317, 'faq_question_vertex_1564404246', '_vertex_1564404246', 'english', 'Why do I choose a longer subscription period?'),
(318, 'faq_answer_vertex_1564404246', '_vertex_1564404246', 'english', ''),
(319, 'faq_meta_desc_vertex_1564404246', '_vertex_1564404246', 'english', ''),
(320, 'faq_meta_keywords_vertex_1564404246', '_vertex_1564404246', 'english', ''),
(321, 'faq_question_vertex_1564404633', '_vertex_1564404633', 'arabic', 'كيف أستطيع إلغاء اشتراك الخدمة؟'),
(322, 'faq_answer_vertex_1564404633', '_vertex_1564404633', 'arabic', 'يمكنك القيام بذلك من خلال الدخول إلى حسابك وإلغاء الاشتراك في الخدمة علماً أنه لا يوجد رسوم إضافية في حال إلغاء الاشتراك. '),
(323, 'faq_meta_desc_vertex_1564404633', '_vertex_1564404633', 'arabic', ''),
(324, 'faq_meta_keywords_vertex_1564404633', '_vertex_1564404633', 'arabic', ''),
(325, 'faq_question_vertex_1564404633', '_vertex_1564404633', 'english', 'How do I cancel my subscription service?'),
(326, 'faq_answer_vertex_1564404633', '_vertex_1564404633', 'english', ''),
(327, 'faq_meta_desc_vertex_1564404633', '_vertex_1564404633', 'english', ''),
(328, 'faq_meta_keywords_vertex_1564404633', '_vertex_1564404633', 'english', ''),
(329, 'faq_question_vertex_1564404725', '_vertex_1564404725', 'arabic', 'هل أستطيع ترقية فئة العضوية؟'),
(330, 'faq_answer_vertex_1564404725', '_vertex_1564404725', 'arabic', 'نعم تستطيع/ي  ترقية فئة العضوية في أي وقت ويستغرق تفعيل العضوية الجديدة ثلاثة أيام عمل.'),
(331, 'faq_meta_desc_vertex_1564404725', '_vertex_1564404725', 'arabic', ''),
(332, 'faq_meta_keywords_vertex_1564404725', '_vertex_1564404725', 'arabic', ''),
(333, 'faq_question_vertex_1564404725', '_vertex_1564404725', 'english', 'Can I upgrade my membership?'),
(334, 'faq_answer_vertex_1564404725', '_vertex_1564404725', 'english', ''),
(335, 'faq_meta_desc_vertex_1564404725', '_vertex_1564404725', 'english', ''),
(336, 'faq_meta_keywords_vertex_1564404725', '_vertex_1564404725', 'english', ''),
(337, 'faq_question_vertex_1564405339', '_vertex_1564405339', 'arabic', 'ماذا أعمل إذا تم سرقة المركبة؟'),
(338, 'faq_answer_vertex_1564405339', '_vertex_1564405339', 'arabic', 'تواصل مع الشرطة المحلية لرفع بلاغ/ تقرير بالحادثة ومن ثم التواصل مع فريق خدمة العملاء لإكمال الإجراءات الأزمة.'),
(339, 'faq_meta_desc_vertex_1564405339', '_vertex_1564405339', 'arabic', ''),
(340, 'faq_meta_keywords_vertex_1564405339', '_vertex_1564405339', 'arabic', ''),
(341, 'faq_question_vertex_1564405339', '_vertex_1564405339', 'english', 'What should I do if my car got stolen'),
(342, 'faq_answer_vertex_1564405339', '_vertex_1564405339', 'english', ''),
(343, 'faq_meta_desc_vertex_1564405339', '_vertex_1564405339', 'english', ''),
(344, 'faq_meta_keywords_vertex_1564405339', '_vertex_1564405339', 'english', ''),
(345, 'faq_question_vertex_1564405402', '_vertex_1564405402', 'arabic', 'ماذا يجب أن أفعل إذا وقعت في حادث سير؟'),
(346, 'faq_answer_vertex_1564405402', '_vertex_1564405402', 'arabic', 'الحمد لله على السلامة أولاً ... قم بالتواصل مع فريق نجم على الرقم التالي 920000560 أو مركز الاتصال الخاص بالمرور السعودي على الرقم التالي 993 حتى يتمكنوا من خدمتك ومن ثم يرجى التواصل مع فريق خدمة العملاء لإكمال الإجراءات اللازمة.'),
(347, 'faq_meta_desc_vertex_1564405402', '_vertex_1564405402', 'arabic', ''),
(348, 'faq_meta_keywords_vertex_1564405402', '_vertex_1564405402', 'arabic', ''),
(349, 'faq_question_vertex_1564405402', '_vertex_1564405402', 'english', 'What should I do if I got in a traffic accident?'),
(350, 'faq_answer_vertex_1564405402', '_vertex_1564405402', 'english', ''),
(351, 'faq_meta_desc_vertex_1564405402', '_vertex_1564405402', 'english', ''),
(352, 'faq_meta_keywords_vertex_1564405402', '_vertex_1564405402', 'english', ''),
(353, 'faq_question_vertex_1564405477', '_vertex_1564405477', 'arabic', 'هل يحق لي أن أتنازل بالنيابة عن حقوق إفاد؟'),
(354, 'faq_answer_vertex_1564405477', '_vertex_1564405477', 'arabic', 'لا يحق للمشترك أو للمستخدم أو العميل التنازل عن أي من الأحكام الواردة في شروط الاستخدام لأي طرفاً كان، ويكون المستخدم أو العميل مسؤول قانونياً عن أي تصرف أو عمل يقوم به ولم يأخذ موافقة صريحة وخطية من شركة إفاد.'),
(355, 'faq_meta_desc_vertex_1564405477', '_vertex_1564405477', 'arabic', ''),
(356, 'faq_meta_keywords_vertex_1564405477', '_vertex_1564405477', 'arabic', ''),
(357, 'faq_question_vertex_1564405477', '_vertex_1564405477', 'english', 'Am I entitled to give up on behalf of the rights of Efad?'),
(358, 'faq_answer_vertex_1564405477', '_vertex_1564405477', 'english', ''),
(359, 'faq_meta_desc_vertex_1564405477', '_vertex_1564405477', 'english', ''),
(360, 'faq_meta_keywords_vertex_1564405477', '_vertex_1564405477', 'english', ''),
(361, 'faq_question_vertex_1564405533', '_vertex_1564405533', 'arabic', 'هل أستطيع إعادة سيارتي قبل انتهاء فترة الاشتراك في الخدمة؟'),
(362, 'faq_answer_vertex_1564405533', '_vertex_1564405533', 'arabic', 'نعم. تستطيع عمل ذلك متى ما أردت، ولكن إذا كانت المدة أقل من أسبوع فسيتم احتساب السعر الأساسي للاشتراك في الخدمة.'),
(363, 'faq_meta_desc_vertex_1564405533', '_vertex_1564405533', 'arabic', ''),
(364, 'faq_meta_keywords_vertex_1564405533', '_vertex_1564405533', 'arabic', ''),
(365, 'faq_question_vertex_1564405533', '_vertex_1564405533', 'english', 'Can I return my car before the end of the subscription period?'),
(366, 'faq_answer_vertex_1564405533', '_vertex_1564405533', 'english', ''),
(367, 'faq_meta_desc_vertex_1564405533', '_vertex_1564405533', 'english', ''),
(368, 'faq_meta_keywords_vertex_1564405533', '_vertex_1564405533', 'english', ''),
(369, 'faq_question_vertex_1564405707', '_vertex_1564405707', 'arabic', 'هل يمكنني أن أدفع قيمة الاشتراك في العضوية أو الخدمة لاحقاً؟'),
(370, 'faq_answer_vertex_1564405707', '_vertex_1564405707', 'arabic', 'للآسف لا توجد لدينا خدمة الدفع الأجل للأفراد.'),
(371, 'faq_meta_desc_vertex_1564405707', '_vertex_1564405707', 'arabic', ''),
(372, 'faq_meta_keywords_vertex_1564405707', '_vertex_1564405707', 'arabic', ''),
(373, 'faq_question_vertex_1564405707', '_vertex_1564405707', 'english', 'Can I pay my membership or my subscription service fee later?'),
(374, 'faq_answer_vertex_1564405707', '_vertex_1564405707', 'english', ''),
(375, 'faq_meta_desc_vertex_1564405707', '_vertex_1564405707', 'english', ''),
(376, 'faq_meta_keywords_vertex_1564405707', '_vertex_1564405707', 'english', ''),
(377, 'faq_question_vertex_1564405815', '_vertex_1564405815', 'arabic', 'ما هي خطوات إعادة السيارة؟ كيف أعود وما الذي يجب أن أتوقعه أثناء العودة؟'),
(378, 'faq_answer_vertex_1564405815', '_vertex_1564405815', 'arabic', 'حتى تتمكن من إعادة السيارة تواصل مع فريق العناية بالعملاء ليتم جدولة إعادة سيارة خلال ٣ أيام واستلام السيارة من الموقع المناسب لك داخل المدن التي نعمل فيها. يجب أن تكون متواجد/ه أثناء تسليم السيارة وإرجاع مفاتيح السيارة.'),
(379, 'faq_meta_desc_vertex_1564405815', '_vertex_1564405815', 'arabic', ''),
(380, 'faq_meta_keywords_vertex_1564405815', '_vertex_1564405815', 'arabic', ''),
(381, 'faq_question_vertex_1564405815', '_vertex_1564405815', 'english', 'What are the steps to return the car? What should I expect while returning the car?'),
(382, 'faq_answer_vertex_1564405815', '_vertex_1564405815', 'english', ''),
(383, 'faq_meta_desc_vertex_1564405815', '_vertex_1564405815', 'english', ''),
(384, 'faq_meta_keywords_vertex_1564405815', '_vertex_1564405815', 'english', ''),
(385, 'faq_question_vertex_1564405965', '_vertex_1564405965', 'arabic', 'ما هي الطرق المتوفرة للدفع؟'),
(386, 'faq_answer_vertex_1564405965', '_vertex_1564405965', 'arabic', 'هناك 4 طرق لدفع قيمة اشتراك العضوية أو مدة الاشتراك في الخدمة أو دفع المستحقات وهي:\r\nالدفع الإلكتروني من خلال الموقع\r\nإجراء عملية تحويل إلى الحساب البنكي الخاص بالشركة\r\nالتواصل مع فريق العناية بالعملاء ودفع المبلغ نقداً (كاش)'),
(387, 'faq_meta_desc_vertex_1564405965', '_vertex_1564405965', 'arabic', ''),
(388, 'faq_meta_keywords_vertex_1564405965', '_vertex_1564405965', 'arabic', ''),
(389, 'faq_question_vertex_1564405965', '_vertex_1564405965', 'english', 'What are the available methods for making the payment?'),
(390, 'faq_answer_vertex_1564405965', '_vertex_1564405965', 'english', ''),
(391, 'faq_meta_desc_vertex_1564405965', '_vertex_1564405965', 'english', ''),
(392, 'faq_meta_keywords_vertex_1564405965', '_vertex_1564405965', 'english', ''),
(393, 'faq_question_vertex_1564406017', '_vertex_1564406017', 'arabic', 'هل يمكنني تقصير مدة الاشتراك في الخدمة؟'),
(394, 'faq_answer_vertex_1564406017', '_vertex_1564406017', 'arabic', ''),
(395, 'faq_meta_desc_vertex_1564406017', '_vertex_1564406017', 'arabic', ''),
(396, 'faq_meta_keywords_vertex_1564406017', '_vertex_1564406017', 'arabic', ''),
(397, 'faq_question_vertex_1564406017', '_vertex_1564406017', 'english', 'Can I shorten the subscription period?'),
(398, 'faq_answer_vertex_1564406017', '_vertex_1564406017', 'english', 'نعم يمكنك ذلك، ولكن يرجى التواصل مع فريق العناية بالعملاء لترتيب موعد استلام السيارة.'),
(399, 'faq_meta_desc_vertex_1564406017', '_vertex_1564406017', 'english', ''),
(400, 'faq_meta_keywords_vertex_1564406017', '_vertex_1564406017', 'english', ''),
(401, 'faq_question_vertex_1564406108', '_vertex_1564406108', 'arabic', 'كم تستغرق عملية استرجاع المبلغ المدفوع؟'),
(402, 'faq_answer_vertex_1564406108', '_vertex_1564406108', 'arabic', 'سيتم إرجاع المبلغ المدفوع إلى بطاقة الائتمان أو إلى الحساب البنكي الخاصة بك أو تحويلها إلى رصيد نقاطك وفقاً لطلبك. علماً أن تحويل المبلغ إلى رصيد نقاطك يستقرق 48 ساعة تقريباً، ويمكنك استخدام رصيد النقاط في عمليات تجديد الاشتراك في فئات العضوية أو تجديد مدة الاشتراك في الخدمة القادمة. وأما إرجاع المبلغ إلى حساب البطاقة يحتاج إلى 30 يوم عمل وسيتم إرسال رسالة نصية أو بريد إلكتروني بمجرد الانتهاء من عملية الإرجاع.'),
(403, 'faq_meta_desc_vertex_1564406108', '_vertex_1564406108', 'arabic', ''),
(404, 'faq_meta_keywords_vertex_1564406108', '_vertex_1564406108', 'arabic', ''),
(405, 'faq_question_vertex_1564406108', '_vertex_1564406108', 'english', 'How long does the refund process take?'),
(406, 'faq_answer_vertex_1564406108', '_vertex_1564406108', 'english', ''),
(407, 'faq_meta_desc_vertex_1564406108', '_vertex_1564406108', 'english', ''),
(408, 'faq_meta_keywords_vertex_1564406108', '_vertex_1564406108', 'english', ''),
(409, 'faq_question_vertex_1564406192', '_vertex_1564406192', 'arabic', 'ما هي الأجزاء التي تغطيها خدمة الصيانة الدورية؟'),
(410, 'faq_answer_vertex_1564406192', '_vertex_1564406192', 'arabic', 'تغطية الصيانة الدورية تشمل: إصلاح المحرك أو استبداله ، تغيير الزيت والفلتر، صيانة البطارية أو استبدالها ، إصلاح أو استبدال المصباح الخلفي والمصباح الأمامي، تغيير الإطارات المسطحة أو المتضخم، إصلاح الإطارات أو تغيرها، تغير فلتر الوقود.'),
(411, 'faq_meta_desc_vertex_1564406192', '_vertex_1564406192', 'arabic', ''),
(412, 'faq_meta_keywords_vertex_1564406192', '_vertex_1564406192', 'arabic', ''),
(413, 'faq_question_vertex_1564406192', '_vertex_1564406192', 'english', 'What are the parts that covered by the regular maintenance service?'),
(414, 'faq_answer_vertex_1564406192', '_vertex_1564406192', 'english', ''),
(415, 'faq_meta_desc_vertex_1564406192', '_vertex_1564406192', 'english', ''),
(416, 'faq_meta_keywords_vertex_1564406192', '_vertex_1564406192', 'english', ''),
(417, 'faq_question_vertex_1564406342', '_vertex_1564406342', 'arabic', 'ما هي المدن التي تعملون فيها الآن؟'),
(418, 'faq_answer_vertex_1564406342', '_vertex_1564406342', 'arabic', 'حالياً نعمل في المدن التالية: الرياض، جدة، الدمام، المدينة المنورة.'),
(419, 'faq_meta_desc_vertex_1564406342', '_vertex_1564406342', 'arabic', ''),
(420, 'faq_meta_keywords_vertex_1564406342', '_vertex_1564406342', 'arabic', ''),
(421, 'faq_question_vertex_1564406342', '_vertex_1564406342', 'english', 'what cities are you operating in?'),
(422, 'faq_answer_vertex_1564406342', '_vertex_1564406342', 'english', ''),
(423, 'faq_meta_desc_vertex_1564406342', '_vertex_1564406342', 'english', ''),
(424, 'faq_meta_keywords_vertex_1564406342', '_vertex_1564406342', 'english', ''),
(425, 'faq_question_vertex_1564406391', '_vertex_1564406391', 'arabic', 'أين يمكنني قيادة سيارتي'),
(426, 'faq_answer_vertex_1564406391', '_vertex_1564406391', 'arabic', 'يمكنك قيادة سيارتك في أي مكان داخل السعودية.'),
(427, 'faq_meta_desc_vertex_1564406391', '_vertex_1564406391', 'arabic', ''),
(428, 'faq_meta_keywords_vertex_1564406391', '_vertex_1564406391', 'arabic', ''),
(429, 'faq_question_vertex_1564406391', '_vertex_1564406391', 'english', 'Where can I drive?');
INSERT INTO `strings` (`string_uid`, `string_key`, `string_code`, `string_lang`, `string_content`) VALUES
(430, 'faq_answer_vertex_1564406391', '_vertex_1564406391', 'english', ''),
(431, 'faq_meta_desc_vertex_1564406391', '_vertex_1564406391', 'english', ''),
(432, 'faq_meta_keywords_vertex_1564406391', '_vertex_1564406391', 'english', ''),
(433, 'faq_question_vertex_1564406473', '_vertex_1564406473', 'arabic', 'كيف يمكنني عرض فواتير الاشتراك الخاصة بي؟'),
(434, 'faq_answer_vertex_1564406473', '_vertex_1564406473', 'arabic', 'يمكن العثور على فواتير الاشتراك الخاصة بك بعد الذهاب إلى حسابك ومن ثم النقر على \"الحجوزات\" أو مرفقة برسالة البريد الإلكتروني الخاصة بالفاتورة التي نرسلها إليك.'),
(435, 'faq_meta_desc_vertex_1564406473', '_vertex_1564406473', 'arabic', ''),
(436, 'faq_meta_keywords_vertex_1564406473', '_vertex_1564406473', 'arabic', ''),
(437, 'faq_question_vertex_1564406473', '_vertex_1564406473', 'english', 'How do I view my subscription invoices?'),
(438, 'faq_answer_vertex_1564406473', '_vertex_1564406473', 'english', ''),
(439, 'faq_meta_desc_vertex_1564406473', '_vertex_1564406473', 'english', ''),
(440, 'faq_meta_keywords_vertex_1564406473', '_vertex_1564406473', 'english', ''),
(441, 'faq_question_vertex_1564406735', '_vertex_1564406735', 'arabic', 'ماذا يحدث إذا تأخرت يوم واحد عن دفع قيمة الاشتراك في الخدمة؟'),
(442, 'faq_answer_vertex_1564406735', '_vertex_1564406735', 'arabic', 'نحن نشجع المشتركين لدفع قيمة الاشتراك في الخدمة قبل انتهاء الخدمة بـ يوم لتفادي دفع مبالغ إضافية، لكن في حال تعثر سداد قيمة الاشتراك بعد انتهاء خدمة الاشتراك، سيتم احتساب السعر الأساسي للخدمة عن كل يوم تأخير.'),
(443, 'faq_meta_desc_vertex_1564406735', '_vertex_1564406735', 'arabic', ''),
(444, 'faq_meta_keywords_vertex_1564406735', '_vertex_1564406735', 'arabic', ''),
(445, 'faq_question_vertex_1564406735', '_vertex_1564406735', 'english', 'What happens if I delayed paying my subscription service fee for one day?'),
(446, 'faq_answer_vertex_1564406735', '_vertex_1564406735', 'english', ''),
(447, 'faq_meta_desc_vertex_1564406735', '_vertex_1564406735', 'english', ''),
(448, 'faq_meta_keywords_vertex_1564406735', '_vertex_1564406735', 'english', ''),
(449, 'faq_question_vertex_1564407569', '_vertex_1564407569', 'arabic', 'ماذا يحدث إذا تأخرت يوم واحد عن دفع قيمة اشتراك العضوية؟'),
(450, 'faq_answer_vertex_1564407569', '_vertex_1564407569', 'arabic', 'نحن نشجع المشتركين الذين يرغبون في الاستمرار والاستفادة من خدماتنا لدفع قيمة اشتراك العضوية قبل انتهائها لتفادي دفع مبالغ إضافية، لكن في حال تعثر سداد قيمة اشتراك العضوية بعد انتهائها، سيتم احتساب السعر الأساسي للخدمة عن كل يوم تأخير.'),
(451, 'faq_meta_desc_vertex_1564407569', '_vertex_1564407569', 'arabic', ''),
(452, 'faq_meta_keywords_vertex_1564407569', '_vertex_1564407569', 'arabic', ''),
(453, 'faq_question_vertex_1564407569', '_vertex_1564407569', 'english', 'What happens if I delayed paying my membership fee for one day?'),
(454, 'faq_answer_vertex_1564407569', '_vertex_1564407569', 'english', ''),
(455, 'faq_meta_desc_vertex_1564407569', '_vertex_1564407569', 'english', ''),
(456, 'faq_meta_keywords_vertex_1564407569', '_vertex_1564407569', 'english', ''),
(457, 'faq_question_vertex_1564407613', '_vertex_1564407613', 'arabic', 'متى تبدأ فترة الاشتراك في الخدمة للمدة الزمنية الخاصة بي؟'),
(458, 'faq_answer_vertex_1564407613', '_vertex_1564407613', 'arabic', 'عندما تقوم بالحجز، فأنت تدفع قيمة الاشتراك في الخدمة للفترة الزمنية التي ترغب الاشتراك فيها، وتبدأ مدة الاشتراك في الخدمة في اليوم الذي تستلم فيه سيارتك. وفي حال رغبتك بإستمرار الخدمة، تواصل معنا لتجديد اشتراكك بعد دفع قيمة الاشتراك للفترة الزمنية الجديدة.'),
(459, 'faq_meta_desc_vertex_1564407613', '_vertex_1564407613', 'arabic', ''),
(460, 'faq_meta_keywords_vertex_1564407613', '_vertex_1564407613', 'arabic', ''),
(461, 'faq_question_vertex_1564407613', '_vertex_1564407613', 'english', 'When does the subscription period begin for my time period?'),
(462, 'faq_answer_vertex_1564407613', '_vertex_1564407613', 'english', ''),
(463, 'faq_meta_desc_vertex_1564407613', '_vertex_1564407613', 'english', ''),
(464, 'faq_meta_keywords_vertex_1564407613', '_vertex_1564407613', 'english', ''),
(465, 'faq_question_vertex_1564407922', '_vertex_1564407922', 'arabic', 'متى راح استلم سيارتي؟'),
(466, 'faq_answer_vertex_1564407922', '_vertex_1564407922', 'arabic', 'بمجرد بدء إجراء عملية الحجز على المنصة، ستكون قادرًا على رؤية أقرب تاريخ للحصول على سيارتك. تستطيع أيضاً تحديد تاريخ استلام سيارتك ومن ثم سيقوم فريق العناية بالعملاء لدينا بالعمل معك لتحديد وقت استلام السيارة.\r\n\r\nملاحظة: جميع السيارات ستكون متاحة للتسليم أقرب وقت متاح.'),
(467, 'faq_meta_desc_vertex_1564407922', '_vertex_1564407922', 'arabic', ''),
(468, 'faq_meta_keywords_vertex_1564407922', '_vertex_1564407922', 'arabic', ''),
(469, 'faq_question_vertex_1564407922', '_vertex_1564407922', 'english', 'When will I get my car?'),
(470, 'faq_answer_vertex_1564407922', '_vertex_1564407922', 'english', ''),
(471, 'faq_meta_desc_vertex_1564407922', '_vertex_1564407922', 'english', ''),
(472, 'faq_meta_keywords_vertex_1564407922', '_vertex_1564407922', 'english', ''),
(473, 'faq_question_vertex_1564408086', '_vertex_1564408086', 'arabic', 'ما هي الخيارات المتوفرة إذا فقدت سيارتي بسبب حادث أو عطل فني؟'),
(474, 'faq_answer_vertex_1564408086', '_vertex_1564408086', 'arabic', 'سيقوم فريق العناية بالعملاء بالتواصل معك وتسليمك سيارة بديل في أقرب وقت ممكن حتى يتم الانتهاء من إصلاح سيارتك أو إستكمال الإجراءات اللازمة.'),
(475, 'faq_meta_desc_vertex_1564408086', '_vertex_1564408086', 'arabic', ''),
(476, 'faq_meta_keywords_vertex_1564408086', '_vertex_1564408086', 'arabic', ''),
(477, 'faq_question_vertex_1564408086', '_vertex_1564408086', 'english', 'What are the available options if I lost my car due to an accident or technical failure?'),
(478, 'faq_answer_vertex_1564408086', '_vertex_1564408086', 'english', ''),
(479, 'faq_meta_desc_vertex_1564408086', '_vertex_1564408086', 'english', ''),
(480, 'faq_meta_keywords_vertex_1564408086', '_vertex_1564408086', 'english', ''),
(481, 'faq_question_vertex_1564408130', '_vertex_1564408130', 'arabic', 'ما هي خدمة الحجز المبكر؟'),
(482, 'faq_answer_vertex_1564408130', '_vertex_1564408130', 'arabic', 'تستطيع الحصول على %5 خصم إضافي خلال اشتراكك في الخدمة لمدة أسبوع مقابل استلام سيارتك بعد 45 يوم عمل.'),
(483, 'faq_meta_desc_vertex_1564408130', '_vertex_1564408130', 'arabic', ''),
(484, 'faq_meta_keywords_vertex_1564408130', '_vertex_1564408130', 'arabic', ''),
(485, 'faq_question_vertex_1564408130', '_vertex_1564408130', 'english', 'What is the Early Booking Offer Service?'),
(486, 'faq_answer_vertex_1564408130', '_vertex_1564408130', 'english', ''),
(487, 'faq_meta_desc_vertex_1564408130', '_vertex_1564408130', 'english', ''),
(488, 'faq_meta_keywords_vertex_1564408130', '_vertex_1564408130', 'english', ''),
(489, 'faq_question_vertex_1564408217', '_vertex_1564408217', 'arabic', 'هل أستطيع قيادة سيارتي داخل دول الخليج؟'),
(490, 'faq_answer_vertex_1564408217', '_vertex_1564408217', 'arabic', 'لا. للأسف لا تستطيع قيادة سيارتك خارج السعودية في الوقت الحالي.'),
(491, 'faq_meta_desc_vertex_1564408217', '_vertex_1564408217', 'arabic', ''),
(492, 'faq_meta_keywords_vertex_1564408217', '_vertex_1564408217', 'arabic', ''),
(493, 'faq_question_vertex_1564408217', '_vertex_1564408217', 'english', 'Can I drive in the Gulf Region (GCC)?'),
(494, 'faq_answer_vertex_1564408217', '_vertex_1564408217', 'english', ''),
(495, 'faq_meta_desc_vertex_1564408217', '_vertex_1564408217', 'english', ''),
(496, 'faq_meta_keywords_vertex_1564408217', '_vertex_1564408217', 'english', ''),
(497, 'faq_question_vertex_1564408327', '_vertex_1564408327', 'arabic', 'كيف أتواصل مع فريق العناية بالعملاء؟'),
(498, 'faq_answer_vertex_1564408327', '_vertex_1564408327', 'arabic', 'تواصل معنا عبر المحادثة الفورية أو عبر تطبيق الواتس آب بشكل مباشر على الرقم التالي +966 555 208 078 على مدار الأسبوع خلال ساعات العمل أو ببساطة أرسل رسالة على البريد الإلكتروني WeCare@efadcar.com  لخدمتك بشكل أفضل.'),
(499, 'faq_meta_desc_vertex_1564408327', '_vertex_1564408327', 'arabic', ''),
(500, 'faq_meta_keywords_vertex_1564408327', '_vertex_1564408327', 'arabic', ''),
(501, 'faq_question_vertex_1564408327', '_vertex_1564408327', 'english', 'How do I contact your customer care team?'),
(502, 'faq_answer_vertex_1564408327', '_vertex_1564408327', 'english', ''),
(503, 'faq_meta_desc_vertex_1564408327', '_vertex_1564408327', 'english', ''),
(504, 'faq_meta_keywords_vertex_1564408327', '_vertex_1564408327', 'english', ''),
(505, 'faq_question_vertex_1564408437', '_vertex_1564408437', 'arabic', 'ما هي أنواع الوسائط الاجتماعية التي تشارك فيها إفاد؟'),
(506, 'faq_answer_vertex_1564408437', '_vertex_1564408437', 'arabic', 'انستقرام\r\nتويتر\r\nلينكد إن'),
(507, 'faq_meta_desc_vertex_1564408437', '_vertex_1564408437', 'arabic', ''),
(508, 'faq_meta_keywords_vertex_1564408437', '_vertex_1564408437', 'arabic', ''),
(509, 'faq_question_vertex_1564408437', '_vertex_1564408437', 'english', 'What kinds of social media channel does Efad you have?'),
(510, 'faq_answer_vertex_1564408437', '_vertex_1564408437', 'english', ''),
(511, 'faq_meta_desc_vertex_1564408437', '_vertex_1564408437', 'english', ''),
(512, 'faq_meta_keywords_vertex_1564408437', '_vertex_1564408437', 'english', ''),
(513, 'faq_question_vertex_1564409622', '_vertex_1564409622', 'arabic', 'هل سيتم إعادة قيمة اشتراك العضوية في حال عدم أستخدمها؟'),
(514, 'faq_answer_vertex_1564409622', '_vertex_1564409622', 'arabic', 'سيتم إعادة قيمة اشتراك العضوية كاملة ١٠٠٪ عند طلبك لها وفي حال عدم استخدامها مميزاتها.'),
(515, 'faq_meta_desc_vertex_1564409622', '_vertex_1564409622', 'arabic', ''),
(516, 'faq_meta_keywords_vertex_1564409622', '_vertex_1564409622', 'arabic', ''),
(517, 'faq_question_vertex_1564409622', '_vertex_1564409622', 'english', 'Will the membership fee be refunded if I do not use it?'),
(518, 'faq_answer_vertex_1564409622', '_vertex_1564409622', 'english', ''),
(519, 'faq_meta_desc_vertex_1564409622', '_vertex_1564409622', 'english', ''),
(520, 'faq_meta_keywords_vertex_1564409622', '_vertex_1564409622', 'english', ''),
(521, 'faq_question_vertex_1564409673', '_vertex_1564409673', 'arabic', 'هل يمكنني نقل عضويتي إلى شخص آخر؟'),
(522, 'faq_answer_vertex_1564409673', '_vertex_1564409673', 'arabic', 'لا. إذا رغبت في عدم تجديد عضويتك الموظف، فلا تستطيع/ي نقل عضويتك لشخص آخر، ويحتاج هذا الشخص إلى بدء عضوية جديدة.'),
(523, 'faq_meta_desc_vertex_1564409673', '_vertex_1564409673', 'arabic', ''),
(524, 'faq_meta_keywords_vertex_1564409673', '_vertex_1564409673', 'arabic', ''),
(525, 'faq_question_vertex_1564409673', '_vertex_1564409673', 'english', 'Can I transfer my membership to someone else?'),
(526, 'faq_answer_vertex_1564409673', '_vertex_1564409673', 'english', ''),
(527, 'faq_meta_desc_vertex_1564409673', '_vertex_1564409673', 'english', ''),
(528, 'faq_meta_keywords_vertex_1564409673', '_vertex_1564409673', 'english', '');

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
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`book_uid`);

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
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`invoice_uid`);

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
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `book_uid` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `faq_uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `faq_categories`
--
ALTER TABLE `faq_categories`
  MODIFY `fc_uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `invoice_uid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `lang_uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `media_uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `member_uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `memberships`
--
ALTER TABLE `memberships`
  MODIFY `mc_uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `page_uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `string_uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=529;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
