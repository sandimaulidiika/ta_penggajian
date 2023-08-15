<!DOCTYPE html>
<html>
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
    <title>Slip Gaji</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h3 {
            text-align: center;
            margin-top: -5px;
        }

        .pegawai-box {
            border: 1px solid #000;
            padding: 10px;
            margin-bottom: 20px;
            background-color: #FFEECC;
            page-break-inside: avoid;
        }

        .attribut {
            margin-bottom: 5px;
            page-break-inside: avoid;
        }

        p {
            text-align: center;
            font-size: 16px;
        }

        hr {
            border: none;
            border-bottom: 2px solid black;
        }
    </style>
</head>

<body>
    <?php foreach ($potongan as $p) { ?>
        <?php $mangkir = $p['jml_potongan']; ?>
    <?php } ?>
    <?php $no = 1; ?>
    <?php foreach ($data_pegawai  as $key) : ?>
        <?php
        $potongan = ($key['potongan'] * $mangkir) + $key['pinjaman'];
        $total_gaji = $key['total_lembur'] + $key['gaji_pokok'] + $key['tunjangan'] - $potongan;
        ?>
        <div class="pegawai-box">
            <h3>PT. GAS</h3>
            <p><b>SLIP GAJI</b></p>
            <hr>
            <p>Periode: <?= '1 - 31 ' . (bulan($bulan)) ?> - <?= $tahun ?></p>
            <div class="attribut">
                <strong>No:</strong> <?= $no++; ?>
            </div>
            <div class="attribut">
                <strong>NIP:</strong> <?= $key['nip']; ?>
            </div>
            <div class="attribut">
                <strong>Nama:</strong> <?= $key['nama']; ?>
            </div>
            <div class="attribut">
                <strong>Jenis Kelamin:</strong> <?= $key['jk_pegawai']; ?>
            </div>
            <div class="attribut">
                <strong>Jabatan:</strong> <?= $key['nama_jabatan']; ?>
            </div>
            <div class="attribut">
                <strong>Gaji Pokok:</strong> Rp. <?= number_format($key['gaji_pokok'], 0); ?>
            </div>
            <div class="attribut">
                <strong>Tunjangan:</strong> Rp. <?= number_format($key['tunjangan'], 0); ?>
            </div>
            <div class="attribut">
                <strong>Lembur:</strong>
                <?php if ($key['total_lembur'] !== null) : ?>
                    Rp. <?= number_format($key['total_lembur'], 0); ?>
                <?php else : ?>
                    Rp. 0
                <?php endif; ?>
            </div>
            <div class="attribut">
                <strong>Potongan:</strong> Rp. <?= number_format($potongan, 0); ?>
            </div>
            <div class="attribut">
                <strong>Total Gaji:</strong> Rp. <?= number_format($total_gaji, 0); ?>
            </div>
        </div>
    <?php endforeach; ?>
</body>

</html>