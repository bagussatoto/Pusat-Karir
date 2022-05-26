  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h2>
      DATA
      <small><strong>SEMUA ALUMNI</strong></small>
    </h2>
   <!--  <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Daftar Alumni </li>
    </ol> -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row animated fadeInLeft">
      <div class="col-md-12">
        <div class="box" style="border-top: 0px solid #d2d6de; border-left: 0px solid #d2d6de; border-right: 0px solid #d2d6de; border-bottom: 0px solid #d2d6de; ">
          <div class="box-body p">
            <table id="sample_1" class="table table-striped table-bordered table-hover">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama Alumni</th>
                  <th>Jurusan</th>
                  <th>Tahun Angkatan</th>
                  <th>Tahun Kelulusan</th>
                  <th>Tindakan</th>
                </tr>
              </thead>
              <tbody>

                <?php 
                $no = 1;
                foreach ($daftar as $key) {
                  ?>
                  <tr>
                    <td><?= $no; ?>.</td>
                    <td><?= $key['nm_alumni']; ?></td>
                    <td><?= $key['jurusan']; ?></td>
                    <td><?= $key['thn_angkatan']; ?></td>
                    <td><?= $key['thn_kelulusan']; ?></td>
                    <td>
                      <a href="#" onclick="detail('<?= $key['nim']?>')" class="btn btn-sm btn-info"> Detail</a> &nbsp;
                      <a onclick="return confirm('Apakah anda akan hapus permanen data alumni ini?)" href="<?= site_url('admin/alumni/hapus_data/'.$key['nim']) ?>" class="btn btn-sm btn-danger"> Hapus</a>
                    </td>
                  </tr>
                  <?php 
                  $no++;
                } 
                ?>

              </tbody>
              <tfoot>
                <tr>
                  <th>No.</th>
                  <th>Nama Alumni</th>
                  <th>Jurusan</th>
                  <th>Tahun Angkatan</th>
                  <th>Tahun Kelulusan</th>
                  <th>Tindakan</th>
               </tr>
             </tfoot>
           </table>
           <br>

         </div>
         <!-- /.box-body -->
       </div>
       <!-- /.box -->
     </div>
     <!-- /.col -->
   </div>
   </div>
   <!-- /.row -->
 </section>
<div class="modal bs-modal-lg animated fadeInDown" id="modal-alumni" tabindex="-1" role="dialog" aria-hidden="true" >
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title float-left">DETAIL DATA ALUMNI</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
      </div>
      <div class="modal-body">  
        <div class="container">
          <div class="row">
            <div class="col-md-12"  id="dtalumni">
                
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer" style="clear:both;">
        <div class="float-right">
          <button type="close" class="btn btn-sm btn-danger" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!--modal berkas-->
  <div class="modal bs-modal-lg animated fadeInDown" id="modal-berkas" tabindex="-1" role="dialog" aria-hidden="true" >
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title float-left">DETAIL DATA BERKAS ALUMNI</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
              </div>
              <div class="modal-body">
                  <div class="container">
                      <div class="row">
                          <div class="col-md-12"  id="dtberkas">

                          </div>
                      </div>
                  </div>
              </div>
              <div class="modal-footer" style="clear:both;">
        <div class="float-right">
          <button type="close" class="btn btn-sm btn-danger" data-dismiss="modal">Tutup</button>
        </div>
      </div>
          </div>
          <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->

      <script>
          function detail(id) {
              var url = "<?= site_url('admin/pelamar/detail') ?>/"+id;
              $.ajax({
                  url : url,
                  success : function (res) {
                      $("#dtpelamar").html(res);
                      $("#modal-pelamar").modal('show');
                  },
                  error : function()
                  {
                      console.log('gagal load');
                  }
              })
          }

          function berkas(nim) {
              var url = "<?= site_url('admin/pelamar/getBerkas') ?>/"+nim;
              $.ajax({
                  url : url,
                  success : function (res) {
                      $("#dtberkas").html(res);
                      $("#modal-berkas").modal('show');
                  },
                  error : function()
                  {
                      console.log('gagal load');
                  }
              })
          }
      </script>
  <script>
      function detail(id) {
          var url = "<?= site_url('admin/alumni/detail') ?>/"+id;
          $.ajax({
              url : url,
              success : function (res) {
                  $("#dtalumni").html(res);
                  $("#modal-alumni").modal('show');
              },
              error : function()
              {
                  console.log('gagal load');
              }
          })
      }

      function berkas(nim) {
          var url = "<?= site_url('admin/alumni/getBerkas') ?>/"+nim;
          $.ajax({
              url : url,
              success : function (res) {
                  $("#dtberkas").html(res);
                  $("#modal-berkas").modal('show');
              },
              error : function()
              {
                  console.log('gagal load');
              }
          })
      }
  </script>