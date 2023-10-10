-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 10, 2023 at 07:10 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rock3`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verification_token` varchar(255) DEFAULT NULL,
  `is_email_verified` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0:not verified,1:verified',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `remember_me` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0:not remembered, 1:remembered',
  `user_locked` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0:not locked, 1:locked',
  `user_locked_at` timestamp NULL DEFAULT NULL,
  `wrong_attempt` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `first_name`, `last_name`, `email`, `email_verification_token`, `is_email_verified`, `email_verified_at`, `password`, `phone_number`, `ip_address`, `remember_me`, `user_locked`, `user_locked_at`, `wrong_attempt`, `created_at`, `updated_at`, `deleted_at`, `role_id`) VALUES
(1, 'Admin', NULL, 'adminn@yopmail.com', NULL, '1', '2021-12-27 05:22:22', '$2y$10$Bmhd4cdXRWWiOgw9FEUuounJ5lH49pDE22Au2tso4xc0A4u.FjdOq', NULL, NULL, '0', '0', NULL, 0, NULL, '2023-09-12 11:23:25', NULL, 1),
(2, 'managers', 'manager', 'manager@bookys.com', NULL, '0', NULL, '$2y$10$CBwsduDgVmWiTDPBwgr8ZupO1rcQx5vYwY1GOX77sjgIl2ezHBC6m', NULL, NULL, '0', '0', NULL, 0, '2022-01-07 07:15:30', '2023-09-07 10:51:23', '2023-09-07 10:51:23', 4),
(3, 'ss', 'dd', 'dd@yopmail.com', NULL, '0', NULL, '$2y$10$s6NqoY3SJhpJ81QAZBPT7O3dvZZEwNGoEaB2IE18tsRG59hcMZR7e', NULL, NULL, '0', '0', NULL, 0, '2023-09-06 13:35:53', '2023-09-07 11:09:21', '2023-09-07 11:09:21', 5),
(4, 'rer', 'ete', 'gttt@yopmail.com', NULL, '0', NULL, '$2y$10$piABXqZvKFhTzoDD4lls8.b6WOFh4H.zZIToB5ZsmFikh3HEHv8nu', NULL, NULL, '0', '0', NULL, 0, '2023-09-07 11:09:15', '2023-09-07 11:09:15', NULL, 5),
(5, 'ttrr', 'trtr', 'trtt@yopmail.com', NULL, '0', NULL, '$2y$10$1GjVrcOOMX854VjNQSDT4.Fzz1lI/q/jFrCF7wRQle4W5vUgQ1Q/W', NULL, NULL, '0', '0', NULL, 0, '2023-09-07 12:06:28', '2023-09-07 12:06:28', NULL, 5);

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` int(10) UNSIGNED NOT NULL,
  `attribute_name` varchar(255) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `meta_keyword` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`id`, `attribute_name`, `status`, `meta_keyword`, `meta_description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'PCS', 'Active', 'PCS PCS PCS', 'Sales with pieces of eggs in marketing.', NULL, '2023-10-10 10:27:52', '2023-10-10 10:27:52'),
(2, 'Tray', 'Active', 'Tray Tray', 'Tray Tray Tray Tray Tray Tray Tray Tray Tray Tray Tray Tray Tray Tray Tray Tray Tray Tray Tray Tray Tray Tray Tray Tray Tray Tray Tray Tray', NULL, '2023-10-10 10:28:20', '2023-10-10 10:28:20'),
(3, 'Half Tray', 'Active', 'Half Tray', 'Half Tray Half Tray Half Tray Half Tray Half Tray Half Tray Half Tray Half Tray Half Tray Half Tray Half Tray Half Tray Half Tray Half Tray Half Tray', NULL, '2023-10-10 10:28:40', '2023-10-10 10:28:40'),
(4, 'Dozen Tray', 'Active', 'Dozen Tray Dozen Tray', 'Dozen Tray Dozen Tray Dozen Tray Dozen Tray Dozen Tray Dozen Tray Dozen Tray Dozen Tray Dozen Tray Dozen Tray Dozen Tray Dozen Tray Dozen Tray', NULL, '2023-10-10 10:29:09', '2023-10-10 10:29:09');

-- --------------------------------------------------------

--
-- Table structure for table `billing_shipping_addresses`
--

