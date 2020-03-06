<?php

function cek_sudah_login(){
    $ci =& get_instance();
    $user_session = $ci->session->userdata('userid');
    if($user_session){
        redirect('dashboard');
    }
}

function cek_gak_login(){
    $ci =& get_instance();
    $user_session = $ci->session->userdata('userid');
    if(!$user_session){
        redirect('auth/login');
    }
}

function check_admin(){
    $ci =& get_instance();
    $ci->load->library('islogin');
    if($ci->islogin->data_login()->level !=1){
        redirect ('dashboard');
    }
}