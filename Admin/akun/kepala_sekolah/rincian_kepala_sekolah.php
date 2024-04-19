<?php
	$hal = (isset($_GET['hal']))? $_GET['hal'] : 1;
					
	$limit = 5; // Jumlah data per halamannya
					
	// Untuk menentukan dari data ke berapa yang akan ditampilkan pada tabel yang ada di database
	$limit_start = ($hal - 1) * $limit;

	$id = $_GET['id'];
	$query = "SELECT * FROM tbl_kepala_sekolah WHERE nip = '$id'";
	$sql = $pdo->prepare($query);
	$sql->execute();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Data Kepala Sekolah</title>
</head>
<body>
<div class="panel panel-default">
	<div class="panel-heading">
				<h3>
					<strong>Data Kepala Sekolah</strong>
				</h3>
			</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12" >
							<div class="table-responsive">
								<table class="table table-striped">
						<thead>
							<tr>
								<th>NIP</th>
								<th>Nama Kepala Sekolah</th>
								<th>Jenis Kelamin</th>
								<th>Tempat Lahir</th>
								<th>Tanggal Lahir</th>
								<th>Alamat</th>
								<th>No Telp</th>
								<th colspan="2">Aksi</th>
							</tr>
						</thead>
						<?php
							while($data = $sql->fetch()){
								?>
								<tbody>
									<tr>
										<td><?php echo $data['nip'];?></td>
										<td><?php echo $data['nama_kepala_sekolah'];?></td>
										<td><?php echo $data['jenis_kelamin'];?></td>
										<td><?php echo $data['tempat_lahir'];?></td>
										<td><?php echo $data['tanggal_lahir'];?></td>
										<td><?php echo $data['alamat'];?></td>
										<td><?php echo $data['no_telp'];?></td>
										<td><a class="btn btn-warning" href="?page=akun_kepala_sekolah&aksi=editdata_kepala_sekolah&id=<?php echo $data['nip'];?>">Edit</a></td>
										<td><a onclick="return confirm('Anda akan menghapus data ini?')" class="btn btn-danger" href="?page=akun_kepala_sekolah&aksi=hapusdata_kepala_sekolah&id=<?php echo $data['nip'];?>">Delete</a></td>
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
					<li class="page-item"><a class="page-link" href="?page=akun_kepala_sekolah&aksi=detail_kepala_sekolah&hal=1&id=<?php echo $id;?>">First</a></li>
					<li class="page-item"><a class="page-link" href="?page=akun_kepala_sekolah&aksi=detail_kepala_sekolah&hal=<?php echo $link_prev; ?>&id=<?php echo $id;?>">&laquo;</a></li>
				<?php
				}
				?>
				
				<!-- LINK NUMBER -->
				<?php
				// Buat query untuk menghitung semua jumlah data
				$sql2 = $pdo->prepare("SELECT COUNT(*) AS jumlah FROM tbl_kepala_sekolah WHERE nip = '$id'");
				$sql2->execute(); // Eksekusi querynya
				$get_jumlah = $sql2->fetch();
				
				$jumlah_hal = ceil($get_jumlah['jumlah'] / $limit); // Hitung jumlah halamannya
				$jumlah_number = 3; // Tentukan jumlah link number sebelum dan sesudah hal yang aktif
				$start_number = ($hal > $jumlah_number)? $hal - $jumlah_number : 1; // Untuk awal link number
				$end_number = ($hal < ($jumlah_hal - $jumlah_number))? $hal + $jumlah_number : $jumlah_hal; // Untuk akhir link number
				
				for($i = $start_number; $i <= $end_number; $i++){
					$link_active = ($hal == $i)? ' class="active"' : '';
				?>
					<li class="page-item" <?php echo $link_active; ?>><a  class="page-link" href="?page=akun_kepala_sekolah&aksi=detail_kepala_sekolah&hal=<?php echo $i; ?>&id=<?php echo $id;?>"><?php echo $i; ?></a></li>
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
					<li class="page-item"><a class="page-link" href="?page=akun_kepala_sekolah&aksi=detail_kepala_sekolah&hal=<?php echo $link_next; ?>&id=<?php echo $id;?>">&raquo;</a></li>
					<li class="page-item"><a class="page-link" href="?page=akun_kepala_sekolah&aksi=detail_kepala_sekolah&hal=<?php echo $jumlah_hal; ?>&id=<?php echo $id;?>">Last</a></li>
				<?php
				}
				?>
			</ul>
	</div>
</div>
</body>
</html>