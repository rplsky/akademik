<?php
	$id = $_GET['id'];
	$mapel = $_GET['mapel'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Import Siswa</title>
</head>
<body>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3><strong>Import Bank Soal</strong>
			<a class="btn btn-success" href="../Assets/excel/Form_Soal.xlsx" target="_blank">Download Template Excel</a>
		</h3>

	</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-6" >
					<form action="?page=ujian&aksi=upload_bs_mata_pelajaran" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label>Data Soal</label>
							<input class="form-control" type="hidden" value="<?php echo $id;?>" name="id_lembar_ujian" required placeholder="Id Lembar Ujian"/>
							<input class="form-control" type="hidden" value="<?php echo $mapel;?>" name="id_mata_pelajaran" required placeholder="Id Mata Pelajaran"/>
							<input type="file" class="form-control" name="file_soal" required placeholder="File" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" />
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