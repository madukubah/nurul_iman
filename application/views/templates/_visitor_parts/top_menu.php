<style>
  .active {
    color: lightgreen !important;
    font-weight: bolder;
  }
</style>


      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li>
            <a id="home_index" href="<?= base_url();?>">Beranda</a>
          </li>
          <li class="menu-has-children">
            <a href="#">Organisasi</a>
            <ul>
              <li>
                <a id="home_tpa" href="<?= base_url('home/tpa');?>">TPA</a>
              </li>
              <li>
                <a id="home_majelis" href="<?= base_url('home/majelis');?>">Majelis Ta'lim</a>
              </li>
              <li>
                <a id="home_rimnis" href="<?= base_url('home/rimnis');?>">RIMNIS</a>
              </li>
              <li>
                <a id="home_rimnis" href="<?= base_url('home/masjid');?>">Masjid</a>
              </li>
            </ul>
          </li>
          <li class="menu-has-children">
            <a href="#">Galeri</a>
            <ul>
              <li>
                <a id="home_gallery" href="<?= base_url('home/gallery/1');?>">TPA</a>
              </li>
              <li>
                <a id="home_gallery" href="<?= base_url('home/gallery/2');?>">Majelis Ta'lim</a>
              </li>
              <li>
                <a id="home_gallery" href="<?= base_url('home/gallery/3');?>">RIMNIS</a>
              </li>
              <li>
                <a id="home_gallery" href="<?= base_url('home/gallery/4');?>">Masjid</a>
              </li>
            </ul>
          </li>
          <li>
            <a id="home_profile" href="<?= base_url('home/profile');?>">Profil Mesjid</a>
          </li>
          <li>
            <a type="button" class="btn btn-sm mt-1" data-toggle="modal" data-target="#find_student">
                Cari Santri
            </a>
          </li>
          <li>
            <a id="home_registration" class="btn btn-sm btn-primary p-1" href="<?= base_url('home/registration');?>">Pendaftaran</a>
          </li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->
<div class="modal fade" id="find_student" role="dialog">
  <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <form action="<?= site_url('home/student/') ?>" method="get">
          <div class="modal-header">
              <h5 class="modal-title">Cari Santri</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
            <label for="">Nomor Induk Santri</label>
            <input type="text" class="form-control" name="registration_number" id="registration_number">
          </div>
          <div class="modal-footer">
              <button type="submit" class="btn  btn-success">Ok</button>
              <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Batal</button>
          </div>
        </form>
      </div>
  </div>
</div>

<script type="text/javascript">
    function menuActive(id) {
        id = id.trim();
        // console.log(id);
        a = document.getElementById(id.trim())
        a.classList.add("active");
        console.log(a = document.getElementById(id.trim()));
        // // var a =document.getElementById("menu").children[num-1].className="active";
        // var a = document.getElementById(id.trim());
        // console.log(a.parentNode.parentNode);
        // b = a.parentNode.parentNode.parentNode;
        // b.classList.add("menu-open");
        // b.children[0].classList.add("active");
        // console.log( b.children[0] );
        // document.getElementById(id).classList.add("active");

    }
</script>