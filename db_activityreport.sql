-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2022 at 09:13 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_activityreport`
--

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `level_id` int(11) NOT NULL,
  `nama_level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`level_id`, `nama_level`) VALUES
(1, 'superadmin'),
(2, 'karyawan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_laporanharian`
--

CREATE TABLE `tb_laporanharian` (
  `id_kegiatan` int(11) NOT NULL,
  `nama_kegiatan` varchar(255) NOT NULL,
  `tgl_kegiatan` date NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `tempat` varchar(255) NOT NULL,
  `penyelenggara` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_laporanharian`
--

INSERT INTO `tb_laporanharian` (`id_kegiatan`, `nama_kegiatan`, `tgl_kegiatan`, `jam_mulai`, `jam_selesai`, `tempat`, `penyelenggara`, `keterangan`, `username`) VALUES
(2, 'rapat besar', '2022-11-21', '12:00:00', '00:00:00', 'zoom', 'aku', 'penting jhkjhkahdkhakjdsakdadas sanbfnadadadffaf', '0'),
(3, 'rapaatt geden', '2022-11-24', '11:34:00', '14:09:00', 'gmeet', 'kapten saputro', 'RAPAT SANGAT PENTING DAN BUTUH PENGEMBANGAN', '0'),
(4, 'info rapat', '2022-11-30', '09:00:00', '11:00:00', 'balai sarbini', 'clarisa', 'rapat terus sape budrek', 'agnarbriantama'),
(5, 'rapat besar', '2022-11-29', '10:55:00', '10:55:00', 'gmeet', 'aku', 'rapat', ''),
(6, 'rapat besar', '2022-11-28', '09:57:00', '10:58:00', 'zoom', 'aku', 'dwddsd', ''),
(7, 'rapat besar', '2022-11-29', '09:59:00', '09:00:00', 'zoom', 'aku', 'sdsdsdsd', ''),
(8, 'rapat besar', '2022-11-29', '10:05:00', '10:05:00', 'zoom', 'aku', 'wewewe', ''),
(9, 'rapat besar', '2022-11-29', '10:00:00', '10:11:00', 'gmeet', 'aku', 'yaw', 'agnarbriantama'),
(10, 'rapat besar', '2022-12-22', '23:27:00', '13:26:00', 'zoom', 'aku', 'waawaw', 'clarissaputri'),
(11, 'rapat besar', '2022-12-15', '14:00:00', '17:03:00', 'wdwds', 'dsdsdsd', 'sdsds', 'clarissaputri'),
(12, 'rapat besar', '2022-12-15', '19:03:00', '20:05:00', '12121', '131313', '313131313', 'superadmin'),
(13, 'rapat besar', '2022-12-15', '20:05:00', '21:06:00', '343434', '34343', '34343', 'superadmin'),
(14, 'rapat besar', '2022-12-16', '15:05:00', '17:08:00', 'zoom', 'aku', 'budrek', 'superadmin'),
(15, 'rapat besar', '2022-12-16', '15:13:00', '18:16:00', 'zoom', 'aku', 'wawewewew', 'clarissaputri');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_tim` int(11) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `level_id` int(11) NOT NULL,
  `gambar_user` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `is_active` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `full_name`, `username`, `password`, `email`, `id_tim`, `phone`, `level_id`, `gambar_user`, `created_at`, `is_active`) VALUES
(4, 'super admin', 'superadmin', '$2y$10$EQuhjTRa8.jIwIBT44jCseBYVQEapjLWLhNhmJT5sDLRn3ASQ8Ace', 'admin@admin.com', 0, '893473943434', 1, 'admin.png', '1670477291', '1'),
(9, 'Agnar Briantama Ridhwanullahh', 'agnarbriantama', '$2y$10$w/xF3dAKOpaYpYFOrm5o0exW8bh9/iMlbIVf/LjIRgViKLkHFtqpy', 'agnarbriantama25@student.uns.ac.id', 0, '085235905122', 2, 'userimg.png', '1670477378', '1'),
(20, 'Budi Adinaa', 'budiadina12', '$2y$10$vGGjwQ6LlRJCyMzXIKmPy.RXAzbPqhdkZkyfgZOQobco738aFiERO', 'budiadina@gmail.com', 0, '081287560665', 1, 'userimg4.jpg', '1669256954', '1'),
(25, 'clarisa', 'clarissaputri', '$2y$10$1swNkAMwwJU6oJ6mLwz4ruTSX.5RdW70iNdGuCUCvqZj5vUVnEHYm', 'briansurya25@gmail.com', 0, '085235905122', 2, 'WhatsApp_Image_2022-09-26_at_14_16_041.jpeg', '1669257778', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`level_id`);

--
-- Indexes for table `tb_laporanharian`
--
ALTER TABLE `tb_laporanharian`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `level_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_laporanharian`
--
ALTER TABLE `tb_laporanharian`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
