<?php
	//include '../config/koneksi.php';

	$nip = $_POST['nip'];
	$id_mata_pelajaran = $_POST['id_mata_pelajaran'];


		$query_guru = "INSERT INTO tbl_guru_mapel (id_mata_pelajaran, nip) VALUES ('$id_mata_pelajaran', '$nip')";
		$sql = $pdo->prepare($query_guru);
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
				setTimeout("location.href='?page=mata_pelajaran&aksi=tambahdataguru_mata_pelajaran&id=<?php echo $id_mata_pelajaran;?>'", 1000);
			</script>
			<?php
		}		
?>