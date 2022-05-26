<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>LOGIN ALUMNI UNIVERSITAS BUMIGORA MATARAM</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.7 -->
	<link rel="icon" type="icon" href="<?= base_url('assets/dist/img/UBG.png'); ?>">
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
</head>
<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
			<h1><strong style="font-size: 48px;">LOGIN ALUMNI</strong></h1>
		</div>
		<!-- /.login-logo -->
		<div class="login-box-body">
			<form action="<?= site_url('alumni/login/proses_login') ?>" method="post">
				<div class="form-group has-feedback">
					<input type="text" class="form-control" placeholder="NIM" name="nim_a">
					<i class="glyphicon glyphicon-envelope form-control-feedback"></i>
				</div>
				<div class="form-group has-feedback">
					<input type="password" class="form-control" placeholder="Password" name="pass_a">
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				</div>
				<hr>
				<div class="float-left">
								
								 <a href="<?= site_url(''); ?>"> <i class="fa fa-chevron-left"></i> Kembali</a>
							</div>
				<div  class="form-group">
					<!-- <button type="reset" class="btn btn-default float-right"">Reset</button> -->
					<!-- <a href="<?= site_url('')?>" class="btn btn-default">Back</a> -->
					<button class="btn btn-primary float-right">Login</button><br>
				</div>
			</form>
		</div>
		<!-- /.login-box-body -->
	</div>
	<!-- /.login-box -->

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
