<?php

//defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // $this->load->model('m_guru');
        // $this->load->model('m_mapel');
        $this->load->model('m_siswa');
    }

    public function index()
    {
        $data = array(
            'title' => 'E - Learn',
            'title2' => 'Siswa',
            'siswa' => $this->m_siswa->lists(),
            'isi' => 'admin/siswa/list'
        );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    public function add()
    {
        $this->form_validation->set_rules('nis', 'NIS', 'required');
        $this->form_validation->set_rules('nama_siswa', 'Nama Siswa', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('kelas', 'Kelas', 'required');

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './foto_siswa/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 2000;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('foto_siswa')) {
                $data = array(
                    'title' => 'E - Learn',
                    'title2' => 'Tambah Data Siswa',
                    'error' => $this->upload->display_errors(),
                    //     'mapel' => $this->m_mapel->getAllMapel(),
                    'isi' => 'admin/siswa/add'
                );
                $this->load->view('admin/layout/wrapper', $data, FALSE);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './foto_siswa/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);

                $data = array(
                    'nis' => $this->input->post('nis'),
                    'nama_siswa' => $this->input->post('nama_siswa'),
                    'tempat_lahir' => $this->input->post('tempat_lahir'),
                    'tgl_lahir' => $this->input->post('tgl_lahir'),
                    // 'id_mapel' => $this->input->post('id_mapel'),
                    'kelas' => $this->input->post('kelas'),
                    'foto_siswa' =>  $upload_data['uploads']['file_name']
                );
                $this->m_siswa->add($data);
                $this->session->set_flashdata('pesan', 'data berhasil ditambahkan.');
                redirect('siswa');
            }
        }

        $data = array(
            'title' => 'E - Learn',
            'title2' => 'Tambah Data Siswa',
            'error' => $this->upload->display_errors(),
            'isi' => 'admin/siswa/add'
        );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    public function edit($id_siswa)
    {
        $this->form_validation->set_rules('nis', 'NIS', 'required');
        $this->form_validation->set_rules('nama_siswa', 'Nama Siswa', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('kelas', 'Kelas', 'required');
        // $this->form_validation->set_rules('foto_siswa', 'Foto siswa', 'required');

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './foto_siswa/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 2000;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('foto_siswa')) {
                $data = array(
                    'title' => 'E - Learn',
                    'title2' => 'Edit Data siswa',
                    'error' => $this->upload->display_errors(),
                    'siswa' => $this->m_siswa->detail($id_siswa),
                    'isi' => 'admin/siswa/edit'
                );
                $this->load->view('admin/layout/wrapper', $data, FALSE);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './foto_siswa/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);

                // //menghapus foto lama
                // $siswa = $this->m_siswa->detail($id_siswa);
                // if ($siswa->foto_siswa != "") {
                //     unlink('./foto_siswa/' . $siswa->foto_siswa);
                // }
                // //end

                $data = array(
                    'id_siswa' => $id_siswa,
                    'nis' => $this->input->post('nis'),
                    'nama_siswa' => $this->input->post('nama_siswa'),
                    'tempat_lahir' => $this->input->post('tempat_lahir'),
                    'tgl_lahir' => $this->input->post('tgl_lahir'),
                    'kelas' => $this->input->post('kelas'),
                    'foto_siswa' =>  $upload_data['uploads']['file_name']
                );
                $this->m_siswa->update($data);
                $this->session->set_flashdata('pesan', 'data berhasil diedit.');
                redirect('siswa');
            }
            $upload_data = array('uploads' => $this->upload->data());
            $config['image_library'] = 'gd2';
            $config['source_image'] = './foto_siswa/' . $upload_data['uploads']['file_name'];
            $this->load->library('image_lib', $config);
            $data = array(
                'id_siswa' => $id_siswa,
                'nis' => $this->input->post('nis'),
                'nama_siswa' => $this->input->post('nama_siswa'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'kelas' => $this->input->post('kelas')
            );
            $this->m_siswa->update($data);
            $this->session->set_flashdata('pesan', 'data berhasil diedit.');
            redirect('siswa');
        }

        $data = array(
            'title' => 'E - Learn',
            'title2' => 'Edit Data Siswa',
            'error' => $this->upload->display_errors(),
            'siswa' => $this->m_siswa->detail($id_siswa),
            'isi' => 'admin/siswa/edit'
        );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    public function delete($id_siswa)
    {
        //menghapus foto lama
        $siswa = $this->m_siswa->detail($id_siswa);
        if ($siswa->foto_siswa != "") {
            unlink('./foto_siswa/' . $siswa->foto_siswa);
        }
        //end
        $data = array('id_siswa' => $id_siswa);
        $this->m_siswa->delete($data);
        $this->session->set_flashdata('pesan', 'data berhasil dihapus.');
        redirect('siswa');
    }
}
