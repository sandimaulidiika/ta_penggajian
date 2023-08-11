<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Dashboard';

        $data['total_pegawai'] = $this->db->query('select * from pegawai')->num_rows();
        $data['total_user'] = $this->db->query('select * from user')->num_rows();
        $data['total_jabatan'] = $this->db->query('select * from jabatan')->num_rows();
        $data['total_divisi'] = $this->db->query('select * from divisi')->num_rows();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dashboard', $data);
        $this->load->view('templates/footer');
    }
}
