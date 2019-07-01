-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2019 at 03:45 PM
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
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bonus_sponsor`
--

CREATE TABLE `bonus_sponsor` (
  `sponsor` varchar(255) NOT NULL,
  `username_member` varchar(255) NOT NULL,
  `nominal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `icash` int(11) DEFAULT NULL,
  `bv_kanan` int(11) DEFAULT NULL,
  `bv_kiri` int(11) DEFAULT NULL,
  `tanggal_registrasi` datetime DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`username`, `password`, `nama`, `email`, `no_telepon`, `ktp`, `alamat`, `nama_bank`, `no_rekening`, `atas_nama_bank`, `security_code`, `sponsor`, `replacement_user`, `icash`, `bv_kanan`, `bv_kiri`, `tanggal_registrasi`, `status`) VALUES
('enniecorn', '827ccb0eea8a706c4c34a16891f84e7b', 'Benny Hartono', 'djaka.tingkir2@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
-- Indexes for table `withdraw`
--
ALTER TABLE `withdraw`
  ADD PRIMARY KEY (`username`,`tanggal`);

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
  ADD CONSTRAINT `bonus_sponsor_ibfk_1` FOREIGN KEY (`username_member`) REFERENCES `member` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `withdraw`
--
ALTER TABLE `withdraw`
  ADD CONSTRAINT `withdraw_ibfk_1` FOREIGN KEY (`username`) REFERENCES `member` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
