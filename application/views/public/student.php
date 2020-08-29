  <div class="intro-container bg-dark" style="display: table; height: 5.9375rem; width: 100%;" ></div>

    <!--==========================
      Portfolio Section
    ============================-->
    <section id="portfolio"  class="section-bg" >
      <div class="container">

        <header class="section-header">
          <h3 class="section-title">Santri</h3>
        </header>

        <div class="row">
          <div class="col-lg-12">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">Santri</li>
                <?php if( isset($student) ) : ?>
                  <li data-filter=".filter-app"><?= $student->registration_number ?></li>
                <?php endif; ?>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container">
          <?php if( isset($student) ) : ?>
              
            <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp"></div>
            
            <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp">
              <div class="portfolio-wrap">
                <figure>
                  <img src="<?= $student->image ?>" class="img-fluid" alt="">
                  <a href="<?= $student->image ?>" data-lightbox="portfolio" data-title="<?= $student->name ?>" class="link-preview" title="Preview"><i class="ion ion-eye"></i></a>
                  <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                </figure>

                <div class="portfolio-info">
                  <h4><a href="#"><?= $student->name ?></a></h4>
                  <p><?= $student->registration_number ?></p>
                  <p><?= $student->ttl ?></p>
                  <p><?= $student->address ?></p>
                  <p><?= $student->phone ?></p>
                </div>
              </div>
            </div>
          <?php else: ?>
            <p>Santri Tidak ditemukan</p>
          <?php endif; ?>


        </div>

      </div>
    </section><!-- #portfolio -->


  </main>