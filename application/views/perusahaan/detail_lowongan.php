  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Detail Lowongan
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Daftar Pelamar </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row animated fadeInLeft">
      <div class="col-md-12">
        <div class="box">
          <div class="box-body p">
              <table id="sample_1" class="table table-striped table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Pelamar</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody style="max-height: 80vh;overflow:auto">
                  <?php 
                    $no = 1;
                    foreach ($daftar as $key) {
                  ?>
                    <tr>
                      <td><?= $no; ?></td>
                      <td><?= $key['nm_alumni']; ?></td>
                      <td>
                        <a onclick="show_detail_pelamar('<?= $key["id_lowongan"];?>')" href="javascript:void(0)" class="btn btn-sm btn-info"><i class="fa fa-search"></i> Detail</a>
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
                      <th>Nama Lowongan</th>
                      <th>Nama Perusahaan</th>
                      <th>Aksi</th>
                    </tr>
                  </tfoot>
                </table>
          </div>
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