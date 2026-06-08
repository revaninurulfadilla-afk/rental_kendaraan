<section class="hero-wrap hero-wrap-2"
style="background-image:url('<?= base_url('assets/customer/images/bg_3.jpg') ?>');">

    <div class="overlay"></div>

    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-start">
            <div class="col-md-9 pb-5">
                <h1 class="mb-3 bread">Riwayat Sewa</h1>
            </div>
        </div>
    </div>

</section>

<section class="ftco-section bg-light">

    <div class="container">

        <div class="row justify-content-center mb-4">
            <div class="col-md-8 text-center">
                <h2>Riwayat Penyewaan Saya</h2>
                <p>Daftar transaksi yang telah selesai.</p>
            </div>
        </div>

        <div class="row">

            <?php if(empty($riwayat)): ?>

                <div class="col-md-12">

                    <div class="alert alert-warning text-center">
                        Belum ada riwayat penyewaan.
                    </div>

                </div>

            <?php endif; ?>

            <?php foreach($riwayat as $r): ?>

            <div class="col-md-4">

                <div class="car-wrap rounded ftco-animate">

                    <div class="text p-4">

                        <h3><?= $r->merk ?></h3>

                        <p>
                            <strong>Kode:</strong><br>
                            <?= $r->kode_transaksi ?>
                        </p>

                        <p>
                            <strong>Total Bayar:</strong><br>
                            Rp<?= number_format($r->total_bayar,0,',','.') ?>
                        </p>

                        <p>
                            <strong>Tanggal Sewa:</strong><br>
                            <?= date('d-m-Y',strtotime($r->tgl_mulai)) ?>
                        </p>

                        <p>
                            <span class="badge badge-success">
                                Selesai
                            </span>
                        </p>

                    </div>

                </div>

            </div>

            <?php endforeach; ?>

        </div>

    </div>

</section>