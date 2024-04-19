<?php
	//include '../config/koneksi.php';

	$id = $_GET['id'];

		$query = "DELETE FROM tbl_tugas_mata_pelajaran WHERE id_tugas_mata_pelajaran = '$id'";
		$sql = $pdo->prepare($query);
		$sql->execute();
		
		if($sql){
			?>
			<script type="text/javascript">
				alert('Data telah terhapus');
				setTimeout("location.href='?page=tugas_mata_pelajaran&aksi=aktif'", 1000);
			</script>
			<?php
		}else{
			echo $query;
			?>
			<script type="text/javascript">
				alert('Data gagal terhapus');
				setTimeout("location.href='?page=tugas_mata_pelajaran&aksi=aktif'", 1000);
			</script>
			<?php
		}
		
?>