<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">
        Data Pengembalian
    </h1>

    <div class="card shadow">

        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">
                Pengembalian Diajukan
            </h5>
        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover">

                    <thead>
                        <tr>
                            <th>Kode Transaksi</th>
                            <th>Pelanggan</th>
                            <th>Kendaraan</th>
                            <th>Tanggal Selesai</th>
                            <th>Status</th>
                            <th width="180">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php if(empty($pengembalian)): ?>
                        <tr>
                            <td colspan="6" class="text-center">
                                Tidak ada pengembalian
                            </td>
                        </tr>
                    <?php endif; ?>

                    <?php foreach($pengembalian as $p): ?>
                        <tr>
                            <td><?= $p->kode_transaksi ?></td>
                            <td><?= $p->nama ?></td>
                            <td><?= $p->merk ?> - <?= $p->nama_kendaraan ?></td>
                            <td><?= date('d-m-Y H:i', strtotime($p->tgl_selesai)) ?></td>
                            <td>
                                <?php if($p->keterangan == 'Pengembalian selesai'): ?>
                                    <span class="badge badge-success">
                                        Selesai
                                    </span>
                                <?php else: ?>
                                    <span class="badge badge-warning">
                                        Pengembalian Diajukan
                                    </span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="<?= site_url('admin/pengembalian/detail/'.$p->id) ?>"
                                   class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i> Detail
                                </a>

                                <?php if($p->keterangan != 'Pengembalian selesai'): ?>
                                <a href="<?= site_url('admin/pengembalian/proses/'.$p->id) ?>"
                                   class="btn btn-success btn-sm"
                                   onclick="return confirm('Selesaikan pengembalian ini?')">
                                    <i class="fas fa-check"></i> Proses
                                </a>
                                <?php else: ?>
                                    <span class="badge badge-success">Sudah Diproses</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>