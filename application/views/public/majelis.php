<div class="intro-container bg-dark" style="display: table; height: 5.9375rem; width: 100%;" ></div>

<main id="main">

  <!--==========================
    About Us Section
  ============================-->
  <section id="about">
    <div class="container">

      <header class="section-header">
        <h3>Kegiatan Majelis Ta'lim</h3>
        <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, </p> -->
      </header>

      <div class="row about-cols">

        <?php foreach ($activities as $key => $activity) : ?>
          <div class="col-md-4 wow fadeInUp">
            <div class="about-col">
              <div class="img">
                <img src="<?= $activity->image ?>" alt="" class="img-fluid">
                <!-- <div class="icon"><i class="ion-ios-speedometer-outline"></i></div> -->
              </div>
              <h2 class="title"><a href="<?= site_url('home/article/') . $activity->file_content ?>"><?= $activity->name ?></a></h2>
              <p>
              <?= $activity->preview ?>
              </p>
            </div>
          </div>
        <?php endforeach; ?>

      </div>
      <?php echo $pagination_links ?>

    </div>
  </section><!-- #about -->


  <!--==========================
    Team Section
  ============================-->
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
                <span>Majelis Ta'lim</span>
                <div class="social">
                </div>
              </div>
            </div>
          </div>
        </div>

        <?php if($leader): ?>
        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
          <div class="member">
            <img src="<?= $leader->image ?>" class="img-fluid" alt="">
            <div class="member-info">
              <div class="member-info-content">
                <h4><?= $leader->name ?></h4>
                <span><?= $leader->description ?></span>
              </div>
            </div>
          </div>
        </div>
        <?php endif; ?>

      </div>

    </div>
  </section><!-- #team -->


</main>