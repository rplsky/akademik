-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2023 at 12:20 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_akademik`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_absensi_mata_pelajaran`
--

CREATE TABLE `tbl_absensi_mata_pelajaran` (
  `id_absensi` int(11) NOT NULL,
  `id_materi_mata_pelajaran` varchar(10) NOT NULL,
  `id_mata_pelajaran` varchar(10) NOT NULL,
  `nis` varchar(100) NOT NULL,
  `tgl_awal_absensi` datetime NOT NULL,
  `status` enum('Proses','Hadir','Tidak Hadir','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `nip` varchar(100) NOT NULL,
  `nama_admin` text NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tempat_lahir` text NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`nip`, `nama_admin`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `no_telp`) VALUES
('123', 'Rizky', 'L', 'Bandung', '1996-01-08', 'Komplek Pakusarakan D3 No 15 RT 01 RW 19 Desa Tanimulya Kec. Ngamprah', '089697744372');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_akun`
--

CREATE TABLE `tbl_akun` (
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `hak_akses` enum('Admin','Guru','Wks Kurikulum','Kepala Sekolah','Siswa') NOT NULL,
  `nip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_akun`
--

INSERT INTO `tbl_akun` (`email`, `password`, `hak_akses`, `nip`) VALUES
('anggarasst@gmail.com', '271e9d011d07c91cfb7b8210fa7bd33050ec52ea', 'Siswa', '102101746'),
('angkasahsn2021@gmail.com ', '4d9fcd87554439c18397933fef356d4bb6e9ac63', 'Guru', '01041100'),
('anisarisqy802@gmail.com', '271e9d011d07c91cfb7b8210fa7bd33050ec52ea', 'Siswa', '102101745'),
('dhania713@gmail.com', '4d9fcd87554439c18397933fef356d4bb6e9ac63', 'Guru', '010420180067'),
('dianwiwimus.3@gmail.com', '271e9d011d07c91cfb7b8210fa7bd33050ec52ea', 'Siswa', '102101748'),
('ekocandra564@gmail.com', '271e9d011d07c91cfb7b8210fa7bd33050ec52ea', 'Siswa', '102101749'),
('nindyarifa12@gmail.com', '271e9d011d07c91cfb7b8210fa7bd33050ec52ea', 'Siswa', '102101760'),
('nuryanilinda232@gmail.com', '271e9d011d07c91cfb7b8210fa7bd33050ec52ea', 'Siswa', '102101753'),
('ratnasari2902@gmail.com', '4d9fcd87554439c18397933fef356d4bb6e9ac63', 'Guru', '0104200507120200'),
('rezel578@gmail.com', '271e9d011d07c91cfb7b8210fa7bd33050ec52ea', 'Siswa', '102101765'),
('risaykorabum@gmail.com', '271e9d011d07c91cfb7b8210fa7bd33050ec52ea', 'Siswa', '102101776'),
('rizky.fauzi96@gmail.com', '4d9fcd87554439c18397933fef356d4bb6e9ac63', 'Guru', '01040172'),
('rpl.smkangkasalhs@gmail.com', 'bb95d94da0b66d7af0bc4c2449cb784c3df3d437', 'Admin', '123'),
('sabilafasya12@gmail.com', '271e9d011d07c91cfb7b8210fa7bd33050ec52ea', 'Siswa', '102101750'),
('salnafizh@gmail.com', '271e9d011d07c91cfb7b8210fa7bd33050ec52ea', 'Siswa', '102101768'),
('sarahnazira6132@gmail.com', '271e9d011d07c91cfb7b8210fa7bd33050ec52ea', 'Siswa', '102101769'),
('veronicaef17@gmail.com', '271e9d011d07c91cfb7b8210fa7bd33050ec52ea', 'Siswa', '102101773'),
('yabukitia@gmail.com', '271e9d011d07c91cfb7b8210fa7bd33050ec52ea', 'Siswa', '102101771'),
('yunitasafi83@gmail.com', '271e9d011d07c91cfb7b8210fa7bd33050ec52ea', 'Siswa', '102101778');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bank_soal`
--

CREATE TABLE `tbl_bank_soal` (
  `id_soal` varchar(10) NOT NULL,
  `id_lembar_ujian` varchar(10) NOT NULL,
  `pertanyaan` text NOT NULL,
  `pilihan_a` text NOT NULL,
  `pilihan_b` text NOT NULL,
  `pilihan_c` text NOT NULL,
  `pilihan_d` text NOT NULL,
  `pilihan_e` text NOT NULL,
  `jawaban` text NOT NULL,
  `poin_soal` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_bank_soal`
--

INSERT INTO `tbl_bank_soal` (`id_soal`, `id_lembar_ujian`, `pertanyaan`, `pilihan_a`, `pilihan_b`, `pilihan_c`, `pilihan_d`, `pilihan_e`, `jawaban`, `poin_soal`) VALUES
('BS-00001', 'LU-00001', '<p>Coba Ujian</p>\r\n', 'A', 'B', 'C', 'D', 'E', 'A', '4'),
('BS-00002', 'LU-00001', '<p>Vari\'abel adalah …</p>', 'Tempat', 'Coba', 'Disini', 'DF', 'Woww', 'Tempat', '4'),
('BS-00003', 'LU-00001', '<p>Tipe Data adalah …</p>', 'Tempat', 'Jenis data', 'Varian', 'Coba', 'Woww', 'Jenis data', '4');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_guru`
--

CREATE TABLE `tbl_guru` (
  `nip` varchar(100) NOT NULL,
  `nama_guru` text NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tempat_lahir` text NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_guru`
--

INSERT INTO `tbl_guru` (`nip`, `nama_guru`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `no_telp`) VALUES
('01040172', 'Rizky Fauzi Achman', 'L', 'Bandung', '1996-01-08', 'Komplek Pakusarakan D3 No 15 RT 01 RW 19 Desa Tanimulya Kec. Ngamprah', '089697744372'),
('01041100', 'Ridho Afriyan', 'L', 'Payakumbuh', '1999-11-30', 'Jl. Cihanjuang Kp. Cibaligo No. 20 RT. 05 RW. 01 Kec. Parongpong', '089683014606'),
('0104200507120200', 'Eneng Ratnasari', 'P', 'Bandung', '1999-11-30', 'Jl. Trs. Mukodar No. 299', '08986114894'),
('010420180067', 'M Dimas Mardhani', 'L', 'Bandung', '1999-11-30', 'Jl. Cetarip Kulon II No. Kav 168 RT. 04 RW. 09 Kel. Kopo Kec. Bojongloa Kaler', '089621746222');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_guru_mapel`
--

CREATE TABLE `tbl_guru_mapel` (
  `id_guru_mapel` int(11) NOT NULL,
  `id_mata_pelajaran` varchar(10) NOT NULL,
  `nip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_guru_mapel`
--

INSERT INTO `tbl_guru_mapel` (`id_guru_mapel`, `id_mata_pelajaran`, `nip`) VALUES
(2, 'MP-00001', '01040172');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jadwal_ujian`
--

CREATE TABLE `tbl_jadwal_ujian` (
  `id_jadwal_ujian` varchar(10) NOT NULL,
  `id_lembar_ujian` varchar(10) NOT NULL,
  `tanggal_mulai` datetime NOT NULL,
  `tanggal_akhir` datetime NOT NULL,
  `waktu` varchar(5) NOT NULL,
  `kelas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jawaban_ujian`
--

CREATE TABLE `tbl_jawaban_ujian` (
  `id_jawaban_ujian` varchar(10) NOT NULL,
  `id_soal` varchar(10) NOT NULL,
  `id_lembar_ujian` varchar(10) NOT NULL,
  `nis` varchar(100) NOT NULL,
  `jawaban` text NOT NULL,
  `poin` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kepala_sekolah`
--

CREATE TABLE `tbl_kepala_sekolah` (
  `nip` varchar(100) NOT NULL,
  `nama_kepala_sekolah` text NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tempat_lahir` text NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kumpul_tugas`
--

CREATE TABLE `tbl_kumpul_tugas` (
  `id_kirim` varchar(10) NOT NULL,
  `id_tugas_mata_pelajaran` varchar(10) NOT NULL,
  `id_mata_pelajaran` varchar(10) NOT NULL,
  `nis` varchar(100) NOT NULL,
  `file` text NOT NULL,
  `tgl_kirim` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lembar_ujian`
--

CREATE TABLE `tbl_lembar_ujian` (
  `id_lembar_ujian` varchar(10) NOT NULL,
  `id_mata_pelajaran` varchar(10) NOT NULL,
  `deskripsi` text NOT NULL,
  `jenis_ujian` enum('Kuis','Ulangan Harian','Penilaian Tengah Semester','Penilaian Akhir Semester') NOT NULL,
  `jml_soal` int(11) NOT NULL,
  `poin` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_lembar_ujian`
--

INSERT INTO `tbl_lembar_ujian` (`id_lembar_ujian`, `id_mata_pelajaran`, `deskripsi`, `jenis_ujian`, `jml_soal`, `poin`) VALUES
('LU-00001', 'MP-00001', '<p>Petunjuk Pengerjaan Soal<br />\r\n<br />\r\n1. Berdoa terlebih dahulu sebelum mengerjakan!<br />\r\n2. Isikan identitas Anda pada kolom nama dan kelas di lembar jawab yang disediakan!<br />\r\n3. Soal berbentuk Pilihan Ganda dengan jawaban yang kamu anggap benar!<br />\r\n4. Waktu mengerjakan soal selama 75 menit (Mapel sesuai jadwal)!<br />\r\n5. Dilarang membuka catatan dalam bentuk apapun!<br />\r\n6. Boleh menggunakan kalkulator!<br />\r\n7. Periksalah jawaban Anda sebelum menyerahkannya dan kirim kepada guru!<br />\r\n<br />\r\nSetelah Setiap waktu pelaksanaan PTS selesai, Link Soal akan dihapus.<br />\r\n<br />\r\nDipersiapkan segala sesuatunya sebelum Pelaksanaan Penilaian.<br />\r\n<br />\r\nBerikut dibagikan Jadwal Pelaksanaan Penilaian Tengah Semester Genap.<br />\r\n<br />\r\n* SELAMAT MENGERJAKAN *</p>\r\n', 'Kuis', 25, '100');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lk_mapel`
--

CREATE TABLE `tbl_lk_mapel` (
  `id` int(11) NOT NULL,
  `id_lembar_ujian` varchar(10) NOT NULL,
  `id_mata_pelajaran` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_lk_mapel`
--

INSERT INTO `tbl_lk_mapel` (`id`, `id_lembar_ujian`, `id_mata_pelajaran`) VALUES
(1, 'LU-00001', 'MP-00001');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mata_pelajaran`
--

CREATE TABLE `tbl_mata_pelajaran` (
  `id_mata_pelajaran` varchar(10) NOT NULL,
  `nama_mata_pelajaran` text NOT NULL,
  `jml_jam_mata_pelajaran` int(11) NOT NULL,
  `kelompok_mata_pelajaran` enum('Nasional','Kewilayahan','Produktif (C1)','Produktif (C2)','Produktif (C3)','Muatan Lokal') NOT NULL,
  `semester` int(11) NOT NULL,
  `kelas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_mata_pelajaran`
--

INSERT INTO `tbl_mata_pelajaran` (`id_mata_pelajaran`, `nama_mata_pelajaran`, `jml_jam_mata_pelajaran`, `kelompok_mata_pelajaran`, `semester`, `kelas`) VALUES
('MP-00001', 'PBO', 8, 'Produktif (C3)', 5, 'XII RPL 3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_materi_mata_pelajaran`
--

CREATE TABLE `tbl_materi_mata_pelajaran` (
  `id_materi_mata_pelajaran` varchar(10) NOT NULL,
  `id_mata_pelajaran` varchar(10) NOT NULL,
  `nama_materi_mata_pelajaran` text NOT NULL,
  `isi_materi_mata_pelajaran` text NOT NULL,
  `tgl_upload` datetime NOT NULL,
  `batas_absensi` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_materi_mata_pelajaran`
--

INSERT INTO `tbl_materi_mata_pelajaran` (`id_materi_mata_pelajaran`, `id_mata_pelajaran`, `nama_materi_mata_pelajaran`, `isi_materi_mata_pelajaran`, `tgl_upload`, `batas_absensi`) VALUES
('MM-00001', 'MP-00001', 'Coba Materi', '<p>bfb</p>\r\n', '2023-10-25 19:52:00', '2023-10-26 19:52:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nilai_mata_pelajaran`
--

CREATE TABLE `tbl_nilai_mata_pelajaran` (
  `id_nilai_mata_pelajaran` varchar(10) NOT NULL,
  `id_mata_pelajaran` varchar(10) NOT NULL,
  `id_tugas_mata_pelajaran` varchar(10) NOT NULL,
  `nip` varchar(100) NOT NULL,
  `nis` varchar(100) NOT NULL,
  `nilai` int(3) NOT NULL,
  `grade` enum('A','A-','B','B-','C','D','E') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `nis` varchar(100) NOT NULL,
  `nama_siswa` text NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tempat_lahir` text NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `kelas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`nis`, `nama_siswa`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `no_telp`, `kelas`) VALUES
('102101745', 'ANISA RISQY RINJANI', 'P', 'BANDUNG', '2006-06-19', 'Kp. Ciburial Rt 02 Rw 09', '082218258632', 'XII RPL 3'),
('102101746', 'APRILIA PUTRI ANGGARA SETIAWAN', 'P', 'BANDUNG', '2005-04-09', '\nJLN. PESANTREN NO 38 RT 01/RW 08', '087727268018', 'XII RPL 3'),
('102101748', 'DIAN WIWI MUSTIKA', 'P', 'CIMAHI', '2005-11-11', 'JLN.MARTASIK KP PONDOK CIBALIGO RT 03/RW 10 NO 89', '082262241254', 'XII RPL 3'),
('102101749', 'EKO CANDRA', 'L', 'CIMAHI', '2006-04-04', 'KP.KARANG ANYAR RT 06/RW 09 NO', '088220382799', 'XII RPL 3'),
('102101750', 'FASYA SYABILA', 'P', 'CIMAHI', '2006-03-01', 'JLN. CIBOGO RT 07/RW 07', '0895360627812', 'XII RPL 3'),
('102101753', 'LINDA NURYANI', 'P', 'BANDUNG', '2006-02-26', 'JLN. KARYALAKSANA RT 02/RW 05 NO 053', '081395990148', 'XII RPL 3'),
('102101760', 'NINDY ARIFA', 'P', 'BANDUNG', '2006-04-18', 'JLN. HAJIGOPUR KP. RANDUKURUNG RT 4/ RW 10', '085710241278', 'XII RPL 3'),
('102101765', 'REZEL REKSA PRADIPTA', 'L', 'CIMAHI', '2005-09-08', 'JLN.KYHAJI USMAN DHOMIRI NO 22 RT1 RW3', '08982782635', 'XII RPL 3'),
('102101768', 'SALSA NUR FAUZIYYAH', 'P', 'CIMAHI', '2006-03-08', 'JLN. HAJI HARIS BAROS SUKARAJA', '085720955400', 'XII RPL 3'),
('102101769', 'SARAH NAZIRA ISKANDAR', 'P', 'CIMAHI', '2005-03-21', 'JL. TERUSAN NO 35 RT 02/RW 03 CIMAHI TENGAH', '0895380598300', 'XII RPL 3'),
('102101771', 'TIA AULIA RIFANI', 'P', 'CIMAHI', '2005-01-23', 'JLN. CIGUGUR TENGAH RT 06/RW 08 NO 16', '089656822847', 'XII RPL 3'),
('102101773', 'VERONICA ELIZABETH FIRNANDYA', 'P', 'CIMAHI', '2006-01-17', 'JLN. CISANGKAN HILIR GANG BAKTI 1 RT 01/RW 03 NO 21', '085846853917', 'XII RPL 3'),
('102101776', 'YASIR MUBAROK WIRASUTA', 'L', 'CIMAHI', '2005-06-27', 'JLN.KH.USMAN DHOMIRI, RT 06 RW 18, NO.11, GG.BHAKTI XI', '0895346422601', 'XII RPL 3'),
('102101778', 'YUNITA SAFITRI', 'P', 'SEMARANG', '2005-06-02', 'KP KEBON MANGGU RT 05/RW 21', '089656175501', 'XII RPL 3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tugas_mata_pelajaran`
--

CREATE TABLE `tbl_tugas_mata_pelajaran` (
  `id_tugas_mata_pelajaran` varchar(10) NOT NULL,
  `id_mata_pelajaran` varchar(10) NOT NULL,
  `nama_tugas_mata_pelajaran` text NOT NULL,
  `isi_tugas_mata_pelajaran` text NOT NULL,
  `bobot` int(11) NOT NULL,
  `tgl_tugas` datetime NOT NULL,
  `batas_pengumpulan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wks_kurikulum`
--

CREATE TABLE `tbl_wks_kurikulum` (
  `nip` varchar(100) NOT NULL,
  `nama_wks_kurikulum` text NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tempat_lahir` text NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_absensi_mata_pelajaran`
--
ALTER TABLE `tbl_absensi_mata_pelajaran`
  ADD PRIMARY KEY (`id_absensi`),
  ADD KEY `fk_absensi_mapel` (`id_mata_pelajaran`),
  ADD KEY `fk_absensi_materi` (`id_materi_mata_pelajaran`),
  ADD KEY `fk_absensi_siswa` (`nis`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `tbl_akun`
--
ALTER TABLE `tbl_akun`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `tbl_bank_soal`
--
ALTER TABLE `tbl_bank_soal`
  ADD PRIMARY KEY (`id_soal`),
  ADD KEY `fk_soal_lk` (`id_lembar_ujian`);

--
-- Indexes for table `tbl_guru`
--
ALTER TABLE `tbl_guru`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `tbl_guru_mapel`
--
ALTER TABLE `tbl_guru_mapel`
  ADD PRIMARY KEY (`id_guru_mapel`),
  ADD KEY `fk_guru_mapel` (`id_mata_pelajaran`),
  ADD KEY `fk_mapel_guru` (`nip`);

--
-- Indexes for table `tbl_jadwal_ujian`
--
ALTER TABLE `tbl_jadwal_ujian`
  ADD PRIMARY KEY (`id_jadwal_ujian`),
  ADD KEY `fk_jadwal_lk` (`id_lembar_ujian`);

--
-- Indexes for table `tbl_jawaban_ujian`
--
ALTER TABLE `tbl_jawaban_ujian`
  ADD PRIMARY KEY (`id_jawaban_ujian`),
  ADD KEY `fk_jawaban_soal` (`id_soal`),
  ADD KEY `fk_jawaban_siswa` (`nis`),
  ADD KEY `fk_jawaban_lembar_ujian` (`id_lembar_ujian`);

--
-- Indexes for table `tbl_kepala_sekolah`
--
ALTER TABLE `tbl_kepala_sekolah`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `tbl_kumpul_tugas`
--
ALTER TABLE `tbl_kumpul_tugas`
  ADD PRIMARY KEY (`id_kirim`),
  ADD KEY `fk_ktugas_mapel` (`id_mata_pelajaran`),
  ADD KEY `fk_ktugas_tugas` (`id_tugas_mata_pelajaran`),
  ADD KEY `fk_ktugas_siswa` (`nis`);

--
-- Indexes for table `tbl_lembar_ujian`
--
ALTER TABLE `tbl_lembar_ujian`
  ADD PRIMARY KEY (`id_lembar_ujian`),
  ADD KEY `fk_lk_mapel` (`id_mata_pelajaran`);

--
-- Indexes for table `tbl_lk_mapel`
--
ALTER TABLE `tbl_lk_mapel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_lkmapel_lk` (`id_lembar_ujian`),
  ADD KEY `fk_lkmapel_mapel` (`id_mata_pelajaran`);

--
-- Indexes for table `tbl_mata_pelajaran`
--
ALTER TABLE `tbl_mata_pelajaran`
  ADD PRIMARY KEY (`id_mata_pelajaran`);

--
-- Indexes for table `tbl_materi_mata_pelajaran`
--
ALTER TABLE `tbl_materi_mata_pelajaran`
  ADD PRIMARY KEY (`id_materi_mata_pelajaran`),
  ADD KEY `fk_materi_mapel` (`id_mata_pelajaran`);

--
-- Indexes for table `tbl_nilai_mata_pelajaran`
--
ALTER TABLE `tbl_nilai_mata_pelajaran`
  ADD PRIMARY KEY (`id_nilai_mata_pelajaran`),
  ADD KEY `fk_nilai_mapel` (`id_mata_pelajaran`),
  ADD KEY `fk_nilai_tugas` (`id_tugas_mata_pelajaran`),
  ADD KEY `fk_nilai_guru` (`nip`),
  ADD KEY `fk_nilai_siswa` (`nis`);

--
-- Indexes for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `tbl_tugas_mata_pelajaran`
--
ALTER TABLE `tbl_tugas_mata_pelajaran`
  ADD PRIMARY KEY (`id_tugas_mata_pelajaran`),
  ADD KEY `fk_tugas_mapel` (`id_mata_pelajaran`);

--
-- Indexes for table `tbl_wks_kurikulum`
--
ALTER TABLE `tbl_wks_kurikulum`
  ADD PRIMARY KEY (`nip`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_absensi_mata_pelajaran`
--
ALTER TABLE `tbl_absensi_mata_pelajaran`
  MODIFY `id_absensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_guru_mapel`
--
ALTER TABLE `tbl_guru_mapel`
  MODIFY `id_guru_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_lk_mapel`
--
ALTER TABLE `tbl_lk_mapel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_absensi_mata_pelajaran`
--
ALTER TABLE `tbl_absensi_mata_pelajaran`
  ADD CONSTRAINT `fk_absensi_mapel` FOREIGN KEY (`id_mata_pelajaran`) REFERENCES `tbl_mata_pelajaran` (`id_mata_pelajaran`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_absensi_materi` FOREIGN KEY (`id_materi_mata_pelajaran`) REFERENCES `tbl_materi_mata_pelajaran` (`id_materi_mata_pelajaran`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_absensi_siswa` FOREIGN KEY (`nis`) REFERENCES `tbl_siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_bank_soal`
--
ALTER TABLE `tbl_bank_soal`
  ADD CONSTRAINT `fk_soal_lk` FOREIGN KEY (`id_lembar_ujian`) REFERENCES `tbl_lembar_ujian` (`id_lembar_ujian`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_guru_mapel`
--
ALTER TABLE `tbl_guru_mapel`
  ADD CONSTRAINT `fk_guru_mapel` FOREIGN KEY (`id_mata_pelajaran`) REFERENCES `tbl_mata_pelajaran` (`id_mata_pelajaran`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_mapel_guru` FOREIGN KEY (`nip`) REFERENCES `tbl_guru` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_jadwal_ujian`
--
ALTER TABLE `tbl_jadwal_ujian`
  ADD CONSTRAINT `fk_jadwal_lk` FOREIGN KEY (`id_lembar_ujian`) REFERENCES `tbl_lembar_ujian` (`id_lembar_ujian`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_jawaban_ujian`
--
ALTER TABLE `tbl_jawaban_ujian`
  ADD CONSTRAINT `fk_jawaban_lembar_ujian` FOREIGN KEY (`id_lembar_ujian`) REFERENCES `tbl_lembar_ujian` (`id_lembar_ujian`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_jawaban_siswa` FOREIGN KEY (`nis`) REFERENCES `tbl_siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_jawaban_soal` FOREIGN KEY (`id_soal`) REFERENCES `tbl_bank_soal` (`id_soal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_kumpul_tugas`
--
ALTER TABLE `tbl_kumpul_tugas`
  ADD CONSTRAINT `fk_ktugas_mapel` FOREIGN KEY (`id_mata_pelajaran`) REFERENCES `tbl_mata_pelajaran` (`id_mata_pelajaran`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_ktugas_siswa` FOREIGN KEY (`nis`) REFERENCES `tbl_siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_ktugas_tugas` FOREIGN KEY (`id_tugas_mata_pelajaran`) REFERENCES `tbl_tugas_mata_pelajaran` (`id_tugas_mata_pelajaran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_lembar_ujian`
--
ALTER TABLE `tbl_lembar_ujian`
  ADD CONSTRAINT `fk_lk_mapel` FOREIGN KEY (`id_mata_pelajaran`) REFERENCES `tbl_mata_pelajaran` (`id_mata_pelajaran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_lk_mapel`
--
ALTER TABLE `tbl_lk_mapel`
  ADD CONSTRAINT `fk_lkmapel_lk` FOREIGN KEY (`id_lembar_ujian`) REFERENCES `tbl_lembar_ujian` (`id_lembar_ujian`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_lkmapel_mapel` FOREIGN KEY (`id_mata_pelajaran`) REFERENCES `tbl_mata_pelajaran` (`id_mata_pelajaran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_materi_mata_pelajaran`
--
ALTER TABLE `tbl_materi_mata_pelajaran`
  ADD CONSTRAINT `fk_materi_mapel` FOREIGN KEY (`id_mata_pelajaran`) REFERENCES `tbl_mata_pelajaran` (`id_mata_pelajaran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_nilai_mata_pelajaran`
--
ALTER TABLE `tbl_nilai_mata_pelajaran`
  ADD CONSTRAINT `fk_nilai_guru` FOREIGN KEY (`nip`) REFERENCES `tbl_guru` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_nilai_mapel` FOREIGN KEY (`id_mata_pelajaran`) REFERENCES `tbl_mata_pelajaran` (`id_mata_pelajaran`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_nilai_siswa` FOREIGN KEY (`nis`) REFERENCES `tbl_siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_nilai_tugas` FOREIGN KEY (`id_tugas_mata_pelajaran`) REFERENCES `tbl_tugas_mata_pelajaran` (`id_tugas_mata_pelajaran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_tugas_mata_pelajaran`
--
ALTER TABLE `tbl_tugas_mata_pelajaran`
  ADD CONSTRAINT `fk_tugas_mapel` FOREIGN KEY (`id_mata_pelajaran`) REFERENCES `tbl_mata_pelajaran` (`id_mata_pelajaran`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
