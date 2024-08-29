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
        $this->db->join('eg_region as er', 'er.regionId = es.selectedRegion', 'left');
        $this->db->order_by('stationName', 'asc');
        $query = $this->db->get();
        // echo $this->db->last_query();
        // die();
        return $query->result();
    }

    public function getstations()
    {
        $this->db->select('*');
        $this->db->from('eg_station as es');
        $this->db->join('eg_region as er', 'er.regionId  = es.selectedRegion', 'left');
        $this->db->order_by('stationName', 'asc');
        $query = $this->db->get();

        return $query->result_array();
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






    public function getallactiveregions()

    {
        $this->db->select('*');
        $this->db->from('eg_region');
        $this->db->where('regionActive', 1);
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

    public function getallactiveoffices()

    {
        $this->db->select('*');
        $this->db->from('office_location');
        $this->db->where('officeActive', 1);
        $this->db->order_by('officeLocation', 'asc');
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


    public function get_station_by_slug($stationSlug)
    {
        return $this->db->select('*')
            ->from('eg_station')
            ->where('stationSlug', $stationSlug)
            ->get()
            ->row_array();
    }


    
    public function get_region_by_slug($regionSlug)
    {
        return $this->db->select('*')
            ->from('eg_region')
            ->where('regionSlug', $regionSlug)
            ->get()
            ->row_array();
    }

    public function update($table, $data, $where)
    {
        $this->db->where($where);
        return $this->db->update($table, $data);
    }

    public function delete_station($stationId)
    {

        $this->db->where('stationId', $stationId);
        return $this->db->delete('eg_station');
    }

    public function delete_region($regionId)
    {

        $this->db->where('regionId', $regionId);
        return $this->db->delete('eg_region');
    }

    public function getregions()
    {
        $this->db->select('*');
        $this->db->from('eg_region');
        $this->db->order_by('regionName', 'asc');
        $query = $this->db->get();

        return $query->result_array();
    }


}
