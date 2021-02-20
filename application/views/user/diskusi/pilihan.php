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
                <h5 class="card-title d-inline judul-balas ">Pilihan </h5>
            </div>
            <script>
                function goBack() {
                    window.history.back();
                }
            </script>
        </div>
    </div>
    <div class="card-body">
        <a href="<?= base_url('Diskusi/editDiskusi/') . $pilihan['id_diskusi']; ?>" class="text-decoration-none" href="">Edit</a>
        <br>
        <a onclick="return confirm('Anda yakin mau menghapus postingan ini?')" href="<?= base_url('Diskusi/hapusDiskusi/') . $pilihan['id_diskusi']; ?>" class="text-decoration-none" href="">Hapus</a>
    </div>

</div>