<?php
session_start();
// pemanggilan file koneksi
include "config/koneksi.php";
// pembuatan variabel pada penginputan username dan password
$username = $_POST['username'];
$password = $_POST['password'];
$captcha = strtoupper($_POST['captcha']);
$login=$_POST['login'];
if($login){
	if($username==""||$password==""){
		?>
		<script type="text/javascript">
		alert("Inputan tidak boleh kosong!!");
		</script>
		<?php
		}else{
			if (1==1) {
				# code...
			
			$sql=mysqli_query($titid, "SELECT * FROM admin WHERE username='$username' AND password='$password'");
			if(mysqli_num_rows($sql)==1){
				$qry=mysqli_fetch_array($sql);
				$_SESSION['username']=$qry['username'];
				$_SESSION['nama']=$qry['nama'];
				$_SESSION['id_admin']=$qry['id_admin'];

				header("location:admin/index.php?p=home");
			}else{
				$sql=mysqli_query($titid, "SELECT * FROM user WHERE username='$username' AND password='$password'");
				if(mysqli_num_rows($sql)==1){
					$r=mysqli_fetch_array($sql);
					$_SESSION['username']=$r['username'];
					$_SESSION['id_user']=$r['id_user'];

					header("location:index2.php?p=home");
				}
				$sql=mysqli_query($titid, "SELECT * FROM pakar WHERE pakarname='$username' AND password='$password'");
				if(mysqli_num_rows($sql)==1){
					$r=mysqli_fetch_array($sql);
					$_SESSION['username']=$r['pakarname'];
					$_SESSION['nama']=$r['nama'];
					$_SESSION['id_pakar']=$r['id_pakar'];

					header("location:admin/index2.php?p=home");
				}
				else{
					?>
					<script language="JavaScript">
					alert('Username atau password tidak cocok, silahkan ulangi.');
					document.location='login_mbr.php';
					</script>
					<?php
				}
			}
		}else{
			?>
					<script language="JavaScript">
					alert('Kode Captcha Tidak Cocok.');
					document.location='login_mbr.php';
					</script>
					<?php
		}
	}
}else if($op="out"){
	unset($_SESSION['username']);
	header("location:login_mbr.php");
}
		?>