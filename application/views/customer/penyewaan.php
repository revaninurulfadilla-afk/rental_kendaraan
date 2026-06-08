<section class="ftco-section">
<div class="container">

    <div class="card shadow">
        <div class="card-header">
            <h2>Riwayat penyewaan</h2>
            <p>Daftar penyewaan yang telah selesai.</p>
        </div>

        <div class="card-body">

            <div class="table-responsive">

<table class="table table-hover align-middle">

    <thead class="thead-dark">
        <tr>
            <th>Kode Transaksi</th>
            <th>Kendaraan</th>
            <th>Tgl Mulai</th>
            <th>Tgl Selesai</th>
            <th>Total Bayar</th>
            <th>Status</th>
            <th width="120">Aksi</th>
        </tr>
    </thead>
                <tbody>

                <?php if(!empty($transaksi)) : ?>

                    <?php foreach($transaksi as $t) : ?>

                    <tr>

                        <td><?= $t->kode_transaksi ?></td>

                        <td>
                            <?= $t->merk ?>
                        </td>

                        <td>
                            <?= date('d-m-Y H:i',strtotime($t->tgl_mulai)) ?>
                        </td>

                        <td>
                            <?= date('d-m-Y H:i',strtotime($t->tgl_selesai)) ?>
                        </td>

                        <td class="font-weight-bold text-primary">
                            Rp<?= number_format($t->total_bayar,0,',','.') ?>
                        </td>


<td>

    <?php if($t->status == 'booking') : ?>

        <span class="badge badge-warning">
            Booking
        </span>

    <?php elseif($t->status == 'menunggu_verifikasi') : ?>

        <span class="badge badge-info">
            Menunggu Verifikasi
        </span>

    <?php elseif($t->status == 'menunggu_pembayaran_tunai') : ?>

        <span class="badge badge-secondary">
            Menunggu Pembayaran Tunai
        </span>

    <?php elseif($t->status == 'dibayar') : ?>

        <span class="badge badge-success">
            Dibayar
        </span>

    <?php elseif($t->status == 'berjalan') : ?>

        <span class="badge badge-primary">
            Berjalan
        </span>

    <?php elseif($t->status == 'pengembalian_diajukan') : ?>

        <span class="badge badge-dark">
            Pengembalian Diajukan
        </span>

    <?php elseif($t->status == 'selesai') : ?>

        <span class="badge badge-success">
            Selesai
        </span>

    <?php elseif($t->status == 'batal') : ?>

        <span class="badge badge-danger">
            Batal
        </span>

    <?php else : ?>

        <span class="badge badge-light">
            <?= ucfirst(str_replace('_',' ',$t->status)) ?>
        </span>

    <?php endif; ?>

</td>
<td>

    <a href="<?= site_url('customer/riwayat/detail/'.$t->id) ?>"
       class="btn btn-info btn-sm">

        <i class="fa fa-eye"></i>
        Detail

    </a>

</td>

                    </tr>

                    <?php endforeach; ?>

                <?php else : ?>

                    <tr>
                        <td colspan="7" class="text-center">
                            Belum ada data penyewaan
                        </td>
                    </tr>

                <?php endif; ?>

                </tbody>

            </table>

        </div>
    </div>

</div>
</section>