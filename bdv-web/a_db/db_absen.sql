-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2017 at 10:38 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_absen`
--
CREATE DATABASE IF NOT EXISTS `db_absen` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_absen`;

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `nomor` int(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `profesi` varchar(255) NOT NULL,
  `perusahaan` varchar(255) NOT NULL,
  `waktu` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `member_bdv`
--

CREATE TABLE `member_bdv` (
  `mac` varchar(17) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `gender` varchar(60) NOT NULL,
  `tanggalLahir` varchar(12) NOT NULL,
  `kota` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `noHp` varchar(60) NOT NULL,
  `profesi` varchar(60) NOT NULL,
  `perusahaan` varchar(255) NOT NULL,
  `keahlian` varchar(60) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `linkedln` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member_bdv`
--

INSERT INTO `member_bdv` (`mac`, `nama`, `pass`, `gender`, `tanggalLahir`, `kota`, `email`, `noHp`, `profesi`, `perusahaan`, `keahlian`, `instagram`, `linkedln`, `facebook`) VALUES
('76:3I:GH:23:8B:O9', 'Renata Anrita', '$2y$10$S1Lnn3vULQMo9IHFch4HhuRirAVMTrlIKNNnLaLkSSO1CE7nEbziO', 'wanita', '1986-07-24', 'Padjajaran', '1301144@jkj.327', '08888888888', 'freelance', 'ilham', 'itbiz', 'renataanrita', 'renataanrita', 'renataanrita'),
('82:P2:LL:8D:9M:G3', 'almira', '$2y$10$4v6xCYEj94dT68ZzDjpFB.ZgK/LOo.KX9FQHFGit1SqfscgKOn5H.', 'wanita', '1996-11-14', 'Surabaya', '13011@nm.44327', '085672841884', 'freelance', 'PT. Pertamina Tbk', 'Web Backend Developer', 'almirakhonia', 'almirakhonia', 'almirakhonia'),
('42:O3:6G:19:65:J8', 'Gayus Tambunan', '$2y$10$/DuWkYiZX78hURLYcN.6P.qzwxL9y8Ef9TFWsKSWV.l/pSoUhJ43G', 'wanita', '1970-01-17', 'Yogyakarta', '1301@hjh.144327', '0887466788', 'startup', 'PT. Astra Kencana', 'itpro', 'gayustambunan', 'gayustambunan', 'gayustambunan'),
('28:09:98:22:88:00', 'Muhammad Rafi', '$2y$10$L/.BvSd95ErQmTgM1gMXte8NJLB9tok7crafsWAUhMTRlZfWvDz/6', 'pria', '1996-02-29', 'Tangerang Selatan', 'muhammadrafi@gmail.com', '08888014416', 'student', 'BDV', 'webdev', 'muhammadrafimrf', 'muhammadrafimrf', 'muhammadrafimrf'),
('28:C2:DD:8D:0B:E9', 'Bagus Hernanda', '$2y$10$e0XS21ltZVBrgaHlQA23Y.JaL1KO5oYC86c0TsvV1SIV3UtGNBdZ.', 'pria', '1996-08-17', 'Tangerang', 'bagushrn@gmail.com', '085672841884', 'student', 'Telkom', 'itbiz', 'bagushernanda', 'bagushernanda', 'bagushernanda'),
('82:P2:LL:8D:9M:G3', 'Rahmaji Merudanda', '$2y$10$qTfq87Jl1bq9lKgd7Uldce7hNioAobHxsNnTflNMElyHxn4/fsl9G', 'pria', '1996-07-25', 'Lampung', 'rahmeru@gmail.com', '088978090837', 'student', 'PT. Kereta Api Indonesia (Persero) Bandung', 'itbiz', 'rahmajidwi', 'rahmajidwi', 'rahmajidwi'),
('89:8F:90:88:Y0', 'Indha Ortha Paramitha', '$2y$10$9zl/OaSxUagbyqxXa1bx5evtTttVmWT4lVIHrvNtESGLl0ZMSDAN2', 'pria', '1990-06-20', 'Surabaya', 'iop@iop', '08876667748', 'startup', 'PT. INKA', 'graphdes', 'indhaorthap', 'indhaorthap', 'indhaorthap');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`nomor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `nomor` int(255) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
