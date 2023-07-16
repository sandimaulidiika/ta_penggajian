<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
        <button onclick="window.location='<?= site_url('jabatan/add') ?>'" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fa-solid fa-plus text-white-50"></i> Tambah Data
        </button>
    </div>
    <?= $this->session->flashdata('message'); ?>
    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel <?= $title; ?></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama jabatan</th>
                            <th>Gaji Pokok</th>
                            <th>Tunjangan</th>
                            <th>Lembur</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($jabatan as $key) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $key['nama_jabatan'] ?></td>
                                <td>Rp. <?= number_format($key['gaji_pokok']); ?></td>
                                <td>Rp. <?= number_format($key['tunjangan']); ?></td>
                                <td>Rp. <?= number_format($key['lembur']); ?></td>
                                <?php if (is_admin()) : ?>
                                    <td>
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#editModal<?= $key['id'] ?>">
                                            <i class="fas fa-edit"></i> Edit
                                        </button>
                                        <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?= $key['id'] ?>">
                                            <i class="fas fa-trash-alt"></i> Delete
                                        </button>
                                    </td>
                                <?php else : ?>
                                    <td></td>
                                <?php endif ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- edit modal -->
    <?php foreach ($jabatan as $key) : ?>
        <div class="modal fade" id="editModal<?= $key['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit <?= $title ?></h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form action="<?= site_url('jabatan/edit/') ?>" method="POST">
                        <div class="modal-body">
                            <input type="hidden" name="id" value="<?= $key['id'] ?>">
                            <div class="form-group">
                                <label for="nama">Nama jabatan</label>
                                <input type="text" class="form-control" name="jabatan" id="jabatan" placeholder="Enter nama jabatan" value="<?= $key['nama_jabatan'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="nama">Gaji Pokok</label>
                                <input type="text" class="form-control" name="pokok" id="pokok" placeholder="Enter gaji pokok" value="<?= $key['gaji_pokok'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="nama">Tunjangan</label>
                                <input type="text" class="form-control" name="tunjangan" id="tunjangan" placeholder="Enter tunjangan" value="<?= $key['tunjangan'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="nama">Lembur</label>
                                <input type="text" class="form-control" name="lembur" id="lembur" placeholder="Enter lembur" value="<?= $key['lembur'] ?>" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach ?>

    <!-- delete Modal-->
    <?php foreach ($jabatan as $key) : ?>
        <div class="modal fade" id="deleteModal<?= $key['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Yakin ingin menghapus <?= $title ?> <b><?= $key['nama_jabatan'] ?></b></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                        <button onclick="window.location='<?= site_url('jabatan/delete/' . $key['id']) ?>'" class="btn btn-danger">Iya, saya yakin</button>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>
    <!-- Content Row -->