-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Sep 2023 pada 14.37
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
-- Database: `informasi_buah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buah`
--

CREATE TABLE `buah` (
  `id_buah` int(3) NOT NULL,
  `nama_buah` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `gas`
--

CREATE TABLE `gas` (
  `id_buah` int(3) NOT NULL,
  `gas_buah` int(3) NOT NULL,
  `tanggal_data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `suhu`
--

CREATE TABLE `suhu` (
  `id_buah` int(3) NOT NULL,
  `suhu_buah` int(11) NOT NULL,
  `tanggal_data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`username`, `password`) VALUES
('admin', '$2y$10$BFQHHbKjK5Ahzm95VgpMtefr170YDwJLXlgfGko375Ff31Ch9MfVa'),
('user', '$2y$10$8MWSqFnM1YKAfgKcKjg8dOc2XMpeGpJewbK2dEq3.7Zcbb.wsmaA.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `waktu`
--

CREATE TABLE `waktu` (
  `id_buah` int(3) NOT NULL,
  `tanggal_data` date NOT NULL,
  `jam_data` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buah`
--
ALTER TABLE `buah`
  ADD PRIMARY KEY (`id_buah`);

--
-- Indeks untuk tabel `gas`
--
ALTER TABLE `gas`
  ADD KEY `id_buah` (`id_buah`),
  ADD KEY `tanggal_data` (`tanggal_data`);

--
-- Indeks untuk tabel `suhu`
--
ALTER TABLE `suhu`
  ADD KEY `id_buah` (`id_buah`),
  ADD KEY `tanggal_data` (`tanggal_data`);

--
-- Indeks untuk tabel `waktu`
--
ALTER TABLE `waktu`
  ADD PRIMARY KEY (`tanggal_data`),
  ADD KEY `id_buah` (`id_buah`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `gas`
--
ALTER TABLE `gas`
  ADD CONSTRAINT `gas_ibfk_1` FOREIGN KEY (`id_buah`) REFERENCES `buah` (`id_buah`),
  ADD CONSTRAINT `gas_ibfk_2` FOREIGN KEY (`tanggal_data`) REFERENCES `waktu` (`tanggal_data`);

--
-- Ketidakleluasaan untuk tabel `suhu`
--
ALTER TABLE `suhu`
  ADD CONSTRAINT `suhu_ibfk_1` FOREIGN KEY (`id_buah`) REFERENCES `buah` (`id_buah`),
  ADD CONSTRAINT `suhu_ibfk_2` FOREIGN KEY (`tanggal_data`) REFERENCES `waktu` (`tanggal_data`);

--
-- Ketidakleluasaan untuk tabel `waktu`
--
ALTER TABLE `waktu`
  ADD CONSTRAINT `waktu_ibfk_1` FOREIGN KEY (`id_buah`) REFERENCES `buah` (`id_buah`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
