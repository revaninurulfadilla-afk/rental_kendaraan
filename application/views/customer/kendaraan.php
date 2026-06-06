<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Carbook - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url('assets/customer/css/open-iconic-bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/customer/css/animate.css') ?>">
    
    <link rel="stylesheet" href="<?= base_url('assets/customer/css/owl.carousel.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/customer/css/owl.theme.default.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/customer/css/magnific-popup.css') ?>">

    <link rel="stylesheet" href="<?= base_url('assets/customer/css/aos.css') ?>">

    <link rel="stylesheet" href="<?= base_url('assets/customer/css/ionicons.min.css') ?>">

    <link rel="stylesheet" href="<?= base_url('assets/customer/css/bootstrap-datepicker.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/customer/css/jquery.timepicker.css') ?>">

    
    <link rel="stylesheet" href="<?= base_url('assets/customer/css/flaticon.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/customer/css/icomoon.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/customer/css/style.css') ?>">
  </head>
  <body>
    
    <!-- HERO -->
<section class="hero-wrap hero-wrap-2"
         style="background-image:url('<?= base_url('assets/customer/images/bg_3.jpg') ?>');"
         data-stellar-background-ratio="0.5">

    <div class="overlay"></div>

    <div class="container">

        <div class="row no-gutters slider-text align-items-end justify-content-start">

            <div class="col-md-9 ftco-animate pb-5">

                <p class="breadcrumbs">

                    <span class="mr-2">

                        <a href="<?= site_url('customer/dashboard'); ?>">
                            Home
                            <i class="ion-ios-arrow-forward"></i>
                        </a>

                    </span>

                    <span>
                        Kendaraan
                        <i class="ion-ios-arrow-forward"></i>
                    </span>

                </p>

                <h1 class="mb-3 bread">
                    Daftar Kendaraan
                </h1>

            </div>

        </div>

    </div>

</section>

<!-- DAFTAR KENDARAAN -->
<section class="ftco-section bg-light">

<!-- FILTER -->
<form method="get" action="<?= base_url('index.php/customer/kendaraan') ?>">
    <div class="row mb-5">

        <div class="col-md-4">
            <input type="text"
       name="keyword"
       class="form-control"
       placeholder="Cari kendaraan..."
       value="<?= $this->input->get('keyword') ?>">
        </div>

        <div class="col-md-3">
            <select name="jenis" class="form-control">
    <option value="">Semua Jenis</option>
    <option value="Sedan" <?= ($this->input->get('jenis')=='Sedan')?'selected':'' ?>>Sedan</option>
    <option value="MPV" <?= ($this->input->get('jenis')=='MPV')?'selected':'' ?>>MPV</option>
    <option value="SUV" <?= ($this->input->get('jenis')=='SUV')?'selected':'' ?>>SUV</option>
    <option value="Minibus" <?= ($this->input->get('jenis')=='Minibus')?'selected':'' ?>>Minibus</option>
</select>
        </div>

        <div class="col-md-3">
            <select name="kelas" class="form-control">
                <option value="">Semua Kelas</option>
                <option value="Ekonomi">Ekonomi</option>
                <option value="Menengah">Menengah</option>
                <option value="Premium">Premium</option>
            </select>
        </div>

        <div class="col-md-2">
            <button type="submit" class="btn btn-primary btn-block">
                Cari
            </button>
        </div>

    </div>
</form>

    <div class="container">

        <div class="row">

            <?php if(!empty($kendaraan)): ?>

                <?php foreach($kendaraan as $k): ?>

                <div class="col-md-4">

                    <div class="car-wrap rounded ftco-animate">

                        <div class="img rounded d-flex align-items-end"
                             style="background-image:url('<?= base_url('assets/customer/images/'.$k->foto); ?>');">
                        </div>

                        <div class="text">

                            <h2 class="mb-0">

                                <a href="#">
                                    <?= $k->merk; ?>
                                </a>

                            </h2>

                            <div class="d-flex mb-3">

                          <span class="cat">
                              <?= ucfirst($k->status) ?>
                          </span>

                                <p class="price ml-auto">
                                    Rp<?= number_format($k->tarif_hari,0,',','.') ?>
                                    <span>/hari</span>
                                </p>

                            </div>

                            <ul class="list-unstyled small">

                                <li>Per Jam :
                                    Rp<?= number_format($k->tarif_jam,0,',','.') ?>
                                </li>

                                <li>Per Minggu :
                                    Rp<?= number_format($k->tarif_minggu,0,',','.') ?>
                                </li>

                                <li>Per Bulan :
                                    Rp<?= number_format($k->tarif_bulan,0,',','.') ?>
                                </li>

                            </ul>

                            <p class="d-flex mb-0 d-block">

                                <?php if($k->status == 'tersedia'): ?>

                                    <a href="<?= site_url('customer/penyewaan/sewa/'.$k->id); ?>"
                                       class="btn btn-primary py-2 mr-1">

                                        Sewa

                                    </a>

                                <?php else: ?>

                                    <button class="btn btn-secondary py-2 mr-1"
                                            disabled>

                                        Sudah Disewa

                                    </button>

                                <?php endif; ?>

                                <a href="<?= site_url('customer/kendaraan/detail/'.$k->id); ?>"
                                   class="btn btn-secondary py-2 ml-1">

                                    Detail

                                </a>

                            </p>

                        </div>

                    </div>

                </div>

                <?php endforeach; ?>

            <?php else: ?>

                <div class="col-md-12">

                    <div class="alert alert-warning text-center">

                        Belum ada data kendaraan.

                    </div>

                </div>

            <?php endif; ?>

        </div>

    </div>

</section>
  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="<?= base_url('assets/customer/js/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/customer/js/jquery-migrate-3.0.1.min.js') ?>"></script>
<script src="<?= base_url('assets/customer/js/popper.min.js') ?>"></script>
<script src="<?= base_url('assets/customer/js/bootstrap.min.js') ?>"></script>
<script src="<?= base_url('assets/customer/js/jquery.easing.1.3.js') ?>"></script>
<script src="<?= base_url('assets/customer/js/jquery.waypoints.min.js') ?>"></script>
<script src="<?= base_url('assets/customer/js/jquery.stellar.min.js') ?>"></script>
<script src="<?= base_url('assets/customer/js/owl.carousel.min.js') ?>"></script>
<script src="<?= base_url('assets/customer/js/jquery.magnific-popup.min.js') ?>"></script>
<script src="<?= base_url('assets/customer/js/aos.js') ?>"></script>
<script src="<?= base_url('assets/customer/js/jquery.animateNumber.min.js') ?>"></script>
<script src="<?= base_url('assets/customer/js/bootstrap-datepicker.js') ?>"></script>
<script src="<?= base_url('assets/customer/js/jquery.timepicker.min.js') ?>"></script>
<script src="<?= base_url('assets/customer/js/scrollax.min.js') ?>"></script>
<script src="<?= base_url('assets/customer/js/google-map.js') ?>"></script>
<script src="<?= base_url('assets/customer/js/main.js') ?>"></script>
    
  </body>
</html>