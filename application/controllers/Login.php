<?php

class Login extends CI_Controller
{

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == true) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $this->user_login->login($username, $password);
        }

        $data = array(
            'title' => 'Halaman Login',
            'title2' => 'Dashboard',
            'isi' => 'login'
        );
        $this->load->view('login', $data);
    }

    public function logout()
    {
        $this->user_login->logout();
    }
}
