-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 29 Sep 2021 pada 06.46
-- Versi server: 5.7.31
-- Versi PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_elearning2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_admin`
--

DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `nip` varchar(10) NOT NULL,
  `nama_admin` varchar(30) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  PRIMARY KEY (`nip`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_admin`
--

INSERT INTO `tbl_admin` (`nip`, `nama_admin`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `no_telp`) VALUES
('123', 'Rizky', 'L', 'Bandung', '1996-01-08', 'Komplek Pakusarakan D3 No 15 RT 01 RW 19 Desa Tanimulya Kec. Ngamprah', '089697744372');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_akun`
--

DROP TABLE IF EXISTS `tbl_akun`;
CREATE TABLE IF NOT EXISTS `tbl_akun` (
  `email` varchar(999) NOT NULL,
  `password` text NOT NULL,
  `hak_akses` enum('Admin','Guru','Wks Kurikulum','Kepala Sekolah','Siswa') NOT NULL,
  `nip` varchar(10) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_akun`
--

INSERT INTO `tbl_akun` (`email`, `password`, `hak_akses`, `nip`) VALUES
('rpl.smkangkasalhs@gmail.com', 'fa18de88d38602b89ac77a0d96b183bdc27258c4', 'Admin', '123'),
('rizky.fauzi96@gmail.com', '4d9fcd87554439c18397933fef356d4bb6e9ac63', 'Guru', '401172'),
('andinimar16@gmail.com', '03f30043760179b35667f1dea1ffbe6c5321f817', 'Siswa', '124');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_bank_soal`
--

DROP TABLE IF EXISTS `tbl_bank_soal`;
CREATE TABLE IF NOT EXISTS `tbl_bank_soal` (
  `id_soal` varchar(10) NOT NULL,
  `id_lembar_ujian` varchar(10) NOT NULL,
  `pertanyaan` text NOT NULL,
  `pilihan_a` text NOT NULL,
  `pilihan_b` text NOT NULL,
  `pilihan_c` text NOT NULL,
  `pilihan_d` text NOT NULL,
  `pilihan_e` text NOT NULL,
  `jawaban` text NOT NULL,
  `poin_soal` varchar(10) NOT NULL,
  PRIMARY KEY (`id_soal`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_bank_soal`
--

