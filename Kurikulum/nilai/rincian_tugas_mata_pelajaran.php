<?php
	$hal = (isset($_GET['hal']))? $_GET['hal'] : 1;
					
	$limit = 5; // Jumlah data per halamannya
					
	// Untuk menentukan dari data ke berapa yang akan ditampilkan pada tabel yang ada di database
	$limit_start = ($hal - 1) * $limit;

	$id = $_GET['id'];
	$mapel = $_GET['mapel'];

	$query = "SELECT * FROM tbl_siswa WHERE nis = '$id' LIMIT ".$limit_start.",".$limit;
	$sql = $pdo->prepare($query);
	$sql->execute();

	$query_mapel = "SELECT * FROM tbl_mata_pelajaran WHERE id_mata_pelajaran = '$mapel'";
	$sql_mapel = $pdo->prepare($query_mapel);
	$sql_mapel->execute();
	$data_mapel = $sql_mapel->fetch();

	$query_tugas = "SELECT * FROM tbl_tugas_mata_pelajaran WHERE id_mata_pelajaran = '$mapel'";
	$sql_tugas = $pdo->prepare($query_tugas);
	$sql_tugas->execute();
	$jml_tugas = $sql_tugas->rowCount();
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
			<strong>Data Nilai Mata Pelajaran <?php echo $data_mapel['nama_mata_pelajaran'];?> (<?php echo $data_mapel['kelas']; ?>)</strong>
		</h3>
			</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12" >
							<div class="table-responsive">
								<table class="table table-striped">
						<thead>
							<tr>
								<th rowspan="2">NIS</th>
								<th rowspan="2">Nama Siswa</th>
								<th rowspan="2">Jenis Kelamin</th>
								<th colspan="<?php echo $jml_tugas;?>">Tugas</th>
							</tr>
							<tr>
								<?php
								for ($i=1; $i <= $jml_tugas; $i++) { 
									echo "<th>".$i."</th>";
								}
								?>
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
								$query_nilai = "SELECT * FROM tbl_nilai_mata_pelajaran WHERE id_mata_pelajaran = '$mapel' AND nis = '$nis'";
								$sql_nilai = $pdo->prepare($query_nilai);
								$sql_nilai->execute();
								$jml_nilai = $sql_nilai->rowCount();
								if ($jml_nilai == $jml_tugas) {
									while ($data_nilai = $sql_nilai->fetch()) {
										echo "<td>".$data_nilai['nilai']."</td>";
									}
								} else {
									$jml_nilai_kerja = $jml_tugas - $jml_nilai;

									while ($data_nilai = $sql_nilai->fetch()) {
										echo "<td>".$data_nilai['nilai']."</td>";
									}

									for ($i=1; $i <= $jml_nilai_kerja; $i++) { 
										echo "<td> 0 </td>";
									}
								}
								
								?>
										
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
					<li class="page-item"><a class="page-link" href="?page=nilai_mata_pelajaran&aksi=detail_tugas_mata_pelajaran&id=<?php echo $id;?>&mapel=<?php echo $mapel;?>&hal=1">First</a></li>
					<li class="page-item"><a class="page-link" href="?page=nilai_mata_pelajaran&aksi=detail_tugas_mata_pelajaran&id=<?php echo $id;?>&mapel=<?php echo $mapel;?>&hal=<?php echo $link_prev; ?>">&laquo;</a></li>
				<?php
				}
				?>
				
				<!-- LINK NUMBER -->
				<?php
				// Buat query untuk menghitung semua jumlah data
				$sql2 = $pdo->prepare("SELECT COUNT(*) AS jumlah FROM tbl_siswa WHERE nis = '$id'");
				$sql2->execute(); // Eksekusi querynya
				$get_jumlah = $sql2->fetch();
				
				$jumlah_hal = ceil($get_jumlah['jumlah'] / $limit); // Hitung jumlah halamannya
				$jumlah_number = 3; // Tentukan jumlah link number sebelum dan sesudah hal yang 
				$start_number = ($hal > $jumlah_number)? $hal - $jumlah_number : 1; // Untuk awal link number
				$end_number = ($hal < ($jumlah_hal - $jumlah_number))? $hal + $jumlah_number : $jumlah_hal; // Untuk akhir link number
				
				for($i = $start_number; $i <= $end_number; $i++){
					$link_active = ($hal == $i)? ' class="active"' : '';
				?>
					<li class="page-item" <?php echo $link_active; ?>><a  class="page-link" href="?page=nilai_mata_pelajaran&aksi=detail_tugas_mata_pelajaran&id=<?php echo $id;?>&mapel=<?php echo $mapel;?>&hal=<?php echo $i; ?>"><?php echo $i; ?></a></li>
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
					<li class="page-item"><a class="page-link" href="?page=nilai_mata_pelajaran&aksi=detail_tugas_mata_pelajaran&id=<?php echo $id;?>&mapel=<?php echo $mapel;?>&hal=<?php echo $link_next; ?>">&raquo;</a></li>
					<li class="page-item"><a class="page-link" href="?page=nilai_mata_pelajaran&aksi=detail_tugas_mata_pelajaran&id=<?php echo $id;?>&mapel=<?php echo $mapel;?>&hal=<?php echo $jumlah_hal; ?>">Last</a></li>
				<?php
				}
				?>
			</ul>
	</div>
</div>
</body>
</html>