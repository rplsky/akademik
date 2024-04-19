<?php
	$id = $_GET['id'];
	$mapel = $_GET['mapel'];

	$query = "SELECT * FROM tbl_lembar_ujian WHERE id_lembar_ujian = '$id'";
	$sql = $pdo->prepare($query);
	$sql->execute();
	$data = $sql->fetch();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Lembar Ujian Mata Pelajaran</title>
</head>
<body>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3><strong>Edit Lembar Ujian Mata Pelajaran</strong></h3>
	</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-6" >
					<form action="?page=ujian&aksi=updatedata_lk_mata_pelajaran" method="POST">
						<div class="form-group">
							<label>Deskripsi</label>
							<input class="form-control" type="hidden" value="<?php echo $id;?>" name="id_lembar_ujian" required placeholder="Id Lembar Ujian"/>
							<input class="form-control" type="hidden" value="<?php echo $mapel;?>" name="id_mata_pelajaran" required placeholder="Id Mata Pelajaran"/>
							<textarea class="ckeditor" class="form-control" name="deskripsi" placeholder="Isi Deskripsi Lembar Ujian Mata Pelajaran" required><?php echo $data['deskripsi']; ?></textarea>
						</div>					
						<div class="form-group">
							<label>Jumlah Soal</label>
							<input class="form-control" name="jml_soal" value="<?php echo $data['jml_soal']; ?>" required placeholder="Jumlah Soal" onkeypress = "return Angkasaja(event)" required />
						</div>
						<div class="form-group">
							<label>Jenis Ujian</label>
							<select class="form-control" name="jenis_ujian">
								<option value="Kuis" <?php if ($data['jenis_ujian']=='Kuis') { echo "selected='selected'"; } ?>>Kuis</option>
								<option value="Ulangan Harian" <?php if ($data['jenis_ujian']=='Ulangan Harian') { echo "selected='selected'"; } ?>>Ulangan Harian</option>	
								<option value="Penilaian Tengah Semester" <?php if ($data['jenis_ujian']=='Penilaian Tengah Semester') { echo "selected='selected'"; } ?>>Penilaian Tengah Semester</option>
								<option value="Penilaian Akhir Semester" <?php if ($data['jenis_ujian']=='Penilaian Akhir Semester') { echo "selected='selected'"; } ?>>Penilaian Akhir Semester</option>
							</select>
						</div>

						<input type="submit" name="simpan" value="Simpan" class="btn btn-primary" style="margin-top:15px">
						<a class="btn btn-default" href="?page=ujian&aksi=lk" style="margin-top:15px">Kembali</a>
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