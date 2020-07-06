<script type="text/javascript" src="tinymce/tiny_mce.js"></script>
<script type="text/javascript">
    tinyMCE.init({
             // General options
             mode : "textareas",
             theme : "advanced",
    });
</script>

<?php
//  koneksi database.
include_once "../config/koneksi.php";

//penambahan  error reporting. 
error_reporting(E_ALL ^ E_NOTICE);
?>
<section class="content-header">
  <?php
  if ($_GET['act'] == 'read') {
    # code...
    ?>
        <ol class="breadcrumb">
          <li><a href="index.php?p=home">Home</a></li>
          <li class="active"><a href="#">Member</a></li>
        </ol>
</section> </br>

    <!-- Main content -->
<section class="content">
  <a href="index.php?p=member&&act=add"><button type="button" class="btn btn-block btn-primary"><i class="fa fa-fw fa-user-plus"></i>Tambah User</button></a>
  <div class="box">
    <div class="box-header">
      <h4 class="box-title">Data User</h4>
    </div>
    <!-- /.box-header -->
     <div class="panel-body">
      <div class="table-responsive">
        <div class="dataTable_wrapper">
          <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
              <tr>
                <th width="5%">No</th>
                <th width="10%">Nama</th>
                <th width="5%">Umur</th>
                <th width="10%">Jenis Kelamin</th>
                <th width="10%">No. Hp</th>
                <th width="15%">Alamat</th>
                <th width="5%">Username</th>
                <th width="10%">Password</th>
                <th width="5%">Edit</th>
                <th width="5%">Hapus</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $p = new eeee;
            $batas  =  5;
            $posisi = $p->cariPosisi($batas);
                $no = 0;
                $query_tampil = mysqli_query("SELECT * FROM user ORDER BY id_user ASC limit $posisi, $batas");
                  (mysqli_error());
                while ($data_tampil = mysqli_fetch_array($query_tampil)) {
                  # code...
                  $no++;
                  ?>
                  <tr>
                    <td>
                      <?php echo $no; ?>
                    </td>
                    <td>
                      <?php echo $data_tampil['nama']; ?>
                    </td>
                     <td>
                      <?php echo $data_tampil['umur']; ?>
                    </td>
                    <td>
                      <?php echo $data_tampil['jk']; ?>
                    </td>
                     <td>
                      <?php echo $data_tampil['no_hp']; ?>
                    </td>
                    <td>
                      <?php echo $data_tampil['alamat']; ?> 
                    </td>
                    <td>
                      <?php echo $data_tampil['username']; ?>
                    </td>
                    <td>
                      <?php echo $data_tampil['password']; ?>
                    </td>
                    
                   <td><a href="index.php?p=member&&act=edit&id_edit=<?php echo $data_tampil['id_user']; ?>"><button type="button" class="btn btn-block btn-warning">
                      <i class="fa fa-fw fa-edit"></i></button></a>
                    </td>
                    <td><a onclick="return confirm('Yakin ingin menghapus data ?')" href="index.php?p=member&id_hapus=<?php echo $data_tampil['id_user']; ?>">
                      <button type="button" class="btn btn-block btn-danger"><i class="fa fa-fw fa-trash-o"></i></button></a>
                    </td>
                    </tr>
                  <?php
                    }
                  ?>
              </tbody>
            </table>
            <div class="pagination">
              <ul class="pagination">
                <?php
                  $jmldata     = mysqli_num_rows(mysqli_query("SELECT * FROM user "));
                  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
                  $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);
                  echo "  $linkHalaman ";
                ?>
              </ul>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
        <!-- /.col -->
  </div>
      <!-- /.row -->
  <?php
  }
  ?>
