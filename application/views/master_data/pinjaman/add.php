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
                    <?php echo form_open_multipart('pinjaman/add'); ?>
                    <div class="form-group">
                        <label for="nama">Peminjam</label>
                        <select class="form-control" id="select22" name="peminjam" aria-label="Default select example">
                            <option selected disabled>Pilih divisi</option>
                            <?php foreach ($pegawai as $key) : ?>
                                <option value="<?= $key['nip'] ?>"><?= $key['nama'] . ' | ' . $key['nip'] ?></option>
                            <?php endforeach ?>
                        </select>
                        <?= form_error('peminjam', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="nama">Tenor</label>
                        <select class="form-control" id="tenor" name="tenor" aria-label="Default select example">
                            <option selected disabled>Pilih tenor</option>
                            <option value="6">6 Bulan</option>
                            <option value="12">12 Bulan</option>
                            <option value="24">24 Bulan</option>
                        </select>
                        <?= form_error('tenor', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="nama">Besar Pinjaman</label>
                        <input type="text" class="form-control" name="besar_pinjaman" id="besar_pinjaman" placeholder="Enter besar pinjaman" value="<?= set_value('besar_pinjaman') ?>" required>
                        <?= form_error('besar_pinjaman', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a onclick="window.location='<?= site_url('pinjaman') ?>'" class="btn btn-light">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>