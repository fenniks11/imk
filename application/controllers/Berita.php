<?php

class Berita extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_berita');
    }
    public function index()
    {
        $data = array(
            'title' => 'E - Learn',
            'title2' => 'Berita',
            'berita' => $this->m_berita->lists(),
            'isi' => 'admin/berita/lists'
        );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    public function add()
    {
        $this->form_validation->set_rules('judul_berita', 'Judul Berita', 'required');
        $this->form_validation->set_rules('isi_berita', 'Isi Berita', 'required', array('required' => '%s Harus Diisi!'));


        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './gambar_berita/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 2000;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('gambar_berita')) {
                $data = array(
                    'title' => 'E - Learn',
                    'title2' => 'Posting Berita',
                    'error' => $this->upload->display_errors(),
                    'isi' => 'admin/berita/add'
                );
                $this->load->view('admin/layout/wrapper', $data, FALSE);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './gambar_berita/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);

                $data = array(
                    'judul_berita' => $this->input->post('judul_berita'),
                    'slug_berita' => url_title($this->input->post('judul_berita'), 'dash', TRUE),
                    'isi_berita' => $this->input->post('isi_berita'),
                    'tgl_berita' => date('Y-m-d'),
                    'id_user' => $this->session->userdata('id_user'),
                    'gambar_berita' =>  $upload_data['uploads']['file_name']
                );

                $this->m_berita->add($data);
                $this->session->set_flashdata('pesan', 'Data berita baru berhasil ditambahkan.');
                redirect('berita');
            }
        }
        $data = array(
            'title' => 'E - Learn',
            'title2' => 'Buat Berita',
            'isi' => 'admin/berita/add'
        );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }
}