<?php
if ($_GET['act'] == 'add') {
  # code...
  ?>

<section class="featured-doctors">
  <div class="panel-body">                              
    <form class="form-horizontal" role="form" method="POST" action="" enctype="multipart/form-data" >
                                    
                                    <div class="form-group">
                                        <label class="col-lg-3 col-sm-3 control-label">Nama Lengkap</label>
                                        <div class="col-lg-6">
                                            <div class="iconic-input right">
                                                <span id="biasa1"><input type="text" class="form-control" placeholder="Nama" name="nama">
                                                <?php alert_biasa();?></span> 
                                            </div>
                                        </div>
                                    </div> 
                                     <div class="form-group">
                                        <label class="col-lg-3 col-sm-3 control-label">Umur</label> </br>
                                       <div class="col-lg-6">
                                          <span id="biasa2"><input type="text" class="form-control" placeholder="Umur" name="umur">
                                          <?php alert_biasa();?></span> 
                                      </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 col-sm-3 control-label">Jenis Kelamin</label> </br>
                                       <div class="col-lg-6">
                                          <input type="radio" name="jk" id="radio" value="laki-laki"> Laki-laki </br> <input type="radio" name="jk" id="radio" value="peremuan"> Perempuan
                                      </div>
                                    </div>
                                     <div class="form-group">
                                        <label class="col-lg-3 col-sm-3 control-label">No. HP</label> </br>
                                       <div class="col-lg-6">
                                          <span id="biasa3"><input type="text" class="form-control" value="+62" name="no_hp">
                                          <?php alert_biasa();?></span> 
                                      </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="col-lg-3 col-sm-3 control-label">Alamat</label>
                                        <div class="col-lg-6">
                                                <span id="area1"><textarea type="text" class="form-control" placeholder="Umur" name="alamat"></textarea>
                                            <?php alert_textarea();?></span> 
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <label class="col-lg-3 col-sm-3 control-label">Username</label>
                                        <div class="col-lg-6">
                                            <div class="iconic-input right">
                                                <span id="biasa4"><input type="text" class="form-control" placeholder="Username" name="username">
                                                <?php alert_biasa();?></span> 
                                            </div>
                                        </div>
                                    </div> 
                                   <div class="form-group">
                                        <label class="col-lg-3 col-sm-3 control-label">Password</label>
                                        <div class="col-lg-6">
                                            <div class="iconic-input right">
                                                <span id="biasa5"><input type="password" class="form-control" placeholder="Password" name="password">
                                                <?php alert_biasa();?></span> 
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                      <label class="col-lg-3 col-sm-3 control-label">Pilih Pertanyaan</label>
                                        <div class="col-lg-6">
                                          <div class="iconic-input right">
                                            <select class="form-control input-sm m-bot15" name="pertanyaan">   
                                              <option value=''>- Pilih Pertanyaan -</option>                                              
                                              <?php
                                               $tampil="SELECT * FROM pertanyaan  ORDER by id_pertanyaan asc";
                                                $qryTampil=mysqli_query($tampil);
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
textarea();
}
if ($_GET['act'] == 'edit') {
  # code...
    $id_edit = @$_GET['id_edit'];
    $sql = mysqli_query("SELECT * FROM user WHERE id_user = '$id_edit'") or die (mysqli_error());
    $dataEdit = mysqli_fetch_array($sql);
?>
<section class="featured-doctors">
  <div class="panel-body">                              
     <form class="form-horizontal" role="form" method="POST" action="" enctype="multipart/form-data">
                                    
                                    <div class="form-group">
                                        <label class="col-lg-3 col-sm-3 control-label">Nama Lengkap</label>
                                        <div class="col-lg-6">
                                            <div class="iconic-input right">
                                                <span id="biasa1"><input type="text" class="form-control" placeholder="Nama" name="nama" value="<?php echo $dataEdit['nama']; ?>">
                                                <?php alert_biasa();?></span>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <label class="col-lg-3 col-sm-3 control-label">Umur</label> </br>
                                       <div class="col-lg-6">
                                          <span id="biasa2"><input type="text" class="form-control" placeholder="Umur" name="umur" value="<?php echo $dataEdit['umur']; ?>">
                                          <?php alert_biasa();?></span>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 col-sm-3 control-label">Jenis Kelamin</label> </br>
                                         <div class="col-lg-6">
                                            <input type="radio" name="jk" id="radio" value="laki-laki"> Laki-laki </br> <input type="radio" name="jk" id="radio" value="peremuan"> Perempuan
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 col-sm-3 control-label">Alamat</label>
                                        <div class="col-lg-6">
                                          <textarea type="text" class="form-control" name="alamat" ><?php echo $dataEdit['alamat']; ?></textarea>
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <label class="col-lg-3 col-sm-3 control-label">Username</label>
                                        <div class="col-lg-6">
                                            <div class="iconic-input right">
                                                <span id="biasa3"><input type="text" class="form-control" value="<?php echo $dataEdit['username']; ?>" name="username">
                                                <?php alert_biasa();?></span>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <label class="col-lg-3 col-sm-3 control-label">Password</label>
                                        <div class="col-lg-6">
                                            <div class="iconic-input right">
                                                <span id="biasa4"><input type="text" class="form-control" value="<?php echo $dataEdit['password']; ?>" name="password">
                                                <?php alert_biasa();?></span>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                      <label class="col-lg-3 col-sm-3 control-label">Pilih Pertanyaan</label>
                                        <div class="col-lg-6">
                                          <div class="iconic-input right">
                                            <select class="form-control input-sm m-bot15" name="pertanyaan">   
                                              <option value=''>- Pilih Pertanyaan -</option>                                              
                                              <?php
                                               $tampil="SELECT * FROM pertanyaan  ORDER by id_pertanyaan asc";
                                                $qryTampil=mysqli_query($tampil);
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
                                      <label class="col-lg-3 col-sm-3 control-label">Pilih Pertanyaan</label>
                                        <div class="col-lg-6">
                                          <div class="iconic-input right">
                                            <select class="form-control input-sm m-bot15" name="pertanyaan2">   
                                              <option value=''>- Pilih Pertanyaan -</option>                                              
                                              <?php
                                               $tampil="SELECT * FROM pertanyaan  ORDER by id_pertanyaan asc";
                                                $qryTampil=mysqli_query($tampil);
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
                                                <span id="biasa4"><input type="text" class="form-control" placeholder="Jawaban" name="jawaban2">
                                                <?php alert_biasa();?></span> 
                                            </div>
                                        </div>
                                    </div> 
                                     <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-9">
                                            <input type="reset" class="btn btn-danger" value="Reset">
                                            <input type="submit" class="btn btn-primary" value="Simpan" name="edit">
                                        </div>
                                    </div> 
                                    </form>
  </div>  
</section>
<?php
biasa();
textarea();
}
// fungsi - fungsi
// membuat variable
$nama = @$_POST['nama'];
$umur=@$_POST['umur'];
$jk = @$_POST['jk'];
$no_hp=@$_POST['no_hp'];
$alamat=@$_POST['alamat'];
$username = @$_POST['username'];
$password = @$_POST['password'];
$pertanyaan=@$_POST['pertanyaan'];
$jawaban=@$_POST['jawaban'];
$pertanyaan2=@$_POST['pertanyaan2'];
$jawaban2=@$_POST['jawaban2'];

