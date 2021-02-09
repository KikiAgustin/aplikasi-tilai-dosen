-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2021 at 10:08 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

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
(1, 'Kiki Agustin', 'Teknik Informatika', 'dosen-1.png', 'Belajar menghadapi hal kecil, sebelum menghadapii hal besar'),
(2, 'Mega Kusmayati', 'Teknik Informatika', 'dosen-2.png', 'Membiasakan mandiri sejak diusia dini, tuk bekal besar nanti'),
(3, 'David Abdul Aziz', 'Teknik Informatika', 'dosen-3.png', 'Kerja keras dahulu, lalu nikmati hasilnya kemuadian hari'),
(4, 'Ismayanti', 'Teknik Informatika', 'dosen-4.png', 'Belajar ikhtiar dan berdoa untuk kesuksesan'),
(9, 'Dea Hasanah Tsaniah', 'Komputerarisasi Akuntansi', 'kikiagustin.jpg', 'Belajar belajar');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_penilaian`
--

CREATE TABLE `hasil_penilaian` (
  `id_penilaian` int(11) NOT NULL,
  `rating1` int(11) NOT NULL,
  `rating2` int(11) NOT NULL,
  `saran` text NOT NULL,
  `id_daftar_dosen` int(11) NOT NULL,
  `pilihan` int(11) NOT NULL,
  `pilihan2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hasil_penilaian`
--

INSERT INTO `hasil_penilaian` (`id_penilaian`, `rating1`, `rating2`, `saran`, `id_daftar_dosen`, `pilihan`, `pilihan2`) VALUES
(1, 10, 10, 'cara menyampaikan materi sangat enak dan mudah di mengerti', 1, 10, 10),
(2, 10, 10, 'Dosenny sangat seru ketika mengajar', 3, 10, 10),
(3, 8, 10, 'Cara mengajar saat enak dan mudah dimengerti', 1, 10, 10),
(4, 4, 7, 'Pembelajaran lebih menyanangkan karena sistem pembelajaran yang milenial', 1, 4, 7),
(5, 9, 10, 'bagus sekali', 1, 0, 0),
(6, 9, 9, 'asasasasaasasasasasaas', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `nama_lengkap` varchar(90) NOT NULL,
  `email` varchar(80) NOT NULL,
  `image` varchar(120) NOT NULL,
  `password` varchar(250) NOT NULL,
  `is_active` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(6, 'Kiki Agustin', 'kikiagustin62@gmail.com', '$2y$10$Xdrs3fZKYHLGMwTMLtSdsOwULC3Um8pvkLEsTw4r.pKYVPCRNDypu', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daftar_dosen`
--
ALTER TABLE `daftar_dosen`
  ADD PRIMARY KEY (`id_daftar_dosen`);

--
-- Indexes for table `hasil_penilaian`
--
ALTER TABLE `hasil_penilaian`
  ADD PRIMARY KEY (`id_penilaian`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daftar_dosen`
--
ALTER TABLE `daftar_dosen`
  MODIFY `id_daftar_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `hasil_penilaian`
--
ALTER TABLE `hasil_penilaian`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
