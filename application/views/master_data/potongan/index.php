<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
        <button onclick="window.location='<?= site_url('potongan/add') ?>'" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
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
                            <th>Jenis Potongan</th>
                            <th>Harga Potongan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($potongan as $key) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $key['potongan'] ?></td>
                                <td>Rp. <?= number_format($key['jml_potongan']); ?></td>
                                <?php if (is_admin()) : ?>
                                    <td>
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#editModal<?= $key['id_potongan'] ?>">
                                            <i class="fas fa-edit"></i> Edit
                                        </button>
                                        <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?= $key['id_potongan'] ?>">
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
    <?php foreach ($potongan as $key) : ?>
        <div class="modal fade" id="editModal<?= $key['id_potongan'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit <?= $title ?></h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form action="<?= site_url('potongan/edit/') ?>" method="POST">
                        <div class="modal-body">
                            <input type="hidden" name="id_potongan" value="<?= $key['id_potongan'] ?>">
                            <div class="form-group">
                                <label for="nama">Jenis Potongan</label>
                                <input type="text" class="form-control" name="potongan" id="potongan" placeholder="Enter jenis potongan" value="<?= $key['potongan'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="nama">Harga potongan</label>
                                <input type="text" class="form-control" name="jml_potongan" placeholder="Enter harga potongan" value="<?= $key['jml_potongan'] ?>" required>
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
    <?php foreach ($potongan as $key) : ?>
        <div class="modal fade" id="deleteModal<?= $key['id_potongan'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Yakin ingin menghapus <?= $title ?> <b><?= $key['potongan'] ?></b></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                        <button onclick="window.location='<?= site_url('potongan/delete/' . $key['id_potongan']) ?>'" class="btn btn-danger">Iya, saya yakin</button>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>
    <!-- Content Row -->