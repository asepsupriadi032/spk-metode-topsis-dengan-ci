-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 08 Jul 2019 pada 12.45
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jurusan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `gambar` varchar(255) NOT NULL DEFAULT 'default.png',
  `theme` varchar(20) NOT NULL DEFAULT 'sb_admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `nama`, `status`, `gambar`, `theme`) VALUES
(2, 'admin@admin.com', 'admin', 'admin', 1, 'default.png', 'sb_admin'),
(3, 'guru@guru.com', 'guru', 'Abdurahman', 1, 'default.png', 'sb_admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bobot_iq`
--

CREATE TABLE `bobot_iq` (
  `id_bobot_iq` int(2) NOT NULL,
  `batas_awal` int(3) NOT NULL,
  `batas_akhir` int(3) NOT NULL,
  `nilai_kriteria` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bobot_iq`
--

INSERT INTO `bobot_iq` (`id_bobot_iq`, `batas_awal`, `batas_akhir`, `nilai_kriteria`) VALUES
(1, 1, 28, 1),
(2, 29, 56, 2),
(3, 57, 84, 3),
(4, 85, 112, 4),
(5, 113, 140, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bobot_nilai`
--

CREATE TABLE `bobot_nilai` (
  `id_bobot_nilai` int(2) NOT NULL,
  `batas_awal` int(3) NOT NULL,
  `batas_akhir` int(3) NOT NULL,
  `nilai_kriteria` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bobot_nilai`
--

INSERT INTO `bobot_nilai` (`id_bobot_nilai`, `batas_awal`, `batas_akhir`, `nilai_kriteria`) VALUES
(1, 0, 20, 1),
(2, 21, 40, 2),
(3, 41, 60, 3),
(4, 61, 80, 4),
(5, 81, 100, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bobot_peminatan`
--

CREATE TABLE `bobot_peminatan` (
  `id_bobot_peminatan` int(2) NOT NULL,
  `batas_awal` int(3) NOT NULL,
  `batas_akhir` int(3) NOT NULL,
  `nilai_kriteria` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bobot_peminatan`
--

INSERT INTO `bobot_peminatan` (`id_bobot_peminatan`, `batas_awal`, `batas_akhir`, `nilai_kriteria`) VALUES
(1, 0, 20, 1),
(2, 21, 40, 2),
(3, 41, 60, 3),
(4, 61, 80, 4),
(5, 81, 100, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_penjurusan`
--

CREATE TABLE `hasil_penjurusan` (
  `id_hasil` int(4) NOT NULL,
  `id_siswa` int(4) NOT NULL,
  `nilai` float NOT NULL,
  `hasil` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_siswa`
--

CREATE TABLE `nilai_siswa` (
  `id_siswa` int(4) NOT NULL,
  `id_tahun_ajaran` int(3) NOT NULL,
  `nama_siswa` varchar(255) NOT NULL,
  `nilai_ipa` int(3) NOT NULL,
  `nilai_ips` int(3) NOT NULL,
  `nilai_minat_jurusan` int(3) NOT NULL,
  `nilai_iq` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `nilai_siswa`
--

INSERT INTO `nilai_siswa` (`id_siswa`, `id_tahun_ajaran`, `nama_siswa`, `nilai_ipa`, `nilai_ips`, `nilai_minat_jurusan`, `nilai_iq`) VALUES
(2, 1, 'a', 90, 75, 80, 100),
(3, 1, 'b', 80, 60, 90, 110),
(4, 1, 'c', 95, 90, 93, 128),
(5, 1, 'd', 60, 75, 60, 80);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan_masuk`
--

CREATE TABLE `pesan_masuk` (
  `id_pesan` int(4) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `hp` varchar(15) NOT NULL,
  `email` varchar(150) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun_ajaran`
--

CREATE TABLE `tahun_ajaran` (
  `id_tahun_ajaran` int(2) NOT NULL,
  `tahun_ajaran` varchar(25) NOT NULL,
  `status_aktif` enum('Aktif','Tidak Aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tahun_ajaran`
--

INSERT INTO `tahun_ajaran` (`id_tahun_ajaran`, `tahun_ajaran`, `status_aktif`) VALUES
(1, '2016-2017', 'Tidak Aktif'),
(2, '2017-2018', 'Tidak Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tjm_menu`
--

CREATE TABLE `tjm_menu` (
  `id` int(11) NOT NULL,
  `parent_menu` int(11) NOT NULL DEFAULT '1',
  `nama_menu` varchar(50) NOT NULL,
  `url_menu` varchar(50) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `urutan` tinyint(3) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `type` enum('Admin','Guru') NOT NULL DEFAULT 'Admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tjm_menu`
--

INSERT INTO `tjm_menu` (`id`, `parent_menu`, `nama_menu`, `url_menu`, `icon`, `urutan`, `status`, `type`) VALUES
(1, 1, 'root', '/', '', 0, 0, 'Admin'),
(2, 1, 'dashboard', 'admin/dashboard', 'fa fa-fw fa-dashboard', 1, 1, 'Admin'),
(3, 1, 'User Admin', 'admin/useradmin', 'fa fa-users', 99, 1, 'Admin'),
(4, 1, 'Menu', 'admin/menu', 'fa fa-gear', 100, 1, 'Admin'),
(25, 1, 'Master', 'admin/master', 'fa fa-ticket', 2, 0, 'Admin'),
(30, 1, 'Siswa', 'admin/nilai_siswa', 'glyphicon glyphicon-star', 2, 1, 'Admin'),
(33, 1, 'Pesan Masuk', 'admin/pesanmasuk', 'glyphicon glyphicon-list', 5, 1, 'Admin'),
(34, 1, 'tahun ajaran', 'admin/tahun_ajaran', 'glyphicon glyphicon-list-alt', 5, 1, 'Admin'),
(36, 1, 'Bobot Kriteria', 'admin/bobot', 'fa fa-list', 6, 1, 'Admin'),
(37, 36, 'Bobot Nilai', 'admin/bobot_nilai', '-', 1, 1, 'Admin'),
(38, 36, 'Bobot Test Peminatan', 'admin/peminatan', 'fa fa-list', 2, 1, 'Admin'),
(39, 36, 'Bobot Test IQ', 'admin/bobot_iq', '-', 3, 1, 'Admin'),
(40, 1, 'Proses Penjurusan', 'admin/penjurusan', 'glyphicon glyphicon-play', 7, 1, 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bobot_iq`
--
ALTER TABLE `bobot_iq`
  ADD PRIMARY KEY (`id_bobot_iq`);

--
-- Indexes for table `bobot_nilai`
--
ALTER TABLE `bobot_nilai`
  ADD PRIMARY KEY (`id_bobot_nilai`);

--
-- Indexes for table `bobot_peminatan`
--
ALTER TABLE `bobot_peminatan`
  ADD PRIMARY KEY (`id_bobot_peminatan`);

--
-- Indexes for table `hasil_penjurusan`
--
ALTER TABLE `hasil_penjurusan`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indexes for table `nilai_siswa`
--
ALTER TABLE `nilai_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `pesan_masuk`
--
ALTER TABLE `pesan_masuk`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  ADD PRIMARY KEY (`id_tahun_ajaran`);

--
-- Indexes for table `tjm_menu`
--
ALTER TABLE `tjm_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `bobot_iq`
--
ALTER TABLE `bobot_iq`
  MODIFY `id_bobot_iq` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `bobot_nilai`
--
ALTER TABLE `bobot_nilai`
  MODIFY `id_bobot_nilai` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `bobot_peminatan`
--
ALTER TABLE `bobot_peminatan`
  MODIFY `id_bobot_peminatan` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `hasil_penjurusan`
--
ALTER TABLE `hasil_penjurusan`
  MODIFY `id_hasil` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `nilai_siswa`
--
ALTER TABLE `nilai_siswa`
  MODIFY `id_siswa` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pesan_masuk`
--
ALTER TABLE `pesan_masuk`
  MODIFY `id_pesan` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  MODIFY `id_tahun_ajaran` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tjm_menu`
--
ALTER TABLE `tjm_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
