-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2022 at 03:27 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

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
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `nip` varchar(100) NOT NULL,
  `nama_admin` varchar(30) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(13) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  `email` varchar(999) NOT NULL,
  `password` text NOT NULL,
  `hak_akses` enum('Admin','Guru','Wks Kurikulum','Kepala Sekolah','Siswa') NOT NULL,
  `nip` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_akun`
--

INSERT INTO `tbl_akun` (`email`, `password`, `hak_akses`, `nip`) VALUES
('rpl.smkangkasalhs@gmail.com', 'f09ef088b63a797e32d32badaca43f9bcda7765e', 'Admin', '123'),
('rizky.fauzi96@gmail.com', '4d9fcd87554439c18397933fef356d4bb6e9ac63', 'Guru', '01040172'),
('andikadikaa267@gmail.com', '03f30043760179b35667f1dea1ffbe6c5321f817', 'Siswa', '192010118'),
('kamalkomaludin14@gmail.com', '03f30043760179b35667f1dea1ffbe6c5321f817', 'Siswa', '192010110'),
('mzhafief@gmail.com', '03f30043760179b35667f1dea1ffbe6c5321f817', 'Siswa', '192010100'),
('muhammadfazzli13@gmail.com', '03f30043760179b35667f1dea1ffbe6c5321f817', 'Siswa', '192010114'),
('setiawanirfan591@gmail.com', '03f30043760179b35667f1dea1ffbe6c5321f817', 'Siswa', '192010107'),
('eeko35973@gmail.com', '03f30043760179b35667f1dea1ffbe6c5321f817', 'Siswa', '192010101'),
('hanifahputrisaskia@gmail.com', '03f30043760179b35667f1dea1ffbe6c5321f817', 'Siswa', '192010106'),
('yoga.pas1933@gmail.com', '03f30043760179b35667f1dea1ffbe6c5321f817', 'Siswa', '192010133'),
('really.syahputra88@gmail.com', '03f30043760179b35667f1dea1ffbe6c5321f817', 'Siswa', '192010122'),
('arizfirmansyah26@gmail.com', '03f30043760179b35667f1dea1ffbe6c5321f817', 'Siswa', '192010095'),
('okkyokky833@gmail.com', '03f30043760179b35667f1dea1ffbe6c5321f817', 'Siswa', '192010120'),
('farhanramadhany56@gmail.com', '03f30043760179b35667f1dea1ffbe6c5321f817', 'Siswa', '192010103'),
('leonardus.michael04@gmail.com', '03f30043760179b35667f1dea1ffbe6c5321f817', 'Siswa', '192010111'),
('irfan.indri2719@gmail.com', '03f30043760179b35667f1dea1ffbe6c5321f817', 'Siswa', '192010104'),
('irmadwiyanti494@gmail.com', '03f30043760179b35667f1dea1ffbe6c5321f817', 'Siswa', '192010108'),
('lutfireyhan4@gmail.com', '03f30043760179b35667f1dea1ffbe6c5321f817', 'Siswa', '192010123'),
('valen.kazep@gmail.com', '03f30043760179b35667f1dea1ffbe6c5321f817', 'Siswa', '192010132'),
('srisundaripmadhewi@gmail.com', '03f30043760179b35667f1dea1ffbe6c5321f817', 'Siswa', '192010130'),
('rizalanjaninursapari@gmail.com', '03f30043760179b35667f1dea1ffbe6c5321f817', 'Siswa', '192010126'),
('tegarstwn2004@gmail.com', '03f30043760179b35667f1dea1ffbe6c5321f817', 'Siswa', '192010113'),
('hendrafirmansyah31@gmail.com', '03f30043760179b35667f1dea1ffbe6c5321f817', 'Siswa', '20030904'),
('agungtriana220105@gmail.com', '03f30043760179b35667f1dea1ffbe6c5321f817', 'Siswa', '202110104'),
('rsaferdiana@gmail.com', '03f30043760179b35667f1dea1ffbe6c5321f817', 'Siswa', '202110132'),
('anesibrahim242@gmail.com', '03f30043760179b35667f1dea1ffbe6c5321f817', 'Siswa', '202110137'),
('evraridjki02@gmail.com', '03f30043760179b35667f1dea1ffbe6c5321f817', 'Siswa', '20211010'),
('galangngrh99@gmail.com', '03f30043760179b35667f1dea1ffbe6c5321f817', 'Siswa', '202110115'),
('alfarisiihsan9@gmail.com', '03f30043760179b35667f1dea1ffbe6c5321f817', 'Siswa', '202110118'),
('andinimardiyanti7@gmail.com', '03f30043760179b35667f1dea1ffbe6c5321f817', 'Siswa', '202110106'),
('naufalmsyah13@gmail.com', '03f30043760179b35667f1dea1ffbe6c5321f817', 'Siswa', '202110123'),
('eugenepasmalo@gmail.com', '03f30043760179b35667f1dea1ffbe6c5321f817', 'Siswa', '202110111'),
('haqqonihadi@gmail.com', '03f30043760179b35667f1dea1ffbe6c5321f817', 'Siswa', '202110116'),
('rahadianfahrezi@gmail.com', '03f30043760179b35667f1dea1ffbe6c5321f817', 'Siswa', '202110113'),
('farrelshaquillet505@gmail.com', '03f30043760179b35667f1dea1ffbe6c5321f817', 'Siswa', '202110114'),
('ratnasari2902@gmail.com', '4d9fcd87554439c18397933fef356d4bb6e9ac63', 'Guru', '0104200507120200'),
('dhania713@gmail.com', '4d9fcd87554439c18397933fef356d4bb6e9ac63', 'Guru', '010420180067'),
('angkasahsn2021@gmail.com ', '4d9fcd87554439c18397933fef356d4bb6e9ac63', 'Guru', '01041100'),
('azhellray@gmail.com', '03f30043760179b35667f1dea1ffbe6c5321f817', 'Siswa', '202110107'),
('rantionyon23@gmail.com', '03f30043760179b35667f1dea1ffbe6c5321f817', 'Siswa', '202110129'),
('ekidemong@gmail.com', '03f30043760179b35667f1dea1ffbe6c5321f817', 'Siswa', '202110110'),
('rakaandikadorasan093@gmail.com', '03f30043760179b35667f1dea1ffbe6c5321f817', 'Siswa', '2021100127'),
('susysusilawati74@gmail.com', '03f30043760179b35667f1dea1ffbe6c5321f817', 'Siswa', '202110136'),
('kristaandhika1@gmail.com', '03f30043760179b35667f1dea1ffbe6c5321f817', 'Siswa', '202110119'),
('abdeefebry29@gmail.com', '03f30043760179b35667f1dea1ffbe6c5321f817', 'Siswa', '202110101'),
('marsyaherlina00@gmail.com', '03f30043760179b35667f1dea1ffbe6c5321f817', 'Siswa', '3273054205060002'),
('akagamers06@gmail.com', '03f30043760179b35667f1dea1ffbe6c5321f817', 'Siswa', '212210141'),
('asyvachairunisa@gmail.com', '03f30043760179b35667f1dea1ffbe6c5321f817', 'Siswa', '181907004'),
('fahmifahmijr880@gmail.com', '03f30043760179b35667f1dea1ffbe6c5321f817', 'Siswa', '1718197060043'),
('alwanmf123@gmail.com', '03f30043760179b35667f1dea1ffbe6c5321f817', 'Siswa', '212210138'),
('sheiladesviani2005@gmail.com', '03f30043760179b35667f1dea1ffbe6c5321f817', 'Siswa', '212210157'),
('rdtwrdnt@gmail.com', '03f30043760179b35667f1dea1ffbe6c5321f817', 'Siswa', '18197101'),
('azharderel221@gmail.com', '03f30043760179b35667f1dea1ffbe6c5321f817', 'Siswa', '212210145'),
('chizzlerkeju@gmail.com', '03f30043760179b35667f1dea1ffbe6c5321f817', 'Siswa', '212210139'),
('febryantoputra40@gmail.com', '03f30043760179b35667f1dea1ffbe6c5321f817', 'Siswa', '212210124'),
('arifsaefulloh244@gmail.com', '03f30043760179b35667f1dea1ffbe6c5321f817', 'Siswa', '212210177'),
('airelatrila@gmail.com', '03f30043760179b35667f1dea1ffbe6c5321f817', 'Siswa', '181907138'),
('sintafebriana759@gmail.com', '03f30043760179b35667f1dea1ffbe6c5321f817', 'Siswa', '212210158'),
('m.havidz12@gmail.com', '03f30043760179b35667f1dea1ffbe6c5321f817', 'Siswa', '212210137'),
('naufalrachman31@gmail.com', '03f30043760179b35667f1dea1ffbe6c5321f817', 'Siswa', '212210119'),
('naufaldzakyrahmatrahmat@gmail.com', '03f30043760179b35667f1dea1ffbe6c5321f817', 'Siswa', '212210130'),
('riskonalfatih@gmail.com', '03f30043760179b35667f1dea1ffbe6c5321f817', 'Siswa', '212210133'),
('rafidrmwnt@gmail.com', '03f30043760179b35667f1dea1ffbe6c5321f817', 'Siswa', '202110124'),
('rifkibakti5@gmail.com', '03f30043760179b35667f1dea1ffbe6c5321f817', 'Siswa', '192010124'),
('alfianekanugraha12@gmail.com', '03f30043760179b35667f1dea1ffbe6c5321f817', 'Siswa', '181907197'),
('athallahbakcis19@gmail.com', '03f30043760179b35667f1dea1ffbe6c5321f817', 'Siswa', '212210118'),
('daffaazryan381@gmail.com', '03f30043760179b35667f1dea1ffbe6c5321f817', 'Siswa', '212210121'),
('rosenayla2323@gmail.com', '03f30043760179b35667f1dea1ffbe6c5321f817', 'Siswa', '0084838602'),
('nickyxnoviansyah@gmail.com', '03f30043760179b35667f1dea1ffbe6c5321f817', 'Siswa', '212210131'),
('rhmaw195@gmail.com', '03f30043760179b35667f1dea1ffbe6c5321f817', 'Siswa', '212210134'),
('chiqitarizkia30@gmail.com', '03f30043760179b35667f1dea1ffbe6c5321f817', 'Siswa', '212210120'),
('zahraramanayshillasopian@gmail.com', '03f30043760179b35667f1dea1ffbe6c5321f817', 'Siswa', '212210136'),
('arielvalensa@gmail.com', '03f30043760179b35667f1dea1ffbe6c5321f817', 'Siswa', '212210128'),
('putradavin2805@gmail.com', '03f30043760179b35667f1dea1ffbe6c5321f817', 'Siswa', '212210122'),
('purwantiratih84@gmail.com', '03f30043760179b35667f1dea1ffbe6c5321f817', 'Siswa', '212210132'),
('chianers0893@gmail.com', '03f30043760179b35667f1dea1ffbe6c5321f817', 'Siswa', '192010109'),
('saefusalman2@gmail.com', '03f30043760179b35667f1dea1ffbe6c5321f817', 'Siswa', '192010127'),
('denadarachel099@gmail.com', '03f30043760179b35667f1dea1ffbe6c5321f817', 'Siswa', '192010099');

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bank_soal`
--

