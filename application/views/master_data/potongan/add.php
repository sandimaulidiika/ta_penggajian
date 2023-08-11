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
                    <?php echo form_open_multipart('potongan/add'); ?>
                    <div class="form-group">
                        <label for="nama">Jenis Potongan</label>
                        <input type="text" class="form-control" name="potongan" id="potongan" placeholder="Enter jenis potongan" value="<?= set_value('potongan') ?>" required>
                        <?= form_error('potongan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="nama">Harga potongan</label>
                        <input type="text" class="form-control" name="jml_potongan" id="jml_potongan" placeholder="Enter harga potongan" value="<?= set_value('jml_potongan') ?>" required>
                        <?= form_error('jml_potongan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a onclick="window.location='<?= site_url('potongan') ?>'" class="btn btn-light">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>