<?php
	$id = $_GET['id'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tambah Materi Mata Pelajaran</title>
</head>
<body>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3><strong>Tambah Materi Mata Pelajaran</strong></h3>
	</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-6" >
					<form action="?page=materi_mata_pelajaran&aksi=simpandata_materi_mata_pelajaran" method="POST">
						<div class="form-group">
							<label>Nama Materi Mata Pelajaran</label>
							<input class="form-control" type="hidden" value="<?php echo $id;?>" name="id_mata_pelajaran" required placeholder="Id Mata Pelajaran"/>
							<input class="form-control" name="nama_materi_mata_pelajaran" required placeholder="Nama Materi Mata Pelajaran"/>
						</div>	
						<div class="form-group">
							<label>Isi Materi Mata Pelajaran</label>
							<textarea class="ckeditor" class="form-control" name="isi_materi_mata_pelajaran" placeholder="Isi Materi Mata Pelajaran" required></textarea>
						</div>		
						<div class="form-group">
							<label>Tanggal Upload Materi</label>
							<input type="datetime-local" class="form-control" name="tgl_upload" required placeholder="Tanggal Materi"/>
						</div>
						<div class="form-group">
							<label>Batas Absensi</label>
							<input type="datetime-local" class="form-control" name="batas_absensi" required placeholder="Batas Absensi"/>
						</div>

						<input type="submit" name="simpan" value="Simpan" class="btn btn-primary" style="margin-top:15px">
						<a class="btn btn-default" href="?page=materi_mata_pelajaran&aksi=tampil_mapel&id=<?php echo $id;?>" style="margin-top:15px">Kembali</a>
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