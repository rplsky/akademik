<?php
	//include '../config/koneksi.php';

	$email = $_POST['email'];
	$password_lama = sha1($_POST['password_lama']);
	$password_baru = sha1($_POST['password_baru']);
	$k_password = sha1($_POST['k_password']);

	$query_akun = "SELECT * FROM tbl_akun WHERE email = '$email' AND password = '$password_lama'";
	$sql_akun = $pdo->prepare($query_akun);
	$sql_akun->execute();
	$cocok = $sql_akun->rowCount();

	if ($cocok > 0) {
		if ($password_baru == $k_password) {
			$query = "UPDATE tbl_akun SET  
											password = '$password_baru'
											WHERE email = '$email'";
			$sql = $pdo->prepare($query);
			$sql->execute();
			
			if($sql){
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
					setTimeout("location.href='?page=akun_guru&aksi=editpassword_guru&id=<?php echo $email;?>'", 1000);
				</script>
				<?php
			}
		} else {
			?>
				<script type="text/javascript">
					alert('Password baru tidak cocok');
					setTimeout("location.href='?page=akun_guru&aksi=editpassword_guru&id=<?php echo $email;?>'", 1000);
				</script>
			<?php
		}
	} else {
		?>
		<script type="text/javascript">
			alert('Password lama tidak cocok');
			setTimeout("location.href='?page=akun_guru&aksi=editpassword_guru&id=<?php echo $email;?>'", 1000);
		</script>
		<?php
	}	
?>