
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>AdminLTE 2 | Log in</title>
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
				<a href="#"><strong>REGISTRASI</strong> PERUSAHAAN</a>
			</div>
			<!-- /.login-logo -->
			<div class="register-box-body">
				<form action="<?= site_url('perusahaan/login/proses_registrasi') ?>" method="post" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Nama Perusahaan:</label>
								<input type="text" name="nmPerusahaan" class="form-control" placeholder="Nama Perusahaan" required>
							</div>
							<div class="form-group">
								<label>Jenis Perusahaan:</label>
								<select name="tj_perusahaan" class="form-control" required>
									<option>Perdagangan</option>
									<option>Industri</option>
									<option>Elektronik</option>
									<option>Lainnya</option>
								</select>
							</div>
							<div class="form-group">
								<label>Alamat:</label>
								<textarea name="alamat" class="form-control" placeholder="Alamat Perusahaan" required></textarea>
							</div>
							<div class="form-group">
								<label>No. Telp:</label>
								<input type="text" name="telp" class="form-control" placeholder="No. Telp" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Email:</label>
								<input type="email" name="email" class="form-control" placeholder="Email" required>
							</div>
							<div class="form-group">
								<label>Password:</label>
								<input type="password" name="pass" class="form-control" placeholder="Password" required>
							</div>
							<div class="form-group">
								<label>Logo Perusahaan:</label>
								<input id="tp_foto" type="file" name="logo" class="form-control" style="display: none">
								<label for="tp_foto" class="btn btn-dark">Upload Foto</label>
							</div>
						</div>
					</div>
					
					
					<hr>
					<button type="reset" class="btn btn-default">Reset</button>
					<button class="btn btn-primary float-right">Registrasi</button><br>
					Anda sudah punya akun? klik 
					<a href="<?= site_url('Perusahaan/login');?>">Login </a>
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
