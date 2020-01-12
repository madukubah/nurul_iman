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
      <div class="row ">
        <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12  ">
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
              <br>
              <a href="<?php echo site_url( $current_page )."edit/".$student->id ?>" class="btn btn-block btn-md btn-primary waves-effect">Edit</a>

              <!--  -->
            </div>
          </div>
        </div>
        <!-- photo -->
        <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
          <div class="card" >
              <div class="card-body  ">
                  <div class="row justify-content-md-center" >
                      <div class="col-12">
                          <label for="">Foto</label>
                      </div>
                      <div class="col-md-auto" >
                          <br>
                          <img class="img-fluid" src="<?php echo $student->image  ?>" alt="" height="400" width="auto" >
                      </div>
                  </div>
              </div>
          </div>
          <!--  -->
          <div class="card">
              <div class="card-header text-center">
                <b> Hasil Belajar </b> 
              </div> 
              <div class="card-body">
                <div class="row">
                  <div class="col-6 text-center">
                    <input type="text" class="knob" value="<?= $student_assessment->knowledge?>" data-width="100" data-height="100" readonly data-fgColor="#932ab6">
                    <div class="knob-label">Pengetahuan</div>
                  </div>
                  <!-- ./col -->
                  <div class="col-6 text-center">
                    <input type="text" class="knob" value="<?= $student_assessment->attitude?>" data-width="100" data-height="100" readonly data-fgColor="#39CCCC">
                    <div class="knob-label">Sikap</div>
                  </div>
                  <!-- ./col -->
                </div>
                <div class="row">
                  <div class="col-4 text-center">
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center ">
                      <h5> <b>Kelas</b> </h5>
                      <div class="card bg-red text-center">
                        <h3> <b><?= $student_assessment->class?></b> </h3>
                        <!-- /.info-box-content -->
                      </div>
                  </div>
                  <!-- ./col -->
                </div>
                <label for=""> Keterangan </label>
                <p><?= $student_assessment->description?></p>
              </div>
              <div class="card-footer" >
                  <?= $edit_assessment ?>
              </div>
          </div>
          <!--  -->
         
        </div>
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <div class="row">
                <div class="col-6">
                  <h5>
                    <?php echo strtoupper('iuran') ?>
                  </h5>
                </div>
                <div class="col-6">
                  <div class="row">
                    <div class="col-2"></div>
                    <div class="col-10">
                      <div class="float-right">
                        <?php echo (isset( $btn_saving )) ? $btn_saving : '';  ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div> 
            <div class="card-body ">
              <?php echo (isset($savings)) ? $savings : '';  ?>
            </div> 
          </div>
        </div>
      </div>
    </div>
  </section>
</div>