<?php
  include '../Config/koneksi.php';
  include '../Config/akun.php';
  include '../Config/function.php';
  include '../Config/excel_reader2.php';

  if (empty($_SESSION['username']) && empty($_SESSION['level'])) {
        ?>
        <script type="text/javascript">
            alert('Anda Belum Melakukan Login.');
            setTimeout("location.href='../index.php'", 1000);
        </script>
        <?php
    }else{
      if ($_SESSION['level']!='Admin') {
        ?>
        <script type="text/javascript">
            alert('Anda tidak berhak login di sini.');
            setTimeout("location.href='../Config/logout.php?id=akses'", 1000);
        </script>
        <?php
      }else{
        $idletime = 30 * 60;
        if (time()-$_SESSION['timestamp']>$idletime){
          ?>
          <script type="text/javascript">
              alert('Waktu akses anda telah habis. Silahkan login kembali.');
              setTimeout("location.href='../Config/logout.php?id=timeout'", 1000);
          </script>
          <?php
        }else{
          $_SESSION['timestamp']=time();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>E-LEARNING SMK SANGKURIANG 1 CIMAHI</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="icon" type="image/png" href="../Assets/img/smk1.png"/>
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../Assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../Assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../Assets/dist/css/skins/_all-skins.min.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../Assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- js -->
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index.php?page=beranda&aksi=aktif" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="../Assets/img/smk1.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" height="40px" width="40px" style="opacity: .8"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img src="../Assets/img/smk1.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" height="40px" width="40px" style="opacity: .8"><b> E - </b>SKR1</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../Assets/img/<?php echo $ft_akun;?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $data['nip'];?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../Assets/img/<?php echo $ft_akun;?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo $data['nama_admin'];?>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="../Config/logout.php?id=logout" class="btn btn-default btn-flat">Keluar</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../Assets/img/<?php echo $ft_akun;?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $data['nama_admin'];?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU</li>
        <li>
          <a href="?page=mata_pelajaran&aksi=aktif">
            <i class="fa fa-book"></i> <span>Mata Pelajaran</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li>
          <a href="?page=tugas_mata_pelajaran&aksi=aktif">
            <i class="fa fa-pencil-square-o"></i> <span>Tugas Mata Pelajaran</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li>
          <a href="?page=nilai_mata_pelajaran&aksi=aktif">
            <i class="fa fa-line-chart"></i> <span>Nilai Mata Pelajaran</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i>
            <span>Akun</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?page=akun_admin&aksi=aktif"><i class="fa fa-circle-o"></i> Admin</a></li>
            <li><a href="?page=akun_guru&aksi=aktif"><i class="fa fa-circle-o"></i> Guru</a></li>
            <li><a href="?page=akun_wks_kurikulum&aksi=aktif"><i class="fa fa-circle-o"></i> Wks Kurikulum</a></li>
            <li><a href="?page=akun_kepala_sekolah&aksi=aktif"><i class="fa fa-circle-o"></i> Kepala Sekolah</a></li>
            <li><a href="?page=akun_siswa&aksi=aktif"><i class="fa fa-circle-o"></i> Siswa</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Hak Akses : <?php echo $_SESSION['level']; ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Hak Akses : <?php echo $_SESSION['level']; ?></a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <!--//Tulis Script-->
        <?php
          $page = $_GET['page'];
          $aksi = $_GET['aksi'];

          if($page=='mata_pelajaran'){
            if($aksi=='aktif'){
              include 'mata_pelajaran/tampil_mata_pelajaran.php';
            } else if ($aksi=='tambahdata_mata_pelajaran') {
              include 'mata_pelajaran/tambah_mata_pelajaran.php';
            } else if ($aksi=='simpandata_mata_pelajaran') {
              include 'mata_pelajaran/proses/simpan_mata_pelajaran.php';
            } else if ($aksi=='editdata_mata_pelajaran') {
              include 'mata_pelajaran/edit_mata_pelajaran.php';
            } else if ($aksi=='updatedata_mata_pelajaran') {
              include 'mata_pelajaran/proses/update_mata_pelajaran.php';
            } else if ($aksi=='hapusdata_mata_pelajaran') {
              include 'mata_pelajaran/proses/hapus_mata_pelajaran.php';
            } else if ($aksi=='guru_mata_pelajaran') {
              include 'mata_pelajaran/guru_mata_pelajaran.php';
            } else if ($aksi=='hapusdataguru_mata_pelajaran') {
              include 'mata_pelajaran/proses/hapusguru_mata_pelajaran.php';
            } else if ($aksi=='tambahdataguru_mata_pelajaran') {
              include 'mata_pelajaran/tambahguru_mata_pelajaran.php';
            } else if ($aksi=='simpandataguru_mata_pelajaran') {
              include 'mata_pelajaran/proses/simpanguru_mata_pelajaran.php';
            } else if ($aksi=='hapussemua_mata_pelajaran') {
              include 'mata_pelajaran/proses/hapus_semua_mata_pelajaran.php';
            }
          }else if($page=='tugas_mata_pelajaran'){
            if($aksi=='aktif'){
              include 'tugas_mata_pelajaran/tampil_tugas_mata_pelajaran.php';
            } else if ($aksi=='tambahdata_tugas_mata_pelajaran') {
              include 'tugas_mata_pelajaran/tambah_tugas_mata_pelajaran.php';
            } else if ($aksi=='simpandata_tugas_mata_pelajaran') {
              include 'tugas_mata_pelajaran/proses/simpan_tugas_mata_pelajaran.php';
            } else if ($aksi=='editdata_tugas_mata_pelajaran') {
              include 'tugas_mata_pelajaran/edit_tugas_mata_pelajaran.php';
            } else if ($aksi=='updatedata_tugas_mata_pelajaran') {
              include 'tugas_mata_pelajaran/proses/update_tugas_mata_pelajaran.php';
            } else if ($aksi=='hapusdata_tugas_mata_pelajaran') {
              include 'tugas_mata_pelajaran/proses/hapus_tugas_mata_pelajaran.php';
            }
          }else if($page=='nilai_mata_pelajaran'){
            if($aksi=='aktif'){
              include 'nilai/tampil_nilai_mata_pelajaran.php';
            } else if ($aksi=='detail_nilai_mata_pelajaran') {
              include 'nilai/rincian_nilai_mata_pelajaran.php';
            } else if ($aksi=='detail_tugas_mata_pelajaran') {
              include 'nilai/rincian_tugas_mata_pelajaran.php';
            } else if ($aksi=='edit_nilai_mata_pelajaran') {
              include 'nilai/tambah_nilai_mata_pelajaran.php';
            }  else if ($aksi=='simpandata_tugas_mata_pelajaran') {
              include 'nilai/proses/simpan_nilai_mata_pelajaran.php';
            } 
          }else if($page=='akun_admin'){
            if($aksi=='aktif'){
              include 'akun/admin/tampil_admin.php';
            } else if ($aksi=='detail_admin') {
              include 'akun/admin/rincian_admin.php';
            } else if ($aksi=='tambahdata_admin') {
              include 'akun/admin/tambah_admin.php';
            } else if ($aksi=='simpandata_admin') {
              include 'akun/admin/proses/simpan_admin.php';
            } else if ($aksi=='editdata_admin') {
              include 'akun/admin/edit_admin.php';
            } else if ($aksi=='updatedata_admin') {
              include 'akun/admin/proses/update_admin.php';
            } else if ($aksi=='editpassword_admin') {
              include 'akun/admin/password_admin.php';
            } else if ($aksi=='updatepassword_admin') {
              include 'akun/admin/proses/ganti_password_admin.php';
            } else if ($aksi=='hapusdata_admin') {
              include 'akun/admin/proses/hapus_admin.php';
            }
          }else if($page=='akun_guru'){
            if($aksi=='aktif'){
              include 'akun/guru/tampil_guru.php';
            } else if ($aksi=='detail_guru') {
              include 'akun/guru/rincian_guru.php';
            } else if ($aksi=='tambahdata_guru') {
              include 'akun/guru/tambah_guru.php';
            } else if ($aksi=='simpandata_guru') {
              include 'akun/guru/proses/simpan_guru.php';
            } else if ($aksi=='editdata_guru') {
              include 'akun/guru/edit_guru.php';
            } else if ($aksi=='updatedata_guru') {
              include 'akun/guru/proses/update_guru.php';
            } else if ($aksi=='editpassword_guru') {
              include 'akun/guru/password_guru.php';
            } else if ($aksi=='updatepassword_guru') {
              include 'akun/guru/proses/ganti_password_guru.php';
            } else if ($aksi=='hapusdata_guru') {
              include 'akun/guru/proses/hapus_guru.php';
            } else if ($aksi=='import_guru') {
              include 'akun/guru/import_guru.php';
            } else if ($aksi=='upload_guru') {
              include 'akun/guru/proses/upload_guru.php';
            }
          }else if($page=='akun_wks_kurikulum'){
            if($aksi=='aktif'){
              include 'akun/wks_kurikulum/tampil_wks_kurikulum.php';
            } else if ($aksi=='detail_wks_kurikulum') {
              include 'akun/wks_kurikulum/rincian_wks_kurikulum.php';
            } else if ($aksi=='tambahdata_wks_kurikulum') {
              include 'akun/wks_kurikulum/tambah_wks_kurikulum.php';
            } else if ($aksi=='simpandata_wks_kurikulum') {
              include 'akun/wks_kurikulum/proses/simpan_wks_kurikulum.php';
            } else if ($aksi=='editdata_wks_kurikulum') {
              include 'akun/wks_kurikulum/edit_wks_kurikulum.php';
            } else if ($aksi=='updatedata_wks_kurikulum') {
              include 'akun/wks_kurikulum/proses/update_wks_kurikulum.php';
            } else if ($aksi=='editpassword_wks_kurikulum') {
              include 'akun/wks_kurikulum/password_wks_kurikulum.php';
            } else if ($aksi=='updatepassword_wks_kurikulum') {
              include 'akun/wks_kurikulum/proses/ganti_password_wks_kurikulum.php';
            } else if ($aksi=='hapusdata_wks_kurikulum') {
              include 'akun/wks_kurikulum/proses/hapus_wks_kurikulum.php';
            }
          }else if($page=='akun_kepala_sekolah'){
            if($aksi=='aktif'){
              include 'akun/kepala_sekolah/tampil_kepala_sekolah.php';
            } else if ($aksi=='detail_kepala_sekolah') {
              include 'akun/kepala_sekolah/rincian_kepala_sekolah.php';
            } else if ($aksi=='tambahdata_kepala_sekolah') {
              include 'akun/kepala_sekolah/tambah_kepala_sekolah.php';
            } else if ($aksi=='simpandata_kepala_sekolah') {
              include 'akun/kepala_sekolah/proses/simpan_kepala_sekolah.php';
            } else if ($aksi=='editdata_kepala_sekolah') {
              include 'akun/kepala_sekolah/edit_kepala_sekolah.php';
            } else if ($aksi=='updatedata_kepala_sekolah') {
              include 'akun/kepala_sekolah/proses/update_kepala_sekolah.php';
            } else if ($aksi=='editpassword_kepala_sekolah') {
              include 'akun/kepala_sekolah/password_kepala_sekolah.php';
            } else if ($aksi=='updatepassword_kepala_sekolah') {
              include 'akun/kepala_sekolah/proses/ganti_password_kepala_sekolah.php';
            } else if ($aksi=='hapusdata_kepala_sekolah') {
              include 'akun/kepala_sekolah/proses/hapus_kepala_sekolah.php';
            }
          }else if($page=='akun_siswa'){
           if($aksi=='aktif'){
              include 'akun/siswa/tampil_siswa.php';
            } else if ($aksi=='detail_siswa') {
              include 'akun/siswa/rincian_siswa.php';
            } else if ($aksi=='tambahdata_siswa') {
              include 'akun/siswa/tambah_siswa.php';
            } else if ($aksi=='simpandata_siswa') {
              include 'akun/siswa/proses/simpan_siswa.php';
            } else if ($aksi=='editdata_siswa') {
              include 'akun/siswa/edit_siswa.php';
            } else if ($aksi=='updatedata_siswa') {
              include 'akun/siswa/proses/update_siswa.php';
            } else if ($aksi=='editpassword_siswa') {
              include 'akun/siswa/password_siswa.php';
            } else if ($aksi=='updatepassword_siswa') {
              include 'akun/siswa/proses/ganti_password_siswa.php';
            } else if ($aksi=='hapusdata_siswa') {
              include 'akun/siswa/proses/hapus_siswa.php';
            } else if ($aksi=='cari_siswa') {
              include 'akun/siswa/cari_siswa.php';
            } else if ($aksi=='import_siswa') {
              include 'akun/siswa/import_siswa.php';
            } else if ($aksi=='upload_siswa') {
              include 'akun/siswa/proses/upload_siswa.php';
            } else if ($aksi=='hapussemua_akun') {
              include 'akun/siswa/proses/hapus_semua_siswa.php';
            }
          }else if($page=='beranda'){
              if ($aksi=='aktif') {
                include 'beranda/index.php';
              }
          }
        ?>
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <!-- /.row -->

          </div>
          <!-- /.box -->


<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.1.1.1
    </div>
    <strong>Copyright &copy; 2021 - <?php echo date("Y"); ?> <a href="index.php?page=beranda&aksi=aktif">E-LEARNING SMK SANGKURIANG 1 CIMAHI</a>.</strong> All rights
    reserved.
  </footer>

    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./ckeditor -->
<script src="//cdn.ckeditor.com/4.16.2/full-all/ckeditor.js"></script>
<!-- jQuery 2.2.3 -->
<script src="../Assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="../Assets/bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../Assets/dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../Assets/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../Assets/dist/js/demo.js"></script>
</body>
</html>

<?php
    }
  }
}
?>
