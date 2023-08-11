<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
        <button onclick="window.location='<?= site_url('pinjaman/add') ?>'" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
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
                            <th>Peminjam</th>
                            <th>Tanggal</th>
                            <th>Tenor</th>
                            <th>Pinjaman</th>
                            <th>Cicilan</th>
                            <th>Sisa</th>
                            <th>Keterangan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($pinjaman as $key) : ?>
                            <?php
                            $tanggal_pinjaman = $key['tanggal'];
                            $bulan_sekarang = date('n');
                            $bulan_pinjaman = date('n', $tanggal_pinjaman);
                            $selisih_bulan = $bulan_sekarang - $bulan_pinjaman;

                            $sisa_pinjaman = $key['sisa_pinjaman'] - ($key['cicilan'] * $selisih_bulan);
                            ?>

                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $key['nip'], " (", $key['nama'] . ")" ?></td>
                                <td><?= date('d - m - Y', $key['tanggal']) ?></td>
                                <td><?= $key['tenor'] ?> Bulan</td>
                                <td>Rp. <?= number_format($key['besar_pinjaman']); ?></td>
                                <td>Rp. <?= number_format($key['cicilan']); ?></td>
                                <td><?= $sisa_pinjaman ?> Bulan</td>
                                <th>
                                    <?php if ($key['sisa_pinjaman'] > 0) : ?>
                                        <span class="badge badge-warning"><i class="fa-solid fa-xmark"></i> Belum Lunas</span>
                                    <?php else : ?>
                                        <span class="badge badge-success"><i class="fa-solid fa-check"></i> Sudah Lunas</span>
                                    <?php endif ?>
                                    </td>
                                    <?php if (is_admin()) : ?>
                                <td>
                                    <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?= $key['id_pinjaman'] ?>">
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

    <!-- delete Modal-->
    <?php foreach ($pinjaman as $key) : ?>
        <div class="modal fade" id="deleteModal<?= $key['id_pinjaman'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <button onclick="window.location='<?= site_url('pinjaman/delete/' . $key['id_pinjaman']) ?>'" class="btn btn-danger">Iya, saya yakin</button>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>
    <!-- Content Row -->