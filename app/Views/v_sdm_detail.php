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
                        <th>Nama</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal lahir</th>
                        <th>Alamat</th>
                        <th>No Telepon</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal lahir</th>
                        <th>Alamat</th>
                        <th>no_telepon</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php $no = 1;
                    foreach ($sdmDetail as $sd) { ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td><?= $sd['nama'] ?></td>
                            <td><?= $sd['tempat_lahir'] ?></td>
                            <td><?= $sd['tanggal_lahir'] ?></td>
                            <td><?= $sd['alamat'] ?></td>
                            <td><?= $sd['no_telepon'] ?></td>
                            <td><?= $sd['email'] ?></td>
                            <td class="text-center">
                                <button class="btn btn-warning btn-sm" data-toggle="modal"
                                    data-target="#edit-data<?= $sd['id_sdm_detail'] ?>"><i
                                        class="fas fa-pencil-alt"></i></button>
                                <button class="btn btn-danger btn-sm" data-toggle="modal"
                                    data-target="#hapus-data<?= $sd['id_sdm_detail'] ?>"><i
                                        class="fas fa-trash"></i></button>
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
            <form action="/sdm_detail/insertData" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan Nama"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="tempat_lahir">Tempat lahir</label>
                        <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control"
                            placeholder="Masukkan Tempat Lahir" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control"
                            placeholder="Masukkan Tanggal Lahir" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Masukkan Alamat"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="no_telepon">Nomor Telepon</label>
                        <input type="text" name="no_telepon" id="no_telepon" class="form-control"
                            placeholder="Masukkan Nomor Telepon" required>
                    </div>
                    <div class="form-group">
                        <label for="email">email</label>
                        <input type="text" name="email" id="email" class="form-control" placeholder="Masukkan email"
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

<?php foreach ($sdmDetail as $sd) { ?>
    <!-- Modal Edit Data -->
    <div class="modal fade" id="edit-data<?= $sd['id_sdm_detail'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah Data <?= $title ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/sdm_detail/updateData/<?= $sd['id_sdm_detail'] ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input value="<?= $sd['nama'] ?>" type="text" name="nama" id="nama" class="form-control"
                                placeholder="Masukkan Nama" required>
                        </div>
                        <div class="form-group">
                            <label for="tempat_lahir">tempat_lahir</label>
                            <input value="<?= $sd['tempat_lahir'] ?>" type="text" name="tempat_lahir" id="tempat_lahir"
                                class="form-control" placeholder="Masukkan tempat_lahir" required>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input value="<?= $sd['tanggal_lahir'] ?>" type="date" name="tanggal_lahir" id="tanggal_lahir"
                                class="form-control" placeholder="Masukkan Tanggal Lahir" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input value="<?= $sd['alamat'] ?>" type="text" name="alamat" id="alamat" class="form-control"
                                placeholder="Masukkan Alamat" required>
                        </div>
                        <div class="form-group">
                            <label for="no_telepon">Nomor Telepon</label>
                            <input value="<?= $sd['no_telepon'] ?>" type="text" name="no_telepon" id="no_telepon"
                                class="form-control" placeholder="Masukkan Nomor Telepon" required>
                        </div>
                        <div class="form-group">
                            <label for="email">email</label>
                            <input value="<?= $sd['email'] ?>" type="text" name="email" id="email" class="form-control"
                                placeholder="Masukkan email" required>
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

<?php foreach ($sdmDetail as $sd) { ?>
    <!-- Modal Hapus Data -->
    <div class="modal fade" id="hapus-data<?= $sd['id_sdm_detail'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus Data <?= $title ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah anda yakin ingin menghapus <?= $title ?> <b><?= $sd['nama'] ?></b>..?</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('sdm_detail/deleteData/' . $sd['id_sdm_detail']) ?>"
                        class="btn btn-danger">Hapus</a>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </div>
<?php } ?>
<?= $this->endSection() ?>