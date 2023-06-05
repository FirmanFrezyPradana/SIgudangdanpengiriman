-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 05 Jun 2023 pada 10.11
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
-- Struktur dari tabel `dashboard_gudangs`
--

CREATE TABLE `dashboard_gudangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_invoice` varchar(50) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `stoke_keluar` int(11) NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `dashboard_gudangs`
--

INSERT INTO `dashboard_gudangs` (`id`, `kode_invoice`, `id_barang`, `stoke_keluar`, `tanggal_keluar`, `created_at`, `updated_at`) VALUES
(1, 'INV-20230605-7-001', 2, 2, '2023-06-05', '2023-06-04 22:35:14', '2023-06-04 22:35:14'),
(2, 'INV-20230605-7-001', 3, 1, '2023-06-05', '2023-06-04 22:35:14', '2023-06-04 22:35:14'),
(3, 'INV-20230605-7-001', 4, 2, '2023-06-05', '2023-06-04 22:35:14', '2023-06-04 22:35:14');

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
(16, '2023_04_12_202023_create_tb_rutes_table', 1),
(17, '2023_05_06_153344_create_dashboard_gudangs_table', 1);

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
  `harga` int(11) NOT NULL,
  `stoke_awal` int(11) NOT NULL,
  `stoke_masuk` int(11) DEFAULT NULL,
  `stoke_keluar` int(11) DEFAULT NULL,
  `stoke_akhir` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_barangs`
--

INSERT INTO `tb_barangs` (`id`, `kode_barang`, `nama_barang`, `id_gudang`, `id_kategori`, `satuan`, `harga`, `stoke_awal`, `stoke_masuk`, `stoke_keluar`, `stoke_akhir`, `created_at`, `updated_at`) VALUES
(2, '082322MAK1LZ1', 'MPX 1 1L', 2, 8, 'PC', 60500, 72, 0, 4, 68, '2023-06-04 06:22:53', '2023-06-04 22:35:14'),
(3, '082322MAK8LZ1', 'MPX 1 1,2L', 2, 8, 'PC', 68500, 50, 0, 1, 49, '2023-06-04 06:23:49', '2023-06-04 22:35:14'),
(4, '082322MBK0LZ1', 'MPX 2 0,8', 2, 8, 'PC', 54000, 1368, 0, 2, 1360, '2023-06-04 06:24:45', '2023-06-04 22:35:14'),
(5, '082342MAK0LZ0', 'SPX 1 0,8', 2, 8, 'PC', 66000, 55, 0, 0, 55, '2023-06-04 06:26:39', '2023-06-04 06:26:39'),
(6, '23100K0JN01', 'Vanbel KOJ', 1, 1, 'PC', 100000, 10, 0, 0, 17, '2023-06-04 06:27:53', '2023-06-04 16:35:54'),
(7, '23100K16A41', 'Vanvbel K16', 1, 1, 'PC', 127000, 17, 0, 0, 17, '2023-06-04 06:32:34', '2023-06-04 06:32:34'),
(8, '23100K25902', 'Vanbel K25', 1, 1, 'PC', 103000, 46, 0, 0, 46, '2023-06-04 06:34:01', '2023-06-04 06:34:01'),
(9, '23100K35BA0', 'Vanbel set K35', 1, 5, 'PC', 164000, 14, 0, 0, 14, '2023-06-04 06:34:37', '2023-06-04 06:34:37'),
(10, '131A1KFV951', 'PISTON KIT (STD)', 3, 3, 'PC', 142000, 3, 5, 0, 8, '2023-06-04 06:36:06', '2023-06-04 21:35:15'),
(11, '131A1KVB930', 'PISTON KIT (STD)', 3, 3, 'PC', 118500, 3, 0, 0, 3, '2023-06-04 06:36:51', '2023-06-04 06:36:51'),
(12, '131A2KEH660', 'PISTON KIT (0,25)', 3, 3, 'PC', 181000, 5, 0, 0, 5, '2023-06-04 06:37:29', '2023-06-04 06:37:29'),
(13, '17910K0JN01', 'CABLE COMP A,THROT KOJ', 3, 4, 'PC', 82500, 6, 0, 0, 6, '2023-06-04 06:38:27', '2023-06-04 06:38:27'),
(14, '17910K59A72', 'CABLE COMP A,THROT', 3, 4, 'PC', 87500, 3, 0, 0, 3, '2023-06-04 06:39:05', '2023-06-04 06:39:05'),
(15, '22535K44V00', 'WEIGHT SET CLUTCH', 1, 6, 'PC', 120000, 10, 0, 0, 10, '2023-06-04 06:40:41', '2023-06-04 16:44:03'),
(16, '22535K81N00', 'WEIGHT SET CLUTCH', 1, 6, 'PC', 131000, 10, 0, 0, 10, '2023-06-04 06:42:57', '2023-06-04 06:42:57'),
(17, 'Vanbel-k44-1', 'Vanbel K44', 1, 1, 'PC', 135000, 10, 0, 0, 10, '2023-06-04 16:32:44', '2023-06-04 16:32:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_brgmasuks`
--

