    <!-- jumbotron -->
    <div class="jumbotron jumbotron-fluid" >
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
        <div class="col-lg">
          <ul class="list-inline">
            <li class="list-inline-item"><h4>Pengajar</h4></li>
          </ul>
          <div class="row container-fluid">
            <?php for($i = 0; $i < 4; $i++):?>
              <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card mb-4 shadow">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-4">
                        <img src="<?= base_url('front-assets/img/')?>blog-img/b1.jpg" class="rounded" alt="gambar" width="100%">
                      </div>
                      <div class="col-8">
                        <h5>Nama Guru</h5>
                        <p style="margin-top: -0.8rem !important;"><cite title="Source Title">Jabatan</cite></p>
                        <!-- <footer class="blockquote-footer">Someone famous in </footer> -->
                      </div>
                      <div class="col-12">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php endfor;?>
          </div>
        </div>
      </div>
    </div>