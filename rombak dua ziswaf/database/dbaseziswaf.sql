-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2024 at 01:47 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbaseziswaf`
--

-- --------------------------------------------------------

--
-- Table structure for table `donasi`
--

CREATE TABLE IF NOT EXISTS `donasi` (
`id` int(11) NOT NULL,
  `nama_donatur` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(30) NOT NULL,
  `tanggal` datetime NOT NULL,
  `kelas_id` int(11) DEFAULT NULL,
  `gerai_id` int(11) DEFAULT NULL,
  `petugas_gerai_id` int(11) DEFAULT NULL,
  `shift_petugas` varchar(20) DEFAULT NULL,
  `perincian_donasi_1_id` int(11) DEFAULT NULL,
  `bentuk_donasi_1` varchar(50) DEFAULT NULL,
  `jumlah_rp_1` int(11) DEFAULT NULL,
  `jumlah_paket_1` int(11) DEFAULT NULL,
  `perincian_donasi_2_id` int(11) DEFAULT NULL,
  `bentuk_donasi_2` varchar(50) DEFAULT NULL,
  `jumlah_rp_2` int(11) DEFAULT NULL,
  `jumlah_paket_2` int(11) DEFAULT NULL,
  `perincian_donasi_3_id` int(11) DEFAULT NULL,
  `bentuk_donasi_3` varchar(50) DEFAULT NULL,
  `jumlah_rp_3` int(11) DEFAULT NULL,
  `jumlah_paket_3` int(11) DEFAULT NULL,
  `perincian_donasi_4_id` int(11) DEFAULT NULL,
  `bentuk_donasi_4` varchar(50) DEFAULT NULL,
  `jumlah_rp_4` int(11) DEFAULT NULL,
  `jumlah_paket_4` int(11) DEFAULT NULL,
  `perincian_donasi_5_id` int(11) DEFAULT NULL,
  `bentuk_donasi_5` varchar(50) DEFAULT NULL,
  `jumlah_rp_5` int(11) DEFAULT NULL,
  `jumlah_paket_5` int(11) DEFAULT NULL,
  `cara_pembayaran` varchar(50) DEFAULT NULL,
  `bukti_pembayaran` text,
  `total_rp` int(11) DEFAULT NULL,
  `total_paket` int(11) DEFAULT NULL,
  `keterangan` text
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `donasi`
--

INSERT INTO `donasi` (`id`, `nama_donatur`, `alamat`, `no_hp`, `tanggal`, `kelas_id`, `gerai_id`, `petugas_gerai_id`, `shift_petugas`, `perincian_donasi_1_id`, `bentuk_donasi_1`, `jumlah_rp_1`, `jumlah_paket_1`, `perincian_donasi_2_id`, `bentuk_donasi_2`, `jumlah_rp_2`, `jumlah_paket_2`, `perincian_donasi_3_id`, `bentuk_donasi_3`, `jumlah_rp_3`, `jumlah_paket_3`, `perincian_donasi_4_id`, `bentuk_donasi_4`, `jumlah_rp_4`, `jumlah_paket_4`, `perincian_donasi_5_id`, `bentuk_donasi_5`, `jumlah_rp_5`, `jumlah_paket_5`, `cara_pembayaran`, `bukti_pembayaran`, `total_rp`, `total_paket`, `keterangan`) VALUES
(16, 'Donatur Sebelas', 'Jl. Donatur No. 11', '082837128919', '2024-03-05 10:00:46', 16, 2, 17, NULL, 8, 'uang', 50000, 0, 4, '0', 0, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'Donatur Dua Belas', 'Jl. Donatur No. 12', '082637236234', '2024-03-05 10:10:24', 16, 2, 2, NULL, 3, 'uang', 25000, 0, 7, '0', 0, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'Asyah', 'Jl. Raya 123', '086372548244', '2024-03-05 11:22:04', 16, 2, 18, NULL, 2, 'uang', 25000, 0, 2, '0', 0, 2, 1, '0', 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'Donatur Tiga Belas', 'Jl. Donatur No. 13', '087367371673', '2024-03-05 18:52:36', 7, 2, 15, NULL, 3, 'uang', 20000, 0, 4, '0', 0, 1, 5, '0', 0, 2, 8, '0', 100000, 0, 12, 'uang', 25000, 0, NULL, NULL, NULL, NULL, NULL),
(20, 'Donatur Empat Belas', 'Jl. Donatur No. 14', '082847293728', '2024-03-05 19:00:34', 10, 2, 18, NULL, 1, 'barang', 0, 1, 3, '0', 25000, 0, 0, '0', 0, 0, 0, '0', 0, 0, 0, '', 0, 0, NULL, NULL, NULL, NULL, NULL),
(21, 'Donatur Empat Belas', 'Jl. Donatur No. 14', '082847293728', '2024-03-05 19:08:31', 10, 2, 18, NULL, 1, 'barang', 0, 1, 3, '0', 25000, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'Donatur Lima Belas', 'Jl. Donatur No. 15', '088764431346', '2024-03-05 19:22:27', 2, 1, 18, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 0, 0, NULL),
(23, 'Donatur Enam Belas', 'Jl. Donatur No. 16', '082847293728', '2024-03-05 22:06:55', 40, 1, 10, NULL, 1, 'barang', 0, 1, 2, '0', 25000, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 'Donatur Enam Belas', 'Jl. Donatur No. 16', '082847293728', '2024-03-05 22:08:17', 40, 1, 10, NULL, 1, 'barang', 0, 1, 2, '0', 25000, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 0, 0, '0'),
(25, 'Donatur Tujuh Belas', 'Jl. Donatur No. 17', '083627153776', '2024-03-05 16:36:59', 39, 3, 39, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'transfer', '', 0, 1, ''),
(26, 'Donatur Tujuh Belas', 'Jl. Donatur No. 17', '083627153776', '2024-03-05 16:39:02', 39, 3, 39, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'transfer', '', 0, 1, ''),
(27, 'Donatur Delapan Belas', 'Jl. Donatur No. 18', '087237194628', '2024-03-05 16:43:09', 39, 3, 15, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'transfer', '', 0, 0, ''),
(28, 'Donatur Sembilan Belas', 'Jl. Donatur No. 19', '081273576230', '2024-03-06 04:19:59', 36, 3, 40, NULL, 5, 'barang', 0, 1, 3, 'uang', 25000, 0, 10, 'uang', 100000, 0, 1, 'barang', 0, 4, 8, 'uang', 250000, 0, '', '', 0, 0, ''),
(29, 'Donatur Sembilan Belas', 'Jl. Donatur No. 19', '081273576230', '2024-03-06 04:21:31', 36, 3, 40, NULL, 5, 'barang', 0, 1, 3, 'uang', 25000, 0, 10, 'uang', 100000, 0, 1, 'barang', 0, 4, 8, 'uang', 250000, 0, 'tunai', '', 375000, 5, 'Donatur Sembilan Belas'),
(30, 'Donatur Dua Puluh', 'Jl. Donatur No. 20', '083627153776', '2024-03-06 04:23:10', 39, 3, 59, NULL, 4, 'uang', 10000, 0, 2, 'uang', 25000, 0, 3, 'uang', 35000, 0, 11, 'barang', 0, 1, 1, 'barang', 0, 3, 'tunai', '', 70000, 4, ''),
(31, 'Donatur Dua Puluh', 'Jl. Donatur No. 20', '083627153776', '2024-03-06 04:25:35', 39, 3, 59, NULL, 4, 'uang', 10000, 0, 2, 'uang', 25000, 0, 3, 'uang', 35000, 0, 11, 'barang', 0, 1, 1, 'barang', 0, 3, 'tunai', '', 70000, 4, ''),
(32, 'Donatur Dua Puluh Satu', 'Jl. Donatur No. 21', '087237194628', '2024-03-06 04:28:53', 39, 3, 59, NULL, 5, 'uang', 50000, 0, 4, 'barang', 0, 1, 11, 'uang', 25000, 0, 12, 'barang', 0, 1, 1, 'barang', 0, 2, 'transfer', '', 75000, 4, ''),
(33, 'Donatur Dua Puluh Dua', 'Jl. Donatur No. 22', '087237194628', '2024-03-06 04:34:48', 7, 2, 49, NULL, 2, 'barang', 0, 1, 5, 'uang', 120000, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 'tunai', '', 120000, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `gerai`
--

CREATE TABLE IF NOT EXISTS `gerai` (
`id` int(11) NOT NULL,
  `nama_gerai` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `gerai`
--

INSERT INTO `gerai` (`id`, `nama_gerai`) VALUES
(1, 'PAUD'),
(2, 'SD'),
(3, 'SMP'),
(4, 'MA'),
(5, 'Online');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE IF NOT EXISTS `kelas` (
`id` int(11) NOT NULL,
  `nama_kelas` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `nama_kelas`) VALUES
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
-- Table structure for table `perincian_donasi_1`
--

CREATE TABLE IF NOT EXISTS `perincian_donasi_1` (
`id` int(11) NOT NULL,
  `nama_perincian_donasi_1` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `perincian_donasi_1`
--

INSERT INTO `perincian_donasi_1` (`id`, `nama_perincian_donasi_1`) VALUES
(1, 'Barbeku'),
(2, 'Cinta Yatim'),
(3, 'Fidyah'),
(4, 'Paket Buka Puasa'),
(5, 'Sembako Ramadhan'),
(6, 'Tabungan Surga si Copral'),
(7, 'Wakaf Pembangunan Masjid'),
(8, 'Wakaf Pembebasan dan Pembangunan PPTQ'),
(9, 'Wakaf al-Qur''an'),
(10, 'Infaq dan Shodaqoh'),
(11, 'Zakat Fitrah'),
(12, 'Zakat Maal');

-- --------------------------------------------------------

--
-- Table structure for table `perincian_donasi_2`
--

CREATE TABLE IF NOT EXISTS `perincian_donasi_2` (
`id` int(11) NOT NULL,
  `nama_perincian_donasi_2` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `perincian_donasi_2`
--

INSERT INTO `perincian_donasi_2` (`id`, `nama_perincian_donasi_2`) VALUES
(1, 'Barbeku'),
(2, 'Cinta Yatim'),
(3, 'Fidyah'),
(4, 'Paket Buka Puasa'),
(5, 'Sembako Ramadhan'),
(6, 'Tabungan Surga si Copral'),
(7, 'Wakaf Pembangunan Masjid'),
(8, 'Wakaf Pembebasan dan Pembangunan PPTQ'),
(9, 'Wakaf al-Qur''an'),
(10, 'Infaq dan Shodaqoh'),
(11, 'Zakat Fitrah'),
(12, 'Zakat Maal');

-- --------------------------------------------------------

--
-- Table structure for table `perincian_donasi_3`
--

CREATE TABLE IF NOT EXISTS `perincian_donasi_3` (
`id` int(11) NOT NULL,
  `nama_perincian_donasi_3` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `perincian_donasi_3`
--

INSERT INTO `perincian_donasi_3` (`id`, `nama_perincian_donasi_3`) VALUES
(1, 'Barbeku'),
(2, 'Cinta Yatim'),
(3, 'Fidyah'),
(4, 'Paket Buka Puasa'),
(5, 'Sembako Ramadhan'),
(6, 'Tabungan Surga si Copral'),
(7, 'Wakaf Pembangunan Masjid'),
(8, 'Wakaf Pembebasan dan Pembangunan PPTQ'),
(9, 'Wakaf al-Qur''an'),
(10, 'Infaq dan Shodaqoh'),
(11, 'Zakat Fitrah'),
(12, 'Zakat Maal');

-- --------------------------------------------------------

--
-- Table structure for table `perincian_donasi_4`
--

CREATE TABLE IF NOT EXISTS `perincian_donasi_4` (
`id` int(11) NOT NULL,
  `nama_perincian_donasi_4` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `perincian_donasi_4`
--

INSERT INTO `perincian_donasi_4` (`id`, `nama_perincian_donasi_4`) VALUES
(1, 'Barbeku'),
(2, 'Cinta Yatim'),
(3, 'Fidyah'),
(4, 'Paket Buka Puasa'),
(5, 'Sembako Ramadhan'),
(6, 'Tabungan Surga si Copral'),
(7, 'Wakaf Pembangunan Masjid'),
(8, 'Wakaf Pembebasan dan Pembangunan PPTQ'),
(9, 'Wakaf al-Qur''an'),
(10, 'Infaq dan Shodaqoh'),
(11, 'Zakat Fitrah'),
(12, 'Zakat Maal');

-- --------------------------------------------------------

--
-- Table structure for table `perincian_donasi_5`
--

CREATE TABLE IF NOT EXISTS `perincian_donasi_5` (
`id` int(11) NOT NULL,
  `nama_perincian_donasi_5` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `perincian_donasi_5`
--

INSERT INTO `perincian_donasi_5` (`id`, `nama_perincian_donasi_5`) VALUES
(1, 'Barbeku'),
(2, 'Cinta Yatim'),
(3, 'Fidyah'),
(4, 'Paket Buka Puasa'),
(5, 'Sembako Ramadhan'),
(6, 'Tabungan Surga si Copral'),
(7, 'Wakaf Pembangunan Masjid'),
(8, 'Wakaf Pembebasan dan Pembangunan PPTQ'),
(9, 'Wakaf al-Qur''an'),
(10, 'Infaq dan Shodaqoh'),
(11, 'Zakat Fitrah'),
(12, 'Zakat Maal');

-- --------------------------------------------------------

--
-- Table structure for table `petugas_gerai`
--

CREATE TABLE IF NOT EXISTS `petugas_gerai` (
`id` int(11) NOT NULL,
  `nama_petugas_gerai` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=64 ;

--
-- Dumping data for table `petugas_gerai`
--

INSERT INTO `petugas_gerai` (`id`, `nama_petugas_gerai`) VALUES
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

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'asyah', '$2y$10$Y6vo/o3GR9is53OPLW5r3ua5fbHOFkzcekZbVJB0h0zTrKeeFhCoO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donasi`
--
ALTER TABLE `donasi`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_kelas` (`kelas_id`), ADD KEY `fk_gerai` (`gerai_id`), ADD KEY `fk_petugas_gerai` (`petugas_gerai_id`);

--
-- Indexes for table `gerai`
--
ALTER TABLE `gerai`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perincian_donasi_1`
--
ALTER TABLE `perincian_donasi_1`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perincian_donasi_2`
--
ALTER TABLE `perincian_donasi_2`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perincian_donasi_3`
--
ALTER TABLE `perincian_donasi_3`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perincian_donasi_4`
--
ALTER TABLE `perincian_donasi_4`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perincian_donasi_5`
--
ALTER TABLE `perincian_donasi_5`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `petugas_gerai`
--
ALTER TABLE `petugas_gerai`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donasi`
--
ALTER TABLE `donasi`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `gerai`
--
ALTER TABLE `gerai`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `perincian_donasi_1`
--
ALTER TABLE `perincian_donasi_1`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `perincian_donasi_2`
--
ALTER TABLE `perincian_donasi_2`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `perincian_donasi_3`
--
ALTER TABLE `perincian_donasi_3`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `perincian_donasi_4`
--
ALTER TABLE `perincian_donasi_4`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `perincian_donasi_5`
--
ALTER TABLE `perincian_donasi_5`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `petugas_gerai`
--
ALTER TABLE `petugas_gerai`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `donasi`
--
ALTER TABLE `donasi`
ADD CONSTRAINT `fk_gerai` FOREIGN KEY (`gerai_id`) REFERENCES `gerai` (`id`),
ADD CONSTRAINT `fk_kelas` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`),
ADD CONSTRAINT `fk_petugas_gerai` FOREIGN KEY (`petugas_gerai_id`) REFERENCES `petugas_gerai` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
