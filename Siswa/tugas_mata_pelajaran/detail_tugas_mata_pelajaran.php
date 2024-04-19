<?php
	date_default_timezone_set('Asia/Jakarta');
	$tgl_skrang = date('Y-m-d H:i:s'); 

	$hal = (isset($_GET['hal']))? $_GET['hal'] : 1;
					
	$limit = 1; // Jumlah data per halamannya
					
	// Untuk menentukan dari data ke berapa yang akan ditampilkan pada tabel yang ada di database
	$limit_start = ($hal - 1) * $limit;

	$nip = $_SESSION['id_user'];
	$id = $_GET['id'];
	$id_tugas = $_GET['idtugas'];

	$query = "SELECT * FROM tbl_tugas_mata_pelajaran WHERE id_tugas_mata_pelajaran = '$id_tugas'";
	$sql = $pdo->prepare($query);
	$sql->execute();
	$sql = $pdo->prepare($query);
	$sql->execute();

	$query_mapel = "SELECT * FROM tbl_mata_pelajaran WHERE id_mata_pelajaran = '$id'";
	$sql_mapel = $pdo->prepare($query_mapel);
	$sql_mapel->execute();
	$data_mapel = $sql_mapel->fetch();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Tugas Mapel</title>
</head>
<body>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3>
			<strong>Data Tugas Mata Pelajaran - <?php echo $data_mapel['nama_mata_pelajaran']."(".$data_mapel['kelas'].")"; ?></strong>
		</h3>
			</div>
				<div class="panel-body">
					<div class="panel-body">
					<?php
						while($data = $sql->fetch()){
						   ?>
								<div class="box box-default">
						          <div class="box-header with-border">
						            <h6 class="box-title">
							            	<p> <?php echo $data['id_tugas_mata_pelajaran'];?> [<?php echo $data['tgl_tugas'];?>] : <?php echo $data['nama_tugas_mata_pelajaran'];?> 
							            	(Tanggal Pengumpulan : <?php echo $data['batas_pengumpulan'];?>) </p>
						        	</h6>
						          </div>
						          <div class="box-body">
						          	<p>
						            	<a class="btn btn-success" href="?page=tugas_mata_pelajaran&aksi=rekapdata_tugas_mata_pelajaran&id=<?php echo $data['id_tugas_mata_pelajaran'];?>&mapel=<?php echo $data['id_mata_pelajaran'];?>">Rekap Tugas</a>
						            	<a class="btn btn-warning" href="?page=tugas_mata_pelajaran&aksi=unggah_tugas_mata_pelajaran&id=<?php echo $data['id_tugas_mata_pelajaran'];?>&nip=<?php echo $data['nip'];?>&mapel=<?php echo $data['id_mata_pelajaran'];?>">Unggah Tugas</a>
						            </p>
						            <p> <?php echo $data['isi_tugas_mata_pelajaran'];?> </p>
						            <p><a class="btn btn-primary" href="?page=tugas_mata_pelajaran&aksi=aktif&id=<?php echo $id;?>"><i class="fa fa-arrow-circle-left"></i> Kembali</a></p>
						          </div>
						          <!-- /.box-body -->
						        </div>
								<?php
						}
					?>	
				</div>
	</div>
</div>
</body>
</html>