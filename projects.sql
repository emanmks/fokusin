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

-- Dumping structure for table fokusin.projects
CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `deadline` date NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `visible` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table fokusin.projects: ~15 rows (approximately)
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` (`id`, `name`, `deadline`, `description`, `visible`, `created_at`, `updated_at`) VALUES
	(1, 'Fokusin', '2014-12-10', '<b>Fokusin</b>&nbsp;adalah project pribadi saya yang dibuat untuk menjadi Asisten Pribadi saya dalam menjalakan project-project saya.<b> Fokusin</b>&nbsp;cocok untuk Professional yang bekerja secara <b>Multitasking</b>', 1, '2014-12-04 05:18:06', '2014-12-04 13:24:57'),
	(2, 'iSILK', '2014-12-08', 'Perbaikan iSILK, agar dapat betul-betul diimplementasikan oleh <b>Balai Besar Laboratorium Kesehatan Makassar</b>.<br>Perbaikan ini meliputi perbaikan dari struktur Database, Logika Proses, dan Optimasi Tampilan, Perbaikan Laporan, dll<br>Selesaikan secepatnya demi <u>Harga Diri Perusahaan</u>, menjaga <u>nama baik Teman</u> dan terutama dalam rangka <b>Taqwa kepada Allah</b> dengan menuntaskan <i>Amanah</i> yang diberikan sesama manusia.', 1, '2014-12-04 07:28:53', '2014-12-04 15:18:51'),
	(4, 'Creative', '2014-12-08', 'Creative adalah Business Intelligence untuk Bimbingan Belajar JILC cabang Andalas. Saat ini dalam proses implementasi awal, penerimaan feedback user, penambahan fitur, penyempurnaan dan sebagainya.', 1, '2014-12-04 15:45:13', '2014-12-04 15:45:13'),
	(5, 'BukuAlumni', '2014-12-31', 'Buku Alumni adalah Platform Silaturahim antar Alumni. Implementasi awal akan digunakan di oleh Alumni SMA Negeri 1 Bajeng', 1, '2014-12-04 15:47:14', '2014-12-04 15:47:14'),
	(6, 'Eco Panel', '2014-12-07', 'Official Website PT. Eco Panel Indonesia', 1, '2014-12-04 15:48:06', '2014-12-04 15:48:30'),
	(7, 'Cabinets', '2014-12-13', 'Cabinets adalah Modul Pengelolaan File berbasis Website / Cloud', 1, '2014-12-04 15:50:10', '2014-12-04 15:50:10'),
	(8, 'Purchase', '2014-12-31', 'Purchase adalah Modul Purchasing yang merupakan pecahan dari paket Bussiness Intelligence karya ewakooLabs', 1, '2014-12-04 15:51:53', '2014-12-04 15:51:53'),
	(9, 'Inventory', '2014-12-31', 'Inventory adalah modul Inventory yang merupakan pecahan dari Business Intelligence karya ewakooLabs', 1, '2014-12-04 15:52:36', '2014-12-04 15:52:36'),
	(10, 'Sales', '2014-12-31', 'Sales adalah Modul Sales yang merupakan pecahan dari Paket Business Intelligence karya ewakooLabs', 1, '2014-12-04 15:53:12', '2014-12-04 15:53:12'),
	(11, 'Postingan', '2014-12-04', 'Postingan adalah Modul/Package yang didesain khusus sebagai dasar dari sebuah Content Management System', 1, '2014-12-04 15:54:23', '2014-12-04 15:54:23'),
	(12, 'Keranjang', '2014-12-31', 'Keranjang adalah Modul Keranjang Online sebagai pecahan dari paket Business Intelligence karya ewakooLabs untuk divisi Penjualan Online', 1, '2014-12-04 15:55:28', '2014-12-04 15:55:28'),
	(13, 'Etalase', '2014-12-31', 'Etalase adalah Modul/Package untuk katalog produk online', 1, '2014-12-04 15:56:21', '2014-12-04 15:56:21'),
	(14, 'Linguista', '2014-12-13', 'Linguista adalah CMS yang khusus dikembangkan untuk PT. Linguista Pratama Mandiri untuk menjalankan fungsi ITC Preferred Vendor (IPV) yang dijalankan di Kota Makassar', 1, '2014-12-04 15:57:56', '2014-12-04 15:57:56'),
	(15, 'Umrah', '2014-12-20', 'Umrah adalah Platform layanan pencarian jasa Pemberangkatan Umrah. Platform ini akan membantu calon Jamaah untuk mendapatkan paket Umrah murah namun berkualitas yang sesuai dengan kemampuan, kota asal, dan selera calon Jamaah. Bagi Agen Umrah akan membantu mereka mendapatkan jamaah Umrah', 1, '2014-12-04 16:00:37', '2014-12-04 16:00:37'),
	(16, 'Kerabat', '2014-12-12', 'Kerabat adalah platform informasi hubungan darah. Sistem ini akan membantu menyusun hierarki hubungan kekeluargaan.<br>Pada milestone awal ini, kerabat hanya akan mencatat data ayah dan ibu kandung dari setiap individu, hubungan pernikahan antar individu kemudian keturunan dari setiap pernikahan', 1, '2014-12-06 07:55:18', '2014-12-06 07:57:02');
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
