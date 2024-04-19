<?php
	$id = $_GET['id'];
	$query = "SELECT * FROM tbl_siswa WHERE nis = '$id'";
	$sql = $pdo->prepare($query);
	$sql->execute();
	$data = $sql->fetch();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Siswa</title>
</head>
<body>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3><strong>Edit Siswa</strong></h3>
	</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-6" >
					<form action="?page=akun_siswa&aksi=updatedata_siswa" method="POST">
						<div class="form-group">
							<label>Nama Siswa</label>
							<input type="hidden" class="form-control" name="nis" value="<?php echo $data['nis'];?>" required placeholder="NIS Siswa"/>
							<input class="form-control" name="nama_siswa" value="<?php echo $data['nama_siswa'];?>" required placeholder="Nama Siswa"/>
						</div>
						<div class="form-group">
							<label>Jenis Kelamin</label>
							<div class="form-check">
	                          <input class="form-check-input" type="radio" name="jenis_kelamin" value="L" <?php if($data['jenis_kelamin']=="L"){ echo "checked"; }?>>
	                          <label class="form-check-label">Laki - laki</label>
	                        </div>
	                        <div class="form-check">
	                          <input class="form-check-input" type="radio" name="jenis_kelamin" value="P" <?php if($data['jenis_kelamin']=="P"){ echo "checked"; }?>>
	                          <label class="form-check-label">Perempuan</label>
	                        </div>
						</div>
						<div class="form-group">
							<label>Tempat Lahir</label>
							<input class="form-control" name="tempat_lahir"  value="<?php echo $data['tempat_lahir'];?>"  required placeholder="tempat_lahir"/>
						</div>
						<div class="form-group">
							<label>Tanggal Lahir</label>
							<input class="form-control" type="date" name="tanggal_lahir" value="<?php echo $data['tanggal_lahir'];?>" required placeholder="tanggal_lahir"/>
						</div>
						<div class="form-group">
							<label>Alamat</label>
							<textarea class="form-control" name="alamat" required placeholder="alamat"><?php echo $data['alamat'];?></textarea>
						</div>
						<div class="form-group">
							<label>No Telp</label>
							<input class="form-control" name="no_telp" required placeholder="no_telp" value="<?php echo $data['no_telp'];?>"  onkeypress = "return Angkasaja(event)"/>
						</div>
						<div class="form-group">
							<label>Kelas</label>
							<select class="form-control" name="kelas">
								<?php
									$query = "SELECT DISTINCT kelas FROM tbl_siswa";
									$sql = $pdo->prepare($query);
									$sql->execute();

									while ($data_siswa=$sql->fetch()) {
										?>
										<option value="<?php echo $data_siswa['kelas']; ?>" <?php if ($data['kelas']==$data_siswa['kelas']) { echo "selected='selected'"; } ?>><?php echo $data_siswa['kelas']; ?></option>
										<?php
									}
								?>
							</select>
						</div>

						<input type="submit" name="update" value="Update" class="btn btn-primary" style="margin-top:15px">
						<a class="btn btn-default" href="?page=akun_siswa&aksi=detail_siswa" style="margin-top:15px">Kembali</a>
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