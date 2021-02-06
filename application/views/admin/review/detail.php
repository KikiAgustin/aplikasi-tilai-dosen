<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Dosen</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-12">
            <button onclick="goBack()" class="btn btn-primary mb-3"><i class="fas fa-arrow-left"></i> Kembali</button>
            <script>
                function goBack() {
                    window.history.back();
                }
            </script>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Hasil Review</h6>
                </div>
                <?= $this->session->flashdata('message'); ?>
                <div class="card-body">
                    <div class="row">
                        <div class="card mb-3">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img class="img-thumbnail" src="<?= base_url('assets/user/img/dosen/') . $dosen_detail['image']; ?>" alt="<?= $dosen_detail['nama']; ?>">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $dosen_detail['nama']; ?></h5>
                                        <p class="card-text">Dosen dari Prodi - <?= $dosen_detail['mengajar']; ?></p>
                                        <p class="card-text"> <?= $dosen_detail['quotes']; ?></p>
                                        <hr>
                                        <h5 class="card-title">Hasil Review</h5>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="accordion" id="accordionExample">
                                                    <div class="card">
                                                        <div class="card-header" id="headingOne">
                                                            <h2 class="mb-0">
                                                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                    Cara Mengajar
                                                                </button>
                                                            </h2>
                                                        </div>

                                                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <i class="fas fa-star-half-alt fa-2x "></i>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <h5 class="card-title font-weight-bold"><?= $mengajar1; ?></h5>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <i class="fas fa-star fa-2x "></i>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <h5 class="card-title font-weight-bold"><?= $mengajar2; ?></h5>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <i class="fas fa-star fa-2x "></i>
                                                                        <i class="fas fa-star-half-alt fa-2x "></i>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <h5 class="card-title font-weight-bold"><?= $mengajar3; ?></h5>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <i class="fas fa-star fa-2x "></i>
                                                                        <i class="fas fa-star fa-2x "></i>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <h5 class="card-title font-weight-bold"><?= $mengajar4; ?></h5>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <i class="fas fa-star fa-2x "></i>
                                                                        <i class="fas fa-star fa-2x "></i>
                                                                        <i class="fas fa-star-half-alt fa-2x "></i>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <h5 class="card-title font-weight-bold"><?= $mengajar5; ?></h5>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <i class="fas fa-star fa-2x "></i>
                                                                        <i class="fas fa-star fa-2x "></i>
                                                                        <i class="fas fa-star fa-2x "></i>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <h5 class="card-title font-weight-bold"><?= $mengajar6; ?></h5>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <i class="fas fa-star fa-2x "></i>
                                                                        <i class="fas fa-star fa-2x "></i>
                                                                        <i class="fas fa-star fa-2x "></i>
                                                                        <i class="fas fa-star-half-alt fa-2x "></i>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <h5 class="card-title font-weight-bold"><?= $mengajar7; ?></h5>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <i class="fas fa-star fa-2x "></i>
                                                                        <i class="fas fa-star fa-2x "></i>
                                                                        <i class="fas fa-star fa-2x "></i>
                                                                        <i class="fas fa-star fa-2x "></i>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <h5 class="card-title font-weight-bold"><?= $mengajar8; ?></h5>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <i class="fas fa-star fa-2x "></i>
                                                                        <i class="fas fa-star fa-2x "></i>
                                                                        <i class="fas fa-star fa-2x "></i>
                                                                        <i class="fas fa-star fa-2x "></i>
                                                                        <i class="fas fa-star-half-alt fa-2x "></i>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <h5 class="card-title font-weight-bold"><?= $mengajar9; ?></h5>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <i class="fas fa-star fa-2x "></i>
                                                                        <i class="fas fa-star fa-2x "></i>
                                                                        <i class="fas fa-star fa-2x "></i>
                                                                        <i class="fas fa-star fa-2x "></i>
                                                                        <i class="fas fa-star fa-2x "></i>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <h5 class="card-title font-weight-bold"><?= $mengajar10; ?></h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card">
                                                        <div class="card-header" id="headingTwo">
                                                            <h2 class="mb-0">
                                                                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#penyampaian_materi" aria-expanded="false" aria-controls="collapseTwo">
                                                                    Penyampaian Materi
                                                                </button>
                                                            </h2>
                                                        </div>
                                                        <div id="penyampaian_materi" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <i class="fas fa-star-half-alt fa-2x "></i>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <h5 class="card-title font-weight-bold"><?= $penyampaian1; ?></h5>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <i class="fas fa-star fa-2x "></i>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <h5 class="card-title font-weight-bold"><?= $penyampaian2; ?></h5>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <i class="fas fa-star fa-2x "></i>
                                                                        <i class="fas fa-star-half-alt fa-2x "></i>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <h5 class="card-title font-weight-bold"><?= $penyampaian3; ?></h5>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <i class="fas fa-star fa-2x "></i>
                                                                        <i class="fas fa-star fa-2x "></i>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <h5 class="card-title font-weight-bold"><?= $penyampaian4; ?></h5>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <i class="fas fa-star fa-2x "></i>
                                                                        <i class="fas fa-star fa-2x "></i>
                                                                        <i class="fas fa-star-half-alt fa-2x "></i>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <h5 class="card-title font-weight-bold"><?= $penyampaian5; ?></h5>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <i class="fas fa-star fa-2x "></i>
                                                                        <i class="fas fa-star fa-2x "></i>
                                                                        <i class="fas fa-star fa-2x "></i>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <h5 class="card-title font-weight-bold"><?= $penyampaian6; ?></h5>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <i class="fas fa-star fa-2x "></i>
                                                                        <i class="fas fa-star fa-2x "></i>
                                                                        <i class="fas fa-star fa-2x "></i>
                                                                        <i class="fas fa-star-half-alt fa-2x "></i>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <h5 class="card-title font-weight-bold"><?= $penyampaian7; ?></h5>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <i class="fas fa-star fa-2x "></i>
                                                                        <i class="fas fa-star fa-2x "></i>
                                                                        <i class="fas fa-star fa-2x "></i>
                                                                        <i class="fas fa-star fa-2x "></i>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <h5 class="card-title font-weight-bold"><?= $penyampaian8; ?></h5>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <i class="fas fa-star fa-2x "></i>
                                                                        <i class="fas fa-star fa-2x "></i>
                                                                        <i class="fas fa-star fa-2x "></i>
                                                                        <i class="fas fa-star fa-2x "></i>
                                                                        <i class="fas fa-star-half-alt fa-2x "></i>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <h5 class="card-title font-weight-bold"><?= $penyampaian9; ?></h5>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <i class="fas fa-star fa-2x "></i>
                                                                        <i class="fas fa-star fa-2x "></i>
                                                                        <i class="fas fa-star fa-2x "></i>
                                                                        <i class="fas fa-star fa-2x "></i>
                                                                        <i class="fas fa-star fa-2x "></i>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <h5 class="card-title font-weight-bold"><?= $penyampaian10; ?></h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card">
                                                        <div class="card-header" id="headingThree">
                                                            <h2 class="mb-0">
                                                                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                                    Saran
                                                                </button>
                                                            </h2>
                                                        </div>
                                                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                                            <div class="card-body">
                                                                <a href="<?= base_url('HasilPenilaian/saran/') . $dosen_detail['id_daftar_dosen'];  ?>">Lihat Saran</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <p class="card-text mt-3"><small class="text-muted pt-3">Jumlah Reviewer : <?= $jumlah_review; ?></small></p>
                                        <hr>
                                        <h5 class="card-title">Hasil Akhir</h5>
                                        <p class="card-text mt-3">Sistem pembelajaran dari <span class="font-weight-bold"><?= $dosen_detail['nama'];  ?></span> hasilnya <span class="font-weight-bold"><?= $hasil_final; ?></span> </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
<!-- /.container-fluid -->