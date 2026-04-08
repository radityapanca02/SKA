-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2025 at 12:48 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
-- Table structure for table `admin_logs`
--

CREATE TABLE `admin_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `activity` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_logs`
--

INSERT INTO `admin_logs` (`id`, `admin_name`, `activity`, `created_at`, `updated_at`) VALUES
(1, 'adminska', 'Mengupdate user', '2025-10-15 21:24:56', '2025-10-15 21:24:56'),
(2, 'adminska', 'Menambahkan user baru: adminska2', '2025-10-15 22:49:30', '2025-10-15 22:49:30'),
(3, 'adminska', 'Menambahkan user baru: skariga', '2025-10-15 22:50:08', '2025-10-15 22:50:08'),
(4, 'skariga', 'Mengupdate user', '2025-10-15 22:51:11', '2025-10-15 22:51:11'),
(5, 'skariga', 'Menambahkan user baru: skariga', '2025-10-15 22:53:28', '2025-10-15 22:53:28'),
(6, 'adminska', 'Menghapus Konten', '2025-10-16 00:07:29', '2025-10-16 00:07:29'),
(7, 'adminska', 'Menghapus Konten', '2025-10-16 00:07:44', '2025-10-16 00:07:44'),
(8, 'adminska', 'Menghapus Konten', '2025-10-16 00:07:48', '2025-10-16 00:07:48'),
(9, 'adminska', 'Menghapus Konten', '2025-10-16 00:07:53', '2025-10-16 00:07:53'),
(10, 'adminska', 'Menghapus Konten', '2025-10-16 00:07:58', '2025-10-16 00:07:58'),
(11, 'adminska', 'Menghapus Konten', '2025-10-16 00:08:02', '2025-10-16 00:08:02'),
(12, 'adminska', 'Menghapus Konten', '2025-10-16 00:18:21', '2025-10-16 00:18:21'),
(13, 'adminska', 'Menambahkan Konten', '2025-10-16 00:18:44', '2025-10-16 00:18:44'),
(14, 'adminska', 'Menghapus Konten', '2025-10-16 00:30:12', '2025-10-16 00:30:12'),
(15, 'adminska', 'Menghapus Konten', '2025-10-16 00:30:33', '2025-10-16 00:30:33'),
(16, 'adminska', 'Menghapus Konten', '2025-10-16 00:30:36', '2025-10-16 00:30:36'),
(17, 'adminska', 'Menambahkan Konten', '2025-10-16 00:30:58', '2025-10-16 00:30:58'),
(18, 'adminska', 'Menambahkan Konten', '2025-10-16 00:31:57', '2025-10-16 00:31:57'),
(19, 'adminska', 'Mengupdate Konten', '2025-10-16 00:34:30', '2025-10-16 00:34:30'),
(20, 'adminska', 'Mengupdate user baru: adminska', '2025-10-16 00:35:30', '2025-10-16 00:35:30'),
(21, 'adminska', 'Menambahkan Konten', '2025-10-16 00:58:29', '2025-10-16 00:58:29'),
(22, 'adminska', 'Menambahkan Konten', '2025-10-16 01:09:45', '2025-10-16 01:09:45'),
(23, 'adminska', 'Menambahkan Konten', '2025-10-16 01:10:04', '2025-10-16 01:10:04'),
(24, 'adminska', 'Menambahkan Konten', '2025-10-16 01:10:42', '2025-10-16 01:10:42'),
(25, 'adminska', 'Menambahkan Konten', '2025-10-16 01:11:01', '2025-10-16 01:11:01'),
(26, 'adminska', 'Menambahkan Konten', '2025-10-16 01:11:27', '2025-10-16 01:11:27'),
(27, 'adminska', 'Menambahkan Konten', '2025-10-16 01:11:45', '2025-10-16 01:11:45'),
(28, 'adminska', 'Menambahkan Konten', '2025-10-16 01:13:15', '2025-10-16 01:13:15'),
(29, 'adminska', 'Menambahkan Konten', '2025-10-16 01:15:15', '2025-10-16 01:15:15'),
(30, 'adminska', 'Mengupdate Konten', '2025-10-16 01:49:06', '2025-10-16 01:49:06'),
(31, 'adminska', 'Menambahkan Konten', '2025-10-16 02:09:25', '2025-10-16 02:09:25'),
(32, 'adminska', 'Menambahkan Konten', '2025-10-16 03:13:54', '2025-10-16 03:13:54'),
(33, 'adminska', 'Menambahkan Konten', '2025-10-16 03:42:07', '2025-10-16 03:42:07');

-- --------------------------------------------------------

--
-- Table structure for table `alumnis`
--

