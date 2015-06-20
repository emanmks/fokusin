-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.14 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             8.3.0.4694
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table fokusin.classifications
CREATE TABLE IF NOT EXISTS `classifications` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `project_id` int(10) unsigned NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table fokusin.classifications: ~13 rows (approximately)
/*!40000 ALTER TABLE `classifications` DISABLE KEYS */;
INSERT INTO `classifications` (`id`, `project_id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Coding Backend', '2014-12-04 06:53:35', '2014-12-04 06:53:35'),
	(2, 1, 'Coding Frontend', '2014-12-04 06:59:46', '2014-12-04 14:08:41'),
	(3, 4, 'PDF Report', '2014-12-04 15:45:27', '2014-12-04 15:45:27'),
	(4, 6, 'Desain Template', '2014-12-04 16:04:01', '2014-12-04 16:04:01'),
	(5, 2, 'Dashboard', '2014-12-05 03:28:01', '2014-12-05 03:28:01'),
	(6, 2, 'Pemeriksaan', '2014-12-05 06:20:57', '2014-12-05 06:20:57'),
	(7, 2, 'Layanan', '2014-12-05 06:21:03', '2014-12-05 06:21:03'),
	(8, 2, 'Keuangan', '2014-12-05 06:21:18', '2014-12-05 06:21:18'),
	(9, 2, 'Laporan', '2014-12-05 06:21:24', '2014-12-05 06:21:24'),
	(10, 2, 'Data', '2014-12-05 07:06:14', '2014-12-05 07:06:14'),
	(11, 16, 'Persiapan', '2014-12-06 07:55:49', '2014-12-06 07:57:33'),
	(13, 5, 'Persiapan', '2014-12-06 08:02:32', '2014-12-06 08:02:32'),
	(14, 2, 'Dokumentasi', '2014-12-07 13:05:37', '2014-12-07 13:05:37');
/*!40000 ALTER TABLE `classifications` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
