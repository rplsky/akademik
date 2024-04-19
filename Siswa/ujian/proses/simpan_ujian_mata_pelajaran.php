<?php
	//include '../config/koneksi.php';

	$no = $_POST['no'];
	$soal = $_POST['soal'];
	$mapel = $_POST['mapel'];
	$lk = $_POST['lk'];
	$nip = $_SESSION['id_user'];
	$pilihan = $_POST['pilihan'];

	// mengambil data barang dengan kode paling besar
	$query_id = "SELECT max(id_jawaban_ujian) as kodeTerbesar FROM tbl_jawaban_ujian";
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
	$huruf = "JJ-";
	$id_jawaban = $huruf . sprintf("%05s", $urutan);
	
	$query_lk = "SELECT * FROM tbl_lembar_ujian WHERE id_lembar_ujian = '$lk'";
	$sql_lk = $pdo->prepare($query_lk);
	$sql_lk->execute();
	$data_lk = $sql_lk->fetch();
	
	$jml_soal = $data_lk['jml_soal'];
	
	$query_soal = "SELECT * FROM tbl_bank_soal WHERE id_soal = '$soal'";
	$sql_soal = $pdo->prepare($query_soal);
	$sql_soal->execute();
	$data_soal = $sql_soal->fetch();
	
	$jawaban = $data_soal['jawaban'];
	
	if($pilihan == $jawaban){
	    $poin = $data_soal['poin_soal'];
	} else {
	    $poin = 0;
	}

		$query = "INSERT INTO tbl_jawaban_ujian (id_jawaban_ujian, id_soal, nis, jawaban, poin) VALUES ('$id_jawaban', '$soal', '$nip', '$pilihan', '$poin')";
		$sql = $pdo->prepare($query);
		$sql->execute();
		
		if($no < $jml_soal){
    		if($sql){
    			$no++;
    			?>
    			<script type="text/javascript">
    				alert('Data telah tersimpan');
    				setTimeout("location.href='?page=ujian&aksi=bs&id=<?php echo $lk;?>&mapel=<?php echo $mapel;?>&no=<?php echo $no;?>'", 1000);
    			</script>
    			<?php
    		}else{
    			echo $query;
    			?>
    			<script type="text/javascript">
    				alert('Data gagal tersimpan');
    				setTimeout("location.href='?page=ujian&aksi=bs&id=<?php echo $lk;?>&mapel=<?php echo $mapel;?>&no=<?php echo $no;?>'", 1000);
    			</script>
    			<?php
    		}
		} else {
    		if($sql){
    			$no++;
    			?>
    			<script type="text/javascript">
    				alert('Data telah tersimpan');
    				setTimeout("location.href='?page=ujian&aksi=lk&id=<?php echo $mapel; ?>'", 1000);
    			</script>
    			<?php
    		}else{
    			echo $query;
    			?>
    			<script type="text/javascript">
    				alert('Data gagal tersimpan');
    				setTimeout("location.href='?page=ujian&aksi=bs&id=<?php echo $lk;?>&mapel=<?php echo $mapel;?>&no=<?php echo $no;?>'", 1000);
    			</script>
    			<?php
    		}
		}
?>