  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h2>
      TAMBAH DATA
      <small><strong>EVENT & CARIER NEWS</strong></small>
    </h2>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row animated fadeInLeft" >
      <div class="col-md-8">
        <div class="box" style="border-top: 0px solid #d2d6de; border-left: 0px solid #d2d6de; border-right: 0px solid #d2d6de; border-bottom: 0px solid #d2d6de; ">
          <div class="box-body p">
            <form action="<?= site_url('admin/event/proses_tambah/') ?>" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label>Nama Event :</label>
                <input type="text" name="nm_event" class="form-control" placeholder="Nama Event">
              </div>
            <div class="form-group">
                <label>Nama Perusahaan :</label>
                <select name="id_perusahaan" class="form-control" id="">
                    <option value="" disabled selected>Pilih</option>
                    <?php foreach ($perusahaan as $row) : ?>
                        <option value="<?= $row->id_perusahaan ?>"><?= $row->nm_perusahaan ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
              <div class="form-group">
                <label for="">Isi Event & Carier News :</label>
                <textarea id="pageArea" class="form-control" name="isi" placeholder="Isi Event"></textarea>
              </div>
              
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
      <div class="col-md-4">
        <div class="box" style="height: 19vh; border-top: 0px solid #d2d6de; border-left: 0px solid #d2d6de; border-right: 0px solid #d2d6de; border-bottom: 0px solid #d2d6de; ">
          <div class="box-body">
             <div class="form-control">
                <label>Gambar Cover Event :</label>
                <input id="cover" type="file" name="cover" class="form-control" style="display: none">
                <label for="cover" class="btn btn-sm btn-dark"> Upload Cover</label>
              </div>
              <br>
              <div class="float-right">
              
              <a href="<?= site_url('admin/event/') ?>" class="btn btn-sm btn-default"> Batal</a> &nbsp;
              <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
            </div>
            </form>
          </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->

