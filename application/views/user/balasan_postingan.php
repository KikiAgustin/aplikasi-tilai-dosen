<nav id="navbar" class="navbar navbar-expand-lg navbar-light fixed-top ">
    <div class="container">
        <ol class="breadcrumb pt-2">
            <li class="breadcrumb-item text-white " aria-current="page"> <a style="text-decoration: none;" class="text-white" href="<?= base_url('User/home'); ?>">
                    Home </a> </li>
            <li class="breadcrumb-item text-white " aria-current="page"><a style="text-decoration: none;" class="text-white" href="<?= base_url('Diskusi'); ?>">
                    Diskusi </a></li>
            <li class="breadcrumb-item text-white " aria-current="page">Komentar</li>
        </ol>
    </div>
</nav>
<div style="margin-top: 66px;" class="container">
    <div class="row">
        <div class="col-sm-12">
            <?= $this->session->userdata('message'); ?>
        </div>
    </div>
</div>

<div class="card mb-2">
    <div class="card-header">
        <div class="row">
            <div class="col-sm-12 ">
                <h5 class="card-title">Balasan Untuk <?= $pembalas['name']; ?> </h5>
            </div>
        </div>
    </div>
    <div class="card-body">
        <?php if ($balasan) : ?>
            <?php foreach ($balasan as $bl) : ?>
                <?php

                $id_user = $bl['id_user'];

                $user = $this->db->get_where('user', ['id' => $id_user])->row_array();

                ?>
                <div class="row">
                    <div class="col-sm-12">
                        <img width="50px" height="50px" class="img-fluid rounded-circle img-thumbnail " src="<?= base_url('assets/user/img/user/') . $user['image']; ?>" alt="">
                        <small class="text-muted  "><?= $user['name']; ?></small>
                    </div>
                    <div class="col-sm-12 mb-2">
                        <p class="card-text"><?= $bl['balasan']; ?></p>
                    </div>
                    <hr>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p class="text-center">Tidak ada balasan untuk komentar ini</p>
        <?php endif; ?>
    </div>

</div>


<div class="card fixed-bottom ">
    <div class="card-header">
        <div class="container">
            <form class="needs-validation" novalidate" action="" method="POST">
                <div class="row">
                    <div class="col-sm-12 mb-2 ">
                        <textarea class="form-control <?= form_error('tulis_balasan') ? 'is-invalid' : ''; ?> " name="tulis_balasan" id="tulis_balasan" rows="2" placeholder="Tulis Komentar..."></textarea>
                        <?= form_error('tulis_balasan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="col-sm-1">
                        <button type="submit" class="btn btn-primary">Balas</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>