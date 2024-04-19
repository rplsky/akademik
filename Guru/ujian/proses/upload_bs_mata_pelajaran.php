<?php 

	$id_lembar_ujian = $_POST['id_lembar_ujian'];
	$id_mata_pelajaran = $_POST['id_mata_pelajaran'];

	$query_lk = "SELECT * FROM tbl_lembar_ujian WHERE id_lembar_ujian = '$id_lembar_ujian'";
	$sql_lk = $pdo->prepare($query_lk);
	$sql_lk->execute();
	$data_lk = $sql_lk->fetch();

	$poin = round($data_lk['poin'] / $data_lk['jml_soal'], 2);
	
	$query_bs = "SELECT * FROM tbl_bank_soal WHERE id_lembar_ujian = '$id_lembar_ujian'";
	$sql_bs = $pdo->prepare($query_bs);
	$sql_bs->execute();
	$jml_soal = $sql_bs->rowCount();

// menghubungkan dengan library excel reader
require "../Config/vendor/autoload.php";

// Include librari PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

// upload file xls
$ext = pathinfo($_FILES['file_soal']['name'], PATHINFO_EXTENSION);
$target = "excel_soal/".$_FILES['file_soal']['name'].".".$ext;
move_uploaded_file($_FILES['file_soal']['tmp_name'], $target);

//echo $target.'<br>';


// mengambil isi file xls
$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
$spreadsheet = $reader->load($target); // Load file yang tadi diupload ke folder tmp
$sheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

//echo $spreadsheet.' - '.$sheet.'<br>';

// jumlah default data yang berhasil di import
$berhasil = 0;
$jumlah_baris = 0;



foreach ($sheet as $data){
	$jumlah_baris++;
}

$jumlah_baris = $jumlah_baris - 1;

$jml = $jml_soal + $jumlah_baris;

//echo $jml;

if ($jml <= $data_lk['jml_soal']) {

	foreach ($sheet as $data_soal){

		// mengambil data barang dengan kode paling besar
		$query_id = "SELECT max(id_soal) as kodeTerbesar FROM tbl_bank_soal";
		$sql_id = $pdo->prepare($query_id);
		$sql_id->execute();
		$data = $sql_id->fetch();
		$kode = $data['kodeTerbesar'];
		
		// mengambil angka dari kode barang terbesar, menggunakan fungsi substr
		// dan diubah ke integer dengan (int)
		$urutan = (int) substr($kode, 3, 5);
		
		// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
		$urutan++;
		
		// membentuk kode barang baru
		// perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
		// misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
		// angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
		$huruf = "BS-";
		$id_soal = $huruf . sprintf("%05s", $urutan);
		
		// menangkap data dan memasukkan ke variabel sesuai dengan kolumnya masing-masing
		$pertanyaan		= "<p>".$data_soal['A']."</p>";
		$pilihan_a		= $data_soal['B'];
		$pilihan_b		= $data_soal['C'];
		$pilihan_c		= $data_soal['D'];
		$pilihan_d		= $data_soal['E'];
		$pilihan_e		= $data_soal['F'];
		$j 				= $data_soal['G'];

		if ($j=='Pilihan A') {
			$jawaban = $pilihan_a;
		} elseif ($j=='Pilihan B') {
			$jawaban = $pilihan_b;
		} elseif ($j=='Pilihan C') {
			$jawaban = $pilihan_c;
		} elseif ($j=='Pilihan D') {
			$jawaban = $pilihan_d;
		} elseif ($j=='Pilihan E') {
			$jawaban = $pilihan_e;
		}

		//echo $id_lembar_ujian.' - '.$id_mata_pelajaran.' - '.$id_soal.' - '.$pertanyaan.' - '.$pilihan_a.' - '.$pilihan_b.' - '.$pilihan_c.' - '.$pilihan_d.' - '.$pilihan_e.' - '.$j.'<br>';

		if(strcmp($pertanyaan,"<p>Pertanyaan</p>") == 0 && strcmp($pilihan_a,"Pilihan A") == 0 && strcmp($pilihan_b,"Pilihan B") == 0 && strcmp($pilihan_c,"Pilihan C") == 0 && strcmp($pilihan_d,"Pilihan D") == 0 && strcmp($pilihan_e,"Pilihan E") == 0 && strcmp($j,"Jawaban") == 0){
			continue;
		} else if($pertanyaan != "" && $pilihan_a != "" && $pilihan_b != "" && $pilihan_c != "" && $pilihan_d != "" && $pilihan_e != "" && $j != ""){
			// input data ke database (table data_pegawai)
			$query = "INSERT INTO tbl_bank_soal (id_soal, id_lembar_ujian, pertanyaan, pilihan_a, pilihan_b, pilihan_c, pilihan_d, pilihan_e, jawaban, poin_soal) VALUES ('$id_soal', '$id_lembar_ujian', '$pertanyaan', '$pilihan_a','$pilihan_b', '$pilihan_c', '$pilihan_d', '$pilihan_e', '$jawaban', '$poin')";
			$sql = $pdo->prepare($query);
			$sql->execute();
			
			$berhasil++;
		}
	}
// hapus kembali file .xls yang di upload tadi
unlink($target);

if($berhasil == $jumlah_baris){
		?>
		<script type="text/javascript">
    		alert('Data telah tersimpan');
    		setTimeout("location.href='?page=ujian&aksi=bs&id=<?php echo $id_lembar_ujian; ?>&mapel=<?php echo $id_mata_pelajaran; ?>'", 1000);
    	</script>
		<?php
	}else{
		?>
		<script type="text/javascript">
    		alert('Data gagal tersimpan');
    		setTimeout("location.href='?page=ujian&aksi=import_bs_mata_pelajaran&id=<?php echo $id_lembar_ujian; ?>&mapel=<?php echo $id_mata_pelajaran; ?>''", 1000);
    	</script>
		<?php
	}
} else {
	?>
	<script type="text/javascript">
		alert('Jumlah soal sudah maksimal');
		setTimeout("location.href='?page=ujian&aksi=bs&id=<?php echo $id_lembar_ujian; ?>&mapel=<?php echo $id_mata_pelajaran; ?>'", 1000);
	</script>
	<?php
}
?>