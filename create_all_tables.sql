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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE
IF NOT EXISTS `password_resets`
(
  `email` varchar
(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar
(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index`
(`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `product`;
CREATE TABLE
IF NOT EXISTS `product`
(
  `product_id` char
(36) NOT NULL,
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
  `p_service_category_id` int
(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL,
  `created_at` timestamp NOT NULL,
  PRIMARY KEY
(`product_id`),
  KEY `p_service_type_id_idx`
(`p_service_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `product_review`;
CREATE TABLE
IF NOT EXISTS `product_review`
(
  `product_review_id` int
(11) NOT NULL,
  `product_review_content` text,
  `product_review_rating` double DEFAULT NULL,
  `product_review_provider_id` char
(36) DEFAULT NULL,
  `product_review_userid` int
(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL,
  `created_at` timestamp NOT NULL,
  PRIMARY KEY
(`product_review_id`),
  KEY `product_review_provider_id_idx`
(`product_review_provider_id`),
  KEY `product_review_userid_idx`
(`product_review_userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `service`;
CREATE TABLE
IF NOT EXISTS `service`
(
  `service_id` char
(36) NOT NULL,
  `service_name` varchar
(45) DEFAULT NULL,
  `service_price` decimal
(19,0) DEFAULT NULL,
  `s_img_url` varchar
(60) CHARACTER
SET utf8
COLLATE utf8_general_ci DEFAULT NULL,
  `s_service_provider_id` char
(36) DEFAULT NULL,
  `s_reviews_count` int
(11) DEFAULT NULL,
  `s_service_category_id` int
(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL,
  `created_at` timestamp NOT NULL,
  PRIMARY KEY
(`service_id`),
  KEY `s_service_provider_id_idx`
(`s_service_provider_id`),
  KEY `s_service_type_idx`
(`s_service_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `serviceprovider_servicecategory`;
CREATE TABLE
IF NOT EXISTS `serviceprovider_servicecategory`
(
  `service_provider_id` char
(36) DEFAULT NULL,
  `service_category_id` int
(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL,
  `created_at` timestamp NOT NULL,
  KEY `service_provider_id_idx`
(`service_provider_id`),
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
  `service_provider_id` char
(36) NOT NULL,
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
  `updated_at` timestamp NOT NULL,
  `created_at` timestamp NOT NULL,
  PRIMARY KEY
(`service_provider_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `service_provider_review`;
CREATE TABLE
IF NOT EXISTS `service_provider_review`
(
  `sp_review_id` int
(11) NOT NULL,
  `sp_review_content` text,
  `sp_review_rating` float DEFAULT NULL,
  `sp_review_provider_id` char
(36) DEFAULT NULL,
  `sp_review_userid` int
(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL,
  `created_at` timestamp NOT NULL,
  PRIMARY KEY
(`sp_review_id`),
  KEY `sp_review_provider_id_idx`
(`sp_review_provider_id`),
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
  `service_review_provider_id` char
(36) DEFAULT NULL,
  `service_review_userid` int
(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL,
  `created_at` timestamp NOT NULL,
  PRIMARY KEY
(`service_review_id`),
  KEY `service_review_provider_id_idx`
(`service_review_provider_id`),
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
  `updated_at` timestamp NOT NULL,
  `created_at` timestamp NOT NULL,
  PRIMARY KEY
(`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
ADD CONSTRAINT `p_service_type_id` FOREIGN KEY
(`p_service_category_id`) REFERENCES `service_category`
(`service_category_id`);

--
-- Constraints for table `product_review`
--
ALTER TABLE `product_review`
ADD CONSTRAINT `product_review_provider_id` FOREIGN KEY
(`product_review_provider_id`) REFERENCES `service_provider`
(`service_provider_id`),
ADD CONSTRAINT `product_review_userid` FOREIGN KEY
(`product_review_userid`) REFERENCES `user`
(`user_id`) ON
DELETE RESTRICT ON
UPDATE RESTRICT;

--
-- Constraints for table `service`
--
ALTER TABLE `service`
ADD CONSTRAINT `s_service_provider_id` FOREIGN KEY
(`s_service_provider_id`) REFERENCES `service_provider`
(`service_provider_id`),
ADD CONSTRAINT `s_service_type_id` FOREIGN KEY
(`s_service_category_id`) REFERENCES `service_category`
(`service_category_id`);

--
-- Constraints for table `serviceprovider_servicecategory`
--
ALTER TABLE `serviceprovider_servicecategory`
ADD CONSTRAINT `service_category_id` FOREIGN KEY
(`service_category_id`) REFERENCES `service_category`
(`service_category_id`),
ADD CONSTRAINT `service_provider_id` FOREIGN KEY
(`service_provider_id`) REFERENCES `service_provider`
(`service_provider_id`);

--
-- Constraints for table `service_provider_review`
--
ALTER TABLE `service_provider_review`
ADD CONSTRAINT `sp_review_provider_id` FOREIGN KEY
(`sp_review_provider_id`) REFERENCES `service_provider`
(`service_provider_id`),
ADD CONSTRAINT `sp_review_userid` FOREIGN KEY
(`sp_review_userid`) REFERENCES `user`
(`user_id`) ON
DELETE RESTRICT ON
UPDATE RESTRICT;

--
-- Constraints for table `service_review`
--
ALTER TABLE `service_review`
ADD CONSTRAINT `service_review_provider_id` FOREIGN KEY
(`service_review_provider_id`) REFERENCES `service_provider`
(`service_provider_id`),
ADD CONSTRAINT `service_review_userid` FOREIGN KEY
(`service_review_userid`) REFERENCES `user`
(`user_id`) ON
DELETE RESTRICT ON
UPDATE RESTRICT;
COMMIT;