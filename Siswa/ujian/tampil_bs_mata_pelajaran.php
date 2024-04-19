<?php
	$hal = (isset($_GET['hal']))? $_GET['hal'] : 1;
					
	$limit = 5; // Jumlah data per halamannya
					
	// Untuk menentukan dari data ke berapa yang akan ditampibsan pada tabel yang ada di database
	$limit_start = ($hal - 1) * $limit;

	$nip = $_SESSION['id_user'];
	$id = $_GET['id'];
	$mapel = $_GET['mapel'];
	$no = $_GET['no'];
	$i = $no - 1;
	$soal = $_SESSION['soal'][$i];

	$query = "SELECT * FROM tbl_bank_soal WHERE id_soal = '$soal'";
	$sql = $pdo->prepare($query);
	$sql->execute();

    $query_lk = "SELECT * FROM tbl_lembar_ujian WHERE id_lembar_ujian = '$id'";
	$sql_lk = $pdo->prepare($query_lk);
	$sql_lk->execute();
	$data_lk = $sql_lk->fetch();
	
	$jml_soal = $data_lk['jml_soal'];

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
	<script>
	jQuery(document).ready(function($){
							
		$('.waktu_ujian').dsCountDown({
			endDate: new Date("<?php echo $_SESSION['waktu_ujian']; ?>"),
			theme: 'black'
		});				
				
	});
</script>
</head>
<body>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3>
			<strong>Data Soal Ujian Mata Pelajaran - <?php echo $data_mapel['nama_mata_pelajaran']."(".$data_mapel['kelas'].")"; ?></strong>
		</h3>
		</div>
				<div class="panel-body">
					<center><div class="waktu_ujian"></div></center>
					<?php
						while($data = $sql->fetch()){
					?>
					<div class="box box-default">
			          <div class="box-header with-border">
			            <h6 class="box-title">
				            	<p> <?php echo $no;?>. (Poin : <?php echo $data['poin_soal'];?>) <?php echo $soal;?></p>
			        	</h6>
			          </div>
			          <div class="box-body">
			          	<form action="?page=ujian&aksi=jawab_ujian_mata_pelajaran" method="POST">
    			            <input type="hidden" class="form-control" name="soal" value="<?php echo $soal;?>" required placeholder="Id Soal Mata Pelajaran" required />
    			            <input type="hidden" class="form-control" name="lk" value="<?php echo $id;?>" required placeholder="LK Soal Mata Pelajaran" required />
    			            <input type="hidden" class="form-control" name="mapel" value="<?php echo $mapel;?>" required placeholder="Id Mata Pelajaran" required />
    			            <input type="hidden" class="form-control" name="no" value="<?php echo $no;?>" required placeholder="Nomor Soal Mata Pelajaran" required />
    			            <?php echo $data['pertanyaan'];?>
    			            <p>
    			            <input class="form-check-input" type="radio" name="pilihan" id="exampleRadios1" value="<?php echo $data['pilihan_a']; ?>"> <?php echo $data['pilihan_a']; ?>
    			            </p>
    			            <p>
    			            <input class="form-check-input" type="radio" name="pilihan" id="exampleRadios1" value="<?php echo $data['pilihan_b']; ?>"> <?php echo $data['pilihan_b']; ?>
    			            </p>
    			            <p>
    			            <input class="form-check-input" type="radio" name="pilihan" id="exampleRadios1" value="<?php echo $data['pilihan_c']; ?>"> <?php echo $data['pilihan_c']; ?>
    			            </p>
    			            <p>
    			            <input class="form-check-input" type="radio" name="pilihan" id="exampleRadios1" value="<?php echo $data['pilihan_d']; ?>"> <?php echo $data['pilihan_d']; ?>
    			            </p>
    			            <p>
    			            <input class="form-check-input" type="radio" name="pilihan" id="exampleRadios1" value="<?php echo $data['pilihan_e']; ?>"> <?php echo $data['pilihan_e']; ?>
    			            </p>
    			            
    			            <?php
    			                if($no < $jml_soal){
    			            ?>
    			                    <input type="submit" name="simpan" value="Lanjutkan Ujian" class="btn btn-primary" style="margin-top:15px">
    			            <?php
    			                } else {
    			            ?>
    			                    <input type="submit" onclick="return confirm('Apakah anda yakin akan selesaikan ujian ini ?')" name="simpan" value="Selesaikan Ujian" class="btn btn-primary" style="margin-top:15px">
    			            <?php
    			                }
    			            ?> 
			          </div>
			          <!-- /.box-body -->
			        </div>
					
					<?php
						}
					?>
					</form>
			</div>
	</div>
</body>
</html>