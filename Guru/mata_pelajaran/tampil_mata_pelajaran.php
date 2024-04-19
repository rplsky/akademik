<?php
	$hal = (isset($_GET['hal']))? $_GET['hal'] : 1;
					
	$limit = 5; // Jumlah data per halamannya
					
	// Untuk menentukan dari data ke berapa yang akan ditampilkan pada tabel yang ada di database
	$limit_start = ($hal - 1) * $limit;
	
	$nip = $_SESSION['id_user'];

	$query = "SELECT * FROM tbl_guru_mapel WHERE nip = $nip";
	$sql = $pdo->prepare($query);
	$sql->execute();
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
			<strong>Data Mata Pelajaran</strong>
			<a class="btn btn-primary" href="?page=mata_pelajaran&aksi=tambahdata_mata_pelajaran"><i class='bx bx-plus-circle'></i> &nbsp Tambah Data</a>
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
					              			$id_mata_pelajaran = $data['id_mata_pelajaran'];
											$query_mapel = "SELECT * FROM tbl_mata_pelajaran WHERE id_mata_pelajaran = '$id_mata_pelajaran'";
											$sql_mapel = $pdo->prepare($query_mapel);
											$sql_mapel->execute();
											$data_mapel = $sql_mapel->fetch();
											echo $data_mapel['nama_mata_pelajaran'];
					              			echo " - ";
					              			echo $data_mapel['kelas'];
					              		?>
					              	</h4>
					              <p>
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
								  </p>
								  </div>
					            <div class="icon">
					              <i class="fa fa-book"></i>
					            </div>
					            <p class="small-box-footer bg-dark">
					                <a href="?page=materi_mata_pelajaran&aksi=tampil_materi_mapel&id=<?php echo $data['id_mata_pelajaran']; ?>" class="btn__"><i class='bx bxs-book'></i></a>
					                <a href="?page=tugas_mata_pelajaran&aksi=aktif&id=<?php echo $data['id_mata_pelajaran']; ?>" class="btn__"><i class='bx bx-spreadsheet'></i></i></a>
					                <a href="?page=mata_pelajaran&aksi=editdata_mata_pelajaran&id=<?php echo $data['id_mata_pelajaran']; ?>" class="btn__"><i class='bx bx-edit'></i></a>
					                <a onclick="return confirm('Apakah anda yakin akan hapus mata pelajaran ini?')" href="?page=mata_pelajaran&aksi=hapusdata_mata_pelajaran&id=<?php echo $data['id_mata_pelajaran']; ?>" class="btn__"><i class='bx bx-trash' style='color:#ffffff' ></i></a>
					            </p>     
					            </div>
					     </div>
					   <?php } ?>
						
		</div>
	</div>
</div>
</body>
</html>