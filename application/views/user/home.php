    <!-- Navbar -->
    <nav id="navbar-home" class="navbar navbar-expand-lg navbar-light fixed-top ">
        <div class="container ">
            <a class="navbar-brand text-white" href="#home">LOGO</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse home-navbar " id="navbarNavAltMarkup">
                <ul class="navbar-nav text-uppercase mx-auto nav-pills ">
                </ul>
                <a class="nav-link text-white " aria-current="page" href="#home">Home</a>
                <a class="nav-link text-white  " aria-current="page" href="#about">About</a>
                <a class="nav-link text-white  " aria-current="page" href="#daftar-dosen">Daftar Dosen</a>
                <a class="nav-link text-white  " aria-current="page" href="#contact">Contact</a>
                <?php if ($this->session->userdata('email')) : ?>
                    <div class="dropdown">
                        <a class="nav-link text-dark fw-bold    " role="button" id="profile" data-bs-toggle="dropdown" aria-expanded="false" aria-current="page" href="#"> <?= $nama_user; ?> &nbsp; <img src="<?= base_url('assets/user/img/user/') . $image;  ?>" class="img-fluid rounded-circle " width="40px" height="40px" alt="<?= $nama_user; ?>"> </a>

                        <ul class="dropdown-menu mt-2 " aria-labelledby="profile">
                            <li><a class="dropdown-item" href="<?= base_url('User/profile'); ?>"><i class="bi bi-person-fill"></i> </i> Profile</a></li>
                            <li><a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#keluarAplikasi"><i class="bi bi-box-arrow-left"></i> Logout</a></li>
                        </ul>
                    </div>
                <?php else : ?>
                    <a class="nav-link text-white  " aria-current="page" href="<?= base_url('AuthUser'); ?>"> <button style="padding-left: 25px; padding-right: 25px;" class="btn btn-primary rounded-pill fw-bold ">Login</button></a>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <div class="container ">
        <div class="row">
            <div class="col-sm-12"><?= $this->session->flashdata('message'); ?></div>
        </div>
    </div>

    <!-- Home -->
    <section id="home" class="hapus-home">
        <div class="container home">
            <div class="row">
                <div class="col-sm-12 col-md-6 ">
                    <img src="<?= base_url("assets/user/"); ?>img/Saly-6.png" class="img-fluid img-about " alt="">
                </div>
                <div class="col-sm-12 col-md-6 tex-home  ">
                    <span>
                        Kenyamanan Antara
                        <br>
                        Mahasiswa Dan Dosen
                        <br>
                        Adalah Sebuah Keindahan</span>
                </div>
            </div>
        </div>
    </section>

    <!-- About -->
    <section id="about" class="about hapus-about  ">
        <div class="container ">
            <div class="row bg-about-judul about-slide  ">
                <div class="col-sm-12">
                    <h1 class="judul-about">About</h1>
                </div>
            </div>
            <div class="row ">
                <div class="col-sm-12 col-md-6 ">
                    <p class="isi-about about-isi">
                        Untuk meningkatkan kualitas pembelajaran dikampus
                        Dan mencari solusi untuk menerapkan proses pembelajaran yang lebih baik, Supaya proses
                        belajar
                        mengajar menjadi lebih efektif, baik bagi mahasiswa maupun dosen.
                        Maka dari itu perlu adanya masukan dari setiap mahasiswa untuk kami tampung dan akan
                        dijadikan
                        sebagai bahan evaluasi, baik dari segi penyampaian materi maupun dari isi materi yang
                        disampaikan
                    </p>
                </div>
                <div class="col-sm-12 col-md-6 about-isi ">
                    <img src="<?= base_url("assets/user/"); ?>img/Saly-16.png" class="img-fluid " alt="">
                </div>
            </div>
        </div>
    </section>

    <!-- Daftar Dosen -->
    <section id="daftar-dosen" class="daftar-dosen hapus-daftar-dosen">
        <div class="container">
            <div class="row bg-about-judul  ">
                <div class="col-sm-12">
                    <h1 class="judul-about">Daftar Dosen</h1>
                </div>
            </div>
            <div class="row isi-daftar-dosen">
                <?php foreach ($daftar_dosen as $df) : ?>
                    <div class="col-sm-12 col-md-6">
                        <div class="card mb-3" style="max-width: 540px;">
                            <div class="row g-0 ">
                                <div class="col-md-4 p-3 ">
                                    <img src="<?= base_url("assets/user/img/dosen/") . $df["image"]; ?>" class="img-fluid rounded-circle border border-4 " alt="<?= $df["nama"]; ?>">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <p class=" nama-dosen"><?= $df["nama"]; ?></p>
                                        <p class="card-text">
                                            <?= $df["quotes"]; ?>
                                        </p>
                                        <?php $getUser = $this->db->get_where('hasil_penilaian', ['periode' => $tahun, 'id_daftar_dosen' => $df['id_daftar_dosen'], 'id_user' => $id_user])->row_array(); ?>

                                        <?php if ($getUser) : ?>
                                            <button style="cursor:none;" class="btn btn-success"> Sudah Direview</button>
                                        <?php else : ?>
                                            <a href="<?= base_url('User/riviewDosen/') . $df["id_daftar_dosen"]; ?>" class="btn btn-primary"> Riview Sekarang</a>
                                        <?php endif; ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <a class="text-center dosen-lainnya" href="<?= base_url('User/daftarDosen'); ?>">Lainnya</a>
            </div>
        </div>
    </section>

    <!-- Contact -->
    <section id="contact" class="contact hapus-contact">
        <div class="container">
            <div class="row bg-about-judul  ">
                <div class="col-sm-12">
                    <h1 class="judul-about">Contact</h1>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-sm-12 isi-contact col-md-6 p-3 text-center ">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.5032915802053!2d107.59180451397803!3d-6.94980316996729!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e8c09b746f03%3A0x2a1ff1decaf8ba04!2sJl.%20Cibaduyut%20Lama%20No.57%2C%20Kb.%20Lega%2C%20Kec.%20Bojongloa%20Kidul%2C%20Kota%20Bandung%2C%20Jawa%20Barat%2040236!5e0!3m2!1sen!2sid!4v1612834110994!5m2!1sen!2sid" class="google-maps"></iframe>
                </div>
                <div class="col-sm-12 isi-contact col-md-6 ">
                    <div class="isi-contact">
                        <div class="row">
                            <div class="col-sm-12 col-md-2">Telepon</div>
                            <div class="col-sm-12 col-md-10">085794203570</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-2">Email</div>
                            <div class="col-sm-12 col-md-10">kikiagustin62@gmail.com</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-2">Alamat</div>
                            <div class="col-sm-12 col-md-10">
                                Jl. Cibaduyut Lama No. 57 A, Kb Lega Kec. Bojong Loa Kidul Kota. Bandung Jawa Barat 40236
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer -->
    <footer id="footer" class="text-center footer text-white p-3 hapus-footer">Copiright&copy; Kiki Agustin 2021
    </footer>

    <!-- Modal Keluar aplikasi -->
    <!-- Modal -->
    <div class="modal fade" id="keluarAplikasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Keluar Aplikasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Anda yakin mau keluar aplikasi?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <a href="<?= base_url('AuthUser/logout'); ?>" type="button" class="btn btn-primary">Keluar</a>
                </div>
            </div>
        </div>
    </div>