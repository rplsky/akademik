<?php
	//include '../config/koneksi.php';

	$id_lembar_ujian = $_POST['id_lembar_ujian'];
	$id_mata_pelajaran = $_POST['id_mata_pelajaran'];
	$deskripsi = $_POST['deskripsi'];
	$jml_soal = $_POST['jml_soal'];
	$jenis_ujian = $_POST['jenis_ujian'];
	$poin = 100;

		$query = "UPDATE tbl_lembar_ujian SET 
												deskripsi = '$deskripsi',
												jml_soal = '$jml_soal',
												jenis_ujian = '$jenis_ujian'
												WHERE id_lembar_ujian = '$id_lembar_ujian'
		";
		$sql = $pdo->prepare($query);
		$sql->execute();
		
		if($sql){
			?>
			<script type="text/javascript">
				alert('Data telah tersimpan');
				setTimeout("location.href='?page=ujian&aksi=lk&id=<?php echo $id_mata_pelajaran; ?>'", 1000);
			</script>
			<?php
		}else{
			echo $query;
			?>
			<script type="text/javascript">
				alert('Data gagal tersimpan');
				setTimeout("location.href='?page=ujian&aksi=editdata_lk_mata_pelajaran&id=<?php echo $id_mata_pelajaran; ?>''", 1000);
			</script>
			<?php
		}		
?>