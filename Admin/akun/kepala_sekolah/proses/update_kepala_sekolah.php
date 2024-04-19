<?php
	//include '../config/koneksi.php';

	$nip = $_POST['nip'];
	$nama_kepala_sekolah = $_POST['nama_kepala_sekolah'];
	$jenis_kelamin = $_POST['jenis_kelamin'];
	$tempat_lahir = $_POST['tempat_lahir'];
	$tanggal_lahir = $_POST['tanggal_lahir'];
	$alamat = $_POST['alamat'];
	$no_telp = $_POST['no_telp'];

		$query = "UPDATE tbl_kepala_sekolah SET  
										nama_kepala_sekolah = '$nama_kepala_sekolah', 
										jenis_kelamin = '$jenis_kelamin', 
										tempat_lahir = '$tempat_lahir', 
										tanggal_lahir = '$tanggal_lahir', 
										alamat = '$alamat', 
										no_telp = '$no_telp'
										WHERE nip = '$nip'";
		$sql = $pdo->prepare($query);
		$sql->execute();
		
		if($sql){
			?>
			<script type="text/javascript">
				alert('Data telah tersimpan');
				setTimeout("location.href='?page=akun_kepala_sekolah&aksi=detail_kepala_sekolah&id=<?php echo $nip;?>'", 1000);
			</script>
			<?php
		}else{
			echo $query;
			?>
			<script type="text/javascript">
				alert('Data gagal tersimpan');
				setTimeout("location.href='?page=akun_kepala_sekolah&aksi=editdata_kepala_sekolah&id=<?php echo $nip;?>'", 1000);
			</script>
			<?php
		}	
		
?>