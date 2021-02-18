<nav id="navbar" class="navbar navbar-expand-lg navbar-light fixed-top ">
    <div class="container">
        <ol class="breadcrumb pt-2">
            <li class="breadcrumb-item text-white " aria-current="page"> <a style="text-decoration: none;" class="text-white" href="<?= base_url('User/home'); ?>">
                    Home </a> </li>
            <li class="breadcrumb-item text-white " aria-current="page">Diskusi</li>
        </ol>
    </div>
</nav>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <?= $this->session->userdata('message'); ?>
        </div>
    </div>
</div>
<div style="margin-top: 66px;" class="card mb-4">
    <div class="card-header">
        <div class="container">
            <form class="needs-validation" novalidate" action="" method="POST">
                <div class="row">
                    <div class="col-sm-1 mb-2">
                        <img width="70px" height="70px" class="img-fluid rounded-circle img-thumbnail " src="<?= base_url('assets/user/img/user/') . $user['image']; ?>" alt="">
                    </div>
                    <div class="col-sm-10 mb-2 ">
                        <textarea class="form-control  <?= form_error('tulis_diskusi') ? 'is-invalid' : ''; ?> " name="tulis_diskusi" id="tulis_diskusi" rows="2" placeholder="Tulis Diskusi Disini......."></textarea>
                        <?= form_error('tulis_diskusi', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="col-sm-1">
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php if ($diskusi) : ?>

    <?php foreach ($diskusi as $ds) : ?>

        <?php

        $id_user = $ds['id_user'];
        $user = $this->db->get_where('user', ['id' => $id_user])->row_array();
        ?>

        <div class="card mb-2">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-12 ">
                        <img width="50px" height="50px" class="img-fluid rounded-circle img-thumbnail " src="<?= base_url('assets/user/img/user/') . $user['image']; ?>" alt="">
                        <small class="text-muted  "><?= $user['name']; ?></small>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h5 class="card-title"><?= $user['name']; ?> Menulis Ini</h5>
                <p class="card-text"><?= $ds['diskusi']; ?></p>
                <hr>
                <a href="<?= base_url('Diskusi/balasan/') . $ds['id_diskusi']; ?>" class="text-decoration-none ">
                    Balas
                </a>
            </div>
        </div>

    <?php endforeach; ?>

<?php else : ?>

    <p class="text-center fw-bold ">Belum ada diskusi yang masuk</p>

<?php endif; ?>