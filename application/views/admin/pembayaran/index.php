<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-money-bill-wave"></i>
        Data Pembayaran
    </h1>

    <?php if($this->session->flashdata('success')): ?>
    <div class="alert alert-success">
        <?= $this->session->flashdata('success') ?>
    </div>
    <?php endif; ?>

    <div class="card shadow">

        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Daftar Pembayaran
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
                            <th>Total Bayar</th>
                            <th>Status</th>
                            <th width="220">Aksi</th>
                        </tr>

                    </thead>

                    <tbody>

                    <?php $no=1; foreach($pembayaran as $p): ?>

                    <tr>

                        <td><?= $no++ ?></td>

                        <td><?= $p->kode_transaksi ?></td>

                        <td><?= $p->nama ?></td>

                        <td>
                            <?= $p->merk ?>
                            -
                            <?= $p->nama_kendaraan ?>
                        </td>

                        <td>
                            Rp<?= number_format($p->total_bayar,0,',','.') ?>
                        </td>

                        <td>

                            <?php if($p->status=='dibayar'): ?>

                                <span class="badge badge-success">
                                    Dibayar
                                </span>

                            <?php elseif($p->status=='selesai'): ?>

                                <span class="badge badge-primary">
                                    Selesai
                                </span>

                            <?php elseif($p->status=='ditolak'): ?>

                                <span class="badge badge-danger">
                                    Ditolak
                                </span>

                            <?php else: ?>

                                <span class="badge badge-warning">
                                    Menunggu
                                </span>

                            <?php endif; ?>

                        </td>


                            <td>

                                <a href="<?= site_url('admin/pembayaran/detail/'.$p->id) ?>"
                                class="btn btn-info btn-sm">
                                Detail
                                </a>

                                <a href="<?= site_url('admin/pembayaran/kwitansi/'.$p->id) ?>"
                                target="_blank"
                                class="btn btn-dark btn-sm">
                                Kwitansi
                                </a>

                            </td>

                        </td>

                    </tr>

                    <?php endforeach; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>