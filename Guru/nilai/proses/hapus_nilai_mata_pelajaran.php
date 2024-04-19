<?php
	//include '../config/koneksi.php';

	$id_mata_pelajaran = $_POST['id_mata_pelajaran'];
	$nip = $_POST['nip'];
	$nis = $_POST['nis'];
	$id_tugas_mata_pelajaran = $_POST['id_tugas_mata_pelajaran'];

		$query = "DELETE FROM tbl_nilai_mata_pelajaran WHERE id_tugas_mata_pelajaran = '$id_tugas_mata_pelajaran' AND nis = '$nis'";
		$sql = $pdo->prepare($query);
		$sql->execute();
		
		if($sql){
			?>
			<script type="text/javascript">
				alert('Data telah terhapus');
				setTimeout("location.href='?page=nilai_mata_pelajaran&aksi=detail_tugas_mata_pelajaran&id=<?php echo $nis;?>&mapel=<?php echo $id_mata_pelajaran;?>'", 1000);
			</script>
			<?php
		}else{
			echo $query;
			?>
			<script type="text/javascript">
				alert('Data gagal terhapus');
				setTimeout("location.href='?page=nilai_mata_pelajaran&aksi=detail_tugas_mata_pelajaran&id=<?php echo $nis;?>&mapel=<?php echo $id_mata_pelajaran;?>'", 1000);
			</script>
			<?php
		}
		
?>