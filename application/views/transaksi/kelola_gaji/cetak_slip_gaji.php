<?php
if ((isset($_POST['bulan']) && $_POST['bulan'] != null) && (isset($_POST['tahun']) && $_POST['tahun'] != null)) {
    $kalender = CAL_GREGORIAN;
    $bulan = date('m');
    $tahun = date('Y');
    $bulanTahun = $bulan . $tahun;
    $hari = cal_days_in_month($kalender, $bulan, $tahun);
} else {
    $kalender = CAL_GREGORIAN;
    $bulan = date('m');
    $tahun = date('Y');
    $bulanTahun = $bulan . $tahun;
    $hari = cal_days_in_month($kalender, $bulan, $tahun);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slip Gaji</title>
    <style>
        h2 {
            margin: 0;
        }

        h3 {
            margin-bottom: 5px;
        }

        .table-bordered {
            padding: 0px;
            padding: 0px;
            width: 100%;
            border: 2px solid black;
            border-spacing: 0;
            border-collapse: collapse;
        }

        .table-header {
            padding: 40px 0px;
            text-align: center;
        }

        .table-header h2 {
            text-decoration: underline;
            padding: 0px;
            margin: 0px;
        }

        .table-header p {
            margin: 2px 0;
        }

        .border td {
            border-top: 1px solid black;
            border-bottom: 1px solid black;
            margin: 0px;
        }

        td {
            margin: 0px;
            padding: 4px 20px;
        }

        .w-40 {
            width: 40%;
        }

        .w-60 {
            width: 60%;
        }

        .text-end {
            text-align: right;
        }

        .text-start {
            text-align: left;
        }

        .text-center {
            text-align: center;
        }

        .fw-bold {
            font-weight: 700;
        }

        .d-flex {
            display: flex;
        }

        .justify-content-between {
            justify-content: space-between;
        }

        .border-none {
            border-left: none !important;
        }
    </style>
</head>

<body>
    <div class="grid-container">
        <div class="grid-item ">
            <?php foreach ($potongan as $p) { ?>
                <?php $jumlah = $p['mangkir']; ?>
            <?php } ?>
            <?php $no = 1; ?>
            <?php foreach ($cetak  as $key) : ?>
                <?php
                $tidakhadir = $key['mangkir'] * $jumlah;
                $total_gaji = $key['total_gaji'];
                $total_potongan = ($key['mangkir'] * $jumlah) + $key['pinjaman'];
                $gaji_diterima = $total_gaji - $total_potongan - $p['pph21'] - $p['bpjskes'] - $p['bpjsnaker'];
                ?>
                <table class="table table-bordered">
                    <tr>
                        <td colspan="3" class="table-header">
                            <h4>PT. GAS</h4>
                            <h3>SLIP GAJI</h3>
                            <p>Periode: <?= '1 - '  . $hari . (bulan($bulan)) ?> - <?= $tahun ?></p>
                        </td>
                    </tr>
                    <tr class="border">
                        <td class="w-50">No. urut</td>
                        <td style="width: 0%;">:</td>
                        <td class="w-50 text-end fw-bold"><?= $no++; ?></td>
                    </tr>
                    <tr class="border">
                        <td class="w-50">NIP</td>
                        <td style="width: 0%;">:</td>
                        <td class="w-50 fw-bold"><?= $key['nip']; ?></td>
                    </tr>
                    <tr class="border">
                        <td class="w-50">Nama</td>
                        <td style="width: 0%;">:</td>
                        <td class="w-50 fw-bold"><?= $key['nama']; ?></td>
                    </tr>
                    <tr class="border">
                        <td class="w-50">Jabatan</td>
                        <td style="width: 0%;">:</td>
                        <td class="w-50 fw-bold"><?= $key['nama_jabatan']; ?></td>
                    </tr>
                    <tr class="border">
                        <td class="w-50">Status</td>
                        <td style="width: 0%;">:</td>
                        <td class="w-50 fw-bold">Bulanan</td>
                    </tr>
                    <tr class="border">
                        <td class="w-50">Jumlah HK</td>
                        <td style="width: 0%;">:</td>
                        <td class="w-50 text-end"><?= $key['hadir']; ?></td>
                    </tr>
                    <tr class="border">
                        <td class="w-50">Gaji Pokok</td>
                        <td style="width: 0%;">:</td>
                        <td class="w-50">
                            <div class="d-flex justify-content-between">
                                <div>Rp</div>
                                <div><?= number_format($key['gaji_pokok'], 0); ?></div>
                            </div>
                        </td>
                    </tr>
                    <tr class="border">
                        <td class="w-50">Premi/Lembur</td>
                        <td style="width: 0%;">:</td>
                        <td class="w-50">
                            <div class="d-flex justify-content-between">
                                <?php if ($key['total_lembur'] !== null) : ?>
                                    <div>Rp</div>
                                    <div><?= number_format($key['total_lembur'], 0); ?></div>
                                <?php else : ?>
                                    <div>Rp</div>
                                    <div>-</div>
                                <?php endif; ?>
                            </div>
                        </td>
                    </tr>
                    <tr class="border">
                        <td class="w-50">Tunjangan Lainnya</td>
                        <td style="width: 0%;">:</td>
                        <td class="w-50">
                            <div class="d-flex justify-content-between">
                                <div>Rp</div>
                                <div><?= number_format($key['tunjangan'], 0); ?></div>
                            </div>
                        </td>
                    </tr>
                    <tr class="border">
                        <td class="w-50 fw-bold">Total Gaji</td>
                        <td style="width: 0%;" class=" fw-bold">:</td>
                        <td class="w-50">
                            <div class="d-flex justify-content-between">
                                <div class="fw-bold">Rp</div>
                                <div class="fw-bold"><?= number_format($total_gaji, 0); ?></div>
                            </div>
                        </td>
                    </tr>
                    <tr class="border" style="background-color: beige;">
                        <td colspan="3" class="fw-bold text-center">
                            POTONGAN
                        </td>
                    </tr>
                    <tr class="border">
                        <td class="w-50">PPh 21</td>
                        <td style="width: 0%;">:</td>
                        <td class="w-50">
                            <div class="d-flex justify-content-between">
                                <div>Rp</div>
                                <div><?= number_format($p['pph21'], 0); ?></div>
                            </div>
                        </td>
                    </tr>
                    <tr class="border">
                        <td class="w-50">BPJS Kes</td>
                        <td style="width: 0%;">:</td>
                        <td class="w-50">
                            <div class="d-flex justify-content-between">
                                <div>Rp</div>
                                <div><?= number_format($p['bpjskes'], 0); ?></div>
                            </div>
                        </td>
                    </tr>
                    <tr class="border">
                        <td class="w-50">BPJS Naker</td>
                        <td style="width: 0%;">:</td>
                        <td class="w-50">
                            <div class="d-flex justify-content-between">
                                <div>Rp</div>
                                <div><?= number_format($p['bpjsnaker'], 0); ?></div>
                            </div>
                        </td>
                    </tr>
                    <tr class="border">
                        <td class="w-50">Tidak Absen/Mangkir</td>
                        <td style="width: 0%;">:</td>
                        <td class="w-50">
                            <div class="d-flex justify-content-between">
                                <div>Rp</div>
                                <div><?= number_format($tidakhadir, 0); ?></div>
                            </div>
                        </td>
                    </tr>
                    <tr class="border">
                        <td class="w-50">Koperasi</td>
                        <td style="width: 0%;">:</td>
                        <td class="w-50">
                            <div class="d-flex justify-content-between">
                                <?php if ($key['pinjaman'] !== null) : ?>
                                    <div>Rp</div>
                                    <div><?= number_format($key['pinjaman'], 0); ?></div>
                                <?php else : ?>
                                    <div>Rp</div>
                                    <div>-</div>
                                <?php endif; ?>
                            </div>
                        </td>
                    </tr>
                    <tr class="border">
                        <td class="w-50 fw-bold">Total Potongan</td>
                        <td style="width: 0%;" class=" fw-bold">:</td>
                        <td class="w-50">
                            <div class="d-flex justify-content-between">
                                <div class="fw-bold">Rp</div>
                                <div class="fw-bold"> <?= number_format($total_potongan, 0); ?></div>
                            </div>
                        </td>
                    </tr>
                    <tr class="border">
                        <td class="w-50 fw-bold"><br></td>
                        <td style="width: 0%;" class=" fw-bold"></td>
                        <td class="w-50">
                            <div class="d-flex justify-content-between">
                                <div class="fw-bold"></div>
                                <div class="fw-bold"></div>
                            </div>
                        </td>
                    </tr>
                    <tr class="border" style="background-color: pink;">
                        <td class="w-50 fw-bold">GAJI DITERIMA</td>
                        <td style="width: 0%;" class=" fw-bold">:</td>
                        <td class="w-50">
                            <div class="d-flex justify-content-between">
                                <div class="fw-bold">Rp</div>
                                <div class="fw-bold"><?= number_format($gaji_diterima) ?></div>
                            </div>
                        </td>
                    </tr>
                </table>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>