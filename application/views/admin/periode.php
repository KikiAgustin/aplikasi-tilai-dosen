<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Periode Tahun Ajaran</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-12">

            <a class="btn btn-primary mb-3" href="" data-toggle="modal" data-target="#exampleModal"> <i class="fas fa-plus"></i> Tambah Periode</a>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Periode</h6>
                    <small class="text-danger ">Note: Untuk periode yang aktif, hanya boleh ada satu</small>
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


<!-- Modal Tambah periode -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= base_url('Admin/tambahPeriode'); ?>" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Periode</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="semester">Pilih Semester</label>
                        <div class="form-check">
                            <input required class="form-check-input" type="radio" name="semester" id="semester" value="Ganjil">
                            <label class="form-check-label" for="exampleRadios1">
                                Ganjil
                            </label>
                        </div>
                        <div class="form-check">
                            <input required class="form-check-input" type="radio" name="semester" id="semester" value="Genap">
                            <label class="form-check-label" for="exampleRadios1">
                                Genap
                            </label>
                        </div>
                        <?= form_error('semester', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="periode">Periode Tahun</label>
                        <div class="row">
                            <div class="col-sm-6">

                                <?php
                                $tgl_awal = date('Y') - 5;
                                $tgl_akhir = date('Y') + 5;
                                ?>

                                <div class="form-group">
                                    <label for="tanggal_awal">Tanggal Awal</label>
                                    <select class="form-control" name="tanggal_awal" id="tanggal_awal">
                                        <?php for ($i = $tgl_awal; $i <= $tgl_akhir; $i++) : ?>
                                            <option><?= $i; ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="tanggal_akhir">Tanggal Akhir</label>
                                    <select class="form-control" name="tanggal_akhir" id="tanggal_akhir">
                                        <?php for ($i = $tgl_awal; $i <= $tgl_akhir; $i++) : ?>
                                            <option><?= $i; ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                </div>
            </form>
        </div>
    </div>
</div>