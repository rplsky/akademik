<?php
	$hal = (isset($_GET['hal']))? $_GET['hal'] : 1;
					
	$limit = 5; // Jumlah data per halamannya
					
	// Untuk menentukan dari data ke berapa yang akan ditampilkan pada tabel yang ada di database
	$limit_start = ($hal - 1) * $limit;

	$query = "SELECT * FROM tbl_mata_pelajaran LIMIT ".$limit_start.",".$limit;
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
			<strong>Data Mata Pelajaran</strong>
			<a class="btn btn-primary" href="?page=mata_pelajaran&aksi=tambahdata_mata_pelajaran">Tambah Data</a>
			<a class="btn btn-danger" href="?page=mata_pelajaran&aksi=hapussemua_mata_pelajaran" onclick="return confirm('Anda akan menghapus semua data ini?')">Hapus Semua Data</a>
		</h3>
			</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12" >
							<div class="table-responsive">
								<table class="table table-striped">
						<thead>
							<tr>
								<th>Id Mata Pelajaran</th>
								<th>Nama Mata Pelajaran</th>
								<th>Nama Guru</th>
								<th>Jumlah Jam Mata Pelajaran</th>
								<th>Kelompok Mata Pelajaran</th>
								<th>Semester</th>
								<th>Kelas</th>
								<th colspan="3">Aksi</th>
							</tr>
						</thead>
						<?php
							while($data = $sql->fetch()){
								?>
								<tbody>
									<tr>
										<td><?php echo $data['id_mata_pelajaran'];?></td>
										<td><?php echo $data['nama_mata_pelajaran'];?></td>
										<td>
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
										</td>
										<td><?php echo $data['jml_jam_mata_pelajaran'];?></td>
										<td><?php echo $data['kelompok_mata_pelajaran'];?></td>
										<td><?php echo $data['semester'];?></td>
										<td><?php echo $data['kelas'];?></td>
										<td><a class="btn btn-success" href="?page=mata_pelajaran&aksi=guru_mata_pelajaran&id=<?php echo $data['id_mata_pelajaran'];?>">Lihat Daftar Guru</a></td>
										<td><a class="btn btn-warning" href="?page=mata_pelajaran&aksi=editdata_mata_pelajaran&id=<?php echo $data['id_mata_pelajaran'];?>">Edit</a></td>
										<td><a onclick="return confirm('Anda akan menghapus data ini?')" class="btn btn-danger" href="?page=mata_pelajaran&aksi=hapusdata_mata_pelajaran&id=<?php echo $data['id_mata_pelajaran'];?>">Delete</a></td>
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
					<li class="page-item"><a class="page-link" href="?page=mata_pelajaran&aksi=aktif&hal=1">First</a></li>
					<li class="page-item"><a class="page-link" href="?page=mata_pelajaran&aksi=aktif&hal=<?php echo $link_prev; ?>">&laquo;</a></li>
				<?php
				}
				?>
				
				<!-- LINK NUMBER -->
				<?php
				// Buat query untuk menghitung semua jumlah data
				$sql2 = $pdo->prepare("SELECT COUNT(*) AS jumlah FROM tbl_mata_pelajaran");
				$sql2->execute(); // Eksekusi querynya
				$get_jumlah = $sql2->fetch();
				
				$jumlah_hal = ceil($get_jumlah['jumlah'] / $limit); // Hitung jumlah halamannya
				$jumlah_number = 3; // Tentukan jumlah link number sebelum dan sesudah hal yang aktif
				$start_number = ($hal > $jumlah_number)? $hal - $jumlah_number : 1; // Untuk awal link number
				$end_number = ($hal < ($jumlah_hal - $jumlah_number))? $hal + $jumlah_number : $jumlah_hal; // Untuk akhir link number
				
				for($i = $start_number; $i <= $end_number; $i++){
					$link_active = ($hal == $i)? ' class="active"' : '';
				?>
					<li class="page-item" <?php echo $link_active; ?>><a  class="page-link" href="?page=mata_pelajaran&aksi=aktif&hal=<?php echo $i; ?>"><?php echo $i; ?></a></li>
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
					<li class="page-item"><a class="page-link" href="?page=mata_pelajaran&aksi=aktif&hal=<?php echo $link_next; ?>">&raquo;</a></li>
					<li class="page-item"><a class="page-link" href="?page=mata_pelajaran&aksi=aktif&hal=<?php echo $jumlah_hal; ?>">Last</a></li>
				<?php
				}
				?>
			</ul>
	</div>
</div>
</body>
</html>