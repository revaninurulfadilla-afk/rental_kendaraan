<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">
        Data Supir
    </h1>

    <?php if($this->session->flashdata('success')){ ?>
        <div class="alert alert-success">
            <?= $this->session->flashdata('success'); ?>
        </div>
    <?php } ?>

    <a href="<?= site_url('admin/supir/tambah') ?>"
       class="btn btn-primary mb-3">

        <i class="fas fa-plus"></i>
        Tambah Supir

    </a>

    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Daftar Supir
            </h6>
        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered">

                    <thead>

                        <tr>
                            <th width="5%">No</th>
                            <th>Nama</th>
                            <th>Telepon</th>
                            <th>Alamat</th>
                            <th>No SIM</th>
                            <th>Status</th>
                            <th width="15%">Aksi</th>
                        </tr>

                    </thead>

                    <tbody>

                        <?php
                        $no = 1;
                        foreach($supir as $s){
                        ?>

                        <tr>

                            <td><?= $no++ ?></td>

                            <td><?= $s->nama ?></td>

                            <td><?= $s->telepon ?></td>

                            <td><?= $s->alamat ?></td>

                            <td><?= $s->sim ?></td>

                            <td>

                                <?php if($s->status == 'tersedia'){ ?>

                                    <span class="badge badge-success">
                                        Tersedia
                                    </span>

                                <?php }else{ ?>

                                    <span class="badge badge-danger">
                                        Bertugas
                                    </span>

                                <?php } ?>

                            </td>

                            <td>

                                <a href="<?= site_url('admin/supir/edit/'.$s->id) ?>"
                                   class="btn btn-warning btn-sm">

                                    Edit

                                </a>

                                <a href="<?= site_url('admin/supir/hapus/'.$s->id) ?>"
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('Hapus data supir?')">

                                    Hapus

                                </a>

                            </td>

                        </tr>

                        <?php } ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>