<?php
	$id = $_GET['id'];
	$query = "SELECT * FROM tbl_wks_kurikulum WHERE nip = '$id'";
	$sql = $pdo->prepare($query);
	$sql->execute();
	$data = $sql->fetch();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Wks Kurikulum</title>
</head>
<body>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3><strong>Edit Wks Kurikulum</strong></h3>
	</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-6" >
					<form action="?page=akun_wks_kurikulum&aksi=updatedata_wks_kurikulum" method="POST">
						<div class="form-group">
							<label>Nama Wks Kurikulum</label>
							<input type="hidden" class="form-control" name="nip" value="<?php echo $data['nip'];?>" required placeholder="NIP Wks Kurikulum"/>
							<input class="form-control" name="nama_wks_kurikulum" value="<?php echo $data['nama_wks_kurikulum'];?>" required placeholder="Nama Wks Kurikulum"/>
						</div>
						<div class="form-group">
							<label>Jenis Kelamin</label>
							<?php if($data['jenis_kelamin']=="L"){ ?>
							<div class="form-check">
	                          <input class="form-check-input" type="radio" name="jenis_kelamin" value="L" checked>
	                          <label class="form-check-label">Laki - laki</label>
	                        </div>
	                        <div class="form-check">
	                          <input class="form-check-input" type="radio" name="jenis_kelamin" value="P">
	                          <label class="form-check-label">Perempuan</label>
	                        </div>
	                        <?php
	                    	} else{
	                    		?>
	                    		<div class="form-check">
		                          <input class="form-check-input" type="radio" name="jenis_kelamin" value="L">
		                          <label class="form-check-label">Laki - laki</label>
		                        </div>
		                        <div class="form-check">
		                          <input class="form-check-input" type="radio" name="jenis_kelamin" value="P" checked>
		                          <label class="form-check-label">Perempuan</label>
		                        </div>
	                    		<?php
	                    	}
	                        ?>
						</div>
						<div class="form-group">
							<label>Tempat Lahir</label>
							<input class="form-control" name="tempat_lahir"  value="<?php echo $data['tempat_lahir'];?>"  required placeholder="tempat_lahir"/>
						</div>
						<div class="form-group">
							<label>Tanggal Lahir</label>
							<input class="form-control" type="date" name="tanggal_lahir" value="<?php echo $data['tanggal_lahir'];?>" required placeholder="tanggal_lahir"/>
						</div>
						<div class="form-group">
							<label>Alamat</label>
							<textarea class="form-control" name="alamat" required placeholder="alamat"><?php echo $data['alamat'];?></textarea>
						</div>
						<div class="form-group">
							<label>No Telp</label>
							<input class="form-control" name="no_telp" required placeholder="no_telp" value="<?php echo $data['no_telp'] ?>"  onkeypress = "return Angkasaja(event)"/>
						</div>

						<input type="submit" name="update" value="Update" class="btn btn-primary" style="margin-top:15px">
						<a class="btn btn-default" href="?page=akun_wks_kurikulum&aksi=detail_wks_kurikulum" style="margin-top:15px">Kembali</a>
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