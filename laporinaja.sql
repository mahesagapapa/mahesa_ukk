-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Mar 2023 pada 08.58
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laporinaja`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `kategori`) VALUES
(1, 'asdasdasd'),
(2, 'dsa'),
(3, 'Kejahatan'),
(4, 'lingkungan hidup');

-- --------------------------------------------------------

--
-- Struktur dari tabel `masyarakat`
--

CREATE TABLE `masyarakat` (
  `id` int(11) NOT NULL,
  `nik` int(16) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(128) NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `active` enum('active','suspend') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `masyarakat`
--

INSERT INTO `masyarakat` (`id`, `nik`, `nama`, `username`, `password`, `telepon`, `active`) VALUES
(13, 321, 'qwe', 'qwe', '$2y$10$5QiS0MipSBl6sbiIaLqNFemVcMeFBRQXjMoDteTL7P2SZRI7YdFda', '123', 'active'),
(14, 2121, 'petugasukk', 'petugasukk', '$2y$10$xvUG7ozyjP9/87YBI4kveu4o1lP8.s.rGn6V8/zjt.bv1UPAAz79G', '2121', 'active'),
(15, 212121, 'userukk', 'userukk', '$2y$10$mZMF3iOG8vxBUheK9vdv.uJAB/diCo5zB5.16jat7SP89tHFzwsIq', '212121', 'active'),
(16, 212121, 'asdasdasd', 'asdasdasd', '$2y$10$ehfOCW5NK3s810pkY825aeHGwi9c9zLprdnUFG5rHzxM3RjVNHa5y', '212121', 'active'),
(17, 212121, 'asdasdasd', 'asdasdasd', '$2y$10$XTX.pl5uBLYYca/0BscyUOYzDIfzV8d0I74aaJvls/er80MvE8892', '212121', 'active'),
(18, 232323, 'masyarakat', 'masyarakat', '$2y$10$VjPFJStyZFkxICTNfjY2V.syrr/ra93ESGkbGtllVamZcbc8ZSqI.', '23223', 'active');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` int(11) NOT NULL,
  `tanggal_pengaduan` date NOT NULL,
  `nik` varchar(16) NOT NULL,
  `kategori` varchar(128) NOT NULL,
  `subkategori` varchar(128) NOT NULL,
  `isi_laporan` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` enum('0','proses','selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `tanggal_pengaduan`, `nik`, `kategori`, `subkategori`, `isi_laporan`, `foto`, `status`) VALUES
(7, '2023-02-14', '234728934', ' 2', '4', 'gyuyut87', 'Adit-PBO.PNG', 'proses'),
(9, '2023-02-08', '234728934', ' 2', '4', 'asdwa312', 'tool_bar1.PNG', 'proses'),
(10, '2023-02-02', '234728934', ' 3', '6', 'adqasd123', 'Silver_Surfer.jpg', 'proses'),
(11, '2023-02-20', '234728934', ' 2', '4', 'asd21312asd', 'SIKEL_SENG_KIWO_NOMER_2.png', 'proses'),
(12, '2023-03-14', '321', ' 2', '4', 'weq', 'download (3).jfif', '0'),
(13, '2023-03-14', '321', ' 1', '2', 'weq', '35d711bbd94ea4a851e1d3aa98471a6b.jpg', '0'),
(14, '2023-03-14', '321', ' 2', '4', 'weqe', 'download (3).jfif', '0'),
(15, '2023-03-20', '212121', ' 3', '5', 'kartu ukk ilang\r\n', '', 'proses'),
(16, '2023-03-20', '212121', ' 3', '5', 'qwqwqw', 'carbon_(1).png', '0'),
(17, '2023-03-20', '212121', ' 3', '5', 'dffdf', 'carbon_(1)1.png', '0'),
(18, '2023-03-20', '232323', ' 3', '5', 'as', '34461866_195275334628322_8408347742706860032_n.jpg', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(128) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `level` enum('admin','petugas') NOT NULL,
  `active` enum('active','suspend') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `username`, `password`, `telp`, `level`, `active`) VALUES
(17, 'adminnnnnn', 'adminnnnnn', '$2y$10$fTgeioBQRABJlJlEE7TZwedssOV72i9OiIvYFEk14UAoeqb/.UdIm', '212112', 'admin', 'active'),
(18, 'adminukk', 'adminukk', '$2y$10$2k7k.TgsQS8/EXZ1Z9.8OeQOQlr43cWinlTyzz.THYmkI5grLAIwW', '211221', 'admin', 'active'),
(19, 'admin3', 'admin3', '$2y$10$c9ss9U3.UPUZxAqr9HPuL.FzcMqwou.CWxEMZ8oAvZz.a43fdPEeS', '2121', 'admin', 'active'),
(20, 'petugasukk', 'petugasukk', '$2y$10$5xYgtNOz1m05Qfib87KOY.H3qidUwxEO3CMEvzXhgQp0fQN0Rksba', '212121', 'petugas', 'active');

-- --------------------------------------------------------

--
-- Struktur dari tabel `subkategori`
--

CREATE TABLE `subkategori` (
  `id_subkategori` int(128) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `sub_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `subkategori`
--

INSERT INTO `subkategori` (`id_subkategori`, `id_kategori`, `sub_kategori`) VALUES
(1, 1, 'asdasdads'),
(2, 1, 'asdasd'),
(3, 2, 'dsasdasdasdasd'),
(4, 2, '213123213'),
(5, 3, 'Jambret'),
(6, 3, 'Maling asd'),
(7, 3, 'penculik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tanggapan`
--

CREATE TABLE `tanggapan` (
  `id_tanggapan` int(11) NOT NULL,
  `id_pengaduan` int(11) NOT NULL,
  `tgl_tanggapan` date NOT NULL,
  `tanggapan` text NOT NULL,
  `id_petugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tanggapan`
--

INSERT INTO `tanggapan` (`id_tanggapan`, `id_pengaduan`, `tgl_tanggapan`, `tanggapan`, `id_petugas`) VALUES
(14, 7, '2023-02-20', 'kasian dek', 11),
(15, 9, '2023-02-20', 'aisodjoiwwoasd', 11),
(16, 11, '2023-02-21', 'asd2w13sdfsd', 11),
(17, 10, '2023-02-21', 'd213as123', 14),
(18, 10, '2023-02-21', 'sdfsdfse', 11),
(19, 15, '2023-03-20', 'as', 19);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `subkategori`
--
ALTER TABLE `subkategori`
  ADD PRIMARY KEY (`id_subkategori`);

--
-- Indeks untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD PRIMARY KEY (`id_tanggapan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `masyarakat`
--
ALTER TABLE `masyarakat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `subkategori`
--
ALTER TABLE `subkategori`
  MODIFY `id_subkategori` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  MODIFY `id_tanggapan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
