  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h3>
      TAMBAH LOWONGAN
      <!-- <small>Lowongan Kerja</small> -->
    </h3>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Lowongan Kerja</a></li>
      <li class="active">Tambah Lowongan </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row animated fadeInLeft">
      <div class="col-md-9">
        <div class="box">
          <div class="box-body p">
            <form action="<?= site_url('perusahaan/lowongan/proses_tambah') ?>" method="post">
              <div class="form-group">
                <label>Nama Lowongan:</label>
                <input type="text" name="nm_lowongan" class="form-control" placeholder="Nama Lowongan">
              </div>
              <div class="form-group">
                <label for="">Deskripsi Lowongan:</label>
                <textarea id="pageArea" class="form-control" name="deskripsi_lowongan"></textarea>
              </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
      <div class="col-md-3">
        <div class="box" style="height: 100vh">
          <div class="box-body p">
            <form action="asdf.php">
              <div class="form-group">
                <label for="">Tanggal Deadline:</label>
                <input class="form-control datepicker" type="text" name="tgl_deadline" placeholder="Tanggal Deadline">
              </div>
              <div class="form-group">
                <label for="">Jumlah Orang:</label>
                <input type="number" name="jml_orang" class="form-control" value="1" min="1">
              </div>
              <div class="form-group">
                <label>Jenis Pekerjaan:</label>
                <select name="jenis_pekerjaan[]" class="form-control select2" multiple="multiple" data-placeholder="Pilih Jenis Pekerjaan" style="width: 100%;">
                  <option value="Magang/Kerja Praktek">Magang/Kerja Praktek</option>
                  <option value="Freelance/Part Time">Freelance/Part Time</option>
                  <option value="Full Time">Full Time</option>
                  <option value="Sukarela/Volunteer">Sukarela/Volunteer</option>
                </select>
              </div>
              <div class="form-group">
                <label for="">Pendidikan:</label>
                <select name="pendidikan[]" class="form-control select2" multiple="multiple" data-placeholder="Pilih Jenjang Pendidikan" style="width: 100%;">
                  <?php 
                  foreach ($pendidikan as $key) {
                  ?>
                  <option value="<?= $key['jenjang'] ?>"><?= $key['jenjang'] ?></option>
                  <?php } ?>
                </select>
              </div>
               <div class="form-group">
                <label for="">Posisi/Jabatan:</label>
                <select name="posisi[]" class="form-control select2" multiple="multiple" data-placeholder="Pilih Posisi Jabatan"
                        style="width: 100%;">
                   <?php 
                  foreach ($posisi as $key) {
                  ?>
                  <option value="<?= $key['nm_posisi'] ?>"><?= $key['nm_posisi'] ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <button  class="btn btn-light btn-block">Tentukan Kriteria</button>
              </div>
              <button class="btn btn-primary">Simpan</button>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      </form>
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
  <div class="modal bs-modal-lg animated fadeInDown" id="mDetailP" tabindex="-1" role="dialog" aria-hidden="true" >
  <div class="modal-dialog modal-lg" style="width:100%;">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title float-left">Kriteria Pelamar</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
      </div>
      <div class="modal-body">  
        <div class="container">
          <div class="row">
            <div class="col-md-12"  id="detail_kt">
            
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer" style="clear:both;">
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
