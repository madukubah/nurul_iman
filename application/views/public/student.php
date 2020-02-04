<style>
    a.color {
        color: black !important;
    }
</style>


<!-- regis_num, name, address, image, ttl, phone  -->
<div class="container mt-5" style="min-height:532px">
    <div class="content text-center mb-3">
        <div class="row justify-content-between">
            <div class="col-lg-4">
                <h3>Pencarian Santri</h3>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="row justify-content-center">
            <?php if($student) : ?>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <div class="card shadow mb-4">
                    <img src="<?= $student->image ?>" class="card-img-top rounded" alt="gambar" width="100%">
                    <div class="card-body">
                        <h6 class="card-title"><?= $student->name ?></h6>
                        <p style="margin-top: -0.8rem !important; font-size: 0.8rem;"><cite title="Source Title"><?= $student->registration_number ?></cite></p>
                        <p class="card-text"><b>Profil</b></p>
                        <p style="margin-top: -0.8rem !important; font-size: 0.8rem;">TTL: <?= $student->ttl ?></p>
                        <p style="margin-top: -0.8rem !important; font-size: 0.8rem;">Alamat: <?= $student->address ?></p>
                        <p style="margin-top: -0.8rem !important; font-size: 0.8rem;">Hp: <?= $student->phone ?></p>
                    </div>
                </div>
            </div>
            <?php else : ?>
            <h4>Tidak ada Siswa yang sesuai</h4>
            <?php endif; ?>
        </div>
    </div>
</div>