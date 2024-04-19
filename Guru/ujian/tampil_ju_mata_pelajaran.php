<?php
	$hal = (isset($_GET['hal']))? $_GET['hal'] : 1;
					
	$limit = 5; // Jumlah data per halamannya
					
	// Untuk menentukan dari data ke berapa yang akan ditampilkan pada tabel yang ada di database
	$limit_start = ($hal - 1) * $limit;

	$id = $_GET['id'];
	$mapel = $_GET['mapel'];

	$query = "SELECT * FROM tbl_jadwal_ujian WHERE id_lembar_ujian = '$id' LIMIT ".$limit_start.",".$limit;
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
	<title>Jadwal Ujian Mapel</title>
</head>
<body>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3>
			<strong>Data Jadwal Ujian Mata Pelajaran - <?php echo $data_mapel['nama_mata_pelajaran']."(".$data_mapel['kelas'].")"; ?></strong>
			<a class="btn btn-primary" href="?page=ujian&aksi=tambahdata_ju_mata_pelajaran&id=<?php echo $id;?>&mapel=<?php echo $mapel;?>">Tambah Jadwal Ujian</a>
		</h3>
			</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12" >
							<div class="table-responsive">
								<table class="table table-striped">
						<thead>
							<tr>
								<th>Id Jadwal Mata Pelajaran</th>
								<th>Mata Pelajaran</th>
								<th>Tanggal Mulai</th>
								<th>Tanggal Akhir</th>
								<th>Waktu Pengerjaan</th>
								<th>Kelas</th>
								<th colspan="2">Aksi</th>
							</tr>
						</thead>
						<?php
							while($data = $sql->fetch()){
								?>
								<tbody>
									<tr>
										<td><?php echo $data['id_jadwal_ujian'];?></td>
										<td><?php echo $data_mapel['nama_mata_pelajaran'];?></td>
										<td><?php echo $data['tanggal_mulai'];?></td>
										<td><?php echo $data['tanggal_akhir'];?></td>
										<td><?php echo $data['waktu'];?> Menit</td>
										<td><?php echo $data['kelas'];?></td>
										<td><a class="btn btn-warning" href="?page=ujian&aksi=editdata_ju_mata_pelajaran&id=<?php echo $data['id_jadwal_ujian'];?>&lk=<?php echo $id;?>&mapel=<?php echo $mapel;?>">Edit</a></td>
										<td><a onclick="return confirm('Anda akan menghapus data ini?')" class="btn btn-danger" href="?page=ujian&aksi=hapusdata_ju_mata_pelajaran&id=<?php echo $data['id_jadwal_ujian'];?>&lk=<?php echo $id;?>&mapel=<?php echo $mapel;?>">Delete</a></td>
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
					<li class="page-item"><a class="page-link" href="?page=ujian&aksi=ju&hal=1&id=<?php echo $id;?>&mapel=<?php echo $mapel;?>">First</a></li>
					<li class="page-item"><a class="page-link" href="?page=ujian&aksi=ju&hal=<?php echo $link_prev; ?>&id=<?php echo $id;?>&mapel=<?php echo $mapel;?>">&laquo;</a></li>
				<?php
				}
				?>
				
				<!-- LINK NUMBER -->
				<?php
				// Buat query untuk menghitung semua jumlah data
				$sql2 = $pdo->prepare("SELECT COUNT(*) AS jumlah FROM tbl_jadwal_ujian WHERE id_lembar_ujian = '$id'");
				$sql2->execute(); // Eksekusi querynya
				$get_jumlah = $sql2->fetch();
				
				$jumlah_hal = ceil($get_jumlah['jumlah'] / $limit); // Hitung jumlah halamannya
				$jumlah_number = 3; // Tentukan jumlah link number sebelum dan sesudah hal yang aktif
				$start_number = ($hal > $jumlah_number)? $hal - $jumlah_number : 1; // Untuk awal link number
				$end_number = ($hal < ($jumlah_hal - $jumlah_number))? $hal + $jumlah_number : $jumlah_hal; // Untuk akhir link number
				
				for($i = $start_number; $i <= $end_number; $i++){
					$link_active = ($hal == $i)? ' class="active"' : '';
				?>
					<li class="page-item" <?php echo $link_active; ?>><a  class="page-link" href="?page=ujian&aksi=ju&hal=<?php echo $i; ?>&id=<?php echo $id;?>&mapel=<?php echo $mapel;?>"><?php echo $i; ?></a></li>
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
					<li class="page-item"><a class="page-link" href="?page=ujian&aksi=ju&hal=<?php echo $link_next; ?>&id=<?php echo $id;?>&mapel=<?php echo $mapel;?>">&raquo;</a></li>
					<li class="page-item"><a class="page-link" href="?page=ujian&aksi=ju&hal=<?php echo $jumlah_hal; ?>&id=<?php echo $id;?>&mapel=<?php echo $mapel;?>">Last</a></li>
				<?php
				}
				?>
			</ul>
	</div>
</div>
</body>
</html>