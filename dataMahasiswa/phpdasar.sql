-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 10, 2023 at 06:24 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpdasar`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int NOT NULL,
  `nama` varchar(250) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `email` varchar(250) NOT NULL,
  `jurusan` varchar(250) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `nim`, `email`, `jurusan`, `gambar`) VALUES
(28, 'Ibrahim', 'D111911112', 'bekGansbeut@gmail.com', 'Teknik Informatika', 'bek.jpg'),
(29, 'Mahdani', 'D111911054', 'mahdanidani99@gmail.com', 'Teknik Informatika', 'dani.jpg'),
(30, 'opik', 'E123911005', 'opikapik@gmail.com', 'Teknik Komputer', 'opik.jpg'),
(31, 'Mahadin', 'E321988078', 'Mahadani11@gmail.com', 'Teknik Mesin', 'mahadin.jpg'),
(32, 'Steve', 'KS11911088', 'SteveKotak@gmail.com', 'Rekam Medis', 'steve.jpg'),
(33, 'Ragil Faiq Nauval', 'OL11911012', 'agilOp11@gmail.com', 'Teknik Otomasi', 'agil.jpg'),
(35, 'Richard Hendrik Sikumbang', 'D111911078', 'richardkumbang04@gmail.com', 'Teknik Informatika', 'richard.jpg'),
(50, 'cokil', 'D111911022', 'choklee11@gmail.com', 'Teknik Alat Berat', '5555086.jpg'),
(62, 'agus', 'D111911002', 'castaka123@gmail.com', 'Teknik Informatika', '656557e607d8c.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE `t_user` (
  `id` int NOT NULL,
  `user` varchar(100) NOT NULL,
  `pass` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`id`, `user`, `pass`) VALUES
(1, 'coki', '$2y$10$T2LMtdv0dTrcLdry.tz7P.ysZaQR4HedsjgkE0EMVNhrML2ThxrH6'),
(2, 'richard', '$2y$10$txP.ZG1gf9Nl2hwf2Qzqz.ClECRMJbzETg5UVD7B0hDMlhpEqr6p2'),
(3, 'cokiskinhead', '$2y$10$dEed7TR8AGD.iiC0E/XvVuxehYp.IE50BYD0SzKHGBbvFfzeBOWem'),
(4, 'cokli', '$2y$10$YPx3JPiQQWYL.0zGToKYwuylbmqY3dRj.zUtUG/VbI1ezqqSCwWDK'),
(5, 'coki123', '$2y$10$mOF7n1L940.UkKu3RhtjV.jt8Nzvz2chi8U2MLqd44O3J2ouYG9P6'),
(6, 'joni', '$2y$10$OAVRVHwFLesdHDdhPa5NfOwcM1K4ZKBVUUoMhkNPw3Ggbj5WQ77.e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
