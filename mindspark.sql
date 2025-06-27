-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 18 Bulan Mei 2025 pada 10.11
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mindspark`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bans`
--

CREATE TABLE `bans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Deskripsi` varchar(255) NOT NULL,
  `Ban_Until` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `UserID` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bukus`
--

CREATE TABLE `bukus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_buku` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL DEFAULT 0,
  `CoverBuku` varchar(255) DEFAULT NULL,
  `NamaBuku` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `isibuku` varchar(2000) DEFAULT NULL,
  `penerbit` varchar(255) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `jumlah_view` int(11) DEFAULT NULL,
  `tanggal_terbit` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `views` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bukus`
--

INSERT INTO `bukus` (`id`, `kode_buku`, `stok`, `CoverBuku`, `NamaBuku`, `deskripsi`, `isibuku`, `penerbit`, `penulis`, `jumlah_view`, `tanggal_terbit`, `created_at`, `updated_at`, `views`) VALUES
(1, '', 0, '', 'Laskar Pelangi', 'Novel inspiratif', '[[BAB]] Bab 1: Awal Cerita\r\nCerita dimulai saat Ikal menunggu pembukaan tahun ajaran baru di SD Muhammadiyah Gantong. Sekolah ini hampir ditutup karena hanya ada 9 murid baru. Untungnya, Lintang datang sebagai murid ke-10, sehingga sekolah tetap dibuka. Di sinilah lahir kelompok \"Laskar Pelangi\", dijuluki oleh Bu Muslimah karena semangat mereka yang luar biasa.\r\n\r\n\r\n[[BAB]] Bab 2: Anak-anak hidup dalam kemiskinan. Orang tua mereka mayoritas bekerja sebagai buruh tambang timah milik PN Timah. Mereka menghadapi ketimpangan sosial dengan sekolah-sekolah PN Timah yang megah, lengkap dengan fasilitas. Tapi semangat Laskar Pelangi tidak luntur.\r\n\r\n[[BAB]] Bab 3: Anak-anak sering mengikuti lomba untuk mewakili sekolah, meski dengan persiapan dan alat yang seadanya. Salah satu momen paling mengharukan adalah saat mereka mengikuti lomba cerdas cermat melawan sekolah elit. Dengan kecerdasan Lintang, mereka menang, membuktikan bahwa kemiskinan bukan penghalang prestasi.\r\n\r\n[[BAB]] Bab 4: Lintang terpaksa keluar dari sekolah karena ayahnya meninggal, dan ia harus menggantikan peran sebagai kepala keluarga. Ini menjadi pukulan berat bagi teman-temannya. Cerita juga menyinggung ketidakadilan sosial dan diskriminasi pendidikan.\r\n\r\n[[BAB]] Bab 4: Ikal mulai jatuh cinta pada seorang gadis cantik bernama A Ling yang ia temui di kantor pos. Cinta pertamanya ini menjadi motivasi baginya untuk bermimpi lebih besar, walaupun mereka berasal dari latar belakang yang berbeda.\r\n\r\n[[BAB]] Bab 5: Cerita ditutup dengan refleksi Ikal terhadap masa kecilnya. Meski hidup mereka penuh tantangan, namun Laskar Pelangi telah membentuk karakter, mimpi, dan semangat juang yang kuat. Sebagian dari mereka tumbuh dengan takdir yang berbeda, namun kenangan masa kecil tetap hidup dalam hati.', 'Bentang Pustaka', 'Andrea Hirata', NULL, '2025-05-18 07:36:01', '2025-02-03 00:19:22', '2025-05-18 00:36:01', 15),
(2, '', 0, '', 'Atomic Habits', 'Buku self-improvement', NULL, 'Penguin', 'James Clear', NULL, '2025-02-10 04:51:26', '2025-02-03 00:19:22', '2025-02-03 00:19:22', 0),
(3, '', 0, '', 'Pulang', 'Perjalanan hidup seorang anak yang harus menghadapi masa lalunya yang kelam.', NULL, 'Republika Penerbit', 'Tere Liye', NULL, '2025-05-18 07:30:52', '2025-02-10 12:05:01', '2025-05-18 00:30:52', 1),
(5, '', 0, '', 'Semua Ikan di Langit', 'Buku novel', NULL, 'Gramedia Widiasarana Indonesia', 'Ziggy Zeszyazeoviennazabrizkie', NULL, '2017-02-03 06:10:29', '2025-02-10 06:10:29', '2025-02-10 06:10:29', 0),
(6, '', 0, '', 'Bumi Manusia', 'Buku masa penjajahan oleh Belanda', NULL, 'Hasta Mitra', 'Pramoedya Ananta Toer', NULL, '1980-08-25 06:40:30', '2025-02-10 06:40:30', '2025-02-10 06:40:30', 0),
(31, '', 0, '', 'Laut Bercerita', 'Laut Bercerita novel yang mengisahkan perjuangan aktivis mahasiswa di era Orde Baru, terutama tokoh utama, Biru Laut. Menggambarkan bagaimana para aktivis yang melawan rezim harus menghadapi pengkhianatan, penculikan, hingga penghilangan paksa.', NULL, 'KPG (Kepustakaan Populer Gramedia)', 'Leila S. Chudori', NULL, '2017-10-16 12:13:48', '2025-02-10 12:13:48', '2025-02-10 12:13:48', 0),
(43, '', 0, '', 'Ronggeng Dukuh Paruk', 'Kisah Srintil, seorang penari ronggeng.', NULL, 'Gramedia Pustaka Utama', 'Ahmad Tohari', NULL, '1981-12-31 17:00:00', '1982-01-21 01:09:13', '2025-02-01 01:09:13', 0),
(46, '', 0, '', 'Cantik Itu Luka', 'Novel tentang Dewi Ayu dan keluarganya.', NULL, 'Gramedia Pustaka Utama', 'Eka Kurniawan', NULL, '2002-06-23 17:00:00', '2018-02-14 05:58:30', '2025-02-04 05:58:30', 0),
(48, '', 0, '', 'Harry Potter and the Sorcerer’s Stone', 'Novel pertama dalam seri Harry Potter.', NULL, 'Bloomsbury Publishing', 'J.K. Rowling', NULL, '2015-09-14 17:00:00', '2025-02-03 00:51:56', '2025-02-09 00:51:56', 0),
(50, '', 0, '', 'Bumi', 'Novel fantasi tentang dunia paralel.', NULL, 'Gramedia Pustaka Utama', 'Tere Liye', NULL, '2025-02-11 03:51:22', '2025-02-04 07:19:34', '2025-02-05 07:19:34', 0),
(51, '', 0, '', 'The 48 Laws of Power', 'Buku strategi tentang kekuasaan.', NULL, 'Viking Press', 'Robert Greene', NULL, '1998-08-31 17:00:00', '2025-02-04 07:19:34', '2025-02-10 07:19:34', 0),
(52, '', 0, '', 'The Hidden Life of Trees', 'Buku tentang bagaimana pohon berkomunikasi.', NULL, 'Greystone Books', 'Peter Wohlleben', NULL, '2016-09-12 17:00:00', '2025-02-10 07:24:23', '2025-02-10 07:24:23', 0),
(53, '', 0, '', 'A Brief History of Time', 'Buku tentang fisika teoretis.', NULL, 'Bantam Books', 'Stephen Hawking', NULL, '1988-04-18 17:00:00', '2025-02-03 07:24:23', '2025-02-07 07:24:23', 0),
(54, '', 0, '', 'One Piece (Vol. 1: Romance Dawn)', 'Petualangan bajak laut Monkey D. Luffy.', NULL, 'Shueisha', 'Eiichiro Oda', NULL, '1997-12-23 17:00:00', '2025-02-08 19:31:38', '2025-02-10 19:31:38', 0),
(55, '', 0, '', 'My Hero Academia (Vol. 1)', 'Izuku Midoriya bercita-cita menjadi pahlawan.', NULL, 'Shueisha', 'Kohei Horikoshi', NULL, '2014-12-03 17:00:00', '2025-02-01 19:31:38', '2025-02-09 19:31:38', 0),
(56, '', 0, '', 'Attack on Titan (Vol. 1)', 'Manusia bertahan hidup dari ancaman Titan.', NULL, 'Kodansha', 'Hajime Isayama', NULL, '2009-09-08 17:00:00', '2025-02-06 19:41:12', '2025-02-07 19:41:12', 0),
(57, '', 0, '', 'Moonlocket', 'Buku kedua dalam seri Cogheart Adventures.', NULL, 'Usborne Publishing Ltd', 'Peter Bunzl', NULL, '2017-04-30 17:00:00', '2025-02-09 19:41:12', '2025-02-10 19:41:12', 0),
(58, '', 0, '', 'Cogheart', 'Buku pertama dalam seri Cogheart Adventures.', NULL, 'Usborne Publishing Ltd', 'Peter Bunzl', NULL, '2016-08-31 17:00:00', '2025-02-04 19:54:26', '2025-02-06 19:54:26', 0),
(60, '', 0, '', 'Asih', 'Buku horror', NULL, 'Kawah Media', 'Risa Saraswati', NULL, '2025-02-12 01:39:24', '2025-02-11 17:59:49', '2025-02-11 18:39:24', 0),
(61, '', 0, '', 'Bandung After Rain', 'Bandung, romansa, dan Ra.', NULL, 'Black Swan Books', 'Wulan Nur Amalia', NULL, '2025-02-12 01:39:36', '2025-02-11 18:24:42', '2025-02-11 18:39:36', 0),
(62, '', 0, '', 'The Economic of Education', 'Pendidikan sebagai unit ekonomi atau unit bisnis lebih mengedepankan kebutuhan pasar', NULL, 'Gramedia Pustaka Utama', 'Prof. Dr. Veithzal Rivai Zainal, S.E., M.M., M.B.A', NULL, '2025-02-12 01:39:47', '2025-02-11 18:31:16', '2025-02-11 18:39:47', 0);

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
-- Struktur dari tabel `favorits`
--

