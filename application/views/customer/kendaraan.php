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
    
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	     <a class="navbar-brand" href="<?= base_url('customer/dashboard') ?>">
                <img src="<?= base_url('assets/customer/images/logo.png') ?>" 
                    alt="Logo Rental" 
                    height="50">
            </a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	           <li class="nav-item">
                    <a href="<?= base_url('index.php/customer/dashboard') ?>" class="nav-link">
                        Dashboard
                    </a>
                </li>

                <li class="nav-item active">
                    <a href="<?= base_url('index.php/customer/kendaraan') ?>" class="nav-link">
                        Kendaraan
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('index.php/customer/penyewaan') ?>" class="nav-link">
                        Penyewaan Saya
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('index.php/customer/pembayaran') ?>" class="nav-link">
                        Pembayaran
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('index.php/auth/logout') ?>" class="nav-link">
                        Logout
                    </a>
                </li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
    
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('<?= base_url('assets/customer/images/bg_3.jpg') ?>');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs"><span class="mr-2"><a href="<?= base_url('customer/dashboard') ?>">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Mobil<i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-3 bread">Daftar Kendaraan</h1>
          </div>
        </div>
      </div>
    </section>
		

		<section class="ftco-section bg-light">
    	<div class="container">
    		<div class="row">
    			<?php foreach($kendaraan as $k){ ?>

                    <div class="col-md-4">
                        <div class="car-wrap rounded ftco-animate">

                            <div class="img rounded d-flex align-items-end"
                                 style="background-image: url('<?= base_url('assets/customer/images/'.$k->gambar) ?>');">
                            </div>

                            <div class="text">

                                <h2 class="mb-0">
                                    <a href="#">
                                        <?= $k->merk ?>
                                    </a>
                                </h2>

                                <div class="d-flex mb-3">

                                    <span class="cat">
                                        <?= $k->status_ketersediaan ?>
                                    </span>

                                    <p class="price ml-auto">
                                        Rp<?= number_format($k->harga_sewa,0,',','.') ?>
                                        <span>/hari</span>
                                    </p>

                                </div>

                                <p class="d-flex mb-0 d-block">

                                    <a href="<?= base_url('customer/penyewaan/sewa/'.$k->id_kendaraan) ?>"
                                    class="btn btn-primary py-2 mr-1">
                                        Sewa
                                    </a>

                                    <a href="<?= base_url('customer/kendaraan/detail/'.$k->id_kendaraan) ?>"
                                    class="btn btn-secondary py-2 ml-1">
                                        Detail
                                    </a>

                                </p>

                            </div>

                        </div>
                    </div>

                    <?php } ?>
    		</div>
    		<div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
              <ul>
                <li><a href="#">&lt;</a></li>
                <li class="active"><span>1</span></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&gt;</a></li>
              </ul>
            </div>
          </div>
        </div>
    	</div>
    </section>
    

    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2"><a href="#" class="logo">Car<span>book</span></a></h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Information</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">About</a></li>
                <li><a href="#" class="py-2 d-block">Services</a></li>
                <li><a href="#" class="py-2 d-block">Term and Conditions</a></li>
                <li><a href="#" class="py-2 d-block">Best Price Guarantee</a></li>
                <li><a href="#" class="py-2 d-block">Privacy &amp; Cookies Policy</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Customer Support</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">FAQ</a></li>
                <li><a href="#" class="py-2 d-block">Payment Option</a></li>
                <li><a href="#" class="py-2 d-block">Booking Tips</a></li>
                <li><a href="#" class="py-2 d-block">How it works</a></li>
                <li><a href="#" class="py-2 d-block">Contact Us</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
    
  

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