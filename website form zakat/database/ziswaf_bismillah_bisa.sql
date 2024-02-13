-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2024 at 04:03 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ziswaf_bismillah_bisa`
--

-- --------------------------------------------------------

--
-- Table structure for table `donasi`
--

CREATE TABLE IF NOT EXISTS `donasi` (
`id_donasi` int(11) NOT NULL,
  `id_donatur` varchar(50) NOT NULL,
  `id_gerai` int(11) NOT NULL,
  `id_petugas_gerai` int(11) NOT NULL,
  `nama_donatur` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `nomor_hp` varchar(20) NOT NULL,
  `perincian_donasi` varchar(50) NOT NULL,
  `bentuk_donasi` varchar(50) NOT NULL,
  `jumlah_rp` decimal(10,2) DEFAULT NULL,
  `jumlah_paket` int(11) DEFAULT NULL,
  `cara_pembayaran` varchar(50) NOT NULL,
  `bukti_pembayaran` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `total_jumlah_rp` decimal(10,2) DEFAULT NULL,
  `total_jumlah_paket` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `donasi`
--

INSERT INTO `donasi` (`id_donasi`, `id_donatur`, `id_gerai`, `id_petugas_gerai`, `nama_donatur`, `alamat`, `nomor_hp`, `perincian_donasi`, `bentuk_donasi`, `jumlah_rp`, `jumlah_paket`, `cara_pembayaran`, `bukti_pembayaran`, `keterangan`, `total_jumlah_rp`, `total_jumlah_paket`) VALUES
(1, 'TPA-PS', 1, 1, 'Donatur 1', 'Alamat Donatur 1', '111222333444', 'Fidyah', 'Uang', '25000.00', NULL, 'Transfer', 'bukpem_1.png', NULL, '25000.00', NULL),
(2, 'TPA-PS', 1, 1, 'Donatur 1', 'Alamat Donatur 1', '111222333444', 'Barbeku', 'Barang', NULL, 3, 'Tunai', NULL, NULL, NULL, NULL),
(3, 'TPA-PS', 1, 1, 'Donatur 1', 'Alamat Donatur 1', '111222333444', 'Wakaf Pengembangan Masjid', 'Uang', '100000.00', NULL, 'Transfer', 'bukpem_1.png', NULL, '125000.00', NULL),
(4, 'TPA-PS', 1, 1, 'Donatur 1', 'Alamat Donatur 1', '111222333444', 'Wakaf Pembebasan dan Pembangunan PPTQ', 'Uang', '250000.00', NULL, 'Transfer', 'bukpem_1.png', NULL, '375000.00', NULL),
(5, 'TPA-PS', 1, 1, 'Donatur 1', 'Alamat Donatur 1', '111222333444', 'Zakat Fitrah', 'Uang', NULL, 1, 'Transfer', 'bukpem_1.png', NULL, '375000.00', 1),
(6, 'TPA-PS', 1, 1, 'Donatur 1', 'Alamat Donatur 1', '111222333444', 'Paket Buka Puasa', 'Uang', '25000.00', NULL, 'Transfer', 'bukpem_1.png', NULL, '400000.00', 1);

--
-- Triggers `donasi`
--
DELIMITER //
CREATE TRIGGER `update_total_donasi` AFTER INSERT ON `donasi`
 FOR EACH ROW BEGIN
  UPDATE donasi
  SET total_jumlah_rp = (SELECT SUM(jumlah_rp) FROM donasi WHERE id_donatur = NEW.id_donatur),
      total_jumlah_paket = (SELECT SUM(jumlah_paket) FROM donasi WHERE id_donatur = NEW.id_donatur)
  WHERE id_donatur = NEW.id_donatur;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `donatur`
--

CREATE TABLE IF NOT EXISTS `donatur` (
  `id_donatur` varchar(50) NOT NULL,
  `nama_donatur` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donatur`
--

