<?php
	//include '../config/koneksi.php';

	$nis = $_POST['nis'];
	$nama_siswa = $_POST['nama_siswa'];
	$jenis_kelamin = $_POST['jenis_kelamin'];
	$tempat_lahir = $_POST['tempat_lahir'];
	$tanggal_lahir = $_POST['tanggal_lahir'];
	$alamat = $_POST['alamat'];
	$no_telp = $_POST['no_telp'];
	$email = $_POST['email'];
	$kelas = $_POST['kelas'];
	$password = sha1($_POST['password']);
	$k_password = sha1($_POST['k_password']);
	$pass = $_POST['password'];
	$web = "https://akademik.rfpcode.id";
	$hak_akses = "Siswa";

	if ($password == $k_password) {
		$query_siswa = "SELECT * FROM tbl_siswa WHERE nis = '$nis'";
        $sql_siswa = $pdo->prepare($query_siswa);
        $sql_siswa->execute();
        $jml_data = $sql_siswa->rowCount();
        if ($jml_data == 0) {
        	$query = "INSERT INTO tbl_siswa (nis, nama_siswa, jenis_kelamin, tempat_lahir, tanggal_lahir, alamat, no_telp, kelas) VALUES ('$nis', '$nama_siswa', '$jenis_kelamin', '$tempat_lahir', '$tanggal_lahir', '$alamat', '$no_telp', '$kelas')";
			$sql = $pdo->prepare($query);
			$sql->execute();

			$query2 = "INSERT INTO tbl_akun (email, password, hak_akses, nip) VALUES ('$email', '$password', '$hak_akses', '$nis')";
			$sql2 = $pdo->prepare($query2);
			$sql2->execute();
			
			if($sql && $sql2){
				$judul = "Akun E-Learning Akademik";
				$pesan = "<H4>Akun E-Learning Akademik</H4><br>Telah terdaftar Akun Baru dengan : <br>NIS : ".$nis."<br>Nama Lengkap : ".$nama_siswa."<br>Kelas : ".$kelas."<br>Username : ".$email."<br>Password : ".$pass."<br>Website : ".$web."<br><br>Silahkan digunakan untuk masuk ke Website.<br>Terimakasih.<br><br>TTD<br>E-Learning Akademik SMK Sangkuriang 1 Cimahi";
				kirim_email($email, $nama_siswa, $judul, $pesan);
				?>
				<script type="text/javascript">
					alert('Data telah tersimpan');
					setTimeout("location.href='?page=akun_siswa&aksi=aktif'", 1000);
				</script>
				<?php
			}else{
				echo $query;
				?>
				<script type="text/javascript">
					alert('Data gagal tersimpan');
					setTimeout("location.href='?page=akun_siswa&aksi=tambahdata_siswa'", 1000);
				</script>
				<?php
			}
        } else {
        	?>
			<script type="text/javascript">
				alert('NIS sudah dipakai oleh akun lain');
				setTimeout("location.href='?page=akun_siswa&aksi=tambahdata_siswa'", 1000);
			</script>
		<?php
        }
        
	} else {
		?>
			<script type="text/javascript">
				alert('Password tidak cocok');
				setTimeout("location.href='?page=akun_siswa&aksi=tambahdata_siswa'", 1000);
			</script>
		<?php
	}
	
		
?>