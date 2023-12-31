<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai extends CI_Controller
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
        $data['title'] = 'Data Pegawai';
        $data['pegawai'] = $this->universal->getPegawai();
        $data['users'] = $this->db->get('user')->result_array();
        $data['divisi'] = $this->db->get('divisi')->result_array();
        $data['jabatan'] = $this->db->get('jabatan')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('master_data/pegawai/index', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        if (!is_admin()) {
            redirect('dashboard');
        }
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->username])->row_array();
        $data['title'] = 'Tambah Pegawai';
        $data['jabatan'] = $this->db->get('jabatan')->result_array();
        $data['divisi'] = $this->db->get('divisi')->result_array();
        $data['users'] = $this->db->get('user')->result_array();

        $this->form_validation->set_rules('pegawai', 'Nama pegawai', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('master_data/pegawai/add', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama' => $this->input->post('pegawai', true),
                'nip' => $this->input->post('nip', true),
                'jk_pegawai' => $this->input->post('jk', true),
                'status' => $this->input->post('status', true),
                'agama' => $this->input->post('agama', true),
                'kode_jab' => $this->input->post('jabatan', true),
                'id_divisi' => $this->input->post('divisi', true),
                'tgl_masuk' => $this->input->post('tgl_masuk', true),
                'status_kawin' => $this->input->post('status_kawin', true),
                'alamat' => $this->input->post('alamat', true),
                // 'id_user' => !empty($this->input->post('user', true)) ? $this->input->post('user', true) : 0,
            ];

            if ($this->input->post('jabatan', true) === "JA14") {
                $user = [
                    'nama_lengkap' => $this->input->post('pegawai', true),
                    'username' => $this->input->post('nip', true),
                    'password' => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
                    'level' => 'pegawai', // Menggunakan array pegawai
                    'foto_user' => 'default.svg',
                ];
            } else {
                $user = [
                    'nama_lengkap' => $this->input->post('pegawai', true),
                    'username' => $this->input->post('nip', true),
                    'password' => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
                    'level' => $this->input->post('jabatan', true),
                    'foto_user' => 'default.svg',
                ];
            }

            $this->universal->insert('user', $user);
            $proses = $this->universal->insert('pegawai', $data);
            if ($proses) {
                set_pesan('tambah data pegawai berhasil!');
            } else {
                set_pesan('tambah data pegawai gagal!', false);
            }
            redirect('pegawai');
        }
    }

    public function edit()
    {
        $id = $this->input->post('nip');

        $data = [
            'nama' => $this->input->post('pegawai', true),
            'jk_pegawai' => $this->input->post('jk', true),
            'status' => $this->input->post('status', true),
            'agama' => $this->input->post('agama', true),
            'kode_jab' => $this->input->post('jabatan', true),
            'id_divisi' => $this->input->post('divisi', true),
            'tgl_masuk' => $this->input->post('tgl_masuk', true),
            'status_kawin' => $this->input->post('status_kawin', true),
            'alamat' => $this->input->post('alamat', true),
            'id_user' => !empty($this->input->post('user', true)) ? $this->input->post('user', true) : 0,
        ];

        $this->universal->update('pegawai', 'nip', $id, $data);
        set_pesan('Data berhasil diubah!');
        redirect('pegawai');
    }

    public function delete($id)
    {
        // Hapus data pegawai berdasarkan NIP
        $this->db->where('nip', $id);
        $this->db->delete('pegawai');

        // Hapus data user berdasarkan username (NIP)
        $this->db->where('username', $id);
        $this->db->delete('user');

        set_pesan('Data berhasil dihapus!');
        redirect('pegawai');
    }
}
