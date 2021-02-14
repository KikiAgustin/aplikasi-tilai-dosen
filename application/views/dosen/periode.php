<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar Periode Tahun Ajaran</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">daftar Periode Tahun Ajaran</h6>
                    <small class="text-danger">Note : data ini adalah periode yang sudah selesai, apabila ada periode yang tidak bisa dibuka, berarti tidak ada yang menilai anda pada periode tersebut</small>
                </div>
                <?= $this->session->flashdata('message'); ?>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Semester</th>
                                    <th>Periode</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($periode as $dd) : ?>

                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $dd['semester']; ?></td>
                                        <td><?= $dd['periode']; ?></td>
                                        <td><a href="<?= base_url('Dosen/periodeDetail/') . $dd['id_periode']; ?>"><span class="badge bg-primary text-white">Lihat hasil</span></a></td>
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