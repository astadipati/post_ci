<?php

Class Islogin{
    protected $ci;

    function __construct(){
        $this->ci =& get_instance();
    }

    function data_login(){
        $this->ci->load->model('user_m');
        $user_id = $this->ci->session->userdata('userid');
        $user_data = $this->ci->user_m->get($user_id)->row();
        return $user_data;
    }
}