-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2024 at 03:18 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `zakatramadhan`
--

-- --------------------------------------------------------

--
-- Table structure for table `donasi`
--

CREATE TABLE IF NOT EXISTS `donasi` (
`id_donasi` int(11) NOT NULL,
  `id_donatur` int(11) NOT NULL,
  `gerai` varchar(20) NOT NULL,
  `petugas_gerai` varchar(50) NOT NULL,
  `cara_pembayaran` varchar(10) NOT NULL,
  `bukti_pembayaran` varchar(255) DEFAULT NULL,
  `keterangan` text,
  `total_rp` decimal(10,2) DEFAULT NULL,
  `total_paket` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `donatur`
--

CREATE TABLE IF NOT EXISTS `donatur` (
`id_donatur` int(11) NOT NULL,
  `nama_donatur` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nomor_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rincian_donasi`
--

CREATE TABLE IF NOT EXISTS `rincian_donasi` (
`id_rincian` int(11) NOT NULL,
  `id_donasi` int(11) NOT NULL,
  `perincian_donasi` varchar(50) NOT NULL,
  `bentuk_donasi` varchar(10) NOT NULL,
  `jumlah_rp` decimal(10,2) DEFAULT NULL,
  `jumlah_paket` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donasi`
--
ALTER TABLE `donasi`
 ADD PRIMARY KEY (`id_donasi`), ADD KEY `id_donatur` (`id_donatur`);

--
-- Indexes for table `donatur`
--
ALTER TABLE `donatur`
 ADD PRIMARY KEY (`id_donatur`);

--
-- Indexes for table `rincian_donasi`
--
ALTER TABLE `rincian_donasi`
 ADD PRIMARY KEY (`id_rincian`), ADD KEY `id_donasi` (`id_donasi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donasi`
--
ALTER TABLE `donasi`
MODIFY `id_donasi` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `donatur`
--
ALTER TABLE `donatur`
MODIFY `id_donatur` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rincian_donasi`
--
ALTER TABLE `rincian_donasi`
MODIFY `id_rincian` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `donasi`
--
ALTER TABLE `donasi`
ADD CONSTRAINT `donasi_ibfk_1` FOREIGN KEY (`id_donatur`) REFERENCES `donatur` (`id_donatur`);

--
-- Constraints for table `rincian_donasi`
--
ALTER TABLE `rincian_donasi`
ADD CONSTRAINT `rincian_donasi_ibfk_1` FOREIGN KEY (`id_donasi`) REFERENCES `donasi` (`id_donasi`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
