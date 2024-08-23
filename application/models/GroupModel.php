<?php

class GroupModel extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

   
    public function insertGroup($data) {
        return $this->db->insert('groups', $data); 
    }
}
