<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?= $judul; ?></title>
 <link rel="icon" type="icon" href="<?= base_url('assets/dist/img/UBG.png'); ?>">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/dist/css/bootstrap.min.css'); ?>">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/dist/plugins/carousel/carousel.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/dist/font/css/all.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/dist/plugins/animateCss/animate.css') ?>">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?= base_url('assets/plugins/') ?>select2/select2.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url('assets') ?>/dist/plugins/datatables/datatables.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets') ?>/dist/plugins/datatables/datatables.bootstrap.css">
  <style>
  body{
   height: 100vh;
   }
   .navbar-collapse .nav-item{
    padding: 0 5px;
  }
  .navbar-collapse .nav-item:hover{
    background-color: #017cd0;
  }
  .noSlide{
    margin-top: 50px;
  }
  #carouselExampleIndicators{
   /*margin-top: 55px;*/
  }
  #carouselExampleIndicators{
   max-height: 95vh;
  }	
  .carousel-inner {
   height: 90vh;
  }
  .carousel-inner img{
   height: 90vh;
  }
  .carousel-caption{
   top: 35vh;
  }
  .navbar-dark .navbar-nav .nav-link{
   color: #fff;
  }
  .section{
   padding: 15px;
  }
  .footer{
   padding: 30px;
   color: #ffffff;
  }
  .bg2{
   background-color: #f9f9f9;
   padding-top: 30px;
  }
  .card-header{
   padding: 0;
  }
  .card-body .card-title{
   margin-bottom: 0;
  }
  .jml{
    float: left;
    margin: -20px;
    padding: 0px 10px;
  }
  .jml-o{
    font-size: 4em;
  }
  .dlo{
    float: right;
    margin: -20px;
    padding: 10px;
    margin-top: 40px;
  }
  #pagination a{
    margin:0 2px;
  }
  .konten{
    min-height: 75vh;
  }
  .dt-buttons{
    display: none;
  }
 .pagination > li > a, .pagination > li > span{
  background-color: #FFFFFF;
    border: 1px solid #17a2b8;
    color: inherit;
    float: left;
    line-height: 1.42857;
    margin-left: -1px;
    padding: 4px 10px;
    position: relative;
    text-decoration: none;
 }
 .pagination > .active > a, .pagination > .active > span, .pagination > .active > a:hover, .pagination > .active > span:hover, .pagination > .active > a:focus, .pagination > .active > span:focus{
      background-color: #17a2b8;
    border-color: #17a2b8;
    color: #fff;
    cursor: default;
    z-index: 2;
 }
 table.dataTable{
  
 }
