<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Universal_model extends CI_Model
{
    public function get($table, $data = null, $where = null)
    {
        if ($data != null) {
            return $this->db->get_where($table, $data)->row_array();
        } else {
            return $this->db->get_where($table, $where)->result_array();
        }
    }

    public function insert($table, $data, $batch = false)
    {
        return $batch ? $this->db->insert_batch($table, $data) : $this->db->insert($table, $data);
    }

    public function update($table, $pk, $id, $data)
    {
        $this->db->where($pk, $id);
        return $this->db->update($table, $data);
    }

    public function delete($table, $pk, $id)
    {
        return $this->db->delete($table, [$pk => $id]);
    }

    public function getPegawai()
    {
        $this->db->select('*');
        $this->db->from('pegawai');
        $this->db->join('jabatan', 'pegawai.id_jabatan = jabatan.id');
        $this->db->join('divisi', 'pegawai.id_divisi = divisi.id');
        $query = $this->db->get();

        return $query->result_array();
    }
}
