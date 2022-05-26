  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Tambah Lowongan
      <small>Lowongan Kerja</small>
    </h1>
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
            <form action="<?= site_url('perusahaan/lowongan/proses_edit/'.$daftar->id_lowongan) ?>" method="post">
              <div class="form-group">
                <label>Nama Lowongan:</label>
                <input type="text" name="nm_lowongan" class="form-control" placeholder="Nama Lowongan" value="<?= $daftar->nm_lowongan?>">
              </div>
              <div class="form-group">
                <label for="">Deskripsi Lowongan:</label>
                <textarea id="pageArea" class="form-control" name="deskripsi_lowongan"><?= $daftar->deskripsi_lowongan; ?></textarea>
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
            <form action="<?= site_url('perusahaan/lowongan/proses_edit/'.$daftar->id_lowongan)?>">
             <div class="form-group">
                  <label>Status Lowongan:</label>
                  <select name="status" class="form-control">
                    <?php
                      echo '<option value="'.$daftar->status.'">'.$daftar->status.'</option>';
                    ?>
                    <option value="Dibuka">Dibuka</option>
                    <option value="Ditutup">Ditutup</option>
                  </select>
              </div>
              <div class="form-group">
                <label for="">Tanggal Deadline:</label>
                <input class="form-control datepicker" type="text" name="tgl_deadline" placeholder="Tanggal Deadline" value="<?= $daftar->tgl_deadline; ?>">
              </div>
              <div class="form-group">
                <label for="">Jumlah Orang:</label>
                <input type="number" name="jml_orang" class="form-control" value="<?= $daftar->jumlah_orang; ?>" min="1">
              </div>
              <div class="form-group">
                <label>Jenis Pekerjaan:</label>
                <select name="jenis_pekerjaan[]" class="form-control select2" multiple="multiple" data-placeholder="Pilih Jenis Pekerjaan" style="width: 100%;">
                  <?php 
                    $m = '';$p = '';$f = '';$v = '';
                    foreach ($jenis as $key) {
                      echo($key['tags']);
                     if ($key['tags']=='Magang/Kerja Praktek') {
                       $m = 'selected';
                     }
                     if ($key['tags']=='Freelance/Part Time') {
                       $p = 'selected';
                     }
                     if ($key['tags']=='Full Time') {
                       $f = 'selected';
                     }
                     if ($key['tags']=='Sukarela/Volunteer') {
                       $v = 'selected';
                     }
                    }
                  ?>
                  <option value="Magang/Kerja Praktek" <?= ' '.$m ?>>Magang/Kerja Praktek</option>
                  <option value="Freelance/Part Time" <?= ' '.$p ?>>Freelance/Part Time</option>
                  <option value="Full Time" <?= ' '.$f ?>>Full Time</option>
                  <option value="Sukarela/Volunteer" <?= ' '.$v ?>>Sukarela/Volunteer</option>
                </select>
              </div>
              <div class="form-group">
                <label for="">Pendidikan:</label>
                <select  id="spendidikan" name="pendidikan[]" class="form-control select2" multiple="multiple" data-placeholder="Pilih Jenjang Pendidikan"
                        style="width: 100%;">
                  <?php 
                  $selected = '';
                  foreach ($pendidikan as $key) {
                    foreach ($pendidikan2 as $key2) {
                      if ($key['jenjang']==$key2['tags']) {
                        $selected = 'selected';
                      }
                    } 
                  ?>
                  <option value="<?= $key['jenjang'] ?>" <?= " ".$selected; ?>><?= $key['jenjang'] ?></option>
                  <?php 
                    $selected ='';
                  }
                  ?>
                </select>
              </div>
               <div class="form-group">
                <label for="">Posisi/Jabatan:</label>
                <select name="posisi[]" class="form-control select2" multiple="multiple" data-placeholder="Pilih Posisi Jabatan"
                        style="width: 100%;">
                  <?php 
                  $selected = '';
                  foreach ($posisi as $key) {
                    foreach ($posisi2 as $key2) {
                      if ($key['nm_posisi']==$key2['tags']) {
                        $selected = 'selected';
                      }
                    } 
                  ?>
                  <option value="<?= $key['nm_posisi'] ?>" <?= " ".$selected; ?>><?= $key['nm_posisi'] ?></option>
                  <?php 
                    $selected ='';
                  }
                  ?>
                </select>
              </div>
              
              <hr>
              <button class="btn btn-sm btn-info"><i class="fa fa-save"></i> Simpan</button>
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
