<?php
	$hal = (isset($_GET['hal']))? $_GET['hal'] : 1;
					
	$limit = 5; // Jumlah data per halamannya
					
	// Untuk menentukan dari data ke berapa yang akan ditampibsan pada tabel yang ada di database
	$limit_start = ($hal - 1) * $limit;

	$nip = $_SESSION['id_user'];
	$id = $_GET['id'];
	$mapel = $_GET['mapel'];

	$query = "SELECT * FROM tbl_bank_soal WHERE id_lembar_ujian = '$id' ORDER BY id_soal ASC LIMIT ".$limit_start.",".$limit;
	$sql = $pdo->prepare($query);
	$sql->execute();

	$query_mapel = "SELECT * FROM tbl_mata_pelajaran WHERE id_mata_pelajaran = '$mapel'";
	$sql_mapel = $pdo->prepare($query_mapel);
	$sql_mapel->execute();
	$data_mapel = $sql_mapel->fetch();

/*	$query_lk = "SELECT * FROM tbl_lembar_ujian WHERE id_lembar_ujian = '$id'";
	$sql_lk = $pdo->prepare($query_lk);
	$sql_lk->execute();
	$data_lk = $sql_lk->fetch(); */
?>
<!DOCTYPE html>
<html>
<head>
	<title>Soal Ujian Mapel</title>
</head>
<body>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3>
			<strong>Data Soal Ujian Mata Pelajaran - <?php echo $data_mapel['nama_mata_pelajaran']."(".$data_mapel['kelas'].")"; ?></strong>
			<a class="btn btn-primary" href="?page=ujian&aksi=tambahdata_bs_mata_pelajaran&id=<?php echo $id;?>&mapel=<?php echo $mapel?>">Tambah Soal Ujian</a>
			<a class="btn btn-success" href="?page=ujian&aksi=import_bs_mata_pelajaran&id=<?php echo $id;?>&mapel=<?php echo $mapel?>">Import Data</a>
		</h3>
		</div>
				<div class="panel-body">
					<?php
						$no = 1;
						while($data = $sql->fetch()){
					?>
					<div class="box box-default">
			          <div class="box-header with-border">
			            <h6 class="box-title">
				            	<p> <?php echo $no;?>. (Poin : <?php echo $data['poin_soal'];?>)</p>
			        	</h6>
			          </div>
			          <div class="box-body">
			          	<p>
							<a class="btn btn-warning" href="?page=ujian&aksi=editdata_bs_mata_pelajaran&id=<?php echo $data['id_soal'];?>&lk=<?php echo $data['id_lembar_ujian'];?>&mapel=<?php echo $data_mapel['id_mata_pelajaran'];?>">Edit</a>
							<a onclick="return confirm('Anda akan menghapus data ini?')" class="btn btn-danger" href="?page=ujian&aksi=hapusdata_bs_mata_pelajaran&id=<?php echo $data['id_soal'];?>&lk=<?php echo $data['id_lembar_ujian'];?>&mapel=<?php echo $data_mapel['id_mata_pelajaran'];?>">Delete</a>
			            </p>
			            <?php echo $data['pertanyaan'];?>
			            <p>
			            <?php 
			            	if ($data['jawaban']==$data['pilihan_a']) {
			            		echo "<font color='red'>".$data['pilihan_a']."</font>";
			            	} else {
			            		echo $data['pilihan_a'];
			            	}
			            ?>
			            </p>
			            <p>
			            <?php 
			            	if ($data['jawaban']==$data['pilihan_b']) {
			            		echo "<font color='red'>".$data['pilihan_b']."</font>";
			            	} else {
			            		echo $data['pilihan_b'];
			            	}
			            ?>
			            </p>
			            <p>
			            <?php 
			            	if ($data['jawaban']==$data['pilihan_c']) {
			            		echo "<font color='red'>".$data['pilihan_c']."</font>";
			            	} else {
			            		echo $data['pilihan_c'];
			            	}
			            ?>
			            </p>
			            <p>
			            <?php 
			            	if ($data['jawaban']==$data['pilihan_d']) {
			            		echo "<font color='red'>".$data['pilihan_d']."</font>";
			            	} else {
			            		echo $data['pilihan_d'];
			            	}
			            ?>
			            </p>
			            <p>
			            <?php 
			            	if ($data['jawaban']==$data['pilihan_e']) {
			            		echo "<font color='red'>".$data['pilihan_e']."</font>";
			            	} else {
			            		echo $data['pilihan_e'];
			            	}
			            ?>
			            </p>
			          </div>
			          <!-- /.box-body -->
			        </div>
					
					<?php
						$no++;
						}
					?>	
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
					<li class="page-item"><a class="page-link" href="?page=ujian&aksi=bs&hal=1&id=<?php echo $id;?>&mapel=<?php echo $mapel;?>">First</a></li>
					<li class="page-item"><a class="page-link" href="?page=ujian&aksi=bs&hal=<?php echo $link_prev; ?>&id=<?php echo $id;?>&mapel=<?php echo $mapel;?>">&laquo;</a></li>
				<?php
				}
				?>
				
				<!-- LINK NUMBER -->
				<?php
				// Buat query untuk menghitung semua jumlah data
				$sql2 = $pdo->prepare("SELECT COUNT(*) AS jumlah FROM tbl_bank_soal WHERE id_lembar_ujian = '$id' ORDER BY id_soal ASC");
				$sql2->execute(); // Eksekusi querynya
				$get_jumlah = $sql2->fetch();
				
				$jumlah_hal = ceil($get_jumlah['jumlah'] / $limit); // Hitung jumlah halamannya
				$jumlah_number = 3; // Tentukan jumlah link number sebelum dan sesudah hal yang aktif
				$start_number = ($hal > $jumlah_number)? $hal - $jumlah_number : 1; // Untuk awal link number
				$end_number = ($hal < ($jumlah_hal - $jumlah_number))? $hal + $jumlah_number : $jumlah_hal; // Untuk akhir link number
				
				for($i = $start_number; $i <= $end_number; $i++){
					$link_active = ($hal == $i)? ' class="active"' : '';
				?>
					<li class="page-item" <?php echo $link_active; ?>><a  class="page-link" href="?page=ujian&aksi=bs&hal=<?php echo $i; ?>&id=<?php echo $id;?>&mapel=<?php echo $mapel;?>"><?php echo $i; ?></a></li>
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
					<li class="page-item"><a class="page-link" href="?page=ujian&aksi=bs&hal=<?php echo $link_next; ?>&id=<?php echo $id;?>&mapel=<?php echo $mapel;?>">&raquo;</a></li>
					<li class="page-item"><a class="page-link" href="?page=ujian&aksi=bs&hal=<?php echo $jumlah_hal; ?>&id=<?php echo $id;?>&mapel=<?php echo $mapel;?>">Last</a></li>
				<?php
				}
				?>
			</ul>
	</div>
</body>
</html>