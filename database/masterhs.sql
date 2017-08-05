-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2017 at 05:34 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `validasiimpor`
--

-- --------------------------------------------------------

--
-- Table structure for table `masterhs`
--

CREATE TABLE IF NOT EXISTS `masterhs` (
  `idHS` int(11) NOT NULL,
  `kodeHS` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `masterhs`
--

INSERT INTO `masterhs` (`idHS`, `kodeHS`) VALUES
(1, 1401900000),
(2, 1404200000),
(3, 1404909000),
(4, 1401100000),
(5, 1401201100),
(6, 1401201990),
(7, 1404902090),
(8, 1404902010),
(9, 1401209000),
(10, 1404903000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `masterhs`
--
ALTER TABLE `masterhs`
  ADD PRIMARY KEY (`idHS`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `masterhs`
--
ALTER TABLE `masterhs`
  MODIFY `idHS` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
