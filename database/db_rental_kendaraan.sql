-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2026 at 04:18 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rental_kendaraan`
--

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE `kendaraan` (
  `id` int(11) NOT NULL,
  `kode_kendaraan` varchar(20) DEFAULT NULL,
  `merk` varchar(100) DEFAULT NULL,
  `nama_kendaraan` varchar(100) DEFAULT NULL,
  `jenis` enum('Sedan','MPV','Box','Bak Terbuka','Minibus') DEFAULT NULL,
  `kelas` varchar(50) DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL,
  `no_polisi` varchar(20) DEFAULT NULL,
  `warna` varchar(50) DEFAULT NULL,
  `tarif_jam` decimal(12,2) DEFAULT NULL,
  `tarif_hari` decimal(12,2) DEFAULT NULL,
  `tarif_minggu` decimal(12,2) DEFAULT NULL,
  `tarif_bulan` decimal(12,2) DEFAULT NULL,
  `denda_per_jam` decimal(12,2) DEFAULT NULL,
  `status` enum('tersedia','disewa','maintenance') DEFAULT 'tersedia',
  `foto` varchar(255) DEFAULT NULL,
  `deskripsi` text,
  `created_at` datetime DEFAULT NULL,
  `kelas_level` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`id`, `kode_kendaraan`, `merk`, `nama_kendaraan`, `jenis`, `kelas`, `tahun`, `no_polisi`, `warna`, `tarif_jam`, `tarif_hari`, `tarif_minggu`, `tarif_bulan`, `denda_per_jam`, `status`, `foto`, `deskripsi`, `created_at`, `kelas_level`) VALUES
(1, 'KD001', 'Toyota', 'Avanza', 'MPV', 'Menengah', 2023, 'B 1234 ABC', 'Hitam', '25000.00', '300000.00', '1800000.00', '6500000.00', '10000.00', 'tersedia', 'car-2.jpg', NULL, '2026-06-06 13:51:35', 2),
(2, 'KD002', 'Honda', 'Brio', 'Sedan', 'Ekonomi', 2022, 'B 5678 XYZ', 'Putih', '20000.00', '250000.00', '1500000.00', '5500000.00', '10000.00', 'disewa', 'car-11.jpg', 'Honda Brio 2022, kondisi prima, hemat bahan bakar dan nyaman digunakan untuk perjalanan dalam maupun luar kota.', '2026-06-06 14:06:14', 1),
(3, 'KD006', 'Toyota', 'Avanza', 'MPV', 'Ekonomi', 2022, 'B 1234 AVZ', 'Putih', '25000.00', '300000.00', '1800000.00', '6500000.00', '25000.00', 'disewa', 'car-12.jpg', 'Toyota Avanza 2022 kapasitas 7 penumpang', '2026-06-06 19:38:03', 1),
(4, 'KD007', 'Honda', 'Brio', 'MPV', 'Ekonomi', 2023, 'B 2234 BRI', 'Abu-Abu', '20000.00', '250000.00', '1500000.00', '5500000.00', '20000.00', 'tersedia', 'car-11.jpg', 'Honda Brio hemat bahan bakar', '2026-06-06 19:38:03', 1),
(5, 'KD008', 'BMW', '320i', 'Sedan', 'Premium', 2024, 'B 3234 BMW', 'Biru', '60000.00', '850000.00', '5000000.00', '18000000.00', '50000.00', 'tersedia', 'car-5.jpg', 'BMW 320i sedan premium', '2026-06-06 19:38:03', 3),
(6, 'KD009', 'Mercedes Benz', 'C200', 'Sedan', 'Premium', 2024, 'B 4234 MBZ', 'Abu Silver', '65000.00', '900000.00', '5500000.00', '20000000.00', '50000.00', 'disewa', 'car-7.jpg', 'Mercedes Benz C200 luxury sedan', '2026-06-06 19:38:03', 3),
(7, 'KD010', 'Jeep', 'Wrangler', 'Minibus', 'Menengah', 2023, 'B 5234 JEP', 'Merah', '45000.00', '600000.00', '3500000.00', '12000000.00', '40000.00', 'tersedia', 'car-8.jpg', 'Jeep Wrangler untuk wisata dan offroad', '2026-06-06 19:38:03', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nik` varchar(30) DEFAULT NULL,
  `alamat` text,
  `telepon` varchar(20) DEFAULT NULL,
  `jumlah_transaksi` int(11) DEFAULT '0',
  `is_pelanggan_lama` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `user_id`, `nik`, `alamat`, `telepon`, `jumlah_transaksi`, `is_pelanggan_lama`) VALUES
(1, 3, '36321974832', 'tangerang', '084327463524', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `transaksi_id` int(11) NOT NULL,
  `metode_pembayaran` enum('transfer','cash') NOT NULL,
  `tanggal_bayar` datetime DEFAULT NULL,
  `jumlah_bayar` decimal(12,2) DEFAULT NULL,
  `bukti_pembayaran` varchar(255) DEFAULT NULL,
  `status` enum('menunggu_verifikasi','menunggu_pembayaran_tunai','diterima','ditolak') DEFAULT 'menunggu_verifikasi',
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `transaksi_id`, `metode_pembayaran`, `tanggal_bayar`, `jumlah_bayar`, `bukti_pembayaran`, `status`, `created_at`) VALUES
(10, 13, 'cash', '2026-06-07 15:43:28', '75000.00', NULL, '', '2026-06-07 15:43:28'),
(11, 14, 'cash', '2026-06-08 03:40:07', '60000.00', NULL, '', '2026-06-08 03:40:07'),
(12, 15, 'transfer', '2026-06-08 03:44:13', '360000.00', '3dfc9fef67ab30083d4327e61e3b34aa.jpg', 'menunggu_verifikasi', '2026-06-08 03:44:13');

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id` int(11) NOT NULL,
  `transaksi_id` int(11) NOT NULL,
  `tanggal_pengembalian` datetime NOT NULL,
  `terlambat_jam` int(11) DEFAULT '0',
  `denda` decimal(12,2) DEFAULT '0.00',
  `keterangan` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `status` enum('diajukan','selesai') DEFAULT 'diajukan'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengembalian`
