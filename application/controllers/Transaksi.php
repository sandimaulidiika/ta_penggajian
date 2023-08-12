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

    public function aksi_input_absensi()
    {
        $this->form_validation->set_rules('hadir[]', 'Hadir', 'trim|required|numeric');

        if ($this->form_validation->run() == false) {
            set_pesan('Data absensi <strong>Gagal ditambahkan!</strong>. Ulangi kembali.', false);
            redirect('transaksi/input_absensi');
        } else {
            $post = $this->input->post();
            $data = [];
            foreach ($post['bulan'] as $key => $value) {
                if ($post['bulan'][$key] != null || $post['nik'][$key] != null) {
                    $data[] = [
                        'bulan' => $post['bulan'][$key],
                        'nip_pegawai' => $post['nip'][$key],
                        'jk_absensi' => $post['jk_pegawai'][$key],
                        'id_jabatan' => $post['id_jabatan'][$key],
                        'hadir' => $post['hadir'][$key],
                        'sakit' => $post['sakit'][$key],
                        'mangkir' => $post['mangkir'][$key]
                    ];
                }
            }
            $this->universal->tambah_batch($data);
            set_pesan('Data absensi <strong>Berhasil ditambahkan!</strong>');
            redirect('transaksi/absensi');
        }
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
            $potongan = $this->universal->getPotongan($pegawai['nip']);
            $total_lembur = $this->universal->getTotalLemburByNIP($pegawai['nip']);
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

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('transaksi/kelola_gaji/gaji', $data);
        $this->load->view('templates/footer');
    }
}
