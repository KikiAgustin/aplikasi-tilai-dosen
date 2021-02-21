<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Informasi Penting</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-12">

            <a class="btn btn-primary mb-3" href="<?= base_url('Admin/tambahInformasi'); ?>"> <i class="fas fa-plus"></i> Tambah Informasi Penting</a>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Inforamasi</h6>
                    <small class="text-muted ">Informasi untuk semua mahasiswa</small>
                </div>
                <?= $this->session->flashdata('message'); ?>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Judul</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($informasi as $info) : ?>

                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= date('d-m-Y', $info['tanggal']); ?></td>
                                        <td><?= $info['judul']; ?></td>
                                        <?php if ($info['penting'] == 1) : ?>
                                            <td><span class="badge badge-primary">Aktif</span></td>
                                        <?php elseif ($info['penting'] == 2) : ?>
                                            <td><span class="badge badge-success">Selesai &nbsp; <i class="fas fa-check"></i> </span></td>
                                        <?php else : ?>
                                            <td><span class="badge badge-secondary">Belum Aktif</span></td>
                                        <?php endif; ?>

                                        <td>
                                            <!-- Example split danger button -->
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary">Aksi</button>
                                                <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="<?= base_url('Admin/detailInformasi/') . $info['id_diskusi']; ?>">Detail</a>
                                                    <a class="dropdown-item" href="<?= base_url('Admin/editInformasi/') . $info['id_diskusi']; ?>">Edit</a>
                                                    <a onclick="return confirm('Ubah Status Informasi ini')" class="dropdown-item" href="<?= base_url('Admin/selesaikanInformasi/') . $info['id_diskusi']; ?>">Ubah Status</a>
                                                    <a onclick="return confirm('Apakah anda yakin ingin menghapus data ini!!')" class="dropdown-item" href="<?= base_url('Admin/hapusInformasi/') . $info['id_diskusi']; ?>">Hapus</a>
                                                </div>
                                            </div>
                                        </td>


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