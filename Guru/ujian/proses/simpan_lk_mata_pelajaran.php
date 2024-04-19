<?php
	//include '../config/koneksi.php';

	$id_mata_pelajaran = $_POST['id_mata_pelajaran'];
	$deskripsi = $_POST['deskripsi'];
	$jml_soal = $_POST['jml_soal'];
	$jenis_ujian = $_POST['jenis_ujian'];
	$poin = 100;

	// mengambil data barang dengan kode paling besar
	$query_id = "SELECT max(id_lembar_ujian) as kodeTerbesar FROM tbl_lembar_ujian";
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
	$huruf = "LU-";
	$id_lembar_ujian = $huruf . sprintf("%05s", $urutan);

	//echo $id_mata_pelajaran.' - '.$id_lembar_ujian.' - '.$deskripsi.' - '.$jenis_ujian.' - '.$jml_soal.' - '.$poin;

		$query = "INSERT INTO tbl_lembar_ujian (id_lembar_ujian, id_mata_pelajaran, deskripsi, jenis_ujian, jml_soal, poin) VALUES ('$id_lembar_ujian', '$id_mata_pelajaran', '$deskripsi', '$jenis_ujian', $jml_soal, '$poin')";
		$sql = $pdo->prepare($query);
		$sql->execute();
		
		$query_lk = "INSERT INTO tbl_lk_mapel (id_lembar_ujian, id_mata_pelajaran) VALUES ('$id_lembar_ujian', '$id_mata_pelajaran')";
		$sql_lk = $pdo->prepare($query_lk);
		$sql_lk->execute();
		
		if($sql && $sql_lk){
			?>
			<script type="text/javascript">
				alert('Data telah tersimpan');
				setTimeout("location.href='?page=ujian&aksi=lk&id=<?php echo $id_mata_pelajaran; ?>'", 1000);
			</script>
			<?php
		}else{
			echo $query;
			?>
			<script type="text/javascript">
				alert('Data gagal tersimpan');
				setTimeout("location.href='?page=ujian&aksi=tambahdata_lk_mata_pelajaran&id=<?php echo $id_mata_pelajaran; ?>''", 1000);
			</script>
			<?php
		}		
?>