  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h2>
      EDIT DATA
      <small><strong>PENGUMUMAN</strong></small>
    </h2>
<!--    <ol class="breadcrumb">-->
<!--      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>-->
<!--      <li><a href="#">Pengumuman Kerja</a></li>-->
<!--      <li class="active">Edit Pengumuman </li>-->
<!--    </ol>-->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row animated fadeInLeft">
      <div class="col-md-12">
        <div class="box" style="border-top: 0px solid #d2d6de; border-left: 0px solid #d2d6de; border-right: 0px solid #d2d6de; border-bottom: 0px solid #d2d6de; ">
          <div class="box-body p">
            <form action="<?= site_url('admin/pengumuman/update/'.$pengumuman->id_pengumuman) ?>" method="post">
              <div class="form-group">
                <label>Nama Pengumuman :</label>
                <input type="text" name="nm_pengumuman" class="form-control" placeholder="Nama Pengumuman" value="<?= $pengumuman->nm_pengumuman ?>">
              </div>
                <div class="form-group">
                    <label for="">Pengumuman Perusahaan :</label>
                    <select name="id_lowongan" required class="form-control">
                        <option value="" selected disabled>Pilih</option>
                        <?php foreach ($lowongan as $row) : ?>
                            <option <?= $pengumuman->id_lowongan == $row->id_lowongan ? 'selected' : '' ?> value="<?= $row->id_lowongan ?>"><?= $row->nm_lowongan ?> - (<?= $row->nm_perusahaan ?>)</option>
                        <?php endforeach;?>
                    </select>
                </div>
              <div class="form-group">
                <label for="">Isi Pengumuman Perusahaan :</label>
                <textarea id="pageArea" class="form-control" name="isi_pengumuman"><?= $pengumuman->isi_pengumuman; ?></textarea>
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
<div class="modal bs-modal-lg animated fadeInDown" id="modal-file" tabindex="-1" role="dialog" aria-hidden="true" >
  <div class="modal-dialog modal-lg" style="max-width: 90% !important;">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title float-left">Data Lowongan</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
      </div>
      <div class="modal-body">  
        <div class="row">
          <div class="col-md-12" style="max-height: 400px;overflow-y: auto">
            <button type="button" data-toggle="modal" href="#modal-upload" class="btn btn-primary">Upload File</button>
            <hr>
            <table id="sample_2" class="table table-striped table-bordered table-hover">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama File</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
              <tr>
                <td>1</td>
                <td>nama file.pdf</td>
                <td><button onclick="addLink('nama file.pdf')" class="btn btn-info">Pilih</button></td>
              </tr>
                <?php 
                // $no = 1;
                // foreach ($lowongan as $key) {
                  ?>
                  <!-- <tr>
                    <td><?= $no; ?></td>
                    <td><?= $key['nm_file']; ?></td>
                    <td><?= $key['tgl_dibuat']; ?></td>
                    <td>
                      <a href="<?= site_url('perusahaan/pengumuman/tambah_pengumuman/'.$key['id_lowongan']) ?>" class="btn btn-sm btn-info"><i class="fa fa-edit"></i> Pilih File</a>
                    </td>
                  </tr> -->
                  <?php 
                // } 
                ?>

              </tbody>
              <tfoot>
                <tr>
                 <th>No</th>
                  <th>Nama File</th>
                  <th>Aksi</th>
               </tr>
             </tfoot>
           </table>
         </div>
       </div>
     </div>
     <div class="modal-footer" style="clear:both;">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>

<div class="modal bs-modal-lg animated fadeInDown" id="modal-upload" tabindex="-1" role="dialog" aria-hidden="true" >
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title float-left">Daftar File</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
      </div>
      <div class="modal-body">  
        <div class="row">
          <div class="col-md-12" style="max-height: 400px;overflow-y: auto">
           <form action="">
             <div class="form-control">
               <label>Pilih File:</label>
               <input type="file" name="file_c" class="form-control">
             </div>
             <hr>
             <button class="btn btn-outline-primary btn-block">Upload</button>
           </form>
         </div>
       </div>
     </div>
  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>