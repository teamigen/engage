<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Common_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function insert($table, $data)
    {
        $this->db->insert($table, $data);
        return true;
    }
    public function update($table, $data, $id, $prime)
    {
        // Inserting into your table
        $this->db->set($data);
        $this->db->where($prime, $id);
        $this->db->update($table);
        return true;
    }
    public function delete($table, $id, $primaryid)
    {
        $this->db->where($primaryid, $id);
        $this->db->delete($table);
        return true;
    }
    function getallactive($table, $actvar, $orderby, $ascdes)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($actvar, 1);
        $this->db->order_by($orderby, $ascdes);
        $query = $this->db->get();
        return $query->result();
    }
    function getall($table, $orderby, $ascdes)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->order_by($orderby, $ascdes);
        $query = $this->db->get();
        return $query->result();
    }
    function getbyid($table,$field, $id)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($field, $id);
        $query = $this->db->get();
        return $query->row();
    }

    function getvalue($table, $prime, $id, $orderby, $ascdes)
    {
        $this->db->where($prime, $id);
        $this->db->order_by($orderby, $ascdes);
        $query = $this->db->get($table);
        return $query->result();
    }

    public function get_data()
    {
        // Replace with your actual data fetching logic
        $data = array(
            array('id' => 1, 'name' => 'Data 1', 'details' => 'Detail for Data 1'),
            array('id' => 2, 'name' => 'Data 2', 'details' => 'Detail for Data 2'),
            array('id' => 3, 'name' => 'Data 3', 'details' => 'Detail for Data 3'),
            // ... (Add more data if needed)
        );
        return $data;
    }

    public function get_total_records()
    {
        // Replace with your logic to count total records
        $total_records = count($this->get_data()); // Assuming `get_data` provides all records
        return $total_records;
    }
    public function delete_location($locationSlug)
    {

        $this->db->where('locationSlug', $locationSlug);
        return $this->db->delete('eg_location');
    }
}
