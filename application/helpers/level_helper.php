<?php
function is_logged_in() //ini untuk mengecek apakah user sudah login atau belum
{
    $ci = get_instance();
    $ci->session->userdata('username') || redirect('auth');
}

function is_admin()
{
    $ci = get_instance();
    $role = $ci->session->level;

    $status  = true;

    if ($role != 'admin') {
        $status = false;
    }

    return $status;
}
