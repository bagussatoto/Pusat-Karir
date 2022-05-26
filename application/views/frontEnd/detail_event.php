<section class="section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<center>
					<img src="<?= ($detail->foto_cover!='')? base_url('assets/dist/img/event/'.$detail->foto_cover):base_url('assets/dist/img/no_image.png'); ?>" alt="" style="max-width: 350px;max-height: 200px;margin-bottom: 10px;" class="img">
				</center>
				<h4><?= $detail->nm_event ?></h4>
				<small>Post : <b><?= date('d M Y', strtotime($detail->tgl_dibuat)); ?></b> Oleh : Administrator</small>

				<hr>
				<div>
					<?= $detail->isi; ?>
				</div>
				<hr>
				<a href="<?=site_url('Event')?>" class="btn btn-info"><i class="fa fa-chevron-left"></i></a>
			</div>
		</div>
	</div>
</section>