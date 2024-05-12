<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<!-- DataTales Example -->
<button class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#tambah-data">
    <span class="icon text-white-50">
        <i class="fas fa-plus"></i>
    </span>
    <span class="text">Tambah Data</span>
</button>
<div class="my-2"></div>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data <?= $title ?></h6>
    </div>

    <div class="card-body">
        <?php
        if (session()->getFlashdata('pesan')) {
            echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i> ';
            echo session()->getFlashdata('pesan');
            echo '</div>';
        }
        ?>
        <div class="table-responsive">

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Akses</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Akses</th>
                        <th>Aksi</th>

                    </tr>
                </tfoot>
                <tbody>
                    <?php $no = 1;
                    foreach ($user as $usr) { ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td><?= $usr['username'] ?></td>
                            <td><?= $usr['password'] ?></td>
                            <td><?= $usr['akses'] ?></td>
                            <td class="text-center">
                                <button class="btn btn-warning btn-sm" data-toggle="modal"
                                    data-target="#edit-data<?= $usr['id_user'] ?>"><i
                                        class="fas fa-pencil-alt"></i></button>
                                <button class="btn btn-danger btn-sm" data-toggle="modal"
                                    data-target="#hapus-data<?= $usr['id_user'] ?>"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Tambah Data -->
<div class="modal fade" id="tambah-data">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data <?= $title ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/user/insertData" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control"
                            placeholder="Masukkan Username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" name="password" id="password" class="form-control"
                            placeholder="Masukkan Password" required>
                    </div>
                    <div class="form-group">
                        <label for="akses">Akses</label>
                        <input type="number" name="akses" id="akses" class="form-control" placeholder="Masukkan Akses"
                            required>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<?php foreach ($user as $usr) { ?>
    <!-- Modal Edit Data -->
    <div class="modal fade" id="edit-data<?= $usr['id_user'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah Data <?= $title ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/user/updateData/<?= $usr['id_user'] ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input value="<?= $usr['username'] ?>" type="text" name="username" id="username"
                                class="form-control" placeholder="Masukkan Username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input value="<?= $usr['password'] ?>" type="text" name="password" id="password"
                                class="form-control" placeholder="Masukkan Password" readonly>
                        </div>
                        <div class="form-group">
                            <label for="akses">Akses</label>
                            <input value="<?= $usr['akses'] ?>" type="number" name="akses" id="akses" class="form-control"
                                placeholder="Masukkan Akses" required>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php } ?>

<?php foreach ($user as $usr) { ?>
    <!-- Modal Hapus Data -->
    <div class="modal fade" id="hapus-data<?= $usr['id_user'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus Data <?= $title ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah anda yakin ingin menghapus <?= $title ?> <b><?= $usr['username'] ?></b>..?</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('user/deleteData/' . $usr['id_user']) ?>" class="btn btn-danger">Hapus</a>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </div>
<?php } ?>
<?= $this->endSection() ?>