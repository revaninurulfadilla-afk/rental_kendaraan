<!DOCTYPE html>
<html>
<head>

    <title>Kwitansi Pembayaran</title>

    <style>

        body{
            font-family: Arial;
            margin:40px;
        }

        .box{
            border:2px solid #000;
            padding:25px;
        }

        h2{
            text-align:center;
            margin-bottom:5px;
        }

        h4{
            text-align:center;
            margin-top:0;
        }

        table{
            width:100%;
            margin-top:20px;
        }

        td{
            padding:8px;
        }

        .total{
            font-size:22px;
            font-weight:bold;
            color:green;
        }

    </style>

</head>

<body>

<div class="box">

    <h2>KWITANSI PEMBAYARAN</h2>

    <h4>MRS RENTAL KENDARAAN</h4>

    <hr>

    <table>

        <tr>
            <td width="200">No Transaksi</td>
            <td>: <?= $pembayaran->kode_transaksi ?></td>
        </tr>

        <tr>
            <td>Pelanggan</td>
            <td>: <?= $pembayaran->nama ?></td>
        </tr>

        <tr>
            <td>Kendaraan</td>
            <td>
                : <?= $pembayaran->merk ?>
                <?= $pembayaran->nama_kendaraan ?>
            </td>
        </tr>

        <tr>
            <td>Tanggal</td>
            <td>
                : <?= date('d-m-Y',strtotime($pembayaran->created_at)) ?>
            </td>
        </tr>

        <tr>
            <td>Total Bayar</td>
            <td class="total">
                Rp<?= number_format(
                    $pembayaran->total_bayar,
                    0,
                    ',',
                    '.'
                ) ?>
            </td>
        </tr>

    </table>

    <br><br>

    <div style="width:250px;float:right;text-align:center">

        <?= date('d F Y') ?>

        <br><br><br><br>

        ___________________

        <br>

        Administrator

    </div>

</div>

<script>
window.print();
</script>

</body>
</html>