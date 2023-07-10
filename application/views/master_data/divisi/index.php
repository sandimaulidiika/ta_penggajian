<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
        <button onclick="window.location='<?= site_url('master/pengguna/tambah') ?>'" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fa-solid fa-plus text-white-50"></i> Tambah Data
        </button>
    </div>

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
                        <?php foreach ($divisi as $key) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <button class="btn btn-primary" onclick="window.location='<?= site_url('master/pengguna/edit/' . $key['id']) ?>'">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>
                                    <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?= $key['id'] ?>">
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

    <!-- Logout Modal-->
    <?php foreach ($divisi as $key) : ?>
        <?php if ($key['id'] == 1) : ?>
            <div class="modal fade" id="deleteModal<?= $key['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <div class="modal fade" id="deleteModal<?= $key['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Yakin ingin keluar?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Yakin ingin menghapus pengguna <b><?= $key['nama_lengkap'] ?></b></div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Yes, i am sure</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif ?>
    <?php endforeach ?>
    <!-- Content Row -->