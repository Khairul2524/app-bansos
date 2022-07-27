<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>
<div class="pagetitle">
    <h1>User</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Bobot</a></li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">

        <div class="col-lg-12">

            <div class="card">

                <div class="card-body">
                    <h5 class="card-title">List Bobot</h5>
                    <button type="button" class="btn btn-primary tombol-tambah" data-bs-toggle="modal" data-bs-target="#basicModal">
                        Tambah Bobot
                    </button>
                    <table class="table table-hover ">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Kriteria</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Nilai</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($bobot as $row) {
                            ?>
                                <tr>
                                    <th scope="row"><?= $no++ ?></th>
                                    <td><?= $row['kriteria'] ?></td>
                                    <td><?= $row['keterangan'] ?></td>
                                    <td><?= $row['nilai'] ?></td>
                                    <td>
                                        <button type="button" class="btn btn-outline-warning tombol-ubah" data-bs-toggle="modal" data-bs-target="#basicModal" data-id="<?= $row['id_bobot'] ?>">Ubah</button>
                                        <a href="<?= site_url("/bobot/" . $row['id_bobot'] . "/delete")   ?>" type="button" class="btn btn-outline-danger">Hapus</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="basicModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="g-3" action="<?= site_url('/bobot/add') ?>" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Kriteria</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <label for="level" class="form-label">Kriteria</label>
                            <select name="kriteria" id="kriteria" class="form-control" required>
                                <option value="">Pilih Kriteria</option>
                                <?php
                                foreach ($kriteria as $kri) {
                                ?>
                                    <option value="<?= $kri['id_kriteria'] ?>"><?= $kri['kriteria'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <input type="hidden" class="form-control" id="id" name="id">
                            <input type="text" class="form-control" id="keterangan" name="keterangan" autocomplete="off" required>
                        </div>
                        <div class="col-12">
                            <label for="nilai" class="form-label">Nilai</label>
                            <input type="number" class="form-control" id="nilai" name="nilai" autocomplete="off" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div><!-- End Basic Modal-->
<script>
    $(function() {
        // tambah
        $('.tombol-tambah').on('click', function() {
            // console.log('oke')
            $('.modal-title').html('Tambah Bobot')

            $('.modal-footer button[type= submit] ').html('Simpan')
            $('#id').val('')
            $('#kriteria').val('')
            $('#keterangan').val('')
            $('#nilai').val('')

        })
        // tombl ubah
        $('.tombol-ubah').on('click', function() {
            // console.log('okeh')
            $('.modal-title').html('Ubah Bobot')
            $('.modal-dialog form').attr('action', `<?= site_url('bobot/update') ?>`)
            $('.modal-footer button[type= submit] ').html('Simpan')
            const id = $(this).data('id')
            console.log(id)
            $.ajax({
                url: `<?= site_url('bobot/edit') ?>`,
                data: {
                    id: id
                },
                method: 'post',
                dataType: 'json',
                success: function(data) {
                    // console.log(data)
                    $('#id').val(data.id_bobot)
                    $('#keterangan').val(data.keterangan)
                    $('#nilai').val(data.nilai)
                    $('#kriteria').val(data.id_kriteria)
                }
            })
        })
    })
</script>
<?= $this->endSection() ?>