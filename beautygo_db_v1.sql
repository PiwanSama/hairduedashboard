-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 27, 2020 at 06:39 PM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beautygo_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
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
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(9, '2014_10_12_000000_create_users_table', 1),
(10, '2014_10_12_100000_create_password_resets_table', 1),
(11, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(12, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(13, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(14, '2016_06_01_000004_create_oauth_clients_table', 1),
(15, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(16, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

DROP TABLE IF EXISTS `oauth_access_tokens`;
CREATE TABLE IF NOT EXISTS `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('57b986e263c86b56db71ccde52d16b0502be2208ad5ce2faa580fa2592fcb6629e8a6505518e4803', '1', '91ddd16f-68ae-40ac-913f-bf394dc9c17a', 'authToken', '[]', 0, '2020-10-27 14:34:36', '2020-10-27 14:34:36', '2021-10-27 17:34:36');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

DROP TABLE IF EXISTS `oauth_auth_codes`;
CREATE TABLE IF NOT EXISTS `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_auth_codes_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

DROP TABLE IF EXISTS `oauth_clients`;
CREATE TABLE IF NOT EXISTS `oauth_clients` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
('91ddd161-e796-4353-a480-58ae327cf4fe', NULL, 'Laravel Personal Access Client', 'u6Ntx1rBOzwtzsXhhpfOwh6yd4AYaYJF5LkXzlCK', NULL, 'http://localhost', 1, 0, 0, '2020-10-27 14:14:26', '2020-10-27 14:14:26'),
('91ddd16f-68ae-40ac-913f-bf394dc9c17a', NULL, 'Laravel Personal Access Client', 'd7zxM6JQ3iofRVIBWBdDOmlpokFq3gPzpSb9aqZ5', NULL, 'http://localhost', 1, 0, 0, '2020-10-27 14:14:35', '2020-10-27 14:14:35');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

DROP TABLE IF EXISTS `oauth_personal_access_clients`;
CREATE TABLE IF NOT EXISTS `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `client_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, '91ddd161-e796-4353-a480-58ae327cf4fe', '2020-10-27 14:14:26', '2020-10-27 14:14:26'),
(2, '91ddd16f-68ae-40ac-913f-bf394dc9c17a', '2020-10-27 14:14:35', '2020-10-27 14:14:35');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

DROP TABLE IF EXISTS `oauth_refresh_tokens`;
CREATE TABLE IF NOT EXISTS `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `product_id` char(36) NOT NULL,
  `product_name` varchar(45) DEFAULT NULL,
  `product_old_price` decimal(19,0) DEFAULT NULL,
  `product_price` decimal(19,0) DEFAULT NULL,
  `p_img_url` varchar(60) DEFAULT NULL,
  `p_reviews_count` int(11) DEFAULT NULL,
  `p_service_category_id` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL,
  `created_at` timestamp NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `p_service_type_id_idx` (`p_service_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_old_price`, `product_price`, `p_img_url`, `p_reviews_count`, `p_service_category_id`, `updated_at`, `created_at`) VALUES
('f2e17b0f-bae1-4417-8a15-cf5c23f70603', 'Cantu Hair Conditioner', NULL, '32000', 'img_conditioner.jpg', NULL, 1, '2020-10-12 16:32:02', '2020-10-12 16:32:02');

-- --------------------------------------------------------

--
-- Table structure for table `product_review`
--

DROP TABLE IF EXISTS `product_review`;
CREATE TABLE IF NOT EXISTS `product_review` (
  `product_review_id` int(11) NOT NULL,
  `product_review_content` text,
  `product_review_rating` double DEFAULT NULL,
  `product_review_provider_id` char(36) DEFAULT NULL,
  `product_review_userid` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL,
  `created_at` timestamp NOT NULL,
  PRIMARY KEY (`product_review_id`),
  KEY `product_review_provider_id_idx` (`product_review_provider_id`),
  KEY `product_review_userid_idx` (`product_review_userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

DROP TABLE IF EXISTS `service`;
CREATE TABLE IF NOT EXISTS `service` (
  `service_id` char(36) NOT NULL,
  `service_name` varchar(45) DEFAULT NULL,
  `service_price` decimal(19,0) DEFAULT NULL,
  `s_img_url` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `s_service_provider_id` char(36) DEFAULT NULL,
  `s_reviews_count` int(11) DEFAULT NULL,
  `s_service_category_id` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL,
  `created_at` timestamp NOT NULL,
  PRIMARY KEY (`service_id`),
  KEY `s_service_provider_id_idx` (`s_service_provider_id`),
  KEY `s_service_type_idx` (`s_service_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`service_id`, `service_name`, `service_price`, `s_img_url`, `s_service_provider_id`, `s_reviews_count`, `s_service_category_id`, `updated_at`, `created_at`) VALUES
('1e3b47f5-f915-410d-9a76-a018e83ff4b1', 'Classic Locs', '150000', 'img_locs.jpg', '8dfa4c16-60d7-43ed-9292-21f12a4b7f48', NULL, 1, '2020-10-03 12:13:08', '2020-10-03 12:13:08'),
('2f384780-110f-4307-b1de-f4070bce2da9', 'Straightened Natural', '20000', 'img_natural_straight.jpg', '8dfa4c16-60d7-43ed-9292-21f12a4b7f48', NULL, 1, '2020-10-03 12:13:54', '2020-10-03 12:13:54'),
('31fbfb23-60ba-4704-9e6a-19047bdb0a14', 'Crochet Mid Length', '120000', 'img_crochet.jpg', '8dfa4c16-60d7-43ed-9292-21f12a4b7f48', NULL, 1, '2020-09-25 18:39:20', '2020-09-25 18:30:49'),
('b8a288ec-338d-4472-945e-60bb9ee7e7bd', 'Mid-length Bob', '60000', 'img_bob.jpg', '8dfa4c16-60d7-43ed-9292-21f12a4b7f48', NULL, 1, '2020-10-03 12:11:53', '2020-10-03 12:11:53'),
('c8dec22a-2cd4-43e5-9664-64bf7364cd8a', 'Wild Goddess Weave', '70000', 'img_wild.jpg', '8dfa4c16-60d7-43ed-9292-21f12a4b7f48', NULL, 1, '2020-10-03 12:13:26', '2020-10-03 12:13:26');

-- --------------------------------------------------------

--
-- Table structure for table `serviceprovider_servicecategory`
--

DROP TABLE IF EXISTS `serviceprovider_servicecategory`;
CREATE TABLE IF NOT EXISTS `serviceprovider_servicecategory` (
  `service_provider_id` char(36) DEFAULT NULL,
  `service_category_id` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL,
  `created_at` timestamp NOT NULL,
  KEY `service_provider_id_idx` (`service_provider_id`),
  KEY `service_category_id_idx` (`service_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `service_category`
--

DROP TABLE IF EXISTS `service_category`;
CREATE TABLE IF NOT EXISTS `service_category` (
  `service_category_id` int(2) NOT NULL,
  `parent_service_category_id` int(2) DEFAULT NULL,
  `sc_name` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `sc_img_url` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`service_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `service_category`
--

INSERT INTO `service_category` (`service_category_id`, `parent_service_category_id`, `sc_name`, `sc_img_url`, `updated_at`, `created_at`) VALUES
(1, NULL, 'Hair', 'hair.jpg', '2020-09-24 17:21:50', '2020-09-24 17:21:50'),
(2, NULL, 'Nails', 'nails.jpg', '2020-09-24 17:21:50', '2020-09-24 17:21:50'),
(3, NULL, 'Hair Products', 'hair-products.jpg', '2020-09-24 17:21:50', '2020-09-24 17:21:50'),
(4, NULL, 'Hair Accessories', 'hair-accessories.jpg', '2020-09-24 17:21:50', '2020-09-24 17:21:50'),
(5, NULL, 'Makeup', 'makeup.jpg', '2020-09-24 17:21:50', '2020-09-24 17:21:50'),
(6, 1, 'Natural Hair', 'natural.jpg', '2020-10-12 16:45:00', '2020-10-12 16:45:00'),
(7, 1, 'Braids', 'braids.jpg', '2020-10-12 16:45:00', '2020-10-12 16:45:00'),
(8, 1, 'Dreadlocks', 'locs.jpg', '2020-10-12 16:45:00', '2020-10-12 16:45:00'),
(9, 1, 'Wigs', 'wigs.jpg', '2020-10-12 16:45:00', '2020-10-12 16:45:00'),
(10, 1, 'Weaves', 'weaves.jpg', '2020-10-12 16:45:00', '2020-10-12 16:45:00'),
(11, 1, 'Crochet', 'crochet.jpg', '2020-10-12 16:45:00', '2020-10-12 16:45:00'),
(12, 1, 'Cornrows', 'cornrows.jpg', '2020-10-12 16:45:00', '2020-10-12 16:45:00'),
(13, 2, 'Manicure and Pedicure', 'manipedi.jpg', '2020-10-12 16:47:17', '2020-10-12 16:47:17'),
(14, 2, 'Acrylics', 'acyrlics.jpg', '2020-10-12 16:47:17', '2020-10-12 16:47:17');

-- --------------------------------------------------------

--
-- Table structure for table `service_provider`
--

DROP TABLE IF EXISTS `service_provider`;
CREATE TABLE IF NOT EXISTS `service_provider` (
  `service_provider_id` char(36) NOT NULL,
  `service_provider_name` varchar(45) DEFAULT NULL,
  `sp_address` varchar(45) DEFAULT NULL,
  `sp_whatsapp_contact` varchar(13) DEFAULT NULL,
  `sp_rating` float DEFAULT NULL,
  `sp_secondary_contact` varchar(13) DEFAULT NULL,
  `sp_primary_contact` varchar(13) DEFAULT NULL,
  `sp_id_img` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL,
  `created_at` timestamp NOT NULL,
  PRIMARY KEY (`service_provider_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `service_provider_review`
--

DROP TABLE IF EXISTS `service_provider_review`;
CREATE TABLE IF NOT EXISTS `service_provider_review` (
  `sp_review_id` int(11) NOT NULL,
  `sp_review_content` text,
  `sp_review_rating` float DEFAULT NULL,
  `sp_review_provider_id` char(36) DEFAULT NULL,
  `sp_review_userid` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL,
  `created_at` timestamp NOT NULL,
  PRIMARY KEY (`sp_review_id`),
  KEY `sp_review_provider_id_idx` (`sp_review_provider_id`),
  KEY `sp_review_userid_idx` (`sp_review_userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `service_review`
--

DROP TABLE IF EXISTS `service_review`;
CREATE TABLE IF NOT EXISTS `service_review` (
  `service_review_id` int(11) NOT NULL,
  `service_review_content` text,
  `service_review_rating` double DEFAULT NULL,
  `service_review_provider_id` char(36) DEFAULT NULL,
  `service_review_userid` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL,
  `created_at` timestamp NOT NULL,
  PRIMARY KEY (`service_review_id`),
  KEY `service_review_provider_id_idx` (`service_review_provider_id`),
  KEY `service_review_userid_idx` (`service_review_userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `last_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `password` varchar(200) NOT NULL,
  `contact` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL,
  `created_at` timestamp NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `email`, `password`, `contact`, `is_admin`, `email_verified_at`, `updated_at`, `created_at`) VALUES
(1, 'Samalie', 'Piwan', 'piwan.summerlee@gmail.com', '$2y$10$AR/1rSa42xDaYNryvhE37OngTluHqySSxPRCiUavEQn6Q.9strbOm', '0701221117', 0, '2020-10-27 17:34:36', '2020-10-27 14:34:36', '2020-10-27 14:34:36');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `p_service_type_id` FOREIGN KEY (`p_service_category_id`) REFERENCES `service_category` (`service_category_id`);

--
-- Constraints for table `product_review`
--
ALTER TABLE `product_review`
  ADD CONSTRAINT `product_review_provider_id` FOREIGN KEY (`product_review_provider_id`) REFERENCES `service_provider` (`service_provider_id`),
  ADD CONSTRAINT `product_review_userid` FOREIGN KEY (`product_review_userid`) REFERENCES `user` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `s_service_provider_id` FOREIGN KEY (`s_service_provider_id`) REFERENCES `service_provider` (`service_provider_id`),
  ADD CONSTRAINT `s_service_type_id` FOREIGN KEY (`s_service_category_id`) REFERENCES `service_category` (`service_category_id`);

--
-- Constraints for table `serviceprovider_servicecategory`
--
ALTER TABLE `serviceprovider_servicecategory`
  ADD CONSTRAINT `service_category_id` FOREIGN KEY (`service_category_id`) REFERENCES `service_category` (`service_category_id`),
  ADD CONSTRAINT `service_provider_id` FOREIGN KEY (`service_provider_id`) REFERENCES `service_provider` (`service_provider_id`);

--
-- Constraints for table `service_provider_review`
--
ALTER TABLE `service_provider_review`
  ADD CONSTRAINT `sp_review_provider_id` FOREIGN KEY (`sp_review_provider_id`) REFERENCES `service_provider` (`service_provider_id`),
  ADD CONSTRAINT `sp_review_userid` FOREIGN KEY (`sp_review_userid`) REFERENCES `user` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `service_review`
--
ALTER TABLE `service_review`
  ADD CONSTRAINT `service_review_provider_id` FOREIGN KEY (`service_review_provider_id`) REFERENCES `service_provider` (`service_provider_id`),
  ADD CONSTRAINT `service_review_userid` FOREIGN KEY (`service_review_userid`) REFERENCES `user` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
