<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">
        Detail Transaksi
    </h1>

    <div class="row">

        <!-- INFO TRANSAKSI -->
        <div class="col-md-6">

            <div class="card shadow border-left-primary">

                <div class="card-header">
                    <h5 class="mb-0">
                        Informasi Transaksi
                    </h5>
                </div>

                <div class="card-body">

                    <p>
                        <strong>Kode Transaksi</strong><br>
                        <?= $transaksi->kode_transaksi ?>
                    </p>

                    <hr>

                    <p>
                        <strong>Pelanggan</strong><br>
                        <?= $transaksi->nama ?>
                    </p>

                    <hr>

                    <p>
                        <strong>Kendaraan</strong><br>
                        <?= $transaksi->merk ?>
                        -
                        <?= $transaksi->nama_kendaraan ?>
                    </p>

                </div>

            </div>

        </div>

        <!-- INFO PEMBAYARAN -->
        <div class="col-md-6">

            <div class="card shadow border-left-success">

                <div class="card-header">
                    <h5 class="mb-0">
                        Informasi Pembayaran
                    </h5>
                </div>

                <div class="card-body text-center">

                    <h2 class="text-success font-weight-bold">
                        Rp<?= number_format($transaksi->total_bayar,0,',','.') ?>
                    </h2>

                    <br>

                    <?php if($pembayaran): ?>

                        <?php if($pembayaran->status == 'menunggu_verifikasi'): ?>

                            <span class="badge badge-warning p-2">
                                Menunggu Verifikasi Transfer
                            </span>

                        <?php elseif($pembayaran->status == 'menunggu_pembayaran_tunai'): ?>

                            <span class="badge badge-info p-2">
                                Menunggu Pembayaran Tunai
                            </span>

                        <?php elseif($pembayaran->status == 'dibayar'): ?>

                            <span class="badge badge-success p-2">
                                Dibayar
                            </span>

                        <?php elseif($pembayaran->status == 'ditolak'): ?>

                            <span class="badge badge-danger p-2">
                                Ditolak
                            </span>

                        <?php endif; ?>

                    <?php else: ?>

                        <?php if($transaksi->status == 'menunggu_pembayaran'): ?>

                            <span class="badge badge-warning p-2">
                                Menunggu Pembayaran
                            </span>

                        <?php elseif($transaksi->status == 'dibayar'): ?>

                            <span class="badge badge-success p-2">
                                Dibayar
                            </span>

                        <?php elseif($transaksi->status == 'berjalan'): ?>

                            <span class="badge badge-primary p-2">
                                Berjalan
                            </span>

                        <?php elseif($transaksi->status == 'selesai'): ?>

                            <span class="badge badge-info p-2">
                                Selesai
                            </span>

                        <?php else: ?>

                            <span class="badge badge-secondary p-2">
                                <?= ucfirst($transaksi->status) ?>
                            </span>

                        <?php endif; ?>

                    <?php endif; ?>

                </div>

            </div>

        </div>

    </div>

    <?php if($pembayaran): ?>

    <div class="card shadow mt-4">

        <div class="card-header bg-primary text-white">

            <h5 class="mb-0">
                Bukti Pembayaran
            </h5>

        </div>

        <div class="card-body text-center">

            <?php if(!empty($pembayaran->bukti_pembayaran)): ?>

                <img src="<?= base_url('assets/uploads/pembayaran/'.$pembayaran->bukti_pembayaran) ?>"
                     class="img-fluid rounded shadow"
                     style="max-height:700px;">

            <?php else: ?>

                <div class="alert alert-info">
                    Pembayaran dilakukan secara CASH
                </div>

            <?php endif; ?>

        </div>

    </div>

    <?php if(
        $pembayaran->status == 'menunggu_verifikasi'
        ||
        $pembayaran->status == 'menunggu_pembayaran_tunai'
    ): ?>

    <div class="card shadow mt-4">

        <div class="card-body text-center">

            <h4>
                Verifikasi Pembayaran
            </h4>

            <p class="text-muted">

                <?php if($pembayaran->metode_pembayaran == 'transfer'): ?>

                    Pastikan bukti transfer sesuai sebelum menyetujui transaksi.

                <?php else: ?>

                    Pastikan pelanggan telah melakukan pembayaran tunai.

                <?php endif; ?>

            </p>

            <a href="<?= site_url('admin/transaksi/verifikasi/'.$pembayaran->id) ?>"
           class="btn btn-success btn-lg">

            <i class="fas fa-check"></i>
            Verifikasi

        </a>

        <a href="<?= site_url('admin/transaksi/tolak/'.$pembayaran->id) ?>"
           class="btn btn-danger btn-lg"
           onclick="return confirm('Tolak pembayaran ini?')">

            <i class="fas fa-times"></i>
            Tolak

        </a>
        </div>

    </div>

    <?php endif; ?>

    <?php endif; ?>

</div>