  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h2>
      TAMBAH DATA
      <small><strong>LOWONGAN</strong></small>
    </h2>
    <!-- <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Lowongan Kerja</a></li>
      <li class="active">Tambah Lowongan </li>
    </ol> -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row animated fadeInLeft">
      <div class="col-md-8">
        <div class="box" style="border-top: 0px solid #d2d6de; border-left: 0px solid #d2d6de; border-right: 0px solid #d2d6de; border-bottom: 0px solid #d2d6de; ">
          <div class="box-body p">
            <form action="<?= site_url('admin/lowongan/proses_tambah') ?>" method="post">
               <div class="form-group">
                <label>Nama Perusahaan :</label>
                <select name="id_perusahaan" class="form-control select2" required style="width: 100%;">
                    <option value="" selected disabled>Pilih</option>
                    <?php foreach ($perusahaan as $key) : ?>
                        <option value="<?= $key->id_perusahaan ?>"><?= $key->nm_perusahaan ?></option>
                    <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label>Nama Lowongan :</label>
                <input type="text" name="nm_lowongan" class="form-control" required placeholder="Nama Lowongan">
              </div>
              <div class="form-group">
                <label for="">Deskripsi Lowongan :</label>
                <textarea id="pageArea" class="form-control" name="deskripsi_lowongan" placeholder="Deskripsi lowongan"></textarea>
              </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
      <div class="col-md-4">
        <div class="box" style="height: 66vh; border-top: 0px solid #d2d6de; border-left: 0px solid #d2d6de; border-right: 0px solid #d2d6de; border-bottom: 0px solid #d2d6de; ">
          <div class="box-body p">
              <div class="form-group">
                <label for="">Tanggal Deadline :</label>
                <input required class="form-control datepicker" type="text" name="tgl_deadline" placeholder="Tanggal Deadline">
              </div>
              <div class="form-group">
                <label for="">Jumlah Orang :</label>
                <input required type="number" name="jml_orang" class="form-control" value="1" min="1">
              </div>
              <div class="form-group">
                <label>Jenis Pekerjaan :</label>
                <select name="jenis_pekerjaan" required class="form-control select2" style="width: 100%;">
                    <option value="" selected disabled >Pilih</option>
                    <option value="Jenis Pekerjaan 1">Jenis Pekerjaan 1</option>
                    <option value="Jenis Pekerjaan 2">Jenis Pekerjaan 2</option>
                    <option value="Jenis Pekerjaan 3">Jenis Pekerjaan 3</option>
                    <option value="Jenis Pekerjaan 4">Jenis Pekerjaan 4</option>
                    <option value="Jenis Pekerjaan 5">Jenis Pekerjaan 5</option>
                    <option value="Jenis Pekerjaan 6">Jenis Pekerjaan 6</option>
                </select>
              </div>
              <div class="form-group">
                <label for="">Pendidikan :</label>
                <select name="id_pendidikan" class="form-control select2" required style="width: 100%;">
                    <option value="" selected disabled >Pilih</option>
                    <?php foreach ($pendidikan as $key) : ?>
                    <option value="<?= $key['id_pendidikan'] ?>"><?= $key['jenjang'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
               <div class="form-group">
                <label for="">Posisi/Jabatan :</label>
                <select name="id_posisi_jabatan" class="form-control select2" required style="width: 100%;">
                    <option value="" selected disabled >Pilih</option>
                    <?php foreach ($posisi as $key) : ?>
                        <option value="<?= $key['id_posisi_jabatan'] ?>"><?= $key['nm_posisi'] ?></option>
                    <?php endforeach; ?>
                </select>
              </div>
              <div class="float-right">
              
              <a href="<?= site_url('admin/lowongan/') ?>" class="btn btn-sm btn-default"> Batal</a> &nbsp;
              <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
            </div>
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
  
