<section class="section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
        <h3 class="text-center"><strong>DAFTAR ALUMNI</strong></h3>
        <hr>

				<table id="sample_1" class="table table-striped table-bordered table-hover">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>NIM</th>
                  <th>Nama Alumni </th>
                  <th>Jurusan</th>
                  <th>Tahun Angkatan</th>
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
                  <td><?= $key['jurusan']; ?></td>
                  <td><?= $key['thn_angkatan']; ?></td>
                  
                </tr>
              <?php 
                $no++;
               } 
              ?>

             </tbody>
             <tfoot>
              <tr>
               <th>No.</th>
                  <th>NIM</th>
                  <th>Nama Alumni</th>
                  <th>Jurusan</th>
                  <th>Tahun Angkatan</th>
             </tr>
           </tfoot>
         </table>
			</div>
		</div>
	</div>
</section>