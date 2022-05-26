<center><img src="<?= empty($data->logo_perusahaan) ? base_url('assets/images/default-logo.png') :  base_url('assets/dist/img/perusahaan/'.$data->logo_perusahaan) ?>" class="img-thumbnail" style="width: 200px"></center><br>
<center><b><?= $data->nm_perusahaan ?></b></center>
<br>
<table class="table">
    <tbody>
    <tr>
        <td>Nama Perusahaan</td>
        <td>:</td>
        <td><?= $data->nm_perusahaan ?></td>
    </tr>
     <tr>
        <td>Email Perusahaan</td>
        <td>:</td>
        <td><?= $data->email_perusahaan ?></td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td>:</td>
        <td><?= $data->alamat_perusahaan ?></td>
    </tr>
    <tr>
        <td>No. Telepon</td>
        <td>:</td>
        <td><?= $data->noTelp_perusahaan ?></td>
    </tr>
   
    <tr>
        <td>Jenis Perusahaan</td>
        <td>:</td>
        <td><?= $data->jenis_perusahaan ?></td>
    </tr>
    <tr>
        <td>Surat Izin Perusahaan</td>
        <td>:</td>
        <td><?= $data->surat_izin ?></td>
    </tr>
    </tbody>
</table>
