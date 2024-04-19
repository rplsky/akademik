<?php
	//include '../config/koneksi.php';

	$id_soal = $_POST['id_soal'];
	$id_lembar_ujian = $_POST['id_lembar_ujian'];
	$id_mata_pelajaran = $_POST['id_mata_pelajaran'];
	$pertanyaan = $_POST['pertanyaan'];
	$pilihan_a = $_POST['pilihan_a'];
	$pilihan_b = $_POST['pilihan_b'];
	$pilihan_c = $_POST['pilihan_c'];
	$pilihan_d = $_POST['pilihan_d'];
	$pilihan_e = $_POST['pilihan_e'];
	$j = $_POST['jawaban'];

	if ($j=='pilihan_a') {
		$jawaban = $pilihan_a;
	} elseif ($j=='pilihan_b') {
		$jawaban = $pilihan_b;
	} elseif ($j=='pilihan_c') {
		$jawaban = $pilihan_c;
	} elseif ($j=='pilihan_d') {
		$jawaban = $pilihan_d;
	} elseif ($j=='pilihan_e') {
		$jawaban = $pilihan_e;
	}

		$query = "UPDATE tbl_bank_soal SET 
											pertanyaan = '$pertanyaan',
											pilihan_a = '$pilihan_a',
											pilihan_b = '$pilihan_b',
											pilihan_c = '$pilihan_c',
											pilihan_d = '$pilihan_d',
											pilihan_e = '$pilihan_e',
											jawaban = '$jawaban'
											WHERE id_soal = '$id_soal'
		";
		$sql = $pdo->prepare($query);
		$sql->execute();
		
		if($sql){
			?>
			<script type="text/javascript">
				alert('Data telah tersimpan');
				setTimeout("location.href='?page=ujian&aksi=bs&id=<?php echo $id_lembar_ujian; ?>&mapel=<?php echo $id_mata_pelajaran; ?>'", 1000);
			</script>
			<?php
		}else{
			echo $query;
			?>
			<script type="text/javascript">
				alert('Data gagal tersimpan');
				setTimeout("location.href='?page=ujian&aksi=editdata_bs_mata_pelajaran&id=<?php echo $id_soal; ?>&lk=<?php echo $id_lembar_ujian; ?>&mapel=<?php echo $id_mata_pelajaran; ?>", 1000);
			</script>
			<?php
		}		
?>