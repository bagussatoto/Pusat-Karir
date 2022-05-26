<section class="section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h3 class="text-center"><strong>LOWONGAN PEKERJAAN</strong></h3>
				<hr>
			</div>
			<?php  
				if (empty($loker)) {
					echo "<h4 style='color:#2e2e2e'> &nbsp; Tidak ada data</h4>";
				}else{

					foreach ($loker as $key) {
			?>
			<div class="col-sm-6 col-md-4">
				<div class="card">
				  <div class="card-body">
				  	<img class="card-img-top float-left" src="<?= $foto = (empty($key['logo_perusahaan']) ? base_url('assets/images/default-logo.png') : base_url('assets/dist/img/perusahaan/'.$key['logo_perusahaan']))?>" alt="Card image cap" style="width: 100px; margin-right: 10px;">
				    <h5 class="card-title" style="margin-top: 10px"><?= $key['nm_perusahaan']; ?></h5>
				    <label style="width: 50%;"><?= $key['alamat_perusahaan'] ?></label>
				    <hr>
				    <p style="clear: both;margin-top: 15px" class="card-text"><?= substr($key['deskripsi_lowongan'], 0,100) ?> ...</p>
				  </div>


				  <div class="card-body" style="color:#fff">
				  	<div class="jml bg-info">
				  		<label class="jml-o"><?= $key['jumlah_orang'] ?></label> Orang
				  	</div>
				  	<div class="d-flex align-items-end dlo">
				    <a href="<?= site_url('lowongan/detail_loker/'.$key['id_lowongan']) ?>" class="card-link">Lihat Detail</a>
				  	</div>
				  </div>
				</div>
			</div>
			<?php } } ?>
			<div class="col-md-12">
				<hr>
				<a href="<?= site_url('Lowongan') ?>" class="btn btn-sm btn-primary float-right">Lihat Semua</a>
			</div>
		</div>
	</div>
</section>
<section class="section bg2">
	<div class="container">
		<div class="row ">
			
			<div class="col-md-12">
				<h3 class="text-center"><strong>EVENT & CARIER NEWS</strong></h3>
				<hr>
			</div>
			<?php  
				if (empty($event)) {
					echo "<h4 style='color:#2e2e2e'> &nbsp; Tidak ada data</h4>";
				}else{

					foreach ($event as $key) {
			?>
			<div class="col-sm-6 col-md-4">
				<div class="card" >
					<div class="card-header">
				  	<img class="card-img-top float-left" src="<?= $foto = ($key['foto_cover']==''? base_url('assets/dist/img/no_image.png'): base_url('assets/dist/img/event/'.$key['foto_cover']))?>" alt="" style="max-height: 200px">
					</div>
				  <div class="card-body">
				    <h5 class="card-title"><?= $key['nm_event'] ?></h5>
				    <small>Post : <b><?= Date('d M Y',strtotime($key['tgl_dibuat'])); ?></b> Oleh : Administrator</small><hr>
				    <div style="clear: both;" class="card-text">
				    	<?= substr($key['isi'], 0,100); ?> ...
				    </div>

				    
				  </div>
				  <div class="card-body">
				    <a href="<?= site_url('event/detail_event/'.$key['id_event']) ?>" class="card-link">Lihat Detail</a>
				  </div>
				</div>
				<br>
			</div>
			<?php } }?>
			<div class="col-md-12">
				<hr>
				<a href="<?= site_url('Event') ?>" class="btn btn-sm btn-primary float-right">Lihat Semua</a>
			</div>
		</div>
	</div>
</section>