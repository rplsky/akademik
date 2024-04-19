<!DOCTYPE html>
<html>
<head>
	<title>Tambah Tugas Mata Pelajaran</title>
</head>
<body>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3><strong>Tambah Tugas Mata Pelajaran</strong></h3>
	</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-6" >
					<form action="?page=tugas_mata_pelajaran&aksi=simpandata_tugas_mata_pelajaran" method="POST">
						<div class="form-group">
							<label>Mata Pelajaran</label>
							<select class="form-control" name="id_mata_pelajaran">
								<?php
									$query_mapel = "SELECT * FROM tbl_mata_pelajaran INNER JOIN tbl_guru ON tbl_mata_pelajaran.nip = tbl_guru.nip  ORDER BY tbl_mata_pelajaran.nip ASC, tbl_mata_pelajaran.kelas ASC";
									$sql_mapel = $pdo->prepare($query_mapel);
									$sql_mapel->execute();
									while ($data_mapel = $sql_mapel->fetch()) {
								?>
								<option value="<?php echo $data_mapel['id_mata_pelajaran'];?>"><?php echo $data_mapel['nama_guru'];?> | <?php echo $data_mapel['nama_mata_pelajaran'];?> | <?php echo $data_mapel['kelas'];?> | <?php echo $data_mapel['kelompok_mata_pelajaran'];?></option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group">
							<label>Nama Tugas Mata Pelajaran</label>
							<input class="form-control" name="nama_tugas_mata_pelajaran" required placeholder="Nama Tugas Mata Pelajaran"/>
						</div>	
						<div class="form-group">
							<label>Isi Tugas Mata Pelajaran</label>
							<textarea class="ckeditor" class="form-control" name="isi_tugas_mata_pelajaran" placeholder="Isi Tugas Mata Pelajaran" required></textarea>
						</div>					
						<div class="form-group">
							<label>Bobot</label>
							<input class="form-control" name="bobot" required placeholder="Bobot" onkeypress = "return Angkasaja(event)" required />
						</div>
						<div class="form-group">
							<label>Tanggal Tugas</label>
							<input type="datetime-local" class="form-control" name="tgl_tugas" required placeholder="Tanggal Tugas"/>
						</div>
						<div class="form-group">
							<label>Batas Pengumpulan</label>
							<input type="datetime-local" class="form-control" name="batas_pengumpulan" required placeholder="Batas Pengumpulan"/>
						</div>

						<input type="submit" name="simpan" value="Simpan" class="btn btn-primary" style="margin-top:15px">
						<a class="btn btn-default" href="?page=tugas_mata_pelajaran&aksi=aktif" style="margin-top:15px">Kembali</a>
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