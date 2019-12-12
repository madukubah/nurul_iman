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
                        <?php echo (isset($header_button)) ? $header_button : '';  ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-body">
              <!--  -->
              <?php echo form_open();  ?>
              <?php echo (isset($contents)) ? $contents : '';  ?>
              <button class="btn btn-bold btn-success btn-sm " style="margin-left: 5px;" type="submit">
                Simpan
              </button>

              <?php echo form_close()  ?>
              <!--  -->
            </div>
          </div>
        </div>
        <!--  -->
        <div class="col-5">
            <div class="card" >
              <div class="card-body" >
                  <img class=" img-fluid" src="<?php echo $student->image  ?>" alt="" height="auto" width="500">
                  <br>
                  <br>
                  <?= $change_photo?>
              </div>
            </div>
        </div>

      </div>
    </div>
  </section>
</div>