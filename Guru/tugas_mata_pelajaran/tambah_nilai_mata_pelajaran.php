<?php
	$id = $_GET['id'];
	$mapel = $_GET['mapel'];
	$id_tugas_mata_pelajaran = $_GET['itm'];
	$nip = $_SESSION['id_user'];

?>
<!DOCTYPE html>
<html>
<head>
	<title>Tambah Tugas Mata Pelajaran</title>
</head>
<body>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3><strong>Nilai Tugas Mata Pelajaran</strong></h3>
	</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-6" >
					<form action="?page=tugas_mata_pelajaran&aksi=simpandata_nilai_mata_pelajaran" method="POST">			
						<div class="form-group">
							<label>NIS | Nama Siswa</label>
							<?php
								$query_siswa = "SELECT * FROM tbl_siswa WHERE nis = '$id'";
								$sql_siswa = $pdo->prepare($query_siswa);
								$sql_siswa->execute();
								$data_siswa = $sql_siswa->fetch();
							?>
							<input class="form-control" required placeholder="NIS | Nama Siswa" value="<?php echo $data_siswa['nis']." | ".$data_siswa['nama_siswa'];?>" disabled />
						</div>
						<div class="form-group">
							<label>Judul Tugas</label>
							<?php
								$query_tugas = "SELECT * FROM tbl_tugas_mata_pelajaran WHERE id_tugas_mata_pelajaran = '$id_tugas_mata_pelajaran'";
								$sql_tugas = $pdo->prepare($query_tugas);
								$sql_tugas->execute();
								$data_tugas = $sql_tugas->fetch();
							?>
							<input class="form-control" required placeholder="Judul Tugas" value="<?php echo $data_tugas['nama_tugas_mata_pelajaran'];?>" disabled />
						</div>
						<div class="form-group">
							<label>Nilai</label>
							<input type="hidden" class="form-control" name="nip" value="<?php echo $nip;?>" required placeholder="NIP"/>
							<input type="hidden" class="form-control" name="id_mata_pelajaran" value="<?php echo $mapel;?>" required placeholder="Id Mata Pelajaran"/>
							<input type="hidden" class="form-control" name="nis" value="<?php echo $id;?>" required placeholder="NIS"/>
							<input type="hidden" class="form-control" name="id_tugas_mata_pelajaran" value="<?php echo $id_tugas_mata_pelajaran;?>" required placeholder="Id Tugas Mata Pelajaran"/>
							<input class="form-control" name="nilai" required placeholder="Nilai" onkeypress = "return Angkasaja(event)" required />
						</div>

						<input type="submit" name="simpan" value="Simpan" class="btn btn-primary" style="margin-top:15px">
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