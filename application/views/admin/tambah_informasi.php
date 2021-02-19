<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Informasi Penting</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="col-sm-12 col-lg-11">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Informasi</h6>
                </div>
                <div class="card-body">
                    <?= $this->session->flashdata('message'); ?>
                    <form action="" method="POST" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="judul" class="font-weight-bold">Judul</label>
                            <input type="text" name="judul" id="judul" class="form-control" id="judul" placeholder="Judul" value="<?= set_value('judul') ?>">
                            <?= form_error('judul', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <script src="<?= base_url('assets/vendor/ckeditor/ckeditor.js'); ?>"></script>
                        <div class="form-group">
                            <label for="isi" class="font-weight-bold">Isi Informasi</label>
                            <textarea type="text" name="isi" id="isi" class="form-control ckeditor ">
                            <?= set_value('isi'); ?>
                            </textarea>
                            <?= form_error('isi', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="foto" class="font-weight-bold">Banner</label>
                            <input class="form-control" name="foto" type="file" id="foto">
                        </div>

                        <button type="submit" name="submit" class="btn btn-primary">Tambah Informasi</button>

                    </form>
                </div>
            </div>
        </div>

    </div>

</div>
<!-- /.container-fluid -->