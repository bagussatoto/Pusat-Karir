<!DOCTYPE html>
<html>
<head>
	<title>ADMIN KARIR UNIVERSITAS BUMIGORA MATARAM</title>
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
<script>
	tinymce.init({
		selector: '#pageArea',
  		// theme: 'modern',
  		height: 450,
  		paste_data_images: true,
  		imagetools_cors_hosts: ['www.tinymce.com', 'codepen.io'],
  		theme: 'modern',
  		plugins: [
  		'advlist autolink lists link charmap print preview hr anchor pagebreak',
  		'searchreplace wordcount visualblocks visualchars code',
  		'insertdatetime media nonbreaking save table contextmenu directionality',
  		'emoticons template paste textcolor colorpicker textpattern imagetools legacyoutput'
  		],
  		toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link',
  		toolbar2: 'print preview media | forecolor backcolor emoticons fontselect fontsizeselect ',
  		image_advtab: true,
  		// content_css: [
  		// '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
  		// '//www.tinymce.com/css/codepen.min.css'
  		// ],
  		// template_external_list_url : "lists/template_list.js",
  		external_link_list_url : "lists/link_list.js",
  		external_image_list_url : "lists/image_list.js",
  		media_external_list_url : "lists/media_list.js",

  	});
	var dd = window.setInterval(
		function changee(){
			var btn = '<div onclick="showFile()" id="mceu_22" class="mce-widget mce-btn" tabindex="-1" aria-labelledby="mceu_22" role="button" aria-label="lfile" aria-haspopup="true"><button role="presentation" type="button" tabindex="-1">Tambah Link File</button></div>';
			$('#mceu_41-body').append(btn);
			clearInterval(dd);
		},2000);
	function showFile() {
		$('#modal-file').modal('show');
		// var nilai = $.trim(tinymce.get('pageArea').getContent());
		// alert(nilai);
		// $(tinymce.activeEditor.setContent(nilai+"sad"));
	}
	function addLink(link) {
		var nilai = $.trim(tinymce.get('pageArea').getContent());
		var lk = '<a href="<?= base_url('assets/dist/files/')?>'+link+'" target="_blank">'+link+'</a>';
		$(tinymce.activeEditor.setContent(nilai+lk));
		$('#modal-file').modal('toggle');
	}
</script>
</head>
<body class="hold-transition skin-blue sidebar-mini wysihtml5-supported fixed animated ">
	<div class="wrapper">

		<header class="main-header">
			<!-- Logo -->
			<a href="<?php echo site_url('admin'); ?>" class="logo">
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
								<img style="float: none" src="<?php echo base_url('assets/dist/img/gambar.jpg'); ?>" class="user-image" alt="User Image">
								<span class="hidden-xs"></span>
							</a>
							<ul class="dropdown-menu animated fadeInRight" style="    top: 37px;">
								<!-- User image -->
								<li class="user-header">
									<img src="<?php echo base_url('assets/dist/img/gambar.jpg'); ?>" class="img-circle" alt="User Image">

									<p>
												Admin Karir
									</p>
								</li>
								<?php  
									$logout = site_url('admin/login/logout');
								?>
								<!-- Menu Footer-->
								<li class="user-footer">
