<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Penjualan_royal_model extends CI_Model
{
    public $table = 'penjualan_royal';
    public $id = 'penjualan_royal.id';
    public function __construct()
    {
        parent::__construct();
    }
    public function get()
    {
        $this->db->select('pr.*,u.nama as nama, u.email as email');
        $this->db->from('penjualan_royal pr');
        $this->db->join('user u', 'pr.id_user = u.id');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getById($id)
    {
        $this->db->from($this->table);;
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }
    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
    public function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }
    public function getByUser()
    {
        $id = $this->session->userdata('id');
        $this->db->from($this->table);
        $this->db->where('id_user', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getByUser2($id)
    {
        $idu = $this->session->userdata('id');
        $this->db->from($this->table);
        $this->db->where('id_user', $idu);
        $this->db->where('no_penjualan', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function updatestatus($status, $nojual)
    {
        $this->db->set('status', $status);
        $this->db->where('no_penjualan', $nojual);
        $this->db->update($this->table);
        return $this->db->affected_rows();
    }
    public function getByIdP($id)
    {
        $this->db->select('pr.*,u.nama as nama, u.email as email');
        $this->db->from('penjualan_royal pr');
        $this->db->join('user u', 'pr.id_user = u.id');
        $this->db->where('no_penjualan', $id);
        $query = $this->db->get();
        return $query->row_array();
    }
}