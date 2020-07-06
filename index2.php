<?php
	session_start();
	if (!isset($_SESSION['username'])) {
		# code...
	?>
	    <script language="JavaScript">
	    alert('Anda Belum Login, Silahkan Login Terlebih Dahulu!');
	    window.location='index.php';
	    </script>
<?php
	}
?>
<!DOCTYPE html>
<html lang="en">
	
<!-- Mirrored from sainathchillapuram.com/BS/mediplus/hosptails/html-fullwidth/services.html by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 17 Mar 2016 06:57:50 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
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
		<link href="asset/fonts.googleapis.com/css0733.css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic" rel="stylesheet" type="text/css">
		<link href="asset/fonts.googleapis.com/cssd264.css?family=Roboto:400,100,300,100italic,300italic,400italic,500,500italic,700,700italic,900,900italic" rel="stylesheet" type="text/css">
		<!-- Template CSS Files  -->
		<link href="asset/font-awesome/css/font-awesome.min.css" rel="stylesheet">
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
    	<!--tabel-->
		<link href="asset/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
    	<link href="asset/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

		
		<!-- Fav and touch icons -->
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/fav-144.html">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/fav-114.html">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/fav-72.html">
		<link rel="apple-touch-icon-precomposed" href="images/fav-57.html">
		<link rel="shortcut icon" href="images/fav.html">
		
	</head>
	<body>
	<!-- Header Starts -->
		<header class="main-header">
		<!-- Nested Container Starts -->
			<div class="container">
			<!-- Top Bar Starts -->
				
			<!-- Top Bar Ends -->
			<!-- Navbar Starts -->
				<nav id="nav" class="navbar navbar-default" role="navigation">
					<div class="container-fluid">
					<!-- Navbar Header Starts -->
						<div class="navbar-header">
						<!-- Collapse Button Starts -->
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						<!-- Collapse Button Ends -->
						<!-- Logo Starts -->
							<a href="#" class="navbar-brand">
								<i class="fa fa-heartbeat"></i>
								Diagnosis Penyakit pada Anak
							</a>
						<!-- Logo Ends -->
						</div>
					<!-- Navbar Header Ends -->
					<!-- Navbar Collapse Starts -->
						<div class="navbar-collapse collapse">
							<ul class="nav navbar-nav navbar-right">
								<!--  -->
									<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										<?php echo $_SESSION['username'];?> 
									</a>
									<ul class="dropdown-menu" role="menu">
										<li><a href="?p=gantipass&username=<?php echo $_SESSION['username']; ?>">Ganti password</a></li>
										<li><a onclick="return confirm('Anda Yakin Ingin Keluar?')" href="logout.php">Logout</a></li>
									</ul>
								</li>
