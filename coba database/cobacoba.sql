-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2024 at 05:31 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cobacoba`
--

-- --------------------------------------------------------

--
-- Table structure for table `form_data`
--

CREATE TABLE IF NOT EXISTS `form_data` (
`id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `pesan` text,
  `kelas` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `form_data`
--

INSERT INTO `form_data` (`id`, `nama`, `email`, `pesan`, `kelas`) VALUES
(1, 'asyah', 'asyahhrtnt8@gmail.com', 'a s y a h', NULL),
(2, 'sisri', 'sisri@gmail.com', 's i s r i', NULL),
(3, 'kotak', 'kotak@gmail.com', 'k', NULL),
(4, 'asa', 'asa@gmail.com', '0', 2),
(5, 'esa', 'esa@gmail.com', '0', 3),
(6, 'cua', 'cya@gmail.com', '0', 1),
(7, 'cua', 'cya@gmail.com', '0', 1),
(8, 'yua', 'yua@gmail.com', '0', 1),
(9, 'jua', 'jua@gmail.com', '0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE IF NOT EXISTS `kelas` (
`id` int(11) NOT NULL,
  `nama_kelas` varchar(255) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `nama_kelas`) VALUES
(1, 'Kelas 1'),
(2, 'Kelas 2'),
(3, 'Kelas 3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `form_data`
--
ALTER TABLE `form_data`
 ADD PRIMARY KEY (`id`), ADD KEY `kelas` (`kelas`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `form_data`
--
ALTER TABLE `form_data`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `form_data`
--
ALTER TABLE `form_data`
ADD CONSTRAINT `form_data_ibfk_1` FOREIGN KEY (`kelas`) REFERENCES `kelas` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
