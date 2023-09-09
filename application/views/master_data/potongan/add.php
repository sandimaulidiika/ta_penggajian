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
                        <label for="nama">Hadir</label>
                        <input type="text" class="form-control" name="hadir" id="hadir" placeholder="Enter hadir" required>
                        <?= form_error('potongan', '<small class="text-danger pl-3">', '</small>'); ?>

                    </div>
                    <div class="form-group">
                        <label for="nama">Sakit</label>
                        <input type="text" class="form-control" name="sakit" id="sakit" placeholder="Enter sakit" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Mangkir</label>
                        <input type="text" class="form-control" name="mangkir" id="mangkir" placeholder="Enter mangkir" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Pph 21</label>
                        <input type="text" class="form-control" name="pph21" id="pph21" placeholder="Enter pph21" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Bpjs Kes</label>
                        <input type="text" class="form-control" name="bpjskes" id="bpjskes" placeholder="Enter bpjskes" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Bpjs Naker</label>
                        <input type="text" class="form-control" name="bpjsnaker" id="bpjsnaker" placeholder="Enter bpjsnaker" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a onclick="window.location='<?= site_url('potongan') ?>'" class="btn btn-light">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>