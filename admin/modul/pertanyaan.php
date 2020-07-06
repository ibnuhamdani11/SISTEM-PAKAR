<?php
  //  koneksi database.
  include_once "../config/koneksi.php";

  //penambahan  error reporting. 
  error_reporting(E_ALL ^ E_NOTICE);
?>
<?php
  if ($_GET['act'] == 'read') {
  # code...
?>
<ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
  <li class="active"><a href="#">Pertanyaan</a></li>
</ol></br>
<!-- Main content -->
<section class="content">
  <a href="index.php?p=pertanyaan&&act=add"><button type="button" class="btn btn-block btn-primary"><i class="fa fa-plus"></i> Tambah Pertanyaan</button></a>
  <div class="box">
    <div class="box-header">
      <h4 class="box-title">Read Data Pertanyaan</h4>
    </div>
      <!-- /.box-header -->
      <div class="panel-body">
        <div class="table-responsive">
        <div class="dataTable_wrapper">
          <table class="table table-striped table-bordered table-hover" id="dataTables-example">
          
            <thead>
              <tr>
                <th width="3%">No</th>
                <th width="15%">Pertanyaan</th>
                <th width="5%">Edit</th>
                <th width="5%">Hapus</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $no = 0;
                $query_tampil = mysqli_query($titid, "SELECT * FROM pertanyaan ORDER BY id_pertanyaan");
                while ($data_tampil = mysqli_fetch_array($query_tampil)) {
                # code...
                $no++;
              ?>
              <tr>
                <td>
                  <?php echo $no; ?>
                </td>
                <td>
                <?php echo $data_tampil['nm_pertanyaan']; ?>
                </td>
                <td><a href="?p=pertanyaan&&act=edit&id_edit=<?php echo $data_tampil['id_pertanyaan']; ?>"><button type="button" class="btn btn-block btn-warning">
                  <i class="fa fa-fw fa-edit"></i></button></a>
                </td>
                <td><a onclick="return confirm('Yakin ingin menghapus data ?')" href="index.php?p=pertanyaan&id_hapus=<?php echo $data_tampil['id_pertanyaan']; ?>">
                  <button type="button" class="btn btn-block btn-danger"><i class="fa fa-fw fa-trash-o"></i></button></a>
                </td>
              </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
      </div>
    </div>
    </div>
        <!-- /.box-body -->
  </div>
      <!-- /.box -->
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
  <ol class="breadcrumb">
    <li><a href="index.php?p=home"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="index.php?p=pertanyaan&&act=read"> Data Pertanyaan</a></li>
    <li class="active"><a href="#">Tambah Pertanyaan</a></li>
  </ol>
</section>
<section class="featured-doctors">
  <div class="panel-body">                              
    <form class="form-horizontal" role="form" method="POST" action="" enctype="multipart/form-data">
    <div class="form-group">
        <label class="col-lg-3 col-sm-3 control-label">Pertanyaan</label>
          <div class="col-lg-6">
            <div class="iconic-input right">
              <span id="biasa1"><input type="text" class="form-control" placeholder="Pertanyaan" name="nm_pertanyaan" value="">
              <?php alert_biasa();?></span>
            </div>
          </div>
      </div> 
      <div class="form-group">
        <div class="col-lg-offset-3 col-lg-9">
          <button type="reset" class="btn btn-danger"><i class="fa fa-arrow-circle-left"></i>Reset</button>
          <input type="submit" class="btn btn-primary" value="Simpan" name="simpan">
        </div>
      </div> 
    </form>
  </div>  
  <?php
  biasa();
    }
    if ($_GET['act'] == 'edit') {
    # code...
    $id_edit = @$_GET['id_edit'];
    $sql = mysqli_query($titid, "SELECT * FROM pertanyaan WHERE id_pertanyaan = '$id_edit'") or die (mysqli_error());
    $dataEdit = mysqli_fetch_array($sql); 
  ?>
</section>
<section class="featured-doctors">
  <div class="panel-body">                              
    <form class="form-horizontal" role="form" method="POST" action="" enctype="multipart/form-data">
    <div class="form-group">
      <label class="col-lg-3 col-sm-3 control-label">Pertanyaan</label>
          <div class="col-lg-6">
            <div class="iconic-input right">
              <span id="biasa1"><input type="text" class="form-control" placeholder="Pertanyaan" name="nm_pertanyaan" value="<?php echo $dataEdit['nm_pertanyaan'];?>">
              <?php alert_biasa();?></span>
            </div>
          </div>
      </div> 
      <div class="form-group">
        <div class="col-lg-offset-3 col-lg-9">
          <button type="reset" class="btn btn-danger"><i class="fa fa-arrow-circle-left"></i>Reset</button>
          <input type="submit" class="btn btn-primary" value="Simpan" name="edit">
        </div>
      </div> 
    </form>
  </div>  
  <?php
  biasa();
    }
    // fungsi
    $nm_pertanyaan = @$_POST['nm_pertanyaan'];

    $simpan = @$_POST['simpan'];
    $edit = @$_POST['edit'];
    if($simpan){
      if ($nm_pertanyaan=="") {
    # code...
  ?>
  <script type="text/javascript">
    alert("Inputan tidak boleh ada yang kosong ");
  </script>
  <?php
    } else {
    
      $querysimpan =mysqli_query($titid, "INSERT INTO pertanyaan values('','$nm_pertanyaan')") or die (mysqli_error());
       if ($querysimpan) {
  ?>
  <script type="text/javascript">
    alert("Tambah data berasil");
    window.location.href = "index.php?p=pertanyaan&&act=read";
  </script>
  <?php
    } else {
  ?>
  <script type="text/javascript">
    alert("Data Pertanyaan gagal diupload ");
  </script>
  <?php
     }
   }
   }if ($edit) {
  // kondisi jika isian kosong
  if ($nm_pertanyaan=="") {
    ?>
    <!-- pesan -->
    <script type="text/javascript">
    alert('Inputan tidak boleh ada yang kosong.');
    </script>
    <?php
  }
  // kondisi jika isian sudah diisi semua
  else {
    $querysimpan_edit = mysqli_query($titid, "UPDATE pertanyaan SET nm_pertanyaan= '$nm_pertanyaan' WHERE id_pertanyaan='$id_edit'") or die (mysqli_error());
    // kondisi jika query berhasil
    if ($querysimpan_edit) {
      ?>
      <!-- pesan -->
      <script type="text/javascript">
    alert('Edit data berhasil');
    window.location.href = "index.php?p=pertanyaan&&act=read";
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
   
  // kondisi jika hapus.
  
  # code...
     if (isset($_GET['id_hapus'])) {
    $id_hapus=$_GET['id_hapus'];
    # code...
    $hapus = mysqli_query($titid, "DELETE FROM pertanyaan WHERE id_pertanyaan='".$id_hapus."'");
    if ($hapus) {
        # code...
        ?>
                 <script type="text/javascript">
                alert("Data berasil dihapus");
                window.location.href = "index.php?p=pertanyaan&&act=read";
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
    </section>
    