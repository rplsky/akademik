<?php
	//include '../config/koneksi.php';

	$id = $_GET['id'];
	$mapel = $_GET['mapel'];

		$query = "
					DELETE FROM tbl_lembar_ujian WHERE id_lembar_ujian = '$id';
					DELETE FROM tbl_lk_mapel WHERE id_lembar_ujian = '$id';
					";
		$sql = $pdo->prepare($query);
		$sql->execute();
		
		if($sql){
			?>
			<script type="text/javascript">
				alert('Data telah terhapus');
				setTimeout("location.href='?page=ujian&aksi=lk&id=<?php echo $mapel; ?>'", 1000);
			</script>
			<?php
		}else{
			echo $query;
			?>
			<script type="text/javascript">
				alert('Data gagal terhapus');
				setTimeout("location.href='?page=ujian&aksi=lk&id=<?php echo $mapel; ?>'", 1000);
			</script>
			<?php
		}
		
?>