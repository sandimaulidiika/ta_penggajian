<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jabatan extends CI_Controller
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
        $data['title'] = 'Data Jabatan';
        $data['jabatan'] = $this->universal->get('jabatan');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('master_data/jabatan/index', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Tambah Jabatan';

        $this->form_validation->set_rules('jabatan', 'Nama Jabatan', 'trim|required', [
            'required' => 'Nama Jabatan tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('pokok', 'Gaji Pokok', 'trim|required', [
            'required' => 'Gaji Pokok tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('tunjangan', 'Tunjangan', 'trim|required', [
            'required' => 'Tunjangan tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('lembur', 'Lembur', 'trim|required', [
            'required' => 'Lembur tidak boleh kosong!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('master_data/jabatan/add', $data);
            $this->load->view('templates/footer');
        } else {

            $data = [
                'nama_jabatan' => $this->input->post('jabatan'),
                'gaji_pokok' => $this->input->post('pokok'),
                'tunjangan' => $this->input->post('tunjangan'),
                'lembur' => $this->input->post('lembur'),
            ];

            $this->universal->insert('jabatan', $data);
            set_pesan('data jabatan diinputkan');
            redirect('jabatan');
        }
    }

    public function edit()
    {
        $id = $this->input->post('id_jabatan');

        $data = [
            'nama_jabatan' => $this->input->post('jabatan'),
            'gaji_pokok' => $this->input->post('pokok'),
            'tunjangan' => $this->input->post('tunjangan'),
            'lembur' => $this->input->post('lembur'),
        ];

        $this->universal->update('jabatan', 'id_jabatan', $id, $data);
        set_pesan('Data berhasil diubah!');
        redirect('jabatan');
    }

    public function delete($id)
    {
        $where = array('id_jabatan' => $id);
        $this->db->delete('jabatan', $where);
        set_pesan('delete data berhasil!');
        redirect('jabatan');
    }
}
