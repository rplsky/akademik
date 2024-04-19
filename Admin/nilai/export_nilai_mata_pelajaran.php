<?php
	/*$hal = (isset($_GET['hal']))? $_GET['hal'] : 1;
					
	$limit = 5; // Jumlah data per halamannya
					
	// Untuk menentukan dari data ke berapa yang akan ditampilkan pada tabel yang ada di database
	$limit_start = ($hal - 1) * $limit; */

	include '../../Config/koneksi.php';
	include '../../Config/akun.php';
	include '../../Config/function.php';
	
	$id = $_GET['id'];
	$mapel = $_GET['mapel'];

	$query = "SELECT * FROM tbl_siswa WHERE kelas = '$id'";
	$sql = $pdo->prepare($query);
	$sql->execute();

	$query_mapel = "SELECT * FROM tbl_mata_pelajaran WHERE id_mata_pelajaran = '$mapel'";
	$sql_mapel = $pdo->prepare($query_mapel);
	$sql_mapel->execute();
	$data_mapel = $sql_mapel->fetch();

	$query_tugas = "SELECT * FROM tbl_tugas_mata_pelajaran WHERE id_mata_pelajaran = '$mapel'";
	$sql_tugas = $pdo->prepare($query_tugas);
	$sql_tugas->execute();
	$jml_tugas = $sql_tugas->rowCount();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tugas Mapel</title>
</head>
<body>
	<style type="text/css">
		body{
			font-family: sans-serif;
		}
		table{
			margin: 20px auto;
			border-collapse: collapse;
		}
		table th,
		table td{
			border: 1px solid #3c3c3c;
			padding: 3px 8px;
	 
		}
		a{
			background: blue;
			color: #fff;
			padding: 8px 10px;
			text-decoration: none;
			border-radius: 2px;
		}
	</style>
 
	<?php
	$nama_file = "Data Nilai ".$data_mapel['nama_mata_pelajaran']." - ".$id;
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=$nama_file.xls");
	?>
	<center>
		<h1>Data Nilai Mata Pelajaran <?php echo $data_mapel['nama_mata_pelajaran'];?> <br/> Kelas : <?php echo $id; ?></h1>
	</center>
			
	<table border="1">
		<tr>
			<th rowspan="2">No</th>
			<th rowspan="2">NIS</th>
			<th rowspan="2">Nama Siswa</th>
			<th rowspan="2">Jenis Kelamin</th>
			<th colspan="<?php echo $jml_tugas;?>">Tugas</th>
			<th rowspan="2">Nilai Akhir</th>
			<th rowspan="2">Grade</th>
		</tr>

		<tr>
			<?php
				if ($jml_tugas == 0) {
					echo "<th></th>";
				} else {
					for ($i=1; $i <= $jml_tugas; $i++) { 
						echo "<th>".$i."</th>";
					}
				}
			?>
		</tr>
		
		<?php
			$no = 1;
			while($data = $sql->fetch()){
		?>
			<tr>
				<td><?php echo $no++;?></td>
				<td><?php echo $data['nis'];?></td>
				<td><?php echo $data['nama_siswa'];?></td>
				<td><?php echo $data['jenis_kelamin'];?></td>
				<?php

						$nis = $data['nis'];
						$query_tugas = "SELECT * FROM tbl_tugas_mata_pelajaran WHERE id_mata_pelajaran = '$mapel'";
						$sql_tugas = $pdo->prepare($query_tugas);
						$sql_tugas->execute();
						$jml_tugas = $sql_tugas->rowCount();
								
						while($data_tugas = $sql_tugas->fetch()){
							$tugas = $data_tugas['id_tugas_mata_pelajaran'];
							$query_ntugas = "SELECT * FROM tbl_nilai_mata_pelajaran WHERE id_tugas_mata_pelajaran = '$tugas' AND nis = '$nis'";
							$sql_ntugas = $pdo->prepare($query_ntugas);
							$sql_ntugas->execute();
							$data_ntugas = $sql_ntugas->fetch();
							$jml_ntugas = $sql_ntugas->rowCount();

							if ($jml_ntugas == 0) {
								echo "<td> 0 </td>";
							} else {
								echo "<td>".$data_ntugas['nilai']."</td>";
							}
									
						}
					
					$query_nilai = "SELECT *, SUM(nilai) as total_nilai FROM tbl_nilai_mata_pelajaran WHERE id_mata_pelajaran = '$mapel' AND nis = '$nis'";
					$sql_nilai = $pdo->prepare($query_nilai);
					$sql_nilai->execute();
					$jml_nilai = $sql_nilai->rowCount();
					$data_nilai = $sql_nilai->fetch();
					$total_nilai = ($data_nilai['total_nilai']!=0)?$data_nilai['total_nilai']:0;
					$rata_nilai = ($total_nilai!=0)?$total_nilai / $jml_tugas:0;
					echo "<td>".$rata_nilai."</td>";

					if ($rata_nilai >= 95) {
						$grade = "A";
							echo "<td>".$grade."</td>";
					} else if ($rata_nilai >= 85 AND $rata_nilai < 95) {
						$grade = "A-";
						echo "<td>".$grade."</td>";
					}  else if ($rata_nilai >= 75 AND $rata_nilai < 85) {
						$grade = "B";
						echo "<td>".$grade."</td>";
					} else if ($rata_nilai >= 70 AND $rata_nilai < 75) {
						$grade = "B-";
						echo "<td>".$grade."</td>";
					} else if ($rata_nilai >= 60 AND $rata_nilai < 70) {
						$grade = "C";
						echo "<td>".$grade."</td>";
					} else if ($rata_nilai <= 59) {
						$grade = "D";
						echo "<td>".$grade."</td>";
					}
								
				?>
										
			</tr>
		<?php
			}
		?>	

	</table>	
</body>
</html>