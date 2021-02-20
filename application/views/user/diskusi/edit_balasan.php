<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <?= $this->session->userdata('message'); ?>
        </div>
    </div>
</div>


<div class="card ">
    <div class="card-header">
        <div class="row">
            <div class="col-sm-12  ">
                <div class="d-inline" onclick="goBack()" class="img-fluid ml-2" href=""><img src="<?= base_url('assets/user/img/arrow.png'); ?>" alt=""></div> &nbsp;
                <h5 class="card-title d-inline judul-balas ">kembali </h5>
            </div>
            <script>
                function goBack() {
                    window.history.back();
                }
            </script>
        </div>
    </div>
    <div class="card-body">
        <div>
            <form class="needs-validation" novalidate" action="" method="POST">
                <div class="row">
                    <div class="col-sm-12 mb-2 ">
                        <textarea class="form-control <?= form_error('edit_balasan') ? 'is-invalid' : ''; ?> " name="edit_balasan" id="edit_balasan" rows="2" placeholder="Edit Komentar...">
                        <?= $balasan['balasan']; ?>
                        </textarea>
                        <?= form_error('edit_balasan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="col-sm-2">
                        <button type="submit" class="btn btn-primary">Edit Komentar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>