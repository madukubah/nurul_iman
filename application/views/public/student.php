  <div class="intro-container bg-dark" style="display: table; height: 5.9375rem; width: 100%;" ></div>

    <!--==========================
      Portfolio Section
    ============================-->
    <section id="portfolio"  class="section-bg" >
      <div class="container">

        <header class="section-header">
          <h3 class="section-title">Data Santri</h3>
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

        <?php if( isset($student) ) : ?>
        <div class="row contact-info">
              
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

            <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp p-2">
              <div>
                <h5><b>Jenis Kelamin</b></h5>
                <p><?php echo $student->gender ? "Laki-laki" : "Perempuan"; ?></p>
                <h5><b>No HP</b></h5>
                <p><?= $student->phone ?></p>
                <h5><b>Tanggal Masuk</b></h5>
                <?php
                  $timestamp = strtotime( $student->entry_date );
                ?>
                <p><?= date( "d, M Y", $timestamp ) ?></p>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp p-2">
              <div>
                <h5><b>Pendidikan</b></h5>
                <p><?= $student->study ?></p>
                <h5><b>Nama Orang Tua/Wali</b></h5>
                <p><?= $student->parent_name ?></p>
                <h5><b>Pekerjaan Orang Tua/Wali</b></h5>
                <p><?= $student->parent_job ?></p>
              </div>
            </div>
        </div>
        <div class="mt-4">
          <h5 class="text-center"><b>Iuran</b></h5>
          <?php 
            if(isset($savings)) echo $savings;
          ?>
        </div>

        <?php else: ?> 
          <p>Santri Tidak ditemukan</p>
        <?php endif; ?>

      </div>
    </section><!-- #portfolio -->


  </main>