INSERT INTO `tbl_bank_soal` (`id_soal`, `id_lembar_ujian`, `pertanyaan`, `pilihan_a`, `pilihan_b`, `pilihan_c`, `pilihan_d`, `pilihan_e`, `jawaban`, `poin_soal`) VALUES
('BS-00002', 'LU-00001', '<p><img alt=\"Contoh kondisi if/elseif/else\" src=\"https://www.petanikode.com/img/php/percabangan/percabangan-if-elseif.png\" style=\"height:105px; width:250px\" /></p>\r\n\r\n<p>Algoritma adalah ...</p>\r\n', 'Cara\r\nnihh', 'Cik\r\ntext', 'Aplikasi\r\nteaa', 'Program\r\ncus2', 'Hmmm...\r\nhemm...', 'Cara\r\nnihh', '4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_guru`
--

DROP TABLE IF EXISTS `tbl_guru`;
CREATE TABLE IF NOT EXISTS `tbl_guru` (
  `nip` varchar(10) NOT NULL,
  `nama_guru` varchar(30) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  PRIMARY KEY (`nip`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_guru`
--

INSERT INTO `tbl_guru` (`nip`, `nama_guru`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `no_telp`) VALUES
('401172', 'Rizky Fauzi Achman', 'L', 'Bandung', '1996-01-08', 'Komplek Pakusarakan D3 No 15 RT 01 RW 19 Desa Tanimulya Kec. Ngamprah', '089697744372');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_guru_mapel`
--

DROP TABLE IF EXISTS `tbl_guru_mapel`;
CREATE TABLE IF NOT EXISTS `tbl_guru_mapel` (
  `id_guru_mapel` int(11) NOT NULL AUTO_INCREMENT,
  `id_mata_pelajaran` varchar(10) NOT NULL,
  `nip` varchar(10) NOT NULL,
  PRIMARY KEY (`id_guru_mapel`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_guru_mapel`
--

INSERT INTO `tbl_guru_mapel` (`id_guru_mapel`, `id_mata_pelajaran`, `nip`) VALUES
(1, 'MP-00001', '401172');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jadwal_ujian`
--

DROP TABLE IF EXISTS `tbl_jadwal_ujian`;
CREATE TABLE IF NOT EXISTS `tbl_jadwal_ujian` (
  `id_jadwal_ujian` varchar(10) NOT NULL,
  `id_lembar_ujian` varchar(10) NOT NULL,
  `tanggal_mulai` datetime NOT NULL,
  `tanggal_akhir` datetime NOT NULL,
  `waktu` varchar(5) NOT NULL,
  `kelas` text NOT NULL,
  PRIMARY KEY (`id_jadwal_ujian`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_jadwal_ujian`
--

INSERT INTO `tbl_jadwal_ujian` (`id_jadwal_ujian`, `id_lembar_ujian`, `tanggal_mulai`, `tanggal_akhir`, `waktu`, `kelas`) VALUES
('JU-00001', 'LU-00001', '2021-09-28 21:01:00', '2021-09-28 21:30:00', '60', 'X RPL');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jawaban_ujian`
--

DROP TABLE IF EXISTS `tbl_jawaban_ujian`;
CREATE TABLE IF NOT EXISTS `tbl_jawaban_ujian` (
  `id_jawaban_ujian` varchar(10) NOT NULL,
  `id_soal` varchar(10) NOT NULL,
  `nis` varchar(10) NOT NULL,
  `jawaban` text NOT NULL,
  `poin` varchar(10) NOT NULL,
  PRIMARY KEY (`id_jawaban_ujian`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kepala_sekolah`
--

DROP TABLE IF EXISTS `tbl_kepala_sekolah`;
CREATE TABLE IF NOT EXISTS `tbl_kepala_sekolah` (
  `nip` varchar(10) NOT NULL,
  `nama_kepala_sekolah` varchar(30) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  PRIMARY KEY (`nip`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kumpul_tugas`
--

DROP TABLE IF EXISTS `tbl_kumpul_tugas`;
CREATE TABLE IF NOT EXISTS `tbl_kumpul_tugas` (
  `id_kirim` varchar(10) NOT NULL,
  `id_tugas_mata_pelajaran` varchar(10) NOT NULL,
  `id_mata_pelajaran` varchar(10) NOT NULL,
  `nis` varchar(10) NOT NULL,
  `file` text NOT NULL,
  `tgl_kirim` datetime NOT NULL,
  PRIMARY KEY (`id_kirim`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kumpul_tugas`
--

INSERT INTO `tbl_kumpul_tugas` (`id_kirim`, `id_tugas_mata_pelajaran`, `id_mata_pelajaran`, `nis`, `file`, `tgl_kirim`) VALUES
('TK-00001', 'TG-00001', 'MP-00001', '124', 'TK-00001-124-TG-00001.pdf', '2021-09-26 18:57:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_lembar_ujian`
--

DROP TABLE IF EXISTS `tbl_lembar_ujian`;
CREATE TABLE IF NOT EXISTS `tbl_lembar_ujian` (
  `id_lembar_ujian` varchar(10) NOT NULL,
  `id_mata_pelajaran` varchar(10) NOT NULL,
  `deskripsi` text NOT NULL,
  `jenis_ujian` enum('Kuis','Ulangan Harian','Penilaian Tengah Semester','Penilaian Akhir Semester') NOT NULL,
  `jml_soal` int(11) NOT NULL,
  `poin` varchar(10) NOT NULL DEFAULT '100',
  PRIMARY KEY (`id_lembar_ujian`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_lembar_ujian`
--

INSERT INTO `tbl_lembar_ujian` (`id_lembar_ujian`, `id_mata_pelajaran`, `deskripsi`, `jenis_ujian`, `jml_soal`, `poin`) VALUES
('LU-00001', 'MP-00001', '<p style=\"text-align:center\"><strong>TATA TERTIB PELAKSANAAN UJIAN TENGAH SEMESTER</strong></p>\r\n\r\n<p style=\"text-align:center\"><strong>TAHUN PELAJARAN 2021-2022</strong></p>\r\n\r\n<p>Untuk pelaksanaan Ujian Sekolah, silakan diperhatikan tata tertib dibawah ini:</p>\r\n\r\n<ol>\r\n	<li>Peserta Ujian harus bergabung kedalam grup whatsapp kelas yang dikelola oleh sekolah dan wajib melengkapi profil whatsapp dengan nama lengkap. Link ujian akan diinfokan hanya melalui grup whatsapp tersebut tepat sesuai jadwal. Dan mintalah&nbsp;<strong>TOKEN</strong>&nbsp;Ujian kepada Pengawas Ujian setelah Peserta Ujian mengisi biodata pada form Ujian Sekolah.</li>\r\n	<li>Peserta harus membuka link ujian menggunakan browser google chrome. Setiap peserta ujian hanya dapat mengerjakan soal 1 kali, dan tidak ada pengerjaan ulang atau perbaikan.</li>\r\n	<li>Ujian Sekolahkan diselenggarakan secara Daring tetapi Tatap Muka, dengan model pertanyaan pilihan jamak.</li>\r\n	<li>Waktu ujian adalah 2 jam (120 menit).</li>\r\n	<li>Peserta ujian harus membaca dengan teliti instruksi yang ada didalam form soal. Pastikan semua sudah terbuka semua sebelum Anda memulai mengerjakan.</li>\r\n	<li>Peserta Ujian harus menjunjung tinggi integritas dan kejujuran dalam mengikuti Ujian Sekolah.</li>\r\n	<li>Peserta Ujian harus mempersiapkan perangkat yang akan digunakan, dapat berupa handphone/tablet/laptop yang sudah terkoneksi dengan internet 5 menit sebelum waktu ujian dimulai, dan pastikan kapasitas baterai mencukupi (disarankan penuh).</li>\r\n	<li>Peserta Ujian yang terlambat bergabung dan terlambat membuka soal, maka waktu pengerjaan tetap habis sesuai jadwal yang sudah ditetapkan dan tidak ada penambahan waktu. Siswa yang belum melakukan&nbsp;<em>Submit</em>&nbsp;jawaban hingga waktu habis, maka otomatis jawaban tidak akan tersimpan.</li>\r\n	<li>Selama ujian berlangsung, peserta ujian dilarang untuk:\r\n	<ul>\r\n		<li>Berkomunikasi ke peserta lain dalam bentuk apapun kecuali dengan Pengawas Ruangan.</li>\r\n		<li>Memfoto/screenshoot atau merekam tampilan soal.</li>\r\n		<li>Aktivitas lainnya yang mengganggu sistem Ujian Sekolah yang mengacu ke Tata Tertib Sekolah dan Peraturan Perundangan yang berlaku.</li>\r\n	</ul>\r\n	</li>\r\n	<li>Apabila terjadi masalah yang mengakibatkan peserta ujian tidak bisa melanjutkan ujian karena alasan teknis yang tidak dapat dikendalikan, maka Peserta Ujian segera melapor ke Pengawas Ruangan.</li>\r\n	<li>Pengawas Ruangan mempunyai wewenang dan tanggungjawab penuh pada waktu pelaksanaan ujian dalam hal:\r\n	<ul>\r\n		<li>Mengedarkan lembar daftar hadir.</li>\r\n		<li>Memberi teguran dan peringatan kepada Peserta Ujian yang melanggar tata tertib.</li>\r\n		<li>Mencatat NIS dan Nama Peserta Ujian yang melanggar Tata Tertib Ujian.</li>\r\n	</ul>\r\n	</li>\r\n	<li>Kehadiran resmi didapat dari daftar kehadiran yang diisi saat di ruang ujian.</li>\r\n	<li>Siswa diperbolehkan keluar ruangan setelah menunjukkan tampilan Submit dilayar&nbsp;handphone/tablet/laptop yang digunakan untuk mengerjakan soal kepada Pengawas Ruangan.</li>\r\n	<li>Peserta Ujian bersedia menerima sanksi akademis apabila melanggar peraturan Tata Tertib ini, antara lain nilai Ujian Sekolah dinyatakan tidak sah dan tidak diperkenankan mengikuti ujian susulan.</li>\r\n	<li>Siswa yang tidak mengikuti ujian 2 mapel berturut turut atau 3 akumulasi mapel semasa sepekan masa ujian, orang tua/wali akan dipanggil ke sekolah.</li>\r\n	<li>Jika ada siswa yang berhalangan untuk mengikuti Ujian Sekolah, diharuskan melapor ke panitia sebelum pelaksanaan Ujian Sekolah dimulai dan mendapat izin tertulis dari panitia.</li>\r\n	<li>Siswa wajib membawa bekal masing-masing. Karena selama ujian Peserta Ujian tidak diperkenankan keluar (ijin) meninggalkan sekolah.</li>\r\n	<li>Selama Ujian Sekolah berlangsung, Peserta Ujian&nbsp;<strong>Wajib mematuhi Protokol Kesehatan.</strong></li>\r\n</ol>\r\n', 'Penilaian Tengah Semester', 25, '100');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_mata_pelajaran`
--

DROP TABLE IF EXISTS `tbl_mata_pelajaran`;
CREATE TABLE IF NOT EXISTS `tbl_mata_pelajaran` (
  `id_mata_pelajaran` varchar(10) NOT NULL,
  `nama_mata_pelajaran` text NOT NULL,
  `jml_jam_mata_pelajaran` int(11) NOT NULL,
  `kelompok_mata_pelajaran` enum('Nasional','Kewilayahan','Produktif (C1)','Produktif (C2)','Produktif (C3)','Muatan Lokal') NOT NULL,
  `semester` int(11) NOT NULL,
  `kelas` text NOT NULL,
  PRIMARY KEY (`id_mata_pelajaran`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_mata_pelajaran`
--

INSERT INTO `tbl_mata_pelajaran` (`id_mata_pelajaran`, `nama_mata_pelajaran`, `jml_jam_mata_pelajaran`, `kelompok_mata_pelajaran`, `semester`, `kelas`) VALUES
('MP-00001', 'Pemrograman Dasar', 3, 'Produktif (C2)', 1, 'X RPL');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_nilai_mata_pelajaran`
--

DROP TABLE IF EXISTS `tbl_nilai_mata_pelajaran`;
CREATE TABLE IF NOT EXISTS `tbl_nilai_mata_pelajaran` (
  `id_nilai_mata_pelajaran` varchar(10) NOT NULL,
  `id_mata_pelajaran` varchar(10) NOT NULL,
  `id_tugas_mata_pelajaran` varchar(10) NOT NULL,
  `nip` varchar(10) NOT NULL,
  `nis` varchar(10) NOT NULL,
  `nilai` int(11) NOT NULL,
  `grade` enum('A','A-','B','B-','C','D','E') NOT NULL,
  PRIMARY KEY (`id_nilai_mata_pelajaran`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_nilai_mata_pelajaran`
--

INSERT INTO `tbl_nilai_mata_pelajaran` (`id_nilai_mata_pelajaran`, `id_mata_pelajaran`, `id_tugas_mata_pelajaran`, `nip`, `nis`, `nilai`, `grade`) VALUES
('NI-00001', 'MP-00001', 'TG-00001', '401172', '124', 76, 'B');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_siswa`
--

DROP TABLE IF EXISTS `tbl_siswa`;
CREATE TABLE IF NOT EXISTS `tbl_siswa` (
  `nis` varchar(10) NOT NULL,
  `nama_siswa` text NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tempat_lahir` text NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `kelas` text NOT NULL,
  PRIMARY KEY (`nis`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`nis`, `nama_siswa`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `no_telp`, `kelas`) VALUES
('124', 'Andini Mardiyanti', 'P', 'Bandung', '2021-09-26', 'Jalan Lettu Subagio No. 22', '082120060380', 'X RPL');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tugas_mata_pelajaran`
--

DROP TABLE IF EXISTS `tbl_tugas_mata_pelajaran`;
CREATE TABLE IF NOT EXISTS `tbl_tugas_mata_pelajaran` (
  `id_tugas_mata_pelajaran` varchar(10) NOT NULL,
  `id_mata_pelajaran` varchar(10) NOT NULL,
  `nama_tugas_mata_pelajaran` text NOT NULL,
  `isi_tugas_mata_pelajaran` text NOT NULL,
  `bobot` int(11) NOT NULL,
  `tgl_tugas` datetime NOT NULL,
  `batas_pengumpulan` datetime NOT NULL,
  PRIMARY KEY (`id_tugas_mata_pelajaran`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_tugas_mata_pelajaran`
--

INSERT INTO `tbl_tugas_mata_pelajaran` (`id_tugas_mata_pelajaran`, `id_mata_pelajaran`, `nama_tugas_mata_pelajaran`, `isi_tugas_mata_pelajaran`, `bobot`, `tgl_tugas`, `batas_pengumpulan`) VALUES
('TG-00001', 'MP-00001', 'Integral', '<h2><strong>Rumus Integral</strong></h2>\r\n\r\n<p>Misalkan terdapat suatu fungsi sederhana ax<sup>n</sup>. Integral dari fungsi tersebut adalah</p>\r\n\r\n<p>Rumus Integral</p>\r\n\r\n<p><img alt=\"Rumus Integral\" src=\"https://rumuspintar.com/wp-content/uploads/2019/07/Rumus-Integral.jpg\" /></p>\r\n\r\n<p><strong>Keterangan:</strong></p>\r\n\r\n<ul>\r\n	<li>k &nbsp;: koefisien</li>\r\n	<li>x &nbsp;&nbsp;: variabel</li>\r\n	<li>n &nbsp;&nbsp;: pangkat/derajat dari variabel</li>\r\n	<li>C &nbsp;&nbsp;: konstanta</li>\r\n</ul>\r\n\r\n<p>Misalkan terdapat suatu fungsi f(x). Jika kita akan menentukan luas daerah yang dibatasi oleh grafik f(x) maka dapat ditentukan dengan</p>\r\n\r\n<p><img alt=\"Sifat Sifat Integral 1\" src=\"https://rumuspintar.com/wp-content/uploads/2019/07/Sifat-Sifat-Integral-1.jpg\" /></p>\r\n\r\n<p>dengan a dan b merupakan gari vertikal atau batas luasan daerah yang dihitung dari sumbu-x. Misalkan integra dari f(x) disimbolkan dengan F(x) atau jika dituliskan</p>\r\n\r\n<p><img alt=\"Sifat Sifat Integral 2\" src=\"https://rumuspintar.com/wp-content/uploads/2019/07/Sifat-Sifat-Integral-2.jpg\" /></p>\r\n\r\n<p>maka</p>\r\n\r\n<p><img alt=\"Sifat Sifat Integral 3\" src=\"https://rumuspintar.com/wp-content/uploads/2019/07/Sifat-Sifat-Integral-3.jpg\" /></p>\r\n\r\n<p><strong>Keterangan:</strong></p>\r\n\r\n<ul>\r\n	<li>a, b &nbsp;: batas atas dan batas bawah integral</li>\r\n	<li>f(x) &nbsp;: persamaan kurva</li>\r\n	<li>F(x) &nbsp;: luasan di bawah kurva f(x)</li>\r\n</ul>\r\n\r\n<p><iframe frameborder=\"0\" height=\"200\" src=\"https://www.youtube.com/embed/lZrt0X_Biko\" title=\"YouTube video player\" width=\"250\"></iframe></p>\r\n', 100, '2021-09-27 08:41:00', '2021-09-28 20:49:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_wks_kurikulum`
--

DROP TABLE IF EXISTS `tbl_wks_kurikulum`;
CREATE TABLE IF NOT EXISTS `tbl_wks_kurikulum` (
  `nip` varchar(10) NOT NULL,
  `nama_wks_kurikulum` varchar(30) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  PRIMARY KEY (`nip`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
