
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>REGISTRASI ALUMNI UNIVERSITAS BUMIGORA MATARAM</title>
	<link rel="icon" type="icon" href="<?= base_url('assets/dist/img/UBG.png'); ?>">
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="<?php echo base_url('assets') ?>/dist/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url('assets') ?>/dist/font/css/all.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url('assets') ?>/dist/css/AdminLTE.min.css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<style>
.login-page{
	background-color: #c8d7f5;
}
.register-box {
	width: 100%;
	margin-top: 20px;
}
.register-box-body{
	box-shadow: 0px 4px 6px grey;
	border-radius: 10px;
}
</style>
</head>
<body class="hold-transition login-page">
	<div class="container">
		<div class="register-box">
			<div class="login-logo">
				<h2><strong>REGISTRASI ALUMNI</strong></h2>
				<hr>
			</div>
			<!-- <p style="text-align: justify;"><strong>Note :</strong> Data registrasi anda akan dilakukan verifikasi terlebih dahulu oleh admin jika valid maka anda kemudian bisa melakukan login ke halaman alumni dan mengupload berkas anda, namun jika data yang anda inputkan tidak valid maka anda harus melakukan registrasi ulang sampai dinyatakan valid. </p><hr> -->
			<!-- /.login-logo -->
			<div class="register-box-body">
				<form action="<?= site_url('alumni/login/proses_registrasi') ?>" method="post" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>NIM :</label>
								<input required="" type="text" name="ta_nim" class="form-control" placeholder="NIM" maxlength="10" minlength="10">
							</div>
							<div class="form-group">
								<label>Nama :</label>
								<input required="" type="text" name="ta_nama" class="form-control" placeholder="Nama Lengkap">
							</div>
							<div class="form-group">
								<label>Alamat :</label>
								<textarea required="" name="ta_alamat" class="form-control" placeholder="Alamat Alumni"></textarea>
							</div>
							<div class="form-group">
								<label>Jurusan :</label>
								<select class="form-control" name="ta_jurusan">
									<option value="S1 Ilmu Komputer">S1 Ilmu Komputer</option>
									<option value="S1 Farmasi">S1 Farmasi</option>
									<option value="S1 Gizi">S1 Gizi</option>
									<option value="S1 DKV">S1 DKV</option>
									<option value="D3 RPL">D3 RPL</option>
								</select>
							</div>
							<div class="form-group">
								<label>IPK :</label>
								<input required="" type="text" name="ipk" class="form-control" placeholder="IPK" maxlength="4" minlength="1" >
							</div>
							<div class="form-group">
								<label>Keahlian :</label>
								<textarea required="" class="form-control" placeholder="Keahlian" name="keahlian"></textarea>
							</div>
							<div class="form-group">
								<label>Tahun Angkatan :</label>
								<input required="" type="text" name="ta_angkatan" class="form-control" placeholder="Tahun Angkatan">
							</div>
							<div class="form-group">
								<label>Tahun Lulus :</label>
								<input required="" type="text" name="ta_lulus" class="form-control" placeholder="Tahun Lulus">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>No. Telepon :</label>
								<input type="text" required="" class="form-control" placeholder="Nomor Telepon" name="ta_telp" maxlength="15" min="10">
							</div>
							<div class="form-group">
								<label>Email :</label>
								<input required="" type="email" name="ta_email" class="form-control" placeholder="Email">
							</div>
							<div class="form-group">
								<label>Password :</label>
								<input required="" type="password" name="ta_password" class="form-control" placeholder="Password">
							</div>
							<div class="form-group">
					            <label>Pengalaman Kerja :</label>
					           <input type="number" name="ta_pk" class="form-control" minlength="1" maxlength="2">
					       	</div>
					       	<div class="form-group">
					            <label>Tes Potensi Akademik :</label>
					            <select class="form-control" name="ta_tpa">
					              <option>Pilih</option>
					              <option value="86-100">86-100</option>
					              <option value="76-85">76-85</option>
					              <option value="66-75">66-75</option>
					              <option value="51-65">51-65</option>
					              <option value="0-50">0-50</option>
					            </select>
					        </div>
					        <div class="form-group">
					            <label>Kemampan Bahasa Inggris :</label>
					            <select class="form-control" name="ta_ing">
					              <option>Pilih</option>
					             <option value="Sangat Baik">Sangat Baik</option>
					              <option value="Baik">Baik</option>
					              <option value="Cukup">Cukup</option>
					              <option value="Kurang">Kurang</option>
					              <option value="Sangat Kurang">Sangat Kurang</option>
					            </select>
					        </div>
							<div class="form-group">
								<label>Foto :</label><br>
								<input required="" id="ta_foto" type="file" name="ta_foto" class="form-control" style="display: none">
								<label for="ta_foto" class="btn btn-dark"> Upload Foto</label>
							</div>
						</div>
						<!-- <div class="col-md-12">
							<hr>
							<div class="float-right">
								<button type="reset" class="btn btn-default">Reset</button> 
								<button class="btn btn-primary">Registrasi</button><br>
								<a href="<?= site_url('alumni/login/'); ?>">Login</a>
							</div>
						</div> -->
						<div class="col-md-12">
							<hr>
							<div class="float-left">
								
								 <a href="<?= site_url(''); ?>" class="btn btn-info"> <i class="fa fa-chevron-left"></i></a>
							</div>
							<div class="float-right">
								<button type="reset" class="btn btn-default">Reset</button> &nbsp;
								<button class="btn btn-primary">Registrasi</button><br>
								 
							</div>
						</div>
					</div>					
				</form>

			</div>
			<!-- /.login-box-body -->
		</div>
		<!-- /.login-box -->
	</div>

	<script src="<?php echo base_url('assets') ?>/dist/js/jquery.min.js"></script>
	<script src="<?= base_url('assets/dist/plugins/popper.min.js') ?>"></script>
	<!-- Bootstrap 3.3.6 -->
	<script src="<?php echo base_url('assets/dist/js/bootstrap.min.js') ?>"></script>
	<?php  
	$pesan = $this->session->flashdata('pesan');
	if (!empty($pesan)) {
		echo "<script>";
		echo "alert('".$pesan."');";
		echo "</script>";
	}
	?>
</body>
</html>
