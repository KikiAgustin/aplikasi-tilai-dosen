<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Penjualan Madu</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-12">

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Penjualan</h6>
                </div>
                <?= $this->session->flashdata('message'); ?>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal Pesan</th>
                                    <th>Nama Lengkap</th>
                                    <th>Jenis penyakit</th>
                                    <th>Nomor</th>
                                    <th>Alamat</th>
                                    <th>Jumlah</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($pembelian as $pen) : ?>

                                    <?php

                                    $status = $pen['status'];

                                    if ($status == 0) $status = '<span class="badge badge-light">Belum diProses</span>';
                                    elseif ($status == 1) $status = '<span class="badge badge-primary">Sedang diproses</span>';
                                    elseif ($status == 2) $status = '<span class="badge badge-success">Selesai</span>';
                                    elseif ($status == 3) $status = '<span class="badge badge-danger">Failed</span>';

                                    ?>

                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $pen['tanggal_pemesanan']; ?></td>
                                        <td><?= $pen['nama']; ?></td>
                                        <td><?= $pen['penyakit']; ?></td>
                                        <td><?= $pen['nomor']; ?></td>
                                        <td><?= $pen['alamat']; ?></td>
                                        <td><?= $pen['jumlah']; ?></td>
                                        <td><?= $status; ?></td>
                                        <td>
                                            <!-- Example split danger button -->
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary">Action</button>
                                                <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="<?= base_url('Admin/editDataMadu/') . $pen['id_madu']; ?>">Ubah</a>
                                                    <a onclick="return confirm('Apakah anda yakin ingin menghapus data ini!!')" class="dropdown-item" href="<?= base_url('Admin/hapusDataMadu/') . $pen['id_madu']; ?>">Hapus</a>
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
    <!-- /.container-fluid -->