cherryppk
#7397

Deathnote — 01/19/2022
var formData = {
            title: jQuery('#title').val(),
            description: jQuery('#description').val(),
        };
data: formData,
cherryppk — 01/19/2022
https://we.tl/t-YrmvLaKg61
Category Selected Box.png and 5 more files
6 files sent via WeTransfer, the simplest way to send your files around the world
Image
Justro — 01/19/2022
Image
Deathnote — 01/19/2022
Image
Image
Image
Image
Image
Image
Deathnote — 01/20/2022
$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
<meta name="csrf-token" content="{{ csrf_token() }}">
e.preventDefault();
Deathnote — 01/20/2022
'file' => 'max:51200',
IchigoXclipse — 01/20/2022
select ('*',DB::raw('t_ad_order.id AS orderid'))
Deathnote — 01/20/2022
https://discord.com/channels/@me/906896884537389056/933255688216514580
Image
Justro — 01/21/2022
Date:(01/21)
Meeting Minute

Title : Customer Info
Speaker: ZNWL,LKK
Talk Note:
-Left to do Customer Info Graph
-Left to do Order Transaction Product Detail Graph
-Done Report Design
-LKK Order Transition to Order Detail change Order ID
-Schedule  80% finished
-schedule arrange

Title : Image, Product Page
Speaker: AMK,LKK
Talk Note:
-All Done and just need to check from LK
-Just made customer layout and will start form order detail
-Talk about buyout details
-Fix Excel
-schedule arrange

Title : Customer 
Speaker: LK,MK
Talk Note:
-Fix Some Error
-Fix Excel
-have to execute customer page

Title :
Speaker: ZPA, LK
Talk Note:
-Start do Coding

