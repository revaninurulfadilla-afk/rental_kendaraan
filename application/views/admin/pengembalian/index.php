<div class="container-fluid">

    <h1 class="h3 mb-4">
        Data Pengembalian
    </h1>

    <div class="card shadow">

        <div class="card-body">

            <table class="table table-bordered">

                <thead>

                <tr>
                    <th>Kode Transaksi</th>
                    <th>Kendaraan</th>
                    <th>Tanggal Pengajuan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>

                </thead>

                <tbody>

                <?php foreach($pengembalian as $p): ?>

                <tr>

                    <td><?= $p->kode_transaksi ?></td>

                    <td>
                        <?= $p->merk ?>
                        -
                        <?= $p->nama_kendaraan ?>
                    </td>

                    <td>
                        <?= date('d-m-Y H:i',strtotime($p->created_at)) ?>
                    </td>

                    <td>

                        <span class="badge badge-warning">
                            Menunggu Verifikasi
                        </span>

                    </td>

                    <td>

                        <a href="#"
                           class="btn btn-primary btn-sm">

                            Detail

                        </a>

                    </td>

                </tr>

                <?php endforeach; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>