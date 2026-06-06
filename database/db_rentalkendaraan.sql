-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2026 at 04:53 PM
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
-- Database: `db_rentalkendaraan`
--

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE `kendaraan` (
  `id_kendaraan` varchar(15) NOT NULL,
  `jenis_kendaraan` varchar(50) DEFAULT NULL,
  `merk` varchar(100) DEFAULT NULL,
  `plat_nomor` varchar(20) DEFAULT NULL,
  `kelas_kendaraan` varchar(50) DEFAULT NULL,
  `status_ketersediaan` enum('Tersedia','Disewa') DEFAULT NULL,
  `tahun_produksi` int(11) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `harga_sewa` int(11) DEFAULT NULL,
  `deskripsi` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`id_kendaraan`, `jenis_kendaraan`, `merk`, `plat_nomor`, `kelas_kendaraan`, `status_ketersediaan`, `tahun_produksi`, `gambar`, `harga_sewa`, `deskripsi`) VALUES
('KDR001', 'Mobil', 'Toyota Avanza', 'B1234ABC', 'MPV', 'Disewa', 2022, 'car-1.jpg', 500000, NULL),
('KDR002', 'Mobil', 'Honda Brio', 'B5678DEF', 'City Car', 'Tersedia', 2023, 'car-2.jpg', 500000, 'Honda Brio adalah kendaraan city car yang nyaman digunakan\r\nuntuk perjalanan dalam kota, hemat bahan bakar, dan cocok\r\nuntuk penggunaan harian maupun perjalanan bisnis.');

-- --------------------------------------------------------

--
-- Table structure for table `kwitansi`
--

CREATE TABLE `kwitansi` (
  `id_kwitansi` varchar(15) NOT NULL,
  `id_pembayaran` varchar(15) DEFAULT NULL,
  `nomor_kwitansi` int(11) DEFAULT NULL,
  `tanggal_cetak` date DEFAULT NULL,
  `jumlah_terima` double DEFAULT NULL,
  `metode_pembayaran` varchar(50) DEFAULT NULL,
  `nama_pelanggan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kwitansi`
--

INSERT INTO `kwitansi` (`id_kwitansi`, `id_pembayaran`, `nomor_kwitansi`, `tanggal_cetak`, `jumlah_terima`, `metode_pembayaran`, `nama_pelanggan`) VALUES
('KWT001', NULL, 1001, '2025-06-01', 700000, 'Transfer', 'Siti Aisyah'),
('KWT002', NULL, 1002, '2025-06-05', 900000, 'Transfer', 'Budi Saputra');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_pendapatan`
--

CREATE TABLE `laporan_pendapatan` (
  `id_laporan` varchar(15) NOT NULL,
  `periode_laporan` date DEFAULT NULL,
  `tanggal_awal` date DEFAULT NULL,
  `tanggal_akhir` date DEFAULT NULL,
  `total_pendapatan` double DEFAULT NULL,
  `jumlah_transaksi` int(11) DEFAULT NULL,
  `jumlah_penyewaan` int(11) DEFAULT NULL,
  `tanggal_cetak` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laporan_pendapatan`
--

INSERT INTO `laporan_pendapatan` (`id_laporan`, `periode_laporan`, `tanggal_awal`, `tanggal_akhir`, `total_pendapatan`, `jumlah_transaksi`, `jumlah_penyewaan`, `tanggal_cetak`) VALUES
('LAP001', '2025-06-01', '2025-06-01', '2025-06-30', 1600000, 2, 2, '2025-06-30'),
('LAP002', '2025-07-01', '2025-07-01', '2025-07-31', 2500000, 3, 3, '2025-07-31');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` varchar(10) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `no_telepon` char(15) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `status_pelanggan` varchar(50) DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama`, `email`, `password`, `no_telepon`, `alamat`, `status_pelanggan`, `id_user`) VALUES
('PLG004', 'syarah', 'syarah@gmail.com', 'c6f057b86584942e415435ffb1fa93d4', NULL, NULL, 'Baru', 8),
('PLG005', 'revani', 'revani@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', NULL, NULL, 'Baru', 9);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` varchar(15) NOT NULL,
  `id_penyewaan` varchar(15) DEFAULT NULL,
  `tanggal_bayar` date DEFAULT NULL,
  `jumlah_bayar` double DEFAULT NULL,
  `metode_pembayaran` varchar(50) DEFAULT NULL,
  `status_pembayaran` enum('Belum Bayar','Menunggu Verifikasi','Lunas') DEFAULT NULL,
  `bukti_transfer` varchar(255) DEFAULT NULL,
  `status_verifikasi` enum('Pending','Valid','Ditolak') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_penyewaan`, `tanggal_bayar`, `jumlah_bayar`, `metode_pembayaran`, `status_pembayaran`, `bukti_transfer`, `status_verifikasi`) VALUES
