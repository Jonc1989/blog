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

-- Dumping structure for table blog.comments
DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(10) unsigned DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `text` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- Dumping data for table blog.comments: ~12 rows (approximately)
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` (`id`, `post_id`, `user_id`, `type`, `text`, `created_at`, `updated_at`) VALUES
	(3, 4, 1, 'post', 'buļba', '2016-09-08 12:54:49', '2016-09-08 15:55:03'),
	(5, 25, 1, 'gallery', 'Kruta', '2016-09-13 11:35:38', '2016-09-13 11:35:38'),
	(6, 3, 1, 'post', 'Kas labs otardienā?', '2016-09-13 11:37:13', '2016-09-13 11:37:13'),
	(7, 25, 1, 'gallery', 'Baigi kruta', '2016-09-13 11:38:13', '2016-09-13 11:38:13'),
	(8, 25, 1, 'gallery', '...', '2016-09-13 11:44:51', '2016-09-13 11:44:51'),
	(9, 25, 1, 'gallery', 'Hei', '2016-09-13 11:54:08', '2016-09-13 11:54:08'),
	(10, 25, 1, 'gallery', 'UU', '2016-09-13 11:58:58', '2016-09-13 11:58:58'),
	(11, 26, 1, 'gallery', 'Klas', '2016-09-13 12:01:08', '2016-09-13 12:01:08'),
	(12, 26, 1, 'gallery', 'Nice', '2016-09-13 12:03:11', '2016-09-13 12:03:11'),
	(13, 26, 1, 'gallery', 'Fucking shit', '2016-09-13 12:04:23', '2016-09-13 12:04:23'),
	(14, 26, 1, 'image', 'Comments', '2016-09-13 12:41:56', '2016-09-13 12:41:56'),
	(15, 42, 1, 'image', 'gf', '2016-09-13 12:58:17', '2016-09-13 12:58:17'),
	(16, 3, 1, 'post', 'Nekā', '2016-09-13 13:13:26', '2016-09-13 13:13:26');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;

-- Dumping structure for table blog.events
DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `revisionable_model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `event_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `old_value` text COLLATE utf8_unicode_ci,
  `new_value` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `revisions_revisionable_id_revisionable_type_index` (`event_id`,`revisionable_model`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table blog.events: ~5 rows (approximately)
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` (`id`, `revisionable_model`, `type`, `event_id`, `user_id`, `key`, `old_value`, `new_value`, `created_at`, `updated_at`) VALUES
	(8, 'App\\Modules\\Friends\\Models\\Friends', 'friends', 1, 1, '', NULL, NULL, '2016-09-02 12:04:05', '2016-09-12 15:58:47'),
	(9, 'App\\Modules\\Galleries\\Models\\Gallery', '', 26, 1, '', NULL, NULL, '2016-09-09 06:56:46', '2016-09-09 06:56:46'),
	(10, 'App\\Modules\\Galleries\\Models\\Gallery', 'gallery', 29, 1, '', NULL, NULL, '2016-09-12 12:45:12', '2016-09-12 16:11:14'),
	(11, 'App\\Modules\\Galleries\\Models\\Gallery', 'gallery', 30, 1, '', NULL, NULL, '2016-09-12 12:49:15', '2016-09-12 16:01:17'),
	(12, 'App\\Modules\\Galleries\\Models\\Gallery', 'gallery', 31, 1, '', NULL, NULL, '2016-09-12 12:50:23', '2016-09-12 16:01:14'),
	(13, 'App\\Modules\\Galleries\\Models\\Gallery', 'gallery', 32, 2, '', NULL, NULL, '2016-09-14 11:56:08', '2016-09-14 11:56:08');
/*!40000 ALTER TABLE `events` ENABLE KEYS */;

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table blog.friends: ~2 rows (approximately)
/*!40000 ALTER TABLE `friends` DISABLE KEYS */;
INSERT INTO `friends` (`id`, `user_id`, `friend_id`, `request`, `friendship`, `invitation_text`, `created_at`, `updated_at`) VALUES
	(2, 1, 3, 1, 1, NULL, '2016-09-02 16:50:13', '0000-00-00 00:00:00'),
	(3, 1, 2, 1, 1, NULL, '2016-09-12 13:48:12', '2016-09-12 14:08:35');
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
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

