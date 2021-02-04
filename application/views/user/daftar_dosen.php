    <!-- Navbar -->
    <nav id="navbar" class="navbar navbar-expand-lg navbar-light fixed-top ">
        <div class="container">
            <ol class="breadcrumb pt-2">
                <li class="breadcrumb-item text-white " aria-current="page"> <a style="text-decoration: none;" class="text-white" href="<?= base_url('User/home'); ?>">
                        Home </a> </li>
                <li class="breadcrumb-item text-white " aria-current="page">Daftar Dosen</li>
            </ol>
        </div>
    </nav>

    <!-- Daftar Dosen -->
    <section id="daftar_dosen" class="mt-5 pt-3 hapus-daftar">
        <div class="container">
            <div class="row isi-daftar-dosen">
                <?php foreach ($daftar_dosen as $df) : ?>
                    <div class="col-sm-12 col-md-6">
                        <div class="card mb-3" style="max-width: 540px;">
                            <div class="row g-0 ">
                                <div class="col-md-4 p-3 ">
                                    <img src="<?= base_url("assets/user/") . $df["image"]; ?>" class="img-fluid rounded-circle border border-4 " alt="Dosen-1">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title nama-dosen"><?= $df["nama"]; ?></h5>
                                        <p class="card-text">
                                            <?= $df["quotes"]; ?>
                                        </p>
                                        <a href="rating.html" class="btn btn-primary"> Riview Sekarang</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

                <div class="col-sm-12 col-md-6">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0 ">
                            <div class="col-md-4 p-3 ">
                                <img src="<?= base_url("assets/user/"); ?>img/dosen-1.jpg" class="img-fluid rounded-circle border border-4 " alt="Dosen-1">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title nama-dosen">Kiki Agustin</h5>
                                    <p class="card-text">
                                        Belajar dari hal kecil sebelum menghadapi hal yang besar
                                    </p>
                                    <button class="btn btn-primary"> Riview Sekarang</button>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0 ">
                            <div class="col-md-4 p-3 ">
                                <img src="<?= base_url("assets/user/"); ?>img/dosen-1.jpg" class="img-fluid rounded-circle border border-4 " alt="Dosen-1">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title nama-dosen">Kiki Agustin</h5>
                                    <p class="card-text">
                                        Belajar dari hal kecil sebelum menghadapi hal yang besar
                                    </p>
                                    <button class="btn btn-primary"> Riview Sekarang</button>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0 ">
                            <div class="col-md-4 p-3 ">
                                <img src="<?= base_url("assets/user/"); ?>img/dosen-1.jpg" class="img-fluid rounded-circle border border-4 " alt="Dosen-1">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title nama-dosen">Kiki Agustin</h5>
                                    <p class="card-text">
                                        Belajar dari hal kecil sebelum menghadapi hal yang besar
                                    </p>
                                    <button class="btn btn-primary"> Riview Sekarang</button>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0 ">
                            <div class="col-md-4 p-3 ">
                                <img src="<?= base_url("assets/user/"); ?>img/dosen-1.jpg" class="img-fluid rounded-circle border border-4 " alt="Dosen-1">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title nama-dosen">Kiki Agustin</h5>
                                    <p class="card-text">
                                        Belajar dari hal kecil sebelum menghadapi hal yang besar
                                    </p>
                                    <button class="btn btn-primary"> Riview Sekarang</button>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-center footer text-white p-3 ">Copiright&copy; Kiki Agustin 2021</footer>