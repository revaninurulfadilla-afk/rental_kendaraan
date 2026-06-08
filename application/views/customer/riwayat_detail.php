<section class="ftco-section">
<div class="container">

<div class="row justify-content-center">

<div class="col-md-8">

<div class="card shadow border-0">

    <div class="card-header bg-primary text-white">
        <h4 class="mb-0">
            Detail Riwayat Sewa
        </h4>
    </div>

    <div class="card-body">

        <table class="table table-borderless">

            <tr>
                <th width="35%">Kode Transaksi</th>
                <td><?= $transaksi->kode_transaksi ?></td>
            </tr>

            <tr>
                <th>Kendaraan</th>
                <td>
                    <?= $transaksi->merk ?>
                    -
                    <?= $transaksi->nama_kendaraan ?>
                </td>
            </tr>

            <tr>
                <th>Tanggal Mulai</th>
                <td>
                    <?= date('d M Y H:i',strtotime($transaksi->tgl_mulai)) ?>
                </td>
            </tr>

            <tr>
                <th>Tanggal Selesai</th>
                <td>
                    <?= date('d M Y H:i',strtotime($transaksi->tgl_selesai)) ?>
                </td>
            </tr>

            <tr>
                <th>Total Bayar</th>
                <td class="text-primary font-weight-bold">
                    Rp<?= number_format($transaksi->total_bayar,0,',','.') ?>
                </td>
            </tr>

            <tr>
                <th>Status</th>
                <td>

                    <span class="badge badge-success">
                        <?= ucfirst($transaksi->status) ?>
                    </span>

                </td>
            </tr>

        </table>

        <hr>

        <a href="<?= site_url('customer/riwayat') ?>"
           class="btn btn-secondary">

            <i class="fa fa-arrow-left"></i>
            Kembali

        </a>

    </div>

</div>

</div>

</div>

</div>
</section>