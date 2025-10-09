-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 07, 2025 at 04:35 PM
-- Server version: 8.0.31
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gurukrupa_real_estate`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
CREATE TABLE IF NOT EXISTS `blogs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `featured_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `status` enum('published','draft') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft',
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `blogs_slug_unique` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `slug`, `content`, `excerpt`, `featured_image`, `meta_title`, `meta_description`, `status`, `is_featured`, `published_at`, `created_at`, `updated_at`) VALUES
(1, 'Future of Real Estate: Smart Homes and Sustainability', 'future-of-real-estate-smart-homes-and-sustainability', '<p>The real estate industry is rapidly evolving with the integration of smart home technologies and sustainable building practices. Modern homeowners are increasingly looking for properties that offer both convenience and environmental responsibility.</p><p>Smart homes equipped with IoT devices, automated systems, and energy-efficient appliances are becoming the new standard. These technologies not only provide comfort and security but also significantly reduce energy consumption and environmental impact.</p><p>Sustainability in construction involves using eco-friendly materials, implementing renewable energy sources, and designing buildings that work harmoniously with their natural surroundings. Green building certifications like LEED and IGBC are becoming essential for new developments.</p>', 'Exploring how smart home technologies and sustainable building practices are shaping the future of real estate.', 'blogs/smart-homes.jpg', NULL, NULL, 'published', 1, '2025-09-30 08:02:04', '2025-10-05 08:02:04', '2025-10-05 08:02:04'),
(2, 'Investment Opportunities in Commercial Real Estate', 'investment-opportunities-in-commercial-real-estate', '<p>Commercial real estate continues to be a lucrative investment option for both individual and institutional investors. The sector offers various opportunities including office spaces, retail properties, warehouses, and hospitality assets.</p><p>Key factors driving commercial real estate investments include location advantages, infrastructure development, and economic growth in the region. Properties in prime business districts with good connectivity and modern amenities tend to provide better returns.</p><p>Investors should consider factors like rental yields, capital appreciation potential, tenant quality, and market trends before making investment decisions. Diversification across different property types and locations can help mitigate risks.</p>', 'A comprehensive guide to commercial real estate investment opportunities and key considerations.', 'blogs/commercial-real-estate.jpg', NULL, NULL, 'published', 0, '2025-09-25 08:02:04', '2025-10-05 08:02:04', '2025-10-05 08:02:04'),
(3, 'Home Buying Guide: First-Time Buyer Tips', 'home-buying-guide-first-time-buyer-tips', '<p>Buying your first home is one of the most significant financial decisions you\'ll make. This comprehensive guide covers everything first-time buyers need to know to make informed decisions.</p><p>Start by determining your budget, including down payment, closing costs, and ongoing expenses. Get pre-approved for a mortgage to understand your borrowing capacity and strengthen your offer when you find the right property.</p><p>Location is crucial - consider factors like proximity to work, schools, healthcare facilities, and future development plans. Don\'t forget to factor in property taxes, insurance, and maintenance costs when calculating affordability.</p>', 'Essential tips and guidance for first-time home buyers to navigate the property market successfully.', 'blogs/first-time-buyer.jpg', NULL, NULL, 'published', 1, '2025-09-20 08:02:04', '2025-10-05 08:02:04', '2025-10-05 08:02:04');

-- --------------------------------------------------------

--
-- Table structure for table `inquiries`
--

DROP TABLE IF EXISTS `inquiries`;
CREATE TABLE IF NOT EXISTS `inquiries` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('new','read','replied','closed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new',
  `project_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `inquiries_project_id_foreign` (`project_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inquiries`
--

INSERT INTO `inquiries` (`id`, `name`, `email`, `phone`, `message`, `subject`, `status`, `project_id`, `created_at`, `updated_at`) VALUES
(1, 'Isadora Abbott', 'ryjasi@mailinator.com', '2323232323', 'Test Messages', 'Test', 'new', 1, '2025-10-05 08:29:42', '2025-10-05 08:29:42');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2024_01_01_000001_create_users_table', 1),
(2, '2024_01_01_000002_create_projects_table', 2),
(3, '2024_01_01_000003_create_project_images_table', 3),
(4, '2024_01_01_000004_create_blogs_table', 3),
(5, '2024_01_01_000005_create_inquiries_table', 3),
(6, '2024_01_01_000006_create_settings_table', 3),
(7, '2024_01_01_000007_create_teams_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
CREATE TABLE IF NOT EXISTS `projects` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci,
  `category` enum('new_launch','ongoing','completed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new_launch',
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `area` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(15,2) DEFAULT NULL,
  `features` json DEFAULT NULL,
  `map_lat` decimal(10,8) DEFAULT NULL,
  `map_lng` decimal(11,8) DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `slug`, `description`, `short_description`, `category`, `location`, `start_date`, `end_date`, `area`, `price`, `features`, `map_lat`, `map_lng`, `meta_title`, `meta_description`, `is_featured`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Luxury Heights Apartments', 'luxury-heights-apartments', 'Premium residential complex with world-class amenities and modern architecture. Located in the heart of the city with easy access to business districts.', 'Premium residential complex with world-class amenities.', 'completed', 'Bandra West, Mumbai', '2022-01-01', '2024-06-30', '2.5 Acres', '25000000.00', '[\"Swimming Pool\", \"Gymnasium\", \"Parking\", \"Security\", \"Garden\", \"Club House\"]', '19.05440000', '72.84060000', NULL, NULL, 1, 1, '2025-10-05 08:02:04', '2025-10-05 08:02:04'),
(2, 'Business Park Towers', 'business-park-towers', 'Modern commercial complex designed for corporate offices with state-of-the-art facilities and sustainable design.', 'Modern commercial complex for corporate offices.', 'ongoing', 'Andheri East, Mumbai', '2023-03-01', '2025-12-31', '5.0 Acres', '50000000.00', '[\"Conference Rooms\", \"Cafeteria\", \"Parking\", \"Security\", \"Landscaping\", \"Power Backup\"]', '19.11360000', '72.86970000', NULL, NULL, 1, 1, '2025-10-05 08:02:04', '2025-10-05 08:02:04'),
(3, 'Green Valley Villas', 'green-valley-villas', 'Eco-friendly residential villas with sustainable living features and beautiful landscaping.', 'Eco-friendly residential villas with sustainable features.', 'new_launch', 'Pune, Maharashtra', '2024-01-01', '2026-06-30', '10.0 Acres', '15000000.00', '[\"Solar Panels\", \"Rainwater Harvesting\", \"Organic Garden\", \"Electric Vehicle Charging\", \"Smart Home Features\"]', '18.52040000', '73.85670000', NULL, NULL, 0, 1, '2025-10-05 08:02:04', '2025-10-05 08:02:04');

-- --------------------------------------------------------

--
-- Table structure for table `project_images`
--

DROP TABLE IF EXISTS `project_images`;
CREATE TABLE IF NOT EXISTS `project_images` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `project_id` bigint UNSIGNED NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_primary` tinyint(1) NOT NULL DEFAULT '0',
  `sort_order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `project_images_project_id_foreign` (`project_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_images`
--

INSERT INTO `project_images` (`id`, `project_id`, `image_path`, `alt_text`, `is_primary`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 1, 'projects/sample-1-1.jpg', 'Luxury Heights Apartments - Image 1', 1, 0, '2025-10-05 08:02:04', '2025-10-05 08:02:04'),
(2, 1, 'projects/sample-1-2.jpg', 'Luxury Heights Apartments - Image 2', 0, 1, '2025-10-05 08:02:04', '2025-10-05 08:02:04'),
(3, 1, 'projects/sample-1-3.jpg', 'Luxury Heights Apartments - Image 3', 0, 2, '2025-10-05 08:02:04', '2025-10-05 08:02:04'),
(4, 2, 'projects/sample-2-1.jpg', 'Business Park Towers - Image 1', 1, 0, '2025-10-05 08:02:04', '2025-10-05 08:02:04'),
(5, 2, 'projects/sample-2-2.jpg', 'Business Park Towers - Image 2', 0, 1, '2025-10-05 08:02:04', '2025-10-05 08:02:04'),
(6, 2, 'projects/sample-2-3.jpg', 'Business Park Towers - Image 3', 0, 2, '2025-10-05 08:02:04', '2025-10-05 08:02:04'),
(7, 3, 'projects/sample-3-1.jpg', 'Green Valley Villas - Image 1', 1, 0, '2025-10-05 08:02:04', '2025-10-05 08:02:04'),
(8, 3, 'projects/sample-3-2.jpg', 'Green Valley Villas - Image 2', 0, 1, '2025-10-05 08:02:04', '2025-10-05 08:02:04'),
(9, 3, 'projects/sample-3-3.jpg', 'Green Valley Villas - Image 3', 0, 2, '2025-10-05 08:02:04', '2025-10-05 08:02:04');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'text',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `type`, `created_at`, `updated_at`) VALUES
(1, 'site_name', 'Gurukrupa Real Estate', 'text', '2025-10-05 08:02:04', '2025-10-05 08:02:04'),
(2, 'site_description', 'Leading real estate developer specializing in premium residential and commercial projects.', 'text', '2025-10-05 08:02:04', '2025-10-05 08:02:04'),
(3, 'contact_email', 'info@gurukrupa.com', 'text', '2025-10-05 08:02:04', '2025-10-05 08:02:04'),
(4, 'contact_phone', '+91 9876543210', 'text', '2025-10-05 08:02:04', '2025-10-05 08:02:04'),
(5, 'contact_address', '123 Business District, Mumbai, Maharashtra 400001', 'text', '2025-10-05 08:02:04', '2025-10-05 08:02:04'),
(6, 'social_facebook', 'https://facebook.com/gurukrupa', 'text', '2025-10-05 08:02:04', '2025-10-05 08:02:04'),
(7, 'social_twitter', 'https://twitter.com/gurukrupa', 'text', '2025-10-05 08:02:04', '2025-10-05 08:02:04'),
(8, 'social_instagram', 'https://instagram.com/gurukrupa', 'text', '2025-10-05 08:02:04', '2025-10-05 08:02:04'),
(9, 'social_linkedin', 'https://linkedin.com/company/gurukrupa', 'text', '2025-10-05 08:02:04', '2025-10-05 08:02:04'),
(10, 'google_maps_api_key', '', 'text', '2025-10-05 08:02:04', '2025-10-05 08:02:04');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `teams`;
CREATE TABLE IF NOT EXISTS `teams` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_links` json DEFAULT NULL,
  `sort_order` int NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `position`, `bio`, `image`, `email`, `phone`, `social_links`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Rajesh Kumar', 'Founder & CEO', 'With over 20 years of experience in real estate development, Rajesh has led the company to become one of the most trusted names in the industry.', 'team/rajesh-kumar.jpg', 'rajesh@gurukrupa.com', '+91 9876543210', '{\"twitter\": \"https://twitter.com/rajesh_kumar\", \"linkedin\": \"https://linkedin.com/in/rajesh-kumar\"}', 1, 1, '2025-10-05 08:02:04', '2025-10-05 08:02:04'),
(2, 'Priya Sharma', 'Chief Operating Officer', 'Priya brings extensive experience in project management and operations, ensuring smooth execution of all our development projects.', 'team/priya-sharma.jpg', 'priya@gurukrupa.com', '+91 9876543211', '{\"linkedin\": \"https://linkedin.com/in/priya-sharma\"}', 2, 1, '2025-10-05 08:02:04', '2025-10-05 08:02:04'),
(3, 'Amit Patel', 'Head of Sales', 'Amit leads our sales team with a customer-first approach, helping clients find their perfect property investment.', 'team/amit-patel.jpg', 'amit@gurukrupa.com', '+91 9876543212', '{\"twitter\": \"https://twitter.com/amit_patel\", \"linkedin\": \"https://linkedin.com/in/amit-patel\"}', 3, 1, '2025-10-05 08:02:04', '2025-10-05 08:02:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('superadmin','admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'admin@gurukrupa.com', '2025-10-05 07:59:14', '$2y$12$PCnGDdWW0gVaXV8/f748puybfg4kMVp.eVo9ga52U2GdqPbcUFmmu', 'superadmin', NULL, '2025-10-05 07:59:14', '2025-10-05 07:59:14'),
(2, 'Admin User', 'admin@example.com', '2025-10-05 07:59:15', '$2y$12$3inonQj8oSwS6RGknLqi..QLap22k5MMM04j9dsg4133VflBHDDDi', 'admin', NULL, '2025-10-05 07:59:15', '2025-10-05 07:59:15'),
(3, 'Super Admin', 'admin@gurukrupa.com', '2025-10-05 08:02:04', '$2y$12$kKIjjymi9yYO3DWKUP5Ot.vhAZvaBDY1LwTjGocIuBEAxi63vGnMK', 'superadmin', NULL, '2025-10-05 08:02:04', '2025-10-05 08:02:04'),
(4, 'Admin User', 'admin@example.com', '2025-10-05 08:02:04', '$2y$12$8tCDdh5d0j8rgnSX2FwG/e0Pj8FwU.I4pnqyRttEwTCxee/x16Iim', 'admin', NULL, '2025-10-05 08:02:04', '2025-10-05 08:02:04');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
