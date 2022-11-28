-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2021 at 09:00 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `salepropos`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `account_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `initial_balance` double DEFAULT NULL,
  `total_balance` double NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_default` tinyint(1) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `account_no`, `name`, `initial_balance`, `total_balance`, `note`, `is_default`, `is_active`, `created_at`, `updated_at`) VALUES
(1, '11111', 'Sales Account', 1000, 1000, 'this is first account', 0, 1, '2018-12-18 02:58:02', '2020-12-30 04:04:37'),
(3, '21211', 'Sa', 500, 500, NULL, 0, 1, '2018-12-18 02:58:56', '2021-02-01 22:57:41'),
(4, '12345678', 'purchase account', 500, 500, 'sample note', 1, 1, '2020-12-02 05:21:21', '2020-12-30 04:04:37'),
(5, '151289', 'Management Account', 2000, 2000, 'Sample Management Account', NULL, 1, '2020-12-30 04:06:12', '2020-12-30 04:06:12'),
(6, 'Tech21', 'Technology Account', 5000, 5000, 'This account is used for technical purpose only', NULL, 1, '2021-02-02 04:50:55', '2021-02-02 04:50:55');

-- --------------------------------------------------------

--
-- Table structure for table `adjustments`
--

CREATE TABLE `adjustments` (
  `id` int(10) UNSIGNED NOT NULL,
  `reference_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `document` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_qty` double NOT NULL,
  `item` int(11) NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `adjustments`
--

INSERT INTO `adjustments` (`id`, `reference_no`, `warehouse_id`, `document`, `total_qty`, `item`, `note`, `created_at`, `updated_at`) VALUES
(1, 'adr-20201201-104510', 1, NULL, 1, 1, 'sample', '2020-12-01 04:45:10', '2020-12-01 04:47:32'),
(2, 'adr-20201202-104708', 1, NULL, 5, 1, 'sample adjustment', '2020-12-02 04:47:08', '2020-12-02 04:47:08'),
(3, 'adr-20201230-045942', 1, NULL, 3, 1, 'for calculation', '2020-12-29 22:59:42', '2020-12-29 22:59:42'),
(4, 'adr-20201230-050411', 1, NULL, 3, 1, 'for stock count', '2020-12-29 23:04:11', '2020-12-29 23:04:11'),
(5, 'adr-20210106-042138', 7, NULL, 5, 1, NULL, '2021-01-05 22:21:38', '2021-01-05 22:21:38');

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `employee_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `checkin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `checkout` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `date`, `employee_id`, `user_id`, `checkin`, `checkout`, `status`, `note`, `created_at`, `updated_at`) VALUES
(1, '2019-01-02', 1, 1, '10:00am', '6:30pm', 1, NULL, '2019-01-02 03:30:50', '2019-01-02 03:30:50'),
(3, '2019-01-02', 3, 1, '10:15am', '6:30pm', 0, NULL, '2019-01-02 03:57:12', '2019-01-02 03:57:12'),
(6, '2020-02-03', 1, 1, '11:30am', '6:00pm', 0, NULL, '2020-02-03 09:57:30', '2020-02-03 09:57:30'),
(7, '2020-12-03', 1, 28, '10:00am', '6:00pm', 1, 'Sample Attendance', '2020-12-02 22:38:28', '2020-12-02 22:38:28'),
(8, '2020-12-03', 3, 28, '10:00am', '6:00pm', 1, 'sample', '2020-12-02 22:39:11', '2020-12-02 22:39:11'),
(9, '2020-12-04', 1, 28, '10:15am', '6:00pm', 0, NULL, '2020-12-02 22:42:51', '2020-12-02 22:42:51'),
(10, '2020-12-30', 6, 28, '10:00am', '6:00pm', 1, 'not late', '2020-12-30 04:11:06', '2020-12-30 04:11:06'),
(11, '2020-12-28', 6, 28, '10:15am', '6:00pm', 0, 'late', '2020-12-30 04:11:30', '2020-12-30 04:11:30');

-- --------------------------------------------------------

--
-- Table structure for table `billers`
--

CREATE TABLE `billers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vat_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `billers`
--

INSERT INTO `billers` (`id`, `name`, `image`, `company_name`, `vat_number`, `email`, `phone_number`, `address`, `city`, `state`, `postal_code`, `country`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'yousuf', 'aks.jpg', 'aks', '31123', 'yousuf@kds.com', '442343324', 'halishahar', 'chittagong', NULL, NULL, 'sdgs', 1, '2018-05-12 21:49:30', '2019-03-02 05:20:38'),
(2, 'tariq', NULL, 'big tree', NULL, 'tariq@bigtree.com', '321312', 'khulshi', 'chittagong', NULL, NULL, NULL, 1, '2018-05-12 21:57:54', '2018-06-15 00:07:11'),
(3, 'test', NULL, 'test', NULL, 'test@test.com', '3211', 'erewrwqre', 'afsf', NULL, NULL, NULL, 0, '2018-05-30 02:38:58', '2018-05-30 02:39:57'),
(5, 'modon', 'mogaTel.jpg', 'mogaTel', '', 'modon@gmail.com', '32321', 'nasirabad', 'chittagong', '', '', 'bd', 1, '2018-09-01 03:59:54', '2018-10-07 02:35:51'),
(6, 'a', NULL, 'a', NULL, 'a@a.com', 'q', 'q', 'q', NULL, NULL, NULL, 0, '2018-10-07 02:33:39', '2018-10-07 02:34:18'),
(7, 'a', NULL, 'a', NULL, 'a@a.com', 'a', 'a', 'a', NULL, NULL, NULL, 0, '2018-10-07 02:34:36', '2018-10-07 02:36:07'),
(8, 'x', 'x.png', 'x', NULL, 'x@x.com', 'x', 'x', 'x', NULL, NULL, NULL, 1, '2019-03-18 11:02:42', '2019-12-21 11:01:24'),
(9, 'Safi', 'AcquaintTechnologies.jpg', 'Acquaint Technologies', 'Sahid', 'safiulsahid151289@gmail.com', '01521100281', 'mohanagar project', 'Dhaka', 'Dhaka', '1000', 'Bangladesh', 1, '2020-12-02 22:56:33', '2020-12-02 22:56:33');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) NOT NULL,
  `blog_title` varchar(255) NOT NULL,
  `blog_image` varchar(255) NOT NULL,
  `blog` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `blog_title`, `blog_image`, `blog`, `created_at`, `updated_at`) VALUES
(5, '4 REASONS WHY MOBILE APPS ARE THE FUTURE OF STUDENT INFORMATION SYSTEMS', 'public/images/blogs/1690038422121221.jpg', 'In the previous decade, we have seen an inconceivable advancement of innovation in each part of our lives. Nowadays Mobile app is so important  for our daily life. It is an understatement to say that Mobile app has just merely improved, it has actually made leaps and bounds.\r\n\r\nSpeed and efficiency:\r\n\r\nMobile phones offer a few points of interest to clients, the first and conceivably the most significant is speed/efficient. SEO is the way toward improving the quality and amount of site traffic to a site or a website page from web indexes. A great many people consistently convey their smartphones with them, and this reality offers them the chance to get to data from any area without the assistance of a customary personal computer.\r\n\r\nPrecision and adaptability:\r\n\r\nApplications utilize the data to accurately customize the user experience. Customer Management  is the significant thing. Versatile registering and context‐aware application ideas can give more user‐centric data administrations to understudies. Most mobile apps tend to ask their client’s information, for example, geolocation. With the aggregation of information, applications make a User Profile to address the requirements of each client all together for the application to cover those necessities or different preferences. Thus, this offers extraordinary abilities using the application.\r\n\r\nTrust and easy access:\r\n\r\nMobile users constantly  download applications on their phones. Web design with responsive is  so important for mobile. Mobile phones starting at 2019 have found a few different ways to protect your gadget with respect to information robbery. Passwords and face acknowledgment are probably the most mainstream procedures portable information designers concocted to keep your gadget secure.\r\n\r\nA large number of users support:\r\n\r\nAs recently expressed, most of youngsters picked cell phones over the conventional personal computer. This pattern is transcendently related to twenty to thirty year old’s and age z. To be exact, 62% of twenty to thirty year olds like to do exercises on applications rather than a work area for different reasons.', '2021-01-27 04:39:19', '2021-02-03 00:24:27'),
(6, 'BENEFITS OF SALES AND DISTRIBUTION SOFTWARE', 'public/images/blogs/1690039209785133.jpg', 'Merchants face a novel arrangement of difficulties in their business measures, including the development of items through each phase of the appropriation cycle as monetarily and effectively as could reasonably be expected. This includes staying aware of countless exchanges and stocks. Undertaking Resource Planning and Accounting Software explicitly custom fitted for the conveyance business can help merchants an incredible arrangement at each progression, from creation to conveyance. Here is a manual for the challenges that associations in the business face, and the advantages that a dispersion programming arrangement can give.\r\n\r\nOrganizations will likewise have the option to utilize the product to recognize any disparities between the stock posting and genuine number of stocks. This can go around serious issues that record irregularities for exchanges, conveyances, stocks and deals can cause. Noxious or unlawful activities can be all the more effectively saw too, again to forestall any future issues for your organization.\r\n\r\nDistribution software keeps clients cheerful by diminishing time among request and conveyance. The bundle and conveyance of things turns out to be more precise, as the specific number of things required can be requested in a particular measure of time. This prompts less missteps that can bring about expanding deals cost, or losing deals altogether. Giving clients quality help will tempt them to utilize your administration once more, which fabricates a quality customer list, a beneficial type of revenue.\r\n\r\nDistribution software improves the observing of stocks via computerizing stock administration. Thing stock that is as of now utilized or conveyed would then be able to be topped off promptly, so they can generally supply the things mentioned from customers.\r\n\r\nOur Acquaint Technologies team create and develops custom software, websites with latest responsive designs and features.\r\n\r\nDistribution software can save an association a huge amount of cash by eliminating the need of recruiting staff to screen exchanges and stocks. ERP dispersion programming grants total store network perceivability, improved quality administration, and more precise anticipating and arranging, improving the effectiveness of a business’ cycles, which prompts lower costs too. In the event that you are more mindful of value issues, this means less cash being spent on support and new parts.', '2021-01-27 05:29:48', '2021-02-03 00:22:45'),
(7, 'USING A POS SOFTWARE TO GROW YOUR SMALL BUSINESS', 'public/images/blogs/1690039568502692.jpg', 'POS serves as your company’s central position. It is the hub where different aspects, such as sales, inventory, and customer management are merged together to ensure the smooth running of all your business operations. Here are the reasons why you need a POS Software or Point of Sale system for your business:\r\n\r\nPoint of Sale system performs huge client relationship management (CRM) redesigns. You can discover records of single or different clients (Maintain client’s logs) effectively so they can return or trade the bought merchandise in a matter of moments.\r\n\r\nA POS software for small businesses can give you previews of the growth, development, and execution of your store whenever, without over-burdening your group.\r\n\r\nRetailers need to settle on savvy buying choices, and a POS for private venture gives important experiences into how much stock to purchase, the amount to sell it for, and if it should be limited.\r\n\r\nOur Acquaint Technologies team creates and develops custom software, responsive website with latest features.\r\n\r\nThe point of sale provides analyzes of the business processes underway in real-time.\r\n\r\nPOS software is simple for representatives to learn, subsequently shortening their preparation time and assisting them with getting more effective at their working environment.', '2021-01-27 05:35:30', '2021-02-03 00:21:46');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `title`, `image`, `is_active`, `created_at`, `updated_at`) VALUES
(3, 'HP', 'HP.jpg', 0, '2018-05-12 09:06:14', '2021-02-12 22:57:56'),
(4, 'samsung', 'samsung.jpg', 0, '2018-05-12 09:08:41', '2021-01-27 00:16:51'),
(5, 'Apple', 'Apple.jpg', 0, '2018-08-31 23:34:49', '2021-01-27 00:16:52'),
(6, 'jjjj', '20201019093419.jpg', 0, '2020-10-19 15:33:52', '2020-10-19 15:35:58'),
(7, 'Lotto', 'lotto.jpg', 0, '2020-11-16 04:13:41', '2021-01-27 00:16:52'),
(8, 'Acer', '20201203084637.jpg', 0, '2020-12-03 02:46:37', '2021-01-27 00:16:52'),
(9, 'Rokomari', '20201230053107.jpg', 0, '2020-12-29 23:31:07', '2021-01-27 00:16:52'),
(10, 'Sprint', '20210107080018.png', 0, '2021-01-07 02:00:18', '2021-01-27 00:16:52'),
(11, 'Aarong', '20210126074437.jpg', 1, '2021-01-26 01:44:37', '2021-01-26 01:44:37'),
(12, 'Mejuri', '20210126105149.png', 1, '2021-01-26 04:51:49', '2021-01-26 04:51:49'),
(13, 'Taylor & Hart', '20210127041907.png', 1, '2021-01-26 22:19:07', '2021-01-26 22:19:07'),
(14, 'Alex and Ani', '20210127062431.png', 1, '2021-01-27 00:24:31', '2021-01-27 00:24:31'),
(15, 'Pipa Bella', '20210127070049.jpg', 1, '2021-01-27 01:00:49', '2021-01-27 01:00:49'),
(16, 'Zaveri Pearls', '20210127084405.jpg', 1, '2021-01-27 02:44:05', '2021-01-27 02:44:05'),
(17, 'Lenovo', '20210209080317.png', 0, '2021-02-09 02:03:17', '2021-02-12 22:57:50');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_ip` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `product_quantity`, `product_price`, `user_ip`, `created_at`, `updated_at`) VALUES
(164, 10, 1, '22', '192.168.1.115', NULL, '2021-01-07 06:18:09'),
(167, 22, 1, '1000', '192.168.1.115', NULL, '2021-01-07 06:15:24'),
(168, 2, 1, '12', '192.168.1.115', NULL, '2021-01-07 06:15:31'),
(377, 84, 30, '137525', '::1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cash_registers`
--

CREATE TABLE `cash_registers` (
  `id` int(10) UNSIGNED NOT NULL,
  `cash_in_hand` double NOT NULL,
  `user_id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cash_registers`
--

INSERT INTO `cash_registers` (`id`, `cash_in_hand`, `user_id`, `warehouse_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 100, 9, 1, 0, '2020-10-13 07:32:54', '2020-10-24 00:27:42'),
(2, 50, 9, 1, 1, '2020-10-13 15:25:26', '2020-10-13 15:25:26'),
(3, 200, 1, 1, 1, '2020-10-22 07:53:07', '2020-10-24 00:33:32'),
(4, 100, 1, 2, 1, '2020-10-24 01:04:39', '2020-10-24 01:04:39'),
(5, 500, 28, 1, 1, '2020-12-02 03:36:01', '2020-12-02 03:36:01'),
(6, 400, 28, 1, 1, '2020-12-02 03:39:10', '2020-12-02 03:39:10'),
(7, 40, 28, 7, 1, '2020-12-03 03:01:32', '2020-12-03 03:01:32'),
(8, 100, 28, 1, 1, '2020-12-29 23:19:13', '2020-12-29 23:19:13'),
(9, 100, 28, 2, 1, '2020-12-29 23:19:22', '2020-12-29 23:19:22');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `parent_id`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Fruits', NULL, 9, 1, '2018-05-12 03:27:25', '2021-01-26 23:25:07'),
(2, 'electronics', NULL, NULL, 0, '2018-05-12 03:35:57', '2021-01-26 23:25:07'),
(3, 'computer', '20200701093146.jpg', 2, 1, '2018-05-12 03:36:08', '2021-01-26 23:25:07'),
(4, 'toy', NULL, NULL, 0, '2018-05-23 22:57:48', '2021-01-26 23:25:17'),
(7, 'jacket', NULL, NULL, 0, '2018-05-27 22:39:51', '2018-05-27 22:40:48'),
(9, 'food', NULL, NULL, 0, '2018-06-25 01:21:40', '2021-01-26 23:25:07'),
(10, 'anda', NULL, NULL, 0, '2018-08-28 23:36:31', '2018-08-28 23:37:34'),
(11, 'anda', NULL, NULL, 0, '2018-08-28 23:48:06', '2018-08-28 23:53:22'),
(12, 'accessories', NULL, NULL, 0, '2018-12-04 23:28:53', '2021-01-26 23:25:06'),
(14, 'nn', NULL, NULL, 0, '2019-04-10 04:22:30', '2019-04-10 05:38:47'),
(15, 'nm', NULL, NULL, 0, '2019-04-10 04:22:36', '2019-04-10 05:41:43'),
(16, 'desktop', NULL, 3, 0, '2020-03-11 10:42:33', '2021-01-26 23:25:07'),
(17, 'tostos', '20200701080042.png', NULL, 0, '2020-07-01 14:00:42', '2020-07-01 15:35:34'),
(19, 'Honey', '20201201101257.jpg', 9, 0, '2020-12-01 04:12:57', '2020-12-01 04:17:12'),
(20, 'Honey', '20201201101811.jpg', 9, 0, '2020-12-01 04:18:11', '2021-01-26 23:25:07'),
(21, 'fish', NULL, 9, 0, '2020-12-01 04:42:20', '2021-01-26 23:25:07'),
(22, 'Men\'s Shoe', '20210107080122.png', NULL, 0, '2020-12-01 04:42:20', '2021-01-26 23:25:17'),
(23, 'Islamic Book', '20201201105316.jpg', 23, 0, '2020-12-01 04:53:16', '2021-01-26 23:25:07'),
(24, 'fish1', NULL, 9, 0, '2020-12-01 04:56:39', '2020-12-01 05:03:31'),
(25, 'fish5', NULL, NULL, 0, '2020-12-01 05:02:33', '2020-12-01 05:03:18'),
(26, 'modhu', NULL, 20, 0, '2020-12-01 05:17:48', '2021-01-26 23:25:17'),
(27, 'new', '20201202043345.jpg', NULL, 0, '2020-12-01 22:33:45', '2020-12-01 22:34:00'),
(28, 'Jewellery', '20210126064113.jpg', NULL, 1, '2021-01-26 00:41:13', '2021-01-26 00:41:13'),
(29, 'Ring', '20210127052733.jpg', 28, 1, '2021-01-26 23:27:33', '2021-01-26 23:27:33'),
(30, 'Earrings', '20210127053050.jpg', 28, 1, '2021-01-26 23:30:50', '2021-01-26 23:30:50'),
(31, 'Bracelet', '20210127053318.jpg', 28, 1, '2021-01-26 23:33:18', '2021-01-26 23:33:18'),
(32, 'Necklace', '20210127053602.jpg', 28, 1, '2021-01-26 23:36:02', '2021-01-26 23:36:02'),
(33, 'Electronics', '20210209075511.jpg', NULL, 0, '2021-02-09 01:55:11', '2021-02-12 22:57:31');

-- --------------------------------------------------------

--
-- Table structure for table `checkouts`
--

CREATE TABLE `checkouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `courier` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_ip` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `color_name` varchar(191) NOT NULL,
  `color_description` text DEFAULT NULL,
  `color_image` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `color_name`, `color_description`, `color_image`, `created_at`, `updated_at`) VALUES
(1, 'Black', 'test', NULL, '2020-12-05 22:36:49', '2020-12-05 22:36:49');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone_number`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Safi Ul Sahid', 'safiulsahid151289@gmail.com', '01521100281', 'Hello World', '2021-01-18 22:56:26', '2021-01-18 22:56:26'),
(2, 'Mohaimanul', 'mim@gmail.com', '01922270873', 'hi', '2021-01-19 04:48:21', '2021-01-19 04:48:21'),
(3, 'Nasir', 'nasir@gmail.com', '01726353787', 'I am Nasir', '2021-01-20 03:51:38', '2021-01-20 03:51:38');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double NOT NULL,
  `minimum_amount` double DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `used` int(11) NOT NULL,
  `expired_date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `type`, `amount`, `minimum_amount`, `quantity`, `used`, `expired_date`, `user_id`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'sonar bangla', 'percentage', 20, 0, 100, 4, '2020-11-19', 1, 1, '2018-10-25 22:38:50', '2020-11-18 00:52:39'),
(2, 'i love bangladesh', 'fixed', 200, 1000, 50, 1, '2018-12-31', 1, 1, '2018-10-27 02:59:26', '2019-03-02 05:46:48'),
(3, 'vb115MM11a', 'fixed', 1000, 5000, 3, 0, '2020-12-02', 28, 1, '2020-12-02 03:42:07', '2020-12-02 03:42:07');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exchange_rate` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `code`, `exchange_rate`, `created_at`, `updated_at`) VALUES
(1, 'US Dollar', 'USD', 1, '2020-11-01 00:22:58', '2020-11-01 00:34:55'),
(2, 'Bangladeshi Taka', 'BDT', 1, '2020-11-01 01:29:12', '2020-12-30 03:34:37');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_group_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deposit` double DEFAULT NULL,
  `expense` double DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customer_group_id`, `user_id`, `name`, `company_name`, `email`, `phone_number`, `tax_no`, `address`, `city`, `state`, `postal_code`, `country`, `deposit`, `expense`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 22, 'dhiman', 'lioncoders', 'dhiman@gmail.com', '+8801111111101', NULL, 'kajir deuri', 'chittagong', NULL, NULL, 'bd', 190, 20, 1, '2018-05-12 10:00:48', '2020-11-15 06:14:58'),
(2, 2, NULL, 'moinul', 'lioncoders', NULL, '+8801200000001', NULL, 'jamalkhan', 'chittagong', NULL, NULL, 'bd', 100, 20, 1, '2018-05-12 10:04:51', '2019-02-22 05:38:08'),
(3, 3, NULL, 'tariq', 'big tree', NULL, '3424', NULL, 'khulshi', 'chittagong', NULL, NULL, 'bd', NULL, NULL, 1, '2018-05-12 10:07:52', '2019-03-02 05:54:07'),
(4, 1, NULL, 'test', NULL, NULL, '4234', NULL, 'frwerw', 'qwerwqr', NULL, NULL, NULL, NULL, NULL, 0, '2018-05-30 01:35:28', '2018-05-30 01:37:38'),
(8, 1, NULL, 'anwar', 'smart it', 'anwar@smartit.com', '32321', NULL, 'nasirabad', 'chittagong', NULL, NULL, 'bd', NULL, NULL, 0, '2018-09-01 03:26:13', '2018-09-01 03:29:55'),
(11, 1, NULL, 'walk-in-customer', NULL, 'ashfaqdev.php@gmail.com', '01923000001', '11111', 'mohammadpur', 'dhaka', NULL, NULL, NULL, NULL, 0, 1, '2018-09-02 01:30:54', '2020-07-27 14:28:19'),
(15, 1, NULL, 's', NULL, NULL, '2', NULL, 's', '3e', NULL, NULL, NULL, NULL, NULL, 0, '2018-11-05 04:00:39', '2018-11-08 03:37:08'),
(16, 1, NULL, 'asas', NULL, NULL, '2121', NULL, 'dasd', 'asdd', NULL, NULL, NULL, NULL, NULL, 0, '2018-12-01 00:07:53', '2018-12-03 21:55:46'),
(17, 1, NULL, 'sadman', NULL, NULL, '312312', NULL, 'khulshi', 'ctg', NULL, NULL, NULL, NULL, NULL, 0, '2020-06-22 09:45:35', '2020-06-22 09:45:51'),
(19, 1, 19, 'shakalaka', 'Digital image', 'shakalaka@gmail.com', '1212', '999', 'Andorkillah', 'Chittagong', 'Chittagong', '1234', 'Bangladesh', NULL, NULL, 1, '2020-11-09 00:07:16', '2020-11-09 00:07:16'),
(21, 1, 21, 'Modon Miya', 'modon company', 'modon@gmail.com', '2222', NULL, 'kuril road', 'Dhaka', NULL, NULL, NULL, NULL, NULL, 1, '2020-11-13 07:12:11', '2020-11-13 07:12:11'),
(24, 2, 27, 'Safi Ul Sahid', 'Acquaint Technologies', 'safiulsahid151289@gmail.com', '01521100281', '01911160762', 'mohanagar project', 'Dhaka', 'Dhaka', '1000', 'Bangladesh', NULL, NULL, 0, '2020-11-30 23:21:19', '2020-11-30 23:21:19'),
(25, 1, NULL, 'Mohsin Ali', 'Swapno', 'mohsin@gmail.com', '016172637764', '12345678', 'Dhanmondi', 'Dhaka', 'Dhaka', '1200', 'Bangladesh', NULL, NULL, 1, '2020-12-02 22:54:03', '2020-12-02 22:54:03'),
(26, 1, NULL, 'Safi Ul Sahid', 'Acquaint Technologies', 'safiulsahid151289@gmail.com', '01521100281', NULL, 'mohanagar project', 'Dhaka', 'Dhaka', '1000', 'Bangladesh', NULL, NULL, 1, '2020-12-30 00:19:51', '2020-12-30 00:19:51'),
(27, 1, NULL, 'Rafi Ul Sahid', 'Acquaint Technologies', 'safiulsahid151289@gmail.com', '01521100281', NULL, 'mohanagar project', 'Dhaka', 'Dhaka', '1000', 'Bangladesh', NULL, NULL, 1, '2021-01-08 23:12:48', '2021-01-08 23:12:48'),
(28, 1, NULL, 'Sahid nur', 'ABH World', 'sahid@gmail.com', '0167232621', NULL, 'Jaleswaritrola', 'Bogra', 'Rajshahi', '1234', 'Bangladesh', NULL, NULL, 1, '2021-01-13 05:00:09', '2021-01-13 05:00:09'),
(29, 1, NULL, 'Shahidur Rahman', 'College', 'sahidur@gmail.com', '01911160762', NULL, 'romena afaz road', 'bogra', 'Rajshahi', '1389', 'Bangladesh', NULL, NULL, 1, '2021-01-13 22:17:41', '2021-01-13 22:17:41'),
(30, 1, NULL, 'Selina Begum', 'BRDB', 'selina@gmail.com', '01521100281', NULL, 'Jaleswaritola', 'Bogura', 'Rajshahi', '1540', 'Bangladesh', NULL, NULL, 1, '2021-01-13 23:45:05', '2021-01-13 23:45:05'),
(31, 1, 32, 'Mohaimanul', 'khadem', 'mim@gmail.com', '01922270873', NULL, 'koigari', 'bogra', 'rajshahi', '1540', 'bangladesh', NULL, NULL, 1, '2021-01-15 23:48:44', '2021-01-15 23:48:44'),
(32, 1, 33, 'karim', 'dream', 'karim@gmail.com', '01521100281', '011', 'kalitola', 'bogura', 'rajshahi', '1200', 'Bangladesh', NULL, NULL, 0, '2021-01-17 00:02:42', '2021-01-17 00:02:42'),
(33, 1, 34, 'robi ul', 'Aladin', 'robi@gmail.com', '0155522811', '11151', 'Khander', 'bogra', 'Rajshahi', '1200', 'Bangladesh', NULL, NULL, 1, '2021-01-17 00:22:53', '2021-01-20 04:41:40'),
(34, 1, 35, 'sunny', 'None', 'sunny@gmail.com', '0155522811', '111510', 'Khander', 'bogra', 'Rajshahi', '1200', 'Bangladesh', NULL, NULL, 1, '2021-01-17 22:22:11', '2021-01-20 04:10:09'),
(35, 1, NULL, 'Nasir', 'nope', 'nasir@gmail.com', '01726353787', NULL, 'gabtali', 'bogra', 'Rajshahi', '1225', 'Bangladesh', NULL, NULL, 1, '2021-01-18 23:02:56', '2021-01-18 23:02:56'),
(36, 1, NULL, 'sajid', 'no', 'sajid@gmail', '53454656', NULL, 'rahman', 'bogra', 'raj', '45346', 'ban', NULL, NULL, 1, '2021-01-23 01:13:25', '2021-01-23 01:13:25'),
(37, 1, NULL, 'Safi Ul Sahid', 'Acquaint Technologies', 'safiulsahid151289@gmail.com', '01521100281', NULL, 'mohanagar project', 'Dhaka', 'Dhaka', '1000', 'Bangladesh', NULL, NULL, 1, '2021-01-25 23:55:42', '2021-01-25 23:55:42'),
(38, 1, NULL, 'sohel Rana', 'emarat', 'sohel@gmail.com', '01777225141', NULL, 'Dharla', 'Manikganj', 'Dhaka', '1340', 'Bangladesh', NULL, NULL, 1, '2021-01-30 04:42:28', '2021-01-30 04:42:28'),
(39, 1, 62, 'Abul', 'nrc', 'abul111@gmail.com', '123435576577', NULL, 'paltan', 'dhaka', 'dhaka', '1290', 'bangladesh', NULL, NULL, 1, '2021-01-30 23:57:22', '2021-01-30 23:57:22'),
(40, 1, 63, 'ansar', 'al', 'ansar@gmail.com', '098365434', '1234', 'sariakandi', 'bogura', 'rajshahi', '1345', 'Bangladesh', NULL, NULL, 1, '2021-01-31 00:09:40', '2021-02-04 00:52:29'),
(41, 1, 64, 'mokbul', 'mkb', 'mkb@gmail.com', '09876453', NULL, 'singra', 'dhup', 'rangpur', '1313', 'Ban', NULL, NULL, 1, '2021-02-03 01:37:07', '2021-02-03 01:37:07'),
(42, 1, 65, 'rashed', 'rash', 'rashed@gmail.com', '2134522', '123', 'lahor', 'islamabad', 'lahor', '9876', 'pak', NULL, NULL, 1, '2021-02-03 03:24:30', '2021-02-03 03:27:38'),
(43, 1, 66, 'asad', 'as', 'asad@gmail.com', '23124335', NULL, 'gate', 'jhamur', 'khanci', '678', 'lemur', NULL, NULL, 1, '2021-02-03 03:50:50', '2021-02-03 03:50:50'),
(44, 1, 67, 'samsu', 'samsu company', 'samus@gmail.com', '324563200', NULL, 'rahman nagar', 'puran bogra', 'dinajpur', '0000', 'bongo', NULL, NULL, 1, '2021-02-03 04:07:40', '2021-02-03 05:17:33'),
(45, 1, 68, 'kamal', 'pasha', 'kamal@gmail.com', '01521100281', NULL, 'kasjimpur', 'tongi', 'dhaka', '2345', 'ban', NULL, NULL, 1, '2021-02-04 00:53:51', '2021-02-04 00:53:51'),
(46, 1, 69, 'Mobina Hasan', 'S N Travels & Tours Management System', 'samer@gmail.com', '01686392899', NULL, 'mirpur', 'Dhaka City', NULL, NULL, NULL, NULL, NULL, 1, '2021-02-04 00:57:19', '2021-02-04 00:57:19'),
(47, 1, 70, 'selim', 'salman', 'selim@gmail.com', '019383763', NULL, 'shakuntala', 'panchagar', 'dinajpur', '7483', 'Peoples Republic Of Bangladesh', NULL, NULL, 1, '2021-02-04 03:27:30', '2021-02-04 03:27:30');

-- --------------------------------------------------------

--
-- Table structure for table `customer_groups`
--

CREATE TABLE `customer_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `percentage` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_groups`
--

INSERT INTO `customer_groups` (`id`, `name`, `percentage`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'general', '0', 1, '2018-05-12 08:09:36', '2019-03-02 06:01:35'),
(2, 'distributor', '-10', 1, '2018-05-12 08:12:14', '2019-03-02 06:02:12'),
(3, 'reseller', '5', 1, '2018-05-12 08:12:26', '2018-05-30 01:18:14'),
(4, 'test', '12', 0, '2018-05-30 01:17:16', '2018-05-30 01:17:57'),
(5, 'test', '0', 0, '2018-08-03 09:10:27', '2018-08-03 09:10:34'),
(6, 'Major', '15', 1, '2020-12-03 02:45:00', '2020-12-03 02:45:00');

-- --------------------------------------------------------

--
-- Table structure for table `deliveries`
--

CREATE TABLE `deliveries` (
  `id` int(10) UNSIGNED NOT NULL,
  `reference_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sale_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivered_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recieved_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deliveries`
--

INSERT INTO `deliveries` (`id`, `reference_no`, `sale_id`, `user_id`, `address`, `delivered_by`, `recieved_by`, `file`, `note`, `status`, `created_at`, `updated_at`) VALUES
(1, 'dr-20180808-044431', 1, 1, 'kajir deuri chittagong bd', 'abul', 'dhiman', NULL, 'Instrument 1', '3', '2018-08-08 10:44:55', '2020-09-26 12:25:39'),
(2, 'dr-20181106-105936', 88, 1, 'mohammadpur dhaka', NULL, NULL, NULL, NULL, '2', '2018-11-06 04:59:43', '2018-11-06 05:10:38'),
(3, 'dr-20181106-111321', 79, 1, 'mohammadpur dhaka', 'Harun', 'Amjad', NULL, NULL, '3', '2018-11-06 05:13:25', '2020-09-26 13:22:11'),
(5, 'dr-20201202-094959', 259, 28, 'khulshi chittagong bd', 'safi', 'tariq', 'dr-20201202-094959.csv', 'demo notes', '1', '2020-12-02 03:51:09', '2020-12-02 03:51:09'),
(6, 'dr-20210113-111015', 265, 28, 'mohammadpur dhaka', 'safi', 'tariq', NULL, NULL, '1', '2021-01-13 05:10:25', '2021-01-13 05:10:25'),
(7, 'dr-20210113-111050', 266, 28, 'Jaleswaritrola Bogra Bangladesh', 'safi', 'tariq', NULL, NULL, '1', '2021-01-13 05:10:56', '2021-01-13 05:10:56');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Sale', 1, '2018-12-27 05:16:47', '2018-12-27 10:40:23'),
(2, 'xyz', 1, '2018-12-27 10:28:47', '2018-12-27 10:28:47'),
(3, 'Information Technology (IT)', 1, '2020-12-02 22:29:36', '2020-12-02 22:29:56'),
(4, 'Development Team', 1, '2020-12-30 04:09:32', '2020-12-30 04:09:32');

-- --------------------------------------------------------

--
-- Table structure for table `deposits`
--

CREATE TABLE `deposits` (
  `id` int(10) UNSIGNED NOT NULL,
  `amount` double NOT NULL,
  `customer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deposits`
--

INSERT INTO `deposits` (`id`, `amount`, `customer_id`, `user_id`, `note`, `created_at`, `updated_at`) VALUES
(1, 90, 1, 1, 'first deposit', '2018-08-25 22:48:23', '2018-08-26 01:18:55'),
(3, 100, 2, 1, NULL, '2018-08-26 00:53:16', '2018-08-26 21:42:39'),
(4, 50, 1, 1, NULL, '2018-09-04 22:56:19', '2018-09-04 22:56:19'),
(5, 50, 1, 1, NULL, '2018-09-10 00:08:40', '2018-09-10 00:08:40');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `email`, `phone_number`, `department_id`, `user_id`, `image`, `address`, `city`, `country`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'john', 'john@gmail.com', '10001', 2, 12, 'johngmailcom.jpg', 'GEC', 'chittagong', 'Bangladesh', 1, '2018-12-30 00:48:37', '2019-03-02 06:50:23'),
(3, 'tests', 'test@test.com', '111', 1, NULL, NULL, NULL, NULL, NULL, 1, '2018-12-30 22:20:51', '2019-01-03 00:03:54'),
(6, 'Safi Ul Sahid', 'safiulsahid151289@gmail.com', '01521100281', 4, NULL, 'safiulsahid151289gmailcom.jpg', 'mohanagar project', 'Dhaka', 'Bangladesh', 1, '2020-12-30 04:10:20', '2020-12-30 04:10:20');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(10) UNSIGNED NOT NULL,
  `reference_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expense_category_id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cash_register_id` int(11) DEFAULT NULL,
  `amount` int(11) NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `reference_no`, `expense_category_id`, `warehouse_id`, `account_id`, `user_id`, `cash_register_id`, `amount`, `note`, `created_at`, `updated_at`) VALUES
(2, 'er-20180817-012254', 1, 2, 1, 1, NULL, 150, 'first expense...', '2018-08-17 07:22:54', '2018-08-17 07:44:13'),
(3, 'er-20180817-014241', 1, 1, 1, 1, NULL, 125, 'second expense...', '2018-08-17 07:42:41', '2018-08-17 07:43:50'),
(4, 'er-20181022-043609', 2, 1, 1, 1, NULL, 1000, NULL, '2018-10-22 10:36:09', '2018-10-22 10:36:09'),
(5, 'er-20181101-050207', 2, 2, 1, 1, NULL, 1000, NULL, '2018-10-31 23:02:07', '2018-10-31 23:02:07'),
(6, 'er-20181101-050231', 2, 1, 1, 1, NULL, 550, NULL, '2018-10-31 23:02:31', '2018-10-31 23:02:31'),
(7, 'er-20181105-091913', 1, 1, 1, 1, NULL, 2000, NULL, '2018-11-05 03:19:13', '2018-11-05 03:19:13'),
(8, 'er-20181105-091929', 2, 2, 1, 1, NULL, 1000, NULL, '2018-11-05 03:19:29', '2018-11-05 03:19:29'),
(9, 'er-20190101-063342', 2, 1, 1, 1, NULL, 100, NULL, '2019-01-01 00:33:42', '2019-01-01 00:33:42'),
(10, 'er-20190103-070018', 2, 2, 1, 9, NULL, 2000, NULL, '2019-01-03 01:00:18', '2019-01-03 01:00:18'),
(11, 'er-20190209-104656', 2, 2, 1, 1, NULL, 500, NULL, '2019-02-09 04:46:56', '2019-02-09 04:46:56'),
(12, 'er-20190209-104716', 2, 1, 1, 1, NULL, 400, NULL, '2019-02-09 04:47:16', '2019-02-09 04:47:16'),
(14, 'er-20190303-104142', 2, 2, 1, 1, NULL, 250, 'jjj', '2019-03-03 04:41:42', '2019-03-20 09:17:16'),
(15, 'er-20190404-095645', 2, 1, 1, 1, NULL, 200, NULL, '2019-04-04 03:56:45', '2019-04-04 03:56:45'),
(16, 'er-20190528-103306', 2, 1, 1, 1, NULL, 560, NULL, '2019-05-28 04:33:06', '2019-05-28 04:33:06'),
(17, 'er-20190528-103325', 2, 2, 1, 1, NULL, 600, NULL, '2019-05-28 04:33:25', '2019-05-28 04:33:25'),
(19, 'er-20190613-101955', 2, 2, 1, 1, NULL, 800, NULL, '2019-06-13 04:19:55', '2019-06-13 04:19:55'),
(20, 'er-20191019-033149', 2, 1, 1, 1, NULL, 300, NULL, '2019-10-19 09:31:49', '2019-10-19 09:31:49'),
(21, 'er-20191222-023508', 2, 1, 1, 1, NULL, 550, NULL, '2019-12-22 08:35:08', '2019-12-22 08:35:08'),
(22, 'er-20200101-022304', 2, 2, 1, 1, NULL, 500, NULL, '2020-01-01 08:23:04', '2020-01-01 08:23:04'),
(23, 'er-20200204-105938', 1, 1, 1, 1, NULL, 400, NULL, '2020-02-04 16:59:38', '2020-02-04 16:59:38'),
(24, 'er-20200204-105957', 1, 2, 1, 1, NULL, 350, NULL, '2020-02-04 16:59:57', '2020-02-04 16:59:57'),
(25, 'er-20200406-075239', 2, 2, 1, 1, NULL, 750, NULL, '2020-04-06 13:52:39', '2020-04-06 13:52:39'),
(26, 'er-20200506-110112', 2, 2, 1, 1, NULL, 1260, NULL, '2020-05-06 17:01:12', '2020-05-06 17:01:12'),
(27, 'er-20200609-124344', 2, 1, 1, 1, NULL, 500, NULL, '2020-06-09 06:43:44', '2020-06-09 06:43:44'),
(28, 'er-20200609-124406', 2, 2, 1, 1, NULL, 1000, NULL, '2020-06-09 06:44:06', '2020-06-09 06:44:06'),
(29, 'er-20200703-064005', 2, 2, 1, 1, NULL, 630, NULL, '2020-07-03 12:40:05', '2020-07-03 12:40:05'),
(30, 'er-20200812-062947', 1, 2, 1, 1, NULL, 320, NULL, '2020-08-12 12:29:47', '2020-08-12 12:29:47'),
(31, 'er-20200812-063010', 2, 2, 1, 1, NULL, 730, NULL, '2020-08-12 12:30:10', '2020-08-12 12:30:10'),
(32, 'er-20201018-124438', 2, 1, 1, 9, 2, 100, NULL, '2020-10-18 06:44:38', '2020-10-18 06:44:38'),
(33, 'er-20201101-072257', 1, 2, 1, 1, 4, 50, NULL, '2020-11-01 01:22:57', '2020-11-01 01:22:57'),
(34, 'er-20201118-062500', 4, 1, 1, 1, 3, 200, NULL, '2020-11-18 00:25:00', '2020-11-18 00:25:00'),
(35, 'er-20201202-095431', 5, 1, 1, 28, 5, 6000, 'Sample Expense Sample Expense Sample Expense', '2020-12-02 03:54:31', '2020-12-02 03:54:31'),
(36, 'er-20210209-092256', 2, 1, 4, 28, 5, 200, 'sample note', '2021-02-09 03:22:56', '2021-02-09 03:22:56');

-- --------------------------------------------------------

--
-- Table structure for table `expense_categories`
--

CREATE TABLE `expense_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expense_categories`
--

INSERT INTO `expense_categories` (`id`, `code`, `name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, '16718342', 'washing', 1, '2018-08-16 00:32:48', '2019-03-02 07:02:07'),
(2, '60128975', 'electric bill', 1, '2018-08-16 00:39:18', '2018-08-16 00:39:18'),
(3, '83954970', 'test', 0, '2018-08-16 00:50:28', '2018-08-16 00:51:40'),
(4, '1234', 'snacks', 1, '2018-09-01 02:40:04', '2018-09-01 02:40:04'),
(5, '83694037', 'Transportation', 1, '2020-12-02 03:53:21', '2020-12-02 03:53:21');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `site_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff_access` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_format` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `developed_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_format` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` int(11) DEFAULT NULL,
  `theme` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `currency_position` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `site_title`, `address`, `phone`, `email`, `site_logo`, `currency`, `staff_access`, `date_format`, `developed_by`, `invoice_format`, `state`, `theme`, `created_at`, `updated_at`, `currency_position`) VALUES
(1, 'AtechSalesPOS', 'G.A Bhaban, 3rd Floor, Purana Paltan, Dhaka 1000', '01521100281', 'safi151@gmail.com', 'Add a heading (1).jpg', '2', 'own', 'd/m/Y', 'Acquaint Technologies', 'standard', 1, 'default.css', '2018-07-06 06:13:11', '2021-01-29 23:35:47', 'prefix');

-- --------------------------------------------------------

--
-- Table structure for table `gift_cards`
--

CREATE TABLE `gift_cards` (
  `id` int(10) UNSIGNED NOT NULL,
  `card_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double NOT NULL,
  `expense` double NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `expired_date` date DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gift_cards`
--

INSERT INTO `gift_cards` (`id`, `card_no`, `amount`, `expense`, `customer_id`, `user_id`, `expired_date`, `created_by`, `is_active`, `created_at`, `updated_at`) VALUES
(1, '3571097513020486', 1400, 450, 1, NULL, '2020-12-31', 1, 1, '2018-08-18 01:57:40', '2020-10-18 05:14:26'),
(2, '0452297501931931', 370, 100, 2, NULL, '2020-12-31', 1, 1, '2018-08-18 02:46:43', '2019-11-10 12:56:28'),
(3, '123', 13123, 0, 1, NULL, '2018-08-19', 1, 0, '2018-08-18 22:38:21', '2018-08-18 22:38:28'),
(4, '1862381252690499', 100, 0, NULL, 1, '2018-10-04', 1, 0, '2018-09-30 00:16:28', '2018-09-30 00:17:21'),
(5, '2300813717254199', 143, 0, NULL, 1, '2018-10-04', 1, 0, '2018-09-30 00:18:49', '2018-09-30 00:20:20'),
(6, '8327019475026421', 1, 0, 1, NULL, '2018-10-07', 1, 0, '2018-10-07 03:12:41', '2018-10-07 03:12:55'),
(7, '2063379780590151', 1, 0, 1, NULL, '2018-10-23', 1, 0, '2018-10-23 00:23:22', '2018-10-23 00:23:39'),
(8, '12345678', 6050, 0, NULL, 27, '2020-12-02', 28, 1, '2020-12-02 03:41:02', '2020-12-02 04:28:01');

-- --------------------------------------------------------

--
-- Table structure for table `gift_card_recharges`
--

CREATE TABLE `gift_card_recharges` (
  `id` int(10) UNSIGNED NOT NULL,
  `gift_card_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gift_card_recharges`
--

INSERT INTO `gift_card_recharges` (`id`, `gift_card_id`, `amount`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 2, 100, 1, '2018-08-24 23:08:29', '2018-08-24 23:08:29'),
(2, 1, 200, 1, '2018-08-24 23:08:50', '2018-08-24 23:08:50'),
(3, 1, 100, 1, '2018-09-04 23:50:41', '2018-09-04 23:50:41'),
(4, 1, 50, 1, '2018-09-04 23:51:38', '2018-09-04 23:51:38'),
(5, 1, 50, 1, '2018-09-04 23:53:36', '2018-09-04 23:53:36'),
(6, 2, 50, 1, '2018-09-04 23:54:34', '2018-09-04 23:54:34'),
(7, 5, 10, 1, '2018-09-30 00:19:48', '2018-09-30 00:19:48'),
(8, 5, 10, 1, '2018-09-30 00:20:04', '2018-09-30 00:20:04'),
(9, 2, 100, 1, '2018-10-07 03:13:05', '2018-10-07 03:13:05'),
(10, 1, 200, 1, '2018-10-07 03:13:39', '2018-10-07 03:13:39'),
(11, 1, 300, 1, '2018-10-23 00:22:49', '2018-10-23 00:22:49'),
(12, 8, 50, 28, '2020-12-02 04:28:01', '2020-12-02 04:28:01');

-- --------------------------------------------------------

--
-- Table structure for table `holidays`
--

CREATE TABLE `holidays` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_approved` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `holidays`
--

INSERT INTO `holidays` (`id`, `user_id`, `from_date`, `to_date`, `note`, `is_approved`, `created_at`, `updated_at`) VALUES
(12, 28, '2020-12-03', '2020-12-05', 'Test Holiday', 1, '2020-12-02 22:45:38', '2020-12-02 22:45:38'),
(13, 28, '2020-12-30', '2020-12-31', 'fever', 1, '2020-12-30 04:13:25', '2020-12-30 04:13:25');

-- --------------------------------------------------------

--
-- Table structure for table `hrm_settings`
--

CREATE TABLE `hrm_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `checkin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `checkout` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hrm_settings`
--

INSERT INTO `hrm_settings` (`id`, `checkin`, `checkout`, `created_at`, `updated_at`) VALUES
(1, '10:00am', '6:00pm', '2019-01-02 02:20:08', '2019-01-02 04:20:53');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `code`, `created_at`, `updated_at`) VALUES
(1, 'en', '2018-07-07 22:59:17', '2019-12-24 17:34:20');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_02_17_060412_create_categories_table', 1),
(4, '2018_02_20_035727_create_brands_table', 1),
(5, '2018_02_25_100635_create_suppliers_table', 1),
(6, '2018_02_27_101619_create_warehouse_table', 1),
(7, '2018_03_03_040448_create_units_table', 1),
(8, '2018_03_04_041317_create_taxes_table', 1),
(9, '2018_03_10_061915_create_customer_groups_table', 1),
(10, '2018_03_10_090534_create_customers_table', 1),
(11, '2018_03_11_095547_create_billers_table', 1),
(12, '2018_04_05_054401_create_products_table', 1),
(13, '2018_04_06_133606_create_purchases_table', 1),
(14, '2018_04_06_154600_create_product_purchases_table', 1),
(15, '2018_04_06_154915_create_product_warhouse_table', 1),
(16, '2018_04_10_085927_create_sales_table', 1),
(17, '2018_04_10_090133_create_product_sales_table', 1),
(18, '2018_04_10_090254_create_payments_table', 1),
(19, '2018_04_10_090341_create_payment_with_cheque_table', 1),
(20, '2018_04_10_090509_create_payment_with_credit_card_table', 1),
(21, '2018_04_13_121436_create_quotation_table', 1),
(22, '2018_04_13_122324_create_product_quotation_table', 1),
(23, '2018_04_14_121802_create_transfers_table', 1),
(24, '2018_04_14_121913_create_product_transfer_table', 1),
(25, '2018_05_13_082847_add_payment_id_and_change_sale_id_to_payments_table', 2),
(26, '2018_05_13_090906_change_customer_id_to_payment_with_credit_card_table', 3),
(27, '2018_05_20_054532_create_adjustments_table', 4),
(28, '2018_05_20_054859_create_product_adjustments_table', 4),
(29, '2018_05_21_163419_create_returns_table', 5),
(30, '2018_05_21_163443_create_product_returns_table', 5),
(31, '2018_06_02_050905_create_roles_table', 6),
(32, '2018_06_02_073430_add_columns_to_users_table', 7),
(33, '2018_06_03_053738_create_permission_tables', 8),
(36, '2018_06_21_063736_create_pos_setting_table', 9),
(37, '2018_06_21_094155_add_user_id_to_sales_table', 10),
(38, '2018_06_21_101529_add_user_id_to_purchases_table', 11),
(39, '2018_06_21_103512_add_user_id_to_transfers_table', 12),
(40, '2018_06_23_061058_add_user_id_to_quotations_table', 13),
(41, '2018_06_23_082427_add_is_deleted_to_users_table', 14),
(42, '2018_06_25_043308_change_email_to_users_table', 15),
(43, '2018_07_06_115449_create_general_settings_table', 16),
(44, '2018_07_08_043944_create_languages_table', 17),
(45, '2018_07_11_102144_add_user_id_to_returns_table', 18),
(46, '2018_07_11_102334_add_user_id_to_payments_table', 18),
(47, '2018_07_22_130541_add_digital_to_products_table', 19),
(49, '2018_07_24_154250_create_deliveries_table', 20),
(50, '2018_08_16_053336_create_expense_categories_table', 21),
(51, '2018_08_17_115415_create_expenses_table', 22),
(55, '2018_08_18_050418_create_gift_cards_table', 23),
(56, '2018_08_19_063119_create_payment_with_gift_card_table', 24),
(57, '2018_08_25_042333_create_gift_card_recharges_table', 25),
(58, '2018_08_25_101354_add_deposit_expense_to_customers_table', 26),
(59, '2018_08_26_043801_create_deposits_table', 27),
(60, '2018_09_02_044042_add_keybord_active_to_pos_setting_table', 28),
(61, '2018_09_09_092713_create_payment_with_paypal_table', 29),
(62, '2018_09_10_051254_add_currency_to_general_settings_table', 30),
(63, '2018_10_22_084118_add_biller_and_store_id_to_users_table', 31),
(65, '2018_10_26_034927_create_coupons_table', 32),
(66, '2018_10_27_090857_add_coupon_to_sales_table', 33),
(67, '2018_11_07_070155_add_currency_position_to_general_settings_table', 34),
(68, '2018_11_19_094650_add_combo_to_products_table', 35),
(69, '2018_12_09_043712_create_accounts_table', 36),
(70, '2018_12_17_112253_add_is_default_to_accounts_table', 37),
(71, '2018_12_19_103941_add_account_id_to_payments_table', 38),
(72, '2018_12_20_065900_add_account_id_to_expenses_table', 39),
(73, '2018_12_20_082753_add_account_id_to_returns_table', 40),
(74, '2018_12_26_064330_create_return_purchases_table', 41),
(75, '2018_12_26_144210_create_purchase_product_return_table', 42),
(76, '2018_12_26_144708_create_purchase_product_return_table', 43),
(77, '2018_12_27_110018_create_departments_table', 44),
(78, '2018_12_30_054844_create_employees_table', 45),
(79, '2018_12_31_125210_create_payrolls_table', 46),
(80, '2018_12_31_150446_add_department_id_to_employees_table', 47),
(81, '2019_01_01_062708_add_user_id_to_expenses_table', 48),
(82, '2019_01_02_075644_create_hrm_settings_table', 49),
(83, '2019_01_02_090334_create_attendances_table', 50),
(84, '2019_01_27_160956_add_three_columns_to_general_settings_table', 51),
(85, '2019_02_15_183303_create_stock_counts_table', 52),
(86, '2019_02_17_101604_add_is_adjusted_to_stock_counts_table', 53),
(87, '2019_04_13_101707_add_tax_no_to_customers_table', 54),
(89, '2019_10_14_111455_create_holidays_table', 55),
(90, '2019_11_13_145619_add_is_variant_to_products_table', 56),
(91, '2019_11_13_150206_create_product_variants_table', 57),
(92, '2019_11_13_153828_create_variants_table', 57),
(93, '2019_11_25_134041_add_qty_to_product_variants_table', 58),
(94, '2019_11_25_134922_add_variant_id_to_product_purchases_table', 58),
(95, '2019_11_25_145341_add_variant_id_to_product_warehouse_table', 58),
(96, '2019_11_29_182201_add_variant_id_to_product_sales_table', 59),
(97, '2019_12_04_121311_add_variant_id_to_product_quotation_table', 60),
(98, '2019_12_05_123802_add_variant_id_to_product_transfer_table', 61),
(100, '2019_12_08_114954_add_variant_id_to_product_returns_table', 62),
(101, '2019_12_08_203146_add_variant_id_to_purchase_product_return_table', 63),
(102, '2020_02_28_103340_create_money_transfers_table', 64),
(103, '2020_07_01_193151_add_image_to_categories_table', 65),
(105, '2020_09_26_130426_add_user_id_to_deliveries_table', 66),
(107, '2020_10_11_125457_create_cash_registers_table', 67),
(108, '2020_10_13_155019_add_cash_register_id_to_sales_table', 68),
(109, '2020_10_13_172624_add_cash_register_id_to_returns_table', 69),
(110, '2020_10_17_212338_add_cash_register_id_to_payments_table', 70),
(111, '2020_10_18_124200_add_cash_register_id_to_expenses_table', 71),
(112, '2020_10_21_121632_add_developed_by_to_general_settings_table', 72),
(113, '2019_08_19_000000_create_failed_jobs_table', 73),
(114, '2020_10_30_135557_create_notifications_table', 73),
(115, '2020_11_01_044954_create_currencies_table', 74),
(116, '2020_11_01_140736_add_price_to_product_warehouse_table', 75),
(117, '2020_11_02_050633_add_is_diff_price_to_products_table', 76),
(118, '2020_11_09_055222_add_user_id_to_customers_table', 77),
(119, '2020_11_17_054806_add_invoice_format_to_general_settings_table', 78);

-- --------------------------------------------------------

--
-- Table structure for table `money_transfers`
--

CREATE TABLE `money_transfers` (
  `id` int(10) UNSIGNED NOT NULL,
  `reference_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_account_id` int(11) NOT NULL,
  `to_account_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `money_transfers`
--

INSERT INTO `money_transfers` (`id`, `reference_no`, `from_account_id`, `to_account_id`, `amount`, `created_at`, `updated_at`) VALUES
(2, 'mtr-20200228-071852', 1, 3, 100, '2020-02-28 13:18:52', '2020-02-28 13:18:52'),
(3, 'mtr-20201202-112344', 1, 4, 200, '2020-12-02 05:23:44', '2020-12-02 05:23:44'),
(4, 'mtr-20201230-100714', 5, 4, 500, '2020-12-30 04:07:14', '2020-12-30 04:07:14'),
(5, 'mtr-20210202-045830', 3, 4, 400, '2021-02-01 22:58:30', '2021-02-01 22:58:30'),
(6, 'mtr-20210202-045946', 3, 4, 100, '2021-02-01 22:59:46', '2021-02-01 22:59:46'),
(7, 'mtr-20210202-105134', 6, 5, 1000, '2021-02-02 04:51:34', '2021-02-02 04:51:34'),
(8, 'mtr-20210202-105302', 1, 6, 3000, '2021-02-02 04:53:02', '2021-02-02 04:53:02');

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` bigint(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `newsletters`
--

INSERT INTO `newsletters` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'sales@acquaintbd.com', '2021-01-26 23:26:22', '2021-01-26 23:26:22'),
(2, 'ashiqur@gmail.com', '2021-01-26 23:28:29', '2021-01-26 23:28:29'),
(3, 'sahid@gmail.com', '2021-01-26 23:29:34', '2021-01-26 23:29:34'),
(4, 'safiulsahid151289@gmail.com', '2021-01-26 23:34:37', '2021-01-26 23:34:37');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('249beded-5431-40a3-ba1e-d255ffb047a3', 'App\\Notifications\\SendNotification', 'App\\User', 9, '{\"message\":\"Please delete all pending purchase.\"}', '2020-11-01 01:33:32', '2020-11-01 01:33:07', '2020-11-01 01:33:32');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `checkout_id` bigint(20) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_ip` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `checkout_id`, `product_id`, `product_quantity`, `product_price`, `user_ip`, `created_at`, `updated_at`) VALUES
(1, 263, 30, 1, '100', '::1', '2021-01-07 05:22:55', '2021-01-07 05:22:55');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `payment_reference` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `purchase_id` int(11) DEFAULT NULL,
  `sale_id` int(11) DEFAULT NULL,
  `cash_register_id` int(11) DEFAULT NULL,
  `account_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `change` double NOT NULL,
  `paying_method` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `payment_reference`, `user_id`, `purchase_id`, `sale_id`, `cash_register_id`, `account_id`, `amount`, `change`, `paying_method`, `payment_note`, `created_at`, `updated_at`) VALUES
(33, 'spr-20180809-055453', 1, NULL, 2, NULL, 1, 1000, 0, 'Cash', NULL, '2018-08-08 23:54:53', '2018-08-08 23:54:53'),
(34, 'spr-20180809-055553', 1, NULL, 2, NULL, 1, 1200, 0, 'Cheque', NULL, '2018-08-08 23:55:53', '2018-08-08 23:56:36'),
(35, 'spr-20180809-063214', 1, NULL, 3, NULL, 1, 897, 0, 'Cheque', NULL, '2018-08-09 00:32:14', '2018-08-09 00:32:14'),
(36, 'spr-20180825-034836', 1, NULL, 4, NULL, 1, 100, 0, 'Gift Card', '100 bucks paid...', '2018-08-24 21:48:36', '2018-08-25 00:57:35'),
(39, 'spr-20180825-083634', 1, NULL, 4, NULL, 1, 200, 0, 'Gift Card', NULL, '2018-08-25 02:36:34', '2018-08-25 02:36:34'),
(41, 'spr-20180826-094836', 1, NULL, 6, NULL, 1, 20, 0, 'Deposit', '20 bucks paid', '2018-08-26 03:48:36', '2018-08-26 21:42:13'),
(42, 'spr-20180827-073545', 1, NULL, 7, NULL, 1, 880, 0, 'Cash', NULL, '2018-08-27 01:35:45', '2018-08-27 01:35:45'),
(43, 'ppr-20180830-071637', 1, 13, NULL, NULL, 1, 100, 0, 'Cash', '100 bucks paid...', '2018-08-30 01:16:37', '2018-08-30 01:16:37'),
(44, 'ppr-20180830-090718', 1, 13, NULL, NULL, 1, 200, 0, 'Cheque', NULL, '2018-08-30 03:07:18', '2018-08-30 03:07:18'),
(46, 'spr-20180902-053954', 1, NULL, 8, NULL, 1, 3529.8, 0, 'Cash', 'fully paid', '2018-09-01 23:39:54', '2018-09-01 23:39:54'),
(49, 'spr-20180903-033314', 1, NULL, 9, NULL, 1, 20, 0, 'Deposit', 'fully paid', '2018-09-02 21:33:14', '2018-09-02 21:33:14'),
(50, 'spr-20180903-050138', 1, NULL, 10, NULL, 1, 200, 0, 'Gift Card', '50 bucks due...', '2018-09-02 23:01:38', '2018-09-09 21:40:28'),
(51, 'spr-20180903-100821', 1, NULL, 11, NULL, 1, 5500, 0, 'Cheque', NULL, '2018-09-03 04:08:21', '2018-09-03 04:08:21'),
(53, 'ppr-20180903-101524', 1, 16, NULL, NULL, 1, 1750, 0, 'Cheque', NULL, '2018-09-03 04:15:24', '2018-10-06 01:09:20'),
(78, 'spr-20180926-092105', 1, NULL, 31, NULL, 1, 560, 0, 'Cash', NULL, '2018-09-26 03:21:05', '2018-09-26 03:21:05'),
(79, 'spr-20181006-065017', 1, NULL, 30, NULL, 1, 100, 0, 'Cheque', NULL, '2018-10-06 00:50:17', '2018-10-06 00:51:55'),
(80, 'spr-20181006-065222', 1, NULL, 30, NULL, 1, 20, 0, 'Cash', NULL, '2018-10-06 00:52:22', '2018-10-06 00:52:22'),
(82, 'ppr-20181006-070935', 1, 16, NULL, NULL, 1, 1600, 0, 'Cash', NULL, '2018-10-06 01:09:35', '2018-10-06 01:09:35'),
(83, 'spr-20181010-041636', 1, NULL, 41, NULL, 1, 461, 0, 'Cash', NULL, '2018-10-09 22:16:36', '2018-10-09 22:16:36'),
(84, 'spr-20181010-053456', 1, NULL, 42, NULL, 1, 440, 0, 'Cash', NULL, '2018-10-09 23:34:56', '2018-10-09 23:34:56'),
(91, 'spr-20181021-065338', 1, NULL, 55, NULL, 1, 250, 0, 'Cash', NULL, '2018-10-21 00:53:38', '2018-10-21 00:53:38'),
(92, 'spr-20181021-082618', 1, NULL, 57, NULL, 1, 575.2, 0, 'Cash', NULL, '2018-10-21 02:26:18', '2018-10-21 02:26:18'),
(93, 'spr-20181022-032730', 1, NULL, 58, NULL, 1, 1220, 0, 'Cash', NULL, '2018-10-22 09:27:30', '2018-10-22 09:27:30'),
(104, 'spr-20181023-071548', 11, NULL, 73, NULL, 1, 5500, 0, 'Cash', NULL, '2018-10-23 01:15:48', '2018-10-23 01:15:48'),
(105, 'spr-20181023-071648', 1, NULL, 74, NULL, 1, 2320, 0, 'Cash', NULL, '2018-10-23 01:16:48', '2018-10-23 01:16:48'),
(126, 'spr-20181101-050033', 1, NULL, 75, NULL, 1, 7678, 0, 'Cash', NULL, '2018-10-31 23:00:33', '2018-10-31 23:00:33'),
(127, 'spr-20181101-050130', 1, NULL, 76, NULL, 1, 1424, 0, 'Cash', NULL, '2018-10-31 23:01:30', '2018-11-08 03:44:51'),
(129, 'spr-20181105-091523', 1, NULL, 79, NULL, 1, 14454, 0, 'Cash', NULL, '2018-11-05 03:15:23', '2018-11-05 03:15:23'),
(130, 'spr-20181105-092002', 1, NULL, 80, NULL, 1, 2500, 0, 'Cash', NULL, '2018-11-05 03:20:02', '2018-11-05 03:20:02'),
(131, 'ppr-20181105-092128', 1, 24, NULL, NULL, 1, 15950, 0, 'Cash', NULL, '2018-11-05 03:21:28', '2018-11-05 03:21:28'),
(137, 'spr-20181105-095952', 1, NULL, 86, NULL, 1, 1100, 0, 'Cash', NULL, '2018-11-05 03:59:52', '2018-11-05 03:59:52'),
(138, 'spr-20181105-100310', 1, NULL, 88, NULL, 1, 1100, 0, 'Cash', NULL, '2018-11-05 04:03:10', '2018-11-05 04:03:10'),
(139, 'spr-20181126-020534', 1, NULL, 94, NULL, 1, 120, 0, 'Cash', NULL, '2018-11-26 08:05:34', '2018-11-26 08:05:34'),
(140, 'spr-20181128-071515', 1, NULL, 96, NULL, 1, 132, 0, 'Cash', NULL, '2018-11-28 01:15:15', '2018-11-28 01:15:15'),
(141, 'spr-20181201-060524', 1, NULL, 97, NULL, 1, 200, 300, 'Cash', NULL, '2018-12-01 00:05:24', '2018-12-04 00:21:05'),
(148, 'ppr-20181204-065932', 1, 23, NULL, NULL, 1, 500, 500, 'Cash', NULL, '2018-12-04 00:59:32', '2018-12-04 00:59:44'),
(149, 'ppr-20181205-053443', 1, 25, NULL, NULL, 1, 4450, 550, 'Cash', NULL, '2018-12-04 23:34:43', '2018-12-04 23:34:43'),
(150, 'spr-20181205-053608', 1, NULL, 98, NULL, 1, 800, 200, 'Cash', NULL, '2018-12-04 23:36:08', '2018-12-04 23:36:08'),
(151, 'spr-20181205-053724', 1, NULL, 99, NULL, 1, 800, 0, 'Cash', NULL, '2018-12-04 23:37:24', '2018-12-04 23:37:24'),
(152, 'spr-20181208-062032', 1, NULL, 101, NULL, 1, 100, 400, 'Cash', NULL, '2018-12-08 00:20:32', '2018-12-11 03:19:39'),
(157, 'ppr-20181220-063439', 1, 27, NULL, NULL, 1, 10, 0, 'Cash', NULL, '2018-12-20 00:34:39', '2018-12-20 00:35:01'),
(159, 'spr-20181224-045832', 1, NULL, 103, NULL, 1, 120, 0, 'Cash', NULL, '2018-12-23 22:58:32', '2018-12-23 22:58:32'),
(160, 'spr-20190101-054544', 1, NULL, 105, NULL, 1, 21, 0, 'Cash', NULL, '2018-12-31 23:45:44', '2018-12-31 23:45:44'),
(161, 'spr-20190101-091040', 1, NULL, 106, NULL, 1, 860, 0, 'Cash', NULL, '2019-01-01 03:10:40', '2019-01-01 03:10:40'),
(162, 'spr-20190103-065627', 1, NULL, 107, NULL, 1, 5040, 960, 'Cash', NULL, '2019-01-03 00:56:27', '2019-01-03 00:56:27'),
(163, 'spr-20190120-035824', 1, NULL, 108, NULL, 1, 120, 0, 'Cash', NULL, '2019-01-20 09:58:24', '2019-01-20 09:58:24'),
(164, 'ppr-20190129-100302', 9, 36, NULL, NULL, 1, 650, 350, 'Cash', NULL, '2019-01-29 04:03:02', '2019-01-29 04:03:02'),
(165, 'ppr-20190129-100324', 9, 34, NULL, NULL, 1, 2860, 140, 'Cash', NULL, '2019-01-29 04:03:24', '2019-01-29 04:03:24'),
(166, 'spr-20190129-101451', 9, NULL, 109, NULL, 1, 540, 460, 'Cash', NULL, '2019-01-29 04:14:51', '2019-01-29 04:14:51'),
(167, 'spr-20190129-115048', 9, NULL, 110, NULL, 1, 1700, 300, 'Cash', NULL, '2019-01-29 05:50:48', '2019-01-29 05:50:48'),
(168, 'spr-20190131-110839', 9, NULL, 111, NULL, 1, 271, 0, 'Cash', NULL, '2019-01-31 05:08:39', '2019-01-31 05:08:39'),
(169, 'spr-20190202-104045', 1, NULL, 112, NULL, 1, 440, 0, 'Cash', NULL, '2019-02-02 04:40:45', '2019-02-02 04:40:45'),
(170, 'spr-20190202-114117', 1, NULL, 113, NULL, 1, 350, 0, 'Cash', NULL, '2019-02-02 05:41:17', '2019-02-02 05:41:17'),
(171, 'spr-20190205-030454', 1, NULL, 114, NULL, 1, 440, 0, 'Cash', NULL, '2019-02-05 09:04:54', '2019-02-05 09:04:54'),
(176, 'ppr-20190207-125418', 1, 35, NULL, NULL, 1, 50, 50, 'Cash', NULL, '2019-02-07 06:54:18', '2019-02-07 07:05:23'),
(178, 'ppr-20190207-010640', 1, 35, NULL, NULL, 1, 50, 50, 'Cheque', NULL, '2019-02-07 07:06:40', '2019-02-07 07:07:04'),
(179, 'spr-20190207-010915', 1, NULL, 120, NULL, 1, 50, 50, 'Cash', NULL, '2019-02-07 07:09:15', '2019-02-07 07:09:15'),
(180, 'spr-20190209-104816', 1, NULL, 121, NULL, 1, 1272, 728, 'Cash', NULL, '2019-02-09 04:48:16', '2019-02-09 04:48:16'),
(181, 'ppr-20190209-104940', 1, 38, NULL, NULL, 1, 1660, 0, 'Cash', NULL, '2019-02-09 04:49:40', '2019-02-09 04:49:40'),
(182, 'ppr-20190209-104959', 1, 39, NULL, NULL, 1, 973.5, 0, 'Cash', NULL, '2019-02-09 04:49:59', '2019-02-09 04:49:59'),
(183, 'spr-20190219-023214', 1, NULL, 123, NULL, 1, 440, 0, 'Cash', NULL, '2019-02-19 08:32:14', '2019-02-19 08:32:14'),
(189, 'spr-20190303-104010', 1, NULL, 127, NULL, 1, 2500, 0, 'Cash', NULL, '2019-03-03 04:40:10', '2019-03-03 04:40:10'),
(190, 'ppr-20190303-104046', 1, 40, NULL, NULL, 1, 100, 0, 'Cash', NULL, '2019-03-03 04:40:46', '2019-03-03 04:40:46'),
(191, 'ppr-20190303-104222', 1, 37, NULL, NULL, 1, 4000, 0, 'Cash', NULL, '2019-03-03 04:42:22', '2019-03-03 04:42:22'),
(192, 'ppr-20190303-104414', 1, 41, NULL, NULL, 1, 1000, 0, 'Cash', NULL, '2019-03-03 04:44:14', '2019-03-03 04:44:14'),
(193, 'spr-20190404-095555', 1, NULL, 128, NULL, 1, 560, 0, 'Cash', NULL, '2019-04-04 03:55:55', '2019-04-04 03:55:55'),
(194, 'ppr-20190404-095910', 1, 42, NULL, NULL, 1, 300, 200, 'Cash', NULL, '2019-04-04 03:59:10', '2019-04-13 10:52:38'),
(195, 'spr-20190404-095937', 1, NULL, 129, NULL, 1, 120, 0, 'Cash', NULL, '2019-04-04 03:59:37', '2019-04-04 03:59:37'),
(196, 'spr-20190421-122124', 1, NULL, 130, NULL, 1, 586, 0, 'Cash', NULL, '2019-04-21 06:21:24', '2019-04-21 06:21:24'),
(197, 'spr-20190528-103229', 1, NULL, 131, NULL, 1, 2890, 0, 'Cash', NULL, '2019-05-28 04:32:29', '2019-05-28 04:32:29'),
(198, 'ppr-20190613-101351', 1, 37, NULL, NULL, 1, 2390, 0, 'Cash', NULL, '2019-06-13 04:13:51', '2019-06-13 04:13:51'),
(199, 'spr-20190613-101637', 1, NULL, 132, NULL, 1, 840, 0, 'Cash', NULL, '2019-06-13 04:16:37', '2019-06-13 04:16:37'),
(200, 'ppr-20190613-101713', 1, 43, NULL, NULL, 1, 1000, 0, 'Cash', NULL, '2019-06-13 04:17:13', '2019-06-13 04:17:13'),
(201, 'spr-20190613-101752', 1, NULL, 133, NULL, 1, 2700, 0, 'Cash', NULL, '2019-06-13 04:17:52', '2019-06-13 04:17:52'),
(202, 'ppr-20191019-032925', 1, 43, NULL, NULL, 1, 3290, 710, 'Cash', NULL, '2019-10-19 09:29:25', '2019-10-19 09:29:25'),
(203, 'spr-20191019-033028', 1, NULL, 134, NULL, 1, 2940, 60, 'Cash', NULL, '2019-10-19 09:30:28', '2019-10-19 09:30:28'),
(205, 'spr-20191103-114044', 1, NULL, 139, NULL, 1, 488, 12, 'Cash', NULL, '2019-11-03 05:40:44', '2019-11-03 05:40:44'),
(206, 'ppr-20191103-114222', 1, 46, NULL, NULL, 1, 200, 0, 'Cash', NULL, '2019-11-03 05:42:22', '2019-11-03 05:42:22'),
(211, 'spr-20191109-074131', 1, NULL, 144, NULL, 1, 1220, 0, 'Cash', NULL, '2019-11-09 13:41:31', '2019-11-09 13:41:31'),
(216, 'ppr-20191111-103911', 1, 49, NULL, NULL, 1, 5000, 0, 'Cheque', NULL, '2019-11-11 04:39:11', '2019-11-11 04:39:11'),
(217, 'spr-20191111-104008', 1, NULL, 147, NULL, 1, 2220, 780, 'Cash', NULL, '2019-11-11 04:40:08', '2019-11-11 04:40:08'),
(222, 'spr-20191203-115128', 1, NULL, 163, NULL, 1, 3, 0, 'Cash', NULL, '2019-12-03 05:51:28', '2019-12-03 05:51:28'),
(227, 'ppr-20191204-111124', 1, 57, NULL, NULL, 1, 220, 280, 'Cash', NULL, '2019-12-04 17:11:24', '2019-12-04 17:11:24'),
(228, 'spr-20191205-092712', 1, NULL, 173, NULL, 1, 621, 0, 'Cash', NULL, '2019-12-05 03:27:12', '2019-12-05 03:27:12'),
(239, 'spr-20191222-104058', 1, NULL, 187, NULL, 1, 288, 212, 'Cash', NULL, '2019-12-22 04:40:58', '2019-12-22 04:40:58'),
(241, 'spr-20191223-125946', 1, NULL, 190, NULL, 1, 1100, 400, 'Cash', NULL, '2019-12-23 06:59:46', '2019-12-23 06:59:46'),
(244, 'ppr-20200101-010750', 1, 61, NULL, NULL, 1, 60, 0, 'Cash', NULL, '2020-01-01 07:07:50', '2020-01-01 07:07:50'),
(246, 'spr-20200101-022028', 1, NULL, 193, NULL, 1, 1100, 400, 'Cash', NULL, '2020-01-01 08:20:28', '2020-01-01 08:20:28'),
(247, 'ppr-20200101-022131', 1, 59, NULL, NULL, 1, 6, 0, 'Cash', NULL, '2020-01-01 08:21:31', '2020-01-01 08:21:31'),
(248, 'ppr-20200101-022137', 1, 58, NULL, NULL, 1, 4, 0, 'Cash', NULL, '2020-01-01 08:21:37', '2020-01-01 08:21:37'),
(249, 'ppr-20200101-022144', 1, 56, NULL, NULL, 1, 2, 0, 'Cash', NULL, '2020-01-01 08:21:44', '2020-01-01 08:21:44'),
(250, 'ppr-20200101-022152', 1, 55, NULL, NULL, 1, 4, 0, 'Cash', NULL, '2020-01-01 08:21:52', '2020-01-01 08:21:52'),
(251, 'ppr-20200101-022225', 1, 49, NULL, NULL, 1, 2000, 0, 'Cash', NULL, '2020-01-01 08:22:25', '2020-01-01 08:22:25'),
(252, 'spr-20200102-043947', 1, NULL, 194, NULL, 1, 892, 108, 'Cash', NULL, '2020-01-02 10:39:47', '2020-01-02 10:39:47'),
(258, 'spr-20200203-035256', 1, NULL, 201, NULL, 1, 120, 880, 'Cash', NULL, '2020-02-03 09:52:56', '2020-02-03 09:52:56'),
(259, 'spr-20200204-105853', 1, NULL, 202, NULL, 1, 1400, 100, 'Cash', NULL, '2020-02-04 16:58:53', '2020-02-04 16:58:53'),
(260, 'ppr-20200204-110050', 1, 67, NULL, NULL, 1, 300, 0, 'Cash', NULL, '2020-02-04 17:00:50', '2020-02-04 17:00:50'),
(261, 'spr-20200302-115414', 1, NULL, 203, NULL, 1, 350, 150, 'Cash', NULL, '2020-03-02 05:54:14', '2020-03-02 05:54:14'),
(262, 'spr-20200302-115741', 1, NULL, 204, NULL, 1, 40, 10, 'Cash', NULL, '2020-03-02 05:57:41', '2020-03-02 05:57:41'),
(263, 'ppr-20200302-115811', 1, 70, NULL, NULL, 1, 50, 0, 'Cash', NULL, '2020-03-02 05:58:11', '2020-03-02 05:58:11'),
(264, 'ppr-20200302-115820', 1, 69, NULL, NULL, 1, 50, 0, 'Cash', NULL, '2020-03-02 05:58:20', '2020-03-02 05:58:20'),
(265, 'spr-20200311-044642', 1, NULL, 205, NULL, 1, 352, 148, 'Cash', NULL, '2020-03-11 10:46:42', '2020-03-11 10:46:42'),
(266, 'ppr-20200406-073823', 1, 71, NULL, NULL, 1, 2000, 1000, 'Cash', 'First Payment', '2020-04-06 13:38:23', '2020-04-06 13:38:55'),
(267, 'spr-20200406-074024', 1, NULL, 207, NULL, 1, 500, 500, 'Cash', NULL, '2020-04-06 13:40:24', '2020-04-06 13:40:24'),
(268, 'spr-20200406-074201', 1, NULL, 207, NULL, 1, 144, 56, 'Cash', NULL, '2020-04-06 13:42:01', '2020-04-06 13:42:01'),
(269, 'spr-20200506-105950', 1, NULL, 208, NULL, 1, 1540, 460, 'Cash', NULL, '2020-05-06 16:59:50', '2020-05-06 16:59:50'),
(270, 'spr-20200609-124248', 1, NULL, 209, NULL, 1, 1220, 780, 'Cash', NULL, '2020-06-09 06:42:48', '2020-06-09 06:42:48'),
(273, 'spr-20200703-063914', 1, NULL, 212, NULL, 1, 2585, 415, 'Cash', NULL, '2020-07-03 12:39:14', '2020-07-03 12:39:14'),
(274, 'spr-20200712-095153', 1, NULL, 213, NULL, 1, 13, 37, 'Cash', NULL, '2020-07-12 15:51:53', '2020-07-12 15:51:53'),
(276, 'spr-20200727-083808', 1, NULL, 217, NULL, 1, 385, 0, 'Cash', NULL, '2020-07-27 14:38:08', '2020-07-27 14:38:08'),
(277, 'spr-20200727-084024', 1, NULL, 218, NULL, 1, 385, 0, 'Cash', NULL, '2020-07-27 14:40:24', '2020-07-27 14:40:24'),
(278, 'spr-20200727-084645', 1, NULL, 219, NULL, 1, 385, 0, 'Cash', NULL, '2020-07-27 14:46:45', '2020-07-27 14:46:45'),
(279, 'spr-20200812-062806', 1, NULL, 220, NULL, 1, 760, 240, 'Cash', NULL, '2020-08-12 12:28:06', '2020-08-12 12:28:06'),
(280, 'ppr-20200812-062853', 1, 62, NULL, NULL, 1, 1650, 0, 'Cash', NULL, '2020-08-12 12:28:53', '2020-08-12 12:28:53'),
(281, 'spr-20200812-063035', 1, NULL, 221, NULL, 1, 1100, 0, 'Cash', NULL, '2020-08-12 12:30:35', '2020-08-12 12:30:35'),
(282, 'spr-20200816-100426', 1, NULL, 222, NULL, 1, 23000, 2000, 'Cash', NULL, '2020-08-16 16:04:26', '2020-08-16 16:04:26'),
(283, 'spr-20200816-100523', 1, NULL, 223, NULL, 1, 300, 200, 'Cash', NULL, '2020-08-16 16:05:23', '2020-08-16 16:05:23'),
(284, 'spr-20200816-100632', 1, NULL, 223, NULL, 1, 100, 0, 'Cash', NULL, '2020-08-16 16:06:32', '2020-08-16 16:06:32'),
(285, 'spr-20200816-100735', 1, NULL, 223, NULL, 1, 40, 0, 'Cash', NULL, '2020-08-16 16:07:35', '2020-08-16 16:07:35'),
(290, 'spr-20201017-092854', 9, NULL, 230, 2, 1, 200, 0, 'Cash', NULL, '2020-10-17 15:28:54', '2020-10-18 04:48:54'),
(291, 'spr-20201018-105138', 9, NULL, 230, 2, 1, 50, 0, 'Cash', NULL, '2020-10-18 04:51:38', '2020-10-18 04:51:38'),
(292, 'spr-20201018-111333', 9, NULL, 231, 2, 1, 100, 0, 'Cash', NULL, '2020-10-18 05:13:33', '2020-10-18 05:13:33'),
(293, 'spr-20201018-111426', 9, NULL, 231, 2, 1, 50, 0, 'Gift Card', NULL, '2020-10-18 05:14:26', '2020-10-18 05:14:26'),
(294, 'spr-20201018-111651', 9, NULL, 231, 2, 1, 50, 0, 'Credit Card', NULL, '2020-10-18 05:16:51', '2020-10-18 05:16:51'),
(295, 'spr-20201018-111724', 9, NULL, 231, 2, 1, 50, 0, 'Cheque', NULL, '2020-10-18 05:17:24', '2020-10-18 05:17:24'),
(296, 'spr-20201022-013018', 9, NULL, 232, 2, 1, 100, 0, 'Cash', NULL, '2020-10-22 07:30:18', '2020-10-22 07:30:18'),
(297, 'spr-20201022-015606', 1, NULL, 233, 3, 1, 250, 0, 'Cash', NULL, '2020-10-22 07:56:06', '2020-10-22 07:56:06'),
(298, 'spr-20201024-070508', 1, NULL, 234, 4, 1, 11500, 0, 'Cash', NULL, '2020-10-24 01:05:08', '2020-10-24 01:05:08'),
(299, 'spr-20201024-070753', 1, NULL, 235, 4, 1, 250, 0, 'Cash', NULL, '2020-10-24 01:07:53', '2020-10-24 01:07:53'),
(300, 'spr-20201024-034619', 1, NULL, 237, 4, 1, 61900, 0, 'Cash', NULL, '2020-10-24 09:46:19', '2020-10-24 09:46:19'),
(302, 'spr-20201027-054004', 1, NULL, 239, 3, 1, 2, 0, 'Cash', NULL, '2020-10-26 23:40:04', '2020-10-26 23:40:04'),
(303, 'spr-20201027-054207', 1, NULL, 240, 3, 1, 6, 0, 'Cash', NULL, '2020-10-26 23:42:07', '2020-10-26 23:42:07'),
(304, 'spr-20201027-063202', 1, NULL, 241, 4, 1, 250, 0, 'Cash', NULL, '2020-10-27 00:32:02', '2020-10-27 00:32:02'),
(305, 'spr-20201029-073033', 1, NULL, 242, 4, 1, 250, 0, 'Cash', NULL, '2020-10-29 01:30:33', '2020-10-29 01:30:33'),
(306, 'spr-20201101-072115', 1, NULL, 243, 4, 1, 250, 0, 'Cash', NULL, '2020-11-01 01:21:15', '2020-11-01 01:21:15'),
(307, 'spr-20201101-074225', 1, NULL, 245, 3, 1, 1130, 0, 'Cash', NULL, '2020-11-01 01:42:25', '2020-11-01 01:42:25'),
(308, 'spr-20201101-075019', 1, NULL, 246, 4, 1, 440, 0, 'Cash', NULL, '2020-11-01 01:50:19', '2020-11-01 01:50:19'),
(310, 'spr-20201106-013042', 1, NULL, 250, 4, 1, 378.4, 0, 'Cash', NULL, '2020-11-06 07:30:42', '2020-11-06 07:30:42'),
(311, 'spr-20201109-011527', 1, NULL, 251, 4, 1, 500, 0, 'Cash', NULL, '2020-11-09 07:15:27', '2020-11-09 07:15:27'),
(312, 'spr-20201111-055902', 1, NULL, 252, 3, 1, 229.5, 0, 'Cash', NULL, '2020-11-10 23:59:02', '2020-11-10 23:59:02'),
(313, 'spr-20201114-064739', 1, NULL, 253, 4, 1, 10242.5, 0, 'Cash', NULL, '2020-11-14 00:47:39', '2020-11-14 00:47:39'),
(316, 'spr-20201117-064751', 1, NULL, 256, 4, 1, 715, 0, 'Cash', NULL, '2020-11-17 00:47:51', '2020-11-17 00:47:51'),
(317, 'spr-20201117-070920', 1, NULL, 257, 4, 1, 250, 0, 'Cash', NULL, '2020-11-17 01:09:20', '2020-11-17 01:09:20'),
(320, 'ppr-20201118-062036', 1, 90, NULL, NULL, 1, 33000, 0, 'Cash', NULL, '2020-11-18 00:20:36', '2020-11-18 00:20:36'),
(321, 'spr-20201118-065242', 1, NULL, 258, 4, 1, 27200, 0, 'Cash', NULL, '2020-11-18 00:52:42', '2020-11-18 00:52:42'),
(322, 'ppr-20201202-064039', 28, 93, NULL, NULL, 1, 544.5, 60000, 'Cash', 'demo notes demo notes demo notes demo notes', '2020-12-02 00:40:39', '2020-12-02 00:40:39'),
(323, 'ppr-20201202-064240', 28, 93, NULL, NULL, 1, 6000, 54000, 'Cheque', 'sample', '2020-12-02 00:42:40', '2020-12-02 00:42:40'),
(324, 'ppr-20201202-064351', 28, 93, NULL, NULL, 3, 54000, 0, 'Cash', 'test', '2020-12-02 00:43:51', '2020-12-02 00:43:51'),
(325, 'spr-20201202-094020', 28, NULL, 259, NULL, 1, 111751, 0, 'Cash', NULL, '2020-12-02 03:40:20', '2020-12-02 03:40:20'),
(326, 'ppr-20201230-054931', 28, 95, NULL, NULL, 4, 55054.5, 0, 'Cash', 'paradoxical sajid', '2020-12-29 23:49:31', '2020-12-29 23:49:31'),
(327, 'ppr-20210106-034340', 28, 96, NULL, NULL, 4, 12500, 0, 'Cash', NULL, '2021-01-05 21:43:40', '2021-01-05 21:43:40'),
(328, 'spr-20210106-044145', 28, NULL, 261, 7, 4, 2510, 0, 'Cash', NULL, '2021-01-05 22:41:45', '2021-01-05 22:41:45'),
(329, 'spr-20210107-112337', 28, NULL, 263, 5, 4, 200, 0, 'Cash', NULL, '2021-01-07 05:23:37', '2021-01-07 05:23:37'),
(330, 'spr-20210113-110318', 28, NULL, 266, 5, 4, 2990, 0, 'Cash', NULL, '2021-01-13 05:03:18', '2021-01-13 05:03:18'),
(331, 'spr-20210113-110845', 28, NULL, 265, 9, 4, 440, 0, 'Cash', NULL, '2021-01-13 05:08:45', '2021-01-13 05:08:45'),
(332, 'spr-20210114-042348', 28, NULL, 267, 5, 4, 3294, 0, 'Cash', NULL, '2021-01-13 22:23:48', '2021-01-13 22:23:48'),
(333, 'spr-20210114-064345', 28, NULL, 268, 5, 4, 20, 13, 'Cash', NULL, '2021-01-14 00:43:45', '2021-01-14 00:43:45'),
(334, 'spr-20210116-054936', 28, NULL, 269, 5, 4, 4000, 2000, 'Cash', NULL, '2021-01-15 23:49:36', '2021-01-15 23:49:36'),
(335, 'spr-20210116-055137', 28, NULL, 269, 5, 4, 2000, 0, 'Cash', NULL, '2021-01-15 23:51:37', '2021-01-15 23:51:37'),
(336, 'ppr-20210116-112339', 28, 97, NULL, NULL, 4, 50000, 0, 'Cash', NULL, '2021-01-16 05:23:39', '2021-01-16 05:23:39'),
(337, 'spr-20210118-084038', 28, NULL, 271, 5, 4, 3, 0, 'Cash', NULL, '2021-01-18 02:40:38', '2021-01-18 02:40:38'),
(338, 'spr-20210118-084326', 28, NULL, 270, 5, 4, 300, 0, 'Cash', NULL, '2021-01-18 02:43:26', '2021-01-18 02:43:26'),
(339, 'spr-20210123-072510', 28, NULL, 275, 5, 4, 3000, 0, 'Cash', NULL, '2021-01-23 01:25:10', '2021-01-23 01:25:10'),
(340, 'spr-20210123-073301', 28, NULL, 274, 5, 4, 1250, 0, 'Cash', NULL, '2021-01-23 01:33:01', '2021-01-23 01:33:01'),
(341, 'spr-20210123-105909', 28, NULL, 276, 7, 4, 42, 0, 'Cash', NULL, '2021-01-23 04:59:09', '2021-01-23 04:59:09'),
(342, 'spr-20210128-102632', 28, NULL, 279, 5, 4, 454.37, 0, 'Cash', NULL, '2021-01-28 04:26:32', '2021-01-28 04:26:32'),
(343, 'spr-20210128-102848', 28, NULL, 281, 5, 4, 40, 0, 'Cash', NULL, '2021-01-28 04:28:48', '2021-01-28 04:28:48'),
(344, 'spr-20210128-103949', 28, NULL, 278, 5, 4, 46683.14, 0, 'Cash', NULL, '2021-01-28 04:39:49', '2021-01-28 04:39:49'),
(345, 'ppr-20210203-053356', 28, 99, NULL, NULL, 4, 90000, 0, 'Cash', NULL, '2021-02-02 23:33:56', '2021-02-02 23:33:56'),
(346, 'spr-20210203-072357', 28, NULL, 296, 5, 4, 554, 0, 'Cash', NULL, '2021-02-03 01:23:57', '2021-02-03 01:23:57'),
(347, 'ppr-20210207-094432', 28, 106, NULL, NULL, 4, 18000, 0, 'Cash', NULL, '2021-02-07 03:44:32', '2021-02-07 03:44:32'),
(348, 'spr-20210213-065200', 28, NULL, 311, 5, 4, 117328, 0, 'Cash', NULL, '2021-02-13 00:52:00', '2021-02-13 00:52:00'),
(349, 'spr-20210213-065355', 28, NULL, 312, 5, 4, 1149, 0, 'Cash', NULL, '2021-02-13 00:53:55', '2021-02-13 00:53:55');

-- --------------------------------------------------------

--
-- Table structure for table `payment_with_cheque`
--

CREATE TABLE `payment_with_cheque` (
  `id` int(10) UNSIGNED NOT NULL,
  `payment_id` int(11) NOT NULL,
  `cheque_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_with_cheque`
--

INSERT INTO `payment_with_cheque` (`id`, `payment_id`, `cheque_no`, `created_at`, `updated_at`) VALUES
(1, 19, '23425235235', '2018-07-01 03:09:48', '2018-07-01 03:09:48'),
(2, 24, '3123123123', '2018-07-10 01:21:32', '2018-07-10 01:21:32'),
(3, 31, '767867678', '2018-08-08 10:36:22', '2018-08-08 10:36:22'),
(4, 34, '3123412', '2018-08-08 23:55:54', '2018-08-08 23:55:54'),
(5, 35, '7765', '2018-08-09 00:32:14', '2018-08-09 00:32:14'),
(6, 44, '3124142412', '2018-08-30 03:07:18', '2018-08-30 03:07:18'),
(7, 51, '6576764646', '2018-09-03 04:08:21', '2018-09-03 04:08:21'),
(8, 53, '111111111', '2018-09-03 04:15:24', '2018-09-03 04:15:24'),
(9, 79, '1111', '2018-10-06 00:51:55', '2018-10-06 00:51:55'),
(10, 147, '221133', '2018-12-04 00:58:35', '2018-12-04 00:58:35'),
(11, 175, '1111', '2019-02-07 06:38:23', '2019-02-07 06:38:23'),
(12, 176, '1111', '2019-02-07 06:54:59', '2019-02-07 06:54:59'),
(13, 178, '420', '2019-02-07 07:07:04', '2019-02-07 07:07:04'),
(14, 216, '12344321', '2019-11-11 04:39:11', '2019-11-11 04:39:11'),
(15, 295, '111122222', '2020-10-18 05:17:24', '2020-10-18 05:17:24'),
(16, 323, '12345678', '2020-12-02 00:42:40', '2020-12-02 00:42:40');

-- --------------------------------------------------------

--
-- Table structure for table `payment_with_credit_card`
--

CREATE TABLE `payment_with_credit_card` (
  `id` int(10) UNSIGNED NOT NULL,
  `payment_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `customer_stripe_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `charge_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_with_credit_card`
--

INSERT INTO `payment_with_credit_card` (`id`, `payment_id`, `customer_id`, `customer_stripe_id`, `charge_id`, `created_at`, `updated_at`) VALUES
(4, 294, 1, 'cus_IDw8z9yJZn4qH3', 'ch_1HdUGJKwOmA8HLXePiqphlky', '2020-10-18 05:16:55', '2020-10-18 05:16:55');

-- --------------------------------------------------------

--
-- Table structure for table `payment_with_gift_card`
--

CREATE TABLE `payment_with_gift_card` (
  `id` int(10) UNSIGNED NOT NULL,
  `payment_id` int(11) NOT NULL,
  `gift_card_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_with_gift_card`
--

INSERT INTO `payment_with_gift_card` (`id`, `payment_id`, `gift_card_id`, `created_at`, `updated_at`) VALUES
(1, 36, 2, '2018-08-24 21:48:36', '2018-08-25 00:57:35'),
(4, 39, 1, '2018-08-25 02:36:34', '2018-08-25 02:36:34'),
(6, 50, 1, '2018-09-02 23:01:38', '2018-09-02 23:01:38'),
(8, 293, 1, '2020-10-18 05:14:26', '2020-10-18 05:14:26');

-- --------------------------------------------------------

--
-- Table structure for table `payment_with_paypal`
--

CREATE TABLE `payment_with_paypal` (
  `id` int(10) UNSIGNED NOT NULL,
  `payment_id` int(11) NOT NULL,
  `transaction_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payrolls`
--

CREATE TABLE `payrolls` (
  `id` int(10) UNSIGNED NOT NULL,
  `reference_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `paying_method` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payrolls`
--

INSERT INTO `payrolls` (`id`, `reference_no`, `employee_id`, `account_id`, `user_id`, `amount`, `paying_method`, `note`, `created_at`, `updated_at`) VALUES
(8, 'payroll-20190101-055231', 1, 1, 1, 100, '0', NULL, '2018-12-31 23:52:31', '2018-12-31 23:52:31'),
(9, 'payroll-20191204-113802', 1, 1, 1, 10000, '0', NULL, '2019-12-04 17:38:02', '2019-12-04 17:38:02'),
(10, 'payroll-20201203-044446', 1, 4, 28, 12000, '0', 'Sample Payroll', '2020-12-02 22:44:46', '2020-12-02 22:44:46'),
(11, 'payroll-20201230-101238', 6, 5, 28, 1000, '0', 'payroll test', '2020-12-30 04:12:38', '2020-12-30 04:12:38'),
(12, 'payroll-20210202-110907', 6, 6, 28, 1000, '0', 'Internet Bills', '2021-02-02 05:09:07', '2021-02-02 05:09:07');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(4, 'products-edit', 'web', '2018-06-03 01:00:09', '2018-06-03 01:00:09'),
(5, 'products-delete', 'web', '2018-06-03 22:54:22', '2018-06-03 22:54:22'),
(6, 'products-add', 'web', '2018-06-04 00:34:14', '2018-06-04 00:34:14'),
(7, 'products-index', 'web', '2018-06-04 03:34:27', '2018-06-04 03:34:27'),
(8, 'purchases-index', 'web', '2018-06-04 08:03:19', '2018-06-04 08:03:19'),
(9, 'purchases-add', 'web', '2018-06-04 08:12:25', '2018-06-04 08:12:25'),
(10, 'purchases-edit', 'web', '2018-06-04 09:47:36', '2018-06-04 09:47:36'),
(11, 'purchases-delete', 'web', '2018-06-04 09:47:36', '2018-06-04 09:47:36'),
(12, 'sales-index', 'web', '2018-06-04 10:49:08', '2018-06-04 10:49:08'),
(13, 'sales-add', 'web', '2018-06-04 10:49:52', '2018-06-04 10:49:52'),
(14, 'sales-edit', 'web', '2018-06-04 10:49:52', '2018-06-04 10:49:52'),
(15, 'sales-delete', 'web', '2018-06-04 10:49:53', '2018-06-04 10:49:53'),
(16, 'quotes-index', 'web', '2018-06-04 22:05:10', '2018-06-04 22:05:10'),
(17, 'quotes-add', 'web', '2018-06-04 22:05:10', '2018-06-04 22:05:10'),
(18, 'quotes-edit', 'web', '2018-06-04 22:05:10', '2018-06-04 22:05:10'),
(19, 'quotes-delete', 'web', '2018-06-04 22:05:10', '2018-06-04 22:05:10'),
(20, 'transfers-index', 'web', '2018-06-04 22:30:03', '2018-06-04 22:30:03'),
(21, 'transfers-add', 'web', '2018-06-04 22:30:03', '2018-06-04 22:30:03'),
(22, 'transfers-edit', 'web', '2018-06-04 22:30:03', '2018-06-04 22:30:03'),
(23, 'transfers-delete', 'web', '2018-06-04 22:30:03', '2018-06-04 22:30:03'),
(24, 'returns-index', 'web', '2018-06-04 22:50:24', '2018-06-04 22:50:24'),
(25, 'returns-add', 'web', '2018-06-04 22:50:24', '2018-06-04 22:50:24'),
(26, 'returns-edit', 'web', '2018-06-04 22:50:25', '2018-06-04 22:50:25'),
(27, 'returns-delete', 'web', '2018-06-04 22:50:25', '2018-06-04 22:50:25'),
(28, 'customers-index', 'web', '2018-06-04 23:15:54', '2018-06-04 23:15:54'),
(29, 'customers-add', 'web', '2018-06-04 23:15:55', '2018-06-04 23:15:55'),
(30, 'customers-edit', 'web', '2018-06-04 23:15:55', '2018-06-04 23:15:55'),
(31, 'customers-delete', 'web', '2018-06-04 23:15:55', '2018-06-04 23:15:55'),
(32, 'suppliers-index', 'web', '2018-06-04 23:40:12', '2018-06-04 23:40:12'),
(33, 'suppliers-add', 'web', '2018-06-04 23:40:12', '2018-06-04 23:40:12'),
(34, 'suppliers-edit', 'web', '2018-06-04 23:40:12', '2018-06-04 23:40:12'),
(35, 'suppliers-delete', 'web', '2018-06-04 23:40:12', '2018-06-04 23:40:12'),
(36, 'product-report', 'web', '2018-06-24 23:05:33', '2018-06-24 23:05:33'),
(37, 'purchase-report', 'web', '2018-06-24 23:24:56', '2018-06-24 23:24:56'),
(38, 'sale-report', 'web', '2018-06-24 23:33:13', '2018-06-24 23:33:13'),
(39, 'customer-report', 'web', '2018-06-24 23:36:51', '2018-06-24 23:36:51'),
(40, 'due-report', 'web', '2018-06-24 23:39:52', '2018-06-24 23:39:52'),
(41, 'users-index', 'web', '2018-06-25 00:00:10', '2018-06-25 00:00:10'),
(42, 'users-add', 'web', '2018-06-25 00:00:10', '2018-06-25 00:00:10'),
(43, 'users-edit', 'web', '2018-06-25 00:01:30', '2018-06-25 00:01:30'),
(44, 'users-delete', 'web', '2018-06-25 00:01:30', '2018-06-25 00:01:30'),
(45, 'profit-loss', 'web', '2018-07-14 21:50:05', '2018-07-14 21:50:05'),
(46, 'best-seller', 'web', '2018-07-14 22:01:38', '2018-07-14 22:01:38'),
(47, 'daily-sale', 'web', '2018-07-14 22:24:21', '2018-07-14 22:24:21'),
(48, 'monthly-sale', 'web', '2018-07-14 22:30:41', '2018-07-14 22:30:41'),
(49, 'daily-purchase', 'web', '2018-07-14 22:36:46', '2018-07-14 22:36:46'),
(50, 'monthly-purchase', 'web', '2018-07-14 22:48:17', '2018-07-14 22:48:17'),
(51, 'payment-report', 'web', '2018-07-14 23:10:41', '2018-07-14 23:10:41'),
(52, 'warehouse-stock-report', 'web', '2018-07-14 23:16:55', '2018-07-14 23:16:55'),
(53, 'product-qty-alert', 'web', '2018-07-14 23:33:21', '2018-07-14 23:33:21'),
(54, 'supplier-report', 'web', '2018-07-30 03:00:01', '2018-07-30 03:00:01'),
(55, 'expenses-index', 'web', '2018-09-05 01:07:10', '2018-09-05 01:07:10'),
(56, 'expenses-add', 'web', '2018-09-05 01:07:10', '2018-09-05 01:07:10'),
(57, 'expenses-edit', 'web', '2018-09-05 01:07:10', '2018-09-05 01:07:10'),
(58, 'expenses-delete', 'web', '2018-09-05 01:07:11', '2018-09-05 01:07:11'),
(59, 'general_setting', 'web', '2018-10-19 23:10:04', '2018-10-19 23:10:04'),
(60, 'mail_setting', 'web', '2018-10-19 23:10:04', '2018-10-19 23:10:04'),
(61, 'pos_setting', 'web', '2018-10-19 23:10:04', '2018-10-19 23:10:04'),
(62, 'hrm_setting', 'web', '2019-01-02 10:30:23', '2019-01-02 10:30:23'),
(63, 'purchase-return-index', 'web', '2019-01-02 21:45:14', '2019-01-02 21:45:14'),
(64, 'purchase-return-add', 'web', '2019-01-02 21:45:14', '2019-01-02 21:45:14'),
(65, 'purchase-return-edit', 'web', '2019-01-02 21:45:14', '2019-01-02 21:45:14'),
(66, 'purchase-return-delete', 'web', '2019-01-02 21:45:14', '2019-01-02 21:45:14'),
(67, 'account-index', 'web', '2019-01-02 22:06:13', '2019-01-02 22:06:13'),
(68, 'balance-sheet', 'web', '2019-01-02 22:06:14', '2019-01-02 22:06:14'),
(69, 'account-statement', 'web', '2019-01-02 22:06:14', '2019-01-02 22:06:14'),
(70, 'department', 'web', '2019-01-02 22:30:01', '2019-01-02 22:30:01'),
(71, 'attendance', 'web', '2019-01-02 22:30:01', '2019-01-02 22:30:01'),
(72, 'payroll', 'web', '2019-01-02 22:30:01', '2019-01-02 22:30:01'),
(73, 'employees-index', 'web', '2019-01-02 22:52:19', '2019-01-02 22:52:19'),
(74, 'employees-add', 'web', '2019-01-02 22:52:19', '2019-01-02 22:52:19'),
(75, 'employees-edit', 'web', '2019-01-02 22:52:19', '2019-01-02 22:52:19'),
(76, 'employees-delete', 'web', '2019-01-02 22:52:19', '2019-01-02 22:52:19'),
(77, 'user-report', 'web', '2019-01-16 06:48:18', '2019-01-16 06:48:18'),
(78, 'stock_count', 'web', '2019-02-17 10:32:01', '2019-02-17 10:32:01'),
(79, 'adjustment', 'web', '2019-02-17 10:32:02', '2019-02-17 10:32:02'),
(80, 'sms_setting', 'web', '2019-02-22 05:18:03', '2019-02-22 05:18:03'),
(81, 'create_sms', 'web', '2019-02-22 05:18:03', '2019-02-22 05:18:03'),
(82, 'print_barcode', 'web', '2019-03-07 05:02:19', '2019-03-07 05:02:19'),
(83, 'empty_database', 'web', '2019-03-07 05:02:19', '2019-03-07 05:02:19'),
(84, 'customer_group', 'web', '2019-03-07 05:37:15', '2019-03-07 05:37:15'),
(85, 'unit', 'web', '2019-03-07 05:37:15', '2019-03-07 05:37:15'),
(86, 'tax', 'web', '2019-03-07 05:37:15', '2019-03-07 05:37:15'),
(87, 'gift_card', 'web', '2019-03-07 06:29:38', '2019-03-07 06:29:38'),
(88, 'coupon', 'web', '2019-03-07 06:29:38', '2019-03-07 06:29:38'),
(89, 'holiday', 'web', '2019-10-19 08:57:15', '2019-10-19 08:57:15'),
(90, 'warehouse-report', 'web', '2019-10-22 06:00:23', '2019-10-22 06:00:23'),
(91, 'warehouse', 'web', '2020-02-26 06:47:32', '2020-02-26 06:47:32'),
(92, 'brand', 'web', '2020-02-26 06:59:59', '2020-02-26 06:59:59'),
(93, 'billers-index', 'web', '2020-02-26 07:11:15', '2020-02-26 07:11:15'),
(94, 'billers-add', 'web', '2020-02-26 07:11:15', '2020-02-26 07:11:15'),
(95, 'billers-edit', 'web', '2020-02-26 07:11:15', '2020-02-26 07:11:15'),
(96, 'billers-delete', 'web', '2020-02-26 07:11:15', '2020-02-26 07:11:15'),
(97, 'money-transfer', 'web', '2020-03-02 05:41:48', '2020-03-02 05:41:48'),
(98, 'category', 'web', '2020-07-13 12:13:16', '2020-07-13 12:13:16'),
(99, 'delivery', 'web', '2020-07-13 12:13:16', '2020-07-13 12:13:16'),
(100, 'send_notification', 'web', '2020-10-31 06:21:31', '2020-10-31 06:21:31'),
(101, 'today_sale', 'web', '2020-10-31 06:57:04', '2020-10-31 06:57:04'),
(102, 'today_profit', 'web', '2020-10-31 06:57:04', '2020-10-31 06:57:04'),
(103, 'currency', 'web', '2020-11-09 00:23:11', '2020-11-09 00:23:11'),
(104, 'backup_database', 'web', '2020-11-15 00:16:55', '2020-11-15 00:16:55');

-- --------------------------------------------------------

--
-- Table structure for table `pos_setting`
--

CREATE TABLE `pos_setting` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `biller_id` int(11) NOT NULL,
  `product_number` int(11) NOT NULL,
  `keybord_active` tinyint(1) NOT NULL,
  `stripe_public_key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stripe_secret_key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pos_setting`
--

INSERT INTO `pos_setting` (`id`, `customer_id`, `warehouse_id`, `biller_id`, `product_number`, `keybord_active`, `stripe_public_key`, `stripe_secret_key`, `created_at`, `updated_at`) VALUES
(1, 11, 1, 1, 4, 0, 'pk_test_ITN7KOYiIsHSCQ0UMRcgaYUB', 'sk_test_TtQQaawhEYRwa3mU9CzttrEy', '2018-09-02 03:17:04', '2021-02-13 00:51:14');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barcode_symbology` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `purchase_unit_id` int(11) NOT NULL,
  `sale_unit_id` int(11) NOT NULL,
  `cost` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` double DEFAULT NULL,
  `alert_quantity` double DEFAULT NULL,
  `promotion` tinyint(4) DEFAULT NULL,
  `promotion_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `starting_date` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_date` date DEFAULT NULL,
  `tax_id` int(11) DEFAULT NULL,
  `tax_method` int(11) DEFAULT NULL,
  `image` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_variant` tinyint(1) DEFAULT NULL,
  `is_diffPrice` tinyint(1) DEFAULT NULL,
  `featured` tinyint(4) DEFAULT NULL,
  `product_list` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty_list` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price_list` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `code`, `type`, `barcode_symbology`, `brand_id`, `category_id`, `unit_id`, `purchase_unit_id`, `sale_unit_id`, `cost`, `price`, `qty`, `alert_quantity`, `promotion`, `promotion_price`, `starting_date`, `last_date`, `tax_id`, `tax_method`, `image`, `file`, `is_variant`, `is_diffPrice`, `featured`, `product_list`, `qty_list`, `price_list`, `product_details`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Mouse', '63920719', 'standard', 'C39', 4, 3, 1, 1, 1, '320', '400', 201, 20, 1, '350', '2020-06-30', '2020-07-31', 1, 1, 'toponemouse.jpg', NULL, NULL, 0, 0, NULL, NULL, NULL, '<p style=@text-align: center;@>11:11:30 AM&nbsp;<span style=@background-color: #ccffff;@>hello world<br /></span></p>', 1, '2018-05-12 22:23:03', '2021-02-13 04:50:41'),
(2, 'mango', '72782608', 'standard', 'C128', NULL, 1, 1, 3, 2, '8', '12', 3251, 100, NULL, NULL, NULL, NULL, 2, 2, 'mango.jpg', NULL, NULL, 0, 0, NULL, NULL, NULL, '', 1, '2018-05-12 22:38:31', '2021-02-13 00:53:08'),
(3, 'Earphone', '85415108', 'standard', 'C128', 4, 2, 1, 1, 1, '200', '250', 155, 25, NULL, '220', '2020-11-02', '2020-11-30', NULL, 1, 'airphonesamsung.jpg', NULL, NULL, 0, 1, NULL, NULL, NULL, '<p>Earphone with good <strong>sound quality.</strong></p>\r\n<p>jhjkhjkhjh @@</p>', 0, '2018-05-12 22:39:55', '2021-01-26 23:25:07'),
(4, 'lychee', '38314290', 'standard', 'C128', NULL, 1, 1, 1, 1, '1', '2', 291, 50, NULL, NULL, NULL, NULL, NULL, 1, 'lychee.jpg', NULL, NULL, NULL, 1, NULL, NULL, NULL, '<p style=@text-align: center;@><em>sweet lychee from <strong>kalipur</strong>, bashkhali</em></p>', 0, '2018-05-23 22:54:56', '2021-01-26 23:25:07'),
(5, 'Baby doll', '31261512', 'standard', 'C128', 3, 4, 1, 1, 1, '100', '120', 139, 50, 1, '100', '2020-02-28', '2020-02-29', NULL, 1, 'lalacrybabydoll.jpg,15992893905761572515542825e4e2e433-e29b-4ca1-abb2-aad995574f2a_1.e4dc9f20c1d8b2999d66556ae0aa1600.jpeg', NULL, NULL, NULL, 1, NULL, NULL, NULL, '', 0, '2018-05-23 22:58:20', '2021-01-26 23:25:17'),
(6, 'test', '78041363', 'standard', 'C128', NULL, 2, 1, 1, 1, '12', '21', 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2018-05-27 23:50:25', '2021-01-26 23:25:07'),
(10, 'potato', '212132', 'standard', 'C128', NULL, 9, 7, 7, 7, '10', '22', 108.5, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'potato.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, '2018-06-25 01:34:53', '2021-02-02 00:24:17'),
(13, 'ldms', '40624536', 'digital', 'C128', NULL, 3, 0, 0, 0, '0', '21', 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'ldms.jpg', '1532330693.JPG', NULL, NULL, 1, NULL, NULL, NULL, '<p>Amazon Prime 1 Month<br />Price: 300tk</p>\r\n<p>User Ability: Max 2 Mobile User<br />Duration: 1 Month<br />Package: Premium</p>', 0, '2018-07-23 01:09:29', '2021-01-26 23:25:07'),
(14, 'ni', '40237871', 'standard', 'C128', NULL, 9, 8, 8, 8, '55', '56', 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, '2018-07-31 22:36:51', '2021-01-26 23:25:07'),
(15, 'edawe', 'awd', 'standard', 'C128', NULL, 1, 4, 4, 4, '312', '132', 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, '2018-08-05 01:26:19', '2021-01-26 23:25:07'),
(16, 'weq', 'eqw', 'digital', 'C128', NULL, 2, 0, 0, 0, '0', '2', 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '1533454125.jpg', NULL, NULL, NULL, NULL, NULL, NULL, '', 0, '2018-08-05 01:28:45', '2021-01-26 23:25:07'),
(17, 'et', 'wer', 'standard', 'C128', NULL, 2, 4, 4, 4, '12', '21', 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, '2018-08-06 04:25:43', '2021-01-26 23:25:07'),
(18, 'wre', 'wre', 'standard', 'C128', NULL, 1, 4, 4, 4, '3', '2', 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, '2018-08-06 04:45:42', '2021-01-26 23:25:07'),
(19, 'ewr', 'wer', 'standard', 'C128', NULL, 2, 4, 4, 4, '3', '23', 0, NULL, 1, NULL, '2018-08-06', '2018-08-10', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, '2018-08-06 05:41:46', '2021-01-26 23:25:07'),
(20, 'dim', '4234', 'standard', 'C128', NULL, 10, 1, 1, 1, '1', '2', 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, '2018-08-28 23:37:07', '2018-08-28 23:43:18'),
(21, 'dim', '1', 'standard', 'C128', NULL, 11, 1, 1, 1, '1', '2', 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, '2018-08-28 23:49:27', '2018-08-28 23:53:21'),
(22, 'iphone-X', '97103461', 'standard', 'C128', 5, 2, 1, 1, 1, '800', '1000', 47, 20, NULL, NULL, NULL, NULL, 1, 1, 'iphoneX.jpg', NULL, NULL, NULL, 1, NULL, NULL, NULL, '', 0, '2018-09-03 04:05:17', '2021-01-26 23:25:07'),
(23, 'qwq', '1237920612311a', 'standard', 'C39', NULL, 2, 1, 1, 1, '1', '2', 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, '2018-09-10 23:53:18', '2021-01-26 23:25:07'),
(24, 'chocolate', '84802317', 'standard', 'C128', NULL, 9, 1, 1, 1, '1', '2', 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '', 0, '2018-09-15 21:42:01', '2021-01-26 23:25:07'),
(25, 'Galaxy S9', '72100265', 'standard', 'C128', NULL, 2, 1, 1, 1, '500', '1000', 124, 50, NULL, NULL, NULL, NULL, 1, 1, 'SamsungGalaxyS9.jpg', NULL, NULL, NULL, 1, NULL, NULL, NULL, '', 0, '2018-10-23 01:13:22', '2021-01-26 23:25:07'),
(26, 'Samsung Set', '39053411', 'combo', 'C128', 4, 2, 0, 0, 0, '0', '1250', 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'zummXD2dvAtI.png', NULL, NULL, NULL, NULL, '3,25', '1,1', '250,1000', '', 0, '2018-11-19 03:59:06', '2021-01-26 23:25:07'),
(27, 'mixed fruit juice', '24805187', 'combo', 'C128', NULL, 9, 0, 0, 0, '0', '16', 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'zummXD2dvAtI.png', NULL, NULL, NULL, NULL, '4,2', '3,1', '2,10', '', 0, '2018-11-19 09:39:26', '2021-01-26 23:25:07'),
(28, 'ssaaa', 'sasas', 'standard', 'C128', NULL, 2, 1, 1, 2, '1', '2', 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'zummXD2dvAtI.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, '2018-11-20 04:14:12', '2021-01-26 23:25:07'),
(29, 'testcloth', '16055884', 'standard', 'C128', NULL, 4, 10, 10, 10, '10', '15', 0, NULL, NULL, NULL, '2018-11-29', NULL, NULL, 1, 'zummXD2dvAtI.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, '2018-11-29 03:49:25', '2021-01-26 23:25:17'),
(30, 'Polo Shirt', '53467102', 'standard', 'C128', NULL, 12, 1, 1, 1, '50', '100', 26, 10, NULL, NULL, NULL, NULL, NULL, 1, 'PoloShirt.jpg', NULL, NULL, NULL, 1, NULL, NULL, NULL, '', 0, '2018-12-04 23:29:43', '2021-01-26 23:25:06'),
(31, 'Shoe', '90471412', 'standard', 'C128', NULL, 12, 1, 1, 1, '250', '300', 26, 10, NULL, NULL, NULL, NULL, NULL, 1, 'Shoe.jpg', NULL, NULL, NULL, 1, NULL, NULL, NULL, '', 0, '2018-12-04 23:33:09', '2021-01-26 23:25:06'),
(32, 'Toothpaste', '859875003032', 'standard', 'C128', NULL, 12, 1, 1, 1, '5', '10', 20, NULL, NULL, NULL, NULL, NULL, NULL, 1, '1572759415477product-page-fresh-breath.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, '2018-12-18 23:56:08', '2021-01-28 04:28:46'),
(33, 'tissue', '8941161008066', 'standard', 'C128', NULL, 12, 1, 1, 1, '10', '20', 38, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'zummXD2dvAtI.png', NULL, NULL, NULL, 0, NULL, NULL, NULL, '', 0, '2018-12-23 23:33:58', '2021-01-26 23:25:06'),
(48, 'T-shirt', '93475396', 'standard', 'C128', NULL, 12, 1, 1, 1, '2', '3', 37, NULL, NULL, NULL, NULL, NULL, NULL, 1, '1577165120189220px-Blue_Tshirt.jpg', NULL, 1, NULL, 0, NULL, NULL, NULL, '', 0, '2019-11-21 07:03:04', '2021-01-26 23:25:06'),
(60, 'testvar', '32081679', 'standard', 'C128', NULL, 12, 1, 1, 1, '1', '2', 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'zummXD2dvAtI.png', NULL, 1, NULL, 0, NULL, NULL, NULL, '', 0, '2020-05-18 16:44:14', '2021-01-26 23:25:06'),
(61, 'TV', '32703342', 'standard', 'C128', 4, 2, 1, 1, 1, '3000', '10000', 21, NULL, NULL, NULL, NULL, NULL, 2, 1, 'zummXD2dvAtI.png', NULL, NULL, NULL, 1, NULL, NULL, NULL, '', 0, '2020-08-16 15:58:39', '2021-01-26 23:25:07'),
(62, 'Test variant', '81145830', 'standard', 'C128', NULL, 4, 1, 1, 1, '1', '2', 3, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'zummXD2dvAtI.png', NULL, 1, NULL, NULL, NULL, NULL, NULL, '', 0, '2020-09-27 06:08:27', '2021-01-26 23:25:17'),
(68, 'Sample', '70331946', 'standard', 'C128', 7, 20, 7, 7, 7, '500', '300', 106, 48, 1, '400', '2020-12-02', '2020-12-23', 1, 1, '1606889201291lostbook.jpg', NULL, 1, 1, 1, NULL, NULL, NULL, '<ol>\r\n<li>demo deatail&nbsp;demo deatail&nbsp;demo deataildemo deatail&nbsp;demo deatail&nbsp;</li>\r\n<li>demo deatail&nbsp;demo deatail&nbsp;demo deataildemo deatail&nbsp;demo deatail&nbsp;</li>\r\n<li>demo deatail&nbsp;demo deatail&nbsp;demo deataildemo deatail&nbsp;demo deatail&nbsp;</li>\r\n<li>demo deatail&nbsp;demo deatail&nbsp;demo deataildemo deatail&nbsp;demo deatail&nbsp;</li>\r\n</ol>', 0, '2020-12-02 00:08:30', '2021-01-26 23:25:07'),
(70, 'car', '53458923', 'standard', 'C128', 7, 21, 1, 1, 1, '495', '598', 11, 4, NULL, NULL, NULL, NULL, NULL, 1, '1609571736822Acquaint LogoSmall.png', NULL, NULL, 0, 1, NULL, NULL, NULL, '<p>hello&nbsp;<strong>hi</strong></p>', 0, '2021-01-02 01:16:08', '2021-01-26 23:25:07'),
(71, 'Black Angel', '99713255', 'standard', 'C128', 10, 12, 1, 1, 1, '500', '600', 88, 50, NULL, NULL, NULL, NULL, NULL, 1, '1610614553592perfume.jpg', NULL, NULL, 1, NULL, NULL, NULL, NULL, '<p>Demo&nbsp;<strong>Perfume</strong></p>', 0, '2021-01-14 02:56:42', '2021-01-28 04:27:58'),
(72, 'Book', '17034740', 'standard', 'C128', 9, 23, 1, 1, 1, '200', '250', 0, 5, NULL, NULL, NULL, NULL, NULL, 1, '1611557224207on your company website development.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>Sample</p>', 0, '2021-01-25 00:47:15', '2021-01-26 23:25:07'),
(73, 'Brass Earrings', '83501759', 'standard', 'C128', 11, 30, 1, 1, 1, '1000', '1149', 1, 5, NULL, NULL, NULL, NULL, NULL, 1, '16116475209541052010003257_1.jpg', NULL, NULL, 0, 1, NULL, NULL, NULL, '<p>Red and green stones studded brass earrings.<br />Specifications<br />Colour Golden<br />Material Brass<br />Value Addition Stone-Setting<br />Style Drop<br />Stone/Beads Multi Stone<br />Back Type Bullet Clutch Back<br />Length 8.5<br />Width 4.5<br />Measurement Unit CM<br />Care Clean With Soft Dry Brush And Keep It Dry Place</p>', 1, '2021-01-26 01:54:00', '2021-02-13 00:53:54'),
(74, 'Pearl Necklace', '50490196', 'standard', 'C128', 11, 32, 1, 1, 1, '3000', '3185', 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, '16116478566970850000092164_2.jpg', NULL, NULL, 0, 0, NULL, NULL, NULL, '<p>Mother of pearls, leaf shaped stone and brass beads studded necklace.<br />Specifications<br />Colour Multicolour<br />Length 60<br />Material Multi-Stones<br />Value Addition Pearl-Setting<br />Type Pearl<br />Style Lariat Necklace<br />Clasp Type S-Hook Clasp<br />Measurement Unit CM<br />Care Store Pearls Separately To Avoid It Getting Scratched</p>', 1, '2021-01-26 01:58:03', '2021-02-05 23:42:05'),
(75, 'Pink Pearl Necklace', '83264815', 'standard', 'C128', 11, 32, 1, 1, 1, '3000', '3548', 4, NULL, NULL, NULL, NULL, NULL, NULL, 1, '1611648314353pink.jpg', NULL, NULL, 0, 0, NULL, NULL, NULL, '<p>Pink pearls and multicolour stone studded necklace.<br />Specifications<br />Colour Multicolour<br />Length 51<br />Material Stone<br />Value Addition Pearl-Setting<br />Style Multi Layered Necklace<br />Stone/Beads Brown Stone<br />Clasp Type Hook Clasp<br />Measurement Unit CM<br />Care Store Pearls Separately To Avoid It Getting Scratched</p>', 1, '2021-01-26 02:02:21', '2021-02-05 23:57:12'),
(76, 'Pearl Bracelet', '53720528', 'standard', 'C128', 11, 31, 1, 1, 1, '1000', '1331', 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, '16116484902810852010091847_1.jpg', NULL, NULL, 0, 0, NULL, NULL, NULL, '<p>Grey pearls and fibre stone studded bracelet.<br />Specifications<br />Colour Grey<br />Material Pearl<br />Value Addition Stone-Setting<br />Bracelet Adjustable<br />Style Charm Bracelet<br />Clasp Type No Clasp<br />Length 44<br />Measurement Unit CM<br />Care Store Pearls Separately To Avoid It Getting Scratched</p>', 1, '2021-01-26 02:08:35', '2021-01-30 03:16:31'),
(77, 'Stone Studded Oxidized Silver Bracelet', '23532104', 'standard', 'C128', 11, 31, 1, 1, 1, '2000', '2085', 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, '16116514320680830000043382_1.jpg', NULL, NULL, 0, 0, NULL, NULL, NULL, '<p>Faux coral and grey pearls studded oxidized silver bracelet.<br />Specifications<br />Colour Oxidized Silver<br />Material Silver<br />Value Addition Pearl-Setting, Stone-Setting<br />Bracelet Adjustable<br />Style Charm Bracelet<br />Stone/Beads Coral<br />Stone Cut Round<br />Clasp Type Hook Clasp<br />Length 18<br />Measurement Unit CM<br />Care High quality silver oxidizes hence recommended to be cleaned with mild soapy water for shine</p>', 1, '2021-01-26 02:58:32', '2021-01-30 03:17:49'),
(78, 'Oxidized Silver Ring', '22710093', 'standard', 'C128', 11, 29, 1, 1, 1, '1000', '1152', 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, '16116517799040830000041737.jpg', NULL, NULL, 0, 0, NULL, NULL, NULL, '<p>Engraved oxidized silver finger ring.<br />Specifications<br />Colour Oxidized<br />Material Silver<br />Ring Adjustable<br />Diameter 1.7<br />Measurement Unit CM<br />Care High quality silver oxidizes hence recommended to be cleaned with mild soapy water for shine</p>', 1, '2021-01-26 03:03:29', '2021-01-30 03:14:54'),
(79, 'Heirloom Ring', '81235999', 'standard', 'C128', 12, 28, 1, 1, 1, '45000', '46683.14', 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, '1611658490082Heirloom_ring_HoneyQuartz_yg_hero0326.jpg,1611658490086HoneyQuartz_ring_solo.jpg,1611658892495Heirloom_ring_HoneyQuartz_yg_hero0326.jpg,1611658897168HoneyQuartz_ring_solo.jpg,1611659013792Heirloom_ring_HoneyQuartz_yg_hero0326.jpg', NULL, NULL, 0, 0, NULL, NULL, NULL, '<p>Gemstones<br />All of our gemstones are genuine mineral stones that are highly valued for their beauty, longevity and rarity. We use an array of natural, AAA grade gemstones.</p>\r\n<p>14k Solid Gold<br />Our 14k solid gold pieces are made to last forever. 14k gold will not oxidize or discolor, so you can wear your jewelry every day, everywhere.</p>', 0, '2021-01-26 04:59:00', '2021-01-26 05:06:43'),
(80, 'Heirloom Ring', '12929571', 'standard', 'C128', 12, 28, 1, 1, 1, '45000', '46683.14', 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, '1611659317269Heirloom_ring_HoneyQuartz_yg_hero0326.jpg,16116593863230830000043382_1.jpg', NULL, NULL, 0, 0, NULL, NULL, NULL, '<p>Gemstones<br />All of our gemstones are genuine mineral stones that are highly valued for their beauty, longevity and rarity. We use an array of natural, AAA grade gemstones.</p>\r\n<p><br />14k Solid Gold<br />Our 14k solid gold pieces are made to last forever. 14k gold will not oxidize or discolor, so you can wear your jewelry every day, everywhere.</p>', 0, '2021-01-26 05:09:10', '2021-01-26 05:10:18'),
(81, 'LA Dôme Ring', '54363917', 'standard', 'C128', 12, 29, 1, 1, 1, '42000', '44561', 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, '1611659623461DomeCitiesLA_ring_yg_alt.jpg', NULL, NULL, 0, 0, NULL, NULL, NULL, '<p><br />Diamonds<br />Our diamonds are ethically sourced from suppliers who follow conflict-free and socially responsible practices.</p>\r\n<p><br />14k Solid Gold<br />Our 14k solid gold pieces are made to last forever. 14k gold will not oxidize or discolor, so you can wear your jewelry every day, everywhere.</p>', 1, '2021-01-26 05:14:18', '2021-01-30 03:14:09'),
(82, 'Heirloom Ring', '37076302', 'standard', 'C128', 12, 29, 1, 1, 1, '45000', '46683', 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, '1611659881342Heirloom_ring_LondonBlueTopaz_yg_hero.jpg', NULL, NULL, 0, 1, NULL, NULL, NULL, '<p>Gemstones<br />All of our gemstones are genuine mineral stones that are highly valued for their beauty, longevity and rarity. We use an array of natural, AAA grade gemstones.</p>\r\n<p><br />14k Solid Gold<br />Our 14k solid gold pieces are made to last forever. 14k gold will not oxidize or discolor, so you can wear your jewelry every day, everywhere.</p>', 1, '2021-01-26 05:18:21', '2021-02-13 00:55:24'),
(83, 'AURORA', '78829053', 'standard', 'C128', 13, 29, 1, 1, 1, '105018', '125018', 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, '1611721317125581.jpg', NULL, NULL, 0, 0, NULL, NULL, NULL, '<p>Metal:18ct Rose Gold<br />Band width:2.0mm<br />Side diamonds total carat weight estimate based on UK size N:0.28<br />Side diamonds colour &amp; clarity<br />G-H / VS1-VS2</p>', 1, '2021-01-26 22:24:47', '2021-01-30 03:11:55'),
(84, 'DAWN', '71443390', 'standard', 'C128', 13, 29, 1, 1, 1, '107525', '137525', 2, NULL, NULL, NULL, NULL, NULL, NULL, 1, '161172777047916136-round.jpeg', NULL, NULL, 0, 0, NULL, NULL, NULL, '<p>Metal: Platinum<br />Band width: 1.6mm<br />Side diamonds total carat weight estimate based on UK size N:0.09<br />Side diamonds colour &amp; clarity: G-H / VS1-VS2</p>', 1, '2021-01-27 00:11:16', '2021-02-11 05:03:24'),
(85, 'Pavé Paw Print Bead Charm Bangle', '87361716', 'standard', 'C128', 14, 31, 1, 1, 1, '3000', '3215', 2, NULL, NULL, NULL, NULL, NULL, NULL, 1, '1611729058429a19ebpave05sr_front_700x.jpg', NULL, NULL, 0, 0, NULL, NULL, NULL, '<p>Expandable from 2@ to 3.5@<br />Finish: Shiny Rose Gold<br />Nickel-free<br />Adorned with Swarovski&reg; Crystals</p>', 1, '2021-01-27 00:31:23', '2021-02-05 23:57:12'),
(86, 'Frontline Warrior Duo Charm Bangle', '11976682', 'standard', 'C128', 14, 31, 1, 1, 1, '3000', '3300', 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, '1611729804694a20ebflwsr_front_700x.jpg', NULL, NULL, 0, 0, NULL, NULL, NULL, '<p>Honor those on the Frontline with this expandable wire bangle. Featuring a two-sided charm that says @Frontline Warrior@ with a heart on the front, and @we couldn\'t do it without you@ on the back.</p>\r\n<p>Expandable from 2@ to 3.5@<br />Finish: Shiny Rose Gold<br />Nickel-free<br />Adorned with a genuine Amethyst gemstone; colors may vary due to natural makeup of the gemstones</p>', 1, '2021-01-27 00:37:31', '2021-01-30 03:13:14'),
(87, 'Life is a Journey', '19653970', 'standard', 'C128', 14, 31, 1, 1, 1, '9832', '10832', 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, '1611730045924A20SETPOLSR_FRONT_V4_700x.jpg', NULL, NULL, 0, 1, NULL, NULL, NULL, '<p>This expandable wire bangle set features 5 bangles: 3 accent beaded bangles and 2 charm bangles - 1 has the Path of Life&reg; symbol, and the other charm says @Life is a journey not a destination.@</p>\r\n<p>Expandable from 2@ to 3.5@<br />Finish: Shiny Rose Gold<br />Nickel-free</p>', 1, '2021-01-27 00:48:10', '2021-02-13 00:51:58'),
(88, 'Chand Aur Tare Earrings', '29146902', 'standard', 'C128', 15, 30, 1, 1, 1, '1874', '1974', 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, '1611731308914o-oc20er00113622 (1).jpg', NULL, NULL, 0, 0, NULL, NULL, NULL, '<p>Pipa Bella x Nykaa Fashion Chand Aur Tare Earrings<br />Best Suited For: Festive Wear<br />Country Of Origin: India<br />Expiry Date: N/A<br />Material: Brass<br />Warranty: While we currently don\'t provide warranties, here are some helpful tips to ensure your jewellery maintain it\'s sparkle for a long time.</p>\r\n<p>&nbsp;</p>', 1, '2021-01-27 01:06:42', '2021-01-30 03:12:14'),
(89, 'Hibiscus Temple Earrings', '64991348', 'standard', 'C128', 15, 30, 1, 1, 1, '654', '754', 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, '1611733175669o-oc20er00113624.jpg', NULL, NULL, 0, 0, NULL, NULL, NULL, '<p>Best Suited For: Festive Wear<br />Country Of Origin: India<br />Expiry Date: N/A<br />Material: Brass<br />Warranty: While we currently don\'t provide warranties</p>\r\n<p>&nbsp;</p>', 1, '2021-01-27 01:41:02', '2021-01-30 03:13:51'),
(90, 'Stella temple earrings', '27859123', 'standard', 'C128', 15, 30, 1, 1, 1, '944', '1044', 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, '1611733399324o-oc20er00113625.jpg', NULL, NULL, 0, 0, NULL, NULL, NULL, '<p>Best Suited For: Festive Wear<br />Country Of Origin: India<br />Expiry Date: N/A<br />Material: Brass<br />Warranty: While we currently don\'t provide warranties</p>\r\n<p>&nbsp;</p>', 1, '2021-01-27 01:44:03', '2021-01-30 03:17:30'),
(91, 'Esra Matte Gold Earrings', '19162360', 'standard', 'C128', 15, 30, 1, 1, 1, '1874', '1974', 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, '1611733570383o-oc20er00113664.jpg', NULL, NULL, 0, 0, NULL, NULL, NULL, '<p>Best Suited For: Festive Wear<br />Country Of Origin: India<br />Expiry Date: N/A<br />Material: Brass<br />Warranty: While we currently don\'t provide warranties</p>\r\n<p>&nbsp;</p>', 1, '2021-01-27 01:46:38', '2021-01-30 03:12:53'),
(92, 'Women White  Green Pearl Studded Jewellery Set', '81765927', 'standard', 'C128', 16, 32, 1, 1, 1, '354', '454', 2, NULL, NULL, NULL, NULL, NULL, NULL, 1, '161173721329521d7796a-9a98-4bcd-85ef-05b4b98ceca41571391956850-Zaveri-Pearls-Women-White--Green-Pearl-Studded-Jewellery-Set-1.jpg', NULL, NULL, 0, 0, NULL, NULL, NULL, '<p>White and green pearl studded Jewellery Set<br />White and green choker necklace with pearl embellishment secured with a drawstring closure<br />Comes with a matching pair of studs, secured with post-and-back closure</p>\r\n<p><strong>Size &amp; Fit</strong><br />Necklace Length: 75 cm</p>\r\n<p><strong>Material &amp; Care</strong><br />Material: Alloy<br />Stone Type: Pearls</p>\r\n<p><strong>Care Instructions:</strong><br />Wipe your jewellery with a soft cloth after every use<br />Always store your jewellery in a flat box to avoid accidental scratches<br />Keep sprays and perfumes away from your jewellery<br />Do not soak your jewellery in water<br />Clean your jewellery using a soft brush, dipped in jewellery cleaning solution only</p>\r\n<p>&nbsp;</p>', 1, '2021-01-27 02:50:46', '2021-02-03 01:23:54'),
(93, 'PANASH', '80691270', 'standard', 'C128', 16, 32, 1, 1, 1, '818', '918', 5, NULL, NULL, NULL, NULL, NULL, NULL, 1, '16117376960791d0e9faa-b78a-44c1-9d9e-2cfe3abe36471556089299523-PANASH-Women-Gold-Plated-Pink--Off-White-Pearls-Beaded-Ename-1.jpg', NULL, NULL, 0, 0, NULL, NULL, NULL, '<p>This jewellery set consists of a necklace and a pair of earrings<br />Gold-plated and off-white pearl beaded handcrafted necklace, has a circular-shaped centerpiece enamelled with pink and kundan-studded detail, secured with an adjustable S-hook closure<br />A pair of matching drop earrings, secured with post and back closure</p>\r\n<p><br />Size &amp; Fit<br />Length of Necklace: 56 cm<br />Length of Earrings: 3.2 cm</p>\r\n<p><br />Material &amp; Care<br />Alloy<br />Care Instructions:<br />Wipe your jewellery with a soft cloth after every use<br />Always store your jewellery in a flat box to avoid accidental scratches<br />Keep sprays and perfumes away from your jewellery<br />Do not soak your jewellery in water<br />Clean your jewellery using a soft brush, dipped in jewellery cleaning solution only</p>\r\n<p>&nbsp;</p>', 1, '2021-01-27 02:55:48', '2021-02-04 00:29:41'),
(94, 'AccessHer', '95534604', 'standard', 'C128', 16, 32, 1, 1, 1, '1945', '2045', 0, 0, NULL, NULL, NULL, NULL, NULL, 1, '161173816990912.jpg', NULL, NULL, 0, 0, NULL, NULL, NULL, '<p>This jewellery set consists of a necklace, and a pair of earrings<br />Green and White, gold-plated stone-studded necklace with kundan studded detail, secured with a drawstring closure<br />A pair of matching drop earrings, secured with a post and back closure</p>\r\n<p>Size &amp; Fit<br />Necklace Length: 43 cm<br />Earring Length: 4.2 cm</p>\r\n<p>Material &amp; Care<br />Brass<br />Stone: Kundan<br />Plating: Gold-plated<br />Wipe your jewellery with a soft cloth after every use<br />Always store your jewellery in a flat box to avoid accidental scratches<br />Keep sprays and perfumes away from your jewellery<br />Do not soak your jewellery in water<br />Clean your jewellery using a soft brush, dipped in jewellery cleaning solution only</p>', 1, '2021-01-27 03:03:17', '2021-02-08 04:27:30'),
(95, 'Laptop', '25189403', 'standard', 'C128', 17, 33, 1, 1, 1, '68000', '68000', 0, 0, NULL, NULL, NULL, NULL, NULL, 1, 'zummXD2dvAtI.png', NULL, NULL, 0, 0, NULL, NULL, NULL, '<p>Processor: Intel Core i5-8265U Processor (6m Cache, 1.60 GHz up to 3.90 Ghz).</p>\r\n<p>SSD: 512 GB</p>\r\n<p>RAM: 8 GB</p>\r\n<p>Screen: 14 inch FHD (1920 x 1080) antiglare display.</p>\r\n<p>Metal Cover: 329mm x 242mm x 19.9mm/ 12.9@ x 9.5@ x 0.78@.</p>\r\n<p>Plastic Cover: 329mm x 242mm x 21.9mm/ 12.9@ x 9.5@ x 0.86@</p>\r\n<p>Warranty: 3 Years</p>\r\n<p>Equivalent to Lenevo Thinkpad E490</p>', 0, '2021-02-09 01:57:05', '2021-02-12 22:57:31'),
(96, 'Printer- Color Laser jet', '37287159', 'standard', 'C128', NULL, 33, 1, 1, 1, '48000', '48000', 1, 0, NULL, NULL, NULL, NULL, NULL, 1, 'zummXD2dvAtI.png', NULL, NULL, NULL, 0, NULL, NULL, NULL, '<p>All-In-One Print/Copy/Scan/Fax/Duplex/Wifi Color Laser Printer</p>', 0, '2021-02-09 02:07:33', '2021-02-12 22:57:31'),
(97, 'Printer- B &amp; W laser jet', '32153667', 'standard', 'C128', NULL, 33, 1, 1, 1, '56000', '56000', 1, 0, NULL, NULL, NULL, NULL, NULL, 1, 'zummXD2dvAtI.png', NULL, NULL, NULL, 0, NULL, NULL, NULL, '<p>All-In-One Print/Copy/Scan/Fax/Duplex/Wifi Black &amp; white Laser Printer</p>', 0, '2021-02-09 02:09:17', '2021-02-12 22:57:31'),
(98, 'Printer - Inkjet', '77904659', 'standard', 'C128', NULL, 33, 1, 1, 1, '52000', '52000', 1, 0, NULL, NULL, NULL, NULL, NULL, 1, 'zummXD2dvAtI.png', NULL, NULL, 0, 0, NULL, NULL, NULL, '<p>All-In-One Print/Copy/Scan/Fax/Duplex/Wifi Ink Jet Printer</p>', 0, '2021-02-09 02:10:18', '2021-02-12 22:57:31'),
(99, 'Toner', '41131925', 'standard', 'C128', 3, 33, 1, 1, 1, '1800', '1800', 6, 0, NULL, NULL, NULL, NULL, NULL, 1, 'zummXD2dvAtI.png', NULL, NULL, NULL, 1, NULL, NULL, NULL, '<p>Printer model: HP Laser Jet pro M225dn,</p>\r\n<p>Ink Color: Black</p>\r\n<p>original HP toner</p>', 0, '2021-02-09 02:11:58', '2021-02-12 22:57:31'),
(100, 'Soap', '38746823', 'standard', 'C128', 19, 35, 1, 1, 1, '20', '25', 4, 0, NULL, NULL, NULL, NULL, NULL, 1, '1613042514095honey.jpg', NULL, NULL, NULL, 1, NULL, NULL, NULL, '<p>smple</p>', 0, '2021-02-11 05:22:02', '2021-02-11 05:46:56');

-- --------------------------------------------------------

--
-- Table structure for table `product_adjustments`
--

CREATE TABLE `product_adjustments` (
  `id` int(10) UNSIGNED NOT NULL,
  `adjustment_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` double NOT NULL,
  `action` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_adjustments`
--

INSERT INTO `product_adjustments` (`id`, `adjustment_id`, `product_id`, `qty`, `action`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 1, '-', '2020-12-01 04:45:10', '2020-12-01 04:47:32'),
(2, 2, 68, 5, '+', '2020-12-02 04:47:08', '2020-12-02 04:47:08'),
(3, 3, 1, 3, '+', '2020-12-29 22:59:42', '2020-12-29 22:59:42'),
(4, 4, 3, 3, '+', '2020-12-29 23:04:11', '2020-12-29 23:04:11'),
(5, 5, 70, 5, '-', '2021-01-05 22:21:38', '2021-01-05 22:21:38');

-- --------------------------------------------------------

--
-- Table structure for table `product_purchases`
--

CREATE TABLE `product_purchases` (
  `id` int(10) UNSIGNED NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `variant_id` int(11) DEFAULT NULL,
  `qty` double NOT NULL,
  `recieved` double NOT NULL,
  `purchase_unit_id` int(11) NOT NULL,
  `net_unit_cost` double NOT NULL,
  `discount` double NOT NULL,
  `tax_rate` double NOT NULL,
  `tax` double NOT NULL,
  `total` double NOT NULL,
  `expire_date` date NOT NULL DEFAULT '9999-12-31',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_purchases`
--

INSERT INTO `product_purchases` (`id`, `purchase_id`, `product_id`, `variant_id`, `qty`, `recieved`, `purchase_unit_id`, `net_unit_cost`, `discount`, `tax_rate`, `tax`, `total`, `expire_date`, `created_at`, `updated_at`) VALUES
(59, 12, 4, NULL, 200, 200, 1, 1, 0, 0, 0, 200, '9999-12-31', '2018-08-08 23:48:36', '2018-08-08 23:48:36'),
(60, 12, 5, NULL, 100, 100, 1, 100, 0, 0, 0, 10000, '9999-12-31', '2018-08-08 23:48:36', '2018-08-08 23:48:36'),
(66, 13, 2, NULL, 100, 100, 3, 166.96, 0, 15, 2504.35, 19200, '9999-12-31', '2018-08-08 23:49:55', '2018-08-08 23:49:55'),
(67, 13, 3, NULL, 100, 100, 1, 200, 0, 0, 0, 20000, '9999-12-31', '2018-08-08 23:49:55', '2018-08-08 23:49:55'),
(68, 13, 1, NULL, 150, 150, 1, 320, 0, 10, 4800, 52800, '9999-12-31', '2018-08-08 23:49:55', '2018-08-08 23:49:55'),
(69, 13, 10, NULL, 60, 60, 7, 10, 0, 0, 0, 600, '9999-12-31', '2018-08-08 23:49:55', '2018-08-08 23:49:55'),
(70, 14, 1, NULL, 100, 100, 1, 320, 0, 10, 3200, 35200, '9999-12-31', '2018-08-09 07:23:48', '2018-08-09 07:23:48'),
(71, 14, 2, NULL, 50, 50, 3, 166.96, 0, 15, 1252.17, 9600, '9999-12-31', '2018-08-09 07:23:48', '2018-08-09 07:23:48'),
(72, 14, 3, NULL, 100, 100, 1, 200, 0, 0, 0, 20000, '9999-12-31', '2018-08-09 07:23:49', '2018-08-09 07:23:49'),
(73, 14, 5, NULL, 100, 100, 1, 100, 0, 0, 0, 10000, '9999-12-31', '2018-08-09 07:23:49', '2018-08-09 07:23:49'),
(74, 14, 10, NULL, 50, 50, 7, 10, 0, 0, 0, 500, '9999-12-31', '2018-08-09 07:23:49', '2018-08-09 07:23:49'),
(76, 15, 22, NULL, 20, 20, 1, 800, 0, 10, 1600, 17600, '9999-12-31', '2018-09-03 04:06:46', '2018-09-03 04:06:46'),
(87, 16, 22, NULL, 20, 20, 1, 800, 0, 10, 1600, 17600, '9999-12-31', '2018-09-20 09:09:12', '2018-09-20 09:09:12'),
(89, 18, 4, NULL, 50, 50, 1, 1, 0, 0, 0, 50, '9999-12-31', '2018-10-22 10:26:25', '2018-10-22 10:26:25'),
(90, 19, 4, NULL, 50, 50, 1, 1, 0, 0, 0, 50, '9999-12-31', '2018-10-22 10:26:52', '2018-10-22 10:26:52'),
(91, 20, 25, NULL, 15, 15, 1, 500, 0, 10, 750, 8250, '9999-12-31', '2018-10-23 01:14:21', '2018-10-23 01:14:21'),
(93, 21, 25, NULL, 15, 15, 1, 500, 0, 10, 750, 8250, '9999-12-31', '2018-10-23 01:14:58', '2018-10-23 01:14:58'),
(94, 22, 22, NULL, 5, 5, 1, 800, 0, 10, 400, 4400, '9999-12-31', '2018-10-31 22:59:03', '2018-10-31 22:59:03'),
(96, 23, 22, NULL, 5, 5, 1, 800, 0, 10, 400, 4400, '9999-12-31', '2018-11-03 03:23:52', '2018-11-03 03:23:52'),
(97, 24, 22, NULL, 15, 15, 1, 800, 0, 10, 1200, 13200, '9999-12-31', '2018-11-05 03:18:19', '2018-11-05 03:18:19'),
(98, 24, 25, NULL, 5, 5, 1, 500, 0, 10, 250, 2750, '9999-12-31', '2018-11-05 03:18:19', '2018-11-05 03:18:19'),
(99, 25, 31, NULL, 15, 15, 1, 250, 0, 0, 0, 3750, '9999-12-31', '2018-12-04 23:34:30', '2018-12-04 23:34:30'),
(100, 25, 30, NULL, 15, 15, 1, 50, 0, 0, 0, 750, '9999-12-31', '2018-12-04 23:34:30', '2018-12-04 23:34:30'),
(101, 26, 31, NULL, 15, 15, 1, 250, 0, 0, 0, 3750, '9999-12-31', '2018-12-04 23:35:08', '2018-12-04 23:35:08'),
(102, 26, 30, NULL, 15, 15, 1, 50, 0, 0, 0, 750, '9999-12-31', '2018-12-04 23:35:08', '2018-12-04 23:35:08'),
(104, 27, 32, NULL, 10, 10, 1, 1, 0, 0, 0, 10, '9999-12-31', '2018-12-18 23:57:41', '2018-12-18 23:57:41'),
(112, 33, 33, NULL, 10, 10, 1, 1, 0, 0, 0, 10, '9999-12-31', '2018-12-24 03:04:21', '2018-12-24 03:04:21'),
(113, 34, 25, NULL, 2, 2, 1, 500, 0, 10, 100, 1100, '9999-12-31', '2019-01-03 01:01:24', '2019-01-03 01:01:24'),
(114, 34, 22, NULL, 2, 2, 1, 800, 0, 10, 160, 1760, '9999-12-31', '2019-01-03 01:01:24', '2019-01-03 01:01:24'),
(115, 35, 31, NULL, 2, 2, 1, 250, 0, 0, 0, 500, '9999-12-31', '2019-01-29 03:54:48', '2019-01-29 03:54:48'),
(116, 35, 30, NULL, 2, 2, 1, 50, 0, 0, 0, 100, '9999-12-31', '2019-01-29 03:54:48', '2019-01-29 03:54:48'),
(117, 36, 30, NULL, 3, 3, 1, 50, 0, 0, 0, 150, '9999-12-31', '2019-01-29 03:55:58', '2019-01-29 03:55:58'),
(118, 36, 31, NULL, 2, 2, 1, 250, 0, 0, 0, 500, '9999-12-31', '2019-01-29 03:55:58', '2019-01-29 03:55:58'),
(121, 39, 1, NULL, 2, 2, 1, 315, 10, 10, 63, 693, '9999-12-31', '2019-02-09 04:44:13', '2019-02-09 04:44:13'),
(122, 39, 2, NULL, 1, 1, 3, 192, 0, 0, 0, 192, '9999-12-31', '2019-02-09 04:44:13', '2019-02-09 04:44:13'),
(123, 38, 32, NULL, 10, 10, 1, 1, 0, 0, 0, 10, '9999-12-31', '2019-02-09 04:45:24', '2019-02-09 04:45:24'),
(124, 38, 25, NULL, 3, 3, 1, 500, 0, 10, 150, 1650, '9999-12-31', '2019-02-09 04:45:24', '2019-02-09 04:45:24'),
(125, 37, 33, NULL, 10, 10, 1, 1, 0, 0, 0, 10, '9999-12-31', '2019-02-09 04:46:22', '2019-02-09 04:46:22'),
(126, 37, 25, NULL, 2, 2, 1, 500, 0, 10, 100, 1100, '9999-12-31', '2019-02-09 04:46:23', '2019-02-09 04:46:23'),
(127, 37, 22, NULL, 6, 6, 1, 800, 0, 10, 480, 5280, '9999-12-31', '2019-02-09 04:46:23', '2019-02-09 04:46:23'),
(128, 40, 33, NULL, 10, 10, 1, 10, 0, 0, 0, 100, '9999-12-31', '2019-03-03 04:39:17', '2019-03-03 04:39:17'),
(129, 41, 33, NULL, 5, 5, 1, 10, 0, 0, 0, 50, '9999-12-31', '2019-03-03 04:43:58', '2019-03-03 04:43:58'),
(130, 41, 1, NULL, 10, 10, 1, 320, 0, 10, 320, 3520, '9999-12-31', '2019-03-03 04:43:59', '2019-03-03 04:43:59'),
(133, 42, 30, NULL, 1, 1, 1, 50, 0, 0, 0, 50, '9999-12-31', '2019-04-13 13:50:08', '2019-04-13 13:50:08'),
(134, 42, 31, NULL, 1, 1, 1, 250, 0, 0, 0, 250, '9999-12-31', '2019-04-13 13:50:08', '2019-04-13 13:50:08'),
(135, 43, 25, NULL, 3, 3, 1, 500, 0, 10, 150, 1650, '9999-12-31', '2019-06-13 04:16:00', '2019-06-13 04:16:00'),
(136, 43, 22, NULL, 3, 3, 1, 800, 0, 10, 240, 2640, '9999-12-31', '2019-06-13 04:16:01', '2019-06-13 04:16:01'),
(137, 44, 25, NULL, 1, 1, 1, 500, 0, 10, 50, 550, '9999-12-31', '2019-10-19 09:31:19', '2019-10-19 09:31:19'),
(138, 44, 22, NULL, 1, 1, 1, 800, 0, 10, 80, 880, '9999-12-31', '2019-10-19 09:31:20', '2019-10-19 09:31:20'),
(140, 46, 33, NULL, 10, 10, 1, 10, 0, 0, 0, 100, '9999-12-31', '2019-11-03 05:39:49', '2019-11-03 05:39:49'),
(141, 46, 32, NULL, 10, 10, 1, 5, 0, 0, 0, 50, '9999-12-31', '2019-11-03 05:39:49', '2019-11-03 05:39:49'),
(142, 47, 1, NULL, 2, 2, 1, 315, 10, 10, 63, 693, '9999-12-31', '2019-11-09 05:25:10', '2019-11-09 05:25:10'),
(143, 47, 2, NULL, 1, 1, 3, 192, 0, 0, 0, 192, '9999-12-31', '2019-11-09 05:25:10', '2019-11-09 05:25:10'),
(144, 48, 4, NULL, 100, 100, 1, 1, 0, 0, 0, 100, '9999-12-31', '2019-11-10 13:02:21', '2019-11-10 13:02:21'),
(149, 49, 22, NULL, 10, 10, 1, 800, 0, 10, 800, 8800, '9999-12-31', '2019-11-11 04:28:59', '2019-11-11 04:28:59'),
(158, 55, 48, 3, 1, 1, 1, 2, 0, 0, 0, 2, '9999-12-31', '2019-11-27 16:28:35', '2019-11-27 16:28:35'),
(159, 55, 48, 2, 1, 1, 1, 2, 0, 0, 0, 2, '9999-12-31', '2019-11-27 16:28:35', '2019-11-27 16:28:35'),
(161, 57, 3, NULL, 1, 1, 1, 200, 0, 0, 0, 200, '9999-12-31', '2019-12-04 17:07:49', '2019-12-04 17:07:49'),
(162, 58, 48, 2, 1, 1, 1, 2, 0, 0, 0, 2, '9999-12-31', '2019-12-05 04:21:10', '2019-12-05 04:21:10'),
(163, 58, 48, 3, 1, 1, 1, 2, 0, 0, 0, 2, '9999-12-31', '2019-12-05 04:21:10', '2019-12-05 04:21:10'),
(169, 59, 48, 3, 1, 1, 1, 2, 0, 0, 0, 2, '9999-12-31', '2019-12-21 10:22:29', '2019-12-21 10:22:29'),
(170, 59, 48, 2, 1, 1, 1, 2, 0, 0, 0, 2, '9999-12-31', '2019-12-21 10:22:29', '2019-12-21 10:22:29'),
(171, 59, 48, 5, 1, 1, 1, 2, 0, 0, 0, 2, '9999-12-31', '2019-12-21 10:22:29', '2019-12-21 10:22:29'),
(174, 56, 48, 2, 1, 1, 1, 2, 0, 0, 0, 2, '9999-12-31', '2019-12-21 13:27:16', '2019-12-21 13:27:16'),
(178, 61, 48, 3, 10, 10, 1, 2, 0, 0, 0, 20, '9999-12-31', '2020-01-01 07:06:31', '2020-01-01 07:06:31'),
(179, 61, 48, 2, 10, 10, 1, 2, 0, 0, 0, 20, '9999-12-31', '2020-01-01 07:06:31', '2020-01-01 07:06:31'),
(180, 61, 48, 5, 10, 10, 1, 2, 0, 0, 0, 20, '9999-12-31', '2020-01-01 07:06:31', '2020-01-01 07:06:31'),
(181, 62, 25, NULL, 3, 3, 1, 500, 0, 10, 150, 1650, '9999-12-31', '2020-01-01 08:24:02', '2020-01-01 08:24:02'),
(209, 67, 31, NULL, 1, 1, 1, 250, 0, 0, 0, 250, '9999-12-31', '2020-02-04 17:00:41', '2020-02-04 17:00:41'),
(210, 67, 30, NULL, 1, 1, 1, 50, 0, 0, 0, 50, '9999-12-31', '2020-02-04 17:00:41', '2020-02-04 17:00:41'),
(212, 69, 4, NULL, 50, 50, 1, 1, 0, 0, 0, 50, '9999-12-31', '2020-03-02 05:55:10', '2020-03-02 05:55:10'),
(213, 70, 4, NULL, 50, 50, 1, 1, 0, 0, 0, 50, '9999-12-31', '2020-03-02 05:56:03', '2020-03-02 05:56:03'),
(214, 71, 25, NULL, 3, 3, 1, 500, 0, 10, 150, 1650, '9999-12-31', '2020-04-06 13:35:12', '2020-04-06 13:35:12'),
(215, 71, 31, NULL, 5, 5, 1, 250, 0, 0, 0, 1250, '9999-12-31', '2020-04-06 13:35:12', '2020-04-06 13:35:12'),
(216, 71, 30, NULL, 3, 3, 1, 50, 0, 0, 0, 150, '9999-12-31', '2020-04-06 13:35:12', '2020-04-06 13:35:12'),
(217, 72, 61, NULL, 10, 10, 1, 2500, 5000, 15, 3750, 28750, '9999-12-31', '2020-08-16 16:02:07', '2020-08-16 16:02:07'),
(219, 73, 62, 12, 2, 2, 1, 1, 0, 0, 0, 2, '9999-12-31', '2020-09-27 09:07:44', '2020-09-27 09:07:44'),
(221, 74, 61, NULL, 11, 11, 1, 3000, 0, 15, 4950, 37950, '9999-12-31', '2020-10-24 01:03:16', '2020-10-24 01:03:16'),
(222, 74, 22, NULL, 4, 4, 1, 800, 0, 10, 320, 3520, '9999-12-31', '2020-10-24 01:03:16', '2020-10-24 01:03:16'),
(232, 83, 60, 9, 2, 2, 1, 1, 0, 0, 0, 2, '9999-12-31', '2020-10-26 22:56:11', '2020-10-26 22:56:11'),
(233, 84, 60, 9, 2, 2, 1, 2, 0, 0, 0, 4, '9999-12-31', '2020-10-26 22:56:58', '2020-10-26 22:56:58'),
(234, 85, 1, NULL, 1, 1, 1, 320, 0, 10, 32, 352, '9999-12-31', '2020-11-02 03:29:52', '2020-11-02 03:29:52'),
(239, 87, 1, NULL, 1, 1, 1, 320, 0, 10, 32, 352, '9999-12-31', '2020-11-02 05:20:34', '2020-11-02 05:20:34'),
(242, 89, 62, 12, 1, 1, 1, 1, 0, 0, 0, 1, '9999-12-31', '2020-11-16 09:01:45', '2020-11-16 09:01:45'),
(243, 89, 1, NULL, 1, 1, 1, 320, 0, 10, 32, 352, '9999-12-31', '2020-11-16 09:01:45', '2020-11-16 09:01:45'),
(244, 90, 61, NULL, 10, 10, 1, 3000, 0, 15, 4500, 34500, '9999-12-31', '2020-11-18 00:15:44', '2020-11-18 00:15:44'),
(245, 91, 25, NULL, 100, 100, 1, 500, 0, 10, 5000, 55000, '9999-12-31', '2020-11-29 05:03:35', '2020-11-29 05:03:35'),
(246, 92, 1, NULL, 2, 2, 1, 315, 10, 10, 63, 693, '9999-12-31', '2020-12-01 04:40:53', '2020-12-01 04:40:53'),
(247, 92, 2, NULL, 1, 1, 3, 192, 0, 0, 0, 192, '9999-12-31', '2020-12-01 04:40:53', '2020-12-01 04:40:53'),
(248, 93, 68, 20, 100, 100, 7, 500, 0, 10, 5000, 55000, '9999-12-31', '2020-12-02 00:23:23', '2020-12-02 00:23:23'),
(249, 94, 1, NULL, 2, 0, 1, 315, 10, 10, 63, 693, '9999-12-31', '2020-12-02 00:36:27', '2020-12-02 00:36:27'),
(250, 94, 2, NULL, 1, 0, 3, 192, 0, 0, 0, 192, '9999-12-31', '2020-12-02 00:36:27', '2020-12-02 00:36:27'),
(251, 95, 69, NULL, 200, 200, 1, 227.27, 0, 10, 4545.45, 50000, '9999-12-31', '2020-12-29 23:47:11', '2020-12-29 23:47:11'),
(253, 96, 70, NULL, 25, 25, 1, 500, 0, 0, 0, 12500, '9999-12-31', '2021-01-03 23:04:45', '2021-01-03 23:04:45'),
(254, 97, 71, NULL, 100, 100, 1, 500, 0, 0, 0, 50000, '9999-12-31', '2021-01-15 23:44:45', '2021-01-15 23:44:45'),
(255, 98, 73, NULL, 1, 1, 1, 1200, 0, 0, 0, 1200, '9999-12-31', '2021-01-27 04:05:24', '2021-01-27 04:05:24'),
(257, 99, 82, NULL, 2, 2, 1, 45000, 0, 0, 0, 90000, '9999-12-31', '2021-02-02 23:07:44', '2021-02-02 23:07:44'),
(258, 100, 92, NULL, 3, 3, 1, 354, 0, 0, 0, 1062, '9999-12-31', '2021-02-02 23:36:31', '2021-02-02 23:36:31'),
(259, 101, 92, NULL, 1, 1, 1, 354, 0, 0, 0, 354, '9999-12-31', '2021-02-02 23:38:27', '2021-02-02 23:38:27'),
(261, 102, 93, NULL, 5, 5, 1, 818, 0, 0, 0, 4090, '9999-12-31', '2021-02-04 00:29:41', '2021-02-04 00:29:41'),
(262, 103, 73, NULL, 1, 1, 1, 1000, 0, 0, 0, 1000, '9999-12-31', '2021-02-04 05:38:10', '2021-02-04 05:38:10'),
(265, 105, 74, NULL, 1, 1, 1, 3000, 0, 0, 0, 3000, '9999-12-31', '2021-02-05 23:42:06', '2021-02-05 23:42:06'),
(272, 106, 85, NULL, 2, 2, 1, 3000, 0, 0, 0, 6000, '2021-02-10', '2021-02-05 23:57:12', '2021-02-05 23:57:12'),
(273, 106, 75, NULL, 4, 4, 1, 3000, 0, 0, 0, 12000, '2021-02-27', '2021-02-05 23:57:12', '2021-02-05 23:57:12'),
(274, 104, 84, NULL, 2, 2, 1, 107525, 0, 0, 0, 215050, '2021-02-21', '2021-02-06 04:12:00', '2021-02-06 04:12:00'),
(275, 104, 87, NULL, 3, 3, 1, 9832, 0, 0, 0, 29496, '2021-02-14', '2021-02-06 04:12:00', '2021-02-06 04:12:00'),
(276, 107, 73, NULL, 5, 5, 1, 1000, 0, 0, 0, 5000, '2021-02-17', '2021-02-08 04:14:15', '2021-02-08 04:14:15'),
(282, 108, 95, NULL, 1, 1, 1, 68000, 0, 0, 0, 68000, '2024-02-09', '2021-02-09 02:38:13', '2021-02-09 02:38:13'),
(283, 108, 96, NULL, 1, 1, 1, 48000, 0, 0, 0, 48000, '2021-02-09', '2021-02-09 02:38:13', '2021-02-09 02:38:13'),
(284, 108, 97, NULL, 1, 1, 1, 56000, 0, 0, 0, 56000, '2021-02-09', '2021-02-09 02:38:14', '2021-02-09 02:38:14'),
(285, 108, 98, NULL, 1, 1, 1, 52000, 0, 0, 0, 52000, '2021-02-09', '2021-02-09 02:38:14', '2021-02-09 02:38:14'),
(286, 108, 99, NULL, 1, 1, 1, 1800, 0, 0, 0, 1800, '2021-02-09', '2021-02-09 02:38:14', '2021-02-09 02:38:14'),
(287, 109, 99, NULL, 5, 5, 1, 1800, 0, 0, 0, 9000, '2021-02-18', '2021-02-11 05:13:16', '2021-02-11 05:13:16'),
(288, 110, 100, NULL, 6, 6, 1, 70, 0, 0, 0, 420, '2021-02-12', '2021-02-11 05:25:54', '2021-02-11 05:25:54'),
(289, 111, 82, NULL, 2, 2, 1, 45000, 0, 0, 0, 90000, '2021-02-20', '2021-02-13 00:55:24', '2021-02-13 00:55:24');

-- --------------------------------------------------------

--
-- Table structure for table `product_quotation`
--

CREATE TABLE `product_quotation` (
  `id` int(10) UNSIGNED NOT NULL,
  `quotation_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `variant_id` int(11) DEFAULT NULL,
  `qty` double NOT NULL,
  `sale_unit_id` int(11) NOT NULL,
  `net_unit_price` double NOT NULL,
  `discount` double NOT NULL,
  `tax_rate` double NOT NULL,
  `tax` double NOT NULL,
  `total` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_quotation`
--

INSERT INTO `product_quotation` (`id`, `quotation_id`, `product_id`, `variant_id`, `qty`, `sale_unit_id`, `net_unit_price`, `discount`, `tax_rate`, `tax`, `total`, `created_at`, `updated_at`) VALUES
(2, 1, 1, NULL, 1, 2, 5030, 10, 15, 754.5, 5784.5, '2018-08-08 23:52:50', '2018-08-28 00:09:57'),
(3, 1, 4, NULL, 50, 1, 1.5, 25, 10, 7.5, 82.5, '2018-08-08 23:53:25', '2018-08-28 00:34:36'),
(4, 1, 2, NULL, 6, 1, 9.55, 0, 10, 5.73, 63, '2018-08-28 01:03:48', '2018-08-28 01:07:07'),
(5, 2, 10, NULL, 2.5, 7, 22, 0, 0, 0, 55, '2018-09-03 22:02:58', '2018-09-20 10:37:41'),
(6, 2, 13, NULL, 1, 0, 21, 0, 0, 0, 21, '2018-09-03 22:02:58', '2018-09-03 22:02:58'),
(7, 3, 1, NULL, 1, 1, 400, 0, 10, 40, 440, '2018-10-23 00:12:49', '2019-12-21 06:41:37'),
(19, 3, 48, 2, 1, 1, 13, 0, 0, 0, 13, '2019-12-07 08:50:02', '2019-12-21 06:41:37'),
(27, 11, 61, NULL, 2, 1, 10000, 0, 15, 3000, 23000, '2020-10-24 03:08:14', '2020-12-02 03:57:03'),
(28, 12, 68, 20, 1, 7, 34000, 0, 10, 3400, 37400, '2020-12-02 04:19:14', '2020-12-02 04:19:14');

-- --------------------------------------------------------

--
-- Table structure for table `product_returns`
--

CREATE TABLE `product_returns` (
  `id` int(10) UNSIGNED NOT NULL,
  `return_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `variant_id` int(11) DEFAULT NULL,
  `qty` double NOT NULL,
  `sale_unit_id` int(11) NOT NULL,
  `net_unit_price` double NOT NULL,
  `discount` double NOT NULL,
  `tax_rate` double NOT NULL,
  `tax` double NOT NULL,
  `total` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_returns`
--

INSERT INTO `product_returns` (`id`, `return_id`, `product_id`, `variant_id`, `qty`, `sale_unit_id`, `net_unit_price`, `discount`, `tax_rate`, `tax`, `total`, `created_at`, `updated_at`) VALUES
(3, 2, 4, NULL, 20, 1, 2, 0, 0, 0, 40, NULL, NULL),
(4, 3, 10, NULL, 2, 7, 22, 0, 0, 0, 44, NULL, '2018-10-07 02:19:40'),
(6, 5, 3, NULL, 1, 1, 250, 0, 0, 0, 250, NULL, '2018-12-25 22:16:08'),
(12, 6, 1, NULL, 1, 1, 400, 0, 10, 40, 440, NULL, NULL),
(23, 11, 13, NULL, 1, 0, 21, 0, 0, 0, 21, '2019-12-24 05:20:29', '2019-12-24 05:20:29'),
(26, 13, 61, NULL, 1, 1, 10000, 0, 15, 1500, 11500, '2020-08-16 16:25:02', '2020-08-16 16:25:02'),
(27, 14, 1, NULL, 1, 1, 400, 0, 10, 40, 440, '2020-10-13 11:39:54', '2020-10-13 11:39:54'),
(31, 18, 61, NULL, 1, 1, 10000, 0, 15, 1500, 11500, '2020-11-18 01:02:18', '2020-11-18 01:02:18'),
(32, 19, 68, 20, 1, 7, 30600, 0, 10, 3060, 33660, '2020-12-02 05:08:57', '2020-12-02 05:08:57'),
(33, 20, 69, NULL, 1, 1, 280, 0, 0, 0, 280, '2020-12-30 04:03:25', '2020-12-30 04:03:25'),
(34, 21, 70, NULL, 1, 1, 502, 0, 0, 0, 502, '2021-01-05 22:42:42', '2021-01-05 22:42:42');

-- --------------------------------------------------------

--
-- Table structure for table `product_sales`
--

CREATE TABLE `product_sales` (
  `id` int(10) UNSIGNED NOT NULL,
  `sale_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `variant_id` int(11) DEFAULT NULL,
  `qty` double NOT NULL,
  `sale_unit_id` int(11) NOT NULL,
  `net_unit_price` double NOT NULL,
  `discount` double NOT NULL,
  `tax_rate` double NOT NULL,
  `tax` double NOT NULL,
  `total` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_sales`
--

INSERT INTO `product_sales` (`id`, `sale_id`, `product_id`, `variant_id`, `qty`, `sale_unit_id`, `net_unit_price`, `discount`, `tax_rate`, `tax`, `total`, `created_at`, `updated_at`) VALUES
(1, 1, 2, NULL, 1, 2, 104.35, 0, 15, 15.65, 120, '2018-08-08 10:36:23', '2018-08-08 11:13:27'),
(3, 1, 5, NULL, 2, 1, 115, 10, 0, 0, 230, '2018-08-08 11:13:28', '2018-08-08 11:13:28'),
(4, 2, 1, NULL, 10, 1, 420, 0, 10, 420, 4620, '2018-08-08 23:54:53', '2018-08-08 23:54:53'),
(5, 2, 4, NULL, 50, 1, 2.1, 0, 0, 0, 105, '2018-08-08 23:54:53', '2018-08-08 23:54:53'),
(6, 2, 2, NULL, 3, 2, 109.57, 0, 15, 49.3, 378, '2018-08-08 23:54:53', '2018-08-08 23:54:53'),
(7, 3, 4, NULL, 20, 1, 2.1, 0, 0, 0, 42, '2018-08-09 00:32:15', '2018-08-09 00:32:15'),
(8, 3, 5, NULL, 5, 1, 126, 0, 0, 0, 630, '2018-08-09 00:32:15', '2018-08-09 00:32:15'),
(9, 3, 3, NULL, 1, 1, 225, 0, 0, 0, 225, '2018-08-09 00:32:15', '2018-08-09 00:32:15'),
(10, 4, 1, NULL, 2, 1, 400, 0, 10, 80, 880, '2018-08-24 21:48:37', '2018-08-24 21:48:37'),
(12, 6, 13, NULL, 1, 0, 18.9, 0, 0, 0, 18.9, '2018-08-26 03:48:36', '2018-08-26 05:48:05'),
(13, 7, 1, NULL, 2, 1, 400, 0, 10, 80, 880, '2018-08-27 01:35:45', '2018-08-27 01:35:45'),
(14, 8, 5, NULL, 2, 2, 1440, 0, 10, 288, 3168, '2018-09-01 23:39:54', '2018-09-01 23:39:54'),
(15, 9, 4, NULL, 10, 1, 2, 0, 0, 0, 20, '2018-09-02 21:33:14', '2018-09-02 21:33:14'),
(16, 10, 3, NULL, 1, 1, 250, 0, 0, 0, 250, '2018-09-02 23:01:39', '2018-09-02 23:01:39'),
(17, 11, 22, NULL, 5, 1, 1000, 0, 10, 500, 5500, '2018-09-03 04:08:21', '2018-09-03 04:08:21'),
(18, 12, 22, NULL, 10, 1, 1050, 0, 10, 1050, 11550, '2018-09-03 04:10:33', '2018-09-03 04:10:33'),
(46, 29, 5, NULL, 1, 1, 120, 0, 0, 0, 120, '2018-09-09 03:38:41', '2018-09-09 03:38:41'),
(47, 30, 1, NULL, 1, 1, 400, 0, 10, 40, 440, '2018-09-09 22:57:06', '2018-09-20 09:12:38'),
(48, 31, 1, NULL, 1, 1, 400, 0, 10, 40, 440, '2018-09-26 03:20:59', '2018-09-26 03:21:25'),
(49, 31, 2, NULL, 1, 2, 104.35, 0, 15, 15.65, 120, '2018-09-26 03:20:59', '2018-09-26 03:21:25'),
(50, 32, 1, NULL, 1, 1, 400, 0, 10, 40, 440, '2018-10-04 03:55:48', '2018-10-04 03:55:48'),
(51, 33, 1, NULL, 1, 1, 400, 0, 10, 40, 440, '2018-10-04 04:00:23', '2018-10-04 04:00:23'),
(57, 37, 3, NULL, 1, 1, 250, 0, 0, 0, 250, '2018-10-07 00:46:05', '2018-10-07 00:46:05'),
(58, 38, 1, NULL, 1, 1, 400, 0, 10, 40, 440, '2018-10-07 00:47:19', '2018-10-07 00:47:19'),
(61, 40, 1, NULL, 1, 1, 400, 0, 10, 40, 440, '2018-10-07 01:13:12', '2018-10-07 01:13:12'),
(62, 41, 1, NULL, 1, 1, 400, 0, 10, 40, 440, '2018-10-09 22:16:21', '2018-10-09 22:16:21'),
(63, 41, 13, NULL, 1, 0, 21, 0, 0, 0, 21, '2018-10-09 22:16:21', '2018-10-09 22:16:21'),
(64, 42, 1, NULL, 1, 1, 400, 0, 10, 40, 440, '2018-10-09 23:34:51', '2018-10-09 23:34:51'),
(65, 43, 1, NULL, 1, 1, 400, 0, 10, 40, 440, '2018-10-15 21:34:35', '2018-10-15 21:34:35'),
(78, 55, 3, NULL, 1, 1, 250, 0, 0, 0, 250, '2018-10-21 00:53:34', '2018-10-21 00:53:34'),
(80, 57, 1, NULL, 1, 1, 400, 0, 10, 40, 440, '2018-10-21 02:26:12', '2018-10-21 02:26:12'),
(81, 57, 13, NULL, 2, 0, 21, 0, 0, 0, 42, '2018-10-21 02:26:13', '2018-10-21 02:26:13'),
(82, 58, 22, NULL, 1, 1, 1000, 0, 10, 100, 1100, '2018-10-22 09:27:24', '2018-10-22 09:27:24'),
(83, 58, 5, NULL, 1, 1, 120, 0, 0, 0, 120, '2018-10-22 09:27:24', '2018-10-22 09:27:24'),
(101, 73, 25, NULL, 3, 1, 1000, 0, 10, 300, 3300, '2018-10-23 01:15:43', '2018-10-23 01:15:43'),
(102, 73, 22, NULL, 2, 1, 1000, 0, 10, 200, 2200, '2018-10-23 01:15:44', '2018-10-23 01:15:44'),
(103, 74, 22, NULL, 1, 1, 1000, 0, 10, 100, 1100, '2018-10-23 01:16:44', '2018-10-23 01:16:44'),
(104, 74, 25, NULL, 1, 1, 1000, 0, 10, 100, 1100, '2018-10-23 01:16:44', '2018-10-23 01:16:44'),
(105, 74, 5, NULL, 1, 1, 120, 0, 0, 0, 120, '2018-10-23 01:16:44', '2018-10-23 01:16:44'),
(106, 75, 2, NULL, 3, 2, 104.35, 0, 15, 46.96, 360, '2018-10-31 23:00:27', '2018-10-31 23:00:27'),
(107, 75, 22, NULL, 2, 1, 1000, 0, 10, 200, 2200, '2018-10-31 23:00:27', '2018-10-31 23:00:27'),
(108, 75, 25, NULL, 3, 1, 1000, 0, 10, 300, 3300, '2018-10-31 23:00:27', '2018-10-31 23:00:27'),
(109, 75, 1, NULL, 2, 1, 400, 0, 10, 80, 880, '2018-10-31 23:00:27', '2018-10-31 23:00:27'),
(110, 75, 5, NULL, 2, 1, 120, 0, 0, 0, 240, '2018-10-31 23:00:27', '2018-10-31 23:00:27'),
(111, 76, 3, NULL, 1, 1, 250, 0, 0, 0, 250, '2018-10-31 23:01:26', '2018-11-03 03:28:56'),
(112, 76, 22, NULL, 1, 1, 1000, 0, 10, 100, 1100, '2018-10-31 23:01:27', '2018-11-03 03:28:56'),
(113, 76, 13, NULL, 4, 0, 21, 0, 0, 0, 84, '2018-10-31 23:01:27', '2018-11-03 03:28:56'),
(117, 79, 1, NULL, 4, 1, 400, 0, 10, 160, 1760, '2018-11-05 03:15:17', '2018-11-05 03:15:17'),
(118, 79, 2, NULL, 7, 2, 104.35, 0, 15, 109.57, 840, '2018-11-05 03:15:17', '2018-11-05 03:15:17'),
(119, 79, 3, NULL, 7, 1, 250, 0, 0, 0, 1750, '2018-11-05 03:15:17', '2018-11-05 03:15:17'),
(120, 79, 4, NULL, 7, 1, 2, 0, 0, 0, 14, '2018-11-05 03:15:17', '2018-11-05 03:15:17'),
(121, 79, 22, NULL, 8, 1, 1000, 0, 10, 800, 8800, '2018-11-05 03:15:17', '2018-11-05 03:15:17'),
(122, 79, 13, NULL, 10, 0, 21, 0, 0, 0, 210, '2018-11-05 03:15:17', '2018-11-05 03:15:17'),
(123, 79, 5, NULL, 9, 1, 120, 0, 0, 0, 1080, '2018-11-05 03:15:17', '2018-11-05 03:15:17'),
(124, 80, 2, NULL, 2, 2, 104.35, 0, 15, 31.3, 240, '2018-11-05 03:19:58', '2018-11-05 03:19:58'),
(125, 80, 3, NULL, 2, 1, 250, 0, 0, 0, 500, '2018-11-05 03:19:58', '2018-11-05 03:19:58'),
(126, 80, 1, NULL, 4, 1, 400, 0, 10, 160, 1760, '2018-11-05 03:19:58', '2018-11-05 03:19:58'),
(132, 86, 22, NULL, 1, 1, 1000, 0, 10, 100, 1100, '2018-11-05 03:59:48', '2018-11-05 03:59:48'),
(134, 88, 22, NULL, 1, 1, 1000, 0, 10, 100, 1100, '2018-11-05 04:02:58', '2018-11-05 04:02:58'),
(142, 94, 2, NULL, 1, 2, 104.35, 0, 15, 15.65, 120, '2018-11-26 08:05:34', '2018-11-26 08:05:34'),
(143, 95, 5, NULL, 3, 1, 120, 0, 0, 0, 360, '2018-11-27 03:36:08', '2018-11-27 03:36:08'),
(144, 95, 5, NULL, 3, 1, 120, 0, 0, 0, 360, '2018-11-27 03:36:08', '2018-11-27 03:36:08'),
(145, 96, 2, NULL, 1, 2, 104.35, 0, 15, 15.65, 120, '2018-11-28 01:15:09', '2018-11-28 01:15:09'),
(146, 97, 2, NULL, 2, 2, 104.35, 0, 15, 31.3, 240, '2018-12-01 00:05:18', '2018-12-01 00:05:18'),
(147, 97, 10, NULL, 1, 7, 22, 0, 0, 0, 22, '2018-12-01 00:05:18', '2018-12-01 00:05:18'),
(148, 98, 30, NULL, 2, 1, 100, 0, 0, 0, 200, '2018-12-04 23:35:58', '2018-12-04 23:35:58'),
(149, 98, 31, NULL, 2, 1, 300, 0, 0, 0, 600, '2018-12-04 23:35:58', '2018-12-04 23:35:58'),
(150, 99, 30, NULL, 2, 1, 100, 0, 0, 0, 200, '2018-12-04 23:37:19', '2018-12-04 23:37:19'),
(151, 99, 31, NULL, 2, 1, 300, 0, 0, 0, 600, '2018-12-04 23:37:20', '2018-12-04 23:37:20'),
(153, 101, 30, NULL, 1, 1, 100, 0, 0, 0, 100, '2018-12-08 00:20:26', '2018-12-08 00:20:26'),
(155, 103, 2, NULL, 1, 2, 104.35, 0, 15, 15.65, 120, '2018-12-23 22:58:32', '2018-12-23 22:58:32'),
(156, 104, 33, NULL, 4, 1, 2, 0, 0, 0, 8, '2018-12-24 03:15:27', '2018-12-24 21:55:23'),
(157, 104, 26, NULL, 2, 0, 1250, 0, 0, 0, 2500, '2018-12-24 21:47:54', '2018-12-24 21:55:23'),
(158, 105, 13, NULL, 1, 0, 21, 0, 0, 0, 21, '2018-12-31 23:45:38', '2018-12-31 23:45:38'),
(159, 106, 2, NULL, 1, 2, 104.35, 0, 15, 15.65, 120, '2019-01-01 03:10:40', '2019-01-01 03:10:40'),
(160, 106, 3, NULL, 2, 1, 250, 0, 0, 0, 500, '2019-01-01 03:10:40', '2019-01-01 03:10:40'),
(161, 106, 5, NULL, 2, 1, 120, 0, 0, 0, 240, '2019-01-01 03:10:40', '2019-01-01 03:10:40'),
(162, 107, 3, NULL, 2, 1, 250, 0, 0, 0, 500, '2019-01-03 00:56:27', '2019-01-03 00:56:27'),
(163, 107, 5, NULL, 2, 1, 120, 0, 0, 0, 240, '2019-01-03 00:56:27', '2019-01-03 00:56:27'),
(164, 107, 22, NULL, 2, 1, 1000, 0, 10, 200, 2200, '2019-01-03 00:56:27', '2019-01-03 00:56:27'),
(165, 107, 25, NULL, 1, 1, 1000, 0, 10, 100, 1100, '2019-01-03 00:56:27', '2019-01-03 00:56:27'),
(166, 107, 1, NULL, 2, 1, 400, 0, 10, 80, 880, '2019-01-03 00:56:27', '2019-01-03 00:56:27'),
(167, 107, 2, NULL, 1, 2, 104.35, 0, 15, 15.65, 120, '2019-01-03 00:56:27', '2019-01-03 00:56:27'),
(168, 108, 2, NULL, 1, 2, 104.35, 0, 15, 15.65, 120, '2019-01-20 09:58:24', '2019-01-20 09:58:24'),
(169, 109, 1, NULL, 1, 1, 400, 0, 10, 40, 440, '2019-01-29 04:14:43', '2019-01-29 04:14:43'),
(170, 109, 30, NULL, 1, 1, 100, 0, 0, 0, 100, '2019-01-29 04:14:43', '2019-01-29 04:14:43'),
(171, 110, 31, NULL, 2, 1, 300, 0, 0, 0, 600, '2019-01-29 05:50:41', '2019-01-29 05:50:41'),
(172, 110, 25, NULL, 1, 1, 1000, 0, 10, 100, 1100, '2019-01-29 05:50:41', '2019-01-29 05:50:41'),
(173, 111, 3, NULL, 1, 1, 250, 0, 0, 0, 250, '2019-01-31 05:08:39', '2019-01-31 05:08:39'),
(174, 111, 13, NULL, 1, 0, 21, 0, 0, 0, 21, '2019-01-31 05:08:39', '2019-01-31 05:08:39'),
(175, 112, 1, NULL, 1, 1, 400, 0, 10, 40, 440, '2019-02-02 04:40:45', '2019-02-02 04:40:45'),
(176, 113, 3, NULL, 1, 1, 250, 0, 0, 0, 250, '2019-02-02 05:41:17', '2019-02-02 05:41:17'),
(177, 113, 30, NULL, 1, 1, 100, 0, 0, 0, 100, '2019-02-02 05:41:17', '2019-02-02 05:41:17'),
(178, 114, 1, NULL, 1, 1, 400, 0, 10, 40, 440, '2019-02-05 09:04:45', '2019-02-05 09:04:45'),
(183, 118, 1, NULL, 1, 1, 400, 0, 10, 40, 440, '2019-02-07 05:15:42', '2019-02-07 05:15:42'),
(185, 120, 1, NULL, 1, 1, 400, 0, 10, 40, 440, '2019-02-07 05:40:37', '2019-02-07 05:40:37'),
(186, 121, 3, NULL, 1, 1, 250, 0, 0, 0, 250, '2019-02-09 04:48:14', '2019-02-09 04:48:14'),
(187, 121, 2, NULL, 1, 2, 104.35, 0, 15, 15.65, 120, '2019-02-09 04:48:14', '2019-02-09 04:48:14'),
(188, 121, 4, NULL, 10, 1, 2, 0, 0, 0, 20, '2019-02-09 04:48:15', '2019-02-09 04:48:15'),
(189, 121, 13, NULL, 2, 0, 21, 0, 0, 0, 42, '2019-02-09 04:48:15', '2019-02-09 04:48:15'),
(190, 121, 1, NULL, 1, 1, 400, 0, 10, 40, 440, '2019-02-09 04:48:15', '2019-02-09 04:48:15'),
(191, 121, 31, NULL, 1, 1, 300, 0, 0, 0, 300, '2019-02-09 04:48:15', '2019-02-09 04:48:15'),
(192, 121, 30, NULL, 1, 1, 100, 0, 0, 0, 100, '2019-02-09 04:48:15', '2019-02-09 04:48:15'),
(194, 123, 1, NULL, 1, 1, 400, 0, 10, 40, 440, '2019-02-19 08:32:14', '2019-02-19 08:32:14'),
(198, 127, 31, NULL, 1, 1, 300, 0, 0, 0, 300, '2019-03-03 04:40:10', '2019-03-03 04:40:10'),
(199, 127, 25, NULL, 1, 1, 1000, 0, 10, 100, 1100, '2019-03-03 04:40:10', '2019-03-03 04:40:10'),
(200, 127, 22, NULL, 1, 1, 1000, 0, 10, 100, 1100, '2019-03-03 04:40:10', '2019-03-03 04:40:10'),
(201, 128, 1, NULL, 1, 1, 400, 0, 10, 40, 440, '2019-04-04 03:55:55', '2019-04-04 03:55:55'),
(202, 128, 2, NULL, 1, 2, 104.35, 0, 15, 15.65, 120, '2019-04-04 03:55:55', '2019-04-04 03:55:55'),
(203, 129, 5, NULL, 2, 1, 120, 0, 0, 0, 240, '2019-04-04 03:59:37', '2019-04-11 04:50:16'),
(204, 130, 1, NULL, 1, 1, 400, 0, 10, 40, 440, '2019-04-21 06:21:24', '2019-04-21 06:21:24'),
(205, 130, 2, NULL, 1, 2, 125.22, 0, 15, 18.78, 144, '2019-04-21 06:21:24', '2019-04-21 06:21:24'),
(206, 130, 4, NULL, 1, 1, 2, 0, 0, 0, 2, '2019-04-21 06:21:24', '2019-04-21 06:21:24'),
(207, 131, 1, NULL, 1, 1, 400, 0, 10, 40, 440, '2019-05-28 04:32:29', '2019-05-28 04:32:29'),
(208, 131, 3, NULL, 1, 1, 250, 0, 0, 0, 250, '2019-05-28 04:32:29', '2019-05-28 04:32:29'),
(209, 131, 25, NULL, 1, 1, 1000, 0, 10, 100, 1100, '2019-05-28 04:32:29', '2019-05-28 04:32:29'),
(210, 131, 22, NULL, 1, 1, 1000, 0, 10, 100, 1100, '2019-05-28 04:32:29', '2019-05-28 04:32:29'),
(211, 132, 1, NULL, 1, 1, 400, 0, 10, 40, 440, '2019-06-13 04:16:37', '2019-06-13 04:16:37'),
(212, 132, 30, NULL, 1, 1, 100, 0, 0, 0, 100, '2019-06-13 04:16:37', '2019-06-13 04:16:37'),
(213, 132, 31, NULL, 1, 1, 300, 0, 0, 0, 300, '2019-06-13 04:16:37', '2019-06-13 04:16:37'),
(214, 133, 3, NULL, 2, 1, 250, 0, 0, 0, 500, '2019-06-13 04:17:51', '2019-06-13 04:17:51'),
(215, 133, 25, NULL, 1, 1, 1000, 0, 10, 100, 1100, '2019-06-13 04:17:52', '2019-06-13 04:17:52'),
(216, 133, 22, NULL, 1, 1, 1000, 0, 10, 100, 1100, '2019-06-13 04:17:52', '2019-06-13 04:17:52'),
(217, 134, 1, NULL, 1, 1, 400, 0, 10, 40, 440, '2019-10-19 09:30:28', '2019-10-19 09:30:28'),
(218, 134, 22, NULL, 1, 1, 1000, 0, 10, 100, 1100, '2019-10-19 09:30:28', '2019-10-19 09:30:28'),
(219, 134, 25, NULL, 1, 1, 1000, 0, 10, 100, 1100, '2019-10-19 09:30:28', '2019-10-19 09:30:28'),
(220, 134, 31, NULL, 1, 1, 300, 0, 0, 0, 300, '2019-10-19 09:30:28', '2019-10-19 09:30:28'),
(224, 138, 5, NULL, 1, 1, 120, 0, 0, 0, 120, '2019-10-31 06:29:37', '2019-10-31 06:29:37'),
(225, 139, 2, NULL, 2, 2, 125.22, 0, 15, 37.57, 288, '2019-11-03 05:40:44', '2019-11-03 05:40:44'),
(226, 139, 4, NULL, 100, 1, 2, 0, 0, 0, 200, '2019-11-03 05:40:44', '2019-11-03 05:40:44'),
(236, 144, 22, NULL, 1, 1, 1000, 0, 10, 100, 1100, '2019-11-09 13:41:31', '2019-11-09 13:41:31'),
(237, 144, 5, NULL, 1, 1, 120, 0, 0, 0, 120, '2019-11-09 13:41:31', '2019-11-09 13:41:31'),
(241, 147, 22, NULL, 1, 1, 1000, 0, 10, 100, 1100, '2019-11-11 04:40:08', '2019-11-11 04:40:08'),
(242, 147, 25, NULL, 1, 1, 1000, 0, 10, 100, 1100, '2019-11-11 04:40:08', '2019-11-11 04:40:08'),
(243, 147, 4, NULL, 10, 1, 2, 0, 0, 0, 20, '2019-11-11 04:40:08', '2019-11-11 04:40:08'),
(282, 172, 1, NULL, 1, 1, 400, 0, 10, 40, 440, '2019-12-03 09:46:31', '2019-12-03 09:46:31'),
(283, 173, 3, NULL, 1, 1, 225, 0, 0, 0, 225, '2019-12-04 17:19:40', '2019-12-04 17:19:40'),
(284, 173, 1, NULL, 1, 1, 360, 0, 10, 36, 396, '2019-12-04 17:19:40', '2019-12-04 17:19:40'),
(306, 187, 2, NULL, 2, 2, 125.22, 0, 15, 37.57, 288, '2019-12-22 04:40:58', '2019-12-22 04:40:58'),
(308, 190, 22, NULL, 1, 1, 1000, 0, 10, 100, 1100, '2019-12-23 06:59:46', '2019-12-23 06:59:46'),
(312, 193, 25, NULL, 1, 1, 1000, 0, 10, 100, 1100, '2020-01-01 08:20:28', '2020-01-01 08:20:28'),
(313, 194, 1, NULL, 2, 1, 400, 0, 10, 80, 880, '2020-01-02 10:39:47', '2020-01-02 10:39:47'),
(314, 194, 2, NULL, 1, 1, 10.43, 0, 15, 1.57, 12, '2020-01-02 10:39:47', '2020-01-02 10:39:47'),
(323, 201, 5, NULL, 1, 1, 120, 0, 0, 0, 120, '2020-02-03 09:52:56', '2020-02-03 09:52:56'),
(324, 202, 25, NULL, 1, 1, 1000, 0, 10, 100, 1100, '2020-02-04 16:58:53', '2020-02-04 16:58:53'),
(325, 202, 31, NULL, 1, 1, 300, 0, 0, 0, 300, '2020-02-04 16:58:53', '2020-02-04 16:58:53'),
(326, 203, 3, NULL, 1, 1, 250, 0, 0, 0, 250, '2020-03-02 05:54:14', '2020-03-02 05:54:14'),
(327, 203, 30, NULL, 1, 1, 100, 0, 0, 0, 100, '2020-03-02 05:54:14', '2020-03-02 05:54:14'),
(328, 204, 4, NULL, 20, 1, 2, 0, 0, 0, 40, '2020-03-02 05:57:41', '2020-03-02 05:57:41'),
(329, 205, 1, NULL, 1, 1, 400, 0, 10, 40, 440, '2020-03-11 10:46:42', '2020-03-11 10:46:42'),
(330, 206, 5, NULL, 1, 1, 120, 0, 0, 0, 120, '2020-03-11 10:52:30', '2020-03-11 10:54:04'),
(331, 207, 30, NULL, 2, 1, 100, 0, 0, 0, 200, '2020-04-06 13:40:24', '2020-04-06 13:41:11'),
(332, 207, 31, NULL, 1, 1, 300, 0, 0, 0, 300, '2020-04-06 13:40:24', '2020-04-06 13:41:11'),
(333, 207, 2, NULL, 1, 2, 125.22, 0, 15, 18.78, 144, '2020-04-06 13:41:11', '2020-04-06 13:41:11'),
(334, 208, 25, NULL, 1, 1, 1000, 0, 10, 100, 1100, '2020-05-06 16:59:50', '2020-05-06 16:59:50'),
(335, 208, 1, NULL, 1, 1, 400, 0, 10, 40, 440, '2020-05-06 16:59:50', '2020-05-06 16:59:50'),
(336, 209, 5, NULL, 1, 1, 120, 0, 0, 0, 120, '2020-06-09 06:42:48', '2020-06-09 06:42:48'),
(337, 209, 25, NULL, 1, 1, 1000, 0, 10, 100, 1100, '2020-06-09 06:42:48', '2020-06-09 06:42:48'),
(340, 212, 1, NULL, 1, 1, 350, 0, 10, 35, 385, '2020-07-03 12:39:14', '2020-07-03 12:39:14'),
(341, 212, 25, NULL, 1, 1, 1000, 0, 10, 100, 1100, '2020-07-03 12:39:14', '2020-07-03 12:39:14'),
(342, 212, 22, NULL, 1, 1, 1000, 0, 10, 100, 1100, '2020-07-03 12:39:14', '2020-07-03 12:39:14'),
(343, 213, 48, 2, 1, 1, 13, 0, 0, 0, 13, '2020-07-12 15:51:53', '2020-07-12 15:51:53'),
(344, 214, 3, NULL, 1, 1, 250, 0, 0, 0, 250, '2020-07-14 05:53:41', '2020-07-14 05:53:41'),
(347, 217, 1, NULL, 1, 1, 350, 0, 10, 35, 385, '2020-07-27 14:38:08', '2020-07-27 14:38:08'),
(348, 218, 1, NULL, 1, 1, 350, 0, 10, 35, 385, '2020-07-27 14:40:24', '2020-07-27 14:40:24'),
(349, 219, 1, NULL, 1, 1, 350, 0, 10, 35, 385, '2020-07-27 14:46:45', '2020-07-27 14:46:45'),
(350, 220, 31, NULL, 2, 1, 300, 0, 0, 0, 600, '2020-08-12 12:28:04', '2020-08-12 12:28:04'),
(351, 220, 33, NULL, 3, 1, 20, 0, 0, 0, 60, '2020-08-12 12:28:04', '2020-08-12 12:28:04'),
(352, 220, 30, NULL, 1, 1, 100, 0, 0, 0, 100, '2020-08-12 12:28:04', '2020-08-12 12:28:04'),
(353, 221, 25, NULL, 1, 1, 1000, 0, 10, 100, 1100, '2020-08-12 12:30:35', '2020-08-12 12:30:35'),
(354, 222, 61, NULL, 2, 1, 10000, 0, 15, 3000, 23000, '2020-08-16 16:04:24', '2020-08-16 16:04:24'),
(355, 223, 1, NULL, 1, 1, 400, 0, 10, 40, 440, '2020-08-16 16:05:23', '2020-08-16 16:05:23'),
(356, 224, 1, NULL, 3, 1, 390, 30, 10, 117, 1287, '2020-08-26 14:01:39', '2020-08-26 14:01:39'),
(362, 230, 3, NULL, 1, 1, 250, 0, 0, 0, 250, '2020-10-17 15:28:52', '2020-10-17 15:28:52'),
(363, 231, 1, NULL, 1, 1, 400, 0, 10, 40, 440, '2020-10-18 05:13:33', '2020-10-18 05:13:33'),
(364, 232, 30, NULL, 1, 1, 100, 0, 0, 0, 100, '2020-10-22 07:30:14', '2020-10-22 07:30:14'),
(365, 233, 3, NULL, 1, 1, 250, 0, 0, 0, 250, '2020-10-22 07:56:04', '2020-10-22 07:56:04'),
(366, 234, 61, NULL, 1, 1, 10000, 0, 15, 1500, 11500, '2020-10-24 01:05:06', '2020-10-24 01:05:06'),
(367, 235, 3, NULL, 1, 1, 250, 0, 0, 0, 250, '2020-10-24 01:07:52', '2020-10-24 01:07:52'),
(369, 237, 25, NULL, 2, 1, 1000, 0, 10, 200, 2200, '2020-10-24 09:46:01', '2020-10-24 09:46:01'),
(370, 237, 22, NULL, 2, 1, 1000, 0, 10, 200, 2200, '2020-10-24 09:46:01', '2020-10-24 09:46:01'),
(371, 237, 61, NULL, 5, 1, 10000, 0, 15, 7500, 57500, '2020-10-24 09:46:01', '2020-10-24 09:46:01'),
(373, 239, 60, 9, 1, 1, 2, 0, 0, 0, 2, '2020-10-26 23:40:02', '2020-10-26 23:40:02'),
(374, 240, 60, 9, 2, 1, 3, 0, 0, 0, 6, '2020-10-26 23:42:06', '2020-10-26 23:42:06'),
(375, 241, 3, NULL, 1, 1, 250, 0, 0, 0, 250, '2020-10-27 00:32:00', '2020-10-27 00:32:00'),
(376, 242, 3, NULL, 1, 1, 250, 0, 0, 0, 250, '2020-10-29 01:30:30', '2020-10-29 01:30:30'),
(377, 243, 3, NULL, 1, 1, 250, 0, 0, 0, 250, '2020-11-01 01:21:12', '2020-11-01 01:21:12'),
(380, 245, 1, NULL, 2, 1, 400, 0, 10, 80, 880, '2020-11-01 01:42:23', '2020-11-01 01:42:23'),
(381, 245, 3, NULL, 1, 1, 250, 0, 0, 0, 250, '2020-11-01 01:42:23', '2020-11-01 01:42:23'),
(382, 246, 1, NULL, 1, 1, 400, 0, 10, 40, 440, '2020-11-01 01:50:18', '2020-11-02 10:39:17'),
(386, 250, 1, NULL, 1, 1, 344, 0, 10, 34.4, 378.4, '2020-11-06 07:30:41', '2020-11-06 07:30:41'),
(387, 251, 1, NULL, 1, 1, 344, 0, 10, 34.4, 378.4, '2020-11-09 07:15:24', '2020-11-09 07:15:24'),
(388, 251, 3, NULL, 1, 1, 232.2, 0, 0, 0, 232.2, '2020-11-09 07:15:24', '2020-11-09 07:15:24'),
(389, 252, 3, NULL, 1, 1, 229.5, 0, 0, 0, 229.5, '2020-11-10 23:58:58', '2020-11-10 23:58:58'),
(390, 253, 3, NULL, 1, 1, 212.5, 0, 0, 0, 212.5, '2020-11-14 00:47:36', '2020-11-14 00:47:36'),
(391, 253, 31, NULL, 1, 1, 255, 0, 0, 0, 255, '2020-11-14 00:47:36', '2020-11-14 00:47:36'),
(392, 253, 61, NULL, 1, 1, 8500, 0, 15, 1275, 9775, '2020-11-14 00:47:36', '2020-11-14 00:47:36'),
(395, 256, 1, NULL, 1, 1, 400, 0, 10, 40, 440, '2020-11-17 00:47:48', '2020-11-17 00:47:48'),
(396, 256, 3, NULL, 1, 1, 250, 0, 10, 25, 275, '2020-11-17 00:47:48', '2020-11-17 00:47:48'),
(397, 257, 3, NULL, 1, 1, 250, 0, 0, 0, 250, '2020-11-17 01:09:19', '2020-11-17 01:09:19'),
(398, 258, 61, NULL, 3, 1, 10000, 0, 15, 4500, 34500, '2020-11-18 00:52:39', '2020-11-18 00:52:39'),
(399, 259, 4, NULL, 1, 1, 178.5, 0, 0, 0, 178.5, '2020-12-02 03:38:07', '2020-12-02 03:38:07'),
(400, 259, 26, NULL, 1, 0, 111562.5, 0, 0, 0, 111562.5, '2020-12-02 03:38:07', '2020-12-02 03:38:07'),
(401, 260, 69, NULL, 1, 1, 20863.64, 0, 10, 2086.36, 22950, '2020-12-30 03:07:46', '2020-12-30 03:07:46'),
(402, 261, 70, NULL, 5, 1, 502, 0, 0, 0, 2510, '2021-01-05 22:39:50', '2021-01-05 22:39:50'),
(403, 262, 32, NULL, 6, 1, 10, 0, 0, 0, 60, '2021-01-07 02:56:12', '2021-01-07 02:56:12'),
(404, 262, 3, NULL, 1, 1, 250, 0, 0, 0, 250, '2021-01-07 02:56:12', '2021-01-07 02:56:12'),
(405, 262, 25, NULL, 1, 1, 1000, 0, 10, 100, 1100, '2021-01-07 02:56:12', '2021-01-07 02:56:12'),
(406, 262, 2, NULL, 1, 2, 125.22, 0, 15, 18.78, 144, '2021-01-07 02:56:13', '2021-01-07 02:56:13'),
(408, 265, 1, NULL, 1, 1, 400, 0, 10, 40, 440, '2021-01-07 06:09:25', '2021-01-07 06:09:25'),
(409, 266, 70, NULL, 5, 1, 598, 0, 0, 0, 598, NULL, NULL),
(410, 267, 70, NULL, 3, 1, 598, 0, 0, 0, 598, '2021-01-13 22:17:41', '2021-01-13 22:17:41'),
(411, 267, 68, NULL, 5, 1, 300, 0, 0, 0, 300, '2021-01-13 22:17:41', '2021-01-13 22:17:41'),
(412, 268, 48, NULL, 1, 1, 3, 0, 0, 0, 3, '2021-01-13 23:45:06', '2021-01-13 23:45:06'),
(413, 268, 32, NULL, 3, 1, 10, 0, 0, 0, 30, '2021-01-13 23:45:06', '2021-01-13 23:45:06'),
(414, 269, 71, NULL, 10, 1, 600, 0, 0, 0, 6000, '2021-01-15 23:48:44', '2021-01-15 23:48:44'),
(415, 270, 68, NULL, 1, 1, 300, 0, 0, 0, 300, '2021-01-18 00:11:50', '2021-01-18 00:11:50'),
(419, 274, 3, NULL, 5, 1, 250, 0, 0, 0, 1250, '2021-01-23 01:16:16', '2021-01-23 01:16:16'),
(420, 275, 71, NULL, 5, 1, 600, 0, 0, 0, 3000, '2021-01-23 01:25:09', '2021-01-23 01:25:09'),
(421, 276, 13, NULL, 2, 0, 21, 0, 0, 0, 42, '2021-01-23 04:59:07', '2021-01-23 04:59:07'),
(426, 280, 71, NULL, 2, 1, 600, 0, 0, 0, 1200, '2021-01-28 04:27:58', '2021-01-28 04:27:58'),
(427, 281, 32, NULL, 4, 1, 10, 0, 0, 0, 40, '2021-01-28 04:28:46', '2021-01-28 04:28:46'),
(428, 285, 91, NULL, 1, 1, 1974.35, 0, 0, 0, 2034.35, '2021-01-28 04:49:18', '2021-01-28 04:49:18'),
(429, 286, 94, NULL, 1, 1, 2045.24, 0, 0, 0, 2105.24, '2021-01-28 04:52:20', '2021-01-28 04:52:20'),
(430, 287, 92, NULL, 1, 1, 454.37, 0, 0, 0, 514.37, '2021-01-29 22:25:47', '2021-01-29 22:25:47'),
(431, 287, 90, NULL, 1, 1, 1044.7, 0, 0, 0, 1104.7, '2021-01-29 22:25:47', '2021-01-29 22:25:47'),
(432, 288, 94, NULL, 1, 1, 2045, 0, 0, 0, 2145, '2021-01-30 04:42:28', '2021-01-30 04:42:28'),
(433, 288, 93, NULL, 2, 1, 918, 0, 0, 0, 1936, '2021-01-30 04:42:28', '2021-01-30 04:42:28'),
(434, 289, 92, NULL, 1, 1, 454, 0, 0, 0, 514, '2021-01-30 05:54:07', '2021-01-30 05:54:07'),
(435, 289, 89, NULL, 1, 1, 754, 0, 0, 0, 814, '2021-01-30 05:54:07', '2021-01-30 05:54:07'),
(436, 290, 76, NULL, 1, 1, 1331, 0, 0, 0, 1431, '2021-01-30 06:02:31', '2021-01-30 06:02:31'),
(437, 290, 77, NULL, 1, 1, 2085, 0, 0, 0, 2185, '2021-01-30 06:02:31', '2021-01-30 06:02:31'),
(438, 291, 81, NULL, 1, 1, 44561, 0, 0, 0, 44621, '2021-01-30 06:04:51', '2021-01-30 06:04:51'),
(439, 291, 83, NULL, 1, 1, 125018, 0, 0, 0, 125078, '2021-01-30 06:04:51', '2021-01-30 06:04:51'),
(440, 292, 94, NULL, 2, 1, 2045, 0, 0, 0, 4150, '2021-01-30 23:57:22', '2021-01-30 23:57:22'),
(441, 292, 73, NULL, 1, 1, 1149, 0, 0, 0, 1209, '2021-01-30 23:57:22', '2021-01-30 23:57:22'),
(442, 293, 92, NULL, 1, 1, 454, 0, 0, 0, 454, '2021-01-31 00:09:40', '2021-01-31 00:09:40'),
(443, 294, 10, NULL, 2.5, 7, 22, 0, 0, 0, 55, '2021-02-02 00:24:17', '2021-02-02 00:24:17'),
(444, 294, 13, NULL, 1, 0, 21, 0, 0, 0, 21, '2021-02-02 00:24:17', '2021-02-02 00:24:17'),
(446, 296, 92, NULL, 1, 1, 454, 0, 0, 0, 454, '2021-02-03 01:23:54', '2021-02-03 01:23:54'),
(447, 297, 82, NULL, 1, 1, 46683, 0, 0, 0, 46683, '2021-02-03 01:37:07', '2021-02-03 01:37:07'),
(448, 298, 73, NULL, 1, 1, 1149, 0, 0, 0, 1149, '2021-02-03 01:41:07', '2021-02-03 01:41:07'),
(449, 299, 92, NULL, 1, 1, 454, 0, 0, 0, 454, '2021-02-03 03:24:31', '2021-02-03 03:24:31'),
(450, 300, 92, NULL, 1, 1, 454, 0, 0, 0, 454, '2021-02-03 03:30:11', '2021-02-03 03:30:11'),
(451, 301, 93, NULL, 2, 1, 918, 0, 0, 0, 1836, '2021-02-03 03:50:50', '2021-02-03 03:50:50'),
(452, 302, 93, NULL, 1, 1, 918, 0, 0, 0, 918, '2021-02-03 04:07:40', '2021-02-03 04:07:40'),
(453, 303, 93, NULL, 1, 1, 918, 0, 0, 0, 918, '2021-02-03 05:17:33', '2021-02-03 05:17:33'),
(454, 304, 92, NULL, 1, 1, 454, 0, 0, 0, 454, '2021-02-04 00:52:29', '2021-02-04 00:52:29'),
(455, 305, 91, NULL, 1, 1, 1974, 0, 0, 0, 1974, '2021-02-04 00:53:51', '2021-02-04 00:53:51'),
(456, 306, 78, NULL, 3, 1, 1152, 0, 0, 0, 3456, '2021-02-04 00:57:19', '2021-02-04 00:57:19'),
(457, 307, 92, NULL, 1, 1, 454, 0, 0, 0, 454, '2021-02-04 03:27:30', '2021-02-04 03:27:30'),
(458, 308, 1, NULL, 2, 1, 340, 20, 10, 68, 748, '2021-02-08 04:01:48', '2021-02-08 04:01:48'),
(459, 308, 2, NULL, 1, 2, 104.35, 0, 15, 15.65, 120, '2021-02-08 04:01:48', '2021-02-08 04:01:48'),
(460, 308, 13, NULL, 2, 0, 21, 0, 0, 0, 42, '2021-02-08 04:01:49', '2021-02-08 04:01:49'),
(461, 309, 73, NULL, 3, 1, 1149, 0, 0, 0, 3447, '2021-02-08 04:16:26', '2021-02-08 04:16:26'),
(462, 310, 95, NULL, 1, 1, 68000, 0, 0, 0, 68000, '2021-02-09 02:56:21', '2021-02-09 02:56:21'),
(463, 311, 73, NULL, 2, 1, 1149, 0, 0, 0, 2298, '2021-02-13 00:51:58', '2021-02-13 00:51:58'),
(464, 311, 82, NULL, 2, 1, 46683, 0, 0, 0, 93366, '2021-02-13 00:51:58', '2021-02-13 00:51:58'),
(465, 311, 87, NULL, 2, 1, 10832, 0, 0, 0, 21664, '2021-02-13 00:51:58', '2021-02-13 00:51:58'),
(466, 312, 73, NULL, 1, 1, 1149, 0, 0, 0, 1149, '2021-02-13 00:53:54', '2021-02-13 00:53:54');

-- --------------------------------------------------------

--
-- Table structure for table `product_transfer`
--

CREATE TABLE `product_transfer` (
  `id` int(10) UNSIGNED NOT NULL,
  `transfer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `variant_id` int(11) DEFAULT NULL,
  `qty` double NOT NULL,
  `purchase_unit_id` int(11) NOT NULL,
  `net_unit_cost` double NOT NULL,
  `tax_rate` double NOT NULL,
  `tax` double NOT NULL,
  `total` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_transfer`
--

INSERT INTO `product_transfer` (`id`, `transfer_id`, `product_id`, `variant_id`, `qty`, `purchase_unit_id`, `net_unit_cost`, `tax_rate`, `tax`, `total`, `created_at`, `updated_at`) VALUES
(1, 1, 4, NULL, 100, 1, 1, 0, 0, 100, '2018-08-08 11:17:10', '2018-12-24 22:16:55'),
(7, 6, 48, 3, 1, 1, 2, 0, 0, 2, '2019-12-05 13:55:04', '2019-12-05 14:09:42'),
(11, 8, 5, NULL, 10, 1, 100, 0, 0, 1000, '2020-01-22 06:30:59', '2020-01-22 06:30:59'),
(13, 10, 1, NULL, 1, 1, 320, 10, 32, 352, '2020-10-08 07:27:35', '2020-10-08 07:29:35'),
(14, 11, 62, 12, 1, 1, 1, 0, 0, 1, '2020-10-18 12:17:08', '2020-10-18 12:17:08'),
(15, 12, 61, NULL, 10, 1, 3000, 15, 4500, 34500, '2020-10-24 03:01:46', '2020-10-24 03:01:46'),
(16, 13, 68, 20, 50, 7, 500, 10, 2500, 27500, '2020-12-02 05:04:06', '2020-12-02 05:04:06'),
(17, 14, 70, NULL, 5, 1, 500, 0, 0, 2500, '2021-01-05 22:16:34', '2021-01-05 22:16:34');

-- --------------------------------------------------------

--
-- Table structure for table `product_variants`
--

CREATE TABLE `product_variants` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `variant_id` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `item_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `additional_price` double DEFAULT NULL,
  `qty` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_variants`
--

INSERT INTO `product_variants` (`id`, `product_id`, `variant_id`, `position`, `item_code`, `additional_price`, `qty`, `created_at`, `updated_at`) VALUES
(3, 48, 3, 1, 'S-93475396', NULL, 13, '2019-11-21 07:03:04', '2020-01-10 11:22:49'),
(5, 48, 5, 3, 'L-93475396', 50, 11, '2019-11-24 06:07:20', '2020-03-16 14:08:26'),
(6, 48, 2, 2, 'M-93475396', 10, 13, '2019-11-24 07:17:07', '2020-07-12 15:51:53'),
(10, 60, 9, 1, 'a-32081679', NULL, 1, '2020-05-18 16:44:14', '2020-10-26 23:42:06'),
(11, 60, 11, 2, 'b-32081679', NULL, 0, '2020-05-18 16:58:31', '2020-05-18 16:58:31'),
(12, 62, 12, 1, 'variant 1-81145830', NULL, 3, '2020-09-27 06:08:27', '2020-11-16 09:01:45'),
(13, 62, 13, 2, 'variant 2-81145830', NULL, 0, '2020-09-27 06:08:27', '2020-09-27 06:08:27'),
(20, 68, 18, 1, 'test-70331946', NULL, 0, '2020-12-02 00:08:30', '2020-12-02 00:08:30'),
(21, 68, 19, 2, 'sample-70331946', NULL, 0, '2020-12-02 00:08:30', '2020-12-02 00:08:30'),
(22, 68, 20, 3, 'demo-70331946', NULL, 101, '2020-12-02 00:08:30', '2020-12-02 05:08:56'),
(23, 68, 18, 4, 'test-70331946', NULL, 0, '2020-12-02 00:08:30', '2020-12-02 00:08:30'),
(24, 68, 19, 5, 'sample-70331946', NULL, 0, '2020-12-02 00:08:30', '2020-12-02 00:08:30'),
(25, 68, 20, 6, 'demo-70331946', NULL, 0, '2020-12-02 00:08:30', '2020-12-02 00:08:30');

-- --------------------------------------------------------

--
-- Table structure for table `product_warehouse`
--

CREATE TABLE `product_warehouse` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `variant_id` int(11) DEFAULT NULL,
  `warehouse_id` int(11) NOT NULL,
  `qty` double NOT NULL,
  `price` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_warehouse`
--

INSERT INTO `product_warehouse` (`id`, `product_id`, `variant_id`, `warehouse_id`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(10, '1', NULL, 1, 136.5, NULL, '2018-08-08 08:30:12', '2021-02-08 04:01:48'),
(11, '2', NULL, 1, 1404, NULL, '2018-08-08 08:30:12', '2021-02-08 04:01:48'),
(12, '3', NULL, 1, 96, NULL, '2018-08-08 08:30:13', '2021-01-23 01:16:16'),
(13, '5', NULL, 1, 77, NULL, '2018-08-08 08:30:13', '2020-10-18 12:48:08'),
(14, '4', NULL, 1, 171, NULL, '2018-08-08 09:16:09', '2020-03-02 05:56:03'),
(15, '4', NULL, 2, 120, NULL, '2018-08-08 11:16:15', '2020-12-02 03:38:07'),
(16, '2', NULL, 2, 1847, NULL, '2018-08-08 11:26:49', '2020-04-06 13:41:11'),
(17, '1', NULL, 2, 64.5, NULL, '2018-08-08 11:33:33', '2020-11-17 00:47:48'),
(18, '3', NULL, 2, 59, NULL, '2018-08-08 23:47:23', '2020-12-02 03:38:07'),
(19, '5', NULL, 2, 62, NULL, '2018-08-08 23:48:36', '2020-06-09 06:42:48'),
(20, '10', NULL, 1, 47.5, NULL, '2018-08-08 23:49:29', '2021-02-02 00:24:17'),
(21, '10', NULL, 2, 61, NULL, '2018-08-08 23:49:55', '2018-12-01 00:05:18'),
(22, '22', NULL, 1, 24, NULL, '2018-09-03 04:06:09', '2019-01-03 01:01:24'),
(23, '22', NULL, 2, 23, NULL, '2018-09-03 04:07:14', '2020-10-24 09:46:01'),
(24, '24', NULL, 2, 0, NULL, '2018-09-15 21:49:30', '2018-09-15 21:50:49'),
(25, '25', NULL, 1, 113, NULL, '2018-10-23 01:14:21', '2021-01-07 02:56:12'),
(26, '25', NULL, 2, 11, NULL, '2018-10-23 01:14:41', '2020-12-02 03:38:07'),
(27, '31', NULL, 1, 14, NULL, '2018-12-04 23:34:30', '2020-10-24 03:24:13'),
(28, '30', NULL, 1, 14, NULL, '2018-12-04 23:34:30', '2020-10-22 07:30:14'),
(29, '31', NULL, 2, 12, NULL, '2018-12-04 23:35:08', '2020-11-14 00:47:36'),
(30, '30', NULL, 2, 12, NULL, '2018-12-04 23:35:08', '2020-08-12 12:28:04'),
(31, '32', NULL, 1, 0, NULL, '2018-12-18 23:57:16', '2021-01-28 04:28:46'),
(32, '32', NULL, 2, 20, NULL, '2018-12-18 23:57:41', '2019-11-11 04:28:59'),
(33, '33', NULL, 1, 16, NULL, '2018-12-24 00:38:40', '2019-03-03 04:39:17'),
(34, '33', NULL, 2, 22, NULL, '2019-02-09 04:21:38', '2020-08-12 12:28:04'),
(35, '48', 3, 1, 2, NULL, '2019-11-25 14:23:02', '2020-01-10 11:10:24'),
(36, '48', 2, 1, 3, NULL, '2019-11-26 06:47:42', '2020-01-10 11:10:24'),
(37, '48', 3, 2, 11, NULL, '2019-11-26 08:12:08', '2020-01-10 11:22:49'),
(38, '48', 2, 2, 10, NULL, '2019-11-26 08:12:08', '2020-07-12 15:51:53'),
(39, '48', 5, 1, 1, NULL, '2019-12-21 10:18:51', '2020-01-10 11:10:24'),
(40, '48', 5, 2, 10, NULL, '2019-12-22 08:36:39', '2020-03-16 14:08:26'),
(45, '61', NULL, 2, 11, NULL, '2020-08-16 16:02:07', '2020-11-18 01:02:18'),
(46, '62', 12, 1, 2, NULL, '2020-09-27 06:55:33', '2020-11-16 09:01:45'),
(47, '62', 12, 2, 1, NULL, '2020-10-18 12:17:08', '2020-10-26 23:39:39'),
(48, '61', NULL, 1, 10, NULL, '2020-10-24 03:01:46', '2020-10-24 03:30:00'),
(49, '60', 9, 1, 1, NULL, '2020-10-26 10:34:05', '2020-10-26 23:42:06'),
(51, '68', NULL, 1, 5, 500, '2020-12-02 00:08:30', '2020-12-02 04:47:08'),
(52, '68', NULL, 2, 0, 510, '2020-12-02 00:08:30', '2020-12-02 00:08:30'),
(53, '68', NULL, 1, 0, 500, '2020-12-02 00:08:30', '2020-12-02 00:08:30'),
(54, '68', NULL, 2, 0, 510, '2020-12-02 00:08:30', '2020-12-02 00:08:30'),
(55, '68', 20, 1, 51, NULL, '2020-12-02 00:23:23', '2020-12-02 05:08:56'),
(56, '69', NULL, 1, 150, 280, '2020-12-29 23:42:01', '2020-12-30 04:03:25'),
(57, '69', NULL, 2, 0, 284, '2020-12-29 23:42:01', '2020-12-29 23:42:01'),
(58, '69', NULL, 7, 0, 290, '2020-12-29 23:42:01', '2020-12-29 23:42:01'),
(59, '70', NULL, 1, 0, NULL, '2021-01-02 01:16:08', '2021-01-07 04:05:38'),
(60, '70', NULL, 2, 5, NULL, '2021-01-02 01:16:08', '2021-01-07 04:05:38'),
(61, '70', NULL, 7, 6, NULL, '2021-01-02 01:16:08', '2021-01-07 04:05:38'),
(62, '71', NULL, 1, 88, 600, '2021-01-14 02:56:42', '2021-01-28 04:27:58'),
(63, '71', NULL, 2, 0, 550, '2021-01-14 02:56:42', '2021-01-14 02:56:42'),
(64, '71', NULL, 7, 0, 575, '2021-01-14 02:56:42', '2021-01-14 02:56:42'),
(65, '73', NULL, 1, 1, NULL, '2021-01-27 04:05:24', '2021-02-13 00:53:54'),
(66, '82', NULL, 1, 2, NULL, '2021-02-02 22:19:34', '2021-02-13 00:55:24'),
(67, '92', NULL, 1, 3, NULL, '2021-02-02 23:36:31', '2021-02-03 01:23:54'),
(68, '93', NULL, 1, 5, NULL, '2021-02-03 03:48:20', '2021-02-04 00:29:41'),
(69, '84', NULL, 1, 2, NULL, '2021-02-05 23:28:30', '2021-02-06 04:12:00'),
(70, '87', NULL, 1, 1, NULL, '2021-02-05 23:28:30', '2021-02-13 00:51:58'),
(71, '74', NULL, 1, 1, NULL, '2021-02-05 23:42:05', '2021-02-05 23:42:05'),
(72, '85', NULL, 1, 2, NULL, '2021-02-05 23:43:54', '2021-02-05 23:57:12'),
(73, '75', NULL, 1, 4, NULL, '2021-02-05 23:43:54', '2021-02-05 23:57:12'),
(74, '95', NULL, 1, 0, NULL, '2021-02-09 02:34:56', '2021-02-09 02:56:21'),
(75, '96', NULL, 1, 1, NULL, '2021-02-09 02:34:57', '2021-02-09 02:38:13'),
(76, '97', NULL, 1, 1, NULL, '2021-02-09 02:34:57', '2021-02-09 02:38:13'),
(77, '98', NULL, 1, 1, NULL, '2021-02-09 02:34:57', '2021-02-09 02:38:14'),
(78, '99', NULL, 1, 6, NULL, '2021-02-09 02:34:57', '2021-02-11 05:13:16'),
(79, '100', NULL, 1, 6, 80, '2021-02-11 05:25:54', '2021-02-11 05:46:56'),
(80, '100', NULL, 2, 0, 50, '2021-02-11 05:46:56', '2021-02-11 05:46:56'),
(81, '100', NULL, 7, 0, 70, '2021-02-11 05:46:56', '2021-02-11 05:46:56');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` int(10) UNSIGNED NOT NULL,
  `reference_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `item` int(11) NOT NULL,
  `total_qty` double NOT NULL,
  `total_discount` double NOT NULL,
  `total_tax` double NOT NULL,
  `total_cost` double NOT NULL,
  `order_tax_rate` double DEFAULT NULL,
  `order_tax` double DEFAULT NULL,
  `order_discount` double DEFAULT NULL,
  `shipping_cost` double DEFAULT NULL,
  `grand_total` double NOT NULL,
  `paid_amount` double NOT NULL,
  `status` int(11) NOT NULL,
  `payment_status` int(11) NOT NULL,
  `document` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `reference_no`, `user_id`, `warehouse_id`, `supplier_id`, `item`, `total_qty`, `total_discount`, `total_tax`, `total_cost`, `order_tax_rate`, `order_tax`, `order_discount`, `shipping_cost`, `grand_total`, `paid_amount`, `status`, `payment_status`, `document`, `note`, `created_at`, `updated_at`) VALUES
(12, 'pr-20180808-051614', 1, 2, 3, 2, 300, 0, 0, 10200, 0, 0, 0, 0, 10200, 0, 1, 1, NULL, NULL, '2018-08-08 11:16:14', '2018-09-22 02:53:24'),
(13, 'pr-20180809-054723', 1, 2, 3, 4, 410, 0, 7304.35, 92600, 10, 9260, 0, 500, 102360, 300, 1, 1, NULL, NULL, '2018-08-08 23:47:23', '2018-08-30 03:07:18'),
(14, 'pr-20180809-012348', 1, 1, 1, 5, 400, 0, 4452.17, 75300, 10, 7480, 500, 1000, 83280, 0, 1, 1, NULL, NULL, '2018-08-09 07:23:48', '2018-08-09 07:23:48'),
(15, 'pr-20180903-100609', 1, 1, 1, 1, 20, 0, 1600, 17600, 0, 0, 0, 100, 17700, 0, 1, 1, NULL, NULL, '2018-09-03 04:06:09', '2018-10-07 22:11:24'),
(16, 'pr-20180903-100714', 1, 2, 3, 1, 20, 0, 1600, 17600, 0, 0, 0, 150, 17750, 3350, 1, 1, NULL, NULL, '2018-09-03 04:07:14', '2018-10-07 00:57:36'),
(18, 'pr-20181022-042625', 1, 1, 1, 1, 50, 0, 0, 50, 0, 0, NULL, NULL, 50, 0, 1, 1, NULL, NULL, '2018-10-22 10:26:25', '2018-10-22 10:26:25'),
(19, 'pr-20181022-042652', 1, 2, 3, 1, 50, 0, 0, 50, 0, 0, NULL, NULL, 50, 0, 1, 1, NULL, NULL, '2018-10-22 10:26:52', '2018-10-22 10:26:52'),
(20, 'pr-20181023-071420', 11, 1, 1, 1, 15, 0, 750, 8250, 0, 0, NULL, NULL, 8250, 0, 1, 1, NULL, NULL, '2018-10-23 01:14:20', '2018-10-23 01:14:20'),
(21, 'pr-20181023-071441', 11, 2, 3, 1, 15, 0, 750, 8250, 0, 0, 0, 0, 8250, 0, 1, 1, NULL, NULL, '2018-10-23 01:14:41', '2018-10-23 01:14:58'),
(22, 'pr-20181101-045903', 1, 1, 1, 1, 5, 0, 400, 4400, 0, 0, NULL, NULL, 4400, 0, 1, 1, NULL, NULL, '2018-10-31 22:59:03', '2018-10-31 22:59:03'),
(23, 'pr-20181101-045928', 1, 2, 3, 1, 5, 0, 400, 4400, 10, 430, 100, 0, 4730, 500, 1, 1, NULL, NULL, '2018-10-31 22:59:28', '2018-12-04 01:01:34'),
(24, 'pr-20181105-091819', 1, 2, 1, 2, 20, 0, 1450, 15950, 0, 0, NULL, NULL, 15950, 15950, 1, 2, NULL, NULL, '2018-11-05 03:18:19', '2018-11-05 03:21:27'),
(25, 'pr-20181205-053429', 1, 1, 1, 2, 30, 0, 0, 4500, 0, 0, 100, 50, 4450, 4450, 1, 2, NULL, NULL, '2018-12-04 23:34:29', '2018-12-04 23:34:43'),
(26, 'pr-20181205-053508', 1, 2, 3, 2, 30, 0, 0, 4500, 0, 0, NULL, NULL, 4500, 0, 1, 1, NULL, NULL, '2018-12-04 23:35:08', '2018-12-10 00:20:52'),
(27, 'pr-20181219-055716', 1, 2, NULL, 1, 10, 0, 0, 10, 0, 0, 0, 0, 10, 10, 1, 2, NULL, NULL, '2018-12-18 23:57:16', '2018-12-20 00:34:39'),
(33, 'pr-20181224-063840', 1, 1, NULL, 1, 10, 0, 0, 10, 0, 0, 0, 0, 10, 0, 1, 1, NULL, NULL, '2018-12-24 00:38:40', '2018-12-24 03:04:21'),
(34, 'pr-20190103-070123', 1, 1, 1, 2, 4, 0, 260, 2860, 0, 0, NULL, NULL, 2860, 2860, 1, 2, NULL, NULL, '2019-01-03 01:01:23', '2019-01-29 04:03:24'),
(35, 'pr-20190129-095448', 9, 1, 1, 2, 4, 0, 0, 600, 0, 0, NULL, NULL, 600, 100, 1, 1, NULL, NULL, '2019-01-29 03:54:48', '2019-02-07 07:06:40'),
(36, 'pr-20190129-095558', 9, 2, 1, 2, 5, 0, 0, 650, 0, 0, NULL, NULL, 650, 650, 1, 2, NULL, NULL, '2019-01-29 03:55:58', '2019-01-29 04:03:02'),
(37, 'pr-20190209-102138', 1, 2, 1, 3, 18, 0, 580, 6390, 0, 0, 0, 0, 6390, 6390, 1, 2, NULL, NULL, '2019-02-09 04:21:38', '2019-06-13 04:13:51'),
(38, 'pr-20190209-102208', 1, 1, 1, 2, 13, 0, 150, 1660, 0, 0, 0, 0, 1660, 1660, 1, 2, NULL, NULL, '2019-02-09 04:22:08', '2019-02-09 04:49:40'),
(39, 'pr-20190209-104413', 1, 1, 1, 2, 3, 10, 63, 885, 10, 88.5, NULL, NULL, 973.5, 973.5, 1, 2, NULL, NULL, '2019-02-09 04:44:13', '2019-02-09 04:49:59'),
(40, 'pr-20190303-103917', 1, 1, 1, 1, 10, 0, 0, 100, 0, 0, NULL, NULL, 100, 100, 1, 2, NULL, NULL, '2019-03-03 04:39:17', '2019-03-03 04:40:46'),
(41, 'pr-20190303-104358', 1, 2, NULL, 2, 15, 0, 320, 3570, 0, 0, NULL, NULL, 3570, 1000, 1, 1, NULL, NULL, '2019-03-03 04:43:58', '2019-04-13 11:02:41'),
(42, 'pr-20190404-095757', 1, 1, 3, 2, 2, 0, 0, 300, 0, 0, 0, 0, 300, 300, 1, 2, NULL, NULL, '2019-04-04 03:57:57', '2019-04-13 13:50:08'),
(43, 'pr-20190613-101600', 1, 2, 1, 2, 6, 0, 390, 4290, 0, 0, NULL, NULL, 4290, 4290, 1, 2, NULL, NULL, '2019-06-13 04:16:00', '2019-10-19 09:29:25'),
(44, 'pr-20191019-033119', 1, 2, 3, 2, 2, 0, 130, 1430, 0, 0, NULL, NULL, 1430, 0, 1, 1, NULL, NULL, '2019-10-19 09:31:19', '2019-10-19 09:31:19'),
(46, 'pr-20191103-113949', 1, 2, 3, 2, 20, 0, 0, 150, 0, 0, NULL, 50, 200, 200, 1, 2, NULL, NULL, '2019-11-03 05:39:49', '2019-11-03 05:42:22'),
(47, 'pr-20191109-112510', 1, 1, NULL, 2, 3, 10, 63, 885, 0, 0, NULL, 66, 951, 0, 1, 1, NULL, NULL, '2019-11-09 05:25:10', '2019-11-09 05:25:10'),
(48, 'pr-20191110-070221', 1, 2, NULL, 1, 100, 0, 0, 100, 0, 0, NULL, 40, 140, 0, 1, 1, NULL, NULL, '2019-11-10 13:02:21', '2019-11-10 13:02:21'),
(49, 'pr-20191111-102155', 1, 2, 1, 1, 10, 0, 800, 8800, 0, 0, 0, 50, 8850, 7000, 1, 1, NULL, NULL, '2019-11-11 04:21:55', '2020-01-01 08:22:25'),
(55, 'pr-20191127-102835', 1, 1, NULL, 2, 2, 0, 0, 4, 0, 0, NULL, NULL, 4, 4, 1, 2, NULL, NULL, '2019-11-27 16:28:35', '2020-01-01 08:21:52'),
(56, 'pr-20191127-102906', 1, 2, NULL, 1, 1, 0, 0, 2, 0, 0, 0, 0, 2, 2, 1, 2, NULL, NULL, '2019-11-27 16:29:06', '2020-01-01 08:21:44'),
(57, 'pr-20191204-110749', 1, 1, 1, 1, 1, 0, 0, 200, 0, 0, NULL, 20, 220, 220, 1, 2, NULL, NULL, '2019-12-04 17:07:49', '2019-12-04 17:11:24'),
(58, 'pr-20191205-102110', 1, 1, 1, 2, 2, 0, 0, 4, 0, 0, 0, 0, 4, 4, 1, 2, NULL, NULL, '2019-12-05 04:21:10', '2020-01-01 08:21:37'),
(59, 'pr-20191221-041851', 1, 1, NULL, 3, 3, 0, 0, 6, 0, 0, 0, 0, 6, 6, 1, 2, NULL, NULL, '2019-12-21 10:18:51', '2020-01-01 08:21:31'),
(61, 'pr-20200101-010631', 1, 2, 1, 3, 30, 0, 0, 60, 0, 0, NULL, NULL, 60, 60, 1, 2, NULL, NULL, '2020-01-01 07:06:31', '2020-01-01 07:07:50'),
(62, 'pr-20200101-022402', 1, 2, NULL, 1, 3, 0, 150, 1650, 0, 0, NULL, NULL, 1650, 1650, 1, 2, NULL, NULL, '2020-01-01 08:24:02', '2020-08-12 12:28:52'),
(67, 'pr-20200204-110041', 1, 2, 1, 2, 2, 0, 0, 300, 0, 0, NULL, NULL, 300, 300, 1, 2, NULL, NULL, '2020-02-04 17:00:41', '2020-02-04 17:00:50'),
(69, 'pr-20200302-115510', 1, 2, NULL, 1, 50, 0, 0, 50, 0, 0, NULL, NULL, 50, 50, 1, 2, NULL, NULL, '2020-03-02 05:55:10', '2020-03-02 05:58:20'),
(70, 'pr-20200302-115603', 1, 1, 1, 1, 50, 0, 0, 50, 0, 0, NULL, NULL, 50, 50, 1, 2, NULL, NULL, '2020-03-02 05:56:03', '2020-03-02 05:58:11'),
(71, 'pr-20200406-073512', 1, 2, 3, 3, 11, 0, 150, 3050, 10, 305, NULL, NULL, 3355, 2000, 1, 1, NULL, NULL, '2020-04-06 13:35:12', '2020-04-06 13:38:23'),
(72, 'pr-20200816-100207', 1, 2, 1, 1, 10, 5000, 3750, 28750, 0, 0, NULL, 2000, 30750, 0, 1, 1, NULL, NULL, '2020-08-16 16:02:07', '2020-08-16 16:02:07'),
(73, 'pr-20200927-125533', 1, 1, NULL, 1, 2, 0, 0, 2, 0, 0, 0, 0, 2, 0, 1, 1, NULL, NULL, '2020-09-27 06:55:33', '2020-09-27 09:07:44'),
(74, 'pr-20201024-070201', 1, 2, 1, 2, 15, 0, 5270, 41470, 0, 0, 0, 0, 41470, 0, 1, 1, NULL, NULL, '2020-10-24 01:02:01', '2020-10-24 01:03:16'),
(83, 'pr-20201027-045611', 1, 1, NULL, 1, 2, 0, 0, 2, 0, 0, NULL, NULL, 2, 0, 1, 1, NULL, NULL, '2020-10-26 22:56:11', '2020-10-26 22:56:11'),
(84, 'pr-20201027-045658', 1, 1, NULL, 1, 2, 0, 0, 4, 0, 0, NULL, NULL, 4, 0, 1, 1, NULL, NULL, '2020-10-26 22:56:58', '2020-10-26 22:56:58'),
(85, 'pr-20201102-092952', 1, 1, NULL, 1, 1, 0, 32, 352, 0, 0, NULL, NULL, 352, 0, 1, 1, NULL, 'asasda\r\ndasdasd', '2020-11-02 03:29:52', '2020-11-02 03:29:52'),
(87, 'pr-20201102-093644', 1, 1, NULL, 1, 1, 0, 32, 352, 0, 0, 0, 0, 352, 0, 1, 1, NULL, 'kjkljklj\r\nlljkljkljkl\r\njhjhjh.', '2020-11-02 03:36:44', '2020-11-02 05:20:34'),
(89, 'pr-20201116-030145', 1, 1, NULL, 2, 2, 0, 32, 353, 0, 0, NULL, NULL, 353, 0, 1, 1, NULL, NULL, '2020-11-16 09:01:45', '2020-11-16 09:01:45'),
(90, 'pr-20201118-061543', 1, 2, NULL, 1, 10, 0, 4500, 34500, 0, 0, 1000, 100, 33600, 33000, 1, 1, NULL, NULL, '2020-11-18 00:15:43', '2020-11-18 00:20:36'),
(91, 'pr-20201129-110335', 1, 1, 1, 1, 100, 0, 5000, 55000, 0, 0, NULL, NULL, 55000, 0, 1, 1, NULL, NULL, '2020-11-29 05:03:35', '2020-11-29 05:03:35'),
(92, 'pr-20201201-104053', 1, 1, 1, 2, 3, 10, 63, 885, 0, 0, 0, NULL, 885, 0, 1, 1, NULL, NULL, '2020-12-01 04:40:53', '2020-12-01 04:40:53'),
(93, 'pr-20201202-062323', 28, 1, 1, 1, 100, 0, 5000, 55000, 10, 5499.5, 5, 50, 60544.5, 60544.5, 1, 2, 'AtechSalesPOS (3).pdf', 'sample note sample note sample note sample note sample note sample note sample note sample note sample note sample note sample note sample note sample note sample note sample note sample note sample note sample note sample note sample note', '2020-12-02 00:23:23', '2020-12-02 00:43:51'),
(94, 'pr-20201202-063627', 28, 2, 3, 2, 3, 10, 63, 885, 15, 132, 5, 600, 1612, 0, 4, 1, 'pr-20201202-063627.pdf', 'demo  demo  demo demo  demo', '2020-12-02 00:36:27', '2020-12-02 00:36:27'),
(95, 'pr-20201230-054711', 28, 1, 6, 1, 200, 0, 4545.45, 50000, 10, 4999.5, 5, 60, 55054.5, 55054.5, 1, 2, 'paradoxical sajid.txt', 'Paradoxical sajid purchase', '2020-12-29 23:47:11', '2020-12-29 23:49:31'),
(96, 'pr-20210104-050339', 28, 7, 6, 1, 25, 0, 0, 12500, 0, 0, 0, 0, 12500, 12500, 1, 2, NULL, NULL, '2021-01-03 23:03:39', '2021-01-05 21:43:40'),
(97, 'pr-20210116-054445', 28, 1, 1, 1, 100, 0, 0, 50000, 0, 0, NULL, NULL, 50000, 50000, 1, 2, NULL, NULL, '2021-01-15 23:44:45', '2021-01-16 05:23:39'),
(98, 'pr-20210127-100524', 28, 1, 1, 1, 1, 0, 0, 1200, 0, 0, NULL, NULL, 1200, 0, 1, 1, NULL, NULL, '2021-01-27 04:05:24', '2021-01-27 04:05:24'),
(99, 'pr-20210203-041934', 28, 1, 1, 1, 2, 0, 0, 90000, 0, 0, 0, 0, 90000, 90000, 1, 2, NULL, NULL, '2021-02-02 22:19:34', '2021-02-02 23:33:56'),
(100, 'pr-20210203-053631', 28, 1, 3, 1, 3, 0, 0, 1062, 0, 0, NULL, NULL, 1062, 0, 1, 1, NULL, NULL, '2021-02-02 23:36:31', '2021-02-02 23:36:31'),
(101, 'pr-20210203-053827', 28, 1, 1, 1, 1, 0, 0, 354, 0, 0, NULL, NULL, 354, 0, 1, 1, NULL, NULL, '2021-02-02 23:38:27', '2021-02-02 23:38:27'),
(102, 'pr-20210203-094820', 28, 1, 3, 1, 5, 0, 0, 4090, 0, 0, 0, 0, 4090, 0, 1, 1, NULL, NULL, '2021-02-03 03:48:20', '2021-02-04 00:29:41'),
(103, 'pr-20210204-113810', 28, 1, 3, 1, 1, 0, 0, 1000, 0, 0, NULL, NULL, 1000, 0, 1, 1, NULL, NULL, '2021-02-04 05:38:10', '2021-02-04 05:38:10'),
(104, 'pr-20210206-052830', 28, 1, 3, 2, 5, 0, 0, 244546, 0, 0, 0, 0, 244546, 0, 1, 1, NULL, NULL, '2021-02-05 23:28:30', '2021-02-06 04:12:00'),
(105, 'pr-20210206-054205', 28, 1, 1, 1, 1, 0, 0, 3000, 0, 0, NULL, NULL, 3000, 0, 1, 1, NULL, NULL, '2021-02-05 23:42:05', '2021-02-05 23:42:05'),
(106, 'pr-20210206-054354', 28, 1, 1, 2, 6, 0, 0, 18000, 0, 0, 0, 0, 18000, 18000, 1, 2, NULL, NULL, '2021-02-05 23:43:54', '2021-02-07 03:44:32'),
(107, 'pr-20210208-101415', 28, 1, 3, 1, 5, 0, 0, 5000, 0, 0, NULL, NULL, 5000, 0, 1, 1, NULL, NULL, '2021-02-08 04:14:15', '2021-02-08 04:14:15'),
(108, 'pr-20210209-083456', 28, 1, 1, 5, 5, 0, 0, 225800, 7.5, 16935, 0, 15000, 257735, 0, 1, 1, NULL, 'Quote validity period', '2021-02-09 02:34:56', '2021-02-09 02:38:14'),
(109, 'pr-20210211-111316', 28, 1, 1, 1, 5, 0, 0, 9000, 0, 0, NULL, NULL, 9000, 0, 1, 1, NULL, NULL, '2021-02-11 05:13:16', '2021-02-11 05:13:16'),
(110, 'pr-20210211-112553', 28, 1, 1, 1, 6, 0, 0, 420, 0, 0, NULL, NULL, 420, 0, 1, 1, NULL, NULL, '2021-02-11 05:25:53', '2021-02-11 05:25:53'),
(111, 'pr-20210213-065524', 28, 1, 3, 1, 2, 0, 0, 90000, 0, 0, NULL, NULL, 90000, 0, 1, 1, NULL, NULL, '2021-02-13 00:55:24', '2021-02-13 00:55:24');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_product_return`
--

CREATE TABLE `purchase_product_return` (
  `id` int(10) UNSIGNED NOT NULL,
  `return_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `variant_id` int(11) DEFAULT NULL,
  `qty` double NOT NULL,
  `purchase_unit_id` int(11) NOT NULL,
  `net_unit_cost` double NOT NULL,
  `discount` double NOT NULL,
  `tax_rate` double NOT NULL,
  `tax` double NOT NULL,
  `total` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_product_return`
--

INSERT INTO `purchase_product_return` (`id`, `return_id`, `product_id`, `variant_id`, `qty`, `purchase_unit_id`, `net_unit_cost`, `discount`, `tax_rate`, `tax`, `total`, `created_at`, `updated_at`) VALUES
(1, 1, 3, NULL, 1, 1, 200, 0, 0, 0, 200, NULL, '2019-12-07 11:19:03'),
(12, 7, 69, NULL, 50, 1, 250, 0, 0, 0, 12500, '2020-12-30 03:59:09', '2020-12-30 03:59:09'),
(13, 8, 70, NULL, 5, 1, 500, 0, 0, 0, 2500, '2021-01-05 22:23:16', '2021-01-05 22:23:16'),
(14, 9, 71, NULL, 5, 1, 500, 0, 0, 0, 2500, '2021-01-23 01:15:07', '2021-01-23 01:15:07');

-- --------------------------------------------------------

--
-- Table structure for table `quotations`
--

CREATE TABLE `quotations` (
  `id` int(10) UNSIGNED NOT NULL,
  `reference_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `biller_id` int(11) NOT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `total_qty` double NOT NULL,
  `total_discount` double NOT NULL,
  `total_tax` double NOT NULL,
  `total_price` double NOT NULL,
  `order_tax_rate` double DEFAULT NULL,
  `order_tax` double DEFAULT NULL,
  `order_discount` double DEFAULT NULL,
  `shipping_cost` double DEFAULT NULL,
  `grand_total` double NOT NULL,
  `quotation_status` int(11) NOT NULL,
  `document` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quotations`
--

INSERT INTO `quotations` (`id`, `reference_no`, `user_id`, `biller_id`, `supplier_id`, `customer_id`, `warehouse_id`, `item`, `total_qty`, `total_discount`, `total_tax`, `total_price`, `order_tax_rate`, `order_tax`, `order_discount`, `shipping_cost`, `grand_total`, `quotation_status`, `document`, `note`, `created_at`, `updated_at`) VALUES
(1, 'qr-20180809-055250', 1, 1, 3, 3, 1, 3, 57, 35, 767.73, 5930, 10, 583, 100, 500, 6913, 2, NULL, 'first quotation...', '2018-08-08 23:52:50', '2018-09-04 03:32:16'),
(2, 'qr-20180904-040257', 1, 1, NULL, 1, 1, 2, 3.5, 0, 0, 76, 0, 0, 1.6, 2.7, 77.1, 1, NULL, NULL, '2018-09-03 22:02:57', '2018-09-21 07:05:57'),
(3, 'qr-20181023-061249', 9, 1, 3, 11, 1, 2, 2, 0, 40, 453, 0, 0, 0, 0, 453, 2, NULL, NULL, '2018-10-23 00:12:49', '2019-12-21 06:41:36'),
(11, 'qr-20201024-090814', 1, 1, NULL, 1, 1, 1, 2, 0, 3000, 23000, 0, 0, 0, 0, 23000, 2, NULL, NULL, '2020-10-24 03:08:14', '2020-12-02 03:57:03'),
(12, 'qr-20201202-101914', 28, 2, 1, 1, 1, 1, 1, 0, 3400, 37400, 10, 3736, 40, 50, 41146, 2, '20190228-124939.csv', 'hello hello', '2020-12-02 04:19:14', '2020-12-02 04:19:14');

-- --------------------------------------------------------

--
-- Table structure for table `report_settings`
--

CREATE TABLE `report_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_name` varchar(191) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `fax` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `site_logo` varchar(191) DEFAULT NULL,
  `logo_position` tinyint(4) DEFAULT NULL COMMENT '1=center|0=left',
  `text_font` tinyint(4) DEFAULT NULL COMMENT '0=small|1=medium|2=large',
  `text_format` tinyint(4) DEFAULT NULL COMMENT '0=ariel|1=roman|2=lucida',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `developed_by` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report_settings`
--

INSERT INTO `report_settings` (`id`, `company_name`, `address`, `phone`, `email`, `fax`, `website`, `site_logo`, `logo_position`, `text_font`, `text_format`, `created_at`, `updated_at`, `developed_by`) VALUES
(1, 'Acquaint Technologies', 'G.A Bhaban, 3rd Floor, Purana Paltan, Dhaka 1000', '01521100281', 'safi151289@gmail.com', 'Fax-12345678', 'acquaintbd.com', 'Acquaint Logo Whit.png', 0, 0, 0, '2018-07-06 06:13:11', '2021-02-13 03:15:28', 'acquaint');

-- --------------------------------------------------------

--
-- Table structure for table `returns`
--

CREATE TABLE `returns` (
  `id` int(10) UNSIGNED NOT NULL,
  `reference_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `cash_register_id` int(11) DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `biller_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `total_qty` double NOT NULL,
  `total_discount` double NOT NULL,
  `total_tax` double NOT NULL,
  `total_price` double NOT NULL,
  `order_tax_rate` double DEFAULT NULL,
  `order_tax` double DEFAULT NULL,
  `grand_total` double NOT NULL,
  `document` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `staff_note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `returns`
--

INSERT INTO `returns` (`id`, `reference_no`, `user_id`, `cash_register_id`, `customer_id`, `warehouse_id`, `biller_id`, `account_id`, `item`, `total_qty`, `total_discount`, `total_tax`, `total_price`, `order_tax_rate`, `order_tax`, `grand_total`, `document`, `return_note`, `staff_note`, `created_at`, `updated_at`) VALUES
(2, 'rr-20180809-055834', 1, NULL, 1, 1, 1, 1, 1, 20, 0, 0, 40, 10, 4, 44, NULL, NULL, NULL, '2018-08-08 23:58:34', '2018-08-08 23:58:34'),
(3, 'rr-20180828-045527', 1, NULL, 1, 2, 1, 1, 1, 2, 0, 0, 44, 0, 0, 44, NULL, NULL, NULL, '2018-08-27 22:55:27', '2018-09-20 11:03:47'),
(5, 'rr-20181007-082129', 1, NULL, 11, 2, 2, 1, 1, 1, 0, 0, 250, 0, 0, 250, NULL, NULL, NULL, '2018-10-07 02:21:29', '2018-12-25 22:16:08'),
(6, 'rr-20190101-090630', 9, NULL, 1, 1, 1, 1, 1, 1, 0, 40, 440, 0, 0, 440, NULL, NULL, NULL, '2019-01-01 03:06:30', '2019-01-01 03:06:30'),
(13, 'rr-20200816-102502', 1, NULL, 1, 2, 2, 1, 1, 1, 0, 1500, 11500, 0, 0, 11500, NULL, NULL, NULL, '2020-08-16 16:25:02', '2020-08-16 16:25:02'),
(14, 'rr-20201013-053954', 9, 1, 1, 1, 1, 1, 1, 1, 0, 40, 440, 0, 0, 440, NULL, NULL, NULL, '2020-10-13 11:39:54', '2020-10-13 11:39:54'),
(18, 'rr-20201118-070218', 1, 4, 1, 2, 1, 1, 1, 1, 0, 1500, 11500, 0, 0, 11500, NULL, NULL, NULL, '2020-11-18 01:02:18', '2020-11-18 01:02:18'),
(19, 'rr-20201202-110856', 28, 5, 2, 1, 2, 1, 1, 1, 0, 3060, 33660, 10, 3366, 37026, 'AtechSalesPOS (3).csv', 'sample', 'demo', '2020-12-02 05:08:56', '2020-12-02 05:08:56'),
(20, 'rr-20201230-100325', 28, 5, 26, 1, 9, 4, 1, 1, 0, 0, 280, 0, 0, 280, NULL, NULL, NULL, '2020-12-30 04:03:25', '2020-12-30 04:03:25'),
(21, 'rr-20210106-044242', 28, 7, 26, 7, 9, 4, 1, 1, 0, 0, 502, 0, 0, 502, NULL, NULL, NULL, '2021-01-05 22:42:42', '2021-01-05 22:42:42');

-- --------------------------------------------------------

--
-- Table structure for table `return_purchases`
--

CREATE TABLE `return_purchases` (
  `id` int(10) UNSIGNED NOT NULL,
  `reference_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `warehouse_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `total_qty` double NOT NULL,
  `total_discount` double NOT NULL,
  `total_tax` double NOT NULL,
  `total_cost` double NOT NULL,
  `order_tax_rate` double DEFAULT NULL,
  `order_tax` double DEFAULT NULL,
  `grand_total` double NOT NULL,
  `document` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `staff_note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `return_purchases`
--

INSERT INTO `return_purchases` (`id`, `reference_no`, `supplier_id`, `warehouse_id`, `user_id`, `account_id`, `item`, `total_qty`, `total_discount`, `total_tax`, `total_cost`, `order_tax_rate`, `order_tax`, `grand_total`, `document`, `return_note`, `staff_note`, `created_at`, `updated_at`) VALUES
(1, 'prr-20190101-090759', 3, 1, 1, 1, 1, 1, 0, 0, 200, 0, 0, 200, NULL, NULL, NULL, '2019-01-01 03:07:59', '2019-12-07 11:19:03'),
(7, 'prr-20201230-095909', 6, 1, 28, 4, 1, 50, 0, 0, 12500, 0, 0, 12500, NULL, NULL, NULL, '2020-12-30 03:59:09', '2020-12-30 03:59:09'),
(8, 'prr-20210106-042316', 6, 7, 28, 4, 1, 5, 0, 0, 2500, 0, 0, 2500, NULL, NULL, NULL, '2021-01-05 22:23:16', '2021-01-05 22:23:16'),
(9, 'prr-20210123-071507', 1, 1, 28, 4, 1, 5, 0, 0, 2500, 0, 0, 2500, NULL, NULL, NULL, '2021-01-23 01:15:07', '2021-01-23 01:15:07');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `guard_name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin can access all data...', 'web', 1, '2018-06-01 23:46:44', '2018-06-02 23:13:05'),
(2, 'Owner', 'Owner of shop...', 'web', 1, '2018-10-22 02:38:13', '2018-10-22 02:38:13'),
(4, 'staff', 'staff has specific acess...', 'web', 1, '2018-06-02 00:05:27', '2018-06-02 00:05:27'),
(5, 'Customer', NULL, 'web', 1, '2020-11-05 06:43:16', '2020-11-15 00:24:15'),
(6, 'IT Officer', 'Simple IT Officer', 'web', 1, '2020-12-03 02:39:19', '2020-12-03 02:39:19');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(4, 1),
(4, 2),
(4, 4),
(5, 1),
(5, 2),
(6, 1),
(6, 2),
(6, 4),
(7, 1),
(7, 2),
(7, 4),
(8, 1),
(8, 2),
(8, 4),
(9, 1),
(9, 2),
(9, 4),
(10, 1),
(10, 2),
(11, 1),
(11, 2),
(12, 1),
(12, 2),
(12, 4),
(13, 1),
(13, 2),
(13, 4),
(14, 1),
(14, 2),
(15, 1),
(15, 2),
(16, 1),
(16, 2),
(17, 1),
(17, 2),
(18, 1),
(18, 2),
(19, 1),
(19, 2),
(20, 1),
(20, 2),
(20, 4),
(21, 1),
(21, 2),
(21, 4),
(22, 1),
(22, 2),
(22, 4),
(23, 1),
(23, 2),
(24, 1),
(24, 2),
(24, 4),
(25, 1),
(25, 2),
(25, 4),
(26, 1),
(26, 2),
(27, 1),
(27, 2),
(28, 1),
(28, 2),
(28, 4),
(29, 1),
(29, 2),
(29, 4),
(30, 1),
(30, 2),
(31, 1),
(31, 2),
(32, 1),
(32, 2),
(33, 1),
(33, 2),
(34, 1),
(34, 2),
(35, 1),
(35, 2),
(36, 1),
(36, 2),
(37, 1),
(37, 2),
(38, 1),
(38, 2),
(39, 1),
(39, 2),
(40, 1),
(40, 2),
(41, 1),
(41, 2),
(42, 1),
(42, 2),
(43, 1),
(43, 2),
(44, 1),
(44, 2),
(45, 1),
(45, 2),
(46, 1),
(46, 2),
(47, 1),
(47, 2),
(48, 1),
(48, 2),
(49, 1),
(49, 2),
(50, 1),
(50, 2),
(51, 1),
(51, 2),
(52, 1),
(52, 2),
(53, 1),
(53, 2),
(54, 1),
(54, 2),
(55, 1),
(55, 2),
(55, 4),
(56, 1),
(56, 2),
(56, 4),
(57, 1),
(57, 2),
(57, 4),
(58, 1),
(58, 2),
(59, 1),
(59, 2),
(60, 1),
(60, 2),
(61, 1),
(61, 2),
(62, 1),
(62, 2),
(63, 1),
(63, 2),
(63, 4),
(64, 1),
(64, 2),
(64, 4),
(65, 1),
(65, 2),
(66, 1),
(66, 2),
(67, 1),
(67, 2),
(68, 1),
(68, 2),
(69, 1),
(69, 2),
(70, 1),
(70, 2),
(71, 1),
(71, 2),
(72, 1),
(72, 2),
(73, 1),
(73, 2),
(74, 1),
(74, 2),
(75, 1),
(75, 2),
(76, 1),
(76, 2),
(77, 1),
(77, 2),
(78, 1),
(78, 2),
(79, 1),
(79, 2),
(80, 1),
(80, 2),
(81, 1),
(81, 2),
(82, 1),
(82, 2),
(83, 1),
(83, 2),
(84, 1),
(84, 2),
(85, 1),
(85, 2),
(86, 1),
(86, 2),
(87, 1),
(87, 2),
(88, 1),
(88, 2),
(89, 1),
(89, 2),
(90, 1),
(90, 2),
(91, 1),
(91, 2),
(92, 1),
(92, 2),
(93, 1),
(93, 2),
(94, 1),
(94, 2),
(95, 1),
(95, 2),
(96, 1),
(96, 2),
(97, 1),
(97, 2),
(98, 1),
(98, 2),
(99, 1),
(99, 2),
(100, 1),
(100, 2),
(101, 1),
(101, 2),
(102, 1),
(102, 2),
(103, 1),
(103, 2),
(104, 1),
(104, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(10) UNSIGNED NOT NULL,
  `reference_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `cash_register_id` int(11) DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `biller_id` int(11) DEFAULT NULL,
  `item` int(11) NOT NULL,
  `total_qty` double NOT NULL,
  `total_discount` double NOT NULL,
  `total_tax` double NOT NULL,
  `total_price` double NOT NULL,
  `grand_total` double NOT NULL,
  `order_tax_rate` double DEFAULT NULL,
  `order_tax` double DEFAULT NULL,
  `order_discount` double DEFAULT NULL,
  `coupon_id` int(11) DEFAULT NULL,
  `coupon_discount` double DEFAULT NULL,
  `shipping_cost` double DEFAULT NULL,
  `sale_status` int(11) NOT NULL,
  `payment_status` int(11) NOT NULL,
  `document` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_amount` double DEFAULT NULL,
  `sale_note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `staff_note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `reference_no`, `user_id`, `cash_register_id`, `customer_id`, `warehouse_id`, `biller_id`, `item`, `total_qty`, `total_discount`, `total_tax`, `total_price`, `grand_total`, `order_tax_rate`, `order_tax`, `order_discount`, `coupon_id`, `coupon_discount`, `shipping_cost`, `sale_status`, `payment_status`, `document`, `paid_amount`, `sale_note`, `staff_note`, `created_at`, `updated_at`, `user_ip`) VALUES
(1, 'sr-20180808-043622', 1, NULL, 1, 1, 1, 2, 3, 10, 15.65, 350, 380, 10, 30, 50, NULL, NULL, 50, 1, 2, NULL, 0, 'ukgjkgjkgkj', 'gjkgjkgkujg', '2018-08-08 10:36:22', '2018-10-06 09:25:29', NULL),
(2, 'sr-20180809-055453', 1, NULL, 3, 1, 1, 3, 63, 0, 469.3, 5103, 5503, 0, 0, 100, NULL, NULL, 500, 1, 2, NULL, 2200, NULL, NULL, '2018-08-08 23:54:53', '2018-08-08 23:56:35', NULL),
(3, 'posr-20180809-063214', 1, NULL, 2, 2, 2, 3, 26, 0, 0, 897, 897, 0, 0, NULL, NULL, NULL, NULL, 1, 4, NULL, 897, NULL, NULL, '2018-08-09 00:32:14', '2018-08-09 00:32:14', NULL),
(4, 'sr-20180825-034836', 1, NULL, 1, 1, 1, 1, 2, 0, 80, 880, 880, 0, 0, NULL, NULL, NULL, NULL, 1, 2, NULL, 300, NULL, NULL, '2018-08-24 21:48:36', '2018-09-22 02:56:03', NULL),
(6, 'sr-20180826-094836', 1, NULL, 2, 1, 2, 1, 1, 0, 0, 18.9, 20, 0, 0, 0, NULL, NULL, 1.1, 1, 4, NULL, 20, NULL, NULL, '2018-08-26 03:48:36', '2018-08-26 05:48:05', NULL),
(7, 'sr-20180827-073545', 1, NULL, 1, 1, 1, 1, 2, 0, 80, 880, 880, 0, 0, NULL, NULL, NULL, NULL, 1, 4, NULL, 880, NULL, NULL, '2018-08-27 01:35:45', '2018-08-27 01:35:45', NULL),
(8, 'posr-20180902-053954', 1, NULL, 1, 1, 2, 1, 2, 0, 288, 3168, 3529.8, 10, 311.8, 50, NULL, NULL, 100, 1, 4, NULL, 3529.8, 'good customer', 'good customer', '2018-09-01 23:39:54', '2018-09-01 23:39:54', NULL),
(9, 'posr-20180903-033314', 1, NULL, 1, 2, 1, 1, 10, 0, 0, 20, 20, 0, 0, NULL, NULL, NULL, NULL, 1, 4, NULL, 20, NULL, NULL, '2018-09-02 21:33:14', '2018-09-02 21:33:14', NULL),
(10, 'posr-20180903-050138', 1, NULL, 11, 2, 1, 1, 1, 0, 0, 250, 250, 0, 0, NULL, NULL, NULL, NULL, 1, 2, NULL, 200, NULL, NULL, '2018-09-02 23:01:38', '2018-09-09 21:40:28', NULL),
(11, 'posr-20180903-100821', 1, NULL, 11, 2, 1, 1, 5, 0, 500, 5500, 5500, 0, 0, NULL, NULL, NULL, NULL, 1, 4, NULL, 5500, NULL, NULL, '2018-09-03 04:08:21', '2018-09-03 04:08:21', NULL),
(12, 'sr-20180903-101026', 1, NULL, 3, 1, 5, 1, 10, 0, 1050, 11550, 11550, 0, 0, NULL, NULL, NULL, NULL, 1, 2, NULL, 0, NULL, NULL, '2018-09-03 04:10:26', '2018-09-22 02:55:14', NULL),
(29, 'sr-20180909-093841', 1, NULL, 1, 1, 1, 1, 1, 0, 0, 120, 132, 10, 12, NULL, NULL, NULL, NULL, 1, 2, NULL, 0, NULL, NULL, '2018-09-09 03:38:41', '2018-10-06 02:36:52', NULL),
(30, 'posr-20180910-045706', 1, NULL, 11, 2, 1, 1, 1, 0, 40, 440, 440, 0, 0, 0, NULL, NULL, 0, 1, 2, NULL, 120, NULL, NULL, '2018-09-09 22:57:06', '2018-10-06 00:53:20', NULL),
(31, 'posr-20180926-092059', 1, NULL, 11, 2, 1, 2, 2, 0, 55.65, 560, 560, 0, 0, 0, NULL, NULL, 0, 1, 4, NULL, 560, NULL, NULL, '2018-09-26 03:20:59', '2018-09-26 03:21:25', NULL),
(32, 'posr-20181004-095547', 1, NULL, 11, 2, 1, 1, 1, 0, 40, 440, 440, 0, 0, NULL, NULL, NULL, NULL, 1, 2, NULL, NULL, NULL, NULL, '2018-10-04 03:55:47', '2018-10-04 03:55:47', NULL),
(33, 'posr-20181004-100022', 1, NULL, 11, 2, 1, 1, 1, 0, 40, 440, 440, 0, 0, NULL, NULL, NULL, NULL, 1, 2, NULL, NULL, NULL, NULL, '2018-10-04 04:00:22', '2018-10-04 04:00:22', NULL),
(37, 'sr-20181007-064605', 1, NULL, 1, 1, 1, 1, 1, 0, 0, 250, 250, 0, 0, NULL, NULL, NULL, NULL, 1, 2, NULL, 0, NULL, NULL, '2018-10-07 00:46:05', '2018-10-07 00:46:28', NULL),
(38, 'posr-20181007-064719', 1, NULL, 11, 2, 1, 1, 1, 0, 40, 440, 440, 0, 0, NULL, NULL, NULL, NULL, 1, 2, NULL, 0, NULL, NULL, '2018-10-07 00:47:19', '2018-10-07 03:17:02', NULL),
(40, 'posr-20181007-071312', 1, NULL, 11, 2, 1, 1, 1, 0, 40, 440, 440, 0, 0, NULL, NULL, NULL, NULL, 1, 2, NULL, 0, NULL, NULL, '2018-10-07 01:13:12', '2018-10-07 03:17:39', NULL),
(41, 'posr-20181010-041621', 1, NULL, 1, 2, 1, 2, 2, 0, 40, 461, 461, 0, 0, NULL, NULL, NULL, NULL, 1, 4, NULL, 461, NULL, NULL, '2018-10-09 22:16:21', '2018-10-09 22:16:21', NULL),
(42, 'posr-20181010-053450', 1, NULL, 1, 2, 1, 1, 1, 0, 40, 440, 440, 0, 0, NULL, NULL, NULL, NULL, 1, 4, NULL, 440, NULL, NULL, '2018-10-09 23:34:50', '2018-10-09 23:34:50', NULL),
(43, 'sr-20181016-033434', 1, NULL, 1, 1, 1, 1, 1, 0, 40, 440, 440, 0, 0, NULL, NULL, NULL, NULL, 1, 2, NULL, 0, 'sss\r\nsss\r\ns', NULL, '2018-10-15 21:34:34', '2018-10-23 00:21:27', NULL),
(55, 'posr-20181021-065334', 1, NULL, 11, 2, 1, 1, 1, 0, 0, 250, 250, 0, 0, NULL, NULL, NULL, NULL, 1, 4, NULL, 250, NULL, NULL, '2018-10-21 00:53:34', '2018-10-21 00:53:34', NULL),
(57, 'posr-20181021-082612', 1, NULL, 11, 2, 1, 2, 3, 0, 40, 482, 575.2, 10, 43.2, 50, NULL, NULL, 100, 1, 4, NULL, 575.2, NULL, NULL, '2018-10-21 02:26:12', '2018-10-21 02:26:12', NULL),
(58, 'posr-20181022-032723', 1, NULL, 11, 2, 1, 2, 2, 0, 100, 1220, 1220, 0, 0, NULL, NULL, NULL, NULL, 1, 4, NULL, 1220, NULL, NULL, '2018-10-22 09:27:23', '2018-10-22 09:27:23', NULL),
(73, 'posr-20181023-071543', 11, NULL, 11, 1, 5, 2, 5, 0, 500, 5500, 5500, 0, 0, NULL, NULL, NULL, NULL, 1, 4, NULL, 5500, NULL, NULL, '2018-10-23 01:15:43', '2018-10-23 01:15:43', NULL),
(74, 'posr-20181023-071644', 1, NULL, 11, 2, 1, 3, 3, 0, 200, 2320, 2320, 0, 0, NULL, NULL, NULL, NULL, 1, 4, NULL, 2320, NULL, NULL, '2018-10-23 01:16:44', '2018-10-23 01:16:44', NULL),
(75, 'posr-20181101-050027', 1, NULL, 11, 2, 1, 5, 12, 0, 626.96, 6980, 7678, 10, 698, NULL, NULL, NULL, NULL, 1, 4, NULL, 7678, NULL, NULL, '2018-10-31 23:00:27', '2018-10-31 23:00:27', NULL),
(76, 'posr-20181101-050126', 1, NULL, 11, 2, 1, 3, 6, 0, 100, 1434, 1424, 0, 0, 10, NULL, NULL, 0, 1, 4, NULL, 1424, NULL, NULL, '2018-10-31 23:01:26', '2018-11-08 03:44:51', NULL),
(79, 'posr-20181105-091516', 1, NULL, 11, 2, 1, 7, 52, 0, 1069.57, 14454, 14454, 0, 0, NULL, NULL, NULL, NULL, 1, 4, NULL, 14454, NULL, NULL, '2018-11-05 03:15:16', '2018-11-05 03:15:16', NULL),
(80, 'posr-20181105-091958', 1, NULL, 11, 2, 1, 3, 8, 0, 191.3, 2500, 2500, 0, 0, NULL, NULL, NULL, NULL, 1, 4, NULL, 2500, NULL, NULL, '2018-11-05 03:19:58', '2018-11-05 03:19:58', NULL),
(86, 'posr-20181105-095948', 1, NULL, 11, 2, 1, 1, 1, 0, 100, 1100, 1100, 0, 0, NULL, NULL, NULL, NULL, 1, 4, NULL, 1100, NULL, NULL, '2018-11-05 03:59:48', '2018-11-05 03:59:48', NULL),
(88, 'posr-20181105-100258', 1, NULL, 11, 2, 1, 1, 1, 0, 100, 1100, 1100, 0, 0, NULL, NULL, NULL, NULL, 1, 4, NULL, 1100, NULL, NULL, '2018-11-05 04:02:58', '2018-11-05 04:02:58', NULL),
(94, 'posr-20181126-020534', 1, NULL, 11, 2, 1, 1, 1, 0, 15.65, 120, 120, 0, 0, NULL, NULL, NULL, NULL, 1, 4, NULL, 120, NULL, NULL, '2018-11-26 08:05:34', '2018-11-26 08:05:34', NULL),
(95, 'posr-20181127-093608', 1, NULL, 11, 2, 1, 1, 3, 0, 0, 360, 360, 0, 0, NULL, NULL, NULL, NULL, 1, 2, NULL, NULL, NULL, NULL, '2018-11-27 03:36:08', '2018-11-27 03:36:08', NULL),
(96, 'posr-20181128-071509', 1, NULL, 11, 2, 1, 1, 1, 0, 15.65, 120, 132, 10, 12, NULL, NULL, NULL, NULL, 1, 4, NULL, 132, NULL, NULL, '2018-11-28 01:15:09', '2018-11-28 01:15:09', NULL),
(97, 'posr-20181201-060518', 1, NULL, 11, 2, 1, 2, 3, 0, 31.3, 262, 262, 0, 0, NULL, NULL, NULL, NULL, 1, 2, NULL, 200, NULL, NULL, '2018-12-01 00:05:18', '2018-12-04 00:21:05', NULL),
(98, 'posr-20181205-053558', 1, NULL, 11, 2, 1, 2, 4, 0, 0, 800, 800, 0, 0, NULL, NULL, NULL, NULL, 1, 4, NULL, 800, NULL, NULL, '2018-12-04 23:35:58', '2018-12-04 23:35:58', NULL),
(99, 'posr-20181205-053719', 1, NULL, 11, 1, 1, 2, 4, 0, 0, 800, 800, 0, 0, NULL, NULL, NULL, NULL, 1, 4, NULL, 800, NULL, NULL, '2018-12-04 23:37:19', '2018-12-04 23:37:19', NULL),
(101, 'posr-20181208-062026', 1, NULL, 11, 2, 1, 1, 1, 0, 0, 100, 100, 0, 0, NULL, NULL, NULL, NULL, 1, 4, NULL, 100, NULL, NULL, '2018-12-08 00:20:26', '2018-12-08 00:20:26', NULL),
(103, 'posr-20181224-045832', 1, NULL, 11, 2, 1, 1, 1, 0, 15.65, 120, 120, 0, 0, NULL, NULL, NULL, NULL, 1, 4, NULL, 120, NULL, NULL, '2018-12-23 22:58:32', '2018-12-23 22:58:32', NULL),
(104, 'sr-20181224-091527', 1, NULL, 1, 1, 2, 2, 6, 0, 0, 2508, 2518, 0, 0, 0, NULL, NULL, 10, 1, 2, NULL, NULL, NULL, NULL, '2018-12-24 03:15:27', '2018-12-24 21:55:23', NULL),
(105, 'posr-20190101-054538', 1, NULL, 1, 2, 1, 1, 1, 0, 0, 21, 21, 0, 0, NULL, NULL, NULL, NULL, 1, 4, NULL, 21, NULL, NULL, '2018-12-31 23:45:38', '2018-12-31 23:45:38', NULL),
(106, 'posr-20190101-091040', 1, NULL, 11, 2, 1, 3, 5, 0, 15.65, 860, 860, 0, 0, NULL, NULL, NULL, NULL, 1, 4, NULL, 860, NULL, NULL, '2019-01-01 03:10:40', '2019-01-01 03:10:40', NULL),
(107, 'posr-20190103-065626', 1, NULL, 11, 2, 1, 6, 10, 0, 395.65, 5040, 5040, 0, 0, NULL, NULL, NULL, NULL, 1, 4, NULL, 5040, NULL, NULL, '2019-01-03 00:56:26', '2019-01-03 00:56:26', NULL),
(108, 'posr-20190120-035824', 1, NULL, 11, 2, 1, 1, 1, 0, 15.65, 120, 120, 0, 0, NULL, NULL, NULL, NULL, 1, 4, NULL, 120, NULL, NULL, '2019-01-20 09:58:24', '2019-01-20 09:58:24', NULL),
(109, 'posr-20190129-101443', 9, NULL, 11, 1, 5, 2, 2, 0, 40, 540, 540, 0, 0, NULL, NULL, NULL, NULL, 1, 4, NULL, 540, NULL, NULL, '2019-01-29 04:14:43', '2019-01-29 04:14:43', NULL),
(110, 'posr-20190129-115041', 9, NULL, 11, 1, 5, 2, 3, 0, 100, 1700, 1700, 0, 0, NULL, NULL, NULL, NULL, 1, 4, NULL, 1700, NULL, NULL, '2019-01-29 05:50:41', '2019-01-29 05:50:41', NULL),
(111, 'posr-20190131-110839', 9, NULL, 11, 1, 5, 2, 2, 0, 0, 271, 271, 0, 0, NULL, NULL, NULL, NULL, 1, 4, NULL, 271, NULL, NULL, '2019-01-31 05:08:39', '2019-01-31 05:08:39', NULL),
(112, 'posr-20190202-104045', 1, NULL, 11, 2, 1, 1, 1, 0, 40, 440, 440, 0, 0, NULL, NULL, NULL, NULL, 1, 4, NULL, 440, NULL, NULL, '2019-02-02 04:40:45', '2019-02-02 04:40:45', NULL),
(113, 'posr-20190202-114117', 1, NULL, 11, 2, 1, 2, 2, 0, 0, 350, 350, 0, 0, NULL, NULL, NULL, NULL, 1, 4, NULL, 350, NULL, NULL, '2019-02-02 05:41:17', '2019-02-02 05:41:17', NULL),
(114, 'posr-20190205-030445', 1, NULL, 11, 2, 1, 1, 1, 0, 40, 440, 440, 0, 0, NULL, NULL, NULL, NULL, 1, 4, NULL, 440, NULL, NULL, '2019-02-05 09:04:45', '2019-02-05 09:04:45', NULL),
(118, 'posr-20190207-111542', 1, NULL, 11, 2, 1, 1, 1, 0, 40, 440, 440, 0, 0, NULL, NULL, NULL, NULL, 3, 2, NULL, NULL, NULL, NULL, '2019-02-07 05:15:42', '2019-02-07 05:15:42', NULL),
(120, 'sr-20190207-114036', 1, NULL, 1, 1, 2, 1, 1, 0, 40, 440, 440, 0, 0, NULL, NULL, NULL, NULL, 1, 2, NULL, 50, NULL, NULL, '2019-02-07 05:40:36', '2019-02-07 07:09:15', NULL),
(121, 'posr-20190209-104814', 1, NULL, 11, 2, 1, 7, 17, 0, 55.65, 1272, 1272, 0, 0, NULL, NULL, NULL, NULL, 1, 4, NULL, 1272, NULL, NULL, '2019-02-09 04:48:14', '2019-02-09 04:48:14', NULL),
(123, 'posr-20190219-023214', 1, NULL, 11, 2, 1, 1, 1, 0, 40, 440, 440, 0, 0, NULL, NULL, NULL, NULL, 1, 4, NULL, 440, NULL, NULL, '2019-02-19 08:32:14', '2019-02-19 08:32:14', NULL),
(127, 'posr-20190303-104010', 1, NULL, 11, 2, 1, 3, 3, 0, 200, 2500, 2500, 0, 0, NULL, NULL, NULL, NULL, 1, 4, NULL, 2500, NULL, NULL, '2019-03-03 04:40:10', '2019-03-03 04:40:10', NULL),
(128, 'posr-20190404-095555', 1, NULL, 11, 2, 1, 2, 2, 0, 55.65, 560, 560, 0, 0, NULL, NULL, NULL, NULL, 1, 4, NULL, 560, NULL, NULL, '2019-04-04 03:55:55', '2019-04-04 03:55:55', NULL),
(129, 'posr-20190404-095937', 1, NULL, 11, 2, 1, 1, 2, 0, 0, 240, 240, 0, 0, 0, NULL, NULL, 0, 1, 2, NULL, 120, NULL, NULL, '2019-04-04 03:59:37', '2019-04-11 04:50:16', NULL),
(130, 'posr-20190421-122124', 1, NULL, 11, 2, 1, 3, 3, 0, 58.78, 586, 586, 0, 0, NULL, NULL, NULL, NULL, 1, 4, NULL, 586, NULL, NULL, '2019-04-21 06:21:24', '2019-04-21 06:21:24', NULL),
(131, 'posr-20190528-103229', 1, NULL, 11, 2, 1, 4, 4, 0, 240, 2890, 2890, 0, 0, NULL, NULL, NULL, NULL, 1, 4, NULL, 2890, NULL, NULL, '2019-05-28 04:32:29', '2019-05-28 04:32:29', NULL),
(132, 'posr-20190613-101637', 1, NULL, 11, 2, 1, 3, 3, 0, 40, 840, 840, 0, 0, NULL, NULL, NULL, NULL, 1, 4, NULL, 840, NULL, NULL, '2019-06-13 04:16:37', '2019-06-13 04:16:37', NULL),
(133, 'posr-20190613-101751', 1, NULL, 11, 2, 1, 3, 4, 0, 200, 2700, 2700, 0, 0, NULL, NULL, NULL, NULL, 1, 4, NULL, 2700, NULL, NULL, '2019-06-13 04:17:51', '2019-06-13 04:17:51', NULL),
(134, 'posr-20191019-033028', 1, NULL, 11, 2, 1, 4, 4, 0, 240, 2940, 2940, 0, 0, NULL, NULL, NULL, NULL, 1, 4, NULL, 2940, NULL, NULL, '2019-10-19 09:30:28', '2019-10-19 09:30:28', NULL),
(138, 'sr-20191031-122937', 1, NULL, 1, 1, 1, 1, 1, 0, 0, 120, 120, 0, 0, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, '2019-10-31 06:29:37', '2019-10-31 06:29:37', NULL),
(139, 'posr-20191103-114044', 1, NULL, 11, 2, 1, 2, 102, 0, 37.57, 488, 488, 0, 0, NULL, NULL, NULL, NULL, 1, 4, NULL, 488, NULL, NULL, '2019-11-03 05:40:44', '2019-11-03 05:40:44', NULL),
(144, 'posr-20191109-074131', 1, NULL, 11, 2, 1, 2, 2, 0, 100, 1220, 1220, 0, 0, 0, NULL, NULL, 0, 1, 4, NULL, 1220, NULL, NULL, '2019-11-09 13:41:31', '2019-11-09 13:41:31', NULL),
(147, 'posr-20191111-104008', 1, NULL, 11, 2, 1, 3, 12, 0, 200, 2220, 2220, 0, 0, NULL, NULL, NULL, NULL, 1, 4, NULL, 2220, NULL, NULL, '2019-11-11 04:40:08', '2019-11-11 04:40:08', NULL),
(172, 'posr-20191203-034631', 1, NULL, 11, 2, 1, 1, 1, 0, 40, 440, 440, 0, 0, NULL, NULL, NULL, NULL, 1, 2, NULL, NULL, NULL, NULL, '2019-12-03 09:46:31', '2019-12-03 09:46:31', NULL),
(173, 'sr-20191204-111940', 1, NULL, 2, 1, 1, 2, 2, 0, 36, 621, 621, 0, 0, NULL, NULL, NULL, NULL, 1, 4, NULL, 621, NULL, NULL, '2019-12-04 17:19:40', '2019-12-05 03:27:12', NULL),
(187, 'posr-20191222-104058', 1, NULL, 11, 2, 1, 1, 2, 0, 37.57, 288, 288, 0, 0, NULL, NULL, NULL, NULL, 1, 4, NULL, 288, NULL, NULL, '2019-12-22 04:40:58', '2019-12-22 04:40:58', NULL),
(190, 'posr-20191223-125946', 1, NULL, 11, 2, 1, 1, 1, 0, 100, 1100, 1100, 0, 0, NULL, NULL, NULL, NULL, 1, 4, NULL, 1100, NULL, NULL, '2019-12-23 06:59:46', '2019-12-23 06:59:46', NULL),
(193, 'posr-20200101-022028', 1, NULL, 11, 2, 1, 1, 1, 0, 100, 1100, 1100, 0, 0, NULL, NULL, NULL, NULL, 1, 4, NULL, 1100, NULL, NULL, '2020-01-01 08:20:28', '2020-01-01 08:20:28', NULL),
(194, 'posr-20200102-043947', 1, NULL, 11, 2, 1, 2, 3, 0, 81.57, 892, 892, 0, 0, NULL, NULL, NULL, NULL, 1, 4, NULL, 892, NULL, NULL, '2020-01-02 10:39:47', '2020-01-02 10:39:47', NULL),
(201, 'posr-20200203-035256', 1, NULL, 11, 2, 1, 1, 1, 0, 0, 120, 120, 0, 0, NULL, NULL, NULL, NULL, 1, 4, NULL, 120, NULL, NULL, '2020-02-03 09:52:56', '2020-02-03 09:52:56', NULL),
(202, 'posr-20200204-105853', 1, NULL, 11, 2, 1, 2, 2, 0, 100, 1400, 1400, 0, 0, NULL, NULL, NULL, NULL, 1, 4, NULL, 1400, NULL, NULL, '2020-02-04 16:58:53', '2020-02-04 16:58:53', NULL),
(203, 'posr-20200302-115414', 1, NULL, 11, 2, 1, 2, 2, 0, 0, 350, 350, 0, 0, NULL, NULL, NULL, NULL, 1, 4, NULL, 350, NULL, NULL, '2020-03-02 05:54:14', '2020-03-02 05:54:14', NULL),
(204, 'posr-20200302-115741', 1, NULL, 11, 2, 1, 1, 20, 0, 0, 40, 40, 0, 0, NULL, NULL, NULL, NULL, 1, 4, NULL, 40, NULL, NULL, '2020-03-02 05:57:41', '2020-03-02 05:57:41', NULL),
(205, 'posr-20200311-044641', 1, NULL, 11, 2, 1, 1, 1, 0, 40, 440, 352, 0, 0, NULL, 1, 88, NULL, 1, 4, NULL, 352, NULL, NULL, '2020-03-11 10:46:42', '2020-03-11 10:46:42', NULL),
(206, 'sr-20200311-045230', 1, NULL, 1, 1, 1, 1, 1, 0, 0, 120, 120, 0, 0, 0, NULL, NULL, 0, 1, 2, NULL, NULL, NULL, NULL, '2020-03-11 10:52:30', '2020-03-11 10:54:04', NULL),
(207, 'posr-20200406-074024', 1, NULL, 11, 2, 1, 3, 4, 0, 18.78, 644, 644, 0, 0, 0, NULL, NULL, 0, 1, 4, NULL, 644, NULL, NULL, '2020-04-06 13:40:24', '2020-04-06 13:42:01', NULL),
(208, 'posr-20200506-105950', 1, NULL, 11, 2, 1, 2, 2, 0, 140, 1540, 1540, 0, 0, NULL, NULL, NULL, NULL, 1, 4, NULL, 1540, NULL, NULL, '2020-05-06 16:59:50', '2020-05-06 16:59:50', NULL),
(209, 'posr-20200609-124248', 1, NULL, 11, 2, 1, 2, 2, 0, 100, 1220, 1220, 0, 0, NULL, NULL, NULL, NULL, 1, 4, NULL, 1220, NULL, NULL, '2020-06-09 06:42:48', '2020-06-09 06:42:48', NULL),
(212, 'posr-20200703-063914', 1, NULL, 11, 2, 1, 3, 3, 0, 235, 2585, 2585, 0, 0, NULL, NULL, NULL, NULL, 1, 4, NULL, 2585, NULL, NULL, '2020-07-03 12:39:14', '2020-07-03 12:39:14', NULL),
(213, 'posr-20200712-095153', 1, NULL, 11, 2, 1, 1, 1, 0, 0, 13, 13, 0, 0, NULL, NULL, NULL, NULL, 1, 4, NULL, 13, NULL, NULL, '2020-07-12 15:51:53', '2020-07-12 15:51:53', NULL),
(214, 'posr-20200714-115341', 1, NULL, 11, 2, 1, 1, 1, 0, 0, 250, 309.5, 10, 24.5, 5, NULL, NULL, 40, 3, 2, NULL, NULL, NULL, NULL, '2020-07-14 05:53:41', '2020-07-14 05:53:41', NULL),
(217, 'posr-20200727-083808', 1, NULL, 11, 2, 1, 1, 1, 0, 35, 385, 385, 0, 0, NULL, NULL, NULL, NULL, 1, 4, NULL, 385, NULL, NULL, '2020-07-27 14:38:08', '2020-07-27 14:38:08', NULL),
(218, 'posr-20200727-084024', 1, NULL, 11, 2, 1, 1, 1, 0, 35, 385, 385, 0, 0, NULL, NULL, NULL, NULL, 1, 4, NULL, 385, NULL, NULL, '2020-07-27 14:40:24', '2020-07-27 14:40:24', NULL),
(219, 'posr-20200727-084644', 1, NULL, 11, 2, 1, 1, 1, 0, 35, 385, 385, 0, 0, NULL, NULL, NULL, NULL, 1, 4, NULL, 385, NULL, NULL, '2020-07-27 14:46:45', '2020-07-27 14:46:45', NULL),
(220, 'posr-20200812-062804', 1, NULL, 11, 2, 1, 3, 6, 0, 0, 760, 760, 0, 0, NULL, NULL, NULL, NULL, 1, 4, NULL, 760, NULL, NULL, '2020-08-12 12:28:04', '2020-08-12 12:28:04', NULL),
(221, 'posr-20200812-063035', 1, NULL, 11, 2, 1, 1, 1, 0, 100, 1100, 1100, 0, 0, NULL, NULL, NULL, NULL, 1, 4, NULL, 1100, NULL, NULL, '2020-08-12 12:30:35', '2020-08-12 12:30:35', NULL),
(222, 'posr-20200816-100424', 1, NULL, 11, 2, 1, 1, 2, 0, 3000, 23000, 23000, 0, 0, NULL, NULL, NULL, NULL, 1, 4, NULL, 23000, NULL, NULL, '2020-08-16 16:04:24', '2020-08-16 16:04:24', NULL),
(223, 'posr-20200816-100523', 1, NULL, 11, 2, 1, 1, 1, 0, 40, 440, 440, 0, 0, NULL, NULL, NULL, NULL, 1, 4, NULL, 440, NULL, NULL, '2020-08-16 16:05:23', '2020-08-16 16:07:35', NULL),
(224, 'sr-20200826-080139', 1, NULL, 1, 1, 1, 1, 3, 30, 117, 1287, 1287, 0, 0, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, '2020-08-26 14:01:39', '2020-08-26 14:01:39', NULL),
(230, 'posr-20201017-092852', 9, 2, 11, 1, 5, 1, 1, 0, 0, 250, 250, 0, 0, NULL, NULL, NULL, NULL, 1, 2, NULL, 350, NULL, NULL, '2020-10-17 15:28:52', '2020-10-18 04:51:38', NULL),
(231, 'sr-20201018-111333', 9, 2, 1, 1, 5, 1, 1, 0, 40, 440, 440, 0, 0, NULL, NULL, NULL, NULL, 1, 2, NULL, 250, NULL, NULL, '2020-10-18 05:13:33', '2020-10-18 05:17:24', NULL),
(232, 'posr-20201022-013014', 9, 2, 11, 1, 5, 1, 1, 0, 0, 100, 100, 0, 0, NULL, NULL, NULL, NULL, 1, 4, NULL, 100, NULL, NULL, '2020-10-22 07:30:14', '2020-10-22 07:30:14', NULL),
(233, 'posr-20201022-015604', 1, 3, 11, 1, 1, 1, 1, 0, 0, 250, 250, 0, 0, NULL, NULL, NULL, NULL, 1, 4, NULL, 250, NULL, NULL, '2020-10-22 07:56:04', '2020-10-22 07:56:04', NULL),
(234, 'posr-20201024-070506', 1, 4, 11, 2, 1, 1, 1, 0, 1500, 11500, 11500, 0, 0, NULL, NULL, NULL, NULL, 1, 4, NULL, 11500, NULL, NULL, '2020-10-24 01:05:06', '2020-10-24 01:05:06', NULL),
(235, 'posr-20201024-070751', 1, 4, 11, 2, 1, 1, 1, 0, 0, 250, 250, 0, 0, NULL, NULL, NULL, NULL, 1, 4, NULL, 250, NULL, NULL, '2020-10-24 01:07:51', '2020-10-24 01:07:51', NULL),
(237, 'posr-20201024-034601', 1, 4, 11, 2, 1, 3, 9, 0, 7900, 61900, 61900, 0, 0, NULL, NULL, NULL, NULL, 1, 4, NULL, 61900, NULL, NULL, '2020-10-24 09:46:01', '2020-10-24 09:46:01', NULL),
(239, 'posr-20201027-054002', 1, 3, 11, 1, 1, 1, 1, 0, 0, 2, 2, 0, 0, NULL, NULL, NULL, NULL, 1, 4, NULL, 2, NULL, NULL, '2020-10-26 23:40:02', '2020-10-26 23:40:02', NULL),
(240, 'posr-20201027-054206', 1, 3, 11, 1, 1, 1, 2, 0, 0, 6, 6, 0, 0, NULL, NULL, NULL, NULL, 1, 4, NULL, 6, NULL, NULL, '2020-10-26 23:42:06', '2020-10-26 23:42:06', NULL),
(241, 'posr-20201027-063200', 1, 4, 11, 2, 1, 1, 1, 0, 0, 250, 250, 0, 0, NULL, NULL, NULL, NULL, 1, 4, NULL, 250, NULL, NULL, '2020-10-27 00:32:00', '2020-10-27 00:32:00', NULL),
(242, 'posr-20201029-073030', 1, 4, 11, 2, 1, 1, 1, 0, 0, 250, 250, 0, 0, NULL, NULL, NULL, NULL, 1, 4, NULL, 250, NULL, NULL, '2020-10-29 01:30:30', '2020-10-29 01:30:30', NULL),
(243, 'posr-20201101-072112', 1, 4, 11, 2, 1, 1, 1, 0, 0, 250, 250, 0, 0, NULL, NULL, NULL, NULL, 1, 4, NULL, 250, NULL, NULL, '2020-11-01 01:21:12', '2020-11-01 01:21:12', NULL),
(245, 'posr-20201101-074223', 1, 3, 11, 1, 5, 2, 3, 0, 80, 1130, 1130, NULL, 0, 0, NULL, NULL, 0, 1, 4, NULL, 1130, NULL, NULL, '2020-11-01 01:42:23', '2020-11-01 01:42:23', NULL),
(246, 'posr-20201101-075017', 1, 4, 11, 2, 1, 1, 1, 0, 40, 440, 440, 0, 0, 0, NULL, NULL, 0, 1, 4, NULL, 440, 'ssss\r\nssas', 'hhhh\r\nkkkk', '2020-11-01 01:50:17', '2020-11-02 10:39:17', NULL),
(250, 'posr-20201106-013041', 1, 4, 11, 2, 1, 1, 1, 0, 34.4, 378.4, 378.4, 0, 0, NULL, NULL, NULL, NULL, 1, 4, NULL, 378.4, NULL, NULL, '2020-11-06 07:30:41', '2020-11-06 07:30:41', NULL),
(251, 'posr-20201109-011524', 1, 4, 19, 2, 1, 2, 2, 0, 34.4, 610.6, 610.6, 0, 0, NULL, NULL, NULL, NULL, 1, 2, NULL, 500, NULL, NULL, '2020-11-09 07:15:24', '2020-11-09 07:15:24', NULL),
(252, 'posr-20201111-055858', 1, 3, 11, 1, 1, 1, 1, 0, 0, 229.5, 229.5, 0, 0, NULL, NULL, NULL, NULL, 1, 4, NULL, 229.5, NULL, NULL, '2020-11-10 23:58:58', '2020-11-10 23:58:58', NULL),
(253, 'posr-20201114-064736', 1, 4, 11, 2, 1, 3, 3, 0, 1275, 10242.5, 10242.5, 0, 0, NULL, NULL, NULL, NULL, 1, 4, NULL, 10242.5, NULL, NULL, '2020-11-14 00:47:36', '2020-11-14 00:47:36', NULL),
(256, 'posr-20201117-064748', 1, 4, 11, 2, 1, 2, 2, 0, 65, 715, 715, 0, 0, NULL, NULL, NULL, NULL, 1, 4, NULL, 715, NULL, NULL, '2020-11-17 00:47:48', '2020-11-17 00:47:48', NULL),
(257, 'posr-20201117-070919', 1, 4, 11, 2, 1, 1, 1, 0, 0, 250, 250, 0, 0, NULL, NULL, NULL, NULL, 1, 4, NULL, 250, NULL, NULL, '2020-11-17 01:09:19', '2020-11-17 01:09:19', NULL),
(258, 'posr-20201118-065239', 1, 4, 11, 2, 1, 1, 3, 0, 4500, 34500, 27200, 0, 0, 600, 1, 6800, 100, 1, 4, NULL, 27200, NULL, NULL, '2020-11-18 00:52:39', '2020-11-18 00:52:39', NULL),
(259, 'sr-20201202-093807', 28, NULL, 3, 2, 5, 2, 2, 0, 0, 111741, 111751, 0, 0, 40, NULL, NULL, 50, 1, 4, 'sample_category (1).csv', 111751, 'demo sales demo sales demo sales demo sales demo sale sdemo sales demo sales', 'staxsaxxm kvzx', '2020-12-02 03:38:07', '2020-12-02 03:40:20', NULL),
(260, 'sr-20201230-090746', 28, 5, 26, 1, 9, 1, 1, 0, 2086.36, 22950, 22950, 0, 0, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, '2020-12-30 03:07:46', '2020-12-30 03:07:46', NULL),
(261, 'sr-20210106-043949', 28, 7, 26, 7, 9, 1, 5, 0, 0, 2510, 2510, 0, 0, NULL, NULL, NULL, NULL, 1, 4, NULL, 2510, NULL, NULL, '2021-01-05 22:39:49', '2021-01-05 22:41:45', NULL),
(262, 'sr-20210107-085612', 28, 5, 25, 1, 9, 4, 9, 0, 118.78, 1554, 1554, 0, 0, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, '2021-01-07 02:56:12', '2021-01-07 02:56:12', NULL),
(263, 'ecom-20210107-112255', 28, 5, 25, 1, 1, 4, 10, 0, 20, 200, 200, NULL, NULL, NULL, NULL, NULL, NULL, 1, 4, NULL, 200, NULL, NULL, '2021-01-07 05:22:55', '2021-01-07 05:23:37', '::1'),
(265, 'posr-20210107-120925', 28, 9, 11, 2, 9, 1, 1, 0, 40, 440, 440, 0, 0, NULL, NULL, NULL, NULL, 3, 4, NULL, 440, NULL, NULL, '2021-01-07 06:09:25', '2021-01-13 05:08:46', NULL),
(266, 'ecom-20210113-110009', 28, 5, 28, 1, 1, 1, 5, 0, 0, 2990, 2990, 0, 0, NULL, NULL, NULL, NULL, 3, 4, NULL, 2990, NULL, NULL, '2021-01-13 05:00:09', '2021-01-13 05:03:18', NULL),
(267, 'ecom-20210114-041741', 28, NULL, 29, 1, 1, 2, 8, 0, 0, 3294, 3294, NULL, NULL, NULL, NULL, NULL, NULL, 3, 4, NULL, 3294, NULL, NULL, '2021-01-13 22:17:41', '2021-01-13 22:23:48', NULL),
(268, 'ecom-20210114-054506', 28, NULL, 30, 1, 1, 2, 4, 0, 0, 33, 33, NULL, NULL, NULL, NULL, NULL, NULL, 3, 2, NULL, 20, NULL, NULL, '2021-01-13 23:45:06', '2021-01-14 00:43:45', NULL),
(269, 'ecom-20210116-054844', 28, NULL, 31, 1, 1, 1, 10, 0, 0, 6000, 6000, NULL, NULL, NULL, NULL, NULL, NULL, 3, 4, NULL, 6000, NULL, NULL, '2021-01-15 23:48:44', '2021-01-15 23:51:37', NULL),
(270, 'ecom-20210118-061150', 34, NULL, 34, 1, 1, 1, 1, 0, 0, 300, 300, NULL, NULL, NULL, NULL, NULL, NULL, 3, 4, NULL, 300, NULL, NULL, '2021-01-18 00:11:50', '2021-01-18 02:43:26', NULL),
(274, 'sr-20210123-071616', 28, 5, 36, 1, 2, 1, 5, 0, 0, 1250, 1250, 0, 0, NULL, NULL, NULL, NULL, 1, 4, NULL, 1250, NULL, NULL, '2021-01-23 01:16:16', '2021-01-23 01:33:01', NULL),
(275, 'posr-20210123-072509', 28, 5, 36, 1, 1, 1, 5, 0, 0, 3000, 3000, NULL, NULL, 0, NULL, NULL, 0, 1, 4, NULL, 3000, NULL, NULL, '2021-01-23 01:25:09', '2021-01-23 01:25:09', NULL),
(276, 'posr-20210123-105907', 28, 7, 11, 7, 5, 1, 2, 0, 0, 42, 42, NULL, 0, 0, NULL, NULL, 0, 1, 4, NULL, 42, NULL, NULL, '2021-01-23 04:59:07', '2021-01-23 04:59:07', NULL),
(280, 'posr-20210128-102758', 28, 5, 37, 1, 1, 2, 6, 0, 0, 2400, 2400, NULL, NULL, 0, NULL, NULL, 0, 1, 4, NULL, 2400, NULL, NULL, '2021-01-28 04:27:58', '2021-01-28 04:27:58', NULL),
(281, 'posr-20210128-102846', 28, 5, 35, 1, 1, 1, 4, 0, 0, 40, 40, NULL, NULL, 0, NULL, NULL, 0, 1, 4, NULL, 40, NULL, NULL, '2021-01-28 04:28:46', '2021-01-28 04:28:46', NULL),
(285, 'ecom-20210128-104918', 35, NULL, 34, 1, 1, 1, 1, 0, 0, 1974.35, 1974.35, NULL, NULL, NULL, NULL, NULL, NULL, 3, 2, NULL, NULL, NULL, NULL, '2021-01-28 04:49:18', '2021-01-28 04:49:18', NULL),
(286, 'ecom-20210128-105220', 35, NULL, 34, 1, 1, 1, 1, 0, 0, 2105.24, 2105.24, NULL, NULL, NULL, NULL, NULL, NULL, 3, 2, NULL, NULL, NULL, NULL, '2021-01-28 04:52:20', '2021-01-28 04:52:20', NULL),
(287, 'ecom-20210130-042547', 34, NULL, 33, 1, 1, 2, 2, 0, 0, 1559.07, 1559.07, NULL, NULL, NULL, NULL, NULL, NULL, 3, 2, NULL, NULL, NULL, NULL, '2021-01-29 22:25:47', '2021-01-29 22:25:47', NULL),
(288, 'ecom-20210130-104228', 28, NULL, 38, 1, 1, 2, 3, 0, 0, 3981, 3981, NULL, NULL, NULL, NULL, NULL, NULL, 3, 2, NULL, NULL, NULL, NULL, '2021-01-30 04:42:28', '2021-01-30 04:42:28', NULL),
(289, 'ecom-20210130-115407', 35, NULL, 34, 1, 1, 2, 2, 0, 0, 1208, 1208, NULL, NULL, NULL, NULL, NULL, 60, 3, 2, NULL, NULL, NULL, NULL, '2021-01-30 05:54:07', '2021-01-30 05:54:07', NULL),
(290, 'ecom-20210130-120231', 35, NULL, 34, 1, 1, 2, 2, 0, 0, 3416, 3416, NULL, NULL, NULL, NULL, NULL, 100, 3, 2, NULL, NULL, NULL, NULL, '2021-01-30 06:02:31', '2021-01-30 06:02:31', NULL),
(291, 'ecom-20210130-120451', 35, NULL, 34, 1, 1, 2, 2, 0, 0, 169579, 169639, NULL, NULL, NULL, NULL, NULL, 60, 3, 2, NULL, NULL, NULL, NULL, '2021-01-30 06:04:51', '2021-01-30 06:04:51', NULL),
(292, 'ecom-20210131-055722', 28, NULL, 39, 1, 1, 2, 3, 0, 0, 5239, 5299, NULL, NULL, NULL, NULL, NULL, 60, 3, 2, NULL, NULL, NULL, NULL, '2021-01-30 23:57:22', '2021-01-30 23:57:22', NULL),
(293, 'ecom-20210131-060940', 28, NULL, 40, 1, 1, 1, 1, 0, 0, 454, 514, NULL, NULL, NULL, NULL, NULL, 60, 3, 2, NULL, NULL, NULL, NULL, '2021-01-31 00:09:40', '2021-01-31 00:09:40', NULL),
(294, 'sr-20210202-062417', 28, 5, 1, 1, 1, 2, 3.5, 0, 0, 76, 77.1, 0, 0, 1.6, NULL, NULL, 2.7, 1, 1, NULL, NULL, NULL, NULL, '2021-02-02 00:24:17', '2021-02-02 00:24:17', NULL),
(296, 'posr-20210203-072354', 28, 5, 40, 1, 1, 1, 1, 0, 0, 454, 554, NULL, NULL, 0, NULL, NULL, 100, 1, 4, NULL, 554, NULL, NULL, '2021-02-03 01:23:54', '2021-02-03 01:23:54', NULL),
(297, 'ecom-20210203-073707', 28, NULL, 41, 1, 1, 1, 1, 0, 0, 46683, 46743, NULL, NULL, NULL, NULL, NULL, 60, 3, 2, NULL, NULL, NULL, NULL, '2021-02-03 01:37:07', '2021-02-03 01:37:07', NULL),
(298, 'ecom-20210203-074107', 34, NULL, 33, 1, 1, 1, 1, 0, 0, 1149, 1249, NULL, NULL, NULL, NULL, NULL, 100, 3, 2, NULL, NULL, NULL, NULL, '2021-02-03 01:41:07', '2021-02-03 01:41:07', NULL),
(299, 'ecom-20210203-092431', 28, NULL, 42, 1, 1, 1, 1, 0, 0, 454, 514, NULL, NULL, NULL, NULL, NULL, 60, 3, 2, NULL, NULL, NULL, NULL, '2021-02-03 03:24:31', '2021-02-03 03:24:31', NULL),
(300, 'ecom-20210203-093011', 65, NULL, 42, 1, 1, 1, 1, 0, 0, 454, 554, NULL, NULL, NULL, NULL, NULL, 100, 3, 2, NULL, NULL, NULL, NULL, '2021-02-03 03:30:11', '2021-02-03 03:30:11', NULL),
(301, 'ecom-20210203-095050', 28, NULL, 43, 1, 1, 1, 2, 0, 0, 1836, 1936, NULL, NULL, NULL, NULL, NULL, 100, 3, 2, NULL, NULL, NULL, NULL, '2021-02-03 03:50:50', '2021-02-03 03:50:50', NULL),
(302, 'ecom-20210203-100740', 28, NULL, 44, 1, 1, 1, 1, 0, 0, 918, 978, NULL, NULL, NULL, NULL, NULL, 60, 3, 2, NULL, NULL, NULL, NULL, '2021-02-03 04:07:40', '2021-02-03 04:07:40', NULL),
(303, 'ecom-20210203-111733', 67, NULL, 44, 1, 1, 1, 1, 0, 0, 918, 978, NULL, NULL, NULL, NULL, NULL, 60, 3, 2, NULL, NULL, NULL, NULL, '2021-02-03 05:17:33', '2021-02-03 05:17:33', NULL),
(304, 'ecom-20210204-065229', 63, NULL, 40, 1, 1, 1, 1, 0, 0, 454, 514, NULL, NULL, NULL, NULL, NULL, 60, 3, 2, NULL, NULL, NULL, NULL, '2021-02-04 00:52:29', '2021-02-04 00:52:29', NULL),
(305, 'ecom-20210204-065351', 68, NULL, 45, 1, 1, 1, 1, 0, 0, 1974, 2034, NULL, NULL, NULL, NULL, NULL, 60, 3, 2, NULL, NULL, NULL, NULL, '2021-02-04 00:53:51', '2021-02-04 00:53:51', NULL),
(306, 'ecom-20210204-065719', 69, NULL, 46, 1, 1, 1, 3, 0, 0, 3456, 3556, NULL, NULL, NULL, NULL, NULL, 100, 3, 2, NULL, NULL, NULL, NULL, '2021-02-04 00:57:19', '2021-02-04 00:57:19', NULL),
(307, 'ecom-20210204-092730', 70, NULL, 47, 1, 1, 1, 1, 0, 0, 454, 514, NULL, NULL, NULL, NULL, NULL, 60, 3, 2, NULL, NULL, NULL, NULL, '2021-02-04 03:27:30', '2021-02-04 03:27:30', NULL),
(308, 'sr-20210208-100148', 28, NULL, 1, 1, 1, 3, 5, 20, 83.65, 910, 910, 0, 0, NULL, NULL, NULL, NULL, 1, 2, NULL, 0, NULL, NULL, '2021-02-08 04:01:48', '2021-02-08 04:01:49', NULL),
(309, 'sr-20210208-101626', 28, 5, 27, 1, 1, 1, 3, 0, 0, 3447, 3447, 0, 0, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, '2021-02-08 04:16:26', '2021-02-08 04:16:26', NULL),
(310, 'sr-20210209-085621', 28, 5, 37, 1, 1, 1, 1, 0, 0, 68000, 78100, 7.5, 5100, NULL, NULL, NULL, 5000, 1, 1, NULL, NULL, 'Sample sale note', 'sample staff note', '2021-02-09 02:56:21', '2021-02-09 02:56:21', NULL),
(311, 'posr-20210213-065158', 28, 5, 11, 1, 1, 3, 6, 0, 0, 117328, 117328, 0, 0, NULL, NULL, NULL, NULL, 1, 4, NULL, 117328, NULL, NULL, '2021-02-13 00:51:58', '2021-02-13 00:51:58', NULL),
(312, 'posr-20210213-065354', 28, 5, 35, 1, 1, 1, 1, 0, 0, 1149, 1149, 0, 0, NULL, NULL, NULL, NULL, 1, 4, NULL, 1149, NULL, NULL, '2021-02-13 00:53:54', '2021-02-13 00:53:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stock_counts`
--

CREATE TABLE `stock_counts` (
  `id` int(10) UNSIGNED NOT NULL,
  `reference_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `category_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `initial_file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `final_file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_adjusted` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stock_counts`
--

INSERT INTO `stock_counts` (`id`, `reference_no`, `warehouse_id`, `category_id`, `brand_id`, `user_id`, `type`, `initial_file`, `final_file`, `note`, `is_adjusted`, `created_at`, `updated_at`) VALUES
(1, 'scr-20190228-124939', 2, NULL, NULL, 1, 'full', '20190228-124939.csv', NULL, NULL, 0, '2019-02-28 06:49:39', '2019-02-28 06:49:39'),
(2, 'scr-20201202-105610', 1, '20', '7', 28, 'partial', '20201202-105610.csv', NULL, NULL, 0, '2020-12-02 04:56:10', '2020-12-02 04:56:10'),
(3, 'scr-20201230-094344', 1, NULL, NULL, 28, 'full', '20201230-094344.csv', NULL, NULL, 0, '2020-12-30 03:43:44', '2020-12-30 03:43:44'),
(4, 'scr-20201230-095724', 1, '23', '9', 28, 'partial', '20201230-095724.csv', NULL, NULL, 0, '2020-12-30 03:57:24', '2020-12-30 03:57:24'),
(5, 'scr-20201230-104145', 1, '23', '9', 28, 'partial', '20201230-104145.csv', NULL, NULL, 0, '2020-12-30 04:41:45', '2020-12-30 04:41:45');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vat_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `image`, `company_name`, `vat_number`, `email`, `phone_number`, `address`, `city`, `state`, `postal_code`, `country`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'abdullah', 'globaltouch.jpg', 'global touch', NULL, 'abdullah@globaltouch.com', '231231', 'fsdfs', 'fsdfs', NULL, NULL, 'bd', 1, '2018-05-12 22:06:34', '2019-12-21 10:58:47'),
(2, 'test', 'lion.jpg', 'lion', NULL, 'lion@gmail.com', '242', 'gfdg', 'fgd', NULL, NULL, NULL, 0, '2018-05-29 23:59:41', '2018-05-30 00:00:06'),
(3, 'ismail', NULL, 'techbd', NULL, 'ismail@test.com', '23123123', 'mohammadpur', 'dhaka', NULL, NULL, 'bangladesh', 1, '2018-07-20 04:34:17', '2018-07-20 04:34:17'),
(4, 'modon', 'mogaFruit.jpg', 'mogaFruit', NULL, 'modon@gmail.com', '32321', 'nasirabad', 'chittagong', NULL, NULL, 'bd', 0, '2018-09-01 04:30:07', '2018-09-01 04:37:20'),
(5, 'sadman', NULL, 'anda boda', 'dsa', 'asd@dsa.com', '3212313', 'dadas', 'sdad', 'Other', '1312', 'Australia', 0, '2020-06-22 09:48:33', '2020-06-22 09:48:52'),
(6, 'Sahid', 'ABHWorld.jpg', 'ABH World', '12345678', 'sahid@gmail.com', '0167232621', 'Jaleswaritrola', 'Bogra', 'Rajshahi', '1234', 'Bangladesh', 0, '2020-12-02 22:58:48', '2021-01-07 06:01:30');

-- --------------------------------------------------------

--
-- Table structure for table `taxes`
--

CREATE TABLE `taxes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` double NOT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taxes`
--

INSERT INTO `taxes` (`id`, `name`, `rate`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'vat@7.5', 7.5, 1, '2018-05-12 09:58:30', '2021-02-09 02:36:26'),
(2, 'vat@15', 15, 1, '2018-05-12 09:58:43', '2018-05-27 23:35:05'),
(3, 'test', 6, 0, '2018-05-27 23:32:54', '2018-05-27 23:34:44'),
(4, 'vat 20', 20, 1, '2018-09-01 00:58:57', '2018-09-01 00:58:57'),
(5, 'vat', 5, 1, '2020-12-03 02:51:07', '2020-12-03 02:51:07');

-- --------------------------------------------------------

--
-- Table structure for table `transfers`
--

CREATE TABLE `transfers` (
  `id` int(10) UNSIGNED NOT NULL,
  `reference_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `from_warehouse_id` int(11) NOT NULL,
  `to_warehouse_id` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `total_qty` double NOT NULL,
  `total_tax` double NOT NULL,
  `total_cost` double NOT NULL,
  `shipping_cost` double DEFAULT NULL,
  `grand_total` double NOT NULL,
  `document` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transfers`
--

INSERT INTO `transfers` (`id`, `reference_no`, `user_id`, `status`, `from_warehouse_id`, `to_warehouse_id`, `item`, `total_qty`, `total_tax`, `total_cost`, `shipping_cost`, `grand_total`, `document`, `note`, `created_at`, `updated_at`) VALUES
(1, 'tr-20180808-051710', 1, 1, 2, 1, 1, 100, 0, 100, 0, 100, NULL, NULL, '2018-08-08 11:17:10', '2018-12-24 22:16:55'),
(6, 'tr-20191205-075504', 1, 1, 1, 2, 1, 1, 0, 2, 0, 2, NULL, NULL, '2019-12-05 13:55:04', '2019-12-05 14:09:42'),
(8, 'tr-20200122-123058', 1, 1, 1, 2, 1, 10, 0, 1000, NULL, 1000, NULL, NULL, '2020-01-22 06:30:58', '2020-01-22 06:30:58'),
(10, 'tr-20201008-012735', 9, 1, 1, 2, 1, 1, 32, 352, 0, 352, NULL, NULL, '2020-10-08 07:27:35', '2020-10-08 07:29:35'),
(11, 'tr-20201018-061708', 9, 1, 1, 2, 1, 1, 0, 1, NULL, 1, NULL, NULL, '2020-10-18 12:17:08', '2020-10-18 12:17:08'),
(12, 'tr-20201024-090146', 1, 1, 2, 1, 1, 10, 4500, 34500, NULL, 34500, NULL, NULL, '2020-10-24 03:01:46', '2020-10-24 03:01:46'),
(13, 'tr-20201202-110406', 28, 3, 1, 2, 1, 50, 2500, 27500, 50, 27550, 'sample_category (1).csv', 'Demo transfer Demo transfer Demo transfer Demo transfer Demo transfer Demo transfer', '2020-12-02 05:04:06', '2020-12-02 05:04:06'),
(14, 'tr-20210106-041634', 28, 1, 7, 2, 1, 5, 0, 2500, NULL, 2500, NULL, NULL, '2021-01-05 22:16:34', '2021-01-05 22:16:34');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(10) UNSIGNED NOT NULL,
  `unit_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `base_unit` int(11) DEFAULT NULL,
  `operator` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `operation_value` double DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `unit_code`, `unit_name`, `base_unit`, `operator`, `operation_value`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'pc', 'Piece', NULL, '*', 1, 1, '2018-05-12 02:27:46', '2018-08-17 21:41:53'),
(2, 'dozen', 'dozen box', 1, '*', 12, 1, '2018-05-12 09:57:05', '2018-05-12 09:57:05'),
(3, 'cartoon', 'cartoon box', 1, '*', 24, 1, '2018-05-12 09:57:45', '2020-03-11 10:36:59'),
(4, 'm', 'meter', NULL, '*', 1, 1, '2018-05-12 09:58:07', '2018-05-27 23:20:57'),
(6, 'test', 'test', NULL, '*', 1, 0, '2018-05-27 23:20:20', '2018-05-27 23:20:25'),
(7, 'kg', 'kilogram', NULL, '*', 1, 1, '2018-06-25 00:49:26', '2018-06-25 00:49:26'),
(8, '20', 'ni33', 8, '*', 1, 0, '2018-07-31 22:35:51', '2018-07-31 22:40:54'),
(9, 'gm', 'gram', 7, '/', 1000, 1, '2018-09-01 00:06:28', '2018-09-01 00:06:28'),
(10, 'gz', 'goz', NULL, '*', 1, 0, '2018-11-29 03:40:29', '2019-03-02 11:53:29'),
(11, '70331946', 'Sample', 7, 'safi', 12, 1, '2020-12-03 02:49:38', '2020-12-03 02:49:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expire_date` date NOT NULL DEFAULT '9999-12-31',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  `biller_id` int(11) DEFAULT NULL,
  `warehouse_id` int(11) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `expire_date`, `remember_token`, `phone`, `company_name`, `role_id`, `biller_id`, `warehouse_id`, `is_active`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$DWAHTfjcvwCpOCXaJg11MOhsqns03uvlwiSUOQwkHL2YYrtrXPcL6', '9999-12-31', '7pGpZtQwN5n5YpgTuyi2rc386G4S9ZgrARmRNE8C3EECH4gE9ycrpC1w0Q35', '12112', 'lioncoders', 1, NULL, NULL, 1, 0, '2018-06-02 03:24:15', '2018-09-05 00:14:15'),
(3, 'dhiman da', 'dhiman@gmail.com', '$2y$10$Fef6vu5E67nm11hX7V5a2u1ThNCQ6n9DRCvRF9TD7stk.Pmt2R6O.', '9999-12-31', '5ehQM6JIfiQfROgTbB5let0Z93vjLHS7rd9QD5RPNgOxli3xdo7fykU7vtTt', '212', 'lioncoders', 1, NULL, NULL, 0, 1, '2018-06-13 22:00:31', '2020-11-05 07:06:51'),
(6, 'test', 'test@gmail.com', '$2y$10$TDAeHcVqHyCmurki0wjLZeIl1SngKX3WLOhyTiCoZG3souQfqv.LS', '9999-12-31', 'KpW1gYYlOFacumklO2IcRfSsbC3KcWUZzOI37gqoqM388Xie6KdhaOHIFEYm', '1234', '212312', 4, NULL, NULL, 0, 1, '2018-06-23 03:05:33', '2018-06-23 03:13:45'),
(8, 'test', 'test@yahoo.com', '$2y$10$hlMigidZV0j2/IPkgE/xsOSb8WM2IRlsMv.1hg1NM7kfyd6bGX3hC', '9999-12-31', NULL, '31231', NULL, 4, NULL, NULL, 0, 1, '2018-06-24 22:35:49', '2018-07-02 01:07:39'),
(9, 'staff', 'anda@gmail.com', '$2y$10$kxDbnynB6mB1e1w3pmtbSOlSxy/WwbLPY5TJpMi0Opao5ezfuQjQm', '9999-12-31', 'DIDsmdI5kMZfkk2n4OkOpuH8yYHs3O0aPp9xUO0zuY4TwPvylsW5H6ovgE0K', '3123', NULL, 4, 5, 1, 1, 0, '2018-07-02 01:08:08', '2018-10-23 21:41:13'),
(10, 'abul', 'abul@alpha.com', '$2y$10$5zgB2OOMyNBNVAd.QOQIju5a9fhNnTqPx5H6s4oFlXhNiF6kXEsPq', '9999-12-31', 'x7HlttI5bM0vSKViqATaowHFJkLS3PHwfvl7iJdFl5Z1SsyUgWCVbLSgAoi0', '1234', 'anda', 1, NULL, NULL, 0, 0, '2018-09-07 23:44:48', '2018-09-07 23:44:48'),
(11, 'teststaff', 'a@a.com', '$2y$10$5KNBIIhZzvvZEQEhkHaZGu.Q8bbQNfqYvYgL5N55B8Pb4P5P/b/Li', '9999-12-31', 'DkHDEcCA0QLfsKPkUK0ckL0CPM6dPiJytNa0k952gyTbeAyMthW3vi7IRitp', '111', 'aa', 4, 5, 1, 0, 1, '2018-10-22 02:47:56', '2018-10-23 02:10:56'),
(12, 'john', 'john@gmail.com', '$2y$10$P/pN2J/uyTYNzQy2kRqWwuSv7P2f6GE/ykBwtHdda7yci3XsfOKWe', '9999-12-31', 'O0f1WJBVjT5eKYl3Js5l1ixMMtoU6kqrH7hbHDx9I1UCcD9CmiSmCBzHbQZg', '10001', NULL, 4, 2, 2, 0, 1, '2018-12-30 00:48:37', '2019-03-06 04:59:49'),
(13, 'jjj', 'test@test.com', '$2y$10$/Qx3gHWYWUhlF1aPfzXaCeZA7fRzfSEyCIOnk/dcC4ejO8PsoaalG', '9999-12-31', NULL, '1213', NULL, 1, NULL, NULL, 0, 1, '2019-01-03 00:08:31', '2019-03-03 04:02:29'),
(19, 'shakalaka', 'shakalaka@gmail.com', '$2y$10$ketLWT0Ib/JXpo00eJlxoeSw.7leS8V1CUGInfbyOWT4F5.Xuo7S2', '9999-12-31', NULL, '1212', 'Digital image', 5, NULL, NULL, 1, 0, '2020-11-09 00:07:16', '2020-11-09 00:07:16'),
(21, 'modon', 'modon@gmail.com', '$2y$10$7VpoeGMkP8QCvL5zLwFW..6MYJ5MRumDLDoX.TTQtClS561rpFHY.', '9999-12-31', NULL, '2222', 'modon company', 5, NULL, NULL, 1, 0, '2020-11-13 07:12:08', '2020-11-13 07:12:08'),
(22, 'dhiman', 'dhiman@gmail.com', '$2y$10$3mPygsC6wwnDtw/Sg85IpuExtUhgaHx52Lwp7Rz0.FNfuFdfKVpRq', '9999-12-31', NULL, '+8801111111101', 'lioncoders', 5, NULL, NULL, 1, 0, '2020-11-15 06:14:58', '2020-11-15 06:14:58'),
(27, 'Safi', 'safiulsahid151289@gmail.com', '$2y$10$8/WAKFEXq2AA1xgbcE//h..htYqyVKuvhAgcfP0UAlJwti1eC/6sK', '9999-12-31', NULL, '01521100281', 'Acquaint Technologies', 5, NULL, NULL, 1, 0, '2020-11-30 23:21:19', '2020-12-01 02:52:30'),
(28, 'Sahid', 'sahid@gmail.com', '$2y$10$zx7xatY7N0zgdDuNTxR7du8OeXWql86mpksOEfDMs3YEk.bo3.6qW', '9999-12-31', NULL, '01911160762', 'Acquaint Technologies', 1, NULL, NULL, 1, 0, '2020-11-30 23:29:10', '2020-11-30 23:29:10'),
(29, 'safi ul', 'safiul@gmail.com', '$2y$10$r0c5672vQK6N.F6t./jP3OWTj2s.UBiox6tFV33mJz4cXfyhDociK', '9999-12-31', NULL, '01521100281', 'Acquaint Technologies', 2, NULL, NULL, 1, 0, '2020-12-01 00:51:48', '2020-12-01 00:51:48'),
(30, 'nur', 'nur@gmail.com', '$2y$10$860RC4Bi4OzY.MrVwXNpEuMBQd7EsUrZfRKs25nPAPSk4RZ/Ec3me', '9999-12-31', NULL, '01911160762', 'Acquaint Technologies', 4, 1, 1, 1, 0, '2020-12-01 00:54:29', '2020-12-01 00:54:29'),
(31, 'Rafi Ul Sahid', 'rafi@gmail.com', '$2y$10$GcOyJlKbcbn3x5hDHwaBxeL.iYEAyyWMkjwBmNCPk0OQsW42pzKjG', '9999-12-31', NULL, '01717626265', 'Bangla Trac Ltd', 2, NULL, NULL, 1, 0, '2020-12-02 22:50:01', '2020-12-02 22:50:01'),
(32, 'Mohaimanul islam', 'mim@gmail.com', '$2y$10$8rL9RpvmXYPqp/s0lvzAVexKYtdoc49l1F3d4JvFBUcPaj6AJZpc6', '9999-12-31', NULL, '01922270873', 'khadem', 5, 1, 1, 1, 0, '2021-01-16 22:40:32', '2021-01-16 23:05:15'),
(33, 'karim', 'karim@gmail.com', '$2y$10$fUPj.ReEuy6pRaK/TteHa.VYV2N1i7hzBdE6RK.Om/m3gYAjUh7Q6', '9999-12-31', NULL, '01521100281', 'dream', 5, NULL, NULL, 0, 0, '2021-01-17 00:02:42', '2021-01-17 00:02:42'),
(34, 'Robiul', 'robi@gmail.com', '$2y$10$/pMLi6I2zGYYBrQyif/.2.QNe.or2QdzidnQk/zqD7bGH.Io1Zg96', '9999-12-31', NULL, '0155522811', 'None', 5, 1, 1, 1, 0, '2021-01-17 00:22:53', '2021-01-20 04:25:50'),
(35, 'sunny', 'sun@gmail.com', '$2y$10$mCo0R8.wbBWs9qS8h9eWY.CueD7yuUyNDKp7ZPYaxD30tW.t54FUi', '9999-12-31', NULL, '01632211392', 'None', 5, 1, 1, 1, 0, '2021-01-17 22:22:10', '2021-01-18 02:47:41'),
(58, 'hamid', 'hamid@gmail.com', '$2y$10$KuaHPRwKLQGhibrnxIaBuOBn0vYaQGAYFByNQJE.F8otCzfLUwPeG', '2021-01-25', NULL, '01911160762', 'abc', 1, NULL, NULL, 1, 0, '2021-01-24 21:44:26', '2021-01-25 00:12:00'),
(59, 'samsul', 'samsul@gmail.com', '$2y$10$msvO/tjsQdViWIFa4/fYzefAsAUNQdJAFSazC6Xoh5Sq.gNBpqMue', '2021-01-27', NULL, '324465745', 'zzz', 1, NULL, NULL, 1, 0, '2021-01-24 23:39:27', '2021-01-24 23:39:27'),
(60, 'zami', 'zami@gmail.com', '$2y$10$xIR/9LjP8aYq5B7asdoAI.phf/p9FsoR7P3Y.Y9NHEnk4vYTGSvbi', '9999-12-31', NULL, '14989734345', 'nnn', 1, NULL, NULL, 1, 0, '2021-01-24 23:44:45', '2021-01-24 23:44:45'),
(61, 'khalil', 'khalil@gmail.com', '$2y$10$9mKWCWGtrpEj1.HFMsOfxeBlWng5DepHFS.txZje30.uX5d6hFKAa', '2021-01-26', NULL, '98785745', 'ccc', 1, NULL, NULL, 1, 0, '2021-01-25 00:44:57', '2021-01-25 01:02:00'),
(62, 'Abul', 'abul111@gmail.com', '12345678', '9999-12-31', NULL, '123435576577', NULL, 5, NULL, NULL, 1, 0, '2021-01-30 23:57:22', '2021-01-30 23:57:22'),
(63, 'ansar', 'ansar@gmail.com', '$2y$10$t8AV0/E2z8LlbQ7qmDUCb.0RT2FXgdxFhi63/jKFqiLAy1BMk1LE2', '9999-12-31', NULL, '098365434', NULL, 5, NULL, NULL, 1, 0, '2021-01-31 00:09:40', '2021-02-03 01:10:52'),
(64, 'mokbul', 'mkb@gmail.com', '$2y$10$2uGCEBuSIWOgoL7QTyDwU.YK.W/QuR2TL5lgGmHQQBLTiQA3W9zgW', '9999-12-31', NULL, '09876453', NULL, 5, NULL, NULL, 1, 0, '2021-02-03 01:37:07', '2021-02-03 01:37:07'),
(65, 'rashed', 'rashed@gmail.com', '$2y$10$1BmQMEODkCeW4Z1Jtf6z/eV3y/LRAPaXP6GWeQDn4X36ko7a2MYAO', '9999-12-31', NULL, '2134522', NULL, 5, NULL, NULL, 1, 0, '2021-02-03 03:24:30', '2021-02-03 03:49:25'),
(66, 'asad', 'asad@gmail.com', '$2y$10$e52izq7wEjDkxdQoCh7M9eEjgsbx1wg05gH22RftXkUJmWRTPP6o.', '9999-12-31', NULL, '23124335', NULL, 5, NULL, NULL, 1, 0, '2021-02-03 03:50:50', '2021-02-03 03:50:50'),
(67, 'samus', 'samus@gmail.com', '$2y$10$RiDi7enubVnhIETzyiuyW.L.CNlwx4vn6kZ/b05MizH1Ktf9/kj7S', '9999-12-31', NULL, '3434', NULL, 5, NULL, NULL, 1, 0, '2021-02-03 04:07:40', '2021-02-03 05:02:56'),
(68, 'kamal', 'kamal@gmail.com', '$2y$10$fQWA8UzRgzlDR.geP9ji7eElaxlMaFu5qL/1gCUpt.znBrqr1f/E.', '9999-12-31', NULL, '01521100281', NULL, 5, NULL, NULL, 1, 0, '2021-02-04 00:53:51', '2021-02-04 00:53:51'),
(69, 'Mobina Hasan', 'samer@gmail.com', '$2y$10$I4Lzt4qig25QtAyBFvECYuJbjP6R6kkNprmEteXpeAWiy8ypwjgX2', '9999-12-31', NULL, '01686392899', NULL, 5, NULL, NULL, 1, 0, '2021-02-04 00:57:19', '2021-02-04 00:57:19'),
(70, 'selim', 'selim@gmail.com', '$2y$10$GzCAVtO0Ras3Stj8yH8ym.jYJTzHNnnVvGX155izT0ZR7f0m9h7ue', '9999-12-31', NULL, '019383763', NULL, 5, NULL, NULL, 1, 0, '2021-02-04 03:27:30', '2021-02-04 04:22:02');

-- --------------------------------------------------------

--
-- Table structure for table `variants`
--

CREATE TABLE `variants` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `variants`
--

INSERT INTO `variants` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Medium', '2019-11-21 07:03:04', '2019-11-24 08:43:52'),
(3, 'Small', '2019-11-21 07:03:04', '2019-11-24 08:43:52'),
(5, 'Large', '2019-11-24 06:07:20', '2019-11-24 08:44:56'),
(9, 'a', '2020-05-18 16:44:14', '2020-05-18 16:44:14'),
(11, 'b', '2020-05-18 16:53:49', '2020-05-18 16:53:49'),
(12, 'variant 1', '2020-09-27 06:08:27', '2020-09-27 06:08:27'),
(13, 'variant 2', '2020-09-27 06:08:27', '2020-09-27 06:08:27'),
(15, 'S', '2020-11-16 06:09:33', '2020-11-16 06:09:33'),
(16, 'M', '2020-11-16 06:09:33', '2020-11-16 06:09:33'),
(17, 'L', '2020-11-16 06:09:33', '2020-11-16 06:09:33'),
(18, 'test', '2020-12-02 00:08:30', '2020-12-02 00:08:30'),
(19, 'sample', '2020-12-02 00:08:30', '2020-12-02 00:08:30'),
(20, 'demo', '2020-12-02 00:08:30', '2020-12-02 00:08:30');

-- --------------------------------------------------------

--
-- Table structure for table `warehouses`
--

CREATE TABLE `warehouses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `warehouses`
--

INSERT INTO `warehouses` (`id`, `name`, `phone`, `email`, `address`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'warehouse 1', '2312121', 'war1@lion.com', 'khatungonj, chittagong', 1, '2018-05-12 07:51:44', '2019-03-02 15:40:17'),
(2, 'warehouse 2', '1234', NULL, 'boropul, chittagong', 1, '2018-05-12 08:09:03', '2018-06-19 22:30:38'),
(3, 'test', NULL, NULL, 'dqwdeqw', 0, '2018-05-30 00:14:23', '2018-05-30 00:14:47'),
(6, 'gudam', '2121', '', 'gazipur', 0, '2018-08-31 22:53:26', '2018-08-31 22:54:48'),
(7, 'warehouse 3', '01521100281', 'warehouse3@gmail.com', 'New warehouse', 1, '2020-12-03 02:42:13', '2020-12-03 02:42:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adjustments`
--
ALTER TABLE `adjustments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billers`
--
ALTER TABLE `billers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cash_registers`
--
ALTER TABLE `cash_registers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkouts`
--
ALTER TABLE `checkouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_groups`
--
ALTER TABLE `customer_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deliveries`
--
ALTER TABLE `deliveries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense_categories`
--
ALTER TABLE `expense_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gift_cards`
--
ALTER TABLE `gift_cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gift_card_recharges`
--
ALTER TABLE `gift_card_recharges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `holidays`
--
ALTER TABLE `holidays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hrm_settings`
--
ALTER TABLE `hrm_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `money_transfers`
--
ALTER TABLE `money_transfers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_with_cheque`
--
ALTER TABLE `payment_with_cheque`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_with_credit_card`
--
ALTER TABLE `payment_with_credit_card`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_with_gift_card`
--
ALTER TABLE `payment_with_gift_card`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_with_paypal`
--
ALTER TABLE `payment_with_paypal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payrolls`
--
ALTER TABLE `payrolls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pos_setting`
--
ALTER TABLE `pos_setting`
  ADD UNIQUE KEY `pos_setting_id_unique` (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_adjustments`
--
ALTER TABLE `product_adjustments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_purchases`
--
ALTER TABLE `product_purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_quotation`
--
ALTER TABLE `product_quotation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_returns`
--
ALTER TABLE `product_returns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_sales`
--
ALTER TABLE `product_sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_transfer`
--
ALTER TABLE `product_transfer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_warehouse`
--
ALTER TABLE `product_warehouse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_product_return`
--
ALTER TABLE `purchase_product_return`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotations`
--
ALTER TABLE `quotations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report_settings`
--
ALTER TABLE `report_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `returns`
--
ALTER TABLE `returns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `return_purchases`
--
ALTER TABLE `return_purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_counts`
--
ALTER TABLE `stock_counts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taxes`
--
ALTER TABLE `taxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transfers`
--
ALTER TABLE `transfers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `variants`
--
ALTER TABLE `variants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warehouses`
--
ALTER TABLE `warehouses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `adjustments`
--
ALTER TABLE `adjustments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `billers`
--
ALTER TABLE `billers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=378;

--
-- AUTO_INCREMENT for table `cash_registers`
--
ALTER TABLE `cash_registers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `checkouts`
--
ALTER TABLE `checkouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `customer_groups`
--
ALTER TABLE `customer_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `deliveries`
--
ALTER TABLE `deliveries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `expense_categories`
--
ALTER TABLE `expense_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gift_cards`
--
ALTER TABLE `gift_cards`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `gift_card_recharges`
--
ALTER TABLE `gift_card_recharges`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `holidays`
--
ALTER TABLE `holidays`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `hrm_settings`
--
ALTER TABLE `hrm_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `money_transfers`
--
ALTER TABLE `money_transfers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=350;

--
-- AUTO_INCREMENT for table `payment_with_cheque`
--
ALTER TABLE `payment_with_cheque`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `payment_with_credit_card`
--
ALTER TABLE `payment_with_credit_card`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payment_with_gift_card`
--
ALTER TABLE `payment_with_gift_card`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `payment_with_paypal`
--
ALTER TABLE `payment_with_paypal`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payrolls`
--
ALTER TABLE `payrolls`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `product_adjustments`
--
ALTER TABLE `product_adjustments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_purchases`
--
ALTER TABLE `product_purchases`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=290;

--
-- AUTO_INCREMENT for table `product_quotation`
--
ALTER TABLE `product_quotation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `product_returns`
--
ALTER TABLE `product_returns`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `product_sales`
--
ALTER TABLE `product_sales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=467;

--
-- AUTO_INCREMENT for table `product_transfer`
--
ALTER TABLE `product_transfer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `product_variants`
--
ALTER TABLE `product_variants`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `product_warehouse`
--
ALTER TABLE `product_warehouse`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `purchase_product_return`
--
ALTER TABLE `purchase_product_return`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `quotations`
--
ALTER TABLE `quotations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `report_settings`
--
ALTER TABLE `report_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `returns`
--
ALTER TABLE `returns`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `return_purchases`
--
ALTER TABLE `return_purchases`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=313;

--
-- AUTO_INCREMENT for table `stock_counts`
--
ALTER TABLE `stock_counts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `taxes`
--
ALTER TABLE `taxes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transfers`
--
ALTER TABLE `transfers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `variants`
--
ALTER TABLE `variants`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `warehouses`
--
ALTER TABLE `warehouses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