-- Dumping data for table blog.galleries: ~5 rows (approximately)
/*!40000 ALTER TABLE `galleries` DISABLE KEYS */;
INSERT INTO `galleries` (`id`, `name`, `user_id`, `created_at`, `updated_at`) VALUES
	(25, 'Pirmā galerija', 1, '2016-09-02 12:30:12', '2016-09-02 12:30:12'),
	(26, 'Kino', 1, '2016-09-09 06:56:46', '2016-09-09 06:56:46'),
	(27, 'Car', 1, '2016-09-09 07:22:25', '2016-09-09 07:22:25'),
	(29, 'Test', 1, '2016-09-12 12:45:12', '2016-09-12 12:45:12'),
	(30, 'hhh', 1, '2016-09-12 12:49:15', '2016-09-12 12:49:15'),
	(31, 'yyy', 1, '2016-09-12 12:50:23', '2016-09-12 12:50:23'),
	(32, 'Māra', 2, '2016-09-14 11:56:08', '2016-09-14 11:56:08');
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
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

-- Dumping data for table blog.images: ~12 rows (approximately)
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` (`id`, `file_name`, `thumb`, `original_name`, `path`, `gallery_id`, `post_id`, `created_at`, `updated_at`) VALUES
	(37, 'rpxHDVqIICzxp2kyW8Cvf7HdROl5wN.jpg', 'rpxHDVqIICzxp2kyW8Cvf7HdROl5wN.jpg', '15.jpg', 'D:\\xampp\\htdocs\\blog\\storage\\users\\1\\galleries\\25\\rpxHDVqIICzxp2kyW8Cvf7HdROl5wN.jpg', 25, NULL, '2016-09-02 12:30:12', '2016-09-02 12:30:12'),
	(38, 'tPJOkDgwDH6kmjdHCn24bhJkaDmzIo.png', 'tPJOkDgwDH6kmjdHCn24bhJkaDmzIo.png', '17.png', 'D:\\xampp\\htdocs\\blog\\storage\\users\\1\\galleries\\25\\tPJOkDgwDH6kmjdHCn24bhJkaDmzIo.png', 25, NULL, '2016-09-02 12:30:12', '2016-09-02 12:30:12'),
	(39, 'Xuh4ZoJdmk2J1pyJh5Vki9fhPJJbWV.png', 'Xuh4ZoJdmk2J1pyJh5Vki9fhPJJbWV.png', 'Bridgette.png', 'D:\\xampp\\htdocs\\blog\\storage\\users\\1\\galleries\\25\\Xuh4ZoJdmk2J1pyJh5Vki9fhPJJbWV.png', 25, NULL, '2016-09-02 12:30:12', '2016-09-02 12:30:12'),
	(40, 'xQfNChovYIMvTabMeBKPkzVncLVFPm.png', 'xQfNChovYIMvTabMeBKPkzVncLVFPm.png', 'Conductor_Homer_Tapped_Out.png', 'D:\\xampp\\htdocs\\blog\\storage\\users\\1\\galleries\\25\\xQfNChovYIMvTabMeBKPkzVncLVFPm.png', 25, NULL, '2016-09-02 12:30:12', '2016-09-02 12:30:12'),
	(41, '95gsqBXoJFkVvUf9qS30AmGXCm5E7H.png', '95gsqBXoJFkVvUf9qS30AmGXCm5E7H.png', 'madmaxposter-130285.png', 'D:\\xampp\\htdocs\\blog\\storage\\users\\1\\galleries\\26\\95gsqBXoJFkVvUf9qS30AmGXCm5E7H.png', 26, NULL, '2016-09-09 06:56:46', '2016-09-09 06:56:46'),
	(42, 'mCjC1fNBeM4MP7GaGyqyviu98cxCbf.jpg', 'mCjC1fNBeM4MP7GaGyqyviu98cxCbf.jpg', 'Noah-poster.jpg', 'D:\\xampp\\htdocs\\blog\\storage\\users\\1\\galleries\\26\\mCjC1fNBeM4MP7GaGyqyviu98cxCbf.jpg', 26, NULL, '2016-09-09 06:56:47', '2016-09-09 06:56:47'),
	(43, 'DMvQfG2H6DNW03jXFTz3nXN5T9f1RI.png', 'DMvQfG2H6DNW03jXFTz3nXN5T9f1RI.png', 'Oblivion-Movie-2013.png', 'D:\\xampp\\htdocs\\blog\\storage\\users\\1\\galleries\\26\\DMvQfG2H6DNW03jXFTz3nXN5T9f1RI.png', 26, NULL, '2016-09-09 06:56:47', '2016-09-09 06:56:47'),
	(44, 'WlUXsMMAwEWwTg32OVxkFwlU2z0Keu.jpg', 'WlUXsMMAwEWwTg32OVxkFwlU2z0Keu.jpg', 'pacific-rim-movie-poster-images-f4-1400x643.jpg', 'D:\\xampp\\htdocs\\blog\\storage\\users\\1\\galleries\\26\\WlUXsMMAwEWwTg32OVxkFwlU2z0Keu.jpg', 26, NULL, '2016-09-09 06:56:47', '2016-09-09 06:56:47'),
	(45, 'UrAxoTW5Ko8CPSI45eJ9AoPM5AdHrH.jpg', 'UrAxoTW5Ko8CPSI45eJ9AoPM5AdHrH.jpg', '1mb.jpg', 'D:\\xampp\\htdocs\\blog\\storage\\users\\1\\galleries\\27\\UrAxoTW5Ko8CPSI45eJ9AoPM5AdHrH.jpg', 27, NULL, '2016-09-09 07:22:25', '2016-09-09 07:22:25'),
	(46, 'njgb1BGzsYUNcUN7hC00LRdOcgNrrx.png', 'njgb1BGzsYUNcUN7hC00LRdOcgNrrx.png', '26e178f.png', 'D:\\xampp\\htdocs\\blog\\storage\\users\\1\\galleries\\29\\njgb1BGzsYUNcUN7hC00LRdOcgNrrx.png', 29, NULL, '2016-09-12 12:45:12', '2016-09-12 12:45:12'),
	(47, '453DCAj3RUwJD6t0IeZIZ013BaxIMW.png', '453DCAj3RUwJD6t0IeZIZ013BaxIMW.png', '90.png', 'D:\\xampp\\htdocs\\blog\\storage\\users\\1\\galleries\\29\\453DCAj3RUwJD6t0IeZIZ013BaxIMW.png', 29, NULL, '2016-09-12 12:45:13', '2016-09-12 12:45:13'),
	(48, '0K5QAa5trsKO41Y9hE7gZb43WRbNuN.png', '0K5QAa5trsKO41Y9hE7gZb43WRbNuN.png', 'unnamed.png', 'D:\\xampp\\htdocs\\blog\\storage\\users\\1\\galleries\\29\\0K5QAa5trsKO41Y9hE7gZb43WRbNuN.png', 29, NULL, '2016-09-12 12:45:13', '2016-09-12 12:45:13'),
	(49, '38c7pi8za1MCIr6wyT1ruG13VzogZf.jpg', '38c7pi8za1MCIr6wyT1ruG13VzogZf.jpg', 'images.jpg', 'D:\\xampp\\htdocs\\blog\\storage\\users\\1\\galleries\\30\\38c7pi8za1MCIr6wyT1ruG13VzogZf.jpg', 30, NULL, '2016-09-12 12:49:15', '2016-09-12 12:49:15'),
	(50, 'AQxjbToDs6608YDecT2HjEeoBJ0hVd.jpg', 'AQxjbToDs6608YDecT2HjEeoBJ0hVd.jpg', '181.jpg', 'D:\\xampp\\htdocs\\blog\\storage\\users\\1\\galleries\\31\\AQxjbToDs6608YDecT2HjEeoBJ0hVd.jpg', 31, NULL, '2016-09-12 12:50:23', '2016-09-12 12:50:23'),
	(51, 'aTvEkO0tEHqo8IwWDVp3Ida9RW0lGx.jpg', 'aTvEkO0tEHqo8IwWDVp3Ida9RW0lGx.jpg', '172.jpg', 'D:\\xampp\\htdocs\\blog\\storage\\users\\2\\galleries\\32\\aTvEkO0tEHqo8IwWDVp3Ida9RW0lGx.jpg', 32, NULL, '2016-09-14 11:56:08', '2016-09-14 11:56:08');
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
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8;

-- Dumping data for table blog.likes: ~0 rows (approximately)
/*!40000 ALTER TABLE `likes` DISABLE KEYS */;
INSERT INTO `likes` (`id`, `user_id`, `post_id`, `type`, `created_at`, `updated_at`) VALUES
	(41, 1, 2, 'post', '2016-09-02 12:03:54', '2016-09-02 12:03:54'),
	(42, 1, 4, 'post', '2016-09-06 08:28:01', '2016-09-06 08:28:01'),
	(55, 2, 26, 'gallery', '2016-09-14 12:11:44', '2016-09-14 12:11:44'),
	(56, 1, 26, 'gallery', '2016-09-14 12:11:53', '2016-09-14 12:11:53'),
	(60, 2, 32, 'gallery', '2016-09-14 12:28:32', '2016-09-14 12:28:32'),
	(62, 1, 51, 'image', '2016-09-14 12:35:41', '2016-09-14 12:35:41'),
	(63, 2, 51, 'image', '2016-09-14 12:36:23', '2016-09-14 12:36:23');
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

-- Dumping data for table blog.location: ~0 rows (approximately)
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
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

-- Dumping data for table blog.messages: ~33 rows (approximately)
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` (`id`, `sender_id`, `receiver_id`, `text`, `readed`, `answered`, `created_at`, `updated_at`) VALUES
	(6, 2, 1, 'hei', 1, NULL, '2016-09-02 15:29:18', '2016-09-07 14:25:20'),
	(7, 1, 2, 'Pasol', 1, 0, '2016-09-02 12:29:30', '2016-09-08 06:52:48'),
	(8, 1, 2, 'yo', 1, 0, '2016-09-06 08:27:11', '2016-09-08 06:52:48'),
	(9, 1, 2, 'uuuuuuuuu', 1, 0, '2016-09-06 08:30:07', '2016-09-08 06:52:48'),
	(10, 1, 7, 'Hi bitch', 0, 0, '2016-09-06 10:05:51', '2016-09-07 11:43:41'),
	(11, 1, 7, 'How are you?', 0, 0, '2016-09-06 10:06:35', '2016-09-07 11:43:41'),
	(12, 1, 2, 'AAAAAAAA', 1, 0, '2016-09-06 11:56:04', '2016-09-08 06:52:48'),
	(13, 1, 2, 'BBB  C', 1, 0, '2016-09-06 11:56:09', '2016-09-08 06:52:40'),
	(14, 1, 2, 'Bī bī sī', 1, 0, '2016-09-06 11:56:18', '2016-09-08 06:52:40'),
	(15, 1, 7, 'ei', 0, 0, '2016-09-06 12:15:03', '2016-09-07 11:43:41'),
	(16, 1, 2, 'Nigga', 1, 0, '2016-09-06 12:15:18', '2016-09-08 06:52:40'),
	(17, 1, 2, 'nikk', 1, 0, '2016-09-06 12:20:23', '2016-09-08 06:52:39'),
	(18, 1, 2, 'Nu kū vacīs. Na vāļ vīnu vjāstuļi. Esi prīceigs. Lorem ipsum dollar cake. Fuck off!', 1, 0, '2016-09-07 14:18:47', '2016-09-08 06:52:39'),
	(19, 1, 2, 'hj', 0, 0, '2016-09-08 07:35:08', '2016-09-08 07:35:08'),
	(20, 1, 2, 'fg', 0, 0, '2016-09-08 07:35:35', '2016-09-08 07:35:35'),
	(21, 1, 2, 'Eijjjjjjjjjj', 0, 0, '2016-09-08 07:36:11', '2016-09-08 07:36:11'),
	(22, 1, 2, 'yuy', 0, 0, '2016-09-08 07:40:30', '2016-09-08 07:40:30'),
	(23, 1, 2, 'uuuuuuuuuuuuuu', 0, 0, '2016-09-08 07:43:13', '2016-09-08 07:43:13'),
	(24, 1, 2, 'aaaaaaaaaaa', 0, 0, '2016-09-08 07:47:02', '2016-09-08 07:47:02'),
	(25, 1, 2, 'bbbbbbb', 0, 0, '2016-09-08 07:47:05', '2016-09-08 07:47:05'),
	(26, 1, 2, 'cccccccccc', 0, 0, '2016-09-08 07:47:09', '2016-09-08 07:47:09'),
	(27, 1, 2, 'dddddd', 0, 0, '2016-09-08 07:47:21', '2016-09-08 07:47:21'),
	(28, 1, 2, 'ei', 0, 0, '2016-09-08 07:50:24', '2016-09-08 07:50:24'),
	(29, 1, 2, 'yo', 1, 0, '2016-09-08 07:50:29', '2016-09-08 08:34:32'),
	(30, 1, 2, 'nigga', 1, 0, '2016-09-08 07:50:35', '2016-09-08 08:34:32'),
	(31, 1, 2, 'gh', 1, 0, '2016-09-08 07:51:28', '2016-09-08 08:34:32'),
	(32, 1, 2, 'rrrrrrrrrrrrrr', 1, 0, '2016-09-08 07:53:29', '2016-09-08 08:34:31'),
	(33, 1, 2, 'hhhhhh', 1, 0, '2016-09-08 07:54:47', '2016-09-08 08:34:01'),
	(34, 1, 2, 'Hei pipsi', 1, 0, '2016-09-08 08:14:01', '2016-09-08 08:34:01'),
	(35, 1, 2, 'Heiiiiiiiiiiiiii', 1, 0, '2016-09-08 08:14:53', '2016-09-08 08:34:01'),
	(36, 1, 2, 'Hei pipsi', 1, 0, '2016-09-08 08:15:26', '2016-09-08 08:34:01'),
	(37, 1, 2, 'nigga, tev jauna vēstule', 1, 0, '2016-09-08 08:30:39', '2016-09-08 08:34:00'),
	(38, 2, 1, 'Ņuņņa', 1, 0, '2016-09-08 08:56:34', '2016-09-08 08:59:13');
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
  KEY `posts_index` (`content`),
  CONSTRAINT `FK_posts_users` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table blog.posts: ~3 rows (approximately)
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` (`id`, `name`, `content`, `sender_id`, `receiver_id`, `post_type`, `location_id`, `content_id`, `created_at`, `updated_at`) VALUES
	(2, NULL, 'Hei dawg', 1, NULL, NULL, 8, NULL, '2016-09-02 12:03:51', '2016-09-02 12:03:51'),
	(3, NULL, 'Otardiena', 1, NULL, NULL, NULL, NULL, '2016-09-06 08:27:26', '2016-09-06 08:27:26'),
	(4, NULL, 'Vasals Māri', 1, 2, NULL, NULL, NULL, '2016-09-06 08:27:53', '2016-09-06 08:27:53');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table blog.users: ~12 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `surname`, `email`, `online`, `year`, `gender`, `photo`, `address`, `telephone`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Jānis', 'Mozais', 'jonc@inbox.lv', 0, NULL, NULL, NULL, NULL, NULL, '$2y$10$xFWkf7rzTgeWTfqOQPjxYev/zNTk6iqW0N0MSnD6EYOwaTPGsmB5.', 'wIQPvTfg4kOnG61GtLLMUHfMooUFL1RpsgQLfW9ikR8SYHFB9bZn0lUbFfqb', '2016-09-02 10:16:14', '2016-09-14 11:55:09'),
	(2, 'Mairis', 'Briedis', 'mairis@mairis.lv', 1, NULL, NULL, NULL, NULL, NULL, '$2y$10$X7L/HlobGCm30eawtS0BsOXc0MtabtqhaVnmwRd8U1KZC1Xzow0xS', 'ZjbZhIPOSJLLSCvnrmIdfuBtydjsJTNwTcdfjg9ZR5bjnBKZL5rzOsUW1dFT', NULL, '2016-09-08 08:06:16'),
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table blog.visitors: ~0 rows (approximately)
/*!40000 ALTER TABLE `visitors` DISABLE KEYS */;
/*!40000 ALTER TABLE `visitors` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
