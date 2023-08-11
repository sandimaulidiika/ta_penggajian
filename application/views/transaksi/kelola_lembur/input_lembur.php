<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>
    <?php if (validation_errors()) : ?>
        <div class="alert alert-danger col-6" role="alert">
            <?= validation_errors(); ?>
        </div>
    <?php endif; ?>
    <?= $this->session->flashdata('message'); ?>
    <!-- Content Row -->
    <div class="row">
        <div class="col-6">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <?php echo form_open_multipart('transaksi/input_lembur'); ?>
                    <div class="form-group">
                        <label for="nama">Pegawai</label>
                        <select class="form-control" id="select22" name="pegawai">
                            <option selected disabled>Pilih pegawai</option>
                            <?php foreach ($pegawai as $key) : ?>
                                <option value="<?= $key['nip'] ?>"><?= $key['nama'] . ' | ' . $key['nip'] ?></option>
                            <?php endforeach ?>
                        </select>
                        <?= form_error('select22', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="date">Tanggal Lembur</label>
                        <input type="datetime-local" class="form-control" name="tgl_lembur" id="tgl_lembur">
                    </div>
                    <div class="form-group">
                        <label for="date">Lama Lembur</label>
                        <input type="number" class="form-control" name="lama_lembur" id="lama_lembur" placeholder="1 - 8 (jam)">
                    </div>
                    <div class="form-group">
                        <label for="date">Keterangan</label>
                        <input type="text" class="form-control" name="keterangan" placeholder="Opsional">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a onclick="window.location='<?= site_url('transaksi/lembur') ?>'" class="btn btn-light">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>