-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2021 at 02:23 AM
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
-- Table structure for table `daftar_dosen`
--

CREATE TABLE `daftar_dosen` (
  `id_daftar_dosen` int(11) NOT NULL,
  `nama` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `mengajar` varchar(60) NOT NULL,
  `image` varchar(125) NOT NULL,
  `quotes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `daftar_dosen`
--

INSERT INTO `daftar_dosen` (`id_daftar_dosen`, `nama`, `email`, `mengajar`, `image`, `quotes`) VALUES
(1, 'Kiki Agustin A.md, S.kom', 'kikiagustin@gmail.com', 'Teknik Informatika', 'dosen-1.png', 'Belajar menghadapi hal kecil, sebelum menghadapii hal besar'),
(2, 'Mega Kusmayati S.ag', 'mega@gmail.com', 'Keagamaan', 'dosen-2.png', 'Membiasakan mandiri sejak diusia dini, tuk bekal besar nanti'),
(3, 'David Abdul Ajiz S.kom', 'davidabdul@gmail.com', 'Teknik Informatika', 'dosen-3.png', 'Kerja keras dahulu, lalu nikmati hasilnya kemuadian hari'),
(4, 'Ismayanti S.pd', 'ismayanti@gmail.com', 'Komputerarisasi Akuntansi', 'dosen-4.png', 'Belajar ikhtiar dan berdoa untuk kesuksesan'),
(5, 'Dea Hasanatus A.md.ak', 'deahasanah@gmail.com', 'Komputerarisasi Akuntansi', 'kikiagustin.jpg', 'Belajar dari sebuah kesalahan akan menjadikan diri kita lebih dewasa');

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
  `pilihan2` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(80) NOT NULL,
  `cek_read` int(11) NOT NULL,
  `read_admin` int(11) NOT NULL,
  `bintang_admin` int(11) NOT NULL,
  `read_dosen` int(11) NOT NULL,
  `bintang_dosen` int(11) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `periode` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hasil_penilaian`
--

INSERT INTO `hasil_penilaian` (`id_penilaian`, `rating1`, `rating2`, `saran`, `id_daftar_dosen`, `pilihan`, `pilihan2`, `id_user`, `nama_user`, `cek_read`, `read_admin`, `bintang_admin`, `read_dosen`, `bintang_dosen`, `semester`, `periode`) VALUES
(1, 4, 10, 'Penyampaian materi semoga bisa ditingkatkan lagi, supaya anak-anak bisa lebih mengerti tentang materi yang di sampaiakan', 1, 4, 10, 18, 'Jajang Maulana', 1, 1, 1, 1, 1, 'Ganjil', '2021/2022'),
(2, 9, 6, 'Coba penyampaian materinya diperbaiki lagi', 4, 9, 6, 18, 'Jajang Maulana', 1, 0, 0, 0, 0, 'Genap', '2021/2022');

-- --------------------------------------------------------

--
-- Table structure for table `periode`
--

CREATE TABLE `periode` (
  `id_periode` int(11) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `tanggal` varchar(30) NOT NULL,
  `periode` varchar(55) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `periode`
--

INSERT INTO `periode` (`id_periode`, `semester`, `tanggal`, `periode`, `status`) VALUES
(1, 'Ganjil', '1613299468', '2021/2022', 2),
(2, 'Genap', '1613300278', '2021/2022', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `email` varchar(100) NOT NULL,
  `image` varchar(120) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date_created` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `date_created`, `is_active`, `role_id`) VALUES
(4, 'Kiki Agustin', 'admin@admin.com', 'default.jpg', '$2y$10$yqO2FeoaMw6ipq2sLvryJ.m5ErYcrh4G8jblo5JNR7uweDACfl63a', 1612837278, 1, 1),
(13, 'Kiki Agustin', 'kikiagustin@gmail.com', 'default.png', '$2y$10$Q0nb1jh.SmcU1Tgf8rtaTeY48Jge4kxBIgx8fBNcSX13mtdw7XzTu', 1613190303, 1, 3),
(14, 'Mega Kusmayati', 'mega@gmail.com', 'default.png', '$2y$10$HKPfH08XbDjNRWb2f4iIwuhkmsc03Bl3vJBhKgI1baq2cvtGpR.B.', 1613190438, 1, 3),
(15, 'David Abdul Ajiz', 'davidabdul@gmail.com', 'kikiagustin1.jpg', '$2y$10$bVxGBuq5kWjgBKZYCcDNKe.WX062Hx9Vm5YmlPu2FYkkIodbQYVde', 1613190600, 1, 3),
(16, 'Ismayanti', 'ismayanti@gmail.com', 'kikiagustin1.jpg', '$2y$10$W.XdSqGtvwkT7sSuQPNLd.Ssr5nMEGV2242tUa3lS62F5MHAF2mFG', 1613190782, 1, 3),
(17, 'Dea Hasanatus', 'deahasanah@gmail.com', 'default.png', '$2y$10$Zto/Kd157JL6Mu1g.OwUROeINweadk/aT1aJRDrva27baCEKs3Lcu', 1613191094, 1, 3),
(18, 'Jajang Maulana', 'onlinekiki008@gmail.com', 'default.png', '$2y$10$uayspgjuu.O6IPe7J8cwLuhVeePNto2yqp56dFUk2rz/pIuZFeXtO', 1613191912, 1, 2),
(20, 'Awan Suwanda', 'asuwanda087@gmail.com', 'default.png', '$2y$10$3NVqVbnSu3gcCftjQWhYves4WnosITsAtdEAeCFKErUqhHiXLS50.', 1613398867, 1, 2),
(21, 'Herbalin Aja', 'herbarstore@gmail.com', 'default.png', '$2y$10$bC443m1BIAnbsNaZ4rS45OMwFScu4oOLsxX4Qe8lCQqehQD8Hu79e', 1613399118, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id_token` int(11) NOT NULL,
  `email` varchar(125) NOT NULL,
  `token` varchar(125) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id_token`, `email`, `token`, `date_created`) VALUES
(2, 'onlinekiki008@gmail.com', 'eUPiHz+NZo/9p6giI5wJbZR2c62Ztv6aMUX00cPhApk=', 1613290383),
(6, 'herbarstore@gmail.com', 'cCIhuDh1cvgp7Ywr42OqPbBuHIesyCvwSpyhkenlDQU=', 1613400392);

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
-- Indexes for table `periode`
--
ALTER TABLE `periode`
  ADD PRIMARY KEY (`id_periode`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daftar_dosen`
--
ALTER TABLE `daftar_dosen`
  MODIFY `id_daftar_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hasil_penilaian`
--
ALTER TABLE `hasil_penilaian`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `periode`
--
ALTER TABLE `periode`
  MODIFY `id_periode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
