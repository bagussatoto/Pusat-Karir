  <!-- <section class="content-header">
    
     <ol class="breadcrumb">
      <li><a href="<?= site_url('admin'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Beranda </li>
    </ol> 
  </section> -->

  <!-- Main content -->
 <section class="content">
  <h1>
      Selamat datang <?php
                echo $admin_a;
              ?>
    </h1>
    <hr>
    <div class="row">
        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3> <?= $jum_perusahaan ?></h3>

              <p style="font-size: 18px">Data Perusahaan</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="<?= site_url('admin/perusahaan') ?>" class="small-box-footer">Lihat data <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3> <?= $jum_alumni ?> </h3>

              <p style="font-size: 18px">Data Alumni</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?= site_url('admin/alumni') ?>" class="small-box-footer">Lihat data <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        

      </div>
  </section>