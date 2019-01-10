-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2019 at 04:19 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `monitoringkomas`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis_survei`
--

CREATE TABLE IF NOT EXISTS `jenis_survei` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_survei`
--

INSERT INTO `jenis_survei` (`id`, `nama`, `deskripsi`) VALUES
(1, 'susenas', 'Survei Sosial Ekonomi Nasional'),
(2, 'sakernas', 'Survei Angkatan Kerja Nasional'),
(3, 'sbh', 'Survei Biaya Hidup');

-- --------------------------------------------------------

--
-- Table structure for table `pic`
--

CREATE TABLE IF NOT EXISTS `pic` (
  `id` int(11) NOT NULL,
  `kode` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pic`
--

INSERT INTO `pic` (`id`, `kode`, `nama`) VALUES
(1, 'PCL', 'Petugas Cacah Lapangan'),
(2, 'PML', 'Pengawas'),
(3, 'SM', 'Subject Matter');

-- --------------------------------------------------------

--
-- Table structure for table `survei_dokumen`
--

CREATE TABLE IF NOT EXISTS `survei_dokumen` (
  `id` int(11) NOT NULL,
  `id_jenis_survei` int(11) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_akhir` date NOT NULL,
  `banyak_dokumen` int(11) NOT NULL,
  `dokumen_bersih` int(11) NOT NULL,
  `dokumen_salah` int(11) NOT NULL,
  `id_pic` int(11) NOT NULL,
  `persentase_selesai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(3) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(128) NOT NULL,
  `enkrip` varchar(128) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `enkrip`) VALUES
(1, 'admin', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis_survei`
--
ALTER TABLE `jenis_survei`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pic`
--
ALTER TABLE `pic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `survei_dokumen`
--
ALTER TABLE `survei_dokumen`
  ADD PRIMARY KEY (`id`), ADD KEY `id_pic` (`id_pic`), ADD KEY `id_jenis_survei` (`id_jenis_survei`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis_survei`
--
ALTER TABLE `jenis_survei`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pic`
--
ALTER TABLE `pic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `survei_dokumen`
--
ALTER TABLE `survei_dokumen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `survei_dokumen`
--
ALTER TABLE `survei_dokumen`
ADD CONSTRAINT `survei_dokumen_ibfk_1` FOREIGN KEY (`id_jenis_survei`) REFERENCES `jenis_survei` (`id`),
ADD CONSTRAINT `survei_dokumen_ibfk_2` FOREIGN KEY (`id_pic`) REFERENCES `pic` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
