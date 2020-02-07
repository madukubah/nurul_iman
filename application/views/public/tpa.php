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

    </div>
  </section><!-- #about -->

<!--==========================
      Call To Action Section
    ============================-->
    <section id="call-to-action" class="wow fadeIn">
      <div class="container">

        <div class="section-header wow fadeInUp">
          <h3>Guru</h3>
          <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
        </div>

        <div class="row about-cols">

        <?php foreach ($teachers as $key => $teacher) : ?>
        <div class="col-lg-3 col-md-6 wow fadeInUp">
          <div class="card shadow">
            <img src="<?= $teacher->image ?>" class="card-img-top" alt="<?= $teacher->photo ?>">
            <div class="card-body">
              <h5 class="card-title"><?= $teacher->name ?></h5>
              <p class="card-subtitle mb-2 text-muted"><?= $teacher->position ?></p>
            </div>
          </div>
        </div>
        <?php endforeach; ?>

        </div>

      </div>
    </section><!-- #call-to-action -->

</main>