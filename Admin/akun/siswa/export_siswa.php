<?php
	/*$hal = (isset($_GET['hal']))? $_GET['hal'] : 1;
					
	$limit = 5; // Jumlah data per halamannya
					
	// Untuk menentukan dari data ke berapa yang akan ditampilkan pada tabel yang ada di database
	$limit_start = ($hal - 1) * $limit; */

	include '../../../Config/koneksi.php';
	include '../../../Config/akun.php';
	include '../../../Config/function.php';

	$query = "SELECT * FROM tbl_akun INNER JOIN tbl_siswa ON tbl_akun.nip = tbl_siswa.nis WHERE tbl_akun.hak_akses = 'Siswa' ORDER BY tbl_siswa.kelas ASC, tbl_siswa.nis ASC";
	$sql = $pdo->prepare($query);
	$sql->execute();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Export Siswa</title>
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
	$nama_file = "Daftar Siswa";
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=$nama_file.xls");
	?>
	<center>
		<h1>Data Daftar Siswa</h1>
	</center>
			
	<table border="1">
		<tr>
			<th>No</th>
			<th>NIS</th>
			<th>Nama Siswa</th>
			<th>Jenis Kelamin</th>
			<th>Email</th>
			<th>Kelas</th>
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
				<td><?php echo $data['email'];?></td>
				<td><?php echo $data['kelas'];?></td>
			</tr>
		<?php
			}
		?>	

	</table>	
</body>
</html>