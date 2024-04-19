<?php
	$hal = (isset($_GET['hal']))? $_GET['hal'] : 1;
					
	$limit = 1; // Jumlah data per halamannya
					
	// Untuk menentukan dari data ke berapa yang akan ditampilkan pada tabel yang ada di database
	$limit_start = ($hal - 1) * $limit;

	$nip = $_SESSION['id_user'];
	$id = $_GET['id'];
	$mapel = $_GET['mapel'];

	$query = "SELECT * FROM tbl_materi_mata_pelajaran WHERE id_materi_mata_pelajaran = '$id'";
	$sql = $pdo->prepare($query);
	$sql->execute();

	$query_mapel = "SELECT * FROM tbl_mata_pelajaran WHERE id_mata_pelajaran = '$mapel'";
	$sql_mapel = $pdo->prepare($query_mapel);
	$sql_mapel->execute();
	$data_mapel = $sql_mapel->fetch();
?>
<!DOCTYPE html>
<html>
<head>
	<title>MateriTugas Mapel</title>
	<style>
	    
	</style>
</head>
<body>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3>
			<strong>Data Materi Mata Pelajaran - <?php echo $data_mapel['nama_mata_pelajaran']."(".$data_mapel['kelas'].")"; ?></strong>
		</h3>
		</div>
				<div class="panel-body" >
					<?php
						while($data = $sql->fetch()){
					?>
					<div class="box box-default" >
			          <div class="box-header with-border">
			            <h6 class="box-title">
				            	<p> <?php echo $data['id_materi_mata_pelajaran'];?> [<?php echo $data['tgl_upload'];?>] : <?php echo $data['nama_materi_mata_pelajaran'];?> 
				            	(Batas Absensi : <?php echo $data['batas_absensi'];?>) </p>
			        	</h6>
			          </div>
			          <div class="box-body" id="panelsc">
			          	<p>
			            	<a class="btn btn-info" href="?page=materi_mata_pelajaran&aksi=rekapdata_absensi_mata_pelajaran&id=<?php echo $data['id_materi_mata_pelajaran'];?>&mapel=<?php echo $data['id_mata_pelajaran'];?>">Rekap Absensi</a>
							<a class="btn btn-warning" href="?page=materi_mata_pelajaran&aksi=editdata_materi_mata_pelajaran&id=<?php echo $data['id_materi_mata_pelajaran'];?>&mapel=<?php echo $mapel;?>">Edit</a>
							<a onclick="return confirm('Anda akan menghapus data ini?')" class="btn btn-danger" href="?page=materi_mata_pelajaran&aksi=hapusdata_materi_mata_pelajaran&id=<?php echo $data['id_materi_mata_pelajaran'];?>&mapel=<?php echo $mapel;?>">Delete</a>
			            </p>
			            <p> <?php echo $data['isi_materi_mata_pelajaran'];?> </p>
			          </div>
			          <!-- /.box-body -->
			        </div>
					
					<?php
						}
					?>	
			</div>
	</div>
</body>
</html>