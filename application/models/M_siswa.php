<?php

//defined('BASEPATH') or exit('No direct script access allowed');

class M_siswa extends CI_Model
{

    public function lists()
    {
        $this->db->select('*');
        $this->db->from('siswa');
        $this->db->order_by('id_siswa', 'DESC');
        return $this->db->get()->result();
    }

    public function detail($id_siswa)
    {
        $this->db->select('*');
        $this->db->from('siswa');
        $this->db->where('id_siswa', $id_siswa);
        return $this->db->get()->row();
    }
    public function add($data)
    {
        $this->db->insert('siswa', $data);
    }

    public function update($data)
    {
        $this->db->where('id_siswa', $data['id_siswa']);
        $this->db->update('siswa', $data);
    }
    public function delete($data)
    {
        $this->db->where('id_siswa', $data['id_siswa']);
        $this->db->delete('siswa', $data);
    }
}
