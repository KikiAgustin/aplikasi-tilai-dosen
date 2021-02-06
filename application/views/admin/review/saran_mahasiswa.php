<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Saran Mahasiswa</h1>

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
                    <h6 class="m-0 font-weight-bold text-primary">Saran Dari Mahasiswa</h6>
                </div>
                <?= $this->session->flashdata('message'); ?>
                <div class="card-body">
                    <?php if ($daftar_saran) : ?>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Mahasiswa</th>
                                        <th>Saran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?= $i = 1; ?>
                                    <?php foreach ($daftar_saran as $saran) : ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td>Kiki Agustin</td>
                                            <td><?= $saran['saran']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else : ?>
                        <p class="font-weight-bold">Saran Masih Kosong!!</p>
                    <?php endif; ?>
                </div>
            </div>

        </div>

    </div>
</div>
<!-- /.container-fluid -->