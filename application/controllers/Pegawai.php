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
        $data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('UserID')])->row_array();
        $data['title'] = 'Data Pegawai';
        $data['pegawai'] = $this->universal->getPegawai();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('master_data/pegawai/index', $data);
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        $id = $this->input->post('id');

        $data = [
            'nama_divisi' => $this->input->post('divisi'),
            'ketua_divisi' => $this->input->post('ketua'),
            'deskripsi' => $this->input->post('deskripsi'),
        ];

        $this->universal->update('pegawai', 'id', $id, $data);
        set_pesan('Data berhasil diubah!');
        redirect('pegawai');
    }

    public function delete($id)
    {
        $where = array('id' => $id);
        $this->db->delete('pegawai', $where);
        set_pesan('delete data berhasil!');
        redirect('pegawai');
    }
}
