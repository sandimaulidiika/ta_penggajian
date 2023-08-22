<!DOCTYPE html>
<html>
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

        .container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin: 20px;
        }

        .pegawai-box {
            border: 1px solid #000;
            padding: 10px;
            background-color: #FFEECC;
            box-sizing: border-box;
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
    <div class="container">
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
            <div class="pegawai-box">
                <h3>PT. GAS</h3>
                <p><b>SLIP GAJI</b></p>
                <hr>
                <div class="premi">
                    <p>Periode: <?= '1 - '  . $hari . (bulan($bulan)) ?> - <?= $tahun ?></p>
                    <div class="attribut">
                        <strong>No Urut:</strong> <?= $no++; ?>
                    </div>
                    <div class="attribut">
                        <strong>NIP:</strong> <?= $key['nip']; ?>
                    </div>
                    <div class="attribut">
                        <strong>Nama:</strong> <?= $key['nama']; ?>
                    </div>
                    <div class="attribut">
                        <strong>Jabatan:</strong> <?= $key['nama_jabatan']; ?>
                    </div>
                    <div class="attribut">
                        <strong>Jumlah HK:</strong> <?= $key['hadir']; ?>
                    </div>
                    <div class="attribut">
                        <strong>Gaji Pokok:</strong> Rp. <?= number_format($key['gaji_pokok'], 0); ?>
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
                        <strong>Tunjangan Lainnya:</strong> Rp. <?= number_format($key['tunjangan'], 0); ?>
                    </div>
                    <div class="attribut">
                        <h4>Total Gaji: </strong> Rp. <?= number_format($total_gaji, 0); ?></h4>
                    </div>
                </div>

                <div class="potongan">

                    <h3>POTONGAN</h3>

                    <div class="attribut">
                        <strong>Pph 21:</strong>Rp. <?= number_format($p['pph21'], 0); ?>
                    </div>
                    <div class="attribut">
                        <strong>BPJS KES:</strong>Rp. <?= number_format($p['bpjskes'], 0); ?>
                    </div>
                    <div class="attribut">
                        <strong>BPJS NAKER:</strong>Rp. <?= number_format($p['bpjsnaker'], 0); ?>
                    </div>
                    <div class="attribut">
                        <strong>Tidak Absen/Mangkir:</strong> Rp. <?= number_format($tidakhadir, 0); ?>
                    </div>
                    <div class="attribut">
                        <strong>Koperasi/Pinjaman:</strong>
                        <?php if ($key['pinjaman'] !== null) : ?>
                            Rp. <?= number_format($key['pinjaman'], 0); ?>
                        <?php else : ?>
                            Rp. 0
                        <?php endif; ?>
                    </div>
                </div>
                <div class="attribut">
                    <h4>GAJI DITERIMA:</strong> Rp. <?= number_format($gaji_diterima) ?></h4>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</body>

</html>