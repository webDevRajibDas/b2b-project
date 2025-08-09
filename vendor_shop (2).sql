-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 09, 2025 at 12:58 PM
-- Server version: 8.3.0
-- PHP Version: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vendor_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci,
  `order` int DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_by` int UNSIGNED DEFAULT NULL,
  `updated_by` int UNSIGNED DEFAULT NULL,
  `deleted_by` int UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `title`, `description`, `order`, `status`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`) VALUES
(1, 'B2B', 'B2B  Brand', NULL, '1', 1, NULL, NULL, '2025-07-31 02:28:56', '2025-07-31 02:28:56');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

DROP TABLE IF EXISTS `cards`;
CREATE TABLE IF NOT EXISTS `cards` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double UNSIGNED NOT NULL,
  `sale_price` double UNSIGNED NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'published',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `card_categories`
--

DROP TABLE IF EXISTS `card_categories`;
CREATE TABLE IF NOT EXISTS `card_categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

DROP TABLE IF EXISTS `carts`;
CREATE TABLE IF NOT EXISTS `carts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL DEFAULT '1',
  `sessionId` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` smallint NOT NULL DEFAULT '0',
  `full_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `product_id` (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int DEFAULT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci,
  `order` int DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `is_active` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int UNSIGNED DEFAULT NULL,
  `updated_by` int UNSIGNED DEFAULT NULL,
  `deleted_by` int UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `parent_id`, `slug`, `order`, `status`, `is_active`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`) VALUES
(1, 'Electronics', NULL, NULL, 1, 'active', NULL, 1, NULL, NULL, NULL, '2025-07-29 23:23:23'),
(2, 'Clothing', NULL, NULL, 2, 'active', NULL, 1, NULL, NULL, NULL, NULL),
(3, 'Home & Kitchen', NULL, NULL, 3, 'active', NULL, 1, NULL, NULL, NULL, NULL),
(4, 'Books', NULL, NULL, 4, 'active', NULL, 1, NULL, NULL, NULL, NULL),
(5, 'Sports & Outdoors', NULL, NULL, 5, 'active', NULL, 1, NULL, NULL, NULL, NULL),
(6, 'Health & Beauty', NULL, NULL, 6, 'active', NULL, 1, NULL, NULL, NULL, NULL),
(15, 'Internet', NULL, 'internet', NULL, 'active', NULL, NULL, NULL, NULL, '2025-08-09 04:54:31', '2025-08-09 04:54:31'),
(14, 'ICT Product', NULL, 'ict-product', NULL, 'active', NULL, NULL, NULL, NULL, '2025-08-09 04:43:00', '2025-08-09 04:43:00'),
(9, 'Furniture', NULL, NULL, 9, 'active', NULL, 1, NULL, NULL, NULL, NULL),
(10, 'Jewelry', NULL, NULL, 10, 'active', NULL, 1, NULL, NULL, NULL, NULL),
(12, 'Footwear', NULL, 'footwear', NULL, 'active', NULL, NULL, NULL, NULL, '2025-07-31 06:52:33', '2025-07-31 06:52:33'),
(13, 'Software & Website', NULL, 'software-website', NULL, 'active', NULL, NULL, NULL, NULL, '2025-07-31 07:01:50', '2025-07-31 07:01:50');

-- --------------------------------------------------------

--
-- Table structure for table `event_forms`
--

DROP TABLE IF EXISTS `event_forms`;
CREATE TABLE IF NOT EXISTS `event_forms` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass_year` year NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `present_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `whats_up` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `r_fee` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `r_fee_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `labels`
--

DROP TABLE IF EXISTS `labels`;
CREATE TABLE IF NOT EXISTS `labels` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `labels`
--

INSERT INTO `labels` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Bestsellers', '2025-08-09 12:48:13', NULL),
(2, 'Special Offer', '2025-08-08 12:49:03', NULL),
(3, 'Trending', '2025-08-09 12:49:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `master_settings`
--

DROP TABLE IF EXISTS `master_settings`;
CREATE TABLE IF NOT EXISTS `master_settings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `header_logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app_description` text COLLATE utf8mb4_unicode_ci,
  `analytics_script` text COLLATE utf8mb4_unicode_ci,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `facebook_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_02_09_071641_add_role_to_users_table', 1),
(5, '2025_02_16_062019_create_vendor_categories_table', 1),
(6, '2025_02_16_091820_create_sub_categories_table', 1),
(7, '2025_02_17_100448_create_vendors_table', 1),
(8, '2025_02_23_053101_create_vendor_contacts_table', 1),
(9, '2025_03_01_051424_create_products_table', 1),
(10, '2025_03_02_091100_create_categories_table', 1),
(11, '2025_03_03_044416_create_brands_table', 1),
(12, '2025_03_06_042925_create_product_images_table', 1),
(13, '2025_03_08_033540_create_master_settings_table', 1),
(14, '2025_03_13_062820_create_carts_table', 1),
(15, '2025_03_17_084326_create_sliders_table', 1),
(16, '2025_04_12_101912_create_cards_table', 1),
(17, '2025_04_19_092622_create_event_forms_table', 1),
(18, '2025_04_20_064430_create_card_categories_table', 1),
(19, '2025_04_26_093344_create_videos_table', 1),
(20, '2025_07_29_101222_create_sub_subcategories_table', 1),
(21, '2025_08_09_093351_create_orders_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `userId` bigint UNSIGNED DEFAULT NULL,
  `sessionId` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `subTotal` float NOT NULL DEFAULT '0',
  `itemDiscount` float NOT NULL DEFAULT '0',
  `tax` float NOT NULL DEFAULT '0',
  `shipping` float NOT NULL DEFAULT '0',
  `total` float NOT NULL DEFAULT '0',
  `promo` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` float NOT NULL DEFAULT '0',
  `grandTotal` float NOT NULL DEFAULT '0',
  `fullName` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `line1` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `line2` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_userid_foreign` (`userId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'published',
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `atts` json DEFAULT NULL,
  `video_media` text COLLATE utf8mb4_unicode_ci,
  `sku` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int UNSIGNED NOT NULL DEFAULT '0',
  `quantity` int UNSIGNED DEFAULT NULL,
  `allow_checkout_when_out_of_stock` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `with_storehouse_management` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `is_featured` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `brand_id` bigint UNSIGNED DEFAULT NULL,
  `vendor_id` bigint UNSIGNED DEFAULT NULL,
  `categorie_id` bigint NOT NULL,
  `sub_categorie_id` bigint DEFAULT NULL,
  `sub_subcategorie_id` bigint DEFAULT NULL,
  `label_id` bigint DEFAULT NULL,
  `is_variation` tinyint NOT NULL DEFAULT '0',
  `sale_type` tinyint NOT NULL DEFAULT '0',
  `price` double UNSIGNED NOT NULL,
  `sale_price` double UNSIGNED DEFAULT NULL,
  `start_date` timestamp NULL DEFAULT NULL,
  `end_date` timestamp NULL DEFAULT NULL,
  `weight` double DEFAULT NULL,
  `color` text COLLATE utf8mb4_unicode_ci,
  `tax_id` bigint UNSIGNED DEFAULT NULL,
  `views` bigint NOT NULL DEFAULT '0',
  `stock_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'in_stock',
  `created_by_id` bigint UNSIGNED NOT NULL DEFAULT '0',
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approved_by` bigint UNSIGNED NOT NULL DEFAULT '0',
  `product_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'physical',
  `cost_per_item` double DEFAULT NULL,
  `minimum_order_quantity` int UNSIGNED NOT NULL DEFAULT '0',
  `maximum_order_quantity` int UNSIGNED NOT NULL DEFAULT '0',
  `notify_attachment_updated` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sale_type_index` (`sale_type`),
  KEY `sale_price_index` (`sale_price`),
  KEY `products_sku_index` (`sku`),
  KEY `sale_price` (`sale_price`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `description`, `content`, `status`, `image`, `atts`, `video_media`, `sku`, `order`, `quantity`, `allow_checkout_when_out_of_stock`, `with_storehouse_management`, `is_featured`, `brand_id`, `vendor_id`, `categorie_id`, `sub_categorie_id`, `sub_subcategorie_id`, `label_id`, `is_variation`, `sale_type`, `price`, `sale_price`, `start_date`, `end_date`, `weight`, `color`, `tax_id`, `views`, `stock_status`, `created_by_id`, `created_by`, `approved_by`, `product_type`, `cost_per_item`, `minimum_order_quantity`, `maximum_order_quantity`, `notify_attachment_updated`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'আর্কষনীয় পাকিস্তানী পেশয়ারী স্যান্ডেল 🔥🔥', 'আর্কষনীয়-পাকিস্তানী-পেশয়ারী-স্যান্ডেল', 'সরাসরি পাকিস্তানী থেকে আমদানিকৃত।\r\n➡  আসল চামড়ায় তৈরি, যা আপনার প্রতিটি পদক্ষেপে আরাম এবং স্টাইল নিশ্চিত করবে। \r\n➡  গুণগত মানে আপোষ নয়!', '<p>➡ সরাসরি পাকিস্তানী থেকে আমদানিকৃত।</p><p>➡&nbsp; আসল চামড়ায় তৈরি, যা আপনার প্রতিটি পদক্ষেপে আরাম এবং স্টাইল নিশ্চিত করবে।&nbsp;</p><p>➡&nbsp; গুণগত মানে আপোষ নয়!</p><p>➡&nbsp; হাই কোয়ালিটি ফিনিশিং।</p><p>➡ আপনাদের জন্য দারুণ অফারে স্টাইলিশ স্যান্ডেল!</p><p>➡ স্টক শেষ হওয়ার আগেই অর্ডার করুন।&nbsp;</p><p>➡ অর্ডার করতে এখনই অর্ডার বাটন ক্লিক করুন অথবা মেসেজ করুন আমাদের ফেসবুক পেজে।</p><p>➡ কোন&nbsp; অগ্রীম ছাড়াই অর্ডার করুন, পণ্য হাতে পেয়ে মূল্য পরিশোধ করুন</p>', 'published', 'products/d1958f6d-68d3-4dfc-b4fc-f8bb6b4d64a8.jpg', '[{\"attName\": \"Size\", \"attValue\": \" 7, 8, 9, 10\", \"attVisible\": true}, {\"attName\": \"Color\", \"attValue\": \"Blue|Red|Green\", \"attVisible\": true}]', NULL, NULL, 0, NULL, 0, 0, 0, 1, NULL, 1, 1, 3, NULL, 0, 0, 4500, 4000, NULL, NULL, NULL, NULL, NULL, 0, 'in_stock', 0, NULL, 0, 'physical', NULL, 0, 0, 0, '2025-08-04 05:17:51', '2025-08-04 05:17:51', NULL),
(2, 'আর্কষনীয় পাকিস্তানী পেশয়ারী স্যান্ডেল', 'arkshneey-pakistanee-pesyaree-szandel', 'সরাসরি পাকিস্তানী থেকে আমদানিকৃত।\r\n➡  আসল চামড়ায় তৈরি, যা আপনার প্রতিটি পদক্ষেপে আরাম এবং স্টাইল নিশ্চিত করবে। \r\n➡  গুণগত মানে আপোষ নয়!\r\n➡  হাই কোয়ালিটি ফিনিশিং।\r\n➡ আপনাদের জন্য দারুণ অফারে স্টাইলিশ স্যান্ডেল!', '<div dir=\"auto\" style=\"font-family: &quot;Segoe UI Historic&quot;, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif; color: rgb(8, 8, 9); font-size: 14px; white-space-collapse: preserve;\">সরাসরি পাকিস্তানী থেকে আমদানিকৃত।</div><div dir=\"auto\" style=\"font-family: &quot;Segoe UI Historic&quot;, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif; color: rgb(8, 8, 9); font-size: 14px; white-space-collapse: preserve;\"><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\" style=\"text-align: inherit; padding: 0px; overflow-wrap: break-word; margin: 0px 1px; display: inline-flex; vertical-align: middle; width: 16px; height: 16px; font-family: inherit;\"><img height=\"16\" width=\"16\" class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" alt=\"➡\" referrerpolicy=\"origin-when-cross-origin\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t9e/1/16/27a1.png\" style=\"border: 0px; border-radius: 0px; object-fit: fill;\"></span>  আসল চামড়ায় তৈরি, যা আপনার প্রতিটি পদক্ষেপে আরাম এবং স্টাইল নিশ্চিত করবে। </div><div dir=\"auto\" style=\"font-family: &quot;Segoe UI Historic&quot;, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif; color: rgb(8, 8, 9); font-size: 14px; white-space-collapse: preserve;\"><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\" style=\"text-align: inherit; padding: 0px; overflow-wrap: break-word; margin: 0px 1px; display: inline-flex; vertical-align: middle; width: 16px; height: 16px; font-family: inherit;\"><img height=\"16\" width=\"16\" class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" alt=\"➡\" referrerpolicy=\"origin-when-cross-origin\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t9e/1/16/27a1.png\" style=\"border: 0px; border-radius: 0px; object-fit: fill;\"></span>  গুণগত মানে আপোষ নয়!</div><div dir=\"auto\" style=\"font-family: &quot;Segoe UI Historic&quot;, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif; color: rgb(8, 8, 9); font-size: 14px; white-space-collapse: preserve;\"><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\" style=\"text-align: inherit; padding: 0px; overflow-wrap: break-word; margin: 0px 1px; display: inline-flex; vertical-align: middle; width: 16px; height: 16px; font-family: inherit;\"><img height=\"16\" width=\"16\" class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" alt=\"➡\" referrerpolicy=\"origin-when-cross-origin\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t9e/1/16/27a1.png\" style=\"border: 0px; border-radius: 0px; object-fit: fill;\"></span>  হাই কোয়ালিটি ফিনিশিং।</div><div dir=\"auto\" style=\"font-family: &quot;Segoe UI Historic&quot;, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif; color: rgb(8, 8, 9); font-size: 14px; white-space-collapse: preserve;\"><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\" style=\"text-align: inherit; padding: 0px; overflow-wrap: break-word; margin: 0px 1px; display: inline-flex; vertical-align: middle; width: 16px; height: 16px; font-family: inherit;\"><img height=\"16\" width=\"16\" class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" alt=\"➡\" referrerpolicy=\"origin-when-cross-origin\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t9e/1/16/27a1.png\" style=\"border: 0px; border-radius: 0px; object-fit: fill;\"></span> ছবির সাথে মিল না থাকলে ফ্রি রিটার্ন।</div><div dir=\"auto\" style=\"font-family: &quot;Segoe UI Historic&quot;, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif; color: rgb(8, 8, 9); font-size: 14px; white-space-collapse: preserve;\"><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\" style=\"text-align: inherit; padding: 0px; overflow-wrap: break-word; margin: 0px 1px; display: inline-flex; vertical-align: middle; width: 16px; height: 16px; font-family: inherit;\"><img height=\"16\" width=\"16\" class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" alt=\"➡\" referrerpolicy=\"origin-when-cross-origin\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t9e/1/16/27a1.png\" style=\"border: 0px; border-radius: 0px; object-fit: fill;\"></span> আপনাদের জন্য দারুণ অফারে স্টাইলিশ স্যান্ডেল!</div><div dir=\"auto\" style=\"font-family: &quot;Segoe UI Historic&quot;, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif; color: rgb(8, 8, 9); font-size: 14px; white-space-collapse: preserve;\"><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\" style=\"text-align: inherit; padding: 0px; overflow-wrap: break-word; margin: 0px 1px; display: inline-flex; vertical-align: middle; width: 16px; height: 16px; font-family: inherit;\"><img height=\"16\" width=\"16\" class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" alt=\"➡\" referrerpolicy=\"origin-when-cross-origin\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t9e/1/16/27a1.png\" style=\"border: 0px; border-radius: 0px; object-fit: fill;\"></span> স্টক শেষ হওয়ার আগেই অর্ডার করুন। </div><div dir=\"auto\" style=\"font-family: &quot;Segoe UI Historic&quot;, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif; color: rgb(8, 8, 9); font-size: 14px; white-space-collapse: preserve;\"><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\" style=\"text-align: inherit; padding: 0px; overflow-wrap: break-word; margin: 0px 1px; display: inline-flex; vertical-align: middle; width: 16px; height: 16px; font-family: inherit;\"><img height=\"16\" width=\"16\" class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" alt=\"➡\" referrerpolicy=\"origin-when-cross-origin\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t9e/1/16/27a1.png\" style=\"border: 0px; border-radius: 0px; object-fit: fill;\"></span> অর্ডার করতে এখনই অর্ডার বাটন ক্লিক করুন অথবা মেসেজ করুন আমাদের ফেসবুক পেজে।</div><div dir=\"auto\" style=\"font-family: &quot;Segoe UI Historic&quot;, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif; color: rgb(8, 8, 9); font-size: 14px; white-space-collapse: preserve;\"><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\" style=\"text-align: inherit; padding: 0px; overflow-wrap: break-word; margin: 0px 1px; display: inline-flex; vertical-align: middle; width: 16px; height: 16px; font-family: inherit;\"><img height=\"16\" width=\"16\" class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" alt=\"➡\" referrerpolicy=\"origin-when-cross-origin\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t9e/1/16/27a1.png\" style=\"border: 0px; border-radius: 0px; object-fit: fill;\"></span> কোন  অগ্রীম ছাড়াই অর্ডার করুন, পণ্য হাতে পেয়ে মূল্য পরিশোধ করুন</div>', 'published', 'products/d49240c1-c81a-4e0d-8276-9fc473365e94.jpg', '[{\"attName\": \"Size\", \"attValue\": \"UK Size: 7, 8, 9, 10\", \"attVisible\": true}, {\"attName\": \"Color\", \"attValue\": \"Blue|Red|Green\", \"attVisible\": true}]', NULL, NULL, 0, NULL, 0, 0, 0, 1, NULL, 12, NULL, NULL, NULL, 0, 0, 4800, 4500, NULL, NULL, NULL, NULL, NULL, 0, 'in_stock', 0, NULL, 0, 'physical', NULL, 0, 0, 0, '2025-08-04 05:59:24', '2025-08-04 05:59:24', NULL),
(25, 'CCTV Surveillance Systems', 'cctv-surveillance-systems', 'Since it’s inception,  GIT Park has successfully installed CCTV Surveillance Systems in Corporate Offices and industries in different types of environments across the  country.  We supply and install  CCTV Surveillance systems according to the requirements for any project of our client needs. Our equipment\'s is top of the range and are sourced from the world renowned manufacturer. Our technical personnel are well trained and have the best skills necessary for any of the CCTV  projects.', '<div class=\"xdj266r x14z9mp xat24cr x1lziwak x1vvkbs x126k92a\" style=\"margin: 0px; overflow-wrap: break-word; white-space-collapse: preserve; font-family: &quot;Segoe UI Historic&quot;, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif; color: rgb(8, 8, 9); font-size: 14px;\"><div dir=\"auto\" style=\"font-family: inherit;\">Since it’s inception,  GIT Park has successfully installed CCTV Surveillance Systems in Corporate Offices and industries in different types of environments across the  <span class=\"html-span xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs\" style=\"margin: 0px; text-align: inherit; padding: 0px; overflow-wrap: break-word; font-family: inherit;\"><a tabindex=\"-1\" class=\"html-a xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs\" style=\"color: rgb(56, 88, 152); cursor: pointer; text-decoration-line: none; margin: 0px; text-align: inherit; padding: 0px; overflow-wrap: break-word; font-family: inherit;\"></a></span>country.  We supply and install  CCTV Surveillance systems according to the requirements for any project of our client needs. Our equipment\'s is top of the range and are sourced from the world renowned manufacturer. Our technical personnel are well trained and have the best skills necessary for any of the CCTV  projects. </div></div><div class=\"x14z9mp xat24cr x1lziwak x1vvkbs xtlvy1s x126k92a\" style=\"margin: 0.5em 0px 0px; overflow-wrap: break-word; white-space-collapse: preserve; font-family: &quot;Segoe UI Historic&quot;, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif; color: rgb(8, 8, 9); font-size: 14px;\"><div dir=\"auto\" style=\"font-family: inherit;\"><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\" style=\"text-align: inherit; padding: 0px; overflow-wrap: break-word; margin: 0px 1px; display: inline-flex; vertical-align: middle; width: 16px; height: 16px; font-family: inherit;\"><img height=\"16\" width=\"16\" class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" alt=\"🌜\" referrerpolicy=\"origin-when-cross-origin\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t5d/1/16/1f31c.png\" style=\"border: 0px; border-radius: 0px; object-fit: fill;\"></span>Kay Features:</div><div dir=\"auto\" style=\"font-family: inherit;\"><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\" style=\"text-align: inherit; padding: 0px; overflow-wrap: break-word; margin: 0px 1px; display: inline-flex; vertical-align: middle; width: 16px; height: 16px; font-family: inherit;\"><img height=\"16\" width=\"16\" class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" alt=\"🌀\" referrerpolicy=\"origin-when-cross-origin\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tb/1/16/1f300.png\" style=\"border: 0px; border-radius: 0px; object-fit: fill;\"></span> 24 Hours Customer Service</div><div dir=\"auto\" style=\"font-family: inherit;\"><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\" style=\"text-align: inherit; padding: 0px; overflow-wrap: break-word; margin: 0px 1px; display: inline-flex; vertical-align: middle; width: 16px; height: 16px; font-family: inherit;\"><img height=\"16\" width=\"16\" class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" alt=\"🌀\" referrerpolicy=\"origin-when-cross-origin\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tb/1/16/1f300.png\" style=\"border: 0px; border-radius: 0px; object-fit: fill;\"></span>Annual Maintenance Contract</div><div dir=\"auto\" style=\"font-family: inherit;\"><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\" style=\"text-align: inherit; padding: 0px; overflow-wrap: break-word; margin: 0px 1px; display: inline-flex; vertical-align: middle; width: 16px; height: 16px; font-family: inherit;\"><img height=\"16\" width=\"16\" class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" alt=\"🌀\" referrerpolicy=\"origin-when-cross-origin\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tb/1/16/1f300.png\" style=\"border: 0px; border-radius: 0px; object-fit: fill;\"></span>Support for Spare Parts</div><div dir=\"auto\" style=\"font-family: inherit;\"><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\" style=\"text-align: inherit; padding: 0px; overflow-wrap: break-word; margin: 0px 1px; display: inline-flex; vertical-align: middle; width: 16px; height: 16px; font-family: inherit;\"><img height=\"16\" width=\"16\" class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" alt=\"🌀\" referrerpolicy=\"origin-when-cross-origin\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tb/1/16/1f300.png\" style=\"border: 0px; border-radius: 0px; object-fit: fill;\"></span>Installation, Testing &amp; Commissioning as per project wise.</div></div>', 'published', 'products/31a1e3c5-933d-436c-baa8-0486f2b81548.jpg', '[{\"attName\": \"Size\", \"attValue\": \"\", \"attVisible\": true}, {\"attName\": \"Color\", \"attValue\": \"Black|Grey\", \"attVisible\": true}]', NULL, NULL, 0, NULL, 0, 0, 0, 1, NULL, 1, 5, NULL, NULL, 0, 0, 12000, 11000, NULL, NULL, NULL, NULL, NULL, 0, 'in_stock', 0, NULL, 0, 'physical', NULL, 0, 0, 0, '2025-08-09 04:12:55', '2025-08-09 04:12:55', NULL),
(24, 'Barcode Solutions', 'barcode-solutions', 'We   are   leading   provider   of   barcode   solutions including barcode sticker, barcode printer, barcode Scanner,  barcode  Ribbon,  mobile  computing,  and RFID solutions. Since 2012 we have worked hard to earn a reputation for being dedicated, reliable, and customer-oriented Company. We work hard to listen carefully and tailor our solutions to meet your needs. Additionally, we are product experts with deep experience in Product scanning, field mobility, inventory and point-of-sale solutions. WE are ready to provide quick service and every phone call and email is responded promptly, completely, and accurately by our customer service team.', '<div class=\"xdj266r x14z9mp xat24cr x1lziwak x1vvkbs x126k92a\" style=\"margin: 0px; overflow-wrap: break-word; white-space-collapse: preserve; font-family: &quot;Segoe UI Historic&quot;, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif; color: rgb(8, 8, 9); font-size: 14px;\"><div dir=\"auto\" style=\"font-family: inherit;\">Barcode Solutions:</div><div dir=\"auto\" style=\"font-family: inherit;\">We   are   leading   provider   of   barcode   solutions including barcode sticker, barcode printer, barcode Scanner,  barcode  Ribbon,  mobile  <span class=\"html-span xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs\" style=\"margin: 0px; text-align: inherit; padding: 0px; overflow-wrap: break-word; font-family: inherit;\"><a tabindex=\"-1\" class=\"html-a xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs\" style=\"color: rgb(56, 88, 152); cursor: pointer; text-decoration-line: none; margin: 0px; text-align: inherit; padding: 0px; overflow-wrap: break-word; font-family: inherit;\"></a></span>computing,  and RFID solutions. Since 2012 we have worked hard to earn a reputation for being dedicated, reliable, and customer-oriented Company. We work hard to listen carefully and tailor our solutions to meet your needs. Additionally, we are product experts with deep experience in Product scanning, field mobility, inventory and point-of-sale solutions. WE are ready to provide quick service and every phone call and email is responded promptly, completely, and accurately by our customer service team.</div></div><div class=\"x14z9mp xat24cr x1lziwak x1vvkbs xtlvy1s x126k92a\" style=\"margin: 0.5em 0px 0px; overflow-wrap: break-word; white-space-collapse: preserve; font-family: &quot;Segoe UI Historic&quot;, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif; color: rgb(8, 8, 9); font-size: 14px;\"><div dir=\"auto\" style=\"font-family: inherit;\"><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\" style=\"text-align: inherit; padding: 0px; overflow-wrap: break-word; margin: 0px 1px; display: inline-flex; vertical-align: middle; width: 16px; height: 16px; font-family: inherit;\"><img height=\"16\" width=\"16\" class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" alt=\"🌜\" referrerpolicy=\"origin-when-cross-origin\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t5d/1/16/1f31c.png\" style=\"border: 0px; border-radius: 0px; object-fit: fill;\"></span>Kay Features:</div><div dir=\"auto\" style=\"font-family: inherit;\">• 24 Hours Customer Service</div><div dir=\"auto\" style=\"font-family: inherit;\">• Annual Maintenance Contract</div><div dir=\"auto\" style=\"font-family: inherit;\">• Support for Spare Parts</div><div dir=\"auto\" style=\"font-family: inherit;\">• Installation, Testing &amp; Commissioning as per project wise.</div></div>', 'published', 'products/129ad478-3b5d-4060-9a7e-def023b7278b.jpg', '[{\"attName\": \"Size\", \"attValue\": \"\", \"attVisible\": true}, {\"attName\": \"Color\", \"attValue\": \"Black|Grey\", \"attVisible\": true}]', NULL, NULL, 0, NULL, 0, 0, 0, 1, NULL, 1, 6, NULL, NULL, 0, 0, 10000, 9000, NULL, NULL, NULL, NULL, NULL, 0, 'in_stock', 0, NULL, 0, 'physical', NULL, 0, 0, 0, '2025-08-09 04:09:25', '2025-08-09 04:09:25', NULL),
(26, 'ZKTeco MB2000', 'zkteco-mb2000', 'Overview\r\nZKTeco MB2000 in Bangladesh is an innovative product featured with ZK advanced fingerprint and face recognition technologies. It supports multiple verification methods including face, fingerprint, card, password, combinations between them and basic access control functions.\r\nUser verification is performed in less than 1 second, which streamlines the process of access.\r\nThe communication between the MB360 and PC is by TCP / IP or USB interface for manual data transfer. Its sleek design fits perfectly in any environment.', '<div class=\"xdj266r x14z9mp xat24cr x1lziwak x1vvkbs x126k92a\" style=\"margin: 0px; overflow-wrap: break-word; white-space-collapse: preserve; font-family: &quot;Segoe UI Historic&quot;, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif; color: rgb(8, 8, 9); font-size: 14px;\"><div dir=\"auto\" style=\"font-family: inherit;\">Overview</div><div dir=\"auto\" style=\"font-family: inherit;\">ZKTeco MB2000 in Bangladesh is an innovative product featured with ZK advanced fingerprint and face recognition technologies. It supports multiple verification <span class=\"html-span xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs\" style=\"margin: 0px; text-align: inherit; padding: 0px; overflow-wrap: break-word; font-family: inherit;\"><a tabindex=\"-1\" class=\"html-a xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs\" style=\"color: rgb(56, 88, 152); cursor: pointer; text-decoration-line: none; margin: 0px; text-align: inherit; padding: 0px; overflow-wrap: break-word; font-family: inherit;\"></a></span>methods including face, fingerprint, card, password, combinations between them and basic access control functions.</div><div dir=\"auto\" style=\"font-family: inherit;\">User verification is performed in less than 1 second, which streamlines the process of access.</div><div dir=\"auto\" style=\"font-family: inherit;\">The communication between the MB360 and PC is by TCP / IP or USB interface for manual data transfer. Its sleek design fits perfectly in any environment.</div></div><div class=\"x14z9mp xat24cr x1lziwak x1vvkbs xtlvy1s x126k92a\" style=\"margin: 0.5em 0px 0px; overflow-wrap: break-word; white-space-collapse: preserve; font-family: &quot;Segoe UI Historic&quot;, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif; color: rgb(8, 8, 9); font-size: 14px;\"><div dir=\"auto\" style=\"font-family: inherit;\">As the authentic ZKTeco brand distributor KB International of bangladesh, we assure our client to provide the creditable guaranteed produtcs at it\'s most reliable ZKTeco prices in BD with RMA during the product\'s warranty period.</div><div dir=\"auto\" style=\"font-family: inherit;\"><span class=\"html-span xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs\" style=\"margin: 0px; text-align: inherit; padding: 0px; overflow-wrap: break-word; font-family: inherit;\"><a attributionsrc=\"/privacy_sandbox/comet/register/source/?xt=AZXbgCSSM_0TK1A373QxoenKysDxW2kyg7nMhDkvU61Yy7CBKCYUiOjkYWWAgoqRW0ZIYFZenFtFe6GoDvHkcQjkokv7MMMrXbCQIfr7hLSyu3SqvBsKFAY9QZOVlEE8UWjjjFvrUWLQ4cTpjfxbCgZtjXpixtiFPfAzCf1Di2rzezMsoOIZOYqoQu9QwpxGraYmDDLfFqB-kxgAJPK2RrVeBhHASIsEOiRK8E-KUgoXSH4xscUjimkb8-yyxN5cHR5jNAqFG2A67bmBLNveGfqD1Ha-vn_9zW8_L601FO-biiR_bwRAcZhFTjRCmZWe5A7Ag7rBTyqGC9ADj-V8sKFW1bZWHZoC4wIGRJF5mpXg8FjoHdX3GGXYqyeccI-sjq4805qSU2RaKPQnnLv4oErOqLQtiNxLomUe8oPe3_GHkXjm_lkiTbkvk7bptAO40ycpgqQVQ0HC1XQsknT_Reqyb26jY87ehXgGX9GFoeQpij7AqXOpeb02T5f1c6WCD_xzy4LYwCUfbNv_8lADmnFI0mGHmoinEniU64f1xE8rRpgoAUd6NX4BxYDAYp0QHdS5XrGu2BmHiT7Pg_-VGQa44t0Bvbl03vX2jcS6UIjH6DoxSwvXwKWRJgmsqt-JO7OhetJqPQAlkiQa5KV1eUU8MkeZExePNxrEa_LQSd1I3Xcva4H8to3RC-zBTKwSGNQSurJLHAb2lHDpWhMSwAC4bBb_07Us1yLCz4mS8LPPf-Z231y86s7j8MtC9UC4qM5xzkqtdKMDiEhX9q8LNHD1DctLdLeBoWRel9wec4hdJKoYWRfMRBh7XB3G4vrdFGDF2sNZGpFmUUz5ovnrmORdooJhL1hs2nxfRQs6diUrNb2W_SgBVlB2HtbtXldMps2DNhPETEi0WdgCHSqfCcz2NDJ9QU6Kudb3sen2lbL_LEWyiAVzbsf-0-e-EUAP-rcK2DQcuXXjzN6DvRk4gUiYi4YQCKwOOmJYF6lBjOH6JH81yCp0cBiVLIC0WHTs3IJ6yjN8A-skWsUKhq5crdpeSi6sp2N2VJh5MKvX382eXjnoryqXdsVwpzayLc_g0YI1ZTCUZgEuKxPatthW4AcvRIJD2PpdaXHneKJWa9s67-AAsjsXqhIbJ8Pcomz_TsM_LK5iIMneQ5nr--NGyQ5uZkfzyL9wdRFlCtYvdbvmDPszhqrNzT7sMp66v2Kws7_ylohJXCcRRJKQRo9xNiVlFeUstcWyMRQIZb2sJlXzGnzxoKfdgMklQ-uyj_0RHYCcgjTAGI4tH5t6iipudadUl2Q3gjAVhGwcrbimjTC4AfRwHZ57LTB3IRepuya5WsiBrKjUgomaTkFgzeRgryUL\" class=\"x1i10hfl xjbqb8w x1ejq31n x18oe1m7 x1sy0etr xstzfhl x972fbf x10w94by x1qhh985 x14e42zd x9f619 x1ypdohk xt0psk2 x3ct3a4 xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz xkrqix3 x1sur9pj x1fey0fg x1s688f\" href=\"https://www.zkteco-bd.com/product/mb2000/?fbclid=IwZXh0bgNhZW0CMTAAYnJpZBExV0FmRnZSbXRPZjFqcWp5TgEe1qJ7RdBs_7ykb1CQPQD14lqFhLigja2l9KhchJQbIxXz7cHGCPWG32DLXO4_aem_HiMDWSeM8O8qhZAqMejJ9g\" rel=\"nofollow noreferrer\" role=\"link\" tabindex=\"0\" target=\"_blank\" style=\"color: rgb(0, 100, 209); cursor: pointer; text-decoration-line: none; border-width: 0px; margin: 0px; text-align: inherit; border-style: none; padding: 0px; list-style-type: none; background-color: transparent; -webkit-tap-highlight-color: transparent; font-weight: 600; touch-action: manipulation; display: inline; font-family: inherit;\">https://www.zkteco-bd.com/product/mb2000/</a></span></div></div><div class=\"x14z9mp xat24cr x1lziwak x1vvkbs xtlvy1s x126k92a\" style=\"margin: 0.5em 0px 0px; overflow-wrap: break-word; white-space-collapse: preserve; font-family: &quot;Segoe UI Historic&quot;, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif; color: rgb(8, 8, 9); font-size: 14px;\"><div dir=\"auto\" style=\"font-family: inherit;\"><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\" style=\"text-align: inherit; padding: 0px; overflow-wrap: break-word; margin: 0px 1px; display: inline-flex; vertical-align: middle; width: 16px; height: 16px; font-family: inherit;\"><img height=\"16\" width=\"16\" class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" alt=\"🌜\" referrerpolicy=\"origin-when-cross-origin\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t5d/1/16/1f31c.png\" style=\"border: 0px; border-radius: 0px; object-fit: fill;\"></span>Kay Features:</div><div dir=\"auto\" style=\"font-family: inherit;\"><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\" style=\"text-align: inherit; padding: 0px; overflow-wrap: break-word; margin: 0px 1px; display: inline-flex; vertical-align: middle; width: 16px; height: 16px; font-family: inherit;\"><img height=\"16\" width=\"16\" class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" alt=\"🌀\" referrerpolicy=\"origin-when-cross-origin\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tb/1/16/1f300.png\" style=\"border: 0px; border-radius: 0px; object-fit: fill;\"></span> 24 Hours Customer Service</div><div dir=\"auto\" style=\"font-family: inherit;\"><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\" style=\"text-align: inherit; padding: 0px; overflow-wrap: break-word; margin: 0px 1px; display: inline-flex; vertical-align: middle; width: 16px; height: 16px; font-family: inherit;\"><img height=\"16\" width=\"16\" class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" alt=\"🌀\" referrerpolicy=\"origin-when-cross-origin\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tb/1/16/1f300.png\" style=\"border: 0px; border-radius: 0px; object-fit: fill;\"></span> Annual Maintenance Contract</div><div dir=\"auto\" style=\"font-family: inherit;\"><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\" style=\"text-align: inherit; padding: 0px; overflow-wrap: break-word; margin: 0px 1px; display: inline-flex; vertical-align: middle; width: 16px; height: 16px; font-family: inherit;\"><img height=\"16\" width=\"16\" class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" alt=\"🌀\" referrerpolicy=\"origin-when-cross-origin\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tb/1/16/1f300.png\" style=\"border: 0px; border-radius: 0px; object-fit: fill;\"></span> Support for Spare Parts</div><div dir=\"auto\" style=\"font-family: inherit;\"><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\" style=\"text-align: inherit; padding: 0px; overflow-wrap: break-word; margin: 0px 1px; display: inline-flex; vertical-align: middle; width: 16px; height: 16px; font-family: inherit;\"><img height=\"16\" width=\"16\" class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" alt=\"🌀\" referrerpolicy=\"origin-when-cross-origin\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tb/1/16/1f300.png\" style=\"border: 0px; border-radius: 0px; object-fit: fill;\"></span> Installation, Testing &amp; Commissioning as per project wise.</div></div>', 'published', 'products/9094ecb3-d9c2-495e-a04c-8e9f596d5bba.jpg', '[{\"attName\": \"Size\", \"attValue\": \"\", \"attVisible\": true}, {\"attName\": \"Color\", \"attValue\": \"\", \"attVisible\": true}]', NULL, NULL, 0, NULL, 0, 0, 0, 1, NULL, 1, 3, NULL, NULL, 0, 0, 30000, 29000, NULL, NULL, NULL, NULL, NULL, 0, 'in_stock', 0, NULL, 0, 'physical', NULL, 0, 0, 0, '2025-08-09 04:17:05', '2025-08-09 04:17:05', NULL),
(27, 'Amazon Prime Video Subscription', 'amazon-prime-video-subscription', 'To watch Prime Video, you need to have an Amazon account. If you are an Amazon Prime member, you have access to Prime Video at no additional cost. If you are not an Amazon Prime member, you can sign up for a Prime Video subscription for $8.99 per month.\r\nSupports up to UHD (4K) Resolution\r\nOne Dedicated Profile on your name.\r\nStreaming from one device at a time.\r\nMaximum Login 2 Devices.\r\nFacebook/WhatsApp Delivery\r\nFull Warranty', '<ul class=\" list-reset px-2 text-grey-darker font-medium leading-tight\" data-v-24c7b72b=\"\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 0px 17px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-variant-emoji: inherit; font-stretch: inherit; line-height: inherit; font-family: Lato, Arial, Helvetica, sans-serif; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; font-size: 14px; list-style-position: initial; list-style-image: initial; --list-mb: 20px; --li-mb: 10px; --li-pl: 17px; color: rgb(119, 119, 119);\"><li data-v-24c7b72b=\"\" style=\"margin: 0px 0px 10px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit;\"><p style=\"margin-bottom: 20px; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-variant-emoji: inherit; font-stretch: inherit; line-height: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; margin-block: 0px 20px;\">Buy Amazon Prime Video Premium Subscription at Best Price in Bangladesh through Bkash, Nagad, Rocket from premiumbangladesh.com</p><h2 style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-variant-emoji: inherit; font-weight: 600; font-stretch: inherit; line-height: 1.4; font-family: Poppins, Arial, Helvetica, sans-serif; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; font-size: 24px; color: rgb(36, 36, 36); margin-block: 0px 20px; letter-spacing: normal;\"><span style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit;\">Amazon Prime Video Subscription Bangladesh&nbsp;</span></h2><div class=\"cdk-visually-hidden cdk-focus-trap-anchor\" tabindex=\"0\" aria-hidden=\"true\" style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-variant-emoji: inherit; font-stretch: inherit; line-height: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; margin-block: 0px 20px;\"><span class=\"citation-0 citation-end-0\" style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit;\">Amazon Prime Video, or simply Prime Video, is an American subscription video on-demand over-the-top streaming and rental service of Amazon offered as a standalone service or as part of Amazon’s Prime subscription.</span>&nbsp;It was launched on September 7, 2006, as Amazon Unbox and was renamed Prime Instant Video in February 2011. Prime Video became the official name in 2015.</div><div class=\"response-container-content ng-tns-c1872071689-16\" style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-variant-emoji: inherit; font-stretch: inherit; line-height: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; margin-block: 0px 20px;\"><div class=\"response-content ng-trigger ng-trigger-responsePopulation ng-tns-c1872071689-16\" style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit;\"><div class=\"markdown markdown-main-panel\" dir=\"ltr\" style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit;\"><p data-sourcepos=\"3:1-3:255\" style=\"margin-bottom: 20px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit;\">Prime Video is available in over 200 countries and territories. As of September 2022, it has over 200 million subscribers. Prime Video offers a wide variety of content, including original TV shows and movies, licensed TV shows and movies, and live sports.</p><p data-sourcepos=\"23:1-23:180\" style=\"margin-bottom: 20px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit;\">In addition to TV shows and movies, Prime Video also offers live sports coverage, including select Premier League matches, NFL Thursday Night Football, and ATP Tour tennis matches.</p><p data-sourcepos=\"25:1-25:253\" style=\"margin-bottom: 20px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit;\">To watch Prime Video, you need to have an Amazon account. If you are an Amazon Prime member, you have access to Prime Video at no additional cost. If you are not an Amazon Prime member, you can sign up for a Prime Video subscription for $8.99 per month.</p><p data-sourcepos=\"27:1-27:138\" style=\"margin-bottom: 20px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit;\">Prime Video is available on a variety of devices, including smart TVs, streaming devices, game consoles, mobile devices, and web browsers.</p><p data-sourcepos=\"29:1-29:216\" style=\"margin-bottom: 20px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit;\">Overall, Amazon Prime Video is a popular streaming service that offers a wide variety of content to choose from. It is a good option for people who are looking for a streaming service that has something for everyone.</p><h4 style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-variant: inherit; font-weight: 600; font-stretch: inherit; line-height: 1.4; font-family: Poppins, Arial, Helvetica, sans-serif; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; font-size: 18px; color: rgb(36, 36, 36);\"><span style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit;\">Warranty</span><br>1 Months 27 Days Warranty<br>3 Months 75 Days Warranty<br>6 Months 160 Days Warranty<br>12 Months 330 Days Warranty</h4></div></div></div><p style=\"margin-bottom: 20px; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-variant-emoji: inherit; font-stretch: inherit; line-height: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; margin-block: 0px 20px;\"><span style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: 600; font-stretch: inherit; line-height: inherit; font-family: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit;\">FAQ:</span></p><p style=\"margin-bottom: 20px; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-variant-emoji: inherit; font-stretch: inherit; line-height: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; margin-block: 0px 20px;\"><span style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: 600; font-stretch: inherit; line-height: inherit; font-family: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit;\">What is the price of Amazon Prime Video Premium Subscription in Bangladesh?</span></p><p style=\"margin-bottom: 20px; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-variant-emoji: inherit; font-stretch: inherit; line-height: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; margin-block: 0px 20px;\">The price of this product in Bangladesh is 79-250৳ You can buy this product from our website or facebook page.</p><p style=\"margin-bottom: 20px; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-variant-emoji: inherit; font-stretch: inherit; line-height: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; margin-block: 0px 20px;\"><span style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: 600; font-stretch: inherit; line-height: inherit; font-family: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit;\">How to Buy Amazon Prime Video Premium Subscription Premium in Bangladesh?</span></p><p style=\"margin-bottom: 20px; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-variant-emoji: inherit; font-stretch: inherit; line-height: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; margin-block: 0px 20px;\">You can purchase a premium membership on premiumbangladesh.com at cheap price.</p><p style=\"margin-bottom: 20px; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-variant-emoji: inherit; font-stretch: inherit; line-height: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; margin-block: 0px 20px;\"><span style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: 600; font-stretch: inherit; line-height: inherit; font-family: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit;\">Which payment methods are available to buy Amazon Prime Video Premium Subscription from Bangladesh?</span></p><p style=\"margin-bottom: 20px; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-variant-emoji: inherit; font-stretch: inherit; line-height: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; margin-block: 0px 20px;\">There are various payment options available, including Bkash, Nagad, Rocket, Upay, Cellfin, and more.</p><p style=\"margin-bottom: 20px; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-variant-emoji: inherit; font-stretch: inherit; line-height: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; margin-block: 0px 20px;\"><span style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: 600; font-stretch: inherit; line-height: inherit; font-family: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit;\">Is Amazon Prime video available in Bangladesh?</span><br>Amazon launches Prime video-on-demand service in Bangladesh.</p><p style=\"margin-bottom: 20px; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-variant-emoji: inherit; font-stretch: inherit; line-height: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; margin-block: 0px 20px;\"><span style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: 600; font-stretch: inherit; line-height: inherit; font-family: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit;\">How much is Ott subscription in Bangladesh?</span></p><p style=\"margin-bottom: 20px; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-variant-emoji: inherit; font-stretch: inherit; line-height: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; margin-block: 0px 20px;\">Plans range from 100<span style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: 600; font-stretch: inherit; line-height: inherit; font-family: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit;\">&nbsp;BDT to 1500 BDT</span>.</p><p style=\"margin-bottom: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-variant-emoji: inherit; font-stretch: inherit; line-height: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; margin-block: 0px 20px;\">Tag: Amazon Prime Video Premium Subscription Price in Bangladesh, Amazon Prime Video Premium Subscription Bangladesh, Buy Amazon Prime Video Premium Subscription from bd, Free Amazon Prime Video Premium Subscription subscription, buy Amazon Prime Video Premium Subscription by bkash, buy Amazon Prime Video Premium Subscription by nagad, buy Amazon Prime Video Premium Subscription by rocket, Amazon Prime Video Premium Subscription premium account Bangladesh, Amazon Prime Video Premium Subscription 1 month premium, Amazon Prime Video Premium Subscription 6 months premium, Amazon Prime Video Premium Subscription 1 year premium, Prime Video Mirzapur BD, Prime Video Bawaal BD, Prime Video Pathaan BD, Prime Video Farzi BD, Prime Video Dhootha BD, Prime Video ‘Adhura BD, Amazon prime video price bd monthly, Amazon prime video price bd 1 year, amazon prime subscription Bangladesh, amazon prime subscription fee, amazon prime video subscription fee, prime video packages, amazon prime subscription daraz, buy amazon prime account</p></li></ul>', 'published', 'products/1e6f931c-26b7-41c9-b137-10e928e21f9b.jpg', '[{\"attName\": \"Choose option\", \"attValue\": \"1 month , 6 month\", \"attVisible\": true}]', NULL, NULL, 0, NULL, 0, 0, 0, 1, NULL, 13, 8, NULL, NULL, 0, 0, 100, 350, NULL, NULL, NULL, NULL, NULL, 0, 'in_stock', 0, NULL, 0, 'physical', NULL, 0, 0, 0, '2025-08-09 04:29:36', '2025-08-09 04:29:36', NULL);
INSERT INTO `products` (`id`, `name`, `slug`, `description`, `content`, `status`, `image`, `atts`, `video_media`, `sku`, `order`, `quantity`, `allow_checkout_when_out_of_stock`, `with_storehouse_management`, `is_featured`, `brand_id`, `vendor_id`, `categorie_id`, `sub_categorie_id`, `sub_subcategorie_id`, `label_id`, `is_variation`, `sale_type`, `price`, `sale_price`, `start_date`, `end_date`, `weight`, `color`, `tax_id`, `views`, `stock_status`, `created_by_id`, `created_by`, `approved_by`, `product_type`, `cost_per_item`, `minimum_order_quantity`, `maximum_order_quantity`, `notify_attachment_updated`, `created_at`, `updated_at`, `deleted_at`) VALUES
(28, 'Men\'s shirt', 'mens-shirt', 'Cupcake ipsum dolor sit amet chocolate marzipan gingerbread. Cotton candy jelly sesame snaps tart cookie cheesecake cupcake caramels. Bear claw tootsie roll lollipop caramels gummies cotton candy topping.', '<p class=\"paragraph\" style=\"margin-bottom: 0px; padding: 10px 20px 0px; color: rgb(64, 64, 64); font-family: &quot;Museo Sans&quot;; font-size: 14.6667px;\">Cupcake ipsum dolor sit amet chocolate marzipan gingerbread. Cotton candy jelly sesame snaps tart cookie cheesecake cupcake caramels. Bear claw tootsie roll lollipop caramels gummies cotton candy topping.</p><p class=\"paragraph\" style=\"margin-bottom: 0px; padding: 10px 20px 0px; color: rgb(64, 64, 64); font-family: &quot;Museo Sans&quot;; font-size: 14.6667px;\">Tootsie roll bonbon macaroon sweet roll gingerbread. Pastry sweet roll gummies gingerbread bonbon croissant dragée. Topping topping lollipop tootsie roll jelly chocolate cake cookie pie.</p>', 'published', 'products/4d092f06-2d7b-4858-ad6e-ef0984a32d47.jpg', '[{\"attName\": \"Size\", \"attValue\": \"Small|Medium|Big\", \"attVisible\": true}, {\"attName\": \"Color\", \"attValue\": \"Blue|Red|Green\", \"attVisible\": true}]', NULL, NULL, 0, NULL, 0, 0, 0, 1, NULL, 2, NULL, NULL, NULL, 0, 0, 1000, 600, NULL, NULL, NULL, NULL, NULL, 0, 'in_stock', 0, NULL, 0, 'physical', NULL, 0, 0, 0, '2025-08-09 04:40:17', '2025-08-09 04:40:17', NULL),
(29, 'Canva Pro', 'canva-pro', 'Buy Canva Pro at Best Price in Bangladesh through Bkash, Nagad, Rocket from premiumbangladesh.com', '<h2 style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-variant-emoji: inherit; font-weight: 600; font-stretch: inherit; line-height: 1.4; font-family: Poppins, Arial, Helvetica, sans-serif; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; font-size: 24px; color: rgb(36, 36, 36); margin-block: 0px 20px; letter-spacing: normal;\">Canva Pro Subscription Bangladesh</h2><p style=\"margin-bottom: 20px; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-variant-emoji: inherit; font-stretch: inherit; line-height: inherit; font-family: Lato, Arial, Helvetica, sans-serif; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; font-size: 14px; margin-block: 0px 20px;\">Canva Pro is a premium subscription plan offered by Canva, a popular online graphic design platform. Canva is known for its user-friendly interface and a wide range of tools and templates that make it easy for users to create various visual content, including social media graphics, presentations, posters, flyers, and more. Canva Pro offers several advantages over the free version of Canva:</p><ol style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px 0px 0px 17px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-variant-emoji: inherit; font-stretch: inherit; line-height: inherit; font-family: Lato, Arial, Helvetica, sans-serif; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; font-size: 14px; list-style-position: initial; list-style-image: initial; --list-mb: 20px; --li-mb: 10px; --li-pl: 17px; margin-block: 0px 20px; color: rgb(119, 119, 119);\"><li style=\"margin: 0px 0px 10px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit;\"><span style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: 600; font-stretch: inherit; line-height: inherit; font-family: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit;\">Extended Features</span>: Canva Pro provides access to a broader set of design tools and features, including additional fonts, illustrations, photos, and templates. This allows users to create more professional and customized designs.</li><li style=\"margin: 0px 0px 10px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit;\"><span style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: 600; font-stretch: inherit; line-height: inherit; font-family: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit;\">Collaboration</span>: With Canva Pro, you can collaborate with team members and colleagues in real-time on design projects. This is useful for businesses and organizations that need to work on projects collectively.</li><li style=\"margin: 0px 0px 10px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit;\"><span style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: 600; font-stretch: inherit; line-height: inherit; font-family: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit;\">Resizable Designs</span>: Canva Pro includes the ability to create designs with adjustable dimensions, which is especially useful for various social media posts and printed materials.</li><li style=\"margin: 0px 0px 10px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit;\"><span style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: 600; font-stretch: inherit; line-height: inherit; font-family: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit;\">Access to Premium Content</span>: Canva Pro offers access to a library of premium photos, illustrations, and elements that can enhance the quality and uniqueness of your designs.</li><li style=\"margin: 0px 0px 10px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit;\"><span style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: 600; font-stretch: inherit; line-height: inherit; font-family: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit;\">One-Click Background Remover</span>: Canva Pro includes a feature that can automatically remove the background from photos, simplifying the process of creating cutouts for design projects.</li><li style=\"margin: 0px 0px 10px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit;\"><span style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: 600; font-stretch: inherit; line-height: inherit; font-family: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit;\">Custom Templates</span>: You can save your designs as templates for future use, which is beneficial for maintaining consistency across various projects.</li><li style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit;\"><span style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: 600; font-stretch: inherit; line-height: inherit; font-family: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit;\">Not included</span>:<em style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit;\">❌ Font Upload❌ Brand Tools❌ Web Publishing❌ Magic Studio❌ No Canva AI ❌ Other facilities that comes with individual accounts</em></li></ol><p style=\"margin-bottom: 20px; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-variant-emoji: inherit; font-stretch: inherit; line-height: inherit; font-family: Lato, Arial, Helvetica, sans-serif; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; font-size: 14px; margin-block: 0px 20px;\"><span style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: 600; font-stretch: inherit; line-height: inherit; font-family: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit;\">FAQ:</span></p><p style=\"margin-bottom: 20px; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-variant-emoji: inherit; font-stretch: inherit; line-height: inherit; font-family: Lato, Arial, Helvetica, sans-serif; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; font-size: 14px; margin-block: 0px 20px;\"><span style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: 600; font-stretch: inherit; line-height: inherit; font-family: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit;\">What is the price of Canva Pro in Bangladesh?</span></p><p style=\"margin-bottom: 20px; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-variant-emoji: inherit; font-stretch: inherit; line-height: inherit; font-family: Lato, Arial, Helvetica, sans-serif; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; font-size: 14px; margin-block: 0px 20px;\">The price of this product in Bangladesh is 200৳ You can buy this product from our website or facebook page.</p><p style=\"margin-bottom: 20px; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-variant-emoji: inherit; font-stretch: inherit; line-height: inherit; font-family: Lato, Arial, Helvetica, sans-serif; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; font-size: 14px; margin-block: 0px 20px;\"><span style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: 600; font-stretch: inherit; line-height: inherit; font-family: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit;\">How to Buy Canva Pro Premium in Bangladesh?</span></p><p style=\"margin-bottom: 20px; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-variant-emoji: inherit; font-stretch: inherit; line-height: inherit; font-family: Lato, Arial, Helvetica, sans-serif; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; font-size: 14px; margin-block: 0px 20px;\">You can purchase a premium membership on premiumbangladesh.com at cheap price.</p><p style=\"margin-bottom: 20px; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-variant-emoji: inherit; font-stretch: inherit; line-height: inherit; font-family: Lato, Arial, Helvetica, sans-serif; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; font-size: 14px; margin-block: 0px 20px;\"><span style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: 600; font-stretch: inherit; line-height: inherit; font-family: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit;\">Which payment methods are available to buy Canva Pro from Bangladesh?</span></p><p style=\"margin-bottom: 20px; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-variant-emoji: inherit; font-stretch: inherit; line-height: inherit; font-family: Lato, Arial, Helvetica, sans-serif; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; font-size: 14px; margin-block: 0px 20px;\">There are various payment options available, including Bkash, Nagad, Rocket, Upay, Cellfin, and more.</p><p style=\"margin-bottom: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-variant-emoji: inherit; font-stretch: inherit; line-height: inherit; font-family: Lato, Arial, Helvetica, sans-serif; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; font-size: 14px; margin-block: 0px 20px;\">Tag: Canva Pro Price in Bangladesh, Canva Pro Bangladesh, Buy Canva Pro from bd, Free Canva Pro subscription, buy Canva Pro by bkash, buy Canva Pro by nagad, buy Canva Pro by rocket, Canva Pro premium account Bangladesh, Canva Pro 1 month premium, Canva Pro 6 months premium, Canva Pro 1 year premium</p>', 'published', 'products/256a83af-31d6-4c55-849e-e83b097547ee.jpg', '[{\"attName\": \"Size\", \"attValue\": \"\", \"attVisible\": true}, {\"attName\": \"Color\", \"attValue\": \"\", \"attVisible\": true}]', NULL, NULL, 0, NULL, 0, 0, 0, 1, NULL, 15, 9, NULL, NULL, 0, 0, 250, 250, NULL, NULL, NULL, NULL, NULL, 0, 'in_stock', 0, NULL, 0, 'physical', NULL, 0, 0, 0, '2025-08-09 04:59:25', '2025-08-09 04:59:25', NULL),
(30, 'ChatGPT Plus', 'chatgpt-plus', 'Personal Account | Shared Account\r\n1 Month\r\nFor shared account users: Do not purchase ChatGPT for voice chatting\r\nCheck Terms & Conditions from description', '<div class=\"logo-gutter ng-tns-c1872071689-31 ng-star-inserted\" style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-variant-emoji: inherit; font-stretch: inherit; line-height: inherit; font-family: Lato, Arial, Helvetica, sans-serif; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; font-size: 14px; margin-block: 0px 20px; color: rgb(119, 119, 119);\"><div class=\"resize-observable\" style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit;\">ChatGPT Plus is a paid subscription plan for ChatGPT, a conversational AI developed by OpenAI. It offers a number of benefits over the free version, including:</div></div><div class=\"response-container-content ng-tns-c1872071689-31\" style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-variant-emoji: inherit; font-stretch: inherit; line-height: inherit; font-family: Lato, Arial, Helvetica, sans-serif; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; font-size: 14px; margin-block: 0px 20px; color: rgb(119, 119, 119);\"><div class=\"response-content ng-trigger ng-trigger-responsePopulation ng-tns-c1872071689-31\" style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit;\"><div class=\"markdown markdown-main-panel\" dir=\"ltr\" style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit;\"><ul data-sourcepos=\"3:1-6:0\" style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px 0px 0px 17px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; list-style-position: initial; list-style-image: initial; --list-mb: 20px; --li-mb: 10px; --li-pl: 17px;\"><li data-sourcepos=\"3:1-3:211\" style=\"margin: 0px 0px 10px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit;\"><span style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: 600; font-stretch: inherit; line-height: inherit; font-family: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit;\">General access even during peak times:</span>&nbsp;ChatGPT can sometimes be unavailable during peak times due to high demand. ChatGPT Plus subscribers have guaranteed access, even when the free version is at capacity.</li><li data-sourcepos=\"4:1-4:103\" style=\"margin: 0px 0px 10px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit;\"><span style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: 600; font-stretch: inherit; line-height: inherit; font-family: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit;\">Faster response times:</span>&nbsp;ChatGPT Plus subscribers experience faster response times than free users.</li><li data-sourcepos=\"5:1-6:0\" style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit;\"><span style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: 600; font-stretch: inherit; line-height: inherit; font-family: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit;\">Priority access to new features and improvements:</span>&nbsp;ChatGPT Plus subscribers get priority access to new features and improvements, including OpenAI’s latest and greatest updates, such as GPT-4.</li></ul></div></div></div>', 'published', 'products/ecdf395f-cedd-43f3-ad12-9c36e6c43808.jpg', '[{\"attName\": \"Size\", \"attValue\": \"\", \"attVisible\": true}, {\"attName\": \"Color\", \"attValue\": \"\", \"attVisible\": true}]', NULL, NULL, 0, NULL, 0, 0, 0, 1, NULL, 15, 9, NULL, NULL, 0, 0, 400, 2200, NULL, NULL, NULL, NULL, NULL, 0, 'in_stock', 0, NULL, 0, 'physical', NULL, 0, 0, 0, '2025-08-09 05:03:03', '2025-08-09 05:03:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

DROP TABLE IF EXISTS `product_images`;
CREATE TABLE IF NOT EXISTS `product_images` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` bigint UNSIGNED NOT NULL,
  `image_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_images_product_id_foreign` (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=72 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image_path`, `created_at`, `updated_at`) VALUES
(1, 1, 'products/1c8a74b6-9689-4aa7-a753-737c1432e39e.jpg', '2025-08-04 05:17:51', '2025-08-04 05:17:51'),
(2, 2, 'products/0a7763ec-45c8-4466-96fb-9c6882e31add.jpg', '2025-08-04 05:59:24', '2025-08-04 05:59:24'),
(3, 2, 'products/ebc6ccc1-80bb-46fe-9cfe-a196bffd05f4.jpg', '2025-08-04 05:59:24', '2025-08-04 05:59:24'),
(4, 4, 'https://placehold.co/600x400/png?text=Gallery+1+of+Product+1', '2025-08-06 06:13:38', '2025-08-06 06:13:38'),
(5, 4, 'https://placehold.co/600x400/png?text=Gallery+2+of+Product+1', '2025-08-06 06:13:38', '2025-08-06 06:13:38'),
(6, 4, 'https://placehold.co/600x400/png?text=Gallery+3+of+Product+1', '2025-08-06 06:13:38', '2025-08-06 06:13:38'),
(7, 5, 'https://placehold.co/600x400/png?text=Gallery+1+of+Product+2', '2025-08-06 06:13:38', '2025-08-06 06:13:38'),
(8, 5, 'https://placehold.co/600x400/png?text=Gallery+2+of+Product+2', '2025-08-06 06:13:38', '2025-08-06 06:13:38'),
(9, 5, 'https://placehold.co/600x400/png?text=Gallery+3+of+Product+2', '2025-08-06 06:13:38', '2025-08-06 06:13:38'),
(10, 6, 'https://placehold.co/600x400/png?text=Gallery+1+of+Product+3', '2025-08-06 06:13:38', '2025-08-06 06:13:38'),
(11, 6, 'https://placehold.co/600x400/png?text=Gallery+2+of+Product+3', '2025-08-06 06:13:38', '2025-08-06 06:13:38'),
(12, 6, 'https://placehold.co/600x400/png?text=Gallery+3+of+Product+3', '2025-08-06 06:13:38', '2025-08-06 06:13:38'),
(13, 7, 'https://placehold.co/600x400/png?text=Gallery+1+of+Product+4', '2025-08-06 06:13:38', '2025-08-06 06:13:38'),
(14, 7, 'https://placehold.co/600x400/png?text=Gallery+2+of+Product+4', '2025-08-06 06:13:38', '2025-08-06 06:13:38'),
(15, 7, 'https://placehold.co/600x400/png?text=Gallery+3+of+Product+4', '2025-08-06 06:13:38', '2025-08-06 06:13:38'),
(16, 8, 'https://placehold.co/600x400/png?text=Gallery+1+of+Product+5', '2025-08-06 06:13:38', '2025-08-06 06:13:38'),
(17, 8, 'https://placehold.co/600x400/png?text=Gallery+2+of+Product+5', '2025-08-06 06:13:38', '2025-08-06 06:13:38'),
(18, 8, 'https://placehold.co/600x400/png?text=Gallery+3+of+Product+5', '2025-08-06 06:13:38', '2025-08-06 06:13:38'),
(19, 9, 'https://placehold.co/600x400/png?text=Gallery+1+of+Product+6', '2025-08-06 06:13:38', '2025-08-06 06:13:38'),
(20, 9, 'https://placehold.co/600x400/png?text=Gallery+2+of+Product+6', '2025-08-06 06:13:38', '2025-08-06 06:13:38'),
(21, 9, 'https://placehold.co/600x400/png?text=Gallery+3+of+Product+6', '2025-08-06 06:13:38', '2025-08-06 06:13:38'),
(22, 10, 'https://placehold.co/600x400/png?text=Gallery+1+of+Product+7', '2025-08-06 06:13:38', '2025-08-06 06:13:38'),
(23, 10, 'https://placehold.co/600x400/png?text=Gallery+2+of+Product+7', '2025-08-06 06:13:38', '2025-08-06 06:13:38'),
(24, 10, 'https://placehold.co/600x400/png?text=Gallery+3+of+Product+7', '2025-08-06 06:13:38', '2025-08-06 06:13:38'),
(25, 11, 'https://placehold.co/600x400/png?text=Gallery+1+of+Product+8', '2025-08-06 06:13:38', '2025-08-06 06:13:38'),
(26, 11, 'https://placehold.co/600x400/png?text=Gallery+2+of+Product+8', '2025-08-06 06:13:38', '2025-08-06 06:13:38'),
(27, 11, 'https://placehold.co/600x400/png?text=Gallery+3+of+Product+8', '2025-08-06 06:13:38', '2025-08-06 06:13:38'),
(28, 12, 'https://placehold.co/600x400/png?text=Gallery+1+of+Product+9', '2025-08-06 06:13:38', '2025-08-06 06:13:38'),
(29, 12, 'https://placehold.co/600x400/png?text=Gallery+2+of+Product+9', '2025-08-06 06:13:38', '2025-08-06 06:13:38'),
(30, 12, 'https://placehold.co/600x400/png?text=Gallery+3+of+Product+9', '2025-08-06 06:13:38', '2025-08-06 06:13:38'),
(31, 13, 'https://placehold.co/600x400/png?text=Gallery+1+of+Product+10', '2025-08-06 06:13:38', '2025-08-06 06:13:38'),
(32, 13, 'https://placehold.co/600x400/png?text=Gallery+2+of+Product+10', '2025-08-06 06:13:38', '2025-08-06 06:13:38'),
(33, 13, 'https://placehold.co/600x400/png?text=Gallery+3+of+Product+10', '2025-08-06 06:13:38', '2025-08-06 06:13:38'),
(34, 14, 'https://placehold.co/600x400/png?text=Gallery+1+of+Product+1', '2025-08-06 06:23:49', '2025-08-06 06:23:49'),
(35, 14, 'https://placehold.co/600x400/png?text=Gallery+2+of+Product+1', '2025-08-06 06:23:49', '2025-08-06 06:23:49'),
(36, 14, 'https://placehold.co/600x400/png?text=Gallery+3+of+Product+1', '2025-08-06 06:23:49', '2025-08-06 06:23:49'),
(37, 15, 'https://placehold.co/600x400/png?text=Gallery+1+of+Product+2', '2025-08-06 06:23:49', '2025-08-06 06:23:49'),
(38, 15, 'https://placehold.co/600x400/png?text=Gallery+2+of+Product+2', '2025-08-06 06:23:49', '2025-08-06 06:23:49'),
(39, 15, 'https://placehold.co/600x400/png?text=Gallery+3+of+Product+2', '2025-08-06 06:23:49', '2025-08-06 06:23:49'),
(40, 16, 'https://placehold.co/600x400/png?text=Gallery+1+of+Product+3', '2025-08-06 06:23:49', '2025-08-06 06:23:49'),
(41, 16, 'https://placehold.co/600x400/png?text=Gallery+2+of+Product+3', '2025-08-06 06:23:49', '2025-08-06 06:23:49'),
(42, 16, 'https://placehold.co/600x400/png?text=Gallery+3+of+Product+3', '2025-08-06 06:23:49', '2025-08-06 06:23:49'),
(43, 17, 'https://placehold.co/600x400/png?text=Gallery+1+of+Product+4', '2025-08-06 06:23:49', '2025-08-06 06:23:49'),
(44, 17, 'https://placehold.co/600x400/png?text=Gallery+2+of+Product+4', '2025-08-06 06:23:49', '2025-08-06 06:23:49'),
(45, 17, 'https://placehold.co/600x400/png?text=Gallery+3+of+Product+4', '2025-08-06 06:23:49', '2025-08-06 06:23:49'),
(46, 18, 'https://placehold.co/600x400/png?text=Gallery+1+of+Product+5', '2025-08-06 06:23:49', '2025-08-06 06:23:49'),
(47, 18, 'https://placehold.co/600x400/png?text=Gallery+2+of+Product+5', '2025-08-06 06:23:49', '2025-08-06 06:23:49'),
(48, 18, 'https://placehold.co/600x400/png?text=Gallery+3+of+Product+5', '2025-08-06 06:23:49', '2025-08-06 06:23:49'),
(49, 19, 'https://placehold.co/600x400/png?text=Gallery+1+of+Product+6', '2025-08-06 06:23:49', '2025-08-06 06:23:49'),
(50, 19, 'https://placehold.co/600x400/png?text=Gallery+2+of+Product+6', '2025-08-06 06:23:49', '2025-08-06 06:23:49'),
(51, 19, 'https://placehold.co/600x400/png?text=Gallery+3+of+Product+6', '2025-08-06 06:23:49', '2025-08-06 06:23:49'),
(52, 20, 'https://placehold.co/600x400/png?text=Gallery+1+of+Product+7', '2025-08-06 06:23:49', '2025-08-06 06:23:49'),
(53, 20, 'https://placehold.co/600x400/png?text=Gallery+2+of+Product+7', '2025-08-06 06:23:49', '2025-08-06 06:23:49'),
(54, 20, 'https://placehold.co/600x400/png?text=Gallery+3+of+Product+7', '2025-08-06 06:23:49', '2025-08-06 06:23:49'),
(55, 21, 'https://placehold.co/600x400/png?text=Gallery+1+of+Product+8', '2025-08-06 06:23:49', '2025-08-06 06:23:49'),
(56, 21, 'https://placehold.co/600x400/png?text=Gallery+2+of+Product+8', '2025-08-06 06:23:49', '2025-08-06 06:23:49'),
(57, 21, 'https://placehold.co/600x400/png?text=Gallery+3+of+Product+8', '2025-08-06 06:23:49', '2025-08-06 06:23:49'),
(58, 22, 'https://placehold.co/600x400/png?text=Gallery+1+of+Product+9', '2025-08-06 06:23:49', '2025-08-06 06:23:49'),
(59, 22, 'https://placehold.co/600x400/png?text=Gallery+2+of+Product+9', '2025-08-06 06:23:49', '2025-08-06 06:23:49'),
(60, 22, 'https://placehold.co/600x400/png?text=Gallery+3+of+Product+9', '2025-08-06 06:23:49', '2025-08-06 06:23:49'),
(61, 23, 'https://placehold.co/600x400/png?text=Gallery+1+of+Product+10', '2025-08-06 06:23:49', '2025-08-06 06:23:49'),
(62, 23, 'https://placehold.co/600x400/png?text=Gallery+2+of+Product+10', '2025-08-06 06:23:49', '2025-08-06 06:23:49'),
(63, 23, 'https://placehold.co/600x400/png?text=Gallery+3+of+Product+10', '2025-08-06 06:23:49', '2025-08-06 06:23:49'),
(64, 24, 'products/44748a1b-c009-473b-b692-fe5ba4a5f457.jpg', '2025-08-09 04:09:25', '2025-08-09 04:09:25'),
(65, 25, 'products/57019713-23f2-4d46-9c85-7f56ffc6b842.jpg', '2025-08-09 04:12:55', '2025-08-09 04:12:55'),
(66, 25, 'products/4b40f8e8-98e3-4bb0-9162-c9d4097bb6e4.jpg', '2025-08-09 04:12:55', '2025-08-09 04:12:55'),
(67, 26, 'products/8704263e-da71-429d-8589-ea517889e04f.jpg', '2025-08-09 04:17:05', '2025-08-09 04:17:05'),
(68, 26, 'products/d28c91ec-58b4-4e71-9812-4934b0472957.jpg', '2025-08-09 04:17:05', '2025-08-09 04:17:05'),
(69, 28, 'products/b7f44f4d-ca30-4c04-9a70-aaf9856dc5e0.jpg', '2025-08-09 04:40:17', '2025-08-09 04:40:17'),
(70, 28, 'products/eac00bda-f443-4843-9c51-77cca4c38607.jpg', '2025-08-09 04:40:17', '2025-08-09 04:40:17'),
(71, 28, 'products/26e43832-c320-4584-b29c-7c2314c04b12.jpg', '2025-08-09 04:40:17', '2025-08-09 04:40:17');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('iAuNp5FGFsFZhuOPHKL1s5Z722pPedYvgjA4sWRD', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoicHAwbUdEZ1AwaDlMWWdwVlBtRURDWHVrUkY2TTdCU245ZEZXOFJGZCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly9iMmIuY29tL2FkbWluL3Byb2R1Y3RzL2NyZWF0ZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czo0OiJhdXRoIjthOjE6e3M6MjE6InBhc3N3b3JkX2NvbmZpcm1lZF9hdCI7aToxNzU0NzE0OTE3O319', 1754744025);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

DROP TABLE IF EXISTS `sliders`;
CREATE TABLE IF NOT EXISTS `sliders` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `video_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

DROP TABLE IF EXISTS `sub_categories`;
CREATE TABLE IF NOT EXISTS `sub_categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` bigint UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_by` int UNSIGNED DEFAULT NULL,
  `updated_by` int UNSIGNED DEFAULT NULL,
  `deleted_by` int UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sub_categories_parent_id_foreign` (`parent_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `title`, `slug`, `parent_id`, `description`, `image`, `order`, `status`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`) VALUES
(1, 'Laptops & Computers', 'laptops-computers', 1, NULL, NULL, NULL, '1', NULL, NULL, NULL, '2025-07-30 01:06:19', '2025-08-03 04:33:56'),
(2, 'Cell Phones', 'cell-phones', 1, NULL, NULL, NULL, '1', NULL, NULL, NULL, '2025-07-30 01:07:02', '2025-07-30 01:07:02'),
(3, 'Printers', 'printers', 1, NULL, NULL, NULL, '1', NULL, NULL, NULL, '2025-07-30 02:38:01', '2025-08-04 03:00:10'),
(9, 'Subscription', 'subscription', 15, NULL, NULL, NULL, '1', NULL, NULL, NULL, '2025-08-09 04:54:55', '2025-08-09 04:54:55'),
(5, 'Digital Cameras', 'digital-cameras', 1, NULL, NULL, NULL, '1', NULL, NULL, NULL, '2025-07-31 06:09:28', '2025-07-31 06:09:28'),
(6, 'ICT', 'ict', 1, NULL, NULL, NULL, '1', NULL, NULL, NULL, '2025-07-31 07:01:01', '2025-07-31 07:01:01'),
(7, 'HRM', 'hrm', 13, NULL, NULL, NULL, '1', NULL, NULL, NULL, '2025-07-31 07:02:29', '2025-07-31 07:02:29'),
(8, 'Education Management', 'education-management', 13, NULL, NULL, NULL, '1', NULL, NULL, NULL, '2025-07-31 07:03:16', '2025-07-31 07:03:16'),
(10, 'Shirts', 'shirts', 2, NULL, NULL, NULL, '1', NULL, NULL, NULL, '2025-08-09 06:01:53', '2025-08-09 06:01:53'),
(11, 'Pants', 'pants', 2, NULL, NULL, NULL, '1', NULL, NULL, NULL, '2025-08-09 06:02:10', '2025-08-09 06:02:10');

-- --------------------------------------------------------

--
-- Table structure for table `sub_subcategories`
--

DROP TABLE IF EXISTS `sub_subcategories`;
CREATE TABLE IF NOT EXISTS `sub_subcategories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categorie_id` bigint UNSIGNED NOT NULL,
  `sub_categorie_id` bigint NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sub_subcategories_subcategory_id_foreign` (`categorie_id`),
  KEY `sub_categorie_id` (`sub_categorie_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_subcategories`
--

INSERT INTO `sub_subcategories` (`id`, `title`, `slug`, `categorie_id`, `sub_categorie_id`, `description`, `image`, `order`, `status`, `created_at`, `updated_at`) VALUES
(6, 'Hard Drives & Storage', 'hard-drives-storage', 1, 1, NULL, NULL, NULL, '1', '2025-08-03 06:38:20', '2025-08-03 06:38:20'),
(3, 'Desktop Computers', 'desktop-computers', 1, 1, NULL, NULL, NULL, '1', '2025-07-31 06:10:32', '2025-07-31 06:10:32'),
(4, 'School Mangement', 'school-mangement', 13, 8, NULL, NULL, NULL, '1', '2025-07-31 07:05:32', '2025-07-31 07:05:32'),
(5, 'Mother  Board', 'mother-board', 1, 1, NULL, NULL, NULL, '1', '2025-08-03 05:45:47', '2025-08-03 05:45:47'),
(7, 'Cell Phone Chargers', 'cell-phone-chargers', 1, 2, NULL, NULL, NULL, '1', '2025-08-04 03:01:28', '2025-08-04 03:01:28'),
(8, 'Mans', 'mans', 2, 10, NULL, NULL, NULL, '1', '2025-08-09 06:03:35', '2025-08-09 06:03:35'),
(9, 'Kids', 'kids', 2, 10, NULL, NULL, NULL, '1', '2025-08-09 06:03:52', '2025-08-09 06:03:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Rajib Test', 'admin@gmail.com', '2025-07-29 12:13:25', '$2y$12$fK6Yn8q4G8rhVpybglc3i.dDz00O0cCGv42zo0LLhl.4xqFn4YdyC', NULL, '2025-07-29 06:02:50', '2025-07-29 06:02:50', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

DROP TABLE IF EXISTS `vendors`;
CREATE TABLE IF NOT EXISTS `vendors` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `vendor_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `contact_person` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `business_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_registration_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_terms` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `join_date` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  `references` text COLLATE utf8mb4_unicode_ci,
  `file_path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_category_id` bigint UNSIGNED NOT NULL,
  `sub_categories_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `vendors_vendor_id_unique` (`vendor_id`),
  UNIQUE KEY `vendors_email_unique` (`email`),
  UNIQUE KEY `vendors_business_registration_number_unique` (`business_registration_number`),
  KEY `vendors_vendor_category_id_foreign` (`vendor_category_id`),
  KEY `vendors_sub_categories_id_foreign` (`sub_categories_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vendor_categories`
--

DROP TABLE IF EXISTS `vendor_categories`;
CREATE TABLE IF NOT EXISTS `vendor_categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `template` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int UNSIGNED DEFAULT NULL,
  `updated_by` int UNSIGNED DEFAULT NULL,
  `deleted_by` int UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vendor_contacts`
--

DROP TABLE IF EXISTS `vendor_contacts`;
CREATE TABLE IF NOT EXISTS `vendor_contacts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `selling_product_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `month_order` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target_customers` json DEFAULT NULL,
  `minimum_order_qty` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `factory_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `whats_up` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wholesale_confirmation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trade_licence` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unread',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

DROP TABLE IF EXISTS `videos`;
CREATE TABLE IF NOT EXISTS `videos` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

DROP TABLE IF EXISTS `visitors`;
CREATE TABLE IF NOT EXISTS `visitors` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_agent` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visited_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
