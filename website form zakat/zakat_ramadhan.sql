-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2024 at 02:21 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `zakat_ramadhan`
--

-- --------------------------------------------------------

--
-- Table structure for table `donasi`
--

CREATE TABLE IF NOT EXISTS `donasi` (
`id_donatur` int(11) NOT NULL,
  `gerai` varchar(50) NOT NULL,
  `petugas_gerai` varchar(100) NOT NULL,
  `nama_donatur` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nomor_hp` varchar(20) NOT NULL,
  `perincian_donasi` varchar(100) NOT NULL,
  `bentuk_donasi` enum('uang','barang') NOT NULL,
  `keterangan` text,
  `tanggal_donasi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `donasi`
--

INSERT INTO `donasi` (`id_donatur`, `gerai`, `petugas_gerai`, `nama_donatur`, `alamat`, `nomor_hp`, `perincian_donasi`, `bentuk_donasi`, `keterangan`, `tanggal_donasi`) VALUES
(1, 'PAUD', 'A. Burhanuddin', 'Asyah', 'Jl. Mawar No. 123', '08123456789', 'Cinta Yatim', 'uang', '', '2024-01-17 02:11:55'),
(4, 'PAUD', 'A. Burhanuddin', 'ASA', 'Jl. Mawar No. 123', '0811111111', 'Barbeku', 'barang', '', '2024-01-18 02:46:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donasi`
--
ALTER TABLE `donasi`
 ADD PRIMARY KEY (`id_donatur`), ADD UNIQUE KEY `nama_donatur` (`nama_donatur`,`nomor_hp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donasi`
--
ALTER TABLE `donasi`
MODIFY `id_donatur` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
