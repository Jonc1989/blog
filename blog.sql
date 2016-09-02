-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.10-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.3.0.5042
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for blog
CREATE DATABASE IF NOT EXISTS `blog` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `blog`;

-- Dumping structure for table blog.friends
DROP TABLE IF EXISTS `friends`;
CREATE TABLE IF NOT EXISTS `friends` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `friend_id` int(10) unsigned DEFAULT NULL,
  `request` tinyint(4) DEFAULT NULL,
  `friendship` tinyint(4) DEFAULT NULL,
  `invitation_text` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `FK_friends_users` (`user_id`),
  CONSTRAINT `FK_friends_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table blog.friends: ~2 rows (approximately)
/*!40000 ALTER TABLE `friends` DISABLE KEYS */;
INSERT INTO `friends` (`id`, `user_id`, `friend_id`, `request`, `friendship`, `invitation_text`, `created_at`, `updated_at`) VALUES
	(1, 1, 2, 1, 1, NULL, '2016-09-02 12:04:05', '2016-09-02 12:04:05'),
	(2, 1, 3, 1, 1, NULL, '2016-09-02 16:50:13', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `friends` ENABLE KEYS */;

-- Dumping structure for table blog.galleries
DROP TABLE IF EXISTS `galleries`;
CREATE TABLE IF NOT EXISTS `galleries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- Dumping data for table blog.galleries: ~1 rows (approximately)
/*!40000 ALTER TABLE `galleries` DISABLE KEYS */;
INSERT INTO `galleries` (`id`, `name`, `user_id`, `created_at`, `updated_at`) VALUES
	(25, 'Pirmā galerija', 1, '2016-09-02 12:30:12', '2016-09-02 12:30:12');
/*!40000 ALTER TABLE `galleries` ENABLE KEYS */;

-- Dumping structure for table blog.images
DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `thumb` varchar(255) DEFAULT NULL,
  `original_name` varchar(255) DEFAULT NULL,
  `path` text,
  `gallery_id` int(10) unsigned DEFAULT NULL,
  `post_id` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_gallery_images_galleries` (`gallery_id`),
  CONSTRAINT `FK_gallery_images_galleries` FOREIGN KEY (`gallery_id`) REFERENCES `galleries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

-- Dumping data for table blog.images: ~4 rows (approximately)
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` (`id`, `file_name`, `thumb`, `original_name`, `path`, `gallery_id`, `post_id`, `created_at`, `updated_at`) VALUES
	(37, 'rpxHDVqIICzxp2kyW8Cvf7HdROl5wN.jpg', 'rpxHDVqIICzxp2kyW8Cvf7HdROl5wN.jpg', '15.jpg', 'D:\\xampp\\htdocs\\blog\\storage\\users\\1\\galleries\\25\\rpxHDVqIICzxp2kyW8Cvf7HdROl5wN.jpg', 25, NULL, '2016-09-02 12:30:12', '2016-09-02 12:30:12'),
	(38, 'tPJOkDgwDH6kmjdHCn24bhJkaDmzIo.png', 'tPJOkDgwDH6kmjdHCn24bhJkaDmzIo.png', '17.png', 'D:\\xampp\\htdocs\\blog\\storage\\users\\1\\galleries\\25\\tPJOkDgwDH6kmjdHCn24bhJkaDmzIo.png', 25, NULL, '2016-09-02 12:30:12', '2016-09-02 12:30:12'),
	(39, 'Xuh4ZoJdmk2J1pyJh5Vki9fhPJJbWV.png', 'Xuh4ZoJdmk2J1pyJh5Vki9fhPJJbWV.png', 'Bridgette.png', 'D:\\xampp\\htdocs\\blog\\storage\\users\\1\\galleries\\25\\Xuh4ZoJdmk2J1pyJh5Vki9fhPJJbWV.png', 25, NULL, '2016-09-02 12:30:12', '2016-09-02 12:30:12'),
	(40, 'xQfNChovYIMvTabMeBKPkzVncLVFPm.png', 'xQfNChovYIMvTabMeBKPkzVncLVFPm.png', 'Conductor_Homer_Tapped_Out.png', 'D:\\xampp\\htdocs\\blog\\storage\\users\\1\\galleries\\25\\xQfNChovYIMvTabMeBKPkzVncLVFPm.png', 25, NULL, '2016-09-02 12:30:12', '2016-09-02 12:30:12');
/*!40000 ALTER TABLE `images` ENABLE KEYS */;

-- Dumping structure for table blog.likes
DROP TABLE IF EXISTS `likes`;
CREATE TABLE IF NOT EXISTS `likes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `post_id` int(10) unsigned NOT NULL DEFAULT '0',
  `type` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

