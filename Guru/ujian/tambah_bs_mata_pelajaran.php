<?php
	$id = $_GET['id'];
	$mapel = $_GET['mapel'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tambah Soal Ujian Mata Pelajaran</title>
</head>
<body>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3><strong>Tambah Soal Ujian Mata Pelajaran</strong></h3>
	</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-6" >
					<form action="?page=ujian&aksi=simpandata_bs_mata_pelajaran" method="POST">
						<div class="form-group">
							<label>Pertanyaan</label>
							<input class="form-control" type="hidden" value="<?php echo $id;?>" name="id_lembar_ujian" required placeholder="Id Lembar Ujian"/>
							<input class="form-control" type="hidden" value="<?php echo $mapel;?>" name="id_mata_pelajaran" required placeholder="Id Mata Pelajaran"/>
							<textarea class="ckeditor" class="form-control" name="pertanyaan" placeholder="Isi Pertanyaan Soal Ujian Mata Pelajaran" required></textarea>
						</div>					
						<div class="form-group">
							<label>Pilihan A</label>
							<textarea class="form-control" name="pilihan_a" placeholder="Pilihan A" required></textarea>
						</div>
						<div class="form-group">
							<label>Pilihan B</label>
							<textarea class="form-control" name="pilihan_b" placeholder="Pilihan B" required></textarea>
						</div>
						<div class="form-group">
							<label>Pilihan C</label>
							<textarea class="form-control" name="pilihan_c" placeholder="Pilihan C" required></textarea>
						</div>
						<div class="form-group">
							<label>Pilihan D</label>
							<textarea class="form-control" name="pilihan_d" placeholder="Pilihan D" required></textarea>
						</div>
						<div class="form-group">
							<label>Pilihan E</label>
							<textarea class="form-control" name="pilihan_e" placeholder="Pilihan E" required></textarea>
						</div>
						<div class="form-group">
							<label>Jawaban</label>
							<select class="form-control" name="jawaban">
								<option value="pilihan_a">Pilihan A</option>
								<option value="pilihan_b">Pilihan B</option>
								<option value="pilihan_c">Pilihan C</option>
								<option value="pilihan_d">Pilihan D</option>
								<option value="pilihan_e">Pilihan E</option>
							</select>
						</div>

						<input type="submit" name="simpan" value="Simpan" class="btn btn-primary" style="margin-top:15px">
						<a class="btn btn-default" href="?page=ujian&aksi=bs" style="margin-top:15px">Kembali</a>
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