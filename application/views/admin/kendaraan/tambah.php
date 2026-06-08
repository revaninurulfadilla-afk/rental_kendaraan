<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-plus-circle"></i>
        Tambah Kendaraan
    </h1>

    <div class="card shadow">

        <div class="card-header bg-primary text-white">
            Form Tambah Kendaraan
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
                                   required>
                        </div>

                        <div class="form-group">
                            <label>Merk</label>
                            <input type="text"
                                   name="merk"
                                   class="form-control"
                                   required>
                        </div>

                        <div class="form-group">
                            <label>Nama Kendaraan</label>
                            <input type="text"
                                   name="nama_kendaraan"
                                   class="form-control"
                                   required>
                        </div>

                        <div class="form-group">
                            <label>Jenis</label>
                            <select name="jenis" class="form-control">
                                <option value="">Pilih Jenis</option>
                                <option>Sedan</option>
                                <option>MPV</option>
                                <option>SUV</option>
                                <option>Box</option>
                                <option>Bak Terbuka</option>
                                <option>Minibus</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Kelas</label>
                            <select name="kelas" class="form-control">
                                <option value="">Pilih Kelas</option>
                                <option>Ekonomi</option>
                                <option>Menengah</option>
                                <option>Premium</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Kelas Level</label>
                            <input type="number"
                                   name="kelas_level"
                                   class="form-control"
                                   required>
                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="form-group">
                            <label>Tahun</label>
                            <input type="number"
                                   name="tahun"
                                   class="form-control"
                                   required>
                        </div>

                        <div class="form-group">
                            <label>No Polisi</label>
                            <input type="text"
                                   name="no_polisi"
                                   class="form-control"
                                   required>
                        </div>

                        <div class="form-group">
                            <label>Warna</label>
                            <input type="text"
                                   name="warna"
                                   class="form-control"
                                   required>
                        </div>

                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="tersedia">Tersedia</option>
                                <option value="disewa">Disewa</option>
                                <option value="maintenance">Maintenance</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Foto Kendaraan</label>
                            <input type="file"
                                   name="foto"
                                   class="form-control">
                        </div>

                    </div>

                </div>

                <hr>

                <h5>Tarif Sewa</h5>

                <div class="row">

                    <div class="col-md-3">
                        <label>Tarif/Jam</label>
                        <input type="number"
                               name="tarif_jam"
                               class="form-control"
                               required>
                    </div>

                    <div class="col-md-3">
                        <label>Tarif/Hari</label>
                        <input type="number"
                               name="tarif_hari"
                               class="form-control"
                               required>
                    </div>

                    <div class="col-md-3">
                        <label>Tarif/Minggu</label>
                        <input type="number"
                               name="tarif_minggu"
                               class="form-control"
                               required>
                    </div>

                    <div class="col-md-3">
                        <label>Tarif/Bulan</label>
                        <input type="number"
                               name="tarif_bulan"
                               class="form-control"
                               required>
                    </div>

                </div>

                <div class="form-group mt-3">
                    <label>Denda Per Jam</label>
                    <input type="number"
                           name="denda_per_jam"
                           class="form-control"
                           required>
                </div>

                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi"
                              rows="5"
                              class="form-control"></textarea>
                </div>

                <button type="submit"
                        class="btn btn-success">
                    <i class="fas fa-save"></i>
                    Simpan
                </button>

                <a href="<?= site_url('admin/kendaraan') ?>"
                   class="btn btn-secondary">
                    Kembali
                </a>

            </form>

        </div>

    </div>

</div>