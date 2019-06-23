-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 09, 2019 at 09:10 AM
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
-- Table structure for table `cars_categories`
--

CREATE TABLE `cars_categories` (
  `cc_uid` int(11) NOT NULL,
  `cc_code` varchar(100) NOT NULL,
  `cc_name` varchar(255) NOT NULL,
  `cc_image` varchar(255) NOT NULL,
  `cc_meta_desc` varchar(255) NOT NULL,
  `cc_meta_keywords` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

-- --------------------------------------------------------

--
-- Table structure for table `dx_groups`
--

CREATE TABLE `dx_groups` (
  `group_uid` int(11) NOT NULL,
  `group_name` varchar(50) NOT NULL,
  `group_level` tinyint(1) NOT NULL COMMENT '1 => admin or 2 => front'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dx_users`
--

CREATE TABLE `dx_users` (
  `user_uid` int(11) NOT NULL,
  `user_fname` varchar(255) NOT NULL,
  `user_lname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_pwd` varchar(255) NOT NULL,
  `user_timezone` varchar(20) NOT NULL,
  `user_account_type` varchar(20) NOT NULL,
  `user_actived` tinyint(1) NOT NULL,
  `user_banned` tinyint(1) NOT NULL,
  `user_ban_reason` varchar(255) NOT NULL,
  `user_register_ip` varchar(50) NOT NULL,
  `group_uid` tinyint(2) NOT NULL,
  `user_add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

-- --------------------------------------------------------

--
-- Table structure for table `faq_categories`
--

CREATE TABLE `faq_categories` (
  `fc_uid` int(11) NOT NULL,
  `fc_code` varchar(100) NOT NULL,
  `fc_name` varchar(255) NOT NULL,
  `fc_meta_desc` varchar(255) NOT NULL,
  `fc_meta_keywords` varchar(255) NOT NULL
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
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`blog_uid`);

--
-- Indexes for table `cars_categories`
--
ALTER TABLE `cars_categories`
  ADD PRIMARY KEY (`cc_uid`);

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
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `blog_uid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cars_categories`
--
ALTER TABLE `cars_categories`
  MODIFY `cc_uid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dx_groups`
--
ALTER TABLE `dx_groups`
  MODIFY `group_uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `dx_users`
--
ALTER TABLE `dx_users`
  MODIFY `user_uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `faq_uid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `faq_categories`
--
ALTER TABLE `faq_categories`
  MODIFY `fc_uid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `lang_uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `membership_categories`
--
ALTER TABLE `membership_categories`
  MODIFY `mc_uid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `page_uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `site_uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `strings`
--
ALTER TABLE `strings`
  MODIFY `string_uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
