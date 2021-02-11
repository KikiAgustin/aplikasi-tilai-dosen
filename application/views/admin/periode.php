<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data User</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-12">

            <a class="btn btn-primary mb-3" href="<?= base_url('Admin/tambahDataUser'); ?>">Tambah Periode</a>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
                </div>
                <?= $this->session->flashdata('message'); ?>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Semester</th>
                                    <th>Tahun</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($periode as $prd) : ?>

                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $prd['semester']; ?></td>
                                        <td><?= $prd['periode']; ?></td>
                                        <?php if ($prd['status'] == 1) : ?>
                                            <td><span class="badge badge-primary">Aktif</span></td>
                                        <?php elseif ($prd['status'] == 2) : ?>
                                            <td><span class="badge badge-success">Selesai &nbsp; <i class="fas fa-check"></i> </span></td>
                                        <?php else : ?>
                                            <td><span class="badge badge-secondary">Belum Aktif</span></td>
                                        <?php endif; ?>


                                        <?php if ($prd['status'] == 1) : ?>
                                            <td><a onclick="return confirm('ubah periode ini menjadi selesai?')" href="<?= base_url('Admin/ubahPeriode/') . $prd['id_periode'];  ?>"><span class="badge badge-secondary">Ubah Status</span></a></td>
                                        <?php elseif ($prd['status'] == 2) : ?>
                                            <td><span class="badge badge-success">Selesai &nbsp; <i class="fas fa-check"></i> </span></td>
                                        <?php else : ?>
                                            <td><a onclick="return confirm('ubah periode ini menjadi aktif?')" href="<?= base_url('Admin/ubahPeriode/') . $prd['id_periode'];  ?>"><span class="badge badge-secondary">Ubah Status</span></a> </td>
                                        <?php endif; ?>
                                    </tr>

                                    <?php $i++; ?>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
<!-- /.container-fluid -->