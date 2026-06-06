<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">
        Dashboard Admin
    </h1>

    <div class="row">

        <div class="col-md-3">
            <div class="card border-left-primary shadow mb-4">
                <div class="card-body">
                    <h3><?= $total_kendaraan ?></h3>
                    <p>Kendaraan</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-left-success shadow mb-4">
                <div class="card-body">
                    <h3><?= $total_pelanggan ?></h3>
                    <p>Pelanggan</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-left-warning shadow mb-4">
                <div class="card-body">
                    <h3><?= $total_supir ?></h3>
                    <p>Supir</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-left-danger shadow mb-4">
                <div class="card-body">
                    <h3><?= $total_transaksi ?></h3>
                    <p>Transaksi</p>
                </div>
            </div>
        </div>

    </div>

</div>