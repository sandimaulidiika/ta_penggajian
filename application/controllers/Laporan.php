<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Universal_model', 'universal');
    }

    public function laporan_absen()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Laporan Absensi Pegawai';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan/laporan_absen', $data);
        $this->load->view('templates/footer');
    }

    public function cetaK_laporan_absensi()
    {
        $data['title'] = 'Cetak Absensi Pegawai';
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

        // Load the HTML view
        $html = $this->load->view('laporan/cetak_absen', $data, true);

        // Generate PDF using the Pdfgenerator library
        $this->pdfgenerator->generate($html, 'Cetak Absensi Pegawai', 'A4', 'portrait', true);
    }

    public function laporan_gaji()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Laporan Gaji Pegawai';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan/laporan_gaji', $data);
        $this->load->view('templates/footer');
    }

    public function cetaK_laporan_gaji()
    {
        $data['title'] = 'Cetak Gaji Pegawai';
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
            $potongan = $this->universal->getPotongan($pegawai['nip']);
            $total_lembur = $this->universal->getTotalLemburByNIP($pegawai['nip'], $bulan, $tahun);
            $total_gaji_jabatan = $this->universal->getTotalGaji($pegawai['nip']);

            $total_gaji = $total_gaji_jabatan['gaji_pokok'] + $total_gaji_jabatan['tunjangan'];
            $total_gaji += $total_lembur; // Tambahkan total lembur
            $total_gaji -= $pinjaman;
            // $total_gaji -= $potongan;

            $pegawai['pinjaman'] = $pinjaman;
            $pegawai['total_lembur'] = $total_lembur;
            $pegawai['potongan'] = $potongan;
            $pegawai['total_gaji'] = $total_gaji;
        }

        $data['absensi'] = $this->universal->joinPegawaiJabatan($bulanTahun);

        // Load the HTML view
        $html = $this->load->view('laporan/cetak_gaji', $data, true);

        // Generate PDF using the Pdfgenerator library
        $this->pdfgenerator->generate($html, 'Cetak Gaji Pegawai', 'A4', 'landscape', true);
    }
}
