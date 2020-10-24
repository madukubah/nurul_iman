  <style>
    .hidden {
      display: none;
    }
  </style>
  <?= $carousel ?>
  <main id="main">

    <section id="about">
      <div class="container">

        <header class="section-header">
          <h3>Kegiatan Terbaru</h3>
        </header>

        <div class="row about-cols">
          <?php foreach ($activities as $key => $activity) : ?>
          <?php if ( $activity) : ?>
            <div class="col-md-3 wow fadeInUp">
              <div class="about-col">
                <div class="img">
                  <img src="<?= $activity->image ?>" alt="" class="img-fluid" style="width: 100%;">
                </div>
                <h2 class="title"><a href="<?= site_url('home/article/') . $activity->file_content ?>"><?= $activity->name ?></a></h2>
                <p>
                <?php
                  $timestamp = strtotime( $activity->date );
                ?>
                <?= date( "d, M Y", $timestamp ) ?>
                <br>
                <?= $key ?>
                <!-- <?= $activity->preview ?> -->
                </p>
              </div>
            </div>
          <?php endif; ?>
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

        <div class="col-12 text-center mb-3">
          <div class="btn-group" role="group" aria-label="Basic example">
            <button type="button" data="tpa" title="TPA" class="btn-profile btn btn-secondary active">TPA</button>
            <button type="button" data="masjid" title="Masjid" class="btn-profile btn btn-secondary">Pengurus Masjid</button>
            <button type="button" data="rimnis" title="Remaja Masjid" class="btn-profile btn btn-secondary">Remaja Masjid</button>
            <button type="button" data="majelis" title="Majelis Taklim" class="btn-profile btn btn-secondary">Majelis Taklim</button>
          </div>
        </div>

        <header class="section-header">
          <h3>Profil</h3>
          <p>Data Tentang <span id="organization">TPA</span> Nurul Iman</p>
        </header>

        <div class="row counters tpa counters-active">

  				<div class="col-md-4 col-sm-12 text-center">
            <span data-toggle="counter-up"><?= $tpa->student ?></span>
            <p>Santri</p>
  				</div>

          <div class="col-md-4 col-sm-12 text-center">
            <span data-toggle="counter-up">25</span>
            <p>Pengajar</p>
  				</div>

          <div class="col-md-4 col-sm-12 text-center">
            <span data-toggle="counter-up"><?= $tpa->activities ?></span>
            <p>Kegiatan</p>
  				</div>

  			</div>

        <div class="row counters masjid hidden">

  				<div class="col-md-4 col-sm-12 text-center">
            <span data-toggle="counter-up"><?= $masjid->caretaker ?></span>
            <p>Pengurus</p>
  				</div>

          <div class="col-md-4"></div>

          <div class="col-md-4 col-sm-12 text-center">
            <span data-toggle="counter-up"><?= $masjid->activities ?></span>
            <p>Kegiatan</p>
  				</div>

  			</div>

        <div class="row counters rimnis hidden">

  				<div class="col-md-4 col-sm-12 text-center">
            <span data-toggle="counter-up"><?= $rimnis->caretaker ?></span>
            <p>Pengurus</p>
  				</div>

          <div class="col-md-4"></div>

          <div class="col-md-4 col-sm-12 text-center">
            <span data-toggle="counter-up"><?= $rimnis->activities ?></span>
            <p>Kegiatan</p>
  				</div>

  			</div>

        <div class="row counters majelis hidden">

  				<div class="col-md-4 col-sm-12 text-center">
            <span data-toggle="counter-up"><?= $majelis->caretaker ?></span>
            <p>Pengurus</p>
  				</div>

          <div class="col-md-4"></div>

          <div class="col-md-4 col-sm-12 text-center">
            <span data-toggle="counter-up"><?= $majelis->activities ?></span>
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
              <li data-filter="" class="filter-active">Semua</li>
              <li data-filter=".filter-ketum" class="">Ketua Umum</li>
              <li data-filter=".filter-app" class="">Majelis Taklim</li>
              <li data-filter=".filter-tpa" class="">TPA</li>
              <li data-filter=".filter-card">Remaja Mesjid</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container">
            
          <div class="col-lg-4 col-md-6 portfolio-item filter-ketum wow fadeInUp">
            <?php  if($lead_of_masjid): ?>
            <div class="portfolio-wrap">
              <figure>
                <img src="<?= $lead_of_masjid->image ?>" class="img-fluid" alt="" style="width: 100%;">
                <a href="<?= $lead_of_masjid->image ?>" data-lightbox="portfolio" data-title="<?= $lead_of_masjid->name ?>" class="link-preview" title="Preview"><i class="ion ion-eye"></i></a>
              </figure>

              <div class="portfolio-info">
                <h4><a href="#">Ketua Umum</a></h4>
                <p><?= $lead_of_masjid->name ?></p>
              </div>
            </div>
            <?php  endif; ?>
          </div>
          <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp">
            <?php  if($lead_of_majelis): ?>
            <div class="portfolio-wrap">
              <figure>
                <img src="<?= $lead_of_majelis->image ?>" class="img-fluid" alt="" style="width: 100%;">
                <a href="<?= $lead_of_majelis->image ?>" data-lightbox="portfolio" data-title="<?= $lead_of_majelis->name ?>" class="link-preview" title="Preview"><i class="ion ion-eye"></i></a>
              </figure>

              <div class="portfolio-info">
                <h4><a href="#">Ketua Majelis Taklim</a></h4>
                <p><?= $lead_of_majelis->name ?></p>
              </div>
            </div>
            <?php  endif; ?>
          </div>
          <div class="col-lg-4 col-md-6 portfolio-item filter-tpa wow fadeInUp">
            <?php  if($lead_of_tpa): ?>
            <div class="portfolio-wrap">
              <figure>
                <img src="<?= $lead_of_tpa->image ?>" class="img-fluid" alt="" style="width: 100%;">
                <a href="<?= $lead_of_tpa->image ?>" data-lightbox="portfolio" data-title="<?= $lead_of_tpa->name ?>" class="link-preview" title="Preview"><i class="ion ion-eye"></i></a>
              </figure>

              <div class="portfolio-info">
                <h4><a href="#">Ketua TPA</a></h4>
                <p><?= $lead_of_tpa->name ?></p>
              </div>
            </div>
            <?php  endif; ?>
          </div>
          <div class="col-lg-4 col-md-6 portfolio-item filter-card wow fadeInUp">
            <?php  if($lead_of_rimnis): ?>
            <div class="portfolio-wrap">
              <figure>
                <img src="<?= $lead_of_rimnis->image ?>" class="img-fluid" alt="" style="width: 100%;">
                <a href="<?= $lead_of_rimnis->image ?>" data-lightbox="portfolio" data-title="<?= $lead_of_rimnis->name ?>" class="link-preview" title="Preview"><i class="ion ion-eye"></i></a>
              </figure>

              <div class="portfolio-info">
                <h4><a href="#">Ketua Remaja Mesjid</a></h4>
                <p><?= $lead_of_rimnis->name ?></p>
              </div>
            </div>
            <?php  endif; ?>
          </div>

        </div>

      </div>
    </section><!-- #portfolio -->


  </main>

  <script>
    const btnProfiles = document.getElementsByClassName('btn-profile');
    const btnProfileActive = document.getElementsByClassName('btn-profile active');
    const counters = document.getElementsByClassName('counters');
    const organization = document.getElementById('organization');

    for(let btnProfile of btnProfiles) {
      btnProfile.addEventListener('click', function(){
        rowProfile = btnProfile.getAttribute('data');
        title = btnProfile.getAttribute('title');
        organization.innerHTML = title;
        btnProfileActive[0].className = btnProfileActive[0].className.replace(" active", " ");

        for (let counter of counters) {
          if(counter.getAttribute('class').split(' ')[2] === rowProfile){
            counter.className = counter.className.replace(" hidden", " counters-active");
          } else {
            counter.className = counter.className.replace(" counters-active", " hidden");
          }
        }

        this.className += ' active';

      })
    }
  </script>