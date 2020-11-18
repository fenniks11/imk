<?php

//defined('BASEPATH') or exit('No direct script access allowed');

class M_guru extends CI_Model
{

    public function lists()
    {
        $this->db->select('*');
        $this->db->from('guru');
        $this->db->join('mapel', 'mapel.id_mapel = guru.id_mapel');
        $this->db->order_by('id_guru', 'DESC');
        return $this->db->get()->result();
    }

    public function detail($id_guru)
    {
        $this->db->select('*');
        $this->db->from('guru');
        $this->db->join('mapel', 'mapel.id_mapel = guru.id_mapel');
        $this->db->where('id_guru', $id_guru);
        return $this->db->get()->row();
    }
    public function add($data)
    {
        $this->db->insert('guru', $data);
    }

    public function update($data)
    {
        $this->db->where('id_guru', $data['id_guru']);
        $this->db->update('guru', $data);
    }
    public function delete($data)
    {
        $this->db->where('id_guru', $data['id_guru']);
        $this->db->delete('guru', $data);
    }
}
