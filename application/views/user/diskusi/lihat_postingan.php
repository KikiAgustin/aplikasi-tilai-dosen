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
        $infoUser = $this->db->get_where('user', ['id' => $id_user])->row_array();

        $id_diskusi = $post['id_diskusi'];
        $like = $this->db->get_where('like_postingan', ['id_postingan' => $id_diskusi, 'id_user' => $id_user, 'from_like' => $user['id'], 'status' => 1])->row_array();

        $jumlahLike = $this->db->get_where('like_postingan', ['id_postingan' => $post['id_diskusi'], 'status' => 1])->num_rows();
        $jumlahKomen = $this->db->get_where('balasan', ['id_diskusi' => $post['id_diskusi']])->num_rows();

        $jumlahBalasanKomen = $this->db->get_where('balasan_postingan', ['id_diskusi' => $post['id_diskusi']])->num_rows();
        $hasilKomen = $jumlahKomen + $jumlahBalasanKomen;

        ?>

        <div class="card mb-2">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-12 ">
                        <a class="text-decoration-none" href="<?= base_url('Diskusi/cekProfile/') . $id_user; ?>">
                            <img width="50px" height="50px" class="img-fluid rounded-circle img-thumbnail " src="<?= base_url('assets/user/img/user/') . $infoUser['image']; ?>" alt="">
                            <small class="text-muted  "><?= $infoUser['name']; ?></small>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h5 class="card-title"><?= $infoUser['name']; ?> Menulis Ini &nbsp; <small style="font-size: 15px;" class="text-muted">Pada <?= date('h:i d F Y', $post['tanggal']); ?></small> </h5>
                <p class="card-text"><?= $post['diskusi']; ?></p>

                <?php if ($jumlahLike) : ?>
                    <p class=" text-start  pt-3 d-inline  "><a class="text-decoration-none" href="<?= base_url('Diskusi/lihatLike/') . $post['id_diskusi']; ?>"><?= $jumlahLike; ?> Orang Menyukai</a></p>
                <?php endif; ?>
                <?php if ($jumlahKomen) : ?>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <p class=" text-end pt-3 d-inline "><a class="text-decoration-none" href="<?= base_url('Diskusi/balasan/') . $post['id_diskusi']; ?>"><?= $hasilKomen; ?> Komentar</a></p>
                <?php endif; ?>

                <hr>
                <a href="<?= base_url('Diskusi/likePostinganProfile/') . $post['id_diskusi'] . '/' . $user['id'] . '/' . $id_user; ?>" class="text-decoration-none ">
                    <i <?= $like ? 'style="color: red;"' : 'style="color: black;"' ?> class="bi bi-hand-thumbs-up-fill"></i>
                    Suka
                </a>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <i class="bi bi-reply-all-fill"></i>
                <a href="<?= base_url('Diskusi/balasan/') . $post['id_diskusi']; ?>" class="text-decoration-none ">
                    Komentar
                </a>
            </div>
        </div>

    <?php endforeach; ?>

<?php else : ?>

    <p style="margin-top: 80px;" class="text-center fw-bold ">Belum ada Postingan</p>

<?php endif; ?>