<div class="container-fluid">

    <?= $this->session->flashdata('message'); ?>

    <!-- 404 Error Text -->
    <div class="text-center mt-5">
        <div class="error mx-auto" data-text="404">404</div>
        <p class="lead text-gray-800 mb-5">Page Not Found</p>
        <a href="<?= base_url('User/home'); ?>">&larr; Kembali Ke Home</a>
    </div>


</div>
<!-- /.container-fluid -->