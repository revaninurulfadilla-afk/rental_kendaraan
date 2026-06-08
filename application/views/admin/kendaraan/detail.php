<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">
        Detail Kendaraan
    </h1>

    <div class="card shadow">

        <div class="card-header bg-primary text-white">
            Detail Kendaraan
        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-4 text-center">

                    <?php if($kendaraan->foto != ''): ?>

                        <img src="<?= base_url('assets/customer/images/'.$kendaraan->foto) ?>"
                             class="img-fluid rounded shadow">

                    <?php else: ?>

                        <img src="<?= base_url('assets/img/no-image.png') ?>"
                             class="img-fluid rounded shadow">

                    <?php endif; ?>

                </div>

                <div class="col-md-8">

                    <table class="table table-bordered">

                        <tr>
                            <th width="200">Kode Kendaraan</th>
                            <td><?= $kendaraan->kode_kendaraan ?></td>
                        </tr>

                        <tr>
                            <th>Merk</th>
                            <td><?= $kendaraan->merk ?></td>
                        </tr>

                        <tr>
                            <th>Nama Kendaraan</th>
                            <td><?= $kendaraan->nama_kendaraan ?></td>
                        </tr>

                        <tr>
                            <th>Jenis</th>
                            <td><?= $kendaraan->jenis ?></td>
                        </tr>

                        <tr>
                            <th>Kelas</th>
                            <td><?= $kendaraan->kelas ?></td>
                        </tr>

                        <tr>
                            <th>Tahun</th>
                            <td><?= $kendaraan->tahun ?></td>
                        </tr>

                        <tr>
                            <th>No Polisi</th>
                            <td><?= $kendaraan->no_polisi ?></td>
                        </tr>

                        <tr>
                            <th>Warna</th>
                            <td><?= $kendaraan->warna ?></td>
                        </tr>

                        <tr>
                            <th>Tarif Per Jam</th>
                            <td>
                                Rp<?= number_format($kendaraan->tarif_jam,0,',','.') ?>
                            </td>
                        </tr>

                        <tr>
                            <th>Tarif Per Hari</th>
                            <td>
                                Rp<?= number_format($kendaraan->tarif_hari,0,',','.') ?>
                            </td>
                        </tr>

                        <tr>
                            <th>Tarif Per Minggu</th>
                            <td>
                                Rp<?= number_format($kendaraan->tarif_minggu,0,',','.') ?>
                            </td>
                        </tr>

                        <tr>
                            <th>Tarif Per Bulan</th>
                            <td>
                                Rp<?= number_format($kendaraan->tarif_bulan,0,',','.') ?>
                            </td>
                        </tr>

                        <tr>
                            <th>Denda Per Jam</th>
                            <td>
                                Rp<?= number_format($kendaraan->denda_per_jam,0,',','.') ?>
                            </td>
                        </tr>

                        <tr>
                            <th>Status</th>
                            <td>

                                <?php if($kendaraan->status=='tersedia'): ?>
                                    <span class="badge badge-success">
                                        Tersedia
                                    </span>
                                <?php elseif($kendaraan->status=='disewa'): ?>
                                    <span class="badge badge-warning">
                                        Disewa
                                    </span>
                                <?php else: ?>
                                    <span class="badge badge-danger">
                                        Maintenance
                                    </span>
                                <?php endif; ?>

                            </td>
                        </tr>

                        <tr>
                            <th>Deskripsi</th>
                            <td><?= nl2br($kendaraan->deskripsi) ?></td>
                        </tr>

                    </table>

                    <a href="<?= site_url('admin/kendaraan') ?>"
                       class="btn btn-secondary">
                        Kembali
                    </a>

                    <a href="<?= site_url('admin/kendaraan/edit/'.$kendaraan->id) ?>"
                       class="btn btn-warning">
                        Edit
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>