<!DOCTYPE html>
<html lang="en">
<?php
if ((isset($_POST['bulan']) && $_POST['bulan'] != null) && (isset($_POST['tahun']) && $_POST['tahun'] != null)) {
    $bulan = $_POST['bulan'];
    $tahun = $_POST['tahun'];
    $bulanTahun = $bulan . $tahun;
} else {
    $bulan = date('m');
    $tahun = date('Y');
    $bulanTahun = $bulan . $tahun;
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <style>
        #table {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #table td,
        #table th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #table tr:hover {
            background-color: #ddd;
        }

        #table th {
            padding-top: 10px;
            padding-bottom: 10px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }

        #table tr {
            page-break-inside: avoid;
        }

        .alert {
            padding: 20px;
            background-color: #f44336;
            color: white;
            text-align: center;
        }
    </style>
</head>

<body>
    <div style="text-align:center">
        <h3> PT. GAS</h3>
        <h3>Laporan Gaji Pegawai</h3>
        <hr>
        <p>Periode: Bulan <?= $bulan ?> Tahun <?= $tahun ?></p>
    </div>
    <table id="table">
        <thead>
            <tr>
                <th>No</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Jabatan</th>
                <th>Gaji Pokok</th>
                <th>Tunjangan</th>
                <th>Lembur</th>
                <th>Potongan</th>
                <th>Gaji Diterima</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($potongan as $pot) { ?>
                <?php $mangkir = $pot['mangkir']; ?>
            <?php } ?>
            <?php $no = 1; ?>
            <?php foreach ($data_pegawai  as $key) : ?>
                <?php
                $potongan = ($key['mangkir'] * $mangkir) + $key['pinjaman'] + $pot['pph21'] + $pot['bpjskes'] + $pot['bpjsnaker'];
                $gaji_diterima = ($key['gaji_pokok'] + $key['tunjangan'] + $key['total_lembur']) - $potongan;
                ?>
                <tr class="data-row">
                    <td><?= $no++; ?></td>
                    <td><?= $key['nip']; ?></td>
                    <td><?= $key['nama']; ?></td>
                    <td><?= $key['jk_pegawai']; ?></td>
                    <td><?= $key['kode_jab']; ?></td>
                    <td>Rp. <?= number_format($key['gaji_pokok'], 0, ',', '.'); ?></td>
                    <td>Rp. <?= number_format($key['tunjangan'], 0, ',', '.'); ?></td>
                    <td>
                        <?php if ($key['total_lembur'] !== null) : ?>
                            Rp. <?= number_format($key['total_lembur'], 0, ',', '.'); ?>
                        <?php else : ?>
                            0
                        <?php endif; ?>
                    </td>
                    <td>Rp. <?= number_format($potongan, 0, ',', '.'); ?></td>
                    <td>Rp. <?= number_format($gaji_diterima, 0, ',', '.'); ?></td>
                </tr>
            <?php endforeach; ?>
            <?php if (empty($data_pegawai)) : ?>
                <tr>
                    <td colspan="10" style="background-color: red;" align="center">Bulan : <?= $bulan; ?> Tahun : <?= $tahun; ?> Absensi Belum Di Inputkan.</td>
                </tr>
            <?php endif; ?>
            <tr>
                <td colspan="8" align="center" style="background-color: yellow;">Total Gaji</td>
                <td align="center">Rp. <?= number_format($total_gaji_potongan, 0, ',', '.'); ?></td>
                <td align="center">Rp. <?= number_format($total_gaji_diterima, 0, ',', '.'); ?></td>
            </tr>
            <tr>
                <td colspan="8" align="center" style="background-color: yellow;">Total Gaji Dikeluarkan</td>
                <td colspan="2" align="center">Rp. <?= number_format($total_gaji_dikeluarkan, 0, ',', '.'); ?></td>
            </tr>
        </tbody>
    </table>
</body>

</html>