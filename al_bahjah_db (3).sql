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
-- Database: `al_bahjah_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bendahara`
--

CREATE TABLE `bendahara` (
  `id_bendahara` int(11) NOT NULL,
  `id_user` varchar(100) DEFAULT NULL,
  `divisi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `berkas_upload`
--

CREATE TABLE `berkas_upload` (
  `id_berkas_upload` int(11) NOT NULL,
  `id_calon_santri` int(11) DEFAULT NULL,
  `tanggal_upload` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `nama_berkas` enum('FOTO','KTP','KK','AKTE KELAHIRAN','RAPOT','IJAZAH','BUKTI PEMBAYARAN') DEFAULT NULL,
  `lokasi_upload` text DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `berkas_upload`
--

INSERT INTO `berkas_upload` (`id_berkas_upload`, `id_calon_santri`, `tanggal_upload`, `nama_berkas`, `lokasi_upload`, `keterangan`) VALUES
(1, 1551, '2020-11-30 09:06:26', 'FOTO', 'di/suatu/tempat', 'tes sajo'),
(2, 4, '2020-11-30 09:06:26', 'FOTO', 'di/suatu/tempat', 'tes sajo'),
(3, 5, '2020-11-30 09:06:26', 'FOTO', 'di/suatu/tempat', 'tes sajo'),
(4, 6, '2020-11-30 09:06:26', 'FOTO', 'di/suatu/tempat', 'tes sajo');

-- --------------------------------------------------------

--
-- Table structure for table `calon_santri`
--

CREATE TABLE `calon_santri` (
  `id_calon_santri` int(11) NOT NULL,
  `id_program` int(2) DEFAULT NULL,
  `id_pembayaran` int(11) NOT NULL,
  `tanggal_registrasi` date DEFAULT NULL,
  `nama` text DEFAULT NULL,
  `nik` text DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `kota` text DEFAULT NULL,
  `negara` text DEFAULT NULL,
  `asal_sekolah` text DEFAULT NULL,
  `tempat_lahir` text DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `gender` enum('LAKI-LAKI','PEREMPUAN') DEFAULT NULL,
  `golongan_darah` enum('A','B','O','AB') DEFAULT NULL,
  `riwayat_penyakit` text DEFAULT NULL,
  `status_verifikasi_registrasi` enum('TERVERIFIKASI','BELUM') DEFAULT NULL,
  `id_operator` int(11) DEFAULT NULL,
  `id_periode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `calon_santri`
--

INSERT INTO `calon_santri` (`id_calon_santri`, `id_program`, `id_pembayaran`, `tanggal_registrasi`, `nama`, `nik`, `alamat`, `kota`, `negara`, `asal_sekolah`, `tempat_lahir`, `tanggal_lahir`, `gender`, `golongan_darah`, `riwayat_penyakit`, `status_verifikasi_registrasi`, `id_operator`, `id_periode`) VALUES
(4, 2, 2, '2020-11-18', 'Qory Amanah Putra', '1304080708010003', 'Jorong Utara, Nagari Kumango, Kecamatan Sungai Tarab, Kabupaten Tanah Datar, Sumatera Barat', 'Batusangkar', 'Indonesia', 'SMAN 1 Batusangkar', 'Batusangkar', '2001-08-07', 'LAKI-LAKI', 'A', 'Hepatitis, Tifus, Gejala TB', 'TERVERIFIKASI', 1, 2),
(5, 2, 3, '2020-11-17', 'Dimas', '01234', 'Indralaya', 'Palembang City', 'Indonesia', 'SMA', 'Dempo', '2001-01-01', 'LAKI-LAKI', 'AB', 'aaaaaaaaaaaaaaaaa', 'TERVERIFIKASI', 1, 2),
(6, 1, 5, '2020-11-13', 'Ahmad Sulistiyo', 'asdasd', 'asd', 'asd', 'Indonesia', 'asd', 'asd', '1212-12-12', 'LAKI-LAKI', 'A', 'asd', 'TERVERIFIKASI', 0, 1),
(7, 1, 4, '2020-11-12', 'Dimas Aditya', '124789', 'Palembang', 'Palembang', 'Indonesia', 'SMAN bla bla Palembang', 'Atas Kasur', '1999-10-05', 'LAKI-LAKI', 'A', 'Tidak ada', 'BELUM', 1, 1),
(8, 1, 14, '2020-11-14', 'Haikal Kevin Permana', '1304080708010003', 'Kumango', 'Tanah Datar', 'Indonesia', 'SMPN 2 Batusangkar', 'Batusangkar', '2007-07-21', 'LAKI-LAKI', 'A', 'Mantiko', 'TERVERIFIKASI', 0, 1),
(9, 1, 15, '2020-11-14', 'Hakim Permana', '1304080708010003', 'Kumango', 'Tanah Datar', 'Indonesia', 'SMPN 5 Batusangkar', 'Batusangkar', '2006-03-25', 'LAKI-LAKI', 'A', 'Mandel', 'BELUM', 0, 1),
(10, 1, 16, '2020-11-14', 'Yuli Anggia', '09120121921012', 'Kumango', 'Tanah Datar', 'Indonesia', 'Universitas Padjadjaran', 'Batusangkar', '1997-07-13', 'LAKI-LAKI', 'O', 'Magh', 'TERVERIFIKASI', 0, 1),
(11, 1, 17, '2020-11-14', 'Qory', '12345', 'Kumango', 'Tanah Datar', 'Indonesia', 'Universitas Sriwijaya', 'Batusangkar', '2001-08-07', 'LAKI-LAKI', 'A', 'Hepatitis', 'TERVERIFIKASI', 0, 1),
(12, 1, 18, '2020-11-14', 'Dimas', '123', 'Palembang', 'Palembang', 'Indonesia', 'SMAN 1Palembang', 'Palembang', '2001-12-12', 'LAKI-LAKI', 'A', 'Hepatitis, Tifus, Gejala TB', 'TERVERIFIKASI', 0, 1),
(15, 1, 20, '2020-11-19', 'Adriyanis Syukriah', '235876', 'Kumango', 'Tanah Datar', 'Indonesia', 'SMAN 1 Sungayang', 'Sumanik', '1995-04-13', 'PEREMPUAN', 'AB', 'Asma', 'BELUM', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `hasil_kelulusan`
--

CREATE TABLE `hasil_kelulusan` (
  `id_hasil_kelulusan` int(11) NOT NULL,
  `id_calon_santri` int(11) DEFAULT NULL,
  `tanggal_kelulusan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status_lulus` enum('DITERIMA','BELUM DITERIMA') DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hasil_kelulusan`
--

INSERT INTO `hasil_kelulusan` (`id_hasil_kelulusan`, `id_calon_santri`, `tanggal_kelulusan`, `status_lulus`, `keterangan`) VALUES
(1, 4, '2020-11-25 10:39:01', 'DITERIMA', 'ya gitu');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_ujian`
--

CREATE TABLE `jadwal_ujian` (
  `id_jadwal_ujian` int(11) NOT NULL,
  `tanggal` text DEFAULT NULL,
  `waktu` text DEFAULT NULL,
  `lokasi` text DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal_ujian`
--

INSERT INTO `jadwal_ujian` (`id_jadwal_ujian`, `tanggal`, `waktu`, `lokasi`, `keterangan`) VALUES
(1, '2020-11-11', '08:00', 'Bukit Besar', 'Ujian Group B'),
(2, '2020-11-12', '10:00', 'Bukit Besar', 'Ujian Group C'),
(4, '2020-11-13', '13:30', 'Indralaya', 'Ujian Group A'),
(5, '2020-11-15', '16:00', 'Musi Dua', 'Ujian Group Z'),
(6, '2020-11-15', '08:00', 'Indralaya', 'Ujian Group D'),
(7, '2020-11-16', '10:00', 'Bukit Besar', 'Ujian Group G'),
(8, '2021-11-17', '13:30', 'Bukit Besar', 'Ujian Group XD'),
(11, '2020-12-20', '10:00', 'Indralaya', 'Ujian Group NNN');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_ujian_calon_santri`
--

CREATE TABLE `jadwal_ujian_calon_santri` (
  `id_jadwal_ujian_calon_santri` int(11) NOT NULL,
  `id_calon_santri` int(11) DEFAULT NULL,
  `id_jadwal_ujian` int(11) DEFAULT NULL,
  `status_persetujuan` enum('SETUJU','BELUM SETUJU') DEFAULT NULL,
  `tanggal_setuju` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `operator`
--

CREATE TABLE `operator` (
  `id_operator` int(11) NOT NULL,
  `id_user` varchar(100) DEFAULT NULL,
  `divisi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `tanggal_pembayaran` date NOT NULL DEFAULT current_timestamp(),
  `bukti_pembayaran` text DEFAULT NULL,
  `nama_calon_santri` varchar(128) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `status_verifikasi` enum('TERVERIFIKASI','BELUM') DEFAULT NULL,
  `id_bendahara` int(11) DEFAULT NULL,
  `otp_pembayaran` text NOT NULL,
  `tanggal_verifikasi` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_program` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `tanggal_pembayaran`, `bukti_pembayaran`, `nama_calon_santri`, `tanggal_lahir`, `status_verifikasi`, `id_bendahara`, `otp_pembayaran`, `tanggal_verifikasi`, `id_program`) VALUES
(2, '1212-12-12', 'dfdsg', 'Qory Amanah Putra', '2020-02-02', 'TERVERIFIKASI', 0, '58645987', '2020-11-17 02:31:02', 1),
(3, '2020-11-13', 'Ada kok mas.jpg', 'Ageng Prayoga', '2001-01-15', 'TERVERIFIKASI', 1, '41533034', '2020-11-17 00:18:28', 1),
(4, '2020-11-12', 'Ada juga kok mas.png', 'Dimas Aditya', '1999-10-15', 'TERVERIFIKASI', 1, '28300955', '2020-11-14 06:50:40', 2),
(5, '2020-11-11', 'Juga ada sih.svg', 'Amat Sulistyo', '2001-01-01', 'TERVERIFIKASI', 1, '71385271', '2020-11-19 07:51:41', 1),
(14, '2020-11-13', 'Ada bang', 'Haikal Kevin Permana', '2007-07-21', 'TERVERIFIKASI', 1, '79912223', '2020-11-14 06:50:40', 3),
(15, '2020-11-11', 'Ada lah', 'Hakim Permana', '2006-03-25', 'TERVERIFIKASI', 0, '69763255', '2020-11-17 10:05:51', 2),
(16, '1212-02-12', 'by89nu09', 'Yuli Anggia', '1997-07-13', 'BELUM', 1, '15765551', '2020-11-14 06:50:40', 1),
(17, '2020-11-14', 'Ada', 'Qory', '2001-08-07', 'TERVERIFIKASI', 1, '96122592', '2020-11-14 06:50:40', 2),
(18, '2020-11-11', 'asd', 'Dimas', '2001-01-01', 'TERVERIFIKASI', 0, '19893926', '2020-11-17 10:01:46', 4),
(20, '2020-11-17', 'asd', 'Tes 17/11/2020 21:11', '2020-11-17', 'TERVERIFIKASI', 0, '38092502', '2020-11-17 16:21:36', 1),
(21, '2020-11-23', 'A1A2A3A4A5', '', '2020-11-23', 'TERVERIFIKASI', 2, '56656', '2020-11-23 09:50:34', 0),
(22, '2020-11-23', 'A1A2A3A4A5', '', '2020-11-23', 'TERVERIFIKASI', 2, '56656', '2020-11-23 09:50:38', 0);

-- --------------------------------------------------------

--
-- Table structure for table `periode`
--

CREATE TABLE `periode` (
  `id_periode` int(11) NOT NULL,
  `id_program` int(2) DEFAULT NULL,
  `tanggal_buka` timestamp NOT NULL DEFAULT current_timestamp(),
  `tanggal_tutup` timestamp NOT NULL DEFAULT current_timestamp(),
  `tahun_ajaran_masehi` text DEFAULT NULL,
  `tahun_ajaran_hijriyah` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `periode`
--

INSERT INTO `periode` (`id_periode`, `id_program`, `tanggal_buka`, `tanggal_tutup`, `tahun_ajaran_masehi`, `tahun_ajaran_hijriyah`) VALUES
(1, 1, '2020-10-31 17:01:00', '2020-11-30 16:59:00', '2020', '1442'),
(2, 2, '2020-10-31 17:01:00', '2020-11-30 16:59:00', '2020', '1442'),
(4, 3, '2020-10-31 17:01:00', '2020-11-30 16:59:00', '2020', '1442'),
(5, 4, '2020-10-31 17:01:00', '2020-11-30 16:59:00', '2020', '1442'),
(6, 5, '2020-10-31 17:01:00', '2020-11-30 16:59:00', '2020', '1442'),
(7, 6, '2020-10-31 17:01:00', '2020-11-30 16:59:00', '2020', '1442');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `id_program` int(2) NOT NULL,
  `nama` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`id_program`, `nama`) VALUES
(1, 'Pra Tahfidz'),
(2, 'Tahfidz'),
(3, 'Tafaqquh'),
(4, 'SD IQu'),
(5, 'SMP IQu'),
(6, 'SMA IQu');

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
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `id_role` int(2) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `nama` text DEFAULT NULL,
  `email` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `id_role`, `password`, `nama`, `email`) VALUES
(1, 1, '$2y$10$bewfFK4QNBE.zxGon0fq5OSyNYPonTNjEXFz5PjN.gfVDDtv4L2iy', 'Qory', 'asd@asd.asd');

-- --------------------------------------------------------

--
-- Table structure for table `wali_calon_santri`
--

CREATE TABLE `wali_calon_santri` (
  `id_wali_calon_santri` int(11) NOT NULL,
  `id_calon_santri` int(11) DEFAULT NULL,
  `nama` text DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `kota` text DEFAULT NULL,
  `negara` text DEFAULT NULL,
  `telepon` text DEFAULT NULL,
  `pekerjaan` text DEFAULT NULL,
  `no_ktp` text DEFAULT NULL,
  `gender` enum('LAKI-LAKI','PEREMPUAN') DEFAULT NULL,
  `hubungan` enum('ORANG TUA KANDUNG','SAUDARA ORANG TUA','KAKEK/NENEK','LAINNYA') DEFAULT NULL,
  `email` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wali_calon_santri`
--

INSERT INTO `wali_calon_santri` (`id_wali_calon_santri`, `id_calon_santri`, `nama`, `alamat`, `kota`, `negara`, `telepon`, `pekerjaan`, `no_ktp`, `gender`, `hubungan`, `email`) VALUES
(4, 4, 'Nazrahelma', 'Jorong Utara, Nagari Kumango, Kecamatan Sungai Tarab, Kabupaten Tanah Datar, Sumatera Barat', 'Batusangkar', 'Indonesia', '085363021295', 'Guru', '021027364378', 'PEREMPUAN', 'ORANG TUA KANDUNG', 'tes@tes.tes'),
(5, 5, 'Marda Tillah', 'Dempo', 'Palembang City', 'Indonesia', '+628723923532', 'asd', '09876', 'PEREMPUAN', 'SAUDARA ORANG TUA', 'ini@namanya.email'),
(6, 6, 'Januardi', 'Jambi', 'Jambi', 'Indonesia', '1232456475', 'dFSzgdhxfcjg', '342564758', 'LAKI-LAKI', 'SAUDARA ORANG TUA', 'tes@tes.tes'),
(10, 10, 'Masrial', 'Kumango Utara', 'Batusangkar', 'Indonesia', '0987', 'Sopir', '0987', 'LAKI-LAKI', 'ORANG TUA KANDUNG', 'tes@tes.tes'),
(11, 11, 'Helmi AS', 'Koto belakang Alert', 'Tanah Datar', 'Indonesia', '0812091029', 'Pensiunan', '09876', 'LAKI-LAKI', 'SAUDARA ORANG TUA', 'tes@tes.tes'),
(12, 12, 'Linda Elita Edit', 'asd', 'asd', 'Indonesia', '123', 'asd', '123', 'LAKI-LAKI', 'ORANG TUA KANDUNG', 'tes@tes.tes'),
(13, 8, 'Si Pen Maru', 'Hello Ges, welkom tu may gays', 'Atlantis', 'Indonesia', '1234124', 'Yucuba', '34567890', 'PEREMPUAN', 'ORANG TUA KANDUNG', 'tes@tes.tes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bendahara`
--
ALTER TABLE `bendahara`
  ADD PRIMARY KEY (`id_bendahara`);

--
-- Indexes for table `berkas_upload`
--
ALTER TABLE `berkas_upload`
  ADD PRIMARY KEY (`id_berkas_upload`);

--
-- Indexes for table `calon_santri`
--
ALTER TABLE `calon_santri`
  ADD PRIMARY KEY (`id_calon_santri`);

--
-- Indexes for table `hasil_kelulusan`
--
ALTER TABLE `hasil_kelulusan`
  ADD PRIMARY KEY (`id_hasil_kelulusan`);

--
-- Indexes for table `jadwal_ujian`
--
ALTER TABLE `jadwal_ujian`
  ADD PRIMARY KEY (`id_jadwal_ujian`);

--
-- Indexes for table `jadwal_ujian_calon_santri`
--
ALTER TABLE `jadwal_ujian_calon_santri`
  ADD PRIMARY KEY (`id_jadwal_ujian_calon_santri`);

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
-- Indexes for table `periode`
--
ALTER TABLE `periode`
  ADD PRIMARY KEY (`id_periode`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id_program`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `wali_calon_santri`
--
ALTER TABLE `wali_calon_santri`
  ADD PRIMARY KEY (`id_wali_calon_santri`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bendahara`
--
ALTER TABLE `bendahara`
  MODIFY `id_bendahara` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `berkas_upload`
--
ALTER TABLE `berkas_upload`
  MODIFY `id_berkas_upload` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `calon_santri`
--
ALTER TABLE `calon_santri`
  MODIFY `id_calon_santri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `hasil_kelulusan`
--
ALTER TABLE `hasil_kelulusan`
  MODIFY `id_hasil_kelulusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jadwal_ujian`
--
ALTER TABLE `jadwal_ujian`
  MODIFY `id_jadwal_ujian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `jadwal_ujian_calon_santri`
--
ALTER TABLE `jadwal_ujian_calon_santri`
  MODIFY `id_jadwal_ujian_calon_santri` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `operator`
--
ALTER TABLE `operator`
  MODIFY `id_operator` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `periode`
--
ALTER TABLE `periode`
  MODIFY `id_periode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wali_calon_santri`
--
ALTER TABLE `wali_calon_santri`
  MODIFY `id_wali_calon_santri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
