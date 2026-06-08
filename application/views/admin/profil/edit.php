<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">
        Edit Profil
    </h1>

    <div class="card shadow">

        <div class="card-body">

            <form method="post">

                <div class="form-group">
                    <label>Nama</label>
                    <input type="text"
                           name="nama"
                           class="form-control"
                           value="<?= $user->nama ?>"
                           required>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email"
                           name="email"
                           class="form-control"
                           value="<?= $user->email ?>"
                           required>
                </div>

                <div class="form-group">
                    <label>Password Baru</label>
                    <input type="password"
                           name="password"
                           class="form-control">

                    <small class="text-muted">
                        Kosongkan jika tidak ingin mengganti password
                    </small>
                </div>

                <button type="submit"
                        class="btn btn-primary">

                    Simpan
                </button>

                <a href="<?= site_url('admin/profil') ?>"
                   class="btn btn-secondary">

                    Kembali
                </a>

            </form>

        </div>

    </div>

</div>