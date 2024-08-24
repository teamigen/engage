<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CouncilModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insertCouncil($data) {
        $this->db->insert('eg_council', $data);
        return $this->db->insert_id();
    }

    public function insertMember($data) {
        return $this->db->insert('eg_council_member', $data);
    }
}
