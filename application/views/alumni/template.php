<!DOCTYPE html>
<html>
<head>
	<title>ALUMNI KARIR UNIVERSITAS BUMIGORA MATARAM</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.6 -->
	<link rel="icon" type="icon" href="<?= base_url('assets/dist/img/UBG.png'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets') ?>/dist/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url('assets') ?>/dist/font/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets'); ?>/dist/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets'); ?>/dist/css/skins/style_admin.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets'); ?>/dist/plugins/animateCss/animate.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="<?php echo base_url('assets') ?>/dist/plugins/datatables/datatables.min.css">
	<link rel="stylesheet" href="<?php echo base_url('assets') ?>/dist/plugins/datatables/datatables.bootstrap.css">
	<!-- Select2 -->
	<link rel="stylesheet" href="<?= base_url('assets/plugins/') ?>select2/select2.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url('assets') ?>/dist/css/AdminLTE.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets'); ?>/dist/css/datapicker/datepicker3.css">
	<link rel="stylesheet" href="<?php echo base_url('assets') ?>/dist/css/bootstrap-datepicker3.css">
	<link rel="stylesheet" href="<?php echo base_url('assets') ?>/dist/css/bootstrap-datetimepicker.css">
	<link rel="stylesheet" href="<?php echo base_url('assets') ?>/dist/css/daterangepicker.min.css">
	<script src="<?php echo base_url('assets/plugins/jQuery/jQuery-2.2.0.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets') ?>/plugins/tinymce/tinymce.min.js"></script>
	<link rel="stylesheet" href="<?php echo base_url('assets') ?>/dist/css/skins/_all-skins.min.css">
	<script src="<?php echo base_url('assets') ?>/dist/js/jquery.min.js"></script>
	<style>
	.wrapper{
		padding: 0;
	}
	.box-body.p .dt-button{
		display: none !important;
	}
	.modal-header, .modal-footer {
		background: #0a6da4;
		color: #fff;
	}
	.modal-open {
		section {
			-webkit-filter: blur(20px);
			-moz-filter: blur(20px);
			filter: blur(20px);
		}
	}
	.main-header .sidebar-toggle{
		padding: 0!important;
	}
	.main-header .sidebar-toggle:before{
		content: ''!important;
	}
</style>
</head>
<body class="hold-transition skin-blue sidebar-mini wysihtml5-supported fixed animated ">
	<div class="wrapper">

		<header class="main-header">
			<!-- Logo -->
			<a href="<?php echo base_url('alumni'); ?>" class="logo">
				<!-- mini logo for sidebar mini 50x50 pixels -->
				<span class="logo-mini"><b>SK</b></span>
				<!-- logo for regular state and mobile devices -->
				<span class="logo-lg"><b>KARIR </b></span>
			</a>
			<!-- Header Navbar: style can be found in header.less -->
			<nav class="navbar navbar-static-top">
				<!-- Sidebar toggle button-->
				<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
					<i class="fa fa-bars"></i>
				</a>

				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<li class="dropdown user user-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<img style="float: none" src="<?php echo base_url('assets/dist/img/gambar.png'); ?>" class="user-image" alt="User Image">
								<span class="hidden-xs"></span>
							</a>
							<ul class="dropdown-menu animated fadeInRight" style="    top: 37px;">
								<!-- User image -->
								<li class="user-header">
									<img src="<?php echo base_url('assets/dist/img/gambar.png'); ?>" class="img-circle" alt="User Image">

									<p>
							<?php
								echo $alumni->nm_alumni;
							?>
						</p>
								</li>
								<?php  
									$logout = site_url('alumni/login/logout');
								?>
								<!-- Menu Footer-->
								<li class="user-footer">
