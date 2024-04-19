<?php
	//include '../config/koneksi.php';

	$id_tugas_mata_pelajaran = $_POST['id_tugas_mata_pelajaran'];
	$id_mata_pelajaran = $_POST['id_mata_pelajaran'];
	$nama_tugas_mata_pelajaran = $_POST['nama_tugas_mata_pelajaran'];
	$isi_tugas_mata_pelajaran = $_POST['isi_tugas_mata_pelajaran'];
	$bobot = $_POST['bobot'];
	$batas_pengumpulan = $_POST['batas_pengumpulan'];
	$tgl_skrang = date("Y-m-d");

		$query = "UPDATE tbl_tugas_mata_pelajaran SET  
										id_mata_pelajaran = '$id_mata_pelajaran',
										nama_tugas_mata_pelajaran = '$nama_tugas_mata_pelajaran', 
										isi_tugas_mata_pelajaran = '$isi_tugas_mata_pelajaran', 
										bobot = '$bobot', 
										batas_pengumpulan = '$batas_pengumpulan'
										WHERE id_tugas_mata_pelajaran = '$id_tugas_mata_pelajaran'";
		$sql = $pdo->prepare($query);
		$sql->execute();
		
		if($sql){
			?>
			<script type="text/javascript">
				alert('Data telah tersimpan');
				setTimeout("location.href='?page=tugas_mata_pelajaran&aksi=aktif'", 1000);
			</script>
			<?php
		}else{
			echo $query;
			?>
			<script type="text/javascript">
				alert('Data gagal tersimpan');
				setTimeout("location.href='?page=tugas_mata_pelajaran&aksi=editdata_tugas_mata_pelajaran&id=<?php echo $id_tugas_mata_pelajaran;?>'", 1000);
			</script>
			<?php
		}	
		
?>