CREATE TABLE `tb_brgmasuks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_masuk` varchar(255) DEFAULT NULL,
  `id_barang` bigint(20) UNSIGNED NOT NULL,
  `stoke_masuk` int(11) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_brgmasuks`
--

INSERT INTO `tb_brgmasuks` (`id`, `kode_masuk`, `id_barang`, `stoke_masuk`, `tanggal_masuk`, `created_at`, `updated_at`) VALUES
(1, 'MSK-20230605-1', 10, 5, '2023-06-05', '2023-06-04 21:35:15', '2023-06-04 21:35:15');

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

--
-- Dumping data untuk tabel `tb_gudangs`
--

INSERT INTO `tb_gudangs` (`id`, `nama_gudang`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'Gudang Mekar Sari', 'jl. kadiri no 20', '2023-05-23 20:05:23', '2023-05-23 20:05:23'),
(2, 'Gudang Gajayana', 'jl.Gajayana No.20', '2023-06-04 06:16:30', '2023-06-04 06:16:30'),
(3, 'Gudang Temanggungan', 'Jl.Sukoharjo no 30', '2023-06-04 06:17:08', '2023-06-04 06:17:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jadwals`
--

CREATE TABLE `tb_jadwals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sesi_pengiriman` varchar(255) NOT NULL,
  `jam_berangkat` time NOT NULL,
  `tujuan` text NOT NULL,
  `total_jarak_tempuh` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_jadwals`
--

INSERT INTO `tb_jadwals` (`id`, `sesi_pengiriman`, `jam_berangkat`, `tujuan`, `total_jarak_tempuh`, `created_at`, `updated_at`) VALUES
(2, '2', '14:05:00', 'ponorogo', '450 km', '2023-05-26 06:08:15', '2023-06-04 08:41:26'),
(3, '3', '12:00:00', 'Malang', '600 km', '2023-05-26 06:08:50', '2023-05-26 06:09:35'),
(4, '1', '08:00:00', 'Trenggalek', '300 KM', '2023-06-04 08:42:09', '2023-06-04 08:42:14');

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

--
-- Dumping data untuk tabel `tb_kategoris`
--

INSERT INTO `tb_kategoris` (`id`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(1, 'Vanbel', '2023-05-24 06:51:47', '2023-05-24 06:51:47'),
(2, 'Lampu Depan', '2023-05-25 18:09:58', '2023-05-25 18:09:58'),
(3, 'Piston Kit AHM', '2023-06-04 06:12:37', '2023-06-04 06:12:37'),
(4, 'Kabel Kopling AHM', '2023-06-04 06:13:04', '2023-06-04 06:13:04'),
(5, 'Vanbel Set ASSY', '2023-06-04 06:13:43', '2023-06-04 16:34:11'),
(6, 'Kampas Ganda AHM', '2023-06-04 06:14:22', '2023-06-04 06:14:22'),
(8, 'OLI', '2023-06-04 06:15:06', '2023-06-04 06:15:06'),
(9, 'Lampu Depan', '2023-06-04 16:33:48', '2023-06-04 16:33:48');

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

--
-- Dumping data untuk tabel `tb_kendaraans`
--

INSERT INTO `tb_kendaraans` (`id`, `nomor_polisi`, `jenis_kendaraan`, `jenis_bbm`, `created_at`, `updated_at`) VALUES
(1, 'AG 1254 PA', 'Truk box', 'solar', '2023-05-26 05:55:44', '2023-06-04 08:41:13'),
(3, 'AG 4141 YZ', 'L300', 'Premium', '2023-06-04 08:26:58', '2023-06-04 08:26:58');

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

--
-- Dumping data untuk tabel `tb_outlets`
--

INSERT INTO `tb_outlets` (`id`, `nama_outlet`, `alamat`, `telepon`, `id_user`, `created_at`, `updated_at`) VALUES
(2, 'Outlet Mekar Sari', 'trenggalek', '085123435323', 7, '2023-06-04 22:34:45', '2023-06-04 22:34:45');

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

--
-- Dumping data untuk tabel `tb_pegawais`
--

INSERT INTO `tb_pegawais` (`id`, `hak_akses`, `created_at`, `updated_at`) VALUES
(1, 'ADMIN', NULL, NULL),
(2, 'GUDANG', NULL, NULL),
(3, 'PEMILIK\r\n', NULL, NULL),
(4, 'SOPIR', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pemesanans`
--

