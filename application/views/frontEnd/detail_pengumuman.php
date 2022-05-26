<section class="section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h4><?= $detail->nm_pengumuman; ?></h4>
				<small>Post : <b><?= date('d M Y', strtotime($detail->tgl_dibuat)); ?></b> Oleh : Administrator</small>
				<hr>
				<?= $detail->isi_pengumuman; ?>
				<hr>
				<a href="<?=site_url('Pengumuman')?>" class="btn btn-info"><i class="fa fa-chevron-left"></i></a>
			</div>

		</div>

	</div>
</section>