-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 01, 2025 at 12:29 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pojok_kronggahan`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Umum', 'Kategori Kegiatan Umum', '2024-12-28 19:26:06', '2024-12-28 19:26:06'),
(2, 'Sport', NULL, '2024-12-29 05:01:34', '2024-12-29 05:01:34'),
(3, 'Perayaan', 'Memuat tentang hari-hari penting', '2025-01-01 11:26:53', '2025-01-01 11:26:53'),
(4, 'Peringatan', 'Berisi tentang peringatan - peringan penting', '2025-01-01 11:36:04', '2025-01-01 11:36:04');

-- --------------------------------------------------------

--
-- Table structure for table `chat_messages`
--

CREATE TABLE `chat_messages` (
  `id` bigint UNSIGNED NOT NULL,
  `chat_room_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chat_messages`
--

INSERT INTO `chat_messages` (`id`, `chat_room_id`, `user_id`, `message`, `file_path`, `file_name`, `mime_type`, `created_at`, `updated_at`) VALUES
(82, 2, 1, 'hello', NULL, NULL, NULL, '2024-12-30 15:46:08', '2024-12-30 15:46:08'),
(84, 2, 2, 'iya', NULL, NULL, NULL, '2024-12-30 15:50:01', '2024-12-30 15:50:01'),
(85, 2, 1, 'gimana kabar', NULL, NULL, NULL, '2024-12-30 15:50:11', '2024-12-30 15:50:11'),
(86, 2, 2, 'gatau', NULL, NULL, NULL, '2024-12-30 15:50:30', '2024-12-30 15:50:30'),
(87, 2, 1, 'okey', NULL, NULL, NULL, '2024-12-30 15:51:23', '2024-12-30 15:51:23'),
(88, 2, 2, 'tespublic', NULL, NULL, NULL, '2024-12-30 15:52:39', '2024-12-30 15:52:39'),
(89, 2, 1, 'berhasil', NULL, NULL, NULL, '2024-12-30 15:52:48', '2024-12-30 15:52:48'),
(97, 2, 1, 'tes', NULL, NULL, NULL, '2024-12-30 15:56:37', '2024-12-30 15:56:37'),
(98, 2, 2, 'halah kok gak iso maneh', NULL, NULL, NULL, '2024-12-30 15:58:33', '2024-12-30 15:58:33'),
(99, 2, 2, 'p', NULL, NULL, NULL, '2024-12-30 16:00:17', '2024-12-30 16:00:17'),
(100, 2, 1, 'okey masuk', NULL, NULL, NULL, '2024-12-30 16:00:26', '2024-12-30 16:00:26'),
(101, 2, 1, 'tes', NULL, NULL, NULL, '2024-12-30 16:02:01', '2024-12-30 16:02:01'),
(102, 2, 1, 'tes', NULL, NULL, NULL, '2024-12-30 16:03:29', '2024-12-30 16:03:29'),
(103, 2, 2, 'tes', NULL, NULL, NULL, '2024-12-30 16:04:12', '2024-12-30 16:04:12'),
(104, 2, 1, 'oke', NULL, NULL, NULL, '2024-12-30 16:04:21', '2024-12-30 16:04:21'),
(105, 2, 2, 'oke', NULL, NULL, NULL, '2024-12-30 16:04:28', '2024-12-30 16:04:28'),
(106, 2, 2, 'tes', NULL, NULL, NULL, '2024-12-30 16:05:40', '2024-12-30 16:05:40'),
(107, 2, 1, 'masuk bang', NULL, NULL, NULL, '2024-12-30 16:05:50', '2024-12-30 16:05:50'),
(108, 2, 2, 'tes', NULL, NULL, NULL, '2024-12-30 16:06:47', '2024-12-30 16:06:47'),
(109, 2, 1, 'hello', NULL, NULL, NULL, '2024-12-30 16:07:00', '2024-12-30 16:07:00'),
(110, 2, 2, 'tes', NULL, NULL, NULL, '2024-12-30 16:09:56', '2024-12-30 16:09:56'),
(111, 2, 1, 'oke', NULL, NULL, NULL, '2024-12-30 16:11:19', '2024-12-30 16:11:19'),
(112, 2, 1, 'ping', NULL, NULL, NULL, '2024-12-30 16:11:42', '2024-12-30 16:11:42'),
(113, 2, 1, 'pong', NULL, NULL, NULL, '2024-12-30 16:26:43', '2024-12-30 16:26:43'),
(114, 2, 1, 'piong', NULL, NULL, NULL, '2024-12-30 16:29:12', '2024-12-30 16:29:12'),
(115, 2, 1, 'tes', NULL, NULL, NULL, '2024-12-30 16:33:00', '2024-12-30 16:33:00'),
(116, 2, 2, 'oke', NULL, NULL, NULL, '2024-12-30 16:33:34', '2024-12-30 16:33:34'),
(117, 2, 1, 'yaa', NULL, NULL, NULL, '2024-12-30 16:33:42', '2024-12-30 16:33:42'),
(120, 6, 2, 'hello min', NULL, NULL, NULL, '2024-12-30 16:47:22', '2024-12-30 16:47:22'),
(121, 6, 2, 'min', NULL, NULL, NULL, '2024-12-30 16:48:44', '2024-12-30 16:48:44'),
(122, 6, 2, 'i', NULL, NULL, NULL, '2024-12-30 17:02:24', '2024-12-30 17:02:24'),
(123, 7, 1, 'tes', 'chat-files/qBTrAo0iRZQsSxt3vrDvViWUsaod92h0n57mAW43.jpg', 'Screenshot 2024-12-27 090610.jpg', 'image/jpeg', '2024-12-30 22:23:24', '2024-12-30 22:23:24'),
(124, 7, 1, '', 'chat-files/w1z7GIkeU9gowEJfdzGF8RnnV1M8z67PTtIMWmdp.jpg', 'Screenshot_20241227-090951.jpg', 'image/jpeg', '2024-12-30 22:41:51', '2024-12-30 22:41:51'),
(125, 2, 1, '😂 hello', NULL, NULL, NULL, '2024-12-30 22:46:01', '2024-12-30 22:46:01'),
(126, 2, 1, 'hello min ', NULL, NULL, NULL, '2024-12-31 00:42:35', '2024-12-31 00:42:35'),
(127, 2, 1, 'hello', NULL, NULL, NULL, '2024-12-31 01:57:08', '2024-12-31 01:57:08'),
(128, 2, 1, 'hey', NULL, NULL, NULL, '2024-12-31 01:57:24', '2024-12-31 01:57:24'),
(129, 7, 1, 'heh', NULL, NULL, NULL, '2024-12-31 01:57:52', '2024-12-31 01:57:52'),
(130, 7, 1, 'ngopi', NULL, NULL, NULL, '2024-12-31 01:58:11', '2024-12-31 01:58:11'),
(131, 2, 1, 'hello', NULL, NULL, NULL, '2024-12-31 02:31:02', '2024-12-31 02:31:02'),
(132, 2, 1, 'hello', NULL, NULL, NULL, '2024-12-31 02:31:23', '2024-12-31 02:31:23'),
(133, 2, 1, 'hey', NULL, NULL, NULL, '2024-12-31 03:45:15', '2024-12-31 03:45:15'),
(134, 2, 1, 'oii', NULL, NULL, NULL, '2024-12-31 04:10:58', '2024-12-31 04:10:58'),
(135, 2, 1, 'tes', NULL, NULL, NULL, '2024-12-31 04:19:23', '2024-12-31 04:19:23'),
(136, 2, 1, 'oke', NULL, NULL, NULL, '2024-12-31 04:20:25', '2024-12-31 04:20:25'),
(137, 7, 1, '', 'chat-files/MqL2uLtzQKehrvE9fZLq2ZYAhlckv59XMvQkRqgF.jpg', 'Screenshot 2024-12-27 090518.jpg', 'image/jpeg', '2024-12-31 04:21:40', '2024-12-31 04:21:40'),
(138, 2, 1, 'hello', NULL, NULL, NULL, '2024-12-31 09:44:06', '2024-12-31 09:44:06'),
(139, 2, 1, 'hello', NULL, NULL, NULL, '2024-12-31 09:44:49', '2024-12-31 09:44:49'),
(140, 2, 1, 'p', NULL, NULL, NULL, '2024-12-31 09:45:00', '2024-12-31 09:45:00'),
(141, 2, 1, 'oi', NULL, NULL, NULL, '2024-12-31 09:46:26', '2024-12-31 09:46:26'),
(142, 2, 1, 'iya ngape', NULL, NULL, NULL, '2024-12-31 09:46:45', '2024-12-31 09:46:45'),
(143, 2, 1, 'gapape', NULL, NULL, NULL, '2024-12-31 09:46:54', '2024-12-31 09:46:54'),
(144, 2, 2, 'hayyy ', NULL, NULL, NULL, '2024-12-31 10:57:09', '2024-12-31 10:57:09'),
(145, 2, 1, 'iya hallo', NULL, NULL, NULL, '2024-12-31 10:59:47', '2024-12-31 10:59:47'),
(146, 2, 2, 'gimana kabar', NULL, NULL, NULL, '2024-12-31 11:00:00', '2024-12-31 11:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `chat_rooms`
--

CREATE TABLE `chat_rooms` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('service','public') COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chat_rooms`
--