<!--									<div class="float-left">-->
<!--										<a href="--><?php //echo site_url('profil'); ?><!--" class="btn btn-sm btn-default btn-flat"> Propile</a>-->
<!--									</div>-->
									<div class="float-right">
										
										
										<a href="<?= $logout ?>" class="btn btn-sm btn-primary btn-primary btn-flat"> Logout</a>
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
						<img src="<?php echo base_url('assets/dist/img/gambar.jpg'); ?>" class="img-circle" alt="User Image">
					</div>
					<div class="float-left info">
						<p>
							Admin Karir
						</p>
						<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
					</div>
				</div>
				<!-- sidebar menu: : style can be found in sidebar.less -->
				<ul class="sidebar-menu">
					<li class="header animated fadeInDown">MAIN NAVIGATION</li>
					  <li class="animated fadeInDown">
						<a href="<?php echo site_url('admin'); ?>"><i class="fa fa-home"></i> Dashboard</a>
					</li>   
					</li>
					 <li class="treeview animated fadeInDown">
                        <a href="<?= site_url('admin/perusahaan') ?>">
                            <i class="fa fa-building"></i>
                            <span>Data Perusahaan</span>
                        </a>

                    </li>
                     <li class="treeview animated fadeInDown">
                        <a href="<?= site_url('admin/lowongan') ?>">
                            <i class="fa fa-book"></i>
                            <span>Data Lowongan Pekerjaan</span>
                        </a>

                    </li>

					 <li class="treeview animated fadeInDown">
                        <a href="<?= site_url('admin/event') ?>">
                            <i class="fa fa-globe"></i>
                            <span>Event</span>
                        </a>

                    </li>
                    <li class="treeview animated fadeInDown">
                        <a href="<?= site_url('admin/alumni/verifikasi') ?>">
                            <i class="fa fa-check"></i>
                            <span>Verifikasi</span>
                        </a>

                    </li>
			 		
					 <li class="treeview animated fadeInDown">
                        <a href="<?= site_url('admin/alumni') ?>">
                            <i class="fa fa-users"></i>
                            <span>Data Alumni</span>
                        </a>

                    </li>

                    

						<li class="animated fadeInDown">
						<a href="<?php echo site_url('admin/pelamar/'); ?>"><i class="fa fa-users"></i> Data Pelamar</a>
					</li>
					

					
                     

                    
                    <li class="treeview animated fadeInDown">
                        <a href="<?= site_url('admin/pengumuman') ?>">
                            <i class="fa fa-space-shuttle"></i>
                            <span>Data Pengumuman</span>
                        </a>

                    </li>
                    <li class="animated fadeInDown">
						<a href="<?php echo site_url('admin/Perhitungan/'); ?>"><i class="fa fa-calculator"></i> Data Perhitungan SPK</a>
					</li>
                    <li class="treeview animated fadeInDown">
                        <a href="<?= site_url('admin/admin') ?>">
                            <i class="fa fa-user-secret"></i>
                            <span>Data Manajemen Admin</span>
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
			format: 'yyyy-mm-dd',
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
			$uri1 = $this->uri->segment(2);
			$uri2 = $this->uri->segment(3);
			if ($uri1=='perusahaan') {
		?>
		// perushaan
        function show_detail_p(idp) {
            $.ajax({
                url: '<?=base_url()?>index.php/admin/perusahaan/getPerusahaan/'+idp,
                type: 'get',
                dataType: 'json',
                success: function(response){
                    createModalP(response);
                }
            });
        }
        function createModalP(data){
            var baris ='';
            $('#detail_p').html('');
            var id = data.id_lowongan;
            var alamat = data.alamat_perusahaan;
            var telp = data.noTelp_perusahaan;
            var mail = data.email_perusahaan;
            var jenis = data.jenis_perusahaan;
            var perusahaan = data.nm_perusahaan;
            var logo = data.logo_perusahaan;
            if (logo==null) {
                logo = '<?= base_url('assets/dist/img/no_logo.png')?>';
            }else{
                logo = '<?= base_url('assets/dist/img/perusahaan/')?>'+logo;
            }
            baris += '<center><img src="'+logo+'" style="max-width:100px;margin-bottom:30px"/></center>';
            baris += '<h4>'+perusahaan+'</h4><hr>';
            baris += '<table class="table">';
            baris += '<tr><td>Alamat</td><td>:</td><td>'+alamat+'</td></tr>';
            baris += '<tr><td>No Telp</td><td>:</td><td>'+telp+'</td></tr>';
            baris += '<tr><td>Email</td><td>:</td><td>'+mail+'</td></tr>';
            baris += '<tr><td>Jenis Perusahaan</td><td>:</td><td>'+jenis+'</td></tr>';
            baris += '</table>';
            $('#detail_p').append(baris);   
            $('#mDetailP').modal('show') ;

        }
		<?php  
			}
			if ($uri1=='verifikasi_p') {
		?>
		 // verifikasi perusahaan
        function show_detail_pv(idp) {
            $.ajax({
                url: '<?=base_url()?>index.php/admin/verifikasi_p/getPerusahaan/'+idp,
                type: 'get',
                dataType: 'json',
                success: function(response){
                    createModalV(response);
                }
            });
        }
        function createModalV(data){
            var baris ='';
            $('#detail_pv').html('');
            var id = data.id_perusahaan;
            var alamat = data.alamat_perusahaan;
            var telp = data.noTelp_perusahaan;
            var mail = data.email_perusahaan;
            var jenis = data.jenis_perusahaan;
            var perusahaan = data.nm_perusahaan;
            var logo = data.logo_perusahaan;
            var surat = data.surat_izin;
            var link = '';
            if(surat==null){
                surat = 'Tidak Ada';
                link = '<label title="periksa Surat" style="color:red;font-weight:bold">'+surat+'</label>';
            }else{
                link = '<?= base_url('assets/dist/file/perusahaan/');?>'+surat;
                link = '<a title="periksa Surat" href="'+link+'" target="_blank">'+surat+'</a>';
            }
            var link2 = '<?= site_url('admin/verifikasi_p/proses_verifikasi/')?>'+id;
            if (logo==null) {
                logo = '<?= base_url('assets/dist/img/no_logo.png')?>';
            }else{
                logo = '<?= base_url('assets/dist/img/perusahaan/')?>'+logo;
            }
            baris += '<center><img src="'+logo+'" style="max-width:100px;margin-bottom:30px"/></center>';
            baris += '<h4>'+perusahaan+'</h4><hr>';
            baris += '<table class="table">';
            baris += '<tr><td>Alamat</td><td>:</td><td>'+alamat+'</td></tr>';
            baris += '<tr><td>No Telp</td><td>:</td><td>'+telp+'</td></tr>';
            baris += '<tr><td>Email</td><td>:</td><td>'+mail+'</td></tr>';
            baris += '<tr><td>Jenis Perusahaan</td><td>:</td><td>'+jenis+'</td></tr>';
            baris += '<tr><td>Surat Ijin</td><td>:</td><td>'+link+'</td></tr>';
            baris += '<tr><td></td><td></td><td><br><p><i>*Note: Periksa surat izin</i></p></td></tr>';
            baris += '</table><hr>';
            baris += '<a href="'+link2+'/valid" class="btn btn-sm btn-success">Valid</a> <a href="'+link2+'/unvalid" class="btn btn-sm btn-danger">Unvalid</a>';
            $('#detail_pv').append(baris);   
            $('#mDetailP').modal('show') ;

        }
		<?php  
			}
			if ($uri1=="alumni") {
		?>
		// Alumni
        function show_detail_a(nim) {
            $.ajax({
                url: '<?=base_url()?>index.php/admin/alumni/getAlumni/'+nim,
                type: 'get',
                dataType: 'json',
                success: function(response){
                    createModalA(response);
                }
            });
        }
        function createModalA(data){
				var baris ='';
				$('#dtalumni').html('');
				var nama = data.nm_alumni;
				var nim = data.nim;
				var alamat = data.alamat;
				var telp = data.noTelp;
				var angkatan = data.thn_angkatan;
				var lulus = data.thn_kelulusan;
				var email = data.email;
				var ipk = data.ipk;
				var jurusan = data.jurusan;
				var keahlian = data.keahlian;
				var foto = data.foto;
				var status = data.status_p;
				if (foto==null) {
					foto = '<?= base_url('assets/dist/img/no_foto.png')?>';
				}else{
					foto = '<?= base_url('assets/dist/img/alumni/')?>'+foto;
				}
				baris += '<center><img src="'+foto+'" style="max-width:100px;margin-bottom:30px"/></center><br><br>';
				
				baris += '<table class="table">';
				baris += '<tr><td>Nama</td><td>:</td><td>'+nama+'</td></tr>';
				baris += '<tr><td>Alamat</td><td>:</td><td>'+alamat+'</td></tr>';
				baris += '<tr><td>No Telp</td><td>:</td><td>'+telp+'</td></tr>';
				baris += '<tr><td>Email</td><td>:</td><td>'+email+'</td></tr>';
				baris += '<tr><td>Jurusan</td><td>:</td><td>'+jurusan+'</td></tr>';
				baris += '<tr><td>Keahlian</td><td>:</td><td>'+keahlian+'</td></tr>';
				baris += '<tr><td>IPK</td><td>:</td><td>'+ipk+'</td></tr>';
				baris += '<tr><td>Tahun Angkatan</td><td>:</td><td>'+angkatan+'</td></tr>';
				baris += '<tr><td>Tahun Kelulusan</td><td>:</td><td>'+lulus+'</td></tr>';
				baris += '<tr><td>Berkas</td><td>:</td><td><a href="javascript:void(0)" onclick="show_berkas('+nim+')">Lihat Daftar Berkas</a></td></tr>';
				baris += '</table><hr>';
				$('#dtalumni').append(baris);
				$('#modal-alumni').modal('show');
			}
		<?php  
			}
			if ($uri1=="alumni" && $uri2=="verifikasi") {
		?>
		// Alumni
        function show_detail_a(nim) {
            $.ajax({
                url: '<?=base_url()?>index.php/admin/alumni/getAlumni/'+nim,
                type: 'get',
                dataType: 'json',
                success: function(response){
                    createModalA(response);
                }
            });
        }
        function createModalA(data){
				var baris ='';
				$('#dtalumni').html('');
				var nama = data.nm_alumni;
				var nim = data.nim;
				var alamat = data.alamat;
				var telp = data.noTelp;
				var angkatan = data.thn_angkatan;
				var lulus = data.thn_kelulusan;
				var email = data.email;
				var ipk = data.ipk;
				var jurusan = data.jurusan;
				var keahlian = data.keahlian;
				var foto = data.foto;
				var tpa = data.tpa;
				var kba = data.kba;
				var pk = data.pk;
				var status = data.status_p;
				if (foto==null) {
					foto = '<?= base_url('assets/dist/img/no_foto.png')?>';
				}else{
					foto = '<?= base_url('assets/dist/img/alumni/')?>'+foto;
				}
				baris += '<center><img src="'+foto+'" style="max-width:150px;margin-bottom:30px"/></center><br><br>';
				baris += '<table class="table">';
				baris += '<tr><td>Nama Alumni</td><td>:</td><td>'+nama+'</td></tr>';
				baris += '<tr><td>Alamat</td><td>:</td><td>'+alamat+'</td></tr>';
				baris += '<tr><td>No. Telepon</td><td>:</td><td>'+telp+'</td></tr>';
				baris += '<tr><td>Email</td><td>:</td><td>'+email+'</td></tr>';
				baris += '<tr><td>Jurusan</td><td>:</td><td>'+jurusan+'</td></tr>';
				baris += '<tr><td>Keahlian</td><td>:</td><td>'+keahlian+'</td></tr>';
				baris += '<tr><td>IPK</td><td>:</td><td>'+ipk+'</td></tr>';
				baris += '<tr><td>Tahun Angkatan</td><td>:</td><td>'+angkatan+'</td></tr>';
				baris += '<tr><td>Tahun Kelulusan</td><td>:</td><td>'+lulus+'</td></tr>';
				baris += '<tr><td>Tes TPA</td><td>:</td><td>'+tpa+'</td></tr>';
				baris += '<tr><td>Kemampuan Bahasa Inggris</td><td>:</td><td>'+kba+'</td></tr>';
				baris += '<tr><td>Pengalaman Kerja</td><td>:</td><td>'+pk+' Tahun</td></tr>';
				baris += '</table><hr>';
				$('#bv').attr('href','<?= site_url("admin/alumni/proses_verifikasi/")?>'+nim+'/valid');
				$('#bu').attr('href','<?= site_url("admin/alumni/proses_verifikasi/")?>'+nim+'/unvalid');
				$('#dtalumni').append(baris);
				$('#modal-alumni').modal('show');
			}
		<?php 
			}
		?>
		<?php  
		if ($this->uri->segment(1)=='admin'||$this->uri->segment(2)=='pelamar') {
			?>
			function show_detail_pelamar(nim) {
				$.ajax({
					url: "<?= site_url('admin/pelamar/getDetail') ?>/"+nim,
					type: 'get',
					dataType: 'json',
					success: function(response){
						createModal(response);
					}
				});
			}
			function createModal(data){
				var baris ='';
				$('#dtpelamar').html('');
				var nama = data.nm_alumni;
				var nim = data.nim;
				var alamat = data.alamat;
				var telp = data.noTelp;
				var angkatan = data.thn_angkatan;
				var lulus = data.thn_kelulusan;
				var email = data.email;
				var ipk = data.ipk;
				var jurusan = data.jurusan;
				var keahlian = data.keahlian;
				var foto = data.foto;
				var status = data.status_p;
				if (foto==null) {
					foto = '<?= base_url('assets/dist/img/no_foto.png')?>';
				}else{
					foto = '<?= base_url('assets/dist/img/alumni/')?>'+foto;
				}
				baris += '<center><img src="'+foto+'" style="max-width:100px;margin-bottom:30px"/></center>';
				baris += '<h4>'+nama+'</h4>';
				baris += '<table class="table">';
				baris += '<tr><td>Alamat</td><td>:</td><td>'+alamat+'</td></tr>';
				baris += '<tr><td>No Telp</td><td>:</td><td>'+telp+'</td></tr>';
				baris += '<tr><td>Email</td><td>:</td><td>'+email+'</td></tr>';
				baris += '<tr><td>Jurusan</td><td>:</td><td>'+jurusan+'</td></tr>';
				baris += '<tr><td>Keahlian</td><td>:</td><td>'+keahlian+'</td></tr>';
				baris += '<tr><td>IPK</td><td>:</td><td>'+ipk+'</td></tr>';
				baris += '<tr><td>Tahun Angkatan</td><td>:</td><td>'+angkatan+'</td></tr>';
				baris += '<tr><td>Tahun Kelulusan</td><td>:</td><td>'+lulus+'</td></tr>';
				baris += '<tr><td>Berkas</td><td>:</td><td><a href="javascript:void(0)" onclick="show_berkas('+nim+')">Lihat Daftar Berkas</a></td></tr>';
				baris += '</table><hr>';
				if(status=='diterima'){
					baris += '<label class="bg-primary" style="color:#fff;padding:5px">DITERIMA</label>';
				}else if(status=='ditolak'){
					baris += '<label class="bg-danger" style="color:#fff;padding:5px">DITOLAK</label>'
				}else{
					baris += '<a href="<?= site_url('perusahaan/pelamar/status_pelamar/diterima/');?>'+data.id_pelamar+'" class="btn btn-success btn-sm">Terima sebagai pelamar</a>';
					baris += ' <a href="<?= site_url('perusahaan/pelamar/status_pelamar/ditolak/');?>'+data.id_pelamar+'" class="btn btn-danger btn-sm">Tolak sebagai pelamar</a>';
				}
				$('#dtpelamar').append(baris);
				$('#modal-pelamar').modal('show');
			}
			function show_berkas(nim) {
				$.ajax({
					url: "<?= site_url('admin/pelamar/getBerkas') ?>/"+nim,
					type: 'get',
					dataType: 'json',
					success: function(response){
						createModalBerkas(response);
					}
				});
			}
			function createModalBerkas(data){
				var baris ='';
				var no = 1;
				$('#dtberkas').html('');
				for (index in data) {
					baris = '';
					var nama = data[index].nm_file;
					var ket = data[index].keterangan;
					baris += '<tr><td>'+no+'</td>';
					baris += '<td>'+ket+'</td>';
					baris += '<td><a href="<?= base_url('assets/dist/img/berkas/')?>'+nama+'" target="_blank">Lihat</a></td></tr>';
					$('#dtberkas').append(baris);
					no++;
				}
				$('#modal-berkas').modal('show');
			}
			<?php } 
			if ($this->uri->segment(2)=='perhitungan') {
			?>
			function show_detail_pelamar(nim) {
				$.ajax({
					url: '<?=base_url()?>index.php/admin/perhitungan/getDetail/'+nim,
					type: 'get',
					dataType: 'json',
					success: function(response){
						createModal(response);
					}
				});
			}
			function createModal(data){
				var baris ='';
				$('#dtpelamar').html('');
				var nama = data.nm_alumni;
				var nim = data.nim;
				var alamat = data.alamat;
				var telp = data.noTelp;
				var angkatan = data.thn_angkatan;
				var lulus = data.thn_kelulusan;
				var email = data.email;
				var ipk = data.ipk;
				var jurusan = data.jurusan;
				var keahlian = data.keahlian;
				var foto = data.foto;
				var status = data.status_p;
				if (foto==null) {
					foto = '<?= base_url('assets/dist/img/no_foto.png')?>';
				}else{
					foto = '<?= base_url('assets/dist/img/alumni/')?>'+foto;
				}
				baris += '<center><img src="'+foto+'" style="max-width:100px;margin-bottom:30px"/></center>';
				baris += '<h4>'+nama+'</h4>';
				baris += '<table class="table">';
				baris += '<tr><td>Alamat</td><td>:</td><td>'+alamat+'</td></tr>';
				baris += '<tr><td>No Telp</td><td>:</td><td>'+telp+'</td></tr>';
				baris += '<tr><td>Email</td><td>:</td><td>'+email+'</td></tr>';
				baris += '<tr><td>Jurusan</td><td>:</td><td>'+jurusan+'</td></tr>';
				baris += '<tr><td>Keahlian</td><td>:</td><td>'+keahlian+'</td></tr>';
				baris += '<tr><td>IPK</td><td>:</td><td>'+ipk+'</td></tr>';
				baris += '<tr><td>Tahun Angkatan</td><td>:</td><td>'+angkatan+'</td></tr>';
				baris += '<tr><td>Tahun Kelulusan</td><td>:</td><td>'+lulus+'</td></tr>';
				baris += '<tr><td>Berkas</td><td>:</td><td><a href="javascript:void(0)" onclick="show_berkas('+nim+')">Lihat Daftar Berkas</a></td></tr>';
				baris += '</table><hr>';
				if(status=='diterima'){
					baris += '<label class="bg-primary" style="color:#fff;padding:5px">DITERIMA</label>';
				}else if(status=='ditolak'){
					baris += '<label class="bg-danger" style="color:#fff;padding:5px">DITOLAK</label>'
				}else{
					baris += '<a href="<?= site_url('perusahaan/pelamar/status_pelamar/diterima/');?>'+data.id_pelamar+'" class="btn btn-success btn-sm">Terima sebagai pelamar</a>';
					baris += ' <a href="<?= site_url('perusahaan/pelamar/status_pelamar/ditolak/');?>'+data.id_pelamar+'" class="btn btn-danger btn-sm">Tolak sebagai pelamar</a>';
				}
				$('#dtpelamar').append(baris);
				$('#modal-pelamar').modal('show');
			}
			function show_berkas(nim) {
				$.ajax({
					url: '<?=base_url()?>index.php/admin/pelamar/getBerkas/'+nim,
					type: 'get',
					dataType: 'json',
					success: function(response){
						createModalBerkas(response);
					}
				});
			}
			function createModalBerkas(data){
				var baris ='';
				var no = 1;
				$('#dtberkas').html('');
				for (index in data) {
					baris = '';
					var nama = data[index].nm_file;
					var ket = data[index].keterangan;
					baris += '<tr><td>'+no+'</td>';
					baris += '<td>'+ket+'</td>';
					baris += '<td><a href="<?= base_url('assets/dist/img/berkas/')?>'+nama+'" target="_blank">Lihat</a></td></tr>';
					$('#dtberkas').append(baris);
					no++;
				}
				$('#modal-berkas').modal('show');
			}
			<?php
			}
			?>
		</script>

	</body>
	</html>

