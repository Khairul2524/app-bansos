<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>
<div class="pagetitle">
    <h1>Level</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Level</a></li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">

        <div class="col-lg-12">

            <div class="card">

                <div class="card-body">
                    <h5 class="card-title">List Level</h5>
                    <!-- Basic Modal -->
                    <button type="button" class="btn btn-primary tombol-tambah" data-bs-toggle="modal" data-bs-target="#basicModal">
                        Tambah Level
                    </button>

                    <table class="table table-hover mt-2">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Level</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($level as $lev) {
                            ?>
                                <tr>
                                    <th scope="row"><?= $no++ ?></th>
                                    <td><?= $lev['level'] ?></td>
                                    <td>
                                        <button type="button" class="btn btn-outline-warning tombol-ubah" data-bs-toggle="modal" data-bs-target="#basicModal" data-id="<?= $lev['id_level'] ?>">Ubah</button>
                                        <a href="<?= site_url("/level/" . $lev['id_level'] . "/delete")   ?>" type="button" class="btn btn-outline-danger">Hapus</a>
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
            <form class="g-3" action="<?= site_url('/level/add') ?>" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Level</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <label for="level" class="form-label">Level</label>
                            <input type="hidden" class="form-control" id="id" name="id">
                            <input type="text" class="form-control" id="level" name="level" autocomplete="off" required>
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
            $('.modal-title').html('Tambah Level')

            $('.modal-footer button[type= submit] ').html('Simpan')
            $('#id').val('')
            $('#level').val('')

        })
        // tombl ubah
        $('.tombol-ubah').on('click', function() {
            // console.log('oke')
            $('.modal-title').html('Ubah Level')
            $('.modal-dialog form').attr('action', `<?= site_url('level/update') ?>`)
            $('.modal-footer button[type= submit] ').html('Simpan')
            const id = $(this).data('id')
            // console.log(id)
            $.ajax({
                url: `<?= site_url('level/edit') ?>`,
                data: {
                    id: id
                },
                method: 'post',
                dataType: 'json',
                success: function(data) {
                    // console.log(data)
                    $('#id').val(data.id_level)
                    $('#level').val(data.level)
                }
            })
        })
    })
</script>
<?= $this->endSection() ?>