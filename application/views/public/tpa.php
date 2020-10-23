<div class="intro-container bg-dark" style="display: table; height: 5.9375rem; width: 100%;" ></div>
<main id="main">
  <section id="about">
    <div class="container">

      <header class="section-header">
        <h3>Kegiatan Terbaru</h3>
        <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, </p> -->
      </header>

      <div class="row about-cols">

        <?php foreach ($activities as $key => $activity) : ?>
          <div class="col-md-4 wow fadeInUp">
            <div class="about-col">
              <div class="img">
                <img src="<?= $activity->image ?>" alt="" class="img-fluid" style="width: 100%;">
                <!-- <div class="icon"><i class="ion-ios-speedometer-outline"></i></div> -->
              </div>
              <h2 class="title"><a href="<?= site_url('home/article/') . $activity->file_content ?>"><?= $activity->name ?></a></h2>
              <p>
              <?php
                $timestamp = strtotime( $activity->date );
              ?>
              <?= date( "d, M Y", $timestamp ) ?>
              <br>
              <?= $activity->preview ?>
              </p>
            </div>
          </div>
        <?php endforeach; ?>

      </div>

      <?php echo isset($pagination_links) ? $pagination_links : '' ?>

    </div>
  </section><!-- #about -->

<!--==========================
      Call To Action Section
    ============================-->
    <!-- <section id="call-to-action" class="wow fadeIn">
      <div class="container">

        <div class="section-header wow fadeInUp">
          <h3>Guru</h3>
          <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
        </div>

        <div class="row about-cols"> -->

        <?php //foreach ($teachers as $key => $teacher) : ?>
        <!-- <div class="col-lg-3 col-md-6 wow fadeInUp">
          <div class="card shadow">
            <img src="<?php //echo $teacher->image ?>" class="card-img-top" alt="<?php //echo $teacher->photo ?>">
            <div class="card-body">
              <h5 class="card-title"><?php //echo $teacher->name ?></h5>
              <p class="card-subtitle mb-2 text-muted"><?php //echo $teacher->position ?></p>
            </div>
          </div> 
        </div> -->
        <?php //endforeach; ?>

        <!-- </div>

      </div>
    </section> -->

  <?php if($structural): ?>
  <section id="team">
    <div class="container">
      <div class="section-header wow fadeInUp">
        <h3>Struktur Organisasi</h3>
      </div>

      <div class="row">

        <div class="col-lg-9 col-md-12 wow fadeInUp" data-wow-delay="0.2s">
          <div class="member">
            <img src="<?= $structural->image ?>" class="img-fluid" alt="">
            <div class="member-info">
              <div class="member-info-content">
                <h4>Struktur Organisasi</h4>
                <span>TPA</span>
                <div class="social"></div>
              </div>
            </div>
          </div>
        </div>

        <?php if($logo): ?>
        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
          <div class="member">
            <img src="<?= $logo->image ?>" class="img-fluid" alt="">
            <div class="member-info">
              <div class="member-info-content">
                <h4><?= $logo->name ?></h4>
                <span><?= $logo->description ?></span>
              </div>
            </div>
          </div>
          <div>
            <p><?= $logo->description ?></p>
          </div>
        </div>
        <?php endif; ?>

      </div>

      <div class="row">

        <?php foreach ($organizers as $key => $organizer) : ?>
          <div class="col-lg-3 col-md-3 wow fadeInUp" data-wow-delay="0.2s">
            <div class="member">
              <img src="<?= $organizer->image ?>" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4><?= $organizer->name ?></h4>
                  <span><?= $organizer->description ?></span>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>

      </div>

    </div>
  </section><!-- #team -->
  <?php endif; ?>

</main>