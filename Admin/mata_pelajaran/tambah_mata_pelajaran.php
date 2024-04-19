<!DOCTYPE html>
<html>
<head>
	<title>Tambah Mata Pelajaran</title>
</head>
<body>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3><strong>Tambah Mata Pelajaran</strong></h3>
	</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-6" >
					<form action="?page=mata_pelajaran&aksi=simpandata_mata_pelajaran" method="POST">
						<div class="form-group">
							<label>Nama Mata Pelajaran</label>
							<input class="form-control" name="nama_mata_pelajaran" required placeholder="Nama Mata Pelajaran" required />
						</div>
						<div class="form-group">
							<label>Nama Guru</label>
							<select class="form-control" name="nip">
								<?php
									$query_guru = "SELECT * FROM tbl_guru";
									$sql_guru = $pdo->prepare($query_guru);
									$sql_guru->execute();
									while ($data_guru = $sql_guru->fetch()) {
								?>
								<option value="<?php echo $data_guru['nip'];?>"><?php echo $data_guru['nama_guru'];?></option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group">
							<label>Jumlah Jam Mata Pelajaran</label>
							<input class="form-control" name="jml_jam_mata_pelajaran" required placeholder="Jumlah Jam Mata Pelajaran" onkeypress = "return Angkasaja(event)" required />
						</div>
						<div class="form-group">
							<label>Kelompok Mata Pelajaran</label>
							<select class="form-control" name="kelompok_mata_pelajaran">
								<option value="Nasional">Nasional</option>
								<option value="Kewilayahan">Kewilayahan</option>	
								<option value="Produktif (C1)">Produktif (C1)</option>
								<option value="Produktif (C2)">Produktif (C2)</option>
								<option value="Produktif (C3)">Produktif (C3)</option>
								<option value="Muatan Lokal">Muatan Lokal</option>
							</select>
						</div>
						<div class="form-group">
							<label>Semester</label>
							<select class="form-control" name="semester">
								<option value="1">1 (Satu)</option>
								<option value="2">2 (Dua)</option>	
								<option value="3">3 (Tiga)</option>
								<option value="4">4 (Empat)</option>
								<option value="5">5 (Lima)</option>
								<option value="6">6 (Enam)</option>
							</select>
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
										<option value="<?php echo $data_siswa['kelas']; ?>"><?php echo $data_siswa['kelas']; ?></option>
										<?php
									}
								?>
							</select>
						</div>

						<input type="submit" name="simpan" value="Simpan" class="btn btn-primary" style="margin-top:15px">
						<a class="btn btn-default" href="?page=mata_pelajaran&aksi=aktif" style="margin-top:15px">Kembali</a>
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