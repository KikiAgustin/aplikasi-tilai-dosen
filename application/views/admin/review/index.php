<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar Dosen</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-12">
            <?= $this->session->flashdata('message'); ?>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">daftar Dosen</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <?php foreach ($daftar_dosen as $dd) : ?>
                            <div class="col-sm-12 col-md-3 mb-4 ">
                                <div class="card">
                                    <img loading="lazy" src="<?= base_url('assets/user/img/dosen/') . $dd['image']; ?>" class="card-img-top" alt="<?= $dd['nama']; ?>">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $dd['nama']; ?></h5>
                                        <a href="<?= base_url('HasilPenilaian/detail/') . $dd['id_daftar_dosen']; ?>" class="btn btn-primary">Lihat Review</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
<!-- /.container-fluid -->