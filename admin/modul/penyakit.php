<?php
    //  koneksi database.
    include_once "../config/koneksi.php";

    //penambahan  error reporting. 
    error_reporting(E_ALL ^ E_NOTICE);

    function kdauto($tabel, $inisial){
      $struktur   = mysqli_query($titid, "SELECT * FROM $tabel");
      $field      = mysqli_field_name($struktur,0);
      $panjang    = mysqli_field_len($struktur,0);
      $qry  = mysqli_query($titid, "SELECT max(".$field.") FROM ".$tabel);
      $row  = mysqli_fetch_array($qry);
      if ($row[0]=="") {
        $angka=0;
        }
      else {
      $angka= substr($row[0], strlen($inisial));
      }
      $angka++;
      $angka      =strval($angka);
      $tmp  ="";
      for($i=1; $i<=($panjang-strlen($inisial)-strlen($angka)); $i++) {
        $tmp=$tmp."0";
        }
        return $inisial.$tmp.$angka;
    }
?>
<?php
  if ($_GET['act'] == 'read') {
  # code...
?>
<ol class="breadcrumb">
  <li><a href="?p=home"><i class="fa fa-dashboard"></i> Home</a></li>
  <li class="active"><a href="#">Penyakit</a></li>
</ol></br>

<!-- Main content -->
<section class="content">
  <a href="?p=penyakit&&act=add"><button type="button" class="btn btn-block btn-primary"><i class="fa fa-plus"></i>Tambah Penyakit</button></a>
  <div class="box">
    <div class="box-header">
      <h4 class="box-title">Data Penyakit</h4>
    </div>
      <!-- /.box-header -->
      <div class="panel-body">
        <div class="table-responsive">
        <div class="dataTable_wrapper">
          <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
              <tr>
                <th width="5%">No</th>
                <th>kode</th>
                <th>Nama Penyakit</th>
                <th>Definisi</th>
                <th>Penyebab</th>
                <th>Pengobatan/Pencegahan</th>
                <th>Gambar</th>
                <th width="10%">Edit</th>
                <th width="10%">Hapus</th>
              </tr>
            </thead>
            <tbody>
                <?php
            $p = new eeee;
            $batas  =  5;
            $posisi = $p->cariPosisi($batas);
                  $no = 0;
                  $query_tampil = mysqli_query($titid, "SELECT * FROM tabel_penyakit ORDER BY kode_penyakit ASC limit $posisi, $batas");
                  while ($data_tampil = mysqli_fetch_array($query_tampil)) {
                  # code...
                  $no++;
                ?>
                <tr>
                  <td>
                    <?php echo $no; ?>
                  </td>
                  <td>
                    <?php echo $data_tampil['kode_penyakit']; ?>
                  </td>
                  <td>
                    <?php echo $data_tampil['nm_penyakit']; ?>
                  </td>
                  <td>
                    <?php echo $data_tampil['definisi']; ?>
                  </td>
                  <td>
                    <?php echo $data_tampil['penyebab']; ?>
                  </td>
                  <td>
                  <?php echo $data_tampil['pengobatan']; ?>
                    </td>
                  <td>
                    <img src="../images/penyakit/<?php echo $data_tampil['gambar']; ?>" width="50px">
                  </td>
                  <td><a href="?p=penyakit&&act=edit&id_edit=<?php echo $data_tampil['kode_penyakit']; ?>"><button type="button" class="btn btn-block btn-warning">
                    <i class="fa fa-fw fa-edit"></i></button></a>
                  </td>
                  <td><a onclick="return confirm('Yakin ingin menghapus data ?')" href="?p=penyakit&id_hapus=<?php echo $data_tampil['kode_penyakit']; ?>">
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
                $jmldata     = mysqli_num_rows(mysqli_query($titid, "SELECT * FROM tabel_penyakit "));
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
  <ol class="breadcrumb">
    <li><a href="?p=home"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="?p=penyakit&&act=read"> Read Penyakit</a></li>
    <li class="active"><a href="#">Add Penyakit</a></li>
  </ol>
</section>
<section class="featured-doctors">
  <div class="panel-body">                              
    <form class="form-horizontal" role="form" method="POST" action="" enctype="multipart/form-data">
      <div class="form-group">
        <label class="col-lg-3 col-sm-3 control-label">Kode Gejala</label>
          <div class="col-lg-6">
            <input type="hidden" class="form-control" name="kode_penyakit" maxlength="5"  value="<?php echo kdauto("tabel_penyakit","P"); ?>" >
            <input name="kode_penyakit" type="text" id="id_tran_msk" size="15" value="<?php echo kdauto("tabel_penyakit","P"); ?>" disabled="disabled" >
          </div>
      </div>  
      <div class="form-group">
        <label class="col-lg-3 col-sm-3 control-label">Nama Penyakit</label>
          <div class="col-lg-6">
            <div class="iconic-input right">
               <span id="biasa1"><input type="text" class="form-control" placeholder="Nama Penyakit" name="nm_penyakit" value="">
              <?php alert_biasa();?></span> 
            </div>
          </div>
      </div> 
      <div class="form-group">
        <label class="col-lg-3 col-sm-3 control-label">Definisi</label>
          <div class="col-lg-6">
            <textarea type="text" class="form-control" name="definisi" ></textarea>
          </div>
      </div> 
      <div class="form-group">
        <label class="col-lg-3 col-sm-3 control-label">Penyebab</label>
          <div class="col-lg-6">
            <textarea type="text" class="form-control" name="penyebab" ></textarea>
          </div>
      </div> 
      <div class="form-group">
        <label class="col-lg-3 col-sm-3 control-label">Pengobatan/Pencegaahan</label>
          <div class="col-lg-6">
            <textarea type="text" class="form-control" name="pengobatan" ></textarea>
          </div>
      </div> 
      <div class="form-group">
        <label class="col-lg-3 col-sm-3 control-label">Gambar</label>
          <div class="col-lg-6">
            <input type="file" id="exampleInputFile" name="gambar">
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
    $sql = mysqli_query($titid, "SELECT * FROM tabel_penyakit WHERE kode_penyakit = '$id_edit'") or die (mysqli_error());
    $dataEdit = mysqli_fetch_array($sql);
  ?>
<section class="featured-doctors">
  <div class="panel-body">                              
    <form class="form-horizontal" role="form" method="POST" action="" enctype="multipart/form-data">
      <div class="form-group">
        <label class="col-lg-3 col-sm-3 control-label">Kode Gejala</label>
        <div class="col-lg-6">
        <div class="iconic-input right">
            <input type="text" class="form-control" placeholder="Gejala" name="kode_penyakit"  value="<?php echo $dataEdit['kode_penyakit']; ?>">
        </div>
        </div>
        </div> 
      <div class="form-group">
        <label class="col-lg-3 col-sm-3 control-label">Nama Penyakit</label>
          <div class="col-lg-6">
            <div class="iconic-input right">
              <span id="biasa1"><input type="text" class="form-control" placeholder="Nama Penyakit" name="nm_penyakit" value="<?php echo $dataEdit['nm_penyakit'];?>">
              <?php alert_biasa();?></span> 
            </div>
          </div>
      </div> 
      <div class="form-group">
        <label class="col-lg-3 col-sm-3 control-label">Definisi</label>
          <div class="col-lg-6">
            <textarea type="text" class="form-control" name="definisi" ><?php echo $dataEdit['definisi'];?></textarea>
          </div>
      </div> 
      <div class="form-group">
        <label class="col-lg-3 col-sm-3 control-label">Penyebab</label>
          <div class="col-lg-6">
            <textarea type="text" class="form-control" name="penyebab" ><?php echo $dataEdit['penyebab'];?></textarea>
          </div>
      </div> 
      <div class="form-group">
        <label class="col-lg-3 col-sm-3 control-label">Pengobatan/Pencegahan</label>
          <div class="col-lg-6">
            <textarea type="text" class="form-control" name="pengobatan" ><?php echo $dataEdit['pengobatan'];?></textarea>
          </div>
      </div> 
      <div class="form-group">
        <label class="col-lg-3 col-sm-3 control-label">Gambar</label>
          <div class="col-lg-6">
            <input type="file" id="exampleInputFile" name="gambar" >
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
    $kode_penyakit = @$_POST['kode_penyakit'];
    $nm_penyakit = @$_POST['nm_penyakit'];
    $penyebab = @$_POST['penyebab'];
    $sumber = @$_FILES['gambar']['tmp_name'];
    $target = '../images/penyakit/';
    $nama_gambar = @$_FILES['gambar']['name'];
    $definisi = @$_POST['definisi'];
    $pengobatan = @$_POST['pengobatan'];

    $simpan = @$_POST['simpan'];
    $edit = @$_POST['edit'];

    if($simpan){
      if ($kode_penyakit==""|| $nm_penyakit == ""  || $penyebab == ""|| $definisi == ""|| $pengobatan == ""  ) {
    # code...
  ?>
  <script type="text/javascript">
    alert("Inputan tidak boleh ada yang kosong ");
  </script>
  <?php
    } else {
    $pindah = move_uploaded_file($sumber, $target.$nama_gambar);
    if($pindah) {
      mysqli_query($titid, "INSERT INTO tabel_penyakit values('$kode_penyakit', '$nm_penyakit',  '$penyebab', '$nama_gambar', '$definisi', '$pengobatan')") or die (mysqli_error());
  ?>
  <script type="text/javascript">
    alert("Tambah data berasil");
    window.location.href = "?p=penyakit&&act=read";
  </script>
  <?php
    } else {
  ?>
  <script type="text/javascript">
    alert("gambar gagal diupload ");
  </script>
  <?php
     }
   }
   
  // kondisi jika hapus.
  }

 if ($edit) {
  // kondisi jika isian kosong
  if ($kode_penyakit==""|| $nm_penyakit == "" || $penyebab == ""|| $definisi == ""|| $pengobatan == ""    ) {
    ?>
    <!-- pesan -->
    <script type="text/javascript">
    alert('Inputan tidak boleh ada yang kosong.');
    </script>
    <?php
  }elseif ($nama_gambar=="") {
    $querysimpan_edit = mysqli_query($titid, "UPDATE tabel_penyakit SET nm_penyakit= '$nm_penyakit', penyebab= '$penyebab', definisi='$definisi' , pengobatan= '$pengobatan' WHERE kode_penyakit='$id_edit'") or die (mysqli_error());
    // kondisi jika query berhasil
   
       ?>
      <!-- pesan -->
    <script type="text/javascript">
    alert('Edit data berhasil');
    window.location.href = "?p=penyakit&&act=read";
    </script>
    <?php

    # code...
  }
  // kondisi jika isian sudah diisi semua
  else {
    $querysimpan_edit = mysqli_query($titid, "UPDATE tabel_penyakit SET nm_penyakit= '$nm_penyakit', penyebab= '$penyebab', gambar= '$nama_gambar',  definisi='$definisi' , pengobatan= '$pengobatan' WHERE kode_penyakit='$id_edit'") or die (mysqli_error());
    // kondisi jika query berhasil
     $pindah = move_uploaded_file($sumber, $target.$nama_gambar);
    if ($pindah) {
      ?>
      <!-- pesan -->
    <script type="text/javascript">
    alert('Edit data berhasil');
    window.location.href = "?p=penyakit&&act=read";
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

  if (isset($_GET['id_hapus'])) {
  # code...
  $id_hapus=$_GET['id_hapus']; // deklarasi vasriable id dengan nilai yang mengacu pada data yang di pilih
  $query_select = mysqli_query($titid, "SELECT gambar from tabel_penyakit where kode_penyakit = '$id_hapus'"); // menyeleksi gambar untuk menghapus file gambar pada folder dir_gambar
  $fetch_select = mysqli_fetch_array($query_select);
  //menghapus gambar pada direktori dir_gamabr
  $dir = "../images/penyakit/$fetch_select[gambar]"; // definisi untuk menentukan folder gambar dengan nama file yang akan dihapus
  unlink($dir); // untuk menghapus file gambar. 
  //menghapus data gambar yang berada di database
  $query_hapus = mysqli_query($titid, "DELETE from tabel_penyakit where kode_penyakit ='$id_hapus'");

  if($query_hapus){ // jika query berhasil
  ?>
  <script>
  alert("Hapus Berhasil !!!");
  location.href = "?p=penyakit&&act=read";
  </script>
  <?php
  } 
  }
  ?>


    </section>
    <!-- /.content -->
