-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Okt 2022 pada 12.23
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_akupuntur`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `finance`
--

CREATE TABLE `finance` (
  `id_finance` int(11) NOT NULL,
  `no_rm` varchar(30) NOT NULL,
  `nama_pasien` varchar(30) NOT NULL,
  `jenis_pelayanan` varchar(250) NOT NULL,
  `biaya_pokok` varchar(255) NOT NULL,
  `biaya_layanan` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `tanggal_input` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `jenis_pelayanan` varchar(255) NOT NULL,
  `biaya_pokok` varchar(255) NOT NULL,
  `tgl_input` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `jenis_pelayanan`, `biaya_pokok`, `tgl_input`) VALUES
(13, 'Akupuntur Body', '57541', '2022-09-19 13:14:51'),
(14, 'Akupuntur Wajah', '56541', '2022-09-19 13:16:27'),
(15, 'Totok Wajah', '46716', '2022-09-19 13:21:26'),
(16, 'Pijat Bayi 0-1TH', '40638', '2022-09-19 13:21:56'),
(17, 'Pijat Bayi 1-5TH', '40638', '2022-09-19 13:22:24'),
(18, 'Pijat Anak 5-7TH', '40638', '2022-09-19 13:22:58'),
(19, 'Bekam Kering', '50416', '2022-09-19 13:23:15'),
(20, 'Moksa (1-10 Titik)', '37916', '2022-09-19 13:23:38'),
(21, 'Infrared Lamp', '37083', '2022-09-19 13:25:08'),
(22, 'Paket Tes Chol SD AU', '45208', '2022-09-19 13:25:39'),
(23, 'Ear Candle', '29998', '2022-09-19 13:25:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `klinik`
--

CREATE TABLE `klinik` (
  `id_klinik` int(11) NOT NULL,
  `nama_klinik` varchar(255) NOT NULL,
  `alamat_klinik` text NOT NULL,
  `tlp` varchar(255) NOT NULL,
  `nama_pemilik` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `klinik`
--

INSERT INTO `klinik` (`id_klinik`, `nama_klinik`, `alamat_klinik`, `tlp`, `nama_pemilik`) VALUES
(1, 'Klinik Jaya', 'Surabaya', '089618173609', 'Kevira');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `no_rm` varchar(30) NOT NULL,
  `last_visit` date NOT NULL,
  `nama_pasien` varchar(100) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `alamat` text NOT NULL,
  `usia` int(5) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekammedis`
--

CREATE TABLE `rekammedis` (
  `id_rekammedis` int(5) NOT NULL,
  `no_rm` varchar(255) NOT NULL,
  `nama_pasien` varchar(100) NOT NULL,
  `keluhan` text DEFAULT NULL,
  `terapi` text DEFAULT NULL,
  `id_kategori` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `finance`
--
ALTER TABLE `finance`
  ADD PRIMARY KEY (`id_finance`),
  ADD KEY `no_rm` (`no_rm`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `klinik`
--
ALTER TABLE `klinik`
  ADD PRIMARY KEY (`id_klinik`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`no_rm`);

--
-- Indeks untuk tabel `rekammedis`
--
ALTER TABLE `rekammedis`
  ADD PRIMARY KEY (`id_rekammedis`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `finance`
--
ALTER TABLE `finance`
  MODIFY `id_finance` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `klinik`
--
ALTER TABLE `klinik`
  MODIFY `id_klinik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `rekammedis`
--
ALTER TABLE `rekammedis`
  MODIFY `id_rekammedis` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
