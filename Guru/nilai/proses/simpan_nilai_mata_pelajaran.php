<?php
	//include '../config/koneksi.php';

	$id_mata_pelajaran = $_POST['id_mata_pelajaran'];
	$nip = $_POST['nip'];
	$nis = $_POST['nis'];
	$id_tugas_mata_pelajaran = $_POST['id_tugas_mata_pelajaran'];
	$nilai = $_POST['nilai'];

	if ($nilai >= 95) {
		$grade = "A";
	} else if ($nilai >= 85 AND $nilai < 95) {
		$grade = "A-";
	}  else if ($nilai >= 75 AND $nilai < 85) {
		$grade = "B";
	} else if ($nilai >= 70 AND $nilai < 75) {
		$grade = "B-";
	} else if ($nilai >= 60 AND $nilai < 70) {
		$grade = "C";
	} else if ($nilai <= 59) {
		$grade = "D";
	}
	
	$query_mapel = "SELECT * FROM tbl_mata_pelajaran WHERE  id_mata_pelajaran = '$id_mata_pelajaran'";
    $sql_mapel = $pdo->prepare($query_mapel);
    $sql_mapel->execute();
    $data_mapel = $sql_mapel->fetch();
    
    $kelas = $data_mapel['kelas'];

	$query_tugas = "SELECT * FROM tbl_nilai_mata_pelajaran WHERE nis = '$nis' AND id_tugas_mata_pelajaran = '$id_tugas_mata_pelajaran'";
    $sql_tugas = $pdo->prepare($query_tugas);
    $sql_tugas->execute();
    $cocok = $sql_tugas->rowCount();

    if ($cocok == 0) {
    	// mengambil data barang dengan kode paling besar
		$query_id = "SELECT max(id_nilai_mata_pelajaran) as kodeTerbesar FROM tbl_nilai_mata_pelajaran";
		$sql_id = $pdo->prepare($query_id);
		$sql_id->execute();
		$data = $sql_id->fetch();
		$kode = $data['kodeTerbesar'];
		 
		// mengambil angka dari kode barang terbesar, menggunakan fungsi substr
		// dan diubah ke integer dengan (int)
		$urutan = (int) substr($kode, 3, 5);
		 
		// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
		$urutan++;
		 
		// membentuk kode barang baru
		// perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
		// misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
		// angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
		$huruf = "NI-";
		$id_nilai_mata_pelajaran = $huruf . sprintf("%05s", $urutan);

			$query = "INSERT INTO tbl_nilai_mata_pelajaran (id_nilai_mata_pelajaran, id_tugas_mata_pelajaran, id_mata_pelajaran, nis, nip, nilai, grade) VALUES ('$id_nilai_mata_pelajaran', '$id_tugas_mata_pelajaran', '$id_mata_pelajaran', '$nis', '$nip', '$nilai', '$grade')";
			$sql = $pdo->prepare($query);
			$sql->execute();
			
			if($sql){
				?>
				<script type="text/javascript">
					alert('Data telah tersimpan');
					setTimeout("location.href='?page=nilai_mata_pelajaran&aksi=detail_nilai_mata_pelajaran&id=<?php echo $kelas;?>&mapel=<?php echo $id_mata_pelajaran;?>'", 1000);
				</script>
				<?php
			}else{
				echo $query;
				?>
				<script type="text/javascript">
					alert('Data gagal tersimpan');
					setTimeout("location.href='?page=nilai_mata_pelajaran&aksi=edit_nilai_mata_pelajaran&id=<?php echo $nis;?>&mapel=<?php echo $id_mata_pelajaran;?>&nip=<?php echo $nip;?>'", 1000);
				</script>
				<?php
			}	
    } else {
    	$query = "UPDATE tbl_nilai_mata_pelajaran SET 
    													nilai = '$nilai', 
    													grade = '$grade'
    													WHERE id_tugas_mata_pelajaran = '$id_tugas_mata_pelajaran' AND nis = '$nis'";
			$sql = $pdo->prepare($query);
			$sql->execute();
			
			if($sql){
				?>
				<script type="text/javascript">
					alert('Data telah tersimpan');
					setTimeout("location.href='?page=nilai_mata_pelajaran&aksi=detail_nilai_mata_pelajaran&id=<?php echo $kelas;?>&mapel=<?php echo $id_mata_pelajaran;?>'", 1000);
				</script>
				<?php
			}else{
				echo $query;
				?>
				<script type="text/javascript">
					alert('Data gagal tersimpan');
					setTimeout("location.href='?page=nilai_mata_pelajaran&aksi=edit_nilai_mata_pelajaran&id=<?php echo $nis;?>&mapel=<?php echo $id_mata_pelajaran;?>&nip=<?php echo $nip;?>'", 1000);
				</script>
				<?php
			}
    }
    	
?>