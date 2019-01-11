-- Adminer 4.7.0 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

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
  `nama` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_jenis_survei` int(11) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_akhir` date NOT NULL,
  `banyak_dokumen` int(11) NOT NULL,
  `dokumen_bersih` int(11) NOT NULL,
  `dokumen_salah` int(11) NOT NULL,
  `id_pic` int(11) NOT NULL,
  `persentase_selesai` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id_pic` (`id_pic`),
  KEY `id_jenis_survei` (`id_jenis_survei`),
  CONSTRAINT `survei_dokumen_ibfk_1` FOREIGN KEY (`id_jenis_survei`) REFERENCES `jenis_survei` (`id`),
  CONSTRAINT `survei_dokumen_ibfk_2` FOREIGN KEY (`id_pic`) REFERENCES `pic` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `survei_dokumen` (`id`, `nama`, `id_jenis_survei`, `tanggal_mulai`, `tanggal_akhir`, `banyak_dokumen`, `dokumen_bersih`, `dokumen_salah`, `id_pic`, `persentase_selesai`) VALUES
(1,	'Pencacahan',	1,	'2019-01-01',	'2019-01-31',	10,	5,	3,	1,	0),
(2,	'Pencacahan Clean',	1,	'2019-01-01',	'2019-01-31',	10,	3,	4,	1,	0);

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

-- 2019-01-11 02:27:26
