
<?php
	session_start();
	if (!isset($_SESSION['username'])) {
		# code...
	?>
	    <script language="JavaScript">
	    alert('Anda Belum Login, Silahkan Login Terlebih Dahulu!');
	    window.location='../index.php';
	    </script>
<?php
	}
?>
<html lang="en">

<head>
	<script type="text/javascript" src="../tinymce/tiny_mce.js"></script>
		<script type="text/javascript">
tinyMCE.init({
         // General options
         mode : "textareas",
         theme : "advanced",
});
</script>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		
		<title>Hospitals - Bootstrap 3 Template</title>
		
		<!-- Bootstrap -->
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		
		<!-- Google Web Fonts -->
		<link href="../asset/fonts.googleapis.com/css0733.css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic" rel="stylesheet" type="text/css">
		<link href="../asset/fonts.googleapis.com/cssd264.css?family=Roboto:400,100,300,100italic,300italic,400italic,500,500italic,700,700italic,900,900italic" rel="stylesheet" type="text/css">
		
		<!-- Template CSS Files  -->
		<link href="../asset/font-awesome/css/font-awesome.min.css" rel="stylesheet">
		<link href="../js/plugins/camera/css/camera.css" rel="stylesheet">
		<link href="../js/plugins/magnific-popup/magnific-popup.css" rel="stylesheet">
		<link href="../css/style.css" rel="stylesheet">
		<link href="../css/responsive.css" rel="stylesheet">
		
		
		<!-- Fav and touch icons -->
		
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="../images/fav-144.html">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="../images/fav-114.html">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="../images/fav-72.html">
		<link rel="apple-touch-icon-precomposed" href="../images/fav-57.html">
		<link rel="shortcut icon" href="../images/fav.html">
		<!-- tabel-->
		<link href="../asset/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
    	<link href="../asset/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
    	<!-- validasi-->
    	<script src="../asset/SpryAssets/SpryValidationConfirm.js" type="text/javascript"></script>
    	<link href="../asset/SpryAssets/SpryValidationConfirm.css" rel="stylesheet" type="text/css" />
    	<script src="../asset/SpryAssets/SpryValidationPassword.js" type="text/javascript"></script>
    	<link href="../asset/SpryAssets/SpryValidationPassword.css" rel="stylesheet" type="text/css" />
    	<script src="../asset/SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
    	<link href="../asset/SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
    	<script src="../asset/SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
    	<link href="../asset/SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
    	<script src="../asset/SpryAssets/SpryValidationTextfield.js" type="text/javascript"></script>
    	<link href="../asset/SpryAssets/SpryValidationTextfield.css" rel="stylesheet" type="text/css" />

	</head>
	<body>
	<!-- Header Starts -->
		<header class="main-header">
		<!-- Nested Container Starts -->
			<div class="container">
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
							<a href="index-2.html" class="navbar-brand">
								<i class="fa fa-heartbeat"></i>
								Expert System
							</a>
						<!-- Logo Ends -->
						</div>
					<!-- Navbar Header Ends -->
					<!-- Navbar Collapse Starts -->

						<div class="navbar-collapse collapse">
							<ul class="nav navbar-nav navbar-right">
								<li><a href="?p=home">Home</a></li>
								<li><a href="?p=gejala&&act=read">Gejala</a></li>
								<li><a href="?p=penyakit&&act=read">Penyakit</a></li>
								
								<!--  -->
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										Rule 
									</a>
									<ul class="dropdown-menu" role="menu">
										<li><a href="?p=rule&&act=relasi">Relasi Gejala</a></li>
										<li><a href="?p=bobot&&act=bobot_gejala">Bobot Gejala</a></li>
									</ul>
								</li>
								<li><a href="?p=hasil&&act=read">Hasil Diagnosa</a></li>
								<!--  -->
								<!-- <li><a href="index.php?p=info&&act=read">Info</a></li> -->
								<!-- <li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										Pengguna 
									</a>
									<ul class="dropdown-menu" role="menu">
										<li><a href="index.php?p=pakar&&act=read">Pakar</a></li>
										<li><a href="index.php?p=member&&act=read">Pasien</a></li>
									</ul>
								</li> -->
								<!-- <li><a href="index.php?p=pertanyaan&&act=read">Pertanyaan</a></li> -->
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										<?php echo $_SESSION['nama'];?> 
									</a>
									<ul class="dropdown-menu" role="menu">
										<li><a href="?p=gantipassword&username=<?php echo $_SESSION['username']; ?>">Ganti Password</a></li>
										<li><a onclick="return confirm('Apakah Anda Yakin Ingin Keluar Dari Aplikasi ini?')" href="../logout.php">Logout</a></li>
									</ul>
								</li>
							</ul>
						</div>
					<!-- Navbar Collapse Ends -->
					</div>
				</nav>
			<!-- Navbar Ends -->
			</div>
		<!-- Nested Container Ends -->
		</header>
	<!-- Header Ends -->
	<!-- Main Banner Starts -->
		<div class="main-banner three">
			<div class="container">
				<h2><span>Diagnosis Penyakit pada Anak</span></h2>
			</div>
		</div>
	<!-- Main Banner Ends -->
	
	<!-- Meet Our Doctors Section Starts -->
		<div class="container main-container">
		<!-- Services Tab Starts -->
			<div class="tabs-wrap">
				
				<?php
						include "../config/class_paging1.php";
                        include "../config/fungsi_thumb.php";
                        include "../config/koneksi.php";
                        include "../config/validasi.php";
                        include "konten.php";
                 ?>
			</div>
		<!-- Nested Container Ends -->
		</section>
		</div>
		</body>

	<!-- Main Container Ends -->
	<!-- Footer Starts -->
		<footer class="main-footer">
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
	<script src="../js/jquery-1.11.3.min.js"></script>
	<script src="../js/jquery-migrate-1.2.1.min.js"></script>	
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/plugins/camera/js/jquery.mobile.customized.min.js"></script>
	<script src="../js/plugins/camera/js/jquery.easing.1.3.js"></script>
	<script src="../js/plugins/camera/js/camera.min.js"></script>	
	<script src="../js/plugins/shuffle/jquery.shuffle.modernizr.min.js"></script>
	<script src="../js/plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
	<script src="../asset/maps.googleapis.com/maps/api/js"></script>	
	<script src="../js/custom.js"></script>	
	<script src="../asset/bower_components/datatables/media/js/jquery.dataTables.min.js"></script><!-- DataTables JavaScript -->
    <script src="../asset/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>
	</body>

<!-- Mirrored from sainathchillapuram.com/BS/mediplus/hosptails/html-fullwidth/index.html by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 17 Mar 2016 06:57:40 GMT -->
</html>