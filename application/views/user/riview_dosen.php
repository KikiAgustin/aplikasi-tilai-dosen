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

                <li class="breadcrumb-item text-white " aria-current="page">Riview</li>
            </ol>
        </div>
    </nav>

    <form action="" method="POST">
        <section id="halaman-rating" class="halaman-nilai hapus-rating ">
            <div class="box-nilai mb-4">
                <div class="container bg-light rounded">
                    <div class="row box-nilai-n">
                        <div class="col-sm-12 col-md-4 p-3 justify-content-center ">
                            <img loading="lazy" src="<?= base_url("assets/user/img/dosen/"); ?><?= $riviewDosen['image']; ?>" class="img-fluid rounded-circle border border-5" alt="Dosen">
                        </div>
                        <div class="col-sm-12 col-md-8">
                            <p>
                                <span class="nama-dosen"><?= $riviewDosen['nama']; ?></span>
                                <br>
                                <span>Dosen Dari Prodi : <?= $riviewDosen['mengajar']; ?></span>
                            </p>
                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingOne">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                            Cara Mengajar
                                        </button>
                                    </h2>
                                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <div id="rating" class="rating">
                                                <input type="radio" id="start1" onclick="ratingPertama(this.value)" class="rating1" name="rating1" value="10" />
                                                <label class="full" for="start1" title="Awesome - 5 stars"></label>

                                                <input type="radio" id="start2" onclick="ratingPertama(this.value)" class="rating1" name="rating1" value="9" />
                                                <label class="half" for="start2" title="Pretty good - 4.5 stars"></label>

                                                <input type="radio" id="start3" onclick="ratingPertama(this.value)" class="rating1" name="rating1" value="8" />
                                                <label class="full" for="start3" title="Pretty good - 4 stars"></label>

                                                <input type="radio" id="start4" onclick="ratingPertama(this.value)" class="rating1" name="rating1" value="7" />
                                                <label class="half" for="start4" title="Meh - 3.5 stars"></label>

                                                <input type="radio" id="start5" onclick="ratingPertama(this.value)" class="rating1" name="rating1" value="6" />
                                                <label class="full" for="start5" title="Meh - 3 stars"></label>

                                                <input type="radio" id="start6" onclick="ratingPertama(this.value)" class="rating1" name="rating1" value="5" />
                                                <label class="half" for="start6" title="Kinda bad - 2.5 stars"></label>

                                                <input type="radio" id="start7" onclick="ratingPertama(this.value)" class="rating1" name="rating1" value="4" />
                                                <label class="full" for="start7" title="Kinda bad - 2 stars"></label>

                                                <input type="radio" id="start8" onclick="ratingPertama(this.value)" class="rating1" name="rating1" value="3" />
                                                <label class="half" for="start8" title="Meh - 1.5 stars"></label>

                                                <input type="radio" id="start9" onclick="ratingPertama(this.value)" class="rating1" name="rating1" value="2" />
                                                <label class="full" for="start9" title="Sucks big time - 1 star"></label>

                                                <input type="radio" id="start10" onclick="ratingPertama(this.value)" class="rating1" name="rating1" value="1" />
                                                <label class="half" for="start10" title="Sucks big time - 0.5 stars"></label>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                            Penyampain Materi
                                        </button>
                                    </h2>
                                    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <div class="rating">
                                                <input type="radio" id="start11" onclick="ratingKedua(this.value)" name="rating2" value="10" />
                                                <label class="full" for="start11" title="Awesome - 5 stars"></label>

                                                <input type="radio" id="start12" onclick="ratingKedua(this.value)" name="rating2" value="9" />
                                                <label class="half" for="start12" title="Pretty good - 4.5 stars"></label>

                                                <input type="radio" id="start13" onclick="ratingKedua(this.value)" name="rating2" value="8" />
                                                <label class="full" for="start13" title="Pretty good - 4 stars"></label>

                                                <input type="radio" id="start14" onclick="ratingKedua(this.value)" name="rating2" value="7" />
                                                <label class="half" for="start14" title="Meh - 3.5 stars"></label>

                                                <input type="radio" id="start16" onclick="ratingKedua(this.value)" name="rating2" value="6" />
                                                <label class="full" for="start16" title="Meh - 3 stars"></label>

                                                <input type="radio" id="start17" onclick="ratingKedua(this.value)" name="rating2" value="5" />
                                                <label class="half" for="start17" title="Kinda bad - 2.5 stars"></label>

                                                <input type="radio" id="start18" onclick="ratingKedua(this.value)" name="rating2" value="4" />
                                                <label class="full" for="start18" title="Kinda bad - 2 stars"></label>

                                                <input type="radio" id="start15" onclick="ratingKedua(this.value)" name="rating2" value="3" />
                                                <label class="half" for="start15" title="Meh - 1.5 stars"></label>

                                                <input type="radio" id="start19" onclick="ratingKedua(this.value)" name="rating2" value="2" />
                                                <label class="full" for="start19" title="Sucks big time - 1 star"></label>

                                                <input type="radio" id="start20" onclick="ratingKedua(this.value)" name="rating2" value="1" />
                                                <label class="half" for="start20" title="Sucks big time - 0.5 stars"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                            Saran Yang Membangun
                                        </button>
                                    </h2>
                                    <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <textarea class="form-control" name="saran" id="saran" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-check mt-3">
                                <input class="form-check-input" type="checkbox" name="tampilNama" value="1" id="tampilNama">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Sembunyikan Nama
                                </label>
                            </div>

                            <!-- <a id="btn_rating"  onclick="animasiNilai()" class="btn btn-primary  mt-4 mb-4"> -->
                            <a id="btn_rating" type="submit" class="btn btn-primary  mt-4 mb-4">
                                Review
                                Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>

    <input style="display: none;" type="text" id="hasilRatingPertama">
    <input style="display: none;" type="text" id="hasilRatingKedua">
    <input style="display: none;" type="text" id="idDosen" value="<?= $riviewDosen['id_daftar_dosen']; ?>">
    <input style="display: none;" type="text" id="id_user" value="<?= $id_user; ?>">
    <input style="display: none;" type="text" id="nama_user" value="<?= $nama_user; ?>">
    <input style="display: none;" type="text" id="periode" value="<?= $tahun; ?>">



    <!-- My Script -->
    <script type="text/javascript" src="<?= base_url("assets/user/"); ?>js/script.js"></script>
    <!-- Validasi -->
    <script type="text/javascript" src="<?= base_url("assets/user/"); ?>js/riview_dosen.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
</body>

</html>