INSERT INTO `chat_rooms` (`id`, `name`, `type`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 'Public Chat', 'public', 1, '2024-12-30 14:58:16', '2024-12-30 14:58:16'),
(6, 'Tofiq', 'service', 2, '2024-12-30 16:47:14', '2024-12-30 16:47:14'),
(7, 'Admin', 'service', 1, '2024-12-30 22:18:56', '2024-12-30 22:18:56'),
(8, '', 'service', 1, '2024-12-31 09:54:20', '2024-12-31 09:54:20');

-- --------------------------------------------------------

--
-- Table structure for table `engagements`
--

CREATE TABLE `engagements` (
  `id` bigint UNSIGNED NOT NULL,
  `content_id` bigint UNSIGNED NOT NULL,
  `clicks` int NOT NULL DEFAULT '0',
  `view_hours` double NOT NULL DEFAULT '0',
  `likes` int NOT NULL DEFAULT '0',
  `dislikes` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `engagements`
--

INSERT INTO `engagements` (`id`, `content_id`, `clicks`, `view_hours`, `likes`, `dislikes`, `created_at`, `updated_at`) VALUES
(4, 4, 1, 0.016666666666667, 1, 0, '2025-01-01 11:45:20', '2025-01-01 12:28:22'),
(5, 5, 0, 0.016666666666667, 0, 0, '2025-01-01 11:48:09', '2025-01-01 12:20:32'),
(6, 6, 0, 0, 1, 0, '2025-01-01 11:50:31', '2025-01-01 11:59:46');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_12_28_110000_create_categories_table', 1),
(6, '2024_12_28_120000_create_news_table', 1),
(7, '2024_12_28_130000_create_engagements_table', 1),
(8, '2024_12_29_032619_create_chat_rooms_table', 2),
(9, '2024_12_31_055122_create_social_media_table', 3),
(10, '2024_12_31_055142_create_websites_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `description`, `content`, `thumbnail`, `author`, `category_id`, `created_at`, `updated_at`) VALUES
(4, '\"Festival Merah Putih\": Lomba Perayaan 17 Agustus 2024', '\"Festival Merah Putih\" menghadirkan perayaan kemerdekaan dengan nuansa tradisional modern yang menghibur sekaligus mendidik. Berlokasi di Lapangan Desa, acara berlangsung dari pagi hingga malam.', '<h2>Konsep Acara</h2><p>\"Festival Merah Putih\" menghadirkan perayaan kemerdekaan dengan nuansa tradisional modern yang menghibur sekaligus mendidik. Berlokasi di Lapangan Desa, acara berlangsung dari pagi hingga malam.</p><p><br></p><h2>Rangkaian Acara:</h2><h3>Pagi Penuh Semangat (07.00 - 10.00)</h3><ul><li>Upacara bendera</li><li>Pertunjukan drumband</li><li>Flashmob tarian tradisional</li><li>Karnaval kostum pahlawan untuk anak-anak</li></ul><p><br></p><h3>Siang Gembira (10.00 - 16.00)</h3><ul><li>Lomba tradisional:&nbsp;<ul><li>Balita: membalikkan gelas &amp; menyamakan warna</li><li>Anak-anak: balap karung &amp; estafet</li><li>Remaja: voli &amp; tangkap lele</li><li>Dewasa: cantol wakul</li></ul></li><li>Pasar kuliner nusantara</li><li>Pameran UMKM lokal</li></ul><p><br></p><h3>Malam Meriah (16.00 - 22.00)</h3><ul><li>Panggung seni:&nbsp;<ul><li>Pertunjukan musik dangdut</li><li>Pentas seni sekolah</li></ul></li><li>Makan bersama nasi tumpeng</li></ul><p><br></p><h3>Partisipan</h3><ul><li>Anak Anak Sd Muhammadiyah Kronggahan</li><li>Tokoh masyarakat</li><li>Para anak Kos dan Kontrakan yang berada di sekitar desa kronggahan</li></ul>', 'images/01JGGTYFPRNQPEBQ414SKK2H2T.jpg', 'pipin@gmail.com', 4, '2025-01-01 11:45:20', '2025-01-01 12:17:50'),
(5, 'Peringatan Hari Sumpah Pemuda 2025', 'Desa Kronggahan akan menggelar peringatan Hari Sumpah Pemuda pada 28 Oktober 2025 mendatang. Acara yang mengusung tema \"Pemuda Desa, Penggerak Perubahan\" ini akan diselenggarakan di Balai Desa Kronggahan mulai pukul 07.00 hingga 12.00 WIB.', '<p>Desa Kronggahan akan menggelar peringatan Hari Sumpah Pemuda pada 28 Oktober 2025 mendatang. Acara yang mengusung tema \"Pemuda Desa, Penggerak Perubahan\" ini akan diselenggarakan di Balai Desa Kronggahan mulai pukul 07.00 hingga 12.00 WIB.</p><p><br></p><h2><strong>Sejarah Sumpah Pemuda</strong></h2><p>Sumpah Pemuda merupakan tonggak sejarah penting dalam pergerakan kemerdekaan Indonesia. Pada tanggal 28 Oktober 1928, para pemuda dari berbagai daerah di Indonesia berkumpul dalam Kongres Pemuda II di Batavia (sekarang Jakarta). Dalam kongres bersejarah tersebut, mereka mendeklarasikan tiga ikrar yang kita kenal sebagai Sumpah Pemuda:</p><ol><li>Kami putra dan putri Indonesia, mengaku bertumpah darah yang satu, tanah Indonesia</li><li>Kami putra dan putri Indonesia, mengaku berbangsa yang satu, bangsa Indonesia</li><li>Kami putra dan putri Indonesia menjunjung bahasa persatuan, bahasa Indonesia</li></ol><p><br></p><p>Sumpah ini menjadi simbol persatuan pemuda Indonesia dalam perjuangan kemerdekaan, melampaui perbedaan suku, agama, dan budaya.</p><p><br></p><h3>Rangkaian Acara</h3><p>Kepala Desa Kronggahan menjelaskan bahwa peringatan tahun ini akan diisi dengan berbagai kegiatan yang melibatkan seluruh elemen pemuda desa. \"Kami ingin momentum Sumpah Pemuda ini menjadi penggerak semangat pemuda desa untuk berkontribusi dalam pembangunan,\" ujarnya.</p><p><br></p><h3>Adapun rangkaian acara yang akan digelar meliputi:</h3><ul><li>Upacara bendera</li><li>Lomba pidato kebangsaan</li><li>Musikalisasi puisi bertema nasionalisme</li><li>Cerdas cermat sejarah Indonesia</li><li>Penampilan kesenian dari karang taruna</li><li>Dialog interaktif \"Peran Pemuda dalam Pembangunan Desa\"</li></ul><p><br></p><h3>Partisipasi Pemuda</h3><p>Ketua Karang Taruna Desa Kronggahan selaku ketua panitia mengungkapkan bahwa acara ini terbuka untuk seluruh elemen pemuda desa, termasuk:</p><ul><li>Pelajar SD, SMP dan SMA</li><li>Anggota Karang Taruna</li><li>Organisasi kepemudaan desa</li><li>Anak kos</li><li>Masyarakat umum</li></ul><p>\"Kami mengajak seluruh pemuda desa untuk berpartisipasi aktif dalam kegiatan ini. Ini adalah momentum untuk membuktikan bahwa pemuda desa mampu menjadi agen perubahan,\" tambahnya.</p><p><br></p><h3>Tujuan dan Harapan</h3><p>Peringatan Hari Sumpah Pemuda di Desa Kronggahan diharapkan dapat:</p><ul><li>Menumbuhkan semangat nasionalisme di kalangan pemuda desa</li><li>Memperkuat persatuan dan solidaritas antar pemuda</li><li>Mengembangkan potensi kepemimpinan generasi muda</li><li>Mendorong partisipasi aktif pemuda dalam pembangunan desa</li></ul><p><br></p><p>Informasi lebih lanjut mengenai pendaftaran dan partisipasi dalam acara ini dapat menghubungi sekretariat panitia di Balai Desa Kronggahan atau melalui media sosial resmi desa.</p><p><br></p>', 'images/01JGGV3MPWQ4A7QQY3DWEA9KMG.jpg', 'pipin@gmail.com', 4, '2025-01-01 11:48:09', '2025-01-01 12:14:25'),
(6, '\"Malam Sejuta Peluk\": Perayaan Hari Ibu 2025', 'Menghadirkan perayaan Hari Ibu yang berbeda, \"Malam Sejuta Peluk\" mengajak masyarakat untuk merayakan momen spesial ini dengan rangkaian acara yang menyentuh hati.', '<h2>Konsep Acara</h2><p>Menghadirkan perayaan Hari Ibu yang berbeda, \"Malam Sejuta Peluk\" mengajak masyarakat untuk merayakan momen spesial ini dengan rangkaian acara yang menyentuh hati. Acara akan digelar di Taman Kota pada tanggal 22 Desember 2025, mulai pukul 16.00 hingga 21.00 WIB.</p><p><br></p><h2>Rangkaian Acara:</h2><h3>Sore Penuh Kenangan (16.00 - 17.30)</h3><ul><li>Photography corner dengan tema \"Ibu dan Aku\"</li><li>Workshop merangkai bunga bersama ibu</li><li>Pojok menulis surat untuk ibu</li><li>Mini spa gratis khusus ibu</li></ul><p><br></p><h3>Sunset Appreciation (17.30 - 19.00)</h3><ul><li>Pertunjukan musik akustik</li><li>Pembacaan puisi dari anak untuk ibu</li><li>Peluncuran video dokumenter \"Kisah Para Ibu\"</li></ul><p><br></p><h3>Malam Penuh Kasih (19.00 - 21.00)</h3><ul><li>Makan malam bersama dengan konsep piknik</li><li>Pelukan massal ibu dan anak</li><li>Penutupan dengan nyanyian bersama</li></ul><p><br></p>', 'images/01JGGV7Z47J6AQSNSM7C73AP90.jpg', 'pipin@gmail.com', 3, '2025-01-01 11:50:31', '2025-01-01 12:16:02');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `social_media`
--

CREATE TABLE `social_media` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_media`
--

INSERT INTO `social_media` (`id`, `name`, `icon`, `url`, `created_at`, `updated_at`) VALUES
(1, 'Facebook', '<i class=\"fa-brands fa-facebook\"></i>', '#', '2024-12-30 23:05:18', '2024-12-30 23:05:18'),
(2, 'Instagram', '<i class=\"fa-brands fa-instagram\"></i>', 'https://www.instagram.com/kronggahan_raya?igsh=ZHFqajZ6eHg3eXVp', '2024-12-30 23:05:18', '2025-01-01 12:27:38'),
(3, 'Youtube', '<i class=\"fa-brands fa-youtube\"></i>', '#', '2024-12-30 23:05:18', '2024-12-30 23:05:18'),
(4, 'Twiter', '<i class=\"fa-brands fa-x-twitter\"></i>', '#', '2024-12-30 23:05:18', '2024-12-30 23:05:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'User',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', 'Admin', '2024-12-28 19:22:25', '$2y$12$7Jl6p5AvkrnWquPpIu0jVOybo7yn1Lr2t98nbAb.K4r2w7lNSnTm.', 'Upaj7jNtw85UfBrcuD7ERyNJN8QfaRpborcyXJ2n0q7GVH78slUokJPGqiun', '2024-12-28 19:22:26', '2024-12-30 22:08:49'),
(2, 'Tofiq', 'opik@gmail.com', 'User', NULL, '$2y$12$7uBPFTkbZXm/Fh3zfobcauFt79g/LKFxG8S0M35JPzln4PokUlO9a', NULL, '2024-12-29 19:07:58', '2024-12-29 19:07:58'),
(3, 'Pipin Wiwid Apriwanty', 'pipin@gmail.com', 'Admin', NULL, '$2y$12$9CQEXIyCAbA1dB8hD1MWhuX/8k0QE0cujg/VW36NOKmlXb9epyly2', NULL, '2024-12-30 21:23:24', '2025-01-01 11:40:01');

-- --------------------------------------------------------

--
-- Table structure for table `websites`
--

CREATE TABLE `websites` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `websites`
--

INSERT INTO `websites` (`id`, `name`, `content`, `created_at`, `updated_at`) VALUES
(1, 'Panduan', '<h2>Panduan Penggunaan Website</h2><p>Selamat datang di website Desa Kronggahan! Berikut adalah panduan untuk memanfaatkan fitur-fitur yang tersedia:</p><ul><li><strong>Global Chat:</strong> Anda dapat menggunakan fitur ini untuk mengirim pesan kepada semua pengguna, baik user maupun admin. Akses fitur ini melalui menu <em>Chat</em>.</li><li><strong>Kontak Admin:</strong> Jika Anda memiliki pertanyaan atau memerlukan bantuan, gunakan menu <em>Service</em> untuk menghubungi admin secara langsung.</li><li><strong>Berita Terbaru:</strong> Temukan berita terkini tentang Desa Kronggahan di halaman utama.</li><li><strong>Berita Populer:</strong> Cek berita yang paling banyak dibaca atau direkomendasikan di bagian <em>Berita Populer</em>.</li></ul><p>Jika ada kendala, jangan ragu untuk menghubungi admin melalui menu <em>Service</em>.</p><p><br></p>', NULL, '2024-12-31 00:05:28'),
(2, 'About', '<h2>Tentang Website Desa Kronggahan</h2><p>Website Desa Kronggahan adalah platform informasi yang didedikasikan untuk masyarakat Desa Kronggahan. Kami menyediakan berita terkini, fitur interaktif seperti global chat, dan layanan untuk mempermudah komunikasi antara warga dan admin.</p><p>Melalui website ini, kami berharap dapat meningkatkan keterhubungan, transparansi, dan kemajuan Desa Kronggahan.</p><ul><li><strong>Misi:</strong> Menyediakan informasi terpercaya untuk masyarakat.</li><li><strong>Visi:</strong> Mewujudkan Desa Kronggahan yang terhubung secara digital.</li><li><strong>Fitur Utama:</strong> Global Chat, Berita Terkini, dan Layanan Kontak Admin.</li></ul><p><br></p>', NULL, '2024-12-31 00:06:17'),
(3, 'Perhatian', '<h2>Perhatian</h2><p>Mohon perhatikan hal-hal berikut saat menggunakan website Desa Kronggahan:</p><ul><li>Gunakan bahasa yang sopan saat menggunakan fitur <strong>Global Chat</strong>.</li><li>Informasi pribadi yang dikirim melalui <strong>Kontak Admin</strong> akan dijaga kerahasiaannya.</li><li>Berita yang ditampilkan sudah melalui proses kurasi, tetapi tetap waspada terhadap berita hoaks.</li><li>Patuhi aturan yang berlaku saat menggunakan website ini.</li></ul><p><br></p>', NULL, '2024-12-31 00:06:46'),
(4, 'Information', '<h2>Informasi Penting</h2><p>Berikut adalah beberapa informasi terkini yang perlu Anda ketahui:</p><ul><li><strong>Jadwal Layanan Desa:</strong> Pelayanan kantor desa buka setiap hari Senin-Jumat, pukul 08.00-15.00 WIB.</li><li><strong>Acara Desa:</strong> Jangan lewatkan acara gotong royong pada hari Minggu, 7 Januari 2024, di Balai Desa.</li><li><strong>Pendaftaran UMKM:</strong> Bagi warga yang memiliki usaha mikro, silakan daftarkan usaha Anda melalui menu <em>Service</em>.</li><li><strong>Cuaca Hari Ini:</strong> Berdasarkan prakiraan, Desa Kronggahan akan cerah berawan dengan suhu 28°C.</li></ul><p><br></p>', NULL, '2024-12-31 00:07:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Indexes for table `chat_messages`
--
ALTER TABLE `chat_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chat_messages_chat_room_id_foreign` (`chat_room_id`),
  ADD KEY `chat_messages_user_id_foreign` (`user_id`);

--
-- Indexes for table `chat_rooms`
--
ALTER TABLE `chat_rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chat_rooms_user_id_foreign` (`user_id`);

--
-- Indexes for table `engagements`
--
ALTER TABLE `engagements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `engagements_content_id_foreign` (`content_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_author_foreign` (`author`),
  ADD KEY `news_category_id_foreign` (`category_id`);

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
-- Indexes for table `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `websites`
--
ALTER TABLE `websites`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `chat_messages`
--
ALTER TABLE `chat_messages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT for table `chat_rooms`
--
ALTER TABLE `chat_rooms`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `engagements`
--
ALTER TABLE `engagements`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `social_media`
--
ALTER TABLE `social_media`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `websites`
--
ALTER TABLE `websites`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chat_messages`
--
ALTER TABLE `chat_messages`
  ADD CONSTRAINT `chat_messages_chat_room_id_foreign` FOREIGN KEY (`chat_room_id`) REFERENCES `chat_rooms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `chat_messages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `chat_rooms`
--
ALTER TABLE `chat_rooms`
  ADD CONSTRAINT `chat_rooms_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `engagements`
--
ALTER TABLE `engagements`
  ADD CONSTRAINT `engagements_content_id_foreign` FOREIGN KEY (`content_id`) REFERENCES `news` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_author_foreign` FOREIGN KEY (`author`) REFERENCES `users` (`email`) ON DELETE CASCADE,
  ADD CONSTRAINT `news_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
