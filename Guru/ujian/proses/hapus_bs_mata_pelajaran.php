<?php
	//include '../config/koneksi.php';

	$id = $_GET['id'];
	$lk = $_GET['lk'];
	$mapel = $_GET['mapel'];

		$query = "DELETE FROM tbl_bank_soal WHERE id_soal = '$id'";
		$sql = $pdo->prepare($query);
		$sql->execute();
		
		if($sql){
			?>
			<script type="text/javascript">
				alert('Data telah terhapus');
				setTimeout("location.href='?page=ujian&aksi=bs&id=<?php echo $lk; ?>&mapel=<?php echo $mapel; ?>'", 1000);
			</script>
			<?php
		}else{
			echo $query;
			?>
			<script type="text/javascript">
				alert('Data gagal terhapus');
				setTimeout("location.href='?page=ujian&aksi=bs&id=<?php echo $lk; ?>&mapel=<?php echo $mapel; ?>'", 1000);
			</script>
			<?php
		}
		
?>