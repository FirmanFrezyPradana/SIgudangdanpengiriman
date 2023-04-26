-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 14 Apr 2023 pada 18.10
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_gudangdanpengiriman`
--

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
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2023_04_10_015443_create_tb_pegawais_table', 1),
(5, '2023_04_11_000000_create_users_table', 1),
(6, '2023_04_12_200336_create_tb_outlets_table', 1),
(7, '2023_04_12_201058_create_tb_gudangs_table', 1),
(8, '2023_04_12_201143_create_tb_kategoris_table', 1),
(9, '2023_04_12_201235_create_tb_barangs_table', 1),
(10, '2023_04_12_201356_create_tb_brgmasuks_table', 1),
(11, '2023_04_12_201447_create_tb_pemesanans_table', 1),
(12, '2023_04_12_201547_create_tb_kendaraans_table', 1),
(13, '2023_04_12_201624_create_tb_jadwals_table', 1),
(14, '2023_04_12_201835_create_tb_sopirs_table', 1),
(15, '2023_04_12_201927_create_tb_pengirimen_table', 1),
(16, '2023_04_12_202023_create_tb_rutes_table', 1);

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
-- Struktur dari tabel `tb_barangs`
--

CREATE TABLE `tb_barangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_barang` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `id_gudang` bigint(20) UNSIGNED NOT NULL,
  `id_kategori` bigint(20) UNSIGNED NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `stoke_awal` int(11) NOT NULL,
  `stoke_masuk` int(11) NOT NULL,
  `stoke_keluar` int(11) NOT NULL,
  `stoke_akhir` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_brgmasuks`
--

CREATE TABLE `tb_brgmasuks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_barang` bigint(20) UNSIGNED NOT NULL,
  `stoke_masuk` int(11) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_gudangs`
--

CREATE TABLE `tb_gudangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_gudang` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jadwals`
--

CREATE TABLE `tb_jadwals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sesi_pengiriman` varchar(255) NOT NULL,
  `jam_berangkat` date NOT NULL,
  `tujuan` text NOT NULL,
  `total_jarak_tempuh` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategoris`
--

CREATE TABLE `tb_kategoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kendaraans`
--

CREATE TABLE `tb_kendaraans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomor_polisi` varchar(255) NOT NULL,
  `jenis_kendaraan` varchar(255) NOT NULL,
  `jenis_bbm` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_outlets`
--

CREATE TABLE `tb_outlets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_outlet` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pegawais`
--

CREATE TABLE `tb_pegawais` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hak_akses` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pemesanans`
--

CREATE TABLE `tb_pemesanans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_outlet` bigint(20) UNSIGNED NOT NULL,
  `id_barang` bigint(20) UNSIGNED NOT NULL,
  `jumlah_pesanan` int(11) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `total_pemesanan` int(11) NOT NULL,
  `tanggal_pemesanan` date NOT NULL,
  `status_pemesanan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengiriman`
--

CREATE TABLE `tb_pengiriman` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pemesanan` bigint(20) UNSIGNED NOT NULL,
  `id_kendaraan` bigint(20) UNSIGNED NOT NULL,
  `id_jadwal` bigint(20) UNSIGNED NOT NULL,
  `id_sopir` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rutes`
--

CREATE TABLE `tb_rutes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pengiriman` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `track_rute` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_sopirs`
--

CREATE TABLE `tb_sopirs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `SIM` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_pengguna` varchar(255) NOT NULL,
  `alamat` text DEFAULT NULL,
  `telepon_pengguna` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_pegawai` bigint(20) UNSIGNED DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama_pengguna`, `alamat`, `telepon_pengguna`, `username`, `password`, `id_pegawai`, `status`, `email`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'cherylauliaazzahra', NULL, NULL, 'cheryl', '$2y$10$i0m56ASINWFsdOGw4zBlnOrvcZP7qf0yaSwYlQ21qLCwbc9pwm2Ru', NULL, NULL, 'cheryl@gmail.com', NULL, NULL, '2023-04-12 14:47:02', '2023-04-12 14:47:02');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indeks untuk tabel `tb_barangs`
--
ALTER TABLE `tb_barangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_barangs_id_gudang_foreign` (`id_gudang`),
  ADD KEY `tb_barangs_id_kategori_foreign` (`id_kategori`);

--
-- Indeks untuk tabel `tb_brgmasuks`
--
ALTER TABLE `tb_brgmasuks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_brgmasuks_id_barang_foreign` (`id_barang`);

