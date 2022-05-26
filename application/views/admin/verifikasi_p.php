  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Verifikasi Perusahaan/Instansi
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Daftar Perusahaan </li>
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
                  <th>Nama Perusahaan</th>
                  <th>Jenis Perusahaan</th>
                  <th>Alamat</th>
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
                    <td><?= $key['nm_perusahaan']; ?></td>
                    <td><?= $key['jenis_perusahaan']; ?></td>
                    <td><?= $key['alamat_perusahaan']; ?></td>
                    <td>
                      <a href="javascript:void(0)" onclick="show_detail_pv('<?= $key['id_perusahaan']?>')" class="btn btn-sm btn-info"><i class="fa fa-search"></i> Detail</a>
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
                 <th>Nama Perusahaan</th>
                 <th>Jenis Perusahaan</th>
                 <th>Alamat</th>
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
<div class="modal bs-modal-lg animated fadeInDown" id="mDetailP" tabindex="-1" role="dialog" aria-hidden="true" >
  <div class="modal-dialog modal-lg" style="width:100%;">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title float-left">Detail Perusahaan</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
      </div>
      <div class="modal-body">  
        <div class="container">
          <div class="row">
            <div class="col-md-12"  id="detail_pv">

            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer" style="clear:both;">
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>