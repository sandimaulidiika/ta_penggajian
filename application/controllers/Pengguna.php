<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        if (!is_admin()) {
            redirect('dashboard');
        }
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('UserID')])->row_array();
        $data['title'] = 'Data Pengguna';
        $data['pengguna'] = $this->db->get('user')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('master_data/pengguna/index', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('UserID')])->row_array();
        $data['title'] = 'Tambah Pengguna';

        $this->form_validation->set_rules('nama', 'Nama', 'trim|required', [
            'required' => 'Nama tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('username', 'Username', 'trim|required', [
            'required' => 'Username tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[4]', [
            'required' => 'Password tidak boleh kosong!',
            'min_length' => 'Password terlalu pendek!'
        ]);
        $this->form_validation->set_rules('level', 'Level User', 'trim|required', [
            'required' => 'Level User harus di pilih!'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('master_data/pengguna/add', $data);
            $this->load->view('templates/footer');
        } else {
            $nama = $this->input->post('nama', true);
            $username = $this->input->post('username', true);
            $level = $this->input->post('level', true);

            $data = [
                'nama_lengkap' => $nama,
                'username' => $username,
                'password' => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
                'level' => $level,
            ];

            // jika validasi lolos
            $this->db->insert('user', $data);
            set_pesan('Selamat! data Developer berhasil ditambahkan');
            redirect('pengguna');
        }
    }

    public function edit()
    {
        $id = $this->input->post('id');

        $data = [
            'nama_lengkap' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'level' => $this->input->post('level'),
        ];

        $password = $this->input->post('password');
        $password2 = $this->input->post('password2');

        if (!empty($password) && $password == $password2) {
            // Jika password tidak kosong dan password dan password2 cocok
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        $this->db->where('id', $id);
        $this->db->update('user', $data);
        set_pesan('Data berhasil diubah!');
        redirect('pengguna');
    }

    public function userdelete($id)
    {
        $where = array('id' => $id);
        $this->db->delete('user', $where);
        set_pesan('delete data berhasil!');
        redirect('pengguna');
    }
}
