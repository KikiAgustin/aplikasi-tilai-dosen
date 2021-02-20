-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2021 at 06:13 AM
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
-- Table structure for table `balasan`
--

CREATE TABLE `balasan` (
  `id_balasan` int(11) NOT NULL,
  `id_diskusi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `balasan` text NOT NULL,
  `tanggal` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `balasan`
--

INSERT INTO `balasan` (`id_balasan`, `id_diskusi`, `id_user`, `balasan`, `tanggal`) VALUES
(1, 1, 1, 'Baik min terimakasih informasinya', '1613763639'),
(2, 1, 7, 'Makasih admin untuk informasinya', '1613763639'),
(3, 1, 2, 'Alhamdulillah manfaatkan ya anak-anak kesempatan ini dengan baik', '1613763639'),
(4, 2, 7, 'bismillah', '1613788495'),
(5, 2, 3, 'semangat belajarnya ya anak-anak, mari berdoa semoga pandemi ini segera berakhir                        ', '1613796750');

-- --------------------------------------------------------

--
-- Table structure for table `balasan_postingan`
--

CREATE TABLE `balasan_postingan` (
  `id_balasan_diskusi` int(11) NOT NULL,
  `id_diskusi` int(11) NOT NULL,
  `id_balasan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `balasan` text NOT NULL,
  `tanggal` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `balasan_postingan`
--

INSERT INTO `balasan_postingan` (`id_balasan_diskusi`, `id_diskusi`, `id_balasan`, `id_user`, `balasan`, `tanggal`) VALUES
(2, 1, 1, 1, 'Baik Pak, laksanakan', '1613763639'),
(3, 1, 1, 2, 'Baguus', '1613763639'),
(7, 1, 1, 7, 'Mantap sekali pak', '1613786182'),
(8, 1, 3, 7, 'Baik Pak', '1613794751'),
(10, 2, 4, 7, 'mantap', '1613795794'),
(11, 1, 3, 3, 'iya manfaatkan ya anak-anak', '1613796583');

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
  `user` int(11) NOT NULL,
  `penting` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `diskusi`
--

INSERT INTO `diskusi` (`id_diskusi`, `id_user`, `judul`, `image`, `diskusi`, `tanggal`, `user`, `penting`) VALUES
(1, 1, 'Penambahan Waktu Submission', 'template_email1.png', '<strong>Dear temen-temen Mahasiswa  yang mengikui Re-cloud Challange Indonesia</strong><br>\r\nAda Informasi menari nih, karena masih banyak antusias yang masuk untuk ikut challange ini maka dari itu, batas akhir submission jadi diperpanjang sampai tanggal 21 februari 2021.<br>\r\nManfaatkan kesempatan ini sebaik mungkin ya...<br>\r\nBuat yang belum submit yu segera submit, buat yang sudah diperbaiki lagi ya website nya', '1613763639', 0, 1),
(2, 7, '', '', 'Hai teman-teman gimana nih, hasil pembelajaran pada semester kemarin?   apakah baik?                     ', '1613764931', 1, 0),
(3, 3, '', '', 'Asalamualaikum anak-anak gimana kabarnya?  semoga baik yaa                      ', '1613797028', 1, 0);

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
-- Table structure for table `like_postingan`
--

CREATE TABLE `like_postingan` (
  `id_like_postingan` int(11) NOT NULL,
  `id_postingan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `from_like` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `tanggal` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `like_postingan`
--

INSERT INTO `like_postingan` (`id_like_postingan`, `id_postingan`, `id_user`, `from_like`, `status`, `tanggal`) VALUES
(1, 1, 1, 1, 1, '1613764158'),
(2, 1, 1, 7, 1, '1613764837'),
(3, 2, 7, 7, 1, '1613764951'),
(4, 1, 1, 2, 1, '1613765293'),
(5, 1, 1, 3, 1, '1613796559'),
(6, 2, 7, 3, 1, '1613796721');

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
(1, 'Admin', 'admin@admin.com', 'default.png', '$2y$10$yqO2FeoaMw6ipq2sLvryJ.m5ErYcrh4G8jblo5JNR7uweDACfl63a', 1612837278, 1, 1),
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
-- Indexes for table `like_postingan`
--
ALTER TABLE `like_postingan`
  ADD PRIMARY KEY (`id_like_postingan`);

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
  MODIFY `id_balasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `balasan_postingan`
--
ALTER TABLE `balasan_postingan`
  MODIFY `id_balasan_diskusi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `daftar_dosen`
--
ALTER TABLE `daftar_dosen`
  MODIFY `id_daftar_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `diskusi`
--
ALTER TABLE `diskusi`
  MODIFY `id_diskusi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hasil_penilaian`
--
ALTER TABLE `hasil_penilaian`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `like_postingan`
--
ALTER TABLE `like_postingan`
  MODIFY `id_like_postingan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
