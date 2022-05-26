  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h2>
      DATA 
      <small><strong>MANAJEMEN ADMIN</strong></small>
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
              <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-tambah"> Tambah data</button>
            <table id="sample_1" class="table table-striped table-bordered table-hover">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Usename</th>
                  <th>Password</th>
                  <th>Tindakan</th>
                </tr>
              </thead>
              <tbody>

                <?php 
                $no = 1;
                foreach ($admin as $key) {
                  ?>
                  <tr>
                    <td><?= $no; ?>.</td>
                    <td><?= $key->username; ?></td>
                    <td><?= md5($key->password); ?></td>
                    <td>
                      <a href="#" onclick="edit('<?= $key->id_user_a ?>')" class="btn btn-sm btn-info">Edit</a> &nbsp;
                      <a onclick="hapus(<?= $key->id_user_a ?>)" href="#" class="btn btn-sm btn-danger">Hapus</a>
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
                  <th>Usename</th>
                  <th>Password</th>
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
<!--  tambah admin-->
  <div class="modal bs-modal-lg animated fadeInDown" id="modal-tambah" tabindex="-1" role="dialog" aria-hidden="true" >
      <div class="modal-dialog modal-md">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title float-left">TAMBAH DATA ADMIN</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
              </div>
              <form action="<?= site_url('admin/admin/add') ?>" method="post">
              <div class="modal-body">
                      <div class="form-group">
                          <label for="" class="control-label">Username :</label>
                          <input type="text" class="form-control" name="username" placeholder="Username">
                      </div>
                      <div class="form-group ">
                          <label for="" class="control-label text-right">Password :</label>
                          <input type="password" class="form-control" name="password" placeholder="Password">
                      </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Batal</button> &nbsp;
                  <button type="submit" class="btn btn-primary btn-sm"> Simpan</button>
              </div>
              </form>
          </div>
          <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
  </div>
<!--  end tambah admin-->
<div class="modal bs-modal-lg animated fadeInDown" id="edit-admin" tabindex="-1" role="dialog" aria-hidden="true" >
  <div class="modal-dialog modal-md">
    <div class="modal-content" id="dt-admin">

    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
  <script>
      function edit(id) {
          var url = "<?= site_url('admin/admin/edit') ?>/"+id;
          $.ajax({
              url : url,
              success : function (res) {
                  $("#dt-admin").html(res);
                  $("#edit-admin").modal('show');
              },
              error : function()
              {
                  console.log('gagal load');
              }
          })
      }

      function hapus(id) {
          var url = "<?= site_url('admin/admin/hapus') ?>/"+id;
          var conf = confirm("Apakah anda akan hapus permanen data admin ini?");
          if (conf)
          {
              window.location.href = url;
          }
      }

  </script>