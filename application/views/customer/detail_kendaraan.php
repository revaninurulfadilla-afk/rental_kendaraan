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
       
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('<?= base_url('assets/customer/images/bg_3.jpg') ?>');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Car details <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-3 bread">Car Details</h1>
          </div>
        </div>
      </div>
    </section>
		

		<section class="ftco-section ftco-car-details">
      <div class="container">
      	<div class="row justify-content-center">
      		<div class="col-md-12">
    <div class="row">

    <!-- FOTO -->
    <div class="col-md-6">

        <img src="<?= base_url('assets/customer/images/'.$kendaraan->foto) ?>"
             class="img-fluid rounded shadow"
             style="width:100%;">

    </div>

    <!-- INFO -->
    <div class="col-md-6">

        <span class="text-success font-weight-bold">
            <?= strtoupper($kendaraan->jenis) ?>
        </span>

        <h2 class="mb-3">
            <?= $kendaraan->merk ?> - <?= $kendaraan->nama_kendaraan ?>
        </h2>

        <h3 class="text-primary mb-4">
            Rp<?= number_format($kendaraan->tarif_hari,0,',','.') ?>
            <small>/hari</small>
        </h3>
<div class="vehicle-info">

    <div class="d-flex justify-content-between border-bottom py-3">
        <strong>Kode Kendaraan</strong>
        <span><?= $kendaraan->kode_kendaraan ?></span>
    </div>

    <div class="d-flex justify-content-between border-bottom py-3">
        <strong>Kelas</strong>
        <span><?= $kendaraan->kelas ?></span>
    </div>

    <div class="d-flex justify-content-between border-bottom py-3">
        <strong>Tahun</strong>
        <span><?= $kendaraan->tahun ?></span>
    </div>

    <div class="d-flex justify-content-between border-bottom py-3">
        <strong>No Polisi</strong>
        <span><?= $kendaraan->no_polisi ?></span>
    </div>

    <div class="d-flex justify-content-between border-bottom py-3">
        <strong>Warna</strong>
        <span><?= $kendaraan->warna ?></span>
    </div>

    <div class="d-flex justify-content-between py-3">
        <strong>Status</strong>

        <?php if($kendaraan->status == 'tersedia'): ?>
            <span class="badge badge-success">
                Tersedia
            </span>
        <?php else: ?>
            <span class="badge badge-danger">
                Tidak Tersedia
            </span>
        <?php endif; ?>

    </div>

</div>

        <div class="card border-0 shadow-sm mt-4">

    <div class="card-body">

        <h5 class="mb-4">
            Tarif Rental
        </h5>

        <div class="row text-center">

            <div class="col-6 mb-3">
                <div class="border rounded p-3">
                    <h6>Per Jam</h6>
                    <strong class="text-primary">
                        Rp<?= number_format($kendaraan->tarif_jam,0,',','.') ?>
                    </strong>
                </div>
            </div>

            <div class="col-6 mb-3">
                <div class="border rounded p-3">
                    <h6>Per Hari</h6>
                    <strong class="text-primary">
                        Rp<?= number_format($kendaraan->tarif_hari,0,',','.') ?>
                    </strong>
                </div>
            </div>

            <div class="col-6">
                <div class="border rounded p-3">
                    <h6>Per Minggu</h6>
                    <strong class="text-primary">
                        Rp<?= number_format($kendaraan->tarif_minggu,0,',','.') ?>
                    </strong>
                </div>
            </div>

            <div class="col-6">
                <div class="border rounded p-3">
                    <h6>Per Bulan</h6>
                    <strong class="text-primary">
                        Rp<?= number_format($kendaraan->tarif_bulan,0,',','.') ?>
                    </strong>
                </div>
            </div>

        </div>

        <div class="mt-4">

    <?php if($kendaraan->status == 'tersedia'): ?>

    <a href="<?= site_url('customer/penyewaan/sewa/'.$kendaraan->id) ?>"
       class="btn btn-primary">

        Sewa Sekarang

    </a>