CREATE TABLE `favorits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `UserID` bigint(20) UNSIGNED NOT NULL,
  `BukuID` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `favorits`
--

INSERT INTO `favorits` (`id`, `UserID`, `BukuID`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2025-02-03 00:19:22', '2025-02-03 00:19:22'),
(7, 6, 2, '2025-02-16 21:06:43', '2025-02-16 21:06:43'),
(8, 6, 1, '2025-02-16 21:19:22', '2025-02-16 21:19:22'),
(9, 6, 31, '2025-02-16 21:57:53', '2025-02-16 21:57:53'),
(11, 7, 2, '2025-02-17 01:05:08', '2025-02-17 01:05:08'),
(12, 7, 1, '2025-02-17 05:00:14', '2025-02-17 05:00:14'),
(13, 7, 55, '2025-02-17 05:08:20', '2025-02-17 05:08:20'),
(14, 8, 31, '2025-02-18 19:49:15', '2025-02-18 19:49:15'),
(15, 7, 60, '2025-02-23 03:45:46', '2025-02-23 03:45:46'),
(16, 7, 6, '2025-02-23 23:59:52', '2025-02-23 23:59:52'),
(17, 7, 31, '2025-04-29 20:48:59', '2025-04-29 20:48:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategoris`
--

CREATE TABLE `kategoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `NamaKategori` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategoris`
--

