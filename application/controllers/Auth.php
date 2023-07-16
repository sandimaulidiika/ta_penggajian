<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
        if ($this->session->userdata('username')) {
            redirect('dashboard');
        }

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login';
            $this->load->view('auth/login', $data);
        } else {
            // validasi sukses
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['username' => $username])->row_array();

        // jika user ada
        if ($user) {
            // cek password dan level
            if (password_verify($password, $user['password'])) {
                $data = [
                    'UserID' => $user['id'],
                    'username' => $user['username'],
                    'level' => $user['level']
                ];
                $this->session->set_userdata($data);
                redirect('dashboard');
            } else {
                // jika password salah
                set_pesan('Password anda salah', false);
                redirect('auth');
            }
        } else {
            set_pesan('username tidak ditemukan!', false);
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        set_pesan('Anda telah keluar dari sistem');
        redirect('auth');
    }
}
