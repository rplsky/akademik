<?php
	//include '../config/koneksi.php';

	$id = $_GET['id'];
	$mapel = $_GET['mapel'];

		$query = "DELETE FROM tbl_guru_mapel WHERE id_guru_mapel = '$id'";
		$sql = $pdo->prepare($query);
		$sql->execute();
		
		if($sql){
			?>
			<script type="text/javascript">
				alert('Data telah terhapus');
				setTimeout("location.href='?page=mata_pelajaran&aksi=guru_mata_pelajaran&id=<?php echo $mapel;?>'", 1000);
			</script>
			<?php
		}else{
			echo $query;
			?>
			<script type="text/javascript">
				alert('Data gagal terhapus');
				setTimeout("location.href='?page=mata_pelajaran&aksi=guru_mata_pelajaran&id=<?php echo $mapel;?>'", 1000);
			</script>
			<?php
		}
		
?>