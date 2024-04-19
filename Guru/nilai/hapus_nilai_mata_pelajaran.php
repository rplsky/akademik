<?php
	$id = $_GET['id'];
	$mapel = $_GET['mapel'];
	$nip = $_GET['nip'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tambah Tugas Mata Pelajaran</title>
</head>
<body>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3><strong>Hapus Nilai Mata Pelajaran</strong></h3>
	</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-6" >
					<form action="?page=nilai_mata_pelajaran&aksi=hapusdata_tugas_mata_pelajaran" method="POST">
						<div class="form-group">
							<label>Tugas Mata Pelajaran</label>
							<input type="hidden" class="form-control" name="nip" value="<?php echo $nip;?>" required placeholder="NIP"/>
							<input type="hidden" class="form-control" name="id_mata_pelajaran" value="<?php echo $mapel;?>" required placeholder="Id Mata Pelajaran"/>
							<input type="hidden" class="form-control" name="nis" value="<?php echo $id;?>" required placeholder="NIS"/>
							<select class="form-control" name="id_tugas_mata_pelajaran">
								<?php
									$query_tugas = "SELECT * FROM tbl_tugas_mata_pelajaran INNER JOIN tbl_mata_pelajaran ON tbl_tugas_mata_pelajaran.id_mata_pelajaran = tbl_mata_pelajaran.id_mata_pelajaran WHERE tbl_mata_pelajaran.id_mata_pelajaran = '$mapel' ORDER BY tbl_mata_pelajaran.id_mata_pelajaran ASC";
									$sql_tugas = $pdo->prepare($query_tugas);
									$sql_tugas->execute();
									while ($data_tugas = $sql_tugas->fetch()) {
								?>
								<option value="<?php echo $data_tugas['id_tugas_mata_pelajaran'];?>"><?php echo $data_tugas['nama_tugas_mata_pelajaran'];?></option>
								<?php } ?>
							</select>
						</div>		

						<input type="submit" name="simpan" value="Simpan" class="btn btn-primary" style="margin-top:15px">
						<a class="btn btn-default" href="?page=nilai_mata_pelajaran&aksi=detail_tugas_mata_pelajaran&id=<?php echo $id;?>&mapel=<?php echo $mapel;?>" style="margin-top:15px">Kembali</a>
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