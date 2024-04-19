<?php
	$hal = (isset($_GET['hal']))? $_GET['hal'] : 1;
					
	$limit = 5; // Jumlah data per halamannya
					
	// Untuk menentukan dari data ke berapa yang akan ditampilkan pada tabel yang ada di database
	$limit_start = ($hal - 1) * $limit;

	$nip = $_SESSION['id_user'];
	$id = $_GET['id'];
	$mapel = $_GET['mapel'];

	$query = "SELECT * FROM tbl_tugas_mata_pelajaran INNER JOIN tbl_kumpul_tugas ON tbl_kumpul_tugas.id_tugas_mata_pelajaran = tbl_tugas_mata_pelajaran.id_tugas_mata_pelajaran WHERE tbl_kumpul_tugas.nis = '$nip' AND tbl_kumpul_tugas.id_tugas_mata_pelajaran = '$id' ORDER BY tbl_kumpul_tugas.tgl_kirim ASC LIMIT ".$limit_start.",".$limit;
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
			<strong>Data Tugas Mata Pelajaran - <?php echo $data_mapel['nama_mata_pelajaran']."(".$data_mapel['kelas'].")"; ?></strong>
		</h3>
			</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12" >
							<div class="table-responsive">
								<table class="table table-striped">
						<thead>
							<tr>
								<th>Id Tugas Mata Pelajaran</th>
								<th>NIS</th>
								<th>File Tugas</th>
								<th>Tanggal Kirim</th>
							</tr>
						</thead>
						<?php
							while($data = $sql->fetch()){
								?>
								<tbody>
									<tr>
										<td><?php echo $data['id_tugas_mata_pelajaran'];?></td>
										<td><?php echo $data['nis'];?></td>
										<td><a href="../Assets/img/dokumen/<?php echo $data['file'];?>" target="_blank"><?php echo $data['file'];?></a></td>
										<td><?php echo $data['tgl_kirim'];?></td>
										
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
					<li class="page-item"><a class="page-link" href="?page=tugas_mata_pelajaran&aksi=rekapdata_tugas_mata_pelajaran&id=<?php echo $id;?>&mapel=<?php echo $mapel;?>&hal=1">First</a></li>
					<li class="page-item"><a class="page-link" href="?page=tugas_mata_pelajaran&aksi=rekapdata_tugas_mata_pelajaran&id=<?php echo $id;?>&mapel=<?php echo $mapel;?>&hal=<?php echo $link_prev; ?>">&laquo;</a></li>
				<?php
				}
				?>
				
				<!-- LINK NUMBER -->
				<?php
				// Buat query untuk menghitung semua jumlah data
				$sql2 = $pdo->prepare("SELECT COUNT(*) AS jumlah FROM tbl_tugas_mata_pelajaran INNER JOIN tbl_kumpul_tugas ON tbl_kumpul_tugas.id_tugas_mata_pelajaran = tbl_tugas_mata_pelajaran.id_tugas_mata_pelajaran WHERE tbl_kumpul_tugas.nis = '$nip' AND tbl_kumpul_tugas.id_tugas_mata_pelajaran = '$id' ORDER BY tbl_kumpul_tugas.tgl_kirim ASC");
				$sql2->execute(); // Eksekusi querynya
				$get_jumlah = $sql2->fetch();
				
				$jumlah_hal = ceil($get_jumlah['jumlah'] / $limit); // Hitung jumlah halamannya
				$jumlah_number = 3; // Tentukan jumlah link number sebelum dan sesudah hal yang aktif
				$start_number = ($hal > $jumlah_number)? $hal - $jumlah_number : 1; // Untuk awal link number
				$end_number = ($hal < ($jumlah_hal - $jumlah_number))? $hal + $jumlah_number : $jumlah_hal; // Untuk akhir link number
				
				for($i = $start_number; $i <= $end_number; $i++){
					$link_active = ($hal == $i)? ' class="active"' : '';
				?>
					<li class="page-item" <?php echo $link_active; ?>><a  class="page-link" href="?page=tugas_mata_pelajaran&aksi=rekapdata_tugas_mata_pelajaran&id=<?php echo $id;?>&mapel=<?php echo $mapel;?>&hal=<?php echo $i; ?>"><?php echo $i; ?></a></li>
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
					<li class="page-item"><a class="page-link" href="?page=tugas_mata_pelajaran&aksi=rekapdata_tugas_mata_pelajaran&id=<?php echo $id;?>&mapel=<?php echo $mapel;?>&hal=<?php echo $link_next; ?>">&raquo;</a></li>
					<li class="page-item"><a class="page-link" href="?page=tugas_mata_pelajaran&aksi=rekapdata_tugas_mata_pelajaran&id=<?php echo $id;?>&mapel=<?php echo $mapel;?>&hal=<?php echo $jumlah_hal; ?>">Last</a></li>
				<?php
				}
				?>
			</ul>
	</div>
</div>
</body>
</html>