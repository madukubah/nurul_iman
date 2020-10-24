<div class="intro-container bg-dark" style="display: table; height: 5.9375rem; width: 100%;" ></div>

  <main id="main">
    <section id="contact" class="section-bg wow fadeInUp">
      <div class="container">

        <div class="section-header">
          <h3>Daftar sebagai Santri</h3>
        </div>

        <!-- <div class="row contact-info">

          <div class="col-md-4">
            <div class="contact-address">
              <i class="ion-ios-location-outline"></i>
              <h3>Alamat</h3>
              <address><?= $profile->address ?></address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="ion-ios-telephone-outline"></i>
              <h3>Nomor Telepon</h3>
              <p><a href="tel:<?= $profile->phone ?>"><?= $profile->phone ?></a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="ion-ios-email-outline"></i>
              <h3>Email</h3>
              <p><a href="mailto:<?= $profile->email ?>"><?= $profile->email ?></a></p>
            </div>
          </div>

        </div> -->

        <div class="col-12">
          <?php
          echo $alert;
          ?>
        </div>

        <div class="form">
          <form action="<?= base_url('home/registration') ?>" method="post">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="name">Nama Lengkap</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Nama Lengkap" />
              </div>
              <div class="form-group col-md-6">
                <label for="gender">Jenis Kelamin</label>
                <select name="gender" id="gender" class="form-control">
                  <option value="0">Laki-laki</option>
                  <option value="1">Perempuan</option>
                </select>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="phone">Nomor Telepon</label>
                <input type="text" name="phone" class="form-control" id="phone" placeholder="Nomor Telepon" />
              </div>
              <div class="form-group col-md-6">
                <label for="ttl">Tempat, tanggal lahir</label>
                <input type="text" class="form-control" name="ttl" id="ttl" placeholder="Tempat, tanggal lahir" />
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="address">Alamat</label>
                <input type="text" class="form-control" name="address" id="address" placeholder="Alamat" />
              </div>
              <div class="form-group col-md-6">
                <label for="study">Pendidikan</label>
                <input type="text" name="study" class="form-control" id="study" placeholder="Pendidikan" />
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="parent_name">Nama Orang Tua/Wali</label>
                <input type="text" class="form-control" name="parent_name" id="parent_name" placeholder="Nama Orang Tua/Wali" />
              </div>
              <div class="form-group col-md-6">
                <label for="parent_job">Pekerjaan Orang Tua/Wali</label>
                <input type="text" name="parent_job" class="form-control" id="parent_job" placeholder="Pekerjaan Orang Tua/Wali" />
              </div>
            </div>
            <div class="text-center"><button type="submit">Daftar</button></div>
          </form>
        </div>

      </div>
    </section><!-- #contact -->

  </main>

