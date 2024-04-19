<?php
	$hal = (isset($_GET['hal']))? $_GET['hal'] : 1;
					
	$limit = 5; // Jumlah data per halamannya
					
	// Untuk menentukan dari data ke berapa yang akan ditampilkan pada tabel yang ada di database
	$limit_start = ($hal - 1) * $limit;

	$kelas = $_SESSION['kelas'];
	
	$user = $_SESSION['id_user'];

	$query = "SELECT * FROM tbl_mata_pelajaran INNER JOIN tbl_siswa ON tbl_mata_pelajaran.kelas = tbl_siswa.kelas WHERE tbl_mata_pelajaran.kelas = '$kelas' AND tbl_siswa.nis = '$user' ORDER BY tbl_mata_pelajaran.kelompok_mata_pelajaran ASC, tbl_mata_pelajaran.kelas ASC LIMIT ".$limit_start.",".$limit;
	$sql = $pdo->prepare($query);
	$sql->execute();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tugas Mapel</title>
	<style>
	    .btn__{
            display: inline-block;
            transition: .2s linear;
            color:var(--black);
            border-radius: .5rem;
            font-size: 2rem;
            cursor: pointer;
            margin: 0 2rem 0 2rem;
            padding: 1px 1px 1px 1px;
        }
        
        .btn__:hover{
            letter-spacing: .1rem;
        }
	</style>
</head>
<body>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3>
			<strong>Data Nilai Mata Pelajaran</strong>
		</h3>
			</div>
				<div class="panel-body">
					<div class="row">

					<?php
						    while ($data = $sql->fetch()) {
						 ?>
						<div class="col-lg-4 col-xs-12">
					          <!-- small box -->
					          <div class="small-box bg-blue">
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
					            <?php
					                $id_mata_pelajaran = $data['id_mata_pelajaran'];
									$query_mapel = "SELECT * FROM tbl_mata_pelajaran WHERE id_mata_pelajaran = '$id_mata_pelajaran'";
									$sql_mapel = $pdo->prepare($query_mapel);
									$sql_mapel->execute();
									$data_mapel = $sql_mapel->fetch();
					            ?>
					            <p class="small-box-footer bg-dark">
					                <a href="?page=nilai_mata_pelajaran&aksi=detail_nilai_mata_pelajaran&id=<?php echo $data['kelas'];?>&mapel=<?php echo $data['id_mata_pelajaran'];?>" class="btn__"><i class='bx bx-info-square'></i></a>
					            </p>     
					            </div>
					     </div>
					   <?php } ?>
	</div>
										</div>
</div>
</body>
</html>