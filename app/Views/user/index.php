<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>
<div class="pagetitle">
    <h1>User</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">User</a></li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">

        <div class="col-lg-12">

            <div class="card">

                <div class="card-body">
                    <h5 class="card-title">List User</h5>
                    <button type="button" class="btn btn-primary tombol-tambah" data-bs-toggle="modal" data-bs-target="#basicModal">
                        Tambah User
                    </button>
                    <table class="table table-hover ">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Username </th>
                                <th scope="col">Level</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($user as $user) {
                            ?>
                                <tr>
                                    <th scope="row"><?= $no++ ?></th>
                                    <td><?= $user['username'] ?></td>
                                    <td><?= $user['level'] ?></td>
                                    <td>
                                        <button type="button" class="btn btn-outline-warning tombol-ubah" data-bs-toggle="modal" data-bs-target="#basicModal" data-id="<?= $user['id_user'] ?>">Ubah</button>
                                        <a href="<?= site_url("/user/" . $user['id_user'] . "/delete")   ?>" type="button" class="btn btn-outline-danger">Hapus</a>
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
            <form class="g-3" action="<?= site_url('/user/add') ?>" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <label for="username" class="form-label">Username</label>
                            <input type="hidden" class="form-control" id="id" name="id">
                            <input type="text" class="form-control" id="username" name="username" autocomplete="off" required>
                        </div>
                        <div class="col-12">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" autocomplete="off" required>
                        </div>
                        <div class="col-12">
                            <label for="level" class="form-label">Level</label>
                            <select name="level" id="level" class="form-control" required>
                                <option value="">Pilih Level</option>
                                <?php
                                foreach ($level as $lev) {
                                ?>
                                    <option value="<?= $lev['id_level'] ?>"><?= $lev['level'] ?></option>
                                <?php } ?>
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
            $('.modal-title').html('Tambah User')

            $('.modal-footer button[type= submit] ').html('Simpan')
            $('#id').val('')
            $('#username').val('')
            $('#password').val('')
            $('#level').val('')

        })
        // tombl ubah
        $('.tombol-ubah').on('click', function() {
            // console.log('okeh')
            $('.modal-title').html('Ubah User')
            $('.modal-dialog form').attr('action', `<?= site_url('user/update') ?>`)
            $('.modal-footer button[type= submit] ').html('Simpan')
            const id = $(this).data('id')
            // console.log(id)
            $.ajax({
                url: `<?= site_url('user/edit') ?>`,
                data: {
                    id: id
                },
                method: 'post',
                dataType: 'json',
                success: function(data) {
                    // console.log(data)
                    $('#id').val(data.id_user)
                    $('#username').val(data.username)
                    $('#password').val(data.password)
                    $('#level').val(data.id_level)
                }
            })
        })
    })
</script>
<?= $this->endSection() ?>