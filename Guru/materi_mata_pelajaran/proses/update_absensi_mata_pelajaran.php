<?php
	//include '../config/koneksi.php';

	$id_mata_pelajaran = $_GET['mapel'];
	$id_materi_mata_pelajaran = $_GET['id'];
	$ibm = $_GET['ibm'];
    $status = $_GET['status'];
    
    //echo "Id Mata Pelajaran : ".$id_mata_pelajaran." Id Materi Mata Pelajaran : ".$id_materi_mata_pelajaran." Id Absensi : ".$ibm." Status : ".$status;

		$query = "UPDATE tbl_absensi_mata_pelajaran SET  
										status = '$status'
										WHERE id_absensi = '$ibm'";
		$sql = $pdo->prepare($query);
		$sql->execute();
		
		if($sql){
			?>
			<script type="text/javascript">
				setTimeout("location.href='?page=materi_mata_pelajaran&aksi=rekapdata_absensi_mata_pelajaran&id=<?php echo $id_materi_mata_pelajaran;?>&mapel=<?php echo $id_mata_pelajaran;?>'", 1000);
			</script>
			<?php
		}else{
			echo $query;
			?>
			<script type="text/javascript">
				setTimeout("location.href='?page=materi_mata_pelajaran&aksi=detail_materi_mata_pelajaran&id=<?php echo $id_materi_mata_pelajaran;?>&mapel=<?php echo $id_mata_pelajaran;?>'", 1000);
			</script>
			<?php
		}	
		
?>