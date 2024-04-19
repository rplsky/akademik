<?php
	//include '../config/koneksi.php';

	$id_materi_mata_pelajaran = $_POST['id_materi_mata_pelajaran'];
	$id_mata_pelajaran = $_POST['id_mata_pelajaran'];
	$nama_materi_mata_pelajaran = $_POST['nama_materi_mata_pelajaran'];
	$isi_materi_mata_pelajaran = $_POST['isi_materi_mata_pelajaran'];
	$tgl_upload = $_POST['tgl_upload'];
	$batas_absensi = $_POST['batas_absensi'];

		$query = "UPDATE tbl_materi_mata_pelajaran SET  
										id_mata_pelajaran = '$id_mata_pelajaran',
										nama_materi_mata_pelajaran = '$nama_materi_mata_pelajaran', 
										isi_materi_mata_pelajaran = '$isi_materi_mata_pelajaran', 
										tgl_upload = '$tgl_upload', 
										batas_absensi = '$batas_absensi'
										WHERE id_materi_mata_pelajaran = '$id_materi_mata_pelajaran'";
		$sql = $pdo->prepare($query);
		$sql->execute();
		
		if($sql){
			?>
			<script type="text/javascript">
				alert('Data telah tersimpan');
				setTimeout("location.href='?page=materi_mata_pelajaran&aksi=tampil_materi_mapel&id=<?php echo $id_mata_pelajaran; ?>'", 1000);
			</script>
			<?php
		}else{
			echo $query;
			?>
			<script type="text/javascript">
				alert('Data gagal tersimpan');
				setTimeout("location.href='?page=materi_mata_pelajaran&aksi=editdata_materi_mata_pelajaran&id=<?php echo $id_materi_mata_pelajaran;?>&mapel=<?php echo $id_mata_pelajaran; ?>'", 1000);
			</script>
			<?php
		}	
		
?>