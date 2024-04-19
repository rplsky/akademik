<?php
	$hal = (isset($_GET['hal']))? $_GET['hal'] : 1;
					
	$limit = 1; // Jumlah data per halamannya
					
	// Untuk menentukan dari data ke berapa yang akan ditampilkan pada tabel yang ada di database
	$limit_start = ($hal - 1) * $limit;

	$nip = $_SESSION['id_user'];
	$id = $_GET['id'];
	$mapel = $_GET['mapel'];
	
	date_default_timezone_set('Asia/Jakarta');
    $absen = date('Y-m-d H:i:s');

	$query = "SELECT * FROM tbl_materi_mata_pelajaran WHERE id_materi_mata_pelajaran = '$id'";
	$sql = $pdo->prepare($query);
	$sql->execute();
	$data = $sql->fetch();

	$query_mapel = "SELECT * FROM tbl_mata_pelajaran WHERE id_mata_pelajaran = '$mapel'";
	$sql_mapel = $pdo->prepare($query_mapel);
	$sql_mapel->execute();
	$data_mapel = $sql_mapel->fetch();
	
	$tgl_absen = $data['batas_absensi'];
	
	if($absen <= $tgl_absen) {
    	
    	$query_cek = "SELECT * FROM tbl_absensi_mata_pelajaran WHERE id_materi_mata_pelajaran = '$id' AND nis = '$nip'";
    	$sql_cek = $pdo->prepare($query_cek);
    	$sql_cek->execute();
    	$cocok = $sql_cek->rowCount();
    	
    	if($cocok == 0){
    	    $status = "Proses";
    	    $query_absen = "INSERT INTO tbl_absensi_mata_pelajaran (id_materi_mata_pelajaran, id_mata_pelajaran, nis, tgl_awal_absensi, status) VALUES ('$id', '$mapel', '$nip', '$absen', '$status')";
    	    $sql_absen = $pdo->prepare($query_absen);
    	    $sql_absen->execute();
    	}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Materi Tugas Mapel</title>
</head>
<body>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3>
			<strong>Data Materi Mata Pelajaran - <?php echo $data_mapel['nama_mata_pelajaran']."(".$data_mapel['kelas'].")"; ?></strong>
		</h3>
		</div>
				<div class="panel-body">
				    
					<div class="box box-default">
			          <div class="box-header with-border">
			            <h6 class="box-title">
				            	<p> <?php echo $data['id_materi_mata_pelajaran'];?> [<?php echo $data['tgl_upload'];?>] : <?php echo $data['nama_materi_mata_pelajaran'];?> 
				            	(Batas Absensi : <?php echo $data['batas_absensi'];?>) </p>
			        	</h6>
			          </div>
			          <div class="box-body">
			            <p> <?php echo $data['isi_materi_mata_pelajaran'];?> </p>
			            <p>
			            	<a class="btn btn-info" href="?page=materi_mata_pelajaran&aksi=update_absensi_mata_pelajaran&id=<?php echo $data['id_materi_mata_pelajaran'];?>&mapel=<?php echo $data['id_mata_pelajaran'];?>&absen=<?php echo $data['batas_absensi'];?>">Selesai Baca Materi</a>
			            </p>
			          </div>
			          <!-- /.box-body -->
			        </div>
			</div>
	</div>
</body>
</html>