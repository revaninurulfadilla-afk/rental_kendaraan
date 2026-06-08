<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">
        Detail Pembayaran
    </h1>

    <div class="card shadow">

        <div class="card-header bg-primary text-white">
            Informasi Pembayaran
        </div>

        <div class="card-body">

            <table class="table table-bordered">

                <tr>
                    <th width="250">Kode Transaksi</th>
                    <td><?= $pembayaran->kode_transaksi ?></td>
                </tr>

                <tr>
                    <th>Pelanggan</th>
                    <td><?= $pembayaran->nama ?></td>
                </tr>

                <tr>
                    <th>Email</th>
                    <td><?= $pembayaran->email ?></td>
                </tr>

                <tr>
                    <th>Kendaraan</th>
                    <td>
                        <?= $pembayaran->merk ?>
                        -
                        <?= $pembayaran->nama_kendaraan ?>
                    </td>
                </tr>

                <tr>
                    <th>Jenis Sewa</th>
                    <td><?= ucfirst($pembayaran->jenis_sewa) ?></td>
                </tr>

                <tr>
                    <th>Lama Sewa</th>
                    <td><?= $pembayaran->lama_sewa ?></td>
                </tr>

                <tr>
                    <th>Total Bayar</th>
                    <td>
                        Rp<?= number_format($pembayaran->total_bayar,0,',','.') ?>
                    </td>
                </tr>

                <tr>
                    <th>Status</th>
                    <td><?= ucfirst($pembayaran->status) ?></td>
                </tr>

            </table>

            <a href="<?= site_url('admin/pembayaran') ?>"
               class="btn btn-secondary">
                Kembali
            </a>

        </div>

    </div>

</div>