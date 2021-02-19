<nav id="navbar" class="navbar navbar-expand-lg navbar-light fixed-top ">
    <div class="container">
        <ol class="breadcrumb pt-2">
            <li class="breadcrumb-item text-white " aria-current="page"> <a style="text-decoration: none;" class="text-white" href="<?= base_url('User/home'); ?>">
                    Home </a> </li>
            <li class="breadcrumb-item text-white " aria-current="page">Diskusi</li>
        </ol>
    </div>
</nav>
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

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <?= $this->session->userdata('message'); ?>
        </div>
    </div>
</div>

<?php if ($informasi) : ?>

    <div class="card mb-2">
        <div style="background-color: #8f9aff;" class="card-header">
            <div class="row">
                <div class="col-sm-12 ">
                    <p style="font-size: 18px;" class="fw-bold">Info Penting</p>
                </div>
            </div>
        </div>
        <?php foreach ($informasi as $info) : ?>
            <?php

            $id_user = $info['id_user'];
            $infoPengirim = $this->db->get_where('user', ['id' => $id_user])->row_array();

            $id_diskusi = $info['id_diskusi'];
            $like = $this->db->get_where('like_postingan', ['id_postingan' => $id_diskusi, 'id_user' => $infoPengirim['id'], 'status' => 1])->row_array();

            ?>
            <div class="card-body ">
                <h5 class="card-title"><?= $infoPengirim['name']; ?> Menulis Ini &nbsp; <span class="text-muted" style="font-size: 15px;">Pada <?= date('h:i d F Y', $info['tanggal']); ?></span> </h5>
                <div class="card-text">
                    <?= $info['diskusi']; ?>
                </div>
                <img src="<?= base_url('assets/img/informasi/') . $info['image']; ?>" class="card-img-bottom img-fluid " alt="...">
                <hr>
                <a href="<?= base_url('Diskusi/likePostingan/') . $info['id_diskusi'] . '/' . $infoPengirim['id']; ?>" class="text-decoration-none ">
                    <i <?= $like ? 'style="color: red;"' : 'style="color: black;"' ?> class="bi bi-hand-thumbs-up-fill"></i>
                    Suka
                </a>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="<?= base_url('Diskusi/balasan/') . $info['id_diskusi']; ?>" class="text-decoration-none ">
                    <i style="color: black;" class="bi bi-reply-all-fill"></i>
                    komentar
                </a>
                <hr>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<?php if ($diskusi) : ?>

    <?php foreach ($diskusi as $ds) : ?>

        <?php

        $id_user = $ds['id_user'];
        $pengirim = $this->db->get_where('user', ['id' => $id_user])->row_array();

        $id_diskusi = $ds['id_diskusi'];

        $like = $this->db->get_where('like_postingan', ['id_postingan' => $id_diskusi, 'id_user' => $ds['id_user'], 'from_like' => $user['id'], 'status' => 1])->row_array();

        $jumlahLike = $this->db->get_where('like_postingan', ['id_postingan' => $ds['id_diskusi'], 'status' => 1])->num_rows();
        $jumlahKomen = $this->db->get_where('balasan', ['id_diskusi' => $ds['id_diskusi']])->num_rows();

        ?>

        <div class="card mb-2">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-12 ">
                        <a class="text-decoration-none " href="<?= base_url('Diskusi/cekProfile/') . $ds['id_user']; ?>">
                            <img width="50px" height="50px" class="img-fluid rounded-circle img-thumbnail " src="<?= base_url('assets/user/img/user/') . $pengirim['image']; ?>" alt="">
                            <small class="text-muted  "><?= $pengirim['name']; ?></small>
                        </a>
                        <div class="dropdown">
                            <a class="text-decoration-none" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                <p style="margin-top: -35px;" class="text-end  ">
                                    <img class="img-fluid justify-content-end " src="<?= base_url('assets/user/img/arro.png'); ?>" alt="">
                                </p>
                            </a>
                            <ul class="dropdown-menu ml-auto " aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h5 class="card-title"><?= $pengirim['name']; ?> Menulis Ini &nbsp; <span class="text-muted" style="font-size: 15px;">Pada <?= date('h:i d F Y', $ds['tanggal']); ?></span> </h5>
                <p class="card-text"><?= $ds['diskusi']; ?></p>
                <?php if ($jumlahLike) : ?>
                    <p class=" text-start  pt-3 d-inline  "><a class="text-decoration-none" href="<?= base_url('Diskusi/lihatLike/') . $ds['id_diskusi']; ?>"><?= $jumlahLike; ?> Orang Menyukai</a></p>
                <?php endif; ?>
                <?php if ($jumlahKomen) : ?>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <p class=" text-end pt-3 d-inline "><a class="text-decoration-none" href="<?= base_url('Diskusi/balasan/') . $ds['id_diskusi']; ?>"><?= $jumlahKomen; ?> Komentar</a></p>
                <?php endif; ?>
                <hr>
                <a href="<?= base_url('Diskusi/likePostingan/') . $ds['id_diskusi'] . '/' . $pengirim['id']; ?>" class="text-decoration-none ">
                    <i <?= $like ? 'style="color: red;"' : 'style="color: black;"' ?> class="bi bi-hand-thumbs-up-fill"></i>
                    Suka
                </a>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="<?= base_url('Diskusi/balasan/') . $ds['id_diskusi']; ?>" class="text-decoration-none ">
                    <i style="color: black;" class="bi bi-reply-all-fill"></i>
                    komentar
                </a>
            </div>
        </div>

    <?php endforeach; ?>

<?php else : ?>

    <p style="margin-top: 66px;" class="text-center fw-bold ">Belum ada diskusi yang masuk</p>

<?php endif; ?>