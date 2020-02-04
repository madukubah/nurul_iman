    <!-- jumbotron -->
    <div class="jumbotron jumbotron-fluid pt-3" >
      <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <!-- <div class="img-jumbotron" style="background-image: url(<?= base_url('front-assets/img/')?>blog-img/bg1.jpg)"></div> -->
              <img src="<?= base_url('front-assets/img/')?>blog-img/bg1.jpg" class="d-block w-100 img-jumbotron" alt="">
          </div>
          <div class="carousel-item">
            <!-- <div class="img-jumbotron" style="background-image: url(<?= base_url('front-assets/img/')?>blog-img/bg2.jpg)"></div> -->
            <img src="<?= base_url('front-assets/img/')?>blog-img/bg2.jpg" class="img-jumbotron d-block w-100" alt="">
          </div>
        </div>
      </div>
    </div>
    <!-- end jumbotron -->

    <!-- content -->
    <div class="container content-banner">
      <div class="row justify-content-center">
        <div class="col-lg-4 col-sm-8 col-md-8 banner">
          <div class="row text-center">
            <div class="col-sm-2 col-md-4 col-lg-4">
              <img src="<?= base_url('front-assets/img/') ?>core-img/logo.png" width="60" height="60" alt="">
            </div>
            <div class="col-sm-4 col-md-8 col-lg-8">
              <h4>TPA Nurul Iman</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end content -->

    <div class="container mt-5">
      <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
          <ul class="list-inline">
            <li class="list-inline-item"><h4>Kegiatan Mesjid Nurul Iman</h4></li>
          </ul>
          <div class="container-fluid">
            <?php for($i = 0; $i < 4; $i++):?>
              <div class="card mb-4 shadow">
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg">
                      <img src="<?= base_url('front-assets/img/')?>blog-img/b1.jpg" class="rounded" alt="gambar">
                    </div>
                    <div class="col-lg">
                      <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                    </div>
                  </div>
                </div>
              </div>
            <?php endfor;?>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
          <ul class="list-inline">
            <li class="list-inline-item"><h4>Organisasi Mesjid Nurul Iman</h4></li>
          </ul>
          <div class="container-fluid">
            <div class="row justify-content-between">
              <div class="col-lg-12 col-md-12 col-sm-6 col-xs-6 text-center">
                <img src="<?= base_url('front-assets/img/')?>blog-img/b2.jpg" class="rounded" alt="ketua majelis">
                <p class="">Ketua Majelis</p>
              </div>
              <div class="col-lg-12 col-md-12 col-sm-6 col-xs-6 text-center mt-5">
                <img src="<?= base_url('front-assets/img/')?>blog-img/b1.jpg" class="rounded " alt="ketua remas">
                  <p class="">Ketua Remaja Mesjid</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
