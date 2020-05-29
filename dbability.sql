-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2020 at 02:49 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbability`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`) VALUES
(1, 'Rumah Sakit'),
(2, 'Gedung'),
(3, 'Jalan Umum'),
(4, 'Tempat Rekreasi');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posting`
--

CREATE TABLE `posting` (
  `id` int(11) NOT NULL,
  `namaTempat` varchar(80) NOT NULL,
  `ftempat` varchar(45) DEFAULT NULL,
  `latitude` varchar(45) NOT NULL,
  `longitude` varchar(45) NOT NULL,
  `tumbs` int(11) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `kategori_id` int(11) DEFAULT NULL,
  `users_id` bigint(20) NOT NULL,
  `fparkir` varchar(45) DEFAULT NULL,
  `kparkir` varchar(120) DEFAULT NULL,
  `fgb` varchar(45) DEFAULT NULL,
  `kgb` varchar(120) DEFAULT NULL,
  `fpj` varchar(45) DEFAULT NULL,
  `kpj` varchar(120) DEFAULT NULL,
  `fbm` varchar(45) DEFAULT NULL,
  `kbm` varchar(120) DEFAULT NULL,
  `fpintu` varchar(45) DEFAULT NULL,
  `kpintu` varchar(120) DEFAULT NULL,
  `frt` varchar(45) DEFAULT NULL,
  `krt` varchar(120) DEFAULT NULL,
  `flift` varchar(45) DEFAULT NULL,
  `klift` varchar(120) DEFAULT NULL,
  `ftoilet` varchar(45) DEFAULT NULL,
  `ktoilet` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posting`
--

INSERT INTO `posting` (`id`, `namaTempat`, `ftempat`, `latitude`, `longitude`, `tumbs`, `status`, `kategori_id`, `users_id`, `fparkir`, `kparkir`, `fgb`, `kgb`, `fpj`, `kpj`, `fbm`, `kbm`, `fpintu`, `kpintu`, `frt`, `krt`, `flift`, `klift`, `ftoilet`, `ktoilet`) VALUES
(11, 'Pasar Lio', '-6.2011473.jpeg', '-6.2011473', '106.9068593', 0, 'aktif', 3, 14, '', NULL, '', NULL, '', NULL, '', 'terdapat bidang miring menuju pasar', '', NULL, '', NULL, '', NULL, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telp` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('aktif','nonaktif') COLLATE utf8mb4_unicode_ci DEFAULT 'aktif',
  `role` enum('admin','staff','member') COLLATE utf8mb4_unicode_ci DEFAULT 'member',
  `foto` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `alamat`, `telp`, `status`, `role`, `foto`, `remember_token`, `created_at`, `updated_at`) VALUES
(14, 'Fadhil', 'fadhil@gmail.com', NULL, '$2y$10$ONvHshUz8eNfpUza51fbMuVd/xT6imaF6vp9iX.gX0rfe8lBnDxde', 'kampung lio', '0858924556', 'aktif', 'admin', '.png', NULL, NULL, NULL),
(16, 'sony', 'sony@gmail.com', NULL, '$2y$10$2iJ5f3LtC3HFwZYBnRzpmul/WtV2baEt6fsJ4RfZQ3XN/mPc5rqp2', 'solo', '0988776655', 'aktif', 'staff', 'sony.jpeg', NULL, NULL, NULL),
(17, 'peby', 'peby@gmail.com', NULL, '$2y$10$s5ORXbUUWeVpq0eNannmb.1cehFWwRvKtbg6/rqzlaYcPivG8NCHK', 'penjaringan', '085443211', 'aktif', 'member', 'peby.jpeg', NULL, '2020-05-06 04:32:11', '2020-05-06 04:32:11'),
(18, 'tomy', 'tomy@gmail.com', NULL, '$2y$10$hfmVN90qHgpxBbzPCKNiOeVsWiwRlRuTPFCyhbDOvPX5nnvraoACi', 'kemayoran', '0856887788', 'aktif', 'member', 'tomy.jpeg', NULL, '2020-05-06 04:33:08', '2020-05-06 04:33:08'),
(23, 'anisya', 'anisya@gmail.com', NULL, '$2y$10$gFUUHyH5GfL0DkzUF8ibKuksnHa36XWEQa.ycXR1yu.Lh4TfvdGte', 'Bogor', '082223333', 'aktif', 'admin', 'anisya.jpeg', NULL, NULL, NULL),
(24, 'ema', 'ema@gmail.com', NULL, '$2y$10$ovqWSuNune/wkkC28S8Iq.T8Y9ObF2dLyz7F0yLqrMfhX.YcqXVcq', 'Tanggerang', '08776655444', 'aktif', 'admin', 'ema.jpeg', NULL, NULL, NULL),
(34, 'tatang', 'tatang@gmail.com', NULL, '$2y$10$PhtB3E.6V7FikuG1hMOBcOhL3QrQoPSzCTfCrH6FVTD83LxXfs/rO', 'bandung', '0987654', 'aktif', 'member', 'tatang.png', NULL, '2020-05-20 21:00:34', '2020-05-20 21:00:34'),
(35, 'roma', 'roma@gmail.com', NULL, '$2y$10$6U/dAZoKtv/c1hD4Fbw/cu.hMkmbgrNGta4t51Z8tFoUUo1I7iyAu', 'duren sawit', '0678988', 'aktif', 'member', 'roma.png', NULL, '2020-05-20 21:02:18', '2020-05-20 21:02:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `posting`
--
ALTER TABLE `posting`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_posting_kategori1_idx` (`kategori_id`),
  ADD KEY `fk_posting_users1_idx` (`users_id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posting`
--
ALTER TABLE `posting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posting`
--
ALTER TABLE `posting`
  ADD CONSTRAINT `fk_posting_kategori1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `posting_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
