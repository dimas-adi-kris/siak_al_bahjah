-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2020 at 08:03 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siak_al_bahjah_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `asatidz`
--

CREATE TABLE `asatidz` (
  `id_asatidz` int(11) NOT NULL,
  `nama_lengkap` text DEFAULT NULL,
  `nama_tanpa_gelar` text DEFAULT NULL,
  `tempat_lahir` text DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `email` text DEFAULT NULL,
  `telepon` text DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `nik` text DEFAULT NULL,
  `nip` text DEFAULT NULL,
  `bidang_ilmu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `asatidz_kelas`
--

CREATE TABLE `asatidz_kelas` (
  `id_asatidz_kelas` int(11) NOT NULL,
  `id_kelas_mata_pelajaran` int(11) DEFAULT NULL,
  `id_asatidz` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bendahara`
--

CREATE TABLE `bendahara` (
  `id_bendahara` int(11) NOT NULL,
  `id_user` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kelas_mata_pelajaran`
--

CREATE TABLE `kelas_mata_pelajaran` (
  `id_kelas_mata_pelajaran` int(11) NOT NULL,
  `id_mata_pelajaran` int(11) DEFAULT NULL,
  `id_tahun_pelajaran` int(11) DEFAULT NULL,
  `id_ruang` int(11) DEFAULT NULL,
  `hari` int(1) DEFAULT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_selesai` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kurikulum`
--

CREATE TABLE `kurikulum` (
  `id_kurikulum` int(11) NOT NULL,
  `tahun` int(4) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `id_mata_pelajaran` int(11) NOT NULL,
  `id_kurikulum` int(11) DEFAULT NULL,
  `jenis_mata_pelajaran` enum('UMUM','SYARIAH') DEFAULT NULL,
  `nama` text DEFAULT NULL,
  `kode` text DEFAULT NULL,
  `singkatan` text DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `buku_referensi` text DEFAULT NULL,
  `kelas` enum('X','XI','XII') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `nilai_mata_pelajaran`
--

CREATE TABLE `nilai_mata_pelajaran` (
  `id_nilai_mata_pelajaran` int(11) NOT NULL,
  `id_peserta_kelas` int(11) DEFAULT NULL,
  `tanggal_entry` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `nilai_huruf` varchar(1) DEFAULT NULL,
  `nilai_angka` double DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `operator`
--

CREATE TABLE `operator` (
  `id_operator` int(11) NOT NULL,
  `id_user` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `tanggal_entry` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_bendahara` int(11) DEFAULT NULL,
  `id_santri` int(11) DEFAULT NULL,
  `tanggal_pembayaran` date DEFAULT NULL,
  `jenis_pembayaran` enum('REGISTRASI ULANG','SPP') DEFAULT NULL,
  `bukti_berkas` text DEFAULT NULL,
  `status_verifikasi` enum('TERVERIFIKASI','BELUM') DEFAULT NULL,
  `tanggal_verifikasi` date DEFAULT NULL,
  `bulan` int(2) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `tanggal_entry`, `id_bendahara`, `id_santri`, `tanggal_pembayaran`, `jenis_pembayaran`, `bukti_berkas`, `status_verifikasi`, `tanggal_verifikasi`, `bulan`, `keterangan`) VALUES
(1, '2020-11-23 10:43:00', 12, 5, '2020-11-23', 'SPP', '2020-11-23T17:16', 'TERVERIFIKASI', '2020-11-23', 1, 'ya gitu'),
(3, '2020-11-23 10:56:00', 2, 3, '2020-11-23', 'REGISTRASI ULANG', '2020-11-23T17:56', 'BELUM', '2020-11-23', 1, 'ya gitu'),
(4, '0000-00-00 00:00:00', 0, 0, '0000-00-00', 'REGISTRASI ULANG', '', 'BELUM', '0000-00-00', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `peserta_kelas`
--

CREATE TABLE `peserta_kelas` (
  `id_peserta_kelas` int(11) NOT NULL,
  `id_kelas_mata_pelajaran` int(11) DEFAULT NULL,
  `id_santri` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_status_santri`
--

CREATE TABLE `riwayat_status_santri` (
  `id_riwayat_status_santri` int(11) NOT NULL,
  `id_santri` int(11) DEFAULT NULL,
  `id_operator` int(11) DEFAULT NULL,
  `tanggal_entry` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('TEREGISTRASI','AKTIF','CUTI','DO','LULUS','LAINNYA') DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(2) NOT NULL,
  `nama` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `nama`) VALUES
(1, 'Executive'),
(2, 'Operator'),
(3, 'Bendahara'),
(4, 'Wali santri/Bakal Calon Santri');

-- --------------------------------------------------------

--
-- Table structure for table `ruang`
--

CREATE TABLE `ruang` (
  `id_ruang` int(11) NOT NULL,
  `nama` text DEFAULT NULL,
  `kode` text DEFAULT NULL,
  `singkatan` text DEFAULT NULL,
  `lokasi` text DEFAULT NULL,
  `kapasitas` text DEFAULT NULL,
  `jenis_ruang` enum('KELAS','LABORATORIUM','LAPANGAN') DEFAULT NULL,
  `status_tersedia` enum('TERSEDIA','TIDAK TERSEDIA') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `santri`
--

CREATE TABLE `santri` (
  `id_santri` int(11) NOT NULL,
  `id_user` varchar(100) NOT NULL,
  `id_calon_santri` int(11) DEFAULT NULL,
  `nis` text DEFAULT NULL,
  `tanggal_registrasi` date DEFAULT NULL,
  `status_verifikasi_registrasi_ulang` enum('TERVERIFIKASI','BELUM') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `santri`
--

INSERT INTO `santri` (`id_santri`, `id_user`, `id_calon_santri`, `nis`, `tanggal_registrasi`, `status_verifikasi_registrasi_ulang`) VALUES
(1, '', 123, '1919199', '2020-11-23', 'TERVERIFIKASI'),
(2, '', 12346, '84848484', '2020-11-24', 'BELUM'),
(3, '', 654, '564564', '2020-11-24', 'BELUM'),
(6, '', 12346, '1919199', '2020-11-24', 'BELUM');

-- --------------------------------------------------------

--
-- Table structure for table `tahun_pelajaran`
--

CREATE TABLE `tahun_pelajaran` (
  `id_tahun_pelajaran` int(11) NOT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(100) NOT NULL,
  `id_role` int(2) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `email` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `id_role`, `password`, `email`) VALUES
('', 4, '123123', 'dimaskristianto1999@gmail.com'),
('198005222008121002', 4, '123123', 'dimasforsk@gmail.com123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asatidz`
--
ALTER TABLE `asatidz`
  ADD PRIMARY KEY (`id_asatidz`);

--
-- Indexes for table `asatidz_kelas`
--
ALTER TABLE `asatidz_kelas`
  ADD PRIMARY KEY (`id_asatidz_kelas`);

--
-- Indexes for table `bendahara`
--
ALTER TABLE `bendahara`
  ADD PRIMARY KEY (`id_bendahara`);

--
-- Indexes for table `kelas_mata_pelajaran`
--
ALTER TABLE `kelas_mata_pelajaran`
  ADD PRIMARY KEY (`id_kelas_mata_pelajaran`);

--
-- Indexes for table `kurikulum`
--
ALTER TABLE `kurikulum`
  ADD PRIMARY KEY (`id_kurikulum`);

--
-- Indexes for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`id_mata_pelajaran`);

--
-- Indexes for table `nilai_mata_pelajaran`
--
ALTER TABLE `nilai_mata_pelajaran`
  ADD PRIMARY KEY (`id_nilai_mata_pelajaran`);

--
-- Indexes for table `operator`
--
ALTER TABLE `operator`
  ADD PRIMARY KEY (`id_operator`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `peserta_kelas`
--
ALTER TABLE `peserta_kelas`
  ADD PRIMARY KEY (`id_peserta_kelas`);

--
-- Indexes for table `riwayat_status_santri`
--
ALTER TABLE `riwayat_status_santri`
  ADD PRIMARY KEY (`id_riwayat_status_santri`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`id_ruang`);

--
-- Indexes for table `santri`
--
ALTER TABLE `santri`
  ADD PRIMARY KEY (`id_santri`);

--
-- Indexes for table `tahun_pelajaran`
--
ALTER TABLE `tahun_pelajaran`
  ADD PRIMARY KEY (`id_tahun_pelajaran`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asatidz`
--
ALTER TABLE `asatidz`
  MODIFY `id_asatidz` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `asatidz_kelas`
--
ALTER TABLE `asatidz_kelas`
  MODIFY `id_asatidz_kelas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bendahara`
--
ALTER TABLE `bendahara`
  MODIFY `id_bendahara` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelas_mata_pelajaran`
--
ALTER TABLE `kelas_mata_pelajaran`
  MODIFY `id_kelas_mata_pelajaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kurikulum`
--
ALTER TABLE `kurikulum`
  MODIFY `id_kurikulum` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  MODIFY `id_mata_pelajaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nilai_mata_pelajaran`
--
ALTER TABLE `nilai_mata_pelajaran`
  MODIFY `id_nilai_mata_pelajaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `operator`
--
ALTER TABLE `operator`
  MODIFY `id_operator` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `peserta_kelas`
--
ALTER TABLE `peserta_kelas`
  MODIFY `id_peserta_kelas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `riwayat_status_santri`
--
ALTER TABLE `riwayat_status_santri`
  MODIFY `id_riwayat_status_santri` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ruang`
--
ALTER TABLE `ruang`
  MODIFY `id_ruang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `santri`
--
ALTER TABLE `santri`
  MODIFY `id_santri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tahun_pelajaran`
--
ALTER TABLE `tahun_pelajaran`
  MODIFY `id_tahun_pelajaran` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
