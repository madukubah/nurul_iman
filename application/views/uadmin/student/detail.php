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
        <div class="col-7">
          <div class="card">
            <div class="card-header">
              <div class="col-12">
                <?php
                echo $alert;
                ?>
              </div>
              <div class="row">
                <div class="col-6">
                  <h5>
                    <?php echo strtoupper($header) ?>
                    <p class="text-secondary"><small><?php echo $sub_header ?></small></p>
                  </h5>
                </div>
                <div class="col-6">
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
            </div>
          </div>
        </div>
        <!-- photo -->
        <div class="col-5">
          <div class="card">
              <div class="card-body">
                  <label for="">Foto</label>
                  <br>
                  <img  class="img-fluid" src="<?= $student->image; ?>" alt="">
              </div>
          </div>
          <!--  -->
          <div class="card">
              <div class="card-body">
                  <a href="<?php echo site_url( $current_page )."edit/".$student->id ?>" class="btn btn-block btn-md btn-primary waves-effect">Edit</a>
              </div> 
          </div>
        </div>
      </div>
    </div>
  </section>
</div>