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
    <!-- My style -->
    <link rel="stylesheet" href="<?= base_url("assets/user/"); ?>css/style.css">

    <title>Aplikasi Review Dosen | Login</title>
</head>

<body class="halaman-utama">


    <section class="login_user">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6 ">
                    <p class="judul-login">
                        Silahkan Registrasi
                        <br>
                        Untuk Untuk Membuat Akun
                    </p>

                    <p class="isi-sub-login">
                        Jika Kamu Sudah Memiliki Akun
                        <br>
                        Silahkan <span class="fw-bold"><a class="text-decoration-none" href="<?= base_url('User/loginUser'); ?>">Login</a></span> Disini
                    </p>
                </div>
                <div class="col-sm-12 col-md-2 ">
                    <img class="img-fluid gambar-registrasi" src="<?= base_url('assets/user/img/'); ?>login.png  " alt="">
                </div>
                <div class="col-sm-12 col-md-4 ">
                    <div class="bg-light box-form-email form-email ">
                        <div class="mb-4">
                            <input type="text" class="form-control p-3 form-email" autocomplete="off" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap">
                        </div>
                        <div class="mb-4">
                            <input type="email" class="form-control p-3 form-email" autocomplete="off" name="email" id="email" placeholder="Email">
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control p-3 fpassword form-email " autocomplete="off" name="password" id="password" placeholder="Password ">
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control p-3 fpassword form-email " autocomplete="off" name="password1" id="password1" placeholder="Konfirmasi Password ">
                        </div>
                        <div class="d-grid gap-2 mt-5">
                            <button class="btn btn-primary form-email  btn-login ">Registrasi</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <!-- My Script -->
    <script type="text/javascript" src="<?= base_url("assets/user/"); ?>js/script.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>


</body>

</html>