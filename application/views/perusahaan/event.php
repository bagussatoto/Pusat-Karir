  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h2>
       DATA 
      <small><strong>EVENT & CARIER NEWS</strong></small>

    </h2>
    <!-- <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Daftar Event </li>
    </ol> -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row animated fadeInLeft">
      <div class="col-md-12">
        <div class="box" style="border-top: 0px solid #d2d6de; border-left: 0px solid #d2d6de; border-right: 0px solid #d2d6de; border-bottom: 0px solid #d2d6de; ">
          <div class="box-header">
            <a href="<?= site_url('admin/event/tambah_data') ?>" class="btn btn-sm btn-primary">Tambah data</a>
          </div>
          <div class="box-body p">
            <table id="sample_1" class="table table-striped table-bordered table-hover" style="width: 100%">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama Event</th>
                  <th>Nama Perusahaan</th>
                  <th>Tanggal Dibuat</th>
                  <th>Tindakan</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $no = 1;
                foreach ($event as $key) {
                  ?>
                  <tr>
                    <td><?= $no++; ?>.</td>
                    <td><?= $key->nm_event; ?></td>
                    <td><?= $key->nm_perusahaan ?></td>
                    <td><?= date('d M Y', strtotime($key->tgl_dibuat)) ; ?></td>
                    <td>
                      <a href="<?= site_url('admin/event/edit_data/'.$key->id_event) ?>" class="btn btn-sm btn-warning"> Edit</a> &nbsp;
                      <a onclick="return confirm('Apakah anda akan hapus permanen data event ini?)" href="<?= site_url('admin/event/hapus_data/'.$key->id_event) ?>" class="btn btn-sm btn-danger"> Hapus</a>
                    </td>
                  </tr>
                  <?php 
                } 
                ?>
              </tbody>
              <tfoot>
                  <tr>
                  <th>No.</th>
                  <th>Nama Event</th>
                  <th>Nama Perusahaan</th>
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
 