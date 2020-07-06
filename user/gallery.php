
	<!-- Main Container Starts -->
		<div class="container main-container">
			<ol class="breadcrumb">
		        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
		        <li class="active"><a href="#">Galeri</a></li>
	      	</ol>
		<!-- Gallery Grid Starts -->
			<div class="gallery-grid">
				<div class="row">
				<!-- Gallery Image #1 Starts -->
				<?php
                  $query_tampil = mysqli_query($titid, "SELECT * FROM tabel_penyakit ORDER BY kode_penyakit");
                  while ($data_tampil = mysqli_fetch_array($query_tampil)) {
                    ?>
					<div class="col-md-4 col-sm-6 col-xs-12">
					
						<div class="hover-content">
						
                        	<img src="images/penyakit/<?php echo $data_tampil['gambar']; ?>" alt="Gallery Image" class="img-responsive" >

							<div class="overlay">
								<a href="images/penyakit/<?php echo $data_tampil['gambar']; ?>" class="btn btn-secondary zoom"><i class="fa fa-image"></i></a>
							</div>
							
						</div>
						
					</div>
					<?php
                  }
                ?>
				</div>
			</div>
		</div>	
				