-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Feb 2020 pada 10.18
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `surat46`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `46_ci_sessions`
--

CREATE TABLE `46_ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `46_ci_sessions`
--

INSERT INTO `46_ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('2gb9jipv46g7i9irblg5r2dc0ng5diqt', '::1', 1581325912, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538313332353930353b5f5f4143544956455f53455353494f4e5f444154417c733a3235363a2238326233373037363038313363663538303531646435613465363066353432363039383563373833373533393663323236316233303532376635306665386338303339333462653032336135386332323135666361336530323234663362356230356562376532366237313233393334353166396166646233663766383962664865386b714e46656e7554304c5a4b7a706d764f7055664e7a744b416e65344d7130784577374454666d6f42533553494c6259703752686e596369304463777748505533326f67535378387a3337304532516764476832627179432f77587457675868706b4479767436526d684232754757344c572b6a6535554130736b614a223b);

-- --------------------------------------------------------

--
-- Struktur dari tabel `46_classifications`
--

CREATE TABLE `46_classifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(32) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `46_classifications`
--

INSERT INTO `46_classifications` (`id`, `code`, `name`, `description`) VALUES
(1, 'RK.01', 'Rektorat', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `46_dispositions`
--

CREATE TABLE `46_dispositions` (
  `id` int(10) UNSIGNED NOT NULL,
  `to` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `characteristic` int(10) UNSIGNED DEFAULT NULL,
  `date_limit` date NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `46_dispositions`
--

INSERT INTO `46_dispositions` (`id`, `to`, `content`, `characteristic`, `date_limit`, `note`, `created_at`, `updated_at`) VALUES
(1, 'Dekanat', 'Peminjaman alat untuk musang', 1, '2020-02-08', '', '2020-02-07 07:02:36', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `46_dispositions_mail`
--

CREATE TABLE `46_dispositions_mail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `disposition_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `mail_id` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `46_dispositions_mail`
--

INSERT INTO `46_dispositions_mail` (`id`, `disposition_id`, `mail_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `46_files`
--

CREATE TABLE `46_files` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `collection_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `46_files`
--

INSERT INTO `46_files` (`id`, `name`, `collection_name`, `file_name`, `mime_type`, `size`, `created_at`, `updated_at`) VALUES
(1, 'mostaneer1', 'logo_kop_surat_2', 'mostaneer1.png', 'image/png', 639, '2020-02-10 04:53:45', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `46_incoming_mail`
--

CREATE TABLE `46_incoming_mail` (
  `id` int(10) UNSIGNED NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `classification_code` int(10) UNSIGNED DEFAULT NULL,
  `agenda_number` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_index` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resume` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `accepted_date` date NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_id` int(10) UNSIGNED,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `46_incoming_mail`
--