// variable act
$simpan = @$_POST['simpan'];
$edit = @$_POST['edit'];

// kondisi jika simpan
if ($simpan) {
  // kondisi jika isian kosong
  if ($nama == "" || $jk == "" || $alamat == "" || $username == "" || $password == ""|| $pertanyaan == "" || $jawaban == ""|| $pertanyaan2 == "" || $jawaban2 == "") {
    ?>
    <!-- pesan -->
    <script type="text/javascript">
    alert('Inputan tidak boleh ada yang kosong.');
    </script>
    <?php
  }
  // kondisi jika isian sudah diisi semua
  else {
    $querysimpan = mysqli_query("INSERT INTO user VALUES ('', '$nama', '$umur', '$jk', '$no_hp', '$alamat', '$username', '$password', '$pertanyaan', '$jawaban', '$pertanyaan2', '$jawaban2')") or die (mysqli_error());
    // kondisi jika query berhasil
    if ($querysimpan) {
      ?>
      <!-- pesan -->
      <script type="text/javascript">
    alert('Tambah data berhasil');
    window.location.href = "index.php?p=member&&act=read";
    </script>
   <?php 
    }
    // kondisi jika query gagal
    else {
       ?>
       <!-- pesan -->
      <script type="text/javascript">
    alert('Tambah data gagal');
    </script>
   <?php 
    }
  }
}if ($edit) {
  // kondisi jika isian kosong
  if ($nama == "" || $jk == "" || $alamat == "" || $username == "" || $password == ""|| $pertanyaan == "" || $jawaban == ""| $pertanyaan2 == "" || $jawaban2 == "") {
    ?>
    <!-- pesan -->
    <script type="text/javascript">
    alert('Inputan tidak boleh ada yang kosong.');
    </script>
    <?php
  }
  // kondisi jika isian sudah diisi semua
  else {
    $querysimpan_edit = mysqli_query("UPDATE user SET nama = '$nama', jk = '$jk', 
      alamat = '$alamat', username = '$username', password = '$password', pertanyaan='$pertanyaan', jawaban='$jawaban', pertanyaan2='$pertanyaan2', jawaban2='$jawaban2' WHERE id_user = '$id_edit'") or die (mysqli_error());
    // kondisi jika query berhasil
    if ($querysimpan_edit) {
      ?>
      <!-- pesan -->
      <script type="text/javascript">
    alert('Edit data berhasil');
    window.location.href = "index.php?p=member&&act=read";
    </script>
   <?php 
    }
    // kondisi jika query gagal
    else {
       ?>
       <!-- pesan -->
      <script type="text/javascript">
    alert('Edit data gagal');
    </script>
   <?php 
    }
  }
}
// fungsi hapus
    if (isset($_GET['id_hapus'])) {
    $id_hapus=$_GET['id_hapus'];
    # code...
    $hapus = mysqli_query($titid, "DELETE FROM user WHERE id_user='".$id_hapus."'");
    if ($hapus) {
        # code...
        ?>
                 <script type="text/javascript">
                alert("Data berasil dihapus");
                window.location.href = "index.php?p=member&&act=read";
                </script>
            <?php
            } else {
            ?>
                <script type="text/javascript">
                alert("Data gagal dihapus");
                </script>   
            <?php
    }
}
?>
 
    
