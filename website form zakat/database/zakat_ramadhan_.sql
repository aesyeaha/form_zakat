-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2024 at 02:31 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `zakat_ramadhan_`
--

-- --------------------------------------------------------

--
-- Table structure for table `donasi_data`
--

CREATE TABLE IF NOT EXISTS `donasi_data` (
`id_donasi` int(11) NOT NULL,
  `nama_id_donatur` varchar(50) NOT NULL,
  `gerai` varchar(50) NOT NULL,
  `petugas_gerai` varchar(50) NOT NULL,
  `nama_donatur` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nomor_hp` varchar(20) NOT NULL,
  `perincian_donasi` varchar(50) NOT NULL,
  `bentuk_donasi` varchar(10) NOT NULL,
  `jumlah_rp` int(11) DEFAULT NULL,
  `jumlah_paket` int(11) DEFAULT NULL,
  `cara_pembayaran` varchar(20) NOT NULL,
  `bukti_pembayaran` varchar(255) DEFAULT NULL,
  `keterangan` text,
  `total_rp` int(11) DEFAULT NULL,
  `total_paket` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `donasi_data`
--

INSERT INTO `donasi_data` (`id_donasi`, `nama_id_donatur`, `gerai`, `petugas_gerai`, `nama_donatur`, `alamat`, `nomor_hp`, `perincian_donasi`, `bentuk_donasi`, `jumlah_rp`, `jumlah_paket`, `cara_pembayaran`, `bukti_pembayaran`, `keterangan`, `total_rp`, `total_paket`) VALUES
(1, 'TPA-PS', '', '', '', '', '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL),
(2, 'PGIT', '', '', '', '', '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL),
(3, 'TK-A1 - A2', '', '', '', '', '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL),
(4, 'TK-A3 - A5', '', '', '', '', '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL),
(5, 'TK-B1 - B2', '', '', '', '', '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL),
(6, 'TK-B3 - B4', '', '', '', '', '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL),
(7, 'SD-1A', '', '', '', '', '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL),
(8, 'SD-1B', '', '', '', '', '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL),
(9, 'SD-1C', '', '', '', '', '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL),
(10, 'SD-1D', '', '', '', '', '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL),
(11, 'SD-1|CP', '', '', '', '', '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL),
(12, 'SD-2A', '', '', '', '', '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL),
(13, 'SD-2B', '', '', '', '', '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL),
(14, 'SD-2C', '', '', '', '', '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL),
(15, 'SD-2D', '', '', '', '', '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL),
(16, 'SD-3A', '', '', '', '', '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL),
(17, 'SD-3B', '', '', '', '', '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL),
(18, 'SD-3C', '', '', '', '', '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL),
(19, 'SD-3D', '', '', '', '', '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL),
(20, 'SD-4A', '', '', '', '', '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL),
(21, 'SD-4B', '', '', '', '', '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL),
(22, 'SD-4C', '', '', '', '', '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL),
(23, 'SD-4D', '', '', '', '', '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL),
(24, 'SD-5A', '', '', '', '', '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL),
(25, 'SD-5B', '', '', '', '', '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL),
(26, 'SD-5C', '', '', '', '', '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL),
(27, 'SD-5D', '', '', '', '', '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL),
(28, 'SD-6A', '', '', '', '', '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL),
(29, 'SD-6B', '', '', '', '', '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL),
(30, 'SD-6C', '', '', '', '', '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL),
(31, 'SD-6D', '', '', '', '', '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL),
(32, 'SMP-7A', '', '', '', '', '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL),
(33, 'SMP-7B', '', '', '', '', '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL),
(34, 'SMP-7C', '', '', '', '', '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL),
(35, 'SMP-7D', '', '', '', '', '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL),
(36, 'SMP-8A', '', '', '', '', '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL),
(37, 'SMP-8B', '', '', '', '', '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL),
(38, 'SMP-8C', '', '', '', '', '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL),
(39, 'SMP-8D', '', '', '', '', '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL),
(40, 'SMP-9A', '', '', '', '', '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL),
(41, 'SMP-9B', '', '', '', '', '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL),
(42, 'SMP-9C', '', '', '', '', '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL),
(43, 'SMP-9D', '', '', '', '', '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL),
(44, 'MA-10', '', '', '', '', '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL),
(45, 'MA-11', '', '', '', '', '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL),
(46, 'MA-12', '', '', '', '', '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL),
(47, 'P1', '', '', '', '', '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL),
(48, 'P2', '', '', '', '', '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL),
(49, 'P3', '', '', '', '', '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL),
(50, 'P4', '', '', '', '', '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL),
(51, 'P5', '', '', '', '', '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL),
(52, 'Umum', '', '', '', '', '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donasi_data`
--
ALTER TABLE `donasi_data`
 ADD PRIMARY KEY (`id_donasi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donasi_data`
--
ALTER TABLE `donasi_data`
MODIFY `id_donasi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
