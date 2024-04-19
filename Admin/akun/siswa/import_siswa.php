<!DOCTYPE html>
<html>
<head>
	<title>Import Siswa</title>
</head>
<body>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3><strong>Import Siswa</strong>
			<a class="btn btn-success" href="../Assets/excel/Form_Siswa.xlsx" target="_blank">Download Template Excel</a>
		</h3>

	</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-6" >
					<form action="?page=akun_siswa&aksi=upload_siswa" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label>Data Siswa</label>
							<input type="file" class="form-control" name="file" required placeholder="File" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" />
						</div>

						<input type="submit" name="simpan" value="Simpan" class="btn btn-primary" style="margin-top:15px">
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