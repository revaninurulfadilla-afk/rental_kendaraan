<section class="ftco-section">
<div class="container">

    <div class="card shadow">
        <div class="card-header">
            <h4 class="mb-0">Riwayat Penyewaan</h4>
        </div>

        <div class="card-body">

            <table class="table table-bordered">

                <thead>
                    <tr>
                        <th>Kode Transaksi</th>
                        <th>Kendaraan</th>
                        <th>Tgl Mulai</th>
                        <th>Tgl Selesai</th>
                        <th>Total Bayar</th>
                        <th>Status</th>
                        <th>Aksi</th>
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

                        <td>
                            Rp<?= number_format($t->total_bayar,0,',','.') ?>
                        </td>

                        <td>
<?php
switch($t->status)
{
    case 'booking':
        echo '<span class="badge badge-warning">Booking</span>';
        break;

    case 'menunggu_verifikasi':
        echo '<span class="badge badge-info">Menunggu Verifikasi</span>';
        break;

    case 'dibayar':
        echo '<span class="badge badge-success">Dibayar</span>';
        break;

    case 'selesai':
        echo '<span class="badge badge-primary">Selesai</span>';
        break;

    default:
        echo $t->status;
}
?>
</td>

                        <td>

                            <?php if($t->status == 'booking') : ?>

                                <a href="<?= site_url('customer/pembayaran/bayar/'.$t->id) ?>"
                                   class="btn btn-primary btn-sm">
                                    Bayar
                                </a>

                            <?php else : ?>

                                -

                            <?php endif; ?>

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