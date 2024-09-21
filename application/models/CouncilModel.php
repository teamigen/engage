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




    public function insertAreaCouncil($data)
    {
        $this->db->insert('eg_areacouncil', $data);
        return $this->db->insert_id();
    }

    public function insertAreaMember($data)
    {
        return $this->db->insert('eg_areacouncil_member', $data);
    }


    public function getareacouncilsbystation($stationId)
    {
        $this->db->select('eg_areacouncil.*, eg_station.stationName, eg_location.locationName');
        $this->db->from('eg_areacouncil');
        $this->db->join('eg_station', 'eg_areacouncil.stationId = eg_station.stationId');
        $this->db->join('eg_location', 'eg_areacouncil.councilLocation = eg_location.locationId');

        $this->db->where('eg_areacouncil.stationId', $stationId);
        $query = $this->db->get();


        return $query->result_array();
    }

    public function delete_areacouncil($councilId)
    {

        $this->db->where('councilId', $councilId);

        return $this->db->delete('eg_areacouncil');
    }

    public function get_Areacouncil_by_slug($councilSlug)
    {
        return $this->db->select('*')
            ->from('eg_areacouncil')
            ->where('councilSlug', $councilSlug)
            ->get()
            ->row_array();
    }

    public function getAreaMembersByCouncilId($councilId)
    {
        $this->db->where('councilId', $councilId);

        $query = $this->db->get('eg_areacouncil_member');

        return $query->result_array();
    }


    public function updateAreaCouncil($councilId, $data)
    {
        $this->db->where('councilId', $councilId);
        return $this->db->update('eg_areacouncil', $data);
    }

    public function deleteAreaMembersByCouncilId($councilId)
    {
        $this->db->where('councilId', $councilId);
        $this->db->delete('eg_areacouncil_member');
        return $this->db->affected_rows() > 0;
    }

    public function checkMemberExists($councilId, $memberId)
    {
        $this->db->where('councilId', $councilId);
        $this->db->where('memberId', $memberId);
        $query = $this->db->get('eg_council_member');
        return $query->row_array();
    }




    public function getMembersByStationId($stationId)
    {
        $this->db->where('stationId', $stationId);
        $query = $this->db->get('eg_council_member');
        return $query->result_array();
    }

    public function getdisMembersByStationId($stationId)
    {
        $this->db->select('eacm.memberId, ecm.memberName');
        $this->db->from('eg_areacouncil_member eacm');
        $this->db->join('eg_council_member ecm', 'eacm.memberId = ecm.memberId');
        $this->db->where('eacm.stationId', $stationId);
        $this->db->where_in('eacm.designation', ['Coordinator', 'Co-Coordinator']);
        $query = $this->db->get();
        return $query->result_array();
    }


    public function insertDistrictCouncil($data)
    {
        $this->db->insert('eg_districtcouncil', $data);
        return $this->db->insert_id();
    }

    public function insertDistrictMember($data)
    {
        return $this->db->insert('eg_districtcouncil_member', $data);
    }

    public function getdistrictcouncilsbystation($stationId)
    {
        $this->db->select('eg_districtcouncil.*, eg_station.stationName, eg_location.locationName');
        $this->db->from('eg_districtcouncil');


        $this->db->join('eg_station', 'eg_districtcouncil.stationId = eg_station.stationId');
        $this->db->join('eg_location', 'eg_districtcouncil.councilLocation = eg_location.locationId');

        $this->db->where('eg_districtcouncil.stationId', $stationId);
        $query = $this->db->get();
        return $query->result_array();
    }


    public function delete_districtcouncil($councilId)
    {

        $this->db->where('councilId', $councilId);

        return $this->db->delete('eg_districtcouncil');
    }


    public function get_Districtcouncil_by_slug($councilSlug)
    {
        return $this->db->select('*')
            ->from('eg_districtcouncil')
            ->where('councilSlug', $councilSlug)
            ->get()
            ->row_array();
    }

    public function getDistrictMembersByCouncilId($councilId)

    {
        $this->db->select('eg_districtcouncil_member.*, eg_council_member.memberName, eg_districtcouncil.councilName, eg_districtcouncil.councilLocation, eg_districtcouncil.councilArea');
        $this->db->from('eg_districtcouncil_member');
        $this->db->join('eg_council_member', 'eg_districtcouncil_member.memberId = eg_council_member.memberId');
        $this->db->join('eg_districtcouncil', 'eg_districtcouncil_member.councilId = eg_districtcouncil.councilId');
        $this->db->where('eg_districtcouncil_member.councilId', $councilId);

        $query = $this->db->get();
        return $query->result_array();
    }

    public function updateDistrictCouncil($councilId, $councilData)
    {

        $this->db->where('councilId', $councilId);
        return $this->db->update('eg_districtcouncil', $councilData);
    }
    public function deleteCouncilMembers($councilId)
    {

        $this->db->where('councilId', $councilId);
        return $this->db->delete('eg_districtcouncil_member');
    }


    // public function deleteDistrictMembersByCouncilId($councilId)
    // {

    //     $this->db->where('councilId', $councilId);
    //     return $this->db->delete('eg_districtcouncil_member');
    // }
    public function deleteDistrictMembersByCouncilId($councilId)
    {
        if (empty($councilId)) {
            return false;
        }
        $this->db->where('councilId', $councilId);
        return $this->db->delete('eg_districtcouncil_member');
    }


    public function isCouncilNameUnique($councilName, $councilId)
    {
        $this->db->where('councilName', $councilName);
        $this->db->where('councilId !=', $councilId);
        $query = $this->db->get('eg_council');

        return $query->num_rows() === 0;
    }

    public function isAreaCouncilNameUnique($councilName, $councilId)
    {
        $this->db->where('councilName', $councilName);
        $this->db->where('councilId !=', $councilId);
        $query = $this->db->get('eg_areacouncil');

        return $query->num_rows() === 0;
    }

    public function isDistrictCouncilNameUnique($councilName, $councilId)
    {
        $this->db->where('councilSlug', $councilName);
        $this->db->where('councilId !=', $councilId);
        $query = $this->db->get('eg_districtcouncil');

        return $query->num_rows() === 0;
    }
}
