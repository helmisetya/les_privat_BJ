-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 04 Agu 2019 pada 15.09
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_les`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `keahlian2`
--

CREATE TABLE `keahlian2` (
  `id_keahlian` int(25) NOT NULL,
  `id_pengajar` int(25) DEFAULT NULL,
  `materi` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `keahlian2`
--

INSERT INTO `keahlian2` (`id_keahlian`, `id_pengajar`, `materi`) VALUES
(51, 16, 'BAHASA INGGRIS SD'),
(46, 16, 'BAHASA INGGRIS SMP'),
(45, 16, 'IPA SD'),
(35, 16, 'IPA SMP'),
(34, 16, 'MATEMATIKA SD'),
(33, 16, 'MATEMATIKA SMP'),
(49, 17, 'BAHASA INGGRIS SD'),
(42, 17, 'IPA SD'),
(47, 17, 'IPA SMP'),
(36, 17, 'MATEMATIKA SD'),
(48, 17, 'MATEMATIKA SMP');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konsumen`
--

CREATE TABLE `konsumen` (
  `id_konsumen` int(25) NOT NULL,
  `id_akun` int(25) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `nama_siswa` varchar(25) NOT NULL,
  `kelas` int(4) NOT NULL,
  `sekolah` varchar(25) NOT NULL,
  `tgl_dftr` date NOT NULL,
  `status` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konsumen`
--

INSERT INTO `konsumen` (`id_konsumen`, `id_akun`, `nama`, `alamat`, `nama_siswa`, `kelas`, `sekolah`, `tgl_dftr`, `status`) VALUES
(10, 73, 'konsu1', 'jalan Malang 1', 'anak e kons1', 5, 'sd lah', '2019-06-20', 'Aktif'),
(11, 79, 'kons3', 'jalan malang 2', 'anak 2', 6, 'sd pagi 1', '2019-06-22', 'Aktif'),
(12, 87, 'konsu 9', 'jalan anak 9 malang', 'anak 9', 9, 'smp maju jaya', '2019-06-28', 'Aktif'),
(13, 95, 'coba', 'jalan sass', 'anak ku lo', 2, 'smp skuy', '2019-07-03', 'Aktif'),
(14, 90, 'karis', 'jalan singosari', 'anak karis', 6, 'sd singosari', '2019-07-09', 'Aktif'),
(15, 94, 'orang 1', 'jalan jakarta 4', 'kids orang 1', 4, 'sd jakarta', '2019-07-28', 'Aktif'),
(16, 95, 'konsumen8', 'jalan malang 1', 'anak konsumen 8', 3, 'SDN 1 malang', '2019-07-29', 'Aktif'),
(17, 96, 'liaa', 'jalan bunga 1 malang', 'anak lia', 7, 'smp', '2019-08-03', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `minta_ganti_jadwal_les`
--

CREATE TABLE `minta_ganti_jadwal_les` (
  `id_ganti_kons` int(25) NOT NULL,
  `id_penugasan_lama` int(25) DEFAULT NULL,
  `id_pesan_lama` int(25) DEFAULT NULL,
  `id_konsumen` int(25) DEFAULT NULL,
  `materi` varchar(25) DEFAULT NULL,
  `hari` varchar(25) DEFAULT NULL,
  `jam` varchar(10) DEFAULT NULL,
  `tempat_pertemuan` varchar(100) DEFAULT NULL,
  `tgl_mulai_penugasan` date DEFAULT NULL,
  `tgl_selesai_penugasan` date DEFAULT NULL,
  `alasan` varchar(100) DEFAULT NULL,
  `tgl_minta` date DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `minta_ganti_jadwal_les`
--

INSERT INTO `minta_ganti_jadwal_les` (`id_ganti_kons`, `id_penugasan_lama`, `id_pesan_lama`, `id_konsumen`, `materi`, `hari`, `jam`, `tempat_pertemuan`, `tgl_mulai_penugasan`, `tgl_selesai_penugasan`, `alasan`, `tgl_minta`, `status`) VALUES
(1, 43, 48, 10, 'MATEMATIKA SMP', 'Minggu', '19:00', 'rumah ku gan', '2019-07-11', '2019-10-26', 'sibuk', '2019-07-11', 'sudah di verifikasi'),
(2, 41, 45, 14, 'MATEMATIKA SD', 'Minggu', '08:00', 'mlg', '2019-07-25', '2019-08-10', 'sibuk', '2019-07-11', 'sudah di verifikasi'),
(3, 40, 44, 14, 'MATEMATIKA SD', 'Minggu', '14:00', 'jalan ku', '2019-07-10', '2019-09-12', 'sibuk', '2019-07-15', 'sudah di verifikasi'),
(4, 42, 49, 10, 'MATEMATIKA SMP', 'Sabtu', '19:00', 'stiki aja', '2019-07-18', '2019-07-11', 'sibuk', '2019-07-16', 'belum di verifikasi'),
(5, 47, 57, 13, 'IPA SMP', 'Minggu', '19:00', 'jalan malang 10', '2019-07-30', '2019-11-29', 'jadwal nya bebarengan dengan kegiatan lain', '2019-07-29', 'sudah di verifikasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `minta_ganti_jadwal_ngajar`
--

CREATE TABLE `minta_ganti_jadwal_ngajar` (
  `id_ganti_pgjr` int(25) NOT NULL,
  `id_penugasan_lama` int(25) DEFAULT NULL,
  `id_pgjr` int(25) DEFAULT NULL,
  `id_kons` int(25) DEFAULT NULL,
  `materi_penugasan` varchar(25) DEFAULT NULL,
  `hari_penugasan` varchar(25) DEFAULT NULL,
  `jam_penugasan` varchar(10) DEFAULT NULL,
  `tgl_minta` date DEFAULT NULL,
  `alasan` varchar(100) DEFAULT NULL,
  `status` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `minta_ganti_jadwal_ngajar`
--

INSERT INTO `minta_ganti_jadwal_ngajar` (`id_ganti_pgjr`, `id_penugasan_lama`, `id_pgjr`, `id_kons`, `materi_penugasan`, `hari_penugasan`, `jam_penugasan`, `tgl_minta`, `alasan`, `status`) VALUES
(2, 40, 16, 14, 'MATEMATIKA SD', 'Rabu', '15:00', '2019-07-09', 'kkn', 'sudah di verifikasi'),
(3, 44, 17, 10, 'BAHASA INGGRIS SD', 'Sabtu', '18:00', '2019-07-15', 'KKN', 'sudah di verifikasi'),
(4, 43, 16, 10, 'MATEMATIKA SMP', 'minggu', '19:00', '2019-07-29', 'KKN', 'sudah di verifikasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajar`
--

CREATE TABLE `pengajar` (
  `id_pengajar` int(25) NOT NULL,
  `id_akun` int(25) DEFAULT NULL,
  `nama` varchar(25) DEFAULT NULL,
  `alamat` varchar(25) DEFAULT NULL,
  `alamat_asal` varchar(25) DEFAULT NULL,
  `kampus` varchar(30) DEFAULT NULL,
  `semester` int(5) DEFAULT NULL,
  `jurusan` varchar(25) DEFAULT NULL,
  `tgl_dftr` date DEFAULT NULL,
  `status` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengajar`
--

INSERT INTO `pengajar` (`id_pengajar`, `id_akun`, `nama`, `alamat`, `alamat_asal`, `kampus`, `semester`, `jurusan`, `tgl_dftr`, `status`) VALUES
(5, 78, 'guru a', 'jalan malang 1', 'jalan solo 1', 'UMM', 1, 'TI', '2019-06-21', 'Aktif'),
(6, 80, 'guru d', 'jalan malang 4', 'jalan solo 4', 'UB', 5, 'TI', '2019-06-23', 'Aktif'),
(7, 81, 'guru e', 'jalan e', 'jalan d', 'UMM', 5, 'TI', '2019-06-23', 'Aktif'),
(10, 85, 'guru f', 'jalan f', 'jalan e 1', 'UB', 1, 'TI', '2019-06-24', 'Aktif'),
(11, 88, 'guru x', 'jalan guru x 1 malang ', 'jalan guru y 2 solo', 'ITN', 3, 'TI', '2019-06-28', 'Aktif'),
(16, 91, 'ivan', 'jalan candi mbak titis', 'blitar', 'UMM', 3, 'MI', '2019-07-09', 'Aktif'),
(17, 92, 'ori', 'warung mbak titis', 'blitar', 'ITN', 4, 'MI', '2019-07-09', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penugasan`
--

CREATE TABLE `penugasan` (
  `id_penugasan` int(25) NOT NULL,
  `id_pesan` int(25) DEFAULT NULL,
  `id_kons` int(25) DEFAULT NULL,
  `id_pengajar` int(25) DEFAULT NULL,
  `nama_kons` varchar(25) DEFAULT NULL,
  `tgl_mulai` date DEFAULT NULL,
  `tgl_selesai` date DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penugasan`
--

INSERT INTO `penugasan` (`id_penugasan`, `id_pesan`, `id_kons`, `id_pengajar`, `nama_kons`, `tgl_mulai`, `tgl_selesai`, `status`) VALUES
(40, 44, 14, 16, 'anak karis', '2019-07-10', '2019-09-12', 'Aktif, pernah ganti '),
(41, 45, 14, 17, 'karis', '2019-07-25', '2019-08-10', 'Aktif, pernah ganti '),
(42, 49, 10, 17, 'anak kons 1', '2019-07-18', '2019-07-11', 'Tidak Aktif'),
(43, 48, 10, 17, 'konsu1', '2019-07-11', '2019-10-26', 'Aktif, pernah ganti '),
(44, 51, 10, 16, 'lagi', '2019-07-16', '2019-09-27', 'Aktif'),
(45, 53, 14, 17, 'karis 1', NULL, NULL, 'Tidak Aktif'),
(46, 55, 15, 17, 'kid orang 1', '2019-07-31', '2019-11-28', 'Aktif'),
(47, 57, 13, 16, 'konsumen8', '2019-07-30', '2019-11-29', 'Aktif, pernah ganti '),
(48, 62, 17, 17, ' liaa ', '2019-08-16', '2019-11-29', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pertemuan`
--

CREATE TABLE `pertemuan` (
  `id_pertemuan` int(25) NOT NULL,
  `id_penugasan` int(25) DEFAULT NULL,
  `id_pengajar` int(25) DEFAULT NULL,
  `id_konsumen` int(25) DEFAULT NULL,
  `materi` varchar(25) DEFAULT NULL,
  `waktu_les` varchar(25) DEFAULT NULL,
  `tgl_pertemuan` date DEFAULT NULL,
  `pertemuan_ke` int(5) DEFAULT NULL,
  `isi_pertemuan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pertemuan`
--

INSERT INTO `pertemuan` (`id_pertemuan`, `id_penugasan`, `id_pengajar`, `id_konsumen`, `materi`, `waktu_les`, `tgl_pertemuan`, `pertemuan_ke`, `isi_pertemuan`) VALUES
(15, 40, 16, 14, 'MATEMATIKA SD', '15:00', '2019-07-09', 1, 'hebat'),
(16, 42, 17, 10, 'MATEMATIKA SMP', '18:00', '2019-07-11', 1, 'bagus, pintar, masakan ibunya enak'),
(17, 43, 16, 10, 'MATEMATIKA SMP', '19:00', '2019-07-11', 1, 'terdapat peningkatan yang signifikan pada siswa didik'),
(18, 46, 17, 15, 'MATEMATIKA SMP', '19:00', '2019-07-28', 1, 'membantu menyelesaikan pr matematika'),
(19, 47, 17, 13, 'IPA SMP', '19:00', '2019-07-29', 1, 'mengerjakan pr ipa halaman 8');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan2`
--

CREATE TABLE `pesan2` (
  `id_pesan` int(25) NOT NULL,
  `id_konsumen` int(25) DEFAULT NULL,
  `materi` varchar(25) DEFAULT NULL,
  `hari` varchar(25) DEFAULT NULL,
  `jam` varchar(9) DEFAULT NULL,
  `tempat_pertemuan` varchar(50) DEFAULT NULL,
  `tgl_pesan` date DEFAULT NULL,
  `status` varchar(25) DEFAULT NULL,
  `nama` varchar(25) DEFAULT NULL,
  `nama_peserta` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesan2`
--

INSERT INTO `pesan2` (`id_pesan`, `id_konsumen`, `materi`, `hari`, `jam`, `tempat_pertemuan`, `tgl_pesan`, `status`, `nama`, `nama_peserta`) VALUES
(44, 14, 'MATEMATIKA SD', 'Minggu', '14:00', 'jalan ku', '2019-07-09', 'tidak aktif', 'anak karis', NULL),
(45, 14, 'MATEMATIKA SD', 'minggu', '08:00', 'malang lur', '2019-07-09', 'sudah mendapat pengajar', 'anak karis', NULL),
(46, 14, 'MATEMATIKA SMP', 'sabtu', '14:00', 'jalan raya candi 2a no 428 rt 12 rw 02 kelurahan k', '2019-07-10', 'belum mendapat pengajar', 'pras', NULL),
(47, 14, 'MATEMATIKA SMP', 'minggu', '18:00', 'jalan raya candi 2a no 428 rt 12 rw 02 kelurahan k', '2019-07-10', 'belum mendapat pengajar', 'pras', NULL),
(48, 10, 'MATEMATIKA SMP', 'minggu', '19:00', 'jalan kons 1', '2019-07-11', 'sudah mendapat pengajar', 'anak kons 1', NULL),
(49, 10, 'MATEMATIKA SMP', 'Sabtu', '18:00', 'jalan kons 1', '2019-07-11', 'tidak aktif', 'anak kons 1', NULL),
(50, 10, 'BAHASA INGGRIS SD', 'Jumat', '14:00', 'jalan rumah 1', '2019-07-14', 'belum mendapat pengajar', 'lagi', NULL),
(52, 14, 'IPA SMP', 'Sabtu', '19:00', 'stiki lur', '2019-07-17', 'belum mendapat pengajar', 'karis 1', NULL),
(53, 14, 'IPA SMP', 'Minggu', '18:00', 'stiki lur', '2019-07-17', 'tidak aktif', 'karis 1', NULL),
(54, 15, 'MATEMATIKA SMP', 'Jumat', '19:00', 'jalan jakarta 4', '2019-07-28', 'belum mendapat pengajar', 'kid orang 1', NULL),
(55, 15, 'MATEMATIKA SMP', 'Minggu', '19:00', 'jalan jakarta 4', '2019-07-28', 'sudah mendapat pengajar', 'kid orang 1', NULL),
(56, 13, 'IPA SMP', 'Sabtu', '18:00', 'jalan malang 1', '2019-07-29', 'belum mendapat pengajar', 'konsumen8', NULL),
(57, 13, 'IPA SMP', 'Minggu', '19:00', 'jalan malang 10', '2019-07-29', 'sudah mendapat pengajar', 'konsumen8', NULL),
(58, 14, 'MATEMATIKA SMP', 'Sabtu', '08:00', 'jalan malang 35', '2019-07-31', 'belum mendapat pengajar', 'karis', NULL),
(59, 14, 'MATEMATIKA SMP', 'Minggu', '18:00', 'jalan malang 35', '2019-07-31', 'belum mendapat pengajar', 'karis', NULL),
(60, 17, 'MATEMATIKA SMP', 'Sabtu', '18:00', 'jalan solo 1', '2019-08-03', 'belum mendapat pengajar', ' anak lia ', NULL),
(61, 17, 'MATEMATIKA SMP', 'Minggu', '18:00', 'jalan solo 1', '2019-08-03', 'belum mendapat pengajar', ' anak lia ', NULL),
(62, 17, 'MATEMATIKA SMP', 'Minggu', '18:00', 'asdsadasdasdqwe', '2019-08-03', 'sudah mendapat pengajar', ' liaa ', ' anak lia ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `level` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'helmi', 'helmi123', 1),
(2, 'setya', 'setya123', 2),
(7, 'asus', 'asus123', 3),
(73, 'konsu1', '12345', 1),
(74, 'guru1', '12345', 2),
(75, 'konsumen2', '12345', 1),
(76, 'kons', 'sans', 1),
(77, 'guru q', '12345', 2),
(78, 'guru a', '12345', 2),
(79, 'kons3', '12345', 1),
(80, 'guru d', '12345', 2),
(81, 'guru e', '12345', 2),
(82, 'guru c', '12345', 1),
(83, 'konsu6', '12345', 1),
(84, 'kons7', '12345', 1),
(85, 'guru f', '12345', 2),
(86, 'alden', '12345', 1),
(87, 'konsu9', '12345', 1),
(88, 'guru x', '12345', 2),
(89, 'konsu10', '12345', 1),
(90, 'karis', '12345', 1),
(91, 'ivan', '12345', 2),
(92, 'ori', '12345', 2),
(93, 'viera', '12345', 1),
(94, 'orang1', '12345', 1),
(95, 'konsumen8', '12345', 1),
(96, 'lia', '12345', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `waktu_ngajar2`
--

CREATE TABLE `waktu_ngajar2` (
  `id_waktu_ngajar` int(25) NOT NULL,
  `id_pengajar` int(25) DEFAULT NULL,
  `hari` varchar(20) DEFAULT NULL,
  `waktu` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `waktu_ngajar2`
--

INSERT INTO `waktu_ngajar2` (`id_waktu_ngajar`, `id_pengajar`, `hari`, `waktu`) VALUES
(28, 16, 'kamis', '14:00'),
(41, 16, 'minggu', '14:00'),
(26, 16, 'minggu', '19:00'),
(30, 16, 'sabtu', '14:00'),
(43, 16, 'selasa', '15:00'),
(27, 16, 'selasa', '19:00'),
(45, 16, 'senin', '18:00'),
(29, 16, 'senin', '19:00'),
(34, 17, 'jumat', '14:00'),
(35, 17, 'jumat', '19:00'),
(38, 17, 'minggu', '18:00'),
(39, 17, 'minggu', '19:00'),
(33, 17, 'rabu', '15:00'),
(40, 17, 'sabtu', '14:00'),
(36, 17, 'sabtu', '18:00'),
(37, 17, 'sabtu', '19:00'),
(32, 17, 'selasa', '20:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `keahlian2`
--
ALTER TABLE `keahlian2`
  ADD PRIMARY KEY (`id_keahlian`),
  ADD UNIQUE KEY `perguru` (`id_pengajar`,`materi`);

--
-- Indexes for table `konsumen`
--
ALTER TABLE `konsumen`
  ADD PRIMARY KEY (`id_konsumen`);

--
-- Indexes for table `minta_ganti_jadwal_les`
--
ALTER TABLE `minta_ganti_jadwal_les`
  ADD PRIMARY KEY (`id_ganti_kons`);

--
-- Indexes for table `minta_ganti_jadwal_ngajar`
--
ALTER TABLE `minta_ganti_jadwal_ngajar`
  ADD PRIMARY KEY (`id_ganti_pgjr`);

--
-- Indexes for table `pengajar`
--
ALTER TABLE `pengajar`
  ADD PRIMARY KEY (`id_pengajar`);

--
-- Indexes for table `penugasan`
--
ALTER TABLE `penugasan`
  ADD PRIMARY KEY (`id_penugasan`);

--
-- Indexes for table `pertemuan`
--
ALTER TABLE `pertemuan`
  ADD PRIMARY KEY (`id_pertemuan`);

--
-- Indexes for table `pesan2`
--
ALTER TABLE `pesan2`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `waktu_ngajar2`
--
ALTER TABLE `waktu_ngajar2`
  ADD PRIMARY KEY (`id_waktu_ngajar`),
  ADD UNIQUE KEY `pergruu` (`id_pengajar`,`hari`,`waktu`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keahlian2`
--
ALTER TABLE `keahlian2`
  MODIFY `id_keahlian` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `konsumen`
--
ALTER TABLE `konsumen`
  MODIFY `id_konsumen` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `minta_ganti_jadwal_les`
--
ALTER TABLE `minta_ganti_jadwal_les`
  MODIFY `id_ganti_kons` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `minta_ganti_jadwal_ngajar`
--
ALTER TABLE `minta_ganti_jadwal_ngajar`
  MODIFY `id_ganti_pgjr` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pengajar`
--
ALTER TABLE `pengajar`
  MODIFY `id_pengajar` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `penugasan`
--
ALTER TABLE `penugasan`
  MODIFY `id_penugasan` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `pertemuan`
--
ALTER TABLE `pertemuan`
  MODIFY `id_pertemuan` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `pesan2`
--
ALTER TABLE `pesan2`
  MODIFY `id_pesan` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;
--
-- AUTO_INCREMENT for table `waktu_ngajar2`
--
ALTER TABLE `waktu_ngajar2`
  MODIFY `id_waktu_ngajar` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
