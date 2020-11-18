<?php

//defined('BASEPATH') or exit('No direct script access allowed');

class Mapel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_mapel');
    }

    public function index()
    {
        $data = array(
            'title' => 'Sekolah',
            'title2' => 'Mata Pelajaran',
            'mapel' => $this->m_mapel->getAllMapel(),
            'isi' => 'admin/mapel'
        );

        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    public function add()
    {
        $data = array(
            'nama_mapel' => $this->input->post('nama_mapel')

        );
        $this->m_mapel->add($data);

        $this->session->set_flashdata('pesan', 'Data Berhasil ditambahkan.');
        redirect('mapel');
    }

    public function edit($id_mapel)
    {
        $data = array(
            'id_mapel' => $id_mapel,
            'nama_mapel' => $this->input->post('nama_mapel')

        );
        $this->m_mapel->edit($data);

        $this->session->set_flashdata('pesan', 'Data Berhasil diedit.');
        redirect('mapel');
    }

    public function delete($id_mapel)
    {
        $data = array(
            'id_mapel' => $id_mapel

        );
        $this->m_mapel->delete($data);

        $this->session->set_flashdata('pesan', 'Data Berhasil dihapus.');
        redirect('mapel');
    }
}
