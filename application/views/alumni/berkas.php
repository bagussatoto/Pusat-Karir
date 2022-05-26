<!-- Content Header (Page header) -->
<section class="content-header">
	<h2>
		DATA 
		<small><strong>BERKAS ALUMNI</strong></small>
	</h2>
	<!-- <ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Daftar Berkas </li>
	</ol> -->
</section>

<!-- Main content -->
<section class="content">
	<div class="row animated fadeInLeft">
		<div class="col-md-12">
			<div class="box" style="border-top: 0px solid #d2d6de; border-left: 0px solid #d2d6de; border-right: 0px solid #d2d6de; border-bottom: 0px solid #d2d6de; ">
				<div class="box-header">
				<a type="button" data-toggle="modal" href="#modal-berkas" class="btn btn-sm btn-primary">Upload Berkas</a>
				</div>
				<div class="box-body p">
					<table id="sample_1" class="table tbale-stripped table-bordered table-hover">
						<thead>
							<tr>
								<th>No.</th>
								<th>Nama File</th>
								<th>Keterangan</th>
								<th>Tindakan</th>
							</tr>
						</thead>
						<tbody>
						<?php
						$no =1;
						foreach ($daftar as $key) : ?>
							<tr>
								<td><?= $no ?>.</td>
								<td><?= $key['nm_file'] ?></td>
								<td><?= $key['keterangan'] ?></td>
								<td>
									<a href='javascript:void(0)' onclick='editB("<?= $key['id_berkas']?>")' class='btn btn-sm btn-warning'> Edit</a> &nbsp;
									<a href='#' onclick="hapus(<?= $key['id_berkas'] ?>)" class='btn btn-sm btn-danger'> Hapus</a>
									
								</td>		
							</tr>
						<?php $no++; endforeach; ?>
						</tbody>
						<tfoot>
                <tr>
                  <th>No.</th>
                  <th>Nama File</th>
                  <th>Keterangan</th>
                  <th>Tindakan</th>
               </tr>
             </tfoot>
					</table>
				</div>
			</div>
			</div>
		</div>
	</div>
</section>
<div class="modal bs-modal-lg animated fadeInDown" id="modal-berkas" tabindex="-1" role="dialog" aria-hidden="true" >
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title float-left">UPLOAD DATA BERKAS ALUMNI</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
      </div>
      <div class="modal-body">  
        <div class="row">
          <div class="col-md-12" style="max-height: 90vh;overflow-y: auto">
		  	<div class="callout callout-default">
				<h4>CATATAN:</h4>
				<ul>
					<li>File yang diupload berupa gambar dengan ekstensi .jpg | .png | .jpeg</li>
					<li>Maksimal ukuran file 2 MB</li>
				</ul>
			</div>
           <form id="form" action="<?= site_url('alumni/berkas/proses_upload')?>" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label>Upload File :</label>
					<input type="file" class="form-control" name="berkas">
				</div>
				<div class="form-group">
					<label>Keterangan :</label>
					<textarea id="ket" name="ket" class="form-control" placeholder="Keterangan File" required></textarea>
				</div>
				<hr>
				<div class="float-right">
					<button type="close" class="btn btn-sm btn-default" data-dismiss="modal">Batal</button> &nbsp;
					<button id="bs" class="btn btn-sm btn-primary">Simpan</button>
				</div>

					<!-- <a href="javascript:void(0)" id="bt" onclick="cA()" class="btn btn-sm btn-default float-left">Batal</a> -->
		   </form>
         </div>
       </div>
     </div>
  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
<script>
	function hapus(id) {
		var url = "<?= site_url('alumni/berkas/hapus') ?>/"+id;
		var conf = confirm("Apakah anda akan hapus permanen data berkas ini?");
		if(conf)
		{
			window.location.href = url;
		}
	}
</script>