Title :Security about Admin Link
Speaker: LK
Talk Note:
-Everyone have to create Admin account
meow299 — 01/21/2022
https://bootstrap-tagsinput.github.io/bootstrap-tagsinput/examples/
wenD'go — 01/24/2022
.
-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2022 at 03:09 PM
Expand
m_states.sql
2 KB
Deathnote — 01/24/2022
CREATE TABLE `M_Township` (
  `id` int NOT NULL AUTO_INCREMENT,
  `divandState` int NOT NULL,
  `townshipId` int NOT NULL,
  `townshipName` varchar(32) NOT NULL,
  `selecteddefault` tinyint(1) DEFAULT '0',
Expand
message.txt
4 KB
IchigoXclipse — 01/24/2022
Date:(01/24)

Title :Infrom
Speaker:LK,ZY
Talk Note:
-Error appear when pulled
Expand
24.1.22.txt
1 KB
Deathnote — 01/24/2022
_ad_product
t_ad_product
t_ad_photo
meow299 — 01/25/2022
model T_AD_PHOTO
-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2022 at 06:37 PM
Expand
t_ad_photo.sql
2 KB
meow299 — 01/27/2022
Date:(01/27)
Meeting Minute

Title : Sending Mail, Kitchen Design
Speaker: ZNWL,LKK
Talk Note:
-to send mail in dashboard page
-sample mail form
-fixing admin view
-arrange scheduel




Title : Image, Product Page
Speaker: AMK,LKK
Talk Note:
-Product View 2 page complete need to fix responsive


Title : Product Page
Speaker: LK,MK
Talk Note:
-To help CPPK's task
-About Changing Title Bar in customer page


Title : Image
Speaker: ZPA, LK
Talk Note:
-Need to insert image
-arrange schedule

Title : Due to electricity
Speaker: CPPK, LK
Talk Note:
-cant assign task


Title : 
Speaker: LK
Talk Note:
-This month 29 review All tasks
-6/2 Unit Task Start
-March Link to real database
-About Kitchen Design and database
-change T_CU_CUSTOMER LOGIN to M_CU_CUSTOMER LOGIN
Titanstic — 01/29/2022
CREATE TABLE m_state (
  id bigint UNSIGNED NOT NULL,
  state_name varchar(255) NOT NULL,
  del_flg int NOT NULL DEFAULT '0',
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
INSERT INTO m_state (id, state_name, del_flg, created_at, updated_at) VALUES
(1, 'yangon', 0, NULL, NULL),
(2, 'mandalay', 0, NULL, NULL);
INSERT INTO m_township (id, township_name, delivery_price, note, del_flg, created_at) VALUES
(1, 'North Dagon', 0, NULL, 0, '2022-01-21 09:56:58'),
(2, 'South Okalar', 2000, NULL, 0, '2022-01-21 09:56:58');
Deathnote — 01/30/2022
[
                    {
                            pid: 1,
                            q: 2,
                            value: [{
                                    label: A kyaw
                                    value: Egg
                                },
                                {
                                    label: A po
                                    value: Chill,
                                    Lemon,
                                    nananpin
                                },
                            ]
                        }
                        ]
    "
Deathnote — 01/30/2022
session(["cart"  =>  " [

                        {
                            pid: 1,
                            q: 2,
                            value: [{
                                    label: A kyaw
                                    value: Egg
                                },
                                {
                                    label: A po
                                    value: Chill,
                                    Lemon,
                                    nananpin
                                },
                            ]
                        },
                         {
                            pid: 2,
                            q: 2,
                            value: [{
                                    label: A kyaw
                                    value: Egg
                                },
                                {
                                    label: A po
                                    value: Chill,
                                    Lemon,
                                    nananpin
                                },
                            ]
                        },
                         {
                            pid: 1,
                            q: 2,
                            value: [{
                                    label: A kyaw
                                    value: Egg
                                },
                                {
                                    label: A po
                                    value: Chill,
                                    Lemon,
                                    nananpin
                                },
                            ]
                        }

             ] "   );
Deathnote — 01/31/2022
[
     {
         "pid": 1,
         "q": 2,
         "value": [{
                 "label": "A kyaw",
                 "value": "Egg"
             },
             {
                 "label": "A po",
                 "value": "Chill,Lemon,nananpin"
             }
         ]
     }
 ] 
Titanstic — 01/31/2022
Title :Admin Review
Speaker:Lk
Talk Note:
-About Admin Review 
-About Code Rule
-finish  customer product pages at 4/2/2022
-change css file
-change customer blade file

Title :Customer Product
Speaker:Lk,AMK
Talk Note:
-Not Finsih product
-finish customer product at 3/2/2022

Title :Admin Review
Speaker:Lk,Zayar
Talk Note:
-encrypt admin login password
-finish 50% admin review
-about customer info page

Title :
Speaker:Lk,CPPK
Talk Note:
-join with Database order and order_details
-add session value in note column from order detail 

Title :
Speaker:Lk,MK
Talk Note:
-about customer cart 
-finish customer product at 3/2/2022
Deathnote — 02/02/2022
{
    key1: value1,
    key2: value2
};
Deathnote — 02/02/2022
https://stackoverflow.com/questions/48757824/merge-objects-by-value-keeping-unique-values-in-an-array
Stack Overflow
Merge Objects by value keeping unique values in an array
I have been attempting to do the below. And I am having difficulty coming up with a clean solution to:



obj1 = {
key1: "ABC",
key2: "123",
key3: "UNIQUE1"
}

obj2 = {
key1: "ABC"...
Image
https://www.tutorialspoint.com/combine-unique-items-of-an-array-of-arrays-while-summing-values-javascript
Combine unique items of an array of arrays while summing values - J...
Combine unique items of an array of arrays while summing values - JavaScript - We have an array of array, each subarray contains exactly two elements, first is ...
Deathnote — 02/02/2022
https://css-tricks.com/adding-stroke-to-web-text/
CSS-Tricks
Chris Coyier
Adding Stroke to Web Text | CSS-Tricks
Fonts on the web are essentially vector-based graphics. That's why you can display them at 12px or 120px and they remain crisp and relatively sharp-edged.

Justro — 02/02/2022
Date: (2-Feb-2022)
Meeting Minute

Title : 
Speaker: ZYH
Talk Note:
-All done
-Have to Upload

Title : 
Speaker: ZNWL
Talk Note:
-All done

Title : 
Speaker: MK
Talk Note:
-All done

Title : 
Speaker: AMK
Talk Note:
-Have to execute left process
-Product
Deathnote — 02/02/2022
if(session()->has("cart))
    session(["cart" => session("cart").",".new]);
else
    session(["cart" => new]);
Titanstic — 02/03/2022
tTd110302Lwl
Chinese Food,Burmese Food,Korean Food,Thai Food,Japanese Food
Titanstic — 02/03/2022
[{"pid":"1","q":"2","value":[{"label":"other","value":"nodle"}]},{"pid":"1","q":"4","value":[{"label":"other","value":"nodle"}]}]
Deathnote — 02/03/2022
https://codebeautify.org/json-decode-online
JSON Decode Online to decode JSON to readable form.
Best Online JSON Decode tool to decode JSON String. It also helps to share JSON decoded data.
Image
cherryppk — 02/04/2022
Date:(02/04)
Meeting Minute

Title : admin design
Speaker: ZNWL,LKK
Talk Note:
-admin design
-need to adjust admin dashboard responsive
-need to adjust align
-need to fix review error

Title : cart
Speaker: AMK
Talk Note:
-unfinish cart
-need to fix product list table from admin

Title :test input
Speaker:MK,LKK
Talk Note:
-test input

Title : 
Speaker: CPPK
Talk Note:
-fix coin page

Title : sale chart
Speaker: ZPA
Talk Note:
-coin page color change
-sale chart

Title : finished ajax
Speaker: ZY,LKK
Talk Note:
-need to fix btn position,table bootstrap,profile photo
-need to add outline
-need to fix error of review
-miss position eye icon
-finished ajax

Title : review
Speaker: LKK
Talk Note:
-check error review
-check customer and admin design
Deathnote — 02/07/2022
-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 07, 2022 at 03:25 PM... (3 MB left)
Expand
FOOD_LAB_DB.sql
3 MB
wenD'go — 02/08/2022
track
-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2022 at 03:44 PM
Expand
m_ad_track.sql
3 KB
coincharge message
-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2022 at 03:44 PM
Expand
m_ad_coincharge_message.sql
3 KB
Deathnote — 02/11/2022
https://we.tl/t-T4t0wZxJlP
Web Development I + II.pdf
1 file sent via WeTransfer, the simplest way to send your files around the world
Image
Deathnote — 02/13/2022
-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 13, 2022 at 03:19 PM... (3 MB left)
Expand
FOOD_LAB_DB_1.sql
3 MB
Deathnote — 02/13/2022
https://stackoverflow.com/questions/32372978/how-can-we-run-if-else-statement-inside-jquery-append-function
Stack Overflow
How can we run If else statement inside JQuery Append Function.?
This is my append function i want to run the if else statement inside this. The data is coming in the json format.

$('#allproduct')
.append('
<div class="add-to-cart">'+if(item.quant...
Image
Deathnote — 02/17/2022
https://discord.gg/QvPFHPqC
Deathnote — 02/17/2022
Daily Commit
Note Review
Check Other Review
Deathnote — 02/17/2022
-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 17, 2022 at 04:32 PM... (2 MB left)
Expand
FOOD_LAB_DB.sql
2 MB
Deathnote — Yesterday at 8:38 PM
-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 23, 2022 at 11:27 AM... (28 KB left)
Expand
FOOD_LAB_DB_2.sql
78 KB
﻿
-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 23, 2022 at 11:27 AM
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
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_ad_coincharge_message`
--

CREATE TABLE `m_ad_coincharge_message` (
  `id` bigint(20) NOT NULL COMMENT 'Row of id',
  `title` varchar(128) NOT NULL COMMENT 'Title of message',
  `detail` varchar(255) DEFAULT NULL COMMENT 'Detail of message',
  `charge_id` bigint(20) NOT NULL COMMENT 'Coin Charge Id',
  `seen` int(11) NOT NULL DEFAULT 0 COMMENT 'User Seen or not.0:not seen,1:seen',
  `del_flg` int(11) NOT NULL DEFAULT 0 COMMENT 'Deleted or not',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Created Timestamp',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'Updated Timestamp'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_ad_coincharge_message`
--

INSERT INTO `m_ad_coincharge_message` (`id`, `title`, `detail`, `charge_id`, `seen`, `del_flg`, `created_at`, `updated_at`) VALUES
(9, 'APPROVED', 'Your Payment Was Accepted By Admin.We Charged to Your Wallet ', 21015, 0, 0, '2022-02-17 14:57:30', '2022-02-17 14:57:30'),
(10, 'WAITING', 'Your Payment is Waiting List.', 21015, 0, 0, '2022-02-17 14:57:55', '2022-02-17 14:57:55'),
(11, 'APPROVED', 'Your Payment Was Accepted By Admin.We Charged to Your Wallet ', 21015, 0, 0, '2022-02-20 04:31:59', '2022-02-20 04:31:59'),
(12, 'APPROVED', 'Your Payment Was Accepted By Admin.We Charged to Your Wallet ', 21016, 0, 0, '2022-02-21 13:32:30', '2022-02-21 13:32:30'),
(13, 'APPROVED', 'Your Payment Was Accepted By Admin.We Charged to Your Wallet ', 21017, 0, 0, '2022-02-21 14:51:42', '2022-02-21 14:51:42'),
(14, 'APPROVED', 'Your Payment Was Accepted By Admin.We Charged to Your Wallet ', 21018, 0, 0, '2022-02-21 15:49:23', '2022-02-21 15:49:23');

-- --------------------------------------------------------

--
-- Table structure for table `m_ad_coinrate`
--

CREATE TABLE `m_ad_coinrate` (
  `id` bigint(20) NOT NULL COMMENT 'ID of Row',
  `base` int(11) NOT NULL COMMENT 'Base on coin',
  `rate` int(11) NOT NULL COMMENT 'Rate',
  `del_flg` int(11) NOT NULL DEFAULT 0 COMMENT 'Deleted Or Not',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Created Timestamp',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'Updated TimeStamp'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_ad_coinrate`
--

INSERT INTO `m_ad_coinrate` (`id`, `base`, `rate`, `del_flg`, `created_at`, `updated_at`) VALUES
(2, 1, 2000, 0, '2022-01-17 00:40:40', '2022-02-04 15:31:21');

-- --------------------------------------------------------

--
-- Table structure for table `m_ad_login`
--

CREATE TABLE `m_ad_login` (
  `id` bigint(20) NOT NULL COMMENT 'Id of Row',
  `ad_name` varchar(128) NOT NULL COMMENT 'Name',
  `ad_password` varchar(128) NOT NULL COMMENT 'Password',
  `ad_role` varchar(2) NOT NULL COMMENT 'Role',
  `ad_valid` int(11) NOT NULL DEFAULT 0 COMMENT 'Valid or not',
  `ad_login_dt` timestamp NULL DEFAULT NULL COMMENT 'Last Login Time',
  `del_flg` int(11) NOT NULL DEFAULT 0 COMMENT 'Deleted or not',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Created TimeStamp',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'Updated TimeStamp'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_ad_login`
--

INSERT INTO `m_ad_login` (`id`, `ad_name`, `ad_password`, `ad_role`, `ad_valid`, `ad_login_dt`, `del_flg`, `created_at`, `updated_at`) VALUES
(1, 'Linnkoko', 'a13590babfdae56c1f5cfd70e3dbe5e2', 'SA', 1, '2022-02-21 15:45:18', 0, '2022-01-14 04:02:37', '2022-02-21 15:45:18'),
(2, 'Linnkoko', 'linnkoko', 'AD', 1, '2022-01-14 09:03:54', 0, '2022-01-14 09:03:54', '2022-01-14 09:03:54'),
(4, 'Deathnote', '4970977684273c91192581440562bb69', 'SA', 1, '2022-02-04 06:28:34', 0, '2022-02-04 06:28:26', '2022-02-04 06:28:34');

-- --------------------------------------------------------

--
-- Table structure for table `m_ad_news`
--

CREATE TABLE `m_ad_news` (
  `id` bigint(20) NOT NULL COMMENT 'ID of Row',
  `title` varchar(255) NOT NULL COMMENT 'Title of news',
  `detail` varchar(255) DEFAULT NULL COMMENT 'Detail of news',
  `source` varchar(255) DEFAULT NULL COMMENT 'Path of image',
  `category` int(11) NOT NULL COMMENT 'Category New',
  `write_by` bigint(20) NOT NULL COMMENT 'Write By',
  `public` int(11) NOT NULL COMMENT '''0:show ,1:hide',
  `del_flg` int(11) NOT NULL DEFAULT 0 COMMENT 'Deleted or not',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Created TimeStamp',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'Updated TimeStamp'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_ad_news`
--

INSERT INTO `m_ad_news` (`id`, `title`, `detail`, `source`, `category`, `write_by`, `public`, `del_flg`, `created_at`, `updated_at`) VALUES
(1, 'Add news', 'detail', 'IMG_1402.jpg', 2, 1, 0, 0, '2022-01-16 05:02:02', '2022-01-16 05:02:02'),
(2, 'Alert OMICROM Covid', 'Care Covid 19', '6.jpg', 2, 1, 0, 0, '2022-02-06 07:08:34', '2022-02-06 07:08:34'),
(3, 'Testing', ';sdfjhsdlkfgjhs;dfghsp;ofgh;ofghsd;fghdpsgofih', 'greenenv.jpg', 3, 1, 0, 0, '2022-02-15 12:00:13', '2022-02-15 12:00:13');

-- --------------------------------------------------------

--
-- Table structure for table `m_ad_track`
--

CREATE TABLE `m_ad_track` (
  `id` bigint(20) NOT NULL COMMENT 'Row Of id',
  `title` varchar(255) NOT NULL COMMENT 'Title of Message',
  `detail` varchar(255) DEFAULT NULL COMMENT 'Detail of Message',
  `order_id` bigint(20) NOT NULL COMMENT 'Order Id',
  `seen` int(11) NOT NULL DEFAULT 0,
  `del_flg` int(11) NOT NULL DEFAULT 0 COMMENT 'Deleted Or Not',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Created Timestamp',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'Updated Timestamp'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `m_cu_customer_login`
--

CREATE TABLE `m_cu_customer_login` (
  `id` int(11) NOT NULL COMMENT 'ID of Row',
  `email` varchar(128) NOT NULL COMMENT 'Email',
  `password` varchar(40) NOT NULL COMMENT 'Password',
  `verify` int(11) NOT NULL DEFAULT 0 COMMENT 'verify or not',
  `verify_code` varchar(128) NOT NULL COMMENT 'verify code',
  `customer_id` bigint(20) NOT NULL COMMENT 'customer id',
  `last_login_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'last login time',
  `del_flg` int(11) NOT NULL DEFAULT 0 COMMENT 'deleted or not',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'created timestamp',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'updated timestamp'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_cu_customer_login`
--

INSERT INTO `m_cu_customer_login` (`id`, `email`, `password`, `verify`, `verify_code`, `customer_id`, `last_login_time`, `del_flg`, `created_at`, `updated_at`) VALUES
(1, 'linnkoko113@gmail.com', '693cfed9dd8adf7c63afbf53cf3a8043', 1, '113019', 1, '2022-02-04 16:56:36', 0, '2022-01-23 08:23:15', NULL),
(2, 'linnkoko1130@gmail.com', '693cfed9dd8adf7c63afbf53cf3a8043', 1, 'fnjx908TJer1ZTX6zQK2wP3pVFlB06zeKYpU49KKrzjjNXAxe9dUTdjPEQazSA5QKMabQ6KusAAXS3ujnhxPW74D9hd4vAfaDHf2OhXtPECajjp5vL8HxNMVhC9jNAxl', 22, '2022-02-04 15:54:47', 0, '2022-02-04 15:54:34', '2022-02-04 15:54:34'),
(3, 'exbraineducation1130@gmail.com', '8843028fefce50a6de50acdf064ded27', 0, 'WWO1TnEakglvxHAEx7Ft85CXjxl37Ub03pCEA2U0JFN32yBImpGcixQK3uFRg3RbDGHv9ieXvvft8cD13tLTJ8nlV3ttra1SvONlbW4MdR4ovLZ9iwwFb6Zshrmp5tqu', 23, '2022-02-13 16:52:17', 0, '2022-02-13 16:52:17', '2022-02-13 16:52:17'),
(4, 'dfsgfsg@gmail.com', '8843028fefce50a6de50acdf064ded27', 0, 'iX07tnlSfEydvg1XsvClJaCyxmsMBMVY8fxnNIJYtGFWi8E9dtJpRDne9LfohTSbhv6hhRikTbRr7wh65krzQMaLZijmGOahrkEkBgIi4GewiYpJZMNiXi6PvaSdcF5J', 24, '2022-02-13 16:54:15', 0, '2022-02-13 16:54:15', '2022-02-13 16:54:15'),
(5, 'dfsgfsgttrt@gmail.com', '8843028fefce50a6de50acdf064ded27', 0, 'yj7q9tqMqaZHrSht1agfxrs2Q1LUBoOIo6kEfI2QhV4j0WPfwGNEzv6paSKOuFeJX25xIesw5vX4gvrv7uv0jRi0X7HBRnctIUiOWMC18uT45JrLoxwuHztoaEoMIkX5', 25, '2022-02-13 16:56:31', 0, '2022-02-13 16:56:31', '2022-02-13 16:56:31');

-- --------------------------------------------------------

--
-- Table structure for table `m_decision_status`
--

CREATE TABLE `m_decision_status` (
  `id` bigint(20) NOT NULL,
  `status` varchar(255) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `del_flg` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_decision_status`
--

INSERT INTO `m_decision_status` (`id`, `status`, `note`, `del_flg`, `created_at`, `updated_at`) VALUES
(1, 'Request', 'Request Coin From Customer', 0, '2022-01-10 07:02:37', '2022-01-10 12:25:42'),
(2, 'Approve', 'Approve Coin From Admin', 0, '2022-01-10 07:03:14', '2022-01-10 12:25:42'),
(3, 'Waiting', 'Waiting Decision In Admin', 0, '2022-01-10 07:03:42', '2022-01-10 12:25:42'),
(4, 'Reject', 'Reject Coin Request From Admin', 0, '2022-01-10 07:04:01', '2022-01-10 12:25:42');

-- --------------------------------------------------------

--
-- Table structure for table `m_fav_type`
--

CREATE TABLE `m_fav_type` (
  `id` bigint(20) NOT NULL,
  `favourite_food` varchar(255) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `del_flg` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_fav_type`
--

INSERT INTO `m_fav_type` (`id`, `favourite_food`, `note`, `del_flg`, `created_at`, `updated_at`) VALUES
(1, 'Chinese Food', 'Chinese Food', 0, '2022-01-10 07:05:53', '2022-01-10 12:25:42'),
(2, 'Burmese Food', 'Burmese Food', 0, '2022-01-10 07:06:08', '2022-01-10 12:25:42'),
(3, 'Korean Food', 'Korean Food', 0, '2022-01-10 07:06:22', '2022-01-10 12:25:42'),
(4, 'Thai Food', 'Thai Food', 0, '2022-01-10 07:06:30', '2022-01-10 12:25:42'),
(5, 'Japanese Food', 'Japanese Food', 0, '2022-01-10 07:06:43', '2022-01-10 12:25:42');

-- --------------------------------------------------------

--
-- Table structure for table `m_news_category`
--

CREATE TABLE `m_news_category` (
  `id` bigint(20) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `del_flg` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_news_category`
--

INSERT INTO `m_news_category` (`id`, `category_name`, `note`, `del_flg`, `created_at`, `updated_at`) VALUES
(1, 'Food', 'Food Blog', 0, '2022-01-10 07:07:20', '2022-01-10 12:25:42'),
(2, 'Health', 'Healthy Blog', 0, '2022-01-10 07:07:38', '2022-01-10 12:25:42'),
(3, 'Promotion', 'Promotion News', 0, '2022-01-10 07:07:53', '2022-01-10 12:25:42'),
(4, 'Social', 'Social Media News', 0, '2022-01-10 07:08:10', '2022-01-10 12:25:42'),
(5, 'Other', 'Other', 0, '2022-01-10 07:08:23', '2022-01-10 12:25:42');

-- --------------------------------------------------------

--
-- Table structure for table `m_order_status`
--

CREATE TABLE `m_order_status` (
  `id` bigint(20) NOT NULL,
  `status` varchar(255) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `del_flg` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_order_status`
--

INSERT INTO `m_order_status` (`id`, `status`, `note`, `del_flg`, `created_at`, `updated_at`) VALUES
(1, 'Request', 'Request From Customer', 0, '2022-01-10 00:32:37', '2022-01-10 12:25:42'),
(2, 'Cancel', 'Cancel From Customer', 0, '2022-01-10 00:33:14', '2022-01-10 12:25:42'),
(3, 'Confirm', 'Order Confirm From Kitchen', 0, '2022-01-10 00:33:42', '2022-01-10 12:25:42'),
(4, 'Reject', 'Reject From Kitchen', 0, '2022-01-10 00:34:01', '2022-01-10 12:25:42'),
(5, 'Preparing', 'Prepare From Kitchen', 0, '2022-01-10 00:34:31', '2022-01-10 12:25:42'),
(6, 'Delivery', 'Delivey To Customer', 0, '2022-01-10 00:34:57', '2022-01-10 12:25:42'),
(7, 'Completed', 'Order Complete', 0, '2022-01-10 00:35:17', '2022-01-10 12:25:42');

-- --------------------------------------------------------

--
-- Table structure for table `m_payment`
--

CREATE TABLE `m_payment` (
  `id` bigint(20) NOT NULL,
  `payment_name` varchar(255) NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `del_flg` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_payment`
--

INSERT INTO `m_payment` (`id`, `payment_name`, `account_name`, `note`, `del_flg`, `created_at`, `updated_at`) VALUES
(1, 'Kpay', '09421010111', 'Kpay Account', 0, '2022-01-10 07:00:37', '2022-01-10 12:25:42'),
(2, 'CB', '0086-2322-22323-2222', 'CB Bank Account', 0, '2022-01-10 07:01:06', '2022-01-10 12:25:42'),
(3, 'AYA', '0086-1111-1111-1111', 'AYA Bank Account', 0, '2022-01-10 07:01:32', '2022-01-10 12:25:42'),
(4, 'KBZ', '0086-3333-3333-3333', 'KBZ Bank Account', 0, '2022-01-10 07:01:54', '2022-01-10 12:25:42');

-- --------------------------------------------------------

--
-- Table structure for table `m_product`
--

CREATE TABLE `m_product` (
  `id` bigint(20) NOT NULL COMMENT 'ID of Row',
  `product_name` varchar(255) NOT NULL COMMENT 'Prouduct Name',
  `product_type` int(11) NOT NULL COMMENT 'Types of Product',
  `product_taste` int(11) NOT NULL COMMENT 'Taste of Product',
  `coin` int(11) NOT NULL COMMENT 'Product coin value',
  `amount` int(11) NOT NULL COMMENT 'Amount Of Prouduct',
  `list` varchar(255) NOT NULL COMMENT 'Ingredient List',
  `description` varchar(255) NOT NULL COMMENT 'Product Description',
  `avaliable` int(11) NOT NULL COMMENT 'Avaliable or not',
  `del_flg` int(11) NOT NULL DEFAULT 0 COMMENT 'Deleted or not',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Created Timestamp',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'Updated Timestamp'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_product`
--

INSERT INTO `m_product` (`id`, `product_name`, `product_type`, `product_taste`, `coin`, `amount`, `list`, `description`, `avaliable`, `del_flg`, `created_at`, `updated_at`) VALUES
(10, 'Hot pot', 1, 1, 6, 12000, 'chill', 'Good taste', 1, 0, '2022-01-30 13:02:49', '2022-02-21 15:47:06'),
(11, 'mala', 1, 1, 23, 46000, 'Good', 'Good', 1, 0, '2022-02-06 12:11:00', '2022-02-06 12:11:00'),
(12, 'Tea', 1, 1, 1, 2000, 'Tea', 'Tea', 1, 0, '2022-02-06 12:11:59', '2022-02-06 12:11:59'),
(13, 'sdsdff', 1, 1, 1, 2000, 'sdfsdf', 'dfsdf', 1, 0, '2022-02-07 09:08:10', '2022-02-07 13:36:55'),
(14, 'weewewr', 1, 1, 11, 22000, 'sdfsdf', 'sdfdf', 1, 0, '2022-02-07 09:09:40', '2022-02-07 09:09:40'),
(15, 'sffwewe', 1, 1, 1, 2000, 'dfsdf', 'dfsdf', 1, 0, '2022-02-07 09:10:02', '2022-02-07 15:14:49');

-- --------------------------------------------------------

--
-- Table structure for table `m_product_detail`
--

CREATE TABLE `m_product_detail` (
  `id` bigint(20) NOT NULL COMMENT 'ID of Row',
  `product_id` bigint(20) NOT NULL COMMENT 'Product Id',
  `category` int(11) NOT NULL COMMENT 'Show Case Category',
  `label` varchar(20) NOT NULL COMMENT 'Label Name',
  `order` int(11) NOT NULL COMMENT 'Order',
  `value` varchar(20) NOT NULL COMMENT 'Value',
  `del_flg` int(11) NOT NULL DEFAULT 0 COMMENT 'Deleted or not',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Created Timestamp',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'Updated Timestamp'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_product_detail`
--

INSERT INTO `m_product_detail` (`id`, `product_id`, `category`, `label`, `order`, `value`, `del_flg`, `created_at`, `updated_at`) VALUES
(93, 10, 1, 'Meal', 1, 'chicken', 1, '2022-01-30 13:02:49', '2022-02-21 15:47:06'),
(94, 10, 1, 'Meal', 2, 'pork', 1, '2022-01-30 13:02:49', '2022-02-21 15:47:06'),
(95, 10, 1, 'Meal', 3, 'beef', 1, '2022-01-30 13:02:49', '2022-02-21 15:47:06'),
(96, 10, 1, 'Meal', 4, 'sea food', 1, '2022-01-30 13:02:49', '2022-02-21 15:47:06'),
(97, 10, 2, 'Other', 1, 'Egg', 1, '2022-01-30 13:02:49', '2022-02-21 15:47:06'),
(98, 10, 2, 'Other', 2, 'mushrom', 1, '2022-01-30 13:02:49', '2022-02-21 15:47:06'),
(99, 10, 2, 'Other', 3, 'tomato', 1, '2022-01-30 13:02:49', '2022-02-21 15:47:06'),
(100, 10, 1, 'Meal', 1, 'chicken', 1, '2022-01-30 13:04:45', '2022-02-21 15:47:06'),
(101, 10, 1, 'Meal', 2, 'pork', 1, '2022-01-30 13:04:45', '2022-02-21 15:47:06'),
(102, 10, 1, 'Meal', 3, 'beef', 1, '2022-01-30 13:04:45', '2022-02-21 15:47:06'),
(103, 10, 1, 'Meal', 4, 'sea food', 1, '2022-01-30 13:04:45', '2022-02-21 15:47:06'),
(104, 10, 2, 'Other', 1, 'Egg', 1, '2022-01-30 13:04:45', '2022-02-21 15:47:06'),
(105, 10, 2, 'Other', 2, 'mushrom', 1, '2022-01-30 13:04:45', '2022-02-21 15:47:06'),
(106, 10, 2, 'Other', 3, 'tomato', 1, '2022-01-30 13:04:45', '2022-02-21 15:47:06'),
(107, 10, 1, 'Vegatable', 1, 'Green', 1, '2022-01-30 13:04:45', '2022-02-21 15:47:06'),
(108, 10, 1, 'Vegatable', 2, 'red', 1, '2022-01-30 13:04:45', '2022-02-21 15:47:06'),
(109, 10, 1, 'Meal', 1, 'chicken', 1, '2022-01-30 13:05:54', '2022-02-21 15:47:06'),
(110, 10, 1, 'Meal', 2, 'pork', 1, '2022-01-30 13:05:54', '2022-02-21 15:47:06'),
(111, 10, 1, 'Meal', 3, 'beef', 1, '2022-01-30 13:05:54', '2022-02-21 15:47:06'),
(112, 10, 1, 'Meal', 4, 'sea food', 1, '2022-01-30 13:05:54', '2022-02-21 15:47:06'),
(113, 10, 1, 'Vegatable', 1, 'Green', 1, '2022-01-30 13:05:54', '2022-02-21 15:47:06'),
(114, 10, 1, 'Vegatable', 2, 'red', 1, '2022-01-30 13:05:54', '2022-02-21 15:47:06'),
(115, 10, 1, 'a', 1, 'f', 1, '2022-01-30 14:01:50', '2022-02-21 15:47:06'),
(116, 10, 1, 'a', 2, 'v', 1, '2022-01-30 14:01:50', '2022-02-21 15:47:06'),
(117, 10, 1, 'a', 3, 'b', 1, '2022-01-30 14:01:50', '2022-02-21 15:47:06'),
(118, 10, 1, 'a', 4, 'n', 1, '2022-01-30 14:01:50', '2022-02-21 15:47:06'),
(119, 10, 1, 'A kyaw', 1, 'bean', 1, '2022-01-31 05:36:22', '2022-02-21 15:47:06'),
(120, 10, 1, 'A kyaw', 2, 'egg', 1, '2022-01-31 05:36:22', '2022-02-21 15:47:06'),
(121, 10, 1, 'A kyaw', 3, 'nothing', 1, '2022-01-31 05:36:22', '2022-02-21 15:47:06'),
(122, 10, 2, 'A po', 1, 'chill', 1, '2022-01-31 05:36:22', '2022-02-21 15:47:06'),
(123, 10, 2, 'A po', 2, 'Lemon', 1, '2022-01-31 05:36:22', '2022-02-21 15:47:06'),
(124, 10, 2, 'A po', 3, 'Nananpin', 1, '2022-01-31 05:36:22', '2022-02-21 15:47:06'),
(125, 10, 1, 'Something', 1, 'Noodle', 1, '2022-01-31 05:36:22', '2022-02-21 15:47:06'),
(126, 10, 1, 'Something', 2, 'Kyarsan', 1, '2022-01-31 05:36:22', '2022-02-21 15:47:06'),
(127, 10, 1, 'Soup', 1, 'Chicken', 1, '2022-01-31 05:36:22', '2022-02-21 15:47:06'),
(128, 10, 1, 'Soup', 2, 'pork', 1, '2022-01-31 05:36:22', '2022-02-21 15:47:06'),
(129, 10, 1, 'Soup', 3, 'beef', 1, '2022-01-31 05:36:22', '2022-02-21 15:47:06'),
(130, 10, 2, 'Additional', 1, 'Leaf', 1, '2022-01-31 05:36:22', '2022-02-21 15:47:06'),
(131, 10, 2, 'Additional', 2, 'Grogorli', 1, '2022-01-31 05:36:22', '2022-02-21 15:47:06'),
(132, 10, 2, 'Additional1', 1, 'Leaf2', 1, '2022-01-31 05:36:22', '2022-02-21 15:47:06'),
(133, 10, 2, 'Additional1', 2, 'Leaf3', 1, '2022-01-31 05:36:22', '2022-02-21 15:47:06'),
(134, 10, 2, 'Additional1', 3, 'Leaf4', 1, '2022-01-31 05:36:22', '2022-02-21 15:47:06'),
(135, 10, 1, 'A kyaw', 1, 'bean', 1, '2022-02-07 13:36:51', '2022-02-21 15:47:06'),
(136, 10, 1, 'A kyaw', 2, 'egg', 1, '2022-02-07 13:36:51', '2022-02-21 15:47:06'),
(137, 10, 1, 'A kyaw', 3, 'nothing', 1, '2022-02-07 13:36:51', '2022-02-21 15:47:06'),
(138, 10, 2, 'A po', 1, 'Nananpin', 1, '2022-02-07 13:36:51', '2022-02-21 15:47:06'),
(139, 10, 2, 'A po', 2, 'Lemon', 1, '2022-02-07 13:36:51', '2022-02-21 15:47:06'),
(140, 10, 2, 'A po', 3, 'chill', 1, '2022-02-07 13:36:51', '2022-02-21 15:47:06'),
(141, 10, 1, 'Something', 1, 'Kyarsan', 1, '2022-02-07 13:36:51', '2022-02-21 15:47:06'),
(142, 10, 1, 'Something', 2, 'Noodle', 1, '2022-02-07 13:36:51', '2022-02-21 15:47:06'),
(143, 10, 1, 'Soup', 1, 'beef', 1, '2022-02-07 13:36:51', '2022-02-21 15:47:06'),
(144, 10, 1, 'Soup', 2, 'pork', 1, '2022-02-07 13:36:51', '2022-02-21 15:47:06'),
(145, 10, 1, 'Soup', 3, 'Chicken', 1, '2022-02-07 13:36:51', '2022-02-21 15:47:06'),
(146, 10, 2, 'Additional', 1, 'Grogorli', 1, '2022-02-07 13:36:51', '2022-02-21 15:47:06'),
(147, 10, 2, 'Additional', 2, 'Leaf', 1, '2022-02-07 13:36:51', '2022-02-21 15:47:06'),
(148, 10, 2, 'Additional1', 1, 'Leaf3', 1, '2022-02-07 13:36:51', '2022-02-21 15:47:06'),
(149, 10, 2, 'Additional1', 2, 'Leaf2', 1, '2022-02-07 13:36:51', '2022-02-21 15:47:06'),
(150, 10, 2, 'Additional1', 3, 'Leaf4', 1, '2022-02-07 13:36:51', '2022-02-21 15:47:06'),
(151, 10, 1, 'A kyaw', 1, 'bean', 1, '2022-02-13 15:51:09', '2022-02-21 15:47:06'),
(152, 10, 1, 'A kyaw', 2, 'egg', 1, '2022-02-13 15:51:09', '2022-02-21 15:47:06'),
(153, 10, 1, 'A kyaw', 3, 'nothing', 1, '2022-02-13 15:51:09', '2022-02-21 15:47:06'),
(154, 10, 2, 'A po', 1, 'chill', 1, '2022-02-13 15:51:09', '2022-02-21 15:47:06'),
(155, 10, 2, 'A po', 2, 'Lemon', 1, '2022-02-13 15:51:09', '2022-02-21 15:47:06'),
(156, 10, 2, 'A po', 3, 'Nananpin', 1, '2022-02-13 15:51:09', '2022-02-21 15:47:06'),
(157, 10, 1, 'Something', 1, 'Noodle', 1, '2022-02-13 15:51:09', '2022-02-21 15:47:06'),
(158, 10, 1, 'Something', 2, 'Kyarsan', 1, '2022-02-13 15:51:09', '2022-02-21 15:47:06'),
(159, 10, 1, 'Soup', 1, 'Chicken', 1, '2022-02-13 15:51:09', '2022-02-21 15:47:06'),
(160, 10, 1, 'Soup', 2, 'pork', 1, '2022-02-13 15:51:09', '2022-02-21 15:47:06'),
(161, 10, 1, 'Soup', 3, 'beef', 1, '2022-02-13 15:51:09', '2022-02-21 15:47:06'),
(162, 10, 2, 'Additional', 1, 'Leaf', 1, '2022-02-13 15:51:09', '2022-02-21 15:47:06'),
(163, 10, 2, 'Additional', 2, 'Grogorli', 1, '2022-02-13 15:51:09', '2022-02-21 15:47:06'),
(164, 10, 2, 'Additional1', 1, 'Leaf2', 1, '2022-02-13 15:51:09', '2022-02-21 15:47:06'),
(165, 10, 2, 'Additional1', 2, 'Leaf3', 1, '2022-02-13 15:51:09', '2022-02-21 15:47:06'),
(166, 10, 2, 'Additional1', 3, 'Leaf4', 1, '2022-02-13 15:51:09', '2022-02-21 15:47:06'),
(167, 10, 1, 'A kyaw', 1, 'bean', 1, '2022-02-20 05:54:23', '2022-02-21 15:47:06'),
(168, 10, 1, 'A kyaw', 2, 'egg', 1, '2022-02-20 05:54:23', '2022-02-21 15:47:06'),
(169, 10, 1, 'A kyaw', 3, 'nothing', 1, '2022-02-20 05:54:23', '2022-02-21 15:47:06'),
(170, 10, 2, 'A po', 1, 'Nananpin', 1, '2022-02-20 05:54:23', '2022-02-21 15:47:06'),
(171, 10, 2, 'A po', 2, 'Lemon', 1, '2022-02-20 05:54:23', '2022-02-21 15:47:06'),
(172, 10, 2, 'A po', 3, 'chill', 1, '2022-02-20 05:54:23', '2022-02-21 15:47:06'),
(173, 10, 1, 'Something', 1, 'Kyarsan', 1, '2022-02-20 05:54:23', '2022-02-21 15:47:06'),
(174, 10, 1, 'Something', 2, 'Noodle', 1, '2022-02-20 05:54:23', '2022-02-21 15:47:06'),
(175, 10, 1, 'Soup', 1, 'beef', 1, '2022-02-20 05:54:23', '2022-02-21 15:47:06'),
(176, 10, 1, 'Soup', 2, 'pork', 1, '2022-02-20 05:54:23', '2022-02-21 15:47:06'),
(177, 10, 1, 'Soup', 3, 'Chicken', 1, '2022-02-20 05:54:23', '2022-02-21 15:47:06'),
(178, 10, 2, 'Additional', 1, 'Grogorli', 1, '2022-02-20 05:54:23', '2022-02-21 15:47:06'),
(179, 10, 2, 'Additional', 2, 'Leaf', 1, '2022-02-20 05:54:23', '2022-02-21 15:47:06'),
(180, 10, 2, 'Additional1', 1, 'Leaf3', 1, '2022-02-20 05:54:23', '2022-02-21 15:47:06'),
(181, 10, 2, 'Additional1', 2, 'Leaf2', 1, '2022-02-20 05:54:23', '2022-02-21 15:47:06'),
(182, 10, 2, 'Additional1', 3, 'Leaf4', 1, '2022-02-20 05:54:23', '2022-02-21 15:47:06'),
(183, 10, 1, 'A kyaw', 1, 'bean', 1, '2022-02-20 06:00:42', '2022-02-21 15:47:06'),
(184, 10, 1, 'A kyaw', 2, 'egg', 1, '2022-02-20 06:00:42', '2022-02-21 15:47:06'),
(185, 10, 1, 'A kyaw', 3, 'nothing', 1, '2022-02-20 06:00:42', '2022-02-21 15:47:06'),
(186, 10, 2, 'A po', 1, 'chill', 1, '2022-02-20 06:00:42', '2022-02-21 15:47:06'),
(187, 10, 2, 'A po', 2, 'Lemon', 1, '2022-02-20 06:00:42', '2022-02-21 15:47:06'),
(188, 10, 2, 'A po', 3, 'Nananpin', 1, '2022-02-20 06:00:42', '2022-02-21 15:47:06'),
(189, 10, 1, 'Something', 1, 'Noodle', 1, '2022-02-20 06:00:42', '2022-02-21 15:47:06'),
(190, 10, 1, 'Something', 2, 'Kyarsan', 1, '2022-02-20 06:00:42', '2022-02-21 15:47:06'),
(191, 10, 1, 'Soup', 1, 'Chicken', 1, '2022-02-20 06:00:42', '2022-02-21 15:47:06'),
(192, 10, 1, 'Soup', 2, 'pork', 1, '2022-02-20 06:00:42', '2022-02-21 15:47:06'),
(193, 10, 1, 'Soup', 3, 'beef', 1, '2022-02-20 06:00:42', '2022-02-21 15:47:06'),
(194, 10, 2, 'Additional', 1, 'Leaf', 1, '2022-02-20 06:00:42', '2022-02-21 15:47:06'),
(195, 10, 2, 'Additional', 2, 'Grogorli', 1, '2022-02-20 06:00:42', '2022-02-21 15:47:06'),
(196, 10, 2, 'Additional1', 1, 'Leaf2', 1, '2022-02-20 06:00:42', '2022-02-21 15:47:06'),
(197, 10, 2, 'Additional1', 2, 'Leaf3', 1, '2022-02-20 06:00:42', '2022-02-21 15:47:06'),
(198, 10, 2, 'Additional1', 3, 'Leaf4', 1, '2022-02-20 06:00:42', '2022-02-21 15:47:06'),
(199, 10, 1, 'A kyaw', 1, 'bean', 1, '2022-02-21 15:04:12', '2022-02-21 15:47:06'),
(200, 10, 1, 'A kyaw', 2, 'egg', 1, '2022-02-21 15:04:12', '2022-02-21 15:47:06'),
(201, 10, 1, 'A kyaw', 3, 'nothing', 1, '2022-02-21 15:04:12', '2022-02-21 15:47:06'),
(202, 10, 2, 'A po', 1, 'Nananpin', 1, '2022-02-21 15:04:12', '2022-02-21 15:47:06'),
(203, 10, 2, 'A po', 2, 'Lemon', 1, '2022-02-21 15:04:12', '2022-02-21 15:47:06'),
(204, 10, 2, 'A po', 3, 'chill', 1, '2022-02-21 15:04:12', '2022-02-21 15:47:06'),
(205, 10, 1, 'Something', 1, 'Kyarsan', 1, '2022-02-21 15:04:12', '2022-02-21 15:47:06'),
(206, 10, 1, 'Something', 2, 'Noodle', 1, '2022-02-21 15:04:12', '2022-02-21 15:47:06'),
(207, 10, 1, 'Soup', 1, 'beef', 1, '2022-02-21 15:04:12', '2022-02-21 15:47:06'),
(208, 10, 1, 'Soup', 2, 'pork', 1, '2022-02-21 15:04:12', '2022-02-21 15:47:06'),
(209, 10, 1, 'Soup', 3, 'Chicken', 1, '2022-02-21 15:04:12', '2022-02-21 15:47:06'),
(210, 10, 2, 'Additional', 1, 'Grogorli', 1, '2022-02-21 15:04:12', '2022-02-21 15:47:06'),
(211, 10, 2, 'Additional', 2, 'Leaf', 1, '2022-02-21 15:04:12', '2022-02-21 15:47:06'),
(212, 10, 2, 'Additional1', 1, 'Leaf3', 1, '2022-02-21 15:04:12', '2022-02-21 15:47:06'),
(213, 10, 2, 'Additional1', 2, 'Leaf2', 1, '2022-02-21 15:04:12', '2022-02-21 15:47:06'),
(214, 10, 2, 'Additional1', 3, 'Leaf4', 1, '2022-02-21 15:04:12', '2022-02-21 15:47:06'),
(215, 10, 1, 'A kyaw', 1, 'bean', 0, '2022-02-21 15:47:06', '2022-02-21 15:47:06'),
(216, 10, 1, 'A kyaw', 2, 'egg', 0, '2022-02-21 15:47:06', '2022-02-21 15:47:06'),
(217, 10, 1, 'A kyaw', 3, 'nothing', 0, '2022-02-21 15:47:06', '2022-02-21 15:47:06'),
(218, 10, 2, 'A po', 1, 'chill', 0, '2022-02-21 15:47:06', '2022-02-21 15:47:06'),
(219, 10, 2, 'A po', 2, 'Lemon', 0, '2022-02-21 15:47:06', '2022-02-21 15:47:06'),
(220, 10, 2, 'A po', 3, 'Nananpin', 0, '2022-02-21 15:47:06', '2022-02-21 15:47:06'),
(221, 10, 1, 'Something', 1, 'Noodle', 0, '2022-02-21 15:47:06', '2022-02-21 15:47:06'),
(222, 10, 1, 'Something', 2, 'Kyarsan', 0, '2022-02-21 15:47:06', '2022-02-21 15:47:06'),
(223, 10, 1, 'Soup', 1, 'Chicken', 0, '2022-02-21 15:47:06', '2022-02-21 15:47:06'),
(224, 10, 1, 'Soup', 2, 'pork', 0, '2022-02-21 15:47:06', '2022-02-21 15:47:06'),
(225, 10, 1, 'Soup', 3, 'beef', 0, '2022-02-21 15:47:06', '2022-02-21 15:47:06'),
(226, 10, 2, 'Additional', 1, 'Leaf', 0, '2022-02-21 15:47:06', '2022-02-21 15:47:06'),
(227, 10, 2, 'Additional', 2, 'Grogorli', 0, '2022-02-21 15:47:06', '2022-02-21 15:47:06'),
(228, 10, 2, 'Additional1', 1, 'Leaf2', 0, '2022-02-21 15:47:06', '2022-02-21 15:47:06'),
(229, 10, 2, 'Additional1', 2, 'Leaf3', 0, '2022-02-21 15:47:06', '2022-02-21 15:47:06'),
(230, 10, 2, 'Additional1', 3, 'Leaf4', 0, '2022-02-21 15:47:06', '2022-02-21 15:47:06');

-- --------------------------------------------------------

--
-- Table structure for table `m_site`
--

CREATE TABLE `m_site` (
  `id` bigint(20) NOT NULL,
  `site_name` varchar(255) NOT NULL,
  `site_logo` varchar(255) NOT NULL,
  `privacy_policy` varchar(255) NOT NULL,
  `maintenance` int(11) NOT NULL,
  `intro` varchar(255) NOT NULL,
  `phone1` varchar(30) NOT NULL,
  `phone2` varchar(30) DEFAULT NULL,
  `phone3` varchar(30) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `gmail` varchar(255) NOT NULL,
  `del_flg` int(11) NOT NULL DEFAULT 0,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_site`
--

INSERT INTO `m_site` (`id`, `site_name`, `site_logo`, `privacy_policy`, `maintenance`, `intro`, `phone1`, `phone2`, `phone3`, `address`, `gmail`, `del_flg`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Food_Lab', 'food-logo-design_139869-254.jpg', 'OKOOKOKOKOKOKOKOKOOKOKOKOKOKOKOKOKOKOKOK', 0, 'Welcome From Our Food LabWelcome From Our Food LabWelcome From Our Food LabWelcome From Our Food LabWelcome From Our Food LabWelcome From Our Food LabWelcome From Our Food LabWelcome From Our Food Lab', '09421010735', NULL, NULL, 'No123 Pyay Road, Yangon', 'foodlab@gmail.com', 0, 1, '2022-01-16 06:01:56', '2022-02-20 09:33:24');

-- --------------------------------------------------------

--
-- Table structure for table `m_state`
--

CREATE TABLE `m_state` (
  `id` bigint(20) NOT NULL COMMENT 'Row of Id',
  `state_name` varchar(255) NOT NULL COMMENT 'State',
  `note` varchar(255) DEFAULT NULL COMMENT 'note',
  `del_flg` int(11) NOT NULL DEFAULT 0 COMMENT 'Deleted or not',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Created TimeStamp',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'Updated TimeStamp'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_state`
--

INSERT INTO `m_state` (`id`, `state_name`, `note`, `del_flg`, `created_at`, `updated_at`) VALUES
(1, 'Yangon', 'Add', 0, '2022-01-24 14:46:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_suggest`
--

CREATE TABLE `m_suggest` (
  `id` bigint(20) NOT NULL,
  `suggest_type` varchar(255) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `del_flg` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_suggest`
--

INSERT INTO `m_suggest` (`id`, `suggest_type`, `note`, `del_flg`, `created_at`, `updated_at`) VALUES
(1, 'Cooking Quality', 'Suggest For Cooking Quality', 0, '2022-01-10 07:14:13', '2022-01-10 12:25:42'),
(2, 'Delivery', 'Suggest For Delivery', 0, '2022-01-10 07:14:32', '2022-01-10 12:25:42'),
(3, 'Website', 'Suggest For Website', 0, '2022-01-10 07:14:44', '2022-01-10 12:25:42'),
(4, 'Taste', 'Suggest For Taste', 0, '2022-01-10 07:14:55', '2022-01-10 12:25:42'),
(5, 'other', 'Suggest For Other', 0, '2022-01-10 07:15:15', '2022-01-10 12:25:42');

-- --------------------------------------------------------

--
-- Table structure for table `m_taste`
--

CREATE TABLE `m_taste` (
  `id` bigint(20) NOT NULL,
  `taste` varchar(255) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `del_flg` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_taste`
--

INSERT INTO `m_taste` (`id`, `taste`, `note`, `del_flg`, `created_at`, `updated_at`) VALUES
(1, 'Sweet', 'Sweet Taste', 0, '2022-01-10 07:15:35', '2022-01-10 12:25:42'),
(2, 'Spicy', 'Spicy Taste', 0, '2022-01-10 07:15:53', '2022-01-10 12:25:42');

-- --------------------------------------------------------

--
-- Table structure for table `m_township`
--

CREATE TABLE `m_township` (
  `id` bigint(20) NOT NULL,
  `township_name` varchar(255) NOT NULL,
  `state_id` bigint(20) NOT NULL,
  `delivery_price` int(11) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `del_flg` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_township`
--

INSERT INTO `m_township` (`id`, `township_name`, `state_id`, `delivery_price`, `note`, `del_flg`, `created_at`, `updated_at`) VALUES
(1, 'Thingangyun', 1, 2000, 'Add', 0, '2022-02-04 15:52:33', '2022-02-13 15:31:59');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_ad_coincharge`
--

CREATE TABLE `t_ad_coincharge` (
  `id` bigint(20) NOT NULL COMMENT 'ID OF Row',
  `customer_id` bigint(20) NOT NULL COMMENT 'Customer ID',
  `request_coin` int(11) NOT NULL COMMENT 'Customer Request Coin',
  `request_evd_ID` bigint(20) NOT NULL COMMENT 'Payment ScreenShot',
  `request_datetime` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Requested DateTime',
  `decision_status` int(11) NOT NULL COMMENT 'Status',
  `re_decision` int(11) NOT NULL DEFAULT 0 COMMENT 'Re-Decision or Not',
  `decision_by` bigint(20) DEFAULT NULL COMMENT 'Decision By',
  `del_flg` int(11) NOT NULL DEFAULT 0 COMMENT 'Deleted or not',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Created Timestamp',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'Updated Timestamp'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_ad_coincharge`
--

INSERT INTO `t_ad_coincharge` (`id`, `customer_id`, `request_coin`, `request_evd_ID`, `request_datetime`, `decision_status`, `re_decision`, `decision_by`, `del_flg`, `created_at`, `updated_at`) VALUES
(21015, 22, 20, 22, '2022-02-17 14:57:05', 2, 0, 1, 0, '2022-02-17 14:57:05', '2022-02-20 04:31:59'),
(21016, 22, 20, 23, '2022-02-21 13:28:36', 2, 0, 1, 0, '2022-02-21 13:28:36', '2022-02-21 13:32:30'),
(21017, 22, 20, 24, '2022-02-21 14:51:11', 2, 0, 1, 0, '2022-02-21 14:51:11', '2022-02-21 14:51:42'),
(21018, 22, 20, 25, '2022-02-21 15:48:15', 2, 0, 1, 0, '2022-02-21 15:48:15', '2022-02-21 15:49:23');

-- --------------------------------------------------------

--
-- Table structure for table `t_ad_coincharge_decision_history`
--

CREATE TABLE `t_ad_coincharge_decision_history` (
  `id` bigint(20) NOT NULL COMMENT 'ID of Row',
  `charge_id` bigint(20) NOT NULL COMMENT 'Coin Charge Id',
  `decision_by` bigint(20) NOT NULL COMMENT 'Decision By',
  `old_status` int(11) NOT NULL COMMENT 'Old Status',
  `new_status` int(11) NOT NULL COMMENT 'New Status',
  `note` varchar(255) DEFAULT NULL COMMENT 'Note By Admin',
  `del_flg` int(11) NOT NULL DEFAULT 0 COMMENT 'Deleted or not',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Created Timestamp',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'Updated Timestamp'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_ad_coincharge_decision_history`
--

INSERT INTO `t_ad_coincharge_decision_history` (`id`, `charge_id`, `decision_by`, `old_status`, `new_status`, `note`, `del_flg`, `created_at`, `updated_at`) VALUES
(55, 21015, 1, 1, 2, 'Approved', 0, '2022-02-17 14:57:30', '2022-02-17 14:57:30'),
(56, 21015, 1, 2, 3, 'Note', 0, '2022-02-17 14:57:55', '2022-02-17 14:57:55'),
(57, 21015, 1, 3, 2, 'OK', 0, '2022-02-20 04:31:59', '2022-02-20 04:31:59'),
(58, 21016, 1, 1, 2, 'We Approved', 0, '2022-02-21 13:32:30', '2022-02-21 13:32:30'),
(59, 21017, 1, 1, 2, 'Approved', 0, '2022-02-21 14:51:42', '2022-02-21 14:51:42'),
(60, 21018, 1, 1, 2, 'We Accept', 0, '2022-02-21 15:49:23', '2022-02-21 15:49:23');

-- --------------------------------------------------------

--
-- Table structure for table `t_ad_coincharge_finance`
--

CREATE TABLE `t_ad_coincharge_finance` (
  `id` bigint(20) NOT NULL COMMENT 'ID of Row',
  `charge_id` bigint(20) NOT NULL COMMENT 'Coin Charge Id',
  `payment_type` int(11) NOT NULL COMMENT 'Payment Type',
  `amount` int(11) NOT NULL COMMENT 'Received Amount',
  `del_flg` int(11) NOT NULL DEFAULT 0 COMMENT 'Deleted or Not',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Created Timestamp',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'Updated Timestamp'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_ad_coincharge_finance`
--

INSERT INTO `t_ad_coincharge_finance` (`id`, `charge_id`, `payment_type`, `amount`, `del_flg`, `created_at`, `updated_at`) VALUES
(50022, 21015, 4, 0, 1, '2022-02-17 14:57:30', '2022-02-17 14:57:55'),
(50023, 21015, 1, 40000, 0, '2022-02-20 04:31:59', '2022-02-20 04:31:59'),
(50024, 21016, 3, 40000, 0, '2022-02-21 13:32:30', '2022-02-21 13:32:30'),
(50025, 21017, 2, 40000, 0, '2022-02-21 14:51:42', '2022-02-21 14:51:42'),
(50026, 21018, 2, 40000, 0, '2022-02-21 15:49:23', '2022-02-21 15:49:23');

-- --------------------------------------------------------

--
-- Table structure for table `t_ad_coinrate_history`
--

CREATE TABLE `t_ad_coinrate_history` (
  `id` bigint(20) NOT NULL COMMENT 'ID of Row',
  `old_rate` int(11) NOT NULL COMMENT 'Old Rate',
  `new_rate` int(11) NOT NULL COMMENT 'New Rate',
  `change_by` bigint(20) NOT NULL COMMENT 'Change by',
  `change_note` varchar(255) NOT NULL COMMENT 'Change reason or description',
  `del_flg` int(11) NOT NULL DEFAULT 0 COMMENT 'Deleted or not',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Created TimeStamp',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'Updated TimeStamp'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_ad_coinrate_history`
--

INSERT INTO `t_ad_coinrate_history` (`id`, `old_rate`, `new_rate`, `change_by`, `change_note`, `del_flg`, `created_at`, `updated_at`) VALUES
(4, 1000, 1200, 1, 'First Change', 0, '2022-01-17 00:40:40', '2022-01-17 00:40:40'),
(5, 1200, 23223, 1, 'sdfsdfsdfsdfsdf', 0, '2022-01-17 05:43:49', '2022-01-17 05:43:49'),
(6, 23223, 2000, 1, 'sdfsdfsdfsf', 0, '2022-01-17 06:34:20', '2022-01-17 06:34:20'),
(7, 2000, 1000, 1, 'add coining', 0, '2022-01-19 20:49:40', '2022-01-19 20:49:40'),
(8, 1000, 2000, 1, 'Change data', 0, '2022-02-04 15:31:21', '2022-02-04 15:31:21');

-- --------------------------------------------------------

--
-- Table structure for table `t_ad_contact`
--

CREATE TABLE `t_ad_contact` (
  `id` bigint(20) NOT NULL,
  `message` varchar(255) NOT NULL,
  `reply` varchar(255) DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `del_flg` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_ad_contact`
--

INSERT INTO `t_ad_contact` (`id`, `message`, `reply`, `customer_id`, `del_flg`, `created_at`, `updated_at`) VALUES
(1, 'fdgdfgdfg', 'yes', 22, 0, '2022-02-09 15:44:53', '2022-02-09 15:45:11');

-- --------------------------------------------------------

--
-- Table structure for table `t_ad_evd`
--

CREATE TABLE `t_ad_evd` (
  `id` bigint(20) NOT NULL COMMENT 'Row of Id',
  `path` varchar(255) NOT NULL COMMENT 'Path of ScreenShot',
  `note` varchar(255) DEFAULT NULL COMMENT 'note',
  `del_flg` int(11) NOT NULL DEFAULT 0 COMMENT 'Deleted or not',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Created TimeStamp',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'Updated TimeStamp'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_ad_evd`
--

INSERT INTO `t_ad_evd` (`id`, `path`, `note`, `del_flg`, `created_at`, `updated_at`) VALUES
(1, 'screen_shot.jpg', NULL, 0, '2022-01-22 05:23:04', NULL),
(13, 'coinCharge/siINsxahIFfnXNKaT1fXC4NRQtoTpmZnqb5tWPkn.jpg', NULL, 0, '2022-02-13 16:36:22', '2022-02-13 16:36:22'),
(14, 'coinCharge/wiFlxGSRB8bkfWAiUeN74tlrcPG0KOx2pf3eFEp1.jpg', NULL, 0, '2022-02-13 16:41:22', '2022-02-13 16:41:22'),
(15, 'coinCharge/3PUT2Eo3SuhNA9gqwivSALFXIP43Dw9mbzZ6bpY5.jpg', NULL, 0, '2022-02-13 16:42:14', '2022-02-13 16:42:14'),
(16, 'coinCharge/RWNRcsqhkyds0UirgBndkPuvEgARQJGcW2PagWBR.jpg', NULL, 0, '2022-02-17 09:38:44', '2022-02-17 09:38:44'),
(17, 'coinCharge/ZGWfVIXlxrVhLmGbb2Tt1OebPoGXieUdAed7gzNW.jpg', NULL, 0, '2022-02-17 09:59:48', '2022-02-17 09:59:48'),
(18, 'coinCharge/3o9cr8RdnLQN40RokHu52C72YHVIGlLMGsRHWhig.jpg', NULL, 0, '2022-02-17 10:03:37', '2022-02-17 10:03:37'),
(19, 'coinCharge/9TxUR2KEtV0J37A1UBjqEL47cD9PgMc3SAhrpjit.jpg', NULL, 0, '2022-02-17 10:13:35', '2022-02-17 10:13:35'),
(20, 'coinCharge/QhGx95dk8ffaGdxnALtMs0JsQ2SpGbEetsbjeQGd.jpg', NULL, 0, '2022-02-17 10:17:26', '2022-02-17 10:17:26'),
(21, 'coinCharge/oNs8ywlV1nNAW2NZcJDt84Hafe0a9eYQ8x4wLIJs.jpg', NULL, 0, '2022-02-17 14:52:40', '2022-02-17 14:52:40'),
(22, 'coinCharge/drZ8v04dTDhlqAB879lzVvnV2fNbwnqRWG1LCqAb.jpg', NULL, 0, '2022-02-17 14:57:05', '2022-02-17 14:57:05'),
(23, 'coinCharge/F2CMbwaoKX9udasUPOicNqwHttIq48S6sRxt7QnN.jpg', NULL, 0, '2022-02-21 13:28:36', '2022-02-21 13:28:36'),
(24, 'coinCharge/jSdOHWW6cokYJb4wplv6uOxDo72eL0ZZpgfoQg8P.jpg', NULL, 0, '2022-02-21 14:51:11', '2022-02-21 14:51:11'),
(25, 'coinCharge/BSru2a4K2cqS9vDEaDzlmmtKc9yDBRQrn3nwQAcw.jpg', NULL, 0, '2022-02-21 15:48:15', '2022-02-21 15:48:15');

-- --------------------------------------------------------

--
-- Table structure for table `t_ad_order`
--

CREATE TABLE `t_ad_order` (
  `id` bigint(20) NOT NULL COMMENT 'ID of Row',
  `customer_id` bigint(20) NOT NULL COMMENT 'Customer Id',
  `payment` int(11) NOT NULL COMMENT 'Payment Type',
  `township_id` int(11) DEFAULT NULL COMMENT 'Delivery Township ID',
  `ph_number` varchar(30) NOT NULL,
  `grandtotal_coin` int(11) DEFAULT NULL COMMENT 'If Customer Buy with Coin',
  `grandtotal_cash` int(11) DEFAULT NULL COMMENT 'If Customer buy with COD',
  `order_status` int(11) NOT NULL COMMENT 'Order Status',
  `order_date` date NOT NULL COMMENT 'Order DateTime',
  `order_time` time NOT NULL COMMENT 'Order Time',
  `last_control_by` bigint(20) DEFAULT NULL COMMENT 'Last Time Controly By',
  `del_flg` int(11) NOT NULL DEFAULT 0 COMMENT 'Deleted or not',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Created TimeStamp',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'Updated TimeStamp'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_ad_order`
--

INSERT INTO `t_ad_order` (`id`, `customer_id`, `payment`, `township_id`, `ph_number`, `grandtotal_coin`, `grandtotal_cash`, `order_status`, `order_date`, `order_time`, `last_control_by`, `del_flg`, `created_at`, `updated_at`) VALUES
(11513, 22, 0, 1, '09421010735', 7, 0, 1, '2022-02-20', '15:50:46', 0, 0, '2022-02-20 09:20:46', '2022-02-20 09:20:46'),
(11514, 22, 0, 1, '09421010735', 7, 0, 1, '2022-02-21', '20:06:40', 0, 0, '2022-02-21 13:36:40', '2022-02-21 13:36:40');

-- --------------------------------------------------------

--
-- Table structure for table `t_ad_orderdetail`
--

CREATE TABLE `t_ad_orderdetail` (
  `id` bigint(20) NOT NULL COMMENT 'Id of row',
  `order_id` bigint(20) NOT NULL COMMENT 'Order ID',
  `product_id` int(11) NOT NULL COMMENT 'Proudct ID',
  `quantity` int(11) NOT NULL COMMENT 'Quantity',
  `total_coin` int(11) NOT NULL COMMENT 'If Customer buy with Coin',
  `total_cash` int(11) NOT NULL COMMENT 'If Customer buy with COD',
  `note` varchar(255) DEFAULT NULL COMMENT 'add note by customer',
  `del_flg` int(11) NOT NULL DEFAULT 0 COMMENT 'Deleted or Not',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Created TimeStamp',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'Updated TimeStamp'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_ad_orderdetail`
--

INSERT INTO `t_ad_orderdetail` (`id`, `order_id`, `product_id`, `quantity`, `total_coin`, `total_cash`, `note`, `del_flg`, `created_at`, `updated_at`) VALUES
(2, 11513, 10, 1, 6, 0, '', 0, '2022-02-20 09:20:46', '2022-02-20 09:20:46'),
(3, 11514, 10, 1, 6, 0, '', 0, '2022-02-21 13:36:40', '2022-02-21 13:36:40');

-- --------------------------------------------------------

--
-- Table structure for table `t_ad_photo`
--

CREATE TABLE `t_ad_photo` (
  `id` bigint(20) NOT NULL COMMENT 'Row of Id',
  `link_id` bigint(20) NOT NULL COMMENT 'Link for related id',
  `order_id` bigint(20) NOT NULL COMMENT 'Sequence for photo',
  `path` varchar(255) NOT NULL COMMENT 'Path of ScreenShot',
  `note` varchar(255) DEFAULT NULL COMMENT 'note',
  `del_flg` int(11) NOT NULL DEFAULT 0 COMMENT 'Deleted or not',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Created TimeStamp',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'Updated TimeStamp'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_ad_photo`
--

INSERT INTO `t_ad_photo` (`id`, `link_id`, `order_id`, `path`, `note`, `del_flg`, `created_at`, `updated_at`) VALUES
(1, 10, 1, 'ProductImage/JLwt9LNIcNVnLS06rwiwer8OFigoOGKLgVjzFIwt.jpg', 'Product Image', 1, '2022-01-30 13:02:49', '2022-02-20 05:54:23'),
(2, 10, 2, 'ProductImage/bz34P85wx2WK9XInNeypMl7N5EaoGtbkhGgNxRgx.jpg', 'Product Image', 1, '2022-01-30 13:04:45', '2022-02-20 05:54:23'),
(3, 11, 1, 'ProductImage/MmH3gfV8GrixWZKU7cR1ftZ8xgL5whBgwGj4YIkH.png', 'Product Image', 0, '2022-02-06 12:11:00', '2022-02-06 12:11:00'),
(4, 12, 1, 'ProductImage/AIY6E5gtnM6PVr25af2SFXgPhRHGv74yFSHqFwN1.webp', 'Product Image', 0, '2022-02-06 12:11:59', '2022-02-06 12:11:59'),
(5, 13, 1, 'ProductImage/8r1LW9koVTCngZFXROr6jv26lv7Qi6kkzRy0Als5.jpg', 'Product Image', 0, '2022-02-07 09:08:10', '2022-02-07 09:08:10'),
(6, 14, 1, 'ProductImage/8QmQVMIg9BSdsYJRCvyoQF7XjRckK7VJNmLaBCOF.jpg', 'Product Image', 0, '2022-02-07 09:09:40', '2022-02-07 09:09:40'),
(7, 15, 1, 'ProductImage/tIQx0wB01pXH4gDXEvtnbTPXzg7hXxeMrIRC75bW.jpg', 'Product Image', 0, '2022-02-07 09:10:02', '2022-02-07 09:10:02'),
(8, 10, 3, 'ProductImage/RIo0fNnEZQKNmcw92snJdGLnr7AcmQq4001DhIlK.jpg', 'Product Image', 1, '2022-02-13 15:51:09', '2022-02-20 05:54:23'),
(9, 10, 4, 'ProductImage/iiO2VFQ82DPQNBchPVKy5Qh7n6CChJTxG2jHSPcX.jpg', 'Product Image', 1, '2022-02-13 15:51:09', '2022-02-20 05:54:23'),
(10, 10, 5, 'ProductImage/6O8ur9WQGA2wugc9Iw0YDWjbeDFr7OKYH6xyQ08d.webp', 'Product Image', 1, '2022-02-13 15:51:09', '2022-02-20 05:54:23'),
(11, 10, 6, 'ProductImage/K44JPAJVZuhOTN8BlauOLltasGs94fPJVtzzZwuB.jpg', 'Product Image', 1, '2022-02-13 15:51:09', '2022-02-20 06:00:42'),
(12, 10, 1, 'ProductImage/Dnr4qwAhYrHv26F9n0Dk2kmHz0M5uReA7ZvaaP1d.jpg', 'Product Image', 0, '2022-02-20 05:54:23', '2022-02-20 05:54:23'),
(13, 10, 2, 'ProductImage/TaZ6f7YFqEjL... (28 KB left)
