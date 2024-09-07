<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // public function insert($reportData) {
    //     $this->db->insert('reports', $reportData);
    //     return $this->db->insert_id(); 
    // }


    public function insertReport($data) {
        $this->db->insert('eg_report', $data);
        return $this->db->insert_id(); 
    }

    

    

}

