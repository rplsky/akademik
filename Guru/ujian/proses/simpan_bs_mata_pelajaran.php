<?php
	//include '../config/koneksi.php';

	$id_lembar_ujian = $_POST['id_lembar_ujian'];
	$id_mata_pelajaran = $_POST['id_mata_pelajaran'];
	$pertanyaan = $_POST['pertanyaan'];
	$pilihan_a = $_POST['pilihan_a'];
	$pilihan_b = $_POST['pilihan_b'];
	$pilihan_c = $_POST['pilihan_c'];
	$pilihan_d = $_POST['pilihan_d'];
	$pilihan_e = $_POST['pilihan_e'];
	$j = $_POST['jawaban'];

	if ($j=='pilihan_a') {
		$jawaban = $pilihan_a;
	} elseif ($j=='pilihan_b') {
		$jawaban = $pilihan_b;
	} elseif ($j=='pilihan_c') {
		$jawaban = $pilihan_c;
	} elseif ($j=='pilihan_d') {
		$jawaban = $pilihan_d;
	} elseif ($j=='pilihan_e') {
		$jawaban = $pilihan_e;
	}
	
	$query_lk = "SELECT * FROM tbl_lembar_ujian WHERE id_lembar_ujian = '$id_lembar_ujian'";
	$sql_lk = $pdo->prepare($query_lk);
	$sql_lk->execute();
	$data_lk = $sql_lk->fetch();

	$poin = round($data_lk['poin'] / $data_lk['jml_soal'], 2);

	$query_bs = "SELECT * FROM tbl_bank_soal WHERE id_lembar_ujian = '$id_lembar_ujian'";
	$sql_bs = $pdo->prepare($query_bs);
	$sql_bs->execute();
	$jml_bs = $sql_bs->rowCount();

	if ($jml_bs < $data_lk['jml_soal']) {
		// mengambil data barang dengan kode paling besar
		$query_id = "SELECT max(id_soal) as kodeTerbesar FROM tbl_bank_soal";
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
		$huruf = "BS-";
		$id_soal = $huruf . sprintf("%05s", $urutan);

			$query = "INSERT INTO tbl_bank_soal (id_soal, id_lembar_ujian, pertanyaan, pilihan_a, pilihan_b, pilihan_c, pilihan_d, pilihan_e, jawaban, poin_soal) VALUES ('$id_soal', '$id_lembar_ujian', '$pertanyaan', '$pilihan_a','$pilihan_b', '$pilihan_c', '$pilihan_d', '$pilihan_e', '$jawaban', '$poin')";
			$sql = $pdo->prepare($query);
			$sql->execute();
			
			if($sql){
				?>
				<script type="text/javascript">
					alert('Data telah tersimpan');
					setTimeout("location.href='?page=ujian&aksi=bs&id=<?php echo $id_lembar_ujian; ?>&mapel=<?php echo $id_mata_pelajaran; ?>'", 1000);
				</script>
				<?php
			}else{
				echo $query;
				?>
				<script type="text/javascript">
					alert('Data gagal tersimpan');
					setTimeout("location.href='?page=ujian&aksi=tambahdata_bs_mata_pelajaran&id=<?php echo $id_lembar_ujian; ?>&mapel=<?php echo $id_mata_pelajaran; ?>''", 1000);
				</script>
				<?php
			}
		} else {
			?>
			<script type="text/javascript">
				alert('Jumlah soal sudah maksimal');
				setTimeout("location.href='?page=ujian&aksi=tampil_bs_mata_pelajaran&id=<?php echo $id_lembar_ujian; ?>&mapel=<?php echo $id_mata_pelajaran; ?>'", 1000);
			</script>
			<?php
		}		
?>