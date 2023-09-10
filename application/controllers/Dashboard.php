<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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
        $data['title'] = 'Dashboard';

        $data['total_pegawai'] = $this->db->query('select * from pegawai')->num_rows();
        $data['total_user'] = $this->db->query('select * from user')->num_rows();
        $data['total_jabatan'] = $this->db->query('select * from jabatan')->num_rows();
        $data['total_divisi'] = $this->db->query('select * from divisi')->num_rows();

        // pegawai
        $data['divisi'] = $this->universal->getUserPegawai($this->session->username)->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dashboard', $data);
        $this->load->view('templates/footer');
    }
}
