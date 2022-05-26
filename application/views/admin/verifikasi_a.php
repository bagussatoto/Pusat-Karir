  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h2>
      DATA
      <small><strong>VERIFIKASI ALUMNI</strong></small>
    </h2>
    <!-- <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Daftar Alumni </li>
    </ol> -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row animated fadeInLeft">
      <div class="col-md-12">
        <div class="box" style="border-top: 0px solid #d2d6de; border-left: 0px solid #d2d6de; border-right: 0px solid #d2d6de; border-bottom: 0px solid #d2d6de; ">
          <div class="box-body p">
            <table id="sample_1" class="table table-striped table-bordered table-hover">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>NIM Alumni</th>
                  <th>Nama Alumni</th>
                  <th>Alamat</th>
                  <th>Tahun Kelulusan</th>
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
                    <td><?= $key['nim']; ?></td>
                    <td><?= $key['nm_alumni']; ?></td>
                    <td><?= $key['alamat']; ?></td>
                    <td><?= $key['thn_kelulusan']; ?></td>
                   
                    <td>
                      <a href="javascript:void(0)" onclick="show_detail_a('<?= $key['nim']?>')" class="btn btn-sm btn-info"> Detail</a>
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
                  <th>NIM Alumni</th>
                  <th>Nama Alumni</th>
                  <th>Alamat</th>
                  <th>Tahun Kelulusan</th>                  
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
<div class="modal bs-modal-lg animated fadeInDown" id="modal-alumni" tabindex="-1" role="dialog" aria-hidden="true" >
  <div class="modal-dialog modal-lg" style="width:100%;">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title float-left">DETAIL DATA VERIFIKASI ALUMNI</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
      </div>
      <div class="modal-body">  
        <div class="container">
          <div class="row">
            <div class="col-md-12"  id="dtalumni">

            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer" style="clear:both;">
        
        <a href="" class="btn btn-sm btn-danger" id="bu">Tidak Valid</a> &nbsp;
        <a href="" class="btn btn-sm btn-success" id="bv">Valid</a> 
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>