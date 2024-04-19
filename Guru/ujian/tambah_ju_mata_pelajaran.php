<?php
    $nip = $_SESSION['id_user'];
	$id = $_GET['id'];
	$mapel = $_GET['mapel'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tambah Lembar Ujian Mata Pelajaran</title>
</head>
<body>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3><strong>Tambah Jadwal Ujian Mata Pelajaran</strong></h3>
	</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-6" >
					<form action="?page=ujian&aksi=simpandata_ju_mata_pelajaran" method="POST">
						<div class="form-group">
							<label>Tanggal Mulai Ujian</label>
							<input class="form-control" type="hidden" value="<?php echo $id;?>" name="id_lembar_ujian" required placeholder="Id Lembar Ujian Mata Pelajaran"/>
							<input class="form-control" type="hidden" value="<?php echo $mapel;?>" name="id_mata_pelajaran" required placeholder="Id Mata Pelajaran"/>
							<input type="datetime-local" class="form-control" name="tanggal_mulai" required placeholder="Tanggal Mulai Ujian"/>
						</div>					
						<div class="form-group">
							<label>Tanggal Akhir Ujian</label>
							<input type="datetime-local" class="form-control" name="tanggal_akhir" required placeholder="Tanggal Akhir Ujian"/>
						</div>
						<div class="form-group">
							<label>Waktu Pengerjaan</label>
							<input type="number" class="form-control" name="waktu" required placeholder="Waktu Pengerjaan Ujian"/>
						</div>
						<div class="form-group">
							<label>Mata Pelajaran | Kelas</label>
							<select class="form-control" name="mapel">
								<?php
									$query = "SELECT * FROM tbl_mata_pelajaran INNER JOIN tbl_guru_mapel ON tbl_mata_pelajaran.id_mata_pelajaran = tbl_guru_mapel.id_mata_pelajaran WHERE tbl_guru_mapel.nip = '$nip'";
									$sql = $pdo->prepare($query);
									$sql->execute();

									while ($data_siswa=$sql->fetch()) {
										?>
										<option value="<?php echo $data_siswa['id_mata_pelajaran']; ?>"><?php echo $data_siswa['nama_mata_pelajaran']; ?> | <?php echo $data_siswa['kelas']; ?></option>
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