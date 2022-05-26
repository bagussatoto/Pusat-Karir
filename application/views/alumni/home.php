
  <!-- Main content -->
  <section class="content">
    <h1>
      Selamat datang <?php
                echo $alumni->nm_alumni;
              ?>
    </h1>
    <hr>


    
    <div class="row">
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?= $tLowongan ?></h3>

              <p style="font-size: 18px">Data Lowongan</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="<?= site_url('Lowongan') ?>" target="_blank" class="small-box-footer">Lihat data <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?= $tNotif ?></h3>

              <p style="font-size: 18px">Data Pemberitahuan</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?= site_url('alumni/Pemberitahuan') ?>" class="small-box-footer">Lihat data <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?= $tPengumuman ?></h3>

              <p style="font-size: 18px">Data Pengumuman</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="<?= site_url('alumni/Pengumuman') ?>" class="small-box-footer">Lihat data <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
  </section>