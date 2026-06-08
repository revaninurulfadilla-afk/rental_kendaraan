<section class="ftco-section" style="padding-top:120px;">
<div class="container">

    <div class="text-center mb-5">

        <h2 class="font-weight-bold">
            Pengembalian Kendaraan
        </h2>

        <p class="text-muted">
            Lihat status pengembalian kendaraan Anda
        </p>

    </div>

    <div class="row justify-content-center">

        <?php foreach($transaksi as $t): ?>

        <div class="col-lg-5 col-md-6 mb-4">

            <div class="card shadow border-0 h-100">

                <?php if(!empty($t->foto)): ?>

                <img src="<?= base_url('assets/customer/images/'.$t->foto) ?>"
                     class="card-img-top"
                     style="height:250px;object-fit:cover;">

                <?php endif; ?>

                <div class="card-body">

                    <!-- STATUS -->

                    <?php if($t->status == 'dibayar'): ?>

                        <span class="badge badge-success">
                            Dibayar
                        </span>

                    <?php elseif($t->status == 'berjalan'): ?>

                        <span class="badge badge-primary">
                            Berjalan
                        </span>

                    <?php elseif($t->status == 'pengembalian_diajukan'): ?>

                        <span class="badge badge-warning">
                            Pengembalian Diajukan
                        </span>

                    <?php elseif($t->status == 'selesai'): ?>

                        <span class="badge badge-info">
                            Selesai
                        </span>

                    <?php else: ?>

                        <span class="badge badge-secondary">
                            <?= ucfirst($t->status) ?>
                        </span>

                    <?php endif; ?>

                    <h3 class="mt-3 font-weight-bold">

                        <?= $t->merk ?>
                        -
                        <?= $t->nama_kendaraan ?>

                    </h3>

                    <hr>

                    <p>
                        <strong>Kode Transaksi :</strong><br>
                        <?= $t->kode_transaksi ?>
                    </p>

                    <p>
                        <strong>Total Bayar :</strong><br>
                        Rp<?= number_format($t->total_bayar,0,',','.') ?>
                    </p>

                    <p>
                        <strong>Tanggal Sewa :</strong><br>

                        <?= date('d M Y',strtotime($t->tgl_mulai)) ?>

                        s/d

                        <?= date('d M Y',strtotime($t->tgl_selesai)) ?>

                    </p>

                    <!-- TOMBOL -->

                    <?php if(
                        $t->status == 'dibayar'
                        ||
                        $t->status == 'berjalan'
                    ): ?>

                    <a href="<?= site_url('customer/pengembalian/form/'.$t->id) ?>"
                        class="btn btn-warning btn-block mt-3">

                            <i class="fa fa-undo"></i>
                            Ajukan Pengembalian

                        </a>

                    <?php elseif($t->status == 'pengembalian_diajukan'): ?>

                    <button class="btn btn-info btn-block mt-3" disabled>

                        <i class="fa fa-clock"></i>
                        Menunggu Verifikasi Admin

                    </button>

                    <?php elseif($t->status == 'selesai'): ?>

                    <button class="btn btn-success btn-block mt-3" disabled>

                        <i class="fa fa-check"></i>
                        Pengembalian Selesai

                    </button>

                    <?php endif; ?>

                </div>

            </div>

        </div>

        <?php endforeach; ?>

    </div>

</div>
</section>