<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CouncilModel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function insertCouncil($data)
    {
        $this->db->insert('eg_council', $data);
        return $this->db->insert_id();
    }

    public function insertMember($data)
    {
        return $this->db->insert('eg_council_member', $data);
    }

    public function getcouncils()
    {
        $this->db->select('*');
        $this->db->from('eg_council as ec');
        $this->db->join('eg_location as el', 'el.locationId = ec.councilLocation', 'left');
        $this->db->order_by('councilName', 'asc');
        $query = $this->db->get();

        return $query->result_array();
    }
    public function getcouncilsbystation($stationId)
    {
        $this->db->select('eg_council.*, eg_station.stationName, eg_location.locationName');
        $this->db->from('eg_council');
        $this->db->join('eg_station', 'eg_council.stationId = eg_station.stationId');
        $this->db->join('eg_location', 'eg_council.councilLocation = eg_location.locationId');
        $this->db->join('eg_institutes', 'eg_council.councilInstitute = eg_institutes.instituteId');
        $this->db->where('eg_council.stationId', $stationId);
        $query = $this->db->get();
        // echo $this->db->last_query();
        // die();
        // return $query->result();

        return $query->result_array();
    }

    
    //SELECT * FROM `eg_council` as `ec` LEFT JOIN `eg_location` as `el` ON `el`.`locationId` = `ec`.`councilLocation` LEFT JOIN `eg_institutes` as `ei` ON `ei`.`stationId` = `ec`.`stationId` WHERE `el`.`stationId` = '2' ORDER BY `councilName` ASC;
    public function delete_council($councilId)
    {

        $this->db->where('councilId', $councilId);

        return $this->db->delete('eg_council');
    }

    public function getMembersByCouncilId($councilId)
    {
        $this->db->where('councilId', $councilId);

        $query = $this->db->get('eg_council_member');

        return $query->result_array();
    }


    public function get_council_by_slug($councilSlug)
    {
        return $this->db->select('*')
            ->from('eg_council')
            ->where('councilSlug', $councilSlug)
            ->get()
            ->row_array();
    }

    public function updateCouncil($councilId, $data)
    {
        $this->db->where('councilId', $councilId);
        return $this->db->update('eg_council', $data);
    }

    public function getCouncilById($councilId)
    {

        $this->db->where('councilId', $councilId);
        $query = $this->db->get('eg_council');

        return $query->row();
    }

    public function deleteMembersByCouncilId($councilId)
    {
        $this->db->where('councilId', $councilId);
        $this->db->delete('eg_council_member');
        return $this->db->affected_rows() > 0;
    }
}
