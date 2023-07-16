<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-6">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <?php echo form_open_multipart('jabatan/add'); ?>
                    <div class="form-group">
                        <label for="nama">Nama Jabatan</label>
                        <input type="text" class="form-control" name="jabatan" id="jabatan" placeholder="Enter nama jabatan" value="<?= set_value('nama_jabatan') ?>" required>
                        <?= form_error('jabatan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="nama">Gaji Pokok</label>
                        <input type="text" class="form-control" name="pokok" id="pokok" placeholder="Enter gaji pokok" value="<?= set_value('nama_pokok') ?>" required>
                        <?= form_error('pokok', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="nama">Tunjangan</label>
                        <input type="text" class="form-control" name="tunjangan" id="tunjangan" placeholder="Enter tunjangan" value="<?= set_value('nama_tunjangan') ?>" required>
                        <?= form_error('tunjangan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="nama">Lembur</label>
                        <input type="number" class="form-control" name="lembur" id="rupiah" placeholder="Enter lembur" value="<?= set_value('nama_lembur') ?>" required>
                        <?= form_error('lembur', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a onclick="window.location='<?= site_url('jabatan') ?>'" class="btn btn-light">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>