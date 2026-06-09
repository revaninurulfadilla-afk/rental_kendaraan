<div class="container-fluid">

    <h1 class="h3 mb-4">
        Detail Pengembalian
    </h1>

    <div class="card shadow">

        <div class="card-header bg-primary text-white">

            Detail Pengembalian

        </div>

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
                <strong>Tanggal Sewa :</strong>
                <?= date('d-m-Y H:i',strtotime($pengembalian->tgl_mulai)) ?>
            </p>

            <p>
                <strong>Batas Kembali :</strong>
                <?= date('d-m-Y H:i',strtotime($pengembalian->tgl_selesai)) ?>
            </p>

            <p>
                <strong>Tanggal Pengembalian :</strong>
                <?= date('d-m-Y H:i',strtotime($pengembalian->tanggal_pengembalian)) ?>
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
<br>

<?php if($pengembalian->status != 'selesai'): ?>

<a href="<?= site_url('admin/pengembalian/proses/'.$pengembalian->id) ?>"
   class="btn btn-success"
   onclick="return confirm('Proses pengembalian ini?')">

    <i class="fas fa-check"></i>
    Proses Pengembalian

</a>

<?php else: ?>

<button class="btn btn-secondary" disabled>
    Sudah Diproses
</button>

<?php endif; ?>

        </div>

    </div>

</div>