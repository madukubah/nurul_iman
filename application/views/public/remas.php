    <!-- jumbotron -->
    <div class="jumbotron jumbotron-fluid" >
      <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
              <img src="<?= base_url('front-assets/img/')?>blog-img/bg1.jpg" class="d-block w-100 img-jumbotron" alt="">
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


    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-8">
                <div class="structure-organizer"></div>
            </div>
            <div class="col-lg-4">
                <h3>Struktur Organisasi Remaja Mesjid</h3>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <ul class="list-inline text-center">
            <li class="list-inline-item"><h4>Kegiatan</h4></li>
        </ul>
      <div class="row">
        <?php for($i = 0; $i < 4; $i++) : ?>
            <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-header">
                        Nama Kegiatan
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg">
                                <img src="<?= base_url('front-assets/img/')?>blog-img/b1.jpg" class="rounded" alt="gambar">
                            </div>
                            <div class="col-lg">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                                <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endfor;?>
      </div>
    </div>