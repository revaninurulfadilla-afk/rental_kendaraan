<section class="ftco-section">
<div class="container">

<div class="row justify-content-center">
<div class="col-md-8">

<div class="card">
<div class="card-header">
    Upload Pembayaran
</div>

<div class="card-body">

<form method="post"
      action="<?= site_url('customer/pembayaran/simpan') ?>"
      enctype="multipart/form-data">

<input type="hidden"
       name="transaksi_id"
       value="<?= $transaksi->id ?>">

<div class="form-group">
    <label>Kode Transaksi</label>
    <input type="text"
           class="form-control"
           value="<?= $transaksi->kode_transaksi ?>"
           readonly>
</div>

<div class="form-group">
    <label>Total Bayar</label>

    <input type="text"
           class="form-control"
           value="Rp<?= number_format($transaksi->total_bayar,0,',','.') ?>"
           readonly>

    <input type="hidden"
           name="jumlah_bayar"
           value="<?= $transaksi->total_bayar ?>">
</div>

<div class="form-group">
    <label>Metode Pembayaran</label>

   <select name="metode_pembayaran"
        id="metode"
        class="form-control">

    <option value="">Pilih Metode</option>
    <option value="transfer">Transfer Bank</option>
    <option value="cash">Cash</option>

</select>
    </select>
</div>

<div id="bukti-transfer" style="display:none;">

    <div class="form-group">
        <label>Upload Bukti Transfer</label>

        <input type="file"
               name="bukti"
               class="form-control">
    </div>

</div>

<button type="submit"
        class="btn btn-primary">

    Kirim Pembayaran

</button>

</form>
<script>

document.getElementById('metode').onchange = function(){

    if(this.value == 'transfer')
    {
        document.getElementById('bukti-transfer').style.display = 'block';
    }
    else
    {
        document.getElementById('bukti-transfer').style.display = 'none';
    }

}

</script>
</div>
</div>

</div>
</div>

</div>
</section>