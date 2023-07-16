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
                    <?php echo form_open_multipart('divisi/add'); ?>
                    <div class="form-group">
                        <label for="nama">Nama Divisi</label>
                        <input type="text" class="form-control" name="divisi" id="divisi" placeholder="Enter nama divisi" value="<?= set_value('nama_divisi') ?>" required>
                        <?= form_error('divisi', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="nama">Ketua Divisi</label>
                        <input type="text" class="form-control" name="ketua" id="ketua" placeholder="Enter ketua divisi" value="<?= set_value('ketua') ?>" required>
                        <?= form_error('ketua', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="nama">Deskripsi (Opsional)</label>
                        <input type="text" class="form-control" name="deskripsi" placeholder="Enter deskripsi" value="<?= set_value('deskripsi') ?>">
                        <?= form_error('deskripsi', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a onclick="window.location='<?= site_url('divisi') ?>'" class="btn btn-light">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>