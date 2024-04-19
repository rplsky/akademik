<?php
	//include '../config/koneksi.php';

	$nip = $_POST['nip'];
	$nama_mata_pelajaran = $_POST['nama_mata_pelajaran'];
	$jml_jam_mata_pelajaran = $_POST['jml_jam_mata_pelajaran'];
	$kelompok_mata_pelajaran = $_POST['kelompok_mata_pelajaran'];
	$semester = $_POST['semester'];
	$kelas = $_POST['kelas'];

	// mengambil data barang dengan kode paling besar
	$query_id = "SELECT max(id_mata_pelajaran) as kodeTerbesar FROM tbl_mata_pelajaran";
	$sql_id = $pdo->prepare($query_id);
	$sql_id->execute();
	$data = $sql_id->fetch();
	$kode = $data['kodeTerbesar'];
	 
	// mengambil angka dari kode barang terbesar, menggunakan fungsi substr
	// dan diubah ke integer dengan (int)
	$urutan = (int) substr($kode, 3, 3);
	 
	// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
	$urutan++;
	 
	// membentuk kode barang baru
	// perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
	// misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
	// angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
	$huruf = "MP-";
	$id_mata_pelajaran = $huruf . sprintf("%03s", $urutan);

		$query = "INSERT INTO tbl_mata_pelajaran (id_mata_pelajaran, nip, nama_mata_pelajaran, jml_jam_mata_pelajaran, kelompok_mata_pelajaran, semester, kelas) VALUES ('$id_mata_pelajaran', '$nip', '$nama_mata_pelajaran', '$jml_jam_mata_pelajaran', '$kelompok_mata_pelajaran', '$semester', '$kelas')";
		$sql = $pdo->prepare($query);
		$sql->execute();
		
		if($sql){
			?>
			<script type="text/javascript">
				alert('Data telah tersimpan');
				setTimeout("location.href='?page=mata_pelajaran&aksi=aktif'", 1000);
			</script>
			<?php
		}else{
			echo $query;
			?>
			<script type="text/javascript">
				alert('Data gagal tersimpan');
				setTimeout("location.href='?page=mata_pelajaran&aksi=tambahdata_mata_pelajaran'", 1000);
			</script>
			<?php
		}		
?>