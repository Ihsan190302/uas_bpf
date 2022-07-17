<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Detail_royal_model extends CI_Model
{
    public $table = 'detail_penjualan_royal';
    public $id = 'detail_penjualan_royal.id';
    public function __construct()
    {
        parent::__construct();
    }
    public function get()
    {
        $this->db->select('tr.*, r.nama as nama, to.harga as harga');
        $this->db->from('transaksi_royal tr');
        $this->db->join('royal r','tr.id_royal= r.id');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getById($id)
    {
        $this->db->select('dr.*, u.nama as nama, r.nama as nama');
        $this->db->from('detail_penjualan_royal dr');
        $this->db->join('user u', 'dr.id_user = u.id');
        $this->db->join('royal r', 'dr.id_royal = r.id');
        $this->db->where('dr.no_penjualan', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getByUser($id)
    {
        $idu = $this->session->userdata('id');
        $this->db->select('dr.*, r.nama as nama, r.harga as harga');
        $this->db->from('detail_penjualan_royal dr');
        $this->db->join('royal r', 'dr.id_royal = r.id');
        $this->db->where('dr.no_penjualan', $id, 'AND dr.id_user=' . $idu);
        $this->db->where('dr.id_user=' . $idu);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }
    public function insert($data)
    {
        return $this->db->insert_batch($this->table, $data);
    }
    public function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }
}