INSERT INTO `tbl_bank_soal` (`id_soal`, `id_lembar_ujian`, `pertanyaan`, `pilihan_a`, `pilihan_b`, `pilihan_c`, `pilihan_d`, `pilihan_e`, `jawaban`, `poin_soal`) VALUES
('BS-00002', 'LU-00001', '<p><img alt=\"Contoh kondisi if/elseif/else\" src=\"https://www.petanikode.com/img/php/percabangan/percabangan-if-elseif.png\" style=\"height:105px; width:250px\" /></p>\r\n\r\n<p>Algoritma adalah ...</p>\r\n', 'Cara\r\nnihh', 'Cik\r\ntext', 'Aplikasi\r\nteaa', 'Program\r\ncus2', 'Hmmm...\r\nhemm...', 'Cara\r\nnihh', '4');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_guru`
--

CREATE TABLE `tbl_guru` (
  `nip` varchar(100) NOT NULL,
  `nama_guru` varchar(30) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(13) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_guru`
--

INSERT INTO `tbl_guru` (`nip`, `nama_guru`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `no_telp`) VALUES
('01040172', 'Rizky Fauzi Achman', 'L', 'Bandung', '1996-01-08', 'Komplek Pakusarakan D3 No 15 RT 01 RW 19 Desa Tanimulya Kec. Ngamprah', '089697744372'),
('0104200507120200', 'Eneng Ratnasari', 'P', 'Bandung', '1999-11-30', 'Jl. Trs. Mukodar No. 299', '08986114894'),
('010420180067', 'M Dimas Mardhani', 'L', 'Bandung', '1999-11-30', 'Jl. Cetarip Kulon II No. Kav 168 RT. 04 RW. 09 Kel. Kopo Kec. Bojongloa Kaler', '089621746222'),
('01041100', 'Ridho Afriyan', 'L', 'Payakumbuh', '1999-11-30', 'Jl. Cihanjuang Kp. Cibaligo No. 20 RT. 05 RW. 01 Kec. Parongpong', '089683014606');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_guru_mapel`
--

CREATE TABLE `tbl_guru_mapel` (
  `id_guru_mapel` int(11) NOT NULL,
  `id_mata_pelajaran` varchar(10) NOT NULL,
  `nip` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_guru_mapel`
