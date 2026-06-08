<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">
        Tambah Supir
    </h1>

    <div class="card shadow">

        <div class="card-body">

            <form method="post">

                <div class="form-group">
                    <label>Nama Supir</label>
                    <input type="text"
                           name="nama"
                           class="form-control"
                           required>
                </div>

                <div class="form-group">
                    <label>No Telepon</label>
                    <input type="text"
                           name="telepon"
                           class="form-control"
                           required>
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat"
                              class="form-control"
                              required></textarea>
                </div>

                <div class="form-group">
                    <label>Nomor SIM</label>
                    <input type="text"
                           name="sim"
                           class="form-control"
                           required>
                </div>

                <button type="submit"
                        class="btn btn-primary">
                    Simpan
                </button>

                <a href="<?= site_url('admin/supir') ?>"
                   class="btn btn-secondary">
                    Kembali
                </a>

            </form>

        </div>

    </div>

</div>