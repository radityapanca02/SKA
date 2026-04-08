-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 14 Okt 2025 pada 15.35
-- Versi server: 8.4.3
-- Versi PHP: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sekolah_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alumnis`
--

CREATE TABLE `alumnis` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nickname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jurusan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `angkatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `assets`
--

CREATE TABLE `assets` (
  `id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `folder` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `contents`
--

CREATE TABLE `contents` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci,
  `credit` text COLLATE utf8mb4_unicode_ci,
  `folder` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'general',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `contents`
--

INSERT INTO `contents` (`id`, `title`, `body`, `credit`, `folder`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Raditya Mahatma', '“Belajar di jurusan TKI memberikan saya keterampilan jaringan dan IT yang langsung terpakai di dunia kerja. Terima kasih guru-guru atas bimbingannya.”', '– Adit, Alumni TKI 2023', 'alumni', '1760050828.png', '2025-10-09 16:00:28', '2025-10-09 16:00:28'),
(2, 'Test', 'Lorem Ipsum', 'asdasd', 'alumni', '1760052151.png', '2025-10-09 16:22:31', '2025-10-09 16:22:31'),
(3, 'asd', 'asd', 'asd', 'alumni', '1760052613.png', '2025-10-09 16:24:56', '2025-10-09 16:30:13'),
(4, 'Futsal', 'Ekstrakurikuler futsal merupakan kegiatan olahraga yang digemari oleh banyak siswa dan menjadi ajang prestasi.', 'Author', 'ekstrakulikuler', '1760361887.png', '2025-10-13 06:24:47', '2025-10-13 06:24:47'),
(5, 'CARD 1', 'CARD 1 TEST', 'ADMIN', 'prestasi', '1760446450.png', '2025-10-14 05:54:10', '2025-10-14 05:54:10'),
(6, 'CARD 2', 'CARD 2', 'ADMIN', 'prestasi2', '1760446478.jpg', '2025-10-14 05:54:38', '2025-10-14 05:54:38'),
(7, 'Pendaftaran Siswa Baru Jalur Makmur Tahun Ajaran 2025/2026 Dibuka!', 'SMK PGRI 3 Malang (Skariga) membuka Pendaftaran Peserta Didik Baru (PPDB) Tahun Ajaran 2025/2026 melalui Jalur Makmur. Segera daftarkan diri Anda untuk menjadi bagian dari sekolah unggulan dengan berbagai program keahlian yang siap mencetak lulusan berkompeten dan berkarakter.', 'admin', 'ssb', '[\"1760449741_ssb1.jpg\",\"1760449741_ssb2.jpg\",\"1760449741_ssb3.jpg\",\"1760449741_ssb4.jpg\"]', '2025-10-14 06:11:09', '2025-10-14 06:56:19'),
(8, 'RANDOM BERITA', 'APA ANJING', 'asd', 'berita', '[\"1760451105_Berita1.png\"]', '2025-10-14 07:11:45', '2025-10-14 07:41:04'),
(9, 'asd', 'asd', 'asd', 'berita', '[\"1760451154_Berita2.png\"]', '2025-10-14 07:12:34', '2025-10-14 07:40:59'),
(10, 'side-berita', 'asdas', 'asd', 'berita', '[\"1760451184_Berita3.png\"]', '2025-10-14 07:13:04', '2025-10-14 07:40:55'),
(12, 'test 445', 'asd', NULL, 'berita', '[\"1760453676_Daftar.png\"]', '2025-10-14 07:54:36', '2025-10-14 07:54:36'),
(13, 'test 5', '5', NULL, 'berita', '[\"1760453852_broadcasting.png\"]', '2025-10-14 07:57:32', '2025-10-14 07:57:32'),
(14, '6', '6', NULL, 'berita', '[\"1760453867_Apel.jpg\"]', '2025-10-14 07:57:47', '2025-10-14 07:57:47'),
(15, '7', 'public function index()\r\n{\r\n    // Ambil semua berita\r\n    $berita = Content::where(\'folder\', \'berita\')->latest()->get();\r\n\r\n    // Ambil berita kategori SEKOLAH (utama)\r\n    $utama = Content::where(\'folder\', \'berita\')\r\n                    ->where(\'category\', \'sekolah\') // pastikan kolom category ada ya\r\n                    ->latest()\r\n                    ->take(3)\r\n                    ->get();\r\n\r\n    // Ambil berita lain selain \"sekolah\"\r\n    $lainnya = Content::where(\'folder\', \'berita\')\r\n                      ->where(\'category\', \'!=\', \'sekolah\')\r\n                      ->latest()\r\n                      ->get();\r\n\r\n    return view(\'informasi.berita\', compact(\'utama\', \'lainnya\'));\r\n}\r\npublic function index()\r\n{\r\n    // Ambil semua berita\r\n    $berita = Content::where(\'folder\', \'berita\')->latest()->get();\r\n\r\n    // Ambil berita kategori SEKOLAH (utama)\r\n    $utama = Content::where(\'folder\', \'berita\')\r\n                    ->where(\'category\', \'sekolah\') // pastikan kolom category ada ya\r\n                    ->latest()\r\n                    ->take(3)\r\n                    ->get();\r\n\r\n    // Ambil berita lain selain \"sekolah\"\r\n    $lainnya = Content::where(\'folder\', \'berita\')\r\n                      ->where(\'category\', \'!=\', \'sekolah\')\r\n                      ->latest()\r\n                      ->get();\r\n\r\n    return view(\'informasi.berita\', compact(\'utama\', \'lainnya\'));\r\n}\r\npublic function index()\r\n{\r\n    // Ambil semua berita\r\n    $berita = Content::where(\'folder\', \'berita\')->latest()->get();\r\n\r\n    // Ambil berita kategori SEKOLAH (utama)\r\n    $utama = Content::where(\'folder\', \'berita\')\r\n                    ->where(\'category\', \'sekolah\') // pastikan kolom category ada ya\r\n                    ->latest()\r\n                    ->take(3)\r\n                    ->get();\r\n\r\n    // Ambil berita lain selain \"sekolah\"\r\n    $lainnya = Content::where(\'folder\', \'berita\')\r\n                      ->where(\'category\', \'!=\', \'sekolah\')\r\n                      ->latest()\r\n                      ->get();\r\n\r\n    return view(\'informasi.berita\', compact(\'utama\', \'lainnya\'));\r\n}\r\npublic function index()\r\n{\r\n    // Ambil semua berita\r\n    $berita = Content::where(\'folder\', \'berita\')->latest()->get();\r\n\r\n    // Ambil berita kategori SEKOLAH (utama)\r\n    $utama = Content::where(\'folder\', \'berita\')\r\n                    ->where(\'category\', \'sekolah\') // pastikan kolom category ada ya\r\n                    ->latest()\r\n                    ->take(3)\r\n                    ->get();\r\n\r\n    // Ambil berita lain selain \"sekolah\"\r\n    $lainnya = Content::where(\'folder\', \'berita\')\r\n                      ->where(\'category\', \'!=\', \'sekolah\')\r\n                      ->latest()\r\n                      ->get();\r\n\r\n    return view(\'informasi.berita\', compact(\'utama\', \'lainnya\'));\r\n}\r\npublic function index()\r\n{\r\n    // Ambil semua berita\r\n    $berita = Content::where(\'folder\', \'berita\')->latest()->get();\r\n\r\n    // Ambil berita kategori SEKOLAH (utama)\r\n    $utama = Content::where(\'folder\', \'berita\')\r\n                    ->where(\'category\', \'sekolah\') // pastikan kolom category ada ya\r\n                    ->latest()\r\n                    ->take(3)\r\n                    ->get();\r\n\r\n    // Ambil berita lain selain \"sekolah\"\r\n    $lainnya = Content::where(\'folder\', \'berita\')\r\n                      ->where(\'category\', \'!=\', \'sekolah\')\r\n                      ->latest()\r\n                      ->get();\r\n\r\n    return view(\'informasi.berita\', compact(\'utama\', \'lainnya\'));\r\n}\r\npublic function index()\r\n{\r\n    // Ambil semua berita\r\n    $berita = Content::where(\'folder\', \'berita\')->latest()->get();\r\n\r\n    // Ambil berita kategori SEKOLAH (utama)\r\n    $utama = Content::where(\'folder\', \'berita\')\r\n                    ->where(\'category\', \'sekolah\') // pastikan kolom category ada ya\r\n                    ->latest()\r\n                    ->take(3)\r\n                    ->get();\r\n\r\n    // Ambil berita lain selain \"sekolah\"\r\n    $lainnya = Content::where(\'folder\', \'berita\')\r\n                      ->where(\'category\', \'!=\', \'sekolah\')\r\n                      ->latest()\r\n                      ->get();\r\n\r\n    return view(\'informasi.berita\', compact(\'utama\', \'lainnya\'));\r\n}', NULL, 'berita', '[\"1760454343_departemen-otomotif.png\"]', '2025-10-14 08:05:43', '2025-10-14 08:07:51'),
(16, '8', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem IpsumLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem IpsumLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem IpsumLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', NULL, 'berita', '[\"1760454960_departemen-permesinan.png\"]', '2025-10-14 08:16:00', '2025-10-14 08:16:00'),
(17, '10', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem IpsumLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem IpsumLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', NULL, 'berita', '[\"1760454992_Berita2.png\"]', '2025-10-14 08:16:32', '2025-10-14 08:16:32'),
(18, '11', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', NULL, 'berita', '[\"1760455071_1760361887.png\"]', '2025-10-14 08:17:51', '2025-10-14 08:17:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000001_create_cache_table', 1),
(2, '0001_01_01_000002_create_jobs_table', 1),
(3, '2025_10_03_235336_create_users_table', 1),
(4, '2025_10_06_100003_create_users_table', 1),
(5, '2025_10_06_100012_create_assets_table', 1),
(6, '2025_10_06_100018_create_contents_table', 1),
(7, '2025_10_09_201432_create_visitors_table', 2),
(8, '2025_10_09_203223_create_visitors_table', 3),
(9, '2025_10_09_204204_create_personal_access_tokens_table', 4),
(10, '2025_10_09_214837_add_folder_to_assets_table', 5),
(11, '2025_10_09_220340_assets', 6),
(12, '2025_10_09_221908_create_contents_table', 7),
(13, '2025_10_09_224321_alumni', 8),
(14, '2025_10_09_225636_content', 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` bigint UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'adminska', 'admin@ska.net', '$2y$10$Xo6.7X8af4tyTCQEqUtBL.bApOboXqLjF2JzHpuKxbI9MDnDay9jW', NULL, NULL),
(3, 'ska', 'smkpgri3malang@support.sch.id', '$2y$12$NgHC/YYis.a5VZsdJ0zTBOZG6uQONi8Y6KDQQ1b0LZXS.Eb9xgoaK', '2025-10-09 16:31:26', '2025-10-09 16:31:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `visitors`
--

CREATE TABLE `visitors` (
  `id` bigint UNSIGNED NOT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visit_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `visitors`
--

INSERT INTO `visitors` (`id`, `ip_address`, `user_agent`, `visit_date`, `created_at`, `updated_at`) VALUES
(1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-10-09', '2025-10-09 13:34:06', '2025-10-09 13:34:06'),
(2, '192.168.1.29', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-10-09', '2025-10-09 14:15:45', '2025-10-09 14:15:45'),
(3, '192.168.1.7', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Mobile Safari/537.36', '2025-10-09', '2025-10-09 14:23:44', '2025-10-09 14:23:44'),
(4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-10-10', '2025-10-09 17:00:36', '2025-10-09 17:00:36'),
(5, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '2025-10-13', '2025-10-13 06:19:59', '2025-10-13 06:19:59'),
(6, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '2025-10-14', '2025-10-14 05:22:41', '2025-10-14 05:22:41');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alumnis`
--
ALTER TABLE `alumnis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`),
  ADD KEY `personal_access_tokens_expires_at_index` (`expires_at`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `visitors_visit_date_index` (`visit_date`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alumnis`
--
ALTER TABLE `alumnis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `assets`
--
ALTER TABLE `assets`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `contents`
--
ALTER TABLE `contents`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
