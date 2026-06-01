<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Form Penyewaan</title>

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <style>
        body{
            background:#f8f9fa;
        }

        .card-sewa{
            margin-top:40px;
            margin-bottom:40px;
            border:none;
            border-radius:15px;
            overflow:hidden;
        }

        .foto-mobil{
            width:100%;
            height:350px;
            object-fit:cover;
        }

        .judul{
            font-weight:600;
            margin-bottom:20px;
        }

        .harga{
            font-size:24px;
            font-weight:700;
            color:#007bff;
        }

        .info-box{
            background:#f1f5f9;
            padding:15px;
            border-radius:10px;
            margin-top:15px;
        }

        .btn-sewa{
            border-radius:8px;
            padding:12px;
            font-weight:600;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="card card-sewa shadow">

        <div class="row no-gutters">

            <!-- DETAIL MOBIL -->
            <div class="col-md-5">

                <img src="<?= base_url('assets/customer/images/'.$kendaraan->gambar) ?>"
                     class="foto-mobil">

                <div class="p-4">

                    <h3><?= $kendaraan->merk ?></h3>

                    <span class="badge badge-success">
                        <?= $kendaraan->status_ketersediaan ?>
                    </span>

                    <hr>

                    <p>
                        <strong>Jenis Kendaraan :</strong><br>
                        <?= $kendaraan->jenis_kendaraan ?>
                    </p>

                    <p>
                        <strong>Kelas Kendaraan :</strong><br>
                        <?= $kendaraan->kelas_kendaraan ?>
                    </p>

                    <p>
                        <strong>Plat Nomor :</strong><br>
                        <?= $kendaraan->plat_nomor ?>
                    </p>

                    <p>
                        <strong>Tahun Produksi :</strong><br>
                        <?= $kendaraan->tahun_produksi ?>
                    </p>

                    <div class="harga">
                        Rp<?= number_format($kendaraan->harga_sewa,0,',','.') ?>
                        <small>/hari</small>
                    </div>

                </div>

            </div>

            <!-- FORM -->
            <div class="col-md-7">

                <div class="p-5">

                    <h2 class="judul">
                        Form Penyewaan Kendaraan
                    </h2>

                    <form method="post"
                          action="<?= site_url('customer/penyewaan/simpan') ?>">

                        <input type="hidden"
                               name="id_kendaraan"
                               value="<?= $kendaraan->id_kendaraan ?>">

                        <div class="form-group">
                            <label>Tanggal Mulai</label>

                            <input type="date"
                                   name="tanggal_mulai"
                                   class="form-control"
                                   required>
                        </div>

                        <div class="form-group">
                            <label>Tanggal Selesai</label>

                            <input type="date"
                                   name="tanggal_selesai"
                                   class="form-control"
                                   required>
                        </div>

                        <div class="form-group">
                            <label>Metode Pengembalian</label>

                            <select name="metode_pengembalian"
                                    class="form-control"
                                    required>

                                <option value="">
                                    -- Pilih Metode --
                                </option>

                                <option value="Ambil Sendiri">
                                    Ambil Sendiri
                                </option>

                                <option value="Diantar">
                                    Diantar
                                </option>

                            </select>
                        </div>

                        <?php if(isset($supir) && !empty($supir)){ ?>

                        <div class="form-group">

                            <label>Pilih Supir</label>

                            <select name="id_supir"
                                    class="form-control">

                                <option value="">
                                    -- Pilih Supir --
                                </option>

                                <?php foreach($supir as $s){ ?>

                                <option value="<?= $s->id_supir ?>">
                                    <?= $s->nama ?>
                                </option>

                                <?php } ?>

                            </select>

                        </div>

                        <?php } ?>

                        <div class="info-box">

                            <h6>Informasi Penyewaan</h6>

                            <ul class="mb-0">
                                <li>Harga dihitung berdasarkan jumlah hari sewa.</li>
                                <li>Kendaraan akan otomatis berubah menjadi status disewa.</li>
                                <li>Setelah penyewaan berhasil, Anda akan diarahkan ke halaman pembayaran.</li>
                            </ul>

                        </div>

                        <button type="submit"
                                class="btn btn-primary btn-block btn-sewa mt-4">

                            Lanjut ke Pembayaran

                        </button>

                        <a href="<?= site_url('customer/kendaraan') ?>"
                           class="btn btn-outline-secondary btn-block">

                            Kembali

                        </a>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>