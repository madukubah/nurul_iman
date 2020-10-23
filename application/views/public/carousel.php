<section id="intro">
    <div class="intro-container">
      <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">

        <!-- <ol class="carousel-indicators"></ol> -->

        <div class="carousel-inner" role="listbox">
            <?php foreach ($carousels as $key => $carousel) { ?>
                <div class="carousel-item <?= $key == 0 ? 'active' : '' ?>">
                    <div class="carousel-background"><img src="<?= $carousel->image ?>" alt=""></div>
                    <div class="carousel-container">
                        <div class="carousel-content">
                            <!-- <h2>Masjid Nurul Iman</h2> -->
                            <!-- <p><?= $carousel->description ?></p> -->
                            <?= $carousel->description ?>
                            <!--<br>-->
                            <!--<a href="<?= base_url('home/registration');?>" class="btn-get-started scrollto">Daftar sebagai Santri</a>-->
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

        <a class="carousel-control-prev" href="#introCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon ion-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#introCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon ion-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      </div>
    </div>
</section><!-- #intro -->