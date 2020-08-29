<div class="intro-container bg-dark" style="display: table; height: 5.9375rem; width: 100%;" ></div>

    <main id="main">

    <section id="portfolio"  class="section-bg" >
      <div class="container">

        <header class="section-header">
          <h3 class="section-title">Galeri</h3>
        </header>

        <div class="row">
          <div class="col-lg-12">
            <ul id="portfolio-flters">
              <li data-filter=".filter-app" class="filter-active"><?= $organization->name ?></li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container">
        
        <?php foreach ($galleries as $key => $gallery): ?>
          <div class="col-lg-3 col-md-6 portfolio-item filter-app wow fadeInUp">
            <div class="portfolio-wrap">
              <figure>
                <img src="<?= $gallery->image ?>" class="img-fluid" alt="">
                <a href="<?= $gallery->image ?>" data-lightbox="portfolio" data-title="<?= $gallery->description ?>" class="link-preview" title="Preview"><i class="ion ion-eye"></i></a>
              </figure>

            </div>
          </div>
        <?php endforeach; ?>

        </div>
        <?php echo $pagination_links ?>
        
      </div>
    </section><!-- #portfolio -->


  </main>