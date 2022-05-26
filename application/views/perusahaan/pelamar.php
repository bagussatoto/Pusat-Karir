  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h2>
      DATA 
      <small><strong>LOWONGAN PELAMAR</strong></small>
      <!-- <small>Lowongan Kerja</small> -->
    </h2>
   <!--  <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Lowongan Kerja</a></li>
      <li class="active">Daftar Lowongan </li>
    </ol> -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row animated fadeInLeft">
      <div class="col-md-12">
        <div class="box" style="border-top: 0px solid #d2d6de; border-left: 0px solid #d2d6de; border-right: 0px solid #d2d6de; border-bottom: 0px solid #d2d6de; ">
          <div class="box-header">
          </div>
          <div class="box-body p">
            <div class="tab-content" id="pKonten">
              <div class="tab-pane fade" id="baru" role="tabpanel" aria-labelledby="baru-tab">
              <table id="sample_1" class="table table-striped table-bordered table-hover">
              <thead>
                    <tr>
                      <th>No.</th>
                      <th>Nama Pelamar</th>
                      <th>Nama Lowongan</th>
                      <th>Tindakan</th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php 
                    $no = 1;
                    foreach ($daftar2 as $key) {
                  ?>
                    <tr>
                      <td><?= $no; ?>.</td>
                      <td><?= $key['nm_alumni']; ?></td>
                      <td><?= $key['nm_lowongan']; ?></td>
                      <td>
                        <a onclick="show_detail_pelamar('<?= $key['id_pelamar']?>')" href="javascript:void(0)" class="btn btn-sm btn-info"> Lihat Pelamar</a>
                      </td>
                    </tr>
                  <?php 
                    $no++;
                  } 
                  ?>

                </tbody>
                <tfoot>
                  <tr>
                  <th>No.</th>
                  <th>Nama Pelamar</th>
                  <th>Nama Lowongan</th>
                  <th>Tindakan</th>
                </tr>
              </tfoot>
              </table>
              </div>
              <div class="tab-pane fade  show active" id="daftar" role="tabpanel" aria-labelledby="daftar-tab">
              <table id="sample_2" class="table table-striped table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Nama Lowongan</th>
                      <th>Tanggal Dibuat</th>
                      <th>Tanggal Deadline</th>
                      <th>Tindakan</th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php 
                    $no = 1;
                    foreach ($daftar as $key) {
                  ?>
                    <tr>
                      <td><?= $no; ?>.</td>
                      <td><?= $key['nm_lowongan']; ?></td>
                      <td><?= date('d M Y', strtotime($key['tgl_dibuat'])); ?></td> 
                      <td><?= date('d M Y', strtotime($key['tgl_deadline'])); ?></td> 
                      <td>
                        <a href="<?= site_url('admin/pelamar/daftar/'.$key['id_lowongan']) ?>" class="btn btn-sm btn-info"> Lihat Pelamar</a>
                      </td>
                    </tr>
                  <?php 
                    $no++;
                  } 
                  ?>

                </tbody>
                <tfoot>
                  <tr>
                    <th>No.</th>
                    <th>Nama Lowongan</th>
                    <th>Tanggal Dibuat</th>
                    <th>Tanggal Deadline</th>
                    <th>Tindakan</th>
                </tr>
              </tfoot>
            </table>
              </div>
            </div>
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
<div class="modal bs-modal-lg animated fadeInDown" id="modal-pelamar" tabindex="-1" role="dialog" aria-hidden="true" >
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title float-left">Detail Data Pelamar</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
      </div>
      <div class="modal-body">  
        <div class="row">
          <div class="col-md-12" style="max-height: 90vh;overflow-y: auto" id="dtpelamar">
           
         </div>
       </div>
     </div>
  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<div class="modal bs-modal-lg animated fadeInDown" id="modal-berkas" tabindex="-1" role="dialog" aria-hidden="true" >
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title float-left">Daftar Berkas Pelamar</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
      </div>
      <div class="modal-body">  
        <div class="row">
          <div class="col-md-12" style="max-height: 90vh;overflow-y: auto">
           <table class="table">
               <thead>
                <tr>
                  <th>No</th>
                  <th>Keterangan</th>
                  <th>Aksi</th>
                </tr>
               </thead>
               <tbody id="dtberkas">
               </tbody>
           </table>
         </div>
       </div>
     </div>
  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>