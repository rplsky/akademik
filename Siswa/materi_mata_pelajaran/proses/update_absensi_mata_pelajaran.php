<?php
	//include '../config/koneksi.php';

	$id_mata_pelajaran = $_GET['mapel'];
	$id_materi_mata_pelajaran = $_GET['id'];
	$absn = $_GET['absen'];
	$nip = $_SESSION['id_user'];
	date_default_timezone_set('Asia/Jakarta');
    $absen = date('Y-m-d H:i:s');
    $status = "Hadir";
    
    if($absen <= $absn){
        
		$query = "UPDATE tbl_absensi_mata_pelajaran SET  
										tgl_akhir_absensi = '$absen',
										status = '$status'
										WHERE id_mata_pelajaran = '$id_mata_pelajaran' AND id_materi_mata_pelajaran = '$id_materi_mata_pelajaran' AND nis = '$nip'";
		$sql = $pdo->prepare($query);
		$sql->execute();
		
		if($sql){
			?>
			<script type="text/javascript">
				setTimeout("location.href='?page=materi_mata_pelajaran&aksi=tampil_materi_mapel&id=<?php echo $id_mata_pelajaran;?>'", 1000);
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
    } else {
        ?>
		<script type="text/javascript">
			setTimeout("location.href='?page=materi_mata_pelajaran&aksi=tampil_materi_mapel&id=<?php echo $id_mata_pelajaran;?>'", 1000);
		</script>
		<?php
    }
		
?>