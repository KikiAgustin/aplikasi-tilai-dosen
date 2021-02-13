<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Dosen</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="col-sm-12 col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Data Dosen</h6>
                </div>
                <div class="card-body">
                    <?= $this->session->flashdata('message'); ?>
                    <form action="" method="POST" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="exampleInputEmail1" class="font-weight-bold">Nama Lengkap</label>
                            <input type="text" name="nama" id="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Lengkap" value="<?= set_value('nama') ?>" required>
                            <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="email" class="font-weight-bold">Email</label>
                            <input type="email" name="email" id="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email" value="<?= set_value('email') ?>" required>
                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="password" class="font-weight-bold">Password</label>
                            <input type="password" name="password" id="password" class="form-control" id="password" aria-describedby="passwordHelp" placeholder="Password" required>
                            <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="password1" class="font-weight-bold">Konformasi Password</label>
                            <input type="password" name="password1" id="password1" class="form-control" id="password1" aria-describedby="password1Help" placeholder="Konformasi Password" required>
                            <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
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

    </div>

</div>
<!-- /.container-fluid -->