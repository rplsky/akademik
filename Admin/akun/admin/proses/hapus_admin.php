<?php
	//include '../config/koneksi.php';

	$id = $_GET['id'];

	$query_akun = "SELECT * FROM tbl_akun WHERE nip = '$id'";
	$sql_akun = $pdo->prepare($query_akun);
	$sql_akun->execute();
	$cocok = $sql_akun->rowCount();

	if ($cocok > 0) {
		$query = "DELETE FROM tbl_admin WHERE nip = '$id'";
		$sql = $pdo->prepare($query);
		$sql->execute();

		$query2 = "DELETE FROM tbl_akun WHERE nip = '$id'";
		$sql2 = $pdo->prepare($query2);
		$sql2->execute();
		
		if($sql && $sql2){
			?>
			<script type="text/javascript">
				alert('Data telah terhapus');
				setTimeout("location.href='?page=akun_admin&aksi=aktif'", 1000);
			</script>
			<?php
		}else{
			echo $query;
			?>
			<script type="text/javascript">
				alert('Data gagal terhapus');
				setTimeout("location.href='?page=akun_admin&aksi=aktif'", 1000);
			</script>
			<?php
		}
	} else {
		?>
			<script type="text/javascript">
				alert('Akun tidak sesuai');
				setTimeout("location.href='?page=akun_admin&aksi=aktif'", 1000);
			</script>
		<?php
	}
	
		
?>