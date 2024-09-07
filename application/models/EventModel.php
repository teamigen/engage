<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class EventModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // public function insert($data)
    // {
    //     return $this->db->insert('events', $data);
    // }

    public function insertEvent($data) {
        $this->db->insert('eg_events', $data);
    }
}


