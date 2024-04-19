<?php
	date_default_timezone_set('Asia/Jakarta');
	$tgl_skrang = date('Y-m-d H:i:s');

	$hal = (isset($_GET['hal']))? $_GET['hal'] : 1;
					
	$limit = 6; // Jumlah data per halamannya
					
	// Untuk menentukan dari data ke berapa yang akan ditampilkan pada tabel yang ada di database
	$limit_start = ($hal - 1) * $limit;

	$nip = $_SESSION['id_user'];
	$id = $_GET['id'];

	$query = "SELECT * FROM tbl_tugas_mata_pelajaran INNER JOIN tbl_guru_mapel ON tbl_tugas_mata_pelajaran.id_mata_pelajaran = tbl_guru_mapel.id_mata_pelajaran WHERE tbl_guru_mapel.nip = '$nip' AND tbl_guru_mapel.id_mata_pelajaran = '$id' ORDER BY tbl_tugas_mata_pelajaran.id_tugas_mata_pelajaran DESC LIMIT ".$limit_start.",".$limit;
	$sql = $pdo->prepare($query);
	$sql->execute();

	$query_mapel = "SELECT * FROM tbl_mata_pelajaran WHERE id_mata_pelajaran = '$id'";
	$sql_mapel = $pdo->prepare($query_mapel);
	$sql_mapel->execute();
	$data_mapel = $sql_mapel->fetch();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Mata Pelajaran</title>
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
			<strong>Data Tugas Mata Pelajaran - <?php echo $data_mapel['nama_mata_pelajaran']."(".$data_mapel['kelas'].")"; ?></strong>
			<a class="btn btn-success" href="?page=mata_pelajaran&aksi=tambahdataguru_mata_pelajaran&id=<?php echo $id;?>">Tambah Guru</a>
			<a class="btn btn-primary" href="?page=tugas_mata_pelajaran&aksi=tambahdata_tugas_mata_pelajaran&id=<?php echo $id;?>">Tambah Tugas</a>
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
					              			echo $data['nama_tugas_mata_pelajaran'];
					              		?>
					              	</h4>
					              <p>
					              	<?php echo $data['tgl_tugas'];?> - <?php echo $data['batas_pengumpulan'];?>
								  </p>
								  </div>
					            <div class="icon">
					              <i class="fa fa-book"></i>
					            </div>
					            <p class="small-box-footer bg-dark">
					                <a href="?page=tugas_mata_pelajaran&aksi=detail_tugas&id=<?php echo $data['id_mata_pelajaran']; ?>&idtugas=<?php echo $data['id_tugas_mata_pelajaran']; ?>" class="btn__"><i class='bx bx-info-square'></i></a>
					            </p>     
					            </div>
					     </div>
					   <?php } ?>
						
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
					<li class="page-item"><a class="page-link" href="?page=tugas_mata_pelajaran&aksi=aktif&hal=1&id=<?php echo $id; ?>">First</a></li>
					<li class="page-item"><a class="page-link" href="?page=tugas_mata_pelajaran&aksi=aktif&hal=<?php echo $link_prev; ?>&id=<?php echo $id; ?>">&laquo;</a></li>
				<?php
				}
				?>
				
				<!-- LINK NUMBER -->
				<?php
				// Buat query untuk menghitung semua jumlah data
				$sql2 = $pdo->prepare("SELECT COUNT(*) AS jumlah FROM tbl_tugas_mata_pelajaran INNER JOIN tbl_guru_mapel ON tbl_tugas_mata_pelajaran.id_mata_pelajaran = tbl_guru_mapel.id_mata_pelajaran WHERE tbl_guru_mapel.nip = '$nip' AND tbl_guru_mapel.id_mata_pelajaran = '$id' ORDER BY tbl_tugas_mata_pelajaran.id_tugas_mata_pelajaran DESC");
				$sql2->execute(); // Eksekusi querynya
				$get_jumlah = $sql2->fetch();
				
				$jumlah_hal = ceil($get_jumlah['jumlah'] / $limit); // Hitung jumlah halamannya
				$jumlah_number = 3; // Tentukan jumlah link number sebelum dan sesudah hal yang aktif
				$start_number = ($hal > $jumlah_number)? $hal - $jumlah_number : 1; // Untuk awal link number
				$end_number = ($hal < ($jumlah_hal - $jumlah_number))? $hal + $jumlah_number : $jumlah_hal; // Untuk akhir link number
				
				for($i = $start_number; $i <= $end_number; $i++){
					$link_active = ($hal == $i)? ' class="active"' : '';
				?>
					<li class="page-item" <?php echo $link_active; ?>><a  class="page-link" href="?page=tugas_mata_pelajaran&aksi=aktif&hal=<?php echo $i; ?>&id=<?php echo $id; ?>"><?php echo $i; ?></a></li>
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
					<li class="page-item"><a class="page-link" href="?page=tugas_mata_pelajaran&aksi=aktif&hal=<?php echo $link_next; ?>&id=<?php echo $id; ?>">&raquo;</a></li>
					<li class="page-item"><a class="page-link" href="?page=tugas_mata_pelajaran&aksi=aktif&hal=<?php echo $jumlah_hal; ?>&id=<?php echo $id; ?>">Last</a></li>
				<?php
				}
				?>
			</ul>
</div>
</body>
</html>