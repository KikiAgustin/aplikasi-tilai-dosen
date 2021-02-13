<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar Dosen</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-12">
            <a class="btn btn-primary mb-3" href="<?= base_url('Admin/tambahDosen'); ?>"><i class="fas fa-user-plus"></i> Tambah Dosen</a>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">daftar Dosen</h6>
                </div>
                <?= $this->session->flashdata('message'); ?>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Foto</th>
                                    <th>Nama Dosen</th>
                                    <th>Dosen Prodi</th>
                                    <th>Quotes</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($daftar_dosen as $dd) : ?>

                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><img loading="lazy" src="<?= base_url('assets/user/img/dosen/') . $dd['image']; ?>" class="img-thumbnail" width="100" height="100" alt="<?= $dd['nama']; ?>"></td>
                                        <td><?= $dd['nama']; ?></td>
                                        <td><?= $dd['mengajar']; ?></td>
                                        <td><?= $dd['quotes']; ?></td>
                                        <td>
                                            <!-- Example split danger button -->
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary">Action</button>
                                                <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="<?= base_url('Admin/editDosen/') . $dd['id_daftar_dosen']; ?>">Edit</a>
                                                    <a onclick="return confirm('Apakah anda yakin ingin menghapus data ini!!')" class="dropdown-item" href="<?= base_url('Admin/hapusDosen/') . $dd['id_daftar_dosen']; ?>">Hapus</a>
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