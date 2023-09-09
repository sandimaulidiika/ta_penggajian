<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Potongan extends CI_Controller
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
        $data['title'] = 'Potongan Gaji';
        $data['potongan'] = $this->db->get('potongan')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('master_data/potongan/index', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        if (!is_admin()) {
            redirect('dashboard');
        }
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Tambah Potongan';
        $data['potongan'] = $this->db->get('potongan')->result_array();

        $this->form_validation->set_rules('potongan', 'Jenis potongan', 'trim|required');
        $this->form_validation->set_rules('jml_potongan', 'Harga potongan', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('master_data/potongan/add', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'hadir' => $this->input->post('hadir', true),
                'sakit' => $this->input->post('sakit', true),
                'mangkir' => $this->input->post('mangkir', true),
                'pph21' => $this->input->post('pph21', true),
                'bpjskes' => $this->input->post('bpjskes', true),
                'bpjsnaker' => $this->input->post('bpjsnaker', true),
            ];

            $this->universal->insert('potongan', $data);
            set_pesan('tambah data potongan berhasil!');
            redirect('potongan');
        }
    }

    public function edit()
    {
        $id = $this->input->post('id_potongan');

        $data = [
            'hadir' => $this->input->post('hadir', true),
            'sakit' => $this->input->post('sakit', true),
            'mangkir' => $this->input->post('mangkir', true),
            'pph21' => $this->input->post('pph21', true),
            'bpjskes' => $this->input->post('bpjskes', true),
            'bpjsnaker' => $this->input->post('bpjsnaker', true),
        ];

        $this->universal->update('potongan', 'id_potongan', $id, $data);
        set_pesan('Data berhasil diubah!');
        redirect('potongan');
    }

    public function delete($id)
    {
        $where = array('id_potongan' => $id);
        $this->db->delete('potongan', $where);
        set_pesan('delete data berhasil!');
        redirect('potongan');
    }
}
