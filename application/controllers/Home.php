<?php

//defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function index()
    {
        $data = array(
            'title' => 'Web Sekolah',
            'isi' => 'home'
        );
        $this->load->view('layout/wrapper', $data, FALSE);
        //echo 'home / index';
    }
}
