<!-- Begin Page Content -->
<div class="container-fluid">

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

    <?php if (validation_errors()) : ?>
        <div class="alert alert-danger" role="alert">
            <?= validation_errors(); ?>
        </div>
    <?php endif; ?>
    <?= $this->session->flashdata('message'); ?>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
        <a onclick="window.location='<?= site_url('transaksi/absensi') ?>'" class="btn btn-danger">
            <i class="fa-solid fa-arrow-left"></i></i> Back</a>
    </div>


    <div class="card mb-3">
        <div class="card-header bg-primary text-white">
            Input Data Absensi Pegawai
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
                        for ($i = 2020; $i < $thn + 5; $i++) { ?>
                            <option value="<?= $i; ?>"><?= $i; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mb-2 ml-auto"><i class="fas fa-gear"></i> Generate Form</button>
            </form>
        </div>
    </div>

    <!-- Info Tanggal & Tahun -->
    <div class="alert alert-info mt-4" role="alert">Menampilkan Data Kehadiran Pegawai Bulan: <strong><?= $bulan; ?></strong> Tahun: <strong><?= $tahun; ?></strong></div>

    <div class="card shadow mb-4">
        <form action="<?= base_url('transaksi/aksi_input_absensi'); ?>" method="post">
            <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Tabel <?= $title; ?></h6>
                <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Simpan</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIP</th>
                                <th>Nama Pegawai</th>
                                <th>Jenis Kelamin</th>
                                <th>Jabatan</th>
                                <th width="8%">Hadir</th>
                                <th width="8%">Sakit</th>
                                <th width="8%">Mangkir</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($inputAbsensi as $key) : ?>
                                <tr>
                                    <input type="hidden" name="bulan[]" class="form-control" value="<?= $bulanTahun; ?>">
                                    <input type="hidden" name="nip[]" class="form-control" value="<?= $key['nip']; ?>">
                                    <input type="hidden" name="jk_pegawai[]" class="form-control" value="<?= $key['jk_pegawai']; ?>">
                                    <input type="hidden" name="id_jabatan[]" class="form-control" value="<?= $key['id_jabatan']; ?>">
                                    <td><?= $no++ ?></td>
                                    <td><?= $key['nip'] ?></td>
                                    <td><?= $key['nama'] ?></td>
                                    <td><?= $key['jk_pegawai'] ?></td>
                                    <td><?= $key['nama_jabatan'] ?></td>
                                    <td>
                                        <input type="text" name="hadir[]" class="form-control" value="0">
                                    </td>
                                    <td>
                                        <input type="text" name="sakit[]" class="form-control" value="0">
                                    </td>
                                    <td>
                                        <input type="text" name="mangkir[]" class="form-control" value="0">
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </div>