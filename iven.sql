-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for inventory_control_db
CREATE DATABASE IF NOT EXISTS `inventory_control_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `inventory_control_db`;

-- Dumping structure for table inventory_control_db.admins
CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table inventory_control_db.admins: ~6 rows (approximately)
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` (`id`, `user_code`, `name`, `email`, `password`, `phone`, `date_of_birth`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(1, '20001', 'adminOne', 'admin1@gmail.com', '123aaAA@#', '09123456789', '1990-11-01', NULL, '2024-11-15 14:56:00', '2024-12-05 16:25:16'),
	(10, '20002', 'Than Tun Aung', 'thantunaung@gmail.com', '121212', NULL, NULL, NULL, '2024-11-24 00:01:15', '2024-11-24 00:01:15'),
	(34, '20003', 'thantunaung2', 'thantunaung2@mail.com', '121212', NULL, NULL, NULL, '2024-11-24 09:37:34', '2024-11-24 09:37:34'),
	(35, '20004', 'thantunaung3', 'tta3@gmail.com', '121212', NULL, NULL, '2024-11-30 21:32:53', '2024-11-24 09:46:32', '2024-11-30 21:32:53'),
	(54, '20005', 'thantunaung four', 'thantunaungfour@gmail.com', 'aaAA23@#', '09798174380', '1991-07-19', NULL, '2024-11-27 06:42:02', '2024-11-30 18:53:54'),
	(55, '20006', 'dummyone', 'dummy1@gmail.com', 'ddDD123@#', NULL, '1981-12-30', NULL, '2024-11-30 20:23:28', '2024-11-30 21:00:32'),
	(56, '20007', 'dummyone', 'dummy1@mail.com', 'ddDD123@#', NULL, '1997-12-26', NULL, '2024-11-30 20:58:06', '2024-11-30 20:58:06');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;

-- Dumping structure for table inventory_control_db.deleted_admins
CREATE TABLE IF NOT EXISTS `deleted_admins` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `admin_id` bigint(20) unsigned NOT NULL,
  `deleted_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_code` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table inventory_control_db.deleted_admins: ~0 rows (approximately)
/*!40000 ALTER TABLE `deleted_admins` DISABLE KEYS */;
INSERT INTO `deleted_admins` (`id`, `admin_id`, `deleted_date`, `user_code`, `name`, `email`, `phone`, `date_of_birth`, `created_at`, `updated_at`) VALUES
	(1, 35, '2024-11-24 09:46:32', '20004', 'thantunaung3', 'tta3@gmail.com', NULL, NULL, '2024-11-30 21:32:53', '2024-11-30 21:32:53');
/*!40000 ALTER TABLE `deleted_admins` ENABLE KEYS */;

-- Dumping structure for table inventory_control_db.deleted_purchases
CREATE TABLE IF NOT EXISTS `deleted_purchases` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `purchase_id` bigint(20) unsigned NOT NULL,
  `date` date NOT NULL,
  `user_code` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Yangon',
  `supplier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Supplier',
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Cash',
  `currency` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Kyats',
  `quantity` bigint(20) NOT NULL DEFAULT '0',
  `discount_and_foc` bigint(20) NOT NULL DEFAULT '0',
  `paid` bigint(20) NOT NULL DEFAULT '0',
  `total` bigint(20) NOT NULL DEFAULT '0',
  `balance` bigint(20) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table inventory_control_db.deleted_purchases: ~0 rows (approximately)
/*!40000 ALTER TABLE `deleted_purchases` DISABLE KEYS */;
/*!40000 ALTER TABLE `deleted_purchases` ENABLE KEYS */;

-- Dumping structure for table inventory_control_db.deleted_sales
CREATE TABLE IF NOT EXISTS `deleted_sales` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `sale_id` bigint(20) unsigned NOT NULL,
  `date` date NOT NULL,
  `user_code` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Yangon',
  `customer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Customer',
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Cash',
  `currency` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Kyats',
  `quantity` bigint(20) NOT NULL DEFAULT '0',
  `discount_and_foc` bigint(20) NOT NULL DEFAULT '0',
  `paid` bigint(20) NOT NULL DEFAULT '0',
  `total` bigint(20) NOT NULL DEFAULT '0',
  `balance` bigint(20) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table inventory_control_db.deleted_sales: ~2 rows (approximately)
/*!40000 ALTER TABLE `deleted_sales` DISABLE KEYS */;
INSERT INTO `deleted_sales` (`id`, `sale_id`, `date`, `user_code`, `item_code`, `location`, `customer`, `payment_type`, `currency`, `quantity`, `discount_and_foc`, `paid`, `total`, `balance`, `created_at`, `updated_at`) VALUES
	(1, 29, '2024-11-29', '20005', 'ITEM001', 'Yangon', 'Customer', 'Cash', 'Kyats', 1, 0, 11223, 112234, 1122345, '2024-11-29 23:20:24', '2024-11-29 23:20:24'),
	(2, 17, '2024-11-12', '30001', 'ITEM005', 'Yangon', 'Mr. Zaw', 'Credit Card', 'Kyats', 2, 0, 20000, 20000, 0, '2024-11-30 11:01:57', '2024-11-30 11:01:57'),
	(3, 18, '2024-11-15', '30002', 'ITEM006', 'Mandalay', 'Ms. Hla', 'Bank Transfer', 'Kyats', 4, 200, 38000, 40000, 200, '2024-11-30 11:02:04', '2024-11-30 11:02:04');
/*!40000 ALTER TABLE `deleted_sales` ENABLE KEYS */;

-- Dumping structure for table inventory_control_db.deleted_users
CREATE TABLE IF NOT EXISTS `deleted_users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `deleted_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_code` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table inventory_control_db.deleted_users: ~2 rows (approximately)
/*!40000 ALTER TABLE `deleted_users` DISABLE KEYS */;
INSERT INTO `deleted_users` (`id`, `user_id`, `deleted_date`, `user_code`, `name`, `email`, `phone`, `date_of_birth`, `created_at`, `updated_at`) VALUES
	(1, 19, '2024-11-30 17:50:13', '30011', 'dddd', 'ddd@mail.com', NULL, '2024-11-30', '2024-11-30 21:13:44', '2024-11-30 21:13:44'),
	(2, 16, '2024-11-30 17:46:27', '30008', 'hjkl', 'hjkl2@gmail.com', NULL, '2024-11-30', '2024-11-30 21:26:25', '2024-11-30 21:26:25');
/*!40000 ALTER TABLE `deleted_users` ENABLE KEYS */;

-- Dumping structure for table inventory_control_db.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table inventory_control_db.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table inventory_control_db.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table inventory_control_db.migrations: ~9 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(17, '2019_08_19_000000_create_failed_jobs_table', 1),
	(21, '2024_11_15_073643_create_admins_table', 2),
	(22, '2024_11_15_074116_create_users_table', 3),
	(27, '2024_11_15_074245_create_sales_table', 4),
	(28, '2024_11_25_154553_create_purchases_table', 5),
	(29, '2024_11_22_170728_create_deleted_sales_table', 6),
	(30, '2024_11_22_170822_create_deleted_purchases_table', 7),
	(31, '2024_11_22_170728_create_deleted_users_table', 8),
	(32, '2024_11_22_170728_create_deleted_admins_table', 9);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table inventory_control_db.purchases
CREATE TABLE IF NOT EXISTS `purchases` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `user_code` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Yangon',
  `supplier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Supplier',
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Cash',
  `currency` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Kyats',
  `quantity` bigint(20) NOT NULL DEFAULT '0',
  `discount_and_foc` bigint(20) NOT NULL DEFAULT '0',
  `paid` bigint(20) NOT NULL DEFAULT '0',
  `total` bigint(20) NOT NULL DEFAULT '0',
  `balance` bigint(20) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table inventory_control_db.purchases: ~13 rows (approximately)
/*!40000 ALTER TABLE `purchases` DISABLE KEYS */;
INSERT INTO `purchases` (`id`, `date`, `user_code`, `item_code`, `location`, `supplier`, `payment_type`, `currency`, `quantity`, `discount_and_foc`, `paid`, `total`, `balance`, `created_at`, `updated_at`) VALUES
	(15, '2024-11-17', '20001', 'ITEM001', 'Yangon', 'Mr. Aung', 'Credit Card', 'Kyats', 5, 0, 50000, 50000, 0, '2024-11-17 23:06:22', '2024-11-17 23:06:22'),
	(16, '2024-11-12', '30001', 'ITEM005', 'Yangon', 'Mr. Zaw', 'Credit Card', 'Kyats', 2, 0, 20000, 20000, 0, '2024-11-12 23:06:22', '2024-11-12 23:06:22'),
	(17, '2024-11-15', '30002', 'ITEM006', 'Mandalay', 'Ms. Hla', 'Bank Transfer', 'Kyats', 4, 200, 38000, 40000, 200, '2024-11-15 23:06:22', '2024-11-15 23:06:22'),
	(18, '2024-11-19', '30003', 'ITEM007', 'Mandalay', 'Mr. Min', 'COD', 'Kyats', 7, 500, 34500, 35000, 500, '2024-11-19 23:06:22', '2024-11-19 23:06:22'),
	(19, '2024-11-22', '20002', 'ITEM002', 'Mandalay', 'Ms. Su', 'Bank Transfer', 'Kyats', 3, 500, 29500, 30000, 500, '2024-11-22 23:06:22', '2024-11-22 23:06:22'),
	(20, '2024-11-21', '30004', 'ITEM008', 'Yangon', 'Ms. Khin', 'Cash', 'Kyats', 3, 0, 30000, 30000, 0, '2024-11-21 23:06:22', '2024-11-21 23:06:22'),
	(21, '2024-11-23', '30005', 'ITEM009', 'Yangon', 'Mr. Htun', 'Credit Card', 'Kyats', 1, 0, 15000, 15000, 0, '2024-11-23 23:06:22', '2024-11-23 23:06:22'),
	(22, '2024-11-24', '30006', 'ITEM0010', 'Mandalay', 'Ms. Nwe', 'Bank Transfer', 'Kyats', 5, 1000, 49000, 50000, 1000, '2024-11-24 23:06:22', '2024-11-24 23:06:22'),
	(23, '2024-11-25', '20003', 'ITEM003', 'Mandalay', 'Mr. Ko', 'COD', 'Kyats', 10, 1000, 49000, 50000, 1000, '2024-11-25 23:06:22', '2024-11-25 23:06:22'),
	(24, '2024-11-25', '30007', 'ITEM0011', 'Mandalay', 'Mr. Aye', 'COD', 'Kyats', 8, 0, 80000, 80000, 0, '2024-11-25 23:06:22', '2024-11-25 23:06:22'),
	(25, '2024-11-26', '30008', 'ITEM0012', 'Mandalay', 'Ms. Mya', 'Cash', 'Kyats', 2, 0, 20000, 20000, 0, '2024-11-26 23:06:22', '2024-11-26 23:06:22'),
	(26, '2024-11-26', '20004', 'ITEM004', 'Mandalay', 'Ms. Nanda', 'Cash', 'Kyats', 1, 0, 15000, 15000, 0, '2024-11-26 23:06:22', '2024-11-26 23:06:22'),
	(27, '2024-11-27', '30009', 'ITEM0013', 'Yangon', 'Mr. Zaw', 'Credit Card', 'Kyats', 4, 0, 40000, 40000, 0, '2024-11-27 23:06:22', '2024-11-27 23:06:22');
/*!40000 ALTER TABLE `purchases` ENABLE KEYS */;

-- Dumping structure for table inventory_control_db.sales
CREATE TABLE IF NOT EXISTS `sales` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `user_code` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Yangon',
  `customer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Customer',
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Cash',
  `currency` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Kyats',
  `quantity` bigint(20) NOT NULL DEFAULT '0',
  `discount_and_foc` bigint(20) NOT NULL DEFAULT '0',
  `paid` bigint(20) NOT NULL DEFAULT '0',
  `total` bigint(20) NOT NULL DEFAULT '0',
  `balance` bigint(20) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table inventory_control_db.sales: ~14 rows (approximately)
/*!40000 ALTER TABLE `sales` DISABLE KEYS */;
INSERT INTO `sales` (`id`, `date`, `user_code`, `item_code`, `location`, `customer`, `payment_type`, `currency`, `quantity`, `discount_and_foc`, `paid`, `total`, `balance`, `created_at`, `updated_at`) VALUES
	(16, '2024-11-17', '20001', 'ITEM001', 'Yangon', 'Mr. Aung', 'Credit Card', 'Kyats', 5, 0, 50000, 50000, 0, '2024-11-17 23:06:25', '2024-11-17 23:06:25'),
	(19, '2024-11-19', '30003', 'ITEM007', 'Yangon', 'Mr. Min', 'COD', 'Kyats', 7, 500, 34500, 35000, 500, '2024-11-19 23:06:25', '2024-11-19 23:06:25'),
	(20, '2024-11-22', '20002', 'ITEM002', 'Mandalay', 'Ms. Su', 'Bank Transfer', 'Kyats', 3, 500, 29500, 30000, 500, '2024-11-22 23:06:25', '2024-11-22 23:06:25'),
	(21, '2024-11-21', '30004', 'ITEM008', 'Mandalay', 'Ms. Khin', 'Cash', 'Kyats', 3, 0, 30000, 30000, 0, '2024-11-21 23:06:25', '2024-11-21 23:06:25'),
	(22, '2024-11-23', '30005', 'ITEM009', 'Yangon', 'Mr. Htun', 'Credit Card', 'Kyats', 1, 0, 15000, 15000, 0, '2024-11-23 23:06:25', '2024-11-23 23:06:25'),
	(23, '2024-11-24', '30006', 'ITEM0010', 'Mandalay', 'Ms. Nwe', 'Bank Transfer', 'Kyats', 5, 1000, 49000, 50000, 1000, '2024-11-24 23:06:25', '2024-11-24 23:06:25'),
	(24, '2024-11-25', '20003', 'ITEM003', 'Mandalay', 'Mr. Ko', 'COD', 'Kyats', 10, 1000, 49000, 50000, 1000, '2024-11-25 23:06:25', '2024-11-25 23:06:25'),
	(25, '2024-11-25', '30007', 'ITEM0011', 'Mandalay', 'Mr. Aye', 'COD', 'Kyats', 8, 0, 80000, 80000, 0, '2024-11-25 23:06:25', '2024-11-25 23:06:25'),
	(26, '2024-11-26', '30008', 'ITEM0012', 'Yangon', 'Ms. Mya', 'Cash', 'Kyats', 2, 0, 20000, 20000, 0, '2024-11-26 23:06:25', '2024-11-26 23:06:25'),
	(27, '2024-11-26', '20004', 'ITEM004', 'Yangon', 'Ms. Nanda', 'Cash', 'Kyats', 1, 0, 15000, 15000, 0, '2024-11-26 23:06:25', '2024-11-26 23:06:25'),
	(28, '2024-11-27', '30009', 'ITEM0013', 'Yangon', 'Mr. Zaw', 'Credit Card', 'Kyats', 4, 0, 40000, 40000, 0, '2024-11-27 23:06:25', '2024-11-27 23:06:25'),
	(30, '2024-11-30', '20001', 'ITEM001', 'Yangon', 'Customer', 'Cash', 'Kyats', 1, 0, 0, 0, 0, '2024-11-30 11:01:43', '2024-11-30 18:19:44');
/*!40000 ALTER TABLE `sales` ENABLE KEYS */;

-- Dumping structure for table inventory_control_db.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table inventory_control_db.users: ~9 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `user_code`, `name`, `email`, `password`, `phone`, `date_of_birth`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(1, '30001', 'userOne', 'user1@gmail.com', '123aaAA@#', '09123456789', '1990-11-01', NULL, '2024-11-15 14:56:28', '2024-12-05 16:22:25'),
	(10, '30002', 'aaaaaaa', 'aaaaaa@gmail.com', '$2y$10$.dzW.1efN04iX66dSVM.weqjj6.IhVmGlyxsXIODRKJx/OTfG6FS.', '09887766', '2024-11-30', NULL, '2024-11-29 22:56:32', '2024-11-29 22:56:32'),
	(11, '30003', 'qwerty', 'qwerty@gmail.com', '$2y$10$kA.jqgZF.kvL3DeAreldzO7zRN.0C.eq4MzndmCAskrWU0iix8zEe', '123456789', '2024-11-30', NULL, '2024-11-30 10:35:45', '2024-11-30 10:35:45'),
	(12, '30004', 'asdfg', 'asdfg@gmail.com', '$2y$10$kA.jqgZF.kvL3DeAreldzO7zRN.0C.eq4MzndmCAskrWU0iix8zEe', '1234556', '2024-11-30', NULL, '2024-11-30 17:38:04', '2024-11-30 17:38:05'),
	(13, '30005', 'zxcvb', 'zxcvb@gmail.com', '$2y$10$kA.jqgZF.kvL3DeAreldzO7zRN.0C.eq4MzndmCAskrWU0iix8zEe', '123412334', '2024-11-30', NULL, '2024-11-30 17:38:50', '2024-11-30 17:38:51'),
	(14, '30006', 'yuiop', 'yuiop@gmail.com', '$2y$10$kA.jqgZF.kvL3DeAreldzO7zRN.0C.eq4MzndmCAskrWU0iix8zEe', '121234342', '2024-11-30', NULL, '2024-11-30 17:39:25', '2024-11-30 17:39:26'),
	(15, '30007', 'asaas', 'asaas@mail.com', '12345', '123433433', '2024-11-30', NULL, '2024-11-30 17:44:52', '2024-11-30 17:44:53'),
	(16, '30008', 'hjkl', 'hjkl2@gmail.com', '12345', '123443321', '2024-11-30', '2024-11-30 21:26:25', '2024-11-30 17:46:27', '2024-11-30 21:26:25'),
	(17, '30009', 'bbbb', 'bbbb@gmail.com', '12345', '123321231', '2024-11-30', NULL, '2024-11-30 17:47:08', '2024-11-30 17:47:09'),
	(18, '30010', 'cccc', 'cccc@gmail.com', '12345', '123213123', '2024-11-30', NULL, '2024-11-30 17:48:23', '2024-11-30 17:48:24'),
	(19, '30011', 'dddd', 'ddd@mail.com', '12@#aaAA', '12312313', '2024-11-30', '2024-11-30 21:13:44', '2024-11-30 17:50:13', '2024-11-30 21:13:44');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
