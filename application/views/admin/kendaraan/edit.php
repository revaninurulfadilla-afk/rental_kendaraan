<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">
        Edit Kendaraan
    </h1>

    <div class="card shadow">

        <div class="card-header bg-warning text-white">
            Edit Data Kendaraan
        </div>

        <div class="card-body">

            <form method="post" enctype="multipart/form-data">

                <div class="row">

                    <div class="col-md-6">

                        <div class="form-group">
                            <label>Kode Kendaraan</label>
                            <input type="text"
                                   name="kode_kendaraan"
                                   class="form-control"
                                   value="<?= $kendaraan->kode_kendaraan ?>">
                        </div>

                        <div class="form-group">
                            <label>Merk</label>
                            <input type="text"
                                   name="merk"
                                   class="form-control"
                                   value="<?= $kendaraan->merk ?>">
                        </div>

                        <div class="form-group">
                            <label>Nama Kendaraan</label>
                            <input type="text"
                                   name="nama_kendaraan"
                                   class="form-control"
                                   value="<?= $kendaraan->nama_kendaraan ?>">
                        </div>

                        <div class="form-group">
                            <label>Jenis</label>
                            <input type="text"
                                   name="jenis"
                                   class="form-control"
                                   value="<?= $kendaraan->jenis ?>">
                        </div>

                        <div class="form-group">
                            <label>Kelas</label>
                            <input type="text"
                                   name="kelas"
                                   class="form-control"
                                   value="<?= $kendaraan->kelas ?>">
                        </div>

                        <div class="form-group">
                            <label>Kelas Level</label>
                            <input type="number"
                                   name="kelas_level"
                                   class="form-control"
                                   value="<?= $kendaraan->kelas_level ?>">
                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="form-group">
                            <label>Tahun</label>
                            <input type="number"
                                   name="tahun"
                                   class="form-control"
                                   value="<?= $kendaraan->tahun ?>">
                        </div>

                        <div class="form-group">
                            <label>No Polisi</label>
                            <input type="text"
                                   name="no_polisi"
                                   class="form-control"
                                   value="<?= $kendaraan->no_polisi ?>">
                        </div>

                        <div class="form-group">
                            <label>Warna</label>
                            <input type="text"
                                   name="warna"
                                   class="form-control"
                                   value="<?= $kendaraan->warna ?>">
                        </div>

                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="tersedia" <?= $kendaraan->status=='tersedia'?'selected':'' ?>>Tersedia</option>
                                <option value="disewa" <?= $kendaraan->status=='disewa'?'selected':'' ?>>Disewa</option>
                                <option value="maintenance" <?= $kendaraan->status=='maintenance'?'selected':'' ?>>Maintenance</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Foto</label>

                            <br>

                            <img src="<?= base_url('assets/customer/images/'.$kendaraan->foto) ?>"
                                 width="150"
                                 class="mb-2">

                            <input type="file"
                                   name="foto"
                                   class="form-control">
                        </div>

                    </div>

                </div>

                <hr>

                <div class="row">

                    <div class="col-md-3">
                        <label>Tarif/Jam</label>
                        <input type="number"
                               name="tarif_jam"
                               class="form-control"
                               value="<?= $kendaraan->tarif_jam ?>">
                    </div>

                    <div class="col-md-3">
                        <label>Tarif/Hari</label>
                        <input type="number"
                               name="tarif_hari"
                               class="form-control"
                               value="<?= $kendaraan->tarif_hari ?>">
                    </div>

                    <div class="col-md-3">
                        <label>Tarif/Minggu</label>
                        <input type="number"
                               name="tarif_minggu"
                               class="form-control"
                               value="<?= $kendaraan->tarif_minggu ?>">
                    </div>

                    <div class="col-md-3">
                        <label>Tarif/Bulan</label>
                        <input type="number"
                               name="tarif_bulan"
                               class="form-control"
                               value="<?= $kendaraan->tarif_bulan ?>">
                    </div>

                </div>

                <div class="form-group mt-3">
                    <label>Denda Per Jam</label>
                    <input type="number"
                           name="denda_per_jam"
                           class="form-control"
                           value="<?= $kendaraan->denda_per_jam ?>">
                </div>

                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi"
                              rows="5"
                              class="form-control"><?= $kendaraan->deskripsi ?></textarea>
                </div>

                <button type="submit" class="btn btn-warning">
                    Update
                </button>

                <a href="<?= site_url('admin/kendaraan') ?>"
                   class="btn btn-secondary">
                    Kembali
                </a>

            </form>

        </div>

    </div>

</div>