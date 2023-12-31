<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
        <button onclick="window.location='<?= site_url('transaksi/input_lembur') ?>'" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
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
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Pegawai</th>
                            <th>Tanggal Lembur</th>
                            <th>Lama Lembur</th>
                            <th>Keterangan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($lembur as $key) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $key['nama'] . " (" . $key['nip'] ?>)</td>
                                <td><?= date("d-m-Y H:i:s", strtotime($key['tgl_lembur'])) ?></td>
                                <td><?= $key['lama_lembur'] ?> Jam</td>
                                <td><?= $key['keterangan'] ?></td>
                                <td>
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#editModal<?= $key['id_lembur'] ?>">
                                        <i class=" fas fa-edit"></i> Edit
                                    </button>
                                    <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?= $key['nip_pegawai'] ?>">
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
    <?php foreach ($lembur as $key) : ?>
        <div class="modal fade" id="editModal<?= $key['id_lembur'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit <?= $title ?></h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form action="<?= site_url('transaksi/edit_lembur/') ?>" method="POST">
                        <input type="hidden" name="id_lembur" value="<?= $key['id_lembur'] ?>">
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="nama">NIP Pegawai</label>
                                    <select class="form-control" name="nip_pegawai">
                                        <option selected disabled>Pilih Pegawai</option>
                                        <?php foreach ($pegawai as $p) : ?>
                                            <option <?= $key['nip_pegawai'] == $p['nip'] ? 'selected' : '' ?> value="<?= $p['nip']; ?>"><?= $p['nama']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="nama">Tanggal</label>
                                    <input type="datetime-local" class="form-control" name="tgl_lembur" value="<?= $key['tgl_lembur'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="nama">Lama Lembur</label>
                                    <input type="number" class="form-control" name="lama_lembur" value="<?= $key['lama_lembur'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="nama">Keterangan</label>
                                    <input type="text" class="form-control" name="keterangan" value="<?= $key['keterangan'] ?>" placeholder="Opsional">
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
    <?php foreach ($lembur as $key) : ?>
        <div class="modal fade" id="deleteModal<?= $key['nip_pegawai'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <button onclick="window.location='<?= site_url('transaksi/delete_lembur/' . $key['nip_pegawai']) ?>'" class="btn btn-danger">Iya, saya yakin</button>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>
    <!-- Content Row -->