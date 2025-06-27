-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 19 Bulan Mei 2025 pada 13.31
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
-- Struktur dari tabel `bukus`
--

CREATE TABLE `bukus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_buku` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL DEFAULT 0,
  `CoverBuku` varchar(255) DEFAULT NULL,
  `NamaBuku` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `isibuku` longtext DEFAULT NULL,
  `penerbit` varchar(255) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `jumlah_view` int(11) DEFAULT NULL,
  `tanggal_terbit` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `views` int(100) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bukus`
--

INSERT INTO `bukus` (`id`, `kode_buku`, `stok`, `CoverBuku`, `NamaBuku`, `deskripsi`, `isibuku`, `penerbit`, `penulis`, `jumlah_view`, `tanggal_terbit`, `created_at`, `updated_at`, `views`) VALUES
(1, '', 0, 'lp.jpg', 'Laskar Pelangi', 'Novel inspiratif untuk anak-anak', '[[BAB]] Bab 1: Awal Cerita\r\nCerita dimulai saat Ikal menunggu pembukaan tahun ajaran baru di SD Muhammadiyah Gantong. Sekolah ini hampir ditutup karena hanya ada 9 murid baru. Untungnya, Lintang datang sebagai murid ke-10, sehingga sekolah tetap dibuka. Di sinilah lahir kelompok \"Laskar Pelangi\", dijuluki oleh Bu Muslimah karena semangat mereka yang luar biasa.\r\nAnak-anak hidup dalam kemiskinan. Orang tua mereka mayoritas bekerja sebagai buruh tambang timah milik PN Timah. Mereka menghadapi ketimpangan sosial dengan sekolah-sekolah PN Timah yang megah, lengkap dengan fasilitas. Tapi semangat Laskar Pelangi tidak luntur. Anak-anak sering mengikuti lomba untuk mewakili sekolah, meski dengan persiapan dan alat yang seadanya. Salah satu momen paling mengharukan adalah saat mereka mengikuti lomba cerdas cermat melawan sekolah elit. Dengan kecerdasan Lintang, mereka menang, membuktikan bahwa kemiskinan bukan penghalang prestasi.\r\nLintang terpaksa keluar dari sekolah karena ayahnya meninggal, dan ia harus menggantikan peran sebagai kepala keluarga. Ini menjadi pukulan berat bagi teman-temannya. Cerita juga menyinggung ketidakadilan sosial dan diskriminasi pendidikan.\r\nIkal mulai jatuh cinta pada seorang gadis cantik bernama A Ling yang ia temui di kantor pos. Cinta pertamanya ini menjadi motivasi baginya untuk bermimpi lebih besar, walaupun mereka berasal dari latar belakang yang berbeda.\r\nCerita ditutup dengan refleksi Ikal terhadap masa kecilnya. Meski hidup mereka penuh tantangan, namun Laskar Pelangi telah membentuk karakter, mimpi, dan semangat juang yang kuat. Sebagian dari mereka tumbuh dengan takdir yang berbeda, namun kenangan masa kecil tetap hidup dalam hati.\r\n\r\n[[BAB]] Bab 2: Awal Cerita\r\nCerita dimulai saat Ikal menunggu pembukaan tahun ajaran baru di SD Muhammadiyah Gantong. Sekolah ini hampir ditutup karena hanya ada 9 murid baru. Untungnya, Lintang datang sebagai murid ke-10, sehingga sekolah tetap dibuka. Di sinilah lahir kelompok \"Laskar Pelangi\", dijuluki oleh Bu Muslimah karena semangat mereka yang luar biasa.\r\nAnak-anak hidup dalam kemiskinan. Orang tua mereka mayoritas bekerja sebagai buruh tambang timah milik PN Timah. Mereka menghadapi ketimpangan sosial dengan sekolah-sekolah PN Timah yang megah, lengkap dengan fasilitas. Tapi semangat Laskar Pelangi tidak luntur. Anak-anak sering mengikuti lomba untuk mewakili sekolah, meski dengan persiapan dan alat yang seadanya. Salah satu momen paling mengharukan adalah saat mereka mengikuti lomba cerdas cermat melawan sekolah elit. Dengan kecerdasan Lintang, mereka menang, membuktikan bahwa kemiskinan bukan penghalang prestasi.\r\nLintang terpaksa keluar dari sekolah karena ayahnya meninggal, dan ia harus menggantikan peran sebagai kepala keluarga. Ini menjadi pukulan berat bagi teman-temannya. Cerita juga menyinggung ketidakadilan sosial dan diskriminasi pendidikan.\r\nIkal mulai jatuh cinta pada seorang gadis cantik bernama A Ling yang ia temui di kantor pos. Cinta pertamanya ini menjadi motivasi baginya untuk bermimpi lebih besar, walaupun mereka berasal dari latar belakang yang berbeda.\r\nCerita ditutup dengan refleksi Ikal terhadap masa kecilnya. Meski hidup mereka penuh tantangan, namun Laskar Pelangi telah membentuk karakter, mimpi, dan semangat juang yang kuat. Sebagian dari mereka tumbuh dengan takdir yang berbeda, namun kenangan masa kecil tetap hidup dalam hati.', 'Bentang Pustaka', 'Andrea Hirata', NULL, '2025-05-19 11:11:09', '2025-02-03 00:19:22', '2025-05-18 21:04:41', 15),
(2, '', 0, 'ah.jpg', 'Atomic Habits', 'Buku self-improvement', NULL, 'Penguin', 'James Clear', NULL, '2025-05-19 06:03:44', '2025-02-03 00:19:22', '2025-02-03 00:19:22', 3),
(3, '', 0, 'pulang.jpg', 'Pulang', 'Perjalanan hidup seorang anak yang harus menghadapi masa lalunya yang kelam.', '[[BAB]] Bab 1: Awal Cerita\r\nCerita dimulai saat Ikal menunggu pembukaan tahun ajaran baru di SD Muhammadiyah Gantong. Sekolah ini hampir ditutup karena hanya ada 9 murid baru. Untungnya, Lintang datang sebagai murid ke-10, sehingga sekolah tetap dibuka. Di sinilah lahir kelompok \"Laskar Pelangi\", dijuluki oleh Bu Muslimah karena semangat mereka yang luar biasa.\r\n\r\n\r\n[[BAB]] Bab 2: Anak-anak hidup dalam kemiskinan. Orang tua mereka mayoritas bekerja sebagai buruh tambang timah milik PN Timah. Mereka menghadapi ketimpangan sosial dengan sekolah-sekolah PN Timah yang megah, lengkap dengan fasilitas. Tapi semangat Laskar Pelangi tidak luntur.\r\n\r\n[[BAB]] Bab 3: Anak-anak sering mengikuti lomba untuk mewakili sekolah, meski dengan persiapan dan alat yang seadanya. Salah satu momen paling mengharukan adalah saat mereka mengikuti lomba cerdas cermat melawan sekolah elit. Dengan kecerdasan Lintang, mereka menang, membuktikan bahwa kemiskinan bukan penghalang prestasi.\r\n\r\n[[BAB]] Bab 4: Lintang terpaksa keluar dari sekolah karena ayahnya meninggal, dan ia harus menggantikan peran sebagai kepala keluarga. Ini menjadi pukulan berat bagi teman-temannya. Cerita juga menyinggung ketidakadilan sosial dan diskriminasi pendidikan.\r\n\r\n[[BAB]] Bab 4: Ikal mulai jatuh cinta pada seorang gadis cantik bernama A Ling yang ia temui di kantor pos. Cinta pertamanya ini menjadi motivasi baginya untuk bermimpi lebih besar, walaupun mereka berasal dari latar belakang yang berbeda.\r\n\r\n[[BAB]] Bab 5: Cerita ditutup dengan refleksi Ikal terhadap masa kecilnya. Meski hidup mereka penuh tantangan, namun Laskar Pelangi telah membentuk karakter, mimpi, dan semangat juang yang kuat. Sebagian dari mereka tumbuh dengan takdir yang berbeda, namun kenangan masa kecil tetap hidup dalam hati.', 'Republika Penerbit', 'Tere Liye', NULL, '2025-05-19 01:15:22', '2025-02-10 12:05:01', '2025-05-18 00:30:52', 1),
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

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bukus`
--
ALTER TABLE `bukus`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bukus`
--
ALTER TABLE `bukus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