INSERT INTO `46_incoming_mail` (`id`, `subject`, `classification_code`, `agenda_number`, `file_index`, `resume`, `from`, `number`, `date`, `accepted_date`, `description`, `file_id`, `created_at`, `updated_at`) VALUES
(1, 'Peminjaman Peralatan', 1, '0001', '1', '', 'PANITIA PELAKSANA PENDIDIKAN DAN PELATIHAN DASAR XXIV', '001/MUSANG/KSR-PMI/2019', '2020-02-18', '2020-02-07', '', NULL, '2020-02-07 07:01:48', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `46_outbox`
--

CREATE TABLE `46_outbox` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `note` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agenda_number` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resume` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `classification_code` int(10) UNSIGNED DEFAULT NULL,
  `file_id` int(10) UNSIGNED DEFAULT NULL,
  `out_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `46_outbox`
--

INSERT INTO `46_outbox` (`id`, `subject`, `to`, `number`, `date`, `note`, `agenda_number`, `resume`, `classification_code`, `file_id`, `out_date`, `created_at`, `updated_at`) VALUES
(1, 'Surat Peminjaman', 'Kassubag Rumah Tangga', '0.0.1/S.I/PanPel/Muker/Mostaneer/FT/UNIB/XII/2019', '0000-00-00', NULL, '0001', NULL, 1, NULL, '0000-00-00', '2020-02-10 03:43:03', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `46_settings`
--

CREATE TABLE `46_settings` (
  `id` int(10) NOT NULL,
  `key` varchar(32) NOT NULL,
  `content` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `46_settings`
--

INSERT INTO `46_settings` (`id`, `key`, `content`) VALUES
(1, 'site_name', 'Mostaneer 2020'),
(2, 'current_theme_name', 'adminlte'),
(3, 'site_logo', 'logo.jpg'),
(4, 'max_mail_file_size', '2048'),
(5, 'allowed_types', 'doc|docx|pdf|jpg|png'),
(6, 'kop_1', 'KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN'),
(7, 'kop_2', 'UNIVERSITAS BENGKULU'),
(8, 'kop_3', 'FAKULTAS TEKNIK'),
(9, 'kop_alamat', 'Sekretariat : Aula Lab Terpadu FT UNIB Jl. Wr. Supratman Kandang Limun Bengkulu'),
(10, 'current_version', '1.0.0'),
(11, 'kop_logo_1', 'logo_unib1.png'),
(12, 'kop_logo_2', 'mostaneer1.png'),
(13, 'chairman_text', 'Ketua Umum Mostaneer'),
(14, 'chairman_name', 'Arsyi Arif Agami'),
(15, 'chairman_add', 'G1A018035'),
(16, 'kop_5', ''),
(17, 'kop_4', 'UKM MOESLEM STATION OF ENGINEERING (MOSTANEER)'),
(18, 'default_first_kop_image', 'logo_unib.png'),
(19, 'default_second_kop_image', 'mostaneer.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `46_site_meta`
--

CREATE TABLE `46_site_meta` (
  `id` int(10) UNSIGNED NOT NULL,
  `meta_group` varchar(255) NOT NULL,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `46_site_meta`
--

INSERT INTO `46_site_meta` (`id`, `meta_group`, `meta_key`, `meta_content`) VALUES
(1, 'disposition_characteristic', NULL, 'Biasa'),
(2, 'disposition_characteristic', NULL, 'Segera'),
(3, 'disposition_characteristic', NULL, 'Perhatikan Batas Waktu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `46_users`
--

CREATE TABLE `46_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(32) DEFAULT NULL,
  `name` varchar(32) DEFAULT NULL,
  `profile_picture` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `46_users`
--

INSERT INTO `46_users` (`id`, `username`, `password`, `email`, `name`, `profile_picture`) VALUES
(1, 'admin', '$2y$10$i9kaPSEhJwSaqtmRxc67Aen.F01BB.iv4J9BNH9rqxNnPjUV0QnR6', 'mostaneer.ft.unib@gmail.com', 'Mostaneer', 'mostaneer11.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `46_ci_sessions`
--
ALTER TABLE `46_ci_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indeks untuk tabel `46_classifications`
--
ALTER TABLE `46_classifications`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `46_dispositions`
--
ALTER TABLE `46_dispositions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `characteristic` (`characteristic`);

--
-- Indeks untuk tabel `46_dispositions_mail`
--
ALTER TABLE `46_dispositions_mail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inbox_id` (`mail_id`),
  ADD KEY `disposition_id` (`disposition_id`);

--
-- Indeks untuk tabel `46_files`
--
ALTER TABLE `46_files`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `46_incoming_mail`
--
ALTER TABLE `46_incoming_mail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `incoming_mail_classification_code_index` (`classification_code`),
  ADD KEY `file_id` (`file_id`);

--
-- Indeks untuk tabel `46_outbox`
--
ALTER TABLE `46_outbox`
  ADD PRIMARY KEY (`id`),
  ADD KEY `outbox_mail_classification_code_index` (`classification_code`),
  ADD KEY `outbox_mail_file_id_index` (`file_id`);

--
-- Indeks untuk tabel `46_settings`
--
ALTER TABLE `46_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `46_site_meta`
--
ALTER TABLE `46_site_meta`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `46_users`
--
ALTER TABLE `46_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profile_picture` (`profile_picture`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `46_classifications`
--
ALTER TABLE `46_classifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `46_dispositions`
--
ALTER TABLE `46_dispositions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `46_dispositions_mail`
--
ALTER TABLE `46_dispositions_mail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `46_files`
--
ALTER TABLE `46_files`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `46_incoming_mail`
--
ALTER TABLE `46_incoming_mail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `46_outbox`
--
ALTER TABLE `46_outbox`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `46_settings`
--
ALTER TABLE `46_settings`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `46_site_meta`
--
ALTER TABLE `46_site_meta`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `46_users`
--
ALTER TABLE `46_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `46_dispositions`
--
ALTER TABLE `46_dispositions`
  ADD CONSTRAINT `46_dispositions_ibfk_1` FOREIGN KEY (`characteristic`) REFERENCES `46_site_meta` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `46_dispositions_mail`
--
ALTER TABLE `46_dispositions_mail`
  ADD CONSTRAINT `FK__46_dispositions` FOREIGN KEY (`disposition_id`) REFERENCES `46_dispositions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `46_incoming_mail`
--
ALTER TABLE `46_incoming_mail`
  ADD CONSTRAINT `46_incoming_mail_ibfk_1` FOREIGN KEY (`classification_code`) REFERENCES `46_classifications` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `incoming_mail_file_id_foreign` FOREIGN KEY (`file_id`) REFERENCES `46_files` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `46_outbox`
--
ALTER TABLE `46_outbox`
  ADD CONSTRAINT `46_outbox_ibfk_1` FOREIGN KEY (`file_id`) REFERENCES `46_files` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `46_outbox_ibfk_2` FOREIGN KEY (`classification_code`) REFERENCES `46_classifications` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_46_outbox_46_classifications` FOREIGN KEY (`classification_code`) REFERENCES `46_classifications` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
