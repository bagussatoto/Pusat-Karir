  <!-- Content Header (Page header) -->
  <section class="content-header">
  	<h2>
    DATA 
    <small><strong>STATUS LAMARAN</strong></small>
  </h2>
  	<!-- <ol class="breadcrumb">
  		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
  		<li><a href="#">Lowongan Kerja</a></li>
  		<li class="active">Daftar Lamaran </li>
  	</ol> -->
  </section>

  <!-- Main content -->
  <section class="content">
  	<div class="row animated fadeInLeft">
  		<div class="col-md-12">
  			<div class="box">
  				<div class="box-header">
  				</div>
  				<div class="box-body p">
  					<div class="callout callout-default" style="border-left: 5px solid #3c8dbc;">
  						<h4>Note :</h4>
  						<p>
  							Jika status sebagai pelamar diterima, silahkan lengkapi dan tunjukan persyaratan dan berkas lainnya ke alamat/tempat yang sudah ditentukan dalam deskripsi lowongan pekerjaan tempat anda diterima. Terimakasih.
  						</p>
  					</div>
  					<table id="sample_1" class="table table-striped table-bordered table-hover">
  						<thead>
  							<tr>
  								<th>No.</th>
  								<th>Nama Perusahaan</th>
  								<th>Nama Lowongan</th>
  								<th>Status</th>
  							</tr>
  						</thead>
  						<tbody>
  							<?php  
  							$no =1;
  							foreach ($daftar as $key) {
  								?>
  								<tr>
  									<td><?= $no ?>.</td>
  									<td><?= $key['nm_perusahaan'] ?></td>
  									<td><a target="_blank" title="Lihat Lowongan" href="<?=  site_url('lowongan/detail_loker/'.$key['id_lowongan']) ?>"><?= $key['nm_lowongan'] ?></a></td>
  									<td>
										  <?php
										  if($key['status_p']=='diterima'){
											echo '<label class="btn btn-sm btn-success">Diterima</label>';
										  }elseif($key['status_p']=='ditolak'){
											echo '<label class="btn btn-sm btn-danger">Belum Diterima</label>';
										  }else{
											echo '<label class="btn btn-sm btn-warning">Belum Diperiksa</label>';
										  }
										  ?>
										  </td>
  									</tr>
  									<?php $no++; } ?>
  								</tbody>  	
  								<tfoot>
  									<tr>
  										<th>No</th>
  										<th>Nama Perusahaan</th>
  										<th>Nama Lowongan</th>
  										<th>Status</th>
  									</tr>
  								</tfoot>					
  							</table>
  						</div>
  					</div>
  				</div>
  			</div>
  		</section>