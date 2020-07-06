<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		
		<title>Hospitals - Bootstrap 3 Template</title>
		
		<!-- Bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		
		<!-- Google Web Fonts -->
		<link href="../../../../../fonts.googleapis.com/css0733.css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic" rel="stylesheet" type="text/css">
		<link href="../../../../../fonts.googleapis.com/cssd264.css?family=Roboto:400,100,300,100italic,300italic,400italic,500,500italic,700,700italic,900,900italic" rel="stylesheet" type="text/css">
		
		<!-- Template CSS Files  -->
		<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
		<link href="js/plugins/camera/css/camera.css" rel="stylesheet">
		<link href="js/plugins/magnific-popup/magnific-popup.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<link href="css/responsive.css" rel="stylesheet">
		<!--validasi-->
		<script src="asset/SpryAssets/SpryValidationConfirm.js" type="text/javascript"></script>
    	<link href="asset/SpryAssets/SpryValidationConfirm.css" rel="stylesheet" type="text/css" />
    	<script src="asset/SpryAssets/SpryValidationPassword.js" type="text/javascript"></script>
    	<link href="asset/SpryAssets/SpryValidationPassword.css" rel="stylesheet" type="text/css" />
    	<script src="asset/SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
    	<link href="asset/SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
    	<script src="asset/SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
    	<link href="asset/SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
    	<script src="asset/SpryAssets/SpryValidationTextfield.js" type="text/javascript"></script>
    	<link href="asset/SpryAssets/SpryValidationTextfield.css" rel="stylesheet" type="text/css" />
		
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		
		<!-- Fav and touch icons -->
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/fav-144.html">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/fav-114.html">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/fav-72.html">
		<link rel="apple-touch-icon-precomposed" href="images/fav-57.html">
		<link rel="shortcut icon" href="images/fav.html">
		
	</head>
	<body>
	<?php
                        include "config/validasi.php";
                      
                        
                 ?>	
						
<footer class="main-footer">
		<!-- Footer Area Starts -->
			<div class="footer-area">
			<!-- Nested Container Starts -->
				<div class="container">
					<div class="row">
					<div class="col-md-4 col-xs-12 newsletter-block">
						</div>
					<!-- Signup Newsletter Starts -->
						
						<div class="col-md-4 col-xs-12 newsletter-block">
						<div class="form-group" align="center">
							<img src="images/enstitu_login.png" align="center" alt="login" width="50%" >
							</div>
							<form action="cek_login.php" class="newsletter" method="POST">
								<div class="form-group">
									<span id="biasa1"><input type="text" class="form-control" placeholder="Username" name="username">
									 <?php alert_biasa();?></span> 
								</div>
								<div class="form-group">
									<span id="biasa2"><input type="password" class="form-control" placeholder="Password" name="password">
									 <?php alert_biasa();?></span> 
								</div>
								
								<table>
								
									<tr>
										<td ><a href="login_mbr.php"><input type="button" class="btn btn-warning" value="Refresh"></a>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
										<td ><a href="index.php?p=lupapass&&act=lupapass">Lupa Password??</a></td>
									</tr>
									<!-- <tr>
										<td width="50"><a href="#">Lupa Password??</a></td>
									</tr> -->
								</table>
								
  <?php
biasa();
?>
								<input type="submit" class="btn btn-lg btn-block btn-secondary" name="login" value="LOGIN">
							</form>
						
						</div>
						
					<!-- Signup Newsletter Ends -->
					
					</div>
				</div>
			<!-- Nested Container Ends -->
			</div>
		</footer>
			<!-- Template JS Files -->
	<script src="js/jquery-1.11.3.min.js"></script>
	<script src="js/jquery-migrate-1.2.1.min.js"></script>	
	<script src="js/bootstrap.min.js"></script>
	<script src="js/plugins/camera/js/jquery.mobile.customized.min.js"></script>
	<script src="js/plugins/camera/js/jquery.easing.1.3.js"></script>
	<script src="js/plugins/camera/js/camera.min.js"></script>	
	<script src="js/plugins/shuffle/jquery.shuffle.modernizr.min.js"></script>
	<script src="js/plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
	<script src="../../../../../maps.googleapis.com/maps/api/js"></script>
	<script src="js/custom.js"></script>		
	</body>

<!-- Mirrored from sainathchillapuram.com/BS/mediplus/hosptails/html-fullwidth/doctor-profile.html by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 17 Mar 2016 06:58:14 GMT -->
</html>