<!-- Sidebar -->
<ul style="background-color: #7b86ed;" class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('Admin'); ?>">
        <img src="<?= base_url('assets/user/img/logo.png'); ?>" alt="">
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('Admin'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('Admin/dataAdmin'); ?>">
            <i class="fas fa-users-cog"></i>
            <span>Admin</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Seputar Aplikasi
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('Admin/informasi'); ?>">
            <i class="fas fa-fw fa-info"></i>
            <span>Informasi</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('Admin/periode'); ?>">
            <i class="fas fa-fw fa-indent"></i>
            <span>Periode</span></a>
    </li>
    <li class="nav-item">

        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-user-tie"></i>
            <span>Dosen</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <!-- <h6 class="collapse-header">Su:</h6> -->
                <a class="collapse-item" href="<?= base_url('Admin/daftarDosen'); ?>">Daftar Dosen</a>
                <a class="collapse-item" href="<?= base_url('HasilPenilaian'); ?>">Hasil Penilaian</a>
            </div>
        </div>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('Admin/user'); ?>">
            <i class="fas fa-fw fa-user"></i>
            <span>Daftar User</span></a>
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