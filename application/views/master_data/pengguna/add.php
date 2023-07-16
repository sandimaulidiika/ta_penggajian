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
                    <?php echo form_open_multipart('pengguna/add'); ?>
                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Enter nama lengkap" autocomplete="nama" value="<?= set_value('nama') ?>">
                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Enter username" autocomplete="name" value="<?= set_value('username') ?>">
                        <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="level">Level</label>
                        <select class="form-control" id="level" name="level" aria-label="Default select example">
                            <option selected>Pilih Level</option>
                            <option value="admin">Admin Payroll</option>
                            <option value="hrd">HRD</option>
                            <option value="ktu">KTU</option>
                        </select>
                        <?= form_error('level', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a onclick="window.location='<?= site_url('pengguna') ?>'" class="btn btn-light">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>