CREATE TABLE `tb_pemesanans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `id_outlet` bigint(20) UNSIGNED NOT NULL,
  `id_barang` bigint(20) UNSIGNED NOT NULL,
  `kode_pemesanan` varchar(50) NOT NULL,
  `jumlah_pesanan` int(11) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `total_pemesanan` int(11) NOT NULL,
  `tanggal_pemesanan` date NOT NULL,
  `status_pemesanan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_pemesanans`
--

INSERT INTO `tb_pemesanans` (`id`, `user_id`, `id_outlet`, `id_barang`, `kode_pemesanan`, `jumlah_pesanan`, `satuan`, `total_harga`, `total_pemesanan`, `tanggal_pemesanan`, `status_pemesanan`, `created_at`, `updated_at`) VALUES
(1, 7, 2, 2, 'INV-20230605-7-001', 2, 'PC', 121000, 297500, '2023-06-05', 'Pesanan Selesai', '2023-06-04 22:35:14', '2023-06-05 01:02:31'),
(2, 7, 2, 3, 'INV-20230605-7-001', 1, 'PC', 68500, 297500, '2023-06-05', 'Pesanan Selesai', '2023-06-04 22:35:14', '2023-06-05 01:02:31'),
(3, 7, 2, 4, 'INV-20230605-7-001', 2, 'PC', 108000, 297500, '2023-06-05', 'Pesanan Selesai', '2023-06-04 22:35:14', '2023-06-05 01:02:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengiriman`
--

CREATE TABLE `tb_pengiriman` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pemesanan_kode` varchar(255) NOT NULL,
  `id_kendaraan` bigint(20) UNSIGNED DEFAULT NULL,
  `id_jadwal` bigint(20) UNSIGNED DEFAULT NULL,
  `id_sopir` bigint(20) UNSIGNED DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_pengiriman`
--

