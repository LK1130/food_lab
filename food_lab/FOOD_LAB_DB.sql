-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 10, 2022 at 07:54 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `FOOD_LAB_DB`
--

-- --------------------------------------------------------

--
-- Table structure for table `M_Decision_Status`
--

CREATE TABLE `M_Decision_Status` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `del_flg` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `M_Fav_Type`
--

CREATE TABLE `M_Fav_Type` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `favourite_food` varchar(255) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `del_flg` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `M_News_Category`
--

CREATE TABLE `M_News_Category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `del_flg` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `M_Order_Status`
--

CREATE TABLE `M_Order_Status` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `del_flg` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `M_Payment`
--

CREATE TABLE `M_Payment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_name` varchar(255) NOT NULL,
  `account_name` int(11) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `del_flg` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `M_Site`
--

CREATE TABLE `M_Site` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_name` varchar(255) NOT NULL,
  `site_logo` varchar(255) NOT NULL,
  `privacy_policy` varchar(255) NOT NULL,
  `maintenance` int(11) NOT NULL,
  `del_flg` int(11) NOT NULL DEFAULT 0,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `M_Suggest`
--

CREATE TABLE `M_Suggest` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `suggest_type` varchar(255) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `del_flg` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `M_Taste`
--

CREATE TABLE `M_Taste` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `taste` varchar(255) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `del_flg` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `M_Township`
--

CREATE TABLE `M_Township` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `township_name` varchar(255) NOT NULL,
  `delivery_price` int(11) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `del_flg` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `T_AD_Contact`
--

CREATE TABLE `T_AD_Contact` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `message` varchar(255) NOT NULL,
  `reply` varchar(255) DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `del_flg` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `T_AD_Report`
--

CREATE TABLE `T_AD_Report` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `report_message` varchar(255) NOT NULL,
  `reply` varchar(255) DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `del_flg` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `T_AD_Suggest`
--

CREATE TABLE `T_AD_Suggest` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `suggest_type` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `reply` varchar(255) DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `del_flg` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `M_Decision_Status`
--
ALTER TABLE `M_Decision_Status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `M_Fav_Type`
--
ALTER TABLE `M_Fav_Type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `M_News_Category`
--
ALTER TABLE `M_News_Category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `M_Order_Status`
--
ALTER TABLE `M_Order_Status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `M_Payment`
--
ALTER TABLE `M_Payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `M_Site`
--
ALTER TABLE `M_Site`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `M_Suggest`
--
ALTER TABLE `M_Suggest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `M_Taste`
--
ALTER TABLE `M_Taste`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `M_Township`
--
ALTER TABLE `M_Township`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `T_AD_Contact`
--
ALTER TABLE `T_AD_Contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `T_AD_Report`
--
ALTER TABLE `T_AD_Report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `T_AD_Suggest`
--
ALTER TABLE `T_AD_Suggest`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `M_Decision_Status`
--
ALTER TABLE `M_Decision_Status`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `M_Fav_Type`
--
ALTER TABLE `M_Fav_Type`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `M_News_Category`
--
ALTER TABLE `M_News_Category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `M_Order_Status`
--
ALTER TABLE `M_Order_Status`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `M_Payment`
--
ALTER TABLE `M_Payment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `M_Site`
--
ALTER TABLE `M_Site`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `M_Suggest`
--
ALTER TABLE `M_Suggest`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `M_Taste`
--
ALTER TABLE `M_Taste`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `M_Township`
--
ALTER TABLE `M_Township`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `T_AD_Contact`
--
ALTER TABLE `T_AD_Contact`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `T_AD_Report`
--
ALTER TABLE `T_AD_Report`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `T_AD_Suggest`
--
ALTER TABLE `T_AD_Suggest`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
