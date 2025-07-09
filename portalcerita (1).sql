-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Jan 2025 pada 16.10
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portalcerita`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cerita`
--

CREATE TABLE `cerita` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `konten` text NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `cerita`
--

INSERT INTO `cerita` (`id`, `judul`, `deskripsi`, `konten`, `kategori`, `gambar`) VALUES
(12, 'sdfdf', 'sdfd', 'Rembulan menggantung di langit malam, menerangi sebuah lorong sempit di sudut kota tua. Lorong itu penuh dengan misteri, dengan tembok-temboknya yang retak dan tanaman liar yang tumbuh dari celah-celah batu bata. Di sana, seorang pemuda bernama Arga melangkah pelan, langkahnya menggema di antara dinding-dinding tua.\r\n\r\nArga baru saja pindah ke kota ini, meninggalkan hiruk-pikuk ibukota untuk mencari ketenangan. Ia menyewa kamar kecil di sebuah penginapan tua, tepat di ujung lorong itu. Malam ini, ia tidak bisa tidur. Pikiran tentang masa lalunya yang penuh tekanan membuatnya resah. Ia memutuskan untuk berjalan-jalan, mencoba menenangkan dirinya.\r\n\r\nSaat melangkah, Arga merasa ada sesuatu yang aneh. Udara di lorong itu terasa lebih dingin dari biasanya. Ia menghentikan langkahnya ketika mendengar suara gemerisik dari balik salah satu tembok. \"Siapa di sana?\" tanyanya, suaranya bergetar.\r\n\r\nTak ada jawaban. Hanya suara angin malam yang berhembus pelan. Namun, saat ia hendak melangkah lagi, sebuah suara lembut terdengar, \"Kau tidak akan menemukannya di sini.\"\r\n\r\nArga terkejut dan menoleh ke arah suara itu. Di ujung lorong, berdiri seorang wanita muda dengan gaun putih yang berkibar ditiup angin. Rambutnya panjang, dan wajahnya pucat namun memancarkan keindahan yang misterius.\r\n\r\n\"Maaf?\" Arga bertanya, bingung.\r\n\r\nWanita itu tersenyum tipis. \"Jawaban yang kau cari. Itu tidak ada di sini.\"\r\n\r\n\"Apa maksudmu?\" Arga merasa bulu kuduknya berdiri, tapi ada sesuatu dalam suara wanita itu yang membuatnya tetap berdiri di tempat.\r\n\r\nWanita itu tidak menjawab. Ia hanya mengangkat tangannya, menunjuk ke arah sebuah pintu kecil di sisi lorong. \"Masuklah, jika kau berani.\"\r\n\r\nArga ragu. Pintu itu terlihat tua dan rapuh, seperti sudah lama tidak digunakan. Namun, rasa penasaran mengalahkan ketakutannya. Ia melangkah mendekat dan membuka pintu itu dengan hati-hati.\r\n\r\nDi balik pintu, ia menemukan sebuah ruangan kecil yang dipenuhi buku-buku tua. Di tengah ruangan, ada meja kayu dengan sebuah lampu minyak yang masih menyala. Wanita itu muncul di belakangnya, tanpa suara.\r\n\r\n\"Ini adalah tempat di mana semua kenangan disimpan,\" kata wanita itu. \"Jika kau ingin melupakan rasa sakitmu, kau bisa meninggalkan kenanganmu di sini.\"\r\n\r\nArga menatapnya, bingung. \"Melupakan? Apa itu mungkin?\"\r\n\r\nWanita itu mengangguk. \"Tapi ada harga yang harus dibayar. Kau tidak akan pernah bisa mengingatnya lagi, bahkan jika kau ingin.\"\r\n\r\nArga terdiam. Ia memikirkan semua yang telah ia alami. Rasa sakit, kehilangan, dan penyesalan. Namun, ada juga kenangan indah yang terselip di antara semuanya. Kenangan bersama orang-orang yang ia cintai, senyuman mereka, dan pelajaran yang ia dapatkan.\r\n\r\n\"Aku tidak bisa,\" kata Arga akhirnya. \"Kenangan burukku adalah bagian dari diriku. Tanpa itu, aku bukanlah aku.\"\r\n\r\nWanita itu tersenyum lembut. \"Kau bijak, lebih bijak dari kebanyakan orang yang datang ke sini.\"\r\n\r\nSebelum Arga sempat bertanya lebih lanjut, wanita itu menghilang, meninggalkan aroma bunga melati di udara. Lampu minyak di meja padam dengan sendirinya, dan ruangan itu kembali menjadi gelap.\r\n\r\nArga melangkah keluar, menutup pintu itu dengan hati-hati. Lorong itu kini terasa berbeda. Udara tidak lagi dingin, dan suara angin malam terdengar lebih ramah. Ia melangkah kembali ke penginapannya dengan perasaan yang lebih ringan.\r\n\r\nMalam itu, untuk pertama kalinya sejak lama, Arga tidur dengan tenang. Ia menyadari bahwa melarikan diri dari masa lalu bukanlah jawabannya. Yang ia butuhkan adalah menerima semuanya, baik yang indah maupun yang pahit, sebagai bagian dari perjalanan hidupnya.', 'romansa', 'uploads/1.jpg'),
(13, 'ascc', 'asc', 'sacc', 'fiksi', 'uploads/7.jpg'),
(14, 'sdcdcdcsdcd', 'cdcc', 'cdcc', 'fiksi', 'uploads/1.jpg'),
(15, 'dascdf', 'dffffd', 'fsdffsdf', 'fiksi', 'uploads/Cuplikan layar 2024-08-13 233329.png'),
(16, 'xcxc', 'cxcxcs', 'scscs', 'fiksi', 'uploads/Cuplikan layar 2024-09-24 195702.png'),
(17, 'cscs', 'dcvd', 'dcsdccsd', 'fiksi', 'uploads/Cuplikan layar 2024-09-27 101751.png'),
(18, 'dccdcd', 'dcccdc', 'cscdcsc', 'fiksi', 'uploads/Cuplikan layar 2024-09-24 195702.png'),
(19, 'csdcsdcdsc', 'sdcscdsc', 'sdcsccsd', 'fiksi', 'uploads/Cuplikan layar 2024-09-27 102947.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_requests`
--

CREATE TABLE `user_requests` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pesan` text NOT NULL,
  `tanggal_request` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_requests`
--

INSERT INTO `user_requests` (`id`, `nama`, `email`, `pesan`, `tanggal_request`) VALUES
(2, 'bagas', 'bagas@gmail.com', 'tolong isi cerita tentang harmony', '2025-01-03 15:22:56'),
(6, 'assasd', 'asdasd@dsff.ds', 'asdasdasd', '2025-01-03 15:57:23');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `cerita`
--
ALTER TABLE `cerita`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_requests`
--
ALTER TABLE `user_requests`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `cerita`
--
ALTER TABLE `cerita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `user_requests`
--
ALTER TABLE `user_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
