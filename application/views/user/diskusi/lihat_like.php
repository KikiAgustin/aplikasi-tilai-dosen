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
                <h5 class="card-title d-inline judul-balas ">Postingan <?= $pemosting['name']; ?> </h5>
            </div>
            <script>
                function goBack() {
                    window.history.back();
                }
            </script>
        </div>
    </div>
    <div class="card-body">

        <?php foreach ($like as $lk) : ?>

            <?php

            $penyuka = $this->db->get_where('user', ['id' => $lk['from_like']])->row_array();
            $nama = $penyuka['name'];
            $foto = $penyuka['image'];

            ?>

            <a class="text-decoration-none " href="<?= base_url('Diskusi/cekProfile/') . $penyuka['id'];  ?>">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <img width="50px" height="50px" class="img-fluid rounded-circle img-thumbnail " src="<?= base_url('assets/user/img/user/') . $foto; ?>" alt="">
                        <small class="text-muted  "><?= $nama; ?></small>
                    </div>
                </div>
            </a>
        <?php endforeach; ?>

    </div>

</div>