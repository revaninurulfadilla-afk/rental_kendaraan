<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">
        Data Pelanggan
    </h1>

    <a href="<?= site_url('admin/pelanggan/tambah'); ?>" class="btn btn-primary mb-3">
    <i class="fas fa-plus"></i> Tambah</a>


    <div class="card shadow">

        <div class="card-header bg-primary text-white">

            <h5 class="mb-0">
                Daftar Pelanggan
            </h5>

        </div>

        


        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover">

                    <thead>

                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No HP</th>
                            <th>Total Sewa</th>
                            <th>Status</th>
                            <th width="120">Aksi</th>
                        </tr>

                    </thead>

                    <tbody>

                    <?php $no=1; foreach($pelanggan as $p): ?>

                    <tr>

                        <td><?= $no++ ?></td>

                        <td><?= $p->nama ?></td>

                        <td><?= $p->email ?></td>

                        <td><?= $p->telepon ?></td>

                        <td>Rp<?= number_format($p->total_bayar,0,',','.') ?></td>

                        <td>

                            <?php if($p->is_pelanggan_lama == 1): ?>

                                <span class="badge badge-success">
                                    Pelanggan Lama
                                </span>

                            <?php else: ?>

                                <span class="badge badge-secondary">
                                    Pelanggan Baru
                                </span>

                            <?php endif; ?>

                        </td>

                        <td>

                            <a href="<?= site_url('admin/pelanggan/edit/'.$p->id) ?>"
                               class="btn btn-info btn-warning">
                                edit

                            </a>
                            <a href="<?= site_url('pelanggan/hapus/'.$p->id); ?>" 
                            onclick="return confirm('Yakin?')" 
                            class="btn btn-danger btn-sm">Hapus</a>

                            



                        </td>

                    </tr>

                    <?php endforeach; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>