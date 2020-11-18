<?php

class Admin extends CI_Controller
{

    public function index()
    {
        $data = array(
            'title' => 'E - Learn',
            'title2' => 'Dashboard',
            'isi' => 'admin/home'
        );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }
}
