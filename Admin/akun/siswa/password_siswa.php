<?php
	$id = $_GET['id'];
	$query = "SELECT * FROM tbl_akun WHERE email = '$id'";
	$sql = $pdo->prepare($query);
	$sql->execute();
	$data = $sql->fetch();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Ganti Password Siswa</title>
</head>
<body>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3><strong>Ganti Password Siswa</strong></h3>
	</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-6" >
					<form action="?page=akun_siswa&aksi=updatepassword_siswa" method="POST">
						<div class="form-group">
							<label>Password Baru</label>
							<input type="hidden" class="form-control" name="email" value="<?php echo $data['email'];?>" required placeholder="Email Siswa"/>
							<input type="password" class="form-control" name="password_baru" required placeholder="Password Baru"/>
						</div>
						<div class="form-group">
							<label>Konfirmasi Password</label>
							<input type="password" class="form-control" name="k_password" required placeholder="Konfirmasi Password"/>
						</div>
						
						<input type="submit" name="update" value="Update" class="btn btn-primary" style="margin-top:15px">
						<a class="btn btn-default" href="?page=akun_siswa&aksi=aktif" style="margin-top:15px">Kembali</a>
					</form>
				</div>
			</div>
		</div>
</div>
</body>
</html>

<script type="text/javascript">
	function Angkasaja(evt) {
		var charCode = (evt.which) ? evt.which : event.keyCode
			if (charCode > 31 && (charCode < 48 || charCode > 57))
			return false;
		return true;
	}
</script>