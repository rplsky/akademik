<!DOCTYPE html>
<html>
<head>
  <title>E-LEARNING SMK SANGKURIANG 1 CIMAHI</title>
  <meta charset="UTF-8">
  <meta name="google-site-verification" content="4B_l4uEl3CngZUJ13-sFv96As565dr9PKop9lNtF-to" />
  <link rel="stylesheet" type="text/css" href="Assets/css/style_baru.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;700&family=Poppins:wght@700&display=swap" rel="stylesheet">
  <link rel="icon" type="image/png" href="Assets/img/smk1.png"/>
  <script src="https://kit.fontawesome.com/a81368914c.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
  
    <div class="container">
        <div class="img">
          <img src="Assets/img/bg.svg">
        </div>
        <div class="login-content">
            <form action="" method="POST">
                <img class="avatar" src="Assets/img/smk1.png"></img>
                <h4>PORTAL E-LEARNING</h4>
                <h6>SMK SANGKURIANG 1 CIMAHI</h6><br>
                        <div class="input-div one">
                            <div class="i">
                                <i class="fas fa-user"></i>
                            </div>
                            <div class="div">
                                <h5>Email</h5>
                                <input type="text" class="input" name="username">
                            </div>
                        </div>
                        <div class="input-div pass">
                            <div class="i"> 
                                <i class="fas fa-lock"></i>
                            </div>
                            <div class="div">
                                <h5>Password</h5>
                                <input type="password" class="input" name="password">
                            </div>
                        </div>
                        <button class="btn" name="login">LOGIN</button>
            </form>
        </div>
    </div>
    
    <script type="text/javascript" src="Assets/js/login_js.js"></script>
    
</body>
</html>

<?php
    include 'Config/koneksi.php';
    include 'Config/mac.php';
    error_reporting(0);
    SESSION_START();
    
    if(isset($_POST['login'])) {
        $pass=sha1($_POST['password']);
        $password = $_POST['password'];
        $user=$_POST['username'];
        $query = "SELECT * FROM tbl_akun WHERE email = '$user' AND password = '$pass'";
        $login = $pdo->prepare($query);
        $login->execute();
        $cocok = $login->rowCount();
        $r=$login->fetch();
            if ($cocok > 0){
                $_SESSION['username'] = $r['email'];
                $_SESSION['level'] =$r['hak_akses'];
                $_SESSION['id_user'] =$r['nip'];
                $_SESSION['password'] =$pass;
                $_SESSION['timestamp']=time();

	            if ($_SESSION['level']=='Admin') {
		            echo "<script>window.alert('Anda masuk sebagai Admin');
		        	        window.location='Admin/index.php?page=beranda&aksi=aktif'</script>";
		        }       
		        else if($_SESSION['level']=='Wks Kurikulum'){
				    ?><script>window.alert('Anda masuk sebagai Wks Kurikulum');
				    window.location='Kurikulum/index.php?page=beranda&aksi=aktif'</script>
				 <?php
			    }
		        else if($_SESSION['level']=='Kepala Sekolah'){
				    ?><script>window.alert('Anda masuk sebagai Kepala Sekolah');
				    window.location='Kepala_Sekolah/index.php?page=beranda&aksi=aktif'</script>
				 <?php
			    }   
			    else if($_SESSION['level']=='Guru'){
			        echo "<script>window.alert('Anda masuk sebagai Guru');
			   	    window.location='Guru/index.php?page=beranda&aksi=aktif'</script>";
			    } else{
			        echo "<script>window.alert('Anda masuk sebagai Siswa');
			        window.location='Siswa/index.php?page=beranda&aksi=aktif'</script>";
			    }
            } else {
                ?><script>window.alert('Username dan atau password salah');
                            window.location='index.php'</script>
                    <?php
            }
    }

?>