<!-- Sidebar -->
<ul style="background-color: #7b86ed;" class="navbar-nav sidebar sidebar-dark accordion px-2 " id="accordionSidebar">


    <img src="<?= base_url('assets/user/img/dosen/') . $dosen['image']; ?>" width="130px" height="130px" class="img-fluid rounded-circle mx-auto my-3 border border-light  " alt="">

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('Dosen'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('Dosen/periode'); ?>">
            <i class="fas fa-fw fa-indent"></i>
            <span>Penilaian Tiap Periode</span></a>
    </li>


    <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('Dosen/lihatNilai'); ?>">
            <i class="fas fa-fw fa-poll-h"></i>
            <span>Lihat Nilai Keseluruhan</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('Dosen/lihatSaran'); ?>">
            <i class="fas fa-fw fa-user-plus"></i>
            <span>Lihat Saran Keseluruhan</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <li class="nav-item active">
        <a class="nav-link" href="" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->