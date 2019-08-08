-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 03, 2019 at 05:39 AM
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
  `car_yearly_price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Table structure for table `membership_categories`
--

CREATE TABLE `membership_categories` (
  `mc_uid` int(11) NOT NULL,
  `mc_code` varchar(100) NOT NULL,
  `mc_name` varchar(255) NOT NULL,
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
  `mc_color_code` varchar(6) NOT NULL,
  `mc_status` tinyint(1) NOT NULL DEFAULT '1',
  `mc_add-date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `albums_del` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`per_uid`, `group_uid`, `pages_menu`, `pages_list`, `pages_add`, `pages_edit`, `pages_del`, `faq_categories_menu`, `faq_categories_list`, `faq_categories_add`, `faq_categories_edit`, `faq_categories_del`, `faq_menu`, `faq_list`, `faq_add`, `faq_edit`, `faq_del`, `cars_categories_menu`, `cars_categories_list`, `cars_categories_add`, `cars_categories_edit`, `cars_categories_del`, `cars_types_menu`, `cars_types_list`, `cars_types_add`, `cars_types_edit`, `cars_types_del`, `blogs_menu`, `blogs_list`, `blogs_add`, `blogs_edit`, `blogs_del`, `admins_menu`, `admins_list`, `admins_add`, `admins_edit`, `admins_del`, `groups_menu`, `groups_list`, `groups_add`, `groups_edit`, `groups_del`, `groups_permissions`, `cars_brands_menu`, `cars_brands_list`, `cars_brands_add`, `cars_brands_edit`, `cars_brands_del`, `albums_menu`, `albums_list`, `albums_add`, `albums_edit`, `albums_del`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(2, 2, 0, 0, 0, 0, 0, 1, 1, 1, 1, 0, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

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
-- Indexes for table `cars_types`
--
ALTER TABLE `cars_types`
  ADD PRIMARY KEY (`ct_uid`);

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
-- Indexes for table `membership_categories`
--
ALTER TABLE `membership_categories`
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
  MODIFY `car_uid` int(11) NOT NULL AUTO_INCREMENT;
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
-- AUTO_INCREMENT for table `cars_types`
--
ALTER TABLE `cars_types`
  MODIFY `ct_uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
-- AUTO_INCREMENT for table `membership_categories`
--
ALTER TABLE `membership_categories`
  MODIFY `mc_uid` int(11) NOT NULL AUTO_INCREMENT;
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