INSERT INTO `kategoris` (`id`, `NamaKategori`, `created_at`, `updated_at`) VALUES
(1, 'Fiksi', '2025-02-03 00:19:22', '2025-04-27 21:02:47'),
(2, 'Non-Fiksi', '2025-02-03 00:19:22', '2025-02-03 00:19:22'),
(3, 'Sains', NULL, NULL),
(4, 'Komik', NULL, NULL),
(5, 'Novel', NULL, NULL),
(6, 'Sejarah', NULL, NULL),
(7, 'Pendidikan', NULL, NULL),
(8, 'Horror', '2025-02-12 01:07:47', '2025-02-12 01:07:47'),
(9, 'Thriller', '2025-02-12 01:07:47', '2025-02-12 01:07:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_bukus`
--

CREATE TABLE `kategori_bukus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `BukuID` bigint(20) UNSIGNED NOT NULL,
  `KategoriID` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategori_bukus`
--

INSERT INTO `kategori_bukus` (`id`, `BukuID`, `KategoriID`, `created_at`, `updated_at`) VALUES
(11, 31, 1, '2025-02-12 01:40:02', '2025-02-19 01:40:02'),
(12, 3, 1, '2025-02-11 01:34:26', '2025-02-13 01:34:26'),
(13, 5, 1, '2025-02-11 01:34:26', '2025-02-03 01:34:26'),
(14, 1, 2, '2025-02-10 07:19:51', '2025-02-10 07:19:51'),
(15, 6, 6, '2025-02-18 01:35:37', '2025-02-10 01:35:37'),
(21, 5, 5, '2025-02-11 01:40:48', '2025-02-11 01:40:48'),
(22, 2, 7, '2025-02-10 07:19:51', '2025-02-10 07:19:51'),
(23, 31, 5, '2025-02-11 01:40:48', '2025-02-06 01:40:48'),
(25, 58, 1, NULL, NULL),
(26, 57, 5, NULL, NULL),
(27, 51, 2, NULL, NULL),
(28, 51, 7, NULL, NULL),
(29, 52, 3, NULL, NULL),
(30, 52, 7, NULL, NULL),
(31, 50, 1, NULL, NULL),
(32, 50, 5, NULL, NULL),
(33, 55, 1, NULL, NULL),
(34, 55, 4, NULL, NULL),
(35, 56, 1, NULL, NULL),
(36, 56, 4, NULL, NULL),
(37, 53, 2, NULL, NULL),
(38, 53, 3, NULL, NULL),
(39, 53, 7, NULL, NULL),
(40, 54, 1, NULL, NULL),
(41, 54, 5, NULL, NULL),
(42, 60, 5, NULL, NULL),
(47, 46, 5, NULL, NULL),
(48, 43, 1, NULL, NULL),
(49, 48, 1, NULL, NULL),
(50, 48, 5, NULL, NULL),
(51, 60, 8, NULL, NULL),
(52, 1, 5, NULL, NULL),
(53, 61, 1, NULL, NULL),
(54, 61, 5, NULL, NULL),
(55, 3, 5, NULL, NULL),
(56, 62, 7, NULL, NULL),
(59, 2, 3, NULL, NULL),
(64, 60, 1, NULL, NULL),
(71, 5, 7, NULL, NULL);

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_02_03_043405_create_kategoris_table', 1),
(6, '2025_02_03_043643_create_bukus_table', 1),
(7, '2025_02_03_043930_create_kategori_bukus_table', 1),
(8, '2025_02_03_044330_create_peminjaman_table', 1),
(9, '2025_02_03_044825_create_ulasans_table', 1),
(10, '2025_02_03_045202_create_favorits_table', 1),
(11, '2025_02_03_063814_create_warnings_table', 1),
(12, '2025_02_03_063822_create_bans_table', 1),
(13, '2025_02_11_040703_add_foto_to_users_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `UserID` bigint(20) UNSIGNED NOT NULL,
  `BukuID` bigint(20) UNSIGNED NOT NULL,
  `TanggalPeminjaman` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `TanggalPengembalian` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `StatusPeminjaman` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `UserID`, `BukuID`, `TanggalPeminjaman`, `TanggalPengembalian`, `StatusPeminjaman`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2025-05-14 00:26:40', '2025-05-13 17:26:40', 'returned', '2025-02-03 00:19:22', '2025-05-13 17:26:40');

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
-- Struktur dari tabel `ulasans`
--

CREATE TABLE `ulasans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `UserID` bigint(20) UNSIGNED NOT NULL,
  `BukuID` bigint(20) UNSIGNED NOT NULL,
  `Ulasan` text NOT NULL,
  `Rating` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ulasans`
--

INSERT INTO `ulasans` (`id`, `UserID`, `BukuID`, `Ulasan`, `Rating`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'Buku yang sangat menginspirasi.', 5, '2025-02-03 00:19:22', '2025-02-03 00:19:22'),
(2, 2, 6, 'Menginspirasi untuk kehidupan masa sekarang', 4, '2025-02-11 02:40:46', '2025-02-11 02:40:46'),
(3, 2, 6, 'Menarik banget', 4, '2025-02-11 02:40:46', '2025-02-05 02:40:46'),
(4, 6, 31, 'Bagus banget, sedih juga ceritanya...', 4, '2025-02-16 20:59:33', '2025-02-16 21:43:21'),
(6, 6, 62, 'cocok untuk belajar keuangan', 4, '2025-02-16 21:12:53', '2025-02-16 21:13:02'),
(11, 7, 6, 'bagusnyo', 4, '2025-02-17 18:11:03', '2025-02-17 19:17:45'),
(15, 7, 54, 'rame', 4, '2025-02-17 18:17:34', '2025-02-17 18:17:34'),
(20, 7, 62, 'bagus untuk yang mau tau tentang keuangan', 3, '2025-02-17 18:35:40', '2025-05-05 01:07:37'),
(26, 7, 51, 'sadsa', 3, '2025-02-17 19:03:03', '2025-02-17 19:03:03'),
(32, 6, 1, 'bagus', 2, '2025-02-17 20:04:43', '2025-02-17 20:04:53'),
(39, 6, 62, 'hnhgng', 4, '2025-02-18 17:47:10', '2025-02-18 17:47:10'),
(43, 8, 31, 'saddsa', 1, '2025-02-18 19:46:09', '2025-02-18 19:46:09'),
(44, 8, 31, 'sacc', 3, '2025-02-18 19:47:30', '2025-02-18 19:47:30'),
(45, 8, 31, 'xsassac', 2, '2025-02-18 19:48:46', '2025-02-18 19:48:46'),
(46, 8, 1, 'dasda', 2, '2025-02-18 19:53:36', '2025-02-18 19:53:36'),
(47, 8, 1, 'fdsfdsf', 4, '2025-02-18 19:55:06', '2025-02-18 19:55:06'),
(48, 8, 43, 'waw', 2, '2025-02-18 19:55:59', '2025-02-18 19:55:59'),
(49, 6, 1, 'dsadad', 5, '2025-02-18 20:10:26', '2025-02-18 20:10:26'),
(50, 8, 1, 'dsfsdf', 4, '2025-02-18 20:13:18', '2025-02-18 20:13:18'),
(52, 6, 2, 'swsw', 5, '2025-02-23 01:44:59', '2025-02-23 01:44:59'),
(59, 7, 2, 'bagus nya', 3, '2025-02-23 03:10:51', '2025-02-23 03:10:51'),
(68, 7, 60, 'sadasd', 4, '2025-02-23 03:54:45', '2025-02-23 04:48:25'),
(69, 7, 60, 'jgjgg', 2, '2025-02-23 03:57:40', '2025-02-23 03:57:40'),
(70, 7, 60, 'eqe', 4, '2025-02-23 03:59:19', '2025-02-23 03:59:19'),
(71, 7, 60, 'waw banget', 5, '2025-02-23 04:01:59', '2025-02-23 04:01:59'),
(72, 7, 2, 'rame banget2222', 5, '2025-02-23 04:52:26', '2025-05-05 01:00:08'),
(79, 7, 50, 'rame', 5, '2025-02-23 19:01:36', '2025-02-23 19:01:36'),
(81, 7, 2, 'b aja', 1, '2025-02-23 19:23:47', '2025-02-23 19:23:47'),
(83, 7, 6, 'rame', 4, '2025-02-24 00:05:53', '2025-02-24 00:05:53'),
(85, 7, 2, 'bagsnya', 3, '2025-04-21 00:20:10', '2025-04-21 00:20:10'),
(92, 7, 31, 'rame2222', 5, '2025-04-29 18:45:31', '2025-04-29 18:45:31'),
(93, 7, 31, 'sedih sekali', 5, '2025-04-29 18:45:43', '2025-04-29 18:45:43'),
(94, 7, 31, 'rawr', 4, '2025-04-29 19:05:30', '2025-04-29 20:01:42'),
(95, 7, 31, 'bagusss', 2, '2025-04-29 19:53:18', '2025-04-29 19:53:18'),
(97, 7, 43, 'bagus', 5, '2025-04-29 21:23:21', '2025-04-29 21:23:56'),
(98, 7, 3, 'cxzczxc', 3, '2025-04-29 21:25:15', '2025-04-29 21:25:15'),
(100, 7, 1, 'seru2', 4, '2025-05-04 23:58:14', '2025-05-04 23:58:14'),
(101, 7, 1, 'sdfsdfs', 1, '2025-05-05 00:00:44', '2025-05-05 00:00:44'),
(103, 7, 2, 'cscas', 3, '2025-05-05 00:17:58', '2025-05-05 00:17:58'),
(105, 7, 2, 'fdfsdf', 2, '2025-05-05 00:20:26', '2025-05-05 00:20:26'),
(106, 7, 5, 'bagusnya', 4, '2025-05-05 00:34:42', '2025-05-05 00:34:42'),
(108, 7, 2, 'seru2', 4, '2025-05-05 00:38:13', '2025-05-05 00:38:13'),
(109, 7, 2, 'sdad', 3, '2025-05-05 00:39:00', '2025-05-05 00:39:00'),
(110, 7, 2, 'mantap', 3, '2025-05-05 00:41:37', '2025-05-05 00:41:37'),
(111, 7, 2, 'saffasf', 4, '2025-05-05 00:43:52', '2025-05-05 00:43:52'),
(112, 7, 2, 'saffasf', 4, '2025-05-05 00:43:53', '2025-05-05 00:43:53'),
(113, 7, 2, 'saffasf', 4, '2025-05-05 00:43:53', '2025-05-05 00:43:53'),
(114, 7, 2, 'saffasf', 4, '2025-05-05 00:43:54', '2025-05-05 00:43:54'),
(115, 7, 2, 'MANTAP', 4, '2025-05-05 00:47:02', '2025-05-05 00:47:02'),
(116, 7, 2, 'bagus', 2, '2025-05-05 00:53:26', '2025-05-05 01:01:44'),
(119, 7, 1, 'bagus', 2, '2025-05-13 17:25:47', '2025-05-13 17:25:47'),
(120, 7, 2, 'mantap', 2, '2025-05-13 19:04:48', '2025-05-13 19:04:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nis` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `jumlah_pelanggaran` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nis`, `nama`, `foto`, `email`, `alamat`, `password`, `role`, `jumlah_pelanggaran`, `created_at`, `updated_at`) VALUES
(2, 67890, 'User', '', 'user@example.com', 'Bandung', '$2y$12$Zg5Ww7Z.0CYsSeuQkoo3IO5kd1UlqpYjdYSwdKRpE4XMalCvSBHKC', 'user', 0, '2025-02-03 00:19:22', '2025-02-03 00:19:22'),
(3, 817555, 'Irma', '', 'irmalistiya23@gmail.com', 'Bandung', 'irma', 'user', 0, '2025-02-11 12:52:41', '2025-02-11 12:52:41'),
(6, 32423, 'mima', 'vMK4FQRwZXgW5gJTb9K18D3KXilBrpClmiPFm8Ne.jpg', 'mima@gmail.com', 'bandung', '$2y$12$JHP/Wp9UsFv3KjQJ.UibjOkEmpx.JtMM9kJ87KdGe2noFnA98kxo6', 'user', 0, '2025-02-16 19:35:29', '2025-02-18 17:58:32'),
(7, 2321321, 'Irma Listiya Wardhani', 'LeY2vjRHQGJ6s48HZt8iSsgwS5SpwSONFt6zQoOT.jpg', 'raup@gmail.com', 'bandung', '$2y$12$dNLZxaZEmEwrwdj4ny211u4eAgBvFD3cH6SUTnkoA.aGCJI/MxE0C', 'user', 0, '2025-02-16 22:54:18', '2025-04-28 22:43:46'),
(8, 2313233213, 'shermi', 'vpcWiI36XLVO9lg2RPyjSmVplnJyjVqscicoaz1E.jpg', 'shermy@gmail.com', 'bandung', '$2y$12$7D6QgS3Noe5mHUvfilXBmewurAG6qSHxB5cahzCgAXn.YAkZE864q', 'user', 0, '2025-02-18 19:34:34', '2025-02-18 19:53:02'),
(13, 8371, 'admin', 'sdRMMkyq4CcqHM60rQ61ogZdXW2TaIWePBTT39fz.jpg', 'admin@gmail.com', 'bandung', '$2y$12$ZXxXJ0/alvv2Rnyl5R2EXOQkzL81pnousdhW.LKpINE/WPcSoo5Vu', 'administrator', 0, '2025-04-27 23:31:14', '2025-04-28 19:49:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `warnings`
--

CREATE TABLE `warnings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `UserID` bigint(20) UNSIGNED NOT NULL,
  `pelanggaran` enum('Terlambat Mengembalikan','Merusak Buku','Menghilangkan Buku','Meminjam Melebihi Batas') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bans`
--
ALTER TABLE `bans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bans_userid_foreign` (`UserID`);

--
-- Indeks untuk tabel `bukus`
--
ALTER TABLE `bukus`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `favorits`
--
ALTER TABLE `favorits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favorits_userid_foreign` (`UserID`),
  ADD KEY `favorits_bukuid_foreign` (`BukuID`);

--
-- Indeks untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori_bukus`
--
ALTER TABLE `kategori_bukus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori_bukus_bukuid_foreign` (`BukuID`),
  ADD KEY `kategori_bukus_kategoriid_foreign` (`KategoriID`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `peminjaman_userid_foreign` (`UserID`),
  ADD KEY `peminjaman_bukuid_foreign` (`BukuID`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `ulasans`
--
ALTER TABLE `ulasans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ulasans_userid_foreign` (`UserID`),
  ADD KEY `ulasans_bukuid_foreign` (`BukuID`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `warnings`
--
ALTER TABLE `warnings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `warnings_userid_foreign` (`UserID`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bans`
--
ALTER TABLE `bans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `bukus`
--
ALTER TABLE `bukus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `favorits`
--
ALTER TABLE `favorits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `kategori_bukus`
--
ALTER TABLE `kategori_bukus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ulasans`
--
ALTER TABLE `ulasans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `warnings`
--
ALTER TABLE `warnings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bans`
--
ALTER TABLE `bans`
  ADD CONSTRAINT `bans_userid_foreign` FOREIGN KEY (`UserID`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `favorits`
--
ALTER TABLE `favorits`
  ADD CONSTRAINT `favorits_bukuid_foreign` FOREIGN KEY (`BukuID`) REFERENCES `bukus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favorits_userid_foreign` FOREIGN KEY (`UserID`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kategori_bukus`
--
ALTER TABLE `kategori_bukus`
  ADD CONSTRAINT `kategori_bukus_bukuid_foreign` FOREIGN KEY (`BukuID`) REFERENCES `bukus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `kategori_bukus_kategoriid_foreign` FOREIGN KEY (`KategoriID`) REFERENCES `kategoris` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_bukuid_foreign` FOREIGN KEY (`BukuID`) REFERENCES `bukus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `peminjaman_userid_foreign` FOREIGN KEY (`UserID`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `ulasans`
--
ALTER TABLE `ulasans`
  ADD CONSTRAINT `ulasans_bukuid_foreign` FOREIGN KEY (`BukuID`) REFERENCES `bukus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ulasans_userid_foreign` FOREIGN KEY (`UserID`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `warnings`
--
ALTER TABLE `warnings`
  ADD CONSTRAINT `warnings_userid_foreign` FOREIGN KEY (`UserID`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