CREATE TABLE `billing_shipping_addresses` (
  `id` int(10) UNSIGNED NOT NULL,
  `payment_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `billing_first_name` varchar(255) NOT NULL,
  `billing_last_name` varchar(255) NOT NULL,
  `billing_email` varchar(255) NOT NULL,
  `billing_phone_number` varchar(255) NOT NULL,
  `billing_address` text NOT NULL,
  `billing_city` varchar(255) NOT NULL,
  `billing_state` varchar(255) NOT NULL,
  `billing_zip_code` varchar(255) NOT NULL,
  `shipping_first_name` varchar(255) NOT NULL,
  `shipping_last_name` varchar(255) NOT NULL,
  `shipping_email` varchar(255) NOT NULL,
  `shipping_phone_number` varchar(255) NOT NULL,
  `shipping_address` text NOT NULL,
  `shipping_city` varchar(255) NOT NULL,
  `shipping_state` varchar(255) NOT NULL,
  `shipping_zip_code` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `billing_shipping_addresses`
--

INSERT INTO `billing_shipping_addresses` (`id`, `payment_id`, `order_id`, `billing_first_name`, `billing_last_name`, `billing_email`, `billing_phone_number`, `billing_address`, `billing_city`, `billing_state`, `billing_zip_code`, `shipping_first_name`, `shipping_last_name`, `shipping_email`, `shipping_phone_number`, `shipping_address`, `shipping_city`, `shipping_state`, `shipping_zip_code`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Host', 'Testing', 'aman@yopmail.com', '6467023890', 'California Road', 'Stockholm', 'Maine', '04783', 'Host', 'Testing', 'aman@yopmail.com', '6467023890', 'California Road', 'Stockholm', 'Maine', '04783', NULL, '2023-10-10 11:28:40', '2023-10-10 11:28:40');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_image` varchar(255) DEFAULT NULL,
  `meta_keyword` varchar(255) NOT NULL,
  `meta_description` text NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_image`, `meta_keyword`, `meta_description`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Eggitarians', '1010202315405465257086e3d70.jpeg', 'Eggitarians Eggitarians Eggitarians Eggitarians', 'This one is for all the ‘Eggitarians’ out there, who can relish eggs in all the meals. If researchers are to be believed, eggs are among the most nutrient-rich foods in the world and are most versatile in terms of preparation too. From snacks to desserts, they can be twisted in very course to create flavourful delicacies. From proteins to fats to vitamins, eggs have them all. According to food experts, there are two types of edible eggs that include bird eggs and fish eggs. Have a look at these 6 varieties that you can eat.', 'Active', NULL, '2023-10-10 10:10:54', '2023-10-10 10:10:54'),
(2, 'Chicken Eggs', '10102023154159652570c7f133c.jpeg', 'Chicken Eggs Chicken Eggs Chicken Eggs', 'Chicken egg is the most common type of eggs that is avaioable in two colours- brown and white. They both are rich in proteins, calcium, and zinc and are mild in taste. In India, both the variations are widly used for making omelette, scrammbled eggs, egg curry and salad.', 'Active', NULL, '2023-10-10 10:11:59', '2023-10-10 10:11:59'),
(3, 'Duck Eggs', '10102023154234652570ea964a9.jpeg', 'Duck Eggs Duck Eggs Duck Eggs', 'They are rich in fats and protein and have slightly larger yolk than the chicken eggs. It is suggested to consume them in breakfast, as they are filled with vitamin B complex compounds, that keeps your energized throughout the day.', 'Active', NULL, '2023-10-10 10:12:34', '2023-10-10 10:12:34'),
(4, 'Turkey Eggs', '101020231543176525711532e58.jpeg', 'Turkey Eggs Turkey Eggs Turkey Eggs Turkey Eggs', 'hey are very similar to duck eggs in size, but have a creamier taste due to thick yolk and egg-white. They are rich in calcium and are good for growing kids.', 'Active', NULL, '2023-10-10 10:13:17', '2023-10-10 10:13:17'),
(5, 'Goose Eggs', '101020231543516525713766d62.jpeg', 'Goose Eggs Goose Eggs Goose Eggs', 'They are double the size of chicken eggs and have enriched taste and have a greater content of proteins. It has been proven that a goose egg has 19.97 g. of protein and a chicken egg has 6.23 grams.', 'Active', NULL, '2023-10-10 10:13:51', '2023-10-10 10:13:51'),
(6, 'Caviar', '1010202315444165257169ec0af.png', 'Caviar Caviar Caviar', 'They are counted among the most exquisite eggs. Belonging to the family of fish eggs, they are from the fish Roe that is salt- cured. They are rich in anti-oxidants and are a treasure of sea minerals.', 'Active', NULL, '2023-10-10 10:14:41', '2023-10-10 10:14:41');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(10) UNSIGNED NOT NULL,
  `coupon_name` varchar(255) NOT NULL,
  `coupon_type` enum('Flat','Percentage') NOT NULL,
  `coupon_amount_and_percentage` double NOT NULL DEFAULT 0,
  `meta_keyword` varchar(255) DEFAULT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `coupon_code` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_name`, `coupon_type`, `coupon_amount_and_percentage`, `meta_keyword`, `from_date`, `to_date`, `meta_description`, `status`, `coupon_code`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Super Discount', 'Flat', 60, 'Super Discount Super Discount', '2023-10-10', '2023-11-10', 'Super Discount Super Discount Super Discount Super Discount Super Discount Super Discount Super Discount Super Discount Super Discount Super Discount Super Discount Super Discount Super Discount Super Discount', 'Active', 'AqFGzlr6', NULL, '2023-10-10 10:30:29', '2023-10-10 10:30:29'),
(2, 'Monthly Discount', 'Flat', 50, 'Monthly Discount', '2023-10-10', '2023-11-10', 'Loream Ipsum Loream Ipsum Loream Ipsum Loream Ipsum Loream Ipsum Loream Ipsum Loream Ipsum Loream Ipsum Loream Ipsum Loream Ipsum Loream Ipsum Loream Ipsum Loream Ipsum Loream Ipsum Loream Ipsum Loream Ipsum Loream Ipsum Loream Ipsum', 'Active', 'y0oh8Zbo', NULL, '2023-10-10 10:31:12', '2023-10-10 10:31:12'),
(3, 'Daily Discount', 'Percentage', 5, 'Daily Discount Daily Discount Daily Discount Daily', '2023-10-10', '2023-11-10', 'Daily Discount Daily Discount Daily Discount Daily Discount Daily Discount Daily Discount Daily Discount Daily Discount Daily Discount Daily Discount Daily Discount Daily Discount Daily Discount Daily Discount Daily Discount Daily Discount Daily Discount', 'Active', 'wUVLk2kP', NULL, '2023-10-10 10:31:47', '2023-10-10 10:31:47'),
(4, 'Always Discount', 'Percentage', 20, 'Always Discount Always Discount Always Discount Al', '2023-10-10', '2023-11-10', 'Always Discount Always Discount Always Discount Always Discount Always Discount Always Discount Always Discount Always Discount Always Discount Always Discount Always Discount Always Discount Always Discount', 'Active', 'rwifKeP4', NULL, '2023-10-10 10:32:19', '2023-10-10 10:32:19');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laravel_jobs`
--

CREATE TABLE `laravel_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(41, '2014_10_12_100000_create_password_resets_table', 1),
(42, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(43, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(44, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(45, '2016_06_01_000004_create_oauth_clients_table', 1),
(46, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(47, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(48, '2021_12_23_102532_create_users_table', 1),
(63, '2021_05_31_131442_create_admins_table', 3),
(79, '2021_02_01_121007_create_roles_table', 12),
(80, '2021_03_16_035258_create_permissions_table', 12),
(81, '2021_03_16_070355_create_permission_role_table', 12),
(140, '2022_05_26_095346_create_laravel_jobs_table', 25),
(141, '2022_05_26_100350_create_failed_jobs_table', 25),
(196, '2019_05_03_000001_create_customer_columns', 26),
(197, '2019_05_03_000002_create_subscriptions_table', 26),
(198, '2019_05_03_000003_create_subscription_items_table', 26),
(199, '2023_09_13_151712_create_categories_table', 27),
(216, '2023_09_13_151713_create_sub_categories_table', 28),
(217, '2023_09_17_165359_create_attributes_table', 28),
(218, '2023_09_17_165709_create_products_table', 28),
(219, '2023_09_17_165945_create_product_images_table', 28),
(220, '2023_09_24_144231_create_coupons_table', 28),
(222, '2023_10_05_181146_create_product_price_attribiutes_table', 29),
(246, '2023_10_08_061039_create_payments_table', 30),
(247, '2023_10_08_062916_create_user_addresses_table', 30),
(248, '2023_10_08_063232_create_orders_table', 30),
(249, '2023_10_08_063409_create_product_orders_table', 30),
(250, '2023_10_08_063501_create_billing_shipping_addresses', 30);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) NOT NULL,
  `secret` varchar(100) DEFAULT NULL,
  `provider` varchar(191) DEFAULT NULL,
  `redirect` text NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'kbJGDUav2OZHnoYYYooKAv43yIUt2syLusRdmQ0b', NULL, 'http://localhost', 1, 0, 0, '2021-12-24 00:58:25', '2021-12-24 00:58:25'),
(2, NULL, 'Laravel Password Grant Client', 'mrojtcKp9DBtgFZw56O5p2SQcF6s6RzLHNfcvCCz', 'users', 'http://localhost', 0, 1, 0, '2021-12-24 00:58:25', '2021-12-24 00:58:25');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-12-24 00:58:25', '2021-12-24 00:58:25');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) NOT NULL,
  `access_token_id` varchar(100) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `unique_order_id` varchar(255) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `payment_id` int(10) UNSIGNED NOT NULL,
  `coupon_code` varchar(255) DEFAULT NULL,
  `coupon_amount_and_percentage` double NOT NULL DEFAULT 0,
  `coupon_type` enum('None','Percentage','Flat') NOT NULL DEFAULT 'None',
  `discount_amount_for_coupon` double NOT NULL DEFAULT 0,
  `shipping_charger` double NOT NULL DEFAULT 0,
  `total_amount` double NOT NULL DEFAULT 0,
  `order_status` enum('Pending','Accepted','Shipped','Completed','Rejected') NOT NULL DEFAULT 'Pending',
  `payment_type` varchar(255) NOT NULL,
  `pay_amount` double NOT NULL DEFAULT 0,
  `payment_received` int(11) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `unique_order_id`, `user_id`, `payment_id`, `coupon_code`, `coupon_amount_and_percentage`, `coupon_type`, `discount_amount_for_coupon`, `shipping_charger`, `total_amount`, `order_status`, `payment_type`, `pay_amount`, `payment_received`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '52R6ZWEtVU', 1, 1, NULL, 0, 'None', 0, 0, 108, 'Pending', 'COD', 108, 0, NULL, '2023-10-10 11:28:40', '2023-10-10 11:28:40');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `coupon_code` varchar(255) DEFAULT NULL,
  `coupon_amount_and_percentage` double NOT NULL DEFAULT 0,
  `coupon_type` enum('None','Percentage','Flat') NOT NULL DEFAULT 'None',
  `discount_amount_for_coupon` double NOT NULL DEFAULT 0,
  `shipping_charger` double NOT NULL DEFAULT 0,
  `total_amount` double NOT NULL DEFAULT 0,
  `pay_amount` double NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `user_id`, `order_id`, `transaction_id`, `payment_type`, `coupon_code`, `coupon_amount_and_percentage`, `coupon_type`, `discount_amount_for_coupon`, `shipping_charger`, `total_amount`, `pay_amount`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'xxxxxxx12345', 'COD', NULL, 0, 'None', 0, 0, 108, 108, NULL, '2023-10-10 11:28:40', '2023-10-10 11:28:40');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `module_name` varchar(255) NOT NULL,
  `module_slug` varchar(255) NOT NULL,
  `description` longtext DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1 => Active , 0 => Incative',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `slug`, `module_name`, `module_slug`, `description`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'View', 'view_admin', 'Admin', 'admins', 'desc', 1, NULL, '2023-09-06 17:56:38', NULL),
(2, 'Delete', 'delete_admin', 'Admin', 'admins', 'desc', 1, NULL, '2023-09-06 17:56:38', NULL),
(3, 'View', 'view_role', 'Role', 'roles', 'desc', 1, NULL, '2023-09-07 16:55:37', NULL),
(4, 'Add', 'add_permissions', 'Permission', 'permissions', 'desc', 1, NULL, '2023-09-07 16:56:09', NULL),
(5, 'Add', 'add_admin', 'Admin', 'admins', 'desc', 1, NULL, '2023-09-06 17:56:38', NULL),
(6, 'Edit', 'edit_admin', 'Admin', 'admins', 'desc', 1, NULL, '2023-09-06 17:56:38', NULL),
(7, 'Add', 'add_role', 'Role', 'roles', 'desc', 1, NULL, '2023-09-07 16:55:37', NULL),
(8, 'Edit', 'edit_role', 'Role', 'roles', 'desc', 1, NULL, '2023-09-07 16:55:37', NULL),
(9, 'Delete', 'delete_role', 'Role', 'roles', 'desc', 1, NULL, '2023-09-07 16:55:37', NULL),
(10, 'View', 'view_category', 'Category', 'categories', 'desc', 1, NULL, '2023-09-06 17:56:38', NULL),
(11, 'Delete', 'delete_category', 'Category', 'categories', 'desc', 1, NULL, '2023-09-06 17:56:38', NULL),
(12, 'Add', 'add_category', 'Category', 'categories', 'desc', 1, NULL, '2023-09-06 17:56:38', NULL),
(13, 'Edit', 'edit_category', 'Category', 'categories', 'desc', 1, NULL, '2023-09-06 17:56:38', NULL),
(14, 'View', 'view_product', 'Product', 'products', 'desc', 1, NULL, '2023-09-06 17:56:38', NULL),
(15, 'Delete', 'delete_product', 'Product', 'products', 'desc', 1, NULL, '2023-09-06 17:56:38', NULL),
(16, 'Add', 'add_product', 'Product', 'products', 'desc', 1, NULL, '2023-09-06 17:56:38', NULL),
(17, 'Edit', 'edit_product', 'Product', 'products', 'desc', 1, NULL, '2023-09-06 17:56:38', NULL),
(18, 'View', 'view_sub_category', 'SubCategory', 'sub-categories', 'desc', 1, NULL, '2023-09-06 17:56:38', NULL),
(19, 'Delete', 'delete_sub_category', 'SubCategory', 'sub-categories', 'desc', 1, NULL, '2023-09-06 17:56:38', NULL),
(20, 'Add', 'add_sub_category', 'SubCategory', 'sub-categories', 'desc', 1, NULL, '2023-09-06 17:56:38', NULL),
(21, 'Edit', 'edit_sub_category', 'SubCategory', 'sub-categories', 'desc', 1, NULL, '2023-09-06 17:56:38', NULL),
(22, 'View', 'view_attribute', 'Attribute', 'attributes', 'desc', 1, NULL, '2023-09-06 17:56:38', NULL),
(23, 'Delete', 'delete_attribute', 'Attribute', 'attributes', 'desc', 1, NULL, '2023-09-06 17:56:38', NULL),
(24, 'Add', 'add_attribute', 'Attribute', 'attributes', 'desc', 1, NULL, '2023-09-06 17:56:38', NULL),
(25, 'Edit', 'edit_attribute', 'Attribute', 'attributes', 'desc', 1, NULL, '2023-09-06 17:56:38', NULL),
(26, 'View', 'view_coupon', 'Coupon', 'coupons', 'desc', 1, NULL, '2023-09-06 17:56:38', NULL),
(27, 'Delete', 'delete_coupon', 'Coupon', 'coupons', 'desc', 1, NULL, '2023-09-06 17:56:38', NULL),
(28, 'Add', 'add_coupon', 'Coupon', 'coupons', 'desc', 1, NULL, '2023-09-06 17:56:38', NULL),
(29, 'Edit', 'edit_coupon', 'Coupon', 'coupons', 'desc', 1, NULL, '2023-09-06 17:56:38', NULL),
(30, 'View', 'view_order', 'Order', 'orders', 'desc', 1, NULL, '2023-09-06 17:56:38', NULL),
(31, 'Accept', 'accept_order', 'Order', 'orders', 'desc', 1, NULL, '2023-09-06 17:56:38', NULL),
(32, 'Reject', 'reject_order', 'Order', 'orders', 'desc', 1, NULL, '2023-09-06 17:56:38', NULL),
(33, 'Complete', 'complete_order', 'Order', 'orders', 'desc', 1, NULL, '2023-09-06 17:56:38', NULL),
(34, 'Payment Received', 'payment_received', 'Order', 'orders', 'desc', 1, NULL, '2023-09-06 17:56:38', NULL),
(41, 'View', 'view_user', 'User', 'users', 'desc', 1, NULL, '2023-09-06 17:56:38', NULL),
(42, 'Delete', 'delete_user', 'User', 'users', 'desc', 1, NULL, '2023-09-06 17:56:38', NULL),
(44, 'View', 'view_payment', 'Payment', 'payments', 'desc', 1, NULL, '2023-09-06 17:56:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('active','incative') NOT NULL DEFAULT 'active',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`id`, `permission_id`, `role_id`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'active', NULL, '2023-09-06 17:57:21', NULL),
(2, 2, 1, 'active', NULL, '2023-09-06 19:09:23', NULL),
(3, 3, 1, 'active', NULL, '2023-09-07 16:56:29', NULL),
(4, 4, 1, 'active', NULL, '2023-09-07 16:56:43', NULL),
(5, 1, 5, 'active', NULL, '2023-09-07 17:34:09', NULL),
(6, 5, 1, 'active', NULL, '2023-09-07 17:39:59', NULL),
(7, 6, 1, 'active', NULL, '2023-09-07 17:40:09', NULL),
(8, 7, 1, 'active', NULL, '2023-09-07 18:06:47', NULL),
(9, 8, 1, 'active', NULL, '2023-09-07 17:40:09', NULL),
(10, 9, 1, 'active', NULL, '2023-09-07 18:06:47', NULL),
(11, 10, 1, 'active', NULL, '2023-09-07 17:40:09', NULL),
(12, 11, 1, 'active', NULL, '2023-09-07 18:06:47', NULL),
(13, 12, 1, 'active', NULL, '2023-09-07 17:40:09', NULL),
(14, 13, 1, 'active', NULL, '2023-09-07 18:06:47', NULL),
(15, 14, 1, 'active', NULL, '2023-09-07 17:40:09', NULL),
(16, 15, 1, 'active', NULL, '2023-09-07 18:06:47', NULL),
(17, 16, 1, 'active', NULL, '2023-09-07 17:40:09', NULL),
(18, 17, 1, 'active', NULL, '2023-09-07 18:06:47', NULL),
(19, 18, 1, 'active', NULL, '2023-09-07 17:40:09', NULL),
(20, 19, 1, 'active', NULL, '2023-09-07 18:06:47', NULL),
(21, 20, 1, 'active', NULL, '2023-09-07 17:40:09', NULL),
(22, 21, 1, 'active', NULL, '2023-09-07 18:06:47', NULL),
(23, 22, 1, 'active', NULL, '2023-09-07 17:40:09', NULL),
(24, 23, 1, 'active', NULL, '2023-09-07 18:06:47', NULL),
(25, 24, 1, 'active', NULL, '2023-09-07 17:40:09', NULL),
(26, 25, 1, 'active', NULL, '2023-09-07 18:06:47', NULL),
(27, 26, 1, 'active', NULL, '2023-09-07 18:06:47', NULL),
(28, 27, 1, 'active', NULL, '2023-09-07 17:40:09', NULL),
(29, 28, 1, 'active', NULL, '2023-09-07 18:06:47', NULL),
(30, 29, 1, 'active', NULL, '2023-09-07 17:40:09', NULL),
(31, 30, 1, 'active', NULL, '2023-09-07 17:40:09', NULL),
(32, 31, 1, 'active', NULL, '2023-09-07 18:06:47', NULL),
(33, 32, 1, 'active', NULL, '2023-09-07 17:40:09', NULL),
(34, 33, 1, 'active', NULL, '2023-09-07 18:06:47', NULL),
(35, 34, 1, 'active', NULL, '2023-09-07 17:40:09', NULL),
(36, 41, 1, 'active', NULL, '2023-09-07 18:06:47', NULL),
(37, 42, 1, 'active', NULL, '2023-09-07 17:40:09', NULL),
(38, 44, 1, 'active', NULL, '2023-09-07 16:56:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `sub_category_id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `meta_keyword` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `product_quantity` int(11) NOT NULL DEFAULT 0,
  `average_rating` double NOT NULL DEFAULT 5,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `sub_category_id`, `product_name`, `status`, `meta_keyword`, `meta_description`, `product_quantity`, `average_rating`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Eggitarians', 'Active', 'EGGITARIANS EGGITARIANS EGGITARIANS EGGITARIANS', 'This one is for all the ‘Eggitarians’ out there, who can relish eggs in all the meals. If researchers are to be believed, eggs are among the most nutrient-rich foods in the world and are most versatile in terms of preparation too. From snacks to desserts, they can be twisted in very course to create flavourful delicacies. From proteins to fats to vitamins, eggs have them all. According to food experts, there are two types of edible eggs that include bird eggs and fish eggs. Have a look at these 6 varieties that you can eat.', 40, 5, NULL, '2023-10-10 10:34:26', '2023-10-10 10:34:26'),
(2, 1, 2, 'Eggitarians NORMAL', 'Active', 'Eggitarians NORMAL Eggitarians NORMAL', 'This one is for all the ‘Eggitarians’ out there, who can relish eggs in all the meals. If researchers are to be believed, eggs are among the most nutrient-rich foods in the world and are most versatile in terms of preparation too. From snacks to desserts, they can be twisted in very course to create flavourful delicacies. From proteins to fats to vitamins, eggs have them all. According to food experts, there are two types of edible eggs that include bird eggs and fish eggs. Have a look at these 6 varieties that you can eat.', 50, 5, NULL, '2023-10-10 10:36:29', '2023-10-10 10:36:29'),
(3, 1, 3, 'Eggitarians BETTER', 'Active', 'Eggitarians Eggitarians Eggitarians Eggitarians', 'This one is for all the ‘Eggitarians’ out there, who can relish eggs in all the meals. If researchers are to be believed, eggs are among the most nutrient-rich foods in the world and are most versatile in terms of preparation too. From snacks to desserts, they can be twisted in very course to create flavourful delicacies. From proteins to fats to vitamins, eggs have them all. According to food experts, there are two types of edible eggs that include bird eggs and fish eggs. Have a look at these 6 varieties that you can eat.', 50, 5, NULL, '2023-10-10 10:38:03', '2023-10-10 10:38:03'),
(4, 2, 5, 'Chiken Eggs BETTER', 'Active', 'Chiken Eggs', 'Chicken egg is the most common type of eggs that is avaioable in two colours- brown and white. They both are rich in proteins, calcium, and zinc and are mild in taste. In India, both the variations are widly used for making omelette, scrammbled eggs, egg curry and salad.', 67, 5, NULL, '2023-10-10 10:39:48', '2023-10-10 10:41:54'),
(5, 2, 4, 'Chicken Eggs', 'Active', 'Chicken Eggs Chicken Eggs', 'Chicken egg is the most common type of eggs that is avaioable in two colours- brown and white. They both are rich in proteins, calcium, and zinc and are mild in taste. In India, both the variations are widly used for making omelette, scrammbled eggs, egg curry and salad.', 20, 5, NULL, '2023-10-10 10:41:29', '2023-10-10 10:41:29'),
(6, 2, 6, 'Chicken Egg Normal', 'Active', 'Chicken Egg Normal', 'Chicken egg is the most common type of eggs that is avaioable in two colours- brown and white. They both are rich in proteins, calcium, and zinc and are mild in taste. In India, both the variations are widly used for making omelette, scrammbled eggs, egg curry and salad.', 43, 5, NULL, '2023-10-10 10:43:07', '2023-10-10 10:43:07'),
(7, 3, 7, 'Duck EGG', 'Active', 'Duck EGG Duck EGG Duck EGG Duck EGG Duck EGG', 'They are rich in fats and protein and have slightly larger yolk than the chicken eggs. It is suggested to consume them in breakfast, as they are filled with vitamin B complex compounds, that keeps your energized throughout the day.', 30, 5, NULL, '2023-10-10 10:44:29', '2023-10-10 10:44:29'),
(8, 3, 8, 'Duck EGG NORMAL', 'Active', 'Duck EGG Duck EGG Duck EGG Duck EGG Duck EGG', 'They are rich in fats and protein and have slightly larger yolk than the chicken eggs. It is suggested to consume them in breakfast, as they are filled with vitamin B complex compounds, that keeps your energized throughout the day.', 43, 5, NULL, '2023-10-10 10:45:32', '2023-10-10 10:45:32'),
(9, 3, 9, 'Duck Egg Better', 'Active', 'Duck Egg Better', 'Duck Egg Better Duck Egg Better Duck Egg Better Duck Egg Better', 32, 5, NULL, '2023-10-10 10:46:30', '2023-10-10 10:46:30'),
(10, 4, 10, 'Turkey EGG', 'Active', 'They are very similar to duck eggs in size, but ha', 'They are very similar to duck eggs in size, but have a creamier taste due to thick yolk and egg-white. They are rich in calcium and are good for growing kids.', 30, 5, NULL, '2023-10-10 10:47:46', '2023-10-10 10:47:46');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `is_featured_image` int(11) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `product_image`, `is_featured_image`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, '101020231604266525760a84664.jpeg', 1, NULL, '2023-10-10 10:34:26', '2023-10-10 10:35:11'),
(2, 1, '101020231605116525763700b3d.jpeg', 0, NULL, '2023-10-10 10:35:11', '2023-10-10 10:35:11'),
(3, 1, '101020231605116525763700bf2.jpeg', 0, NULL, '2023-10-10 10:35:11', '2023-10-10 10:35:11'),
(4, 1, '101020231605116525763700c45.jpeg', 0, NULL, '2023-10-10 10:35:11', '2023-10-10 10:35:11'),
(5, 1, '101020231605116525763700c87.jpeg', 0, NULL, '2023-10-10 10:35:11', '2023-10-10 10:35:11'),
(6, 2, '10102023160629652576859c01e.jpeg', 1, NULL, '2023-10-10 10:36:29', '2023-10-10 10:36:29'),
(7, 2, '10102023160629652576859c0c9.jpeg', 0, NULL, '2023-10-10 10:36:29', '2023-10-10 10:36:29'),
(8, 2, '10102023160629652576859c120.jpeg', 0, NULL, '2023-10-10 10:36:29', '2023-10-10 10:36:29'),
(9, 2, '10102023160629652576859c16e.jpeg', 0, NULL, '2023-10-10 10:36:29', '2023-10-10 10:36:29'),
(10, 3, '10102023160803652576e33b9b3.jpeg', 1, NULL, '2023-10-10 10:38:03', '2023-10-10 10:38:03'),
(11, 3, '10102023160803652576e33ba9a.jpeg', 0, NULL, '2023-10-10 10:38:03', '2023-10-10 10:38:03'),
(12, 3, '10102023160803652576e33bafc.jpeg', 0, NULL, '2023-10-10 10:38:03', '2023-10-10 10:38:03'),
(13, 3, '10102023160803652576e33bb45.jpeg', 0, NULL, '2023-10-10 10:38:03', '2023-10-10 10:38:03'),
(14, 4, '101020231609486525774cf3f1e.jpeg', 1, NULL, '2023-10-10 10:39:48', '2023-10-10 10:41:54'),
(15, 4, '101020231609486525774cf3fc0.jpeg', 0, NULL, '2023-10-10 10:39:49', '2023-10-10 10:41:54'),
(16, 4, '101020231609486525774cf400e.jpeg', 0, NULL, '2023-10-10 10:39:49', '2023-10-10 10:41:54'),
(17, 4, '101020231609486525774cf4058.jpeg', 0, NULL, '2023-10-10 10:39:49', '2023-10-10 10:41:54'),
(18, 5, '10102023161129652577b1446c7.jpeg', 1, NULL, '2023-10-10 10:41:29', '2023-10-10 10:41:29'),
(19, 5, '10102023161129652577b14477c.jpeg', 0, NULL, '2023-10-10 10:41:29', '2023-10-10 10:41:29'),
(20, 5, '10102023161129652577b1447e0.jpeg', 0, NULL, '2023-10-10 10:41:29', '2023-10-10 10:41:29'),
(21, 5, '10102023161129652577b14481f.jpeg', 0, NULL, '2023-10-10 10:41:29', '2023-10-10 10:41:29'),
(22, 6, '1010202316130765257813a102a.jpeg', 1, NULL, '2023-10-10 10:43:07', '2023-10-10 10:43:07'),
(23, 6, '1010202316130765257813a113c.jpeg', 0, NULL, '2023-10-10 10:43:07', '2023-10-10 10:43:07'),
(24, 6, '1010202316130765257813a119e.jpeg', 0, NULL, '2023-10-10 10:43:07', '2023-10-10 10:43:07'),
(25, 6, '1010202316130765257813a11e1.jpeg', 0, NULL, '2023-10-10 10:43:07', '2023-10-10 10:43:07'),
(26, 7, '101020231614296525786505a25.jpeg', 1, NULL, '2023-10-10 10:44:29', '2023-10-10 10:44:29'),
(27, 7, '101020231614296525786505b16.jpeg', 0, NULL, '2023-10-10 10:44:29', '2023-10-10 10:44:29'),
(28, 7, '101020231614296525786505b67.jpeg', 0, NULL, '2023-10-10 10:44:29', '2023-10-10 10:44:29'),
(29, 7, '101020231614296525786505ba9.jpeg', 0, NULL, '2023-10-10 10:44:29', '2023-10-10 10:44:29'),
(30, 8, '10102023161532652578a4bf90d.jpeg', 0, NULL, '2023-10-10 10:45:32', '2023-10-10 10:45:32'),
(31, 8, '10102023161532652578a4bf9ab.jpeg', 0, NULL, '2023-10-10 10:45:32', '2023-10-10 10:45:32'),
(32, 8, '10102023161532652578a4bf9ff.jpeg', 0, NULL, '2023-10-10 10:45:32', '2023-10-10 10:45:32'),
(33, 8, '10102023161532652578a4bfa52.jpeg', 1, NULL, '2023-10-10 10:45:32', '2023-10-10 10:45:32'),
(34, 9, '10102023161630652578de788d3.jpeg', 1, NULL, '2023-10-10 10:46:30', '2023-10-10 10:46:30'),
(35, 9, '10102023161630652578de7896d.jpeg', 0, NULL, '2023-10-10 10:46:30', '2023-10-10 10:46:30'),
(36, 9, '10102023161630652578de789b6.jpeg', 0, NULL, '2023-10-10 10:46:30', '2023-10-10 10:46:30'),
(37, 9, '10102023161630652578de789fa.jpeg', 0, NULL, '2023-10-10 10:46:30', '2023-10-10 10:46:30'),
(38, 10, '101020231617466525792ab84d0.jpeg', 1, NULL, '2023-10-10 10:47:46', '2023-10-10 10:47:46'),
(39, 10, '101020231617466525792ab856c.jpeg', 0, NULL, '2023-10-10 10:47:46', '2023-10-10 10:47:46'),
(40, 10, '101020231617466525792ab85b4.jpeg', 0, NULL, '2023-10-10 10:47:46', '2023-10-10 10:47:46'),
(41, 10, '101020231617466525792ab85f5.jpeg', 0, NULL, '2023-10-10 10:47:46', '2023-10-10 10:47:46');

-- --------------------------------------------------------

--
-- Table structure for table `product_orders`
--

CREATE TABLE `product_orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `payment_id` int(10) UNSIGNED NOT NULL,
  `product_price` double NOT NULL,
  `sale_price` double NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `category_name` varchar(255) DEFAULT NULL,
  `sub_category_name` varchar(255) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_meta_description` text DEFAULT NULL,
  `product_meta_keyord` varchar(255) DEFAULT NULL,
  `calculated_amount` double NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_orders`
--

INSERT INTO `product_orders` (`id`, `order_id`, `payment_id`, `product_price`, `sale_price`, `quantity`, `category_name`, `sub_category_name`, `product_name`, `product_meta_description`, `product_meta_keyord`, `calculated_amount`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 12, 12, 9, 'Eggitarians', 'SUB EGGITARIANS', 'Eggitarians', 'This one is for all the ‘Eggitarians’ out there, who can relish eggs in all the meals. If researchers are to be believed, eggs are among the most nutrient-rich foods in the world and are most versatile in terms of preparation too. From snacks to desserts, they can be twisted in very course to create flavourful delicacies. From proteins to fats to vitamins, eggs have them all. According to food experts, there are two types of edible eggs that include bird eggs and fish eggs. Have a look at these 6 varieties that you can eat.', 'EGGITARIANS EGGITARIANS EGGITARIANS EGGITARIANS', 108, NULL, '2023-10-10 11:28:40', '2023-10-10 11:28:40');

-- --------------------------------------------------------

--
-- Table structure for table `product_price_attributes`
--

CREATE TABLE `product_price_attributes` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `attribute_id` int(10) UNSIGNED NOT NULL,
  `product_price` double NOT NULL,
  `sale_price` double NOT NULL,
  `attribute_value` double NOT NULL DEFAULT 0,
  `is_default_show` int(11) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_price_attributes`
--

INSERT INTO `product_price_attributes` (`id`, `product_id`, `attribute_id`, `product_price`, `sale_price`, `attribute_value`, `is_default_show`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 12, 12, 12, 1, '2023-10-10 10:35:11', '2023-10-10 10:34:26', '2023-10-10 10:35:11'),
(2, 1, 2, 20, 20, 20, 0, '2023-10-10 10:35:11', '2023-10-10 10:34:26', '2023-10-10 10:35:11'),
(3, 1, 3, 30, 30, 30, 0, '2023-10-10 10:35:11', '2023-10-10 10:34:26', '2023-10-10 10:35:11'),
(4, 1, 4, 70, 70, 70, 0, '2023-10-10 10:35:11', '2023-10-10 10:34:26', '2023-10-10 10:35:11'),
(5, 1, 1, 12, 12, 12, 1, NULL, '2023-10-10 10:35:11', '2023-10-10 10:35:11'),
(6, 1, 2, 20, 20, 20, 0, NULL, '2023-10-10 10:35:11', '2023-10-10 10:35:11'),
(7, 1, 3, 30, 30, 30, 0, NULL, '2023-10-10 10:35:11', '2023-10-10 10:35:11'),
(8, 1, 4, 70, 70, 70, 0, NULL, '2023-10-10 10:35:11', '2023-10-10 10:35:11'),
(9, 2, 1, 10, 10, 10, 1, NULL, '2023-10-10 10:36:29', '2023-10-10 10:36:29'),
(10, 2, 2, 20, 20, 20, 0, NULL, '2023-10-10 10:36:29', '2023-10-10 10:36:29'),
(11, 2, 3, 30, 30, 30, 0, NULL, '2023-10-10 10:36:29', '2023-10-10 10:36:29'),
(12, 2, 4, 40, 40, 40, 0, NULL, '2023-10-10 10:36:29', '2023-10-10 10:36:29'),
(13, 3, 1, 30, 30, 30, 1, NULL, '2023-10-10 10:38:03', '2023-10-10 10:38:03'),
(14, 3, 2, 40, 40, 40, 0, NULL, '2023-10-10 10:38:03', '2023-10-10 10:38:03'),
(15, 3, 3, 50, 50, 50, 0, NULL, '2023-10-10 10:38:03', '2023-10-10 10:38:03'),
(16, 3, 4, 60, 60, 20, 0, NULL, '2023-10-10 10:38:03', '2023-10-10 10:38:03'),
(17, 4, 1, 10, 10, 10, 1, '2023-10-10 10:41:54', '2023-10-10 10:39:49', '2023-10-10 10:41:54'),
(18, 4, 2, 20, 20, 20, 0, '2023-10-10 10:41:54', '2023-10-10 10:39:49', '2023-10-10 10:41:54'),
(19, 4, 3, 30, 30, 30, 0, '2023-10-10 10:41:54', '2023-10-10 10:39:49', '2023-10-10 10:41:54'),
(20, 4, 4, 40, 40, 40, 0, '2023-10-10 10:41:54', '2023-10-10 10:39:49', '2023-10-10 10:41:54'),
(21, 5, 1, 12, 12, 12, 1, NULL, '2023-10-10 10:41:29', '2023-10-10 10:41:29'),
(22, 5, 2, 13, 7, 3, 0, NULL, '2023-10-10 10:41:29', '2023-10-10 10:41:29'),
(23, 5, 3, 14, 14, 14, 0, NULL, '2023-10-10 10:41:29', '2023-10-10 10:41:29'),
(24, 5, 4, 15, 15, 15, 0, NULL, '2023-10-10 10:41:29', '2023-10-10 10:41:29'),
(25, 4, 1, 10, 10, 10, 1, NULL, '2023-10-10 10:41:54', '2023-10-10 10:41:54'),
(26, 4, 2, 20, 20, 20, 0, NULL, '2023-10-10 10:41:54', '2023-10-10 10:41:54'),
(27, 4, 3, 30, 30, 30, 0, NULL, '2023-10-10 10:41:54', '2023-10-10 10:41:54'),
(28, 4, 4, 40, 40, 40, 0, NULL, '2023-10-10 10:41:54', '2023-10-10 10:41:54'),
(29, 6, 1, 28, 33, 3, 1, NULL, '2023-10-10 10:43:07', '2023-10-10 10:43:07'),
(30, 6, 2, 34, 34, 2, 0, NULL, '2023-10-10 10:43:07', '2023-10-10 10:43:07'),
(31, 6, 3, 45, 35, 3, 0, NULL, '2023-10-10 10:43:07', '2023-10-10 10:43:07'),
(32, 6, 4, 35, 23, 2, 0, NULL, '2023-10-10 10:43:07', '2023-10-10 10:43:07'),
(33, 7, 1, 45, 45, 75, 1, NULL, '2023-10-10 10:44:29', '2023-10-10 10:44:29'),
(34, 7, 2, 45, 45, 65, 0, NULL, '2023-10-10 10:44:29', '2023-10-10 10:44:29'),
(35, 7, 3, 45, 45, 55, 0, NULL, '2023-10-10 10:44:29', '2023-10-10 10:44:29'),
(36, 7, 4, 45, 45, 45, 0, NULL, '2023-10-10 10:44:29', '2023-10-10 10:44:29'),
(37, 8, 3, 112, 23, 12, 1, NULL, '2023-10-10 10:45:32', '2023-10-10 10:45:32'),
(38, 8, 2, 222, 110, 12, 0, NULL, '2023-10-10 10:45:32', '2023-10-10 10:45:32'),
(39, 9, 2, 23, 42, 12, 1, NULL, '2023-10-10 10:46:30', '2023-10-10 10:46:30'),
(40, 9, 4, 12, 21, 23, 0, NULL, '2023-10-10 10:46:30', '2023-10-10 10:46:30'),
(41, 9, 3, 1, 2, 3, 0, NULL, '2023-10-10 10:46:30', '2023-10-10 10:46:30'),
(42, 10, 1, 12, 12, 12, 1, NULL, '2023-10-10 10:47:46', '2023-10-10 10:47:46'),
(43, 10, 2, 23, 23, 23, 0, NULL, '2023-10-10 10:47:46', '2023-10-10 10:47:46'),
(44, 10, 3, 23, 23, 23, 0, NULL, '2023-10-10 10:47:46', '2023-10-10 10:47:46'),
(45, 10, 4, 34, 34, 2, 0, NULL, '2023-10-10 10:47:46', '2023-10-10 10:47:46');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `tag` varchar(255) NOT NULL,
  `status` enum('active','incative') NOT NULL DEFAULT 'active',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `tag`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'super-admin', 'active', NULL, '2021-06-01 07:25:36', '2021-06-01 07:25:36'),
(2, 'Admin', 'admin', 'active', NULL, '2021-06-10 02:16:38', '2021-09-03 04:55:58'),
(3, 'Test', 'test', 'active', NULL, '2021-08-20 05:38:38', '2021-08-20 05:38:38'),
(4, 'Viewer', 'viewer', 'active', NULL, '2021-08-20 05:38:56', '2021-09-03 04:34:23'),
(5, 'Tester', 'tester', 'active', NULL, '2021-09-02 05:53:58', '2021-09-02 05:53:58'),
(6, 'Demo Role', 'demo_role', 'active', NULL, '2021-09-06 00:01:30', '2021-09-06 00:01:30'),
(7, 'EEEE', 'eeee', 'active', NULL, '2023-09-07 11:55:59', '2023-09-07 11:55:59');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `stripe_id` varchar(255) NOT NULL,
  `stripe_status` varchar(255) NOT NULL,
  `stripe_plan` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscription_items`
--

CREATE TABLE `subscription_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subscription_id` bigint(20) UNSIGNED NOT NULL,
  `stripe_id` varchar(255) NOT NULL,
  `stripe_plan` varchar(255) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `sub_category_name` varchar(255) NOT NULL,
  `sub_category_image` varchar(255) DEFAULT NULL,
  `meta_keyword` varchar(255) NOT NULL,
  `meta_description` text NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `sub_category_name`, `sub_category_image`, `meta_keyword`, `meta_description`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'SUB EGGITARIANS', '10102023154538652571a2143d4.jpeg', 'EGGITARIANS EGGITARIANS EGGITARIANS EGGITARIANS', 'This one is for all the ‘Eggitarians’ out there, who can relish eggs in all the meals. If researchers are to be believed, eggs are among the most nutrient-rich foods in the world and are most versatile in terms of preparation too. From snacks to desserts, they can be twisted in very course to create flavourful delicacies. From proteins to fats to vitamins, eggs have them all. According to food experts, there are two types of edible eggs that include bird eggs and fish eggs. Have a look at these 6 varieties that you can eat.', 'Active', NULL, '2023-10-10 10:15:38', '2023-10-10 10:15:38'),
(2, 1, 'Eggitarians Normal', '10102023154629652571d585585.jpeg', 'Eggitarians', 'This one is for all the ‘Eggitarians’ out there, who can relish eggs in all the meals. If researchers are to be believed, eggs are among the most nutrient-rich foods in the world and are most versatile in terms of preparation too. From snacks to desserts, they can be twisted in very course to create flavourful delicacies. From proteins to fats to vitamins, eggs have them all. According to food experts, there are two types of edible eggs that include bird eggs and fish eggs. Have a look at these 6 varieties that you can eat.', 'Active', NULL, '2023-10-10 10:16:29', '2023-10-10 10:16:29'),
(3, 1, 'Eggitarians Better', '10102023154711652571ff77bf9.jpeg', 'EGGITARIANS EGGITARIANS EGGITARIANS EGGITARIANS', 'This one is for all the ‘Eggitarians’ out there, who can relish eggs in all the meals. If researchers are to be believed, eggs are among the most nutrient-rich foods in the world and are most versatile in terms of preparation too. From snacks to desserts, they can be twisted in very course to create flavourful delicacies. From proteins to fats to vitamins, eggs have them all. According to food experts, there are two types of edible eggs that include bird eggs and fish eggs. Have a look at these 6 varieties that you can eat.', 'Active', NULL, '2023-10-10 10:17:11', '2023-10-10 10:17:11'),
(4, 2, 'Chicken Eggs', '101020231547566525722cc0212.jpeg', 'Chicken Eggs Chicken Eggs Chicken Eggs Chicken Egg', 'Chicken egg is the most common type of eggs that is avaioable in two colours- brown and white. They both are rich in proteins, calcium, and zinc and are mild in taste. In India, both the variations are widly used for making omelette, scrammbled eggs, egg curry and salad.', 'Active', NULL, '2023-10-10 10:17:56', '2023-10-10 10:17:56'),
(5, 2, 'CHICKEN EGG Better', '1010202315485665257268813c0.jpeg', 'Chicken egg is the most common.', 'Chicken egg is the most common type of eggs that is avaioable in two colours- brown and white. They both are rich in proteins, calcium, and zinc and are mild in taste. In India, both the variations are widly used for making omelette, scrammbled eggs, egg curry and salad.', 'Active', NULL, '2023-10-10 10:18:56', '2023-10-10 10:18:56'),
(6, 2, 'CHICKEN EGG NORMAL', '1010202315493665257290595cd.jpeg', 'Chicken egg is the most common type.', 'Chicken egg is the most common type of eggs that is avaioable in two colours- brown and white. They both are rich in proteins, calcium, and zinc and are mild in taste. In India, both the variations are widly used for making omelette, scrammbled eggs, egg curry and salad.', 'Active', NULL, '2023-10-10 10:19:36', '2023-10-10 10:19:36'),
(7, 3, 'Duck EGG', '10102023155018652572ba6629a.jpeg', 'Duck EGG Duck EGG Duck EGG Duck EGG Duck EGG', 'They are rich in fats and protein and have slightly larger yolk than the chicken eggs. It is suggested to consume them in breakfast, as they are filled with vitamin B complex compounds, that keeps your energized throughout the day.', 'Active', NULL, '2023-10-10 10:20:18', '2023-10-10 10:20:18'),
(8, 3, 'Duck Egg Normal', '10102023155040652572d0974f3.jpeg', 'Duck EGG Duck EGG Duck EGG Duck EGG Duck EGG', 'They are rich in fats and protein and have slightly larger yolk than the chicken eggs. It is suggested to consume them in breakfast, as they are filled with vitamin B complex compounds, that keeps your energized throughout the day.', 'Active', NULL, '2023-10-10 10:20:40', '2023-10-10 10:20:40'),
(9, 3, 'DUCK EGG BETTER', '10102023155120652572f84d4a8.jpeg', 'Duck EGG Duck EGG Duck EGG Duck EGG Duck EGG', 'They are rich in fats and protein and have slightly larger yolk than the chicken eggs. It is suggested to consume them in breakfast, as they are filled with vitamin B complex compounds, that keeps your energized throughout the day.', 'Active', NULL, '2023-10-10 10:21:20', '2023-10-10 10:21:20'),
(10, 4, 'Turkey EGG', '101020231551586525731eb1d62.jpeg', 'Turkey EGG Turkey EGG Turkey EGG Turkey EGG Turkey', 'They are very similar to duck eggs in size, but have a creamier taste due to thick yolk and egg-white. They are rich in calcium and are good for growing kids.', 'Active', NULL, '2023-10-10 10:21:58', '2023-10-10 10:21:58'),
(11, 4, 'Turkey EGG Normal', '101020231552346525734225c8f.jpeg', 'Turkey EGG Turkey EGG Turkey EGG Turkey EGG Turkey', 'They are very similar to duck eggs in size, but have a creamier taste due to thick yolk and egg-white. They are rich in calcium and are good for growing kids.', 'Active', NULL, '2023-10-10 10:22:34', '2023-10-10 10:22:34'),
(12, 4, 'Turkey EGG Better', '10102023155256652573583541f.jpeg', 'Turkey EGG Turkey EGG Turkey EGG Turkey EGG Turkey', 'They are very similar to duck eggs in size, but have a creamier taste due to thick yolk and egg-white. They are rich in calcium and are good for growing kids.', 'Active', NULL, '2023-10-10 10:22:56', '2023-10-10 10:22:56'),
(13, 5, 'Goose Egg', '1010202315534365257387398d1.png', 'Gooes Egg Gooes Egg Gooes Egg Gooes Egg Gooes Egg', 'They are double the size of chicken eggs and have enriched taste and have a greater content of proteins. It has been proven that a goose egg has 19.97 g. of protein and a chicken egg has 6.23 grams.', 'Active', NULL, '2023-10-10 10:23:43', '2023-10-10 10:23:43'),
(14, 5, 'Goose Egg Normal', '10102023155414652573a635cd7.png', 'Gooes Egg Gooes Egg Gooes Egg Gooes Egg Gooes Egg', 'They are double the size of chicken eggs and have enriched taste and have a greater content of proteins. It has been proven that a goose egg has 19.97 g. of protein and a chicken egg has 6.23 grams.', 'Active', NULL, '2023-10-10 10:24:14', '2023-10-10 10:24:14'),
(15, 5, 'Goose Egg Better', '10102023155434652573ba67fb8.png', 'Gooes Egg Gooes Egg Gooes Egg Gooes Egg Gooes Egg', 'They are double the size of chicken eggs and have enriched taste and have a greater content of proteins. It has been proven that a goose egg has 19.97 g. of protein and a chicken egg has 6.23 grams.', 'Active', NULL, '2023-10-10 10:24:34', '2023-10-10 10:24:34'),
(16, 6, 'Claviar', '10102023155521652573e9da29c.jpeg', 'Claviar Claviar Claviar Claviar Claviar Claviar', 'They are counted among the most exquisite eggs. Belonging to the family of fish eggs, they are from the fish Roe that is salt- cured. They are rich in anti-oxidants and are a treasure of sea minerals.', 'Active', NULL, '2023-10-10 10:25:21', '2023-10-10 10:25:21'),
(17, 6, 'Claviar Normal', '1010202315555365257409853c8.jpeg', 'Claviar Claviar Claviar Claviar Claviar Claviar', 'They are counted among the most exquisite eggs. Belonging to the family of fish eggs, they are from the fish Roe that is salt- cured. They are rich in anti-oxidants and are a treasure of sea minerals.', 'Active', NULL, '2023-10-10 10:25:53', '2023-10-10 10:25:53'),
(18, 6, 'Claviar Better', '101020231556136525741d8215e.jpeg', 'Claviar Claviar Claviar Claviar Claviar Claviar', 'They are counted among the most exquisite eggs. Belonging to the family of fish eggs, they are from the fish Roe that is salt- cured. They are rich in anti-oxidants and are a treasure of sea minerals.', 'Active', NULL, '2023-10-10 10:26:13', '2023-10-10 10:26:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_type` enum('Employee','Staff') NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `otp_sent_on_email` text DEFAULT NULL,
  `email_sent_at` datetime DEFAULT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `is_email_verified` int(11) NOT NULL DEFAULT 0,
  `reset_password_token` text DEFAULT NULL,
  `reset_password_mail_sent_at` datetime DEFAULT NULL,
  `ip_address` varchar(191) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `login_with` enum('Normal','Facebook','Google','Apple') DEFAULT NULL,
  `user_locked` varchar(191) DEFAULT NULL,
  `user_locked_at` datetime DEFAULT NULL,
  `wrong_attampt` int(11) NOT NULL DEFAULT 0,
  `last_login_at` datetime DEFAULT NULL,
  `job_alert` varchar(191) DEFAULT NULL,
  `is_online` int(11) NOT NULL DEFAULT 0,
  `location` varchar(191) DEFAULT NULL,
  `latitude` varchar(191) DEFAULT NULL,
  `longitude` varchar(191) DEFAULT NULL,
  `is_block` int(11) NOT NULL DEFAULT 0,
  `language_selected` enum('English','German','French','Spain') NOT NULL DEFAULT 'English',
  `self_reference_code` varchar(191) DEFAULT NULL,
  `use_reference_code` varchar(191) DEFAULT NULL,
  `status_reference_code_used` int(11) NOT NULL DEFAULT 0,
  `refresh_token` longtext DEFAULT NULL,
  `device_type` enum('Android','Ios') DEFAULT NULL,
  `device_token` longtext DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `last_update_date_time_online` timestamp NULL DEFAULT NULL,
  `otp_verification_is_restricted` int(11) DEFAULT NULL,
  `stripe_id` varchar(255) DEFAULT NULL,
  `card_brand` varchar(255) DEFAULT NULL,
  `card_last_four` varchar(4) DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_type`, `full_name`, `email`, `password`, `otp_sent_on_email`, `email_sent_at`, `email_verified_at`, `is_email_verified`, `reset_password_token`, `reset_password_mail_sent_at`, `ip_address`, `remember_token`, `login_with`, `user_locked`, `user_locked_at`, `wrong_attampt`, `last_login_at`, `job_alert`, `is_online`, `location`, `latitude`, `longitude`, `is_block`, `language_selected`, `self_reference_code`, `use_reference_code`, `status_reference_code_used`, `refresh_token`, `device_type`, `device_token`, `deleted_at`, `created_at`, `updated_at`, `last_update_date_time_online`, `otp_verification_is_restricted`, `stripe_id`, `card_brand`, `card_last_four`, `trial_ends_at`) VALUES
(1, 'Employee', 'Aman', 'aman@yopmail.com', '$2y$10$Q19FQTpa28/kEonZ2M1XhOPecqAT18uRHTB3ngJ9SN.x0Y9biaKiW', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, 0, 'English', NULL, NULL, 0, NULL, NULL, NULL, NULL, '2023-10-10 11:27:58', '2023-10-10 11:27:58', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_addresses`
--

CREATE TABLE `user_addresses` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip_code` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_addresses`
--

INSERT INTO `user_addresses` (`id`, `user_id`, `first_name`, `last_name`, `email`, `phone_number`, `address`, `city`, `state`, `zip_code`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Host', 'Testing', 'aman@yopmail.com', '6467023890', 'California Road', 'Stockholm', 'Maine', '04783', NULL, '2023-10-10 11:28:40', '2023-10-10 11:28:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billing_shipping_addresses`
--
ALTER TABLE `billing_shipping_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `billing_shipping_addresses_payment_id_foreign` (`payment_id`),
  ADD KEY `billing_shipping_addresses_order_id_foreign` (`order_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `laravel_jobs`
--
ALTER TABLE `laravel_jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `laravel_jobs_queue_index` (`queue`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_payment_id_foreign` (`payment_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_user_id_foreign` (`user_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_role_permission_id_foreign` (`permission_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_sub_category_id_foreign` (`sub_category_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_orders`
--
ALTER TABLE `product_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_orders_order_id_foreign` (`order_id`),
  ADD KEY `product_orders_payment_id_foreign` (`payment_id`);

--
-- Indexes for table `product_price_attributes`
--
ALTER TABLE `product_price_attributes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_price_attributes_product_id_foreign` (`product_id`),
  ADD KEY `product_price_attributes_attribute_id_foreign` (`attribute_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscriptions_user_id_stripe_status_index` (`user_id`,`stripe_status`);

--
-- Indexes for table `subscription_items`
--
ALTER TABLE `subscription_items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscription_items_subscription_id_stripe_plan_unique` (`subscription_id`,`stripe_plan`),
  ADD KEY `subscription_items_stripe_id_index` (`stripe_id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_stripe_id_index` (`stripe_id`);

--
-- Indexes for table `user_addresses`
--
ALTER TABLE `user_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_addresses_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `billing_shipping_addresses`
--
ALTER TABLE `billing_shipping_addresses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laravel_jobs`
--
ALTER TABLE `laravel_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `product_orders`
--
ALTER TABLE `product_orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_price_attributes`
--
ALTER TABLE `product_price_attributes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscription_items`
--
ALTER TABLE `subscription_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_addresses`
--
ALTER TABLE `user_addresses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `billing_shipping_addresses`
--
ALTER TABLE `billing_shipping_addresses`
  ADD CONSTRAINT `billing_shipping_addresses_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `billing_shipping_addresses_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`),
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_sub_category_id_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_orders`
--
ALTER TABLE `product_orders`
  ADD CONSTRAINT `product_orders_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_orders_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_price_attributes`
--
ALTER TABLE `product_price_attributes`
  ADD CONSTRAINT `product_price_attributes_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_price_attributes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_addresses`
--
ALTER TABLE `user_addresses`
  ADD CONSTRAINT `user_addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
