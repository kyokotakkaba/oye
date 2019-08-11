-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2019 at 03:58 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oye`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `bonus_pair`
--

CREATE TABLE `bonus_pair` (
  `username` varchar(255) NOT NULL,
  `tanggal` datetime NOT NULL,
  `harga_pair` int(11) NOT NULL,
  `jumlah_pair` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `icash` int(11) DEFAULT NULL,
  `poin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bonus_pair`
--

INSERT INTO `bonus_pair` (`username`, `tanggal`, `harga_pair`, `jumlah_pair`, `total`, `icash`, `poin`) VALUES
('oye', '2019-08-09 00:01:01', 4000, 3, 12000, 9600, 2400),
('oye2', '2019-08-09 00:01:01', 4000, 1, 4000, 3200, 800),
('oye3', '2019-08-09 00:01:01', 4000, 1, 4000, 3200, 800);

-- --------------------------------------------------------

--
-- Table structure for table `bonus_sponsor`
--

CREATE TABLE `bonus_sponsor` (
  `sponsor` varchar(255) NOT NULL,
  `username_member` varchar(255) NOT NULL,
  `nominal` int(11) DEFAULT NULL,
  `poin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bonus_sponsor`
--

INSERT INTO `bonus_sponsor` (`sponsor`, `username_member`, `nominal`, `poin`) VALUES
('oye', 'oye2', 40000, 10000),
('oye', 'oye3', 40000, 10000),
('oye2', 'oye4', 40000, 10000),
('oye2', 'oye5', 40000, 10000),
('oye3', 'oye6', 40000, 10000),
('oye3', 'oye7', 40000, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `no_telepon` varchar(255) DEFAULT NULL,
  `ktp` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `nama_bank` varchar(255) DEFAULT NULL,
  `no_rekening` varchar(255) DEFAULT NULL,
  `atas_nama_bank` varchar(255) DEFAULT NULL,
  `security_code` varchar(255) DEFAULT NULL,
  `sponsor` varchar(255) DEFAULT NULL,
  `replacement_user` varchar(255) DEFAULT NULL,
  `posisi_kaki` varchar(255) DEFAULT NULL,
  `icash` int(11) DEFAULT '0',
  `poin` int(11) DEFAULT '0',
  `bv_kanan` int(11) DEFAULT '0',
  `bv_kiri` int(11) DEFAULT '0',
  `kuota_sponsor_kiri` int(11) NOT NULL DEFAULT '0',
  `tanggal_registrasi` datetime DEFAULT NULL,
  `nominal_pembayaran` int(11) DEFAULT '0',
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`username`, `password`, `nama`, `email`, `no_telepon`, `ktp`, `alamat`, `nama_bank`, `no_rekening`, `atas_nama_bank`, `security_code`, `sponsor`, `replacement_user`, `posisi_kaki`, `icash`, `poin`, `bv_kanan`, `bv_kiri`, `kuota_sponsor_kiri`, `tanggal_registrasi`, `nominal_pembayaran`, `status`) VALUES
('oye', '827ccb0eea8a706c4c34a16891f84e7b', 'OYE', 'optimayieldselectronik@gmail.com', '081335855555', '3578251212770003', 'Surabaya', 'BCA', '02985093845', 'oye', NULL, NULL, NULL, NULL, 89600, 22400, 0, 0, 0, '2019-07-06 13:03:19', NULL, 'active'),
('oye2', '9f55aae2935ee3fd5ef77a71f33add03', 'oye', 'optimayieldselectronik@gmail.com', '081335855555', '824093840923', 'Surabaya', 'BCA', '3485798954', 'Oye', NULL, 'oye', 'oye', 'kiri', 83200, 20800, 0, 0, 0, '2019-08-08 19:00:00', 100913, 'active'),
('oye3', '9f55aae2935ee3fd5ef77a71f33add03', 'josh', 'optimayieldselectronik@gmail.com', '081335855555', '12345678', 'sby', 'BCA', '12345678', 'josh', NULL, 'oye', 'oye', 'kanan', 83200, 20800, 0, 0, 0, '2019-08-08 19:33:01', 100535, 'active'),
('oye4', 'cdfde213b6c87df4eed960f281238cd4', 'joel', 'optimayieldselectronik@gmail.com', '082143009887', '12345678', 'sby', 'BCA', '12345678', 'joel', NULL, 'oye2', 'oye2', 'kiri', 0, 0, 0, 0, 0, '2019-08-08 19:50:32', 100728, 'active'),
('oye5', '9f55aae2935ee3fd5ef77a71f33add03', 'isaac', 'optimayieldselectronik@gmail.com', '082143009887', '12345678', 'sda', 'BCA', '1234567', 'isaac', NULL, 'oye2', 'oye2', 'kanan', 0, 0, 0, 0, 0, '2019-08-08 20:17:06', 100847, 'active'),
('oye6', '9f55aae2935ee3fd5ef77a71f33add03', 'linda', 'optimayieldselectronik@gmail.com', '082143009887', '12345678', 'sda', 'bca', '12345678', 'linda', NULL, 'oye3', 'oye3', 'kiri', 0, 0, 0, 0, 0, '2019-08-08 20:37:58', 100586, 'active'),
('oye7', '9f55aae2935ee3fd5ef77a71f33add03', 'felix', 'optimayieldselectronik@gmail.com', '082143009887', '12345678', 'jkt', 'BCA', '12345678', 'felix', NULL, 'oye3', 'oye3', 'kanan', 0, 0, 0, 0, 0, '2019-08-08 20:48:57', 100626, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `parameter`
--

CREATE TABLE `parameter` (
  `id` int(11) NOT NULL,
  `biaya_registrasi` int(11) NOT NULL DEFAULT '0',
  `bonus_sponsor` int(11) NOT NULL DEFAULT '0',
  `bonus_pairing_pertama` int(11) NOT NULL DEFAULT '0',
  `bonus_pairing_kedua` int(11) NOT NULL DEFAULT '0',
  `batas_pairing_pertama` int(11) NOT NULL DEFAULT '0',
  `persentase_poin` int(11) NOT NULL,
  `admin_fee` int(11) NOT NULL,
  `minim_wd` int(11) NOT NULL,
  `nama_bank` varchar(255) NOT NULL,
  `no_rekening` varchar(255) NOT NULL,
  `atas_nama` varchar(255) NOT NULL,
  `no_admin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parameter`
--

INSERT INTO `parameter` (`id`, `biaya_registrasi`, `bonus_sponsor`, `bonus_pairing_pertama`, `bonus_pairing_kedua`, `batas_pairing_pertama`, `persentase_poin`, `admin_fee`, `minim_wd`, `nama_bank`, `no_rekening`, `atas_nama`, `no_admin`) VALUES
(1, 100000, 50000, 4000, 1000, 16, 20, 10000, 100000, 'BCA', '1521688888', 'Desy Purwanto', '08113409292');

-- --------------------------------------------------------

--
-- Table structure for table `withdraw`
--

CREATE TABLE `withdraw` (
  `username` varchar(255) NOT NULL,
  `tanggal` datetime NOT NULL,
  `nominal` int(11) DEFAULT NULL,
  `admin_fee` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `bonus_pair`
--
ALTER TABLE `bonus_pair`
  ADD PRIMARY KEY (`username`,`tanggal`,`harga_pair`);

--
-- Indexes for table `bonus_sponsor`
--
ALTER TABLE `bonus_sponsor`
  ADD PRIMARY KEY (`sponsor`,`username_member`),
  ADD KEY `bonus_sponsor_ibfk_1` (`username_member`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `parameter`
--
ALTER TABLE `parameter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdraw`
--
ALTER TABLE `withdraw`
  ADD PRIMARY KEY (`username`,`tanggal`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `parameter`
--
ALTER TABLE `parameter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bonus_pair`
--
ALTER TABLE `bonus_pair`
  ADD CONSTRAINT `bonus_pair_ibfk_1` FOREIGN KEY (`username`) REFERENCES `member` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bonus_sponsor`
--
ALTER TABLE `bonus_sponsor`
  ADD CONSTRAINT `bonus_sponsor_ibfk_1` FOREIGN KEY (`username_member`) REFERENCES `member` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bonus_sponsor_ibfk_2` FOREIGN KEY (`sponsor`) REFERENCES `member` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `withdraw`
--
ALTER TABLE `withdraw`
  ADD CONSTRAINT `withdraw_ibfk_1` FOREIGN KEY (`username`) REFERENCES `member` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
