<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h5 class="m-0 text-dark"><?php echo $block_header ?></h5>
        </div>
      </div>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <div class="col-12">
                <?php
                echo $alert;
                ?>
              </div>
              <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                  <h5>
                    <?php echo strtoupper($header) ?>
                    <p class="text-secondary"><small><?php echo $sub_header ?></small></p>
                  </h5>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                  <div class="row">
                    <div class="col-2"></div>
                    <div class="col-10">
                      <div class="float-right">
                        <?php echo (isset( $header_button )) ? $header_button : '';  ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-body">
              <!--  -->
              <?php echo (isset($contents)) ? $contents : '';  ?>
              <!--  -->
              <!--  -->
              <?php echo (isset($pagination_links)) ? $pagination_links : '';  ?>
              <!--  -->
            </div>
          </div>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5>Profil Masjid</h5>
                </div>
                <div class="card-body">
                    <?php echo (isset($profile_table)) ? $profile_table : '';  ?>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5>Main Slider</h5>
                </div>
                <div class="card-body">
                    <?php echo (isset($main_carousels)) ? $main_carousels : '';  ?>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5>Second Slider</h5>
                </div>
                <div class="card-body">
                    <?php echo (isset($second_carousels)) ? $second_carousels : '';  ?>
                </div>
            </div>
        </div>

      </div>
    </div>
  </section>
</div>