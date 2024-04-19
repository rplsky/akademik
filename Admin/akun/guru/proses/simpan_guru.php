<?php
	//include '../config/koneksi.php';

	$nip = $_POST['nip'];
	$nama_guru = $_POST['nama_guru'];
	$jenis_kelamin = $_POST['jenis_kelamin'];
	$tempat_lahir = $_POST['tempat_lahir'];
	$tanggal_lahir = $_POST['tanggal_lahir'];
	$alamat = $_POST['alamat'];
	$no_telp = $_POST['no_telp'];
	$email = $_POST['email'];
	$password = sha1($_POST['password']);
	$k_password = sha1($_POST['k_password']);
	$hak_akses = "guru";

	if ($password == $k_password) {
		$query = "INSERT INTO tbl_guru (nip, nama_guru, jenis_kelamin, tempat_lahir, tanggal_lahir, alamat, no_telp) VALUES ('$nip', '$nama_guru', '$jenis_kelamin', '$tempat_lahir', '$tanggal_lahir', '$alamat', '$no_telp')";
		$sql = $pdo->prepare($query);
		$sql->execute();

		$query2 = "INSERT INTO tbl_akun (email, password, hak_akses, nip) VALUES ('$email', '$password', '$hak_akses', '$nip')";
		$sql2 = $pdo->prepare($query2);
		$sql2->execute();
		
		if($sql && $sql2){
			?>
			<script type="text/javascript">
				alert('Data telah tersimpan');
				setTimeout("location.href='?page=akun_guru&aksi=aktif'", 1000);
			</script>
			<?php
		}else{
			echo $query;
			?>
			<script type="text/javascript">
				alert('Data gagal tersimpan');
				setTimeout("location.href='?page=akun_guru&aksi=tambahdata_guru'", 1000);
			</script>
			<?php
		}
	} else {
		?>
			<script type="text/javascript">
				alert('Password tidak cocok');
				setTimeout("location.href='?page=akun_guru&aksi=tambahdata_guru'", 1000);
			</script>
		<?php
	}
	
		
?>