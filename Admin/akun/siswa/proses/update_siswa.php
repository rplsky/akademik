<?php
	//include '../config/koneksi.php';

	$nis = $_POST['nis'];
	$nama_siswa = $_POST['nama_siswa'];
	$jenis_kelamin = $_POST['jenis_kelamin'];
	$tempat_lahir = $_POST['tempat_lahir'];
	$tanggal_lahir = $_POST['tanggal_lahir'];
	$alamat = $_POST['alamat'];
	$no_telp = $_POST['no_telp'];
	$kelas = $_POST['kelas'];

		$query = "UPDATE tbl_siswa SET  
										nama_siswa = '$nama_siswa', 
										jenis_kelamin = '$jenis_kelamin', 
										tempat_lahir = '$tempat_lahir', 
										tanggal_lahir = '$tanggal_lahir', 
										alamat = '$alamat', 
										no_telp = '$no_telp',
										kelas = '$kelas'
										WHERE nis = '$nis'";
		$sql = $pdo->prepare($query);
		$sql->execute();
		
		if($sql){
			?>
			<script type="text/javascript">
				alert('Data telah tersimpan');
				setTimeout("location.href='?page=akun_siswa&aksi=detail_siswa&id=<?php echo $nis;?>'", 1000);
			</script>
			<?php
		}else{
			echo $query;
			?>
			<script type="text/javascript">
				alert('Data gagal tersimpan');
				setTimeout("location.href='?page=akun_siswa&aksi=editdata_siswa&id=<?php echo $nis;?>'", 1000);
			</script>
			<?php
		}	
		
?>