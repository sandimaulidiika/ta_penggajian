<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
        <?php if (is_admin()) : ?>
            <button onclick="window.location='<?= site_url('potongan/add') ?>'" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
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
                            <th>Hadir</th>
                            <th>Sakit</th>
                            <th>Mangkir</th>
                            <th>PPH 21</th>
                            <th>BPJS KES</th>
                            <th>BPJS NAKER</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($potongan as $key) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td>Rp. <?= number_format($key['hadir'], 0); ?></td>
                                <td>Rp. <?= number_format($key['sakit'], 0); ?></td>
                                <td>Rp. <?= number_format($key['mangkir'], 0); ?></td>
                                <td>Rp. <?= number_format($key['pph21'], 0); ?></td>
                                <td>Rp. <?= number_format($key['bpjskes'], 0); ?></td>
                                <td>Rp. <?= number_format($key['bpjsnaker'], 0); ?></td>
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
                                <label for="nama">Hadir</label>
                                <input type="text" class="form-control" name="hadir" id="hadir" placeholder="Enter hadir" value="<?= $key['hadir'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="nama">Sakit</label>
                                <input type="text" class="form-control" name="sakit" id="sakit" placeholder="Enter sakit" value="<?= $key['sakit'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="nama">Mangkir</label>
                                <input type="text" class="form-control" name="mangkir" id="mangkir" placeholder="Enter mangkir" value="<?= $key['mangkir'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="nama">Pph 21</label>
                                <input type="text" class="form-control" name="pph21" id="pph21" placeholder="Enter pph21" value="<?= $key['pph21'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="nama">Bpjs Kes</label>
                                <input type="text" class="form-control" name="bpjskes" id="bpjskes" placeholder="Enter bpjskes" value="<?= $key['bpjskes'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="nama">Bpjs Naker</label>
                                <input type="text" class="form-control" name="bpjsnaker" id="bpjsnaker" placeholder="Enter bpjsnaker" value="<?= $key['bpjsnaker'] ?>" required>
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
                    <div class="modal-body">Yakin ingin menghapus?</div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                        <button onclick="window.location='<?= site_url('potongan/delete/' . $key['id_potongan']) ?>'" class="btn btn-danger">Iya, saya yakin</button>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>
    <!-- Content Row -->