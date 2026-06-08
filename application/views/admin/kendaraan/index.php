<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h1 class="h3 text-gray-800 mb-0">
            <i class="fas fa-car"></i>
            Data Kendaraan
        </h1>

        <a href="<?= site_url('admin/kendaraan/tambah') ?>"
           class="btn btn-primary shadow">

            <i class="fas fa-plus"></i>
            Tambah Kendaraan

        </a>

    </div>

    <div class="row">

        <!-- FILTER -->
        <br><div class="col-md-3">

            <div class="card shadow mb-4">
                <div class="card-header">
                    <b>Filter Kendaraan</b>
                </div>

                <div class="card-body">

                    <form method="get">

                        <div class="form-group">
                            <label>Jenis</label>
                            <select name="jenis" class="form-control">
                                <option value="">Semua</option>
                                <option>Sedan</option>
                                <option>MPV</option>
                                <option>SUV</option>
                                <option>Minibus</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Kelas</label>
                            <select name="kelas" class="form-control">
                                <option value="">Semua</option>
                                <option>Ekonomi</option>
                                <option>Menengah</option>
                                <option>Premium</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="">Semua</option>
                                <option>tersedia</option>
                                <option>disewa</option>
                                <option>maintenance</option>
                            </select>
                        </div>

                        <button class="btn btn-primary btn-block">
                            Filter
                        </button>

                    </form>

                </div>
            </div>

        </div>

        <!-- LIST KENDARAAN -->
        <div class="col-md-9">

            <div class="row">

                <?php foreach($kendaraan as $k): ?>

                <div class="col-lg-6 mb-4">

                    <div class="card shadow h-100">

                        <img src="<?= base_url('assets/customer/images/'.$k->foto) ?>"
                             class="card-img-top"
                             style="height:200px;object-fit:cover;">

                        <div class="card-body">

                            <h5>
                                <?= $k->merk ?>
                            </h5>

                            <p>
                                <?= $k->nama_kendaraan ?>
                            </p>

                            <span class="badge badge-info">
                                <?= $k->kelas ?>
                            </span>

                            <span class="badge badge-success">
                                <?= ucfirst($k->status) ?>
                            </span>

                            <hr>

                            <h6>
                                Rp<?= number_format($k->tarif_hari,0,',','.') ?>/hari
                            </h6>

                        </div>

                        <div class="card-footer">

                            <a href="<?= site_url('admin/kendaraan/detail/'.$k->id) ?>"
                               class="btn btn-info btn-sm">
                                Detail
                            </a>

                            <a href="<?= site_url('admin/kendaraan/edit/'.$k->id) ?>"
                               class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <a href="<?= site_url('admin/kendaraan/hapus/'.$k->id) ?>"
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Yakin hapus?')">
                                Hapus
                            </a>

                        </div>

                    </div>

                </div>

                <?php endforeach; ?>

            </div>

        </div>

    </div>

</div>