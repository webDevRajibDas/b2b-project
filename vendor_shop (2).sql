-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 07, 2025 at 12:47 PM
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
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
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(20, '2025_07_29_101222_create_sub_subcategories_table', 1);

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
  KEY `products_brand_id_status_is_variation_created_at_index` (`brand_id`,`status`,`is_variation`,`created_at`),
  KEY `sale_type_index` (`sale_type`),
  KEY `start_date_index` (`start_date`),
  KEY `end_date_index` (`end_date`),
  KEY `sale_price_index` (`sale_price`),
  KEY `is_variation_index` (`is_variation`),
  KEY `products_sku_index` (`sku`),
  KEY `sale_price` (`sale_price`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `description`, `content`, `status`, `image`, `atts`, `video_media`, `sku`, `order`, `quantity`, `allow_checkout_when_out_of_stock`, `with_storehouse_management`, `is_featured`, `brand_id`, `vendor_id`, `categorie_id`, `sub_categorie_id`, `sub_subcategorie_id`, `is_variation`, `sale_type`, `price`, `sale_price`, `start_date`, `end_date`, `weight`, `color`, `tax_id`, `views`, `stock_status`, `created_by_id`, `created_by`, `approved_by`, `product_type`, `cost_per_item`, `minimum_order_quantity`, `maximum_order_quantity`, `notify_attachment_updated`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'আর্কষনীয় পাকিস্তানী পেশয়ারী স্যান্ডেল 🔥🔥', 'আর্কষনীয়-পাকিস্তানী-পেশয়ারী-স্যান্ডেল', 'সরাসরি পাকিস্তানী থেকে আমদানিকৃত।\r\n➡  আসল চামড়ায় তৈরি, যা আপনার প্রতিটি পদক্ষেপে আরাম এবং স্টাইল নিশ্চিত করবে। \r\n➡  গুণগত মানে আপোষ নয়!', '<p>➡ সরাসরি পাকিস্তানী থেকে আমদানিকৃত।</p><p>➡&nbsp; আসল চামড়ায় তৈরি, যা আপনার প্রতিটি পদক্ষেপে আরাম এবং স্টাইল নিশ্চিত করবে।&nbsp;</p><p>➡&nbsp; গুণগত মানে আপোষ নয়!</p><p>➡&nbsp; হাই কোয়ালিটি ফিনিশিং।</p><p>➡ আপনাদের জন্য দারুণ অফারে স্টাইলিশ স্যান্ডেল!</p><p>➡ স্টক শেষ হওয়ার আগেই অর্ডার করুন।&nbsp;</p><p>➡ অর্ডার করতে এখনই অর্ডার বাটন ক্লিক করুন অথবা মেসেজ করুন আমাদের ফেসবুক পেজে।</p><p>➡ কোন&nbsp; অগ্রীম ছাড়াই অর্ডার করুন, পণ্য হাতে পেয়ে মূল্য পরিশোধ করুন</p>', 'published', 'products/d1958f6d-68d3-4dfc-b4fc-f8bb6b4d64a8.jpg', '[{\"attName\": \"Size\", \"attValue\": \" 7, 8, 9, 10\", \"attVisible\": true}, {\"attName\": \"Color\", \"attValue\": \"Blue|Red|Green\", \"attVisible\": true}]', NULL, NULL, 0, NULL, 0, 0, 0, 1, NULL, 1, 1, 3, 0, 0, 4500, 4000, NULL, NULL, NULL, NULL, NULL, 0, 'in_stock', 0, NULL, 0, 'physical', NULL, 0, 0, 0, '2025-08-04 05:17:51', '2025-08-04 05:17:51', NULL),
