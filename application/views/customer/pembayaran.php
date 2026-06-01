<!DOCTYPE html>
<html>
<head>
    <title>Pembayaran</title>

    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <style>

    body{
        background:#f4f6f9;
    }

    .card-payment{
        max-width:900px;
        margin:40px auto;
        border:none;
        border-radius:20px;
        overflow:hidden;
        box-shadow:0 10px 30px rgba(0,0,0,.08);
    }

    .header{
        background:#0d6efd;
        color:white;
        padding:25px;
        font-size:28px;
        font-weight:700;
    }

    .total-box{
        background:#f8f9fa;
        border-radius:15px;
        padding:30px;
        text-align:center;
        height:100%;
    }

    .total-box h5{
        color:#666;
    }

    .harga{
        font-size:45px;
        font-weight:bold;
        color:#0d6efd;
    }

    .info-box{
        background:white;
        border:1px solid #eee;
        border-radius:15px;
        padding:20px;
    }

    .btn-bayar{
        height:55px;
        font-size:20px;
        border-radius:12px;
    }

    .rekening{
        background:#e9f3ff;
        padding:15px;
        border-radius:10px;
        margin-bottom:15px;
    }

    </style>
</head>
<body>

<div class="container">

<div class="card card-payment">

    <div class="header">
        Pembayaran Penyewaan
    </div>

    <div class="card-body p-4">

        <form method="post"
              enctype="multipart/form-data"
              action="<?= site_url('customer/pembayaran/simpan') ?>">

            <input type="hidden"
                   name="id_penyewaan"
                   value="<?= $sewa->id_penyewaan ?>">

            <input type="hidden"
                   name="jumlah_bayar"
                   value="<?= $sewa->total_biaya ?>">

            <div class="row">

                <div class="col-md-7">

                    <div class="info-box">

                        <h5>Detail Penyewaan</h5>
                        <hr>

                        <p>
                            <strong>ID Penyewaan :</strong><br>
                            <?= $sewa->id_penyewaan ?>
                        </p>

                        <p>
                            <strong>Tanggal Mulai :</strong><br>
                            <?= $sewa->tanggal_mulai ?>
                        </p>

                        <p>
                            <strong>Tanggal Selesai :</strong><br>
                            <?= $sewa->tanggal_selesai ?>
                        </p>

                        <p>
                            <strong>Durasi :</strong><br>
                            <?= $sewa->durasi ?> Hari
                        </p>

                    </div>

                </div>

                <div class="col-md-5">

                    <div class="total-box">

                        <h5>Total Pembayaran</h5>

                        <div class="harga">
                            Rp<?= number_format($sewa->total_biaya,0,',','.') ?>
                        </div>

                    </div>

                </div>

            </div>

            <hr class="my-4">

            <div class="form-group">

                <label>Metode Pembayaran</label>

                <select class="form-control"
                        id="metode"
                        name="metode_pembayaran"
                        required>

                    <option value="">-- Pilih Metode --</option>
                    <option value="Transfer">Transfer Bank</option>
                    <option value="Tunai">Tunai</option>

                </select>

            </div>

            <div id="transfer-box" style="display:none;">

                <div class="rekening">

                    <strong>Transfer ke:</strong><br>

                    BCA : 1234567890<br>
                    A/N Rental Kendaraan

                </div>

                <div class="form-group">

                    <label>Upload Bukti Transfer</label>

                    <input type="file"
                           name="bukti_transfer"
                           class="form-control">

                </div>

            </div>

            <button type="submit"
                    class="btn btn-success btn-block btn-bayar">

                Bayar Sekarang

            </button>

        </form>

    </div>

</div>

</div>

<script>

document.getElementById('metode').addEventListener('change',function(){

    if(this.value=='Transfer'){
        document.getElementById('transfer-box').style.display='block';
    }else{
        document.getElementById('transfer-box').style.display='none';
    }

});

</script>

</body>
</html>