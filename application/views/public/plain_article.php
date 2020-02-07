<div class="intro-container bg-dark" style="display: table; height: 5.9375rem; width: 100%;" ></div>
<main id="main">
    <section id="team">
    <div class="container">
      <div class="section-header wow fadeInUp">
        <h3><?= $activity->name ?></h3>
      </div>

      <div class="row">

        <div class="col-lg-9 wow fadeInUp">
            <div class="img">
              <img src="<?= $activity->image ?>" alt="" class="img-fluid">
            </div>
          <?= $file_content ?>
        </div>

        <div class="col-lg-3 wow fadeInUp" data-wow-delay="0.1s">
          <div class="member">
            <img src="<?= base_url('front-assets/') ?>img/team-2.jpg" class="img-fluid" alt="">
            <div class="member-info">
              <div class="member-info-content">
                <h4>Sarah Jhonson</h4>
                <span>Product Manager</span>
                <div class="social">
                  <a href=""><i class="fa fa-twitter"></i></a>
                  <a href=""><i class="fa fa-facebook"></i></a>
                  <a href=""><i class="fa fa-google-plus"></i></a>
                  <a href=""><i class="fa fa-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>
  </section><!-- #team -->


</main>