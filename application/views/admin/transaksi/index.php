<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">

        <h1 class="h3 text-gray-800">
            <i class="fas fa-file-invoice-dollar"></i>
            Data Transaksi
        </h1>

    </div>

    <div class="card shadow border-0">

        <div class="card-header bg-primary text-white">

            <h5 class="mb-0">
                Daftar Transaksi Penyewaan
            </h5>

        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="thead-light">

                        <tr>
                            <th>Kode Transaksi</th>
                            <th>Kendaraan</th>
                            <th>Total Bayar</th>
                            <th>Status</th>
                            <th width="120">Aksi</th>
                        </tr>

                    </thead>

                    <tbody>

                    <?php foreach($transaksi as $t): ?>

                    <tr>

                        <td>
                            <strong>
                                <?= $t->kode_transaksi ?>
                            </strong>
                        </td>

                        <td>
                            <?= $t->merk ?>
                        </td>

                        <td class="font-weight-bold text-success">

                            Rp<?= number_format($t->total_bayar,0,',','.') ?>

                        </td>

                        <td>

                            <?php if($t->status == 'menunggu_pembayaran'): ?>

                                <span class="badge badge-warning">
                                    Menunggu Pembayaran
                                </span>

                            <?php elseif($t->status == 'dibayar'): ?>

                                <span class="badge badge-success">
                                    Dibayar
                                </span>

                            <?php elseif($t->status == 'berjalan'): ?>

                                <span class="badge badge-primary">
                                    Berjalan
                                </span>

                            <?php elseif($t->status == 'selesai'): ?>

                                <span class="badge badge-info">
                                    Selesai
                                </span>

                            <?php elseif($t->status == 'batal'): ?>

                                <span class="badge badge-danger">
                                    Batal
                                </span>

                            <?php else: ?>

                                <span class="badge badge-secondary">
                                    <?= ucfirst($t->status) ?>
                                </span>

                            <?php endif; ?>

                        </td>

                        <td>

                            <a href="<?= site_url('admin/transaksi/detail/'.$t->id) ?>"
                               class="btn btn-primary btn-sm">

                                <i class="fas fa-eye"></i>
                                Detail

                            </a>

                        </td>

                    </tr>

                    <?php endforeach; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>