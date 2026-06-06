<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">
        Profil Admin
    </h1>

    <div class="row">

        <div class="col-lg-4">

            <div class="card shadow">

                <div class="card shadow">

    <div class="card-body text-center">

        <img src="https://ui-avatars.com/api/?name=<?= urlencode($user->nama) ?>&background=4e73df&color=fff"
             class="rounded-circle mb-3"
             width="120">

        <h4 class="font-weight-bold">
            <?= $user->nama; ?>
        </h4>

        <span class="badge badge-primary">
            Administrator
        </span>

        <hr>

        <p class="text-muted mb-0">
            <?= $user->email; ?>
        </p>

    </div>

</div>

            </div>

        </div>

        <div class="col-lg-8">

            <div class="card shadow">

                <div class="card-header">

                    <h5 class="mb-0">
                        Informasi Akun
                    </h5>

                </div>

                <div class="card-body">

                    <table class="table table-bordered">

                        <tr>
                            <th width="200">
                                Nama
                            </th>

                            <td>
                                <?= $user->nama; ?>
                            </td>
                        </tr>

                        <tr>
                            <th>
                                Email
                            </th>

                            <td>
                                <?= $user->email; ?>
                            </td>
                        </tr>

                        <tr>
                            <th>
                                Role
                            </th>

                            <td>
                                <?= ucfirst($user->role); ?>
                            </td>
                        </tr>

                        <tr>
                            <th>
                                Status
                            </th>

                            <td>

                                <?php if($user->status == 'aktif'): ?>

                                    <span class="badge badge-success">
                                        Aktif
                                    </span>

                                <?php else: ?>

                                    <span class="badge badge-danger">
                                        Non Aktif
                                    </span>

                                <?php endif; ?>

                            </td>
                        </tr>

                        <tr>
                            <th>
                                Dibuat
                            </th>

                            <td>
                                <?= date(
                                    'd-m-Y H:i',
                                    strtotime($user->created_at)
                                ); ?>
                            </td>
                        </tr>

                    </table>

                    <a href="<?= site_url('admin/profil/edit'); ?>"
                       class="btn btn-warning">

                        <i class="fas fa-edit"></i>
                        Edit Profil

                    </a>

                    <a href="<?= site_url('admin/profil/password'); ?>"
                       class="btn btn-primary">

                        <i class="fas fa-key"></i>
                        Ubah Password

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>