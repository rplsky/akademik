<?php
	$id = $_GET['id'];
	$query = "SELECT * FROM tbl_tugas_mata_pelajaran WHERE id_tugas_mata_pelajaran = '$id'";
	$sql = $pdo->prepare($query);
	$sql->execute();
	$data = $sql->fetch();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Tugas Mata Pelajaran</title>
</head>
<body>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3><strong>Edit Tugas Mata Pelajaran</strong></h3>
	</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-6" >
					<form action="?page=tugas_mata_pelajaran&aksi=updatedata_tugas_mata_pelajaran" method="POST">
						<div class="form-group">
							<label>Nama Tugas Mata Pelajaran</label>
							<input type="hidden" class="form-control" name="id_tugas_mata_pelajaran" value="<?php echo $data['id_tugas_mata_pelajaran'];?>" required placeholder="Id Tugas Mata Pelajaran"/>
							<input type="hidden" class="form-control" name="id_mata_pelajaran" value="<?php echo $data['id_mata_pelajaran'];?>" required placeholder="Id Mata Pelajaran"/>
							<input class="form-control" name="nama_tugas_mata_pelajaran" value="<?php echo $data['nama_tugas_mata_pelajaran'];?>"  required placeholder="Nama Tugas Mata Pelajaran"/>
						</div>	
						<div class="form-group">
							<label>Isi Tugas Mata Pelajaran</label>
							<textarea class="ckeditor" class="form-control" name="isi_tugas_mata_pelajaran" placeholder="Isi Tugas Mata Pelajaran" required><?php echo $data['isi_tugas_mata_pelajaran'];?></textarea>
						</div>					
						<div class="form-group">
							<label>Bobot</label>
							<input class="form-control" name="bobot" value="<?php echo $data['bobot'];?>" required placeholder="Bobot" onkeypress = "return Angkasaja(event)" required />
						</div>
						<div class="form-group">
							<label>Batas Pengumpulan</label>
							<input type="datetime-local" class="form-control" name="batas_pengumpulan" value="<?php echo $data['batas_pengumpulan'];?>" required placeholder="Batas Pengumpulan"/>
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