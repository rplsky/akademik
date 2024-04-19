<?php 
	// menghubungkan dengan library excel reader
	require "../Config/vendor/autoload.php";

	// Include librari PhpSpreadsheet
	use PhpOffice\PhpSpreadsheet\Spreadsheet;
	use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

	// upload file xls
	$ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
	$target = "excel/".$_FILES['file']['name'].".".$ext;
	move_uploaded_file($_FILES['file']['tmp_name'], $target);

	echo $target."<BR>";


	// mengambil isi file xls
	$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
	$spreadsheet = $reader->load($target); // Load file yang tadi diupload ke folder tmp
	$sheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

	// jumlah default data yang berhasil di import
	$berhasil = 0;
	$jumlah_baris = 0;

	foreach ($sheet as $data){
		if($data['A'] != "" && $data['B'] != "" && $data['C'] != "" && $data['D'] != "" && $data['E'] != "" && $data['F'] != "" && $data['G'] != "" && $data['H'] != "" && $data['I'] != ""){
			$jumlah_baris++;
		}
	}

	$jumlah_baris = $jumlah_baris - 1;

	foreach ($sheet as $data){

		// menangkap data dan memasukkan ke variabel sesuai dengan kolumnya masing-masing
		$nis 			= htmlspecialchars($data['A']);
		$nama_siswa		= htmlspecialchars($data['B']);
		$jenis_kelamin	= htmlspecialchars($data['C']);
		$tempat_lahir	= htmlspecialchars($data['D']);
		$tanggal_lahir	= htmlspecialchars($data['E']);
		$alamat			= htmlspecialchars($data['F']);
		$no_telp		= htmlspecialchars($data['G']);
		$email			= htmlspecialchars($data['H']);
		$kelas			= htmlspecialchars($data['I']);
		$password		= htmlspecialchars(sha1("siswaskr76"));
		$pass           = htmlspecialchars("siswaskr76");
		$web            = htmlspecialchars("https://akademik.rfpcode.id");
		$hak_akses		= htmlspecialchars("Siswa");

		if($nis == "NIS" && $nama_siswa == "Nama Siswa" && $jenis_kelamin == "Jenis Kelamin" && $tempat_lahir == "Tempat Lahir" && $tanggal_lahir == "Tanggal Lahir" && $alamat == "Alamat" && $no_telp == "No Telp" && $email == "Email" && $kelas == "Kelas"){
			continue;
		} else if($nis != "" && $nama_siswa != "" && $jenis_kelamin != "" && $tempat_lahir != "" && $tanggal_lahir != "" && $alamat != "" && $no_telp != "" && $email != "" && $kelas != ""){
			// input data ke database (table data_pegawai)
			$query = "INSERT INTO tbl_siswa (nis, nama_siswa, jenis_kelamin, tempat_lahir, tanggal_lahir, alamat, no_telp, kelas) VALUES (':nis', ':nama_siswa', ':jenis_kelamin', ':tempat_lahir', ':tanggal_lahir', ':alamat', ':no_telp', ':kelas')";
			$sql = $pdo->prepare($query);
			$sql->bindParam(':nis', $nis);
			$sql->bindParam(':nama_siswa', $nama_siswa);
			$sql->bindParam(':jenis_kelamin', $jenis_kelamin);
			$sql->bindParam(':tempat_lahir', $tempat_lahir);
			$sql->bindParam(':tanggal_lahir', $tanggal_lahir);
			$sql->bindParam(':alamat', $alamat);
			$sql->bindParam(':no_telp', $no_telp);
			$sql->bindParam(':kelas', $kelas);
			$sql->execute();

			$query2 = "INSERT INTO tbl_akun (email, password, hak_akses, nip) VALUES (':email', ':password', ':hak_akses', ':nis')";
			$sql2 = $pdo->prepare($query2);
			$sql2->bindParam(':email', $email);
			$sql2->bindParam(':password', $password);
			$sql2->bindParam(':hak_akses', $hak_akses);
			$sql2->bindParam(':nis', $nis);
			$sql2->execute();
			
			$berhasil++;

			$judul = "Akun E-Learning Akademik";
			$pesan = "<H4>Akun E-Learning Akademik</H4><br>Telah terdaftar Akun Baru dengan : <br>NIS : ".$nis."<br>Nama Lengkap : ".$nama_siswa."<br>Kelas : ".$kelas."<br>Username : ".$email."<br>Password : ".$pass."<br>Website : ".$web."<br><br>Silahkan digunakan untuk masuk ke Website.<br>Terimakasih.<br><br>TTD<br>E-Learning Akademik SMK Sangkuriang 1 Cimahi";
			kirim_email($email, $nama_siswa, $judul, $pesan);
		}
	}

	echo "Jumlah Baris : ".$jumlah_baris."<br>Berhasil : ".$berhasil;
	// hapus kembali file .xls yang di upload tadi
	unlink($target);

	if($berhasil == $jumlah_baris){
			?>
			<script type="text/javascript">
				alert('Data telah tersimpan');
				setTimeout("location.href='?page=akun_siswa&aksi=aktif'", 1000);
			</script>
			<?php
		}else{
			?>
			<script type="text/javascript">
				alert('Data gagal tersimpan');
				setTimeout("location.href='?page=akun_siswa&aksi=import_siswa'", 1000);
			</script>
			<?php
		}
?>