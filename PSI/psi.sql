-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Jun 2018 pada 07.45
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `psi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_lengkap`, `username`, `password`) VALUES
(3, 'Aditya Mahavira', 'adot', 'adot123'),
(2, 'Aditya Putra Irawan', 'adit', 'adit123'),
(1, 'Belum Ada', 'admin', 'admin123'),
(4, 'Moch Dian Nafi', 'dian', 'dian123'),
(5, 'Muhammad Yasin', 'yasin', 'yasin123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jemput`
--

CREATE TABLE `jemput` (
  `nik_pelapor` varchar(16) NOT NULL,
  `nama_pelapor` varchar(100) NOT NULL,
  `telepon_pelapor` varchar(15) DEFAULT NULL,
  `nik_korban` varchar(16) NOT NULL,
  `nama_korban` varchar(100) DEFAULT NULL,
  `telepon_korban` varchar(15) DEFAULT NULL,
  `j_lansia` int(8) NOT NULL,
  `j_bayi` int(8) NOT NULL,
  `j_anak` int(8) NOT NULL,
  `j_remaja` int(8) NOT NULL,
  `j_dewasa` int(8) NOT NULL,
  `j_sapi` int(8) NOT NULL,
  `j_kambing` int(8) NOT NULL,
  `j_ungas` int(8) NOT NULL,
  `j_kucing` int(8) NOT NULL,
  `kecamatan` varchar(16) NOT NULL,
  `kelurahan` varchar(16) NOT NULL,
  `dusun` varchar(16) NOT NULL,
  `alamat_detail` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jemput`
--

INSERT INTO `jemput` (`nik_pelapor`, `nama_pelapor`, `telepon_pelapor`, `nik_korban`, `nama_korban`, `telepon_korban`, `j_lansia`, `j_bayi`, `j_anak`, `j_remaja`, `j_dewasa`, `j_sapi`, `j_kambing`, `j_ungas`, `j_kucing`, `kecamatan`, `kelurahan`, `dusun`, `alamat_detail`, `status`, `nama_lengkap`) VALUES
('1603022207980002', 'Aditya Putra Irawan', '082177329234', '3502176908680002', 'ENDANG DWI WIJI PRIHATINING R.', '085798623413', 1, 2, 2, 3, 1, 1, 2, 1, 1, 'Moyudan', 'Argo Mulyo', 'Candiwinangun', 'Deket pancoran mas, nanti maju terus aja dari sana.', 'Selesai', 'Aditya Putra Irawan'),
('1651651651651516', 'sdfsdfsdfsd', '2342342342342', '2342342342342342', 'fsdfsfdsdf', '2342342342342', 1, 2, 3, 1, 2, 1, 2, 3, 1, 'Ngaglik', 'Kepuh Harjo', 'Candirejo', 'ksduhfshdfksdufhskdjfh', 'Penjemputan', 'Aditya Mahavira');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE `status` (
  `id_status` int(15) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `status`
--

INSERT INTO `status` (`id_status`, `status`) VALUES
(1, 'Menunggu'),
(2, 'Penjemputan'),
(3, 'Selesai');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`nama_lengkap`);

--
-- Indeks untuk tabel `jemput`
--
ALTER TABLE `jemput`
  ADD PRIMARY KEY (`nik_pelapor`),
  ADD KEY `status` (`status`),
  ADD KEY `nama_lengkap` (`nama_lengkap`);

--
-- Indeks untuk tabel `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `jemput`
--
ALTER TABLE `jemput`
  ADD CONSTRAINT `jemput_ibfk_1` FOREIGN KEY (`status`) REFERENCES `status` (`status`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jemput_ibfk_2` FOREIGN KEY (`nama_lengkap`) REFERENCES `admin` (`nama_lengkap`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
