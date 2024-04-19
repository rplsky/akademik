<?php
// deklarasi parameter koneksi database
$hostname = "localhost";
$username = "u3293263_akademik22";
$password = "smksky@22";
$database = "u3293263_akademik_esky";

try {
	// buat koneksi database
	$pdo = new PDO("mysql:host=$hostname;dbname=$database",$username,$password);
	// set error mode
	$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	// tampilkan kesalahan jika koneksi gagal
	echo "Koneksi Database Gagal! : ".$e->getMessage();
}
?>