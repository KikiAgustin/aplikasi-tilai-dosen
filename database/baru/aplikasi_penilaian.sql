-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2021 at 02:15 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Table structure for table `balasan`
--

CREATE TABLE `balasan` (
  `id_balasan` int(11) NOT NULL,
  `id_diskusi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `balasan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `balasan_postingan`
--

CREATE TABLE `balasan_postingan` (
  `id_balasan_diskusi` int(11) NOT NULL,
  `id_diskusi` int(11) NOT NULL,
  `id_balasan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `balasan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(4, 'Ismayanti S.pd', 'ismayanti@gmail.com', 'Seni Budaya', 'dosen-4.png', 'Belajar ikhtiar dan berdoa untuk kesuksesan'),
(5, 'Dea Hasanatus A.md.ak', 'deahasanah@gmail.com', 'Komputerarisasi Akuntansi', 'kikiagustin.jpg', 'Belajar dari sebuah kesalahan akan menjadikan diri kita lebih dewasa');

-- --------------------------------------------------------

--
-- Table structure for table `diskusi`
--

CREATE TABLE `diskusi` (
  `id_diskusi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `judul` varchar(90) NOT NULL,
  `image` varchar(80) NOT NULL,
  `diskusi` text NOT NULL,
  `tanggal` varchar(50) NOT NULL,
  `penting` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `diskusi`
--

INSERT INTO `diskusi` (`id_diskusi`, `id_user`, `judul`, `image`, `diskusi`, `tanggal`, `penting`) VALUES
(2, 2, '', '', 'Halo anak-anak gimana kabarnya?', '1612837278', 0),
(3, 3, '', '', 'Assalamualaikum, gimana kabarnya anak-anak? Semoga pada sehat ya', '1612837278', 0),
(8, 3, 'Menanyakan kabar', '', 'Assalamualaikum, gimana kabarnya anak-anak? Semoga pada sehat ya', '1612837278', 1),
(9, 1, 'Penambahan Waktu Submission', 'template_email1.png', 'Dear&amp;nbsp;Teman-teman&amp;nbsp;peserta&amp;nbsp;re-cloud&lt;br /&gt;\r\n&lt;br /&gt;\r\nada&amp;nbsp;kabar&amp;nbsp;baik,&amp;nbsp;bahwa&amp;nbsp;batas&amp;nbsp;akhir&amp;nbsp;submission&amp;nbsp;re-cloud&amp;nbsp;challange&amp;nbsp;indonesia&amp;nbsp;akab&amp;nbsp;di&amp;nbsp;penpanjang&amp;nbsp;sampai&amp;nbsp;tanggal&amp;nbsp;21&amp;nbsp;februari&amp;nbsp;2021&lt;br /&gt;\r\n&lt;br /&gt;\r\nmanfaatkan sebaik mungkin ya', '1613696767', 1);

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
(1, 'Ganjil', '1613538037', '2021/2022', 1);

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
(1, 'Kiki Agustin', 'admin@admin.com', 'default.png', '$2y$10$yqO2FeoaMw6ipq2sLvryJ.m5ErYcrh4G8jblo5JNR7uweDACfl63a', 1612837278, 1, 1),
(2, 'Kiki Agustin A.md, S.kom', 'kikiagustin@gmail.com', 'dosen-1.png', '$2y$10$MJh.MA2iahOU/awss9RXg.kPTI5S7hSlwdIXcTkxC4DrpBs/VoI2.', 1613537749, 1, 3),
(3, 'Mega Kusmayati S.ag', 'mega@gmail.com', 'default.png', '$2y$10$pOWgOiqnxJcasuBY0oGI0eHfOpaX94AWXEVjjbPySCD6CvszuTsZ2', 1613537813, 1, 3),
(4, 'David Abdul Ajiz S.kom', 'davidabdul@gmail.com', 'default.png', '$2y$10$v83SklyyJaJZlszZco/CzOu27t5cePEiGVfBpw5ryIzw5aSuN2flC', 1613537875, 1, 3),
(5, 'Ismayanti S.pd', 'ismayanti@gmail.com', 'default.png', '$2y$10$33gn6K7trQW.CME70jeZ3Od9kWjBuWbg2MNBrQh1i/dI7EYb6dBY.', 1613537935, 1, 3),
(6, 'Dea Hasanatus A.md.ak', 'deahasanah@gmail.com', 'default.png', '$2y$10$GmMlguPe/F1zd0sUM3IbAuTy2IOv/oh5AOnvDoJ4bidHngQIIIBe6', 1613537989, 1, 3),
(7, 'Widian Permana', 'onlinekiki008@gmail.com', 'kikiagustin.jpg', '$2y$10$YO9QKc7Rue8noy5Ci5XI7egI4osKXy2.ue2VZonzK/vY/fJE7qLsy', 1613538128, 1, 2);

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
(2, 'onlinekiki008@gmail.com', 'X6m8jGo9iLCSNwkxSfGYlqoBDHTxi/CZbYdCtBVE9mw=', 1613542442);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `balasan`
--
ALTER TABLE `balasan`
  ADD PRIMARY KEY (`id_balasan`);

--
-- Indexes for table `balasan_postingan`
--
ALTER TABLE `balasan_postingan`
  ADD PRIMARY KEY (`id_balasan_diskusi`);

--
-- Indexes for table `daftar_dosen`
--
ALTER TABLE `daftar_dosen`
  ADD PRIMARY KEY (`id_daftar_dosen`);

--
-- Indexes for table `diskusi`
--
ALTER TABLE `diskusi`
  ADD PRIMARY KEY (`id_diskusi`);

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
-- AUTO_INCREMENT for table `balasan`
--
ALTER TABLE `balasan`
  MODIFY `id_balasan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `balasan_postingan`
--
ALTER TABLE `balasan_postingan`
  MODIFY `id_balasan_diskusi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `daftar_dosen`
--
ALTER TABLE `daftar_dosen`
  MODIFY `id_daftar_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `diskusi`
--
ALTER TABLE `diskusi`
  MODIFY `id_diskusi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `hasil_penilaian`
--
ALTER TABLE `hasil_penilaian`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `periode`
--
ALTER TABLE `periode`
  MODIFY `id_periode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
