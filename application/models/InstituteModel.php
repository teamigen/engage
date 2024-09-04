<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InstituteModel extends CI_Model {

    public function insertInstitute($data) {
        return $this->db->insert('eg_institutes', $data);
    }

    public function getAllInstitutes() {
        $this->db->select('eg_institutes.instituteId, eg_institutes.instituteName, eg_location.locationName');
        $this->db->from('eg_institutes');
        $this->db->join('eg_location', 'eg_institutes.instituteLocation = eg_location.locationId', 'left');
        $query = $this->db->get();
        return $query->result();
    }


}