</style>
</head>
<body>
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
     <a class="navbar-brand" href="<?= site_url('/') ?>"><strong>KARIR</strong></a>
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-book"></i>
            INFORMASI KARIR
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="<?= site_url('Lowongan') ?>"><i class="fa fa-chevron-right"></i> LOWONGAN PEKERJAAN</a>
            <a class="dropdown-item" href="<?= site_url('Pengumuman') ?>"><i class="fa fa-chevron-right"></i> PENGUMUMAN TEST & HASIL</a>
           <!--  <div class="dropdown-divider"></div>
             <a class="dropdown-item" href="#">Sholarship</a>
             <a class="dropdown-item" href="<?= site_url('Event') ?>">Carrier News & Event</a>
             <a class="dropdown-item" href="#">Carrier Pedia</a>
          </div> -->
        </li>
         <li class="nav-item active">
          <a class="nav-link" href="<?= site_url('Event') ?>"><i class="fa  fa-globe"></i> EVENT & CARIER NEWS</a>
        </li> 
        <li class="nav-item active">
          <a class="nav-link" href="<?= site_url('home/perusahaan');?>"><i class="fa fa-building"></i> PERUSAHAAN</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="<?= site_url('home/alumni') ?>"><i class="fa  fa-users"></i> JOBSEKER/STUDENTS</a>
        </li>
       
      </ul>
      <ul class="navbar-nav my-2 my-lg-0">
        <?php  
          $lo = $this->session->userdata('user_a');
          if (!empty($lo)) {
        ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-lock"></i>
            PROFIL
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="<?= site_url('alumni/home'); ?>"><i class="fa fa-chevron-right"></i> DASHBOARD</a>
            <a class="dropdown-item" href="<?= site_url('alumni/login/logout'); ?>"><i class="fa fa-sign-out"></i> LOGOUT</a>
          </div>
        </li> 
        <?php 
      }else{
        ?>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           <i class="fa fa-info-circle"></i> 
          DAFTAR
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?= site_url('alumni/login/registrasi'); ?> "><i class="fa fa-chevron-right"></i> ALUMNI</a>
        </div>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-lock"></i>
            LOGIN
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="<?= site_url('alumni/login'); ?>"><i class="fa fa-chevron-right"></i> ALUMNI</a>
          </div>
        </li> 
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>
<?php  
if (isset($slide)) {
  if ($slide==true) {
    $this->load->view('slide');
  }else{
    echo '<div class="noSlide"></div>';
  }
}else{
  echo '<div class="noSlide"></div>';
}
?>
<div class="konten">
<?php  
$this->load->view('frontend/'.$halaman);
?>
</div>
<div class="footer bg-dark">
	<div class="container">
	COPYRIGHT &copy; 2021 KARIR UNIVERSITAS KUMPULAN KODE
	</div>
</div>
<script src="<?= base_url('assets/dist/plugins/jQuery/jquery-1.9.1.min.js') ?>"></script>
<script src="<?= base_url('assets/dist/plugins/popper.min.js') ?>"></script>
<script src="<?= base_url('assets/dist/js/bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/select2/select2.min.js')?>"></script>
<!-- Datatables -->
  <script src="<?php echo base_url('assets/dist/plugins/datatables/datatables.js')?>" type="text/javascript"></script>
  <script src="<?php echo base_url('assets/dist/plugins/datatables/datatables.bootstrap.js')?>" type="text/javascript"></script>
  <script src="<?php echo base_url('assets/dist/plugins/datatables/table-datatables-buttons.js')?>" type="text/javascript"></script>
<script>

  <?php  
    if ($this->uri->segment(2)== 'alumni') {
  ?>
  <?php
  }
    $pesan = $this->session->flashdata('pesan');
    if (!empty($pesan)) {
      echo "alert('".$pesan."');";
    }
    ?>
  $('.select2').select2();
  <?php  
  if ($this->uri->segment(1)=='Lowongan') {
    ?>
      // Detect pagination click
      $('#pagination').on('click','a',function(e){
        e.preventDefault(); 
        var pageno = $(this).attr('data-ci-pagination-page');
        loadPagination(pageno);
      });

      loadPagination(0);
      // Load pagination
      function loadPagination(pagno){
       var pn = $('#pen').val();
       var pos = $('#posisi').val();
       var kat = $('#kat').val();
       var cari = $('#cari').val();
       $.ajax({
        url: "<?= site_url('Lowongan/getAll') ?>/"+pagno,
        type: 'get',
        dataType: 'json',
        data:{
          pendidikan: pn,
          kategori: kat,
          posisi:pos,
          cari:cari
        },
        success: function(response){
          $('#pagination').html(response.pagination);
          $('#pagination a').addClass('btn btn-outline-info');
          $('#pagination strong').addClass('btn btn-info');
          createTable(response.result,response.row);
        }
      });
     }

      // Create table list
      function createTable(result,sno){
        sno = Number(sno);
        var baris ='';
        $('#dtloker').html('');
        for(index in result){
          var id = result[index].id_lowongan;
          var alamat = result[index].alamat_perusahaan;
          var content = result[index].deskripsi_lowongan;
          var tgl = result[index].content;
          var perusahaan = result[index].nm_perusahaan;
          var jumlah = result[index].jumlah_orang;
          var logo = result[index].logo_perusahaan;
          if (logo == null) {
            logo = '<?= base_url('assets/images/default-logo.png')?>';
          }else{
            logo = '<?= base_url('assets/dist/img/perusahaan/')?>'+logo;
          }
          var status = result[index].status;
          if(status=='Ditutup'){
            status = '<label class="bg-danger float-right" style="margin-top: -20px;margin-right: -20px;padding: 5px;color:#fff">Ditutup</label>';
          }else{
            status='';
          }
          content = content.substr(0, 100) + " ...";
          var link = result[index].link;
          sno+=1;
          
          baris = '<div class="col-sm-6 col-md-4" style="margin-bottom:15px">';
          baris += '<div class="card" >';
          baris += '<div class="card-body">';
          baris += status;
          baris += '<img class="card-img-top float-left" src="'+logo+'" alt="Card image cap" style="width: 100px;margin-right: 10px;">';
          baris += '<h5 class="card-title" style="margin-top: 10px">'+perusahaan+'</h5>';
          baris += '<label style="width: 50%;">'+alamat+'</label>';
          baris += '<hr>';
          baris += '<p style="clear: both;margin-top: 15px" class="card-text">'+content+'</p></div>';
          baris += '<div class="card-body" style="color:#fff">';
          baris += '<div class="jml bg-info">';
          baris += '<label class="jml-o">'+jumlah+'</label> Orang </div>';
          baris += '<div class="d-flex align-items-end dlo">';
          baris += '<a href="<?= site_url('lowongan/detail_loker/') ?>'+id+'" class="card-link">Lihat Detail</a>';
          baris += '</div></div></div></div>';  
          $('#dtloker').append(baris);        
        }
        
      }
      function loadData() {
        loadPagination(0);
      }
      <?php } ?>
      <?php  
      if ($this->uri->segment(1)=='Event') {
        ?>
      // Detect pagination click
      $('#pagination').on('click','a',function(e){
        e.preventDefault(); 
        var pageno = $(this).attr('data-ci-pagination-page');
        loadPagination(pageno);
      });

      loadPagination(0);
      // Load pagination
      function loadPagination(pagno){
       var cari = $('#cari').val();
       $.ajax({
        url: "<?= site_url('Event/getAll') ?>/"+pagno,
        type: 'get',
        dataType: 'json',
        data:{
          cari:cari
        },
        success: function(response){
          $('#pagination').html(response.pagination);
          $('#pagination a').addClass('btn btn-outline-info');
          $('#pagination strong').addClass('btn btn-info');
          createTable(response.result,response.row);
        }
      });
     }

      // Create table list
      function createTable(result,sno){
        sno = Number(sno);
        var baris ='';
        $('#dtevent').html('');
        for(index in result){
          var id = result[index].id_event;
          var nama = result[index].nm_event;
          var content = result[index].isi;
          var tgl = result[index].tgl_dibuat;
          var cover = result[index].foto_cover;
          if (cover==null) {
            cover = '<?= base_url('assets/dist/img/no_image.png')?>';
          }else{
            cover = '<?= base_url('assets/dist/img/event/')?>'+cover;
          }
          var link = '<?= site_url('event/detail_event/') ?>'+id;
          content = content.substr(0, 100) + " ... <br><br><br><a href='"+link+"'>Lihat Detail</a>";
          sno+=1;

          baris = '<div class="col-sm-6 col-md-4"> <br>';
          baris += '<div class="card">';
          baris += '<div class="card-header">';
          baris += '<img class="card-img-top" src="'+cover+'" alt="Card image cap" style="max-height: 200px;">';
          baris += '</div>';
          baris += '<div class="card-body">';
          baris += '<h5 class="card-title">'+nama+'</h5>';
          baris += '<small> Post : <b>'+ tgl+'</b> Oleh : Administrator</small>';
          baris += '<hr>';
          baris += '<div style="clear: both;" class="card-text">'+content;
          baris += '</div>';
          baris += '</div>';  
          $('#dtevent').append(baris);        
        }
        
      }
      function loadData() {
        loadPagination(0);
      }
      <?php } ?>
      <?php  
      if ($this->uri->segment(1)=='Pengumuman') {
        ?>
      // Detect pagination click
      $('#pagination').on('click','a',function(e){
        e.preventDefault(); 
        var pageno = $(this).attr('data-ci-pagination-page');
        loadPagination(pageno);
      });

      loadPagination(0);
      // Load pagination
      function loadPagination(pagno){
       var cari = $('#cari').val();
       $.ajax({
        url: '<?=base_url()?>index.php/Pengumuman/getAll/'+pagno,
        type: 'get',
        dataType: 'json',
        data:{
          cari:cari
        },
        success: function(response){
          $('#pagination').html(response.pagination);
          $('#pagination a').addClass('btn btn-outline-info');
          $('#pagination strong').addClass('btn btn-info');
          createTable(response.result,response.row);
        }
      });
     }

      // Create table list
      function createTable(result,sno){
        sno = Number(sno);
        var baris ='';
        $('#dtPengumuman').html('');
        for(index in result){
          var id = result[index].id_pengumuman;
          var nama = result[index].nm_pengumuman;
          var content = result[index].isi_pengumuman;
          var tgl = result[index].tgl_dibuat;
          var link = '<?= site_url('Pengumuman/detail_pengumuman/') ?>'+id;
          content = content.substr(0, 100) + " ... <br><br><br><a href='"+link+"' >Lihat Detail</a>";
          sno+=1;

          baris = '<div class="col-sm-6 col-md-4" style="margin-bottom:15px">';
          baris += '<div class="card" >';
          baris += '<div class="card-body">';
          baris += '<h5 class="card-title"><a href="'+link+'">'+nama+'</a></h5>';
          baris += '<small> Post : <b>'+ tgl+'</b> Oleh : Administrator</small>';
          baris += '<hr>';
          baris += '<div style="clear: both;" class="card-text">'+content;
          baris += '</div>';
          baris += '</div>';  
          $('#dtPengumuman').append(baris);        
        }
        
      }
      function loadData() {
        loadPagination(0);
      }
      <?php 
      } 
      if($this->uri->segment(1)=='home' && $this->uri->segment(2)=='perusahaan'){
      ?>
      // Detect pagination click
      $('#pagination').on('click','a',function(e){
        e.preventDefault(); 
        var pageno = $(this).attr('data-ci-pagination-page');
        loadPagination(pageno);
      });

      loadPagination(0);
      // Load pagination
      function loadPagination(pagno){
       var cari = $('#cari').val();
       $.ajax({
        url: '<?=base_url()?>index.php/home/getAllP/'+pagno,
        type: 'get',
        dataType: 'json',
        data:{
          cari:cari
        },
        success: function(response){
          $('#pagination').html(response.pagination);
          $('#pagination a').addClass('btn btn-outline-info');
          $('#pagination strong').addClass('btn btn-info');
          createTable(response.result,response.row);
        }
      });
     }

      // Create table list
      function createTable(result,sno){
        sno = Number(sno);
        var baris ='';
        $('#dtper').html('');
        for(index in result){
          var id = result[index].id_perusahaan;
          var nama = result[index].nm_perusahaan;
          var jenis = result[index].jenis_perusahaan;
          var logo = result[index].logo_perusahaan;
          if (logo=='') {
            logo = '<?= base_url('assets/images/default-logo.png')?>';
          }else{
            logo = '<?= base_url('assets/dist/img/perusahaan/')?>'+logo;
          }
          var link = '<?= site_url('Home/detail_perusahaan/') ?>'+id;
          sno+=1;
          baris = '<div class="col-sm-6 col-md-4" style="margin-bottom:15px">';
          baris += '<div class="card" >';
          baris += '<div class="card-body">';
          baris += '<img class="img float-left" src="'+logo+'" style="max-width:100px;max-height:100px;margin-right:15px">'
          baris += '<h5 class="card-title"><a href="'+link+'">'+nama+'</a></h5>';
          baris += '<small>'+jenis+'</small>';
          baris += '</div>';  
          $('#dtper').append(baris);        
        }
        
      }
      function loadData() {
        loadPagination(0);
      }
      <?php
      }
      ?>
    </script>
  </body>
  </html>