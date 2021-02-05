<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Dosen</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="col-sm-12 col-lg-6">
            <?= $this->session->flashdata('message'); ?>
            <form action="" method="POST" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="exampleInputEmail1" class="font-weight-bold">Nama Lengkap</label>
                    <input type="text" name="nama" id="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Lengkap" value="<?= set_value('nama') ?>" required>
                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1" class="font-weight-bold">Prodi</label>
                    <input type="prodi" name="prodi" id="prodi" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Dosen Dari Prodi" value="<?= set_value('prodi') ?>" required>
                    <?= form_error('prodi', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1" class="font-weight-bold">Quotes</label>
                    <textarea rows="4" type="text" name="quotes" class="form-control" id="exampleInputEmail1" placeholder="quotes" <?= set_value('quotes') ?> required><?= set_value('quotes') ?></textarea>
                </div>

                <div class="form-group">
                    <label for="foto" class="font-weight-bold">Foto Dosen</label>
                    <input class="form-control" name="foto" type="file" id="foto">
                </div>

                <button type="submit" name="submit" class="btn btn-primary">Tambah Dosen</button>

            </form>
        </div>

    </div>

</div>
<!-- /.container-fluid -->