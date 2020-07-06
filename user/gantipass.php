<ol class="breadcrumb">
        <li><a href="index.php?p=home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="#">Ganti Password</a></li>
      </ol>
<section class="featured-doctors">
  <div class="panel-body">     
      <form class="form-horizontal" role="form" method="POST" action="" enctype="multipart/form-data">
        <div class="form-group">
          <label class="col-lg-3 col-sm-3 control-label">Password Lama</label>
          <div class="col-lg-6">
            <div class="iconic-input right">
              <span id="biasa1"><input type="password" class="form-control" name="pass1" placeholder="Password">
              <?php alert_biasa();?></span>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 col-sm-3 control-label">Password Baru</label>
          <div class="col-lg-6">
            <div class="iconic-input right">
              <span id="biasa2"><input type="password" class="form-control" name="pass2" placeholder="Password">
              <?php alert_biasa();?></span>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 col-sm-3 control-label">Ulangi Password Baru</label>
          <div class="col-lg-6">
            <div class="iconic-input right">
              <span id="biasa3"><input type="password" class="form-control" name="pass3" placeholder="Password">
              <?php alert_biasa();?></span>
            </div>
          </div>
        </div>
        <!-- /.box-body -->
        <div class="form-group">
          <div class="col-lg-offset-3 col-lg-9">
            <input type="reset" class="btn btn-danger" value="Reset">
            <input type="submit" class="btn btn-primary" value="Simpan" name="simpan">
          </div>
        </div> 
      </form>
    </div>
</section> 
  <?php
  biasa();

  
// fungsi - fungsi
// membuat variable
$pass1 = mysqli_real_escape_string(@$_POST['pass1']);
$pass2 = mysqli_real_escape_string(@$_POST['pass2']);
$pass3 = mysqli_real_escape_string(@$_POST['pass3']);
$session_id_user= @$_SESSION['id_user'];
// variable act
$simpan = @$_POST['simpan'];

// kondisi jika simpan
if ($simpan) {
  if ($pass2!=$pass3) {
    ?>
    <!-- pesan -->
    <script type="text/javascript">
    alert('Ulangi Password Tidak Sama Dengan Password Baru, Mohon Cek kembali');
    </script>
    <?php
  }
  else {
    $query = mysqli_query($titid, "SELECT * FROM user WHERE password='$pass1' AND id_user='$session_id_user'") or die (mysqli_error());
    if(mysqli_num_rows($query)==1){
      mysqli_query($titid, "UPDATE user SET password='$pass2' WHERE id_user='$session_id_user'") or die(mysqli_error());
      ?>
      <!-- pesan -->
      <script type="text/javascript">
    alert('Ganti Password Berhasil, Klik Ok untuk Login Kembali');
    window.location.href = "logout.php";
    </script>
   <?php
    }
    // kondisi jika query gagal
    else {
       ?>
       <!-- pesan -->
      <script type="text/javascript">
    alert('Password Yang Anda Masukan Tidak Ada Yang Cocok');
    </script>
   <?php 
    }
  }
}
?>
