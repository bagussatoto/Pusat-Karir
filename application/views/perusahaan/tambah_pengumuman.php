  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h2>
      TAMBAH DATA
      <small><strong>PENGUMUMAN</strong></small>
    </h2>
<!--    <ol class="breadcrumb">-->
<!--      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>-->
<!--      <li><a href="#">Pengumuman Kerja</a></li>-->
<!--      <li class="active">Tambah Pengumuman </li>-->
<!--    </ol>-->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row animated fadeInLeft">
      <div class="col-md-12">
        <div class="box" style="border-top: 0px solid #d2d6de; border-left: 0px solid #d2d6de; border-right: 0px solid #d2d6de; border-bottom: 0px solid #d2d6de; ">
          <div class="box-body p" id="fg">
            <form action="<?= site_url('admin/pengumuman/save') ?>" method="post">
                  <div class="form-group">
                    <label>Nama Pengumuman :</label>
                    <input type="text" required name="nm_pengumuman" class="form-control" placeholder="Nama Pengumuman">
                  </div>
                  <div class="form-group">
                      <label for="">Pengumuman Perusahaan :</label>
                      <select name="id_lowongan" required class="form-control">
                          <option value="" selected disabled>Pilih</option>
                          <?php foreach ($lowongan as $row) : ?>
                              <option value="<?= $row->id_lowongan ?>"><?= $row->nm_lowongan ?> - (<?= $row->nm_perusahaan ?>)</option>
                          <?php endforeach;?>
                      </select>
                  </div>
                  <div class="form-group">
                    <label for="">Isi Pengumuman Perusahaan :</label>
                    <textarea id="pageArea" name="isi_pengumuman"></textarea>
                    <hr>
                    <div class="float-right">
                    <a href="<?= site_url('admin/pengumuman/') ?>" class="btn btn-sm btn-default"> Batal</a> &nbsp;
                    <button type="submit" class="btn btn-sm btn-primary"> Simpan</button>
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
  <!-- /.content -->