('BYR202606011458', 'SW2026060114522', '2026-06-01', 500000, 'Tunai', 'Belum Bayar', '', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian_kendaraan`
--

CREATE TABLE `pengembalian_kendaraan` (
  `id_pengembalian` varchar(15) NOT NULL,
  `id_penyewaan` varchar(15) DEFAULT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `kondisi_kendaraan` varchar(100) DEFAULT NULL,
  `telat_waktu` date DEFAULT NULL,
  `denda_keterlambatan` double DEFAULT NULL,
  `total_tagihan` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penyewaan`
--

CREATE TABLE `penyewaan` (
  `id_penyewaan` varchar(15) NOT NULL,
  `id_pelanggan` varchar(10) DEFAULT NULL,
  `id_kendaraan` varchar(15) DEFAULT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `metode_pengembalian` enum('Diantar','Ambil Sendiri') DEFAULT NULL,
  `durasi` int(11) DEFAULT NULL,
  `total_biaya` double DEFAULT NULL,
  `status_penyewaan` enum('Menunggu','Disetujui','Berjalan','Selesai','Dibatalkan') DEFAULT NULL,
  `id_supir` varchar(10) DEFAULT NULL,
  `tujuan_sewa` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyewaan`
--

INSERT INTO `penyewaan` (`id_penyewaan`, `id_pelanggan`, `id_kendaraan`, `tanggal_mulai`, `tanggal_selesai`, `metode_pengembalian`, `durasi`, `total_biaya`, `status_penyewaan`, `id_supir`, `tujuan_sewa`) VALUES
('SW2026060114522', NULL, 'KDR001', '2026-06-01', '2026-06-02', 'Ambil Sendiri', 1, 500000, 'Menunggu', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `supir`
--

CREATE TABLE `supir` (
  `id_supir` varchar(15) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `no_sim` varchar(20) DEFAULT NULL,
  `no_telepon` varchar(15) DEFAULT NULL,
  `rating` decimal(3,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supir`
--

INSERT INTO `supir` (`id_supir`, `nama`, `no_sim`, `no_telepon`, `rating`) VALUES
('SPR001', 'Budi Santoso', 'SIM12345', '081111111111', '4.80'),
('SPR002', 'Andi Wijaya', 'SIM67890', '082222222222', '4.60');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(15) NOT NULL,
  `id_pembayaran` varchar(15) DEFAULT NULL,
  `tanggal_transaksi` date DEFAULT NULL,
  `jenis_pembayaran` varchar(50) DEFAULT NULL,
  `status_transaksi` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('admin','customer') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `email`, `password`, `role`) VALUES
(8, 'syarah', 'syarah@gmail.com', 'c6f057b86584942e415435ffb1fa93d4', 'customer'),
(9, 'revani', 'revani@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`id_kendaraan`);

--
-- Indexes for table `kwitansi`
--
ALTER TABLE `kwitansi`
  ADD PRIMARY KEY (`id_kwitansi`),
  ADD KEY `id_pembayaran` (`id_pembayaran`);

--
-- Indexes for table `laporan_pendapatan`
--
ALTER TABLE `laporan_pendapatan`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_penyewaan` (`id_penyewaan`);

--
-- Indexes for table `pengembalian_kendaraan`
--
ALTER TABLE `pengembalian_kendaraan`
  ADD PRIMARY KEY (`id_pengembalian`),
  ADD KEY `id_penyewaan` (`id_penyewaan`);

--
-- Indexes for table `penyewaan`
--
ALTER TABLE `penyewaan`
  ADD PRIMARY KEY (`id_penyewaan`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_kendaraan` (`id_kendaraan`);

--
-- Indexes for table `supir`
--
ALTER TABLE `supir`
  ADD PRIMARY KEY (`id_supir`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_pembayaran` (`id_pembayaran`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kwitansi`
--
ALTER TABLE `kwitansi`
  ADD CONSTRAINT `kwitansi_ibfk_1` FOREIGN KEY (`id_pembayaran`) REFERENCES `pembayaran` (`id_pembayaran`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_penyewaan`) REFERENCES `penyewaan` (`id_penyewaan`);

--
-- Constraints for table `pengembalian_kendaraan`
--
ALTER TABLE `pengembalian_kendaraan`
  ADD CONSTRAINT `pengembalian_kendaraan_ibfk_1` FOREIGN KEY (`id_penyewaan`) REFERENCES `penyewaan` (`id_penyewaan`);

--
-- Constraints for table `penyewaan`
--
ALTER TABLE `penyewaan`
  ADD CONSTRAINT `penyewaan_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`),
  ADD CONSTRAINT `penyewaan_ibfk_2` FOREIGN KEY (`id_kendaraan`) REFERENCES `kendaraan` (`id_kendaraan`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_pembayaran`) REFERENCES `pembayaran` (`id_pembayaran`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
