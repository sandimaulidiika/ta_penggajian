<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
        <?php if (is_admin()) : ?>
            <button onclick="window.location='<?= site_url('pegawai/add') ?>'" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
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
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Jabatan</th>
                            <th>Divisi</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($pegawai as $key) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $key['nip'] ?></td>
                                <td><?= $key['nama'] ?></td>
                                <td><?= $key['jk_pegawai'] ?></td>
                                <td><?= $key['nama_jabatan'] ?></td>
                                <td><?= $key['nama_divisi'] ?></td>
                                <td class="label label-success"><?= $key['status'] ?></td>
                                <?php if (is_admin()) : ?>
                                    <td>
                                        <button class="btn btn-success" data-toggle="modal" data-target="#infoModal<?= $key['nip'] ?>">
                                            <i class=" fas fa-info"></i> Info
                                        </button>
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#editModal<?= $key['nip'] ?>">
                                            <i class="fas fa-edit"></i> Edit
                                        </button>
                                        <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?= $key['nip'] ?>">
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
    <?php foreach ($pegawai as $peg) : ?>
        <div class="modal fade" id="editModal<?= $peg['nip'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog  modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit <?= $title ?> <b><?= $peg['nip'] ?></b></h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form action="<?= site_url('pegawai/edit/') ?>" method="POST">
                        <input type="hidden" name="nip" value="<?= $peg['nip'] ?>">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="nama">Nama pegawai</label>
                                        <input type="text" class="form-control" name="pegawai" placeholder="Enter nama pegawai" value="<?= $peg['nama'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Jenis Kelamin</label>
                                        <select class="form-control" name="jk" aria-label="Default select example">
                                            <option selected disabled>Pilih jenis kelamin</option>
                                            <option value="Laki-laki" <?php if ($peg['jk_pegawai'] == "Laki-laki") echo "selected"; ?>>Laki-laki</option>
                                            <option value="Perempuan" <?php if ($peg['jk_pegawai'] == "Perempuan") echo "selected"; ?>>Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Status</label>
                                        <select class="form-control" name="status" aria-label="Default select example">
                                            <option selected disabled>Pilih status pegawai</option>
                                            <option value="Pegawai Tetap" <?php if ($peg['status'] == "Pegawai Tetap") echo "selected"; ?>>Pegawai Tetap</option>
                                            <option value="Kontrak" <?php if ($peg['status'] == "Kontrak") echo "selected"; ?>>Kontrak</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Agama</label>
                                        <input type="text" class="form-control" name="agama" placeholder="Enter agama" value="<?= $peg['agama'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">User</label>
                                        <select class="form-control" name="user" aria-label="Default select example" required>
                                            <option selected disabled>Pilih user</option>
                                            <option value="0">Not User</option>
                                            <?php foreach ($users as $key) : ?>
                                                <option <?= $peg['id_user'] == $key['id_user'] ? 'selected' : '' ?> value="<?= $key['id_user']; ?>"><?= $key['username']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="nama">Jabatan</label>
                                        <select class="form-control" name="jabatan" aria-label="Default select example">
                                            <option selected disabled>Pilih jabatan</option>
                                            <?php foreach ($jabatan as $key) : ?>
                                                <option <?= $peg['kode_jab'] == $key['kode_jab'] ? 'selected' : '' ?> value="<?= $key['kode_jab']; ?>"><?= $key['nama_jabatan']; ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Divisi</label>
                                        <select class="form-control" name="divisi" aria-label="Default select example">
                                            <option selected disabled>Pilih divisi</option>
                                            <?php foreach ($divisi as $key) : ?>
                                                <option <?= $peg['id_divisi'] == $key['id_divisi'] ? 'selected' : '' ?> value="<?= $key['id_divisi']; ?>"><?= $key['nama_divisi']; ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Tanggal Masuk</label>
                                        <input type="date" class="form-control" name="tgl_masuk" placeholder="Enter tanggal masuk" value="<?= $peg['tgl_masuk'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Status Kawin</label>
                                        <select class="form-control" name="status_kawin" aria-label="Default select example">
                                            <option selected disabled>Pilih status kawin</option>
                                            <option value="Sudah Kawin" <?php if ($peg['status_kawin'] == "Sudah Kawin") echo "selected"; ?>>Sudah Kawin</option>
                                            <option value="Belum Kawin" <?php if ($peg['status_kawin'] == "Belum Kawin") echo "selected"; ?>>Belum Kawin</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Aalamat</label>
                                        <input type="text" class="form-control" name="alamat" placeholder="Enter alamat" value="<?= $peg['alamat'] ?>" required>
                                        <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
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
    <?php foreach ($pegawai as $key) : ?>
        <div class="modal fade" id="deleteModal<?= $key['nip'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Yakin ingin menghapus <?= $title ?> <b><?= $key['nama'] ?></b></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                        <button onclick="window.location='<?= site_url('pegawai/delete/' . $key['nip']) ?>'" class="btn btn-danger">Iya, saya yakin</button>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>
    <!-- Content Row -->

    <!-- info modal -->
    <?php foreach ($pegawai as $peg) : ?>
        <div class="modal fade" id="infoModal<?= $peg['nip'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog  modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Info Detail <?= $title ?></h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="nama">Nama pegawai</label>
                                    <input type="text" class="form-control" value="<?= $peg['nama'] ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="nama">NIP pegawai</label>
                                    <input type="text" class="form-control" value="<?= $peg['nip'] ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Jenis Kelamin</label>
                                    <input type="text" class="form-control" value="<?= $peg['jk_pegawai'] ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Status</label>
                                    <input type="text" class="form-control" value="<?= $peg['status'] ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Agama</label>
                                    <input type="text" class="form-control" value="<?= $peg['agama'] ?>" readonly>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="nama">Jabatan</label>
                                    <input type="text" class="form-control" value="<?= $peg['nama_jabatan'] ?>" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="nama">Divisi</label>
                                    <input type="text" class="form-control" value="<?= $peg['nama_divisi'] ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="name">Tanggal Masuk</label>
                                    <input type="date" class="form-control" value="<?= $peg['tgl_masuk'] ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Status Kawin</label>
                                    <input type="text" class="form-control" value="<?= $peg['status_kawin'] ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Alamat</label>
                                    <input type="text" class="form-control" value="<?= $peg['alamat'] ?>" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>