-- Dumping data for table blog.likes: ~1 rows (approximately)
/*!40000 ALTER TABLE `likes` DISABLE KEYS */;
INSERT INTO `likes` (`id`, `user_id`, `post_id`, `type`, `created_at`, `updated_at`) VALUES
	(41, 1, 2, 'post', '2016-09-02 12:03:54', '2016-09-02 12:03:54');
/*!40000 ALTER TABLE `likes` ENABLE KEYS */;

-- Dumping structure for table blog.location
DROP TABLE IF EXISTS `location`;
CREATE TABLE IF NOT EXISTS `location` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `address` text,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Dumping data for table blog.location: ~1 rows (approximately)
/*!40000 ALTER TABLE `location` DISABLE KEYS */;
INSERT INTO `location` (`id`, `address`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
	(8, 'Maskavas iela 22, Rēzekne, LV-4604, Latvia', 56.526248, 27.3574126, '2016-09-02 12:03:51', '2016-09-02 12:03:51');
/*!40000 ALTER TABLE `location` ENABLE KEYS */;

-- Dumping structure for table blog.messages
DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sender_id` int(10) unsigned NOT NULL DEFAULT '0',
  `receiver_id` int(10) unsigned NOT NULL DEFAULT '0',
  `text` text CHARACTER SET utf8,
  `readed` tinyint(4) unsigned DEFAULT NULL,
  `answered` tinyint(4) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `FK_messages_users` (`sender_id`),
  KEY `FK_messages_users_2` (`receiver_id`),
  CONSTRAINT `FK_messages_users` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_messages_users_2` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table blog.messages: ~2 rows (approximately)
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` (`id`, `sender_id`, `receiver_id`, `text`, `readed`, `answered`, `created_at`, `updated_at`) VALUES
	(6, 2, 1, 'hei', NULL, NULL, '2016-09-02 15:29:18', '0000-00-00 00:00:00'),
	(7, 1, 2, 'Pasol', 0, 0, '2016-09-02 12:29:30', '2016-09-02 12:29:30');
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;

-- Dumping structure for table blog.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table blog.migrations: ~0 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`migration`, `batch`) VALUES
	('2016_08_25_134049_Revisions', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table blog.password_resets
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table blog.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table blog.posts
DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `content` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `sender_id` int(10) unsigned DEFAULT NULL,
  `receiver_id` int(10) unsigned DEFAULT NULL,
  `post_type` int(10) unsigned DEFAULT NULL,
  `location_id` int(10) unsigned DEFAULT NULL,
  `content_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_posts_users` (`sender_id`),
  CONSTRAINT `FK_posts_users` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table blog.posts: ~1 rows (approximately)
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` (`id`, `name`, `content`, `sender_id`, `receiver_id`, `post_type`, `location_id`, `content_id`, `created_at`, `updated_at`) VALUES
	(2, NULL, 'Hei dawg', 1, NULL, NULL, 8, NULL, '2016-09-02 12:03:51', '2016-09-02 12:03:51');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;

-- Dumping structure for table blog.revisions
DROP TABLE IF EXISTS `revisions`;
CREATE TABLE IF NOT EXISTS `revisions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `revisionable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `revisionable_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `old_value` text COLLATE utf8_unicode_ci,
  `new_value` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `revisions_revisionable_id_revisionable_type_index` (`revisionable_id`,`revisionable_type`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table blog.revisions: ~1 rows (approximately)
/*!40000 ALTER TABLE `revisions` DISABLE KEYS */;
INSERT INTO `revisions` (`id`, `revisionable_type`, `revisionable_id`, `user_id`, `key`, `old_value`, `new_value`, `created_at`, `updated_at`) VALUES
	(8, 'App\\Modules\\Friends\\Models\\Friends', 1, 1, '', NULL, NULL, '2016-09-02 12:04:05', '2016-09-02 12:04:05');
/*!40000 ALTER TABLE `revisions` ENABLE KEYS */;

-- Dumping structure for table blog.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `online` tinyint(4) unsigned DEFAULT NULL,
  `year` int(11) unsigned DEFAULT NULL,
  `gender` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` text COLLATE utf8_unicode_ci,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telephone` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table blog.users: ~12 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `surname`, `email`, `online`, `year`, `gender`, `photo`, `address`, `telephone`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Jānis', 'Mozais', 'jonc@inbox.lv', 1, NULL, NULL, NULL, NULL, NULL, '$2y$10$xFWkf7rzTgeWTfqOQPjxYev/zNTk6iqW0N0MSnD6EYOwaTPGsmB5.', 'zgihIiVo2jJDKOmwaTDzfwvo3KdgED5UTqZXR2UtejkDO6BVUsONVmgJ84aX', '2016-09-02 10:16:14', '2016-09-02 13:48:32'),
	(2, 'Mairis', 'Briedis', 'mairis@mairis.lv', 1, NULL, NULL, NULL, NULL, NULL, '$2y$10$X7L/HlobGCm30eawtS0BsOXc0MtabtqhaVnmwRd8U1KZC1Xzow0xS', 'vEDE9EmPbXD9rgdX6z4rAFkSIlVoGztDzYOzZXDCQWI68zTWQGlcFCC8ARyi', NULL, '2016-09-02 13:55:48'),
	(3, 'Miss Maurine Maggio IV', 'Harvey', 'qhettinger@example.org', 1, 1994, 'Dr.', NULL, NULL, NULL, '$2y$10$BKo2Gak.1Ia7/5stkOaZxu4ezw.R5Bv2oT6jbBGj4YcD8GT.tLqTK', 'EwTFQNXVpq', '2016-08-12 12:05:59', '2016-08-12 12:05:59'),
	(4, 'Jaime Metz', 'Wiza', 'lauriane17@example.com', 0, 2002, 'Dr.', NULL, NULL, NULL, '$2y$10$7qBiNOftFwk/9b9F8hLfE.yF8/VidSEDpwZ5V.ezzAaKDZt5z7ff6', 'IP5YVQeZjj', '2016-08-12 12:05:59', '2016-08-12 12:05:59'),
	(5, 'Korbin Bashirian DVM', 'Nader', 'sabryna.heller@example.org', 0, 1987, 'Dr.', NULL, NULL, NULL, '$2y$10$ye2AmSBM.gDuxRozSJNW7.XfsMX.LiM/NNuLO5B9eBqxNiDArPryC', 'hRN1uXfDCL', '2016-08-12 12:05:59', '2016-08-12 12:05:59'),
	(6, 'Danny Cruickshank', 'Pouros', 'wuckert.quentin@example.org', 0, 1990, 'Dr.', NULL, NULL, NULL, '$2y$10$eCip4SvrYlpvSutarXMvX.n3/WJck/y3p7rA1nO4dupRuIUPZ9IMe', '1b8eEc3AOb', '2016-08-12 12:05:59', '2016-08-12 12:05:59'),
	(7, 'Jannie Beatty', 'Rogahn', 'corrine.treutel@example.com', 0, 1990, 'Dr.', NULL, NULL, NULL, '$2y$10$CnSKOqsjKrzy7s1To9cS6OQ4f/yMsGhMsU4oXur5O874LUrm8l27e', 'NURJSI7ms9', '2016-08-12 12:05:59', '2016-08-12 12:05:59'),
	(8, 'Kenya Doyle', 'Schimmel', 'betty23@example.com', 0, 2016, 'Mr.', NULL, NULL, NULL, '$2y$10$bYSfXK2tI3QOhcg59sMkZewqvPhuddbCXJzodt1UStsz4jICGQZUC', 'AHnDaKMLqB', '2016-08-12 12:05:59', '2016-08-12 12:05:59'),
	(9, 'Annette Goodwin DVM', 'Dicki', 'golda78@example.net', 0, 1976, 'Prof.', NULL, NULL, NULL, '$2y$10$vFmNPtzaWfUktPCYBrA/U.PYYUlcjZnpubMxzYoJvLFto59xawLS6', '3Z7QtVX5xF', '2016-08-12 12:05:59', '2016-08-12 12:05:59'),
	(10, 'Laisha Doyle', 'Kuphal', 'langworth.kaylah@example.com', 0, 1971, 'Dr.', NULL, NULL, NULL, '$2y$10$QZzBJfsx0wT/Ehgfy/LZJe4zvjryczPzPF7yFf4dBsgOs9XX.s6J6', 'nO3WZlQMQK', '2016-08-12 12:06:00', '2016-08-12 12:06:00'),
	(11, 'Ila Kulas', 'Olson', 'turner.ahmad@example.net', 0, 1990, 'Prof.', NULL, NULL, NULL, '$2y$10$vA0Wyo50btrNb9XwENuuYeTxiHj7GZqBRARoPbwBwwiiuP51npzXW', 'exyCvo1kSM', '2016-08-12 12:06:00', '2016-08-12 12:06:00'),
	(12, 'Abdul Dickinson', 'Kuhn', 'douglas.taylor@example.net', 0, 1977, 'Dr.', NULL, NULL, NULL, '$2y$10$xMJQypSRRLmgPsZabU6KougXh/oB/w40DflGL9hOCvRGAagY0I0s.', '6Z4St3nV1x', '2016-08-12 12:06:00', '2016-08-12 12:06:00');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table blog.visitors
DROP TABLE IF EXISTS `visitors`;
CREATE TABLE IF NOT EXISTS `visitors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `visitor_id` int(10) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table blog.visitors: ~0 rows (approximately)
/*!40000 ALTER TABLE `visitors` DISABLE KEYS */;
/*!40000 ALTER TABLE `visitors` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
