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

    <div class="container">
        <div class="row">
            <div class="col-sm-12">

            </div>
        </div>
    </div>

    <!-- Daftar Dosen -->
    <section id="daftar_dosen" class="mt-5 pt-3 hapus-daftar">
        <div class="container">
            <?= $this->session->flashdata('message'); ?>
            <div class="row isi-daftar-dosen">
                <h5 class="fw-bold mb-4"><?= $periode ? 'Periode : Semester' . $semester . ' / ' . $tahun : 'Tidak ada periode yang harus direview'  ?> </h5>
                <?php foreach ($daftar_dosen as $df) : ?>
                    <div class="col-sm-12 col-md-6">
                        <div class="card mb-3" style="max-width: 540px;">
                            <div class="row g-0 ">
                                <div class="col-md-4 p-3 ">
                                    <img loading="lazy" src="<?= base_url("assets/user/img/dosen/") . $df["image"]; ?>" class="img-fluid rounded-circle border border-4 " alt="Dosen-1">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title nama-dosen"><?= $df["nama"]; ?></h5>
                                        <p class="card-text">
                                            <?= $df["quotes"]; ?>
                                        </p>
                                        <?php $getUser = $this->db->get_where('hasil_penilaian', ['periode' => $tahun, 'id_daftar_dosen' => $df['id_daftar_dosen'], 'id_user' => $id_user])->row_array(); ?>

                                        <?php if ($getUser) : ?>
                                            <button style="cursor:none;" class="btn btn-success"> Sudah Direview</button>
                                        <?php else : ?>
                                            <a href="<?= base_url('User/riviewDosen/') . $df["id_daftar_dosen"]; ?>" class="btn btn-primary"> Riview Sekarang</a>
                                        <?php endif; ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <!-- Footer -->
    </section>
    <footer class="text-center  text-white p-3 mb-0 ">Copiright&copy; Kiki Agustin 2021</footer>