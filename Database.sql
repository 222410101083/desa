-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 19, 2024 at 09:37 AM
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
-- Database: `pweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `aduan`
--

CREATE TABLE `aduan` (
  `id_aduan` int NOT NULL,
  `id_pengadu` int DEFAULT NULL,
  `judul` varchar(200) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggal` datetime DEFAULT CURRENT_TIMESTAMP,
  `kategori` enum('Infrastruktur','Kesehatan','Keamanan','Lainnya') NOT NULL,
  `nama_pengadu` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `aduan`
--

INSERT INTO `aduan` (`id_aduan`, `id_pengadu`, `judul`, `deskripsi`, `tanggal`, `kategori`, `nama_pengadu`) VALUES
(14, 158, 'Lomba Sepakbola', 'sadasdasd', '2024-05-19 16:29:14', 'Infrastruktur', 'Divo Tahta Imannulloh');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `city`) VALUES
(1, 'New York'),
(2, 'Los Angeles'),
(3, 'Chicago'),
(4, 'New York'),
(5, 'Los Angeles'),
(6, 'Chicago'),
(7, 'Houston'),
(8, 'Phoenix'),
(9, 'Philadelphia'),
(10, 'San Antonio'),
(11, 'San Diego'),
(12, 'Dallas'),
(13, 'San Jose'),
(14, 'Austin'),
(15, 'Jacksonville'),
(16, 'Fort Worth'),
(17, 'Columbus'),
(18, 'Charlotte'),
(19, 'Indianapolis'),
(20, 'San Francisco'),
(21, 'Seattle'),
(22, 'Denver'),
(23, 'Washington'),
(24, 'Boston'),
(25, 'El Paso'),
(26, 'Nashville'),
(27, 'Detroit'),
(28, 'Oklahoma City'),
(29, 'Portland'),
(30, 'Las Vegas'),
(31, 'Memphis'),
(32, 'Louisville'),
(33, 'Baltimore'),
(34, 'Milwaukee'),
(35, 'Albuquerque'),
(36, 'Tucson'),
(37, 'Fresno'),
(38, 'Sacramento'),
(39, 'Kansas City'),
(40, 'Long Beach'),
(41, 'Mesa'),
(42, 'Atlanta'),
(43, 'Colorado Springs'),
(44, 'Virginia Beach'),
(45, 'Raleigh'),
(46, 'Omaha'),
(47, 'Miami'),
(48, 'Oakland'),
(49, 'Minneapolis'),
(50, 'Tulsa'),
(51, 'Wichita'),
(52, 'New Orleans'),
(53, 'Arlington'),
(54, 'Cleveland'),
(55, 'Bakersfield'),
(56, 'Tampa'),
(57, 'Aurora'),
(58, 'Honolulu'),
(59, 'Anaheim'),
(60, 'Santa Ana'),
(61, 'Corpus Christi'),
(62, 'Riverside'),
(63, 'St. Louis'),
(64, 'Lexington'),
(65, 'Pittsburgh'),
(66, 'Stockton'),
(67, 'Anchorage'),
(68, 'Cincinnati'),
(69, 'St. Paul'),
(70, 'Toledo'),
(71, 'Greensboro'),
(72, 'Newark'),
(73, 'Plano'),
(74, 'Henderson'),
(75, 'Lincoln'),
(76, 'Orlando'),
(77, 'Jersey City'),
(78, 'Chula Vista'),
(79, 'Buffalo'),
(80, 'Fort Wayne'),
(81, 'Chandler'),
(82, 'St. Petersburg'),
(83, 'Laredo'),
(84, 'Durham'),
(85, 'Irvine'),
(86, 'Madison'),
(87, 'Norfolk'),
(88, 'Lubbock'),
(89, 'Gilbert'),
(90, 'Winston–Salem'),
(91, 'Glendale'),
(92, 'Reno'),
(93, 'Hialeah'),
(94, 'Garland'),
(95, 'Scottsdale'),
(96, 'Irving'),
(97, 'Chesapeake'),
(98, 'North Las Vegas'),
(99, 'Fremont'),
(100, 'Baton Rouge'),
(101, 'New York'),
(102, 'Los Angeles'),
(103, 'Chicago'),
(104, 'Houston'),
(105, 'Phoenix'),
(106, 'Philadelphia'),
(107, 'San Antonio'),
(108, 'San Diego'),
(109, 'Dallas'),
(110, 'San Jose'),
(111, 'Austin'),
(112, 'Jacksonville'),
(113, 'Fort Worth'),
(114, 'Columbus'),
(115, 'Charlotte'),
(116, 'Indianapolis'),
(117, 'San Francisco'),
(118, 'Seattle'),
(119, 'Denver'),
(120, 'Washington'),
(121, 'Boston'),
(122, 'El Paso'),
(123, 'Nashville'),
(124, 'Detroit'),
(125, 'Oklahoma City'),
(126, 'Portland'),
(127, 'Las Vegas'),
(128, 'Memphis'),
(129, 'Louisville'),
(130, 'Baltimore'),
(131, 'Milwaukee'),
(132, 'Albuquerque'),
(133, 'Tucson'),
(134, 'Fresno'),
(135, 'Sacramento'),
(136, 'Kansas City'),
(137, 'Long Beach'),
(138, 'Mesa'),
(139, 'Atlanta'),
(140, 'Colorado Springs'),
(141, 'Virginia Beach'),
(142, 'Raleigh'),
(143, 'Omaha'),
(144, 'Miami'),
(145, 'Oakland'),
(146, 'Minneapolis'),
(147, 'Tulsa'),
(148, 'Wichita'),
(149, 'New Orleans'),
(150, 'Arlington'),
(151, 'Cleveland'),
(152, 'Bakersfield'),
(153, 'Tampa'),
(154, 'Aurora'),
(155, 'Honolulu'),
(156, 'Anaheim'),
(157, 'Santa Ana'),
(158, 'Corpus Christi'),
(159, 'Riverside'),
(160, 'St. Louis'),
(161, 'Lexington'),
(162, 'Pittsburgh'),
(163, 'Stockton'),
(164, 'Anchorage'),
(165, 'Cincinnati'),
(166, 'St. Paul'),
(167, 'Toledo'),
(168, 'Greensboro'),
(169, 'Newark'),
(170, 'Plano'),
(171, 'Henderson'),
(172, 'Lincoln'),
(173, 'Orlando'),
(174, 'Jersey City'),
(175, 'Chula Vista'),
(176, 'Buffalo'),
(177, 'Fort Wayne'),
(178, 'Chandler'),
(179, 'St. Petersburg'),
(180, 'Laredo'),
(181, 'Durham'),
(182, 'Irvine'),
(183, 'Madison'),
(184, 'Norfolk'),
(185, 'Lubbock'),
(186, 'Gilbert'),
(187, 'Winston–Salem'),
(188, 'Glendale'),
(189, 'Reno'),
(190, 'Hialeah'),
(191, 'Garland'),
(192, 'Scottsdale'),
(193, 'Irving'),
(194, 'Chesapeake'),
(195, 'North Las Vegas'),
(196, 'Fremont'),
(197, 'Baton Rouge'),
(198, 'New York'),
(199, 'Los Angeles'),
(200, 'Chicago'),
(201, 'Houston'),
(202, 'Phoenix'),
(203, 'Philadelphia'),
(204, 'San Antonio'),
(205, 'San Diego'),
(206, 'Dallas'),
(207, 'San Jose'),
(208, 'Austin'),
(209, 'Jacksonville'),
(210, 'Fort Worth'),
(211, 'Columbus'),
(212, 'Charlotte'),
(213, 'Indianapolis'),
(214, 'San Francisco'),
(215, 'Seattle'),
(216, 'Denver'),
(217, 'Washington'),
(218, 'Boston'),
(219, 'El Paso'),
(220, 'Nashville'),
(221, 'Detroit'),
(222, 'Oklahoma City'),
(223, 'Portland'),
(224, 'Las Vegas'),
(225, 'Memphis'),
(226, 'Louisville'),
(227, 'Baltimore'),
(228, 'Milwaukee'),
(229, 'Albuquerque'),
(230, 'Tucson'),
(231, 'Fresno'),
(232, 'Sacramento'),
(233, 'Kansas City'),
(234, 'Long Beach'),
(235, 'Mesa'),
(236, 'Atlanta'),
(237, 'Colorado Springs'),
(238, 'Virginia Beach'),
(239, 'Raleigh'),
(240, 'Omaha'),
(241, 'Miami'),
(242, 'Oakland'),
(243, 'Minneapolis'),
(244, 'Tulsa'),
(245, 'Wichita'),
(246, 'New Orleans'),
(247, 'Arlington'),
(248, 'Cleveland'),
(249, 'Bakersfield'),
(250, 'Tampa'),
(251, 'Aurora'),
(252, 'Honolulu'),
(253, 'Anaheim'),
(254, 'Santa Ana'),
(255, 'Corpus Christi'),
(256, 'Riverside'),
(257, 'St. Louis'),
(258, 'Lexington'),
(259, 'Pittsburgh'),
(260, 'Stockton'),
(261, 'Anchorage'),
(262, 'Cincinnati'),
(263, 'St. Paul'),
(264, 'Toledo'),
(265, 'Greensboro'),
(266, 'Newark'),
(267, 'Plano'),
(268, 'Henderson'),
(269, 'Lincoln'),
(270, 'Orlando'),
(271, 'Jersey City'),
(272, 'Chula Vista'),
(273, 'Buffalo'),
(274, 'Fort Wayne'),
(275, 'Chandler'),
(276, 'St. Petersburg'),
(277, 'Laredo'),
(278, 'Durham'),
(279, 'Irvine'),
(280, 'Madison'),
(281, 'Norfolk'),
(282, 'Lubbock'),
(283, 'Gilbert'),
(284, 'Winston–Salem'),
(285, 'Glendale'),
(286, 'Reno'),
(287, 'Hialeah'),
(288, 'Garland'),
(289, 'Scottsdale'),
(290, 'Irving'),
(291, 'Chesapeake'),
(292, 'North Las Vegas'),
(293, 'Fremont'),
(294, 'Baton Rouge');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int NOT NULL,
  `phone_number` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `inserted_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `user_fk` int NOT NULL,
  `city_fk` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `phone_number`, `owner`, `inserted_at`, `updated_at`, `deleted_at`, `user_fk`, `city_fk`) VALUES
(185, '', 'Divo', '2024-05-17 18:58:43', NULL, '2024-05-17 19:31:05', 158, 2),
(186, '0812222102121', 'DIvoooo', '2024-05-17 19:31:14', NULL, NULL, 158, 3),
(187, '0812222102121', 'Divo Tahta Imannulloh', '2024-05-17 19:31:37', NULL, NULL, 158, 9);

-- --------------------------------------------------------

--
-- Table structure for table `masyarakat`
--

CREATE TABLE `masyarakat` (
  `user_id` int NOT NULL,
  `alamat` text NOT NULL,
  `foto_profil` blob
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pemerintah`
--