--

INSERT INTO `pengembalian` (`id`, `transaksi_id`, `tanggal_pengembalian`, `terlambat_jam`, `denda`, `keterangan`, `created_at`, `status`) VALUES
(1, 13, '2026-06-08 03:41:54', 5, '50000.00', 'Pengembalian selesai', '2026-06-08 03:41:12', 'diajukan');

-- --------------------------------------------------------

--
-- Table structure for table `supir`
--

CREATE TABLE `supir` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `alamat` text,
  `sim` varchar(50) DEFAULT NULL,
  `status` enum('tersedia','bertugas') DEFAULT 'tersedia'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supir`
--

INSERT INTO `supir` (`id`, `nama`, `telepon`, `alamat`, `sim`, `status`) VALUES
(1, 'bayu', '08432432441', 'jakarta', '213143564655764', 'tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `kode_transaksi` varchar(30) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `pelanggan_id` int(11) DEFAULT NULL,
  `kendaraan_id` int(11) DEFAULT NULL,
  `supir_id` int(11) DEFAULT NULL,
  `jenis_sewa` enum('jam','hari','minggu','bulan') DEFAULT NULL,
  `lama_sewa` int(11) DEFAULT NULL,
  `tgl_mulai` datetime DEFAULT NULL,
  `tgl_selesai` datetime DEFAULT NULL,
  `tujuan` enum('dalam_kota','luar_kota') DEFAULT NULL,
  `ambil_kendaraan` enum('ambil_sendiri','diantar') DEFAULT NULL,
  `biaya_sewa` decimal(12,2) DEFAULT NULL,
  `biaya_antar` decimal(12,2) DEFAULT NULL,
  `biaya_luar_kota` decimal(12,2) DEFAULT NULL,
  `total_bayar` decimal(12,2) DEFAULT NULL,
  `status` enum('booking','menunggu_pembayaran','dibayar','berjalan','selesai','batal','menunggu_pembayaran_tunai') DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `diskon_persen` int(11) DEFAULT '0',
  `potongan` decimal(12,2) DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `kode_transaksi`, `user_id`, `pelanggan_id`, `kendaraan_id`, `supir_id`, `jenis_sewa`, `lama_sewa`, `tgl_mulai`, `tgl_selesai`, `tujuan`, `ambil_kendaraan`, `biaya_sewa`, `biaya_antar`, `biaya_luar_kota`, `total_bayar`, `status`, `created_at`, `diskon_persen`, `potongan`) VALUES
(13, 'TRX20260607154317', 3, 1, 1, NULL, 'jam', 3, '2026-06-07 20:42:00', '2026-06-07 22:42:00', 'dalam_kota', 'ambil_sendiri', '75000.00', '0.00', '0.00', '75000.00', 'selesai', '2026-06-07 15:43:17', 0, '0.00'),
(14, 'TRX20260608033958', 3, 1, 2, NULL, 'jam', 3, '2026-06-08 09:00:00', '2026-06-08 11:00:00', 'dalam_kota', 'ambil_sendiri', '60000.00', '0.00', '0.00', '60000.00', 'dibayar', '2026-06-08 03:39:58', 0, '0.00'),
(15, 'TRX20260608034359', 3, 1, 3, NULL, 'hari', 1, '2026-06-08 10:00:00', '2026-06-09 10:00:00', 'luar_kota', 'ambil_sendiri', '300000.00', '0.00', '60000.00', '360000.00', '', '2026-06-08 03:43:59', 0, '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','customer') DEFAULT 'customer',
  `status` enum('aktif','nonaktif') DEFAULT 'aktif',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `role`, `status`, `created_at`) VALUES
(2, 'Administrator', 'admin@gmail.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin', 'aktif', '2026-06-06 03:32:03'),
(3, 'revani', 'revani@gmail.com', '$2y$10$6/ese1Ty0fbwDGqoeGBpTO0j9qmcx.sAla9qYJv/2l02WHE4XZ/Hm', 'customer', 'aktif', '2026-06-05 22:45:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pembayaran_transaksi` (`transaksi_id`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_id` (`transaksi_id`);

--
-- Indexes for table `supir`
--
ALTER TABLE `supir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_transaksi_pelanggan` (`pelanggan_id`),
  ADD KEY `fk_transaksi_kendaraan` (`kendaraan_id`),
  ADD KEY `fk_transaksi_supir` (`supir_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kendaraan`
--
ALTER TABLE `kendaraan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `supir`
--
ALTER TABLE `supir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD CONSTRAINT `pelanggan_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `fk_pembayaran_transaksi` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksi` (`id`);

--
-- Constraints for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD CONSTRAINT `pengembalian_ibfk_1` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksi` (`id`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fk_transaksi_kendaraan` FOREIGN KEY (`kendaraan_id`) REFERENCES `kendaraan` (`id`),
  ADD CONSTRAINT `fk_transaksi_pelanggan` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggan` (`id`),
  ADD CONSTRAINT `fk_transaksi_supir` FOREIGN KEY (`supir_id`) REFERENCES `supir` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
