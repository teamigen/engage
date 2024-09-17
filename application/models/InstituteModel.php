<?php
defined('BASEPATH') or exit('No direct script access allowed');

class InstituteModel extends CI_Model
{

    public function insertInstitute($data)
    {
        $this->db->insert('eg_institutes', $data);
        return $this->db->insert_id(); 
    }
    

    public function getAllInstitutes()
    {
        $this->db->select('eg_institutes.instituteId, eg_institutes.instituteName, eg_location.locationName');
        $this->db->from('eg_institutes');
        $this->db->join('eg_location', 'eg_institutes.instituteLocation = eg_location.locationId', 'left');
        $query = $this->db->get();
        return $query->result();
    }


    public function getallactiveinstitutessbystation($stationId)
    {
        $this->db->select('*');
        $this->db->from('eg_institutes');
        $this->db->where('eg_institutes.stationId', $stationId);
        $this->db->join('eg_location', 'eg_institutes.instituteLocation = eg_location.locationId', 'left');
        $query = $this->db->get();
        return $query->result();
    }

  
    public function delete_institute($instituteSlug)
    {

        $this->db->where('instituteSlug', $instituteSlug);
        return $this->db->delete('eg_institutes');
    }




    public function get_institute_by_slug($instituteSlug)
    {
        return $this->db->select('*')
            ->from('eg_institutes')
            ->where('instituteSlug', $instituteSlug)
            ->get()
            ->row_array();
    }


    public function update_institute($instituteId, $data)
    {
        $this->db->where('instituteId', $instituteId);
        return $this->db->update('eg_institutes', $data);
    }
}
