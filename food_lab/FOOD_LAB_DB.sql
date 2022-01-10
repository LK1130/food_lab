-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 10, 2022 at 08:16 AM
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
) 

--
-- Dumping data for table `M_Decision_Status`
--

INSERT INTO `M_Decision_Status` (`id`, `status`, `note`, `del_flg`, `created_at`, `updated_at`) VALUES
(1, 'Request', 'Request Coin From Customer', 0, '2022-01-10 07:02:37', '2022-01-10 07:11:49'),
(2, 'Approve', 'Approve Coin From Admin', 0, '2022-01-10 07:03:14', '2022-01-10 07:12:08'),
(3, 'Waiting', 'Waiting Decision In Admin', 0, '2022-01-10 07:03:42', '2022-01-10 07:12:34'),
(4, 'Reject', 'Reject Coin Request From Admin', 0, '2022-01-10 07:04:01', '2022-01-10 07:12:50');

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
) 

--
-- Dumping data for table `M_Fav_Type`
--

INSERT INTO `M_Fav_Type` (`id`, `favourite_food`, `note`, `del_flg`, `created_at`, `updated_at`) VALUES
(1, 'Chinese Food', 'Chinese Food', 0, '2022-01-10 07:05:53', '2022-01-10 07:05:53'),
(2, 'Burmese Food', 'Burmese Food', 0, '2022-01-10 07:06:08', '2022-01-10 07:06:08'),
(3, 'Korean Food', 'Korean Food', 0, '2022-01-10 07:06:22', '2022-01-10 07:06:22'),
(4, 'Thai Food', 'Thai Food', 0, '2022-01-10 07:06:30', '2022-01-10 07:06:30'),
(5, 'Japanese Food', 'Japanese Food', 0, '2022-01-10 07:06:43', '2022-01-10 07:06:43');

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
) 

--
-- Dumping data for table `M_News_Category`
--

INSERT INTO `M_News_Category` (`id`, `category_name`, `note`, `del_flg`, `created_at`, `updated_at`) VALUES
(1, 'Food', 'Food Blog', 0, '2022-01-10 07:07:20', '2022-01-10 07:07:20'),
(2, 'Health', 'Healthy Blog', 0, '2022-01-10 07:07:38', '2022-01-10 07:07:38'),
(3, 'Promotion', 'Promotion News', 0, '2022-01-10 07:07:53', '2022-01-10 07:07:53'),
(4, 'Social', 'Social Media News', 0, '2022-01-10 07:08:10', '2022-01-10 07:08:10'),
(5, 'Other', 'Other', 0, '2022-01-10 07:08:23', '2022-01-10 07:08:23');

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
) 

--
-- Dumping data for table `M_Order_Status`
--

INSERT INTO `M_Order_Status` (`id`, `status`, `note`, `del_flg`, `created_at`, `updated_at`) VALUES
(1, 'Request', 'Request From Customer', 0, '2022-01-10 00:32:37', '2022-01-10 00:32:37'),
(2, 'Cancel', 'Cancel From Customer', 0, '2022-01-10 00:33:14', '2022-01-10 00:33:14'),
(3, 'Confirm', 'Order Confirm From Kitchen', 0, '2022-01-10 00:33:42', '2022-01-10 00:33:42'),
(4, 'Reject', 'Reject From Kitchen', 0, '2022-01-10 00:34:01', '2022-01-10 00:34:01'),
(5, 'Preparing', 'Prepare From Kitchen', 0, '2022-01-10 00:34:31', '2022-01-10 00:34:31'),
(6, 'Delivery', 'Delivey To Customer', 0, '2022-01-10 00:34:57', '2022-01-10 00:34:57'),
(7, 'Completed', 'Order Complete', 0, '2022-01-10 00:35:17', '2022-01-10 00:35:17');

-- --------------------------------------------------------

--
-- Table structure for table `M_Payment`
--

CREATE TABLE `M_Payment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_name` varchar(255) NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `del_flg` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) 

--
-- Dumping data for table `M_Payment`
--

INSERT INTO `M_Payment` (`id`, `payment_name`, `account_name`, `note`, `del_flg`, `created_at`, `updated_at`) VALUES
(1, 'Kpay', '09421010111', 'Kpay Account', 0, '2022-01-10 07:00:37', '2022-01-10 07:00:37'),
(2, 'CB', '0086-2322-22323-2222', 'CB Bank Account', 0, '2022-01-10 07:01:06', '2022-01-10 07:01:06'),
(3, 'AYA', '0086-1111-1111-1111', 'AYA Bank Account', 0, '2022-01-10 07:01:32', '2022-01-10 07:01:32'),
(4, 'KBZ', '0086-3333-3333-3333', 'KBZ Bank Account', 0, '2022-01-10 07:01:54', '2022-01-10 07:01:54');

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
) 

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
) 

--
-- Dumping data for table `M_Suggest`
--

INSERT INTO `M_Suggest` (`id`, `suggest_type`, `note`, `del_flg`, `created_at`, `updated_at`) VALUES
(1, 'Cooking Quality', 'Suggest For Cooking Quality', 0, '2022-01-10 07:14:13', '2022-01-10 07:14:13'),
(2, 'Delivery', 'Suggest For Delivery', 0, '2022-01-10 07:14:32', '2022-01-10 07:14:32'),
(3, 'Website', 'Suggest For Website', 0, '2022-01-10 07:14:44', '2022-01-10 07:14:44'),
(4, 'Taste', 'Suggest For Taste', 0, '2022-01-10 07:14:55', '2022-01-10 07:14:55'),
(5, 'other', 'Suggest For Other', 0, '2022-01-10 07:15:15', '2022-01-10 07:15:15');

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
) 

--
-- Dumping data for table `M_Taste`
--

INSERT INTO `M_Taste` (`id`, `taste`, `note`, `del_flg`, `created_at`, `updated_at`) VALUES
(1, 'Sweet', 'Sweet Taste', 0, '2022-01-10 07:15:35', '2022-01-10 07:15:35'),
(2, 'Spicy', 'Spicy Taste', 0, '2022-01-10 07:15:53', '2022-01-10 07:15:53');

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
) 

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
) 

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
) 

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
) 

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `M_Fav_Type`
--
ALTER TABLE `M_Fav_Type`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `M_News_Category`
--
ALTER TABLE `M_News_Category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `M_Order_Status`
--
ALTER TABLE `M_Order_Status`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `M_Payment`
--
ALTER TABLE `M_Payment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `M_Site`
--
ALTER TABLE `M_Site`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `M_Suggest`
--
ALTER TABLE `M_Suggest`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `M_Taste`
--
ALTER TABLE `M_Taste`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
