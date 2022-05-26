<section class="section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<img src="<?= ($detail->logo_perusahaan=='')? base_url('assets/dist/img/no_logo.png'):base_url('assets/dist/img/perusahaan/'.$detail->logo_perusahaan); ?>" alt="" style="max-width: 200px;max-height: 150px;margin-right: 10px;" class="img float-left">
				<h4><?= $detail->nm_perusahaan ?></h4>
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
			</div>
			<div class="col-md-12">
				<hr>
				<center>
					<h4><?= $detail->nm_lowongan ?></h4>
				</center>
				<hr>
				<?= $detail->deskripsi_lowongan;?>
				<hr>
				<?php
				if ($user_alumni==true) {
					if($detail->status=='Dibuka'){
					echo '<a href="'.site_url('pelamar/daftar/').$detail->id_lowongan.'" class="btn btn-outline-primary float-right" style="margin-bottom: 15px;"> DAFTAR SEBAGAI PELAMAR</a>';
					}
				}
				?>
				<a href="<?=site_url('Lowongan')?>" class="btn btn-info"><i class="fa fa-chevron-left"></i></a>
				<br>
				
				<hr style="clear: both;">
			</div
		</div>
	</div>
</section>