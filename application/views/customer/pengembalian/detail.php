<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">
        Detail Pengembalian
    </h1>

    <div class="card shadow">

        <div class="card-body">

            <p>
                <strong>Kode Transaksi :</strong>
                <?= $pengembalian->kode_transaksi ?>
            </p>

            <p>
                <strong>Pelanggan :</strong>
                <?= $pengembalian->nama ?>
            </p>

            <p>
                <strong>Kendaraan :</strong>
                <?= $pengembalian->merk ?>
                -
                <?= $pengembalian->nama_kendaraan ?>
            </p>

            <p>
                <strong>Terlambat :</strong>
                <?= $pengembalian->terlambat_jam ?> Jam
            </p>

            <p>
                <strong>Denda :</strong>
                Rp<?= number_format($pengembalian->denda,0,',','.') ?>
            </p>

            <p>
                <strong>Keterangan :</strong>
                <?= $pengembalian->keterangan ?>
            </p>

            <hr>

            <h5>Foto Kendaraan</h5>

            <?php if(!empty($pengembalian->foto_kendaraan)): ?>

                <img src="<?= base_url('assets/upload/pengembalian/'.$pengembalian->foto_kendaraan) ?>"
                     class="img-fluid img-thumbnail"
                     width="500">

            <?php else: ?>

                <div class="alert alert-warning">
                    Foto tidak tersedia
                </div>

            <?php endif; ?>

        </div>

    </div>

</div>