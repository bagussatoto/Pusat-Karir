<center><img src="<?= empty($data->foto) ? base_url('assets/images/foto.jpg') : base_url('assets/dist/img/alumni/'.$data->foto)  ?>" class="img-thumbnail" style="width: 150px"></center><br>
<center><b><?= $data->nm_alumni ?></b></center>
<br>
<table class="table">
	<tbody>
		<tr>
			<td>Nama Pelamar</td>
			<td>:</td>
			<td><?= $data->nm_alumni ?></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td>:</td>
			<td><?= $data->alamat ?></td>
		</tr>
		<tr>
			<td>No. Telepon</td>
			<td>:</td>
			<td><?= $data->noTelp ?></td>
		</tr>
		<tr>
			<td>Email</td>
			<td>:</td>
			<td><?= $data->email ?></td>
		</tr>
		<tr>
			<td>Jurusan</td>
			<td>:</td>
			<td><?= $data->jurusan ?></td>
		</tr>
		<tr>
			<td>Keahlian</td>
			<td>:</td>
			<td><?= $data->keahlian ?></td>
		</tr>
		<tr>
			<td>IPK</td>
			<td>:</td>
			<td><?= $data->ipk ?></td>
		</tr>
		<tr>
			<td>Tahun Angkatan</td>
			<td>:</td>
			<td><?= $data->thn_angkatan ?></td>
		</tr>
		<tr>
			<td>Tahun Kelulusan</td>
			<td>:</td>
			<td><?= $data->thn_kelulusan ?></td>
		</tr>
		<tr>
			<td>Data Berkas Pelamar</td>
			<td>:</td>
			<td><a href="#" onclick="berkas(<?= $data->nim ?>)">Lihat berkas</a></td>
		</tr>
	</tbody>
</table>
