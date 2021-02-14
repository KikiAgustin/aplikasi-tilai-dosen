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
    <!-- Style rating -->
    <link rel="stylesheet" href="<?= base_url("assets/user/"); ?>css/rating.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Aplikasi penilaian Dosen | Login</title>
</head>

<body class="halaman-utama">


    <section id="halaman-berhasil" class="halaman-nilai hapus-berhasil ">
        <div class="box-nilai mb-4">
            <div class="container bg-light rounded">
                <div class="row box-nilai-n">
                    <div class="col-sm-12 text-center">
                        <img loading="lazy" class="img-berhasil" src="<?= base_url("assets/user/"); ?>img/berhasil.png" class="img-fluid" alt="Berhasil">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <span class="text-berhasil">
                            Terimakasih sudah memberikan nilai dan saran kepada dosen ini
                            <br>
                            semoga penilaian dari temen-temen semua bisa memberikan dampak positif
                            <br>
                            dan menjadikan proses pembelajaran lebih baik
                        </span>
                    </div>
                </div>
                <div class="row mt-4 pb-4">
                    <div class="col-sm-12 text-center">
                        <a onclick="animasiBerhasil()" class="btn btn-primary">Nilai Dosen Lain</a>
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