<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gaji extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Universal_model', 'universal');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->username])->row_array();
        $data['title'] = 'Data Gaji';

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
        $data['data_pegawai'] = $this->universal->userGajiPegawai($bulanTahun);

        foreach ($data['data_pegawai'] as &$pegawai) {
            $pinjaman = $this->universal->pinjamanUser($pegawai['nip_pegawai']);
            $mangkir = $this->universal->userMangkir($pegawai['nip_pegawai']);
            $total_lembur = $this->universal->totalLemburByNIP($pegawai['nip_pegawai'], $bulan, $tahun);
            $total_gaji = $this->universal->userTotalGaji($pegawai['nip_pegawai']);

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
        $this->load->view('pegawai/gaji', $data);
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
        $data['cetak'] = $this->universal->cetak_slip_user($bulanTahun);

        foreach ($data['cetak'] as &$pegawai) {
            $pinjaman = $this->universal->pinjamanUser($pegawai['nip_pegawai']);
            $mangkir = $this->universal->userMangkir($pegawai['nip_pegawai']);
            $total_lembur = $this->universal->totalLemburByNIP($pegawai['nip_pegawai'], $bulan, $tahun);
            $gaji = $this->universal->userTotalGaji($pegawai['nip_pegawai']);

            $total_gaji = $gaji['gaji_pokok'] + $gaji['tunjangan'] + $total_lembur;

            $pegawai['total_lembur'] = $total_lembur;
            $pegawai['total_gaji'] = $total_gaji;

            // potongan
            $pegawai['pinjaman'] = $pinjaman;
            $pegawai['mangkir'] = $mangkir;
        }

        // Load the HTML view
        $html = $this->load->view('pegawai/cetak_slip', $data, true);

        // Generate PDF using the Pdfgenerator library
        $this->pdfgenerator->generate($html, 'slip_gaji', true);
    }
}
