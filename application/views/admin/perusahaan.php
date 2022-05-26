  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h2>
      DATA
      <small><strong>SEMUA PERUSAHAAN</strong></small>
    </h2>
    <!-- <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Daftar Perusahaan </li>
    </ol> -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row animated fadeInLeft">
      <div class="col-md-12">
        <div class="box" style="border-top: 0px solid #d2d6de; border-left: 0px solid #d2d6de; border-right: 0px solid #d2d6de; border-bottom: 0px solid #d2d6de; ">
          <div class="box-body p">
              <a href="<?= site_url('admin/perusahaan/add') ?>" class="btn btn-primary btn-sm"> Tambah data</a>
            <table id="sample_1" class="table table-striped table-bordered table-hover">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama Perusahaan</th>
                  <th>Jenis Perusahaan</th>
                  <th>Alamat</th>
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
                    <td><?= $key['nm_perusahaan']; ?></td>
                    <td><?= $key['jenis_perusahaan']; ?></td>
                    <td><?= $key['alamat_perusahaan']; ?></td>
                    <td>
                        
                            
                          <a href="#" onclick="show('<?= $key['id_perusahaan']?>')" class="btn btn-sm btn-info"> Detail</a> &nbsp;
                          <a href="#" class="btn btn-warning btn-sm" onclick="edit(<?= $key['id_perusahaan'] ?>)"> Edit</a> &nbsp;
                          <a onclick="return confirm('Apakah anda akan hapus permanen data perusahaan ini?)" href="<?= site_url('admin/perusahaan/hapus_data/'.$key['id_perusahaan']) ?>" class="btn btn-sm btn-danger"> Hapus</a>
                        
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
                 <th>Nama Perusahaan</th>
                 <th>Jenis Perusahaan</th>
                 <th>Alamat</th>
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
   <!-- /.row -->
 </section>
<div class="modal bs-modal-lg animated fadeInDown" id="mDetailP" tabindex="-1" role="dialog" aria-hidden="true" >
  <div class="modal-dialog modal-lg" style="width:100%;">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title float-left">DETAIL DATA PERUSAHAAN</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
      </div>
      <div class="modal-body">  
        <div class="container">
          <div class="row">
            <div class="col-md-12"  id="detail_p">

            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer" style="clear:both;">
        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Tutup</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!--edit perusahaan-->
<div class="modal bs-modal-lg animated fadeInDown" id="modal-edit" tabindex="-1" role="dialog" aria-hidden="true" >
      <div class="modal-dialog modal-lg" style="width:100%;">
          <div class="modal-content" id="content-edit">
          </div>
          <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
  </div>
  <script>
      function show(id) {
          var url = "<?= site_url('admin/perusahaan/show') ?>/"+id;
          $.ajax({
              url : url,
              success : function (res) {
                  $("#detail_p").html(res);
                  $("#mDetailP").modal('show');
                  console.log('berhasil load data');
              },
              error : function () {
                  console.log('gagal load data');
              }
          })
      }

      function edit(id) {
          var url = "<?= site_url('admin/perusahaan/edit') ?>/"+id;
          $.ajax({
              url : url,
              success : function (res) {
                  $('#content-edit').html(res);
                  $('#modal-edit').modal('show');
              },
              error : function () {
                  console.log('gagal load');
              }
          })
      }
  </script>