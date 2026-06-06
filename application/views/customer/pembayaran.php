<section class="hero-wrap hero-wrap-2"
    style="background-image: url('<?= base_url('assets/customer/images/bg_3.jpg') ?>');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-start">
            <div class="col-md-9 pb-5">
                <p class="breadcrumbs">
                    <span class="mr-2">
                        <a href="<?= site_url('customer/dashboard') ?>">
                            Home
                        </a>
                    </span>
                    <span>Pembayaran</span>
                </p>

                <h1 class="mb-3 bread">
                    Pembayaran
                </h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section bg-light">
    <div class="container">

        <div class="row">

            <?php if(empty($transaksi)): ?>

                <div class="col-md-12">
                    <div class="alert alert-info">
                        Belum ada transaksi yang harus dibayar.
                    </div>
                </div>

            <?php endif; ?>

            <?php foreach($transaksi as $t): ?>

            <div class="col-md-6 mb-4">

                <div class="card shadow-sm">

                    <div class="card-header bg-primary text-white">

                        <strong>
                            <?= $t->kode_transaksi ?>
                        </strong>

                    </div>

                    <div class="card-body">

                        <h5>
                            <?= $t->merk ?>
                            -
                            <?= $t->nama_kendaraan ?>
                        </h5>

                        <hr>

                        <p>
                            <b>Jenis Sewa :</b>
                            <?= ucfirst($t->jenis_sewa) ?>
                        </p>

                        <p>
                            <b>Lama Sewa :</b>
                            <?= $t->lama_sewa ?>
                        </p>

                        <p>
                            <b>Tanggal Mulai :</b>
                            <?= date('d-m-Y H:i', strtotime($t->tgl_mulai)) ?>
                        </p>

                        <p>
                            <b>Tanggal Selesai :</b>
                            <?= date('d-m-Y H:i', strtotime($t->tgl_selesai)) ?>
                        </p>

                        <p>
                            <b>Status :</b>
                            <span class="badge badge-warning">
                                <?= ucfirst($t->status) ?>
                            </span>
                        </p>

                        <hr>

                        <h4 class="text-primary">

                            Rp<?= number_format(
                                $t->total_bayar,
                                0,
                                ',',
                                '.'
                            ) ?>

                        </h4>

                        <a href="<?= site_url('customer/pembayaran/bayar/'.$t->id) ?>"
                           class="btn btn-primary btn-block mt-3">

                            Bayar Sekarang

                        </a>

                    </div>

                </div>

            </div>

            <?php endforeach; ?>

        </div>

    </div>
</section>