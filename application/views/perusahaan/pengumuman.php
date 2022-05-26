  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h2>
      DATA
      <small><strong>SEMUA PENGUMUMAN</strong></small>
    </h2>
<!--    <ol class="breadcrumb">-->
<!--      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>-->
<!--      <li><a href="#">Lowongan Kerja</a></li>-->
<!--      <li class="active">Daftar Lowongan </li>-->
<!--    </ol>-->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row animated fadeInLeft">
      <div class="col-md-12">
        <div class="box" style="border-top: 0px solid #d2d6de; border-left: 0px solid #d2d6de; border-right: 0px solid #d2d6de; border-bottom: 0px solid #d2d6de; ">
          <div class="box-header">
            <a href="<?= site_url('admin/pengumuman/tambah_pengumuman') ?>" class="btn btn-primary btn-sm">Tambah data</a>
          </div>
          <div class="box-body p">
            <table id="sample_1" class="table table-striped table-bordered table-hover">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama Pengumuman</th>
                  <th>Tanggal Dibuat</th>
                  <th>Tindakan</th>
                </tr>
              </thead>
              <tbody>

                <?php 
                $no = 1;
                foreach ($pengumuman as $key) {
                  ?>
                  <tr>
                    <td><?= $no++; ?>.</td>
                    <td><?= $key->nm_pengumuman; ?></td>
                    <td><?= date('d M Y', strtotime($key->tgl_dibuat)) ; ?></td>
                    <td>
                      <a href="<?= site_url('admin/pengumuman/edit_pengumuman/'.$key->id_pengumuman) ?>" class="btn btn-sm btn-warning"> Edit</a> &nbsp;
                      <a onclick="return confirm('Apakah anda akan hapus permanen data pengumuman ini?)" href="<?= site_url('admin/pengumuman/hapus_data/'.$key->id_pengumuman) ?>" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                  </tr>
                  <?php 
                } 
                ?>

              </tbody>
              <tfoot>
                <tr>
                 <th>No.</th>
                 <th>Nama Pengumuman</th>
                 <th>Tanggal Dibuat</th>
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
 <!-- /.content -->

