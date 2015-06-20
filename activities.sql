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

-- Dumping structure for table fokusin.activities
CREATE TABLE IF NOT EXISTS `activities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `classification_id` int(10) unsigned NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `done` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table fokusin.activities: ~31 rows (approximately)
/*!40000 ALTER TABLE `activities` DISABLE KEYS */;
INSERT INTO `activities` (`id`, `classification_id`, `name`, `done`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Generate Scaffolding entitas Project', 1, '2014-12-04 07:04:00', '2014-12-04 08:45:47'),
	(2, 1, 'Generate Scaffolding entitas Klasifikasi', 1, '2014-12-04 07:17:55', '2014-12-04 08:37:28'),
	(3, 1, 'Generate Scaffolding entitas Tugas', 1, '2014-12-04 07:18:15', '2014-12-04 08:37:17'),
	(4, 2, 'Coding Update Project', 1, '2014-12-04 08:50:12', '2014-12-04 09:15:20'),
	(5, 2, 'Coding Update Tugas', 1, '2014-12-04 08:50:36', '2014-12-04 15:03:26'),
	(6, 2, 'Coding Update Klasifikasi', 1, '2014-12-04 08:50:51', '2014-12-04 14:08:01'),
	(9, 2, 'Coding Hapus Tugas', 1, '2014-12-04 09:20:29', '2014-12-04 13:04:04'),
	(10, 2, 'Coding Hapus Klasifikasi', 1, '2014-12-04 14:04:16', '2014-12-04 14:04:24'),
	(11, 3, 'Install Package PDF yang sesuai, instalasi mudah, support CSS, dll', 0, '2014-12-04 16:02:19', '2014-12-04 16:02:19'),
	(12, 5, 'Desain Layout dan Komposisi Dashboard', 1, '2014-12-05 06:44:33', '2014-12-07 03:32:10'),
	(13, 5, 'Tampilkan Statistik Pendaftaran Pemeriksaan 5 hari terakhir', 0, '2014-12-05 06:52:39', '2014-12-05 06:52:39'),
	(14, 5, 'Tampilkan List Pendaftar Hari ini', 0, '2014-12-05 06:52:56', '2014-12-05 06:52:56'),
	(15, 5, 'Tampilkan List Penerimaan Sampel yang Belum dan Telah diterima hari ini', 0, '2014-12-05 06:53:24', '2014-12-05 06:53:24'),
	(16, 5, 'Tampilkan Statistik Penerimaan 5 hari terakhir', 0, '2014-12-05 06:54:50', '2014-12-05 06:54:50'),
	(17, 6, 'Reinvent the wheel Form Registrasi', 1, '2014-12-05 06:56:36', '2015-01-15 05:18:22'),
	(18, 6, 'Buat Halaman Summary Pendaftaran + Pengantar Pengambilan Sampel', 1, '2014-12-05 06:57:01', '2015-01-15 05:18:31'),
	(19, 10, 'Penempatan Pegawai', 1, '2014-12-05 07:06:29', '2015-01-15 05:18:34'),
	(20, 6, 'Reinvent the wheel Form Sampling', 1, '2014-12-05 07:13:56', '2015-01-15 05:18:45'),
	(21, 6, 'Reinvent the wheel Form Input Hasil Pemeriksaan', 1, '2014-12-05 07:14:17', '2015-01-15 05:18:47'),
	(22, 6, 'Reinvent the wheel Form Verifikasi', 1, '2014-12-05 07:14:36', '2015-01-15 05:18:49'),
	(23, 7, 'Reinvent the wheel pengelolaan layanan pemeriksaan', 1, '2014-12-05 07:21:11', '2015-01-15 05:19:01'),
	(24, 6, 'Reinvent the wheel Laporan Hasil Uji', 1, '2014-12-05 07:38:52', '2015-01-15 05:18:50'),
	(27, 11, 'Defenisi Entitas dan Desain Database', 0, '2014-12-06 07:57:40', '2014-12-06 07:58:03'),
	(28, 11, 'Desain Logo', 0, '2014-12-06 07:58:13', '2014-12-06 07:58:13'),
	(29, 11, 'Wireframing User Interface', 0, '2014-12-06 07:58:36', '2014-12-06 07:58:36'),
	(30, 12, 'Defenisikan Requirement Systems', 0, '2014-12-06 07:59:45', '2014-12-06 07:59:45'),
	(31, 13, 'Defenisikan Requirement Systems', 0, '2014-12-06 08:02:49', '2014-12-06 08:02:49'),
	(32, 13, 'Entry Data Alumni', 0, '2014-12-06 08:03:10', '2014-12-06 08:03:10'),
	(36, 1, 'Buat Logika Terminate Project', 0, '2014-12-07 01:23:37', '2014-12-07 01:23:37'),
	(37, 2, 'Fitur Hapus or Hentikan Project', 0, '2014-12-07 01:24:03', '2014-12-07 01:24:14'),
	(38, 14, 'Desain Komposisi dan Desain Layout Halaman Dokumentasi', 1, '2014-12-07 13:05:58', '2015-01-15 05:19:42');
/*!40000 ALTER TABLE `activities` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
