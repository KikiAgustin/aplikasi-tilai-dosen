-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2021 at 02:15 AM
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
  `pilihan2` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(80) NOT NULL,
  `cek_read` int(11) NOT NULL,
  `periode` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hasil_penilaian`
--

INSERT INTO `hasil_penilaian` (`id_penilaian`, `rating1`, `rating2`, `saran`, `id_daftar_dosen`, `pilihan`, `pilihan2`, `id_user`, `nama_user`, `cek_read`, `periode`) VALUES
(1, 10, 10, 'Cara penyampaian sangat enak dan mudah dimengerti', 1, 10, 10, 10, 'Kiki Agustin', 1, '2020/2021'),
(2, 5, 10, 'Bisa di tingkatkan kembali cara penyampaian materi nya', 3, 5, 10, 10, 'Kiki Agustin', 0, '2019/2020');

-- --------------------------------------------------------

--
-- Table structure for table `periode`
--

CREATE TABLE `periode` (
  `id_periode` int(11) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `periode` varchar(55) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `periode`
--

INSERT INTO `periode` (`id_periode`, `semester`, `periode`, `status`) VALUES
(1, 'Semester Ganjil', '2020/2021', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
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
(4, 'Kintan', 'admin@admin.com', 'dafault.jpg', '$2y$10$yqO2FeoaMw6ipq2sLvryJ.m5ErYcrh4G8jblo5JNR7uweDACfl63a', 1612837278, 1, 1),
(10, 'Kiki Agustin', 'onlinekiki008@gmail.com', 'default.jpg', '$2y$10$BE6HWWStTtDqvG5MoaZIMuzotVZjb.ubYFlxQxCIBrgmh0iKGpcVC', 1612837278, 1, 2),
(11, 'Mencoba', 'dede@gmail.com', 'default.jpg', '$2y$10$K1hLUOEycAW8bUCB.3Y7TuxdNFRYUtnJiWkJPbaMZ2j2PTjbqIIUC', 1612839509, 0, 2);

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
(2, 'dede@gmail.com', 'gIyAMHyMksYUeKSNiYJSmzU+usmF/WboOPPcjtQk1Ks=', 1612839509),
(3, 'onlinekiki008@gmail.com', 'aXDxCWSyK410jN55DzyUsrBvLjnYwTdHohn6V9dGYDE=', 1612842196),
(4, 'onlinekiki008@gmail.com', '4PJjcRoiZpDUwwi4pFoeEDoP0YNWqeJU+/ACadH8Y2g=', 1612842201),
(5, 'onlinekiki008@gmail.com', 'z8oaD/VtWZJ9tvcLL4aZYdy4mpQupKannwjsq+6NmIA=', 1612845720),
(6, 'onlinekiki008@gmail.com', 'msesMLKiIvfcg6d+K2YVBc9PuL5efEjY/2MjTC6dKA8=', 1612846211);

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
  MODIFY `id_daftar_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `hasil_penilaian`
--
ALTER TABLE `hasil_penilaian`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `periode`
--
ALTER TABLE `periode`
  MODIFY `id_periode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
