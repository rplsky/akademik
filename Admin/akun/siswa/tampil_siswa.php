<?php
	$hal = (isset($_GET['hal']))? $_GET['hal'] : 1;
					
	$limit = 5; // Jumlah data per halamannya
					
	// Untuk menentukan dari data ke berapa yang akan ditampilkan pada tabel yang ada di database
	$limit_start = ($hal - 1) * $limit;

	$query = "SELECT * FROM tbl_akun INNER JOIN tbl_siswa ON tbl_akun.nip = tbl_siswa.nis WHERE tbl_akun.hak_akses = 'Siswa' ORDER BY tbl_siswa.kelas ASC, tbl_siswa.nis ASC LIMIT ".$limit_start.",".$limit;
	$sql = $pdo->prepare($query);
	$sql->execute();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Data Siswa</title>
</head>
<body>
<div class="panel panel-default">
	<div class="panel-heading">
				<h3>
					<strong>Data Siswa</strong>
					<a class="btn btn-primary" href="?page=akun_siswa&aksi=tambahdata_siswa">Tambah Data</a>
					<a class="btn btn-success" href="?page=akun_siswa&aksi=import_siswa">Import Data</a>
					<a class="btn btn-info" href="akun/siswa/export_siswa.php">Export Data</a>
					<a class="btn btn-danger" href="?page=akun_siswa&aksi=hapussemua_akun" onclick="return confirm('Anda akan menghapus semua data ini?')">Hapus Semua Data</a>
					<div class="pull-right">
						<form action="?page=akun_siswa&aksi=cari_siswa" method="POST">
							<div class="input-group input-group-sm">
							<input type="search" name="nama_siswa" required placeholder="Nama Siswa" style="height:30px; width:200px; box-sizing: border-box; border-radius: 4px;">
							<span class="input-group-append">
								<button type="button" name="cari" class="btn btn-info btn-flat">Cari</button>
							</span>
							</div>
						</form>
					</div>
				</h3>
			</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12" >
							<div class="table-responsive">
							<table id="cari" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Email</th>
								<th>Nama Siswa</th>
								<th>Hak Akses</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<?php
							while($data = $sql->fetch()){
								?>
								<tbody>
									<tr>
										<td><?php echo $data['email'];?></td>
										<td><?php echo $data['nama_siswa'];?></td>
										<td><?php echo $data['hak_akses'];?></td>
										<td><a class="btn btn-warning" href="?page=akun_siswa&aksi=detail_siswa&id=<?php echo $data['nip'];?>">Detail</a> | <a onclick="return confirm('Anda akan mengganti password akun ini?')" class="btn btn-danger" href="?page=akun_siswa&aksi=editpassword_siswa&id=<?php echo $data['email'];?>">Ganti Sandi</a></td>
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
					<li class="page-item"><a class="page-link" href="?page=akun_siswa&aksi=aktif&hal=1">First</a></li>
					<li class="page-item"><a class="page-link" href="?page=akun_siswa&aksi=aktif&hal=<?php echo $link_prev; ?>">&laquo;</a></li>
				<?php
				}
				?>
				
				<!-- LINK NUMBER -->
				<?php
				// Buat query untuk menghitung semua jumlah data
				$sql2 = $pdo->prepare("SELECT COUNT(*) AS jumlah FROM tbl_akun INNER JOIN tbl_siswa ON tbl_akun.nip = tbl_siswa.nis WHERE tbl_akun.hak_akses = 'Siswa' ORDER BY tbl_siswa.nis ASC, tbl_siswa.kelas ASC");
				$sql2->execute(); // Eksekusi querynya
				$get_jumlah = $sql2->fetch();
				
				$jumlah_hal = ceil($get_jumlah['jumlah'] / $limit); // Hitung jumlah halamannya
				$jumlah_number = 3; // Tentukan jumlah link number sebelum dan sesudah hal yang aktif
				$start_number = ($hal > $jumlah_number)? $hal - $jumlah_number : 1; // Untuk awal link number
				$end_number = ($hal < ($jumlah_hal - $jumlah_number))? $hal + $jumlah_number : $jumlah_hal; // Untuk akhir link number
				
				for($i = $start_number; $i <= $end_number; $i++){
					$link_active = ($hal == $i)? ' class="active"' : '';
				?>
					<li class="page-item" <?php echo $link_active; ?>><a  class="page-link" href="?page=akun_siswa&aksi=aktif&hal=<?php echo $i; ?>"><?php echo $i; ?></a></li>
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
					<li class="page-item"><a class="page-link" href="?page=akun_siswa&aksi=aktif&hal=<?php echo $link_next; ?>">&raquo;</a></li>
					<li class="page-item"><a class="page-link" href="?page=akun_siswa&aksi=aktif&hal=<?php echo $jumlah_hal; ?>">Last</a></li>
				<?php
				}
				?>
			</ul>
	</div>
</div>
</body>
</html>