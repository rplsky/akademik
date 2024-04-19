<?php
	$id = $_GET['id'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tambah Lembar Ujian Mata Pelajaran</title>
</head>
<body>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3><strong>Tambah Lembar Ujian Mata Pelajaran</strong></h3>
	</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-6" >
					<form action="?page=ujian&aksi=simpandata_lk_mata_pelajaran" method="POST">
						<div class="form-group">
							<label>Deskripsi</label>
							<input class="form-control" type="hidden" value="<?php echo $id;?>" name="id_mata_pelajaran" required placeholder="Id Mata Pelajaran"/>
							<textarea class="ckeditor" class="form-control" name="deskripsi" placeholder="Isi Deskripsi Lembar Ujian Mata Pelajaran" required></textarea>
						</div>					
						<div class="form-group">
							<label>Jumlah Soal</label>
							<input class="form-control" name="jml_soal" required placeholder="Jumlah Soal" onkeypress = "return Angkasaja(event)" required />
						</div>
						<div class="form-group">
							<label>Jenis Ujian</label>
							<select class="form-control" name="jenis_ujian">
								<option value="Kuis">Kuis</option>
								<option value="Ulangan Harian">Ulangan Harian</option>	
								<option value="Penilaian Tengah Semester">Penilaian Tengah Semester</option>
								<option value="Penilaian Akhir Semester">Penilaian Akhir Semester</option>
							</select>
						</div>

						<input type="submit" name="simpan" value="Simpan" class="btn btn-primary" style="margin-top:15px">
						<a class="btn btn-default" href="?page=ujian&aksi=lk&id=<?php echo $id; ?>" style="margin-top:15px">Kembali</a>
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