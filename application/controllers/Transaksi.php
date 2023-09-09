<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Universal_model', 'universal');
    }

    public function absensi()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Absensi Pegawai';

        if ((isset($_POST['bulan']) && $_POST['bulan'] != null) && (isset($_POST['tahun']) && $_POST['tahun'] != null)) {
            $bulan = $this->input->post('bulan');
            $tahun = $this->input->post('tahun');
            $bulanTahun = $bulan . $tahun;
        } else {
            $bulan = date('m');
            $tahun = date('Y');
            $bulanTahun = $bulan . $tahun;
        }
        $data['absensi'] = $this->universal->joinPegawaiJabatan($bulanTahun);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('transaksi/kelola_absen/absen', $data);
        $this->load->view('templates/footer');
    }

    public function input_absensi()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['title'] = 'Input Absensi';
        if ((isset($_POST['bulan']) && $_POST['bulan'] != null) && (isset($_POST['tahun']) && $_POST['tahun'] != null)) {
            $bulan = $this->input->post('bulan');
            $tahun = $this->input->post('tahun');
            $bulanTahun = $bulan . $tahun;
        } else {
            $bulan = date('m');
            $tahun = date('Y');
            $bulanTahun = $bulan . $tahun;
        }

        $data['inputAbsensi'] = $this->universal->InputjoinPegawaiJabatan($bulanTahun);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('transaksi/kelola_absen/input', $data);
        $this->load->view('templates/footer');
    }

    public function aksi_import_absensi()
    {
        // Set validation rules
        $this->form_validation->set_rules('excel_file', 'Excel File', 'callback_validate_excel');

        if ($this->form_validation->run() == false) {
            set_pesan('File Excel tidak valid atau tidak dipilih.', false);
            redirect('transaksi/input_absensi');
        } else {
            $excelFilePath = $_FILES['excel_file']['tmp_name'];
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($excelFilePath);
            $sheet = $spreadsheet->getActiveSheet();

            $data = [];

            $firstRow = true; // Untuk mengidentifikasi baris pertama sebagai judul

            foreach ($sheet->getRowIterator() as $row) {
                if ($firstRow) {
                    $firstRow = false; // Lewati baris pertama
                    continue;
                }

                $rowData = $sheet->rangeToArray('A' . $row->getRowIndex() . ':G' . $row->getRowIndex(), null, true, false)[0];

                $data[] = [
                    'nip_pegawai' => $rowData[0],
                    'jk_absensi' => $rowData[1],
                    'kode_jab' => $rowData[2],
                    'hadir' => $rowData[3],
                    'sakit' => $rowData[4],
                    'mangkir' => $rowData[5],
                    'bulan' => $rowData[6]
                ];
            }

            if (!empty($data)) {
                $this->universal->tambah_batch($data);
                set_pesan('Data absensi <strong>Berhasil ditambahkan!</strong>');
            } else {
                set_pesan('Tidak ada data untuk diimpor.', false);
            }

            redirect('transaksi/absensi');
        }
    }

    public function validate_excel($str)
    {
        if (!empty($_FILES['excel_file']['name'])) {
            $fileExt = pathinfo($_FILES['excel_file']['name'], PATHINFO_EXTENSION);
            if ($fileExt == 'xlsx' || $fileExt == 'xls') {
                return true;
            } else {
                $this->form_validation->set_message('validate_excel', 'File harus dalam format Excel (xlsx atau xls).');
                return false;
            }
        } else {
            $this->form_validation->set_message('validate_excel', 'Pilih file Excel untuk diunggah.');
            return false;
        }
    }

    public function edit_absensi()
    {
        $nip = $this->input->post('nip_pegawai');

        $data = [
            'hadir' => $this->input->post('hadir'),
            'sakit' => $this->input->post('sakit'),
            'mangkir' => $this->input->post('mangkir'),
        ];

        $this->universal->update('absensi', 'nip_pegawai', $nip, $data);
        set_pesan('Data berhasil diubah!');
        redirect('transaksi/absensi');
    }

    public function lembur()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Kelola Lembur';
        $data['lembur'] = $this->universal->getLembur();
        $data['pegawai'] = $this->universal->get('pegawai');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('transaksi/kelola_lembur/lembur', $data);
        $this->load->view('templates/footer');
    }

    public function input_lembur()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Input Lembur';
        $data['pegawai'] = $this->universal->get('pegawai');

        $this->form_validation->set_rules('select22', 'Nama pegawai', '|trim');
        $this->form_validation->set_rules('tgl_lembur', 'Tanggal lembur', 'required|trim');
        $this->form_validation->set_rules('lama_lembur', 'Lama lembur', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('transaksi/kelola_lembur/input_lembur', $data);
            $this->load->view('templates/footer');
        } else {
            $insert_data = [
                'nip_pegawai' => $this->input->post('pegawai', true),
                'tgl_lembur' => $this->input->post('tgl_lembur', true),
                'lama_lembur' => $this->input->post('lama_lembur', true),
                'keterangan' => $this->input->post('keterangan', true),
            ];

            // insert ke database
            $this->universal->insert('lembur', $insert_data);
            set_pesan('Data lembur <strong>Berhasil diinput!</strong>');
            redirect('transaksi/lembur');
        }
    }

    public function edit_lembur()
    {
        $id = $this->input->post('id_lembur');

        $data = [
            'nip_pegawai' => $this->input->post('nip_pegawai', true),
            'tgl_lembur' => $this->input->post('tgl_lembur', true),
            'lama_lembur' => $this->input->post('lama_lembur', true),
            'keterangan' => $this->input->post('keterangan', true),
        ];

        $this->universal->update('lembur', 'id_lembur', $id, $data);
        set_pesan('Data lembur <strong>Berhasil diupdate!</strong>');
        redirect('transaksi/lembur');
    }

    public function delete_lembur($nip)
    {
        $where = array('nip_pegawai' => $nip);
        $this->db->delete('lembur', $where);
        set_pesan('delete data berhasil!');
        redirect('transaksi/lembur');
    }

    public function Gaji()
    {
        $data['title'] = 'Kelola Gaji';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        if ((isset($_POST['bulan']) && $_POST['bulan'] != null) && (isset($_POST['tahun']) && $_POST['tahun'] != null)) {
            $bulan = $this->input->post('bulan');
            $tahun = $this->input->post('tahun');
            $bulanTahun = $bulan . $tahun;
        } else {
            $bulan = date('m');
            $tahun = date('Y');
            $bulanTahun = $bulan . $tahun;
        }

        $data['potongan'] = $this->db->get('potongan')->result_array();
        $data['data_pegawai'] = $this->universal->joinJabatanPGajiPegawai($bulanTahun);

        foreach ($data['data_pegawai'] as &$pegawai) {
            $pinjaman = $this->universal->getPinjamann($pegawai['nip']);
            $mangkir = $this->universal->getMangkir($pegawai['nip']);
            $total_lembur = $this->universal->getTotalLemburByNIP($pegawai['nip'], $bulan, $tahun);
            $total_gaji = $this->universal->getTotalGaji($pegawai['nip']);

            $total_gaji = $total_gaji['gaji_pokok'] + $total_gaji['tunjangan'] + $total_lembur;
            $total_gaji -= $pinjaman;
            $total_gaji -= $mangkir;


            $pegawai['pinjaman'] = $pinjaman;
            $pegawai['total_lembur'] = $total_lembur;
            $pegawai['mangkir'] = $mangkir;
            $pegawai['total_gaji'] = $total_gaji;
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('transaksi/kelola_gaji/gaji', $data);
        $this->load->view('templates/footer');
    }

    public function cetakslipgaji()
    {
        if ((isset($_GET['bulan']) && $_GET['bulan'] != null) && (isset($_GET['tahun']) && $_GET['tahun'] != null)) {
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
            $bulanTahun = $bulan . $tahun;
        } else {
            $bulan = date('m');
            $tahun = date('Y');
            $bulanTahun = $bulan . $tahun;
        }

        $data['potongan'] = $this->db->get('potongan')->result_array();
        $data['cetak'] = $this->universal->cetak_slip($bulanTahun);

        foreach ($data['cetak'] as &$pegawai) {
            $pinjaman = $this->universal->getPinjamann($pegawai['nip']);
            $mangkir = $this->universal->getMangkir($pegawai['nip']);
            $total_lembur = $this->universal->getTotalLemburByNIP($pegawai['nip'], $bulan, $tahun);
            $gaji = $this->universal->getTotalGaji($pegawai['nip']);

            $total_gaji = $gaji['gaji_pokok'] + $gaji['tunjangan'] + $total_lembur;

            $pegawai['total_lembur'] = $total_lembur;
            $pegawai['total_gaji'] = $total_gaji;

            // potongan
            $pegawai['pinjaman'] = $pinjaman;
            $pegawai['mangkir'] = $mangkir;
        }

        // Load the HTML view
        $html = $this->load->view('transaksi/kelola_gaji/cetak_slip_gaji', $data, true);

        // Generate PDF using the Pdfgenerator library
        $this->pdfgenerator->generate($html, 'slip_gaji', true);
    }
}
