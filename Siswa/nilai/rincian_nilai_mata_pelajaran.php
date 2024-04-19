<?php
	$hal = (isset($_GET['hal']))? $_GET['hal'] : 1;
					
	$limit = 5; // Jumlah data per halamannya
					
	// Untuk menentukan dari data ke berapa yang akan ditampilkan pada tabel yang ada di database
	$limit_start = ($hal - 1) * $limit;

	$id = $_GET['id'];
	$mapel = $_GET['mapel'];
	$nis = $_SESSION['id_user'];

	$query = "SELECT * FROM tbl_siswa WHERE kelas = '$id' AND nis = '$nis' LIMIT ".$limit_start.",".$limit;
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
	<title>Tugas Mapel</title>
</head>
<body>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3>
			<strong>Data Nilai Mata Pelajaran <?php echo $data_mapel['nama_mata_pelajaran'];?> (<?php echo $id; ?>)</strong>
		</h3>
			</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12" >
							<div class="table-responsive">
								<table class="table table-striped">
						<thead>
							<tr>
								<th>NIS</th>
								<th>Nama Siswa</th>
								<th>Jenis Kelamin</th>
								<th>Nilai</th>
								<th>Grade</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<?php
							while($data = $sql->fetch()){
								?>
								<tbody>
									<tr>
										<td><?php echo $data['nis'];?></td>
										<td><?php echo $data['nama_siswa'];?></td>
										<td><?php echo $data['jenis_kelamin'];?></td>
										<?php
										$nis = $data['nis'];
								$query_tugas = "SELECT * FROM tbl_tugas_mata_pelajaran WHERE id_mata_pelajaran = '$mapel'";
								$sql_tugas = $pdo->prepare($query_tugas);
								$sql_tugas->execute();
								$jml_tugas = $sql_tugas->rowCount();
								$data_tugas = $sql_tugas->fetch();
								$tugas = $data_tugas['id_tugas_mata_pelajaran'];

								$query_nilai = "SELECT *, SUM(nilai) as total_nilai FROM tbl_nilai_mata_pelajaran WHERE id_mata_pelajaran = '$mapel' AND nis = '$nis'";
								$sql_nilai = $pdo->prepare($query_nilai);
								$sql_nilai->execute();
								$jml_nilai = $sql_nilai->rowCount();
								$data_nilai = $sql_nilai->fetch();
								$total_nilai = ($data_nilai['total_nilai']!=0)?$data_nilai['total_nilai']:0;
								$rata_nilai = ($total_nilai!=0)?$total_nilai / $jml_tugas:0;
								echo "<td>".$rata_nilai."</td>";

									if ($rata_nilai >= 95) {
										$grade = "A";
										echo "<td>".$grade."</td>";
									} else if ($rata_nilai >= 85 AND $rata_nilai < 95) {
										$grade = "A-";
										echo "<td>".$grade."</td>";
									}  else if ($rata_nilai >= 75 AND $rata_nilai < 85) {
										$grade = "B";
										echo "<td>".$grade."</td>";
									} else if ($rata_nilai >= 70 AND $rata_nilai < 75) {
										$grade = "B-";
										echo "<td>".$grade."</td>";
									} else if ($rata_nilai >= 60 AND $rata_nilai < 70) {
										$grade = "C";
										echo "<td>".$grade."</td>";
									} else if ($rata_nilai <= 59) {
										$grade = "D";
										echo "<td>".$grade."</td>";
									}
								
								?>
										<td><a class="btn btn-warning" href="?page=nilai_mata_pelajaran&aksi=detail_tugas_mata_pelajaran&id=<?php echo $data['nis'];?>&mapel=<?php echo $mapel;?>">Detail Nilai Tugas</a></td>
										
									</tr>
								</tbody>
								<?php
							}
						?>	

						</table>	
				</div>
			</div>
		</div>
		<ul class="pagination pagination-sm m-0 float-right">
				<!-- LINK FIRST AND PREV -->
				<?php
				if($hal == 1){ // Jika hal adalah hal ke 1, maka disable link PREV
				?>
					<li class="page-item" class="disabled"><a class="page-link" href="#">First</a></li>
					<li class="page-item" class="disabled"><a class="page-link" href="#">&laquo;</a></li>
				<?php
				}else{ // Jika hal bukan hal ke 1
					$link_prev = ($hal > 1)? $hal - 1 : 1;
				?>
					<li class="page-item"><a class="page-link" href="?page=nilai_mata_pelajaran&aksi=detail_nilai_mata_pelajaran&id=<?php echo $id;?>&mapel=<?php echo $mapel;?>&hal=1">First</a></li>
					<li class="page-item"><a class="page-link" href="?page=nilai_mata_pelajaran&aksi=detail_nilai_mata_pelajaran&hal=<?php echo $link_prev; ?>">&laquo;</a></li>
				<?php
				}
				?>
				
				<!-- LINK NUMBER -->
				<?php
				// Buat query untuk menghitung semua jumlah data
				$sql2 = $pdo->prepare("SELECT COUNT(*) AS jumlah FROM tbl_siswa WHERE kelas = '$id' AND nis = '$nis'");
				$sql2->execute(); // Eksekusi querynya
				$get_jumlah = $sql2->fetch();
				
				$jumlah_hal = ceil($get_jumlah['jumlah'] / $limit); // Hitung jumlah halamannya
				$jumlah_number = 3; // Tentukan jumlah link number sebelum dan sesudah hal yang detail_nilai_mata_pelajaran
				$start_number = ($hal > $jumlah_number)? $hal - $jumlah_number : 1; // Untuk awal link number
				$end_number = ($hal < ($jumlah_hal - $jumlah_number))? $hal + $jumlah_number : $jumlah_hal; // Untuk akhir link number
				
				for($i = $start_number; $i <= $end_number; $i++){
					$link_active = ($hal == $i)? ' class="active"' : '';
				?>
					<li class="page-item" <?php echo $link_active; ?>><a  class="page-link" href="?page=nilai_mata_pelajaran&aksi=detail_nilai_mata_pelajaran&id=<?php echo $id;?>&mapel=<?php echo $mapel;?>&hal=<?php echo $i; ?>"><?php echo $i; ?></a></li>
				<?php
				}
				?>
				
				<!-- LINK NEXT AND LAST -->
				<?php
				// Jika hal sama dengan jumlah hal, maka disable link NEXT nya
				// Artinya hal tersebut adalah hal terakhir 
				if($hal == $jumlah_hal){ // Jika hal terakhir
				?>
					<li class="disabled"><a class="page-link" href="#">&raquo;</a></li>
					<li class="disabled"><a class="page-link" href="#">Last</a></li>
				<?php
				}else{ // Jika Bukan hal terakhir
					$link_next = ($hal < $jumlah_hal)? $hal + 1 : $jumlah_hal;
				?>
					<li class="page-item"><a class="page-link" href="?page=nilai_mata_pelajaran&aksi=detail_nilai_mata_pelajaran&id=<?php echo $id;?>&mapel=<?php echo $mapel;?>&hal=<?php echo $link_next; ?>">&raquo;</a></li>
					<li class="page-item"><a class="page-link" href="?page=nilai_mata_pelajaran&aksi=detail_nilai_mata_pelajaran&id=<?php echo $id;?>&mapel=<?php echo $mapel;?>&hal=<?php echo $jumlah_hal; ?>">Last</a></li>
				<?php
				}
				?>
			</ul>
	</div>
</div>
</body>
</html>