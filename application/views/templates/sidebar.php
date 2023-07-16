<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('') ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">PT. GAS</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <?php
    $currentURL = $_SERVER['REQUEST_URI'];
    ?>
    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= $this->uri->segment(1) == '' || $this->uri->segment(1) == 'dashboard' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('dashboard') ?>">
            <i class="fa-solid fa-globe"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item <?= ($this->uri->segment(1) == 'pengguna' || $this->uri->segment(1) == 'divisi' || $this->uri->segment(1) == 'jabatan' || $this->uri->segment(1) == 'pegawai' || $this->uri->segment(1) == 'potongan' || $this->uri->segment(1) == 'pinjaman') ? 'active' : '' ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fa-solid fa-database"></i>
            <span>Master Data</span>
        </a>
        <div id="collapseTwo" class="collapse <?= ($this->uri->segment(1) == 'pengguna' || $this->uri->segment(1) == 'divisi' || $this->uri->segment(1) == 'pegawai' || $this->uri->segment(1) == 'potongan' || $this->uri->segment(1) == 'jabatan' || $this->uri->segment(1) == 'pinjaman') ? 'show' : '' ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <?php if (is_admin()) : ?>
                    <a class="collapse-item <?= $this->uri->segment(1) == 'pengguna' ? 'active' : '' ?>" href="<?= site_url('pengguna') ?>">Data Pengguna</a>
                <?php endif; ?>
                <a class="collapse-item <?= ($this->uri->segment(1) == 'divisi') ? 'active' : '' ?>" href="<?= site_url('divisi') ?>">Data Divisi</a>
                <a class="collapse-item <?= ($this->uri->segment(1) == 'jabatan') ? 'active' : '' ?>" href="<?= site_url('jabatan') ?>">Data Jabatan</a>
                <a class="collapse-item <?= ($this->uri->segment(1) == 'pegawai') ? 'active' : '' ?>" href="<?= site_url('pegawai') ?>">Data Pegawai</a>
                <a class="collapse-item <?= ($this->uri->segment(1) == 'potongan') ? 'active' : '' ?>" href="<?= site_url('potongan') ?>">Potongan Gaji</a>
                <a class="collapse-item <?= ($this->uri->segment(1) == 'pinjaman') ? 'active' : '' ?>" href="<?= site_url('pinjaman') ?>">Pinjaman</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <?php if (is_admin()) : ?>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fa-solid fa-receipt"></i>
                <span>Transaksi</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="<?= site_url('') ?>">Kelola Absen</a>
                    <a class="collapse-item" href="<?= site_url('') ?>">Kelola Lembur</a>
                    <a class="collapse-item" href="<?= site_url('') ?>">Kelola Gaji</a>
                </div>
            </div>
        </li>
    <?php endif; ?>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <!-- <div class="sidebar-heading">
        Addons
    </div> -->

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
            <i class="fa-solid fa-print"></i>
            <span>Laporan</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= site_url('') ?>">Laporan Absen</a>
                <a class="collapse-item" href="<?= site_url('') ?>">Laporan Gaji</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('auth/logout') ?>">
            <i class="fa-solid fa-right-from-bracket"></i>
            <span>Logout</span>
        </a>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->