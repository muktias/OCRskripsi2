-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2019 at 08:07 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kp3`
--

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` int(11) DEFAULT NULL,
  `namaBank` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rekening` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cabang` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `atasNama` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `namaBank`, `rekening`, `cabang`, `atasNama`, `created_at`, `updated_at`) VALUES
(2, 'sini', '12345678901234', 'sini', 'sini', '2019-04-07 00:25:51', '2019-04-07 00:28:58');

-- --------------------------------------------------------

--
-- Table structure for table `bank_masters`
--

CREATE TABLE `bank_masters` (
  `id` int(10) UNSIGNED NOT NULL,
  `namaBank` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rekening` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `atasNama` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bio_users`
--

CREATE TABLE `bio_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `namaBio` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `tempat_lahir` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provinsi` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kota` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode_pos` int(11) DEFAULT NULL,
  `warga_negara` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agama` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_perkawinan` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pekerjaan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sumberDana` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ktp` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `noKtp` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `npwp` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `noNpwp` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `confirm_invests`
--

CREATE TABLE `confirm_invests` (
  `idConfirm` int(10) UNSIGNED NOT NULL,
  `idList` int(10) UNSIGNED DEFAULT NULL,
  `namaRek` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `namaBank` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rekening` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buktiTransfer` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `finished_invests`
--

CREATE TABLE `finished_invests` (
  `idList` int(10) UNSIGNED NOT NULL,
  `idUser` int(10) UNSIGNED NOT NULL,
  `idInvestment` int(10) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `hasil` int(11) NOT NULL,
  `statusTransfer` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `investments`
--

CREATE TABLE `investments` (
  `id` int(10) UNSIGNED NOT NULL,
  `investPic` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `kontrak` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `terjual` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invest_lists`
--

CREATE TABLE `invest_lists` (
  `idList` int(10) UNSIGNED NOT NULL,
  `idUser` int(10) UNSIGNED DEFAULT NULL,
  `idInvestment` int(10) UNSIGNED DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `hasil` int(11) DEFAULT NULL,
  `statusList` tinyint(1) DEFAULT NULL,
  `statusInput` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_12_29_044349_create_bio_users_table', 1),
(4, '2019_01_12_075045_create_investments_table', 1),
(5, '2019_01_18_041835_create_banks_table', 1),
(6, '2019_01_21_044616_create_galleries_table', 1),
(7, '2019_01_23_041859_add_ijin_status_columns_to_users_table', 1),
(8, '2019_01_24_024120_create_bank_masters_table', 1),
(9, '2019_01_24_045439_create_invest_lists_table', 1),
(10, '2019_01_29_123154_create_confirm_invests_table', 1),
(11, '2019_02_21_024131_create_finished_invests_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `profilePic` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isAdmin` int(11) DEFAULT NULL,
  `provider` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ijinStatus` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `profilePic`, `user_name`, `email`, `email_verified_at`, `password`, `isAdmin`, `provider`, `provider_id`, `remember_token`, `created_at`, `updated_at`, `ijinStatus`) VALUES
(3, NULL, 'masbro', 'muktiadhy@gmail.com', '2019-04-07 07:27:25', '$2y$10$kMdvr/soHbzDh9EfxwgY5.KuPSShlIzLHUJiT9axS7kUu7aIj4k/u', NULL, NULL, NULL, '2hv1jZnbEymsyT4MaDy9jadOF60gxnKHJ5ZOuu5MwOQnOXKpUD1aT2hn4xhv', '2019-04-07 07:24:30', '2019-04-07 07:27:25', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank_masters`
--
ALTER TABLE `bank_masters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bio_users`
--
ALTER TABLE `bio_users`
  ADD KEY `fiduser3` (`id`);

--
-- Indexes for table `confirm_invests`
--
ALTER TABLE `confirm_invests`
  ADD PRIMARY KEY (`idConfirm`),
  ADD KEY `fidlist2` (`idList`);

--
-- Indexes for table `finished_invests`
--
ALTER TABLE `finished_invests`
  ADD KEY `fidlist` (`idList`),
  ADD KEY `fiduser2` (`idUser`),
  ADD KEY `fidinvest2` (`idInvestment`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `investments`
--
ALTER TABLE `investments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invest_lists`
--
ALTER TABLE `invest_lists`
  ADD PRIMARY KEY (`idList`),
  ADD KEY `fiduser` (`idUser`),
  ADD KEY `fidinvest` (`idInvestment`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank_masters`
--
ALTER TABLE `bank_masters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `confirm_invests`
--
ALTER TABLE `confirm_invests`
  MODIFY `idConfirm` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `investments`
--
ALTER TABLE `investments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invest_lists`
--
ALTER TABLE `invest_lists`
  MODIFY `idList` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bio_users`
--
ALTER TABLE `bio_users`
  ADD CONSTRAINT `fiduser3` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Constraints for table `confirm_invests`
--
ALTER TABLE `confirm_invests`
  ADD CONSTRAINT `fidlist2` FOREIGN KEY (`idList`) REFERENCES `invest_lists` (`idList`);

--
-- Constraints for table `finished_invests`
--
ALTER TABLE `finished_invests`
  ADD CONSTRAINT `fidinvest2` FOREIGN KEY (`idInvestment`) REFERENCES `investments` (`id`),
  ADD CONSTRAINT `fidlist` FOREIGN KEY (`idList`) REFERENCES `invest_lists` (`idList`),
  ADD CONSTRAINT `fiduser2` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`);

--
-- Constraints for table `invest_lists`
--
ALTER TABLE `invest_lists`
  ADD CONSTRAINT `fidinvest` FOREIGN KEY (`idInvestment`) REFERENCES `investments` (`id`),
  ADD CONSTRAINT `fiduser` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
