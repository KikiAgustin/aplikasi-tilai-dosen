<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Informasi</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-12">

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Inforamasi</h6>
                    <small class="text-muted ">Informasi untuk semua mahasiswa</small>
                </div>
                <?= $this->session->flashdata('message'); ?>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                            <tr>
                                <th>Judul</th>
                                <td><?= $informasi['judul']; ?></td>
                            </tr>
                            <tr>
                                <th>Banner</th>
                                <td> <img class="img-fluid" src="<?= base_url('assets/img/informasi/') . $informasi['image']; ?>" alt=""></td>
                            </tr>
                            <tr>
                                <th>Isi</th>
                                <td> <?= $informasi['diskusi']; ?> </td>
                            </tr>

                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
<!-- /.container-fluid -->