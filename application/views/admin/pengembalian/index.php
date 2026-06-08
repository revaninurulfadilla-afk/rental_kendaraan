<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">
        Data Pengembalian
    </h1>

    <?php if($this->session->flashdata('success')): ?>
    <div class="alert alert-success">
        <?= $this->session->flashdata('success') ?>
    </div>
    <?php endif; ?>

    <div class="card shadow">

        <div class="card-header bg-primary text-white">

            <h5 class="mb-0">
                Pengembalian Kendaraan
            </h5>

        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover">

                    <thead>

                        <tr>

                            <th>No</th>
                            <th>Kode Transaksi</th>
                            <th>Pelanggan</th>
                            <th>Kendaraan</th>
                            <th>Tanggal Pengembalian</th>
                            <th>Terlambat</th>
                            <th>Denda</th>
                            <th>Status</th>
                            <th width="200">Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                    <?php if(empty($pengembalian)): ?>

                        <tr>

                            <td colspan="9" class="text-center">
                                Tidak ada data pengembalian
                            </td>

                        </tr>

                    <?php else: ?>

                        <?php $no=1; ?>

                        <?php foreach($pengembalian as $p): ?>

                        <tr>

                            <td><?= $no++ ?></td>

                            <td>
                                <?= $p->kode_transaksi ?>
                            </td>

                            <td>
                                <?= $p->nama ?>
                            </td>

                            <td>
                                <?= $p->merk ?>
                                -
                                <?= $p->nama_kendaraan ?>
                            </td>

                            <td>
                                <?= date(
                                    'd-m-Y H:i',
                                    strtotime($p->tanggal_pengembalian)
                                ) ?>
                            </td>

                            <td>
                                <?= $p->terlambat_jam ?> Jam
                            </td>

                            <td>
                                Rp<?= number_format(
                                    $p->denda,
                                    0,
                                    ',',
                                    '.'
                                ) ?>
                            </td>

                            <td>

                                <?php if($p->keterangan == 'Pengembalian selesai'): ?>

                                    <span class="badge badge-success">
                                        Selesai
                                    </span>

                                <?php else: ?>

                                    <span class="badge badge-warning">
                                        Menunggu Verifikasi
                                    </span>

                                <?php endif; ?>

                            </td>

                            <td>

                                <a href="<?= site_url('admin/pengembalian/detail/'.$p->id) ?>"
                                   class="btn btn-info btn-sm">

                                    <i class="fas fa-eye"></i>
                                    Detail

                                </a>

                                <?php if($p->keterangan != 'Pengembalian selesai'): ?>

                                <a href="<?= site_url('admin/pengembalian/proses/'.$p->id) ?>"
                                   class="btn btn-success btn-sm"
                                   onclick="return confirm('Proses pengembalian ini?')">

                                    <i class="fas fa-check"></i>
                                    Proses

                                </a>

                                <?php endif; ?>

                            </td>

                        </tr>

                        <?php endforeach; ?>

                    <?php endif; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>