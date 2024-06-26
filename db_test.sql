-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2024 at 06:42 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `premium`
--

CREATE TABLE `premium` (
  `id` int(100) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `premium`
--

INSERT INTO `premium` (`id`, `judul`, `foto`) VALUES
(1, 'Tipe MBTI ISTJ Introversion, Sensing, Thinking, Judging', 'css/img/ISTJ.jpeg'),
(2, 'Tipe MBTI ISFJ Introversion, Sensing, Feeling, Judging', 'css/img/ISFJ.jpeg'),
(3, 'Tipe MBTI INFJ Introversion, Intuition, Feeling, Judging', 'css/img/INFJ.jpeg'),
(4, 'Tipe MBTI INTJ Introversion, Intuition, Thinking, Judging', 'css/img/INTJ.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `mbti_result` varchar(10) DEFAULT NULL,
  `mbti_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `username`, `email`, `role`, `PASSWORD`, `created_at`, `mbti_result`, `mbti_description`) VALUES
(16, 'wildan', 'wildan@gmail.com', 'Perempuan', 'wildanlagi', '2024-06-26 02:01:59', NULL, NULL),
(18, 'nisa', 'nisa@gmail.com', 'Perempuan', 'nisa123', '2024-06-26 02:14:33', NULL, NULL),
(19, 'rere', 'rere@gmail.com', 'Perempuan', 'rere123', '2024-06-26 02:31:19', NULL, NULL),
(24, 'nisa', 'nurulnisa919@gmail.com', 'Perempuan', '1234568', '2024-06-26 04:35:36', NULL, NULL),
(25, 'sasa', 'sasa@gmail.com', 'Laki-laki', 'sasa', '2024-06-26 04:36:53', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ulasan`
--

CREATE TABLE `ulasan` (
  `id` int(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `komentar` varchar(255) NOT NULL,
  `profile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ulasan`
--

INSERT INTO `ulasan` (`id`, `username`, `komentar`, `profile`) VALUES
(1, '# Mhicela sorchi', 'Tes MBTI membantu individu memahami preferensi mereka dalam cara berpikir, merasakan, dan berinteraksi dengan dunia. Ini dapat memberikan wawasan tentang kekuatan dan kelemahan pribadi, serta cara-cara untuk memaksimalkan potensi diri.', 'css/img/profile0.jpeg'),
(2, '# Evelyn hester', 'Dengan memahami tipe kepribadian diri sendiri dan orang lain, seseorang dapat meningkatkan keterampilan komunikasi dan memahami cara terbaik untuk berinteraksi dengan orang lain. Ini dapat memperbaiki hubungan pribadi maupun profesional.', 'css/img/profile1.jpeg'),
(3, '# Olivia amelia', 'Mengetahui preferensi kepribadian dapat membantu individu mengidentifikasi strategi untuk mengatasi stres, meningkatkan keseimbangan antara pekerjaan dan kehidupan pribadi, serta mencapai kesejahteraan emosional.\r\n\r\n', 'css/img/profile2.jpeg'),
(22, 'Wildan An Millah Mahsyar', 'wildanmemang ganteng', 'css/img/profile2.jpeg'),
(23, 'ippang ippang', 'haiii', 'css/img/profile1.jpeg'),
(24, 'ippang ippang', 'WILDAN AJHA', 'css/img/profile1.jpeg'),
(25, 'ippang ippang', 'gguguhuhuk', 'css/img/profile1.jpeg'),
(26, 'ippang ippang', 'sjndaskjdsid', 'css/img/profile1.jpeg'),
(27, 'n ', '', 'css/img/profile2.jpeg'),
(28, 'nisa nurul', 'as\r\n', 'css/img/profile1.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `premium`
--
ALTER TABLE `premium`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `premium`
--
ALTER TABLE `premium`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `ulasan`
--
ALTER TABLE `ulasan`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
