<?php
class ChurchModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insertChurch($data) {
        $this->db->insert('churches', $data);
        return $this->db->insert_id();
    }

    public function insertContactPerson($data) {
        $this->db->insert('contact_persons', $data);
    }


    public function getallactivelocations()
    {
        $this->db->select('*');
        $this->db->from('eg_location');
        $this->db->where('locationStatus', 1);
        $this->db->order_by('locationName', 'asc');
        $query = $this->db->get();
        return $query->result();
    }
}