--

INSERT INTO `tbl_guru_mapel` (`id_guru_mapel`, `id_mata_pelajaran`, `nip`) VALUES
(8, 'MP-00001', '0104200507120200'),
(9, 'MP-00002', '01041100'),
(10, 'MP-00003', '01041100'),
(11, 'MP-00004', '01040172'),
(12, 'MP-00005', '01040172'),
(13, 'MP-00006', '01040172'),
(17, 'MP-00007', '01040172'),
(18, 'MP-00008', '01040172'),
(19, 'MP-00009', '01040172'),
(20, 'MP-00006', '01041100'),
(21, 'MP-00008', '0104200507120200'),
(22, 'MP-00009', '010420180067');

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jadwal_ujian`
--

INSERT INTO `tbl_jadwal_ujian` (`id_jadwal_ujian`, `id_lembar_ujian`, `tanggal_mulai`, `tanggal_akhir`, `waktu`, `kelas`) VALUES
('JU-00001', 'LU-00001', '2021-09-28 21:01:00', '2021-09-28 21:30:00', '60', 'X RPL');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jawaban_ujian`
--

CREATE TABLE `tbl_jawaban_ujian` (
  `id_jawaban_ujian` varchar(10) NOT NULL,
  `id_soal` varchar(10) NOT NULL,
  `nis` varchar(10) NOT NULL,
  `jawaban` text NOT NULL,
  `poin` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kepala_sekolah`
--

CREATE TABLE `tbl_kepala_sekolah` (
  `nip` varchar(100) NOT NULL,
  `nama_kepala_sekolah` varchar(30) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(13) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kumpul_tugas`
--

INSERT INTO `tbl_kumpul_tugas` (`id_kirim`, `id_tugas_mata_pelajaran`, `id_mata_pelajaran`, `nis`, `file`, `tgl_kirim`) VALUES
('TK-00001', 'TG-00001', 'MP-00001', '124', 'TK-00001-124-TG-00001.pdf', '2021-09-26 18:57:43');

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
  `poin` varchar(10) NOT NULL DEFAULT '100'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_lembar_ujian`
--

INSERT INTO `tbl_lembar_ujian` (`id_lembar_ujian`, `id_mata_pelajaran`, `deskripsi`, `jenis_ujian`, `jml_soal`, `poin`) VALUES
('LU-00001', 'MP-00001', '<p style=\"text-align:center\"><strong>TATA TERTIB PELAKSANAAN UJIAN TENGAH SEMESTER</strong></p>\r\n\r\n<p style=\"text-align:center\"><strong>TAHUN PELAJARAN 2021-2022</strong></p>\r\n\r\n<p>Untuk pelaksanaan Ujian Sekolah, silakan diperhatikan tata tertib dibawah ini:</p>\r\n\r\n<ol>\r\n	<li>Peserta Ujian harus bergabung kedalam grup whatsapp kelas yang dikelola oleh sekolah dan wajib melengkapi profil whatsapp dengan nama lengkap. Link ujian akan diinfokan hanya melalui grup whatsapp tersebut tepat sesuai jadwal. Dan mintalah&nbsp;<strong>TOKEN</strong>&nbsp;Ujian kepada Pengawas Ujian setelah Peserta Ujian mengisi biodata pada form Ujian Sekolah.</li>\r\n	<li>Peserta harus membuka link ujian menggunakan browser google chrome. Setiap peserta ujian hanya dapat mengerjakan soal 1 kali, dan tidak ada pengerjaan ulang atau perbaikan.</li>\r\n	<li>Ujian Sekolahkan diselenggarakan secara Daring tetapi Tatap Muka, dengan model pertanyaan pilihan jamak.</li>\r\n	<li>Waktu ujian adalah 2 jam (120 menit).</li>\r\n	<li>Peserta ujian harus membaca dengan teliti instruksi yang ada didalam form soal. Pastikan semua sudah terbuka semua sebelum Anda memulai mengerjakan.</li>\r\n	<li>Peserta Ujian harus menjunjung tinggi integritas dan kejujuran dalam mengikuti Ujian Sekolah.</li>\r\n	<li>Peserta Ujian harus mempersiapkan perangkat yang akan digunakan, dapat berupa handphone/tablet/laptop yang sudah terkoneksi dengan internet 5 menit sebelum waktu ujian dimulai, dan pastikan kapasitas baterai mencukupi (disarankan penuh).</li>\r\n	<li>Peserta Ujian yang terlambat bergabung dan terlambat membuka soal, maka waktu pengerjaan tetap habis sesuai jadwal yang sudah ditetapkan dan tidak ada penambahan waktu. Siswa yang belum melakukan&nbsp;<em>Submit</em>&nbsp;jawaban hingga waktu habis, maka otomatis jawaban tidak akan tersimpan.</li>\r\n	<li>Selama ujian berlangsung, peserta ujian dilarang untuk:\r\n	<ul>\r\n		<li>Berkomunikasi ke peserta lain dalam bentuk apapun kecuali dengan Pengawas Ruangan.</li>\r\n		<li>Memfoto/screenshoot atau merekam tampilan soal.</li>\r\n		<li>Aktivitas lainnya yang mengganggu sistem Ujian Sekolah yang mengacu ke Tata Tertib Sekolah dan Peraturan Perundangan yang berlaku.</li>\r\n	</ul>\r\n	</li>\r\n	<li>Apabila terjadi masalah yang mengakibatkan peserta ujian tidak bisa melanjutkan ujian karena alasan teknis yang tidak dapat dikendalikan, maka Peserta Ujian segera melapor ke Pengawas Ruangan.</li>\r\n	<li>Pengawas Ruangan mempunyai wewenang dan tanggungjawab penuh pada waktu pelaksanaan ujian dalam hal:\r\n	<ul>\r\n		<li>Mengedarkan lembar daftar hadir.</li>\r\n		<li>Memberi teguran dan peringatan kepada Peserta Ujian yang melanggar tata tertib.</li>\r\n		<li>Mencatat NIS dan Nama Peserta Ujian yang melanggar Tata Tertib Ujian.</li>\r\n	</ul>\r\n	</li>\r\n	<li>Kehadiran resmi didapat dari daftar kehadiran yang diisi saat di ruang ujian.</li>\r\n	<li>Siswa diperbolehkan keluar ruangan setelah menunjukkan tampilan Submit dilayar&nbsp;handphone/tablet/laptop yang digunakan untuk mengerjakan soal kepada Pengawas Ruangan.</li>\r\n	<li>Peserta Ujian bersedia menerima sanksi akademis apabila melanggar peraturan Tata Tertib ini, antara lain nilai Ujian Sekolah dinyatakan tidak sah dan tidak diperkenankan mengikuti ujian susulan.</li>\r\n	<li>Siswa yang tidak mengikuti ujian 2 mapel berturut turut atau 3 akumulasi mapel semasa sepekan masa ujian, orang tua/wali akan dipanggil ke sekolah.</li>\r\n	<li>Jika ada siswa yang berhalangan untuk mengikuti Ujian Sekolah, diharuskan melapor ke panitia sebelum pelaksanaan Ujian Sekolah dimulai dan mendapat izin tertulis dari panitia.</li>\r\n	<li>Siswa wajib membawa bekal masing-masing. Karena selama ujian Peserta Ujian tidak diperkenankan keluar (ijin) meninggalkan sekolah.</li>\r\n	<li>Selama Ujian Sekolah berlangsung, Peserta Ujian&nbsp;<strong>Wajib mematuhi Protokol Kesehatan.</strong></li>\r\n</ol>\r\n', 'Penilaian Tengah Semester', 25, '100');

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mata_pelajaran`
--

INSERT INTO `tbl_mata_pelajaran` (`id_mata_pelajaran`, `nama_mata_pelajaran`, `jml_jam_mata_pelajaran`, `kelompok_mata_pelajaran`, `semester`, `kelas`) VALUES
('MP-00001', 'PPKn', 2, 'Nasional', 1, 'X KA'),
('MP-00002', 'Komputer dan Jaringan Dasar', 4, 'Produktif (C1)', 1, 'X KA'),
('MP-00003', 'Komputer dan Jaringan Dasar', 4, 'Nasional', 1, 'X KB'),
('MP-00004', 'Pemrograman Dasar', 3, 'Produktif (C2)', 1, 'X KA'),
('MP-00005', 'Pemrograman Dasar', 3, 'Produktif (C2)', 1, 'X KB'),
('MP-00006', 'PBO 1', 8, 'Produktif (C3)', 3, 'XI KA'),
('MP-00007', 'PPL', 5, 'Produktif (C3)', 3, 'XI KA'),
('MP-00008', 'PBO 2', 8, 'Produktif (C3)', 5, 'XII KA'),
('MP-00009', 'PWP 2', 13, 'Produktif (C3)', 5, 'XII KA');

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
  `nilai` int(11) NOT NULL,
  `grade` enum('A','A-','B','B-','C','D','E') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_nilai_mata_pelajaran`
--

INSERT INTO `tbl_nilai_mata_pelajaran` (`id_nilai_mata_pelajaran`, `id_mata_pelajaran`, `id_tugas_mata_pelajaran`, `nip`, `nis`, `nilai`, `grade`) VALUES
('NI-00001', 'MP-00001', 'TG-00001', '401172', '124', 76, 'B');

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`nis`, `nama_siswa`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `no_telp`, `kelas`) VALUES
('212210132', 'RATIH PURWANTI', 'P', 'Cimahi', '1999-11-30', 'GG manunggal 2c RT 01 RW 10', '0895613040105', 'X KA'),
('212210122', 'DAVIN PUTRA PUJIONO', 'L', 'Bandung', '1999-11-30', 'KP.SAYURAN GG.MANUNGGAL II C', '085703067792', 'X KA'),
('212210128', 'MUHAMMAD ARIEL VALENSA PUTRA', 'L', 'bandung', '1999-11-30', 'jl.muara takus raya t4 no 10', '08164641063', 'X KA'),
('212210120', 'CHIQITA RIZKIA NURUL ANDINI', 'P', 'Bandung ', '1999-11-30', 'jalan rajawali gang latifah', '0881023819693', 'X KA'),
('212210136', 'ZAHRA RAMANAYSHILLA SOPIAN ', 'P', 'Bandung', '1999-11-30', 'Jalan cihanjuang ', '089656463085', 'X KA'),
('212210134', 'SITI RAHMAWATI', 'P', 'Bandung', '1999-11-30', 'Jl. Babakan Radio No 18 RT 06 RW 07 Keluarahan Sukaraja Kecamatan Cicendo', '081321029092', 'X KA'),
('0084838602', 'NAILAH HIKMATUL FADILAH', 'P', 'Cilacap', '1999-11-30', 'Kumala garden blok 1 no 10 rt 01 rw 06 kelurahan sukawarna kecamatan sukajadi bandung, KOTA BANDUNG, SUKAJADI, JAWA BARAT, ', '0895336285380', 'X KA'),
('212210131', 'NICKY RAMANDHA NOVIANSYAH ', 'L', 'Bandung ', '1999-11-30', 'Jl. sukaraja II No.281 rt 01 rw 06', '085974215683', 'X KA'),
('212210121', 'DAFFA AZRYAN FADHLURROHMAN', 'L', 'Bandung', '1999-11-30', 'Cibuntu barat rt07 rw09', '083108954344', 'X KA'),
('212210118', 'ATHALLAH ABHI PRAMANA', 'L', 'Bandung', '1999-11-30', 'Jln Babakan Ciamis no 278/5b, Rt01 Rw03, kelurahan Babakan Ciamis, kecamatan sumur Bandung', '0877354122679', 'X KA'),
('181907197', 'ALFIAN EKA NUGRAHA ', 'L', 'Subang ', '1999-11-30', 'Jln Arjuna No 18 Rt 02 / Rw 01 ', '082112728011', 'X KA'),
('192010124', 'RIFKI BAKTI ARAHMAN', 'L', 'Bandung', '1999-11-30', 'Jl. Terusan Sukamulya', '08817889091', 'X KA'),
('202110124', 'RAFII DARMAWANTO', 'L', 'Bandung', '1999-11-30', 'Cijerah,bojong raya,jln.triplek no 33', '085722079334', 'X KA'),
('212210133', 'RIZQON ALFATIH', 'L', 'Jakarta', '1999-11-30', 'Jalan mekar mulya 09 rw08 rt07', '089674495282', 'X KA'),
('212210119', 'ATTALARIQ NAUFAL RACHMAN', 'L', 'Bandung', '1999-11-30', 'Jl.cijerah GG pelita', '087847441080', 'X KA'),
('212210130', 'NAUFAL DZAKY RACHMAT', 'L', 'Bandung', '1999-11-30', 'Perumahan Cimareme indah Blok D3/26', '089638183064', 'X KA'),
('212210124', 'FEBRY ANTO EKA PUTRA', 'L', 'Cimahi', '1999-11-30', 'Jalan kebon kopi gang djumsari no 68', '08156190358', 'X KA'),
('212210177', 'ARIF SAEFULLOH', 'L', 'Bandung, Jawa Barat', '1999-11-30', 'Bojong Koneng Rt03/06, No.8\nKec. Andir\nKel. Campaka', '082318009949', 'X KA'),
('181907138', 'MUHAMMAD AIREL RIZAL SONI PUTRA', 'L', 'Bandung', '1999-11-30', 'Gg. HJ. Juariah No. 44 RT 05 RW 01', '083821443079', 'X KA'),
('212210158', 'SINTA FEBRIANA', 'P', 'Kebumen', '1999-11-30', 'Komplek Griya Mas Jalan Griya Raya No. 15', '083820083035', 'X KB'),
('212210137', 'ADITYA NUGRAHA ', 'L', 'Bandung ', '1999-11-30', 'KP Cidamar GG BP Murtasik RT 02 RW 08', '0895380162345', 'X KB'),
('212210139', 'ARDHI MAULANA', 'L', 'Purwakarta', '1999-11-30', 'Jl Jatayu 1 no 254 RT 8 RW 12', '085523710392', 'X KB'),
('212210145', 'DEREL MUHAMAD AZHAR', 'L', 'Bandung', '1999-11-30', 'Jl Cidamar GG bapak murtasik no 29 RT 02 RW 08, Kelurahan Pasirkaliki, Kecamatan Cimahi Utara, kota Cimahi', '085795580863', 'X KB'),
('18197101', 'RADITHYA WIRADINATA', 'L', 'Bandung', '1999-11-30', 'Jl.Ciroyom Barat Gg. Al-Ikhlas RT.5. RW.11.  Dungus Cariang Bandung', '087824062237', 'X KB'),
('212210157', 'SHEILA DESVIANI', 'P', 'Bandung', '1999-11-30', 'Jln gunungbatu dalam rt01/01', '089621434744', 'X KB'),
('212210138', 'ALWAN MUSTAFA FADHILLAH', 'L', 'Bandung', '1999-11-30', 'Cibuntu sayuran', '081905027537', 'X KB'),
('1718197060043', 'FAHMI PUTRA ALFIANSYAH', 'L', 'Bandung', '1999-11-30', 'JL.HALTEU UTARA NO.114/75 Rt.06 Rw.02', '087724189207', 'X KB'),
('181907004', 'ASYVA CHAIRUNISA', 'P', 'Bandung', '1999-11-30', 'Jl.ciumbuleuit gg ardasik no.11 rt04/rw10', '085872536810', 'X KB'),
('212210141', 'AZHAR EKA MUSTOPA', 'L', 'Bandung', '1999-11-30', 'Jln Melong asih GG manunggal 2 c', '085798244095', 'X KB'),
('3273054205060002', 'MARSYA HERLINA PUTRI', 'P', 'Bandung', '1999-11-30', 'Jl halteu Utara RT 04 RW 01', '083132949342', 'X KB'),
('202110101', 'ABDEE FEBRY ANEYZHA RACHMAN', 'L', 'BANDUNG', '1999-11-30', 'Jalan Babakan Cianjur no.88', '08978565354', 'XI KA'),
('202110119', 'KRISTA ANDHIKA PERMANA', 'L', 'Kulon Progo', '1999-11-30', 'Cibuntu barat RT 7 RW 9', '089647123671', 'XI KA'),
('202110136', 'SUSY SUSILAWATI', 'P', 'Bandung', '1999-11-30', 'Jl.Holis gang ibu iti 3 RT 02 RW 01', '0895379679050', 'XI KA'),
('202110106', 'ANDINI MARDIYANTI', 'P', 'BANDUNG', '1999-11-30', 'Jl. Holis gg.Siti Fatimah Rt.08 Rw.03', '082240711212', 'XI KA'),
('202110123', 'NAUFAL MAULANA SYAHPUTRA', 'L', 'Cimahi', '1999-11-30', 'Jl.Babakan Ciamis No.43 Rt.04 Rw.07', '083829692213', 'XI KA'),
('202110111', 'EUGEN PASMALO PRAYUDA', 'L', 'gresik', '1999-11-30', 'JL. Sukaraja Gang 2 No. 10', '0895392243456', 'XI KA'),
('202110116', 'HADI HAQQONI ', 'L', 'Bandung ', '1999-11-30', 'Jl Holis gg saleh abas no 76a/81 rt 05/03', '081646933936', 'XI KA'),
('202110113', 'FAHREZI RAHADIAN SYAHRI', 'L', 'Sukabumi', '1999-11-30', 'Jl kalpataru gempol sari blok d no 35 bumi asri', '087705118062', 'XI KA'),
('202110114', 'FARREL SHAQUILLE TARANTINO', 'L', 'Cianjur', '1999-11-30', 'Jl.Gunung Krakatau No.11 Komplek Fadent RT.01/RW.09 Kec. Cimahi Utara Kel. Pasirkaliki', '087762092040', 'XI KA'),
('2021100127', 'RAKA ANDIKA PERMANA', 'L', 'Bandung', '1999-11-30', 'Cimahi Selatan/Jln.Rancabentang', '085846859047', 'XI KA'),
('202110110', 'EKI ADI FIRMANSYAH', 'L', 'Bandung ', '0000-00-00', 'Bandung jl.ciroyom no 15', '087835158418', 'XI KA'),
('202110107', 'AZHEL RAY NAUFAL FAVIAN ', 'L', 'Bandung ', '1999-11-30', 'Jl citaeip barat dlm ', '081324131193', 'XI KA'),
('202110129', 'RANTI DAMAYANTI', 'P', 'Bandung', '1999-11-30', 'Jln. Cibogo atas', '085523783228', 'XI KA'),
('202110118', 'IHSAN ALFARISI', 'L', 'BANDUNG', '1999-11-30', 'JLN.MELONG BLOK SAKOLA RT 07/RW 07 NO 190', '0881023603433', 'XI KA'),
('202110115', 'GALANG NUGRAHA', 'L', 'Bandung', '1999-11-30', 'jln.trs hj.alpi gang Babakan Garut rt08/rw08', '085959897093', 'XI KA'),
('20211010', 'MUHAMAD EVRA RIDJKI', 'L', 'Bandung', '1999-11-30', 'Jl.Mulyasari', '0895422657585', 'XI KA'),
('202110137', 'YOHANES IBRAHIM', 'L', 'Bandung', '1999-11-30', 'Jln suryani dlm 01 no 202', '089691421166', 'XI KA'),
('202110132', 'ROSA PARDIANA', 'P', 'Kebumen', '1999-11-30', 'Jln.kebon kopi gg.h.safei2 RT.02 RW.28', '089515777343', 'XI KA'),
('202110104', 'AGUNG TRIANA', 'L', 'Bandung', '1999-11-30', 'Jln cihanjuang kp centeng', '088220477919', 'XI KA'),
('20030904', 'BAYURAFLIANPAWANA', 'P', 'Bandung', '1999-11-30', 'Jl Arjuna 14/70', '082122072775', 'XI LA'),
('192010113', 'MUCHAMMAD TEGAR SETIAWAN', 'L', 'Bandung', '1999-11-30', 'Jl. Rorojongrang barat 1 b2 no 8', '087845808206', 'XII KA'),
('192010126', 'RIZAL ANJANI NUR SAPARI', 'L', 'Bandung', '1999-11-30', 'Kp. Ciburial', '089674535437', 'XII KA'),
('192010130', 'SRISUNDARI PUSPANINGWINDUFITRIE MADHEWI', 'P', 'Bandung', '1999-11-30', 'Jln. Terusan Mulyasari no.10 Rt.001/Rw.003 Kecamatan : Sukajadi, Kelurahan : Sukagalih, Bandung Jawa Barat, Indonesia 40163', '089619536968', 'XII KA'),
('192010132', 'VALENT ARDIANSYAH', 'P', 'Kebumen', '1999-11-30', 'Jl.Pajajaran Gg.sukasari No.50B/66', '081574108524', 'XII KA'),
('192010123', 'REYHAN LUTFI NURYARDAN', 'L', 'BANDUNG', '1999-11-30', 'Jln. cihampelas, gg Jembar, No15a 35b, Rt08/Rw04', '08812289422', 'XII KA'),
('192010108', 'IRMA DWIYANTI ', 'P', 'Ciamis ', '1999-11-30', 'Cimindi', '082320101090', 'XII KA'),
('192010104', 'GILANG RAHMAN RAMADHAN', 'L', 'Bandung', '1999-11-30', 'Jl. H. Anwar Rt03 Rw08 kelurahan cibuntu kecamatan Bandung Kulon No 149', '087737781563', 'XII KA'),
('192010111', 'LEONARDUS MICHAEL N', 'L', 'BANDUNG', '1999-11-30', 'Jl.Maleber gg.bakti 3', '0881022247964', 'XII KA'),
('192010103', 'FARHAN RAMADHANY', 'L', 'Cimahi', '1999-11-30', 'Jl.Citopeng Sari No 332 Rt 06', '085795032675', 'XII KA'),
('192010120', 'OKKY ANGGA WIJAYA', 'L', 'Bandung', '1999-11-30', 'JL.Sangkuriang no 60', '087822378799', 'XII KA'),
('192010095', 'ARIZ FIRMANSYAH', 'L', 'Bandung', '1999-11-30', 'Jl. Sindang sari barat no 61', '081214298229', 'XII KA'),
('192010122', 'REALLY RIDA SYAHPUTRA', 'L', 'Bandung', '1999-11-30', 'Jl.sarikaso 3 no.11', '089602876004', 'XII KA'),
('192010133', 'YOGA WAHID RAMADHAN', 'L', 'Bandung', '1999-11-30', 'Jl.kebon kawung', '088218303249', 'XII KA'),
('192010106', 'HANIFAH PUTRI SASKIA', 'P', 'Bandung', '1999-11-30', 'Jl.Dadali 3 Rt 01 Rw 03 No 91', '087736296678', 'XII KA'),
('192010101', 'EKA ALI HILMANSYAH', 'L', 'Bandung', '1999-11-30', 'Jl.ciroyom ni 158', '087710119626', 'XII KA'),
('192010107', 'IRFAN SETIAWAN', 'L', 'Bandung', '1999-11-30', 'Jl.Budhi Singkurmulya RT 05/12 Kel.Pasirkaliki Kec.Cimahi Utara Kota Cimahi 40514', '082119838311', 'XII KA'),
('192010114', 'MUHAMMAD FAZZLI HADIAN', 'L', 'Bandung', '1999-11-30', 'Jln. Gunung rahayu 1', '083862505873', 'XII KA'),
('192010100', 'DILLA DERANI', 'P', 'Cimahi', '1999-11-30', 'jl. Rancabentang rt01 rw 25 no 19', '085624591606', 'XII KA'),
('192010110', 'KAMAL KOMALUDIN', 'L', 'Cimahi', '1999-11-30', 'Jln. Gunung Batu Cidamar GG BP Bungsu No. 51 RT 006 RW 008 Kelurahan Pasirkaliki kecamatan Cimahi Utara', '083174873401', 'XII KA'),
('192010118', 'MUHHAMAD ANDIKA ADRIAN PUTRA', 'L', 'Bandung', '1999-11-30', 'jl cijerah gg pasantren no 99', '083829488237', 'XII KA'),
('192010109', 'JEMMY CHRISTIAN CHIA', 'L', 'Bandung', '1999-11-30', 'Jl. Baturengat RT002/ RW013 (Mess Kahatex)', '081224220698', 'XII KA'),
('192010127', 'SAEFU SALMAN', 'L', 'Bandung', '1999-11-30', 'Jalan rancabentang no 15', '087736296653', 'XII KA'),
('192010099', 'DENADA RACHEL ISABELLA NATACYA', 'P', 'Bandung', '1999-11-30', 'Jln. Cijerah 2 Blok 4 Gg.Anis No 18', '088220655824', 'XII KA');

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wks_kurikulum`
--

CREATE TABLE `tbl_wks_kurikulum` (
  `nip` varchar(100) NOT NULL,
  `nama_wks_kurikulum` varchar(30) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(13) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

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
  ADD PRIMARY KEY (`id_soal`);

--
-- Indexes for table `tbl_guru`
--
ALTER TABLE `tbl_guru`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `tbl_guru_mapel`
--
ALTER TABLE `tbl_guru_mapel`
  ADD PRIMARY KEY (`id_guru_mapel`);

--
-- Indexes for table `tbl_jadwal_ujian`
--
ALTER TABLE `tbl_jadwal_ujian`
  ADD PRIMARY KEY (`id_jadwal_ujian`);

--
-- Indexes for table `tbl_jawaban_ujian`
--
ALTER TABLE `tbl_jawaban_ujian`
  ADD PRIMARY KEY (`id_jawaban_ujian`);

--
-- Indexes for table `tbl_kepala_sekolah`
--
ALTER TABLE `tbl_kepala_sekolah`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `tbl_kumpul_tugas`
--
ALTER TABLE `tbl_kumpul_tugas`
  ADD PRIMARY KEY (`id_kirim`);

--
-- Indexes for table `tbl_lembar_ujian`
--
ALTER TABLE `tbl_lembar_ujian`
  ADD PRIMARY KEY (`id_lembar_ujian`);

--
-- Indexes for table `tbl_mata_pelajaran`
--
ALTER TABLE `tbl_mata_pelajaran`
  ADD PRIMARY KEY (`id_mata_pelajaran`);

--
-- Indexes for table `tbl_nilai_mata_pelajaran`
--
ALTER TABLE `tbl_nilai_mata_pelajaran`
  ADD PRIMARY KEY (`id_nilai_mata_pelajaran`);

--
-- Indexes for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `tbl_tugas_mata_pelajaran`
--
ALTER TABLE `tbl_tugas_mata_pelajaran`
  ADD PRIMARY KEY (`id_tugas_mata_pelajaran`);

--
-- Indexes for table `tbl_wks_kurikulum`
--
ALTER TABLE `tbl_wks_kurikulum`
  ADD PRIMARY KEY (`nip`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_guru_mapel`
--
ALTER TABLE `tbl_guru_mapel`
  MODIFY `id_guru_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
