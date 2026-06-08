<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">
        Tambah Pelanggan
    </h1>

    <div class="card shadow mb-4">

        <div class="card-header py-3 bg-primary text-white">
            <h6 class="m-0 font-weight-bold">
                Form Tambah Pelanggan
            </h6>
        </div>

        <div class="card-body">

            <form method="post"
                  action="<?= site_url('admin/pelanggan/tambah') ?>">

                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text"
                           name="nama"
                           class="form-control"
                           required>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email"
                           name="email"
                           class="form-control"
                           required>
                </div>

                <div class="form-group">
                    <label>No Telepon</label>
                    <input type="text"
                           name="telepon"
                           class="form-control">
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat"
                              class="form-control"
                              rows="4"></textarea>
                </div>

                <div class="form-group">
                    <label>Status Pelanggan</label>

                    <select name="is_pelanggan_lama"
                            class="form-control">

                        <option value="0">
                            Pelanggan Baru
                        </option>

                        <option value="1">
                            Pelanggan Lama
                        </option>

                    </select>
                </div>

                <button type="submit"
                        class="btn btn-success">
                    <i class="fas fa-save"></i>
                    Simpan
                </button>

                <a href="<?= site_url('admin/pelanggan') ?>"
                   class="btn btn-secondary">
                    Kembali
                </a>

            </form>

        </div>

    </div>

</div>