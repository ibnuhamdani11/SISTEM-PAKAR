<?php
//  koneksi database.
include_once "config/koneksi.php";
//penambahan  error reporting. 
error_reporting(E_ALL ^ E_NOTICE);
?>
<?php
if ($_GET['act'] == 'lupapass') {
  # code...
  ?>
   <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="#">Lupa Password</a></li>
      </ol>
<section class="featured-doctors">
  <div class="panel-body">                              
    <form class="form-horizontal" role="form" method="POST" action="" enctype="multipart/form-data">
      <div class="form-group">
      <label class="col-lg-3 col-sm-3 control-label">Pilih Pertanyaan 1</label>
        <div class="col-lg-6">
          <div class="iconic-input right">
            <select class="form-control input-sm m-bot15" name="pertanyaan">   
              <option value=''>- Pilih Pertanyaan -</option>                                              
              <?php
                $tampil="SELECT * FROM pertanyaan  ORDER by id_pertanyaan asc";
                $qryTampil=mysqli_query($titid, $tampil);
                while ($s=mysqli_fetch_array($qryTampil)) {
              ?>
              <option value="<?php echo $s['id_pertanyaan']; ?>"><?php echo $s['nm_pertanyaan']; ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
      </div>
    <div class="form-group">
      <label class="col-lg-3 col-sm-3 control-label">Jawaban</label>
        <div class="col-lg-6">
          <div class="iconic-input right">
            <span id="biasa4"><input type="text" class="form-control" placeholder="Jawaban" name="jawaban">
            <?php alert_biasa();?></span> 
        </div>
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-3 col-sm-3 control-label">Pilih Pertanyaan 2</label>
        <div class="col-lg-6">
          <div class="iconic-input right">
            <select class="form-control input-sm m-bot15" name="pertanyaan2">   
              <option value=''>- Pilih Pertanyaan -</option>                                              
              <?php
                $tampil="SELECT * FROM pertanyaan  ORDER by id_pertanyaan asc";
                $qryTampil=mysqli_query($titid, $tampil);
                while ($s=mysqli_fetch_array($qryTampil)) {
              ?>
              <option value="<?php echo $s['id_pertanyaan']; ?>"><?php echo $s['nm_pertanyaan']; ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
      </div>
    <div class="form-group">
      <label class="col-lg-3 col-sm-3 control-label">Jawaban 2</label>
        <div class="col-lg-6">
          <div class="iconic-input right">
            <span id="biasa5"><input type="text" class="form-control" placeholder="Jawaban" name="jawaban2">
            <?php alert_biasa();?></span> 
        </div>
      </div>
    </div> 
    <div class="form-group">
      <div class="col-lg-offset-3 col-lg-9">
        <input type="reset" class="btn btn-danger" value="Reset">
        <input type="submit" class="btn btn-primary" value="Cari" name="cari">
      </div>
    </div> 
    </form>
  </div>  
</section>

<?php }
biasa();

if ($_GET['act'] == 'gantipass') {
  # code...
  ?>
  <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="#">Ganti Password</a></li>
      </ol>
<section class="featured-doctors">
  <div class="panel-body">     
      <h4> Masukkan Password Baru</h4>
      <form class="form-horizontal" role="form" method="POST" action="" enctype="multipart/form-data">
        <div class="form-group">
          <label class="col-lg-3 col-sm-3 control-label">Password Lama</label>
          <div class="col-lg-6">
            <div class="iconic-input right">
              <?php
                 $sql = mysqli_query($titid, "SELECT * FROM user WHERE id_user='$_GET[id_user]'") or die (mysqli_error());
                $tampil_cari=mysqli_fetch_array($sql);
              ?>
              <span id="biasa1"><input type="password" readonly="readonly" class="form-control" name="pass1"  value="<?php echo $tampil_cari[password];?>">
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
<?php } 
biasa();


$pertanyaan = mysqli_real_escape_string(@$_POST['pertanyaan']);
$pertanyaan2 = mysqli_real_escape_string(@$_POST['pertanyaan2']);
$jawaban = mysqli_real_escape_string(@$_POST['jawaban']);
$jawaban2 = mysqli_real_escape_string(@$_POST['jawaban2']);

if (isset($_POST['cari'])) {
  # code...
  $cari=mysqli_query($titid, "SELECT * FROM user WHERE pertanyaan='$pertanyaan' AND jawaban='$jawaban' AND pertanyaan2='$pertanyaan2' AND jawaban2='$jawaban2'") or die (mysqli_error());
    if(mysqli_num_rows($cari)==1){
      $tampil_cari=mysqli_fetch_array($cari);
      ?>
      <!-- pesan -->
      <script type="text/javascript">
/*    alert('username anda adalah "<?php echo $tampil_cari[username];?>" password anda adalah "<?php echo $tampil_cari[password]; ?>"');
*/    window.location.href = "index.php?p=lupapass&&act=gantipass&&id_user=<?php echo $tampil_cari[id_user]?>";
    </script>
   <?php
  }else{
    ?>
      <!-- pesan -->
      <script type="text/javascript">
    alert('Pertanyaan dan Jawaban tidak cocok. Silahkan Ulangi');
    </script>
   <?php
  }
}
$pass1 = mysqli_real_escape_string(@$_POST['pass1']);
$pass2 = mysqli_real_escape_string(@$_POST['pass2']);
$pass3 = mysqli_real_escape_string(@$_POST['pass3']);
$session_id_user= @$_GET['id_user'];
// variable act
$simpan = @$_POST['simpan'];
if ($simpan) {
  if ($pass2!=$pass3) {
?>
<script type="text/javascript">
    alert('Ulangi Password Tidak Sama Dengan Password Baru, Mohon Cek kembali');
    </script>
    <?php
  }
  else {
    $query = mysqli_query($titid, "SELECT * FROM user WHERE password='$pass1' AND id_user='$session_id_user'") or die (mysqli_error());
    if(mysqli_num_rows($query)>=1){
      mysqli_query($titid, "UPDATE user SET password='$pass2' WHERE id_user='$session_id_user'") or die(mysqli_error());
      ?>
      <!-- pesan -->
      <script type="text/javascript">
    alert('Ganti Password Berhasil, Klik Ok untuk Login Kembali');
    window.location.href = "index.php";
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