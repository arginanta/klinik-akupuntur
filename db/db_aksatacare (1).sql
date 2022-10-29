-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Okt 2022 pada 12.58
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
-- Database: `db_aksatacare`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id_akun`, `nama`, `username`, `email`, `password`, `level`) VALUES
(2, 'Admin', 'admin', 'admin@gmail.com', '$2y$10$QouCmAp75JWsuFk4zp0H2.B7TqBpjD3bgpRGmFT3NK5ZUXJFIMHHa', ''),
(3, 'Lisa', 'lisa', 'lisa@gmail.com', '$2y$10$JmRyHTodOXX7KQVB2Pvp5OZEKMMGkYSPa3Xt8QGwoqpHzSRISTAwG', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` varchar(50) NOT NULL,
  `nama_dokter` varchar(100) NOT NULL,
  `spesialis` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nama_dokter`, `spesialis`, `alamat`, `no_telp`) VALUES
('DOKTER-281022-1', 'Adit', 'qeqewq', '<p>Alamat</p>\r\n', '1231231321');

-- --------------------------------------------------------

--
-- Struktur dari tabel `finance`
--

CREATE TABLE `finance` (
  `id_finance` int(11) NOT NULL,
  `id_rm` varchar(50) NOT NULL,
  `nama_pasien` varchar(30) NOT NULL,
  `jenis_pelayanan` varchar(250) NOT NULL,
  `biaya_pokok` varchar(255) NOT NULL,
  `biaya_layanan` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `finance`
--

INSERT INTO `finance` (`id_finance`, `id_rm`, `nama_pasien`, `jenis_pelayanan`, `biaya_pokok`, `biaya_layanan`, `total`, `created_at`) VALUES
(2, 'RM-291022-1', 'Arginanta', 'Ear Candle', '29998', '800000', '770002', '2022-10-28 20:39:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` varchar(50) NOT NULL,
  `nama_pasien` varchar(100) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `usia` int(3) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nama_pasien`, `nik`, `usia`, `jenis_kelamin`, `alamat`, `no_telp`) VALUES
('PSN-281022-1', 'Arginanta', '123132132', 21, 'Perempuan', 'Wonoayu Sidoarjo', '12313213'),
('PSN-281022-2', 'Kevira', '123132132', 21, 'Laki-Laki', 'Wonoayu Sidoarjo', '123123132'),
('PSN-291022-3', 'Lisaaaa wadidaw', '123132131', 3, 'Perempuan', '<p>Wono elek</p>\r\n', '1231231231');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelayanan`
--

CREATE TABLE `pelayanan` (
  `id_pelayanan` int(11) NOT NULL,
  `jenis_pelayanan` varchar(30) NOT NULL,
  `biaya_pokok` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelayanan`
--

INSERT INTO `pelayanan` (`id_pelayanan`, `jenis_pelayanan`, `biaya_pokok`) VALUES
(8, 'Akupuntur Body', '57541'),
(9, 'Akupuntur Wajah', '56541'),
(10, 'Totok Wajah', '46716'),
(11, 'Pijat Bayi 0-1TH', '40638'),
(12, 'Pijat Bayi 1-5TH', '40638'),
(13, 'Pijat Anak 5-7TH', '40638'),
(14, 'Bekam Kering', '50416'),
(15, 'Moksa (1-10 Titik)', '37916'),
(16, 'Infrared Lamp', '37083'),
(17, 'Paket Tes Chol SD AU', '45208'),
(18, 'Ear Candle', '29998');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekammedis`
--

CREATE TABLE `rekammedis` (
  `id_rm` varchar(50) NOT NULL,
  `id_pasien` varchar(50) NOT NULL,
  `keluhan` text NOT NULL,
  `id_dokter` varchar(50) NOT NULL,
  `diagnosa` text NOT NULL,
  `terapi` text NOT NULL,
  `tgl_periksa` date NOT NULL,
  `id_pelayanan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rekammedis`
--

INSERT INTO `rekammedis` (`id_rm`, `id_pasien`, `keluhan`, `id_dokter`, `diagnosa`, `terapi`, `tgl_periksa`, `id_pelayanan`) VALUES
('RM-291022-1', 'PSN-281022-1', 'Kepala', 'DOKTER-281022-1', 'asdasd', 'gdg2', '2022-10-29', 18),
('RM-291022-2', 'PSN-281022-1', 'Sesak Napas2', 'DOKTER-281022-1', '<p>Dianosaa lisa</p>\r\n', 'Paha', '2022-10-29', 16),
('RM-291022-3', 'PSN-281022-2', 'Sesak Napas', 'DOKTER-281022-1', '<p>Papa<br />\r\n&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Kaki</p>\r\n', 'qwdqwdqwd', '2022-10-29', 17);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indeks untuk tabel `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indeks untuk tabel `finance`
--
ALTER TABLE `finance`
  ADD PRIMARY KEY (`id_finance`),
  ADD KEY `fk_finance_rekammedis` (`id_rm`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indeks untuk tabel `pelayanan`
--
ALTER TABLE `pelayanan`
  ADD PRIMARY KEY (`id_pelayanan`);

--
-- Indeks untuk tabel `rekammedis`
--
ALTER TABLE `rekammedis`
  ADD PRIMARY KEY (`id_rm`),
  ADD KEY `fk_rekammdesi_pasien` (`id_pasien`),
  ADD KEY `fk_rekammedis_dokter` (`id_dokter`),
  ADD KEY `fk_rekammedis_pelayanan` (`id_pelayanan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `finance`
--
ALTER TABLE `finance`
  MODIFY `id_finance` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pelayanan`
--
ALTER TABLE `pelayanan`
  MODIFY `id_pelayanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `finance`
--
ALTER TABLE `finance`
  ADD CONSTRAINT `fk_finance_rekammedis` FOREIGN KEY (`id_rm`) REFERENCES `rekammedis` (`id_rm`);

--
-- Ketidakleluasaan untuk tabel `rekammedis`
--
ALTER TABLE `rekammedis`
  ADD CONSTRAINT `fk_rekammdesi_pasien` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`),
  ADD CONSTRAINT `fk_rekammedis_dokter` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`),
  ADD CONSTRAINT `fk_rekammedis_pelayanan` FOREIGN KEY (`id_pelayanan`) REFERENCES `pelayanan` (`id_pelayanan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
