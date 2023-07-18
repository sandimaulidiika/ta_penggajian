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
        $data['jabatan'] = $this->db->get('jabatan')->result_array();
        $data['divisi'] = $this->db->get('divisi')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('master_data/pegawai/index', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('UserID')])->row_array();
        $data['title'] = 'Tambah Pegawai';
        $data['jabatan'] = $this->db->get('jabatan')->result_array();
        $data['divisi'] = $this->db->get('divisi')->result_array();

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
                'id_jabatan' => $this->input->post('jabatan', true),
                'id_divisi' => $this->input->post('divisi', true),
                'tgl_masuk' => $this->input->post('tgl_masuk', true),
                'status_kawin' => $this->input->post('status_kawin', true),
            ];

            $this->universal->insert('pegawai', $data);
            set_pesan('tambah data pegawai berhasil!');
            redirect('pegawai');
        }
    }

    public function edit()
    {
        $id = $this->input->post('id_pegawai');

        $data = [
            'nama' => $this->input->post('pegawai', true),
            'nip' => $this->input->post('nip', true),
            'jk_pegawai' => $this->input->post('jk', true),
            'status' => $this->input->post('status', true),
            'agama' => $this->input->post('agama', true),
            'id_jabatan' => $this->input->post('jabatan', true),
            'id_divisi' => $this->input->post('divisi', true),
            'tgl_masuk' => $this->input->post('tgl_masuk', true),
            'status_kawin' => $this->input->post('status_kawin', true),
        ];

        $this->universal->update('pegawai', 'id_pegawai', $id, $data);
        set_pesan('Data berhasil diubah!');
        redirect('pegawai');
    }

    public function delete($id)
    {
        $where = array('id_pegawai' => $id);
        $this->db->delete('pegawai', $where);
        set_pesan('delete data berhasil!');
        redirect('pegawai');
    }
}
