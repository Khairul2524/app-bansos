<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<div class="pagetitle">
    <h1>Penduduk</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Penduduk</a></li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">

        <div class="col-lg-12">

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Tambah Penduduk</h5>
                    <form class="row g-3" action="<?= site_url('/penduduk/add') ?>" method="POST">
                        <div class="col-md-12">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" name="nama" autocomplete="off" required>
                        </div>
                        <div class="col-md-6">
                            <label for="no_kk" class="form-label">NO KK</label>
                            <input type="number" class="form-control" id="no_kk" name="no_kk" autocomplete="off" required>
                        </div>
                        <div class="col-md-6">
                            <label for="jenis_k" class="form-label">Jenis Kelamin</label>
                            <select name="jenis_k" id="jenis_k" class="form-control" required>
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="1">Laki Laki</option>
                                <option value="0">Perempuan</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" autocomplete="off" required>
                        </div>
                        <div class="col-md-6">
                            <label for="agama" class="form-label">Agama</label>
                            <select name="agama" id="agama" class="form-control" required>
                                <option value="">Pilih Agama</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Budha">Budha</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="status_kawin" class="form-label">Status Perkawinan</label>
                            <select name="status_kawin" id="status_kawin" class="form-control" required>
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="Kawin">Kawin</option>
                                <option value="Belum Kawin">Belum Kawin</option>
                            </select>
                        </div>
                        <?php
                        foreach ($kriteria as $krite) {
                        ?>
                            <div class="col-md-6">
                                <label for="no_kk" class="form-label"><?= $krite['kriteria'] ?></label>
                                <input type="text" class="form-control" id="kriteria[]" name="kriteria[]" value="<?= $krite['id_kriteria'] ?>" hidden>
                                <select name="bobot[]" id="bobot[]" class="form-control" required>
                                    <option value="">Pilih <?= $krite['kriteria'] ?></option>
                                    <?php
                                    foreach ($bobot as $bot) {
                                        if ($bot['id_kriteria'] == $krite['id_kriteria']) {
                                    ?>
                                            <option value="<?= $bot['id_bobot'] ?>"><?= $bot['keterangan'] ?></option>
                                    <?php }
                                    } ?>
                                </select>
                            </div>
                        <?php } ?>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>