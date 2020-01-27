<style>
  .active {
    color: lightgreen !important;
  }
</style>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link color" id="home_index" href="<?= base_url();?>">Beranda <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link color dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Organisasi
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item color" id="home_tpa" href="<?= base_url('home/tpa');?>">TPA</a>
                    <a class="dropdown-item color" id="home_majelis" href="<?= base_url('home/majelis');?>">Majelis Ta'lim</a>
                    <a class="dropdown-item color" id="home_rimnis" href="<?= base_url('home/rimnis');?>">RIMNIS</a>
                </div>
            </li>
            <li class="nav-item">
              <a class="nav-link color" id="home_profile" href="<?= base_url('home/profile');?>">Profil Mesjid</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="home_student" href="<?= base_url('home/student');?>">Santri</a>
              <!-- <button type="button" class="btn btn-default nav-link" data-toggle="modal" data-target="#find_student">
                Cari Santri
              </button> -->
            </li>
            <li class="nav-item">
              <a class="nav-link btn btn-sm btn-primary" id="home_registration" href="<?= base_url('home/registration');?>">Pendaftaran</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- end navbar -->

<div class="modal fade" id="find_student" role="dialog">
  <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
          <?php echo form_open( site_url('home/student/') ); ?>
          <div class="modal-header">
              <h5 class="modal-title">Cari Santri</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
            <label for="">Nama Santri</label>
            <input type="text" class="form-control" name="student" id="student">
          </div>
          <div class="modal-footer">
              <button type="submit" class="btn  btn-success">Ok</button>
              <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Batal</button>
          </div>
          <?php echo form_close(); ?>
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