CREATE TABLE `pemerintah` (
  `user_id` int NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `foto_profil` blob
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `proposal`
--

CREATE TABLE `proposal` (
  `id_proposal` int NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text,
  `tanggal_pengajuan` datetime NOT NULL,
  `status` enum('Diajukan','Diproses','Ditolak','Disetujui') NOT NULL,
  `id_user` int DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `proposal`
--

INSERT INTO `proposal` (`id_proposal`, `judul`, `deskripsi`, `tanggal_pengajuan`, `status`, `id_user`, `file_path`) VALUES
(13, 'Lomba Sepakbola', 'dsada', '2024-05-19 00:12:16', 'Diajukan', 158, './src/file/70a88f926def23489d45a825b4ac65f1.pdf'),
(14, 'Ini Cara Desa Jatimulyo di Jember Maksimalkan RTH', 'asdsadasdasdsad', '2024-05-19 00:16:19', 'Diajukan', 158, './src/file/fe6e949a6cf33c068c58460a31992d6a.pdf'),
(15, 'sdaasd', 'fafasfasf', '2024-05-19 00:16:41', 'Diajukan', 158, './src/file/8e3b122798585cb44e01cd93c3a3aa0f.pdf'),
(16, 'Ini Cara Desa Jatimulyo di Jember Maksimalkan RTH', 'sadas', '2024-05-19 00:28:26', 'Diajukan', 163, './src/file/3b9fbef0b206d25dd09b331ebce46cc0.pdf'),
(17, 'DIvo Tahta', 'dasdasdas', '2024-05-19 08:36:01', 'Diajukan', 158, './src/file/6bd54a7ed6ae22e37fc59539a38e9821.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `inserted_at` datetime NOT NULL,
  `role` enum('admin','pemerintah','masyarakat','new_role') COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `inserted_at`, `role`) VALUES
(157, 'Divo Tahta Imannulloh', 'divo@gmail.com', '$2y$10$CBPKzlCCWYaftqO81MnpZ.eVTKYkRX80vtABakNyEKjZ8fBT2CvLi', '2024-05-17 17:45:53', 'admin'),
(158, 'Divo Tahta Imannulloh', 'divo1@gmail.com', '$2y$10$nUDE8ybCVid70aCZoPRrtOcbgoHrGnvLbCTWaXvaOxz/VHeyxVHZa', '2024-05-17 17:49:57', 'masyarakat'),
(159, 'Divo Tahta Imannulloh', 'divopemerintah@gmail.com', '$2y$10$dNYHZzP6cY/lrgzuM8pkyuAP4RV./nURMkl6SZazAppkGqg25kWsu', '2024-05-17 18:18:45', 'pemerintah'),
(160, 'Divo Tahta Imannulloh', 'divo2@gmail.com', '$2y$10$GSP0uZE5CMX//VHjjKv7h./Tb3Hn1G33LnFo9Neb5eq7vcAYwduOu', '2024-05-17 19:01:19', 'pemerintah'),
(161, 'Divo Tahta Imannulloh', 'masyarakat@gmail.com', '$2y$10$KTCzSnfMpe87eDOkciSPd.twwPrJeTquAt.tLqYvHV4PADLT56evq', '2024-05-18 06:57:12', 'masyarakat'),
(162, 'Divo Tahta Imannulloh', 'alansuroso2003@gmail.com', '$2y$10$e9vFw01EUC1.FYtaJaAzdeYOlP2GxN0yDVLHw10NAV850blkonqZG', '2024-05-18 22:30:11', 'pemerintah'),
(163, 'Divo Tahta Imannulloh', 'divo3@gmail.com', '$2y$10$k/h.XhjQThEQZqWsEYXQvurl79sgYjoXoWMyPJgjzO.DzlCA1Z6Xm', '2024-05-19 00:26:22', 'masyarakat'),
(164, 'Divo Tahta Imannulloh', 'divomasyarakat@gmail.com', '$2y$10$3IFemaWd.m8AeT3BriesD.gWjfVz2cVlo8EYagJQv4IZ3JR4Zb6Eu', '2024-05-19 08:48:04', 'masyarakat');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aduan`
--
ALTER TABLE `aduan`
  ADD PRIMARY KEY (`id_aduan`),
  ADD KEY `id_pengadu` (`id_pengadu`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_fk` (`user_fk`),
  ADD KEY `city_fk` (`city_fk`);

--
-- Indexes for table `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `pemerintah`
--
ALTER TABLE `pemerintah`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `proposal`
--
ALTER TABLE `proposal`
  ADD PRIMARY KEY (`id_proposal`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aduan`
--
ALTER TABLE `aduan`
  MODIFY `id_aduan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=295;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;

--
-- AUTO_INCREMENT for table `proposal`
--
ALTER TABLE `proposal`
  MODIFY `id_proposal` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aduan`
--
ALTER TABLE `aduan`
  ADD CONSTRAINT `aduan_ibfk_1` FOREIGN KEY (`id_pengadu`) REFERENCES `users` (`id`);

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_ibfk_1` FOREIGN KEY (`user_fk`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `contacts_ibfk_2` FOREIGN KEY (`city_fk`) REFERENCES `cities` (`id`);

--
-- Constraints for table `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD CONSTRAINT `masyarakat_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pemerintah`
--
ALTER TABLE `pemerintah`
  ADD CONSTRAINT `pemerintah_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `proposal`
--
ALTER TABLE `proposal`
  ADD CONSTRAINT `proposal_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
