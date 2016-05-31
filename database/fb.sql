-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2016 at 08:51 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 7.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fb`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_04_30_054203_create_province_table', 1),
('2016_04_29_022513_create_song_table', 2),
('2016_04_29_022753_create_playlist_table', 2),
('2016_04_30_062152_create_playlist_content_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `playlists`
--

CREATE TABLE `playlists` (
  `id_playlist` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `name_playlist` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `playlists`
--

INSERT INTO `playlists` (`id_playlist`, `id_user`, `name_playlist`, `created_at`, `updated_at`) VALUES
(1, 1, 'My Favourite', NULL, NULL),
(2, 3, 'Zuhdi''s Playlist', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `playlist_contents`
--

CREATE TABLE `playlist_contents` (
  `id_playlist_content` int(10) UNSIGNED NOT NULL,
  `id_playlist` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `id_song` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `playlist_contents`
--

INSERT INTO `playlist_contents` (`id_playlist_content`, `id_playlist`, `id_song`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id_province` int(10) UNSIGNED NOT NULL,
  `name_province` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id_province`, `name_province`, `created_at`, `updated_at`) VALUES
(1, 'Jawa Tengah', NULL, NULL),
(2, 'Papua', NULL, NULL),
(3, 'Kalimantan Barat', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE `songs` (
  `id_song` int(10) UNSIGNED NOT NULL,
  `id_province` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `title_song` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `artist` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `album` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `year` int(11) NOT NULL,
  `genre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `information` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `track_number` int(11) NOT NULL,
  `path_song` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path_cover` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`id_song`, `id_province`, `title_song`, `artist`, `album`, `year`, `genre`, `information`, `track_number`, `path_song`, `path_cover`, `created_at`, `updated_at`) VALUES
(1, 1, 'Gundul Gundul Pacul', 'Unknown', 'Lagu Daerah Jawa Tngah', 0, 'Lagu Anak', 'Tembang Jawa ini diciptakan tahun 1400an oleh Sunan Kalijaga dan teman-temannya yang masih remaja dan mempunyai arti filosofis yg dalam dan sangat mulia.', 1, '', '', NULL, NULL),
(2, 1, 'Lir Ilir', 'Unknown', 'Lagu Daerah Jawa Tengah', 0, 'Lagu Daerah', 'Dalam syair tembang dolanan yang berjudul Ilir-ilir mengandung makna religius (keagamaan). Sedangkan maksud yang terkandung dalam tembang tersebut adalah kita sebagai umat manusia diminta bangun dari keterpurukan untuk lebih mempertebal iman', 2, '', '', NULL, NULL),
(3, 2, 'Apuse', 'Unknown', 'Lagu Daerah Papua', 0, 'Lagu Daerah', 'Menceritakan seorang cucu yang berpamitan ke kakek/neneknya bahwa ia akan ke negeri seberang lewat Teluk Doreri. Cucu tersebut merasa sedih dan melambai-lambaikan saputangannya ke kakek neneknya. Kakek-nenek juga merasa sedih karena ditinggal oleh cucunya', 1, '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path_picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `email`, `password`, `path_picture`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'misbach', 'misbach@fb.com', '5f4dcc3b5aa765d61d8327deb882cf99', '', NULL, NULL, NULL),
(2, 'imaduddin', 'imaduddin@fb.com', '5f4dcc3b5aa765d61d8327deb882cf99', '', NULL, NULL, NULL),
(3, 'zuhdi', 'zuhdi@fb.com', '5f4dcc3b5aa765d61d8327deb882cf99', '', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `playlists`
--
ALTER TABLE `playlists`
  ADD PRIMARY KEY (`id_playlist`),
  ADD KEY `playlists_id_user_foreign` (`id_user`);

--
-- Indexes for table `playlist_contents`
--
ALTER TABLE `playlist_contents`
  ADD PRIMARY KEY (`id_playlist_content`),
  ADD KEY `playlist_contents_id_playlist_foreign` (`id_playlist`),
  ADD KEY `playlist_contents_id_song_foreign` (`id_song`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id_province`);

--
-- Indexes for table `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`id_song`),
  ADD KEY `songs_id_province_foreign` (`id_province`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `playlists`
--
ALTER TABLE `playlists`
  MODIFY `id_playlist` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `playlist_contents`
--
ALTER TABLE `playlist_contents`
  MODIFY `id_playlist_content` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id_province` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `songs`
--
ALTER TABLE `songs`
  MODIFY `id_song` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `playlists`
--
ALTER TABLE `playlists`
  ADD CONSTRAINT `playlists_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `playlist_contents`
--
ALTER TABLE `playlist_contents`
  ADD CONSTRAINT `playlist_contents_id_playlist_foreign` FOREIGN KEY (`id_playlist`) REFERENCES `playlists` (`id_playlist`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `playlist_contents_id_song_foreign` FOREIGN KEY (`id_song`) REFERENCES `songs` (`id_song`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `songs`
--
ALTER TABLE `songs`
  ADD CONSTRAINT `songs_id_province_foreign` FOREIGN KEY (`id_province`) REFERENCES `provinces` (`id_province`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
