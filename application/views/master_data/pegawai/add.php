<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <?php echo form_open_multipart('pegawai/add'); ?>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="nama">Nama pegawai</label>
                                <input type="text" class="form-control" name="pegawai" id="pegawai" placeholder="Enter nama pegawai" value="<?= set_value('pegawai') ?>" required>
                                <?= form_error('pegawai', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="nama">NIP pegawai</label>
                                <input type="text" class="form-control" name="nip" id="nip" placeholder="Enter nip" value="<?= set_value('nip') ?>" required>
                                <?= form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="nama">Jenis Kelamin</label>
                                <select class="form-control" id="jk" name="jk" aria-label="Default select example">
                                    <option selected disabled>Pilih jenis kelamin</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                                <?= form_error('jk', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="nama">Status</label>
                                <select class="form-control" id="status" name="status" aria-label="Default select example">
                                    <option selected disabled>Pilih status pegawai</option>
                                    <option value="Pegawai Tetap">Pegawai Tetap</option>
                                    <option value="Kontrak">Kontrak</option>
                                </select>
                                <?= form_error('status', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="nama">Agama</label>
                                <input type="text" class="form-control" name="agama" id="agama" placeholder="Enter agama" value="<?= set_value('agama') ?>" required>
                                <?= form_error('agama', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="nama">User <i>(Opsional)</i></label>
                                <select class="form-control" id="user" name="user" aria-label="Default select example">
                                    <option selected disabled>Pilih user</option>
                                    <?php foreach ($users as $j) : ?>
                                        <option value="<?= $j['id_user']; ?>"><?= $j['username']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="nama">Jabatan</label>
                                <select class="form-control" id="jabatan" name="jabatan" aria-label="Default select example">
                                    <option selected disabled>Pilih jabatan</option>
                                    <?php foreach ($jabatan as $key) : ?>
                                        <option value="<?= $key['kode_jab'] ?>"><?= $key['nama_jabatan'] ?></option>
                                    <?php endforeach ?>
                                </select>
                                <?= form_error('jabatan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="nama">Divisi</label>
                                <select class="form-control" id="select22" name="divisi" aria-label="Default select example">
                                    <option selected disabled>Pilih divisi</option>
                                    <?php foreach ($divisi as $key) : ?>
                                        <option value="<?= $key['id_divisi'] ?>"><?= $key['nama_divisi'] ?></option>
                                    <?php endforeach ?>
                                </select>
                                <?= form_error('divisi', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="name">Tanggal Masuk</label>
                                <input type="date" class="form-control" name="tgl_masuk" id="tgl_masuk" placeholder="Enter tanggal masuk" value="<?= set_value('tgl_masuk') ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="nama">Status Kawin</label>
                                <select class="form-control" id="status_kawin" name="status_kawin" aria-label="Default select example">
                                    <option selected disabled>Pilih status kawin</option>
                                    <option value="Sudah Kawin">Sudah Kawin</option>
                                    <option value="Belum Kawin">Belum Kawin</option>
                                </select>
                                <?= form_error('status', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="nama">Alamat</label>
                                <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Enter alamat" value="<?= set_value('alamat') ?>" required>
                                <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a onclick="window.location='<?= site_url('pegawai') ?>'" class="btn btn-light">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>