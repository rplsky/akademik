<?php
	//include '../config/koneksi.php';
	date_default_timezone_set('Asia/Jakarta');

	$id_tugas_mata_pelajaran = $_POST['id_tugas_mata_pelajaran'];
	$id_mata_pelajaran = $_POST['id_mata_pelajaran'];
	$nis = $_SESSION['id_user'];
	$tgl_kirim = date("Y-m-d H:i:s");

	$file_tugas = $_FILES['file_tugas']['name'];
	$x = explode('.', $file_tugas);
	$ekstensi = strtolower(end($x));
	$ukuran	= $_FILES['file_tugas']['size'];
	$file_tmp = $_FILES['file_tugas']['tmp_name'];

	$query_tugas = "SELECT * FROM tbl_kumpul_tugas WHERE id_tugas_mata_pelajaran = '$id_tugas_mata_pelajaran' AND nis = '$nis'";
	$sql_tugas = $pdo->prepare($query_tugas);
	$sql_tugas->execute();
	$jml_tugas = $sql_tugas->rowCount();
	$data_tugas = $sql_tugas->fetch();

	$query_tgs = "SELECT * FROM tbl_tugas_mata_pelajaran Where id_tugas_mata_pelajaran = '$id_tugas_mata_pelajaran'";
	$sql_tgs = $pdo->prepare($query_tgs);
	$sql_tgs->execute();
	$data_tgs = $sql_tgs->fetch();

	$nama_tugas_mapel = $data_tgs['nama_tugas_mata_pelajaran'];

	$query_mapel = "SELECT * FROM tbl_mata_pelajaran WHERE id_mata_pelajaran = '$id_mata_pelajaran'";
	$sql_mapel = $pdo->prepare($query_mapel);
	$sql_mapel->execute();
	$data_mapel = $sql_mapel->fetch();

	$nama_mapel = $data_mapel['nama_mata_pelajaran'];

	$query_siswa = "SELECT * FROM tbl_siswa WHERE nis = '$nis'";
	$sql_siswa = $pdo->prepare($query_siswa);
	$sql_siswa->execute();
	$data_siswa = $sql_siswa->fetch();

	$nama_siswa = $data_siswa['nama_siswa'];
	$kelas = $data_siswa['kelas'];

	if ($jml_tugas == 0) {
		// mengambil data barang dengan kode paling besar
		$query_id = "SELECT max(id_kirim) as kodeTerbesar FROM tbl_kumpul_tugas";
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
		$huruf = "TK-";
		$id_kirim = $huruf . sprintf("%05s", $urutan);

		$nama_file = $id_kirim."-".$nis."-".$id_tugas_mata_pelajaran.".".$ekstensi;

			move_uploaded_file($file_tmp, '../Assets/img/dokumen/'.$nama_file);
			$query = "INSERT INTO tbl_kumpul_tugas (id_kirim, id_tugas_mata_pelajaran, id_mata_pelajaran, nis, file, tgl_kirim) VALUES ('$id_kirim', '$id_tugas_mata_pelajaran', '$id_mata_pelajaran', '$nis', '$nama_file', '$tgl_kirim')";
			$sql = $pdo->prepare($query);
			$sql->execute();
			
			if($sql){
				$bot = "bot6172324764:AAE7ctRDrBsXANZAWjXnpO72U1CQSpCN8rQ";
				$user = "976626912";
				$pesan = "Telah Masuk Sebuah Tugas Baru dari E-Learning SMK Sangkuriang 1 Cimahi dengan data NIS : <b>$nis</b> Nama Siswa : <b>$nama_siswa</b> Kelas : <b>$kelas</b> Tugas Mata Pelajaran : <b>$nama_tugas_mapel</b> pada Mata Pelajaran : <b>$nama_mapel</b> Tanggal Kirim : <b>$tgl_kirim</b>. Terimakasih Telah Menyelesaikan Tugas.";
				
				KirimTelegram($pesan, $bot, $user);

				?>
				<script type="text/javascript">
					alert('Data telah tersimpan');
					setTimeout("location.href='?page=tugas_mata_pelajaran&aksi=aktif&id=<?php echo $id_mata_pelajaran;?>'", 1000);
				</script>
				<?php
			}else{
				echo $query;
				?>
				<script type="text/javascript">
					alert('Data gagal tersimpan');
					setTimeout("location.href='?page=tugas_mata_pelajaran&aksi=unggah_tugas_mata_pelajaran&id=<?php echo $id_tugas_mata_pelajaran;?>&nip=<?php echo $nip;?>'", 1000);
				</script>
				<?php
			}
	} else {
		$id_kirim = $data_tugas['id_kirim'];
		$nama_file = $id_kirim."-".$nis."-".$id_tugas_mata_pelajaran.".".$ekstensi;

			move_uploaded_file($file_tmp, '../Assets/img/dokumen/'.$nama_file);
			$query = "UPDATE tbl_kumpul_tugas SET
													id_tugas_mata_pelajaran = '$id_tugas_mata_pelajaran',
													id_mata_pelajaran = '$id_mata_pelajaran',
													file = '$nama_file',
													tgl_kirim = '$tgl_kirim'
													WHERE id_kirim = '$id_kirim'";
			$sql = $pdo->prepare($query);
			$sql->execute();
			
			if($sql){
				$bot = "bot6172324764:AAE7ctRDrBsXANZAWjXnpO72U1CQSpCN8rQ";
				$user = "976626912";
				$pesan = "Telah Masuk Update Sebuah Tugas dari E-Learning SMK Sangkuriang 1 Cimahi dengan data NIS : <b>$nis</b> Nama Siswa : <b>$nama_siswa</b> Kelas : <b>$kelas</b> Tugas Mata Pelajaran : <b>$nama_tugas_mapel</b> pada Mata Pelajaran : <b>$nama_mapel</b> Tanggal Kirim : <b>$tgl_kirim</b>. Terimakasih Telah Menyelesaikan Tugas.";
				
				KirimTelegram($pesan, $bot, $user);

				?>
				<script type="text/javascript">
					alert('Data telah tersimpan');
					setTimeout("location.href='?page=tugas_mata_pelajaran&aksi=aktif&id=<?php echo $id_mata_pelajaran;?>'", 1000);
				</script>
				<?php
			}else{
				echo $query;
				?>
				<script type="text/javascript">
					alert('Data gagal tersimpan');
					setTimeout("location.href='?page=tugas_mata_pelajaran&aksi=unggah_tugas_mata_pelajaran&id=<?php echo $id_tugas_mata_pelajaran;?>&nip=<?php echo $nip;?>'", 1000);
				</script>
				<?php
			}
	}				
?>