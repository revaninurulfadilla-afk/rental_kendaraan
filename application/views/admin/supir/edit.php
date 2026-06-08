<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">
        Edit Supir
    </h1>

    <div class="card shadow">

        <div class="card-body">

            <form method="post">

                <div class="form-group">
                    <label>Nama Supir</label>
                    <input type="text"
                           name="nama"
                           value="<?= $supir->nama ?>"
                           class="form-control"
                           required>
                </div>

                <div class="form-group">
                    <label>No Telepon</label>
                    <input type="text"
                           name="telepon"
                           value="<?= $supir->telepon ?>"
                           class="form-control"
                           required>
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat"
                              class="form-control"
                              required><?= $supir->alamat ?></textarea>
                </div>

                <div class="form-group">
                    <label>Nomor SIM</label>
                    <input type="text"
                           name="sim"
                           value="<?= $supir->sim ?>"
                           class="form-control"
                           required>
                </div>

                <div class="form-group">
                    <label>Status</label>

                    <select name="status"
                            class="form-control">

                        <option value="tersedia"
                        <?= ($supir->status=='tersedia')?'selected':'' ?>>
                            Tersedia
                        </option>

                        <option value="bertugas"
                        <?= ($supir->status=='bertugas')?'selected':'' ?>>
                            Bertugas
                        </option>

                    </select>

                </div>

                <button type="submit"
                        class="btn btn-warning">
                    Update
                </button>

                <a href="<?= site_url('admin/supir') ?>"
                   class="btn btn-secondary">
                    Kembali
                </a>

            </form>

        </div>

    </div>

</div>