INSERT INTO `tb_pengiriman` (`id`, `pemesanan_kode`, `id_kendaraan`, `id_jadwal`, `id_sopir`, `status`, `created_at`, `updated_at`) VALUES
(1, 'INV-20230605-7-001', 1, 3, 1, 'Pesanan Selesai', '2023-06-04 22:45:52', '2023-06-05 01:02:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rutes`
--

CREATE TABLE `tb_rutes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_invoice` varchar(255) DEFAULT NULL,
  `tanggal_waktu` datetime DEFAULT NULL,
  `track_rute` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_rutes`
--

INSERT INTO `tb_rutes` (`id`, `kode_invoice`, `tanggal_waktu`, `track_rute`, `created_at`, `updated_at`) VALUES
(38, 'INV-20230605-7-001', '2023-06-01 15:02:00', 'Pesanan diterima', '2023-06-05 01:02:31', '2023-06-05 01:02:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_sopirs`
--

CREATE TABLE `tb_sopirs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `SIM` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_sopirs`
--

INSERT INTO `tb_sopirs` (`id`, `id_user`, `SIM`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, NULL, 'aktif', '2023-06-04 18:30:33', '2023-06-04 18:30:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_pengguna` varchar(255) NOT NULL,
  `alamat` text DEFAULT NULL,
  `telepon_pengguna` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
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
(2, 'ADMIN', NULL, NULL, 'ADMIN', '$2y$10$bOsYIObRFEd07XjqOwoR3.fKcFucGx39fakNzMaVcYs7doRIxJAVS', 1, 'Sudah Verifikasi', 'admin@gmail.com', NULL, NULL, '2023-06-04 18:26:22', '2023-06-04 18:29:30'),
(4, 'SOPIR', NULL, NULL, NULL, '$2y$10$tJ2dFf3mrfqbjQLLTcX61ONeGj.VCrFfYR0nXtObO2FxKG0CpKCMe', 4, 'Sudah Verifikasi', 'sopir@gmail.com', NULL, NULL, '2023-06-04 18:30:04', '2023-06-04 18:30:10'),
(6, 'GUDANG', NULL, NULL, NULL, '$2y$10$GHVYkPh7Qy.HVMCEqge9WOKbUjuPa0H432hLdRbVOw1XZPvcMEnUe', 2, 'Sudah Verifikasi', 'gudang@gmail.com', NULL, NULL, '2023-06-04 21:30:25', '2023-06-05 01:09:07'),
(7, 'Firman Frezy pradana', NULL, NULL, 'firman', '$2y$10$trz4Lkeb1fXYkQti9hjD0OndBedVdR2RAz4pZkY0Ksxo1OW1PHJh6', 3, 'belum verifikasi', 'firman@gmail.com', NULL, NULL, '2023-06-04 22:17:49', '2023-06-04 22:17:49');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dashboard_gudangs`
--
ALTER TABLE `dashboard_gudangs`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `tb_pengiriman_id_kendaraan_foreign` (`id_kendaraan`),
  ADD KEY `tb_pengiriman_id_jadwal_foreign` (`id_jadwal`),
  ADD KEY `tb_pengiriman_id_sopir_foreign` (`id_sopir`);

--
-- Indeks untuk tabel `tb_rutes`
--
ALTER TABLE `tb_rutes`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT untuk tabel `dashboard_gudangs`
--
ALTER TABLE `dashboard_gudangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_barangs`
--
ALTER TABLE `tb_barangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tb_brgmasuks`
--
ALTER TABLE `tb_brgmasuks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_gudangs`
--
ALTER TABLE `tb_gudangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_jadwals`
--
ALTER TABLE `tb_jadwals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_kategoris`
--
ALTER TABLE `tb_kategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_kendaraans`
--
ALTER TABLE `tb_kendaraans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_outlets`
--
ALTER TABLE `tb_outlets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_pegawais`
--
ALTER TABLE `tb_pegawais`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_pemesanans`
--
ALTER TABLE `tb_pemesanans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_pengiriman`
--
ALTER TABLE `tb_pengiriman`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_rutes`
--
ALTER TABLE `tb_rutes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `tb_sopirs`
--
ALTER TABLE `tb_sopirs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  ADD CONSTRAINT `tb_pengiriman_id_sopir_foreign` FOREIGN KEY (`id_sopir`) REFERENCES `tb_sopirs` (`id`);

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
