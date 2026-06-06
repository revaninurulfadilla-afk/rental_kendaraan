<section class="hero-wrap hero-wrap-2"
         style="background-image:url('<?= base_url('assets/customer/images/bg_1.jpg') ?>');
                height:350px;">

    <div class="overlay"></div>

    <div class="container">

        <div class="row no-gutters slider-text align-items-center justify-content-center"
             style="height:350px;">

            <div class="col-md-9 text-center">

                <p class="breadcrumbs mb-2">

                    <span class="mr-2">
                        <a href="<?= site_url('customer/dashboard'); ?>">
                            Home
                        </a>
                    </span>

                    <span>
                        Profil Saya
                    </span>

                </p>

                <h1 class="bread text-white font-weight-bold">
                    Profil Saya
                </h1>

            </div>

        </div>

    </div>

</section>

<!-- PROFIL -->
<!-- PROFIL -->
<section class="ftco-section bg-light">

    <div class="container">

        <div class="row">

            <!-- KIRI -->
            <div class="col-md-4">

                <div class="bg-white p-4 shadow rounded text-center">

                    <img src="https://ui-avatars.com/api/?name=<?= urlencode($this->session->userdata('nama')); ?>&background=01d28e&color=fff&size=200"
                         class="rounded-circle mb-3"
                         width="150">

                    <h4>
                        <?= $this->session->userdata('nama'); ?>
                    </h4>

                    <span class="badge badge-success">
                        Customer
                    </span>

                </div>

            </div>

            <!-- KANAN -->
            <div class="col-md-8">

                <div class="bg-white p-4 shadow rounded">

                    <h3 class="mb-4">
                        Informasi Akun
                    </h3>

                    <table class="table">

                        <tr>
                            <th width="30%">Nama</th>
                            <td><?= $this->session->userdata('nama'); ?></td>
                        </tr>

                        <tr>
                            <th>Email</th>
                            <td><?= $this->session->userdata('email'); ?></td>
                        </tr>

                        <tr>
                            <th>Role</th>
                            <td>Customer</td>
                        </tr>

                        <tr>
                            <th>Status</th>
                            <td>

                                <?php if($this->session->userdata('is_pelanggan_lama') == 1): ?>

                                    <span class="badge badge-warning">
                                        Pelanggan Lama
                                    </span>

                                <?php else: ?>

                                    <span class="badge badge-primary">
                                        Pelanggan Baru
                                    </span>

                                <?php endif; ?>

                            </td>
                        </tr>

                    </table>

                    <a href="#"
                       class="btn btn-primary">

                        Edit Profil

                    </a>

                    <a href="<?= site_url('auth/logout'); ?>"
                       class="btn btn-danger">

                        Logout

                    </a>

                </div>

            </div>

        </div>

    </div>

</section>