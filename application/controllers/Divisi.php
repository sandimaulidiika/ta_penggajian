<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Divisi extends CI_Controller
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
        $data['title'] = 'Data Divisi';
        $data['divisi'] = $this->db->get('divisi')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('master_data/divisi/index', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Tambah Divisi';
        $data['divisi'] = $this->db->get('divisi')->result_array();

        $this->form_validation->set_rules('divisi', 'Nama Divisi', 'trim|required', [
            'required' => 'Nama Divisi tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('ketua', 'Ketua Divisi', 'trim|required', [
            'required' => 'Ketua Divisi tidak boleh kosong!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('master_data/divisi/add', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_divisi' => $this->input->post('divisi', true),
                'ketua_divisi' => $this->input->post('ketua', true),
                'deskripsi' => $this->input->post('deskripsi', true),
            ];

            $this->universal->insert('divisi', $data);
            set_pesan('tambah data divisi berhasil!');
            redirect('divisi');
        }
    }

    public function edit()
    {
        $id = $this->input->post('id_divisi');

        $data = [
            'nama_divisi' => $this->input->post('divisi'),
            'ketua_divisi' => $this->input->post('ketua'),
            'deskripsi' => $this->input->post('deskripsi'),
        ];

        $this->universal->update('divisi', 'id_divisi', $id, $data);
        set_pesan('Data berhasil diubah!');
        redirect('divisi');
    }

    public function delete($id)
    {
        $where = array('id_divisi' => $id);
        $this->db->delete('divisi', $where);
        set_pesan('delete data berhasil!');
        redirect('divisi');
    }
}
