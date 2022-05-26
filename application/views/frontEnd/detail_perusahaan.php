<section class="section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<center>
					<img src="<?= ($detail->logo_perusahaan!='')? base_url('assets/dist/img/perusahaan/'.$detail->logo_perusahaan):base_url('assets/dist/img/no_image.png'); ?>" alt="" style="max-width: 350px;max-height: 200px;margin-bottom: 10px;" class="img">
				<h4><?= $detail->nm_perusahaan ?></h4>
				<hr>
				
				<table>
					<tr>
						<td>Alamat</td>
						<td>:</td>
						<td><?= $detail->alamat_perusahaan ?></td>
					</tr>
					<tr>
						<td>No.Telp</td>
						<td>:</td>
						<td><?= $detail->noTelp_perusahaan ?></td>
					</tr>
					<tr>
						<td>Jenis Perusahaan</td>
						<td>:</td>
						<td><?= $detail->jenis_perusahaan ?></td>
					</tr>
				</table>
				</center>
				<hr>
				<a href="<?=site_url('home/perusahaan')?>" class="btn btn-info"><i class="fa fa-chevron-left"></i></a>
			</div>

		</div>
	</div>
</section>