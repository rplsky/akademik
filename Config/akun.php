<?php
  error_reporting(0);
  SESSION_START();
  include "koneksi.php";
  if(empty($_SESSION['id_user'])){
  	$_SESSION['id_user'] = "";
  }else{
  	$user=$_SESSION['id_user'];
    $level=$_SESSION['level'];

    if ($level=="Admin") {
    	$sql="select * from tbl_admin where nip='$user'";
    	$query=$pdo->prepare($sql);
    	$query->execute();
    	$data=$query->fetch();

      $jk_akun = $data['jenis_kelamin'];
      if ($jk_akun=="L") {
        $ft_akun = "user_laki.png";
      } else {
        $ft_akun = "user_perempuan.png";
      }
      
    } elseif ($level=="Wks Kurikulum") {
      $sql="select * from tbl_wks_kurikulum where nip='$user'";
      $query=$pdo->prepare($sql);
      $query->execute();
      $data=$query->fetch();

      $jk_akun = $data['jenis_kelamin'];
      if ($jk_akun=="L") {
        $ft_akun = "user_laki.png";
      } else {
        $ft_akun = "user_perempuan.png";
      }

    }elseif ($level=="Kepala Sekolah") {
      $sql="select * from tbl_kepala_sekolah where nip='$user'";
      $query=$pdo->prepare($sql);
      $query->execute();
      $data=$query->fetch();

      $jk_akun = $data['jenis_kelamin'];
      if ($jk_akun=="L") {
        $ft_akun = "user_laki.png";
      } else {
        $ft_akun = "user_perempuan.png";
      }

    } elseif ($level=="Guru") {
      $sql="select * from tbl_guru where nip='$user'";
      $query=$pdo->prepare($sql);
      $query->execute();
      $data=$query->fetch();

      $jk_akun = $data['jenis_kelamin'];
      if ($jk_akun=="L") {
        $ft_akun = "user_laki.png";
      } else {
        $ft_akun = "user_perempuan.png";
      }

    } elseif ($level=="Siswa") {
      $sql="select * from tbl_siswa where nis='$user'";
      $query=$pdo->prepare($sql);
      $query->execute();
      $data=$query->fetch();
      $_SESSION['kelas'] = $data['kelas'];

      $jk_akun = $data['jenis_kelamin'];
      if ($jk_akun=="L") {
        $ft_akun = "user_laki.png";
      } else {
        $ft_akun = "user_perempuan.png";
      }
      
    }
  }
?>