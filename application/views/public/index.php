  <?= $carousel ?>
  <main id="main">

    <section id="about">
      <div class="container">

        <header class="section-header">
          <h3>Kegiatan Terbaru</h3>
        </header>

        <div class="row about-cols">
          <?php foreach ($activities as $key => $activity) : ?>
          <div class="col-md-4 wow fadeInUp">
            <div class="about-col">
              <div class="img">
                <img src="<?= $activity->image ?>" alt="" class="img-fluid">
              </div>
              <h2 class="title"><a href="<?= site_url('home/article/') . $activity->file_content ?>"><?= $activity->name ?></a></h2>
              <p>
              <?= $activity->preview ?>
              </p>
            </div>
          </div>
          <?php endforeach; ?>
        </div>

      </div>
    </section><!-- #about -->

    <section id="call-to-action" class="wow fadeIn">
      <div class="container text-center">
        <h3>Masjid Nurul Iman</h3>
      </div>
    </section>

    <section id="facts"  class="wow fadeIn">
      <div class="container">

        <header class="section-header">
          <h3>Profil</h3>
          <p>Data Tentang Masjid Nurul Iman</p>
        </header>

        <div class="row counters">

  				<div class="col-md-4 col-sm-12 text-center">
            <span data-toggle="counter-up"><?= $student ?></span>
            <p>Santri</p>
  				</div>

          <div class="col-md-4 col-sm-12 text-center">
            <span data-toggle="counter-up"><?= $teacher ?></span>
            <p>Pengajar</p>
  				</div>

          <div class="col-md-4 col-sm-12 text-center">
            <span data-toggle="counter-up"><?= $total_activity ?></span>
            <p>Kegiatan</p>
  				</div>

  			</div>

        <div class="facts-img">
          <img src="<?= base_url('front-assets/') ?>img/bg-mosque.png" alt="" class="img-fluid">
        </div>

      </div>
    </section><!-- #facts -->

    <!--==========================
      Portfolio Section
    ============================-->
    <section id="portfolio"  class="section-bg" >
      <div class="container">

        <header class="section-header">
          <h3 class="section-title">Organisasi</h3>
        </header>

        <div class="row">
          <div class="col-lg-12">
            <ul id="portfolio-flters">
              <li data-filter=".filter-app" class="filter-active">Majelis Ta'lim</li>
              <li data-filter=".filter-card">Remaja Mesjid</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container">
        
          <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp">
            <div class="portfolio-wrap">
              <figure>
                <img src="<?= base_url('front-assets/') ?>img/portfolio/app1.jpg" class="img-fluid" alt="">
                <a href="img/portfolio/app1.jpg" data-lightbox="portfolio" data-title="App 1" class="link-preview" title="Preview"><i class="ion ion-eye"></i></a>
                <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
              </figure>

              <div class="portfolio-info">
                <h4><a href="#">Ketua Majelis Ta'lim</a></h4>
                <p>Nama</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 portfolio-item"></div>
          <div class="col-lg-4 col-md-6 portfolio-item filter-card wow fadeInUp">
            <div class="portfolio-wrap">
              <figure>
                <img src="<?= base_url('front-assets/') ?>img/portfolio/card2.jpg" class="img-fluid" alt="">
                <a href="img/portfolio/card2.jpg" class="link-preview" data-lightbox="portfolio" data-title="Card 2" title="Preview"><i class="ion ion-eye"></i></a>
                <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
              </figure>

              <div class="portfolio-info">
                <h4><a href="#">Ketua Remaja Mesjid</a></h4>
                <p>Nama</p>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- #portfolio -->


  </main>