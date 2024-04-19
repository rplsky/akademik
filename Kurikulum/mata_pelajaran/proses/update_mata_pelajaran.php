<?php
	//include '../config/koneksi.php';

	$id_mata_pelajaran = $_POST['id_mata_pelajaran'];
	$nip = $_POST['nip'];
	$nama_mata_pelajaran = $_POST['nama_mata_pelajaran'];
	$jml_jam_mata_pelajaran = $_POST['jml_jam_mata_pelajaran'];
	$kelompok_mata_pelajaran = $_POST['kelompok_mata_pelajaran'];
	$semester = $_POST['semester'];
	$kelas = $_POST['kelas'];

		$query = "UPDATE tbl_mata_pelajaran SET  
										nip = '$nip',
										nama_mata_pelajaran = '$nama_mata_pelajaran', 
										jml_jam_mata_pelajaran = '$jml_jam_mata_pelajaran', 
										kelompok_mata_pelajaran = '$kelompok_mata_pelajaran', 
										semester = '$semester', 
										kelas = '$kelas'
										WHERE id_mata_pelajaran = '$id_mata_pelajaran'";
		$sql = $pdo->prepare($query);
		$sql->execute();
		
		if($sql){
			?>
			<script type="text/javascript">
				alert('Data telah tersimpan');
				setTimeout("location.href='?page=mata_pelajaran&aksi=aktif'", 1000);
			</script>
			<?php
		}else{
			echo $query;
			?>
			<script type="text/javascript">
				alert('Data gagal tersimpan');
				setTimeout("location.href='?page=mata_pelajaran&aksi=editdata_mata_pelajaran&id=<?php echo $id_mata_pelajaran;?>'", 1000);
			</script>
			<?php
		}	
		
?>