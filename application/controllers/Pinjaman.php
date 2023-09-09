<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pinjaman extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Universal_model', 'universal');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Pinjaman';
        $data['pinjaman'] = $this->universal->getPinjaman();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('master_data/pinjaman/index', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        if (!is_admin()) {
            redirect('dashboard');
        }
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Tambah pinjaman';
        $data['pegawai'] = $this->universal->get('pegawai');

        $this->form_validation->set_rules('peminjam', 'Peminjam', 'trim|required');
        $this->form_validation->set_rules('tenor', 'Tenor', 'trim|required');
        $this->form_validation->set_rules('besar_pinjaman', 'Besar pinjaman', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('master_data/pinjaman/add', $data);
            $this->load->view('templates/footer');
        } else {
            $besar_pinjaman = $this->input->post('besar_pinjaman', true);
            $tenor = $this->input->post('tenor', true);
            $bunga_pertahun = 0.03; // Bunga pertahun 3%

            // Hitung Bunga Bulanan
            $bunga_bulanan = ($besar_pinjaman * $bunga_pertahun) / 12;

            // Hitung Total Cicilan
            $cicilan_pokok = $besar_pinjaman / $tenor;
            $cicilan_total = $cicilan_pokok + $bunga_bulanan;

            $nip_pegawai = $this->input->post('peminjam', true);

            // Cek sisa pinjaman yang belum lunas
            $this->db->select_sum('sisa_pinjaman');
            $this->db->where('nip_pegawai', $nip_pegawai);
            $query = $this->db->get('pinjaman');

            $row = $query->row();
            $total_sisa_pinjaman = $row->sisa_pinjaman;

            if ($total_sisa_pinjaman > 0) {
                set_pesan('Pegawai ini masih memiliki pinjaman yang belum lunas.', false);
                redirect('pinjaman/add');
            }

            $data = [
                'nip_pegawai' => $nip_pegawai,
                'besar_pinjaman' => $besar_pinjaman,
                'tenor' => $tenor,
                'sisa_pinjaman' => $tenor, // Set sisa_pinjaman dengan nilai tenor (belum lunas)
                'cicilan' => $cicilan_total,
                'tanggal' => time(),
            ];

            $this->universal->insert('pinjaman', $data);
            set_pesan('Tambah data pinjaman berhasil!');
            redirect('pinjaman');
        }
    }

    public function update_gaji_bulanan()
    {
        $username = $this->session->userdata('username');
        $this->universal->updateTanggalKlikGaji($username);
        $this->universal->updateGajiBulanan();
        set_pesan('Gaji sudah diberikan!');
        redirect('transaksi/gaji');
    }

    public function delete($id)
    {
        $where = array('id_pinjaman' => $id);
        $this->db->delete('pinjaman', $where);
        set_pesan('delete data berhasil!');
        redirect('pinjaman');
    }
}
