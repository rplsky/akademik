<?php
	$hal = (isset($_GET['hal']))? $_GET['hal'] : 1;
					
	$limit = 5; // Jumlah data per halamannya
					
	// Untuk menentukan dari data ke berapa yang akan ditampilkan pada tabel yang ada di database
	$limit_start = ($hal - 1) * $limit;

	$nip = $_SESSION['id_user'];
	$id = $_GET['id'];
	$mapel = $_GET['mapel'];
	$status = "Hadir";

	$query = "SELECT * FROM tbl_siswa INNER JOIN tbl_absensi_mata_pelajaran ON tbl_absensi_mata_pelajaran.nis = tbl_siswa.nis WHERE tbl_absensi_mata_pelajaran.id_materi_mata_pelajaran = '$id' AND tbl_absensi_mata_pelajaran.status = '$status' ORDER BY tbl_absensi_mata_pelajaran.tgl_awal_absensi ASC, tbl_absensi_mata_pelajaran.status ASC LIMIT ".$limit_start.",".$limit;
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
	<title>Rekap Absensi</title>
</head>
<body>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3>
			<strong>Data Rekap Absensi Mata Pelajaran - <?php echo $data_mapel['nama_mata_pelajaran']."(".$data_mapel['kelas'].")"; ?></strong>
			<a class="btn btn-primary" href="?page=materi_mata_pelajaran&aksi=rekapdata_absensi_mata_pelajaran&id=<?php echo $id;?>&mapel=<?php echo $mapel;?>">Kembali</a>
		</h3>
			</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12" >
							<div class="table-responsive">
								<table class="table table-striped">
						<thead>
							<tr>
								<th>Id AMP</th>
								<th>NIS</th>
								<th>Nama Siswa</th>
								<th>Tanggal Absensi</th>
								<th>Status</th>
								<th colspan="3">Aksi</th>
							</tr>
						</thead>
						<?php
							while($data = $sql->fetch()){
								?>
								<tbody>
									<tr>
										<td><?php echo $data['id_absensi'];?></td>
										<td><?php echo $data['nis'];?></td>
										<td><?php echo $data['nama_siswa'];?></td>
										<td><?php echo $data['tgl_awal_absensi'];?></td>
										<td><?php echo $data['status'];?></td>
										<td><a class="btn btn-success" href="?page=materi_mata_pelajaran&aksi=update_absensi_mata_pelajaran&id=<?php echo $id;?>&mapel=<?php echo $data['id_mata_pelajaran'];?>&ibm=<?php echo $data['id_absensi'];?>&status=Hadir">Hadir</a></td>
										<td><a class="btn btn-danger" href="?page=materi_mata_pelajaran&aksi=update_absensi_mata_pelajaran&id=<?php echo $id;?>&mapel=<?php echo $data['id_mata_pelajaran'];?>&ibm=<?php echo $data['id_absensi'];?>&status=Tidak Hadir">Tidak Hadir</a></td>
										
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
					<li class="page-item"><a class="page-link" href="?page=materi_mata_pelajaran&aksi=hadir_absensi_mata_pelajaran&id=<?php echo $id;?>&mapel=<?php echo $mapel;?>&hal=1">First</a></li>
					<li class="page-item"><a class="page-link" href="?page=materi_mata_pelajaran&aksi=hadir_absensi_mata_pelajaran&id=<?php echo $id;?>&mapel=<?php echo $mapel;?>&hal=<?php echo $link_prev; ?>">&laquo;</a></li>
				<?php
				}
				?>
				
				<!-- LINK NUMBER -->
				<?php
				// Buat query untuk menghitung semua jumlah data
				$sql2 = $pdo->prepare("SELECT COUNT(*) AS jumlah FROM tbl_siswa INNER JOIN tbl_absensi_mata_pelajaran ON tbl_absensi_mata_pelajaran.nis = tbl_siswa.nis WHERE tbl_absensi_mata_pelajaran.id_materi_mata_pelajaran = '$id' AND tbl_absensi_mata_pelajaran.status = '$status' ORDER BY tbl_absensi_mata_pelajaran.tgl_awal_absensi ASC, tbl_absensi_mata_pelajaran.status ASC");
				$sql2->execute(); // Eksekusi querynya
				$get_jumlah = $sql2->fetch();
				
				$jumlah_hal = ceil($get_jumlah['jumlah'] / $limit); // Hitung jumlah halamannya
				$jumlah_number = 3; // Tentukan jumlah link number sebelum dan sesudah hal yang aktif
				$start_number = ($hal > $jumlah_number)? $hal - $jumlah_number : 1; // Untuk awal link number
				$end_number = ($hal < ($jumlah_hal - $jumlah_number))? $hal + $jumlah_number : $jumlah_hal; // Untuk akhir link number
				
				for($i = $start_number; $i <= $end_number; $i++){
					$link_active = ($hal == $i)? ' class="active"' : '';
				?>
					<li class="page-item" <?php echo $link_active; ?>><a  class="page-link" href="?page=materi_mata_pelajaran&aksi=hadir_absensi_mata_pelajaran&id=<?php echo $id;?>&mapel=<?php echo $mapel;?>&hal=<?php echo $i; ?>"><?php echo $i; ?></a></li>
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
					<li class="page-item"><a class="page-link" href="?page=materi_mata_pelajaran&aksi=hadir_absensi_mata_pelajaran&id=<?php echo $id;?>&mapel=<?php echo $mapel;?>&hal=<?php echo $link_next; ?>">&raquo;</a></li>
					<li class="page-item"><a class="page-link" href="?page=materi_mata_pelajaran&aksi=hadir_absensi_mata_pelajaran&id=<?php echo $id;?>&mapel=<?php echo $mapel;?>&hal=<?php echo $jumlah_hal; ?>">Last</a></li>
				<?php
				}
				?>
			</ul>
	</div>
</div>
</body>
</html>