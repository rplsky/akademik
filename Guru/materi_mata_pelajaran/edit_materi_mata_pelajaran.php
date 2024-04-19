<?php
	$id = $_GET['id'];
	$mapel = $_GET['mapel'];

	$query = "SELECT * FROM tbl_materi_mata_pelajaran WHERE id_materi_mata_pelajaran = '$id'";
	$sql = $pdo->prepare($query);
	$sql->execute();
	$data = $sql->fetch();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Materi Mata Pelajaran</title>
</head>
<body>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3><strong>Edit Materi Mata Pelajaran</strong></h3>
	</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-6" >
					<form action="?page=materi_mata_pelajaran&aksi=updatedata_materi_mata_pelajaran" method="POST">
						<div class="form-group">
							<label>Nama Materi Mata Pelajaran</label>
							<input type="hidden" class="form-control" name="id_materi_mata_pelajaran" value="<?php echo $data['id_materi_mata_pelajaran'];?>" required placeholder="Id Materi Mata Pelajaran"/>
							<input type="hidden" class="form-control" name="id_mata_pelajaran" value="<?php echo $data['id_mata_pelajaran'];?>" required placeholder="Id Mata Pelajaran"/>
							<input class="form-control" name="nama_materi_mata_pelajaran" value="<?php echo $data['nama_materi_mata_pelajaran'];?>"  required placeholder="Nama Materi Mata Pelajaran"/>
						</div>	
						<div class="form-group">
							<label>Isi Materi Mata Pelajaran</label>
							<textarea class="ckeditor" class="form-control" name="isi_materi_mata_pelajaran" placeholder="Isi Materi Mata Pelajaran" required><?php echo $data['isi_materi_mata_pelajaran'];?></textarea>
						</div>
						<div class="form-group">
							<label>Tanggal Upload</label>
							<input type="datetime-local" class="form-control" name="tgl_upload" value="<?php echo $data['tgl_upload'];?>" required placeholder="Tanggal Upload"/>
						</div>
						<div class="form-group">
							<label>Batas Absensi</label>
							<input type="datetime-local" class="form-control" name="batas_absensi" value="<?php echo $data['batas_absensi'];?>" required placeholder="Batas Absensi"/>
						</div>


						<input type="submit" name="simpan" value="Simpan" class="btn btn-primary" style="margin-top:15px">
						<a class="btn btn-default" href="?page=materi_mata_pelajaran&aksi=tampil_materi_mapel&id=<?php echo $mapel;?>" style="margin-top:15px">Kembali</a>
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