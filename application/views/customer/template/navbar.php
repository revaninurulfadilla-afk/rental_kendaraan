<style>
#ftco-navbar{
    background:#ffffff !important;
}

#ftco-navbar .nav-link{
    color:#222 !important;
    font-weight:600;
}

#ftco-navbar .nav-link:hover{
    color:#01d28e !important;
}

#ftco-navbar .active .nav-link{
    color:#01d28e !important;
}
</style>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light"
     id="ftco-navbar">

    <div class="container">

        <a class="navbar-brand"
           href="<?= site_url('customer/dashboard'); ?>">

            <img src="<?= base_url('assets/customer/images/logo.png') ?>" 
                    alt="Logo Rental" 
                    height="50">

        </a>

        <button class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#ftco-nav"
                aria-controls="ftco-nav"
                aria-expanded="false">

            <span class="oi oi-menu"></span>
            Menu

        </button>

        <div class="collapse navbar-collapse"
             id="ftco-nav">

            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a href="<?= site_url('customer/dashboard'); ?>"
                       class="nav-link">
                        Dashboard
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= site_url('customer/kendaraan'); ?>"
                       class="nav-link">
                        Kendaraan
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= site_url('customer/penyewaan'); ?>"
                       class="nav-link">
                        Penyewaan
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= site_url('customer/pembayaran'); ?>"
                       class="nav-link">
                        Pembayaran
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= site_url('customer/pengembalian'); ?>"
                       class="nav-link">
                        Pengembalian
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= site_url('customer/riwayat'); ?>"
                       class="nav-link">
                        Riwayat Sewa
                    </a>
                </li>

                <?php
                $pelanggan_lama =
                    $this->session->userdata('is_pelanggan_lama');
                ?>

                <?php if($pelanggan_lama == 1): ?>
                <li class="nav-item">
                    <span class="nav-link text-warning">
                        ★ Pelanggan Lama
                    </span>
                </li>
                <?php endif; ?>

    <li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle"
     href="#"
     id="customerDropdown"
     role="button"
     data-toggle="dropdown"
     aria-haspopup="true"
     aria-expanded="false">
    <i class="fa fa-user-circle"></i>
    <?= $this->session->userdata('nama'); ?>
  </a>
  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="customerDropdown">
    <a class="dropdown-item" href="<?= site_url('customer/profil'); ?>">Profil Saya</a>
    <a class="dropdown-item" href="<?= site_url('customer/riwayat'); ?>">Riwayat Penyewaan</a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item text-danger" href="<?= site_url('auth/logout'); ?>">Logout</a>
  </div>
</li>

            </ul>

        </div>

    </div>

</nav>