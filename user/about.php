
<ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="#">Info</a></li>
      </ol>
	<!-- About Featured Section Starts -->
		<section class="about-featured parallax">
			<div class="container">
				<h3 class="lite">Get Well Soon</h3>
				<ul class="list-unstyled list row">
				<!-- List #1 Starts -->
				
<?php
$query_tampil = mysqli_query($titid, "SELECT * FROM info ORDER BY id_info");
while ($data_tampil = mysqli_fetch_array($query_tampil)) {
 
?>
					<li class="col-md-4 col-sm-6 col-xs-12">
						<i class="fa fa-trophy"></i>
						<h4><?php echo $data_tampil['judul']; ?></h4>
						<p>
							<?php echo $data_tampil['nm_info']; ?>
						</p>
					</li>
				<!-- List #1 Ends -->
				<!-- List #2 Starts -->
					<?php } ?>
				<!-- List #6 Ends -->
				</ul>
			</div>
			
		</section>
	<!-- About Featured Section Ends -->
	<!-- Starts -->
	