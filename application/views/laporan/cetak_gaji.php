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
                <th>Total Gaji</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($potongan as $p) { ?>
                <?php $mangkir = $p['jml_potongan']; ?>
            <?php } ?>
            <?php $no = 1; ?>
            <?php foreach ($data_pegawai  as $key) : ?>
                <?php
                $potongan = ($key['potongan'] * $mangkir) + $key['pinjaman'];
                $total_gaji = $key['total_lembur'] + $key['gaji_pokok'] + $key['tunjangan'] - $potongan;
                ?>
                <tr class="data-row">
                    <td><?= $no++; ?></td>
                    <td><?= $key['nip']; ?></td>
                    <td><?= $key['nama']; ?></td>
                    <td><?= $key['jk_pegawai']; ?></td>
                    <td><?= $key['nama_jabatan']; ?></td>
                    <td><?= number_format($key['gaji_pokok'], 0); ?></td>
                    <td><?= number_format($key['tunjangan'], 0); ?></td>
                    <td>
                        <?php if ($key['total_lembur'] !== null) : ?>
                            <?= number_format($key['total_lembur'], 0); ?>
                        <?php else : ?>
                            0
                        <?php endif; ?>
                    </td>
                    <td><?= number_format($potongan, 0); ?></td>
                    <td><?= number_format($total_gaji, 0); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php if (empty($absensi)) : ?>
        <div class="alert">Data tidak ditemukan.</div>
    <?php endif; ?>
</body>

</html>