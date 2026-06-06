<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle -->
    <button id="sidebarToggleTop"
            class="btn btn-link d-md-none rounded-circle mr-3">

        <i class="fa fa-bars"></i>

    </button>

    <ul class="navbar-nav ml-auto">

        <li class="nav-item dropdown no-arrow">

    <a class="nav-link dropdown-toggle"
       href="#"
       id="userDropdown"
       role="button"
       data-toggle="dropdown">

        <span class="mr-2 d-none d-lg-inline text-gray-600 small">

            <?= $this->session->userdata('nama'); ?>

        </span>

        <img class="img-profile rounded-circle"
             src="https://ui-avatars.com/api/?name=<?= urlencode($this->session->userdata('nama')); ?>&background=4e73df&color=fff"
             width="35">

    </a>

    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in">

        <a class="dropdown-item"
           href="<?= site_url('admin/profil'); ?>">

            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>

            Profil Saya

        </a>

        <a class="dropdown-item"
           href="<?= site_url('admin/profil/password'); ?>">

            <i class="fas fa-key fa-sm fa-fw mr-2 text-gray-400"></i>

            Ubah Password

        </a>

        <div class="dropdown-divider"></div>

        <a class="dropdown-item text-danger"
           href="<?= site_url('auth/logout'); ?>">

            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>

            Logout

        </a>

    </div>

</li>

    </ul>

</nav>