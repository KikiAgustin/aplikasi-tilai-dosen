-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2021 at 02:01 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aplikasi_penilaian`
--

-- --------------------------------------------------------

--
-- Table structure for table `akupuntur`
--

CREATE TABLE `akupuntur` (
  `id_akupuntur` int(11) NOT NULL,
  `tanggal_pemesanan` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `penyakit` varchar(30) NOT NULL,
  `nomor` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akupuntur`
--

INSERT INTO `akupuntur` (`id_akupuntur`, `tanggal_pemesanan`, `nama`, `penyakit`, `nomor`, `alamat`, `jumlah`, `status`) VALUES
(1, '20-09-2020', 'Kiki Agustin', 'Lainnya', '085794203570', 'Bandung', 1, 1),
(3, '20-09-2020', 'Jajang', 'Lainnya', '1212', 'Bandung', 2, 2),
(6, '21-09-2020', 'Dea Hasanah', 'Nyeri Sendi dan Otot', '0898897760', 'Bandung', 1, 0),
(7, '21-09-2020', 'asasa', 'Nyeri Sendi dan Otot', '121212', 'asasasa', 1, 0),
(8, '21-09-2020', 'Raju', 'Nyeri Sendi dan Otot', '12121', 'asasas', 2, 0),
(9, '21-09-2020', 'Kiki Agustin', 'Migrain', '098998776554', 'Majalaya', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `daftar_dosen`
--

CREATE TABLE `daftar_dosen` (
  `id_daftar_dosen` int(11) NOT NULL,
  `nama` varchar(70) NOT NULL,
  `mengajar` varchar(60) NOT NULL,
  `image` varchar(125) NOT NULL,
  `quotes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `daftar_dosen`
--

INSERT INTO `daftar_dosen` (`id_daftar_dosen`, `nama`, `mengajar`, `image`, `quotes`) VALUES
(1, 'Kiki Agustin', 'Teknik Informatika', 'img/dosen-1.jpg', 'Belajar menghadapi hal kecil, sebelum menghadapii hal besar'),
(2, 'Mega Kusmayati', 'Teknik Informatika', 'img/dosen-1.jpg', 'Belajar menghadapi hal kecil, sebelum menghadapii hal besar'),
(3, 'David Abdul Aziz', 'Teknik Informatika', 'img/dosen-1.jpg', 'Belajar menghadapi hal kecil, sebelum menghadapii hal besar'),
(4, 'Ismayanti', 'Teknik Informatika', 'img/dosen-1.jpg', 'Belajar menghadapi hal kecil, sebelum menghadapii hal besar');

-- --------------------------------------------------------

--
-- Table structure for table `jumlah_keseluruhan`
--

CREATE TABLE `jumlah_keseluruhan` (
  `id_keseluruhan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `pembelian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jumlah_keseluruhan`
--

INSERT INTO `jumlah_keseluruhan` (`id_keseluruhan`, `tanggal`, `pembelian`) VALUES
(1, '2020-09-01', 1),
(2, '2020-09-09', 1),
(3, '2020-09-14', 1),
(4, '2020-09-20', 1),
(5, '2020-09-20', 1),
(6, '2020-09-20', 1),
(7, '2020-09-20', 1),
(8, '2020-09-20', 1),
(9, '2020-09-20', 1),
(10, '2020-09-20', 1),
(11, '2020-09-20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `madu`
--

CREATE TABLE `madu` (
  `id_madu` int(11) NOT NULL,
  `tanggal_pemesanan` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `penyakit` varchar(20) NOT NULL,
  `nomor` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `madu`
--

INSERT INTO `madu` (`id_madu`, `tanggal_pemesanan`, `nama`, `penyakit`, `nomor`, `alamat`, `jumlah`, `status`) VALUES
(1, '20-09-2020', 'Kiki Agustin', 'Lainnya', '085794203570', 'Kp. Salamungkal Rt.02 Rw.07 Desa. Karangtunggal Kecamatan. Paseh kabupaten. Bandung Provinsi. Jawa B', 2, 2),
(3, '21-09-2020', 'Dea Juga', 'Lainnya', '099990009998', 'Cimahi', 2, 0),
(4, '21-09-2020', 'asasa', 'Asam Lambung', '12121', 'asasasa', 2, 0),
(5, '21-09-2020', 'yaya Maulana', 'Asam Lambung', '32323', 'asasaasa', 2, 0),
(6, '21-09-2020', 'Dea Hasanatus ', 'Lainnya', '098887665454', 'Cimahi', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `is_active` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `is_active`, `role_id`) VALUES
(4, 'Kintan', 'admin@admin.com', '$2y$10$yqO2FeoaMw6ipq2sLvryJ.m5ErYcrh4G8jblo5JNR7uweDACfl63a', 1, 1),
(5, 'Kiki Agustin', 'kikiagustin62@gmail.com', '$2y$10$hsLEOtAjua075kOoNzt7qOav6I7WBjwhdaGD9RgZDjIiLMviz0Zoe', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akupuntur`
--
ALTER TABLE `akupuntur`
  ADD PRIMARY KEY (`id_akupuntur`);

--
-- Indexes for table `daftar_dosen`
--
ALTER TABLE `daftar_dosen`
  ADD PRIMARY KEY (`id_daftar_dosen`);

--
-- Indexes for table `jumlah_keseluruhan`
--
ALTER TABLE `jumlah_keseluruhan`
  ADD PRIMARY KEY (`id_keseluruhan`);

--
-- Indexes for table `madu`
--
ALTER TABLE `madu`
  ADD PRIMARY KEY (`id_madu`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akupuntur`
--
ALTER TABLE `akupuntur`
  MODIFY `id_akupuntur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `daftar_dosen`
--
ALTER TABLE `daftar_dosen`
  MODIFY `id_daftar_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jumlah_keseluruhan`
--
ALTER TABLE `jumlah_keseluruhan`
  MODIFY `id_keseluruhan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `madu`
--
ALTER TABLE `madu`
  MODIFY `id_madu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
