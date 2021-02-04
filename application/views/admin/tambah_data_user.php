<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Data User</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="col-sm-12 col-lg-6">
            <form action="" method="POST">

                <div class="form-group">
                    <label for="exampleInputEmail1" class="font-weight-bold">Nama Lengkap</label>
                    <input type="text" name="name" id="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Lengkap" value="<?= set_value('name') ?>" required>
                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1" class="font-weight-bold">Email</label>
                    <input type="email" name="email" id="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" value="<?= set_value('email') ?>" required>
                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1" class="font-weight-bold">Password</label>
                    <input type="password" name="password1" id="password1" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1" class="font-weight-bold">Ulangi Password</label>
                    <input type="password" name="password2" id="password2" class="form-control" id="exampleInputPassword1" placeholder="Ulangi Password" required>
                    <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <button type="submit" name="submit" class="btn btn-primary">Buat Akun</button>

            </form>
        </div>

    </div>

</div>
<!-- /.container-fluid -->