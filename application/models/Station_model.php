<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Station_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function getallactivestations()
    {
        $this->db->select('*');
        $this->db->from('eg_station as es');
        // $this->db->join('eg_district as ed', 'ed.districtId = es.districtId', 'left');
        // $this->db->join('eg_state as et', 'et.stateId = ed.stateId', 'left');
        $this->db->join('eg_region as er', 'er.regionId = es.selectedRegion', 'left');
        $this->db->order_by('stationName', 'asc');
        $query = $this->db->get();
        // echo $this->db->last_query();
        // die();
        return $query->result();
    }


    public function getallactivedistricts()
    {
        $this->db->select('*');
        $this->db->from('eg_district as ed');
        $this->db->join('eg_state as et', 'et.stateId = ed.stateId', 'left');
        $this->db->order_by('districtName', 'asc');
        $query = $this->db->get();
        return $query->result();
    }
    // public function getallactivestates(){
    //     $this->db->select('*');
    //     $this->db->from('eg_state as st');
    //     $this->db->join('eg_country as ec', 'st.countryId = ec.countryId', 'left');
    //     $this->db->order_by('stateName', 'asc');
    //     $query = $this->db->get();
    //     return $query->result();
    // }

    public function getallactivestates()
    {
        $this->db->select('*');
        $this->db->from('eg_state as et');
        $this->db->join('eg_country as ec', 'et.countryId = ec.countryId', 'left');
        $this->db->order_by('stateName', 'asc');
        $query = $this->db->get();
        return $query->result();
    }

    public function getallactivecountries()
    {
        $this->db->select('*');
        $this->db->from('eg_country as et');
        $this->db->order_by('countryName', 'asc');
        $query = $this->db->get();
        return $query->result();
    }

    public function getallactiveregions()
    {
        $this->db->select('*');
        $this->db->from('eg_region');
        $this->db->where('regionStatus', 1);
        $this->db->order_by('regionName', 'asc');
        $query = $this->db->get();
        return $query->result();
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


   
    public function save_location($data)
    {
        $this->db->where('locationSlug', $data['locationSlug']);
        $existingLocation = $this->db->get('eg_location')->row();

        if ($existingLocation) {
            return false; 
        } else {
            return $this->db->insert('eg_location', $data);
        }
    }
}
