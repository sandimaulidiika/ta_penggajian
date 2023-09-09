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

                <?php
                $username = $this->session->userdata('username');
                $tanggal_klik_gaji = $this->universal->getTanggalKlikGaji($username);
                $can_click = (strtotime(date('Y-m')) === strtotime(date('Y-m', strtotime($tanggal_klik_gaji))));
                ?>
                <a href="<?php echo site_url('pinjaman/update_gaji_bulanan'); ?>" class="btn btn-<?= ($can_click) ? 'success disabled' : 'danger'; ?> mb-2 ml-2">
                    <i class="fa-solid fa-money-bill-1-wave"></i> Gaji Bulan Ini
                </a>

                <?php if (empty($data_pegawai)) : ?>
                    <button type="button" class="btn btn-warning mb-2 ml-2" data-toggle="modal" data-target="#emptygajiModal"><i class="fas fa-print"></i> Cetak Slip Gaji</button>
                <?php else : ?>
                    <a target="_blank" href="<?= site_url('transaksi/cetakslipgaji?bulan=') . $bulan . '&tahun=' . $tahun; ?>" class="btn btn-success mb-2 ml-2"><i class="fas fa-print"></i> Cetak Slip Gaji</a>
                <?php endif; ?>
            </form>
        </div>
    </div>

    <!-- Info Tanggal & Tahun -->
    <div class="alert alert-info mt-4" role="alert">Menampilkan Data Gaji Pegawai Bulan: <strong><?= $bulan; ?></strong> Tahun: <strong><?= $tahun; ?></strong></div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel <?= $title; ?></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th rowspan=" 10">No</th>
                            <th rowspan="10">NIP</th>
                            <th rowspan="10">Nama</th>
                            <th rowspan="10">Kode Jab</th>
                            <th rowspan="10">Gaji Pokok</th>
                            <th rowspan="10">Tunjangan</th>
                            <th rowspan="10">Lembur</th>
                            <th rowspan="1" colspan="2" class="text-center">Potongan</th>
                            <th rowspan="10">Total Gaji</th>
                        </tr>
                        <tr>
                            <th>Mangkir</th>
                            <th>Pinjaman</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($potongan as $p) { ?>
                            <?php
                            $jml_potongan = $p['mangkir']; ?>
                        <?php } ?>
                        <?php $no = 1; ?>
                        <?php foreach ($data_pegawai  as $key) : ?>
                            <?php
                            $tidakhadir = $key['mangkir'] * $jml_potongan;
                            ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $key['nip']; ?></td>
                                <td><?= $key['nama']; ?></td>
                                <td><?= $key['kode_jab']; ?></td>
                                <td>Rp. <?= number_format($key['gaji_pokok'], 0); ?></td>
                                <td>Rp. <?= number_format($key['tunjangan'], 0); ?></td>
                                <td>
                                    <?php if ($key['total_lembur'] !== null) : ?>
                                        Rp. <?= number_format($key['total_lembur'], 0); ?>
                                    <?php else : ?>
                                        Rp. 0
                                    <?php endif; ?>
                                </td>
                                <td>Rp. <?= number_format($tidakhadir, 0); ?></td>
                                <td>
                                    <?php if ($key['pinjaman'] !== null) : ?>
                                        Rp. <?= number_format($key['pinjaman'], 0); ?>
                                    <?php else : ?>
                                        Rp. 0
                                    <?php endif; ?>
                                </td>
                                <td>Rp. <?= number_format($key['total_gaji'], 0); ?></td>
                            </tr>
                        <?php endforeach; ?>
                        <?php if (empty($data_pegawai)) : ?>
                            <tr>
                                <td colspan="10" style="background-color: red;" align="center" class="text-white">Bulan : <?= $bulan; ?> Tahun : <?= $tahun; ?> Absensi Belum Di Inputkan.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- Modal jika gaji kosong bulan ini -->
    <div class="modal fade" id="emptygajiModal" tabindex="-1" aria-labelledby="emptygajiModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="emptygajiModalLabel">Informasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning" role=""><i class="fas fa-info"></i> Data gaji bulan <?= $bulan; ?> dan tahun <?= $tahun; ?> masih kosong. silahkan input absensi terlebih dahulu pada bulan dan tahun yang anda pilih.</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>