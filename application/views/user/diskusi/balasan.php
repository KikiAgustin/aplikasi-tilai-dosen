<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <?= $this->session->userdata('message'); ?>
        </div>
    </div>
</div>

<div class="card mb-2">
    <div class="card-header">
        <div class="row">
            <div class="col-sm-12  ">
                <div class="d-inline" onclick="goBack()" class="img-fluid ml-2" href=""><img src="<?= base_url('assets/user/img/arrow.png'); ?>" alt=""></div> &nbsp;
                <h5 class="card-title d-inline judul-balas ">Balasan <?= $pemosting['name']; ?> </h5>
            </div>
            <script>
                function goBack() {
                    window.history.back();
                }
            </script>
        </div>
    </div>
    <div style="margin-bottom: 120px;" class="card-body">
        <?php if ($balasan) : ?>

            <?php foreach ($balasan as $bl) : ?>

                <?php

                $id_user = $bl['id_user'];
                $userBalas = $this->db->get_where('user', ['id' => $id_user])->row_array();

                $id_diskusi = $bl['id_diskusi'];
                $id_balasan = $bl['id_balasan'];

                $cekBalasan = $this->db->get_where('balasan_postingan', ['id_diskusi' => $id_diskusi, 'id_balasan' => $id_balasan])->num_rows();
                $editBalasan = $this->db->get_where('balasan', ['id_balasan' => $id_balasan, 'id_user' => $user['id']])->row_array();

                ?>
                <div class="row">
                    <div class="col-sm-12">
                        <img width="50px" height="50px" class="img-fluid rounded-circle img-thumbnail " src="<?= base_url('assets/user/img/user/') . $userBalas['image']; ?>" alt="">
                        <small class="text-muted  "><?= $userBalas['name']; ?>&nbsp; Pada <?= date('h:i d F Y', $bl['tanggal']); ?></small>
                    </div>
                    <div class="col-sm-12 mb-2">
                        <p class="card-text"><?= $bl['balasan']; ?></p>
                        <?php if ($cekBalasan) : ?>
                            <a class=" text-decoration-none " href="<?= base_url('Diskusi/balasanPostingan/') . $id_diskusi . '/' . $id_balasan; ?>"><?= $cekBalasan; ?> balasan</a>
                            <hr>
                        <?php endif; ?>
                        <a href="<?= base_url('Diskusi/balasanPostingan/') . $id_diskusi . '/' . $id_balasan; ?>" class=" text-decoration-none ">
                            <i style="color: black;" class="bi bi-reply-all-fill"></i>
                            Balas
                        </a>
                        <?php if ($editBalasan) : ?>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="<?= base_url('Diskusi/editBalasan/') . $id_balasan . '/' . $id_diskusi; ?>" class=" text-decoration-none ">
                                <i style="color: black;" class="bi bi-pencil-square"></i>
                                Edit
                            </a>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a onclick="return confirm('Apakah anda yakin ingin menghapus balasan ini?')" href="<?= base_url('Diskusi/hapusBalasan/') . $id_balasan . '/' . $id_diskusi; ?>" class=" text-decoration-none ">
                                <i style="color: black;" class="bi bi-trash-fill"></i>
                                Hapus
                            </a>
                        <?php endif; ?>



                    </div>
                    <hr>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p class="text-center  ">Belum Ada komentar untuk diskusi ini</p>
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