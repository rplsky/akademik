<?php
// Fungsi untuk menghitung jarak antara dua koordinat lokasi (dalam kilometer)
function calculateDistance($lat1, $lon1, $lat2, $lon2) {
    $earthRadius = 6371; // Radius bumi dalam kilometer

    $deltaLat = deg2rad($lat2 - $lat1);
    $deltaLon = deg2rad($lon2 - $lon1);

    $a = sin($deltaLat / 2) * sin($deltaLat / 2) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * sin($deltaLon / 2) * sin($deltaLon / 2);
    $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

    $distance = $earthRadius * $c * 1000;
    return $distance;
}

// Koordinat lokasi tetap
$fixedLatitude = -6.8645644873775;
$fixedLongitude = 107.54001616736112;

// Koordinat lokasi dari perangkat pengguna
$userLatitude = $_POST['lat'];
$userLongitude = $_POST['lon'];

// Hitung jarak antara kedua koordinat
$distance = calculateDistance($fixedLatitude, $fixedLongitude, $userLatitude, $userLongitude);

//echo "Distance between fixed location and your location is approximately " . round($distance, 2) . " m.";

$jarak = round($distance, 2);

if ($jarak < 300) {
    $id = $_POST['id'];
    $nip = $_POST['nip'];
    $absen = $_POST['absen'];
    $status = $_POST['status'];

    if ($status == "Proses") {
        $query_absen = "INSERT INTO tbl_absensi_mata_pelajaran (id_materi_mata_pelajaran, id_mata_pelajaran, nis, tgl_awal_absensi, status) VALUES ('$id', '$mapel', '$nip', '$absen', '$status')";
        $sql_absen = $pdo->prepare($query_absen);
        $sql_absen->execute();
    }
}
?>
