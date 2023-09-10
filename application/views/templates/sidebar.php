<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('') ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <img src="<?= base_url('assets/img/logo_ptgas.png') ?>" height=70px" alt="">
        </div>
        <div class="sidebar-brand-text mx-3">PT. GAS</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= $this->uri->segment(1) == '' || $this->uri->segment(1) == 'dashboard' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('dashboard') ?>">
            <i class="fa-solid fa-globe"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <?php if ($user['level'] == 'admin' || $user['level'] == 'pimpinan') : ?>
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

        <!-- Nav Item - Transaksi -->
        <?php if (is_admin()) : ?>
            <li class="nav-item <?= ($this->uri->segment(2) == 'absensi' || $this->uri->segment(2) == 'lembur' || $this->uri->segment(2) == 'gaji') ? 'active' : '' ?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fa-solid fa-receipt"></i>
                    <span>Transaksi</span>
                </a>
                <div id="collapseUtilities" class="collapse <?= ($this->uri->segment(2) == 'absensi' || $this->uri->segment(2) == 'lembur' || $this->uri->segment(2) == 'gaji') ? 'show' : '' ?>" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item <?= ($this->uri->segment(2) == 'absensi') ? 'active' : '' ?>" href="<?= site_url('transaksi/absensi') ?>">Kelola Abseni</a>
                        <a class="collapse-item <?= ($this->uri->segment(2) == 'lembur') ? 'active' : '' ?>" href="<?= site_url('transaksi/lembur') ?>">Kelola Lembur</a>
                        <a class="collapse-item <?= ($this->uri->segment(2) == 'gaji') ? 'active' : '' ?>" href="<?= site_url('transaksi/gaji') ?>">Kelola Gaji</a>
                    </div>
                </div>
            </li>
        <?php endif; ?>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item <?= ($this->uri->segment(2) == 'laporan_absen' || $this->uri->segment(2) == 'laporan_gaji') ? 'active' : '' ?>">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                <i class="fa-solid fa-print"></i>
                <span>Laporan</span>
            </a>
            <div id="collapsePages" class="collapse <?= ($this->uri->segment(2) == 'laporan_absen' || $this->uri->segment(2) == 'laporan_gaji') ? 'show' : '' ?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item <?= ($this->uri->segment(2) == 'laporan_absen') ? 'active' : '' ?>" href="<?= site_url('laporan/laporan_absen') ?>">Laporan Absen</a>
                    <a class="collapse-item <?= ($this->uri->segment(2) == 'laporan_gaji') ? 'active' : '' ?>" href="<?= site_url('laporan/laporan_gaji') ?>">Laporan Gaji</a>
                </div>
            </div>
        </li>
    <?php else : ?> <!-- Pegawai sidebar -->
        <li class="nav-item <?= $this->uri->segment(1) == '' || $this->uri->segment(1) == 'gaji' ? 'active' : '' ?>">
            <a class="nav-link" href="<?= base_url('gaji') ?>">
                <i class="fa-solid fa-dollar-sign"></i>
                <span>Data Gaji</span>
            </a>
        </li>
    <?php endif ?>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('auth/logout') ?>">
            <i class="fa-solid fa-right-from-bracket"></i>
            <span>Keluar</span>
        </a>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->