<section class="hero-wrap hero-wrap-2"
         style="background-image: url('<?= base_url('assets/customer/images/bg_3.jpg') ?>');">

    <div class="overlay"></div>

    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-start">
            <div class="col-md-9 pb-5">
                <p class="breadcrumbs">
                    <span class="mr-2">
                        <a href="<?= site_url('customer/kendaraan'); ?>">
                            Kendaraan
                        </a>
                    </span>
                    <span>Penyewaan</span>
                </p>

                <h1 class="mb-3 bread">
                    Form Penyewaan
                </h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <?php if($pelanggan->is_pelanggan_lama == 1): ?>

                        <div class="alert alert-success">
                            <strong>Selamat!</strong> Anda adalah pelanggan lama dan mendapatkan diskon tambahan 5%.
                        </div>

                        <?php endif; ?>
    <div class="container">

        <div class="row">

            <!-- Detail Kendaraan -->
            <div class="col-md-4">

                <div class="card shadow">

                    <img src="<?= base_url('assets/customer/images/'.$kendaraan->foto); ?>"
                         class="card-img-top">
                         <!-- PROMO DISKON -->
            <div class="alert alert-info">
                <strong>Promo Diskon:</strong><br>
                Sewa 7 hari → Diskon 5%<br>
                Sewa 14 hari → Diskon 10%<br>
                Sewa 30 hari → Diskon 15%
            </div>

                        <?php if(
                    $kendaraan->status != 'tersedia'
                    && isset($pelanggan)
                    && $pelanggan->is_pelanggan_lama == 1
                ): ?>

                <div class="alert alert-warning">

                    <strong>Informasi Upgrade Kendaraan</strong><br>

                    Kendaraan yang Anda pilih sedang tidak tersedia.
                    Jika penyewaan dilanjutkan, sistem akan diberikan kendaraan
                    dengan kelas lebih tinggi yang tersedia dengan harga yang sama.

                </div>

                <?php endif; ?>

                    <div class="card-body">

                        <h4><?= $kendaraan->merk; ?></h4>

                        <p>
                            <?= $kendaraan->nama_kendaraan; ?>
                        </p>

                        <hr>

                        <p>
                            <b>Tarif Jam</b><br>
                            Rp<?= number_format($kendaraan->tarif_jam,0,',','.'); ?>
                        </p>

                        <p>
                            <b>Tarif Hari</b><br>
                            Rp<?= number_format($kendaraan->tarif_hari,0,',','.'); ?>
                        </p>

                        <p>
                            <b>Tarif Minggu</b><br>
                            Rp<?= number_format($kendaraan->tarif_minggu,0,',','.'); ?>
                        </p>

                        <p>
                            <b>Tarif Bulan</b><br>
                            Rp<?= number_format($kendaraan->tarif_bulan,0,',','.'); ?>
                        </p>

                    </div>

                </div>

            </div>

            <!-- Form -->
            <div class="col-md-8">

                <div class="card shadow">

                    <div class="card-header bg-primary text-white">
                        Form Data Penyewaan
                    </div>

                    <div class="card-body">

                        <form action="<?= site_url('customer/penyewaan/simpan'); ?>"
                              method="post">

                            <input type="hidden"
                                   name="kendaraan_id"
                                   value="<?= $kendaraan->id; ?>">

                            <div class="form-group">
                                <label>Jenis Sewa</label>

                                <select name="jenis_sewa"
                                        class="form-control"
                                        required>

                                    <option value="">
                                        -- Pilih --
                                    </option>

                                    <option value="jam">
                                        Per Jam
                                    </option>

                                    <option value="hari">
                                        Per Hari
                                    </option>

                                    <option value="minggu">
                                        Per Minggu
                                    </option>

                                    <option value="bulan">
                                        Per Bulan
                                    </option>

                                </select>
                            </div>

                            <div class="form-group">
                                <label>Lama Sewa</label>

                                <input type="number"
                                       name="lama_sewa"
                                       class="form-control"
                                       min="1"
                                       required>
                            </div>

                            <div class="form-group">
                                <label>Tanggal Mulai</label>

                                <input type="datetime-local"
                                       name="tgl_mulai"
                                       class="form-control"
                                       required>
                            </div>

                            <div class="form-group">
                                <label>Tanggal Selesai</label>

                                <input type="datetime-local"
                                       name="tgl_selesai"
                                       class="form-control"
                                       required>
                            </div>

                            <div class="form-group">
                                <label>Tujuan</label>

                                <select name="tujuan"
                                        class="form-control">

                                    <option value="dalam_kota">
                                        Dalam Kota
                                    </option>

                                    <option value="luar_kota">
                                        Luar Kota
                                    </option>

                                </select>
                            </div>

                            <div class="form-group">
                                <label>Pengambilan Kendaraan</label>

                                <select name="ambil_kendaraan"
                                        class="form-control">

                                    <option value="ambil_sendiri">
                                        Ambil Sendiri
                                    </option>

                                    <option value="diantar">
                                        Diantar
                                    </option>

                                </select>
                            </div>


                            <?php if($pelanggan->is_pelanggan_lama == 1): ?>

                                <div class="form-group">
                                    <label>Pilih Supir</label>

                                    <select name="supir_id" class="form-control">
                                        <option value="">Tanpa Supir</option>

                                        <?php foreach($supir as $s): ?>
                                            <option value="<?= $s->id ?>">
                                                <?= $s->nama ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <?php endif; ?>
                                <button type="submit"
                                    class="btn btn-primary">

                                Pesan Sekarang

                            </button>

                            <a href="<?= site_url('customer/kendaraan/detail/'.$kendaraan->id); ?>"
                               class="btn btn-secondary">

                                Kembali

                            </a>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>
</section>