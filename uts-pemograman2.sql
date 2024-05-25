-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Bulan Mei 2024 pada 09.08
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uts-pemograman2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(20) NOT NULL,
  `tingkat` varchar(20) NOT NULL,
  `gaji` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`, `tingkat`, `gaji`) VALUES
(1, 'Rektor', 'Rektor', 10000000),
(2, 'Wakil Rektor', '1', 9000000),
(4, 'Wakil Rektor', '2', 8500000),
(5, 'Wakil Rektor', '3', 8000000),
(6, 'Dekan', 'Fakultas Teknik', 7000000),
(7, 'Dekan', 'Fakultas Bahasa', 7000000),
(8, 'PMB', 'Ketua', 5500000),
(9, 'PMB', 'Sekretaris', 5200000),
(10, 'PMB', 'Anggota', 5000000),
(13, 'Akademik', 'Ketua', 5000000),
(14, 'Akademik', 'Anggota', 4500000),
(15, 'Dosen', 'Tetap', 4000000),
(16, 'Dosen', 'Asisten', 3000000),
(17, 'Satpam', 'Ketua', 3500000),
(18, 'Satpam', 'Anggota', 3300000),
(19, 'OB', 'Ketua', 3500000),
(20, 'OB', 'Anggota', 3200000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sdm`
--

CREATE TABLE `sdm` (
  `id_sdm` int(11) NOT NULL,
  `id_sdm_detail` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `sp` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `sdm`
--

INSERT INTO `sdm` (`id_sdm`, `id_sdm_detail`, `id_jabatan`, `id_status`, `sp`) VALUES
(2, 3, 1, 1, 0),
(3, 4, 2, 1, 0),
(4, 5, 4, 1, 0),
(7, 7, 14, 2, 1),
(8, 8, 15, 5, 0),
(9, 9, 16, 1, 0),
(10, 10, 17, 5, 0),
(11, 12, 16, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sdm_detail`
--

CREATE TABLE `sdm_detail` (
  `id_sdm_detail` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_telepon` varchar(13) NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `sdm_detail`
--

INSERT INTO `sdm_detail` (`id_sdm_detail`, `nama`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `no_telepon`, `email`) VALUES
(3, 'Dr. Partono Siswosuharjo,Drs,.S.H,.M.M.', 'Jakarta', '2004-08-09', 'Sudirman', '081282892829', 'sadiuwaios'),
(4, 'Mohamad Subchan,S.Kom,.M.Kom', 'oasidhcas', '2004-10-29', 'skdjfhsduish', '08123129381', 'asjfchasuc'),
(5, 'Ramzi', 'ksjadaukwh', '2003-04-23', 'hjkjgyufsad', '3243141', 'aksjduhcuai'),
(6, 'Budi', 'asjdasjkd', '2009-12-28', 'sajdhwa', '1928371', 'asjfhau'),
(7, 'Sule', 'awjdhawu', '2009-09-09', 'sjfshewuiefh', '10293812', 'qjshiauqfwh'),
(8, 'Mamang Resing', 'dsfwe', '3541-02-12', 'asdweraedf', '345345', 'sdafzew'),
(9, 'Semprul', 'asdawda', '2312-02-01', 'sdfeasf', '3241123123', 'sdfaew'),
(10, 'Warni', 'Malingping', '2003-12-26', 'Kedongdong', '08123123817', 'skdjfhweiugf'),
(12, 'Gio', 'Jakarta', '2220-12-12', 'Puri', '129381', 'asudhaw');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE `status` (
  `id_status` int(11) NOT NULL,
  `nama_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `status`
--

INSERT INTO `status` (`id_status`, `nama_status`) VALUES
(1, 'Tetap'),
(2, 'Kontrak'),
(4, 'Magang'),
(5, 'Melamar'),
(7, 'Berhenti Sementara');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `akses` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `akses`) VALUES
(1, 'Ramzi', '698d51a19d8a121ce581499d7b701668', 1),
(2, 'Warni', 'bcbe3365e6ac95ea2c0343a2395834dd', 1),
(4, 'Eman', '123', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `sdm`
--
ALTER TABLE `sdm`
  ADD PRIMARY KEY (`id_sdm`);

--
-- Indeks untuk tabel `sdm_detail`
--
ALTER TABLE `sdm_detail`
  ADD PRIMARY KEY (`id_sdm_detail`);

--
-- Indeks untuk tabel `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `sdm`
--
ALTER TABLE `sdm`
  MODIFY `id_sdm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `sdm_detail`
--
ALTER TABLE `sdm_detail`
  MODIFY `id_sdm_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
