<?php
	//include '../config/koneksi.php';

	$id_jadwal = $_POST['id_jadwal'];
	$id_lembar_ujian = $_POST['id_lembar_ujian'];
	$id_mata_pelajaran = $_POST['id_mata_pelajaran'];
	$tanggal_mulai = $_POST['tanggal_mulai'];
	$tanggal_akhir = $_POST['tanggal_akhir'];
	$waktu = $_POST['waktu'];

		$query = "UPDATE tbl_jadwal_ujian SET 
											tanggal_mulai = '$tanggal_mulai',
											tanggal_akhir = '$tanggal_akhir',
											waktu = '$waktu'
											WHERE id_jadwal_ujian = '$id_jadwal'
		";
		$sql = $pdo->prepare($query);
		$sql->execute();
		
		if($sql){
			?>
			<script type="text/javascript">
				alert('Data telah tersimpan');
				setTimeout("location.href='?page=ujian&aksi=ju&id=<?php echo $id_lembar_ujian; ?>&mapel=<?php echo $id_mata_pelajaran; ?>'", 1000);
			</script>
			<?php
		}else{
			echo $query;
			?>
			<script type="text/javascript">
				alert('Data gagal tersimpan');
				setTimeout("location.href='?page=ujian&aksi=editdata_ju_mata_pelajaran&id=<?php echo $id_soal; ?>&lk=<?php echo $id_lembar_ujian; ?>&mapel=<?php echo $id_mata_pelajaran; ?>", 1000);
			</script>
			<?php
		}		
?>