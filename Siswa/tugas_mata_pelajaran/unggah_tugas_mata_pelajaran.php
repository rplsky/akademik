<?php
	$id = $_GET['id'];
	$nip = $_GET['nip'];
	$mapel = $_GET['mapel'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Unggah Tugas Mata Pelajaran</title>
</head>
<body>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3><strong>Unggah Tugas Mata Pelajaran</strong></h3>
	</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-6" >
					<form action="?page=tugas_mata_pelajaran&aksi=upload_tugas_mata_pelajaran" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label>File Tugas</label>
							<input type="hidden" class="form-control" name="id_tugas_mata_pelajaran" value="<?php echo $id;?>" required placeholder="Id Tugas Mata Pelajaran"/>
							<input type="hidden" class="form-control" name="nip" value="<?php echo $nip;?>" required placeholder="NIP"/>
							<input type="hidden" class="form-control" name="id_mata_pelajaran" value="<?php echo $mapel;?>" required placeholder="Id Mata Pelajaran"/>
							<input type="file" name="file_tugas">
						</div>
						
						<input type="submit" name="kirim" value="Kirim" class="btn btn-primary" style="margin-top:15px">
						<a class="btn btn-default" href="javascript:history.back()" style="margin-top:15px">Kembali</a>
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