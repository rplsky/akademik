<?php 
// menghubungkan dengan library excel reader
require "../Config/vendor/autoload.php";

// Include librari PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

// upload file xls
$ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
$target = "excel/".$_FILES['file']['name'].".".$ext;
move_uploaded_file($_FILES['file']['tmp_name'], $target);

// mengambil isi file xls
$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
$spreadsheet = $reader->load($target); // Load file yang tadi diupload ke folder tmp
$sheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

// jumlah default data yang berhasil di import
$berhasil = 0;
$jumlah_baris = 0;

foreach ($sheet as $data){
	$jumlah_baris++;
}

$jumlah_baris = $jumlah_baris - 1;

foreach ($sheet as $data){

	// menangkap data dan memasukkan ke variabel sesuai dengan kolumnya masing-masing
	$nip 			= $data['A'];
	$nama_guru		= $data['B'];
	$jenis_kelamin	= $data['C'];
	$tempat_lahir	= $data['D'];
	$tanggal_lahir	= $data['E'];
	$alamat			= $data['F'];
	$no_telp		= $data['G'];
	$email			= $data['H'];
	$password		= sha1("guruskr76");
	$hak_akses		= "Guru";

	if($nip == "NIP" && $nama_guru == "Nama Guru" && $jenis_kelamin == "Jenis Kelamin" && $tempat_lahir == "Tempat Lahir" && $tanggal_lahir == "Tanggal Lahir" && $alamat == "Alamat" && $no_telp == "No Telp" && $email == "Email"){
		continue;
	} else if($nip != "" && $nama_guru != "" && $jenis_kelamin != "" && $tempat_lahir != "" && $tanggal_lahir != "" && $alamat != "" && $no_telp != "" && $email != ""){
		// input data ke database (table data_pegawai)
		$query = "INSERT INTO tbl_guru (nip, nama_guru, jenis_kelamin, tempat_lahir, tanggal_lahir, alamat, no_telp) VALUES ('$nip', '$nama_guru', '$jenis_kelamin', '$tempat_lahir', '$tanggal_lahir', '$alamat', '$no_telp')";
		$sql = $pdo->prepare($query);
		$sql->execute();

		$query2 = "INSERT INTO tbl_akun (email, password, hak_akses, nip) VALUES ('$email', '$password', '$hak_akses', '$nip')";
		$sql2 = $pdo->prepare($query2);
		$sql2->execute();
		
		$berhasil++;
	}
}
// hapus kembali file .xls yang di upload tadi
unlink($target);

if($berhasil == $jumlah_baris){
		?>
		<script type="text/javascript">
			alert('Data telah tersimpan');
			setTimeout("location.href='?page=akun_siswa&aksi=aktif'", 1000);
		</script>
		<?php
	}else{
		?>
		<script type="text/javascript">
			alert('Data gagal tersimpan');
			setTimeout("location.href='?page=akun_siswa&aksi=import_siswa'", 1000);
		</script>
		<?php
	}
?>