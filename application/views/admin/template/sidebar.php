<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion"
    id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center"
       href="<?= site_url('admin/dashboard'); ?>">

        <div class="sidebar-brand-icon">
            <i class="fas fa-car"></i>
        </div>

        <div class="sidebar-brand-text mx-3">
            Rental Kendaraan
        </div>

    </a>

    <hr class="sidebar-divider">

    <li class="nav-item">

        <a class="nav-link"
           href="<?= site_url('admin/dashboard'); ?>">

            <i class="fas fa-fw fa-tachometer-alt"></i>

            <span>Dashboard</span>

        </a>

    </li>

    <li class="nav-item">

        <a class="nav-link"
           href="<?= site_url('admin/kendaraan'); ?>">

            <i class="fas fa-car"></i>

            <span>Data Kendaraan</span>

        </a>

    </li>

    <li class="nav-item">

        <a class="nav-link"
           href="<?= site_url('admin/supir') ?>">

            <i class="fas fa-user-tie"></i>

            <span>Data Supir</span>

        </a>

    </li>

    <li class="nav-item">

        <a class="nav-link"
           href="<?= site_url('admin/pelanggan') ?>" class="nav-link">

            <i class="fas fa-users"></i>

            <span>Data Pelanggan</span>

        </a>

    </li>

    <li class="nav-item">

        <a class="nav-link"
           href="<?= site_url('admin/transaksi') ?>" class="nav-link">

            <i class="nav-icon fas fa-file-invoice"></i>

            <span>Data Transaksi</span>

        </a>

    </li>

    <li class="nav-item">

    <a class="nav-link"
       href="<?= site_url('admin/pengembalian') ?>"
       class="nav-link">

        <i class="nav-icon fas fa-undo"></i>

        <span>Pengembalian</span>

    </a>

</li>

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

</ul>

<div id="content-wrapper" class="d-flex flex-column">

<div id="content">