<!--									<div class="float-left">-->
<!--										<a href="--><?php //echo site_url('profil'); ?><!--" class="btn btn-sm btn-default btn-flat"> Propile</a>-->
<!--									</div>-->
									<div class="float-right">
										<a href="<?= $logout ?>" class="btn btn-sm btn-primary btn-flat"> Logout</a>
									</div>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
		</header>

		<!-- Left side column. contains the logo and sidebar -->
		<aside class="main-sidebar">
			<!-- sidebar: style can be found in sidebar.less -->
			<section class="sidebar">
				<!-- Sidebar user panel -->
				<div class="user-panel animated fadeInDown">
					<div class="float-left image">
						<img src="<?php echo base_url('assets/dist/img/gambar.png'); ?>" class="img-circle" alt="User Image">
					</div>
					<div class="float-left info">
						<p>
							<?php
								echo $alumni->nm_alumni;
							?>
						</p>
						<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
					</div>
				</div>
				<!-- sidebar menu: : style can be found in sidebar.less -->
				<ul class="sidebar-menu">
					<li class="header animated fadeInDown">MAIN NAVIGATION</li>
					<li class="">
						<a href="<?= site_url('alumni/home') ?>">
							<i class="fa fa-home"> </i> Dashboard
						</a>
					</li>

					 <li class="treeview animated fadeInDown">
                        <a href="<?= site_url('alumni/berkas') ?>">
                            <i class="fa fa-folder"></i>
                            <span>Berkas</span>
                        </a>

                    </li>

					<li class="treeview animated fadeInDown">
                        <a href="<?= site_url('alumni/pengumuman') ?>">
                            <i class="fa fa-space-shuttle"></i>
                            <span>Data Pengumuman</span>
                        </a>

                    </li>

					<li class="treeview animated fadeInDown">
                        <a href="<?= site_url('alumni/pemberitahuan') ?>">
                            <i class="fa fa-bell"></i>
                            <span>Data Pemberitahuan</span>
                        </a>

                    </li>
				</ul>
			</section>
			<!-- /.sidebar -->
		</aside>
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper" style="min-height: 700px;">
			<?php
			$this->load->view($halaman);
			?>
		</div>
		<footer class="main-footer">
			<!-- <div class="float-right hidden-xs">
				Template By <a href="http://almsaeedstudio.com">Almsaeed Studio</a><b>, Version</b> 2.3.3
			</div> -->
			<strong>COPYRIGHT &copy; <?php echo date('Y'); ?> KARIR UNIVERSITAS KUMPULAN KODE.</strong>
		</footer>

	</div>
	<!-- ./wrapper -->

	<div class="modal bs-modal-lg animated shake modal-danger" id="smalls" tabindex="-1" role="dialog" aria-hidden="true" >
		<div class="modal-dialog modal-lg" style="width: 350px;">
			<div class="modal-content">
				<div class="modal-header">
					<center><h4 class="modal-title">Lockscreen</h4></center>
				</div>
				<div class="modal-body"> 
					<form>
						<div class="input-group">
							<input class="form-control" placeholder="password" type="password">

							<div class="input-group-btn">
								<button type="button" class="btn"><i class="fa fa-arrow-right text-muted"></i></button>
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer" style="clear:both;">
					<div class="col-sm-12">
						<center> <a href="" class="btn btn-default" data-dismiss="modal"> OK</a></center>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- jQuery 2.2.0 -->
	<script src="<?php echo base_url('assets/plugins/jQuery/jQuery-2.2.0.min.js') ?>"></script>
	<script src="<?= base_url('assets/dist/plugins/popper.min.js') ?>"></script>
	<!-- Bootstrap 3.3.6 -->
	<script src="<?php echo base_url('assets/dist/js/bootstrap.min.js') ?>"></script>
	<!-- SlimScroll -->
	<script src="<?php echo base_url('assets/plugins/slimScroll/jquery.slimscroll.min.js') ?>"></script>
	<!-- FastClick -->
	<script src="<?php echo base_url('assets/plugins/fastclick/fastclick.js') ?>"></script>
	<!-- AdminLTE App -->
	<script src="<?php echo base_url('assets/dist/js/app.min.js') ?>"></script>
	<!-- Datatables -->
	<script src="<?php echo base_url('assets/dist/plugins/datatables/datatables.js')?>" type="text/javascript"></script>
	<script src="<?php echo base_url('assets/dist/plugins/datatables/datatables.bootstrap.js')?>" type="text/javascript"></script>
	<script src="<?php echo base_url('assets/dist/plugins/datatables/table-datatables-buttons.js')?>" type="text/javascript"></script>
	<script src="<?php echo base_url('assets/dist/js/daterangepicker/daterangepicker.js')?>" type="text/javascript"></script>
	<script src="<?php echo base_url('assets/dist/js/daterangepicker/bootstrap-datepicker.min.js')?>" type="text/javascript"></script>

	<script src="<?php echo base_url('assets/dist/js/daterangepicker/bootstrap-datetimepicker.js')?>" type="text/javascript"></script>
	<script src="<?php echo base_url('assets/dist/js/datapicker/bootstrap-datepicker.js')?>"></script>
	<script src="<?php echo base_url('assets/plugins/select2/select2.min.js')?>"></script>

	<script type="text/javascript">
		$('.datepicker').datepicker({
			format: 'dd/mm/yyyy',
			startDate: '+0d',
			autoclose: true,
			keyboardNavigation: false,
			forceParse: false
		});
		<?php  
		$pesan = $this->session->flashdata('pesan');
		if (!empty($pesan)) {
			echo "alert('".$pesan."');";
		}
		?>

		$('.select2').select2();
		 <?php  
		 if ($this->uri->segment(2)=="berkas") {
		 	?>
		 	function editB(id){
		       $.ajax({
		        url: '<?=base_url()?>index.php/Alumni/Berkas/Edit/'+id,
		        type: 'get',
		        dataType: 'json',
		        data:{
		          id:id
		        },
		        success: function(response){
		         	$('#dtevent').html('');
			          var ket = response.keterangan;
			          
			          $('#ket').val(ket);
			          var link = '<?= site_url('event/detail_event/') ?>'+id;
			          $('#form').attr('action','http://localhost/karir/index.php/alumni/berkas/proses_edit/'+response.id_berkas);
			        
			        $('#modal-berkas').modal('show');
		        }
		      });
		     }
		     function cA() {
		     	 $('#form').attr('action','http://localhost/karir/index.php/alumni/berkas/proses_upload');
			      $('#modal-berkas').modal('hide');
		     }
		 	<?php
		 }
		 ?>
	</script>

	</body>
	</html>

