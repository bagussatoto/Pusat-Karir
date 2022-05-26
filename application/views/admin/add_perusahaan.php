  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h2>
      TAMBAH DATA
      <small><strong>PERUSAHAAN</strong></small>
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
            <div class="box-header">
                
            </div>
          <div class="box-body p">
              <form action="<?= site_url('admin/perusahaan/save') ?>" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                      <label for="" class="control-label">Nama Perusahaan :</label>
                      <div>
                          <input type="text" class="form-control" required name="nm_perusahaan" placeholder="Nama Perusahaan">
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="" class="control-label">Email: </label>
                      <div>
                          <input type="email" class="form-control" required name="email_perusahaan" placeholder="Ex : example@mail.com">
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="" class="control-label">Alamat :</label>
                      <div>
                          <input type="text" class="form-control" required name="alamat_perusahaan" placeholder="Alamat">
                      </div>
                  </div>
                  
                  <div class="form-group">
                      <label for="" class="control-label">No. Telepon :</label>
                      <div>
                          <input type="text" class="form-control" required name="noTelp_perusahaan" placeholder="No. Telepon">
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="" class="control-label">Jenis Perusahaan :</label>
                      <div>
                          <input type="text" class="form-control" required name="jenis_perusahaan" placeholder="Jenis Perusahaan">
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="" class="control-label">Surat Izin Perusahaan :</label>
                      <div>
                          <input type="text" class="form-control" required name="surat_izin" placeholder="Surat Izin Perusahaan">
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="" class="control-label">Lampirkan Logo Perusahaan :</label>
                      <div>
                          <input type="file" class="form-control" required name="logo_perusahaan">
                      </div>
                  </div>
                  
                  <div class="float-right">
                      
                        <a href="<?= site_url('admin/perusahaan/') ?>" class="btn btn-sm btn-default"> Batal</a> &nbsp;
                          <button type="submit" class="btn btn-primary btn-sm"> Simpan</button><br><br>
                      </div>
                  </div>
              </form>
         </div>
         <!-- /.box-body -->
       </div>
       <!-- /.box -->
     </div>
     <!-- /.col -->
   </div>
   <!-- /.row -->
 </section>