<?php elseif($pelanggan->is_pelanggan_lama == 1): ?>

    <a href="<?= site_url('customer/penyewaan/sewa/'.$kendaraan->id) ?>"
       class="btn btn-warning">

        Upgrade Tersedia

    </a>

<?php else: ?>

    <button class="btn btn-secondary" disabled>

        Sedang Disewa

    </button>

<?php endif; ?>

    <a href="<?= site_url('customer/kendaraan') ?>"
       class="btn btn-outline-dark ml-2">

        <i class="icon-arrow-left"></i>
        Kembali

    </a>

</div>

    </div>
  
    </div>
    </div>
    
      	 <div class="row justify-content-center">
      		<div class="col-md-12 pills">
						<div class="bd-example bd-example-tabs">
							<div class="d-flex justify-content-center">
							  <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

							    <li class="nav-item">
							      <a class="nav-link active"
									id="pills-manufacturer-tab"
									data-toggle="pill"
									href="#pills-manufacturer"
									role="tab">
									Description
									</a>
							    </li>
							    <li class="nav-item">
							      <a class="nav-link" id="pills-review-tab" data-toggle="pill" href="#pills-review" role="tab" aria-controls="pills-review" aria-expanded="true">Review</a>
							    </li>
							  </ul>
							</div>

							<div class="tab-content">

						     <div class="tab-pane fade show active"
     id="pills-manufacturer">

    <h5>Deskripsi Kendaraan</h5>

    <p>
        <?= $kendaraan->merk ?> <?= $kendaraan->nama_kendaraan ?>
        merupakan kendaraan kelas <?= $kendaraan->kelas ?>
        tahun <?= $kendaraan->tahun ?> dengan warna
        <?= $kendaraan->warna ?> dan nomor polisi
        <?= $kendaraan->no_polisi ?>.
    </p>

    <p>
        Kendaraan tersedia dengan pilihan tarif sewa per jam,
        per hari, per minggu, dan per bulan sesuai kebutuhan pelanggan.
    </p>

</div>
							</div>

						    <div class="tab-pane fade" id="pills-review" role="tabpanel" aria-labelledby="pills-review-tab">
						      <div class="row">
							   		<div class="col-md-7">
							   			<h3 class="head">23 Reviews</h3>
							   			<div class="review d-flex">
									   		<div class="user-img" style="background-image: url(images/person_1.jpg)"></div>
									   		<div class="desc">
									   			<h4>
									   				<span class="text-left">Jacob Webb</span>
									   				<span class="text-right">14 March 2018</span>
									   			</h4>
									   			<p class="star">
									   				<span>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
								   					</span>
								   					<span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
									   			</p>
									   			<p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrov</p>
									   		</div>
									   	</div>
									   	<div class="review d-flex">
									   		<div class="user-img" style="background-image: url(images/person_2.jpg)"></div>
									   		<div class="desc">
									   			<h4>
									   				<span class="text-left">Jacob Webb</span>
									   				<span class="text-right">14 March 2018</span>
									   			</h4>
									   			<p class="star">
									   				<span>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
								   					</span>
								   					<span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
									   			</p>
									   			<p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrov</p>
									   		</div>
									   	</div>
									   	<div class="review d-flex">
									   		<div class="user-img" style="background-image: url(images/person_3.jpg)"></div>
									   		<div class="desc">
									   			<h4>
									   				<span class="text-left">Jacob Webb</span>
									   				<span class="text-right">14 March 2018</span>
									   			</h4>
									   			<p class="star">
									   				<span>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
								   					</span>
								   					<span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
									   			</p>
									   			<p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrov</p>
									   		</div>
									   	</div>
							   		</div>
							   		<div class="col-md-5">
							   			<div class="rating-wrap">
								   			<h3 class="head">Give a Review</h3>
								   			<div class="wrap">
									   			<p class="star">
									   				<span>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					(98%)
								   					</span>
								   					<span>20 Reviews</span>
									   			</p>
									   			<p class="star">
									   				<span>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					(85%)
								   					</span>
								   					<span>10 Reviews</span>
									   			</p>
									   			<p class="star">
									   				<span>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					(70%)
								   					</span>
								   					<span>5 Reviews</span>
									   			</p>
									   			<p class="star">
									   				<span>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					(10%)
								   					</span>
								   					<span>0 Reviews</span>
									   			</p>
									   			<p class="star">
									   				<span>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					(0%)
								   					</span>
								   					<span>0 Reviews</span>
									   			</p>
									   		</div>
								   		</div>
							   		</div>
							   	</div>
						    </div>
						  </div>
						</div>
		      </div>
				</div>
      </div>
    </section>
