<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
        if ($this->session->username) {
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
                    'UserID' => $user['id_user'],
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

    public function ganti_kata_sandi()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->username])->row_array();
        $data['title'] = 'Change Password';

        $this->form_validation->set_rules('sandi_lama', 'Password Lama', 'required|trim|min_length[3]');
        $this->form_validation->set_rules('baru_1', 'Password Baru', 'required|trim|min_length[4]|matches[baru_2]');
        $this->form_validation->set_rules('baru_2', 'Konfirmasi Password', 'required|trim|matches[baru_1]');

        if ($this->form_validation->run() == false) {
            // redirect jika false
            redirect('dashboard');
        } else {
            $password_lama = $this->input->post('sandi_lama');
            $password_baru = $this->input->post('baru_1');
            if (!password_verify($password_lama, $data['user']['password'])) {
                $this->session->set_flashdata('error', 'Password lama salah!');
                redirect('dashboard');
            } else {
                if ($password_lama == $password_baru) {
                    $this->session->set_flashdata('danger', 'Password baru tidak boleh sama dengan kata sandi saat ini!');
                    redirect('dashboard');
                } else {
                    // password sudah ok
                    $password_hash = password_hash($password_baru, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('username', $this->session->username);
                    $this->db->update('user');

                    $this->session->set_flashdata('success', 'Berhasil ganti password!');
                    redirect('dashboard');
                }
            }
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        set_pesan('Anda telah keluar dari sistem');
        redirect('auth');
    }
}
