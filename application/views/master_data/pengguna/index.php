<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
        <?php if (is_admin()) : ?>
            <button onclick="window.location='<?= site_url('pengguna/add') ?>'" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fa-solid fa-plus text-white-50"></i> Tambah Data
            </button>
        <?php else : ?>
        <?php endif ?>
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
                            <th>Nama Lengkap</th>
                            <th>Username</th>
                            <th>Level</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($pengguna as $key) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $key['nama_lengkap'] ?></td>
                                <td><?= $key['username'] ?></td>
                                <th class="text-center">
                                    <?php if ($key['level'] == 'admin') : ?>
                                        <span class="badge badge-success">Admin Payroll</span>
                                    <?php else : ?>
                                        <span class="badge badge-warning">Pimpinan</span>
                                    <?php endif ?>
                                </th>
                                <td>
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#editModal<?= $key['id_user'] ?>">
                                        <i class=" fas fa-edit"></i> Edit
                                    </button>
                                    <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?= $key['id_user'] ?>">
                                        <i class="fas fa-trash-alt"></i> Delete
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- edit modal -->
    <?php foreach ($pengguna as $key) : ?>
        <div class="modal fade" id="editModal<?= $key['id_user'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Pengguna</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form action="<?= site_url('pengguna/edit/') ?>" method="POST">
                        <div class="modal-body">
                            <input type="hidden" name="id_user" value="<?= $key['id_user'] ?>">
                            <div class="form-group">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Enter nama lengkap" autocomplete="nama" value="<?= $key['nama_lengkap'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="username" id="username" placeholder="Enter username" autocomplete="name" value="<?= $key['username'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="level">Level</label>
                                <select class="form-control" id="level" name="level" aria-label="Default select example">
                                    <option value="admin" <?php if ($key['level'] == "admin") echo "selected"; ?>>Admin Payroll</option>
                                    <option value="pimpinan" <?php if ($key['level'] == "pimpinan") echo "selected"; ?>>Pimpinan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                <p class="text-danger"><i>Kosongkan jika tidak ubah password</i></p>
                            </div>
                            <div class="form-group">
                                <label for="password">Ulangi Password</label>
                                <input type="password" class="form-control" id="password2" name="password2" placeholder="Konfirmasi Password">
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

    <!-- info Modal-->
    <?php foreach ($pengguna as $key) : ?>
        <?php if ($key['id_user'] == 1) : ?>
            <div class="modal fade" id="deleteModal<?= $key['id_user'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Gagal delete pengguna</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Pengguna <b>Admin Payroll</b> tidak dapat di delete</div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php else : ?>
            <div class="modal fade" id="deleteModal<?= $key['id_user'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Yakin ingin menghapus pengguna <b><?= $key['nama_lengkap'] ?></b></div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                            <button onclick="window.location='<?= site_url('pengguna/userdelete/' . $key['id_user']) ?>'" class="btn btn-danger">Iya, saya yakin</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif ?>
    <?php endforeach ?>
    <!-- Content Row -->