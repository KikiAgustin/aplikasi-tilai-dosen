<nav id="navbar" class="navbar navbar-expand-lg navbar-light fixed-top ">
    <div class="container">
        <ol class="breadcrumb pt-2">
            <li class="breadcrumb-item text-white " aria-current="page"> <a style="text-decoration: none;" class="text-white" href="<?= base_url('User/home'); ?>">
                    Home </a> </li>
            <li class="breadcrumb-item text-white " aria-current="page">Postingan</li>
        </ol>
    </div>
</nav>

<div style="margin-top: 66px;" class="container">
    <div class="row">
        <div class="col-sm-12">
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <?= $this->session->userdata('message'); ?>
        </div>
    </div>
</div>

<?php if ($postingan) : ?>

    <?php foreach ($postingan as $post) : ?>

        <?php

        $id_user = $post['id_user'];
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
                <p class="card-text"><?= $post['diskusi']; ?></p>
                <hr>
                <i class="bi bi-hand-thumbs-up-fill"></i>
                <a href="<?= base_url('Diskusi/balasan/') . $post['id_diskusi']; ?>" class="text-decoration-none ">
                    Suka
                </a>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <i class="bi bi-reply-all-fill"></i>
                <a href="<?= base_url('Diskusi/balasan/') . $post['id_diskusi']; ?>" class="text-decoration-none ">
                    Komentar
                </a>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <i class="bi bi-trash-fill"></i>
                <a onclick="return confirm('Apakah anda yakin ingin manghapus postingan ini?')" href="<?= base_url('Diskusi/hapusPostingan/') . $post['id_diskusi']; ?>" class="text-decoration-none ">
                    Hapus
                </a>
            </div>
        </div>

    <?php endforeach; ?>

<?php else : ?>

    <p style="margin-top: 80px;" class="text-center fw-bold ">Belum ada Postingan</p>

<?php endif; ?>