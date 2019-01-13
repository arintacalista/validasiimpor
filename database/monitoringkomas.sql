-- Adminer 4.7.0 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `data_responden`;
CREATE TABLE `data_responden` (
  `id_responden` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_art` int(20) NOT NULL,
  `nama_art` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `jenis_survei`;
CREATE TABLE `jenis_survei` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `jenis_survei` (`id`, `nama`, `deskripsi`) VALUES
(1,	'susenas',	'Survei Sosial Ekonomi Nasional'),
(2,	'sakernas',	'Survei Angkatan Kerja Nasional'),
(3,	'sbh',	'Survei Biaya Hidup');

DROP TABLE IF EXISTS `kegiatan`;
CREATE TABLE `kegiatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `kegiatan` (`id`, `nama`) VALUES
(1,	'Pencacahan'),
(2,	'Pencacahan Clean');

DROP TABLE IF EXISTS `pic`;
CREATE TABLE `pic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `pic` (`id`, `kode`, `nama`) VALUES
(1,	'PCL',	'Petugas Cacah Lapangan'),
(2,	'PML',	'Pengawas'),
(3,	'SM',	'Subject Matter');

DROP TABLE IF EXISTS `survei_dokumen`;
CREATE TABLE `survei_dokumen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_jenis_survei` int(11) NOT NULL,
  `id_kegiatan` int(11) NOT NULL,
  `id_pic` int(11) NOT NULL,
  `banyak_dokumen` int(11) NOT NULL DEFAULT '0',
  `dokumen_bersih` int(11) NOT NULL DEFAULT '0',
  `dokumen_salah` int(11) NOT NULL DEFAULT '0',
  `persentase_selesai` decimal(20,2) DEFAULT '0.00',
  PRIMARY KEY (`id`),
  KEY `id_pic` (`id_pic`),
  KEY `id_jenis_survei` (`id_jenis_survei`),
  KEY `id_kegiatan` (`id_kegiatan`),
  CONSTRAINT `survei_dokumen_ibfk_1` FOREIGN KEY (`id_jenis_survei`) REFERENCES `jenis_survei` (`id`),
  CONSTRAINT `survei_dokumen_ibfk_3` FOREIGN KEY (`id_kegiatan`) REFERENCES `kegiatan` (`id`),
  CONSTRAINT `survei_dokumen_ibfk_4` FOREIGN KEY (`id_pic`) REFERENCES `pic` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `survei_dokumen` (`id`, `id_jenis_survei`, `id_kegiatan`, `id_pic`, `banyak_dokumen`, `dokumen_bersih`, `dokumen_salah`, `persentase_selesai`) VALUES
(1,	2,	1,	2,	8,	5,	3,	62.50),
(2,	3,	2,	2,	0,	0,	0,	0.00);

DROP TABLE IF EXISTS `survei_dokumen_detail`;
CREATE TABLE `survei_dokumen_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_survei_dokumen` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `dokumen_bersih` int(11) NOT NULL,
  `dokumen_salah` int(11) NOT NULL,
  `tanggal_dibuat` date DEFAULT NULL,
  `disetujui` tinyint(4) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_survei_dokumen` (`id_survei_dokumen`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `survei_dokumen_detail_ibfk_2` FOREIGN KEY (`id_survei_dokumen`) REFERENCES `survei_dokumen` (`id`),
  CONSTRAINT `survei_dokumen_detail_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `survei_dokumen_detail` (`id`, `id_survei_dokumen`, `id_user`, `dokumen_bersih`, `dokumen_salah`, `tanggal_dibuat`, `disetujui`, `created_at`) VALUES
(5,	1,	1,	5,	3,	'2019-01-12',	1,	NULL),
(6,	1,	1,	10,	10,	'2019-01-13',	0,	NULL);

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `password` varchar(128) NOT NULL,
  `enkrip` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `user` (`id`, `username`, `password`, `enkrip`) VALUES
(1,	'admin',	'admin',	'admin');

-- 2019-01-13 08:04:04
