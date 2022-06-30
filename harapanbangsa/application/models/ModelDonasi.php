<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelDonasi extends CI_Model
{
    //Manajemen Donasi
    public function getDonasi()
    {
        return $this->db->get('donasi');
    }

    public function donasiWhere($where)
    {
        return $this->db->get_where('donasi', $where);
    }

    public function simpanDonasi($data = null)
    {
        $this->db->insert('donasi', $data);
    }

    public function updateDonasi($data = null, $where = null)
    {
        $this->db->update('donasi', $data, $where);
    }

    public function hapusDonasi($where = null)
    {
        $this->db->delete('donasi', $where);
    }

    public function total($field, $where)
    {
        $this->db->select_sum($field);
        if (!empty($where) && count($where) > 0) {
            $this->db->where($where);
        }
        $this->db->from('donasi');
        return $this->db->get()->row($field);
    }

    //Manajemen Jenis Donasi
    public function getJenis()
    {
        return $this->db->get('jenis');
    }

    public function jenisWhere($where)
    {
        return $this->db->get_where('jenis', $where);
    }

    public function simpanJenis($data = null)
    {
        $this->db->insert('jenis', $data);
    }

    public function hapusJenis($where = null)
    {
        $this->db->delete('jenis', $where);
    }

    public function updateJenis($where = null, $data = null)
    {
        $this->db->update('jenis', $data, $where);
    }

    public function joinJenis($where)
    {
        $this->db->select('donasi.id, jenis.jenis_donasi');
        $this->db->from('donasi');
        $this->db->join('jenis', 'jenis.id = donasi.id');
        $this->db->where($where);
        return $this->db->get();
    }

    //Manajemen Yayasan
    public function getYayasan()
    {
        return $this->db->get('yayasan');
    }

    public function yayasanWhere($where)
    {
        return $this->db->get_where('yayasan', $where);
    }

    public function simpanYayasan($data = null)
    {
        $this->db->insert('yayasan', $data);
    }

    public function updateYayasan($data = null, $where = null)
    {
        $this->db->update('yayasan', $data, $where);
    }

    public function hapusYayasan($where = null)
    {
        $this->db->delete('yayasan', $where);
    }

    //Manajemen Yayasan
    public function getAnak()
    {
        return $this->db->get('anak_asuh');
    }

    public function anakWhere($where)
    {
        return $this->db->get_where('anak_asuh', $where);
    }

    public function simpanAnak($data = null)
    {
        $this->db->insert('anak_asuh', $data);
    }

    public function updateAnak($data = null, $where = null)
    {
        $this->db->update('anak_asuh', $data, $where);
    }

    public function hapusAnak($where = null)
    {
        $this->db->delete('anak_asuh', $where);
    }
}
