<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Dosen</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-12">
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
                                                                        <h5 class="card-title font-weight-bold">1</h5>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <i class="fas fa-star fa-2x "></i>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <h5 class="card-title font-weight-bold">1</h5>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <i class="fas fa-star fa-2x "></i>
                                                                        <i class="fas fa-star-half-alt fa-2x "></i>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <h5 class="card-title font-weight-bold">1</h5>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <i class="fas fa-star fa-2x "></i>
                                                                        <i class="fas fa-star fa-2x "></i>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <h5 class="card-title font-weight-bold">1</h5>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <i class="fas fa-star fa-2x "></i>
                                                                        <i class="fas fa-star fa-2x "></i>
                                                                        <i class="fas fa-star-half-alt fa-2x "></i>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <h5 class="card-title font-weight-bold">1</h5>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <i class="fas fa-star fa-2x "></i>
                                                                        <i class="fas fa-star fa-2x "></i>
                                                                        <i class="fas fa-star fa-2x "></i>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <h5 class="card-title font-weight-bold">1</h5>
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
                                                                        <h5 class="card-title font-weight-bold">1</h5>
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
                                                                        <h5 class="card-title font-weight-bold">1</h5>
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
                                                                        <h5 class="card-title font-weight-bold">1</h5>
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
                                                                        <h5 class="card-title font-weight-bold">1</h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card">
                                                        <div class="card-header" id="headingTwo">
                                                            <h2 class="mb-0">
                                                                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                                    Penyampaian Materi
                                                                </button>
                                                            </h2>
                                                        </div>
                                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <i class="fas fa-star-half-alt fa-2x "></i>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <h5 class="card-title font-weight-bold">1</h5>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <i class="fas fa-star fa-2x "></i>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <h5 class="card-title font-weight-bold">1</h5>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <i class="fas fa-star fa-2x "></i>
                                                                        <i class="fas fa-star-half-alt fa-2x "></i>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <h5 class="card-title font-weight-bold">1</h5>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <i class="fas fa-star fa-2x "></i>
                                                                        <i class="fas fa-star fa-2x "></i>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <h5 class="card-title font-weight-bold">1</h5>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <i class="fas fa-star fa-2x "></i>
                                                                        <i class="fas fa-star fa-2x "></i>
                                                                        <i class="fas fa-star-half-alt fa-2x "></i>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <h5 class="card-title font-weight-bold">1</h5>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <i class="fas fa-star fa-2x "></i>
                                                                        <i class="fas fa-star fa-2x "></i>
                                                                        <i class="fas fa-star fa-2x "></i>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <h5 class="card-title font-weight-bold">1</h5>
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
                                                                        <h5 class="card-title font-weight-bold">1</h5>
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
                                                                        <h5 class="card-title font-weight-bold">1</h5>
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
                                                                        <h5 class="card-title font-weight-bold">1</h5>
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
                                                                        <h5 class="card-title font-weight-bold">1</h5>
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
                                                                <a href="">Lihat Saran</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <p class="card-text mt-3"><small class="text-muted pt-3">Hasil Penilaian</small></p>
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