<section class="section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h3 class="text-center"><strong>LOWONGAN PEKERJAAN</strong></h3>
				<hr>
			</div>
			
			<div class="col-md-12">
				 <!--  <select id="kat" name="kat" onchange="loadData(0)" class="btn btn-info select2" data-placeholder="Jenis Pekerjaan">
					<option value="">Jenis Pekerjaan</option>
					<?php  
					foreach ($pendidikan as $pn) {
						echo '<option class="dropdown-item" href="javascript:void(0)">'.$pn['jenjang'].'</option>';
					}
					?>
				</select> 
				
				<select id="posisi" name="posisi" onchange="loadData(0)" class="btn btn-info select2" data-placeholder="Posisi/Jabatan">
					<option value="">Posisi/Jabatan</option>

					<?php  
					// print_r($posisi);
					foreach ($posisi as $ps) {
						echo '<option class="dropdown-item" href="#">'.$ps['nm_posisi'].'</option>';
					}
					?>
				</select> &nbsp;
				<select id="pen" name="pen" onchange="loadData(0)" class="btn btn-info select2" data-placeholder="Pendidikan">
					<option value="">Pendidikan</option>
					<?php  
					foreach ($pendidikan as $pn) {
						echo '<option class="dropdown-item" href="javascript:void(0)">'.$pn['jenjang'].'</option>';
					}
					?>
				</select> -->
				<div class="float-right">
					<form action="" method="get">
						<div class="input-group mb-3">
							<input id="cari" onkeyup="loadData(0)" type="text" class="form-control" placeholder="Pencarian" aria-label="Pencarian" aria-describedby="basic-addon1">
							<div class="input-group-prepend">
								<button class="input-group-text btn btn-default" id="basic-addon1"><i class="fa fa-search"></i></button>
							</div>
						</div>
					</form>
				</div>
				<hr style="clear: both;">
			</div>
		</div>
		<div class="row" id="dtloker">
			<!-- <div class="col-md-12">
				<table id="sample_1" class="table data-table">
					<thead>
						<tr>
							<th>NO.</th>
							<th>NAMA LOWONGAN</th>
							<th>PERUSAHAAN</th>
							<th>TANGGAL DIBUAT</th>
							<th>TANGGAL DEADLINE</th>
							<th>PENDIDIKAN</th>
							<th>POSISI</th>
						</tr>
					</thead>
					<tbody>
						<?php $no=1; foreach($lowongan as $row) : ?>
							<tr>
								<td><?= $no++ ?>.</td>
								<td><?= $row->nm_lowongan ?></td>
								<td><?= $row->nm_perusahaan ?></td>
								<td><?= date('d M Y',strtotime($row->tgl_dibuat)) ?></td>
								<td><?= date('d M Y',strtotime($row->tgl_deadline)) ?></td>
								<td><?= $row->jenjang ?></td>
								<td><?= $row->nm_posisi ?></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div> -->
		</div>
		<!-- /row -->
		<div class="row">
			<div class="col-md-12" id="pgnn">
				<hr>
				<!-- Paginate -->
				<div style='margin-top: 10px;' id='pagination' class="float-right">
				</div>
			</div>
		</div>
	</div>
	<!-- /container -->
</section>
