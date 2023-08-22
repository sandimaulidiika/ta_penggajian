<!-- Begin Page Content -->
<div class="container-fluid">

    <?php if (validation_errors()) : ?>
        <div class="alert alert-danger" role="alert">
            <?= validation_errors(); ?>
        </div>
    <?php endif; ?>
    <?= $this->session->flashdata('message'); ?>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
        <a onclick="window.location='<?= site_url('transaksi/absensi') ?>'" class="btn btn-danger mt-sm-4">
            <i class="fa-solid fa-arrow-left"></i></i> Back
        </a>
    </div>

    <div class="col-xl-6 col-sm-12">

        <div class="row">
            <div class="col">
                <div class="card shadow mb-4">
                    <div class="card-header bg-primary text-white">
                        Input Data Absensi Pegawai
                    </div>
                    <div class="card-body">
                        <form class="form-inline" method="post" action="<?= site_url('transaksi/aksi_import_absensi') ?>" enctype="multipart/form-data" />
                        <input type="file" class="form-control" name="excel_file" id="excel_file" required accept=".xlsx, .xls">
                        <button type="submit" class="btn btn-primary mb-2 ml-auto"><i class="fas fa-file-excel"></i> Save Data</button>
                        </form>
                        <p class="mt-3">* file yang bisa di import adalah .xls | .xlsx.</p>
                        <p>* download contoh file excel <a class="text-success" href="<?= base_url('assets/uploads/siswa.xlsx') ?>">Download</a></p>
                        <p class="text-danger">* Jangan lupa hapus header di file excel setelah mengedit / input data, kemudian disave dan diimport.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>