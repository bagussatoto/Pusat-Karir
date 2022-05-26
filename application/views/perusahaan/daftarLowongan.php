  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h3>
      DAFTAR LOWONGAN
      <!-- <small>Lowongan Kerja</small> -->
    </h3>
    <!-- <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Lowongan Kerja</a></li>
      <li class="active">Daftar Lowongan </li>
    </ol> -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row animated fadeInLeft">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header">
            <a href="<?= site_url('perusahaan/lowongan/tambah_lowongan') ?>" class="btn btn-sm btn-primary">Tambah data</a>
          </div>
          <div class="box-body p">
            <table id="sample_1" class="table table-striped table-bordered table-hover">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Lowongan</th>
                  <th>Tanggal Dibuat</th>
                  <th>Tanggal Deadline</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>

              <?php 
                $no = 1;
                foreach ($daftar as $key) {
              ?>
                <tr>
                  <td><?= $no; ?></td>
                  <td><?= $key['nm_lowongan']; ?></td>
                  <td><?= $key['tgl_dibuat']; ?></td>
                  <td><?= $key['tgl_deadline']; ?></td>
                  <td>
                    <a href="<?= site_url('perusahaan/lowongan/edit_lowongan/'.$key['id_lowongan']) ?>" class="btn btn-sm btn-info"><i class="fa fa-edit"></i> Edit</a>
                    <a onclick="return confirm('Yakin Ingin Menghapus Lowongan ini?)" href="<?= site_url('perusahaan/lowongan/hapus_data/'.$key['id_lowongan']) ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                  </td>
                </tr>
              <?php 
                $no++;
               } 
              ?>

             </tbody>
             <tfoot>
              <tr>
               <th>No</th>
               <th>Tanggal Dibuat</th>
               <th>Tanggal Deadline</th>
               <th>Aksi</th>
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


