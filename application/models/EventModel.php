<?php
defined('BASEPATH') or exit('No direct script access allowed');
class EventModel extends CI_Model
{

    protected $table = 'eg_events';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

 

    public function insertEvent($data)
    {
        $this->db->insert('eg_events', $data);
    }

    public function getEventsByReportId($reportId)
    {
        $this->db->where('reportId', $reportId);
        $query = $this->db->get('eg_events');
        return $query->result();
    }

    
    public function deleteEventsByReportId($reportId)
    {
        return $this->db->where('reportId', $reportId)
                        ->delete($this->table); 
    }
}
