SET SQL_MODE
= "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT
= 0;
START TRANSACTION;
SET time_zone
= "+00:00";

DROP TABLE IF EXISTS `oauth_access_tokens`;
CREATE TABLE
IF NOT EXISTS `oauth_access_tokens`
(
  `id` varchar
(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` char
(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_id` char
(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar
(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint
(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP, 
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY
(`id`),
  KEY `oauth_access_tokens_user_id_index`
(`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `oauth_auth_codes`;
CREATE TABLE
IF NOT EXISTS `oauth_auth_codes`
(
  `id` varchar
(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` char
(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` char
(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint
(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY
(`id`),
  KEY `oauth_auth_codes_user_id_index`
(`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `oauth_clients`;
CREATE TABLE
IF NOT EXISTS `oauth_clients`
(
  `id` char
(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` char
(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar
(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar
(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar
(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint
(1) NOT NULL,
  `password_client` tinyint
(1) NOT NULL,
  `revoked` tinyint
(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP, 
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY
(`id`),
  KEY `oauth_clients_user_id_index`
(`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `oauth_personal_access_clients`;
CREATE TABLE
IF NOT EXISTS `oauth_personal_access_clients`
(
  `id` bigint
(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `client_id` char
(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP, 
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY
(`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `oauth_refresh_tokens`;
CREATE TABLE
IF NOT EXISTS `oauth_refresh_tokens`
(
  `id` varchar
(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar
(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint
(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY
(`id`),
  KEY `oauth_refresh_tokens_access_token_id_index`
(`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE
IF NOT EXISTS `password_resets`
(
  `email` varchar
(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar
(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP, 
  KEY `password_resets_email_index`
(`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `product`;
CREATE TABLE
IF NOT EXISTS `product`
(
  `product_id` int
(11) NOT NULL,
  `product_name` varchar
(45) DEFAULT NULL,
  `product_old_price` decimal
(19,0) DEFAULT NULL,
  `product_price` decimal
(19,0) DEFAULT NULL,
  `p_img_url` varchar
(60) DEFAULT NULL,
  `p_reviews_count` int
(11) DEFAULT NULL,
  `p_category_id` int
(11) DEFAULT NULL,
  `p_service_providerid` int
(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY
(`product_id`),
  KEY `p_category_id_idx`
(`p_category_id`),
  KEY `p_service_providerid_idx`
(`p_service_providerid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `product_category`;
CREATE TABLE
IF NOT EXISTS `product_category`
(
  `product_category_id` int
(11) NOT NULL,
  `pc_name` varchar
(45) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY
(`product_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `product_review`;
CREATE TABLE
IF NOT EXISTS `product_review`
(
  `product_review_id` int
(11) NOT NULL,
  `product_review_content` text,
  `product_review_rating` double DEFAULT NULL,
  `product_review_providerid` int
(11) DEFAULT NULL,
  `product_review_userid` int
(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY
(`product_review_id`),
  KEY `product_review_providerid_idx`
(`product_review_providerid`),
  KEY `product_review_userid_idx`
(`product_review_userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `service`;
CREATE TABLE
IF NOT EXISTS `service`
(
  `service_id` int
(11) NOT NULL,
  `service_name` varchar
(45) DEFAULT NULL,
  `service_price` decimal
(19,0) DEFAULT NULL,
  `s_img_url` varchar
(60) CHARACTER
SET utf8
COLLATE utf8_general_ci DEFAULT NULL,
  `s_service_providerid` int
(11) DEFAULT NULL,
  `s_service_category_id` int
(11) DEFAULT NULL,
  `s_reviews_count` int
(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY
(`service_id`),
  KEY `s_service_providerid_idx`
(`s_service_providerid`),
  KEY `s_service_category_id_idx`
(`s_service_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `serviceprovider_servicecategory`;
CREATE TABLE
IF NOT EXISTS `serviceprovider_servicecategory`
(
  `service_providerid` int
(11) DEFAULT NULL,
  `service_category_id` int
(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  KEY `service_providerid_idx`
(`service_providerid`),
  KEY `service_category_id_idx`
(`service_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `service_category`;
CREATE TABLE
IF NOT EXISTS `service_category`
(
  `service_category_id` int
(2) NOT NULL,
  `parent_service_category_id` int
(2) DEFAULT NULL,
  `sc_name` varchar
(60) CHARACTER
SET utf8
COLLATE utf8_general_ci DEFAULT NULL,
  `sc_img_url` varchar
(60) CHARACTER
SET utf8
COLLATE utf8_general_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY
(`service_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `service_provider`;
CREATE TABLE
IF NOT EXISTS `service_provider`
(
  `service_providerid` int
(11) NOT NULL,
  `service_provider_name` varchar
(45) DEFAULT NULL,
  `sp_address` varchar
(45) DEFAULT NULL,
  `sp_whatsapp_contact` varchar
(13) DEFAULT NULL,
  `sp_rating` float DEFAULT NULL,
  `sp_secondary_contact` varchar
(13) DEFAULT NULL,
  `sp_primary_contact` varchar
(13) DEFAULT NULL,
  `sp_id_img` varchar
(60) CHARACTER
SET utf8
COLLATE utf8_general_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY
(`service_providerid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `service_provider_review`;
CREATE TABLE
IF NOT EXISTS `service_provider_review`
(
  `sp_review_id` int
(11) NOT NULL,
  `sp_review_content` text,
  `sp_review_rating` float DEFAULT NULL,
  `sp_review_providerid` int
(11) DEFAULT NULL,
  `sp_review_userid` int
(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY
(`sp_review_id`),
  KEY `sp_review_providerid_idx`
(`sp_review_providerid`),
  KEY `sp_review_userid_idx`
(`sp_review_userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `service_review`;
CREATE TABLE
IF NOT EXISTS `service_review`
(
  `service_review_id` int
(11) NOT NULL,
  `service_review_content` text,
  `service_review_rating` double DEFAULT NULL,
  `service_review_providerid` int
(11) DEFAULT NULL,
  `service_review_userid` int
(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY
(`service_review_id`),
  KEY `service_review_providerid_idx`
(`service_review_providerid`),
  KEY `service_review_userid_idx`
(`service_review_userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `user`;
CREATE TABLE
IF NOT EXISTS `user` (
  `user_id` int
(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar
(20) CHARACTER
SET utf8
COLLATE utf8_general_ci DEFAULT NULL,
  `last_name` varchar
(20) CHARACTER
SET utf8
COLLATE utf8_general_ci NOT NULL,
  `email` varchar
(45) CHARACTER
SET utf8
COLLATE utf8_general_ci DEFAULT NULL,
  `password` varchar
(200) NOT NULL,
  `contact` varchar
(20) CHARACTER
SET utf8
COLLATE utf8_general_ci NOT NULL,
  `is_admin` tinyint
(1) NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY
(`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
ADD CONSTRAINT `p_category_id` FOREIGN KEY
(`p_category_id`) REFERENCES `product_category`
(`product_category_id`),
ADD CONSTRAINT `p_service_providerid` FOREIGN KEY
(`p_service_providerid`) REFERENCES `service_provider`
(`service_providerid`);

--
-- Constraints for table `product_review`
--
ALTER TABLE `product_review`
ADD CONSTRAINT `product_review_providerid` FOREIGN KEY
(`product_review_providerid`) REFERENCES `service_provider`
(`service_providerid`),
ADD CONSTRAINT `product_review_userid` FOREIGN KEY
(`product_review_userid`) REFERENCES `user`
(`user_id`) ON
DELETE RESTRICT ON
UPDATE RESTRICT;

--
-- Constraints for table `service`
--
ALTER TABLE `service`
ADD CONSTRAINT `s_service_providerid` FOREIGN KEY
(`s_service_providerid`) REFERENCES `service_provider`
(`service_providerid`);

--
-- Constraints for table `serviceprovider_servicecategory`
--
ALTER TABLE `serviceprovider_servicecategory`
ADD CONSTRAINT `service_category_id` FOREIGN KEY
(`service_category_id`) REFERENCES `service_category`
(`service_category_id`),
ADD CONSTRAINT `service_providerid` FOREIGN KEY
(`service_providerid`) REFERENCES `service_provider`
(`service_providerid`);

--
-- Constraints for table `service_provider_review`
--
ALTER TABLE `service_provider_review`
ADD CONSTRAINT `sp_review_providerid` FOREIGN KEY
(`sp_review_providerid`) REFERENCES `service_provider`
(`service_providerid`),
ADD CONSTRAINT `sp_review_userid` FOREIGN KEY
(`sp_review_userid`) REFERENCES `user`
(`user_id`) ON
DELETE RESTRICT ON
UPDATE RESTRICT;

--
-- Constraints for table `service_review`
--
ALTER TABLE `service_review`
ADD CONSTRAINT `service_review_providerid` FOREIGN KEY
(`service_review_providerid`) REFERENCES `service_provider`
(`service_providerid`),
ADD CONSTRAINT `service_review_userid` FOREIGN KEY
(`service_review_userid`) REFERENCES `user`
(`user_id`) ON
DELETE RESTRICT ON
UPDATE RESTRICT;
COMMIT;