CREATE TABLE `alumnis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `nickname` varchar(255) DEFAULT NULL,
  `jurusan` varchar(255) DEFAULT NULL,
  `angkatan` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `folder` varchar(255) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text DEFAULT NULL,
  `credit` text DEFAULT NULL,
  `folder` varchar(255) NOT NULL DEFAULT 'general',
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `title`, `body`, `credit`, `folder`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Raditya Mahatma', '“Belajar di jurusan TKI memberikan saya keterampilan jaringan dan IT yang langsung terpakai di dunia kerja. Terima kasih guru-guru atas bimbingannya.”', '– Adit, Alumni TKI 2023', 'alumni', '1760050828.png', '2025-10-09 16:00:28', '2025-10-09 16:00:28'),
(2, 'Test', 'Lorem Ipsum', 'asdasd', 'alumni', '1760052151.png', '2025-10-09 16:22:31', '2025-10-09 16:22:31'),
(3, 'asd', 'asd', 'asd', 'alumni', '1760052613.png', '2025-10-09 16:24:56', '2025-10-09 16:30:13'),
(4, 'Futsal', 'Ekstrakurikuler futsal merupakan kegiatan olahraga yang digemari oleh banyak siswa dan menjadi ajang prestasi.', 'Author', 'ekstrakulikuler', '1760361887.png', '2025-10-13 06:24:47', '2025-10-13 06:24:47'),
(7, 'Pendaftaran Siswa Baru Jalur Makmur Tahun Ajaran 2025/2026 Dibuka!', 'SMK PGRI 3 Malang (Skariga) membuka Pendaftaran Peserta Didik Baru (PPDB) Tahun Ajaran 2025/2026 melalui Jalur Makmur. Segera daftarkan diri Anda untuk menjadi bagian dari sekolah unggulan dengan berbagai program keahlian yang siap mencetak lulusan berkompeten dan berkarakter.', 'admin', 'ssb', '[\"1760449741_ssb1.jpg\",\"1760449741_ssb2.jpg\",\"1760449741_ssb3.jpg\",\"1760449741_ssb4.jpg\"]', '2025-10-14 06:11:09', '2025-10-14 06:56:19'),
(8, 'RANDOM BERITA', 'B2', 'asd', 'berita', '[\"1760451105_Berita1.png\"]', '2025-10-14 07:11:45', '2025-10-16 01:49:06'),
(9, 'asd', 'asd', 'asd', 'berita', '[\"1760451154_Berita2.png\"]', '2025-10-14 07:12:34', '2025-10-14 07:40:59'),
(10, 'side-berita', 'asdas', 'asd', 'berita', '[\"1760451184_Berita3.png\"]', '2025-10-14 07:13:04', '2025-10-14 07:40:55'),
(12, 'test 445', 'asd', NULL, 'berita', '[\"1760453676_Daftar.png\"]', '2025-10-14 07:54:36', '2025-10-14 07:54:36'),
(13, 'test 5', '5', NULL, 'berita', '[\"1760453852_broadcasting.png\"]', '2025-10-14 07:57:32', '2025-10-14 07:57:32'),
(14, '6', '6', NULL, 'berita', '[\"1760453867_Apel.jpg\"]', '2025-10-14 07:57:47', '2025-10-14 07:57:47'),
(15, '7', 'public function index()\r\n{\r\n    // Ambil semua berita\r\n    $berita = Content::where(\'folder\', \'berita\')->latest()->get();\r\n\r\n    // Ambil berita kategori SEKOLAH (utama)\r\n    $utama = Content::where(\'folder\', \'berita\')\r\n                    ->where(\'category\', \'sekolah\') // pastikan kolom category ada ya\r\n                    ->latest()\r\n                    ->take(3)\r\n                    ->get();\r\n\r\n    // Ambil berita lain selain \"sekolah\"\r\n    $lainnya = Content::where(\'folder\', \'berita\')\r\n                      ->where(\'category\', \'!=\', \'sekolah\')\r\n                      ->latest()\r\n                      ->get();\r\n\r\n    return view(\'informasi.berita\', compact(\'utama\', \'lainnya\'));\r\n}\r\npublic function index()\r\n{\r\n    // Ambil semua berita\r\n    $berita = Content::where(\'folder\', \'berita\')->latest()->get();\r\n\r\n    // Ambil berita kategori SEKOLAH (utama)\r\n    $utama = Content::where(\'folder\', \'berita\')\r\n                    ->where(\'category\', \'sekolah\') // pastikan kolom category ada ya\r\n                    ->latest()\r\n                    ->take(3)\r\n                    ->get();\r\n\r\n    // Ambil berita lain selain \"sekolah\"\r\n    $lainnya = Content::where(\'folder\', \'berita\')\r\n                      ->where(\'category\', \'!=\', \'sekolah\')\r\n                      ->latest()\r\n                      ->get();\r\n\r\n    return view(\'informasi.berita\', compact(\'utama\', \'lainnya\'));\r\n}\r\npublic function index()\r\n{\r\n    // Ambil semua berita\r\n    $berita = Content::where(\'folder\', \'berita\')->latest()->get();\r\n\r\n    // Ambil berita kategori SEKOLAH (utama)\r\n    $utama = Content::where(\'folder\', \'berita\')\r\n                    ->where(\'category\', \'sekolah\') // pastikan kolom category ada ya\r\n                    ->latest()\r\n                    ->take(3)\r\n                    ->get();\r\n\r\n    // Ambil berita lain selain \"sekolah\"\r\n    $lainnya = Content::where(\'folder\', \'berita\')\r\n                      ->where(\'category\', \'!=\', \'sekolah\')\r\n                      ->latest()\r\n                      ->get();\r\n\r\n    return view(\'informasi.berita\', compact(\'utama\', \'lainnya\'));\r\n}\r\npublic function index()\r\n{\r\n    // Ambil semua berita\r\n    $berita = Content::where(\'folder\', \'berita\')->latest()->get();\r\n\r\n    // Ambil berita kategori SEKOLAH (utama)\r\n    $utama = Content::where(\'folder\', \'berita\')\r\n                    ->where(\'category\', \'sekolah\') // pastikan kolom category ada ya\r\n                    ->latest()\r\n                    ->take(3)\r\n                    ->get();\r\n\r\n    // Ambil berita lain selain \"sekolah\"\r\n    $lainnya = Content::where(\'folder\', \'berita\')\r\n                      ->where(\'category\', \'!=\', \'sekolah\')\r\n                      ->latest()\r\n                      ->get();\r\n\r\n    return view(\'informasi.berita\', compact(\'utama\', \'lainnya\'));\r\n}\r\npublic function index()\r\n{\r\n    // Ambil semua berita\r\n    $berita = Content::where(\'folder\', \'berita\')->latest()->get();\r\n\r\n    // Ambil berita kategori SEKOLAH (utama)\r\n    $utama = Content::where(\'folder\', \'berita\')\r\n                    ->where(\'category\', \'sekolah\') // pastikan kolom category ada ya\r\n                    ->latest()\r\n                    ->take(3)\r\n                    ->get();\r\n\r\n    // Ambil berita lain selain \"sekolah\"\r\n    $lainnya = Content::where(\'folder\', \'berita\')\r\n                      ->where(\'category\', \'!=\', \'sekolah\')\r\n                      ->latest()\r\n                      ->get();\r\n\r\n    return view(\'informasi.berita\', compact(\'utama\', \'lainnya\'));\r\n}\r\npublic function index()\r\n{\r\n    // Ambil semua berita\r\n    $berita = Content::where(\'folder\', \'berita\')->latest()->get();\r\n\r\n    // Ambil berita kategori SEKOLAH (utama)\r\n    $utama = Content::where(\'folder\', \'berita\')\r\n                    ->where(\'category\', \'sekolah\') // pastikan kolom category ada ya\r\n                    ->latest()\r\n                    ->take(3)\r\n                    ->get();\r\n\r\n    // Ambil berita lain selain \"sekolah\"\r\n    $lainnya = Content::where(\'folder\', \'berita\')\r\n                      ->where(\'category\', \'!=\', \'sekolah\')\r\n                      ->latest()\r\n                      ->get();\r\n\r\n    return view(\'informasi.berita\', compact(\'utama\', \'lainnya\'));\r\n}', NULL, 'berita', '[\"1760454343_departemen-otomotif.png\"]', '2025-10-14 08:05:43', '2025-10-14 08:07:51'),
(16, '8', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem IpsumLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem IpsumLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem IpsumLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', NULL, 'berita', '[\"1760454960_departemen-permesinan.png\"]', '2025-10-14 08:16:00', '2025-10-14 08:16:00'),
(17, '10', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem IpsumLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem IpsumLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', NULL, 'berita', '[\"1760454992_Berita2.png\"]', '2025-10-14 08:16:32', '2025-10-14 08:16:32'),
(18, '11', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', NULL, 'berita', '[\"1760455071_1760361887.png\"]', '2025-10-14 08:17:51', '2025-10-14 08:17:51'),
(27, 'LKS 1', 'L1', NULL, 'prestasi', '[\"1760599858_1760495956_1760446478.jpg\"]', '2025-10-16 00:30:58', '2025-10-16 00:30:58'),
(28, 'LKS2', 'L2', NULL, 'prestasi2', '[\"1760599917_1760436240.png\"]', '2025-10-16 00:31:57', '2025-10-16 00:31:57'),
(29, 'LKS3', 'L3', NULL, 'prestasi', '[\"1760601509_Prestasi3.jpg\"]', '2025-10-16 00:58:29', '2025-10-16 00:58:29'),
(30, 'K1', 'KEGIATAN 1', NULL, 'kegiatan', '[\"1760602185_Kegiatan1.png\"]', '2025-10-16 01:09:45', '2025-10-16 01:09:45'),
(31, 'K2', 'KEGIATAN 2', NULL, 'kegiatan', '[\"1760602204_Kegiatan2.png\"]', '2025-10-16 01:10:04', '2025-10-16 01:10:04'),
(32, 'K3', 'KEGIATAN 3', NULL, 'kegiatan', '[\"1760602242_Kegiatan3.png\"]', '2025-10-16 01:10:42', '2025-10-16 01:10:42'),
(33, 'K4', 'KEGIATAN 4', NULL, 'kegiatan', '[\"1760602261_Kegiatan4.png\"]', '2025-10-16 01:11:01', '2025-10-16 01:11:01'),
(34, 'K5', 'KEGIATAN 5', NULL, 'kegiatan', '[\"1760602287_Kegiatan5.png\"]', '2025-10-16 01:11:27', '2025-10-16 01:11:27'),
(35, 'K6', 'KEGIATAN 7', NULL, 'kegiatan', '[\"1760602305_Kegiatan6.png\"]', '2025-10-16 01:11:45', '2025-10-16 01:11:45'),
(36, 'K UTAMA', 'KEGIATAN SHOW', NULL, 'kegiatan', '[\"1760602395_Kegiatan1.png\",\"1760602395_Kegiatan2.png\",\"1760602395_Kegiatan3.png\"]', '2025-10-16 01:13:15', '2025-10-16 01:13:15'),
(37, 'K LAIN', 'KEGIATAN LAIN', NULL, 'kegiatan', '[\"1760602515_Kegiatan2.png\"]', '2025-10-16 01:15:15', '2025-10-16 01:15:15'),
(38, 'Aku Sendiri', 'TEST', NULL, 'alumni', '[\"1760605765_Rama.png\"]', '2025-10-16 02:09:25', '2025-10-16 02:09:25'),
(39, 'ALUMNI1', 'ALUMNI1', NULL, 'alumni', '[\"1760609634_Depart1.png\"]', '2025-10-16 03:13:54', '2025-10-16 03:13:54'),
(40, 'foto kepsek', '-', NULL, 'kepsek', '[\"1760611327_Lukman-removebg-preview 2.png\"]', '2025-10-16 03:42:07', '2025-10-16 03:42:07');

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(14, '2025_10_09_225636_content', 9),
(15, '2025_10_16_035812_create_admin_logs_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'adminska', 'admin@ska.net', '$2y$10$Xo6.7X8af4tyTCQEqUtBL.bApOboXqLjF2JzHpuKxbI9MDnDay9jW', NULL, NULL),
(3, 'skariga', 'smkpgri3malang@support.sch.id', '$2y$12$NgHC/YYis.a5VZsdJ0zTBOZG6uQONi8Y6KDQQ1b0LZXS.Eb9xgoaK', '2025-10-09 16:31:26', '2025-10-15 22:53:28'),
(4, 'adminska2', 'sknights955@gmail.com', '$2y$12$OBXRgkICHXmNr062hbZvCOL2w7ESrrnjVn2lpW98giKV8DqWPmHtu', '2025-10-15 22:49:30', '2025-10-15 22:49:30'),
(5, 'skariga20', 'smkpgri3malangg@gmail.com', '$2y$12$dukWsKyPkQSfb4k2aNPR6eDAXj3oFYE57nBQvao.y4PON50SrJ0hy', '2025-10-15 22:50:08', '2025-10-15 22:51:11');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `visit_date` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `ip_address`, `user_agent`, `visit_date`, `created_at`, `updated_at`) VALUES
(1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-10-09', '2025-10-09 13:34:06', '2025-10-09 13:34:06'),
(2, '192.168.1.29', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-10-09', '2025-10-09 14:15:45', '2025-10-09 14:15:45'),
(3, '192.168.1.7', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Mobile Safari/537.36', '2025-10-09', '2025-10-09 14:23:44', '2025-10-09 14:23:44'),
(4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-10-10', '2025-10-09 17:00:36', '2025-10-09 17:00:36'),
(5, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '2025-10-13', '2025-10-13 06:19:59', '2025-10-13 06:19:59'),
(6, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '2025-10-14', '2025-10-14 05:22:41', '2025-10-14 05:22:41'),
(7, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '2025-10-16', '2025-10-15 18:47:39', '2025-10-15 18:47:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_logs`
--
ALTER TABLE `admin_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alumnis`
--
ALTER TABLE `alumnis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`),
  ADD KEY `personal_access_tokens_expires_at_index` (`expires_at`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `visitors_visit_date_index` (`visit_date`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_logs`
--
ALTER TABLE `admin_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `alumnis`
--
ALTER TABLE `alumnis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