<!--  -->

							
						</div>
					<!-- Navbar Collapse Ends -->
					</div>
				</nav>
			<!-- Navbar Ends -->
			</div>
		<!-- Nested Container Ends -->
		</header>
	<!-- Header Ends -->
	<!-- Slider Section Starts -->
		<section class="slider clearfix">
			<div id="camera_wrap_1" class="camera_wrap camera_white_skin" style="display: block; height: 300px;">
			<!-- Slide #1 Starts -->
				<div data-src="images/slider/1.jpg">
					<div class="camera_caption fadeFromLeft hidden-sm hidden-xs">
						<h2>Be Healty</h2>
						<h2>Eat well, <span>Life Well</span></h2>
					</div>
				</div>
			<!-- Slide #1 Ends -->
			<!-- Slide #2 Starts -->
				<div data-src="images/slider/2.png">
					<div class="camera_caption fadeIn hidden-sm hidden-xs">
						<h2>Lebih Baik Mencegah</h2>
						<h2><span>Daripada Mengobati</span></h2>
					</div>
				</div>
			<!-- Slide #2 Ends -->
            <!-- Slide #3 Starts -->
				<div data-src="images/slider/3.jpg">
					<div class="camera_caption fadeIn hidden-sm hidden-xs">
						<h2>Menuju Indonesia Sehat</h2>
					</div>
				</div>
			<!-- Slide #3 Ends -->
			</div>
		</section>
	<!-- Slider Section Ends -->
	
	<!-- Main Container Starts -->
		<div class="container main-container">
		<!-- Services Tab Starts -->
			<div class="tabs-wrap">
			<!-- Nav Tabs Starts -->
				<ul class="nav nav-tabs">
					<li class="active">
						<a href="?p=home" >
							<div class="icon hidden-sm hidden-xs">
								<i class="glyphicon fa fa-fw fa-home" width="50px"></i>
							</div>
							<h5>Home</h5>
						</a>
					</li>
					<li>
						<a href="?p=diagnosa&&act=diagnosa&&induk=" width="50px">
							<div class="icon hidden-sm hidden-xs">
								<img src="images/icons/stethoscope.png" alt="Dental Care">
							</div>
							<h5>Diagnosis</h5>
						</a>
					</li>
					<li>
						<a href="?p=petunjuk" >
							<div class="icon hidden-sm hidden-xs">
								<i class="glyphicon fa fa-fw fa-question" width="50px"></i>
							</div>
							<h5>Petunjuk Penggunaan</h5>
						</a>
					</li>
					<li>
						<a href="?p=galeri" >
							<div class="icon hidden-sm hidden-xs">
								<i class="glyphicon fa fa-fw fa-picture-o" width="50px"></i>
							</div>
							<h5>Galeri</h5>
						</a>
					</li>
					<li>
						<a href="?p=about" >
							<div class="icon hidden-sm hidden-xs">
								<i class="glyphicon fa fa-fw fa-info" width="50px"></i>
							</div>
							<h5>Info</h5>
						</a>
					</li>
					<li>
						<a href="?p=history" >
							<div class="icon hidden-sm hidden-xs">
								<i class="glyphicon fa fa-fw fa-file" width="50px"></i>
							</div>
							<h5>Histori</h5>
						</a>
					</li>
				</ul>
			<!-- Nav Tabs Ends -->
			<!-- Tab Content Starts -->
			
		<!-- Nested Container Starts -->
			<div class="container">
				
					<?php
						include "config/class_paging1.php";
                        include "config/fungsi_thumb.php";
                        include "config/validasi.php";
                        include "config/koneksi.php";
                        include "konten.php";
                        
                 ?>	
						
				<!-- Tab #6 Ends -->
				</div>
			<!-- Tab Content Ends -->
			</div>
		<!-- Services Tab Ends -->
		</div>
	<!-- Main Container Ends -->
	<!-- Footer Starts -->
		<footer class="main-footer">
		<!-- Footer Area Starts -->
		
		<!-- Footer Area Ends -->
		<!-- Copyright Starts -->
			<div class="copyright">
				<div class="container clearfix">
					<p class="pull-left">
						&copy; Copyright 2016. <span>Sistem Pakar Diagnosa Penyakit Umum pada Baita Berbasis Web</span>
					</p>
				</div>
			</div>
		<!-- Copyright Ends -->
		</footer>
	<!-- Footer Ends -->
	<!-- Template JS Files -->
	<script src="js/jquery-1.11.3.min.js"></script>
	<script src="js/jquery-migrate-1.2.1.min.js"></script>	
	<script src="js/bootstrap.min.js"></script>
	<script src="js/plugins/camera/js/jquery.mobile.customized.min.js"></script>
	<script src="js/plugins/camera/js/jquery.easing.1.3.js"></script>
	<script src="js/plugins/camera/js/camera.min.js"></script>	
	<script src="js/plugins/shuffle/jquery.shuffle.modernizr.min.js"></script>
	<script src="js/plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
	<script src="asse/maps.googleapis.com/maps/api/js"></script>	
	<script src="js/custom.js"></script>	
	<script src="asset/bower_components/datatables/media/js/jquery.dataTables.min.js"></script><!-- DataTables JavaScript -->
    <script src="asset/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>
	</body>
	

<!-- Mirrored from sainathchillapuram.com/BS/mediplus/hosptails/html-fullwidth/services.html by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 17 Mar 2016 06:57:55 GMT -->
</html>