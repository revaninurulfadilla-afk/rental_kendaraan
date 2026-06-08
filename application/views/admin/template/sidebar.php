
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion"
    id="accordionSidebar">

    <!-- LOGO -->
    <a class="sidebar-brand d-flex align-items-center px-3 py-4"
   href="<?= site_url('admin/dashboard'); ?>">

    <img src="<?= base_url('assets/customer/images/logo.png') ?>"
         alt="Logo"
         style="width:60px;height:60px;object-fit:contain;">

    <div class="ml-3 text-left">

        <div style="
            font-size:16px;
            font-weight:650;
            line-height:1;
            text-align:center;
            color:#fff;">
            MRS
        </div>

        <small style="
            color:#dbe4ff;
            font-size:9px;">
            Mobil Rental Sukses
        </small>

    </div>

</a>
    <hr class="sidebar-divider my-0">

    <!-- DASHBOARD -->
    <li class="nav-item <?= ($this->uri->segment(2)=='dashboard') ? 'active' : '' ?>">
        <a class="nav-link"
           href="<?= site_url('admin/dashboard'); ?>">

            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>

        </a>
    </li>

    <hr class="sidebar-divider">

    <!-- MASTER DATA -->
    <div class="sidebar-heading">
        Master Data
    </div>

    <li class="nav-item <?= ($this->uri->segment(2)=='kendaraan') ? 'active' : '' ?>">
        <a class="nav-link"
           href="<?= site_url('admin/kendaraan'); ?>">

            <i class="fas fa-car"></i>
            <span>Data Kendaraan</span>

        </a>
    </li>

    <li class="nav-item <?= ($this->uri->segment(2)=='supir') ? 'active' : '' ?>">
        <a class="nav-link"
           href="<?= site_url('admin/supir'); ?>">

            <i class="fas fa-user-tie"></i>
            <span>Data Supir</span>

        </a>
    </li>

    <li class="nav-item <?= ($this->uri->segment(2)=='pelanggan') ? 'active' : '' ?>">
        <a class="nav-link"
           href="<?= site_url('admin/pelanggan'); ?>">

            <i class="fas fa-users"></i>
            <span>Data Pelanggan</span>

        </a>
    </li>

    <hr class="sidebar-divider">

    <!-- TRANSAKSI -->
    <div class="sidebar-heading">
        Transaksi
    </div>

    <li class="nav-item <?= ($this->uri->segment(2)=='transaksi') ? 'active' : '' ?>">
        <a class="nav-link"
           href="<?= site_url('admin/transaksi'); ?>">

            <i class="fas fa-file-invoice"></i>
            <span>Data Transaksi</span>

        </a>
    </li>

    <li class="nav-item <?= ($this->uri->segment(2)=='pembayaran') ? 'active' : '' ?>">
        <a class="nav-link"
           href="<?= site_url('admin/pembayaran'); ?>">

            <i class="fas fa-money-bill-wave"></i>
            <span>Pembayaran</span>

        </a>
    </li>

    <li class="nav-item <?= ($this->uri->segment(2)=='pengembalian') ? 'active' : '' ?>">
        <a class="nav-link"
           href="<?= site_url('admin/pengembalian'); ?>">

            <i class="fas fa-undo"></i>
            <span>Pengembalian</span>

        </a>
    </li>

    <hr class="sidebar-divider">

    <!-- LAPORAN -->
    <div class="sidebar-heading">
        Laporan
    </div>

    <li class="nav-item <?= ($this->uri->segment(2)=='laporan') ? 'active' : '' ?>">
        <a class="nav-link"
           href="<?= site_url('admin/laporan'); ?>">

            <i class="fas fa-chart-bar"></i>
            <span>Laporan Pendapatan</span>

        </a>
    </li>

    <hr class="sidebar-divider">

    <!-- AKUN -->
    <div class="sidebar-heading">
        Akun
    </div>

    <li class="nav-item">
        <a class="nav-link"
           href="<?= site_url('admin/profil'); ?>">

            <i class="fas fa-user-circle"></i>
            <span>Profil Saya</span>

        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link"
           href="<?= site_url('auth/logout'); ?>">

            <i class="fas fa-sign-out-alt"></i>
            <span>Logout</span>

        </a>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

</ul>

<div id="content-wrapper" class="d-flex flex-column">
<div id="content">