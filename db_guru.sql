-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2024 at 01:40 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_guru`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` bigint(20) UNSIGNED NOT NULL,
  `nama_guru` varchar(50) NOT NULL,
  `jenis_kelamin_guru` varchar(15) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat_guru` varchar(255) NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `input_date` timestamp NOT NULL DEFAULT '2024-02-04 02:57:55',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `nama_guru`, `jenis_kelamin_guru`, `tanggal_lahir`, `alamat_guru`, `no_telepon`, `foto`, `input_date`, `created_at`, `updated_at`) VALUES
(1, 'Elliott Haley', 'Perempuan', '1979-06-24', '87990 Medhurst Well Apt. 973\nCorwinburgh, MN 22650-0190', '68', 'https://via.placeholder.com/200x200.png/00eedd?text=sequi', '2024-02-04 02:57:56', NULL, NULL),
(2, 'Meghan White III', 'Laki-laki', '2013-02-12', '35729 Jeremy Locks\nCorrinemouth, VA 65702', '58', 'https://via.placeholder.com/200x200.png/00ff00?text=eum', '2024-02-04 02:57:56', NULL, NULL),
(3, 'Ms. Janae Doyle', 'Perempuan', '2006-12-17', '644 Lorna Circles\nKuhicport, NV 03895-3711', '22', 'https://via.placeholder.com/200x200.png/00ccdd?text=non', '2024-02-04 02:57:56', NULL, NULL),
(4, 'Dr. Bethany Hyatt DVM', 'Perempuan', '2013-08-31', '994 Pierre Ranch\nWildermanville, NC 95909', '94', 'https://via.placeholder.com/200x200.png/0033aa?text=quam', '2024-02-04 02:57:56', NULL, NULL),
(5, 'Etha Rutherford', 'Laki-laki', '1973-05-31', '6435 Wellington Summit Apt. 049\nSouth Krystalport, WI 96671', '93', 'https://via.placeholder.com/200x200.png/0088dd?text=velit', '2024-02-04 02:57:56', NULL, NULL),
(6, 'Dr. Curtis DuBuque', 'Laki-laki', '1994-11-03', '7488 Bins Highway Apt. 942\nSouth Cadeside, KY 29796-3781', '60', 'https://via.placeholder.com/200x200.png/0066aa?text=cupiditate', '2024-02-04 02:57:56', NULL, NULL),
(7, 'Seamus Gerlach', 'Laki-laki', '1971-01-01', '357 Anderson Mountain Apt. 582\nMossieport, IL 99276-0132', '55', 'https://via.placeholder.com/200x200.png/0000dd?text=eos', '2024-02-04 02:57:56', NULL, NULL),
(8, 'Bartholome Mayert Jr.', 'Perempuan', '1994-04-23', '88206 Douglas Station\nLake Juliestad, WY 22558-7925', '96', 'https://via.placeholder.com/200x200.png/00dd66?text=officiis', '2024-02-04 02:57:56', NULL, NULL),
(9, 'Maxine Larson', 'Laki-laki', '2011-12-19', '57643 Pollich Ville Apt. 488\nReillytown, NV 92795', '25', 'https://via.placeholder.com/200x200.png/002255?text=voluptatem', '2024-02-04 02:57:56', NULL, NULL),
(10, 'Gussie Lakin', 'Perempuan', '2023-07-24', '634 Aidan Hills Suite 328\nEast Bulah, IN 84733', '88', 'https://via.placeholder.com/200x200.png/0000dd?text=corrupti', '2024-02-04 02:57:56', NULL, NULL),
(11, 'Nura', 'Laki-Laki', '2024-02-08', 'tesss', '90909', 'foto/65bf611a6d2ca.jpg', '2024-02-04 02:57:55', '2024-02-04 03:04:10', '2024-02-04 03:04:10');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_02_03_053342_guru', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