INSERT INTO `donatur` (`id_donatur`, `nama_donatur`) VALUES
('MA-10', 'MA-10'),
('MA-11', 'MA-11'),
('MA-12', 'MA-12'),
('P1', 'P1'),
('P2', 'P2'),
('P3', 'P3'),
('P4', 'P4'),
('P5', 'P5'),
('PGIT', 'PGIT'),
('SD-1A', 'SD-1A'),
('SD-1B', 'SD-1B'),
('SD-1C', 'SD-1C'),
('SD-1D', 'SD-1D'),
('SD-1|CP', 'SD-1|CP'),
('SD-2A', 'SD-2A'),
('SD-2B', 'SD-2B'),
('SD-2C', 'SD-2C'),
('SD-2D', 'SD-2D'),
('SD-3A', 'SD-3A'),
('SD-3B', 'SD-3B'),
('SD-3C', 'SD-3C'),
('SD-3D', 'SD-3D'),
('SD-4A', 'SD-4A'),
('SD-4B', 'SD-4B'),
('SD-4C', 'SD-4C'),
('SD-4D', 'SD-4D'),
('SD-5A', 'SD-5A'),
('SD-5B', 'SD-5B'),
('SD-5C', 'SD-5C'),
('SD-5D', 'SD-5D'),
('SD-6A', 'SD-6A'),
('SD-6B', 'SD-6B'),
('SD-6C', 'SD-6C'),
('SD-6D', 'SD-6D'),
('SMP-7A', 'SMP-7A'),
('SMP-7B', 'SMP-7B'),
('SMP-7C', 'SMP-7C'),
('SMP-7D', 'SMP-7D'),
('SMP-8A', 'SMP-8A'),
('SMP-8B', 'SMP-8B'),
('SMP-8C', 'SMP-8C'),
('SMP-8D', 'SMP-8D'),
('SMP-9A', 'SMP-9A'),
('SMP-9B', 'SMP-9B'),
('SMP-9C', 'SMP-9C'),
('SMP-9D', 'SMP-9D'),
('TK-A1 - A2', 'TK-A1 - A2'),
('TK-A3 - A5', 'TK-A3 - A5'),
('TK-B1 - B2', 'TK-B1 - B2'),
('TK-B3 - B4', 'TK-B3 - B4'),
('TPA-PS', 'TPA-PS'),
('Umum', 'Umum');

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
-- Table structure for table `petugas_gerai`
--

CREATE TABLE IF NOT EXISTS `petugas_gerai` (
`id_petugas_gerai` int(11) NOT NULL,
  `nama_petugas_gerai` varchar(50) NOT NULL
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
-- Indexes for table `donasi`
--
ALTER TABLE `donasi`
 ADD PRIMARY KEY (`id_donasi`), ADD KEY `id_donatur` (`id_donatur`), ADD KEY `id_gerai` (`id_gerai`), ADD KEY `id_petugas_gerai` (`id_petugas_gerai`);

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
-- Indexes for table `petugas_gerai`
--
ALTER TABLE `petugas_gerai`
 ADD PRIMARY KEY (`id_petugas_gerai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donasi`
--
ALTER TABLE `donasi`
MODIFY `id_donasi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `gerai`
--
ALTER TABLE `gerai`
MODIFY `id_gerai` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `petugas_gerai`
--
ALTER TABLE `petugas_gerai`
MODIFY `id_petugas_gerai` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=64;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `donasi`
--
ALTER TABLE `donasi`
ADD CONSTRAINT `donasi_ibfk_1` FOREIGN KEY (`id_donatur`) REFERENCES `donatur` (`id_donatur`) ON DELETE CASCADE,
ADD CONSTRAINT `donasi_ibfk_2` FOREIGN KEY (`id_gerai`) REFERENCES `gerai` (`id_gerai`) ON DELETE CASCADE,
ADD CONSTRAINT `donasi_ibfk_3` FOREIGN KEY (`id_petugas_gerai`) REFERENCES `petugas_gerai` (`id_petugas_gerai`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