<section class="ftco-section ftco-no-pt">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                <span class="subheading">ARMADA LAINNYA</span>
                <h2 class="mb-2">Kendaraan Terkait</h2>
            </div>
        </div>

        <div class="row">

            <?php foreach($related as $r){ ?>

            <div class="col-md-4">
                <div class="car-wrap rounded ftco-animate">

                    <div class="img rounded d-flex align-items-end"
                         style="background-image:url('<?= base_url('assets/customer/images/'.$r->foto) ?>');">
                    </div>

                    <div class="text">

                        <h2 class="mb-0">
                            <a href="<?= site_url('customer/kendaraan/detail/'.$r->id) ?>">
                                <?= $r->merk ?>
                            </a>
                        </h2>

                        <span class="cat">
                            <?= $r->nama_kendaraan ?>
                        </span>

                        <div class="mb-3 mt-2">

                        <span class="badge badge-success">
                            <?= ucfirst($r->status) ?>
                        </span>

                    </div>

                    <ul class="list-unstyled mb-3">

                        <li>
                            <strong>Per Jam :</strong>
                            Rp<?= number_format($r->tarif_jam,0,',','.') ?>
                        </li>

                        <li>
                            <strong>Per Hari :</strong>
                            Rp<?= number_format($r->tarif_hari,0,',','.') ?>
                        </li>

                        <li>
                            <strong>Per Minggu :</strong>
                            Rp<?= number_format($r->tarif_minggu,0,',','.') ?>
                        </li>

                        <li>
                            <strong>Per Bulan :</strong>
                            Rp<?= number_format($r->tarif_bulan,0,',','.') ?>
                        </li>

                    </ul>
                    <p class="d-flex mb-0 d-block">

    <?php if($r->status == 'tersedia') : ?>

        <a href="<?= site_url('customer/penyewaan/sewa/'.$r->id) ?>"
           class="btn btn-primary py-2 mr-1">
            Sewa
        </a>

    <?php else : ?>

        <button class="btn btn-secondary py-2 mr-1" disabled>
            Tidak Tersedia
        </button>

    <?php endif; ?>

    <a href="<?= site_url('customer/kendaraan/detail/'.$r->id) ?>"
       class="btn btn-secondary py-2 ml-1">
        Detail
    </a>

</p>

                                            

                    </div>

                </div>
            </div>

            <?php } ?>

        </div>

        <!-- Tombol Kembali -->
        <div class="row mt-5">
            <div class="col-md-12 text-center">

                <a href="<?= site_url('customer/kendaraan') ?>"
                   class="btn btn-outline-dark px-4 py-3">

                    <i class="icon-arrow-left"></i>
                    Kembali ke Daftar Kendaraan

                </a>

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
  <script src="<?= base_url('assets/customer/https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false') ?>"></script>
  <script src="<?= base_url('assets/customer/js/google-map.js') ?>"></script>
  <script src="<?= base_url('assets/customer/js/main.js') ?>"></script>
    
  </body>
</html>