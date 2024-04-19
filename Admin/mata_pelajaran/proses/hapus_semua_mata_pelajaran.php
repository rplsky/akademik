<?php
	//include '../config/koneksi.php';

	//$id = $_GET['id'];

		$query = "
					DELETE FROM tbl_mata_pelajaran;
					DELETE FROM tbl_guru_mapel;
					DELETE FROM tbl_tugas_mata_pelajaran;
					DELETE FROM tbl_kumpul_tugas;
					DELETE FROM tbl_materi_mata_pelajaran;
					DELETE FROM tbl_absensi_mata_pelajaran;
					DELETE FROM tbl_nilai_mata_pelajaran;
					DELETE FROM tbl_lembar_ujian;
					DELETE FROM tbl_lk_mapel;
					DELETE FROM tbl_bank_soal;
					DELETE FROM tbl_jadwal_ujian;
					DELETE FROM tbl_jawaban_ujian;
				";
		$sql = $pdo->prepare($query);
		$sql->execute();
		
		if($sql){
			?>
			<script type="text/javascript">
				alert('Data telah terhapus');
				setTimeout("location.href='?page=mata_pelajaran&aksi=aktif'", 1000);
			</script>
			<?php
		}else{
			echo $query;
			?>
			<script type="text/javascript">
				alert('Data gagal terhapus');
				setTimeout("location.href='?page=mata_pelajaran&aksi=aktif'", 1000);
			</script>
			<?php
		}
		
?>