(2, 'আর্কষনীয় পাকিস্তানী পেশয়ারী স্যান্ডেল', 'arkshneey-pakistanee-pesyaree-szandel', 'সরাসরি পাকিস্তানী থেকে আমদানিকৃত।\r\n➡  আসল চামড়ায় তৈরি, যা আপনার প্রতিটি পদক্ষেপে আরাম এবং স্টাইল নিশ্চিত করবে। \r\n➡  গুণগত মানে আপোষ নয়!\r\n➡  হাই কোয়ালিটি ফিনিশিং।\r\n➡ আপনাদের জন্য দারুণ অফারে স্টাইলিশ স্যান্ডেল!', '<div dir=\"auto\" style=\"font-family: &quot;Segoe UI Historic&quot;, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif; color: rgb(8, 8, 9); font-size: 14px; white-space-collapse: preserve;\">সরাসরি পাকিস্তানী থেকে আমদানিকৃত।</div><div dir=\"auto\" style=\"font-family: &quot;Segoe UI Historic&quot;, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif; color: rgb(8, 8, 9); font-size: 14px; white-space-collapse: preserve;\"><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\" style=\"text-align: inherit; padding: 0px; overflow-wrap: break-word; margin: 0px 1px; display: inline-flex; vertical-align: middle; width: 16px; height: 16px; font-family: inherit;\"><img height=\"16\" width=\"16\" class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" alt=\"➡\" referrerpolicy=\"origin-when-cross-origin\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t9e/1/16/27a1.png\" style=\"border: 0px; border-radius: 0px; object-fit: fill;\"></span>  আসল চামড়ায় তৈরি, যা আপনার প্রতিটি পদক্ষেপে আরাম এবং স্টাইল নিশ্চিত করবে। </div><div dir=\"auto\" style=\"font-family: &quot;Segoe UI Historic&quot;, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif; color: rgb(8, 8, 9); font-size: 14px; white-space-collapse: preserve;\"><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\" style=\"text-align: inherit; padding: 0px; overflow-wrap: break-word; margin: 0px 1px; display: inline-flex; vertical-align: middle; width: 16px; height: 16px; font-family: inherit;\"><img height=\"16\" width=\"16\" class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" alt=\"➡\" referrerpolicy=\"origin-when-cross-origin\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t9e/1/16/27a1.png\" style=\"border: 0px; border-radius: 0px; object-fit: fill;\"></span>  গুণগত মানে আপোষ নয়!</div><div dir=\"auto\" style=\"font-family: &quot;Segoe UI Historic&quot;, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif; color: rgb(8, 8, 9); font-size: 14px; white-space-collapse: preserve;\"><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\" style=\"text-align: inherit; padding: 0px; overflow-wrap: break-word; margin: 0px 1px; display: inline-flex; vertical-align: middle; width: 16px; height: 16px; font-family: inherit;\"><img height=\"16\" width=\"16\" class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" alt=\"➡\" referrerpolicy=\"origin-when-cross-origin\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t9e/1/16/27a1.png\" style=\"border: 0px; border-radius: 0px; object-fit: fill;\"></span>  হাই কোয়ালিটি ফিনিশিং।</div><div dir=\"auto\" style=\"font-family: &quot;Segoe UI Historic&quot;, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif; color: rgb(8, 8, 9); font-size: 14px; white-space-collapse: preserve;\"><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\" style=\"text-align: inherit; padding: 0px; overflow-wrap: break-word; margin: 0px 1px; display: inline-flex; vertical-align: middle; width: 16px; height: 16px; font-family: inherit;\"><img height=\"16\" width=\"16\" class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" alt=\"➡\" referrerpolicy=\"origin-when-cross-origin\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t9e/1/16/27a1.png\" style=\"border: 0px; border-radius: 0px; object-fit: fill;\"></span> ছবির সাথে মিল না থাকলে ফ্রি রিটার্ন।</div><div dir=\"auto\" style=\"font-family: &quot;Segoe UI Historic&quot;, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif; color: rgb(8, 8, 9); font-size: 14px; white-space-collapse: preserve;\"><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\" style=\"text-align: inherit; padding: 0px; overflow-wrap: break-word; margin: 0px 1px; display: inline-flex; vertical-align: middle; width: 16px; height: 16px; font-family: inherit;\"><img height=\"16\" width=\"16\" class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" alt=\"➡\" referrerpolicy=\"origin-when-cross-origin\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t9e/1/16/27a1.png\" style=\"border: 0px; border-radius: 0px; object-fit: fill;\"></span> আপনাদের জন্য দারুণ অফারে স্টাইলিশ স্যান্ডেল!</div><div dir=\"auto\" style=\"font-family: &quot;Segoe UI Historic&quot;, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif; color: rgb(8, 8, 9); font-size: 14px; white-space-collapse: preserve;\"><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\" style=\"text-align: inherit; padding: 0px; overflow-wrap: break-word; margin: 0px 1px; display: inline-flex; vertical-align: middle; width: 16px; height: 16px; font-family: inherit;\"><img height=\"16\" width=\"16\" class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" alt=\"➡\" referrerpolicy=\"origin-when-cross-origin\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t9e/1/16/27a1.png\" style=\"border: 0px; border-radius: 0px; object-fit: fill;\"></span> স্টক শেষ হওয়ার আগেই অর্ডার করুন। </div><div dir=\"auto\" style=\"font-family: &quot;Segoe UI Historic&quot;, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif; color: rgb(8, 8, 9); font-size: 14px; white-space-collapse: preserve;\"><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\" style=\"text-align: inherit; padding: 0px; overflow-wrap: break-word; margin: 0px 1px; display: inline-flex; vertical-align: middle; width: 16px; height: 16px; font-family: inherit;\"><img height=\"16\" width=\"16\" class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" alt=\"➡\" referrerpolicy=\"origin-when-cross-origin\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t9e/1/16/27a1.png\" style=\"border: 0px; border-radius: 0px; object-fit: fill;\"></span> অর্ডার করতে এখনই অর্ডার বাটন ক্লিক করুন অথবা মেসেজ করুন আমাদের ফেসবুক পেজে।</div><div dir=\"auto\" style=\"font-family: &quot;Segoe UI Historic&quot;, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif; color: rgb(8, 8, 9); font-size: 14px; white-space-collapse: preserve;\"><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\" style=\"text-align: inherit; padding: 0px; overflow-wrap: break-word; margin: 0px 1px; display: inline-flex; vertical-align: middle; width: 16px; height: 16px; font-family: inherit;\"><img height=\"16\" width=\"16\" class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" alt=\"➡\" referrerpolicy=\"origin-when-cross-origin\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t9e/1/16/27a1.png\" style=\"border: 0px; border-radius: 0px; object-fit: fill;\"></span> কোন  অগ্রীম ছাড়াই অর্ডার করুন, পণ্য হাতে পেয়ে মূল্য পরিশোধ করুন</div>', 'published', 'products/d49240c1-c81a-4e0d-8276-9fc473365e94.jpg', '[{\"attName\": \"Size\", \"attValue\": \"UK Size: 7, 8, 9, 10\", \"attVisible\": true}, {\"attName\": \"Color\", \"attValue\": \"Blue|Red|Green\", \"attVisible\": true}]', NULL, NULL, 0, NULL, 0, 0, 0, 1, NULL, 12, NULL, NULL, 0, 0, 4800, 4500, NULL, NULL, NULL, NULL, NULL, 0, 'in_stock', 0, NULL, 0, 'physical', NULL, 0, 0, 0, '2025-08-04 05:59:24', '2025-08-04 05:59:24', NULL);

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
) ENGINE=MyISAM AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(63, 23, 'https://placehold.co/600x400/png?text=Gallery+3+of+Product+10', '2025-08-06 06:23:49', '2025-08-06 06:23:49');

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
('ghDt6UlNxrplpWm8Un2TOfYTdzxE7vuvEh4qk828', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiM1hIV3lMd3FjNDIySFhuYzFrZU9zM3NEbk9HZ3NXemVuRmhsS05TNyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHA6Ly9iMmIuY29tL2NhcnRzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyMzoiaHR0cDovL2IyYi5jb20vY2hlY2tvdXQiO319', 1754570570);

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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `title`, `slug`, `parent_id`, `description`, `image`, `order`, `status`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`) VALUES
(1, 'Laptops & Computers', 'laptops-computers', 1, NULL, NULL, NULL, '1', NULL, NULL, NULL, '2025-07-30 01:06:19', '2025-08-03 04:33:56'),
(2, 'Cell Phones', 'cell-phones', 1, NULL, NULL, NULL, '1', NULL, NULL, NULL, '2025-07-30 01:07:02', '2025-07-30 01:07:02'),
(3, 'Printers', 'printers', 1, NULL, NULL, NULL, '1', NULL, NULL, NULL, '2025-07-30 02:38:01', '2025-08-04 03:00:10'),
(5, 'Digital Cameras', 'digital-cameras', 1, NULL, NULL, NULL, '1', NULL, NULL, NULL, '2025-07-31 06:09:28', '2025-07-31 06:09:28'),
(6, 'ICT', 'ict', 1, NULL, NULL, NULL, '1', NULL, NULL, NULL, '2025-07-31 07:01:01', '2025-07-31 07:01:01'),
(7, 'HRM', 'hrm', 13, NULL, NULL, NULL, '1', NULL, NULL, NULL, '2025-07-31 07:02:29', '2025-07-31 07:02:29'),
(8, 'Education Management', 'education-management', 13, NULL, NULL, NULL, '1', NULL, NULL, NULL, '2025-07-31 07:03:16', '2025-07-31 07:03:16');

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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_subcategories`
--

INSERT INTO `sub_subcategories` (`id`, `title`, `slug`, `categorie_id`, `sub_categorie_id`, `description`, `image`, `order`, `status`, `created_at`, `updated_at`) VALUES
(6, 'Hard Drives & Storage', 'hard-drives-storage', 1, 1, NULL, NULL, NULL, '1', '2025-08-03 06:38:20', '2025-08-03 06:38:20'),
(3, 'Desktop Computers', 'desktop-computers', 1, 1, NULL, NULL, NULL, '1', '2025-07-31 06:10:32', '2025-07-31 06:10:32'),
(4, 'School Mangement', 'school-mangement', 13, 8, NULL, NULL, NULL, '1', '2025-07-31 07:05:32', '2025-07-31 07:05:32'),
(5, 'Mother  Board', 'mother-board', 1, 1, NULL, NULL, NULL, '1', '2025-08-03 05:45:47', '2025-08-03 05:45:47'),
(7, 'Cell Phone Chargers', 'cell-phone-chargers', 1, 2, NULL, NULL, NULL, '1', '2025-08-04 03:01:28', '2025-08-04 03:01:28');

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
