</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Hak Cipta SB Admin 2 &copy; PT. Gelumbang Agro Sentosa <?= date('Y') ?></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Yakin ingin keluar?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Pilih "Keluar" di bawah jika Anda siap untuk mengakhiri sesi Anda saat ini.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger" href="<?= base_url('auth/logout') ?>">Keluar</a>
            </div>
        </div>
    </div>
</div>

<!-- change password modal -->
<div class="modal fade" id="changepw" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ganti Kata Sandi</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?= site_url('auth/ganti_kata_sandi/') ?>" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="id_divisi" value="">
                    <div class="form-group">
                        <label for="nama">Kata Sandi Lama</label>
                        <input type="password" class="form-control" name="sandi_lama" placeholder="Enter sandi lama">
                        <?= form_error('sandi_lama', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="nama">Kata Sandi Baru</label>
                        <input type="password" class="form-control" name="baru_1" placeholder="Enter kata sandi">
                        <?= form_error('baru_1', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="nama">Ulangi Kata Sandi Baru</label>
                        <input type="password" class="form-control" name="baru_2" placeholder="Enter ulangi kata sandi">
                        <?= form_error('baru_2', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/') ?>js/sb-admin-2.min.js"></script>

<!-- data tabel -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/') ?>js/demo/datatables-demo.js"></script>

<script>
    $(document).ready(function() {
        $('#dataTable').on('submit', 'form', function(e) {
            // Cek input "Hadir", "Sakit", dan "Mangkir" pada setiap baris
            var errors = false;
            $(this).find('input[name^="hadir"], input[name^="sakit"], input[name^="mangkir"]').each(function() {
                if ($(this).val() === '') {
                    // Jika ada input kosong, tampilkan pesan error dan beri class "is-invalid"
                    errors = true;
                    $(this).addClass('is-invalid');
                } else {
                    $(this).removeClass('is-invalid');
                }
            });

            if (errors) {
                // Jika ada error, mencegah form dikirimkan ke server
                e.preventDefault();
            }
        });
    });
</script>

<!-- seacrh dropdown -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#select22').select2();
    });
</script>

<!-- sweetalert2 -->
<script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
<script>
    <?php if ($this->session->flashdata('success')) { ?>
        var text = <?php echo json_encode($this->session->flashdata('success')) ?>;
        swal("Good job!", text, "success")
    <?php } ?>

    <?php if ($this->session->flashdata('danger')) { ?>
        var text = <?php echo json_encode($this->session->flashdata('danger')) ?>;
        swal("Failed!", text, "error")
    <?php } ?>

    <?php if ($this->session->flashdata('error')) { ?>
        var text = <?php echo json_encode($this->session->flashdata('error')) ?>;
        swal("Failed!", text, "error")
    <?php } ?>
</script>
</body>

</html>