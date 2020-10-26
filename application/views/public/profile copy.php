  <?= $carousel ?>
  <main id="main">
    <section id="call-to-action" class="wow fadeIn">
      <div class="container text-center">
        <h3>Data Profil</h3>
        <p> Masjid Nurul Iman </p>
      </div>
    </section>
    
    <section id="facts"  class="wow fadeIn">
      <div class="container">

        <header class="section-header">
          <h3>Data Administrasi</h3>
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
          <div class="row justify-content-center">
            <div class="col-6">
              <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  <?php foreach ($carousels as $key => $carousel) { ?>
                    <div class="carousel-item <?= $key == 0 ? 'active' : '' ?>">
                      <img class="d-block w-100" src="<?= $carousel->image ?>" alt="First slide">
                    </div>
                  <?php } ?>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>

    <section id="contact" class="section-bg wow fadeInUp">
      <div class="container">

        <div class="section-header">
          <h3>Kontak Kami</h3>
        </div>

        <div class="row contact-info">

          <div class="col-md-4">
            <div class="contact-address">
              <i class="ion-ios-location-outline"></i>
              <h3>Alamat</h3>
              <address><?= $profile->address ?></address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="ion-ios-telephone-outline"></i>
              <h3>Nomor Telepon</h3>
              <p><a href="tel:<?= $profile->phone ?>"><?= $profile->phone ?></a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="ion-ios-email-outline"></i>
              <h3>Email</h3>
              <p><a href="mailto:<?= $profile->email ?>"><?= $profile->email ?></a></p>
            </div>
          </div>

        </div>

      </div>
    </section>

  </main>