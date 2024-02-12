-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2024 at 01:00 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ziswaf`
--

-- --------------------------------------------------------

--
-- Table structure for table `donasi_data`
--

CREATE TABLE IF NOT EXISTS `donasi_data` (
`id_donasi` int(11) NOT NULL,
  `id_donatur` int(11) NOT NULL,
  `id_gerai` int(11) NOT NULL,
  `id_petugas_gerai` int(11) NOT NULL,
  `nama_donatur` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nomor_hp` varchar(20) NOT NULL,
  `cara_pembayaran` varchar(20) NOT NULL,
  `bukti_pembayaran` blob NOT NULL,
  `keterangan` text,
  `total_rp` int(11) NOT NULL,
  `total_paket` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Table structure for table `donasi_perincian_association`
--

CREATE TABLE IF NOT EXISTS `donasi_perincian_association` (
  `id_donasi` int(11) NOT NULL,
  `id_perincian_donasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `donatur`
--

CREATE TABLE IF NOT EXISTS `donatur` (
`id_donatur` int(11) NOT NULL,
  `nama_id_donatur` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `donatur`
--

INSERT INTO `donatur` (`id_donatur`, `nama_id_donatur`) VALUES
(1, 'TPA-PS'),
(2, 'PGIT'),
(3, 'TK-A1 - A2'),
(4, 'TK-A3 - A5'),
(5, 'TK-B1 - B2'),
(6, 'TK-B3 - B4'),
(7, 'SD-1A'),
(8, 'SD-1B'),
(9, 'SD-1C'),
(10, 'SD-1D'),
(11, 'SD-1|CP'),
(12, 'SD-2A'),
(13, 'SD-2B'),
(14, 'SD-2C'),
(15, 'SD-2D'),
(16, 'SD-3A'),
(17, 'SD-3B'),
(18, 'SD-3C'),
(19, 'SD-3D'),
(20, 'SD-4A'),
(21, 'SD-4B'),
(22, 'SD-4C'),
(23, 'SD-4D'),
(24, 'SD-5A'),
(25, 'SD-5B'),
(26, 'SD-5C'),
(27, 'SD-5D'),
(28, 'SD-6A'),
(29, 'SD-6B'),
(30, 'SD-6C'),
(31, 'SD-6D'),
(32, 'SMP-7A'),
(33, 'SMP-7B'),
(34, 'SMP-7C'),
(35, 'SMP-7D'),
(36, 'SMP-8A'),
(37, 'SMP-8B'),
(38, 'SMP-8C'),
(39, 'SMP-8D'),
(40, 'SMP-9A'),
(41, 'SMP-9B'),
(42, 'SMP-9C'),
(43, 'SMP-9D'),
(44, 'MA-10'),
(45, 'MA-11'),
(46, 'MA-12'),
(47, 'P1'),
(48, 'P2'),
(49, 'P3'),
(50, 'P4'),
(51, 'P5'),
(52, 'Umum');

-- --------------------------------------------------------

--
-- Table structure for table `gerai`
--

CREATE TABLE IF NOT EXISTS `gerai` (
`id_gerai` int(11) NOT NULL,
  `nama_gerai` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `gerai`
--

INSERT INTO `gerai` (`id_gerai`, `nama_gerai`) VALUES
(1, 'PAUD'),
(2, 'SD'),
(3, 'SMP'),
(4, 'MA'),
(5, 'Online');

-- --------------------------------------------------------

--
-- Table structure for table `perincian_donasi`
--

CREATE TABLE IF NOT EXISTS `perincian_donasi` (
`id_perincian_donasi` int(11) NOT NULL,
  `id_donasi` int(11) DEFAULT NULL,
  `perincian_donasi` varchar(50) DEFAULT NULL,
  `bentuk_donasi` varchar(10) DEFAULT NULL,
  `jumlah_rp` int(11) DEFAULT NULL,
  `jumlah_paket` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `petugas_gerai`
--

CREATE TABLE IF NOT EXISTS `petugas_gerai` (
`id_petugas_gerai` int(11) NOT NULL,
  `nama_petugas_gerai` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=64 ;

--
-- Dumping data for table `petugas_gerai`
--

INSERT INTO `petugas_gerai` (`id_petugas_gerai`, `nama_petugas_gerai`) VALUES
(1, 'A. Burhanuddin'),
(2, 'Achmad Nurkholik'),
(3, 'Agustin Wahyuningtyas'),
(4, 'Akhada Irmawati'),
(5, 'Akhmad Anwar Sadad'),
(6, 'Alynia Purwaning'),
(7, 'Andika Setyobudi'),
(8, 'Choirul Purwati'),
(9, 'Chusniatul Khisoli'),
(10, 'Chusnul Chotimah'),
(11, 'Dafis Luqqi Muzakki'),
(12, 'Dani Setiawan'),
(13, 'SDenny Sandyarani'),
(14, 'Devi Antika Sari'),
(15, 'Djuniati Kustifah'),
(16, 'Dwi Cahyanti Yuliasih'),
(17, 'Eka Saryani'),
(18, 'Elly Faizah'),
(19, 'Fashiha Ulinnuha'),
(20, 'Fitria Kurnia Fatma'),
(21, 'Fitria'),
(22, 'Gori Laksana Lusfida'),
(23, 'Ida Susanti'),
(24, 'Ismi Mardiyanah'),
(25, 'Khurin Alifia Yahya'),
(26, 'Khusnul Feryka A. Sari'),
(27, 'Khusnul Khotimah'),
(28, 'Krisdianto'),
(29, 'Listiyowati'),
(30, 'M. Hafidz Sulistyawan'),
(31, 'M. Januar Arifin"'),
(32, 'Mastoni Muhajirin'),
(33, 'Muhammad Hullah'),
(34, 'Nani Harpanti'),
(35, 'Nila Meirinda Wardhani'),
(36, 'Ninik Ikawanti'),
(37, 'Ninik Kuswahyuni'),
(38, 'Novita Mauris'),
(39, 'Nur Aisyiyah'),
(40, 'Nur Miftahul Hikmah'),
(41, 'Nurul Hidajati'),
(42, 'Puny Komariah'),
(43, 'Ramadani Akhirul'),
(44, 'Rhiza Arif Firman'),
(45, 'Roviatin Kurnia'),
(46, 'Saidah'),
(47, 'Santi Islamy Romadhony A'),
(48, 'Siti Masruroh'),
(49, 'Siti Rukoiyah Ulfah'),
(50, 'Sri Handayani'),
(51, 'Suyanti'),
(52, 'Ulil Fadhilah'),
(53, 'Umi Fauziah'),
(54, 'Umi Khusnul'),
(55, 'Wahyuningsih'),
(56, 'Wiwit Sofiyanti Budiono'),
(57, 'Yanuati Intan'),
(58, 'Yuni Ikhsaniah'),
(59, 'Ziauddin Bahtiar'),
(60, 'Zulfi Sufairoh'),
(61, 'Kukuh Nurma Nugroho'),
(62, 'Makhfud Kurniawan Hidayat'),
(63, 'Online');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donasi_data`
--
ALTER TABLE `donasi_data`
 ADD PRIMARY KEY (`id_donasi`), ADD KEY `id_donatur` (`id_donatur`), ADD KEY `id_gerai` (`id_gerai`), ADD KEY `id_petugas_gerai` (`id_petugas_gerai`);

--
-- Indexes for table `donasi_perincian_association`
--
ALTER TABLE `donasi_perincian_association`
 ADD PRIMARY KEY (`id_donasi`,`id_perincian_donasi`), ADD KEY `id_perincian_donasi` (`id_perincian_donasi`);

--
-- Indexes for table `donatur`
--
ALTER TABLE `donatur`
 ADD PRIMARY KEY (`id_donatur`);

--
-- Indexes for table `gerai`
--
ALTER TABLE `gerai`
 ADD PRIMARY KEY (`id_gerai`);

--
-- Indexes for table `perincian_donasi`
--
ALTER TABLE `perincian_donasi`
 ADD PRIMARY KEY (`id_perincian_donasi`);

--
-- Indexes for table `petugas_gerai`
--
ALTER TABLE `petugas_gerai`
 ADD PRIMARY KEY (`id_petugas_gerai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donasi_data`
--
ALTER TABLE `donasi_data`
MODIFY `id_donasi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `donatur`
--
ALTER TABLE `donatur`
MODIFY `id_donatur` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `gerai`
--
ALTER TABLE `gerai`
MODIFY `id_gerai` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `perincian_donasi`
--
ALTER TABLE `perincian_donasi`
MODIFY `id_perincian_donasi` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `petugas_gerai`
--
ALTER TABLE `petugas_gerai`
MODIFY `id_petugas_gerai` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=64;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `donasi_data`
--
ALTER TABLE `donasi_data`
ADD CONSTRAINT `donasi_data_ibfk_1` FOREIGN KEY (`id_donatur`) REFERENCES `donatur` (`id_donatur`),
ADD CONSTRAINT `donasi_data_ibfk_2` FOREIGN KEY (`id_gerai`) REFERENCES `gerai` (`id_gerai`),
ADD CONSTRAINT `donasi_data_ibfk_3` FOREIGN KEY (`id_petugas_gerai`) REFERENCES `petugas_gerai` (`id_petugas_gerai`);

--
-- Constraints for table `donasi_perincian_association`
--
ALTER TABLE `donasi_perincian_association`
ADD CONSTRAINT `donasi_perincian_association_ibfk_1` FOREIGN KEY (`id_donasi`) REFERENCES `donasi_data` (`id_donasi`),
ADD CONSTRAINT `donasi_perincian_association_ibfk_2` FOREIGN KEY (`id_perincian_donasi`) REFERENCES `perincian_donasi` (`id_perincian_donasi`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
