<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }
   
    public function getallactiveusers(){
        $this->db->select('*');
        $this->db->from('eg_user as est');
        $this->db->join('eg_station as stt', 'est.stationId = stt.stationId', 'left');
        $this->db->order_by('userName', 'asc');
        $query = $this->db->get();
        return $query->result();
    }
  
    
}