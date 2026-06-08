<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header">
            <h4>Form Pengembalian Kendaraan</h4>
        </div>

        <div class="card-body">

        <pre>
<?= $transaksi->tgl_selesai ?>
<?= $transaksi->denda_per_jam ?>
</pre>

            <form method="post"
                  enctype="multipart/form-data"
                  action="<?= site_url('customer/pengembalian/simpan/'.$transaksi->id) ?>">

                <div class="form-group">

                    <label>Tanggal Pengembalian</label>

                    <input type="datetime-local"
                           name="tanggal_pengembalian"
                           class="form-control"
                           required>
                    <input type="hidden"
       id="tgl_selesai"
       value="<?= date('Y-m-d\TH:i', strtotime($transaksi->tgl_selesai)) ?>">

                    <input type="hidden"
                        id="denda_per_jam"
                        value="<?= !empty($transaksi->denda_per_jam) ? $transaksi->denda_per_jam : 25000 ?>">

                </div>

                <div class="alert alert-warning mt-3">

    <strong>Status Pengembalian</strong>

    <hr>

    Terlambat :
    <span id="terlambat">0 Jam</span>

    <br>

    Denda :
    <span id="denda">Rp0</span>

</div>

                <div class="form-group">

                    <label>Foto Kendaraan</label>

                    <input type="file"
                           name="foto_kendaraan"
                           class="form-control"
                           required>

                </div>

                <div class="form-group">

                    <label>Keterangan</label>

                    <textarea name="keterangan"
                              class="form-control"
                              rows="4"></textarea>

                </div>

                <button class="btn btn-primary">

                    Kirim Pengajuan

                </button>

            </form>

        </div>

    </div>

</div>

<script>

document.addEventListener('DOMContentLoaded', function(){

    const tanggal = document.querySelector(
        '[name="tanggal_pengembalian"]'
    );

    if(!tanggal) return;

    tanggal.addEventListener('change', function(){

        let selesai = new Date(
            document.getElementById('tgl_selesai').value
                .replace(' ','T')
        );

        let kembali = new Date(this.value);

        let dendaPerJam = parseFloat(
            document.getElementById('denda_per_jam').value
        );

        let selisih = kembali - selesai;

        let terlambat = 0;
        let denda = 0;

        if(selisih > 0)
        {
            terlambat = Math.ceil(
                selisih / (1000 * 60 * 60)
            );

            denda = terlambat * dendaPerJam;
        }

        document.getElementById('terlambat').innerHTML =
            terlambat + ' Jam';

        document.getElementById('denda').innerHTML =
            'Rp' + denda.toLocaleString('id-ID');

    });

});

</script>