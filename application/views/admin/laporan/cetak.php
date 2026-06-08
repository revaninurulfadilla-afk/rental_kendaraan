<!DOCTYPE html>
<html>
<head>
    <title>Cetak Laporan Pendapatan</title>

    <style>
        body{
            font-family: Arial, sans-serif;
        }

        h2{
            text-align:center;
        }

        table{
            border-collapse: collapse;
            width:100%;
        }

        table th,
        table td{
            border:1px solid #000;
            padding:8px;
        }

        table th{
            background:#f2f2f2;
        }

        .text-right{
            text-align:right;
        }
    </style>

</head>
<body>

<h2>LAPORAN PENDAPATAN RENTAL KENDARAAN</h2>

<table>

    <tr>
        <th>No</th>
        <th>Kode Transaksi</th>
        <th>Pelanggan</th>
        <th>Kendaraan</th>
        <th>Total Bayar</th>
    </tr>

    <?php
    $no = 1;
    $total_pendapatan = 0;
    ?>

    <?php foreach($laporan as $l): ?>

    <?php $total_pendapatan += $l->total_bayar; ?>

    <tr>
        <td><?= $no++ ?></td>
        <td><?= $l->kode_transaksi ?></td>
        <td><?= $l->nama ?></td>
        <td><?= $l->merk ?> - <?= $l->nama_kendaraan ?></td>
        <td class="text-right">
            Rp<?= number_format($l->total_bayar,0,',','.') ?>
        </td>
    </tr>

    <?php endforeach; ?>

    <tr>
        <th colspan="4" class="text-right">
            TOTAL PENDAPATAN
        </th>

        <th class="text-right">
            Rp<?= number_format(
                $total_pendapatan,
                0,
                ',',
                '.'
            ) ?>
        </th>
    </tr>

</table>

<br><br>

<div style="width:250px;float:right;text-align:center;">
    <p><?= date('d F Y') ?></p>
    <br><br><br>
    <p><b>Administrator</b></p>
</div>

<script>
window.print();
</script>

</body>
</html>