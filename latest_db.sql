-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 09, 2023 at 07:30 PM
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
(1, 'asdasd', 'Active', 'sfasfasa', 'DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI', NULL, '2023-10-05 13:03:21', '2023-10-05 13:03:21');

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
(1, 1, 1, 'Host', 'Testing', 'ee@yopmail.com', '6467023890', 'California Road', 'Stockholm', 'Maine', '04783', 'Host', 'Testing', 'hosttesting@yopmail.com', '6467023890', 'California Road', 'Stockholm', 'Maine', '04783', NULL, '2023-10-08 03:39:48', '2023-10-08 03:39:48');

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
(1, 'Chicken', '10032023173456651c50c0e2969.jpg', 'Fried Chicken, Butter Chicken, Malai Chicken', 'Very tasty and delicious food with gravy include. It\'s good food for sale in market for current year.', 'Active', NULL, '2023-10-03 12:04:56', '2023-10-03 12:04:56'),
(2, 'Egg', '10032023173740651c51642f4e5.png', 'Desi Egg, Normal Egg, Premium Egg', 'Desi Egg is good for old person and our team make a special Omlet with desi Egg.', 'Active', NULL, '2023-10-03 12:07:40', '2023-10-03 12:07:40'),
(3, 'Fish', '10032023174006651c51f65c6ca.jpeg', 'Sanghara Fish, Mali Fish', 'We have so many items for fish like as Fried fish, Mali Fish, Rosted Fish etc.', 'Active', NULL, '2023-10-03 12:10:06', '2023-10-03 12:10:06');

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
(1, 'gs', 'Flat', 21, 'Loream Ipsum Loream Ipsum Loream Ipsum Loream Ipsu', '2023-10-07', '2023-10-30', 'Loream Ipsum Loream Ipsum Loream Ipsum Loream IpsuLoream Ipsum Loream Ipsum Loream Ipsum Loream IpsuLoream Ipsum Loream Ipsum Loream Ipsum Loream Ipsu', 'Active', 'tWEQi05R', NULL, '2023-10-07 07:08:27', '2023-10-07 07:08:27');

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

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('3c27c1786063b1efcbe988d9de151e1710886699f06540e4d074d12f6eb28ba98db63c8badf3ba56', 2, 1, 'bookys', '[]', 1, '2022-03-08 05:02:52', '2022-03-08 05:02:52', '2023-03-08 10:32:52'),
('6aa4d277d785bf7232f5e2002e9305054e442cb233d8590a572f0021fbcc613b38dfacd6f0a13e57', 2, 1, 'bookys', '[]', 1, '2022-03-08 07:35:25', '2022-03-08 07:35:25', '2023-03-08 13:05:25'),
('7a9a544d868f3075bbaa7576215838bd7f442f4b4f44600a227d965d04b0f6a46d71b8cff893724b', 1, 1, 'bookys', '[]', 1, '2022-03-08 04:56:35', '2022-03-08 04:56:35', '2023-03-08 10:26:35'),
('8384ff947ec9e6093ebbc528b39f0e37bd2c076b0c3d9e34bdce6d47b3fa44691dbead6c9a305328', 1, 1, 'bookys', '[]', 0, '2022-03-08 04:56:47', '2022-03-08 04:56:47', '2023-03-08 10:26:47'),
('ccaea675ba3848abbc4ae425057385eace1a8b68e9421505328a1b591d12162bdbc64ddec7bb3a6b', 2, 1, 'bookys', '[]', 1, '2022-03-08 05:03:12', '2022-03-08 05:03:12', '2023-03-08 10:33:12'),
('d9165823ac023555820e57e73e35ffe54739832ad0bbf6733ec2751ac77184497f8816a967af99a7', 2, 1, 'bookys', '[]', 0, '2022-03-09 01:30:45', '2022-03-09 01:30:45', '2023-03-09 07:00:45');

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
(1, 'q06zseGiM7', 5, 1, 'tWEQi05R', 21, 'Flat', 21, 0, 58, 'Completed', 'COD', 37, 1, NULL, '2023-10-08 03:39:48', '2023-10-08 12:20:11');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('adminn@yopmail.com', 'zPtRCL2TWY2aqR3SH9hZzamyaqs53Xah', '2023-09-14 16:28:37');

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
(1, 5, 1, 'xxxxxxx12345', 'COD', 'tWEQi05R', 21, 'Flat', 21, 0, 58, 37, NULL, '2023-10-08 03:39:48', '2023-10-08 03:39:48');

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
(1, 2, 1, 'asfasf', 'Active', 'DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI', 'DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI', 23, 5, NULL, '2023-10-05 13:28:22', '2023-10-05 13:28:22'),
(2, 2, 1, 'Testing Product', 'Active', 'Loream Ipsum Loream Ipsum Loream Ipsum Loream Ipsu', 'Loream Ipsum Loream Ipsum Loream Ipsum Loream Ipsum Loream Ipsum Loream Ipsum Loream Ipsum Loream Ipsum Loream Ipsum Loream Ipsum Loream Ipsum Loream Ipsum Loream Ipsum', 90, 5, NULL, '2023-10-07 00:14:16', '2023-10-07 00:14:16'),
(3, 2, 1, 'Testing 2', 'Active', 'Loream Ipsum Loream Ipsum Loream Ipsum Loream Ipsu', 'Loream Ipsum Loream Ipsum Loream Ipsum Loream Ipsum Loream Ipsum Loream Ipsum Loream Ipsum Loream Ipsum Loream Ipsum Loream Ipsum Loream Ipsum', 12, 5, NULL, '2023-10-07 00:16:55', '2023-10-07 00:16:55'),
(4, 2, 1, 'Testing 3', 'Active', 'Loream Ipsum Loream Ipsum Loream Ipsum Loream Ipsu', 'Loream Ipsum Loream Ipsum Loream Ipsum Loream IpsuLoream Ipsum Loream Ipsum Loream Ipsum Loream IpsuLoream Ipsum Loream Ipsum Loream Ipsum Loream IpsuLoream Ipsum Loream Ipsum Loream Ipsum Loream IpsuLoream Ipsum Loream Ipsum Loream Ipsum Loream Ipsu', 12, 5, NULL, '2023-10-07 00:29:01', '2023-10-07 00:29:01');

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
(1, 1, '10052023185822651f074e98e96.jpg', 1, NULL, '2023-10-05 13:28:22', '2023-10-05 13:28:22'),
(2, 1, '10052023185822651f074e99077.jpg', 0, NULL, '2023-10-05 13:28:22', '2023-10-05 13:28:22'),
(3, 1, '10052023185822651f074e990d0.jpg', 0, NULL, '2023-10-05 13:28:22', '2023-10-05 13:28:22'),
(4, 2, '100720230544166520f03007a2a.jpg', 1, NULL, '2023-10-07 00:14:16', '2023-10-07 00:14:16'),
(5, 2, '100720230544166520f03007b5e.jpg', 0, NULL, '2023-10-07 00:14:16', '2023-10-07 00:14:16'),
(6, 2, '100720230544166520f03007bab.jpg', 0, NULL, '2023-10-07 00:14:16', '2023-10-07 00:14:16'),
(7, 2, '100720230544166520f03007bf2.jpg', 0, NULL, '2023-10-07 00:14:16', '2023-10-07 00:14:16'),
(8, 2, '100720230544166520f03007c35.jpg', 0, NULL, '2023-10-07 00:14:16', '2023-10-07 00:14:16'),
(9, 2, '100720230544166520f03007c73.jpg', 0, NULL, '2023-10-07 00:14:16', '2023-10-07 00:14:16'),
(10, 3, '100720230546556520f0cf83b6f.jpg', 1, NULL, '2023-10-07 00:16:55', '2023-10-07 00:16:55'),
(11, 3, '100720230546556520f0cf83cbd.jpg', 0, NULL, '2023-10-07 00:16:55', '2023-10-07 00:16:55'),
(12, 3, '100720230546556520f0cf83d1e.jpg', 0, NULL, '2023-10-07 00:16:55', '2023-10-07 00:16:55'),
(13, 3, '100720230546556520f0cf83d67.jpg', 0, NULL, '2023-10-07 00:16:55', '2023-10-07 00:16:55'),
(14, 3, '100720230546556520f0cf83dac.jpg', 0, NULL, '2023-10-07 00:16:55', '2023-10-07 00:16:55'),
(15, 4, '100720230559016520f3a57b3c2.jpg', 1, NULL, '2023-10-07 00:29:01', '2023-10-07 01:11:46'),
(16, 4, '100720230559016520f3a57b503.jpg', 0, NULL, '2023-10-07 00:29:01', '2023-10-07 01:11:46'),
(17, 4, '100720230559016520f3a57b610.jpg', 0, NULL, '2023-10-07 00:29:01', '2023-10-07 01:11:46'),
(18, 4, '100720230559016520f3a57b65b.jpg', 0, NULL, '2023-10-07 00:29:01', '2023-10-07 01:11:46'),
(19, 4, '100720230559016520f3a57b6a4.jpg', 0, NULL, '2023-10-07 00:29:01', '2023-10-07 01:11:46'),
(20, 4, '100720230559016520f3a57b6e7.jpg', 0, NULL, '2023-10-07 00:29:01', '2023-10-07 01:11:46');

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
(1, 1, 1, 45, 45, 1, 'Egg', 'DESI', 'asfasf', 'DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI', 'DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI', 45, NULL, '2023-10-08 03:39:48', '2023-10-08 03:39:48'),
(2, 1, 1, 13, 13, 1, 'Egg', 'DESI', 'Testing Product', 'Loream Ipsum Loream Ipsum Loream Ipsum Loream Ipsum Loream Ipsum Loream Ipsum Loream Ipsum Loream Ipsum Loream Ipsum Loream Ipsum Loream Ipsum Loream Ipsum Loream Ipsum', 'Loream Ipsum Loream Ipsum Loream Ipsum Loream Ipsu', 13, NULL, '2023-10-08 03:39:48', '2023-10-08 03:39:48');

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
(1, 1, 1, 12, 1, 45, 0, NULL, '2023-10-05 13:28:22', '2023-10-05 13:28:22'),
(2, 1, 1, 12, 12, 45, 0, NULL, '2023-10-05 13:28:22', '2023-10-05 13:28:22'),
(3, 1, 1, 45, 45, 45, 1, NULL, '2023-10-05 13:28:22', '2023-10-05 13:28:22'),
(4, 2, 1, 12, 12, 12, 0, NULL, '2023-10-07 00:14:16', '2023-10-07 00:14:16'),
(5, 2, 1, 13, 13, 13, 1, NULL, '2023-10-07 00:14:16', '2023-10-07 00:14:16'),
(6, 2, 1, 15, 15, 15, 0, NULL, '2023-10-07 00:14:16', '2023-10-07 00:14:16'),
(7, 2, 1, 14, 14, 14, 0, NULL, '2023-10-07 00:14:16', '2023-10-07 00:14:16'),
(8, 3, 1, 11, 11, 11, 0, NULL, '2023-10-07 00:16:55', '2023-10-07 00:16:55'),
(9, 3, 1, 12, 12, 12, 1, NULL, '2023-10-07 00:16:55', '2023-10-07 00:16:55'),
(10, 3, 1, 13, 13, 13, 0, NULL, '2023-10-07 00:16:55', '2023-10-07 00:16:55'),
(11, 3, 1, 14, 14, 14, 0, NULL, '2023-10-07 00:16:55', '2023-10-07 00:16:55'),
(12, 4, 1, 11, 11, 11, 0, '2023-10-07 01:11:46', '2023-10-07 00:29:01', '2023-10-07 01:11:46'),
(13, 4, 1, 12, 12, 12, 0, '2023-10-07 01:11:46', '2023-10-07 00:29:01', '2023-10-07 01:11:46'),
(14, 4, 1, 13, 13, 13, 0, '2023-10-07 01:11:46', '2023-10-07 00:29:01', '2023-10-07 01:11:46'),
(15, 4, 1, 14, 14, 14, 0, '2023-10-07 01:11:46', '2023-10-07 00:29:01', '2023-10-07 01:11:46'),
(16, 4, 1, 11, 11, 11, 1, NULL, '2023-10-07 01:11:46', '2023-10-07 01:11:46'),
(17, 4, 1, 16, 16, 16, 0, NULL, '2023-10-07 01:11:46', '2023-10-07 01:11:46');

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
(1, 2, 'DESI', '10052023183229651f013de8c71.png', 'DESI DESI DESI DESI DESI DESI DESI', 'DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI DESI', 'Active', NULL, '2023-10-05 13:02:29', '2023-10-05 13:02:29');

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
(4, 'Employee', 'sdfsg', 'abc@yopmail.com', '$2y$10$5QG4ZmlFxSs8B9S/jnWLoeuZ57U2bMkcbbAJ2rhKN18mh2eCrC1.K', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, 0, 'English', NULL, NULL, 0, NULL, NULL, NULL, '2023-10-09 10:03:32', '2023-10-02 11:10:51', '2023-10-09 10:03:32', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Employee', 'asdasf', 'hosttesting@yopmail.com', '$2y$10$JpBtvgGN0xHVEwO/fJ66HOSr0iq8kipMDiLLrMp6wMiv7j8xcdQ/W', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, 0, 'English', NULL, NULL, 0, NULL, NULL, NULL, NULL, '2023-10-02 11:12:33', '2023-10-02 11:12:33', NULL, NULL, NULL, NULL, NULL, NULL);

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
(1, 5, 'Host', 'Testing', 'hosttesting@yopmail.com', '6467023890', 'California Road', 'Stockholm', 'Maine', '04783', NULL, '2023-10-08 03:39:48', '2023-10-08 03:39:48');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `billing_shipping_addresses`
--
ALTER TABLE `billing_shipping_addresses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `product_orders`
--
ALTER TABLE `product_orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_price_attributes`
--
ALTER TABLE `product_price_attributes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
