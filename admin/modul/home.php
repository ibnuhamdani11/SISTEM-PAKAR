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
<ol class="breadcrumb">
        <li class="active"><i class="fa fa-dashboard"><a href="#"></i> Home</a></li>
       </ol>
	<!-- About Featured Section Starts -->
		<section class="about-featured parallax">
			<div class="container">
				<h3 class="lite">Selamat datang "<?php echo $_SESSION['nama'];?>"</h3>
				<h2 class="lite">Di Sistem Pakar <span>Diagnosa Penyakit Umum pada Balita</span></h2>
				<ul class="list-unstyled list row">
				<!-- List #1 Starts -->
				</ul>
			</div>
		</section>
	<!-- About Featured Section Ends -->
	<!-- Starts -->
	