<section class="content">
          <button type="button" class="btn btn-block btn-primary">Data Diagnosa</button>
          <div class="box">
            
            <!-- /.box-header -->
             <div class="panel-body">
      <div class="table-responsive">
        <div class="dataTable_wrapper">
          <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr>
                  <th width="5%">No</th>
                  <th>Tanggal</th>
                  <th>Nama</th>
                  <th>Kode Penyakit</th>
                  <th>Presentasi</th>
                  <th width="10%">Detail</th>
                </tr>
                </thead>
                <tbody>
               <?php
             $p = new eeee;
            $batas  =  10;
            $posisi = $p->cariPosisi($batas);
                  $no = 0;
                  $query_tampil = mysqli_query($titid, "SELECT hasil_diagnosa.*,nm_penyakit FROM hasil_diagnosa, tabel_penyakit WHERE hasil_diagnosa.kode_penyakit= tabel_penyakit.kode_penyakit ORDER BY tanggal_diagnosa ASC limit $posisi, $batas");
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
                        <?php echo $data_tampil['tanggal_diagnosa']; ?>
                      </td>
                      <td>
                        <?php echo $data_tampil['username']; ?>
                      </td>
                      <td>
                        <?php echo $data_tampil['nm_penyakit']; ?>
                      </td>
                      <td>
                        <?php if ($data_tampil[persentase]>100) {
                          # code...
                          echo '100';
                        }else{
                          echo $data_tampil['persentase'];
                          } ?>
                      </td>
                      
                      <td><a href="../fpdf/html2pdf/diagnosa.php?id=<?php echo $data_tampil['id_diagnosa'];?>"><button type="button" class="btn btn-block btn-warning">
                        <i class="fa fa-fw fa-print"></i></button></a>
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
                  $jmldata     = mysqli_num_rows(mysqli_query($titid, "SELECT * FROM hasil_diagnosa "));
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
                </section>