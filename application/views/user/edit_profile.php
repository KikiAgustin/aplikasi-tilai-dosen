<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <!-- My Font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,800" rel="stylesheet">
    <!-- jquery -->
    <script src="<?= base_url("assets/user/"); ?>js/jquery-3.1.1.min.js"></script>
    <!-- Velocity JS -->
    <script src="<?= base_url("assets/user/"); ?>js/velocity.min.js"></script>
    <!-- Velocity UI -->
    <script src="<?= base_url("assets/user/"); ?>js/velocity.ui.js"></script>
    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- Animate css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!-- My style -->
    <link rel="stylesheet" href="<?= base_url("assets/user/"); ?>css/style.css">
    <!-- Style rating -->
    <link rel="stylesheet" href="<?= base_url("assets/user/"); ?>css/rating.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title><?= $judul; ?></title>
</head>

<body class="halaman-utama">

    <!-- Navbar -->
    <nav id="navbar-rating" class="navbar navbar-expand-lg navbar-light fixed-top ">
        <div class="container">
            <ol class="breadcrumb pt-2">
                <li class="breadcrumb-item text-white " aria-current="page">
                    <a style="text-decoration: none;" class="text-white" href="<?= base_url('User/home'); ?>">Home </a>
                </li>
                <li class="breadcrumb-item text-white " aria-current="page">
                    <a style="text-decoration: none;" class="text-white" href="<?= base_url('User/daftarDosen'); ?>">Daftar Dosen </a>
                </li>

                <li class="breadcrumb-item text-white " aria-current="page">profile</li>
            </ol>
        </div>
    </nav>

    <!-- <form action="" method="POST">
        <section id="halaman-rating" class="halaman-nilai hapus-rating ">
            <div class="box-nilai mb-4">
                <div class="container bg-light rounded">
                    <div class="row box-nilai-n">
                        <div class="col-sm-12 col-md-4 p-3 justify-content-center ">
                            <img loading="lazy" src="<?= base_url("assets/user/img/user/"); ?><?= $user['image']; ?>" class="img-fluid rounded-circle border border-5" alt="Dosen">
                        </div>
                        <div class="col-sm-12 col-md-8">
                            <p>
                                <span class="nama-dosen"><?= $user['name']; ?></span>
                                <br>
                                <span>Bergabung Pada : <?= date('d F Y', $user['date_created']); ?></span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form> -->

    <form action="<?= base_url('User/saveEditProfile'); ?>" method="POST" enctype="multipart/form-data">
        <section style="margin-top: 100px; ">
            <div class="container ">
                <div class="card mx-auto" style="width: 18rem;">
                    <?= $this->session->userdata('message'); ?>
                    <div class="row pt-3">
                        <div class="col-sm-12">
                            <p class="text-center  ">
                                <img loading="lazy" width="150px" height="150px" src="<?= base_url("assets/user/img/user/"); ?><?= $user['image']; ?>" class="img-fluid rounded-circle border border-5" alt="User">
                                <br>
                                <input type="hidden" name="foto_lawas" value="<?= $user['image']; ?>">
                                <div class="continer">
                                    <div class="row p-3">
                                        <div class="col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                                <input required type="text" name="nama_lengkap" class="form-control" value="<?= $user['name']; ?>">
                                            </div>
                                            <div class="">
                                                <label for="formFileSm" class="form-label">Pilih Foto</label>
                                                <input name="foto" class="form-control form-control-sm" id="formFileSm" type="file">
                                                <?= form_error('foto', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-primary mt-3" href="">Edit Profile</button>
                                        </div>
                                    </div>
                                </div>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>






    <!-- My Script -->
    <script type="text/javascript" src="<?= base_url("assets/user/"); ?>js/script.js"></script>
    <!-- Validasi -->
    <script type="text/javascript" src="<?= base_url("assets/user/"); ?>js/riview_dosen.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
</body>

</html>