<?php
function is_logged_in() //ini untuk mengecek apakah user sudah login atau belum
{
    $ci = get_instance();
    $ci->session->userdata('username') || redirect('auth');
}

function is_admin()
{
    $ci = get_instance();
    $role = $ci->session->get_userdata('login_session')['level'];
    var_dump($role);
    die;

    $status  = true;

    if ($role != 'admin') {
        $status = false;
    }

    return $status;
}

function userdata($field)
{
    $ci = get_instance();
    $ci->load->model('Level_model', 'level');

    $userId = $ci->session->userdata('login_session')['user'];
    return $ci->level->get('user', ['id' => $userId])[$field];
}
