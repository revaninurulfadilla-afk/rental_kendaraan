<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
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
    
	  
    <div class="hero-wrap ftco-degree-bg" style="background-image: url('<?= base_url('assets/customer/images/bg_1.jpg') ?>');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
          <div class="col-lg-8 ftco-animate">
          	<div class="text w-100 text-center mb-md-5 pb-md-5">
	            <h1 class="mb-4">Solusi Rental Kendaraan yang Mudah dan Terpercaya</h1>
	            <p style="font-size: 18px;">Temukan berbagai pilihan kendaraan berkualitas dengan proses pemesanan yang cepat, mudah, dan aman untuk kebutuhan perjalanan Anda.</p>
              
	            </a>
              <a href="#kendaraan" class="btn btn-primary py-3 px-4">
    Get Started
</a>
            </div>
          </div>
        </div>
      </div>
    </div>


    <section id="kendaraan" class="ftco-section ftco-no-pt bg-light">
    	<div class="container">
    		<div class="row justify-content-center">
          <div class="col-md-12 heading-section text-center ftco-animate mb-5">
          	<span class="subheading">ARMADA KAMI</span>
<h2 class="mb-2">Daftar Kendaraan Rental</h2>
          </div>
        </div>
    		<div class="row">
    			<div class="col-md-12">
    				<div class="carousel-car owl-carousel">
    					<?php foreach($kendaraan as $k){ ?>

              <div class="item">
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

              <?php } ?>

    					
    				</div>
    			</div>
    		</div>
    	</div>
    </section>

    <section id="tentang-kami" class="ftco-section ftco-about">
			<div class="container">
				<div class="row no-gutters">
					<!-- FIX: tambahkan url() wrapper pada background-image -->
					<div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center"
     					style="background-image: url('<?= base_url('assets/customer/images/about1.jpg') ?>');">
					</div>
					<div class="col-md-6 wrap-about ftco-animate">
	          <div class="heading-section heading-section-white pl-md-5">
	          	<span class="subheading">Tentang Kami</span>
	            <h2 class="mb-4">Selamat Datang di Mobil Rental Sukses</h2>
	            <p style="text-align: justify;">Kami adalah penyedia jasa rental kendaraan yang berkomitmen memberikan layanan transportasi yang aman, nyaman, dan terpercaya bagi setiap pelanggan.</p>
	            <p style="text-align: justify;">Dengan proses pemesanan yang mudah, harga yang kompetitif, serta pelayanan yang profesional, kami berupaya memberikan pengalaman terbaik dalam setiap perjalanan.</p>
              <p style="text-align: justify;">Kepuasan pelanggan adalah prioritas utama kami. Percayakan kebutuhan transportasi Anda kepada MRS Rental Kendaraan dan nikmati perjalanan yang lebih nyaman dan menyenangkan.</p>
	            <p><a href="<?= site_url('customer/kendaraan') ?>" class="btn btn-primary py-3 px-4">Lihat Kendaraan</a></p>
	          </div>
					</div>
				</div>
			</div>
		</section>

		<section id="layanan" class="ftco-section">
			<div class="container">
				<div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center heading-section ftco-animate">
          	<span class="subheading">Layanan</span>
            <h2 class="mb-3">Layanan Kami</h2>
          </div>
        </div>
				<div class="row">
					<div class="col-md-3">
						<div class="services services-2 w-100 text-center">
            	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-wedding-car"></span></div>
            	<div class="text w-100">
                <h3 class="heading mb-2">Penyewaan Kendaraan</h3>
                <p>Menyediakan berbagai jenis kendaraan seperti Sedan, MPV, Mobil Box, Bak Terbuka, dan Minibus dengan pilihan sewa per jam, harian, mingguan, hingga bulanan.</p>
              </div>
            </div>
					</div>
					<div class="col-md-3">
						<div class="services services-2 w-100 text-center">
            	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-transportation"></span></div>
            	<div class="text w-100">
                <h3 class="heading mb-2">Pemesanan Online</h3>
                <p>Lakukan pemesanan kendaraan kapan saja melalui sistem tanpa harus datang langsung ke lokasi rental.</p>
              </div>
            </div>
					</div>
					<div class="col-md-3">
						<div class="services services-2 w-100 text-center">
            	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-car"></span></div>
            	<div class="text w-100">
                <h3 class="heading mb-2">Antar & Jemput Kendaraan</h3>
                <p>Layanan pengantaran dan penjemputan kendaraan sesuai lokasi pelanggan untuk memberikan kemudahan dalam proses penyewaan.</p>
              </div>
            </div>
					</div>
					<div class="col-md-3">
						<div class="services services-2 w-100 text-center">
            	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-transportation"></span></div>
            	<div class="text w-100">
                <h3 class="heading mb-2">Pilihan Supir</h3>
                <p>Pelanggan dapat menggunakan layanan sopir berpengalaman untuk perjalanan yang lebih aman, nyaman, dan efisien.</p>
              </div>
            </div>
					</div>
				</div>
			</div>
		</section>

		<section class="ftco-section ftco-intro"
    	style="background-image: url('<?= base_url('assets/customer/images/bg_3.jpg') ?>');">
			<div class="overlay"></div>
			<div class="container">
				<div class="row justify-content-end">
					<div class="col-md-6 heading-section heading-section-white ftco-animate">
            <h2 class="mb-3">Temukan Kendaraan Terbaik Sesuai Kebutuhan Anda</h2>
            <a href="<?= site_url('customer/kendaraan') ?>" class="btn btn-primary btn-lg">Lihat Kendaraan</a>
          </div>
				</div>
			</div>
		</section>


    <section id="testimoni" class="ftco-section testimony-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center heading-section ftco-animate">
          	<span class="subheading">Testimoni Pelanggan</span>
            <h2 class="mb-3">Apa Kata Pelanggan Kami?</h2>
          </div>
        </div>
        <div class="row ftco-animate">
          <div class="col-md-12">
            <div class="carousel-testimony owl-carousel ftco-owl">
              <div class="item">
                <div class="testimony-wrap rounded text-center py-4 pb-5"
                  style="min-height: 350px;">
                  <div class="user-img mb-2"
                      style="background-image: url('<?= base_url('assets/customer/images/person_1.jpg') ?>');">
                  </div>
                  <div class="text pt-4">
                    <p class="mb-4">Pelayanan sangat memuaskan dan proses pemesanan kendaraan sangat mudah. Kendaraan yang saya sewa dalam kondisi bersih, nyaman, dan sesuai dengan yang ditawarkan.</p>
                    <p class="name">Budi</p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap rounded text-center py-4 pb-5"
                  style="min-height: 350px;">
                  <div class="user-img mb-2"
                      style="background-image: url('<?= base_url('assets/customer/images/person_2.jpg') ?>');">
                  </div>
                  <div class="text pt-4">
                    <p class="mb-4">Saya sangat terbantu dengan layanan antar kendaraan ke lokasi. Sopir yang disediakan juga ramah dan profesional. Sangat direkomendasikan untuk perjalanan bisnis maupun keluarga.</p>
                    <p class="name">Rahmat</p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap rounded text-center py-4 pb-5"
                  style="min-height: 350px;">
                  <div class="user-img mb-2"
                      style="background-image: url('<?= base_url('assets/customer/images/person_3.jpg') ?>');">
                  </div>
                  <div class="text pt-4">
                    <p class="mb-4">Harga sewa yang ditawarkan cukup terjangkau dengan banyak pilihan kendaraan. Proses pembayaran mudah dan konfirmasi penyewaan sangat cepat.</p>
                    <p class="name">Hilmy</p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap rounded text-center py-4 pb-5"
                  style="min-height: 350px;">
                  <div class="user-img mb-2"
                      style="background-image: url('<?= base_url('assets/customer/images/person_4.jpg') ?>');">
                  </div>
                  <div class="text pt-4">
                    <p class="mb-4">Kendaraan di rental ini terawat dan nyaman digunakan untuk perjalanan luar kota. Saya puas dengan pelayanan yang diberikan oleh MRS.</p>
                    <p class="name">Fadlan</p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap rounded text-center py-4 pb-5"
                  style="min-height: 350px;">
                  <div class="user-img mb-2"
                      style="background-image: url('<?= base_url('assets/customer/images/person_5.jpg') ?>');">
                  </div>
                  <div class="text pt-4">
                    <p class="mb-4">Proses penyewaan sangat mudah karena semuanya dapat dilakukan secara online. Tidak perlu repot datang ke kantor rental, dan konfirmasi pemesanan juga sangat cepat.</p>
                    <p class="name">Sandi</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
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