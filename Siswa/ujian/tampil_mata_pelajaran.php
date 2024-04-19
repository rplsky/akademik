<?php
	$hal = (isset($_GET['hal']))? $_GET['hal'] : 1;
					
	$limit = 5; // Jumlah data per halamannya
					
	// Untuk menentukan dari data ke berapa yang akan ditampilkan pada tabel yang ada di database
	$limit_start = ($hal - 1) * $limit;
	
	$kelas = $_SESSION['kelas'];
	
	$user = $_SESSION['id_user'];

	$query = "SELECT * FROM tbl_mata_pelajaran INNER JOIN tbl_siswa ON tbl_mata_pelajaran.kelas = tbl_siswa.kelas WHERE tbl_mata_pelajaran.kelas = '$kelas' AND tbl_siswa.nis = '$user' ORDER BY tbl_mata_pelajaran.kelompok_mata_pelajaran ASC, tbl_mata_pelajaran.kelas ASC";
	$sql = $pdo->prepare($query);
	$sql->execute();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Mata Pelajaran</title>
</head>
<body>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3>
			<strong>Data Ujian Mata Pelajaran</strong>
		</h3>
		</div>
				<div class="panel-body">
					<div class="row">
						
						<?php
						while ($data = $sql->fetch()) {
						 ?>
						<div class="col-lg-3 col-xs-6">
					          <!-- small box -->
					          <div class="small-box bg-green">
					            <div class="inner">
					              <h4><?php 
					              			$id_mata_pelajaran = $data['id_mata_pelajaran'];
											$query_mapel = "SELECT * FROM tbl_mata_pelajaran WHERE id_mata_pelajaran = '$id_mata_pelajaran'";
											$sql_mapel = $pdo->prepare($query_mapel);
											$sql_mapel->execute();
											$data_mapel = $sql_mapel->fetch();
											echo $data_mapel['nama_mata_pelajaran'];
					              			echo " - ";
					              			echo $data_mapel['kelas'];
					              		?>
					              	</h4>
					              <p>
					              	<?php 
												$id_mata_pelajaran = $data['id_mata_pelajaran'];
												$query_mapel = "SELECT * FROM tbl_guru_mapel WHERE id_mata_pelajaran = '$id_mata_pelajaran'";
												$sql_mapel = $pdo->prepare($query_mapel);
												$sql_mapel->execute();
												$jml = $sql_mapel->rowCount();
												$no = 0;
												while($data_mapel = $sql_mapel->fetch()){
													$nip = $data_mapel['nip'];
													$query_guru = "SELECT * FROM tbl_guru WHERE nip = $nip";
													$sql_guru = $pdo->prepare($query_guru);
													$sql_guru->execute();
													$data_guru = $sql_guru->fetch();
													if ($no == 0) {
														echo $data_guru['nama_guru'];
														$no++;
													} else if ($no < $jml) {
														echo " - ".$data_guru['nama_guru'];
														$no++;
													} else {
														echo " - ".$data_guru['nama_guru'];
														$no++;
													}
												}
									?>
								  </p>
					            </div>
					            <div class="icon">
					              <i class="fa fa-book"></i>
					            </div>
					            <a href="?page=ujian&aksi=lk&id=<?php echo $data['id_mata_pelajaran']; ?>" class="small-box-footer">Buka Ujian <i class="fa fa-arrow-circle-right"></i></a>
					          </div>
					     </div>
					   <?php } ?>
						
		</div>
	</div>
</div>
</body>
</html>