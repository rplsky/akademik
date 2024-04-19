<?php
	//include '../config/koneksi.php';

	$id_mata_pelajaran = $_POST['id_mata_pelajaran'];
	$nama_materi_mata_pelajaran = $_POST['nama_materi_mata_pelajaran'];
	$isi_materi_mata_pelajaran = $_POST['isi_materi_mata_pelajaran'];
	$batas_absensi = $_POST['batas_absensi'];
	$tgl_upload = $_POST['tgl_upload'];

	// mengambil data barang dengan kode paling besar
	$query_id = "SELECT max(id_materi_mata_pelajaran) as kodeTerbesar FROM tbl_materi_mata_pelajaran";
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
	$huruf = "MM-";
	$id_materi_mata_pelajaran = $huruf . sprintf("%05s", $urutan);

		$query = "INSERT INTO tbl_materi_mata_pelajaran (id_materi_mata_pelajaran, id_mata_pelajaran, nama_materi_mata_pelajaran, isi_materi_mata_pelajaran, tgl_upload, batas_absensi) VALUES ('$id_materi_mata_pelajaran', '$id_mata_pelajaran', '$nama_materi_mata_pelajaran', '$isi_materi_mata_pelajaran', '$tgl_upload', '$batas_absensi')";
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
				setTimeout("location.href='?page=materi_mata_pelajaran&aksi=tambahdata_materi_mata_pelajaran&id=<?php echo $id_mata_pelajaran; ?>''", 1000);
			</script>
			<?php
		}		
?>