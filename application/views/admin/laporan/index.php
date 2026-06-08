<div class="container-fluid">


<h1 class="h3 mb-4 text-gray-800">
    <i class="fas fa-chart-line"></i>
    Laporan Pendapatan
</h1>

<div class="card shadow mb-4">

    <div class="card-header py-3">

        <h6 class="m-0 font-weight-bold text-primary">
            Filter Laporan
        </h6>

    </div>

    <div class="card-body">

        <form method="get">

            <div class="row">

                <div class="col-md-4">

                    <label>Tanggal Awal</label>

                    <input type="date"
                           name="tanggal_awal"
                           value="<?= $this->input->get('tanggal_awal') ?>"
                           class="form-control">

                </div>

                <div class="col-md-4">

                    <label>Tanggal Akhir</label>

                    <input type="date"
                           name="tanggal_akhir"
                           value="<?= $this->input->get('tanggal_akhir') ?>"
                           class="form-control">

                </div>

                <div class="col-md-4">

                    <label>&nbsp;</label>

                    <button type="submit"
                            class="btn btn-primary btn-block">

                        <i class="fas fa-search"></i>
                        Filter

                    </button>

                </div>

            </div>

        </form>

    </div>

</div>

<div class="row mb-4">

    <div class="col-md-6">

        <div class="card border-left-success shadow">

            <div class="card-body">

                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                    Total Pendapatan
                </div>

                <div class="h4 font-weight-bold">
                    Rp<?= number_format($total_pendapatan,0,',','.') ?>
                </div>

            </div>

        </div>

    </div>

    <div class="col-md-6">

        <div class="card border-left-primary shadow">

            <div class="card-body">

                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                    Total Transaksi
                </div>

                <div class="h4 font-weight-bold">
                    <?= count($laporan) ?>
                </div>

            </div>

        </div>

    </div>

</div>
<div class="mb-3">

    <a href="<?= site_url(
    'admin/laporan/cetak?tanggal_awal='.
    $this->input->get('tanggal_awal').
    '&tanggal_akhir='.
    $this->input->get('tanggal_akhir')
) ?>"
target="_blank"
class="btn btn-success">

        <i class="fas fa-print"></i>
        Cetak Laporan

    </a>

</div>

<div class="card shadow">

    <div class="card-header py-3">

        <h6 class="m-0 font-weight-bold text-primary">
            Data Pendapatan
        </h6>

    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered table-hover">

                <thead class="thead-light">

                    <tr>

                        <th>No</th>
                        <th>Kode Transaksi</th>
                        <th>Pelanggan</th>
                        <th>Kendaraan</th>
                        <th>Tanggal</th>
                        <th>Total Bayar</th>
                        <th>Status</th>

                    </tr>

                </thead>

                <tbody>

                <?php if(!empty($laporan)): ?>

                    <?php $no=1; ?>

                    <?php foreach($laporan as $l): ?>

                    <tr>

                        <td><?= $no++ ?></td>

                        <td>
                            <?= $l->kode_transaksi ?>
                        </td>

                        <td>
                            <?= $l->nama ?>
                        </td>

                        <td>
                            <?= $l->merk ?> -
                            <?= $l->nama_kendaraan ?>
                        </td>

                        <td>
                            <?= date(
                                'd-m-Y',
                                strtotime($l->created_at)
                            ) ?>
                        </td>

                        <td>

                            Rp<?= number_format(
                                $l->total_bayar,
                                0,
                                ',',
                                '.'
                            ) ?>

                        </td>

                        <td>

                            <?php if($l->status == 'selesai'): ?>

                                <span class="badge badge-success">
                                    Selesai
                                </span>

                            <?php elseif($l->status == 'dibayar'): ?>

                                <span class="badge badge-primary">
                                    Dibayar
                                </span>

                            <?php elseif($l->status == 'booking'): ?>

                                <span class="badge badge-warning">
                                    Booking
                                </span>

                            <?php else: ?>

                                <span class="badge badge-secondary">
                                    <?= ucfirst(
                                        str_replace(
                                            '_',
                                            ' ',
                                            $l->status
                                        )
                                    ) ?>
                                </span>

                            <?php endif; ?>

                        </td>

                    </tr>

                    <?php endforeach; ?>

                <?php else: ?>

                    <tr>

                        <td colspan="7" class="text-center">

                            Tidak ada data laporan

                        </td>

                    </tr>

                <?php endif; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>


</div>
