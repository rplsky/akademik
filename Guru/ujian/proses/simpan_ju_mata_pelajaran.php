<?php
    //include '../config/koneksi.php';

    $id_lembar_ujian = $_POST['id_lembar_ujian'];
    $id_mata_pelajaran = $_POST['id_mata_pelajaran'];
    $tanggal_mulai = $_POST['tanggal_mulai'];
    $tanggal_akhir = $_POST['tanggal_akhir'];
    $waktu = $_POST['waktu'];
    $mapel = $_POST['mapel'];
    
        $query_mapel = "SELECT * FROM tbl_mata_pelajaran WHERE id_mata_pelajaran = '$mapel'";
        $sql_mapel = $pdo->prepare($query_mapel);
        $sql_mapel->execute();
        $data_mapel = $sql_mapel->fetch();
        
        $kelas = $data_mapel['kelas'];

        // mengambil data barang dengan kode paling besar
        $query_id = "SELECT max(id_jadwal_ujian) as kodeTerbesar FROM tbl_jadwal_ujian";
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
        $huruf = "JU-";
        $id_jadwal = $huruf . sprintf("%05s", $urutan);

            $query = "INSERT INTO tbl_jadwal_ujian (id_jadwal_ujian, id_lembar_ujian, tanggal_mulai, tanggal_akhir, waktu, kelas) VALUES ('$id_jadwal', '$id_lembar_ujian', '$tanggal_mulai', '$tanggal_akhir','$waktu', '$kelas')";
            $sql = $pdo->prepare($query);
            $sql->execute();
            
            $query_l = "SELECT * FROM tbl_lk_mapel WHERE id_mata_pelajaran = '$mapel' AND id_lembar_ujian = '$id_lembar_ujian'";
            $sql_l = $pdo->prepare($query_l);
            $sql_l->execute();
            $data_l = $sql_l->fetch();
            $jml_l = $sql_l->rowCount();
            
            if($jml_l == 0){
                $query_lk = "INSERT INTO tbl_lk_mapel (id, id_lembar_ujian, id_mata_pelajaran) VALUES (NULL, '$id_lembar_ujian', '$mapel')";
                $sql_lk = $pdo->prepare($query_lk);
                $sql_lk->execute();    
            } else {
                $id = $data_l['id'];
                $query_lk = "UPDATE tbl_lk_mapel SET    
                                                        id_lembar_ujian = '$id_lembar_ujian', 
                                                        id_mata_pelajaran = '$mapel'
                                                        WHERE id = '$id'";
                $sql_lk = $pdo->prepare($query_lk);
                $sql_lk->execute();
            }
            
            if($sql && $sql_lk){
                ?>
                <script type="text/javascript">
                    alert('Data telah tersimpan');
                    setTimeout("location.href='?page=ujian&aksi=ju&id=<?php echo $id_lembar_ujian; ?>&mapel=<?php echo $id_mata_pelajaran; ?>'", 1000);
                </script>
                <?php
            }else{
                echo $query;
                ?>
                <script type="text/javascript">
                    alert('Data gagal tersimpan');
                    setTimeout("location.href='?page=ujian&aksi=tambahdata_ju_mata_pelajaran&id=<?php echo $id_lembar_ujian; ?>&mapel=<?php echo $id_mata_pelajaran; ?>''", 1000);
                </script>
                <?php
            }     
?>