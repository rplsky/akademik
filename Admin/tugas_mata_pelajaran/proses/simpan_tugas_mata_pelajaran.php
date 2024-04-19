<?php
	//include '../config/koneksi.php';

	$id_mata_pelajaran = $_POST['id_mata_pelajaran'];
	$nama_tugas_mata_pelajaran = $_POST['nama_tugas_mata_pelajaran'];
	$isi_tugas_mata_pelajaran = $_POST['isi_tugas_mata_pelajaran'];
	$bobot = $_POST['bobot'];
	$batas_pengumpulan = $_POST['batas_pengumpulan'];
	$tgl_skrang = $_POST['tgl_tugas'];

	// mengambil data barang dengan kode paling besar
	$query_id = "SELECT max(id_tugas_mata_pelajaran) as kodeTerbesar FROM tbl_tugas_mata_pelajaran";
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
	$huruf = "TG-";
	$id_tugas_mata_pelajaran = $huruf . sprintf("%05s", $urutan);

		$query = "INSERT INTO tbl_tugas_mata_pelajaran (id_tugas_mata_pelajaran, id_mata_pelajaran, nama_tugas_mata_pelajaran, isi_tugas_mata_pelajaran, bobot, tgl_tugas, batas_pengumpulan) VALUES ('$id_tugas_mata_pelajaran', '$id_mata_pelajaran', '$nama_tugas_mata_pelajaran', '$isi_tugas_mata_pelajaran', '$bobot', '$tgl_skrang', '$batas_pengumpulan')";
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
				setTimeout("location.href='?page=tugas_mata_pelajaran&aksi=tambahdata_tugas_mata_pelajaran'", 1000);
			</script>
			<?php
		}		
?>