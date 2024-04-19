<?php
	$id = $_GET['id'];
	$lk = $_GET['lk'];
	$mapel = $_GET['mapel'];

	$query = "SELECT * FROM tbl_jadwal_ujian WHERE id_jadwal_ujian = '$id'";
	$sql = $pdo->prepare($query);
	$sql->execute();
	$data = $sql->fetch();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Tambah Lembar Ujian Mata Pelajaran</title>
</head>
<body>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3><strong>Edit Jadwal Ujian Mata Pelajaran</strong></h3>
	</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-6" >
					<form action="?page=ujian&aksi=updatedata_ju_mata_pelajaran" method="POST">
						<div class="form-group">
							<label>Tanggal Mulai Ujian</label>
							<input class="form-control" type="hidden" value="<?php echo $id;?>" name="id_jadwal" required placeholder="Id Lembar Ujian Mata Pelajaran"/>
							<input class="form-control" type="hidden" value="<?php echo $lk;?>" name="id_lembar_ujian" required placeholder="Id Lembar Ujian Mata Pelajaran"/>
							<input class="form-control" type="hidden" value="<?php echo $mapel;?>" name="id_mata_pelajaran" required placeholder="Id Mata Pelajaran"/>
							<input type="datetime-local" class="form-control" value="<?php echo $data['tanggal_mulai']?>" name="tanggal_mulai" required placeholder="Tanggal Mulai Ujian"/>
						</div>					
						<div class="form-group">
							<label>Tanggal Akhir Ujian</label>
							<input type="datetime-local" class="form-control" name="tanggal_akhir" value="<?php echo $data['tanggal_akhir']?>" required placeholder="Tanggal Akhir Ujian"/>
						</div>
						<div class="form-group">
							<label>Waktu Pengerjaan</label>
							<input type="number" class="form-control" name="waktu" value="<?php echo $data['waktu']; ?>" required placeholder="Waktu Pengerjaan Ujian"/>
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
										<option value="<?php echo $data_siswa['kelas']; if ($data['kelas']==$data_siswa['kelas']) { echo "selected='selected'"; } ?>"><?php echo $data_siswa['kelas']; ?></option>
										<?php
									}
								?>
							</select>
						</div>

						<input type="submit" name="simpan" value="Simpan" class="btn btn-primary" style="margin-top:15px">
						<a class="btn btn-default" href="?page=ujian&aksi=ju&id=<?php echo $id; ?>&mapel=<?php echo $mapel; ?>" style="margin-top:15px">Kembali</a>
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