--
-- Indeks untuk tabel `tb_gudangs`
--
ALTER TABLE `tb_gudangs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_jadwals`
--
ALTER TABLE `tb_jadwals`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_kategoris`
--
ALTER TABLE `tb_kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_kendaraans`
--
ALTER TABLE `tb_kendaraans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_outlets`
--
ALTER TABLE `tb_outlets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_outlets_id_user_foreign` (`id_user`);

--
-- Indeks untuk tabel `tb_pegawais`
--
ALTER TABLE `tb_pegawais`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_pemesanans`
--
ALTER TABLE `tb_pemesanans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_pemesanans_id_outlet_foreign` (`id_outlet`),
  ADD KEY `tb_pemesanans_id_barang_foreign` (`id_barang`);

--
-- Indeks untuk tabel `tb_pengiriman`
--
ALTER TABLE `tb_pengiriman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_pengiriman_id_pemesanan_foreign` (`id_pemesanan`),
  ADD KEY `tb_pengiriman_id_kendaraan_foreign` (`id_kendaraan`),
  ADD KEY `tb_pengiriman_id_jadwal_foreign` (`id_jadwal`),
  ADD KEY `tb_pengiriman_id_sopir_foreign` (`id_sopir`);

--
-- Indeks untuk tabel `tb_rutes`
--
ALTER TABLE `tb_rutes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_rutes_id_pengiriman_foreign` (`id_pengiriman`);

--
-- Indeks untuk tabel `tb_sopirs`
--
ALTER TABLE `tb_sopirs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_sopirs_id_user_foreign` (`id_user`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_id_pegawai_foreign` (`id_pegawai`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_barangs`
--
ALTER TABLE `tb_barangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_brgmasuks`
--
ALTER TABLE `tb_brgmasuks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_gudangs`
--
ALTER TABLE `tb_gudangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_jadwals`
--
ALTER TABLE `tb_jadwals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_kategoris`
--
ALTER TABLE `tb_kategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_kendaraans`
--
ALTER TABLE `tb_kendaraans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_outlets`
--
ALTER TABLE `tb_outlets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_pegawais`
--
ALTER TABLE `tb_pegawais`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_pemesanans`
--
ALTER TABLE `tb_pemesanans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_pengiriman`
--
ALTER TABLE `tb_pengiriman`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_rutes`
--
ALTER TABLE `tb_rutes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_sopirs`
--
ALTER TABLE `tb_sopirs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_barangs`
--
ALTER TABLE `tb_barangs`
  ADD CONSTRAINT `tb_barangs_id_gudang_foreign` FOREIGN KEY (`id_gudang`) REFERENCES `tb_gudangs` (`id`),
  ADD CONSTRAINT `tb_barangs_id_kategori_foreign` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategoris` (`id`);

--
-- Ketidakleluasaan untuk tabel `tb_brgmasuks`
--
ALTER TABLE `tb_brgmasuks`
  ADD CONSTRAINT `tb_brgmasuks_id_barang_foreign` FOREIGN KEY (`id_barang`) REFERENCES `tb_barangs` (`id`);

--
-- Ketidakleluasaan untuk tabel `tb_outlets`
--
ALTER TABLE `tb_outlets`
  ADD CONSTRAINT `tb_outlets_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `tb_pemesanans`
--
ALTER TABLE `tb_pemesanans`
  ADD CONSTRAINT `tb_pemesanans_id_barang_foreign` FOREIGN KEY (`id_barang`) REFERENCES `tb_barangs` (`id`),
  ADD CONSTRAINT `tb_pemesanans_id_outlet_foreign` FOREIGN KEY (`id_outlet`) REFERENCES `tb_outlets` (`id`);

--
-- Ketidakleluasaan untuk tabel `tb_pengiriman`
--
ALTER TABLE `tb_pengiriman`
  ADD CONSTRAINT `tb_pengiriman_id_jadwal_foreign` FOREIGN KEY (`id_jadwal`) REFERENCES `tb_jadwals` (`id`),
  ADD CONSTRAINT `tb_pengiriman_id_kendaraan_foreign` FOREIGN KEY (`id_kendaraan`) REFERENCES `tb_kendaraans` (`id`),
  ADD CONSTRAINT `tb_pengiriman_id_pemesanan_foreign` FOREIGN KEY (`id_pemesanan`) REFERENCES `tb_pemesanans` (`id`),
  ADD CONSTRAINT `tb_pengiriman_id_sopir_foreign` FOREIGN KEY (`id_sopir`) REFERENCES `tb_sopirs` (`id`);

--
-- Ketidakleluasaan untuk tabel `tb_rutes`
--
ALTER TABLE `tb_rutes`
  ADD CONSTRAINT `tb_rutes_id_pengiriman_foreign` FOREIGN KEY (`id_pengiriman`) REFERENCES `tb_pengiriman` (`id`);

--
-- Ketidakleluasaan untuk tabel `tb_sopirs`
--
ALTER TABLE `tb_sopirs`
  ADD CONSTRAINT `tb_sopirs_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_id_pegawai_foreign` FOREIGN KEY (`id_pegawai`) REFERENCES `tb_pegawais` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
