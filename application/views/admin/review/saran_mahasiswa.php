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

                <div class="row">
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="belum-baca-tab" data-toggle="tab" href="#belum-baca" role="tab" aria-controls="belum-baca" aria-selected="true">Belum Dibaca</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="sudah-baca-tab" data-toggle="tab" href="#sudah-baca" role="tab" aria-controls="sudah-baca" aria-selected="false">Sudah Dibaca</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="saran-terbaik-tab" data-toggle="tab" href="#saran-terbaik" role="tab" aria-controls="saran-terbaik" aria-selected="false">Saran Terbaik</a>
                            </li>
                        </ul>
                        <div class="tab-content p-3" id="myTabContent">
                            <div class="tab-pane fade show active product-sudah-baca" id="belum-baca" role="tabpanel" aria-labelledby="belum-baca-tab">
                                <div class="card-body">
                                    <?php if ($daftar_saran) : ?>
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama Mahasiswa</th>
                                                        <th>Saran</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 1; ?>
                                                    <?php foreach ($daftar_saran as $saran) : ?>
                                                        <tr>
                                                            <td><?= $i++; ?>
                                                                <?php if ($saran['bintang_admin'] == 1) : ?>
                                                                    &nbsp; <i style="color: red;" class="fas fa-star"></i>
                                                                <?php endif; ?>
                                                            </td>
                                                            <?php if ($saran['cek_read'] == 1) : ?>
                                                                <td>**********</td>
                                                            <?php else :  ?>
                                                                <td><?= $saran['nama_user']; ?></td>
                                                            <?php endif;  ?>
                                                            <td><?= $saran['saran']; ?></td>
                                                            <td>
                                                                <a onclick="return confirm('Pindahkan kesaran Sudah dibaca');" href="<?= base_url('HasilPenilaian/readAdmin/') . $saran['id_penilaian']; ?>"> <span class="badge badge-primary">Tandai Sudah Dibaca</span></a>
                                                                <br>
                                                                <?php if ($saran['bintang_admin'] == 0) : ?>
                                                                    <a onclick="return confirm('Jadikan pesan terbaik');" href="<?= base_url('HasilPenilaian/bintangAdmin/') . $saran['id_penilaian']; ?>"><span class="badge badge-success">Jadikan Saran Terbaik</span></a>
                                                                <?php endif; ?>
                                                            </td>
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
                            <div class="tab-pane fade product-sudah-baca" id="sudah-baca" role="tabpanel" aria-labelledby="sudah-baca-tab">
                                <div class="card-body">
                                    <?php if ($sudah_baca) : ?>
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTableBaca" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama Mahasiswa</th>
                                                        <th>Saran</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 1; ?>
                                                    <?php foreach ($sudah_baca as $baca) : ?>
                                                        <tr>
                                                            <td><?= $i++; ?>
                                                                <?php if ($baca['bintang_admin'] == 1) : ?>
                                                                    &nbsp; <i style="color: red;" class="fas fa-star"></i>
                                                                <?php endif; ?>
                                                            </td>
                                                            <?php if ($baca['cek_read'] == 1) : ?>
                                                                <td>**********</td>
                                                            <?php else :  ?>
                                                                <td><?= $baca['nama_user']; ?></td>
                                                            <?php endif;  ?>
                                                            <td><?= $baca['saran']; ?></td>
                                                            <td>
                                                                <?php if ($baca['bintang_admin'] == 0) : ?>
                                                                    <a onclick="return confirm('Jadikan pesan terbaik');" href="<?= base_url('HasilPenilaian/bintangAdmin/') . $baca['id_penilaian']; ?>"><span class="badge badge-success">Jadikan Saran Terbaik</span></a>
                                                                <?php endif; ?>
                                                            </td>
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
                            <div class="tab-pane fade product-saran-terbaik" id="saran-terbaik" role="tabpanel" aria-labelledby="saran-terbaik-tab">
                                <div class="card-body">
                                    <?php if ($bintan_admin) : ?>
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTableBintang" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama Mahasiswa</th>
                                                        <th>Saran</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 1; ?>
                                                    <?php foreach ($bintan_admin as $bintang) : ?>
                                                        <tr>
                                                            <td><?= $i++; ?>
                                                                <?php if ($bintang['bintang_admin'] == 1) : ?>
                                                                    &nbsp; <i style="color: red;" class="fas fa-star"></i>
                                                                <?php endif; ?>
                                                            </td>
                                                            <?php if ($bintang['cek_read'] == 1) : ?>
                                                                <td>**********</td>
                                                            <?php else :  ?>
                                                                <td><?= $bintang['nama_user']; ?></td>
                                                            <?php endif;  ?>
                                                            <td><?= $bintang['saran']; ?></td>

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
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->