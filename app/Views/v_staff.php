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
                        <th>Jabatan</th>
                        <th>Status</th>
                        <th>SP</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Status</th>
                        <th>SP</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php $no = 1;
                    foreach ($staff as $sd) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $sd->nama ?></td>
                            <td><?= $sd->nama_jabatan ?> (<?= $sd->tingkat ?>)</td>
                            <td><?= $sd->nama_status ?></td>
                            <td><?= $sd->sp ?>
                            <td class="text-center"><button class="btn btn-warning btn-sm" data-toggle="modal"
                                    data-target="#edit-data<?= $sd->id_sdm ?>"><i class="fas fa-pencil-alt"></i></button>
                                <button class="btn btn-danger btn-sm" data-toggle="modal"
                                    data-target="#hapus-data<?= $sd->id_sdm ?>"><i class="fas fa-trash"></i></button>
                                <button data-toggle="modal" data-target="#tambah-sp<?= $sd->id_sdm ?>"
                                    class="btn btn-danger btn-sm"><i class="fas fa-exclamation"></i> Tambah SP</button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="tambah-data">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data <?= $title ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/sdm/insertData" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="id_sdm_detail">Nama</label>
                        <select name="id_sdm_detail" id="id_sdm_detail" class="form-control" required>
                            <option>Pilih</option>
                            <?php foreach ($sdm_detail as $sd) { ?>
                                <option value="<?= $sd['id_sdm_detail'] ?>"><?= $sd['nama'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_jabatan">Jabatan</label>
                        <select name="id_jabatan" id="id_jabatan" class="form-control" required>
                            <option>Pilih</option>
                            <?php foreach ($jabatan as $jbt) { ?>
                                <option value="<?= $jbt['id_jabatan'] ?>"><?= $jbt['nama_jabatan'] ?>
                                    (<?= $jbt['tingkat'] ?>)</option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_status">Status</label>
                        <select name="id_status" id="id_status" class="form-control" required>
                            <option>Pilih</option>
                            <?php foreach ($status as $sts) { ?>
                                <option value="<?= $sts['id_status'] ?>"><?= $sts['nama_status'] ?></option>
                            <?php } ?>
                        </select>
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

<?php foreach ($staff as $sd) { ?>
    <div class="modal fade" id="edit-data<?= $sd->id_sdm ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data <?= $title ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/sdm/updateData/<?= $sd->id_sdm ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="id_sdm_detail">Nama</label>
                            <select name="id_sdm_detail" id="id_sdm_detail" class="form-control" required>
                                <option>Pilih</option>
                                <?php foreach ($sdm_detail as $sdd) { ?>
                                    <option value="<?= $sdd['id_sdm_detail'] ?>" <?= $sd->id_sdm_detail == $sdd['id_sdm_detail'] ? 'selected' : '' ?>><?= $sdd['nama'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_jabatan">Jabatan</label>
                            <select name="id_jabatan" id="id_jabatan" class="form-control" required>
                                <option>Pilih</option>
                                <?php foreach ($jabatan as $jbt) { ?>
                                    <option value="<?= $jbt['id_jabatan'] ?>" <?= $sd->id_jabatan == $jbt['id_jabatan'] ? 'selected' : '' ?>><?= $jbt['nama_jabatan'] ?>
                                        (<?= $jbt['tingkat'] ?>)</option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_status">Status</label>
                            <select name="id_status" id="id_status" class="form-control" required>
                                <option>Pilih</option>
                                <?php foreach ($status as $sts) { ?>
                                    <option value="<?= $sts['id_status'] ?>" <?= $sd->id_status == $sts['id_status'] ? 'selected' : '' ?>><?= $sts['nama_status'] ?></option>
                                <?php } ?>
                            </select>
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

<?php foreach ($staff as $sd) { ?>
    <!-- Modal Hapus Data -->
    <div class="modal fade" id="hapus-data<?= $sd->id_sdm ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus Data <?= $title ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah anda yakin ingin menghapus <?= $title ?> <b><?= $sd->nama ?></b>..?</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('sdm/deleteData/' . $sd->id_sdm) ?>" class="btn btn-danger">Hapus</a>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </div>
<?php } ?>

<?php foreach ($staff as $sd) { ?>
    <?php $sp = $sd->sp ?>
    <!-- Modal Hapus Data -->
    <div class="modal fade" id="tambah-sp<?= $sd->id_sdm ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah SP <?= $sd->nama ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah anda yakin ingin menambah SP <b><?= $sd->nama ?></b>..?</p>
                </div>
                <form method="POST" action="sdm/tambahSP/<?= $sd->id_sdm ?>"> 
                    <input type="hidden" value="<?= $sp + 1 ?>" name="sp">
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Tambah</button>

                    </div>
                </form>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </div>
<?php } ?>

<?= $this->endSection() ?>