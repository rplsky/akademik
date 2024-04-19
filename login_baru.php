<!DOCTYPE html>
<html>
<head>
	<title>E-LEARNING SMK SANGKURIANG 1 CIMAHI</title>
	<link rel="stylesheet" type="text/css" href="Assets/css/style_login.css">
	<link rel="icon" type="image/png" href="Assets/img/smk1.png"/>
</head>
<body>
	<section>
		<div class="color"></div>
		<div class="color"></div>
		<div class="color"></div>
		<div class="box">
			<div class="square" style="--i:0;"></div>
			<div class="square" style="--i:1;"></div>
			<div class="square" style="--i:2;"></div>
			<div class="square" style="--i:3;"></div>
			<div class="square" style="--i:4;"></div>
			<div class="container">
				<div class="form">
					<img class="avatar" src="Assets/img/smk1.png"></img>
					<h2>PORTAL E-SKR1</h2>
					<h3>SMK SANGKURIANG 1 CIMAHI</h3>
					<form action="" method="POST">
						<div class="inputbox">
							<input type="text" placeholder="Email" name="username">
						</div>
						<div class="inputbox">
							<input type="password" placeholder="Password" name="password">
						</div>
						<div class="submitbox">
							<input type="submit" value="LOGIN" name="login">
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
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