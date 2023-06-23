-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Jun 2023 pada 05.16
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_profil`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `administrasis`
--

CREATE TABLE `administrasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_lamaran` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `kelengkapan` int(11) NOT NULL,
  `kerapihan` int(11) NOT NULL,
  `nilai_ijazah` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `administrasis`
--

INSERT INTO `administrasis` (`id`, `id_lamaran`, `id_user`, `kelengkapan`, `kerapihan`, `nilai_ijazah`, `total`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 78, 89, 78, 156, '2023-06-22 00:50:03', '2023-06-22 00:50:03'),
(2, 1, 2, 22, 241, 23, 45, '2023-06-22 00:54:23', '2023-06-22 00:54:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `jadwal_keterampilans`
--

CREATE TABLE `jadwal_keterampilans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_lamaran` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `tanggal_tes` date NOT NULL,
  `jam` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jadwal_keterampilans`
--

INSERT INTO `jadwal_keterampilans` (`id`, `id_lamaran`, `id_user`, `tanggal_tes`, `jam`, `lokasi`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2023-06-28', '09:00 WIB', 'Kantor Utama', '2023-06-22 04:53:03', '2023-06-22 04:53:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_wawancaras`
--

CREATE TABLE `jadwal_wawancaras` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_lamaran` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `tanggal_tes` date NOT NULL,
  `jam` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jadwal_wawancaras`
--

INSERT INTO `jadwal_wawancaras` (`id`, `id_lamaran`, `id_user`, `tanggal_tes`, `jam`, `lokasi`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2023-06-28', '09:00 WIB', 'Kantor Utama', '2023-06-22 19:54:22', '2023-06-22 19:54:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keterampilans`
--

CREATE TABLE `keterampilans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_lamaran` bigint(20) UNSIGNED NOT NULL,
  `id_jadwalKeterampilan` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `psikotes` int(11) NOT NULL,
  `ketangkasan` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `keterampilans`
--

INSERT INTO `keterampilans` (`id`, `id_lamaran`, `id_jadwalKeterampilan`, `id_user`, `psikotes`, `ketangkasan`, `total`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, 34, 56, 90, '2023-06-22 05:39:18', '2023-06-22 05:39:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lamarans`
--

CREATE TABLE `lamarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_lowongan` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `tanggal_lamaran` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `catatan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `lamarans`
--

INSERT INTO `lamarans` (`id`, `id_lowongan`, `id_user`, `tanggal_lamaran`, `status`, `catatan`, `created_at`, `updated_at`) VALUES
(1, 11, 4, '2023-06-22', 'aktif', 'asdasdasd', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `lowongans`
--

CREATE TABLE `lowongans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_bidang` varchar(255) NOT NULL,
  `posisi` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `kualifikasi` varchar(255) NOT NULL,
  `tanggal_publish` date NOT NULL,
  `tanggal_tutup` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `lowongans`
--

INSERT INTO `lowongans` (`id`, `nama_bidang`, `posisi`, `deskripsi`, `kualifikasi`, `tanggal_publish`, `tanggal_tutup`, `status`, `created_at`, `updated_at`) VALUES
(1, 'asdasdasd', 'asdasdasd', 'sdfdsfdfdfdfsd', 'sdfsdfsdfsdfsdf', '2023-06-07', '2023-06-21', 'sdfdsddfd', '2023-06-15 10:17:08', '2023-06-15 10:17:08'),
(2, 'asdsdasd', 'asddsasad', 'asddsaasd', 'sadsaddsas', '2023-06-01', '2023-06-30', 'Aktif', '2023-06-15 10:42:51', '2023-06-15 10:42:51'),
(3, 'asdsdasd', 'asddsasad', 'asddsaasd', 'sadsaddsas', '2023-07-08', '2023-06-30', 'Tutup', '2023-06-15 10:43:15', '2023-06-15 10:43:15'),
(4, 'asdsadasd', 'asdsadsad', 'asdsasad', 'dsasadsa', '2023-06-15', '2023-06-16', 'Tutup', '2023-06-15 10:49:32', '2023-06-15 10:49:32'),
(5, 'qwweqewq', 'eqweqweq', 'qwwqq', 'qweqweqwe', '2023-06-14', '2023-06-30', 'Tutup', '2023-06-15 10:51:51', '2023-06-15 10:51:51'),
(6, 'qwweqewq', 'eqweqweq', 'qwwqq', 'qweqweqwe', '2023-06-14', '2023-06-30', 'Aktif', '2023-06-15 10:52:18', '2023-06-15 10:52:18'),
(7, 'qwweqewq', 'eqweqweq', 'qwwqq', 'qweqweqwe', '2023-06-14', '2023-06-30', 'Aktif', '2023-06-15 10:54:36', '2023-06-15 10:54:36'),
(8, 'qwweqewq', 'eqweqweq', 'qwwqq', 'qweqweqwe', '2023-06-16', '2023-06-30', 'Aktif', '2023-06-15 10:54:49', '2023-06-15 10:54:49'),
(9, 'qwweqewq', 'eqweqweq', 'qwwqq', 'qweqweqwe', '2023-06-30', '2023-06-30', 'Aktif', '2023-06-15 10:55:05', '2023-06-15 10:55:05'),
(10, 'qwweqewq', 'eqweqweq', 'qwwqq', 'qweqweqwe', '2023-07-01', '2023-06-30', 'Tutup', '2023-06-15 10:55:19', '2023-06-15 10:55:19'),
(11, 'Dinas Kesehatan SERANG', 'Administrasi', 'Bertanggung jawab mengurus dokumen asdasd', 'smk Jurusan ADMINasdasdas', '2023-06-18', '2023-06-29', 'Aktif', '2023-06-15 11:10:22', '2023-06-15 11:35:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_06_13_022137_create_lowongans_table', 1),
(6, '2023_06_13_022821_create_lamarans_table', 1),
(7, '2023_06_13_023037_create_administrasis_table', 1),
(8, '2023_06_13_023330_create_jadwal_keterampilans_table', 1),
(9, '2023_06_13_023355_create_jadwal_wawancaras_table', 1),
(10, '2023_06_13_023526_create_keterampilans_table', 1),
(11, '2023_06_13_023551_create_wawancaras_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
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
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nik` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `jenis_kelamin` enum('pria','wanita') NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(255) NOT NULL,
  `no_telpon` varchar(255) NOT NULL,
  `pendidikan_terakhir` varchar(255) NOT NULL,
  `nama_institusi` varchar(255) NOT NULL,
  `cv` varchar(255) DEFAULT NULL,
  `ijazah` varchar(255) DEFAULT NULL,
  `skck` varchar(255) DEFAULT NULL,
  `pas_foto` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nik`, `name`, `email`, `email_verified_at`, `password`, `jenis_kelamin`, `alamat`, `tempat_lahir`, `tanggal_lahir`, `agama`, `no_telpon`, `pendidikan_terakhir`, `nama_institusi`, `cv`, `ijazah`, `skck`, `pas_foto`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 123, 'qweqweqweq', 'admin@gmail.com', NULL, '$2y$10$tS4ys0hMcX/1/m1IHxY./uEwzWKMiI1EWbb2nZ2jmd/fQDvJdEwsO', 'pria', 'Griya Serdang Indah Blok C.8 No.9', 'tangerang', '2023-06-06', 'asdasdadas', '081214805759', 'qweqweqeqwe', 'qweqweqwe', 'C:\\xampp\\tmp\\php2D64.tmp', 'C:\\xampp\\tmp\\php2D65.tmp', 'C:\\xampp\\tmp\\php2D66.tmp', 'C:\\xampp\\tmp\\php2D67.tmp', 'admin', NULL, '2023-06-13 11:08:47', '2023-06-13 11:08:47'),
(3, 1234567, 'irfan fadillah', 'irfanfadillah272@gmail.com', NULL, '$2y$10$auO3YTYQHFIl6tP2TFPhmORSGvJX2z278Oz3Jn1WUAkVH3jzVd8xO', 'pria', 'Griya Serdang Indah Blok C.8 No.9', 'Serang', '2023-06-15', 'asdasdasd', '081214805759', 'asasdasda', 'asdasdasda', 'C:\\xampp\\tmp\\php6CB.tmp', 'C:\\xampp\\tmp\\php6CC.tmp', 'C:\\xampp\\tmp\\php6DD.tmp', 'C:\\xampp\\tmp\\php6DE.tmp', 'admin', NULL, '2023-06-13 11:16:16', '2023-06-13 11:16:16'),
(4, 8678687, 'asdadadsad', 'ifadillah21@yahoo.co.id', NULL, '$2y$10$6pZWeX0u3D96ac.ac8CJ2eXxIdJIhAH8p34tvWyIkxsVoexZ6c2Y.', 'pria', 'aaaaaaaaaaa', 'tangerang', '2023-06-27', 'asdasdadas', '0812148057594', 'aasdasdads', 'kuilyjthumy', 'C:\\xampp\\tmp\\phpBD18.tmp', 'C:\\xampp\\tmp\\phpBD19.tmp', 'C:\\xampp\\tmp\\phpBD2A.tmp', 'C:\\xampp\\tmp\\phpBD2B.tmp', 'admin', NULL, '2023-06-13 19:49:20', '2023-06-13 19:49:20'),
(5, 1234567890, 'assdasdadsa', 'zxcxcxzcxc@gmail.com', NULL, '$2y$10$DgKHzeuWH601sqbETXIuYOqT4pfZdAny5joJy0RGz1YIoTSCBxAb6', 'pria', 'dsasadsaddsasad', 'asdsadsadsdasad', '2023-06-12', 'asdsdasadsad', '22123122', 'asdsadsadv', 'asddsasdasad1', 'C:\\xampp\\tmp\\php9673.tmp', 'C:\\xampp\\tmp\\php9683.tmp', 'C:\\xampp\\tmp\\php9684.tmp', 'C:\\xampp\\tmp\\php9731.tmp', 'user', NULL, '2023-06-15 09:56:12', '2023-06-15 09:56:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wawancaras`
--

CREATE TABLE `wawancaras` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_lamaran` bigint(20) UNSIGNED NOT NULL,
  `id_jadwalWawancara` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `ketegasan` int(11) NOT NULL,
  `atitude` int(11) NOT NULL,
  `grooming` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `wawancaras`
--

INSERT INTO `wawancaras` (`id`, `id_lamaran`, `id_jadwalWawancara`, `id_user`, `ketegasan`, `atitude`, `grooming`, `total`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, 42, 22, 15, 79, '2023-06-22 20:09:25', '2023-06-22 20:09:25');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `administrasis`
--
ALTER TABLE `administrasis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `administrasis_id_lamaran_foreign` (`id_lamaran`),
  ADD KEY `administrasis_id_user_foreign` (`id_user`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jadwal_keterampilans`
--
ALTER TABLE `jadwal_keterampilans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jadwal_keterampilans_id_lamaran_foreign` (`id_lamaran`),
  ADD KEY `jadwal_keterampilans_id_user_foreign` (`id_user`);

--
-- Indeks untuk tabel `jadwal_wawancaras`
--
ALTER TABLE `jadwal_wawancaras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jadwal_wawancaras_id_lamaran_foreign` (`id_lamaran`),
  ADD KEY `jadwal_wawancaras_id_user_foreign` (`id_user`);

--
-- Indeks untuk tabel `keterampilans`
--
ALTER TABLE `keterampilans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `keterampilans_id_lamaran_foreign` (`id_lamaran`),
  ADD KEY `keterampilans_id_jadwalketerampilan_foreign` (`id_jadwalKeterampilan`),
  ADD KEY `keterampilans_id_user_foreign` (`id_user`);

--
-- Indeks untuk tabel `lamarans`
--
ALTER TABLE `lamarans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lamarans_id_lowongan_foreign` (`id_lowongan`),
  ADD KEY `lamarans_id_user_foreign` (`id_user`);

--
-- Indeks untuk tabel `lowongans`
--
ALTER TABLE `lowongans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_nik_unique` (`nik`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `wawancaras`
--
ALTER TABLE `wawancaras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wawancaras_id_lamaran_foreign` (`id_lamaran`),
  ADD KEY `wawancaras_id_jadwalwawancara_foreign` (`id_jadwalWawancara`),
  ADD KEY `wawancaras_id_user_foreign` (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `administrasis`
--
ALTER TABLE `administrasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jadwal_keterampilans`
--
ALTER TABLE `jadwal_keterampilans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `jadwal_wawancaras`
--
ALTER TABLE `jadwal_wawancaras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `keterampilans`
--
ALTER TABLE `keterampilans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `lamarans`
--
ALTER TABLE `lamarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `lowongans`
--
ALTER TABLE `lowongans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `wawancaras`
--
ALTER TABLE `wawancaras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `administrasis`
--
ALTER TABLE `administrasis`
  ADD CONSTRAINT `administrasis_id_lamaran_foreign` FOREIGN KEY (`id_lamaran`) REFERENCES `lamarans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `administrasis_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jadwal_keterampilans`
--
ALTER TABLE `jadwal_keterampilans`
  ADD CONSTRAINT `jadwal_keterampilans_id_lamaran_foreign` FOREIGN KEY (`id_lamaran`) REFERENCES `lamarans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jadwal_keterampilans_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jadwal_wawancaras`
--
ALTER TABLE `jadwal_wawancaras`
  ADD CONSTRAINT `jadwal_wawancaras_id_lamaran_foreign` FOREIGN KEY (`id_lamaran`) REFERENCES `lamarans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jadwal_wawancaras_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `keterampilans`
--
ALTER TABLE `keterampilans`
  ADD CONSTRAINT `keterampilans_id_jadwalketerampilan_foreign` FOREIGN KEY (`id_jadwalKeterampilan`) REFERENCES `jadwal_keterampilans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `keterampilans_id_lamaran_foreign` FOREIGN KEY (`id_lamaran`) REFERENCES `lamarans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `keterampilans_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `lamarans`
--
ALTER TABLE `lamarans`
  ADD CONSTRAINT `lamarans_id_lowongan_foreign` FOREIGN KEY (`id_lowongan`) REFERENCES `lowongans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lamarans_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `wawancaras`
--
ALTER TABLE `wawancaras`
  ADD CONSTRAINT `wawancaras_id_jadwalwawancara_foreign` FOREIGN KEY (`id_jadwalWawancara`) REFERENCES `jadwal_wawancaras` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wawancaras_id_lamaran_foreign` FOREIGN KEY (`id_lamaran`) REFERENCES `lamarans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wawancaras_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
