<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Data</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="col-sm-12 col-lg-6">
            <?= $this->session->flashdata('message'); ?>
            <form action="" method="POST" enctype="multipart/form-data">

                <input type="hidden" name="id_dosen" value="<?= $edit_dosen['id_daftar_dosen']; ?>">

                <div class="form-group">
                    <label for="exampleInputEmail1" class="font-weight-bold">Nama Lengkap</label>
                    <input type="text" name="nama" id="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Lengkap" value="<?= $edit_dosen['nama']; ?>" required>
                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1" class="font-weight-bold">Prodi</label>
                    <input type="prodi" name="prodi" id="prodi" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Dosen Dari Prodi" value="<?= $edit_dosen['mengajar']; ?>" required>
                    <?= form_error('prodi', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1" class="font-weight-bold">Quotes</label>
                    <textarea rows="4" type="text" name="quotes" class="form-control" id="exampleInputEmail1" placeholder="quotes" required><?= $edit_dosen['quotes']; ?></textarea>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-12 col-md-3 ">
                            <img src="<?= base_url('assets/user/img/dosen/') . $edit_dosen['image']; ?>" class="img-thumbnail" alt="<?= $edit_dosen['nama']; ?>">
                        </div>
                        <div class="col-sm-12 col-md-9 ">
                            <label for="foto" class="font-weight-bold">Foto Dosen</label>
                            <input class="form-control" name="foto" type="file" id="foto">
                        </div>
                    </div>

                </div>

                <button type="submit" name="submit" class="btn btn-primary">Edit Dosen</button>

            </form>
        </div>

    </div>

</div>
<!-- /.container-fluid -->