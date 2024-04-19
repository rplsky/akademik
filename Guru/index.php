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
      if ($_SESSION['level']!='Guru') {
        ?>
        <script type="text/javascript">
            alert('Anda tidak berhak login di sini.');
            setTimeout("location.href='../Config/logout.php?id=akses'", 1000);
        </script>
        <?php
      }else{
        $idletime = 300 * 60;
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
  <!-- boxicons -->
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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
                  <?php echo $data['nama_guru'];?>
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
          <p><?php echo $data['nama_guru'];?></p>
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
          <a href="?page=ujian&aksi=mapel">
            <i class="fa fa-pencil-square-o"></i> <span>Ujian Mata Pelajaran</span>
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
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <!--//Tulis Script-->
        <?php
          $page = $_GET['page'];
          $aksi = $_GET['aksi'];

          switch ($page) {
            case "mata_pelajaran":
                switch ($aksi) {
                case "aktif":
                    include 'mata_pelajaran/tampil_mata_pelajaran.php';
                    break;
                case "tambahdata_mata_pelajaran":
                    include 'mata_pelajaran/tambah_mata_pelajaran.php';
                    break;
                case "simpandata_mata_pelajaran":
                    include 'mata_pelajaran/proses/simpan_mata_pelajaran.php';
                    break;
                case "editdata_mata_pelajaran":
                    include 'mata_pelajaran/edit_mata_pelajaran.php';
                    break;
                case "updatedata_mata_pelajaran":
                    include 'mata_pelajaran/proses/update_mata_pelajaran.php';
                    break;
                case "hapusdata_mata_pelajaran":
                    include 'mata_pelajaran/proses/hapus_mata_pelajaran.php';
                    break;
                case "tambahdataguru_mata_pelajaran":
                    include 'mata_pelajaran/tambahguru_mata_pelajaran.php';
                    break;
                case "simpandataguru_mata_pelajaran":
                    include 'mata_pelajaran/proses/simpanguru_mata_pelajaran.php';
                    break;
                  default:
                    echo "<H2>Tidak ada Fitur tersebut pada Page Mata Pelajaran !</H2>";
                }
                break;
            case "materi_mata_pelajaran":
                switch ($aksi) {
                case "tampil_materi_mapel":
                    include 'materi_mata_pelajaran/tampil_materi_mata_pelajaran.php';
                    break;
                case "rekapdata_absensi_mata_pelajaran":
                    include 'materi_mata_pelajaran/rekap_absensi_mata_pelajaran.php';
                    break;
                case "hadir_absensi_mata_pelajaran":
                    include 'materi_mata_pelajaran/rekap_absensi_mata_pelajaran_hadir.php';
                    break;
                case "thadir_absensi_mata_pelajaran":
                    include 'materi_mata_pelajaran/rekap_absensi_mata_pelajaran_thadir.php';
                    break;
                case "detail_materi_mata_pelajaran":
                    include 'materi_mata_pelajaran/detail_materi_mata_pelajaran.php';
                    break;
                case "tambahdata_materi_mata_pelajaran":
                    include 'materi_mata_pelajaran/tambah_materi_mata_pelajaran.php';
                    break;
                case "simpandata_materi_mata_pelajaran":
                    include 'materi_mata_pelajaran/proses/simpan_materi_mata_pelajaran.php';
                    break;
                case "editdata_materi_mata_pelajaran":
                    include 'materi_mata_pelajaran/edit_materi_mata_pelajaran.php';
                    break;
                case "updatedata_materi_mata_pelajaran":
                    include 'materi_mata_pelajaran/proses/update_materi_mata_pelajaran.php';
                    break;
                case "hapusdata_materi_mata_pelajaran":
                    include 'materi_mata_pelajaran/proses/hapus_materi_mata_pelajaran.php';
                    break;
                case "update_absensi_mata_pelajaran":
                    include 'materi_mata_pelajaran/proses/update_absensi_mata_pelajaran.php';
                    break;
                 default:
                    echo "<H2>Tidak ada Fitur tersebut pada Page Materi Mata Pelajaran !</H2>";
                }
                break;
            case "tugas_mata_pelajaran":
                switch ($aksi) {
                case "aktif":
                    include 'tugas_mata_pelajaran/tampil_tugas_mata_pelajaran.php';
                    break;
                case "detail_tugas":
                    include 'tugas_mata_pelajaran/detail_tugas_mata_pelajaran.php';
                    break;
                case "tambahdata_tugas_mata_pelajaran":
                    include 'tugas_mata_pelajaran/tambah_tugas_mata_pelajaran.php';
                    break;
                case "simpandata_tugas_mata_pelajaran":
                    include 'tugas_mata_pelajaran/proses/simpan_tugas_mata_pelajaran.php';
                    break;
                case "editdata_tugas_mata_pelajaran":
                    include 'tugas_mata_pelajaran/edit_tugas_mata_pelajaran.php';
                    break;
                case "updatedata_tugas_mata_pelajaran":
                    include 'tugas_mata_pelajaran/proses/update_tugas_mata_pelajaran.php';
                    break;
                case "hapusdata_tugas_mata_pelajaran":
                    include 'tugas_mata_pelajaran/proses/hapus_tugas_mata_pelajaran.php';
                    break;
                case "rekapdata_tugas_mata_pelajaran":
                    include 'tugas_mata_pelajaran/rekap_tugas_mata_pelajaran.php';
                    break;
                case "tambahdata_nilai_mata_pelajaran":
                    include 'tugas_mata_pelajaran/tambah_nilai_mata_pelajaran.php';
                    break;
                case "simpandata_nilai_mata_pelajaran":
                    include 'tugas_mata_pelajaran/proses/simpan_nilai_mata_pelajaran.php';
                    break;
                default:
                    echo "<H2>Tidak ada Fitur tersebut pada Page Tugas Mata Pelajaran ! </H2>";
                }
                break;
            case "nilai_mata_pelajaran":
                switch ($aksi) {
                case "aktif":
                    include 'nilai/tampil_nilai_mata_pelajaran.php';
                    break;
                case "detail_nilai_mata_pelajaran":
                    include 'nilai/rincian_nilai_mata_pelajaran.php';
                    break;
                case "detail_tugas_mata_pelajaran":
                    include 'nilai/rincian_tugas_mata_pelajaran.php';
                    break;
                case "edit_nilai_mata_pelajaran":
                    include 'nilai/tambah_nilai_mata_pelajaran.php';
                    break;
                case "simpandata_tugas_mata_pelajaran":
                    include 'nilai/proses/simpan_nilai_mata_pelajaran.php';
                    break;
                case "hapus_tugas_mata_pelajaran":
                    include 'nilai/hapus_nilai_mata_pelajaran.php';
                    break;
                case "hapusdata_tugas_mata_pelajaran":
                    include 'nilai/proses/hapus_nilai_mata_pelajaran.php';
                    break;
                case "export_nilai_mata_pelajaran":
                    include 'nilai/export_nilai_mata_pelajaran.php';
                    break;
                default:
                    echo "<H2>Tidak ada Fitur tersebut pada Page Nilai Mata Pelajaran ! </H2>";
                }
                break;
            case "ujian":
                switch ($aksi) {
                case "mapel":
                    include 'ujian/tampil_mata_pelajaran.php';
                    break;
                case "lk":
                    include 'ujian/tampil_lk_mata_pelajaran.php';
                    break;
                case "tambahdata_lk_mata_pelajaran":
                    include 'ujian/tambah_lk_mata_pelajaran.php';
                    break;
                case "simpandata_lk_mata_pelajaran":
                    include 'ujian/proses/simpan_lk_mata_pelajaran.php';
                    break;
                case "editdata_lk_mata_pelajaran":
                    include 'ujian/edit_lk_mata_pelajaran.php';
                    break;
                case "updatedata_lk_mata_pelajaran":
                    include 'ujian/proses/update_lk_mata_pelajaran.php';
                    break;
                case "hapusdata_lk_mata_pelajaran":
                    include 'ujian/proses/hapus_lk_mata_pelajaran.php';
                    break;
                case "bs":
                    include 'ujian/tampil_bs_mata_pelajaran.php';
                    break;
                case "tambahdata_bs_mata_pelajaran":
                    include 'ujian/tambah_bs_mata_pelajaran.php';
                    break;
                case "simpandata_bs_mata_pelajaran":
                    include 'ujian/proses/simpan_bs_mata_pelajaran.php';
                    break;
                case "editdata_bs_mata_pelajaran":
                    include 'ujian/edit_bs_mata_pelajaran.php';
                    break;
                case "updatedata_bs_mata_pelajaran":
                    include 'ujian/proses/update_bs_mata_pelajaran.php';
                    break;
                case "hapusdata_bs_mata_pelajaran":
                    include 'ujian/proses/hapus_bs_mata_pelajaran.php';
                    break;
                case "import_bs_mata_pelajaran":
                    include 'ujian/import_bs_mata_pelajaran.php';
                    break;
                case "upload_bs_mata_pelajaran":
                    include 'ujian/proses/upload_bs_mata_pelajaran.php';
                    break;
                case "ju":
                    include 'ujian/tampil_ju_mata_pelajaran.php';
                    break;
                case "tambahdata_ju_mata_pelajaran":
                    include 'ujian/tambah_ju_mata_pelajaran.php';
                    break;
                case "simpandata_ju_mata_pelajaran":
                    include 'ujian/proses/simpan_ju_mata_pelajaran.php';
                    break;
                case "editdata_ju_mata_pelajaran":
                    include 'ujian/edit_ju_mata_pelajaran.php';
                    break;
                case "updatedata_ju_mata_pelajaran":
                    include 'ujian/proses/update_ju_mata_pelajaran.php';
                    break;
                case "hapusdata_ju_mata_pelajaran":
                    include 'ujian/proses/hapus_ju_mata_pelajaran.php';
                    break;
                default:
                    echo "<H2>Tidak ada Fitur tersebut pada Page Ujian Mata Pelajaran ! </H2>";
                }
                break;
            case "beranda":
                switch ($aksi) {
                case "aktif":
                    include 'beranda/index.php';
                    break;
                default:
                    echo "<H2>Tidak ada Fitur tersebut pada Page Beranda Mata Pelajaran ! </H2>";
                }
                break;
              default:
                echo "<H2>Tidak ada Page dan Fitur tersebut pada System ! </H2>";
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