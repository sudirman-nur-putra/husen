-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2022 at 05:45 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_husein`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id`, `email`, `password`) VALUES
(2, 'tasyashofa@gmail.com', '04612821a89b643ba01792287a6c7daa'),
(3, 'bimantoro1@gmail.com', '45ec5d4e6f193aa7fb73708503737dc7');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `harga_beli` int(100) NOT NULL,
  `harga_jual_dropshipper` int(100) NOT NULL,
  `harga_jual_reseller` int(100) NOT NULL,
  `stok` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama_barang`, `harga_beli`, `harga_jual_dropshipper`, `harga_jual_reseller`, `stok`) VALUES
(1, 'Knalpot', 200000, 250000, 220000, 4),
(2, 'Stang', 400000, 450000, 420000, 3),
(4, 'Klakson', 35000, 45000, 40000, 100);

-- --------------------------------------------------------

--
-- Table structure for table `gaji`
--

CREATE TABLE `gaji` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nominal` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `keuntungan_dropshipper`
--

CREATE TABLE `keuntungan_dropshipper` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `total_keuntungan` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `overhead`
--

CREATE TABLE `overhead` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `jumlah_pengeluaran` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `overhead`
--

INSERT INTO `overhead` (`id`, `tanggal`, `keterangan`, `jumlah_pengeluaran`) VALUES
(4, '2022-05-23', 'Transportasi', 200000),
(5, '2022-05-23', 'Listrik', 150000);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_barang`
--

CREATE TABLE `pembelian_barang` (
  `id` int(100) NOT NULL,
  `id_barang` int(100) NOT NULL,
  `nama_toko` varchar(255) NOT NULL,
  `jumlah_beli` int(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `total_harga` int(100) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian_barang`
--

INSERT INTO `pembelian_barang` (`id`, `id_barang`, `nama_toko`, `jumlah_beli`, `harga`, `total_harga`, `tanggal`) VALUES
(4, 1, 'BintangVariasi', 50, 50000, 2500000, '2022-05-18');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_dropshipper`
--

CREATE TABLE `transaksi_dropshipper` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `modal` int(100) NOT NULL,
  `jumlah_barang` int(100) NOT NULL,
  `harga_jual` int(100) NOT NULL,
  `no_resi` varchar(255) NOT NULL,
  `status_packing` varchar(255) NOT NULL,
  `marketplace` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi_dropshipper`
--

INSERT INTO `transaksi_dropshipper` (`id`, `id_user`, `id_barang`, `tanggal`, `modal`, `jumlah_barang`, `harga_jual`, `no_resi`, `status_packing`, `marketplace`, `status`) VALUES
(2, 4, 1, '2022-05-16', 200000, 1, 250000, '123456789', 'Sendiri', 'Lazada', 'Barang Dikembalikan'),
(4, 2, 1, '2022-04-05', 400000, 2, 500000, '908765341', 'Sendiri', 'Lazada', 'Sampai'),
(7, 2, 2, '2022-05-23', 120000, 2, 130000, 'JP041003', 'Dari Husein', 'Shopee', 'Proses');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_reseller`
--

CREATE TABLE `transaksi_reseller` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah_barang` int(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `total_pembelian` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi_reseller`
--

INSERT INTO `transaksi_reseller` (`id`, `id_user`, `id_barang`, `tanggal`, `jumlah_barang`, `harga`, `total_pembelian`) VALUES
(3, 1, 1, '2022-05-23', 2, 420000, 840000),
(5, 3, 2, '2022-05-14', 5, 50000, 250000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nomor_hp` varchar(255) NOT NULL,
  `keuntungan` int(11) NOT NULL,
  `level` enum('Admin','Reseller','Dropshipper','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `nomor_hp`, `keuntungan`, `level`) VALUES
(1, 'Biman', '082123456789', 0, 'Reseller'),
(2, 'Rico', '089876754321', 200000, 'Dropshipper'),
(3, 'Sudirman', '089897654321', 0, 'Reseller'),
(4, 'Rizal', '087987532753', 300000, 'Dropshipper'),
(5, 'Aliffia', '089123456789', 0, 'Reseller'),
(8, 'Tasya ', '082111222333', 0, 'Dropshipper');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gajianuser` (`id_user`);

--
-- Indexes for table `keuntungan_dropshipper`
--
ALTER TABLE `keuntungan_dropshipper`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`id_user`);

--
-- Indexes for table `overhead`
--
ALTER TABLE `overhead`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembelian_barang`
--
ALTER TABLE `pembelian_barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barang` (`id_barang`);

--
-- Indexes for table `transaksi_dropshipper`
--
ALTER TABLE `transaksi_dropshipper`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tduser` (`id_user`),
  ADD KEY `tdbarang` (`id_barang`);

--
-- Indexes for table `transaksi_reseller`
--
ALTER TABLE `transaksi_reseller`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tuser` (`id_user`),
  ADD KEY `tbarang` (`id_barang`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gaji`
--
ALTER TABLE `gaji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `keuntungan_dropshipper`
--
ALTER TABLE `keuntungan_dropshipper`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `overhead`
--
ALTER TABLE `overhead`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pembelian_barang`
--
ALTER TABLE `pembelian_barang`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaksi_dropshipper`
--
ALTER TABLE `transaksi_dropshipper`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transaksi_reseller`
--
ALTER TABLE `transaksi_reseller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gaji`
--
ALTER TABLE `gaji`
  ADD CONSTRAINT `gajianuser` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `keuntungan_dropshipper`
--
ALTER TABLE `keuntungan_dropshipper`
  ADD CONSTRAINT `user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pembelian_barang`
--
ALTER TABLE `pembelian_barang`
  ADD CONSTRAINT `barang` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transaksi_dropshipper`
--
ALTER TABLE `transaksi_dropshipper`
  ADD CONSTRAINT `tdbarang` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tduser` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transaksi_reseller`
--
ALTER TABLE `transaksi_reseller`
  ADD CONSTRAINT `tbarang` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tuser` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
