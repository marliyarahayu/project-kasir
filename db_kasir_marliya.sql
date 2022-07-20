-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2022 at 03:00 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kasir_marliya`
--

-- --------------------------------------------------------

--
-- Table structure for table `detailtransaksi`
--

CREATE TABLE `detailtransaksi` (
  `iddetailtransaksi` int(11) NOT NULL,
  `nomorfaktur` varchar(10) NOT NULL,
  `kodebarang` varchar(5) NOT NULL,
  `jmlbeli` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detailtransaksi`
--

INSERT INTO `detailtransaksi` (`iddetailtransaksi`, `nomorfaktur`, `kodebarang`, `jmlbeli`, `harga`) VALUES
(20, 'NF5', 'KB004', 1, 35000),
(46, 'NF4', 'KB002', 1, 6000),
(50, 'NF5', 'KB005', 2, 10000),
(54, 'NF4', 'KB002', 2, 6000),
(66, 'NF5', 'KB004', 1, 45000),
(73, 'NF2', 'KB001', 1, 5000);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kodekategori` varchar(5) NOT NULL,
  `namakategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kodekategori`, `namakategori`) VALUES
('K0001', 'Makanan'),
('K0002', 'Minuman'),
('K0003', 'ATK'),
('K0004', 'Alat Tulis');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `kodepegawai` varchar(5) NOT NULL,
  `namapegawai` varchar(20) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `alamat` text NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(10) NOT NULL,
  `nohp` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`kodepegawai`, `namapegawai`, `jk`, `alamat`, `username`, `password`, `level`, `nohp`) VALUES
('PG001', 'Bila', 'P', 'Sukasukur', 'bila', '4ac45f88dc8c3aba70d86b4995b54c7314f75b7f', 'Admin', '08123456789'),
('PG002', 'Andi', 'L', 'Semarang', 'andi', 'dbd122ef7b6a09ffecf5db9c9296320f3c94e707', 'Staf', '08123456789'),
('PG003', 'Iya', 'P', 'Tasikmalaya', 'iya', '6c9f421cd46a32aed561635a745d824ffbcccefe', 'Admin', '08123456789'),
('PG004', 'Andi', 'L', 'Bekasi', 'andi', '03760435d7410d6b49f622cd6b317f2bd68786cb', 'customer', '08123456789'),
('PG005', 'Delia', 'P', 'Monggor', 'delia', 'e3bca34e045ad08834122390572ee9301f058856', 'Admin', '0292282827');

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE `pembeli` (
  `kodepembeli` varchar(5) NOT NULL,
  `namapembeli` varchar(20) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `alamat` text NOT NULL,
  `nohp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembeli`
--

INSERT INTO `pembeli` (`kodepembeli`, `namapembeli`, `jk`, `alamat`, `nohp`) VALUES
('P002', 'Agung', 'L', 'Bekasi', '081234567893'),
('P003', 'Iya', 'P', 'Tasikmalaya', '081234567899'),
('P004', 'Rangga', 'L', 'Buah Batu', '081234567883'),
('P006', 'Faridah', 'P', 'Jakarta', '03827827382');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `kodebarang` varchar(5) NOT NULL,
  `namabarang` varchar(20) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `tglkadaluarsa` date NOT NULL,
  `kodekategori` varchar(5) NOT NULL,
  `gambar` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`kodebarang`, `namabarang`, `stok`, `harga`, `tglkadaluarsa`, `kodekategori`, `gambar`) VALUES
('KB001', 'Susu Ultra', 6, 5000, '2022-01-31', 'K0002', 'susu.png'),
('KB002', 'Teh Pucuk', 5, 6000, '2022-01-27', 'K0002', 'teh.jpg'),
('KB004', 'Logo', 10, 10000, '2022-03-07', 'K0004', 'logo.png'),
('KB005', 'Keripik', 7, 10000, '2022-01-29', 'K0001', 'keripik.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `nomorfaktur` varchar(10) NOT NULL,
  `kodepembeli` varchar(5) NOT NULL,
  `kodepetugas` varchar(5) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`nomorfaktur`, `kodepembeli`, `kodepetugas`, `waktu`) VALUES
('NF1', 'P006', 'PG003', '2022-03-10 16:07:00'),
('NF2', 'P002', 'PG003', '2022-03-12 14:42:00'),
('NF4', 'P004', 'PG003', '2022-02-17 12:25:00'),
('NF5', 'P001', 'PG003', '2022-02-18 21:23:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detailtransaksi`
--
ALTER TABLE `detailtransaksi`
  ADD PRIMARY KEY (`iddetailtransaksi`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kodekategori`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`kodepegawai`);

--
-- Indexes for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`kodepembeli`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`kodebarang`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`nomorfaktur`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detailtransaksi`
--
ALTER TABLE `detailtransaksi`
  MODIFY `iddetailtransaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
