<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>
<div class="pagetitle">
    <h1>User</h1>
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

                <div class="card-body">
                    <h5 class="card-title">List Penduduk</h5>

                    <table class="table table-hover ">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama </th>
                                <th scope="col">No KK </th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Agama</th>
                                <th scope="col">Status Perkawinan</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($penduduk as $row) {
                            ?>
                                <tr>
                                    <th scope="row"><?= $no++ ?></th>
                                    <td><?= $row['nama'] ?></td>
                                    <td><?= $row['no_kk'] ?></td>
                                    <td><?= $row['alamat'] ?></td>
                                    <td><?= $row['jenis_kelamin'] ?></td>
                                    <td><?= $row['agama'] ?></td>
                                    <td><?= $row['status_perkawinan'] ?></td>
                                    <td>
                                        <button type="button" class="btn btn-outline-warning tombol-ubah" data-bs-toggle="modal" data-bs-target="#basicModal" data-id="<?= $row['id_penduduk'] ?>">Ubah</button>
                                        <a href="<?= site_url("/penduduk/" . $row['id_penduduk'] . "/delete")   ?>" type="button" class="btn btn-outline-danger">Hapus</a>
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
            <form class="g-3" action="<?= site_url('/penduduk/add') ?>" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Penduduk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="hidden" class="form-control" id="id" name="id">
                            <input type="text" class="form-control" id="nama" name="nama" autocomplete="off" required>
                        </div>
                        <div class="col-12">
                            <label for="no_kk" class="form-label">No KK</label>
                            <input type="number" class="form-control" id="no_kk" name="no_kk" autocomplete="off" required maxlength="16">
                        </div>
                        <div class="col-12">
                            <label for="jenis_k" class="form-label">jenis Kelamin</label>
                            <select name="jenis_k" id="jenis_k" class="form-control" required>
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="1">Laki Laki</option>
                                <option value="0">Perempuan</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="no_kk" class="form-label">Alamat</label>
                            <textarea name="alamat" id="alamat" cols="" rows="3" class="form-control"></textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="agama" class="form-label">Agama</label>
                            <select name="agama" id="agama" class="form-control" required>
                                <option value="">Pilih Agama</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Budha">Budha</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="status_kawin" class="form-label">Status Perkawinan</label>
                            <select name="status_kawin" id="status_kawin" class="form-control" required>
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="Kawin">Kawin</option>
                                <option value="Belum Kawin">Belum Kawin</option>
                            </select>
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
            $('.modal-title').html('Tambah Penduduk')

            $('.modal-footer button[type= submit] ').html('Simpan')
            $('#id').val('')
            $('#nama').val('')
            $('#no_kk').val('')
            $('#jenis_k').val('')
            $('#alamat').val('')
            $('#agama').val('')
            $('#status_kawin').val('')

        })
        // tombl ubah
        $('.tombol-ubah').on('click', function() {
            // console.log('okeh')
            $('.modal-title').html('Ubah Penduduk')
            $('.modal-dialog form').attr('action', `<?= site_url('penduduk/update') ?>`)
            $('.modal-footer button[type= submit] ').html('Simpan')
            const id = $(this).data('id')
            // console.log(id)
            $.ajax({
                url: `<?= site_url('penduduk/edit') ?>`,
                data: {
                    id: id
                },
                method: 'post',
                dataType: 'json',
                success: function(data) {
                    // console.log(data)
                    $('#id').val(data.id_penduduk)
                    $('#nama').val(data.nama)
                    $('#no_kk').val(data.no_kk)
                    $('#jenis_k').val(data.jenis_kelamin)
                    $('#alamat').val(data.alamat)
                    $('#agama').val(data.agama)
                    $('#status_kawin').val(data.status_perkawinan)
                }
            })
        })
    })
</script>
<?= $this->endSection() ?>