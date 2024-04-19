<!DOCTYPE html>
<html>
<head>
	<title>Tambah Mata Pelajaran</title>
</head>
<body>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3><strong>Tambah Guru Mata Pelajaran</strong></h3>
	</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-6" >
					<form action="?page=mata_pelajaran&aksi=simpandataguru_mata_pelajaran" method="POST">
						<div class="form-group">
							<label>Nama Guru</label>
							<?php $mapel = $_GET['id']?>
							<input type="hidden" name="id_mata_pelajaran" value="<?php echo $mapel;?>">
							<select class="form-control" name="nip">
								<?php
									$query_guru = "SELECT * FROM tbl_guru";
									$sql_guru = $pdo->prepare($query_guru);
									$sql_guru->execute();
									while ($data_guru = $sql_guru->fetch()) {
								?>
								<option value="<?php echo $data_guru['nip'];?>"><?php echo $data_guru['nama_guru'];?></option>
								<?php } ?>
							</select>
						</div>

						<input type="submit" name="simpan" value="Simpan" class="btn btn-primary" style="margin-top:15px">
						<a class="btn btn-default" href="?page=mata_pelajaran&aksi=aktif" style="margin-top:15px">Kembali</a>
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