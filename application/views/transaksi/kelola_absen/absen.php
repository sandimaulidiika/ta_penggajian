<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
    </div>
    <?= $this->session->flashdata('message'); ?>
    <!-- Content Row -->

    <div class="card mb-3">
        <div class="card-header bg-primary text-white">
            Filter Data Absensi Pegawai
        </div>
        <div class="card-body">
            <form class="form-inline" method="post" action="">
                <div class="form-group mb-2">
                    <label for="bulan">Bulan</label>
                    <select name="bulan" id="bulan" class="form-control ml-2">
                        <option value="">-- Pilih Bulan --</option>
                        <option value="01">Januari</option>
                        <option value="02">Februari</option>
                        <option value="03">Maret</option>
                        <option value="04">April</option>
                        <option value="05">Mei</option>
                        <option value="06">Juni</option>
                        <option value="07">Juli</option>
                        <option value="08">Agustus</option>
                        <option value="09">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                    </select>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="tahun">Tahun</label>
                    <select name="tahun" id="tahun" class="form-control ml-2">
                        <option value="">-- Pilih Tahun --</option>
                        <?php $thn = date('Y');
                        for ($i = $thn; $i < $thn + 5; $i++) { ?>
                            <option value="<?= $i; ?>"><?= $i; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mb-2 ml-auto"><i class="fas fa-eye"></i> Tampilkan Data</button>
                <a href="<?= base_url('transaksi/input_absensi') ?>" class="btn btn-success mb-2 ml-2"><i class="fas fa-plus"></i> Input Kehadiran</a>
            </form>
        </div>
    </div>

    <?php
    if ((isset($_POST['bulan']) && $_POST['bulan'] != null) && (isset($_POST['tahun']) && $_POST['tahun'] != null)) {
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        $bulanTahun = $bulan . $tahun;
    } else {
        $bulan = date('m');
        $tahun = date('Y');
        $bulanTahun = $bulan . $tahun;
    }

    ?>

    <!-- Info Tanggal & Tahun -->
    <div class="alert alert-info mt-4" role="alert">Menampilkan Data Kehadiran Pegawai Bulan: <strong><?= $bulan; ?></strong> Tahun: <strong><?= $tahun; ?></strong></div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel <?= $title; ?></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIP</th>
                            <th>Nama Pegawai</th>
                            <th>Jenis Kelamin</th>
                            <th>Jabatan</th>
                            <th>Hadir</th>
                            <th>Sakit</th>
                            <th>Mangkir</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($absensi as $key) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $key['nip'] ?></td>
                                <td><?= $key['nama'] ?></td>
                                <td><?= $key['jk_pegawai'] ?></td>
                                <td><?= $key['nama_jabatan'] ?></td>
                                <td><?= $key['hadir'] ?></td>
                                <td><?= $key['sakit'] ?></td>
                                <td><?= $key['mangkir'] ?></td>
                                <?php if (is_admin()) : ?>
                                    <td>
                                        <button class="btn btn-success" data-toggle="modal" data-target="#editModal<?= $key['nip'] ?>">
                                            <i class="fas fa-edit"></i> Edit
                                        </button>
                                    </td>
                                <?php else : ?>
                                    <td></td>
                                <?php endif ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php if (empty($absensi)) : ?>
                    <div class="alert alert-danger text-center" role="alert">Bulan : <?= $bulan; ?> Tahun : <?= $tahun; ?> Data tidak ditemukan.</div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- edit modal -->
    <?php foreach ($absensi as $key) : ?>
        <div class="modal fade" id="editModal<?= $key['nip'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit <?= $title ?></h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form action="<?= site_url('transaksi/absensi_edit/') ?>" method="POST">
                        <div class="modal-body">
                            <input type="hidden" name="nip" value="<?= $key['nip'] ?>">
                            <div class="form-group">
                                <label for="nama">Hadir</label>
                                <input type="text" class="form-control" name="hadir" id="hadir" placeholder="Enter kehadiran" value="<?= $key['hadir'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="nama">Sakit</label>
                                <input type="text" class="form-control" name="sakit" id="sakit" placeholder="Enter Sakit" value="<?= $key['sakit'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="nama">Mangkir</label>
                                <input type="text" class="form-control" name="mangkir" id="mangkir" placeholder="Enter Mangkir" value="<?= $key['mangkir'] ?>" required>
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