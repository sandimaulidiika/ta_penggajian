<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Universal_model');
    }

    public function profile()
    {
        $data['user'] = $this->Universal_model->getUserPegawai($this->session->userdata('username'))->row_array();
        $data['title'] = 'Profile';

        $this->load->view('user/profile', $data);
    }
}
