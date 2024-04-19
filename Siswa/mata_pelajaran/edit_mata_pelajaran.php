<?php
	$id = $_GET['id'];
	$query = "SELECT * FROM tbl_mata_pelajaran WHERE id_mata_pelajaran = '$id'";
	$sql = $pdo->prepare($query);
	$sql->execute();
	$data = $sql->fetch();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Mata Pelajaran</title>
</head>
<body>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3><strong>Edit Mata Pelajaran</strong></h3>
	</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-6" >
					<form action="?page=mata_pelajaran&aksi=updatedata_mata_pelajaran" method="POST">
						<div class="form-group">
							<label>Nama Mata Pelajaran</label>
							<input type="hidden" class="form-control" name="id_mata_pelajaran" value="<?php echo $data['id_mata_pelajaran'];?>" required placeholder="Nama Mata Pelajaran" required />
							<input class="form-control" name="nama_mata_pelajaran" required placeholder="Nama Mata Pelajaran" value="<?php echo $data['nama_mata_pelajaran'];?>" required />
						</div>
						<div class="form-group">
							<label>Nama Guru</label>
							<select class="form-control" name="nip">
								<?php
									$query_guru = "SELECT * FROM tbl_guru";
									$sql_guru = $pdo->prepare($query_guru);
									$sql_guru->execute();
									while ($data_guru = $sql_guru->fetch()) {
								?>
								<option value="<?php echo $data_guru['nip'];?>" <?php if ($data['nip']==$data_guru['nip']) { echo "selected='selected'"; }?>><?php echo $data_guru['nama_guru'];?></option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group">
						<label>Jumlah Jam Mata Pelajaran</label>
							<input class="form-control" name="jml_jam_mata_pelajaran" required placeholder="Jumlah Jam Mata Pelajaran" onkeypress = "return Angkasaja(event)"  value="<?php echo $data['jml_jam_mata_pelajaran'];?>" required />
						</div>
						<div class="form-group">
							<label>Kelompok Mata Pelajaran</label>
							<select class="form-control" name="kelompok_mata_pelajaran">
								<option value="Nasional" <?php if ($data['kelompok_mata_pelajaran']=="Nasional") {echo "selected='selected'";}?>>Nasional</option>
								<option value="Kewilayahan" <?php if ($data['kelompok_mata_pelajaran']=="Kewilayahan") {echo "selected='selected'";}?>>Kewilayahan</option>	
								<option value="Produktif (C1)" <?php if ($data['kelompok_mata_pelajaran']=="Produktif (C1)") {echo "selected='selected'";}?>>Produktif (C1)</option>
								<option value="Produktif (C2)" <?php if ($data['kelompok_mata_pelajaran']=="Produktif (C2)") {echo "selected='selected'";}?>>Produktif (C2)</option>
								<option value="Produktif (C3)" <?php if ($data['kelompok_mata_pelajaran']=="Produktif (C3)") {echo "selected='selected'";}?>>Produktif (C3)</option>
								<option value="Muatan Lokal" <?php if ($data['kelompok_mata_pelajaran']=="Muatan Lokal") {echo "selected='selected'";}?>>Muatan Lokal</option>
							</select>
						</div>
						<div class="form-group">
							<label>Semester</label>
							<select class="form-control" name="semester">
								<option value="1" <?php if ($data['semester']=="1") { echo "selected='selected'"; }?>>1 (Satu)</option>
								<option value="2" <?php if ($data['semester']=="2") { echo "selected='selected'"; }?>>2 (Dua)</option>	
								<option value="3" <?php if ($data['semester']=="3") { echo "selected='selected'"; }?>>3 (Tiga)</option>
								<option value="4" <?php if ($data['semester']=="4") { echo "selected='selected'"; }?>>4 (Empat)</option>
								<option value="5" <?php if ($data['semester']=="5") { echo "selected='selected'"; }?>>5 (Lima)</option>
								<option value="6" <?php if ($data['semester']=="6") { echo "selected='selected'"; }?>>6 (Enam)</option>
							</select>
						</div>
					
						<div class="form-group">
							<label>Kelas</label>
							<select class="form-control" name="kelas">
								<option value="X LA" <?php if ($data['kelas']=='X LA') { echo "selected='selected'"; } ?>>X LA</option>
								<option value="X MSN" <?php if ($data['kelas']=='X MSN') { echo "selected='selected'"; } ?>>X MSN</option>	
								<option value="X OTO A" <?php if ($data['kelas']=='X OTO A') { echo "selected='selected'"; } ?>>X OTO A</option>
								<option value="X OTO B" <?php if ($data['kelas']=='X OTO B') { echo "selected='selected'"; } ?>>X OTO B</option>
								<option value="X RPL" <?php if ($data['kelas']=='X RPL') { echo "selected='selected'"; } ?>>X RPL</option>
								<option value="XI LA" <?php if ($data['kelas']=='XI LA') { echo "selected='selected'"; } ?>>XI LA</option>
								<option value="XI MSN" <?php if ($data['kelas']=='XI MSN') { echo "selected='selected'"; } ?>>XI MSN</option>
								<option value="XI OTO" <?php if ($data['kelas']=='XI OTO') { echo "selected='selected'"; } ?>>XI OTO</option>
								<option value="XI RPL" <?php if ($data['kelas']=='XI RPL') { echo "selected='selected'"; } ?>>XI RPL</option>
								<option value="XII LA" <?php if ($data['kelas']=='XII LA') { echo "selected='selected'"; } ?>>XII LA</option>
								<option value="XII MSN A" <?php if ($data['kelas']=='XII MSN A') { echo "selected='selected'"; } ?>>XII MSN A</option>
								<option value="XII MSN B" <?php if ($data['kelas']=='XII MSN B') { echo "selected='selected'"; } ?>>XII MSN B</option>
								<option value="XII OTO A" <?php if ($data['kelas']=='XII OTO A') { echo "selected='selected'"; } ?>>XII OTO A</option>
								<option value="XII OTO B" <?php if ($data['kelas']=='XII OTO B') { echo "selected='selected'"; } ?>>XII OTO B</option>
								<option value="XII RPL A" <?php if ($data['kelas']=='XII RPL A') { echo "selected='selected'"; } ?>>XII RPL A</option>
								<option value="XII RPL B" <?php if ($data['kelas']=='XII RPL B') { echo "selected='selected'"; } ?>>XII RPL B</option>
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