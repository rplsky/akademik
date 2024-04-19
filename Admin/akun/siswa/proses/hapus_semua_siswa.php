<?php
	//include '../config/koneksi.php';

	//$id = $_GET['id'];

		$query = "
					DELETE FROM tbl_siswa;
					DELETE FROM tbl_akun Where hak_akses = 'Siswa';
				";
		$sql = $pdo->prepare($query);
		$sql->execute();
		
		if($sql){
			?>
			<script type="text/javascript">
				alert('Data telah terhapus');
				setTimeout("location.href='?page=akun_siswa&aksi=aktif'", 1000);
			</script>
			<?php
		}else{
			echo $query;
			?>
			<script type="text/javascript">
				alert('Data gagal terhapus');
				setTimeout("location.href='?page=akun_siswa&aksi=aktif'", 1000);
			</script>
			<?php
		}
		
?>