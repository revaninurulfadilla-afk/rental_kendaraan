<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 text-gray-800">
            Dashboard
        </h1>
    </div>

    <!-- CARD STATISTIK -->
    <div class="row">

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card shadow border-left-primary">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Kendaraan
                    </div>

                    <div class="h3 mb-0 font-weight-bold">
                        <?= $total_kendaraan ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card shadow border-left-success">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Pelanggan
                    </div>

                    <div class="h3 mb-0 font-weight-bold">
                        <?= $total_pelanggan ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card shadow border-left-warning">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                        Supir
                    </div>

                    <div class="h3 mb-0 font-weight-bold">
                        <?= $total_supir ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card shadow border-left-danger">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                        Transaksi
                    </div>

                    <div class="h3 mb-0 font-weight-bold">
                        <?= $total_transaksi ?>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- GRAFIK DAN STATUS -->
    <div class="row">

        <div class="col-lg-8">

            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Statistik Penyewaan
                    </h6>
                </div>

                <div class="card-body">

                    <canvas id="chartPenyewaan"></canvas>

                </div>

            </div>

        </div>

        <div class="col-lg-4">

            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Status Kendaraan
                    </h6>
                </div>

                <div class="card-body">

                    <h6>
                        Tersedia
                        <span class="float-right">
                            <?= $kendaraan_tersedia ?>
                        </span>
                    </h6>

                    <div class="progress mb-3">
                        <div class="progress-bar bg-success"
                             style="width:100%">
                        </div>
                    </div>

                    <h6>
                        Disewa
                        <span class="float-right">
                            <?= $kendaraan_disewa ?>
                        </span>
                    </h6>

                    <div class="progress mb-3">
                        <div class="progress-bar bg-warning"
                             style="width:100%">
                        </div>
                    </div>

                    <h6>
                        Maintenance
                        <span class="float-right">
                            <?= $kendaraan_maintenance ?>
                        </span>
                    </h6>

                    <div class="progress">
                        <div class="progress-bar bg-danger"
                             style="width:100%">
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- TRANSAKSI TERBARU -->
    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Transaksi Terbaru
            </h6>
        </div>

        <div class="card-body">

            <table class="table table-bordered">

                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Pelanggan</th>
                        <th>Kendaraan</th>
                        <th>Total</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>

                <?php foreach($transaksi_terbaru as $t): ?>

                    <tr>

                        <td><?= $t->kode_transaksi ?></td>

                        <td><?= $t->nama ?></td>

                        <td><?= $t->merk ?></td>

                        <td>
                            Rp<?= number_format($t->total_bayar,0,',','.') ?>
                        </td>

                        <td>
                            <span class="badge badge-success">
                                <?= ucfirst($t->status) ?>
                            </span>
                        </td>

                    </tr>

                <?php endforeach; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
var ctx = document.getElementById('chartPenyewaan');

new Chart(ctx,{
    type:'line',
    data:{
        labels:['Jan','Feb','Mar','Apr','Mei','Jun'],
        datasets:[{
            label:'Penyewaan',
            data:[12,19,8,15,25,30],
            borderColor:'#4e73df',
            backgroundColor:'rgba(78,115,223,.2)',
            fill:true
        }]
    }
});
</script>